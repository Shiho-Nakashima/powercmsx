<?php ob_start();?><?php $_3eeb2d_vars=&$this->vars;$_3eeb2d_old_params=&$this->old_params;$_3eeb2d_local_params=&$this->local_params;$_3eeb2d_old_vars=&$this->old_vars;$_3eeb2d_local_vars=&$this->local_vars;?><?php $c_8f6088=null;$_3eeb2d_old_params['_8f6088']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_8f6088']=$_3eeb2d_local_vars;$a_8f6088=$this->setup_args(['name'=>'html_head','this_tag'=>'setvarblock'],null,$this);ob_start();?>

  <style>
    .plugin-active { background-color: #eef !important; color: black !important }
    .plugin-active td, .plugin-active th { border-top: 1px solid #bbb !important; border-bottom: 1px solid #bbb !important }
    .plugin-inactive { color: #444 !important }
  </style>
<?php $c_8f6088=ob_get_clean();$c_8f6088=$this->block_setvarblock($a_8f6088,$c_8f6088,$this,$r_8f6088,1,'_8f6088');echo($c_8f6088); $_3eeb2d_local_params=$_3eeb2d_old_params['_8f6088'];?>

<?php $_3eeb2d_old_params['_48ffb3']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_48ffb3']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_911d14']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_911d14']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_fix_spacebar','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_911d14'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_911d14'];?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_48ffb3'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_48ffb3'];?>

<!DOCTYPE html>
<html lang="<?php $_3eeb2d_old_params['_4dc188']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_4dc188']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_language','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_language','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
en<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_4dc188'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_4dc188'];?>
">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="author" content="Alfasado Inc.">
    <meta name="robots" content="noindex">
    <meta name="robots" content="nofollow">
    <link rel="icon" href="favicon.ico">
    <title><?php $_3eeb2d_old_params['_b44f36']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_b44f36']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'html_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'html_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php else:?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'page_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_b44f36'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_b44f36'];?>
<?php $_3eeb2d_old_params['_fb0d7e']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_fb0d7e']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_beb829']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_beb829']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 | <?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_beb829'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_beb829'];?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_fb0d7e'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_fb0d7e'];?>
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
    <?php $_3eeb2d_old_params['_b43756']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_b43756']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_stickey_buttons','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_b00960']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_b00960']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_3eeb2d_old_params['_29c21b']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_29c21b']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickybgcolor','value'=>'$workspace_barcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_29c21b'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_29c21b'];?>

      <?php $_3eeb2d_old_params['_23d2be']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_23d2be']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickycolor','value'=>'$workspace_bartextcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_23d2be'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_23d2be'];?>

      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_b00960'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_b00960'];?>

      <?php $_3eeb2d_old_params['_0985b9']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_0985b9']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickybgcolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'barcolor','setvar'=>'stickybgcolor','this_tag'=>'var'],null,$this),$this),$this->setup_args('stickybgcolor','setvar',$this),$this,'setvar')?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_0985b9'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_0985b9'];?>

      <?php $_3eeb2d_old_params['_b05db3']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_b05db3']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickycolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'bartextcolor','setvar'=>'stickycolor','this_tag'=>'var'],null,$this),$this),$this->setup_args('stickycolor','setvar',$this),$this,'setvar')?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_b05db3'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_b05db3'];?>

      @media ( min-height: 576px ) {
      .edit-action-bar { position: sticky; bottom: 0px; z-index: 1020; background: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickybgcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
;
          padding: 10px 0px; vertical-align: middle; border-top: 1px solid #CCC; }
      .edit-action-bar button { border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      .edit-action-bar label { color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      }
    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_b43756'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_b43756'];?>

      .fixed-top { z-index: 1030 !important; }
      .nav-top,.navbar-brand,.dropdown-menu, .nav-top a, footer{ background-color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_barcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; }
      .nav-top .my-sm-0, .nav-top .navbar-toggler{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      <?php $_3eeb2d_old_params['_424106']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_424106']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php ob_start();$_3eeb2d_old_params['_6cffcd']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_6cffcd']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .brand-workspace, .workspace-bar, .workspace-bar a,
      .workspace-bar .dropdown-menu{ background-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      .workspace-bar button.my-sm-0{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      .workspace-bar .my-sm-0, .workspace-bar .navbar-toggler{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      <?php endif;$_6cffcd=ob_get_clean();echo paml_htmlspecialchars($_6cffcd,ENT_QUOTES);$_3eeb2d_local_params=$_3eeb2d_old_params['_6cffcd'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_6cffcd'];?>

      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_424106'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_424106'];?>

      <?php $_3eeb2d_old_params['_f3eaad']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_f3eaad']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .form-control, .custom-select, .relation_nestable_list, .custom-control-indicator, .tox-tinymce, .mce-tinymce, .btn-outline-secondary, .btn-secondary, .pagination-sm li a{ border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important }
      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_f3eaad'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_f3eaad'];?>

      <?php $_3eeb2d_old_params['_ffe246']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ffe246']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'panel_width','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
.nav-link{ max-width: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'panel_width','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
px !important }<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ffe246'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ffe246'];?>

      .navbar .btn { width:35px }
      <?php $_3eeb2d_old_params['_446657']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_446657']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'this_mode','eq'=>'config','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'this_mode','eq'=>'upgrade','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_446657'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_446657'];?>

      <?php $_3eeb2d_old_params['_ccebc2']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ccebc2']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'in_editing','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      @media (min-width: 992px) {
      .col-lg-2{ max-width:13rem !important }
      .col-lg-10{ min-width: -webkit-calc(100% - 13rem); min-width: calc(100% - 13rem) } }
      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ccebc2'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ccebc2'];?>

    </style>
    <?php echo $this->function_var($this->setup_args(['name'=>'html_head','this_tag'=>'var'],null,$this),$this)?>

    <?php $_3eeb2d_old_params['_826db6']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_826db6']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'invisible_selector','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <style><?php echo $this->modifier_join($this->function_var($this->setup_args(['name'=>'invisible_selector','join'=>',','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','join',$this),$this,'join')?>
{display:none !important}</style>
    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_826db6'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_826db6'];?>

    <?php $_3eeb2d_old_params['_088dd6']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_088dd6']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<style><?php $_3eeb2d_old_params['_688462']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_688462']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
body { padding-top: 80px; } .workspace-bar { margin-top: 0;}
    <?php else:?>
.workspace-bar { margin-bottom: 14px;}<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_688462'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_688462'];?>
</style><?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_088dd6'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_088dd6'];?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_css','setvar'=>'config_user_css','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_css','setvar',$this),$this,'setvar')?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_js','setvar'=>'config_user_js','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_js','setvar',$this),$this,'setvar')?>

    <?php $_3eeb2d_old_params['_2803d7']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_2803d7']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_css','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_css','this_tag'=>'var'],null,$this),$this)?>
"><?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_2803d7'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_2803d7'];?>

    <?php $_3eeb2d_old_params['_70ff34']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_70ff34']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_js','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_js','this_tag'=>'var'],null,$this),$this)?>
"></script><?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_70ff34'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_70ff34'];?>

  </head>
  <body class="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'body_class','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<?php $_3eeb2d_old_params['_0a0f56']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_0a0f56']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php $_3eeb2d_old_params['_823bd3']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_823bd3']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_loader','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div id="__loader-bg">
  <img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif" alt="" width="45" height="45">
</div>
<script>
window.addEventListener('load', function(){
    $('#__loader-bg').hide("fast");
});
</script>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_823bd3'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_823bd3'];?>

<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_0a0f56'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_0a0f56'];?>

  <div id="main-content">
<?php $_3eeb2d_old_params['_f85962']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_f85962']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="fixed-top">
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_f85962'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_f85962'];?>

  <?php $_3eeb2d_old_params['_a54149']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_a54149']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_4673f2']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_4673f2']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.__mode','match'=>'/^(?:login|logout)$/iu','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'is_login','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_4673f2'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_4673f2'];?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_a54149'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_a54149'];?>

  <?php $_3eeb2d_old_params['_75cf6a']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_75cf6a']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'member_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'is_login','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_75cf6a'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_75cf6a'];?>

    <nav class="bar navbar navbar-toggleable-md navbar-inverse bg-inverse nav-top<?php $_3eeb2d_old_params['_6a1ac1']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_6a1ac1']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 fixed-top<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_6a1ac1'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_6a1ac1'];?>
">
      <?php $_3eeb2d_old_params['_cc1e06']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_cc1e06']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_3eeb2d_old_params['_744627']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_744627']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'install','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a class="navbar-brand brand-prototype" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
">PowerCMS X</a>
        <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_744627'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_744627'];?>

      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_cc1e06'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_cc1e06'];?>

      <?php $_3eeb2d_old_params['_43f49c']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_43f49c']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'is_login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <button style="background-color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_barcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; z-index:7" class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </button>
      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_43f49c'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_43f49c'];?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_param','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_3eeb2d_old_params['_28ada7']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_28ada7']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $c_851b6f=null;$_3eeb2d_old_params['_851b6f']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_851b6f']=$_3eeb2d_local_vars;$a_851b6f=$this->setup_args(['name'=>'workspace_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_851b6f=ob_get_clean();$c_851b6f=$this->block_setvarblock($a_851b6f,$c_851b6f,$this,$r_851b6f,1,'_851b6f');echo($c_851b6f); $_3eeb2d_local_params=$_3eeb2d_old_params['_851b6f'];?>

        <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_28ada7'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_28ada7'];?>

      <?php $_3eeb2d_old_params['_2fc195']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_2fc195']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <a class="navbar-brand"<?php $_3eeb2d_old_params['_c6ed87']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_c6ed87']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_c6ed87'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_c6ed87'];?>
 style="z-index:1"><?php echo $this->modifier_trim_to(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'appname','escape'=>'','trim_to'=>'20+...','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('20+...','trim_to',$this),$this,'trim_to')?>
<span id="navbar-brand-end"></span></a>
      <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_counter','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php $_3eeb2d_old_params['_7e0151']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_7e0151']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_ad1167']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ad1167']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'ws_selector_limit','setvar'=>'selector_limit','this_tag'=>'property'],null,$this),$this),$this->setup_args('selector_limit','setvar',$this),$this,'setvar')?>

        <?php $_3eeb2d_old_params['_a7c29c']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_a7c29c']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'selector_limit','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'selector_limit','value'=>'16','this_tag'=>'setvar'],null,$this),$this)?>

        <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_a7c29c'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_a7c29c'];?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'selector_limit','op'=>'+','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_by','value'=>'last_update','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_order','value'=>'descend','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_3eeb2d_old_params['_1034bb']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_1034bb']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_space_order','eq'=>'Default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_by','value'=>'order','this_tag'=>'setvar'],null,$this),$this)?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_order','value'=>'ascend','this_tag'=>'setvar'],null,$this),$this)?>

        <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_1034bb'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_1034bb'];?>

        <?php $c_36df01=null;$_3eeb2d_old_params['_36df01']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_36df01']=$_3eeb2d_local_vars;$a_36df01=$this->setup_args(['cols'=>'id,name,barcolor,bartextcolor','model'=>'workspace','can_access'=>'1','limit'=>'$selector_limit','sort_by'=>'$ws_sort_by','direction'=>'$ws_sort_order','this_tag'=>'objectloop'],null,$this);$_36df01=-1;$r_36df01=true;while($r_36df01===true):$r_36df01=($_36df01!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_36df01,$c_36df01,$this,$r_36df01,++$_36df01,'_36df01');ob_start();?>
<?php $c_36df01 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_36df01=false;}if($c_36df01 ):?>

        <?php $_3eeb2d_old_params['_6b8d41']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_6b8d41']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <div class="hidden nav-item dropdown workspace-dd-wrapper active" id="workspace-selector" style="z-index:5">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpaces','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
            <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Select a WorkSpace','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cube workspace-dd" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpaces','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
        <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_6b8d41'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_6b8d41'];?>

            <?php $_3eeb2d_old_params['_91a906']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_91a906']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','lt'=>'$selector_limit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <a<?php $_3eeb2d_old_params['_291444']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_291444']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_color_the_selector','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_73ab8f']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_73ab8f']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_382dfd']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_382dfd']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 style="<?php $_3eeb2d_old_params['_87edff']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_87edff']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__last__','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
margin-bottom:3px;<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_87edff'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_87edff'];?>
background-color:<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important;color:<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important"<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_382dfd'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_382dfd'];?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_73ab8f'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_73ab8f'];?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_291444'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_291444'];?>
 class="dropdown-item btn-sm <?php $_3eeb2d_old_params['_f2cab6']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_f2cab6']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'id','eq'=>'$workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_f2cab6'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_f2cab6'];?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?_selector=1&amp;<?php $_3eeb2d_old_params['_ab5b85']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ab5b85']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request_method','eq'=>'GET','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_3ecfeb']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_3ecfeb']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->modifier_replace($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'query_string','regex_replace'=>'\'/&offset=[0-9]*/\',\'\'','replace'=>'\'does_act=1\',\'\'','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&offset=[0-9]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('\\\'does_act=1\\\',\\\'\\\'','replace',$this),$this,'replace'),ENT_QUOTES)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_3ecfeb'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_3ecfeb'];?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ab5b85'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ab5b85'];?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
">
              <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

            </a>
            <?php else:?>

            <a class="dropdown-item btn-sm" data-toggle="modal" data-target="#modal"
                data-href="" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=workspace&amp;dialog_view=1&amp;workspace_select=1"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select...','this_tag'=>'trans'],null,$this),$this)?>
</a>
            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_91a906'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_91a906'];?>

        <?php $_3eeb2d_old_params['_dea1bd']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_dea1bd']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
        <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_dea1bd'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_dea1bd'];?>

        <?php endif;$c_36df01=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_36df01'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_36df01'];?>

      <div class="collapse navbar-collapse" id="navbars" <?php $_3eeb2d_old_params['_8b1fb4']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_8b1fb4']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_counter','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-left:-66px;z-index:0"<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_8b1fb4'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_8b1fb4'];?>
>
        <ul class="nav-pills navbar-nav mr-auto" id="system-panel">
        <?php $c_76108f=null;$_3eeb2d_old_params['_76108f']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_76108f']=$_3eeb2d_local_vars;$a_76108f=$this->setup_args(['menu_type'=>'6','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_76108f=-1;$r_76108f=true;while($r_76108f===true):$r_76108f=($_76108f!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_76108f,$c_76108f,$this,$r_76108f,++$_76108f,'_76108f');ob_start();?>
<?php $c_76108f = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_76108f=false;}if($c_76108f ):?>

          <?php $_3eeb2d_old_params['_47c9be']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_47c9be']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-bookmark" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_47c9be'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_47c9be'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3eeb2d_old_params['_90885b']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_90885b']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_90885b'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_90885b'];?>

        <?php endif;$c_76108f=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_76108f'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_76108f'];?>

        <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'panel_limit','setvar'=>'panel_limit','this_tag'=>'property'],null,$this),$this),$this->setup_args('panel_limit','setvar',$this),$this,'setvar')?>

        <?php $c_3961e6=null;$_3eeb2d_old_params['_3961e6']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_3961e6']=$_3eeb2d_local_vars;$a_3961e6=$this->setup_args(['limit'=>'$panel_limit','menu_type'=>'1','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_3961e6=-1;$r_3961e6=true;while($r_3961e6===true):$r_3961e6=($_3961e6!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_3961e6,$c_3961e6,$this,$r_3961e6,++$_3961e6,'_3961e6');ob_start();?>
<?php $c_3961e6 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_3961e6=false;}if($c_3961e6 ):?>

          <li class="nav-item <?php $_3eeb2d_old_params['_e96c35']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_e96c35']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'$model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_e96c35'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_e96c35'];?>
">
            <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'label','count_chars'=>'','setvar'=>'count_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('count_chars','setvar',$this),$this,'setvar')?>
<a class="nav-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php $_3eeb2d_old_params['_728858']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_728858']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'count_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 data-toggle="tooltip" data-placement="right" title="<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
"<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_728858'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_728858'];?>
><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          </li>
        <?php endif;$c_3961e6=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_3961e6'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_3961e6'];?>

        <?php $c_c6e0a6=null;$_3eeb2d_old_params['_c6e0a6']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_c6e0a6']=$_3eeb2d_local_vars;$a_c6e0a6=$this->setup_args(['limit'=>'100000','offset'=>'$panel_limit','menu_type'=>'1','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_c6e0a6=-1;$r_c6e0a6=true;while($r_c6e0a6===true):$r_c6e0a6=($_c6e0a6!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_c6e0a6,$c_c6e0a6,$this,$r_c6e0a6,++$_c6e0a6,'_c6e0a6');ob_start();?>
<?php $c_c6e0a6 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_c6e0a6=false;}if($c_c6e0a6 ):?>

          <?php $_3eeb2d_old_params['_c01e37']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_c01e37']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-window-maximize" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_c01e37'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_c01e37'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3eeb2d_old_params['_0ca39d']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_0ca39d']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_0ca39d'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_0ca39d'];?>

        <?php endif;$c_c6e0a6=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_c6e0a6'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_c6e0a6'];?>

        <?php $c_340c98=null;$_3eeb2d_old_params['_340c98']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_340c98']=$_3eeb2d_local_vars;$a_340c98=$this->setup_args(['menu_type'=>'2','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_340c98=-1;$r_340c98=true;while($r_340c98===true):$r_340c98=($_340c98!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_340c98,$c_340c98,$this,$r_340c98,++$_340c98,'_340c98');ob_start();?>
<?php $c_340c98 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_340c98=false;}if($c_340c98 ):?>

          <?php $_3eeb2d_old_params['_ae9e22']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ae9e22']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cog" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ae9e22'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ae9e22'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3eeb2d_old_params['_a2db65']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_a2db65']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_a2db65'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_a2db65'];?>

        <?php endif;$c_340c98=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_340c98'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_340c98'];?>

        <?php $c_ba352b=null;$_3eeb2d_old_params['_ba352b']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ba352b']=$_3eeb2d_local_vars;$a_ba352b=$this->setup_args(['menu_type'=>'3','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_ba352b=-1;$r_ba352b=true;while($r_ba352b===true):$r_ba352b=($_ba352b!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_ba352b,$c_ba352b,$this,$r_ba352b,++$_ba352b,'_ba352b');ob_start();?>
<?php $c_ba352b = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_ba352b=false;}if($c_ba352b ):?>

          <?php $_3eeb2d_old_params['_c2e904']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_c2e904']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-database" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_c2e904'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_c2e904'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3eeb2d_old_params['_19370f']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_19370f']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_19370f'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_19370f'];?>

        <?php endif;$c_ba352b=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_ba352b'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ba352b'];?>

        <?php $c_f09d53=null;$_3eeb2d_old_params['_f09d53']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_f09d53']=$_3eeb2d_local_vars;$a_f09d53=$this->setup_args(['menu_type'=>'4','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_f09d53=-1;$r_f09d53=true;while($r_f09d53===true):$r_f09d53=($_f09d53!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_f09d53,$c_f09d53,$this,$r_f09d53,++$_f09d53,'_f09d53');ob_start();?>
<?php $c_f09d53 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_f09d53=false;}if($c_f09d53 ):?>

          <?php $_3eeb2d_old_params['_33a485']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_33a485']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-comments" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_33a485'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_33a485'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3eeb2d_old_params['_a9a183']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_a9a183']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_a9a183'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_a9a183'];?>

        <?php endif;$c_f09d53=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_f09d53'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_f09d53'];?>

        <?php $c_5ee47f=null;$_3eeb2d_old_params['_5ee47f']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_5ee47f']=$_3eeb2d_local_vars;$a_5ee47f=$this->setup_args(['menu_type'=>'5','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_5ee47f=-1;$r_5ee47f=true;while($r_5ee47f===true):$r_5ee47f=($_5ee47f!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_5ee47f,$c_5ee47f,$this,$r_5ee47f,++$_5ee47f,'_5ee47f');ob_start();?>
<?php $c_5ee47f = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_5ee47f=false;}if($c_5ee47f ):?>

          <?php $_3eeb2d_old_params['_838e53']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_838e53']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-user-plus" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_838e53'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_838e53'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3eeb2d_old_params['_6bcb10']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_6bcb10']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_6bcb10'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_6bcb10'];?>

        <?php endif;$c_5ee47f=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_5ee47f'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_5ee47f'];?>

        <?php $c_ec75f8=null;$_3eeb2d_old_params['_ec75f8']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ec75f8']=$_3eeb2d_local_vars;$a_ec75f8=$this->setup_args(['name'=>'system_menus','this_tag'=>'loop'],null,$this);$_ec75f8=-1;$r_ec75f8=true;while($r_ec75f8===true):$r_ec75f8=($_ec75f8!==-1)?false:true;echo $this->block_loop($a_ec75f8,$c_ec75f8,$this,$r_ec75f8,++$_ec75f8,'_ec75f8');ob_start();?>
<?php $c_ec75f8 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_ec75f8=false;}if($c_ec75f8 ):?>

          <?php $_3eeb2d_old_params['_dccd76']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_dccd76']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <?php $_3eeb2d_old_params['_83484a']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_83484a']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<div class="badge-icon-badge"></div><?php elseif($this->conditional_elseif($this->setup_args(['name'=>'plugin_upgrade_count','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
<div class="badge-icon-badge"></div><?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_83484a'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_83484a'];?>

            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-plug" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_dccd76'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_dccd76'];?>

            <a <?php $_3eeb2d_old_params['_e44497']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_e44497']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
target="<?php echo $this->function_var($this->setup_args(['name'=>'menu_target','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_e44497'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_e44497'];?>
 class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=<?php echo $this->function_var($this->setup_args(['name'=>'menu_mode','this_tag'=>'var'],null,$this),$this)?>
<?php $c_244ca4=null;$_3eeb2d_old_params['_244ca4']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_244ca4']=$_3eeb2d_local_vars;$a_244ca4=$this->setup_args(['name'=>'menu_args','this_tag'=>'loop'],null,$this);$_244ca4=-1;$r_244ca4=true;while($r_244ca4===true):$r_244ca4=($_244ca4!==-1)?false:true;echo $this->block_loop($a_244ca4,$c_244ca4,$this,$r_244ca4,++$_244ca4,'_244ca4');ob_start();?>
<?php $c_244ca4 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_244ca4=false;}if($c_244ca4 ):?>
&amp;<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
=<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$c_244ca4=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_244ca4'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_244ca4'];?>
">
            <?php echo $this->function_var($this->setup_args(['name'=>'menu_label','this_tag'=>'var'],null,$this),$this)?>

            <?php $_3eeb2d_old_params['_a3e696']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_a3e696']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_mode','eq'=>'manage_scheme','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_166910']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_166910']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="badge-icon-badge badge-icon-middle"></div>
            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_166910'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_166910'];?>

            <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'menu_mode','eq'=>'manage_plugins','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_e2f1e1']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_e2f1e1']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'plugin_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="badge-icon-badge badge-icon-middle"></div>
            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_e2f1e1'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_e2f1e1'];?>

            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_a3e696'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_a3e696'];?>

            </a>
          <?php $_3eeb2d_old_params['_ab8200']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ab8200']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ab8200'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ab8200'];?>

        <?php endif;$c_ec75f8=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_ec75f8'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ec75f8'];?>

        </ul>
        <div class="header-util">
          <?php echo $this->function_var($this->setup_args(['name'=>'add_header_system','this_tag'=>'var'],null,$this),$this)?>

          <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'show_both','setvar'=>'__show_both','this_tag'=>'property'],null,$this),$this),$this->setup_args('__show_both','setvar',$this),$this,'setvar')?>

          <a href="<?php $_3eeb2d_old_params['_320896']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_320896']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_3c902b']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_3c902b']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'site_url','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'link_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_3c902b'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_3c902b'];?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'site_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_320896'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_320896'];?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-external-link-square" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_3eeb2d_old_params['_574458']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_574458']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'link_url','this_tag'=>'var'],null,$this),$this)?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-globe" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_574458'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_574458'];?>

        <?php $_3eeb2d_old_params['_d74951']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_d74951']=$_3eeb2d_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'can_rebuild','workspace_id'=>'0','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

        <?php $c_c62922=null;$_3eeb2d_old_params['_c62922']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_c62922']=$_3eeb2d_local_vars;$a_c62922=$this->setup_args(['model'=>'urlmapping','count'=>'model','group'=>'\'workspace_id\',\'model\'','workspace_id'=>'0','limit'=>'1','this_tag'=>'countgroupby'],null,$this);$_c62922=-1;$r_c62922=true;while($r_c62922===true):$r_c62922=($_c62922!==-1)?false:true;echo $this->component('PTTags')->hdlr_countgroupby($a_c62922,$c_c62922,$this,$r_c62922,++$_c62922,'_c62922');ob_start();?>
<?php $c_c62922 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_c62922=false;}if($c_c62922 ):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild" class="popup btn btn-sm btn-secondary my-2 my-sm-0 rebuild-popup" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-refresh" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$c_c62922=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_c62922'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_c62922'];?>

        <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_d74951'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_d74951'];?>

          <a style="padding:<?php $_3eeb2d_old_params['_8c0a3d']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_8c0a3d']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_photo','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
0 3px<?php else:?>
4px<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_8c0a3d'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_8c0a3d'];?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=user&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'user_id','this_tag'=>'var'],null,$this),$this)?>
&amp;_profile=1" class="btn btn-sm btn-secondary my-2 my-sm-0 profile-btn" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
">
          <?php $_3eeb2d_old_params['_dfe3f8']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_dfe3f8']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_photo','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_dfe3f8'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_dfe3f8'];?>

          </a>
          <a id="__logout" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=logout" class="btn btn-sm btn-secondary my-2 my-sm-0 logout-btn" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_3eeb2d_old_params['_c4275f']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_c4275f']=$_3eeb2d_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=config" class="btn btn-sm btn-secondary my-2 my-sm-0 config-system" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Config','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-wrench" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Config','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_c4275f'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_c4275f'];?>

        </div>
      </div>
        <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ad1167'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ad1167'];?>

      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_7e0151'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_7e0151'];?>

      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_2fc195'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_2fc195'];?>

      <?php $_3eeb2d_old_params['_c2d651']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_c2d651']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'member_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <div class="collapse navbar-collapse" id="navbars" <?php $_3eeb2d_old_params['_2de37b']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_2de37b']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_counter','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-left:-66px;z-index:0"<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_2de37b'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_2de37b'];?>
>
        <ul class="nav-pills navbar-nav mr-auto" id="system-panel"></ul>
          <div class="header-util">
          <?php echo $this->function_var($this->setup_args(['name'=>'add_header_workspace','this_tag'=>'var'],null,$this),$this)?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=logout<?php $_3eeb2d_old_params['_80e854']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_80e854']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_80e854'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_80e854'];?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 logout-btn" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=edit_profile<?php $_3eeb2d_old_params['_2ba0c9']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_2ba0c9']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_2ba0c9'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_2ba0c9'];?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 profile-btn" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          </div>
        </div>
      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_c2d651'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_c2d651'];?>

    </nav>
  <?php $_3eeb2d_old_params['_5d4086']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_5d4086']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $_3eeb2d_old_params['_3b108a']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_3b108a']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_fedd24']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_fedd24']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_3eeb2d_old_params['_c17ed6']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_c17ed6']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <nav class="bar navbar navbar-toggleable-md navbar-inverse bg-inverse workspace-bar"<?php $_3eeb2d_old_params['_dd858b']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_dd858b']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 style="z-index:1029;"<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_dd858b'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_dd858b'];?>
>
      <?php $_3eeb2d_old_params['_4444ff']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_4444ff']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <button style="background-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important;" class="navbar-toggler navbar-toggler-right btn-ws" type="button" data-toggle="collapse" data-target="#navbars-ws" aria-controls="navbars" aria-expanded="false" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </button>
      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_4444ff'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_4444ff'];?>

      <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'workspace_name','count_chars'=>'','setvar'=>'workspace_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('workspace_chars','setvar',$this),$this,'setvar')?>
<a class="navbar-brand brand-workspace" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=dashboard&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
"<?php $_3eeb2d_old_params['_0726e5']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_0726e5']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 title="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_0726e5'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_0726e5'];?>
><?php echo $this->modifier_trim_to(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'','trim_to'=>'20+...','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('20+...','trim_to',$this),$this,'trim_to')?>
</a>
      <div class="collapse navbar-collapse" id="navbars-ws">
        <ul class="nav-pills navbar-nav mr-auto">
          <?php $c_0caa6e=null;$_3eeb2d_old_params['_0caa6e']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_0caa6e']=$_3eeb2d_local_vars;$a_0caa6e=$this->setup_args(['type'=>'display_space','menu_type'=>'6','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_0caa6e=-1;$r_0caa6e=true;while($r_0caa6e===true):$r_0caa6e=($_0caa6e!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_0caa6e,$c_0caa6e,$this,$r_0caa6e,++$_0caa6e,'_0caa6e');ob_start();?>
<?php $c_0caa6e = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_0caa6e=false;}if($c_0caa6e ):?>

            <?php $_3eeb2d_old_params['_eee3fd']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_eee3fd']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <li class="nav-item dropdown">
              <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-bookmark" aria-hidden="true"></i>
                <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
</span>
              </a>
              <div class="dropdown-menu">
            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_eee3fd'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_eee3fd'];?>

              <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_3eeb2d_old_params['_316022']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_316022']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_316022'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_316022'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
            <?php $_3eeb2d_old_params['_049f66']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_049f66']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
              </li>
            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_049f66'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_049f66'];?>

          <?php endif;$c_0caa6e=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_0caa6e'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_0caa6e'];?>

        <?php $c_d0e682=null;$_3eeb2d_old_params['_d0e682']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_d0e682']=$_3eeb2d_local_vars;$a_d0e682=$this->setup_args(['limit'=>'$panel_limit','type'=>'display_space','menu_type'=>'1','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_d0e682=-1;$r_d0e682=true;while($r_d0e682===true):$r_d0e682=($_d0e682!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_d0e682,$c_d0e682,$this,$r_d0e682,++$_d0e682,'_d0e682');ob_start();?>
<?php $c_d0e682 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_d0e682=false;}if($c_d0e682 ):?>

          <li class="nav-item nav-item-ws <?php $_3eeb2d_old_params['_e29ca3']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_e29ca3']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'$model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_e29ca3'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_e29ca3'];?>
">
            <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'label','count_chars'=>'','setvar'=>'count_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('count_chars','setvar',$this),$this,'setvar')?>
<a class="nav-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_3eeb2d_old_params['_277efb']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_277efb']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_277efb'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_277efb'];?>
"<?php $_3eeb2d_old_params['_1c8d3a']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_1c8d3a']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'count_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 data-toggle="tooltip" data-placement="right" title="<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
"<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_1c8d3a'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_1c8d3a'];?>
><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          </li>
        <?php endif;$c_d0e682=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_d0e682'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_d0e682'];?>

        <?php $c_4706ac=null;$_3eeb2d_old_params['_4706ac']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_4706ac']=$_3eeb2d_local_vars;$a_4706ac=$this->setup_args(['limit'=>'100000','offset'=>'$panel_limit','type'=>'display_space','menu_type'=>'1','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_4706ac=-1;$r_4706ac=true;while($r_4706ac===true):$r_4706ac=($_4706ac!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_4706ac,$c_4706ac,$this,$r_4706ac,++$_4706ac,'_4706ac');ob_start();?>
<?php $c_4706ac = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_4706ac=false;}if($c_4706ac ):?>

          <?php $_3eeb2d_old_params['_1ab4a7']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_1ab4a7']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-window-maximize" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_1ab4a7'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_1ab4a7'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_3eeb2d_old_params['_c41047']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_c41047']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_c41047'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_c41047'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3eeb2d_old_params['_a8c96d']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_a8c96d']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_a8c96d'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_a8c96d'];?>

        <?php endif;$c_4706ac=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_4706ac'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_4706ac'];?>

        <?php $c_fd6840=null;$_3eeb2d_old_params['_fd6840']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_fd6840']=$_3eeb2d_local_vars;$a_fd6840=$this->setup_args(['type'=>'display_space','menu_type'=>'2','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_fd6840=-1;$r_fd6840=true;while($r_fd6840===true):$r_fd6840=($_fd6840!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_fd6840,$c_fd6840,$this,$r_fd6840,++$_fd6840,'_fd6840');ob_start();?>
<?php $c_fd6840 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_fd6840=false;}if($c_fd6840 ):?>

          <?php $_3eeb2d_old_params['_f3d852']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_f3d852']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cog" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_f3d852'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_f3d852'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_3eeb2d_old_params['_00e827']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_00e827']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_00e827'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_00e827'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3eeb2d_old_params['_c1e776']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_c1e776']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_c1e776'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_c1e776'];?>

        <?php endif;$c_fd6840=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_fd6840'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_fd6840'];?>

        <?php $c_b866a1=null;$_3eeb2d_old_params['_b866a1']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_b866a1']=$_3eeb2d_local_vars;$a_b866a1=$this->setup_args(['type'=>'display_space','menu_type'=>'3','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_b866a1=-1;$r_b866a1=true;while($r_b866a1===true):$r_b866a1=($_b866a1!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_b866a1,$c_b866a1,$this,$r_b866a1,++$_b866a1,'_b866a1');ob_start();?>
<?php $c_b866a1 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_b866a1=false;}if($c_b866a1 ):?>

          <?php $_3eeb2d_old_params['_7424e4']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_7424e4']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-database" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_7424e4'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_7424e4'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_3eeb2d_old_params['_c448e4']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_c448e4']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_c448e4'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_c448e4'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3eeb2d_old_params['_64d4c0']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_64d4c0']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_64d4c0'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_64d4c0'];?>

        <?php endif;$c_b866a1=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_b866a1'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_b866a1'];?>

        <?php $c_fbe9ad=null;$_3eeb2d_old_params['_fbe9ad']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_fbe9ad']=$_3eeb2d_local_vars;$a_fbe9ad=$this->setup_args(['type'=>'display_space','menu_type'=>'4','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_fbe9ad=-1;$r_fbe9ad=true;while($r_fbe9ad===true):$r_fbe9ad=($_fbe9ad!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_fbe9ad,$c_fbe9ad,$this,$r_fbe9ad,++$_fbe9ad,'_fbe9ad');ob_start();?>
<?php $c_fbe9ad = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_fbe9ad=false;}if($c_fbe9ad ):?>

          <?php $_3eeb2d_old_params['_bd48f2']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_bd48f2']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-comments" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_bd48f2'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_bd48f2'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_3eeb2d_old_params['_75e9aa']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_75e9aa']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_75e9aa'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_75e9aa'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3eeb2d_old_params['_9e4cd2']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_9e4cd2']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_9e4cd2'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_9e4cd2'];?>

        <?php endif;$c_fbe9ad=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_fbe9ad'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_fbe9ad'];?>

        <?php $c_b39008=null;$_3eeb2d_old_params['_b39008']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_b39008']=$_3eeb2d_local_vars;$a_b39008=$this->setup_args(['type'=>'display_space','menu_type'=>'5','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_b39008=-1;$r_b39008=true;while($r_b39008===true):$r_b39008=($_b39008!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_b39008,$c_b39008,$this,$r_b39008,++$_b39008,'_b39008');ob_start();?>
<?php $c_b39008 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_b39008=false;}if($c_b39008 ):?>

          <?php $_3eeb2d_old_params['_af17f5']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_af17f5']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-user-plus" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_af17f5'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_af17f5'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_3eeb2d_old_params['_bfb8c4']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_bfb8c4']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_bfb8c4'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_bfb8c4'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3eeb2d_old_params['_824230']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_824230']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_824230'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_824230'];?>

        <?php endif;$c_b39008=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_b39008'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_b39008'];?>

        <?php $c_3a56ce=null;$_3eeb2d_old_params['_3a56ce']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_3a56ce']=$_3eeb2d_local_vars;$a_3a56ce=$this->setup_args(['name'=>'workspace_menus','this_tag'=>'loop'],null,$this);$_3a56ce=-1;$r_3a56ce=true;while($r_3a56ce===true):$r_3a56ce=($_3a56ce!==-1)?false:true;echo $this->block_loop($a_3a56ce,$c_3a56ce,$this,$r_3a56ce,++$_3a56ce,'_3a56ce');ob_start();?>
<?php $c_3a56ce = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_3a56ce=false;}if($c_3a56ce ):?>

          <?php $_3eeb2d_old_params['_34e6ba']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_34e6ba']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-plug" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_34e6ba'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_34e6ba'];?>

            <a <?php $_3eeb2d_old_params['_ffccc0']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ffccc0']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
target="<?php echo $this->function_var($this->setup_args(['name'=>'menu_target','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ffccc0'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ffccc0'];?>
 class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=<?php echo $this->function_var($this->setup_args(['name'=>'menu_mode','this_tag'=>'var'],null,$this),$this)?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_41f453=null;$_3eeb2d_old_params['_41f453']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_41f453']=$_3eeb2d_local_vars;$a_41f453=$this->setup_args(['name'=>'menu_args','this_tag'=>'loop'],null,$this);$_41f453=-1;$r_41f453=true;while($r_41f453===true):$r_41f453=($_41f453!==-1)?false:true;echo $this->block_loop($a_41f453,$c_41f453,$this,$r_41f453,++$_41f453,'_41f453');ob_start();?>
<?php $c_41f453 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_41f453=false;}if($c_41f453 ):?>
&amp;<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
=<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$c_41f453=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_41f453'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_41f453'];?>
"><?php echo $this->function_var($this->setup_args(['name'=>'menu_label','this_tag'=>'var'],null,$this),$this)?>
</a>
          <?php $_3eeb2d_old_params['_42f979']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_42f979']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_42f979'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_42f979'];?>

        <?php endif;$c_3a56ce=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_3a56ce'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_3a56ce'];?>

        </ul>
        <div class="header-util">
          <a href="<?php $_3eeb2d_old_params['_c4e6ce']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_c4e6ce']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_cb66c8']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_cb66c8']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_url','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_cb66c8'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_cb66c8'];?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_c4e6ce'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_c4e6ce'];?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-external-link-square" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_3eeb2d_old_params['_334d5d']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_334d5d']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_3eeb2d_old_params['_12d207']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_12d207']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'var'],null,$this),$this)?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-globe" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_12d207'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_12d207'];?>

          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_334d5d'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_334d5d'];?>

        <?php $_3eeb2d_old_params['_50f873']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_50f873']=$_3eeb2d_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'can_rebuild','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

        <?php $c_22df6e=null;$_3eeb2d_old_params['_22df6e']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_22df6e']=$_3eeb2d_local_vars;$a_22df6e=$this->setup_args(['model'=>'urlmapping','count'=>'model','group'=>'\'workspace_id\',\'model\'','workspace_id'=>'$workspace_id','limit'=>'1','this_tag'=>'countgroupby'],null,$this);$_22df6e=-1;$r_22df6e=true;while($r_22df6e===true):$r_22df6e=($_22df6e!==-1)?false:true;echo $this->component('PTTags')->hdlr_countgroupby($a_22df6e,$c_22df6e,$this,$r_22df6e,++$_22df6e,'_22df6e');ob_start();?>
<?php $c_22df6e = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_22df6e=false;}if($c_22df6e ):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
" class="popup btn btn-sm btn-secondary my-2 my-sm-0 rebuild-popup" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-refresh" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$c_22df6e=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_22df6e'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_22df6e'];?>

        <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_50f873'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_50f873'];?>

        <?php $_3eeb2d_old_params['_a90ca8']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_a90ca8']=$_3eeb2d_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'edit','model'=>'workspace','id'=>'$workspace_id','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=workspace&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 config-workspace" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Settings','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-wrench" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpace Settings','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_a90ca8'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_a90ca8'];?>

        </div>
      </div>
    </nav>
      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_c17ed6'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_c17ed6'];?>

    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_fedd24'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_fedd24'];?>

<?php $_3eeb2d_old_params['_0092dd']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_0092dd']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  </div>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_0092dd'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_0092dd'];?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'can_action','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'disp_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_3eeb2d_old_params['_3b7f14']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_3b7f14']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'child_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_3eeb2d_old_params['_6c492e']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_6c492e']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_6c492e'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_6c492e'];?>

    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_3b7f14'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_3b7f14'];?>

    <?php $_3eeb2d_old_params['_b28e1c']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_b28e1c']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_b28e1c'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_b28e1c'];?>

    <?php $_3eeb2d_old_params['_b97014']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_b97014']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_3eeb2d_old_params['_4a9deb']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_4a9deb']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','ne'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_4a9deb'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_4a9deb'];?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'comment','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'attachmentfile','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'contact','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_b97014'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_b97014'];?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'output_container','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <div class="container-fluid">
    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_3eeb2d_old_params['_c1bc45']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_c1bc45']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_3eeb2d_old_params['_059959']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_059959']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_3eeb2d_old_params['_ff65ee']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ff65ee']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_3eeb2d_old_params['_6966d3']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_6966d3']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php $_3eeb2d_old_params['_dc27da']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_dc27da']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="single_select" value="1"><?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_dc27da'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_dc27da'];?>

            <?php $_3eeb2d_old_params['_30106b']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_30106b']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._from_scope','ne'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_from_scope" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_30106b'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_30106b'];?>

          <?php $_3eeb2d_old_params['_f80836']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_f80836']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_f80836'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_f80836'];?>

          <?php $_3eeb2d_old_params['_959140']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_959140']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="manage_revision" value="1">
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_959140'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_959140'];?>

          <?php $_3eeb2d_old_params['_2ac4ff']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_2ac4ff']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="dialog_view" value="1">
            <?php $_3eeb2d_old_params['_d757d3']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_d757d3']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_d757d3'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_d757d3'];?>

          <?php $_3eeb2d_old_params['_c84cea']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_c84cea']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_c84cea'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_c84cea'];?>

            <?php $_3eeb2d_old_params['_da72d7']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_da72d7']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
              <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_da72d7'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_da72d7'];?>

          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_2ac4ff'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_2ac4ff'];?>

          <?php $_3eeb2d_old_params['_fc76ed']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_fc76ed']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_select" value="1">
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_fc76ed'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_fc76ed'];?>

          <?php $_3eeb2d_old_params['_1d1f5c']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_1d1f5c']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="selected_ids" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="from_obj" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.from_obj','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php $_3eeb2d_old_params['_969d99']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_969d99']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="select_add" value="1">
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_969d99'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_969d99'];?>

          <?php $_3eeb2d_old_params['_cc6847']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_cc6847']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ids_only','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ids_only" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ids_only','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_cc6847'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_cc6847'];?>

          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_1d1f5c'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_1d1f5c'];?>

            <div class="modal-body">
              <div class="container-fluid">
                <?php $_3eeb2d_old_params['_e576ec']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_e576ec']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <?php $c_0b4ebf=null;$_3eeb2d_old_params['_0b4ebf']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_0b4ebf']=$_3eeb2d_local_vars;$a_0b4ebf=$this->setup_args(['name'=>'system_filters','this_tag'=>'loop'],null,$this);$_0b4ebf=-1;$r_0b4ebf=true;while($r_0b4ebf===true):$r_0b4ebf=($_0b4ebf!==-1)?false:true;echo $this->block_loop($a_0b4ebf,$c_0b4ebf,$this,$r_0b4ebf,++$_0b4ebf,'_0b4ebf');ob_start();?>
<?php $c_0b4ebf = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_0b4ebf=false;}if($c_0b4ebf ):?>

                      <?php $_3eeb2d_old_params['_fc9768']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_fc9768']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select_system_filters" id="select_system_filters">
                        <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_fc9768'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_fc9768'];?>

                        <option <?php $_3eeb2d_old_params['_121f83']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_121f83']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'input','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
data-input="1" data-hint="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'hint','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_121f83'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_121f83'];?>
data-option="<?php echo $this->function_var($this->setup_args(['name'=>'option','this_tag'=>'var'],null,$this),$this)?>
" <?php $_3eeb2d_old_params['_118595']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_118595']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_system_filter','eq'=>'$name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_118595'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_118595'];?>
 value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php $_3eeb2d_old_params['_7aba8d']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_7aba8d']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        </select>
                      <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="system_filter-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_7aba8d'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_7aba8d'];?>

                    <?php endif;$c_0b4ebf=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_0b4ebf'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_0b4ebf'];?>

                  </div>
                </div>
                <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_e576ec'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_e576ec'];?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Your Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select-user_filters" id="select-user_filters">
                      <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php $c_5e4c63=null;$_3eeb2d_old_params['_5e4c63']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_5e4c63']=$_3eeb2d_local_vars;$a_5e4c63=$this->setup_args(['model'=>'option','kind'=>'list_filter','key'=>'$model','user_id'=>'$user_id','workspace_id'=>'$workspace_id','this_tag'=>'objectloop'],null,$this);$_5e4c63=-1;$r_5e4c63=true;while($r_5e4c63===true):$r_5e4c63=($_5e4c63!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_5e4c63,$c_5e4c63,$this,$r_5e4c63,++$_5e4c63,'_5e4c63');ob_start();?>
<?php $c_5e4c63 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_5e4c63=false;}if($c_5e4c63 ):?>

                      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_3eeb2d_old_params['_d14d99']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_d14d99']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_filter_id','eq'=>'$id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_d14d99'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_d14d99'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'value','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php endif;$c_5e4c63=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_5e4c63'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_5e4c63'];?>

                      <option value="add_new_filter"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Add New Filter','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    </select>
                    <?php $_3eeb2d_old_params['_a7b528']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_a7b528']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="filter-select-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <button type="button" class="delete-filter-elem hidden delete-bun-sm btn btn-secondary btn-sm filter-selecter-ctrl" id="filter-select-delete-button" class="close" data-dismiss="modal">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Delete','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    </button>
                    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_a7b528'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_a7b528'];?>

                  </div>
                </div>
                <div class="row form-group new-filter-elem hidden">
                  <div class="col-md-3" style="float:left;"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" name="filters-selector" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" id="filters-selector">
                    <?php $c_96a902=null;$_3eeb2d_old_params['_96a902']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_96a902']=$_3eeb2d_local_vars;$a_96a902=$this->setup_args(['name'=>'filter_options','this_tag'=>'loop'],null,$this);$_96a902=-1;$r_96a902=true;while($r_96a902===true):$r_96a902=($_96a902!==-1)?false:true;echo $this->block_loop($a_96a902,$c_96a902,$this,$r_96a902,++$_96a902,'_96a902');ob_start();?>
<?php $c_96a902 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_96a902=false;}if($c_96a902 ):?>

                    <?php $_3eeb2d_old_params['_f07bd3']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_f07bd3']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <option><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_f07bd3'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_f07bd3'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" class="coltype_<?php $_3eeb2d_old_params['_de5f45']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_de5f45']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'created_by','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
reference<?php else:?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_de5f45'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_de5f45'];?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php endif;$c_96a902=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_96a902'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_96a902'];?>

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

                              <input type="datetime-local" step="<?php $_3eeb2d_old_params['_577f7b']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_577f7b']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'time_step','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'time_step','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
1<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_577f7b'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_577f7b'];?>
" class="form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="" value="<?php $_3eeb2d_old_params['_3bc8f4']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_3bc8f4']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'published_on_default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_format_ts($this->function_date($this->setup_args(['format'=>'$published_on_default','format_ts'=>'Y-m-d\\TH:i:s','this_tag'=>'date'],null,$this),$this),$this->setup_args('Y-m-d\\\\TH:i:s','format_ts',$this),$this,'format_ts')?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_3bc8f4'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_3bc8f4'];?>
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

                            <?php $_3eeb2d_old_params['_1d3bed']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_1d3bed']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'status_options','split'=>',','setvar'=>'status_label','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                            <?php else:?>

                              <?php $_3eeb2d_old_params['_458f25']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_458f25']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Draft,Review,Approval Pending,Reserved,Publish,Ended','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php else:?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Disable,Enable','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_458f25'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_458f25'];?>

                            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_1d3bed'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_1d3bed'];?>

                            <select class="form-control form-control-sm custom-select short filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <?php $_3eeb2d_old_params['_fd7ef3']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_fd7ef3']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                            <?php $c_9dc052=null;$_3eeb2d_old_params['_9dc052']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_9dc052']=$_3eeb2d_local_vars;$a_9dc052=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_9dc052=-1;$r_9dc052=true;while($r_9dc052===true):$r_9dc052=($_9dc052!==-1)?false:true;echo $this->block_loop($a_9dc052,$c_9dc052,$this,$r_9dc052,++$_9dc052,'_9dc052');ob_start();?>
<?php $c_9dc052 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_9dc052=false;}if($c_9dc052 ):?>

                              <?php $_3eeb2d_old_params['_0a4c49']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_0a4c49']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__index__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php $_3eeb2d_old_params['_80f874']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_80f874']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__index__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_80f874'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_80f874'];?>

                              <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_0a4c49'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_0a4c49'];?>

                            <?php endif;$c_9dc052=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_9dc052'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_9dc052'];?>

                            <?php else:?>

                            <?php $c_471575=null;$_3eeb2d_old_params['_471575']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_471575']=$_3eeb2d_local_vars;$a_471575=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_471575=-1;$r_471575=true;while($r_471575===true):$r_471575=($_471575!==-1)?false:true;echo $this->block_loop($a_471575,$c_471575,$this,$r_471575,++$_471575,'_471575');ob_start();?>
<?php $c_471575 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_471575=false;}if($c_471575 ):?>

                              <?php $_3eeb2d_old_params['_b17cd5']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_b17cd5']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_b17cd5'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_b17cd5'];?>

                            <?php endif;$c_471575=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_471575'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_471575'];?>

                            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_fd7ef3'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_fd7ef3'];?>

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
            <?php $_3eeb2d_old_params['_14c376']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_14c376']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            loc += '&workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_14c376'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_14c376'];?>

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
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_6966d3'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_6966d3'];?>

          <?php $_3eeb2d_old_params['_9171d6']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_9171d6']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php ob_start();$_3eeb2d_old_params['_1ef122']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_1ef122']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
      <?php $_3eeb2d_old_params['_4ca74a']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_4ca74a']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_4ca74a'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_4ca74a'];?>

      <?php $_3eeb2d_old_params['_deb1b5']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_deb1b5']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_select" value="1">
      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_deb1b5'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_deb1b5'];?>

      <?php $_3eeb2d_old_params['_769050']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_769050']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="dialog_view" value="1">
        <?php $_3eeb2d_old_params['_32e7ca']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_32e7ca']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_32e7ca'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_32e7ca'];?>

          <?php $_3eeb2d_old_params['_0f8647']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_0f8647']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="single_select" value="1">
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_0f8647'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_0f8647'];?>

        <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php $_3eeb2d_old_params['_e3cdf5']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_e3cdf5']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_e3cdf5'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_e3cdf5'];?>

      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_769050'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_769050'];?>

        <input type="hidden" name="return_args" value="<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'selected_ids_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
">
        <div class="modal-body">
          <div class="container-fluid">
          <?php $_3eeb2d_old_params['_aa0368']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_aa0368']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_3eeb2d_old_params['_f5f397']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_f5f397']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <?php $c_0c5320=null;$_3eeb2d_old_params['_0c5320']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_0c5320']=$_3eeb2d_local_vars;$a_0c5320=$this->setup_args(['name'=>'disp_options','this_tag'=>'loop'],null,$this);$_0c5320=-1;$r_0c5320=true;while($r_0c5320===true):$r_0c5320=($_0c5320!==-1)?false:true;echo $this->block_loop($a_0c5320,$c_0c5320,$this,$r_0c5320,++$_0c5320,'_0c5320');ob_start();?>
<?php $c_0c5320 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_0c5320=false;}if($c_0c5320 ):?>

            <?php $_3eeb2d_old_params['_084036']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_084036']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_084036'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_084036'];?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_3eeb2d_old_params['_2fc535']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_2fc535']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php $_3eeb2d_old_params['_6c45d7']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_6c45d7']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__key__','eq'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_6c45d7'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_6c45d7'];?>

                <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_2fc535'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_2fc535'];?>

                <?php $_3eeb2d_old_params['_bc3388']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_bc3388']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__display','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[2]','setvar'=>'_type','this_tag'=>'var'],null,$this),$this),$this->setup_args('_type','setvar',$this),$this,'setvar')?>

                <label class="custom-control custom-checkbox 
                <?php $_3eeb2d_old_params['_f1d480']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_f1d480']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_4e9360']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_4e9360']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_checked','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_4e9360'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_4e9360'];?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_f1d480'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_f1d480'];?>

                <?php $_3eeb2d_old_params['_efd5e8']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_efd5e8']=$_3eeb2d_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_list_options','value'=>'$__key__','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_efd5e8'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_efd5e8'];?>
">
                  <?php $_3eeb2d_old_params['_244d37']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_244d37']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1"><?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_244d37'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_244d37'];?>

                  <input <?php $_3eeb2d_old_params['_1e21e0']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_1e21e0']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_1e21e0'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_1e21e0'];?>
 <?php $_3eeb2d_old_params['_6c2989']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_6c2989']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_6c2989'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_6c2989'];?>
<?php $_3eeb2d_old_params['_a10f0e']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_a10f0e']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_a10f0e'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_a10f0e'];?>
<?php $_3eeb2d_old_params['_5f0362']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_5f0362']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_no_primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_2e70dd']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_2e70dd']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_2e70dd'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_2e70dd'];?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_5f0362'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_5f0362'];?>
<?php $_3eeb2d_old_params['_ad2b84']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ad2b84']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ad2b84'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ad2b84'];?>
 type="checkbox" class="custom-control-input disp-option-item" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_3eeb2d_old_params['_f7d33b']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_f7d33b']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_f7d33b'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_f7d33b'];?>
"></span>
                  <span class="custom-control-description"> <?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                </label>
                <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_bc3388'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_bc3388'];?>

            <?php $_3eeb2d_old_params['_7d7ff4']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_7d7ff4']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
            </div>
            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_7d7ff4'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_7d7ff4'];?>

            <?php endif;$c_0c5320=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_0c5320'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_0c5320'];?>

          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_f5f397'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_f5f397'];?>

          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_aa0368'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_aa0368'];?>

            <div class="row form-group">
              <div class="col-md-2"><label for="_per_page"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Paging','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <input id="_per_page" step="1" list="per_page_complete" type="number" min="1" max="5000" class="form-control form-control-sm very-short control-inline" name="_per_page" value="<?php echo $this->function_var($this->setup_args(['name'=>'_per_page','this_tag'=>'var'],null,$this),$this)?>
">
                <?php echo $this->function_trans($this->setup_args(['phrase'=>'Items per Page','this_tag'=>'trans'],null,$this),$this)?>

              </div>
            </div>
            <?php $_3eeb2d_old_params['_1df4e8']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_1df4e8']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'search_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <?php $c_248d8b=null;$_3eeb2d_old_params['_248d8b']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_248d8b']=$_3eeb2d_local_vars;$a_248d8b=$this->setup_args(['name'=>'search_options','this_tag'=>'loop'],null,$this);$_248d8b=-1;$r_248d8b=true;while($r_248d8b===true):$r_248d8b=($_248d8b!==-1)?false:true;echo $this->block_loop($a_248d8b,$c_248d8b,$this,$r_248d8b,++$_248d8b,'_248d8b');ob_start();?>
<?php $c_248d8b = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_248d8b=false;}if($c_248d8b ):?>

                  <label class="custom-control custom-checkbox">
                    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                    <input<?php $_3eeb2d_old_params['_dd511e']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_dd511e']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_dd511e'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_dd511e'];?>
 type="checkbox" class="custom-control-input" name="_s_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"> <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[0]','setvar'=>'search_col','this_tag'=>'var'],null,$this),$this),$this->setup_args('search_col','setvar',$this),$this,'setvar')?>
<?php echo $this->function_trans($this->setup_args(['phrase'=>'$search_col','this_tag'=>'trans'],null,$this),$this)?>
</span>
                  </label>
                <?php endif;$c_248d8b=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_248d8b'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_248d8b'];?>

              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search Type','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-5">
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_3eeb2d_old_params['_baacc4']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_baacc4']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_search_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_baacc4'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_baacc4'];?>
<?php $_3eeb2d_old_params['_1f5d56']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_1f5d56']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_1f5d56'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_1f5d56'];?>
 name="_user_search_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Phrase','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_3eeb2d_old_params['_7fa8af']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_7fa8af']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_7fa8af'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_7fa8af'];?>
 name="_user_search_type" value="2">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'OR','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_3eeb2d_old_params['_d579e5']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_d579e5']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_d579e5'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_d579e5'];?>
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
                  <input type="checkbox" <?php $_3eeb2d_old_params['_692f88']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_692f88']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_user_keep_search','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_692f88'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_692f88'];?>
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
                  <input class="custom-control-input" type="radio" <?php $_3eeb2d_old_params['_5cd030']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_5cd030']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_replace_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_5cd030'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_5cd030'];?>
 name="_user_replace_type" value="0">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Insensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_3eeb2d_old_params['_fa18e1']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_fa18e1']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_replace_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_fa18e1'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_fa18e1'];?>
 name="_user_replace_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Sensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
            </div>
            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_1df4e8'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_1df4e8'];?>

            <div class="row form-group">
              <?php $c_d261f6=null;$_3eeb2d_old_params['_d261f6']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_d261f6']=$_3eeb2d_local_vars;$a_d261f6=$this->setup_args(['name'=>'sort_options','this_tag'=>'loop'],null,$this);$_d261f6=-1;$r_d261f6=true;while($r_d261f6===true):$r_d261f6=($_d261f6!==-1)?false:true;echo $this->block_loop($a_d261f6,$c_d261f6,$this,$r_d261f6,++$_d261f6,'_d261f6');ob_start();?>
<?php $c_d261f6 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_d261f6=false;}if($c_d261f6 ):?>

              <?php $_3eeb2d_old_params['_da92f1']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_da92f1']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Sort','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-7">
              <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_da92f1'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_da92f1'];?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <label class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" <?php $_3eeb2d_old_params['_6f1490']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_6f1490']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_6f1490'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_6f1490'];?>
 name="_user_sort_by" value="<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                  </label>
              <?php $_3eeb2d_old_params['_4cdb94']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_4cdb94']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
              <div class="col-md-3">
                <select name="_user_sort_order" class="form-control custom-select">
                  <?php $c_bf4339=null;$_3eeb2d_old_params['_bf4339']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_bf4339']=$_3eeb2d_local_vars;$a_bf4339=$this->setup_args(['name'=>'order_options','this_tag'=>'loop'],null,$this);$_bf4339=-1;$r_bf4339=true;while($r_bf4339===true):$r_bf4339=($_bf4339!==-1)?false:true;echo $this->block_loop($a_bf4339,$c_bf4339,$this,$r_bf4339,++$_bf4339,'_bf4339');ob_start();?>
<?php $c_bf4339 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_bf4339=false;}if($c_bf4339 ):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"<?php $_3eeb2d_old_params['_1ceba7']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_1ceba7']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 selected<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_1ceba7'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_1ceba7'];?>
><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</option>
                  <?php endif;$c_bf4339=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_bf4339'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_bf4339'];?>

                </select>
              </div>
              <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_4cdb94'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_4cdb94'];?>

              <?php endif;$c_d261f6=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_d261f6'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_d261f6'];?>

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

<?php $_3eeb2d_old_params['_94edb8']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_94edb8']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'dialog_max_cols','setvar'=>'_list_max_cols','this_tag'=>'property'],null,$this),$this),$this->setup_args('_list_max_cols','setvar',$this),$this,'setvar')?>

<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_94edb8'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_94edb8'];?>

<?php $_3eeb2d_old_params['_1707f7']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_1707f7']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_list_max_cols','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
      <?php $_3eeb2d_old_params['_59f57a']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_59f57a']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the dialog.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php else:?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the display.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_59f57a'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_59f57a'];?>

    }
});
</script>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_1707f7'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_1707f7'];?>

<?php endif;$_1ef122=ob_get_clean();echo $this->modifier_trim_space($_1ef122,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_3eeb2d_local_params=$_3eeb2d_old_params['_1ef122'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_1ef122'];?>

            <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_9171d6'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_9171d6'];?>

            <?php $_3eeb2d_old_params['_ddea72']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ddea72']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
              <?php $_3eeb2d_old_params['_66c640']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_66c640']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
              <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_66c640'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_66c640'];?>

                <div class="form-inline" style="margin: 10px 7px">
                  <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload Path','this_tag'=>'trans'],null,$this),$this)?>

                  <?php $_3eeb2d_old_params['_ff27ff']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ff27ff']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model_out_path','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->modifier_add_slash(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model_out_path','escape'=>'','add_slash'=>'','setvar'=>'model_out_path','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('','add_slash',$this),$this,'add_slash'),$this->setup_args('model_out_path','setvar',$this),$this,'setvar')?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'extra_path','value'=>'$model_out_path','append'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ff27ff'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ff27ff'];?>

                  <input id="extra_path" type="text" style="width:200px;" class="form-control" name="extra_path" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'extra_path','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                  <?php echo $this->function_setvar($this->setup_args(['name'=>'upload_paths','value'=>'$extra_path','function'=>'unshift','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php echo $this->modifier_setvar($this->modifier_array_unique($this->function_var($this->setup_args(['name'=>'upload_paths','array_unique'=>'','setvar'=>'upload_paths','this_tag'=>'var'],null,$this),$this),$this->setup_args('','array_unique',$this),$this,'array_unique'),$this->setup_args('upload_paths','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_count($this->setup_args(['name'=>'$upload_paths','setvar'=>'path_cnt','this_tag'=>'count'],null,$this),$this),$this->setup_args('path_cnt','setvar',$this),$this,'setvar')?>

                <?php $_3eeb2d_old_params['_41d66e']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_41d66e']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'path_cnt','gt'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <div id="upload_paths-box">
                  <?php $c_8c00bc=null;$_3eeb2d_old_params['_8c00bc']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_8c00bc']=$_3eeb2d_local_vars;$a_8c00bc=$this->setup_args(['name'=>'upload_paths','this_tag'=>'loop'],null,$this);$_8c00bc=-1;$r_8c00bc=true;while($r_8c00bc===true):$r_8c00bc=($_8c00bc!==-1)?false:true;echo $this->block_loop($a_8c00bc,$c_8c00bc,$this,$r_8c00bc,++$_8c00bc,'_8c00bc');ob_start();?>
<?php $c_8c00bc = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_8c00bc=false;}if($c_8c00bc ):?>

                    <?php $_3eeb2d_old_params['_4e7fc0']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_4e7fc0']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button class="btn ml-3 btn-secondary" id="toggle-upload_path"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <span class="hidden" id="upload_path-wrapper">
                    <select class="form-control custom-select short" name="upload_path" id="upload_path"><?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_4e7fc0'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_4e7fc0'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_3eeb2d_old_params['_3740ce']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_3740ce']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'extra_path','eq'=>'$__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_3740ce'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_3740ce'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php $_3eeb2d_old_params['_183696']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_183696']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</select>
                    <button class="btn ml-0 btn-secondary btn-sm" id="clear-upload_path">  <i class="fa fa-trash" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Clear','this_tag'=>'trans'],null,$this),$this)?>
</span></button>
                    </span>
                  </div>
                    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_183696'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_183696'];?>

                  <?php endif;$c_8c00bc=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_8c00bc'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_8c00bc'];?>

                <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_41d66e'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_41d66e'];?>

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

<?php $_3eeb2d_old_params['_69d250']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_69d250']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&filter_params=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&filter_params=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&magic_token=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&magic_token=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&query=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&query=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_69d250'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_69d250'];?>

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
?<?php $_3eeb2d_old_params['_5ecbec']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_5ecbec']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_5ecbec'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_5ecbec'];?>
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
$('#drop-zone').css('border','3px dashed <?php $_3eeb2d_old_params['_6281ab']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_6281ab']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
#ccc<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_6281ab'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_6281ab'];?>
');
$('#drop-zone').css('margin','1px');
$('#drop-zone').css('padding','8px');
$(function () {
    'use strict';
    var url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=upload_multi&magic_token=<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&model=asset&name=file<?php $_3eeb2d_old_params['_20a2fd']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_20a2fd']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','eq'=>'filter_class_image','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&select_system_filters=filter_class_image<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_20a2fd'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_20a2fd'];?>
';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        dropZone: $("#drop-zone"),
        // formData: {extra_path: $('#extra_path').val()},
        add: function (e, data) {
            data.formData = {extra_path: $('#extra_path').val()<?php $_3eeb2d_old_params['_66b999']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_66b999']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
, overwrite: $('#asset_overwrite').val()<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_66b999'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_66b999'];?>
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
    <?php $_3eeb2d_old_params['_327b34']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_327b34']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    $("#__mode").prop('value', 'insert_asset');
    $("#list-select-form").submit();
    <?php else:?>

    submit_params_to_post( this_url );
    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_327b34'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_327b34'];?>

}
</script>
            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ddea72'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ddea72'];?>

        <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ff65ee'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ff65ee'];?>

        <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

          <?php $_3eeb2d_old_params['_5a532b']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_5a532b']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php ob_start();$_3eeb2d_old_params['_7c672e']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_7c672e']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
        <?php $_3eeb2d_old_params['_2125e3']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_2125e3']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
        <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_2125e3'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_2125e3'];?>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10" id="edit_options_loop">
              <span id="_start_options"></span>
          <?php $_3eeb2d_old_params['_8cf7c5']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_8cf7c5']=$_3eeb2d_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

            <?php $c_f233f0=null;$_3eeb2d_old_params['_f233f0']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_f233f0']=$_3eeb2d_local_vars;$a_f233f0=$this->setup_args(['type'=>'edit','option'=>'1','this_tag'=>'objectcols'],null,$this);$_f233f0=-1;$r_f233f0=true;while($r_f233f0===true):$r_f233f0=($_f233f0!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_f233f0,$c_f233f0,$this,$r_f233f0,++$_f233f0,'_f233f0');ob_start();?>
<?php $c_f233f0 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_f233f0=false;}if($c_f233f0 ):?>

              <?php $_3eeb2d_old_params['_48ebac']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_48ebac']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','ne'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_3eeb2d_old_params['_4cabce']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_4cabce']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'hidden','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_3eeb2d_old_params['_d54f1c']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_d54f1c']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'allow_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'accept_comment','setvar'=>'accept_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

                    <?php $_3eeb2d_old_params['_720702']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_720702']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <?php $_3eeb2d_old_params['_9b7fe6']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_9b7fe6']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_9b7fe6'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_9b7fe6'];?>

                    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_720702'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_720702'];?>

                  <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_d54f1c'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_d54f1c'];?>

                <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_4cabce'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_4cabce'];?>

                <?php $_3eeb2d_old_params['_18ca1a']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_18ca1a']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_3eeb2d_old_params['_fb7f01']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_fb7f01']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_fb7f01'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_fb7f01'];?>

                  <?php $_3eeb2d_old_params['_85c879']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_85c879']=$_3eeb2d_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_85c879'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_85c879'];?>

                  <label class="edit-options-child <?php $_3eeb2d_old_params['_bf478b']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_bf478b']=$_3eeb2d_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_bf478b'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_bf478b'];?>
custom-control custom-checkbox" id="label-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                    <?php $_3eeb2d_old_params['_6f9792']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_6f9792']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <input type="hidden" id="" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_6f9792'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_6f9792'];?>

                    <input<?php $_3eeb2d_old_params['_97db00']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_97db00']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php else:?>
<?php $_3eeb2d_old_params['_f885ad']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_f885ad']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 onclick="return false;" checked <?php else:?>

                    <?php $_3eeb2d_old_params['_d868df']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_d868df']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_d868df'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_d868df'];?>

                    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_f885ad'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_f885ad'];?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_97db00'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_97db00'];?>
<?php $_3eeb2d_old_params['_7633fb']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_7633fb']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_7633fb'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_7633fb'];?>
 type="<?php $_3eeb2d_old_params['_6ad9e4']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_6ad9e4']=$_3eeb2d_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
checkbox<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_6ad9e4'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_6ad9e4'];?>
" class="custom-control-input disp_option disp_option-cb" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator<?php $_3eeb2d_old_params['_556e5e']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_556e5e']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_556e5e'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_556e5e'];?>
<?php $_3eeb2d_old_params['_582385']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_582385']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_582385'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_582385'];?>
"></span>
                    <span class="custom-control-description"> 
                    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
                  </label>
                <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_18ca1a'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_18ca1a'];?>

              <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_48ebac'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_48ebac'];?>

            <?php endif;$c_f233f0=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_f233f0'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_f233f0'];?>

          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_8cf7c5'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_8cf7c5'];?>

                <?php $c_7a4152=null;$_3eeb2d_old_params['_7a4152']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_7a4152']=$_3eeb2d_local_vars;$a_7a4152=$this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$model','id'=>'$object_id','this_tag'=>'fieldloop'],null,$this);$_7a4152=-1;$r_7a4152=true;while($r_7a4152===true):$r_7a4152=($_7a4152!==-1)?false:true;echo $this->component('PTTags')->hdlr_fieldloop($a_7a4152,$c_7a4152,$this,$r_7a4152,++$_7a4152,'_7a4152');ob_start();?>
<?php $c_7a4152 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_7a4152=false;}if($c_7a4152 ):?>

                <?php $c_e64b77=null;$_3eeb2d_old_params['_e64b77']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_e64b77']=$_3eeb2d_local_vars;$a_e64b77=$this->setup_args(['name'=>'_fieldbasename','this_tag'=>'setvarblock'],null,$this);ob_start();?>
field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_e64b77=ob_get_clean();$c_e64b77=$this->block_setvarblock($a_e64b77,$c_e64b77,$this,$r_e64b77,1,'_e64b77');echo($c_e64b77); $_3eeb2d_local_params=$_3eeb2d_old_params['_e64b77'];?>

                <label class="<?php $_3eeb2d_old_params['_ccccee']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ccccee']=$_3eeb2d_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ccccee'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ccccee'];?>
custom-control custom-checkbox" id="label-<?php echo $this->function_var($this->setup_args(['name'=>'_fieldbasename','this_tag'=>'var'],null,$this),$this)?>
">
                  <input<?php $_3eeb2d_old_params['_33a8b2']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_33a8b2']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_33a8b2'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_33a8b2'];?>

                  <?php $_3eeb2d_old_params['_b4ab6c']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_b4ab6c']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_b4ab6c'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_b4ab6c'];?>

                  <?php $_3eeb2d_old_params['_5ee7b7']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_5ee7b7']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_5ee7b7'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_5ee7b7'];?>
 <?php $_3eeb2d_old_params['_29a92f']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_29a92f']=$_3eeb2d_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_29a92f'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_29a92f'];?>
 type="checkbox" class="custom-control-input disp_option disp_option-cb" id="field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_3eeb2d_old_params['_bb4f19']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_bb4f19']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_bb4f19'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_bb4f19'];?>
"></span>
                  <span class="custom-control-description"> 
                  <?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'field__name','trans'=>'1','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans'),ENT_QUOTES)?>
</span>
                </label>
                <?php endif;$c_7a4152=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_7a4152'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_7a4152'];?>

              <?php $_3eeb2d_old_params['_e1128f']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_e1128f']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div>
                  <p class="text-muted hint-block">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can change the display order of fields with drag &amp; drop.','this_tag'=>'trans'],null,$this),$this)?>

                  </p>
                </div>
              <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_e1128f'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_e1128f'];?>

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
<?php endif;$_7c672e=ob_get_clean();echo $this->modifier_trim_space($_7c672e,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_3eeb2d_local_params=$_3eeb2d_old_params['_7c672e'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_7c672e'];?>

<script>
<?php $_3eeb2d_old_params['_19bac7']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_19bac7']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#edit_options_loop').sortable({
    stop: function( evt, ui ) {
        sort_fields();
    }
});
$("#edit_options_loop").ksortable();
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_19bac7'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_19bac7'];?>

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

<?php $_3eeb2d_old_params['_d5512d']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_d5512d']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_d5512d'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_d5512d'];?>

    }
    updateFieldSelector();
});
</script>
            <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_5a532b'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_5a532b'];?>

        <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_059959'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_059959'];?>

    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_c1bc45'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_c1bc45'];?>

    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_3b108a'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_3b108a'];?>

  <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_5d4086'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_5d4086'];?>

  <?php $_3eeb2d_old_params['_f78cfa']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_f78cfa']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'save','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    
    <?php $_3eeb2d_old_params['_209fe1']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_209fe1']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php ob_start();$_3eeb2d_old_params['_f35928']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_f35928']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
        <?php $_3eeb2d_old_params['_077639']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_077639']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
        <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_077639'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_077639'];?>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10" id="edit_options_loop">
              <span id="_start_options"></span>
          <?php $_3eeb2d_old_params['_18148f']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_18148f']=$_3eeb2d_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

            <?php $c_260dd7=null;$_3eeb2d_old_params['_260dd7']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_260dd7']=$_3eeb2d_local_vars;$a_260dd7=$this->setup_args(['type'=>'edit','option'=>'1','this_tag'=>'objectcols'],null,$this);$_260dd7=-1;$r_260dd7=true;while($r_260dd7===true):$r_260dd7=($_260dd7!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_260dd7,$c_260dd7,$this,$r_260dd7,++$_260dd7,'_260dd7');ob_start();?>
<?php $c_260dd7 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_260dd7=false;}if($c_260dd7 ):?>

              <?php $_3eeb2d_old_params['_3429e0']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_3429e0']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','ne'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_3eeb2d_old_params['_141919']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_141919']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'hidden','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_3eeb2d_old_params['_72602c']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_72602c']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'allow_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'accept_comment','setvar'=>'accept_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

                    <?php $_3eeb2d_old_params['_25fc7b']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_25fc7b']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <?php $_3eeb2d_old_params['_e801ad']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_e801ad']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_e801ad'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_e801ad'];?>

                    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_25fc7b'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_25fc7b'];?>

                  <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_72602c'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_72602c'];?>

                <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_141919'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_141919'];?>

                <?php $_3eeb2d_old_params['_36b61a']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_36b61a']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_3eeb2d_old_params['_233609']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_233609']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_233609'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_233609'];?>

                  <?php $_3eeb2d_old_params['_caaf38']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_caaf38']=$_3eeb2d_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_caaf38'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_caaf38'];?>

                  <label class="edit-options-child <?php $_3eeb2d_old_params['_2ae8a7']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_2ae8a7']=$_3eeb2d_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_2ae8a7'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_2ae8a7'];?>
custom-control custom-checkbox" id="label-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                    <?php $_3eeb2d_old_params['_46850c']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_46850c']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <input type="hidden" id="" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_46850c'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_46850c'];?>

                    <input<?php $_3eeb2d_old_params['_2e8d23']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_2e8d23']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php else:?>
<?php $_3eeb2d_old_params['_f7c510']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_f7c510']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 onclick="return false;" checked <?php else:?>

                    <?php $_3eeb2d_old_params['_615485']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_615485']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_615485'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_615485'];?>

                    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_f7c510'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_f7c510'];?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_2e8d23'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_2e8d23'];?>
<?php $_3eeb2d_old_params['_08668c']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_08668c']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_08668c'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_08668c'];?>
 type="<?php $_3eeb2d_old_params['_a13fc7']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_a13fc7']=$_3eeb2d_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
checkbox<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_a13fc7'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_a13fc7'];?>
" class="custom-control-input disp_option disp_option-cb" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator<?php $_3eeb2d_old_params['_ca845b']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ca845b']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ca845b'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ca845b'];?>
<?php $_3eeb2d_old_params['_b5c506']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_b5c506']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_b5c506'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_b5c506'];?>
"></span>
                    <span class="custom-control-description"> 
                    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
                  </label>
                <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_36b61a'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_36b61a'];?>

              <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_3429e0'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_3429e0'];?>

            <?php endif;$c_260dd7=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_260dd7'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_260dd7'];?>

          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_18148f'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_18148f'];?>

                <?php $c_e0d4c3=null;$_3eeb2d_old_params['_e0d4c3']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_e0d4c3']=$_3eeb2d_local_vars;$a_e0d4c3=$this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$model','id'=>'$object_id','this_tag'=>'fieldloop'],null,$this);$_e0d4c3=-1;$r_e0d4c3=true;while($r_e0d4c3===true):$r_e0d4c3=($_e0d4c3!==-1)?false:true;echo $this->component('PTTags')->hdlr_fieldloop($a_e0d4c3,$c_e0d4c3,$this,$r_e0d4c3,++$_e0d4c3,'_e0d4c3');ob_start();?>
<?php $c_e0d4c3 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_e0d4c3=false;}if($c_e0d4c3 ):?>

                <?php $c_25dfb6=null;$_3eeb2d_old_params['_25dfb6']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_25dfb6']=$_3eeb2d_local_vars;$a_25dfb6=$this->setup_args(['name'=>'_fieldbasename','this_tag'=>'setvarblock'],null,$this);ob_start();?>
field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_25dfb6=ob_get_clean();$c_25dfb6=$this->block_setvarblock($a_25dfb6,$c_25dfb6,$this,$r_25dfb6,1,'_25dfb6');echo($c_25dfb6); $_3eeb2d_local_params=$_3eeb2d_old_params['_25dfb6'];?>

                <label class="<?php $_3eeb2d_old_params['_a75511']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_a75511']=$_3eeb2d_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_a75511'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_a75511'];?>
custom-control custom-checkbox" id="label-<?php echo $this->function_var($this->setup_args(['name'=>'_fieldbasename','this_tag'=>'var'],null,$this),$this)?>
">
                  <input<?php $_3eeb2d_old_params['_e78831']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_e78831']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_e78831'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_e78831'];?>

                  <?php $_3eeb2d_old_params['_a2b699']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_a2b699']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_a2b699'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_a2b699'];?>

                  <?php $_3eeb2d_old_params['_62f878']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_62f878']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_62f878'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_62f878'];?>
 <?php $_3eeb2d_old_params['_55edb5']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_55edb5']=$_3eeb2d_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_55edb5'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_55edb5'];?>
 type="checkbox" class="custom-control-input disp_option disp_option-cb" id="field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_3eeb2d_old_params['_905aa7']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_905aa7']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_905aa7'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_905aa7'];?>
"></span>
                  <span class="custom-control-description"> 
                  <?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'field__name','trans'=>'1','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans'),ENT_QUOTES)?>
</span>
                </label>
                <?php endif;$c_e0d4c3=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_e0d4c3'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_e0d4c3'];?>

              <?php $_3eeb2d_old_params['_b65e44']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_b65e44']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div>
                  <p class="text-muted hint-block">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can change the display order of fields with drag &amp; drop.','this_tag'=>'trans'],null,$this),$this)?>

                  </p>
                </div>
              <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_b65e44'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_b65e44'];?>

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
<?php endif;$_f35928=ob_get_clean();echo $this->modifier_trim_space($_f35928,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_3eeb2d_local_params=$_3eeb2d_old_params['_f35928'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_f35928'];?>

<script>
<?php $_3eeb2d_old_params['_b3811c']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_b3811c']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#edit_options_loop').sortable({
    stop: function( evt, ui ) {
        sort_fields();
    }
});
$("#edit_options_loop").ksortable();
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_b3811c'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_b3811c'];?>

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

<?php $_3eeb2d_old_params['_00c350']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_00c350']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_00c350'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_00c350'];?>

    }
    updateFieldSelector();
});
</script>
      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_209fe1'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_209fe1'];?>

  <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_f78cfa'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_f78cfa'];?>

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
<?php $_3eeb2d_old_params['_996ab0']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_996ab0']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'output_container','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <div class="container-fluid">
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_996ab0'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_996ab0'];?>

      <div class="row">
        <main class="col-md-12 pt-3">
          <h1 id="page-title" <?php $_3eeb2d_old_params['_bbbf5b']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_bbbf5b']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_0e9eb5']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_0e9eb5']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_39a551']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_39a551']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-top:-33px"<?php else:?>
style="margin-top:-36px"<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_39a551'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_39a551'];?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_0e9eb5'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_0e9eb5'];?>
 class="title-with-opt"<?php else:?>
 <?php $_3eeb2d_old_params['_c164b7']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_c164b7']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_a00e38']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_a00e38']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
style="margin-top:-3px"<?php else:?>
style="margin-top:-11px"<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_a00e38'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_a00e38'];?>
<?php else:?>
style="margin-top:-10px"<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_c164b7'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_c164b7'];?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_bbbf5b'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_bbbf5b'];?>
>
          <span class="title">
          <?php $_3eeb2d_old_params['_fd177d']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_fd177d']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_2d4a59']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_2d4a59']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php $_3eeb2d_old_params['_142f24']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_142f24']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;manage_revision=1<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.revision_select','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&amp;manage_revision=1<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_142f24'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_142f24'];?>
"><?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_2d4a59'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_2d4a59'];?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_fd177d'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_fd177d'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'page_title','this_tag'=>'var'],null,$this),$this)?>
<?php $_3eeb2d_old_params['_ef0600']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ef0600']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_c5baf3']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_c5baf3']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</a><?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_c5baf3'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_c5baf3'];?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ef0600'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ef0600'];?>

          </span>
          <?php echo $this->function_var($this->setup_args(['name'=>'add_heading','this_tag'=>'var'],null,$this),$this)?>

      <?php $_3eeb2d_old_params['_342b8e']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_342b8e']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php $_3eeb2d_old_params['_51319f']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_51319f']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_3eeb2d_old_params['_87068c']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_87068c']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_3eeb2d_old_params['_1860a6']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_1860a6']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'dashboard','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_3eeb2d_old_params['_d11e6e']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_d11e6e']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'error','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_3eeb2d_old_params['_e79bb5']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_e79bb5']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#filterOptions">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Filters','this_tag'=>'trans'],null,$this),$this)?>

          </button>
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_e79bb5'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_e79bb5'];?>

          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_d11e6e'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_d11e6e'];?>

          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_1860a6'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_1860a6'];?>

        <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_87068c'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_87068c'];?>

        <?php $_3eeb2d_old_params['_3702a1']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_3702a1']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'can_create','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_3eeb2d_old_params['_bdeaa7']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_bdeaa7']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_3eeb2d_old_params['_5cbd64']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_5cbd64']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_3eeb2d_old_params['_32d063']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_32d063']=$_3eeb2d_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'update_all','model'=>'$this_model','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

              <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_32d063'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_32d063'];?>

            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_5cbd64'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_5cbd64'];?>

          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_bdeaa7'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_bdeaa7'];?>

        <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_3702a1'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_3702a1'];?>

        <?php $_3eeb2d_old_params['_c83ef4']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_c83ef4']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_create','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_3eeb2d_old_params['_961482']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_961482']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_3eeb2d_old_params['_e92628']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_e92628']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'label','setvar'=>'orig_label','this_tag'=>'var'],null,$this),$this),$this->setup_args('orig_label','setvar',$this),$this,'setvar')?>

              <?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'Syetem\'s Role','setvar'=>'label','this_tag'=>'trans'],null,$this),$this),$this->setup_args('label','setvar',$this),$this,'setvar')?>

            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_e92628'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_e92628'];?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php $_3eeb2d_old_params['_95f84d']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_95f84d']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._system_filters_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_d93f20']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_d93f20']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'tag','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;tag_obj=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_d93f20'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_d93f20'];?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_95f84d'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_95f84d'];?>
">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php $_3eeb2d_old_params['_57d0ed']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_57d0ed']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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

            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_57d0ed'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_57d0ed'];?>

            <?php $_3eeb2d_old_params['_a3e4e0']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_a3e4e0']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_2fe122']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_2fe122']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_2fe122'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_2fe122'];?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_a3e4e0'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_a3e4e0'];?>

          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_961482'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_961482'];?>

          <?php $_3eeb2d_old_params['_b028f9']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_b028f9']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_3eeb2d_old_params['_21ab20']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_21ab20']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.saved','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_3eeb2d_old_params['_cfbf78']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_cfbf78']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_25ca36']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_25ca36']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request._profile','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_3eeb2d_old_params['_ec06b5']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ec06b5']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','ne'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ec06b5'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ec06b5'];?>
">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_25ca36'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_25ca36'];?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_cfbf78'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_cfbf78'];?>

            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_21ab20'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_21ab20'];?>

            <?php $_3eeb2d_old_params['_b7e4ec']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_b7e4ec']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','ne'=>'hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_3eeb2d_old_params['_3c667b']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_3c667b']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'user','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_3eeb2d_old_params['_ca7260']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ca7260']=$_3eeb2d_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_8d278f']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_8d278f']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request._profile','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
              <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_8d278f'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_8d278f'];?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ca7260'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ca7260'];?>

            <?php else:?>

          <a class="btn btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_3eeb2d_old_params['_c091c3']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_c091c3']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._model','ne'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_c091c3'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_c091c3'];?>
">
            <i class="hidden fa fa-list" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php $_3eeb2d_old_params['_be0248']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_be0248']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3eeb2d_old_params['_91b0aa']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_91b0aa']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_91b0aa'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_91b0aa'];?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_be0248'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_be0248'];?>

            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_3c667b'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_3c667b'];?>

            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_b7e4ec'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_b7e4ec'];?>

          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_b028f9'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_b028f9'];?>

          <?php $_3eeb2d_old_params['_3b6d65']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_3b6d65']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_3eeb2d_old_params['_90c33d']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_90c33d']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_3eeb2d_old_params['_effce0']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_effce0']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_create','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#startUpload">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload','this_tag'=>'trans'],null,$this),$this)?>

          </button>
            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_effce0'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_effce0'];?>

            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_90c33d'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_90c33d'];?>

          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_3b6d65'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_3b6d65'];?>

        <?php else:?>

          <?php $_3eeb2d_old_params['_02ecec']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_02ecec']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_3eeb2d_old_params['_0c6cb1']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_0c6cb1']=$_3eeb2d_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'list','model'=>'$model','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_0c6cb1'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_0c6cb1'];?>

            <?php $_3eeb2d_old_params['_692582']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_692582']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._model','eq'=>'comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request._model','eq'=>'contact','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_692582'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_692582'];?>

            <?php $_3eeb2d_old_params['_a19324']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_a19324']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'show_return_to_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_a19324'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_a19324'];?>

          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_02ecec'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_02ecec'];?>

        <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_c83ef4'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_c83ef4'];?>

          <?php $_3eeb2d_old_params['_240ce1']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_240ce1']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_240ce1'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_240ce1'];?>

      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_51319f'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_51319f'];?>

      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_342b8e'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_342b8e'];?>

      <?php $_3eeb2d_old_params['_e8ec6b']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_e8ec6b']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_3eeb2d_old_params['_0d20e3']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_0d20e3']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_3eeb2d_old_params['_5b09c1']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_5b09c1']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_3eeb2d_old_params['_83837b']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_83837b']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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

          <?php $_3eeb2d_old_params['_69868f']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_69868f']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="pack-left btn btn-secondary btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
&amp;manage_revision=1">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Revision','this_tag'=>'trans'],null,$this),$this)?>

          </a>
          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_69868f'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_69868f'];?>

          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_83837b'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_83837b'];?>

          <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_5b09c1'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_5b09c1'];?>

        <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_0d20e3'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_0d20e3'];?>

      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_e8ec6b'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_e8ec6b'];?>

      <?php $_3eeb2d_old_params['_7c8e18']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_7c8e18']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_3eeb2d_old_params['_648531']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_648531']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_3eeb2d_old_params['_08b901']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_08b901']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'dashboard','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a class="btn btn-sm header-btn-icon" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=dashboard&amp;<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
">
          <i class="hidden fa fa-home" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
"></i>
          <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
</span>
        </a>
      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_08b901'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_08b901'];?>

      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_648531'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_648531'];?>

      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_7c8e18'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_7c8e18'];?>

          </h1>
    <?php $c_f52547=null;$_3eeb2d_old_params['_f52547']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_f52547']=$_3eeb2d_local_vars;$a_f52547=$this->setup_args(['name'=>'alert_close','this_tag'=>'setvarblock'],null,$this);ob_start();?>

    <button type="button" class="close" data-dismiss="alert" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
      <span aria-hidden="true">&times;</span>
    </button>
    <?php $c_f52547=ob_get_clean();$c_f52547=$this->block_setvarblock($a_f52547,$c_f52547,$this,$r_f52547,1,'_f52547');echo($c_f52547); $_3eeb2d_local_params=$_3eeb2d_old_params['_f52547'];?>

    <div class="alert alert-success hidden" id="header-alert" role="alert" tabindex="0">
      <button onclick="$('#header-alert').hide();" type="button" id="header-alert-close" class="close" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
        <span aria-hidden="true">&times;</span>
      </button>
      <span id="header-alert-message"></span>
    </div>
    <?php $_3eeb2d_old_params['_ac03df']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ac03df']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'header_alert_message','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <div id="header-alert-message" class="alert alert-<?php $_3eeb2d_old_params['_ba97e6']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ba97e6']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'header_alert_class','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'header_alert_class','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
success<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ba97e6'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ba97e6'];?>
" tabindex="0">
      <?php $_3eeb2d_old_params['_77eb27']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_77eb27']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'header_alert_force','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'alert_close','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_77eb27'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_77eb27'];?>

      <?php echo $this->function_var($this->setup_args(['name'=>'header_alert_message','this_tag'=>'var'],null,$this),$this)?>

      <?php $_3eeb2d_old_params['_a4e85a']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_a4e85a']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.need_rebuild','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild<?php $_3eeb2d_old_params['_3b5fdb']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_3b5fdb']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_3b5fdb'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_3b5fdb'];?>
" class="popup">
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Publish your site to see these changes take effect.','this_tag'=>'trans'],null,$this),$this)?>

        </a>
      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_a4e85a'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_a4e85a'];?>

    </div>
    <script>
    $('#header-alert-message').focus();
    </script>
    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ac03df'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ac03df'];?>

    <?php $_3eeb2d_old_params['_5eb514']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_5eb514']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <div id="header-error-message" class="alert alert-danger" role="alert" tabindex="0">
      <?php echo paml_modifier_funcs('nl2br', paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'error','escape'=>'1','nl2br'=>'1','this_tag'=>'var'],null,$this),$this),ENT_QUOTES))?>

      </div>
    <script>
    $('#header-error-message').focus();
    </script>
    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_5eb514'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_5eb514'];?>

<?php $_3eeb2d_old_params['_ab36f8']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ab36f8']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.saved','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_3eeb2d_old_params['_2ed2ec']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_2ed2ec']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div id="saved-alert-message" class="alert alert-success" tabindex="0">
    <?php echo $this->function_var($this->setup_args(['name'=>'alert_close','this_tag'=>'var'],null,$this),$this)?>

    <?php $_3eeb2d_old_params['_699f83']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_699f83']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.action_type','eq'=>'enable','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Plugin(s) enabled successfully.','this_tag'=>'trans'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.action_type','eq'=>'upgrade','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Plugin(s) upgrade successfully.','this_tag'=>'trans'],null,$this),$this)?>

    <?php else:?>

      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Plugin(s) disabled successfully.','this_tag'=>'trans'],null,$this),$this)?>

    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_699f83'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_699f83'];?>

  </div>
<script>
$('#saved-alert-message').focus();
</script>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_2ed2ec'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_2ed2ec'];?>

<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ab36f8'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ab36f8'];?>

<?php $_3eeb2d_old_params['_3e6d6a']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_3e6d6a']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="alert alert-warning" id="alert-upgrade" tabindex="0">
    <?php $_3eeb2d_old_params['_cd9656']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_cd9656']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'upgrade_count','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_trans($this->setup_args(['phrase'=>'There is one upgrade.','this_tag'=>'trans'],null,$this),$this)?>

    <?php else:?>

      <?php echo $this->function_trans($this->setup_args(['phrase'=>'There are %s upgrades.','params'=>'$upgrade_count','this_tag'=>'trans'],null,$this),$this)?>

    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_cd9656'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_cd9656'];?>

  </div>
<script>
$('#alert-upgrade').focus();
</script>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_3e6d6a'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_3e6d6a'];?>

<?php $_3eeb2d_old_params['_c400a4']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_c400a4']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="alert alert-warning" id="alert-scheme-upgrade" tabindex="0">
    <?php $_3eeb2d_old_params['_5cfeab']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_5cfeab']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'plugin_scheme_upgrade_count','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_trans($this->setup_args(['phrase'=>'There is one scheme upgrade.','this_tag'=>'trans'],null,$this),$this)?>

    <?php else:?>

      <?php echo $this->function_trans($this->setup_args(['phrase'=>'There are %s schemes upgrade.','params'=>'$plugin_scheme_upgrade_count','this_tag'=>'trans'],null,$this),$this)?>

    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_5cfeab'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_5cfeab'];?>

    <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=manage_scheme">( 
    <?php $_3eeb2d_old_params['_8255ea']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_8255ea']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'plugin_scheme_upgrade_count','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upgrade Scheme','this_tag'=>'trans'],null,$this),$this)?>

    <?php else:?>

    <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upgrade Schemes','this_tag'=>'trans'],null,$this),$this)?>

    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_8255ea'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_8255ea'];?>

    )</a>
  </div>
<script>
$('#alert-scheme-upgrade').focus();
</script>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_c400a4'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_c400a4'];?>


<div class="table-screen">
<form action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST" id="update_plugin">
<input type="hidden" name="__mode" value="manage_plugins">
<input type="hidden" name="magic_token" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'magic_token','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<input type="hidden" name="_type" value="" id="this_type">
<input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">

<?php $c_eb44ad=null;$_3eeb2d_old_params['_eb44ad']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_eb44ad']=$_3eeb2d_local_vars;$a_eb44ad=$this->setup_args(['name'=>'table_header','this_tag'=>'setvarblock'],null,$this);ob_start();?>

  <tr>
<?php $_3eeb2d_old_params['_311062']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_311062']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <th class="all-selector cb-col">
    <label class="custom-control custom-checkbox">
      <input type="checkbox" class="selector custom-control-input cb-all-select">
      <span class="custom-control-indicator"></span>
      <span class="custom-control-description"></span>
    </label>
  </th>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_311062'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_311062'];?>

  <th><?php echo $this->function_trans($this->setup_args(['phrase'=>'Name','this_tag'=>'trans'],null,$this),$this)?>
</th>
  <th><?php echo $this->function_trans($this->setup_args(['phrase'=>'Excerpt','this_tag'=>'trans'],null,$this),$this)?>
</th>
  <th class="short-col"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Version','this_tag'=>'trans'],null,$this),$this)?>
</th>
  <th><?php echo $this->function_trans($this->setup_args(['phrase'=>'Settings','this_tag'=>'trans'],null,$this),$this)?>
</th>
</tr>
<?php $c_eb44ad=ob_get_clean();$c_eb44ad=$this->block_setvarblock($a_eb44ad,$c_eb44ad,$this,$r_eb44ad,1,'_eb44ad');echo($c_eb44ad); $_3eeb2d_local_params=$_3eeb2d_old_params['_eb44ad'];?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'plugin_output','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

<?php $_3eeb2d_old_params['_470545']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_470545']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<div class="form-group">
  <button type="submit" class="enable-btn btn btn-primary"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Enable','this_tag'=>'trans'],null,$this),$this)?>
</button>
  <button type="submit" class="disable-btn btn btn-secondary"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Disable','this_tag'=>'trans'],null,$this),$this)?>
</button>
<?php $_3eeb2d_old_params['_2a8d4b']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_2a8d4b']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <button type="submit" class="upgrade-btn btn btn-secondary"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Upgrade','this_tag'=>'trans'],null,$this),$this)?>
</button>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_2a8d4b'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_2a8d4b'];?>

</div>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_470545'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_470545'];?>

<table class="table table-sm listing-table table-hover table-striped">
<thead>
  <?php echo $this->function_var($this->setup_args(['name'=>'table_header','this_tag'=>'var'],null,$this),$this)?>

</thead>
<tbody id="list_body">
<?php $c_321480=null;$_3eeb2d_old_params['_321480']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_321480']=$_3eeb2d_local_vars;$a_321480=$this->setup_args(['name'=>'plugins_loop','sort_by'=>'key','this_tag'=>'loop'],null,$this);$_321480=-1;$r_321480=true;while($r_321480===true):$r_321480=($_321480!==-1)?false:true;echo $this->block_loop($a_321480,$c_321480,$this,$r_321480,++$_321480,'_321480');ob_start();?>
<?php $c_321480 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_321480=false;}if($c_321480 ):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'plugin_visible','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__','setvar'=>'settings','this_tag'=>'var'],null,$this),$this),$this->setup_args('settings','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'settings[status]','setvar'=>'plugin_status','this_tag'=>'var'],null,$this),$this),$this->setup_args('plugin_status','setvar',$this),$this,'setvar')?>

  <?php $_3eeb2d_old_params['_addaca']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_addaca']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $_3eeb2d_old_params['_180d5f']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_180d5f']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'plugin_status','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'plugin_visible','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_180d5f'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_180d5f'];?>

  <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_addaca'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_addaca'];?>

  <?php $_3eeb2d_old_params['_99712d']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_99712d']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'plugin_visible','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'settings[id]','setvar'=>'plugin_id','this_tag'=>'var'],null,$this),$this),$this->setup_args('plugin_id','setvar',$this),$this,'setvar')?>

    <?php $_3eeb2d_old_params['_cef3c1']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_cef3c1']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'plugin_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'settings[component]','lower_case'=>'1','setvar'=>'plugin_id','this_tag'=>'var'],null,$this),$this)),$this->setup_args('plugin_id','setvar',$this),$this,'setvar')?>

    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_cef3c1'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_cef3c1'];?>

    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'settings[upgrade]','setvar'=>'upgrade','this_tag'=>'var'],null,$this),$this),$this->setup_args('upgrade','setvar',$this),$this,'setvar')?>

    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'settings[upgrade_scheme]','setvar'=>'upgrade_scheme','this_tag'=>'var'],null,$this),$this),$this->setup_args('upgrade_scheme','setvar',$this),$this,'setvar')?>

    <tr id="line_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'plugin_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" class="<?php $_3eeb2d_old_params['_8786d6']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_8786d6']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active-cell<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'upgrade_scheme','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
active-cell<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_8786d6'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_8786d6'];?>
<?php $_3eeb2d_old_params['_a3dfb5']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_a3dfb5']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'plugin_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
  plugin-active<?php else:?>
plugin-inactive<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_a3dfb5'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_a3dfb5'];?>
">
    <?php echo $this->function_setvar($this->setup_args(['name'=>'plugin_output','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_3eeb2d_old_params['_bca614']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_bca614']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <th>
      <label class="custom-control custom-checkbox">
        <input id="box_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'plugin_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" type="checkbox" class="custom-control-input" name="plugin_id[]" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'plugin_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"></span>
      </label>
    </th>
    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_bca614'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_bca614'];?>

    <td>
    <div>
    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'settings[label]','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

    <?php $_3eeb2d_old_params['_bf5f86']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_bf5f86']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'plugin_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <i class="fa fa-check-square" aria-hidden="true"></i>
    <span class="sr-only">(<?php echo $this->function_trans($this->setup_args(['phrase'=>'Enabled','this_tag'=>'trans'],null,$this),$this)?>
)</span>
    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_bf5f86'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_bf5f86'];?>

    </div>
    <?php $_3eeb2d_old_params['_fd6586']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_fd6586']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <div class="plugin-switch"><?php $_3eeb2d_old_params['_b7cb15']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_b7cb15']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'plugin_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <a id="inline-btn-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'plugin_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" class="disable-link" href="javascript:void(0);"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Disable this plugin','this_tag'=>'trans'],null,$this),$this)?>
</a>
    <?php else:?>

      <a id="inline-btn-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'plugin_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" class="enable-link" href="javascript:void(0);"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Enable this plugin','this_tag'=>'trans'],null,$this),$this)?>
</a>
    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_b7cb15'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_b7cb15'];?>

    </div>
    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_fd6586'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_fd6586'];?>

    </td>
    <td>
    <div><?php echo $this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'settings[description]','trans'=>'$__key__','this_tag'=>'var'],null,$this),$this),$this->setup_args('$__key__','trans',$this),$this,'trans')?>
</div>
    <div><?php echo $this->function_trans($this->setup_args(['phrase'=>'Creator','this_tag'=>'trans'],null,$this),$this)?>
 : <?php $_3eeb2d_old_params['_fd2012']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_fd2012']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'$settings[author_link]','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <a target="_blank" href="<?php echo $this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'settings[author_link]','trans'=>'$__key__','this_tag'=>'var'],null,$this),$this),$this->setup_args('$__key__','trans',$this),$this,'trans')?>
">
      <i class="fa fa-external-link" aria-hidden="true"></i>
    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_fd2012'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_fd2012'];?>

      <?php echo $this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'settings[author]','trans'=>'$__key__','this_tag'=>'var'],null,$this),$this),$this->setup_args('$__key__','trans',$this),$this,'trans')?>

    <?php $_3eeb2d_old_params['_ab4e42']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ab4e42']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'settings[author_link]','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      </a>
    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ab4e42'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ab4e42'];?>

    
    <?php $_3eeb2d_old_params['_945dc1']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_945dc1']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'$settings[committer]','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      &nbsp;
      <i class="fa fa-user-circle-o" aria-hidden="true"></i>
      <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Committer','this_tag'=>'trans'],null,$this),$this)?>
</span>
      <?php echo $this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'settings[committer]','trans'=>'$__key__','this_tag'=>'var'],null,$this),$this),$this->setup_args('$__key__','trans',$this),$this,'trans')?>

    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_945dc1'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_945dc1'];?>

    <?php $_3eeb2d_old_params['_44cbbf']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_44cbbf']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'$settings[email]','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      &nbsp;
      <a href="mailto:<?php echo $this->function_var($this->setup_args(['name'=>'settings[email]','this_tag'=>'var'],null,$this),$this)?>
">
      <i class="fa fa-envelope-o" aria-hidden="true"></i>
      <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Email','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </a>
    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_44cbbf'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_44cbbf'];?>

    <?php $_3eeb2d_old_params['_d30d93']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_d30d93']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'settings[doc_link]','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      &nbsp;
      <a target="_blank" href="<?php echo $this->function_var($this->setup_args(['name'=>'settings[doc_link]','this_tag'=>'var'],null,$this),$this)?>
" class="badge badge-default plugin-doc-link">
      <i class="fa fa-external-link" aria-hidden="true"></i>
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Document','this_tag'=>'trans'],null,$this),$this)?>

      </a>
    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_d30d93'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_d30d93'];?>

    <?php $_3eeb2d_old_params['_680058']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_680058']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'settings[document]','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      &nbsp;
      <a target="_blank" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view_plugin_doc&amp;plugin_id=<?php echo $this->function_var($this->setup_args(['name'=>'plugin_id','this_tag'=>'var'],null,$this),$this)?>
<?php $_3eeb2d_old_params['_e47774']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_e47774']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_e47774'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_e47774'];?>
" class="badge badge-default plugin-doc-link">
      <i class="fa fa-external-link" aria-hidden="true"></i>
      <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'settings[document]','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

      </a>
    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_680058'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_680058'];?>

    </div>
    </td>
    <td>
    <?php echo $this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'settings[version]','trans'=>'$__key__','this_tag'=>'var'],null,$this),$this),$this->setup_args('$__key__','trans',$this),$this,'trans')?>

    <?php $_3eeb2d_old_params['_807194']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_807194']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    &nbsp; (<?php echo $this->function_trans($this->setup_args(['phrase'=>'Upgrade','this_tag'=>'trans'],null,$this),$this)?>
)
    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_807194'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_807194'];?>

    </td>
    <td class="very-short">
    <?php $_3eeb2d_old_params['_b338f9']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_b338f9']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'plugin_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $_3eeb2d_old_params['_09bbf9']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_09bbf9']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'settings[cfg_space]','setvar'=>'has_config','this_tag'=>'var'],null,$this),$this),$this->setup_args('has_config','setvar',$this),$this,'setvar')?>

    <?php else:?>

    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'settings[cfg_system]','setvar'=>'has_config','this_tag'=>'var'],null,$this),$this),$this->setup_args('has_config','setvar',$this),$this,'setvar')?>

    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_09bbf9'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_09bbf9'];?>

    <?php $_3eeb2d_old_params['_3c7a5c']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_3c7a5c']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_config','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <button type="button"
      class="btn btn-secondary"
      data-toggle="modal" data-target="#modal"
      data-href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=manage_plugins<?php $_3eeb2d_old_params['_1b9005']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_1b9005']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_1b9005'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_1b9005'];?>
&amp;plugin_id=<?php echo $this->function_var($this->setup_args(['name'=>'plugin_id','this_tag'=>'var'],null,$this),$this)?>
&amp;edit_settings=1"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Settings','this_tag'=>'trans'],null,$this),$this)?>
</button>
    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_3c7a5c'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_3c7a5c'];?>

    <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_b338f9'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_b338f9'];?>

    </td>
    </tr>
  <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_99712d'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_99712d'];?>

<?php endif;$c_321480=ob_get_clean();endwhile; $_3eeb2d_local_params=$_3eeb2d_old_params['_321480'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_321480'];?>

<?php $_3eeb2d_old_params['_a4f78f']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_a4f78f']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'plugin_output','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<tfoot>
  <?php echo $this->function_var($this->setup_args(['name'=>'table_header','this_tag'=>'var'],null,$this),$this)?>

</tfoot>
<?php else:?>

<tr>
<td colspan="5">
  <?php $_3eeb2d_old_params['_0096f7']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_0096f7']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_trans($this->setup_args(['phrase'=>'There is no plugin that can be setting.','this_tag'=>'trans'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_trans($this->setup_args(['phrase'=>'There is no plugin that can be use.','this_tag'=>'trans'],null,$this),$this)?>

  <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_0096f7'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_0096f7'];?>

</td>
</tr>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_a4f78f'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_a4f78f'];?>

</table>
<?php $_3eeb2d_old_params['_7b35bc']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_7b35bc']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<div <?php $_3eeb2d_old_params['_010e55']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_010e55']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_stickey_buttons','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
class="form-group edit-action-bar pl-2" style="margin-left:-15px;margin-right:-15px"<?php else:?>
class="form-group"<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_010e55'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_010e55'];?>
>
  <button type="submit" class="enable-btn btn btn-primary"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Enable','this_tag'=>'trans'],null,$this),$this)?>
</button>
  <button type="submit" class="disable-btn btn btn-secondary"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Disable','this_tag'=>'trans'],null,$this),$this)?>
</button>
<?php $_3eeb2d_old_params['_01c24c']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_01c24c']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <button type="submit" class="upgrade-btn btn btn-secondary"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Upgrade','this_tag'=>'trans'],null,$this),$this)?>
</button>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_01c24c'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_01c24c'];?>

</div>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_7b35bc'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_7b35bc'];?>

</form>
</div>
<div id="modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
      <iframe></iframe>
    </div>
  </div>
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
$('button').mouseover(function() {
    in_link = true;
});
$('button').mouseout(function() {
    in_link = false;
});
$('a').mouseover(function() {
    in_link = true;
});
$('a').mouseout(function() {
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
    $("input[name='plugin_id[]']").each(function(){
        if ( $(this).prop('checked') == false ) {
            is_all = false;
            return false;
        }
    });
    $('.selector').prop('checked', is_all );
}
$("input[name='plugin_id[]']").change(function(){
    set_all_select();
});
$('.selector').click(function(){
    checked = $(this).prop('checked');
    $("input[name='plugin_id[]']").each(function(){
        $(this).prop('checked', checked);
    });
    $('.selector').prop('checked', checked);
});
var selected_item_count;
function item_checked( count ) {
    selected_item_count = 0;
    var selected = false;
    $("input[name='plugin_id[]']").each(function(){
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
$('.enable-link').click(function(){
    if(! confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to enable this plugin?','this_tag'=>'trans'],null,$this),$this)?>
') ) {
        return false;
    }
    var plugin_name = $(this).prop('id');
    plugin_name = plugin_name.replace( 'inline-btn-', '' );
    $("input[name='plugin_id[]']").each(function(){
        $(this).prop('checked', false );
    });
    $('#box_' + plugin_name ).prop('checked', true );
    $('#this_type').val('enable');
    $('#update_plugin').submit();
    return false;
});
$('.disable-link').click(function(){
    if(! confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to disable this plugin?','this_tag'=>'trans'],null,$this),$this)?>
') ) {
        return false;
    }
    var plugin_name = $(this).prop('id');
    plugin_name = plugin_name.replace( 'inline-btn-', '' );
    $("input[name='plugin_id[]']").each(function(){
        $(this).prop('checked', false );
    });
    $('#box_' + plugin_name ).prop('checked', true );
    $('#this_type').val('disable');
    $('#update_plugin').submit();
    return false;
});
$('.enable-btn').click(function(){
    if ( item_checked( true ) == 0 ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'You did not select any plugin.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    if(! confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to enable plugin(s)?','this_tag'=>'trans'],null,$this),$this)?>
') ) {
        return false;
    }
    $('#this_type').val('enable');
});
$('.disable-btn').click(function(){
    if ( item_checked( true ) == 0 ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'You did not select any plugin.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    if(! confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to disable plugin(s)?','this_tag'=>'trans'],null,$this),$this)?>
') ) {
        return false;
    }
    $('#this_type').val('disable');
});
$('.upgrade-btn').click(function(){
    if ( item_checked( true ) == 0 ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'You did not select any plugin.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    if(! confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to upgrade plugin(s)?','this_tag'=>'trans'],null,$this),$this)?>
') ) {
        return false;
    }
    $('#this_type').val('upgrade');
});
$(":checkbox").keypress(function(e) {
    if ( e.keyCode == 13 ) {
        if ( $(this).prop('checked') ) {
            $(this).prop('checked', false);
        } else {
            $(this).prop('checked', true);
        }
        if ( $(this).hasClass('cb-all-select') ) {
            checked = $(this).prop('checked');
            $("input[name='plugin_id[]']").each(function(){
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

  <?php $_3eeb2d_old_params['_f934aa']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_f934aa']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'copyright','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <footer class="footer bar">
      <?php $_3eeb2d_old_params['_3c84f7']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_3c84f7']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <span class="copyright"><?php echo $this->modifier_eval($this->function_var($this->setup_args(['name'=>'copyright','eval'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','eval',$this),$this,'eval')?>
</span>
      <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_3c84f7'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_3c84f7'];?>

    </footer>
  <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_f934aa'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_f934aa'];?>

<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script>
$(function() {
    $(".popup").click(function(){
        window.open(this.href,"RebuildPopupWindow","width=420,height=<?php $_3eeb2d_old_params['_c93982']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_c93982']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'debug_mode','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
360<?php else:?>
320<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_c93982'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_c93982'];?>
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
<?php $_3eeb2d_old_params['_01897c']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_01897c']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_3eeb2d_old_params['_1d4ed4']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_1d4ed4']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_3eeb2d_old_params['_6bfd57']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_6bfd57']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_3eeb2d_old_params['_7002c5']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_7002c5']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_7002c5'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_7002c5'];?>

<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_6bfd57'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_6bfd57'];?>

<?php $_3eeb2d_old_params['_4b45ce']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_4b45ce']=$_3eeb2d_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_3eeb2d_old_params['_42aec0']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_42aec0']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_42aec0'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_42aec0'];?>

<?php $_3eeb2d_old_params['_5739af']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_5739af']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_5739af'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_5739af'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_4b45ce'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_4b45ce'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_3eeb2d_old_params['_d280f8']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_d280f8']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_d280f8'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_d280f8'];?>

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
?__mode=view&_type=list&_model=asset<?php $_3eeb2d_old_params['_ec7611']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ec7611']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ec7611'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ec7611'];?>
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
?__mode=view&_type=list&_model=asset<?php $_3eeb2d_old_params['_a1985d']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_a1985d']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_a1985d'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_a1985d'];?>
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
            <?php $_3eeb2d_old_params['_459d54']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_459d54']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            if(ed.id && ed.id == 'text'){
              var clipboard_image = $('#clipboard-image');
              var inline_image = $('#inline-image');
              var bg_image_url = clipboard_image.val();
              if ( inline_image.length ) {
                  bg_image_url = inline_image.attr('href');
              }
              if ( clipboard_image.length ) {
                <?php $_3eeb2d_old_params['_bc67bd']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_bc67bd']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_bc67bd'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_bc67bd'];?>

                <?php $_3eeb2d_old_params['_4631f4']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_4631f4']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_4631f4'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_4631f4'];?>

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
            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_459d54'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_459d54'];?>

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
<?php $_3eeb2d_old_params['_4f4d70']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_4f4d70']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_3eeb2d_old_params['_1bdd2b']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_1bdd2b']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_1bdd2b'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_1bdd2b'];?>

<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_4f4d70'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_4f4d70'];?>

<?php $_3eeb2d_old_params['_38cb7a']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_38cb7a']=$_3eeb2d_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_3eeb2d_old_params['_6000ad']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_6000ad']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_6000ad'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_6000ad'];?>

<?php $_3eeb2d_old_params['_567f04']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_567f04']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_567f04'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_567f04'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_38cb7a'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_38cb7a'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_3eeb2d_old_params['_4011b3']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_4011b3']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_4011b3'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_4011b3'];?>

        relative_urls : false,
        image_advtab: true,
        promotion: false,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code<?php $_3eeb2d_old_params['_7acaed']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_7acaed']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','lt'=>'6','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 print paste<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_7acaed'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_7acaed'];?>
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
                <?php $_3eeb2d_old_params['_56b488']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_56b488']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'gallery',
                <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_56b488'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_56b488'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_3eeb2d_old_params['_71d8ed']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_71d8ed']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_71d8ed'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_71d8ed'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.ui.registry.addButton('pt-file', {
                <?php $_3eeb2d_old_params['_c17222']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_c17222']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'browse',
                <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_c17222'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_c17222'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_3eeb2d_old_params['_29a936']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_29a936']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_29a936'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_29a936'];?>
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
            <?php $_3eeb2d_old_params['_05480a']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_05480a']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
                      <?php $_3eeb2d_old_params['_f0bd06']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_f0bd06']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_f0bd06'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_f0bd06'];?>

                      <?php $_3eeb2d_old_params['_7cebc3']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_7cebc3']=$_3eeb2d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_7cebc3'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_7cebc3'];?>

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
            <?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_05480a'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_05480a'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_1d4ed4'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_1d4ed4'];?>

<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_01897c'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_01897c'];?>

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
<?php $_3eeb2d_old_params['_ede61e']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_ede61e']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_3eeb2d_old_params['_96d2e9']=$_3eeb2d_local_params;$_3eeb2d_old_vars['_96d2e9']=$_3eeb2d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','ne'=>'loading','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_96d2e9'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_96d2e9'];?>

<?php endif;$_3eeb2d_local_params=$_3eeb2d_old_params['_ede61e'];$_3eeb2d_local_vars=$_3eeb2d_old_vars['_ede61e'];?>

</script>
  </div>
<?php echo $this->function_var($this->setup_args(['name'=>'html_body_footer','this_tag'=>'var'],null,$this),$this)?>

  </body>
</html>

<?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\manage_plugins.tmpl' => 1718664344,
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
  'time' => 1743988290,
);?>