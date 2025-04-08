<?php ob_start();?><?php $_ded920_vars=&$this->vars;$_ded920_old_params=&$this->old_params;$_ded920_local_params=&$this->local_params;$_ded920_old_vars=&$this->old_vars;$_ded920_local_vars=&$this->local_vars;?><?php $_ded920_old_params['_55dfe8']=$_ded920_local_params;$_ded920_old_vars['_55dfe8']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_1496bb']=$_ded920_local_params;$_ded920_old_vars['_1496bb']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_fix_spacebar','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_1496bb'];$_ded920_local_vars=$_ded920_old_vars['_1496bb'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_55dfe8'];$_ded920_local_vars=$_ded920_old_vars['_55dfe8'];?>

<!DOCTYPE html>
<html lang="<?php $_ded920_old_params['_9dbc51']=$_ded920_local_params;$_ded920_old_vars['_9dbc51']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_language','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_language','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
en<?php endif;$_ded920_local_params=$_ded920_old_params['_9dbc51'];$_ded920_local_vars=$_ded920_old_vars['_9dbc51'];?>
">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="author" content="Alfasado Inc.">
    <meta name="robots" content="noindex">
    <meta name="robots" content="nofollow">
    <link rel="icon" href="favicon.ico">
    <title><?php $_ded920_old_params['_1e02ac']=$_ded920_local_params;$_ded920_old_vars['_1e02ac']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'html_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'html_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php else:?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'page_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_1e02ac'];$_ded920_local_vars=$_ded920_old_vars['_1e02ac'];?>
<?php $_ded920_old_params['_def16c']=$_ded920_local_params;$_ded920_old_vars['_def16c']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_3094fd']=$_ded920_local_params;$_ded920_old_vars['_3094fd']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 | <?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_3094fd'];$_ded920_local_vars=$_ded920_old_vars['_3094fd'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_def16c'];$_ded920_local_vars=$_ded920_old_vars['_def16c'];?>
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
    <?php $_ded920_old_params['_074d7f']=$_ded920_local_params;$_ded920_old_vars['_074d7f']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_stickey_buttons','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_d7275c']=$_ded920_local_params;$_ded920_old_vars['_d7275c']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_ded920_old_params['_2df614']=$_ded920_local_params;$_ded920_old_vars['_2df614']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickybgcolor','value'=>'$workspace_barcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_2df614'];$_ded920_local_vars=$_ded920_old_vars['_2df614'];?>

      <?php $_ded920_old_params['_b4c041']=$_ded920_local_params;$_ded920_old_vars['_b4c041']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickycolor','value'=>'$workspace_bartextcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_b4c041'];$_ded920_local_vars=$_ded920_old_vars['_b4c041'];?>

      <?php endif;$_ded920_local_params=$_ded920_old_params['_d7275c'];$_ded920_local_vars=$_ded920_old_vars['_d7275c'];?>

      <?php $_ded920_old_params['_c92c62']=$_ded920_local_params;$_ded920_old_vars['_c92c62']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickybgcolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'barcolor','setvar'=>'stickybgcolor','this_tag'=>'var'],null,$this),$this),$this->setup_args('stickybgcolor','setvar',$this),$this,'setvar')?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_c92c62'];$_ded920_local_vars=$_ded920_old_vars['_c92c62'];?>

      <?php $_ded920_old_params['_a6256d']=$_ded920_local_params;$_ded920_old_vars['_a6256d']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickycolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'bartextcolor','setvar'=>'stickycolor','this_tag'=>'var'],null,$this),$this),$this->setup_args('stickycolor','setvar',$this),$this,'setvar')?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_a6256d'];$_ded920_local_vars=$_ded920_old_vars['_a6256d'];?>

      @media ( min-height: 576px ) {
      .edit-action-bar { position: sticky; bottom: 0px; z-index: 1020; background: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickybgcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
;
          padding: 10px 0px; vertical-align: middle; border-top: 1px solid #CCC; }
      .edit-action-bar button { border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      .edit-action-bar label { color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      }
    <?php endif;$_ded920_local_params=$_ded920_old_params['_074d7f'];$_ded920_local_vars=$_ded920_old_vars['_074d7f'];?>

      .fixed-top { z-index: 1030 !important; }
      .nav-top,.navbar-brand,.dropdown-menu, .nav-top a, footer{ background-color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_barcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; }
      .nav-top .my-sm-0, .nav-top .navbar-toggler{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      <?php $_ded920_old_params['_f4e843']=$_ded920_local_params;$_ded920_old_vars['_f4e843']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php ob_start();$_ded920_old_params['_995866']=$_ded920_local_params;$_ded920_old_vars['_995866']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .brand-workspace, .workspace-bar, .workspace-bar a,
      .workspace-bar .dropdown-menu{ background-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      .workspace-bar button.my-sm-0{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      .workspace-bar .my-sm-0, .workspace-bar .navbar-toggler{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      <?php endif;$_995866=ob_get_clean();echo paml_htmlspecialchars($_995866,ENT_QUOTES);$_ded920_local_params=$_ded920_old_params['_995866'];$_ded920_local_vars=$_ded920_old_vars['_995866'];?>

      <?php endif;$_ded920_local_params=$_ded920_old_params['_f4e843'];$_ded920_local_vars=$_ded920_old_vars['_f4e843'];?>

      <?php $_ded920_old_params['_189db6']=$_ded920_local_params;$_ded920_old_vars['_189db6']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .form-control, .custom-select, .relation_nestable_list, .custom-control-indicator, .tox-tinymce, .mce-tinymce, .btn-outline-secondary, .btn-secondary, .pagination-sm li a{ border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important }
      <?php endif;$_ded920_local_params=$_ded920_old_params['_189db6'];$_ded920_local_vars=$_ded920_old_vars['_189db6'];?>

      <?php $_ded920_old_params['_a513e1']=$_ded920_local_params;$_ded920_old_vars['_a513e1']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'panel_width','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
.nav-link{ max-width: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'panel_width','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
px !important }<?php endif;$_ded920_local_params=$_ded920_old_params['_a513e1'];$_ded920_local_vars=$_ded920_old_vars['_a513e1'];?>

      .navbar .btn { width:35px }
      <?php $_ded920_old_params['_c3e6bc']=$_ded920_local_params;$_ded920_old_vars['_c3e6bc']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'this_mode','eq'=>'config','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'this_mode','eq'=>'upgrade','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_ded920_local_params=$_ded920_old_params['_c3e6bc'];$_ded920_local_vars=$_ded920_old_vars['_c3e6bc'];?>

      <?php $_ded920_old_params['_9d20d4']=$_ded920_local_params;$_ded920_old_vars['_9d20d4']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'in_editing','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      @media (min-width: 992px) {
      .col-lg-2{ max-width:13rem !important }
      .col-lg-10{ min-width: -webkit-calc(100% - 13rem); min-width: calc(100% - 13rem) } }
      <?php endif;$_ded920_local_params=$_ded920_old_params['_9d20d4'];$_ded920_local_vars=$_ded920_old_vars['_9d20d4'];?>

    </style>
    <?php echo $this->function_var($this->setup_args(['name'=>'html_head','this_tag'=>'var'],null,$this),$this)?>

    <?php $_ded920_old_params['_95b849']=$_ded920_local_params;$_ded920_old_vars['_95b849']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'invisible_selector','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <style><?php echo $this->modifier_join($this->function_var($this->setup_args(['name'=>'invisible_selector','join'=>',','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','join',$this),$this,'join')?>
{display:none !important}</style>
    <?php endif;$_ded920_local_params=$_ded920_old_params['_95b849'];$_ded920_local_vars=$_ded920_old_vars['_95b849'];?>

    <?php $_ded920_old_params['_a509da']=$_ded920_local_params;$_ded920_old_vars['_a509da']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<style><?php $_ded920_old_params['_c7c2f3']=$_ded920_local_params;$_ded920_old_vars['_c7c2f3']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
body { padding-top: 80px; } .workspace-bar { margin-top: 0;}
    <?php else:?>
.workspace-bar { margin-bottom: 14px;}<?php endif;$_ded920_local_params=$_ded920_old_params['_c7c2f3'];$_ded920_local_vars=$_ded920_old_vars['_c7c2f3'];?>
</style><?php endif;$_ded920_local_params=$_ded920_old_params['_a509da'];$_ded920_local_vars=$_ded920_old_vars['_a509da'];?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_css','setvar'=>'config_user_css','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_css','setvar',$this),$this,'setvar')?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_js','setvar'=>'config_user_js','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_js','setvar',$this),$this,'setvar')?>

    <?php $_ded920_old_params['_18ab28']=$_ded920_local_params;$_ded920_old_vars['_18ab28']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_css','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_css','this_tag'=>'var'],null,$this),$this)?>
"><?php endif;$_ded920_local_params=$_ded920_old_params['_18ab28'];$_ded920_local_vars=$_ded920_old_vars['_18ab28'];?>

    <?php $_ded920_old_params['_c8964b']=$_ded920_local_params;$_ded920_old_vars['_c8964b']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_js','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_js','this_tag'=>'var'],null,$this),$this)?>
"></script><?php endif;$_ded920_local_params=$_ded920_old_params['_c8964b'];$_ded920_local_vars=$_ded920_old_vars['_c8964b'];?>

  </head>
  <body class="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'body_class','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<?php $_ded920_old_params['_905e87']=$_ded920_local_params;$_ded920_old_vars['_905e87']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php $_ded920_old_params['_dc4a97']=$_ded920_local_params;$_ded920_old_vars['_dc4a97']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_loader','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div id="__loader-bg">
  <img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif" alt="" width="45" height="45">
</div>
<script>
window.addEventListener('load', function(){
    $('#__loader-bg').hide("fast");
});
</script>
<?php endif;$_ded920_local_params=$_ded920_old_params['_dc4a97'];$_ded920_local_vars=$_ded920_old_vars['_dc4a97'];?>

<?php endif;$_ded920_local_params=$_ded920_old_params['_905e87'];$_ded920_local_vars=$_ded920_old_vars['_905e87'];?>

  <div id="main-content">
<?php $_ded920_old_params['_5a39c1']=$_ded920_local_params;$_ded920_old_vars['_5a39c1']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="fixed-top">
<?php endif;$_ded920_local_params=$_ded920_old_params['_5a39c1'];$_ded920_local_vars=$_ded920_old_vars['_5a39c1'];?>

  <?php $_ded920_old_params['_e4e7f5']=$_ded920_local_params;$_ded920_old_vars['_e4e7f5']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_581a8f']=$_ded920_local_params;$_ded920_old_vars['_581a8f']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.__mode','match'=>'/^(?:login|logout)$/iu','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'is_login','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_ded920_local_params=$_ded920_old_params['_581a8f'];$_ded920_local_vars=$_ded920_old_vars['_581a8f'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_e4e7f5'];$_ded920_local_vars=$_ded920_old_vars['_e4e7f5'];?>

  <?php $_ded920_old_params['_cbfedd']=$_ded920_local_params;$_ded920_old_vars['_cbfedd']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'member_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'is_login','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_ded920_local_params=$_ded920_old_params['_cbfedd'];$_ded920_local_vars=$_ded920_old_vars['_cbfedd'];?>

    <nav class="bar navbar navbar-toggleable-md navbar-inverse bg-inverse nav-top<?php $_ded920_old_params['_e52e0b']=$_ded920_local_params;$_ded920_old_vars['_e52e0b']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 fixed-top<?php endif;$_ded920_local_params=$_ded920_old_params['_e52e0b'];$_ded920_local_vars=$_ded920_old_vars['_e52e0b'];?>
">
      <?php $_ded920_old_params['_97ce1d']=$_ded920_local_params;$_ded920_old_vars['_97ce1d']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_ded920_old_params['_8842a9']=$_ded920_local_params;$_ded920_old_vars['_8842a9']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'install','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a class="navbar-brand brand-prototype" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
">PowerCMS X</a>
        <?php endif;$_ded920_local_params=$_ded920_old_params['_8842a9'];$_ded920_local_vars=$_ded920_old_vars['_8842a9'];?>

      <?php endif;$_ded920_local_params=$_ded920_old_params['_97ce1d'];$_ded920_local_vars=$_ded920_old_vars['_97ce1d'];?>

      <?php $_ded920_old_params['_5c771b']=$_ded920_local_params;$_ded920_old_vars['_5c771b']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'is_login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <button style="background-color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_barcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; z-index:7" class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </button>
      <?php endif;$_ded920_local_params=$_ded920_old_params['_5c771b'];$_ded920_local_vars=$_ded920_old_vars['_5c771b'];?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_param','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_ded920_old_params['_c25362']=$_ded920_local_params;$_ded920_old_vars['_c25362']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $c_9d6810=null;$_ded920_old_params['_9d6810']=$_ded920_local_params;$_ded920_old_vars['_9d6810']=$_ded920_local_vars;$a_9d6810=$this->setup_args(['name'=>'workspace_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_9d6810=ob_get_clean();$c_9d6810=$this->block_setvarblock($a_9d6810,$c_9d6810,$this,$r_9d6810,1,'_9d6810');echo($c_9d6810); $_ded920_local_params=$_ded920_old_params['_9d6810'];?>

        <?php endif;$_ded920_local_params=$_ded920_old_params['_c25362'];$_ded920_local_vars=$_ded920_old_vars['_c25362'];?>

      <?php $_ded920_old_params['_05f0d9']=$_ded920_local_params;$_ded920_old_vars['_05f0d9']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <a class="navbar-brand"<?php $_ded920_old_params['_98a1c6']=$_ded920_local_params;$_ded920_old_vars['_98a1c6']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_ded920_local_params=$_ded920_old_params['_98a1c6'];$_ded920_local_vars=$_ded920_old_vars['_98a1c6'];?>
 style="z-index:1"><?php echo $this->modifier_trim_to(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'appname','escape'=>'','trim_to'=>'20+...','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('20+...','trim_to',$this),$this,'trim_to')?>
<span id="navbar-brand-end"></span></a>
      <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_counter','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php $_ded920_old_params['_3a894e']=$_ded920_local_params;$_ded920_old_vars['_3a894e']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_a40749']=$_ded920_local_params;$_ded920_old_vars['_a40749']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'ws_selector_limit','setvar'=>'selector_limit','this_tag'=>'property'],null,$this),$this),$this->setup_args('selector_limit','setvar',$this),$this,'setvar')?>

        <?php $_ded920_old_params['_191253']=$_ded920_local_params;$_ded920_old_vars['_191253']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'selector_limit','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'selector_limit','value'=>'16','this_tag'=>'setvar'],null,$this),$this)?>

        <?php endif;$_ded920_local_params=$_ded920_old_params['_191253'];$_ded920_local_vars=$_ded920_old_vars['_191253'];?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'selector_limit','op'=>'+','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_by','value'=>'last_update','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_order','value'=>'descend','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_ded920_old_params['_3d50f1']=$_ded920_local_params;$_ded920_old_vars['_3d50f1']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_space_order','eq'=>'Default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_by','value'=>'order','this_tag'=>'setvar'],null,$this),$this)?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_order','value'=>'ascend','this_tag'=>'setvar'],null,$this),$this)?>

        <?php endif;$_ded920_local_params=$_ded920_old_params['_3d50f1'];$_ded920_local_vars=$_ded920_old_vars['_3d50f1'];?>

        <?php $c_a25cce=null;$_ded920_old_params['_a25cce']=$_ded920_local_params;$_ded920_old_vars['_a25cce']=$_ded920_local_vars;$a_a25cce=$this->setup_args(['cols'=>'id,name,barcolor,bartextcolor','model'=>'workspace','can_access'=>'1','limit'=>'$selector_limit','sort_by'=>'$ws_sort_by','direction'=>'$ws_sort_order','this_tag'=>'objectloop'],null,$this);$_a25cce=-1;$r_a25cce=true;while($r_a25cce===true):$r_a25cce=($_a25cce!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_a25cce,$c_a25cce,$this,$r_a25cce,++$_a25cce,'_a25cce');ob_start();?>
<?php $c_a25cce = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_a25cce=false;}if($c_a25cce ):?>

        <?php $_ded920_old_params['_6aeac7']=$_ded920_local_params;$_ded920_old_vars['_6aeac7']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <div class="hidden nav-item dropdown workspace-dd-wrapper active" id="workspace-selector" style="z-index:5">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpaces','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
            <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Select a WorkSpace','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cube workspace-dd" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpaces','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
        <?php endif;$_ded920_local_params=$_ded920_old_params['_6aeac7'];$_ded920_local_vars=$_ded920_old_vars['_6aeac7'];?>

            <?php $_ded920_old_params['_c221a1']=$_ded920_local_params;$_ded920_old_vars['_c221a1']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','lt'=>'$selector_limit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <a<?php $_ded920_old_params['_a3989b']=$_ded920_local_params;$_ded920_old_vars['_a3989b']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_color_the_selector','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_a24964']=$_ded920_local_params;$_ded920_old_vars['_a24964']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_40a72b']=$_ded920_local_params;$_ded920_old_vars['_40a72b']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 style="<?php $_ded920_old_params['_8e8154']=$_ded920_local_params;$_ded920_old_vars['_8e8154']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__last__','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
margin-bottom:3px;<?php endif;$_ded920_local_params=$_ded920_old_params['_8e8154'];$_ded920_local_vars=$_ded920_old_vars['_8e8154'];?>
background-color:<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important;color:<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important"<?php endif;$_ded920_local_params=$_ded920_old_params['_40a72b'];$_ded920_local_vars=$_ded920_old_vars['_40a72b'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_a24964'];$_ded920_local_vars=$_ded920_old_vars['_a24964'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_a3989b'];$_ded920_local_vars=$_ded920_old_vars['_a3989b'];?>
 class="dropdown-item btn-sm <?php $_ded920_old_params['_00756a']=$_ded920_local_params;$_ded920_old_vars['_00756a']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'id','eq'=>'$workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_ded920_local_params=$_ded920_old_params['_00756a'];$_ded920_local_vars=$_ded920_old_vars['_00756a'];?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?_selector=1&amp;<?php $_ded920_old_params['_8ff161']=$_ded920_local_params;$_ded920_old_vars['_8ff161']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request_method','eq'=>'GET','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_f675b3']=$_ded920_local_params;$_ded920_old_vars['_f675b3']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->modifier_replace($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'query_string','regex_replace'=>'\'/&offset=[0-9]*/\',\'\'','replace'=>'\'does_act=1\',\'\'','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&offset=[0-9]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('\\\'does_act=1\\\',\\\'\\\'','replace',$this),$this,'replace'),ENT_QUOTES)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_f675b3'];$_ded920_local_vars=$_ded920_old_vars['_f675b3'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_8ff161'];$_ded920_local_vars=$_ded920_old_vars['_8ff161'];?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
">
              <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

            </a>
            <?php else:?>

            <a class="dropdown-item btn-sm" data-toggle="modal" data-target="#modal"
                data-href="" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=workspace&amp;dialog_view=1&amp;workspace_select=1"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select...','this_tag'=>'trans'],null,$this),$this)?>
</a>
            <?php endif;$_ded920_local_params=$_ded920_old_params['_c221a1'];$_ded920_local_vars=$_ded920_old_vars['_c221a1'];?>

        <?php $_ded920_old_params['_24fecd']=$_ded920_local_params;$_ded920_old_vars['_24fecd']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
        <?php endif;$_ded920_local_params=$_ded920_old_params['_24fecd'];$_ded920_local_vars=$_ded920_old_vars['_24fecd'];?>

        <?php endif;$c_a25cce=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_a25cce'];$_ded920_local_vars=$_ded920_old_vars['_a25cce'];?>

      <div class="collapse navbar-collapse" id="navbars" <?php $_ded920_old_params['_e2e8ce']=$_ded920_local_params;$_ded920_old_vars['_e2e8ce']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_counter','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-left:-66px;z-index:0"<?php endif;$_ded920_local_params=$_ded920_old_params['_e2e8ce'];$_ded920_local_vars=$_ded920_old_vars['_e2e8ce'];?>
>
        <ul class="nav-pills navbar-nav mr-auto" id="system-panel">
        <?php $c_e02580=null;$_ded920_old_params['_e02580']=$_ded920_local_params;$_ded920_old_vars['_e02580']=$_ded920_local_vars;$a_e02580=$this->setup_args(['menu_type'=>'6','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_e02580=-1;$r_e02580=true;while($r_e02580===true):$r_e02580=($_e02580!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_e02580,$c_e02580,$this,$r_e02580,++$_e02580,'_e02580');ob_start();?>
<?php $c_e02580 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_e02580=false;}if($c_e02580 ):?>

          <?php $_ded920_old_params['_00a5cf']=$_ded920_local_params;$_ded920_old_vars['_00a5cf']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-bookmark" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_ded920_local_params=$_ded920_old_params['_00a5cf'];$_ded920_local_vars=$_ded920_old_vars['_00a5cf'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_ded920_old_params['_ff2698']=$_ded920_local_params;$_ded920_old_vars['_ff2698']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_ded920_local_params=$_ded920_old_params['_ff2698'];$_ded920_local_vars=$_ded920_old_vars['_ff2698'];?>

        <?php endif;$c_e02580=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_e02580'];$_ded920_local_vars=$_ded920_old_vars['_e02580'];?>

        <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'panel_limit','setvar'=>'panel_limit','this_tag'=>'property'],null,$this),$this),$this->setup_args('panel_limit','setvar',$this),$this,'setvar')?>

        <?php $c_1eb8d8=null;$_ded920_old_params['_1eb8d8']=$_ded920_local_params;$_ded920_old_vars['_1eb8d8']=$_ded920_local_vars;$a_1eb8d8=$this->setup_args(['limit'=>'$panel_limit','menu_type'=>'1','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_1eb8d8=-1;$r_1eb8d8=true;while($r_1eb8d8===true):$r_1eb8d8=($_1eb8d8!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_1eb8d8,$c_1eb8d8,$this,$r_1eb8d8,++$_1eb8d8,'_1eb8d8');ob_start();?>
<?php $c_1eb8d8 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_1eb8d8=false;}if($c_1eb8d8 ):?>

          <li class="nav-item <?php $_ded920_old_params['_81071e']=$_ded920_local_params;$_ded920_old_vars['_81071e']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'$model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_ded920_local_params=$_ded920_old_params['_81071e'];$_ded920_local_vars=$_ded920_old_vars['_81071e'];?>
">
            <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'label','count_chars'=>'','setvar'=>'count_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('count_chars','setvar',$this),$this,'setvar')?>
<a class="nav-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php $_ded920_old_params['_47b062']=$_ded920_local_params;$_ded920_old_vars['_47b062']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'count_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 data-toggle="tooltip" data-placement="right" title="<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
"<?php endif;$_ded920_local_params=$_ded920_old_params['_47b062'];$_ded920_local_vars=$_ded920_old_vars['_47b062'];?>
><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          </li>
        <?php endif;$c_1eb8d8=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_1eb8d8'];$_ded920_local_vars=$_ded920_old_vars['_1eb8d8'];?>

        <?php $c_19c150=null;$_ded920_old_params['_19c150']=$_ded920_local_params;$_ded920_old_vars['_19c150']=$_ded920_local_vars;$a_19c150=$this->setup_args(['limit'=>'100000','offset'=>'$panel_limit','menu_type'=>'1','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_19c150=-1;$r_19c150=true;while($r_19c150===true):$r_19c150=($_19c150!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_19c150,$c_19c150,$this,$r_19c150,++$_19c150,'_19c150');ob_start();?>
<?php $c_19c150 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_19c150=false;}if($c_19c150 ):?>

          <?php $_ded920_old_params['_b93ac1']=$_ded920_local_params;$_ded920_old_vars['_b93ac1']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-window-maximize" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_ded920_local_params=$_ded920_old_params['_b93ac1'];$_ded920_local_vars=$_ded920_old_vars['_b93ac1'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_ded920_old_params['_5166af']=$_ded920_local_params;$_ded920_old_vars['_5166af']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_ded920_local_params=$_ded920_old_params['_5166af'];$_ded920_local_vars=$_ded920_old_vars['_5166af'];?>

        <?php endif;$c_19c150=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_19c150'];$_ded920_local_vars=$_ded920_old_vars['_19c150'];?>

        <?php $c_018c22=null;$_ded920_old_params['_018c22']=$_ded920_local_params;$_ded920_old_vars['_018c22']=$_ded920_local_vars;$a_018c22=$this->setup_args(['menu_type'=>'2','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_018c22=-1;$r_018c22=true;while($r_018c22===true):$r_018c22=($_018c22!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_018c22,$c_018c22,$this,$r_018c22,++$_018c22,'_018c22');ob_start();?>
<?php $c_018c22 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_018c22=false;}if($c_018c22 ):?>

          <?php $_ded920_old_params['_30515e']=$_ded920_local_params;$_ded920_old_vars['_30515e']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cog" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_ded920_local_params=$_ded920_old_params['_30515e'];$_ded920_local_vars=$_ded920_old_vars['_30515e'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_ded920_old_params['_e45f25']=$_ded920_local_params;$_ded920_old_vars['_e45f25']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_ded920_local_params=$_ded920_old_params['_e45f25'];$_ded920_local_vars=$_ded920_old_vars['_e45f25'];?>

        <?php endif;$c_018c22=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_018c22'];$_ded920_local_vars=$_ded920_old_vars['_018c22'];?>

        <?php $c_a591f0=null;$_ded920_old_params['_a591f0']=$_ded920_local_params;$_ded920_old_vars['_a591f0']=$_ded920_local_vars;$a_a591f0=$this->setup_args(['menu_type'=>'3','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_a591f0=-1;$r_a591f0=true;while($r_a591f0===true):$r_a591f0=($_a591f0!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_a591f0,$c_a591f0,$this,$r_a591f0,++$_a591f0,'_a591f0');ob_start();?>
<?php $c_a591f0 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_a591f0=false;}if($c_a591f0 ):?>

          <?php $_ded920_old_params['_bab683']=$_ded920_local_params;$_ded920_old_vars['_bab683']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-database" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_ded920_local_params=$_ded920_old_params['_bab683'];$_ded920_local_vars=$_ded920_old_vars['_bab683'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_ded920_old_params['_ac9399']=$_ded920_local_params;$_ded920_old_vars['_ac9399']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_ded920_local_params=$_ded920_old_params['_ac9399'];$_ded920_local_vars=$_ded920_old_vars['_ac9399'];?>

        <?php endif;$c_a591f0=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_a591f0'];$_ded920_local_vars=$_ded920_old_vars['_a591f0'];?>

        <?php $c_19aa12=null;$_ded920_old_params['_19aa12']=$_ded920_local_params;$_ded920_old_vars['_19aa12']=$_ded920_local_vars;$a_19aa12=$this->setup_args(['menu_type'=>'4','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_19aa12=-1;$r_19aa12=true;while($r_19aa12===true):$r_19aa12=($_19aa12!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_19aa12,$c_19aa12,$this,$r_19aa12,++$_19aa12,'_19aa12');ob_start();?>
<?php $c_19aa12 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_19aa12=false;}if($c_19aa12 ):?>

          <?php $_ded920_old_params['_226a80']=$_ded920_local_params;$_ded920_old_vars['_226a80']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-comments" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_ded920_local_params=$_ded920_old_params['_226a80'];$_ded920_local_vars=$_ded920_old_vars['_226a80'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_ded920_old_params['_9acd5c']=$_ded920_local_params;$_ded920_old_vars['_9acd5c']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_ded920_local_params=$_ded920_old_params['_9acd5c'];$_ded920_local_vars=$_ded920_old_vars['_9acd5c'];?>

        <?php endif;$c_19aa12=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_19aa12'];$_ded920_local_vars=$_ded920_old_vars['_19aa12'];?>

        <?php $c_da3116=null;$_ded920_old_params['_da3116']=$_ded920_local_params;$_ded920_old_vars['_da3116']=$_ded920_local_vars;$a_da3116=$this->setup_args(['menu_type'=>'5','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_da3116=-1;$r_da3116=true;while($r_da3116===true):$r_da3116=($_da3116!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_da3116,$c_da3116,$this,$r_da3116,++$_da3116,'_da3116');ob_start();?>
<?php $c_da3116 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_da3116=false;}if($c_da3116 ):?>

          <?php $_ded920_old_params['_0fd5aa']=$_ded920_local_params;$_ded920_old_vars['_0fd5aa']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-user-plus" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_ded920_local_params=$_ded920_old_params['_0fd5aa'];$_ded920_local_vars=$_ded920_old_vars['_0fd5aa'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_ded920_old_params['_2d853f']=$_ded920_local_params;$_ded920_old_vars['_2d853f']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_ded920_local_params=$_ded920_old_params['_2d853f'];$_ded920_local_vars=$_ded920_old_vars['_2d853f'];?>

        <?php endif;$c_da3116=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_da3116'];$_ded920_local_vars=$_ded920_old_vars['_da3116'];?>

        <?php $c_185c50=null;$_ded920_old_params['_185c50']=$_ded920_local_params;$_ded920_old_vars['_185c50']=$_ded920_local_vars;$a_185c50=$this->setup_args(['name'=>'system_menus','this_tag'=>'loop'],null,$this);$_185c50=-1;$r_185c50=true;while($r_185c50===true):$r_185c50=($_185c50!==-1)?false:true;echo $this->block_loop($a_185c50,$c_185c50,$this,$r_185c50,++$_185c50,'_185c50');ob_start();?>
<?php $c_185c50 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_185c50=false;}if($c_185c50 ):?>

          <?php $_ded920_old_params['_b3946a']=$_ded920_local_params;$_ded920_old_vars['_b3946a']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <?php $_ded920_old_params['_769c81']=$_ded920_local_params;$_ded920_old_vars['_769c81']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<div class="badge-icon-badge"></div><?php elseif($this->conditional_elseif($this->setup_args(['name'=>'plugin_upgrade_count','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
<div class="badge-icon-badge"></div><?php endif;$_ded920_local_params=$_ded920_old_params['_769c81'];$_ded920_local_vars=$_ded920_old_vars['_769c81'];?>

            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-plug" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_ded920_local_params=$_ded920_old_params['_b3946a'];$_ded920_local_vars=$_ded920_old_vars['_b3946a'];?>

            <a <?php $_ded920_old_params['_85507c']=$_ded920_local_params;$_ded920_old_vars['_85507c']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
target="<?php echo $this->function_var($this->setup_args(['name'=>'menu_target','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_ded920_local_params=$_ded920_old_params['_85507c'];$_ded920_local_vars=$_ded920_old_vars['_85507c'];?>
 class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=<?php echo $this->function_var($this->setup_args(['name'=>'menu_mode','this_tag'=>'var'],null,$this),$this)?>
<?php $c_94ada1=null;$_ded920_old_params['_94ada1']=$_ded920_local_params;$_ded920_old_vars['_94ada1']=$_ded920_local_vars;$a_94ada1=$this->setup_args(['name'=>'menu_args','this_tag'=>'loop'],null,$this);$_94ada1=-1;$r_94ada1=true;while($r_94ada1===true):$r_94ada1=($_94ada1!==-1)?false:true;echo $this->block_loop($a_94ada1,$c_94ada1,$this,$r_94ada1,++$_94ada1,'_94ada1');ob_start();?>
<?php $c_94ada1 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_94ada1=false;}if($c_94ada1 ):?>
&amp;<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
=<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$c_94ada1=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_94ada1'];$_ded920_local_vars=$_ded920_old_vars['_94ada1'];?>
">
            <?php echo $this->function_var($this->setup_args(['name'=>'menu_label','this_tag'=>'var'],null,$this),$this)?>

            <?php $_ded920_old_params['_6a0b69']=$_ded920_local_params;$_ded920_old_vars['_6a0b69']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_mode','eq'=>'manage_scheme','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_e274d1']=$_ded920_local_params;$_ded920_old_vars['_e274d1']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="badge-icon-badge badge-icon-middle"></div>
            <?php endif;$_ded920_local_params=$_ded920_old_params['_e274d1'];$_ded920_local_vars=$_ded920_old_vars['_e274d1'];?>

            <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'menu_mode','eq'=>'manage_plugins','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_1a343c']=$_ded920_local_params;$_ded920_old_vars['_1a343c']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'plugin_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="badge-icon-badge badge-icon-middle"></div>
            <?php endif;$_ded920_local_params=$_ded920_old_params['_1a343c'];$_ded920_local_vars=$_ded920_old_vars['_1a343c'];?>

            <?php endif;$_ded920_local_params=$_ded920_old_params['_6a0b69'];$_ded920_local_vars=$_ded920_old_vars['_6a0b69'];?>

            </a>
          <?php $_ded920_old_params['_8738a3']=$_ded920_local_params;$_ded920_old_vars['_8738a3']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_ded920_local_params=$_ded920_old_params['_8738a3'];$_ded920_local_vars=$_ded920_old_vars['_8738a3'];?>

        <?php endif;$c_185c50=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_185c50'];$_ded920_local_vars=$_ded920_old_vars['_185c50'];?>

        </ul>
        <div class="header-util">
          <?php echo $this->function_var($this->setup_args(['name'=>'add_header_system','this_tag'=>'var'],null,$this),$this)?>

          <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'show_both','setvar'=>'__show_both','this_tag'=>'property'],null,$this),$this),$this->setup_args('__show_both','setvar',$this),$this,'setvar')?>

          <a href="<?php $_ded920_old_params['_852524']=$_ded920_local_params;$_ded920_old_vars['_852524']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_0cf332']=$_ded920_local_params;$_ded920_old_vars['_0cf332']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'site_url','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'link_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_0cf332'];$_ded920_local_vars=$_ded920_old_vars['_0cf332'];?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'site_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_852524'];$_ded920_local_vars=$_ded920_old_vars['_852524'];?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-external-link-square" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_ded920_old_params['_f93ad1']=$_ded920_local_params;$_ded920_old_vars['_f93ad1']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'link_url','this_tag'=>'var'],null,$this),$this)?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-globe" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_ded920_local_params=$_ded920_old_params['_f93ad1'];$_ded920_local_vars=$_ded920_old_vars['_f93ad1'];?>

        <?php $_ded920_old_params['_317f49']=$_ded920_local_params;$_ded920_old_vars['_317f49']=$_ded920_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'can_rebuild','workspace_id'=>'0','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

        <?php $c_1f3772=null;$_ded920_old_params['_1f3772']=$_ded920_local_params;$_ded920_old_vars['_1f3772']=$_ded920_local_vars;$a_1f3772=$this->setup_args(['model'=>'urlmapping','count'=>'model','group'=>'\'workspace_id\',\'model\'','workspace_id'=>'0','limit'=>'1','this_tag'=>'countgroupby'],null,$this);$_1f3772=-1;$r_1f3772=true;while($r_1f3772===true):$r_1f3772=($_1f3772!==-1)?false:true;echo $this->component('PTTags')->hdlr_countgroupby($a_1f3772,$c_1f3772,$this,$r_1f3772,++$_1f3772,'_1f3772');ob_start();?>
<?php $c_1f3772 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_1f3772=false;}if($c_1f3772 ):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild" class="popup btn btn-sm btn-secondary my-2 my-sm-0 rebuild-popup" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-refresh" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$c_1f3772=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_1f3772'];$_ded920_local_vars=$_ded920_old_vars['_1f3772'];?>

        <?php endif;$_ded920_local_params=$_ded920_old_params['_317f49'];$_ded920_local_vars=$_ded920_old_vars['_317f49'];?>

          <a style="padding:<?php $_ded920_old_params['_76e735']=$_ded920_local_params;$_ded920_old_vars['_76e735']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_photo','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
0 3px<?php else:?>
4px<?php endif;$_ded920_local_params=$_ded920_old_params['_76e735'];$_ded920_local_vars=$_ded920_old_vars['_76e735'];?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=user&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'user_id','this_tag'=>'var'],null,$this),$this)?>
&amp;_profile=1" class="btn btn-sm btn-secondary my-2 my-sm-0 profile-btn" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
">
          <?php $_ded920_old_params['_cb1c84']=$_ded920_local_params;$_ded920_old_vars['_cb1c84']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_photo','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
          <?php endif;$_ded920_local_params=$_ded920_old_params['_cb1c84'];$_ded920_local_vars=$_ded920_old_vars['_cb1c84'];?>

          </a>
          <a id="__logout" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=logout" class="btn btn-sm btn-secondary my-2 my-sm-0 logout-btn" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_ded920_old_params['_0e8cb3']=$_ded920_local_params;$_ded920_old_vars['_0e8cb3']=$_ded920_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=config" class="btn btn-sm btn-secondary my-2 my-sm-0 config-system" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Config','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-wrench" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Config','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_ded920_local_params=$_ded920_old_params['_0e8cb3'];$_ded920_local_vars=$_ded920_old_vars['_0e8cb3'];?>

        </div>
      </div>
        <?php endif;$_ded920_local_params=$_ded920_old_params['_a40749'];$_ded920_local_vars=$_ded920_old_vars['_a40749'];?>

      <?php endif;$_ded920_local_params=$_ded920_old_params['_3a894e'];$_ded920_local_vars=$_ded920_old_vars['_3a894e'];?>

      <?php endif;$_ded920_local_params=$_ded920_old_params['_05f0d9'];$_ded920_local_vars=$_ded920_old_vars['_05f0d9'];?>

      <?php $_ded920_old_params['_3e4d31']=$_ded920_local_params;$_ded920_old_vars['_3e4d31']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'member_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <div class="collapse navbar-collapse" id="navbars" <?php $_ded920_old_params['_d93f23']=$_ded920_local_params;$_ded920_old_vars['_d93f23']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_counter','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-left:-66px;z-index:0"<?php endif;$_ded920_local_params=$_ded920_old_params['_d93f23'];$_ded920_local_vars=$_ded920_old_vars['_d93f23'];?>
>
        <ul class="nav-pills navbar-nav mr-auto" id="system-panel"></ul>
          <div class="header-util">
          <?php echo $this->function_var($this->setup_args(['name'=>'add_header_workspace','this_tag'=>'var'],null,$this),$this)?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=logout<?php $_ded920_old_params['_760b0a']=$_ded920_local_params;$_ded920_old_vars['_760b0a']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_760b0a'];$_ded920_local_vars=$_ded920_old_vars['_760b0a'];?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 logout-btn" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=edit_profile<?php $_ded920_old_params['_dcf3c6']=$_ded920_local_params;$_ded920_old_vars['_dcf3c6']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_dcf3c6'];$_ded920_local_vars=$_ded920_old_vars['_dcf3c6'];?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 profile-btn" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          </div>
        </div>
      <?php endif;$_ded920_local_params=$_ded920_old_params['_3e4d31'];$_ded920_local_vars=$_ded920_old_vars['_3e4d31'];?>

    </nav>
  <?php $_ded920_old_params['_bf8220']=$_ded920_local_params;$_ded920_old_vars['_bf8220']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $_ded920_old_params['_9cfa33']=$_ded920_local_params;$_ded920_old_vars['_9cfa33']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_45cc1b']=$_ded920_local_params;$_ded920_old_vars['_45cc1b']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_ded920_old_params['_ccbee4']=$_ded920_local_params;$_ded920_old_vars['_ccbee4']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <nav class="bar navbar navbar-toggleable-md navbar-inverse bg-inverse workspace-bar"<?php $_ded920_old_params['_85dc54']=$_ded920_local_params;$_ded920_old_vars['_85dc54']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 style="z-index:1029;"<?php endif;$_ded920_local_params=$_ded920_old_params['_85dc54'];$_ded920_local_vars=$_ded920_old_vars['_85dc54'];?>
>
      <?php $_ded920_old_params['_9f3ce0']=$_ded920_local_params;$_ded920_old_vars['_9f3ce0']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <button style="background-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important;" class="navbar-toggler navbar-toggler-right btn-ws" type="button" data-toggle="collapse" data-target="#navbars-ws" aria-controls="navbars" aria-expanded="false" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </button>
      <?php endif;$_ded920_local_params=$_ded920_old_params['_9f3ce0'];$_ded920_local_vars=$_ded920_old_vars['_9f3ce0'];?>

      <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'workspace_name','count_chars'=>'','setvar'=>'workspace_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('workspace_chars','setvar',$this),$this,'setvar')?>
<a class="navbar-brand brand-workspace" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=dashboard&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
"<?php $_ded920_old_params['_ce5433']=$_ded920_local_params;$_ded920_old_vars['_ce5433']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 title="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php endif;$_ded920_local_params=$_ded920_old_params['_ce5433'];$_ded920_local_vars=$_ded920_old_vars['_ce5433'];?>
><?php echo $this->modifier_trim_to(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'','trim_to'=>'20+...','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('20+...','trim_to',$this),$this,'trim_to')?>
</a>
      <div class="collapse navbar-collapse" id="navbars-ws">
        <ul class="nav-pills navbar-nav mr-auto">
          <?php $c_400f43=null;$_ded920_old_params['_400f43']=$_ded920_local_params;$_ded920_old_vars['_400f43']=$_ded920_local_vars;$a_400f43=$this->setup_args(['type'=>'display_space','menu_type'=>'6','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_400f43=-1;$r_400f43=true;while($r_400f43===true):$r_400f43=($_400f43!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_400f43,$c_400f43,$this,$r_400f43,++$_400f43,'_400f43');ob_start();?>
<?php $c_400f43 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_400f43=false;}if($c_400f43 ):?>

            <?php $_ded920_old_params['_7b19e5']=$_ded920_local_params;$_ded920_old_vars['_7b19e5']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <li class="nav-item dropdown">
              <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-bookmark" aria-hidden="true"></i>
                <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
</span>
              </a>
              <div class="dropdown-menu">
            <?php endif;$_ded920_local_params=$_ded920_old_params['_7b19e5'];$_ded920_local_vars=$_ded920_old_vars['_7b19e5'];?>

              <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_ded920_old_params['_2b67ce']=$_ded920_local_params;$_ded920_old_vars['_2b67ce']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_2b67ce'];$_ded920_local_vars=$_ded920_old_vars['_2b67ce'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
            <?php $_ded920_old_params['_4a1a77']=$_ded920_local_params;$_ded920_old_vars['_4a1a77']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
              </li>
            <?php endif;$_ded920_local_params=$_ded920_old_params['_4a1a77'];$_ded920_local_vars=$_ded920_old_vars['_4a1a77'];?>

          <?php endif;$c_400f43=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_400f43'];$_ded920_local_vars=$_ded920_old_vars['_400f43'];?>

        <?php $c_1f4388=null;$_ded920_old_params['_1f4388']=$_ded920_local_params;$_ded920_old_vars['_1f4388']=$_ded920_local_vars;$a_1f4388=$this->setup_args(['limit'=>'$panel_limit','type'=>'display_space','menu_type'=>'1','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_1f4388=-1;$r_1f4388=true;while($r_1f4388===true):$r_1f4388=($_1f4388!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_1f4388,$c_1f4388,$this,$r_1f4388,++$_1f4388,'_1f4388');ob_start();?>
<?php $c_1f4388 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_1f4388=false;}if($c_1f4388 ):?>

          <li class="nav-item nav-item-ws <?php $_ded920_old_params['_a9dc83']=$_ded920_local_params;$_ded920_old_vars['_a9dc83']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'$model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_ded920_local_params=$_ded920_old_params['_a9dc83'];$_ded920_local_vars=$_ded920_old_vars['_a9dc83'];?>
">
            <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'label','count_chars'=>'','setvar'=>'count_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('count_chars','setvar',$this),$this,'setvar')?>
<a class="nav-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_ded920_old_params['_5eb16f']=$_ded920_local_params;$_ded920_old_vars['_5eb16f']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_5eb16f'];$_ded920_local_vars=$_ded920_old_vars['_5eb16f'];?>
"<?php $_ded920_old_params['_4a278f']=$_ded920_local_params;$_ded920_old_vars['_4a278f']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'count_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 data-toggle="tooltip" data-placement="right" title="<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
"<?php endif;$_ded920_local_params=$_ded920_old_params['_4a278f'];$_ded920_local_vars=$_ded920_old_vars['_4a278f'];?>
><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          </li>
        <?php endif;$c_1f4388=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_1f4388'];$_ded920_local_vars=$_ded920_old_vars['_1f4388'];?>

        <?php $c_974de2=null;$_ded920_old_params['_974de2']=$_ded920_local_params;$_ded920_old_vars['_974de2']=$_ded920_local_vars;$a_974de2=$this->setup_args(['limit'=>'100000','offset'=>'$panel_limit','type'=>'display_space','menu_type'=>'1','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_974de2=-1;$r_974de2=true;while($r_974de2===true):$r_974de2=($_974de2!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_974de2,$c_974de2,$this,$r_974de2,++$_974de2,'_974de2');ob_start();?>
<?php $c_974de2 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_974de2=false;}if($c_974de2 ):?>

          <?php $_ded920_old_params['_04007f']=$_ded920_local_params;$_ded920_old_vars['_04007f']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-window-maximize" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_ded920_local_params=$_ded920_old_params['_04007f'];$_ded920_local_vars=$_ded920_old_vars['_04007f'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_ded920_old_params['_4b0fa4']=$_ded920_local_params;$_ded920_old_vars['_4b0fa4']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_4b0fa4'];$_ded920_local_vars=$_ded920_old_vars['_4b0fa4'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_ded920_old_params['_f6d0ff']=$_ded920_local_params;$_ded920_old_vars['_f6d0ff']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_ded920_local_params=$_ded920_old_params['_f6d0ff'];$_ded920_local_vars=$_ded920_old_vars['_f6d0ff'];?>

        <?php endif;$c_974de2=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_974de2'];$_ded920_local_vars=$_ded920_old_vars['_974de2'];?>

        <?php $c_11d556=null;$_ded920_old_params['_11d556']=$_ded920_local_params;$_ded920_old_vars['_11d556']=$_ded920_local_vars;$a_11d556=$this->setup_args(['type'=>'display_space','menu_type'=>'2','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_11d556=-1;$r_11d556=true;while($r_11d556===true):$r_11d556=($_11d556!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_11d556,$c_11d556,$this,$r_11d556,++$_11d556,'_11d556');ob_start();?>
<?php $c_11d556 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_11d556=false;}if($c_11d556 ):?>

          <?php $_ded920_old_params['_d982bc']=$_ded920_local_params;$_ded920_old_vars['_d982bc']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cog" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_ded920_local_params=$_ded920_old_params['_d982bc'];$_ded920_local_vars=$_ded920_old_vars['_d982bc'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_ded920_old_params['_ea0422']=$_ded920_local_params;$_ded920_old_vars['_ea0422']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_ea0422'];$_ded920_local_vars=$_ded920_old_vars['_ea0422'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_ded920_old_params['_250153']=$_ded920_local_params;$_ded920_old_vars['_250153']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_ded920_local_params=$_ded920_old_params['_250153'];$_ded920_local_vars=$_ded920_old_vars['_250153'];?>

        <?php endif;$c_11d556=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_11d556'];$_ded920_local_vars=$_ded920_old_vars['_11d556'];?>

        <?php $c_4a1283=null;$_ded920_old_params['_4a1283']=$_ded920_local_params;$_ded920_old_vars['_4a1283']=$_ded920_local_vars;$a_4a1283=$this->setup_args(['type'=>'display_space','menu_type'=>'3','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_4a1283=-1;$r_4a1283=true;while($r_4a1283===true):$r_4a1283=($_4a1283!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_4a1283,$c_4a1283,$this,$r_4a1283,++$_4a1283,'_4a1283');ob_start();?>
<?php $c_4a1283 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_4a1283=false;}if($c_4a1283 ):?>

          <?php $_ded920_old_params['_ec1099']=$_ded920_local_params;$_ded920_old_vars['_ec1099']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-database" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_ded920_local_params=$_ded920_old_params['_ec1099'];$_ded920_local_vars=$_ded920_old_vars['_ec1099'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_ded920_old_params['_afeb99']=$_ded920_local_params;$_ded920_old_vars['_afeb99']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_afeb99'];$_ded920_local_vars=$_ded920_old_vars['_afeb99'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_ded920_old_params['_1ba158']=$_ded920_local_params;$_ded920_old_vars['_1ba158']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_ded920_local_params=$_ded920_old_params['_1ba158'];$_ded920_local_vars=$_ded920_old_vars['_1ba158'];?>

        <?php endif;$c_4a1283=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_4a1283'];$_ded920_local_vars=$_ded920_old_vars['_4a1283'];?>

        <?php $c_7beae7=null;$_ded920_old_params['_7beae7']=$_ded920_local_params;$_ded920_old_vars['_7beae7']=$_ded920_local_vars;$a_7beae7=$this->setup_args(['type'=>'display_space','menu_type'=>'4','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_7beae7=-1;$r_7beae7=true;while($r_7beae7===true):$r_7beae7=($_7beae7!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_7beae7,$c_7beae7,$this,$r_7beae7,++$_7beae7,'_7beae7');ob_start();?>
<?php $c_7beae7 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_7beae7=false;}if($c_7beae7 ):?>

          <?php $_ded920_old_params['_e57460']=$_ded920_local_params;$_ded920_old_vars['_e57460']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-comments" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_ded920_local_params=$_ded920_old_params['_e57460'];$_ded920_local_vars=$_ded920_old_vars['_e57460'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_ded920_old_params['_7c3573']=$_ded920_local_params;$_ded920_old_vars['_7c3573']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_7c3573'];$_ded920_local_vars=$_ded920_old_vars['_7c3573'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_ded920_old_params['_82364b']=$_ded920_local_params;$_ded920_old_vars['_82364b']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_ded920_local_params=$_ded920_old_params['_82364b'];$_ded920_local_vars=$_ded920_old_vars['_82364b'];?>

        <?php endif;$c_7beae7=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_7beae7'];$_ded920_local_vars=$_ded920_old_vars['_7beae7'];?>

        <?php $c_dc8ad2=null;$_ded920_old_params['_dc8ad2']=$_ded920_local_params;$_ded920_old_vars['_dc8ad2']=$_ded920_local_vars;$a_dc8ad2=$this->setup_args(['type'=>'display_space','menu_type'=>'5','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_dc8ad2=-1;$r_dc8ad2=true;while($r_dc8ad2===true):$r_dc8ad2=($_dc8ad2!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_dc8ad2,$c_dc8ad2,$this,$r_dc8ad2,++$_dc8ad2,'_dc8ad2');ob_start();?>
<?php $c_dc8ad2 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_dc8ad2=false;}if($c_dc8ad2 ):?>

          <?php $_ded920_old_params['_eed491']=$_ded920_local_params;$_ded920_old_vars['_eed491']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-user-plus" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_ded920_local_params=$_ded920_old_params['_eed491'];$_ded920_local_vars=$_ded920_old_vars['_eed491'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_ded920_old_params['_68ed96']=$_ded920_local_params;$_ded920_old_vars['_68ed96']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_68ed96'];$_ded920_local_vars=$_ded920_old_vars['_68ed96'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_ded920_old_params['_5071c0']=$_ded920_local_params;$_ded920_old_vars['_5071c0']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_ded920_local_params=$_ded920_old_params['_5071c0'];$_ded920_local_vars=$_ded920_old_vars['_5071c0'];?>

        <?php endif;$c_dc8ad2=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_dc8ad2'];$_ded920_local_vars=$_ded920_old_vars['_dc8ad2'];?>

        <?php $c_7240a9=null;$_ded920_old_params['_7240a9']=$_ded920_local_params;$_ded920_old_vars['_7240a9']=$_ded920_local_vars;$a_7240a9=$this->setup_args(['name'=>'workspace_menus','this_tag'=>'loop'],null,$this);$_7240a9=-1;$r_7240a9=true;while($r_7240a9===true):$r_7240a9=($_7240a9!==-1)?false:true;echo $this->block_loop($a_7240a9,$c_7240a9,$this,$r_7240a9,++$_7240a9,'_7240a9');ob_start();?>
<?php $c_7240a9 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_7240a9=false;}if($c_7240a9 ):?>

          <?php $_ded920_old_params['_896fb5']=$_ded920_local_params;$_ded920_old_vars['_896fb5']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-plug" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_ded920_local_params=$_ded920_old_params['_896fb5'];$_ded920_local_vars=$_ded920_old_vars['_896fb5'];?>

            <a <?php $_ded920_old_params['_335051']=$_ded920_local_params;$_ded920_old_vars['_335051']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
target="<?php echo $this->function_var($this->setup_args(['name'=>'menu_target','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_ded920_local_params=$_ded920_old_params['_335051'];$_ded920_local_vars=$_ded920_old_vars['_335051'];?>
 class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=<?php echo $this->function_var($this->setup_args(['name'=>'menu_mode','this_tag'=>'var'],null,$this),$this)?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_b58329=null;$_ded920_old_params['_b58329']=$_ded920_local_params;$_ded920_old_vars['_b58329']=$_ded920_local_vars;$a_b58329=$this->setup_args(['name'=>'menu_args','this_tag'=>'loop'],null,$this);$_b58329=-1;$r_b58329=true;while($r_b58329===true):$r_b58329=($_b58329!==-1)?false:true;echo $this->block_loop($a_b58329,$c_b58329,$this,$r_b58329,++$_b58329,'_b58329');ob_start();?>
<?php $c_b58329 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_b58329=false;}if($c_b58329 ):?>
&amp;<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
=<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$c_b58329=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_b58329'];$_ded920_local_vars=$_ded920_old_vars['_b58329'];?>
"><?php echo $this->function_var($this->setup_args(['name'=>'menu_label','this_tag'=>'var'],null,$this),$this)?>
</a>
          <?php $_ded920_old_params['_61a96e']=$_ded920_local_params;$_ded920_old_vars['_61a96e']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_ded920_local_params=$_ded920_old_params['_61a96e'];$_ded920_local_vars=$_ded920_old_vars['_61a96e'];?>

        <?php endif;$c_7240a9=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_7240a9'];$_ded920_local_vars=$_ded920_old_vars['_7240a9'];?>

        </ul>
        <div class="header-util">
          <a href="<?php $_ded920_old_params['_20e589']=$_ded920_local_params;$_ded920_old_vars['_20e589']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_880cd9']=$_ded920_local_params;$_ded920_old_vars['_880cd9']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_url','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_880cd9'];$_ded920_local_vars=$_ded920_old_vars['_880cd9'];?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_20e589'];$_ded920_local_vars=$_ded920_old_vars['_20e589'];?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-external-link-square" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_ded920_old_params['_b09ae0']=$_ded920_local_params;$_ded920_old_vars['_b09ae0']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_ded920_old_params['_31988a']=$_ded920_local_params;$_ded920_old_vars['_31988a']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'var'],null,$this),$this)?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-globe" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_ded920_local_params=$_ded920_old_params['_31988a'];$_ded920_local_vars=$_ded920_old_vars['_31988a'];?>

          <?php endif;$_ded920_local_params=$_ded920_old_params['_b09ae0'];$_ded920_local_vars=$_ded920_old_vars['_b09ae0'];?>

        <?php $_ded920_old_params['_6dbd1a']=$_ded920_local_params;$_ded920_old_vars['_6dbd1a']=$_ded920_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'can_rebuild','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

        <?php $c_e944fd=null;$_ded920_old_params['_e944fd']=$_ded920_local_params;$_ded920_old_vars['_e944fd']=$_ded920_local_vars;$a_e944fd=$this->setup_args(['model'=>'urlmapping','count'=>'model','group'=>'\'workspace_id\',\'model\'','workspace_id'=>'$workspace_id','limit'=>'1','this_tag'=>'countgroupby'],null,$this);$_e944fd=-1;$r_e944fd=true;while($r_e944fd===true):$r_e944fd=($_e944fd!==-1)?false:true;echo $this->component('PTTags')->hdlr_countgroupby($a_e944fd,$c_e944fd,$this,$r_e944fd,++$_e944fd,'_e944fd');ob_start();?>
<?php $c_e944fd = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_e944fd=false;}if($c_e944fd ):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
" class="popup btn btn-sm btn-secondary my-2 my-sm-0 rebuild-popup" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-refresh" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$c_e944fd=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_e944fd'];$_ded920_local_vars=$_ded920_old_vars['_e944fd'];?>

        <?php endif;$_ded920_local_params=$_ded920_old_params['_6dbd1a'];$_ded920_local_vars=$_ded920_old_vars['_6dbd1a'];?>

        <?php $_ded920_old_params['_0f9e95']=$_ded920_local_params;$_ded920_old_vars['_0f9e95']=$_ded920_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'edit','model'=>'workspace','id'=>'$workspace_id','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=workspace&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 config-workspace" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Settings','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-wrench" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpace Settings','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$_ded920_local_params=$_ded920_old_params['_0f9e95'];$_ded920_local_vars=$_ded920_old_vars['_0f9e95'];?>

        </div>
      </div>
    </nav>
      <?php endif;$_ded920_local_params=$_ded920_old_params['_ccbee4'];$_ded920_local_vars=$_ded920_old_vars['_ccbee4'];?>

    <?php endif;$_ded920_local_params=$_ded920_old_params['_45cc1b'];$_ded920_local_vars=$_ded920_old_vars['_45cc1b'];?>

<?php $_ded920_old_params['_8fef86']=$_ded920_local_params;$_ded920_old_vars['_8fef86']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  </div>
<?php endif;$_ded920_local_params=$_ded920_old_params['_8fef86'];$_ded920_local_vars=$_ded920_old_vars['_8fef86'];?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'can_action','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'disp_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_ded920_old_params['_86dba7']=$_ded920_local_params;$_ded920_old_vars['_86dba7']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'child_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_ded920_old_params['_d9cb20']=$_ded920_local_params;$_ded920_old_vars['_d9cb20']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_ded920_local_params=$_ded920_old_params['_d9cb20'];$_ded920_local_vars=$_ded920_old_vars['_d9cb20'];?>

    <?php endif;$_ded920_local_params=$_ded920_old_params['_86dba7'];$_ded920_local_vars=$_ded920_old_vars['_86dba7'];?>

    <?php $_ded920_old_params['_3c9f1d']=$_ded920_local_params;$_ded920_old_vars['_3c9f1d']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_ded920_local_params=$_ded920_old_params['_3c9f1d'];$_ded920_local_vars=$_ded920_old_vars['_3c9f1d'];?>

    <?php $_ded920_old_params['_685b72']=$_ded920_local_params;$_ded920_old_vars['_685b72']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_ded920_old_params['_9828df']=$_ded920_local_params;$_ded920_old_vars['_9828df']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','ne'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_ded920_local_params=$_ded920_old_params['_9828df'];$_ded920_local_vars=$_ded920_old_vars['_9828df'];?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'comment','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'attachmentfile','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'contact','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_ded920_local_params=$_ded920_old_params['_685b72'];$_ded920_local_vars=$_ded920_old_vars['_685b72'];?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'output_container','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <div class="container-fluid">
    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_ded920_old_params['_a38673']=$_ded920_local_params;$_ded920_old_vars['_a38673']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_ded920_old_params['_f45efb']=$_ded920_local_params;$_ded920_old_vars['_f45efb']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_ded920_old_params['_13a526']=$_ded920_local_params;$_ded920_old_vars['_13a526']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_ded920_old_params['_b8b4d1']=$_ded920_local_params;$_ded920_old_vars['_b8b4d1']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php $_ded920_old_params['_24f2bd']=$_ded920_local_params;$_ded920_old_vars['_24f2bd']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="single_select" value="1"><?php endif;$_ded920_local_params=$_ded920_old_params['_24f2bd'];$_ded920_local_vars=$_ded920_old_vars['_24f2bd'];?>

            <?php $_ded920_old_params['_73a314']=$_ded920_local_params;$_ded920_old_vars['_73a314']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._from_scope','ne'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_from_scope" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php endif;$_ded920_local_params=$_ded920_old_params['_73a314'];$_ded920_local_vars=$_ded920_old_vars['_73a314'];?>

          <?php $_ded920_old_params['_ad870d']=$_ded920_local_params;$_ded920_old_vars['_ad870d']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
          <?php endif;$_ded920_local_params=$_ded920_old_params['_ad870d'];$_ded920_local_vars=$_ded920_old_vars['_ad870d'];?>

          <?php $_ded920_old_params['_2aca33']=$_ded920_local_params;$_ded920_old_vars['_2aca33']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="manage_revision" value="1">
          <?php endif;$_ded920_local_params=$_ded920_old_params['_2aca33'];$_ded920_local_vars=$_ded920_old_vars['_2aca33'];?>

          <?php $_ded920_old_params['_8ad540']=$_ded920_local_params;$_ded920_old_vars['_8ad540']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="dialog_view" value="1">
            <?php $_ded920_old_params['_a9b126']=$_ded920_local_params;$_ded920_old_vars['_a9b126']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_ded920_local_params=$_ded920_old_params['_a9b126'];$_ded920_local_vars=$_ded920_old_vars['_a9b126'];?>

          <?php $_ded920_old_params['_345eb2']=$_ded920_local_params;$_ded920_old_vars['_345eb2']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
          <?php endif;$_ded920_local_params=$_ded920_old_params['_345eb2'];$_ded920_local_vars=$_ded920_old_vars['_345eb2'];?>

            <?php $_ded920_old_params['_76a674']=$_ded920_local_params;$_ded920_old_vars['_76a674']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
              <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_ded920_local_params=$_ded920_old_params['_76a674'];$_ded920_local_vars=$_ded920_old_vars['_76a674'];?>

          <?php endif;$_ded920_local_params=$_ded920_old_params['_8ad540'];$_ded920_local_vars=$_ded920_old_vars['_8ad540'];?>

          <?php $_ded920_old_params['_fb588d']=$_ded920_local_params;$_ded920_old_vars['_fb588d']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_select" value="1">
          <?php endif;$_ded920_local_params=$_ded920_old_params['_fb588d'];$_ded920_local_vars=$_ded920_old_vars['_fb588d'];?>

          <?php $_ded920_old_params['_921967']=$_ded920_local_params;$_ded920_old_vars['_921967']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="selected_ids" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="from_obj" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.from_obj','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php $_ded920_old_params['_55120b']=$_ded920_local_params;$_ded920_old_vars['_55120b']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="select_add" value="1">
          <?php endif;$_ded920_local_params=$_ded920_old_params['_55120b'];$_ded920_local_vars=$_ded920_old_vars['_55120b'];?>

          <?php $_ded920_old_params['_28282b']=$_ded920_local_params;$_ded920_old_vars['_28282b']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ids_only','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ids_only" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ids_only','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php endif;$_ded920_local_params=$_ded920_old_params['_28282b'];$_ded920_local_vars=$_ded920_old_vars['_28282b'];?>

          <?php endif;$_ded920_local_params=$_ded920_old_params['_921967'];$_ded920_local_vars=$_ded920_old_vars['_921967'];?>

            <div class="modal-body">
              <div class="container-fluid">
                <?php $_ded920_old_params['_6be0cc']=$_ded920_local_params;$_ded920_old_vars['_6be0cc']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <?php $c_d64ff0=null;$_ded920_old_params['_d64ff0']=$_ded920_local_params;$_ded920_old_vars['_d64ff0']=$_ded920_local_vars;$a_d64ff0=$this->setup_args(['name'=>'system_filters','this_tag'=>'loop'],null,$this);$_d64ff0=-1;$r_d64ff0=true;while($r_d64ff0===true):$r_d64ff0=($_d64ff0!==-1)?false:true;echo $this->block_loop($a_d64ff0,$c_d64ff0,$this,$r_d64ff0,++$_d64ff0,'_d64ff0');ob_start();?>
<?php $c_d64ff0 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_d64ff0=false;}if($c_d64ff0 ):?>

                      <?php $_ded920_old_params['_b71dac']=$_ded920_local_params;$_ded920_old_vars['_b71dac']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select_system_filters" id="select_system_filters">
                        <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php endif;$_ded920_local_params=$_ded920_old_params['_b71dac'];$_ded920_local_vars=$_ded920_old_vars['_b71dac'];?>

                        <option <?php $_ded920_old_params['_daf9df']=$_ded920_local_params;$_ded920_old_vars['_daf9df']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'input','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
data-input="1" data-hint="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'hint','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php endif;$_ded920_local_params=$_ded920_old_params['_daf9df'];$_ded920_local_vars=$_ded920_old_vars['_daf9df'];?>
data-option="<?php echo $this->function_var($this->setup_args(['name'=>'option','this_tag'=>'var'],null,$this),$this)?>
" <?php $_ded920_old_params['_64dedf']=$_ded920_local_params;$_ded920_old_vars['_64dedf']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_system_filter','eq'=>'$name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_ded920_local_params=$_ded920_old_params['_64dedf'];$_ded920_local_vars=$_ded920_old_vars['_64dedf'];?>
 value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php $_ded920_old_params['_431f4f']=$_ded920_local_params;$_ded920_old_vars['_431f4f']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        </select>
                      <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="system_filter-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                      <?php endif;$_ded920_local_params=$_ded920_old_params['_431f4f'];$_ded920_local_vars=$_ded920_old_vars['_431f4f'];?>

                    <?php endif;$c_d64ff0=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_d64ff0'];$_ded920_local_vars=$_ded920_old_vars['_d64ff0'];?>

                  </div>
                </div>
                <?php endif;$_ded920_local_params=$_ded920_old_params['_6be0cc'];$_ded920_local_vars=$_ded920_old_vars['_6be0cc'];?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Your Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select-user_filters" id="select-user_filters">
                      <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php $c_f3d310=null;$_ded920_old_params['_f3d310']=$_ded920_local_params;$_ded920_old_vars['_f3d310']=$_ded920_local_vars;$a_f3d310=$this->setup_args(['model'=>'option','kind'=>'list_filter','key'=>'$model','user_id'=>'$user_id','workspace_id'=>'$workspace_id','this_tag'=>'objectloop'],null,$this);$_f3d310=-1;$r_f3d310=true;while($r_f3d310===true):$r_f3d310=($_f3d310!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_f3d310,$c_f3d310,$this,$r_f3d310,++$_f3d310,'_f3d310');ob_start();?>
<?php $c_f3d310 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_f3d310=false;}if($c_f3d310 ):?>

                      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_ded920_old_params['_8a4675']=$_ded920_local_params;$_ded920_old_vars['_8a4675']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_filter_id','eq'=>'$id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_ded920_local_params=$_ded920_old_params['_8a4675'];$_ded920_local_vars=$_ded920_old_vars['_8a4675'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'value','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php endif;$c_f3d310=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_f3d310'];$_ded920_local_vars=$_ded920_old_vars['_f3d310'];?>

                      <option value="add_new_filter"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Add New Filter','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    </select>
                    <?php $_ded920_old_params['_9dcae1']=$_ded920_local_params;$_ded920_old_vars['_9dcae1']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="filter-select-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <button type="button" class="delete-filter-elem hidden delete-bun-sm btn btn-secondary btn-sm filter-selecter-ctrl" id="filter-select-delete-button" class="close" data-dismiss="modal">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Delete','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    </button>
                    <?php endif;$_ded920_local_params=$_ded920_old_params['_9dcae1'];$_ded920_local_vars=$_ded920_old_vars['_9dcae1'];?>

                  </div>
                </div>
                <div class="row form-group new-filter-elem hidden">
                  <div class="col-md-3" style="float:left;"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" name="filters-selector" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" id="filters-selector">
                    <?php $c_a477a5=null;$_ded920_old_params['_a477a5']=$_ded920_local_params;$_ded920_old_vars['_a477a5']=$_ded920_local_vars;$a_a477a5=$this->setup_args(['name'=>'filter_options','this_tag'=>'loop'],null,$this);$_a477a5=-1;$r_a477a5=true;while($r_a477a5===true):$r_a477a5=($_a477a5!==-1)?false:true;echo $this->block_loop($a_a477a5,$c_a477a5,$this,$r_a477a5,++$_a477a5,'_a477a5');ob_start();?>
<?php $c_a477a5 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_a477a5=false;}if($c_a477a5 ):?>

                    <?php $_ded920_old_params['_fd7380']=$_ded920_local_params;$_ded920_old_vars['_fd7380']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <option><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    <?php endif;$_ded920_local_params=$_ded920_old_params['_fd7380'];$_ded920_local_vars=$_ded920_old_vars['_fd7380'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" class="coltype_<?php $_ded920_old_params['_eeb691']=$_ded920_local_params;$_ded920_old_vars['_eeb691']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'created_by','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
reference<?php else:?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_eeb691'];$_ded920_local_vars=$_ded920_old_vars['_eeb691'];?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php endif;$c_a477a5=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_a477a5'];$_ded920_local_vars=$_ded920_old_vars['_a477a5'];?>

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

                              <input type="datetime-local" step="<?php $_ded920_old_params['_d22d5a']=$_ded920_local_params;$_ded920_old_vars['_d22d5a']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'time_step','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'time_step','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
1<?php endif;$_ded920_local_params=$_ded920_old_params['_d22d5a'];$_ded920_local_vars=$_ded920_old_vars['_d22d5a'];?>
" class="form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="" value="<?php $_ded920_old_params['_467aec']=$_ded920_local_params;$_ded920_old_vars['_467aec']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'published_on_default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_format_ts($this->function_date($this->setup_args(['format'=>'$published_on_default','format_ts'=>'Y-m-d\\TH:i:s','this_tag'=>'date'],null,$this),$this),$this->setup_args('Y-m-d\\\\TH:i:s','format_ts',$this),$this,'format_ts')?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_467aec'];$_ded920_local_vars=$_ded920_old_vars['_467aec'];?>
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

                            <?php $_ded920_old_params['_8b4326']=$_ded920_local_params;$_ded920_old_vars['_8b4326']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'status_options','split'=>',','setvar'=>'status_label','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                            <?php else:?>

                              <?php $_ded920_old_params['_809e80']=$_ded920_local_params;$_ded920_old_vars['_809e80']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Draft,Review,Approval Pending,Reserved,Publish,Ended','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php else:?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Disable,Enable','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php endif;$_ded920_local_params=$_ded920_old_params['_809e80'];$_ded920_local_vars=$_ded920_old_vars['_809e80'];?>

                            <?php endif;$_ded920_local_params=$_ded920_old_params['_8b4326'];$_ded920_local_vars=$_ded920_old_vars['_8b4326'];?>

                            <select class="form-control form-control-sm custom-select short filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <?php $_ded920_old_params['_736f9c']=$_ded920_local_params;$_ded920_old_vars['_736f9c']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                            <?php $c_fd3cb1=null;$_ded920_old_params['_fd3cb1']=$_ded920_local_params;$_ded920_old_vars['_fd3cb1']=$_ded920_local_vars;$a_fd3cb1=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_fd3cb1=-1;$r_fd3cb1=true;while($r_fd3cb1===true):$r_fd3cb1=($_fd3cb1!==-1)?false:true;echo $this->block_loop($a_fd3cb1,$c_fd3cb1,$this,$r_fd3cb1,++$_fd3cb1,'_fd3cb1');ob_start();?>
<?php $c_fd3cb1 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_fd3cb1=false;}if($c_fd3cb1 ):?>

                              <?php $_ded920_old_params['_94a300']=$_ded920_local_params;$_ded920_old_vars['_94a300']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__index__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php $_ded920_old_params['_67a025']=$_ded920_local_params;$_ded920_old_vars['_67a025']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__index__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_ded920_local_params=$_ded920_old_params['_67a025'];$_ded920_local_vars=$_ded920_old_vars['_67a025'];?>

                              <?php endif;$_ded920_local_params=$_ded920_old_params['_94a300'];$_ded920_local_vars=$_ded920_old_vars['_94a300'];?>

                            <?php endif;$c_fd3cb1=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_fd3cb1'];$_ded920_local_vars=$_ded920_old_vars['_fd3cb1'];?>

                            <?php else:?>

                            <?php $c_0420e1=null;$_ded920_old_params['_0420e1']=$_ded920_local_params;$_ded920_old_vars['_0420e1']=$_ded920_local_vars;$a_0420e1=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_0420e1=-1;$r_0420e1=true;while($r_0420e1===true):$r_0420e1=($_0420e1!==-1)?false:true;echo $this->block_loop($a_0420e1,$c_0420e1,$this,$r_0420e1,++$_0420e1,'_0420e1');ob_start();?>
<?php $c_0420e1 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_0420e1=false;}if($c_0420e1 ):?>

                              <?php $_ded920_old_params['_741911']=$_ded920_local_params;$_ded920_old_vars['_741911']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_ded920_local_params=$_ded920_old_params['_741911'];$_ded920_local_vars=$_ded920_old_vars['_741911'];?>

                            <?php endif;$c_0420e1=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_0420e1'];$_ded920_local_vars=$_ded920_old_vars['_0420e1'];?>

                            <?php endif;$_ded920_local_params=$_ded920_old_params['_736f9c'];$_ded920_local_vars=$_ded920_old_vars['_736f9c'];?>

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
            <?php $_ded920_old_params['_723989']=$_ded920_local_params;$_ded920_old_vars['_723989']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            loc += '&workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
            <?php endif;$_ded920_local_params=$_ded920_old_params['_723989'];$_ded920_local_vars=$_ded920_old_vars['_723989'];?>

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
          <?php endif;$_ded920_local_params=$_ded920_old_params['_b8b4d1'];$_ded920_local_vars=$_ded920_old_vars['_b8b4d1'];?>

          <?php $_ded920_old_params['_b85494']=$_ded920_local_params;$_ded920_old_vars['_b85494']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php ob_start();$_ded920_old_params['_9ad848']=$_ded920_local_params;$_ded920_old_vars['_9ad848']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
      <?php $_ded920_old_params['_736611']=$_ded920_local_params;$_ded920_old_vars['_736611']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
      <?php endif;$_ded920_local_params=$_ded920_old_params['_736611'];$_ded920_local_vars=$_ded920_old_vars['_736611'];?>

      <?php $_ded920_old_params['_6ef956']=$_ded920_local_params;$_ded920_old_vars['_6ef956']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_select" value="1">
      <?php endif;$_ded920_local_params=$_ded920_old_params['_6ef956'];$_ded920_local_vars=$_ded920_old_vars['_6ef956'];?>

      <?php $_ded920_old_params['_f90ec7']=$_ded920_local_params;$_ded920_old_vars['_f90ec7']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="dialog_view" value="1">
        <?php $_ded920_old_params['_a0db41']=$_ded920_local_params;$_ded920_old_vars['_a0db41']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <?php endif;$_ded920_local_params=$_ded920_old_params['_a0db41'];$_ded920_local_vars=$_ded920_old_vars['_a0db41'];?>

          <?php $_ded920_old_params['_6aa120']=$_ded920_local_params;$_ded920_old_vars['_6aa120']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="single_select" value="1">
          <?php endif;$_ded920_local_params=$_ded920_old_params['_6aa120'];$_ded920_local_vars=$_ded920_old_vars['_6aa120'];?>

        <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php $_ded920_old_params['_55465f']=$_ded920_local_params;$_ded920_old_vars['_55465f']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php endif;$_ded920_local_params=$_ded920_old_params['_55465f'];$_ded920_local_vars=$_ded920_old_vars['_55465f'];?>

      <?php endif;$_ded920_local_params=$_ded920_old_params['_f90ec7'];$_ded920_local_vars=$_ded920_old_vars['_f90ec7'];?>

        <input type="hidden" name="return_args" value="<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'selected_ids_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
">
        <div class="modal-body">
          <div class="container-fluid">
          <?php $_ded920_old_params['_ce6eb5']=$_ded920_local_params;$_ded920_old_vars['_ce6eb5']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_ded920_old_params['_319b11']=$_ded920_local_params;$_ded920_old_vars['_319b11']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <?php $c_626000=null;$_ded920_old_params['_626000']=$_ded920_local_params;$_ded920_old_vars['_626000']=$_ded920_local_vars;$a_626000=$this->setup_args(['name'=>'disp_options','this_tag'=>'loop'],null,$this);$_626000=-1;$r_626000=true;while($r_626000===true):$r_626000=($_626000!==-1)?false:true;echo $this->block_loop($a_626000,$c_626000,$this,$r_626000,++$_626000,'_626000');ob_start();?>
<?php $c_626000 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_626000=false;}if($c_626000 ):?>

            <?php $_ded920_old_params['_768b0d']=$_ded920_local_params;$_ded920_old_vars['_768b0d']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
            <?php endif;$_ded920_local_params=$_ded920_old_params['_768b0d'];$_ded920_local_vars=$_ded920_old_vars['_768b0d'];?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_ded920_old_params['_ee6075']=$_ded920_local_params;$_ded920_old_vars['_ee6075']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php $_ded920_old_params['_c834c8']=$_ded920_local_params;$_ded920_old_vars['_c834c8']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__key__','eq'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_ded920_local_params=$_ded920_old_params['_c834c8'];$_ded920_local_vars=$_ded920_old_vars['_c834c8'];?>

                <?php endif;$_ded920_local_params=$_ded920_old_params['_ee6075'];$_ded920_local_vars=$_ded920_old_vars['_ee6075'];?>

                <?php $_ded920_old_params['_643b69']=$_ded920_local_params;$_ded920_old_vars['_643b69']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__display','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[2]','setvar'=>'_type','this_tag'=>'var'],null,$this),$this),$this->setup_args('_type','setvar',$this),$this,'setvar')?>

                <label class="custom-control custom-checkbox 
                <?php $_ded920_old_params['_2e86b1']=$_ded920_local_params;$_ded920_old_vars['_2e86b1']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_bc28c2']=$_ded920_local_params;$_ded920_old_vars['_bc28c2']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_checked','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_ded920_local_params=$_ded920_old_params['_bc28c2'];$_ded920_local_vars=$_ded920_old_vars['_bc28c2'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_2e86b1'];$_ded920_local_vars=$_ded920_old_vars['_2e86b1'];?>

                <?php $_ded920_old_params['_acc2a4']=$_ded920_local_params;$_ded920_old_vars['_acc2a4']=$_ded920_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_list_options','value'=>'$__key__','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_ded920_local_params=$_ded920_old_params['_acc2a4'];$_ded920_local_vars=$_ded920_old_vars['_acc2a4'];?>
">
                  <?php $_ded920_old_params['_3d403f']=$_ded920_local_params;$_ded920_old_vars['_3d403f']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1"><?php endif;$_ded920_local_params=$_ded920_old_params['_3d403f'];$_ded920_local_vars=$_ded920_old_vars['_3d403f'];?>

                  <input <?php $_ded920_old_params['_a9a534']=$_ded920_local_params;$_ded920_old_vars['_a9a534']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_ded920_local_params=$_ded920_old_params['_a9a534'];$_ded920_local_vars=$_ded920_old_vars['_a9a534'];?>
 <?php $_ded920_old_params['_98e794']=$_ded920_local_params;$_ded920_old_vars['_98e794']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_ded920_local_params=$_ded920_old_params['_98e794'];$_ded920_local_vars=$_ded920_old_vars['_98e794'];?>
<?php $_ded920_old_params['_48f657']=$_ded920_local_params;$_ded920_old_vars['_48f657']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_ded920_local_params=$_ded920_old_params['_48f657'];$_ded920_local_vars=$_ded920_old_vars['_48f657'];?>
<?php $_ded920_old_params['_923436']=$_ded920_local_params;$_ded920_old_vars['_923436']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_no_primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_203250']=$_ded920_local_params;$_ded920_old_vars['_203250']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_ded920_local_params=$_ded920_old_params['_203250'];$_ded920_local_vars=$_ded920_old_vars['_203250'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_923436'];$_ded920_local_vars=$_ded920_old_vars['_923436'];?>
<?php $_ded920_old_params['_e7bdce']=$_ded920_local_params;$_ded920_old_vars['_e7bdce']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_ded920_local_params=$_ded920_old_params['_e7bdce'];$_ded920_local_vars=$_ded920_old_vars['_e7bdce'];?>
 type="checkbox" class="custom-control-input disp-option-item" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_ded920_old_params['_4494ae']=$_ded920_local_params;$_ded920_old_vars['_4494ae']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_ded920_local_params=$_ded920_old_params['_4494ae'];$_ded920_local_vars=$_ded920_old_vars['_4494ae'];?>
"></span>
                  <span class="custom-control-description"> <?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                </label>
                <?php endif;$_ded920_local_params=$_ded920_old_params['_643b69'];$_ded920_local_vars=$_ded920_old_vars['_643b69'];?>

            <?php $_ded920_old_params['_52f3ad']=$_ded920_local_params;$_ded920_old_vars['_52f3ad']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
            </div>
            <?php endif;$_ded920_local_params=$_ded920_old_params['_52f3ad'];$_ded920_local_vars=$_ded920_old_vars['_52f3ad'];?>

            <?php endif;$c_626000=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_626000'];$_ded920_local_vars=$_ded920_old_vars['_626000'];?>

          <?php endif;$_ded920_local_params=$_ded920_old_params['_319b11'];$_ded920_local_vars=$_ded920_old_vars['_319b11'];?>

          <?php endif;$_ded920_local_params=$_ded920_old_params['_ce6eb5'];$_ded920_local_vars=$_ded920_old_vars['_ce6eb5'];?>

            <div class="row form-group">
              <div class="col-md-2"><label for="_per_page"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Paging','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <input id="_per_page" step="1" list="per_page_complete" type="number" min="1" max="5000" class="form-control form-control-sm very-short control-inline" name="_per_page" value="<?php echo $this->function_var($this->setup_args(['name'=>'_per_page','this_tag'=>'var'],null,$this),$this)?>
">
                <?php echo $this->function_trans($this->setup_args(['phrase'=>'Items per Page','this_tag'=>'trans'],null,$this),$this)?>

              </div>
            </div>
            <?php $_ded920_old_params['_68a3e0']=$_ded920_local_params;$_ded920_old_vars['_68a3e0']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'search_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <?php $c_55e6b5=null;$_ded920_old_params['_55e6b5']=$_ded920_local_params;$_ded920_old_vars['_55e6b5']=$_ded920_local_vars;$a_55e6b5=$this->setup_args(['name'=>'search_options','this_tag'=>'loop'],null,$this);$_55e6b5=-1;$r_55e6b5=true;while($r_55e6b5===true):$r_55e6b5=($_55e6b5!==-1)?false:true;echo $this->block_loop($a_55e6b5,$c_55e6b5,$this,$r_55e6b5,++$_55e6b5,'_55e6b5');ob_start();?>
<?php $c_55e6b5 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_55e6b5=false;}if($c_55e6b5 ):?>

                  <label class="custom-control custom-checkbox">
                    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                    <input<?php $_ded920_old_params['_1cbc08']=$_ded920_local_params;$_ded920_old_vars['_1cbc08']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_ded920_local_params=$_ded920_old_params['_1cbc08'];$_ded920_local_vars=$_ded920_old_vars['_1cbc08'];?>
 type="checkbox" class="custom-control-input" name="_s_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"> <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[0]','setvar'=>'search_col','this_tag'=>'var'],null,$this),$this),$this->setup_args('search_col','setvar',$this),$this,'setvar')?>
<?php echo $this->function_trans($this->setup_args(['phrase'=>'$search_col','this_tag'=>'trans'],null,$this),$this)?>
</span>
                  </label>
                <?php endif;$c_55e6b5=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_55e6b5'];$_ded920_local_vars=$_ded920_old_vars['_55e6b5'];?>

              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search Type','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-5">
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_ded920_old_params['_7f178f']=$_ded920_local_params;$_ded920_old_vars['_7f178f']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_search_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_ded920_local_params=$_ded920_old_params['_7f178f'];$_ded920_local_vars=$_ded920_old_vars['_7f178f'];?>
<?php $_ded920_old_params['_316bf9']=$_ded920_local_params;$_ded920_old_vars['_316bf9']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_ded920_local_params=$_ded920_old_params['_316bf9'];$_ded920_local_vars=$_ded920_old_vars['_316bf9'];?>
 name="_user_search_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Phrase','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_ded920_old_params['_f9cfeb']=$_ded920_local_params;$_ded920_old_vars['_f9cfeb']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_ded920_local_params=$_ded920_old_params['_f9cfeb'];$_ded920_local_vars=$_ded920_old_vars['_f9cfeb'];?>
 name="_user_search_type" value="2">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'OR','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_ded920_old_params['_a9e4b6']=$_ded920_local_params;$_ded920_old_vars['_a9e4b6']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_ded920_local_params=$_ded920_old_params['_a9e4b6'];$_ded920_local_vars=$_ded920_old_vars['_a9e4b6'];?>
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
                  <input type="checkbox" <?php $_ded920_old_params['_93ae72']=$_ded920_local_params;$_ded920_old_vars['_93ae72']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_user_keep_search','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_ded920_local_params=$_ded920_old_params['_93ae72'];$_ded920_local_vars=$_ded920_old_vars['_93ae72'];?>
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
                  <input class="custom-control-input" type="radio" <?php $_ded920_old_params['_c1e970']=$_ded920_local_params;$_ded920_old_vars['_c1e970']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_replace_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_ded920_local_params=$_ded920_old_params['_c1e970'];$_ded920_local_vars=$_ded920_old_vars['_c1e970'];?>
 name="_user_replace_type" value="0">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Insensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_ded920_old_params['_7b4faf']=$_ded920_local_params;$_ded920_old_vars['_7b4faf']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_replace_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_ded920_local_params=$_ded920_old_params['_7b4faf'];$_ded920_local_vars=$_ded920_old_vars['_7b4faf'];?>
 name="_user_replace_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Sensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
            </div>
            <?php endif;$_ded920_local_params=$_ded920_old_params['_68a3e0'];$_ded920_local_vars=$_ded920_old_vars['_68a3e0'];?>

            <div class="row form-group">
              <?php $c_baefed=null;$_ded920_old_params['_baefed']=$_ded920_local_params;$_ded920_old_vars['_baefed']=$_ded920_local_vars;$a_baefed=$this->setup_args(['name'=>'sort_options','this_tag'=>'loop'],null,$this);$_baefed=-1;$r_baefed=true;while($r_baefed===true):$r_baefed=($_baefed!==-1)?false:true;echo $this->block_loop($a_baefed,$c_baefed,$this,$r_baefed,++$_baefed,'_baefed');ob_start();?>
<?php $c_baefed = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_baefed=false;}if($c_baefed ):?>

              <?php $_ded920_old_params['_e7c8ff']=$_ded920_local_params;$_ded920_old_vars['_e7c8ff']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Sort','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-7">
              <?php endif;$_ded920_local_params=$_ded920_old_params['_e7c8ff'];$_ded920_local_vars=$_ded920_old_vars['_e7c8ff'];?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <label class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" <?php $_ded920_old_params['_0ab395']=$_ded920_local_params;$_ded920_old_vars['_0ab395']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_ded920_local_params=$_ded920_old_params['_0ab395'];$_ded920_local_vars=$_ded920_old_vars['_0ab395'];?>
 name="_user_sort_by" value="<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                  </label>
              <?php $_ded920_old_params['_a29b0e']=$_ded920_local_params;$_ded920_old_vars['_a29b0e']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
              <div class="col-md-3">
                <select name="_user_sort_order" class="form-control custom-select">
                  <?php $c_9d7c35=null;$_ded920_old_params['_9d7c35']=$_ded920_local_params;$_ded920_old_vars['_9d7c35']=$_ded920_local_vars;$a_9d7c35=$this->setup_args(['name'=>'order_options','this_tag'=>'loop'],null,$this);$_9d7c35=-1;$r_9d7c35=true;while($r_9d7c35===true):$r_9d7c35=($_9d7c35!==-1)?false:true;echo $this->block_loop($a_9d7c35,$c_9d7c35,$this,$r_9d7c35,++$_9d7c35,'_9d7c35');ob_start();?>
<?php $c_9d7c35 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_9d7c35=false;}if($c_9d7c35 ):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"<?php $_ded920_old_params['_5416fc']=$_ded920_local_params;$_ded920_old_vars['_5416fc']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 selected<?php endif;$_ded920_local_params=$_ded920_old_params['_5416fc'];$_ded920_local_vars=$_ded920_old_vars['_5416fc'];?>
><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</option>
                  <?php endif;$c_9d7c35=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_9d7c35'];$_ded920_local_vars=$_ded920_old_vars['_9d7c35'];?>

                </select>
              </div>
              <?php endif;$_ded920_local_params=$_ded920_old_params['_a29b0e'];$_ded920_local_vars=$_ded920_old_vars['_a29b0e'];?>

              <?php endif;$c_baefed=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_baefed'];$_ded920_local_vars=$_ded920_old_vars['_baefed'];?>

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

<?php $_ded920_old_params['_cf9c14']=$_ded920_local_params;$_ded920_old_vars['_cf9c14']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'dialog_max_cols','setvar'=>'_list_max_cols','this_tag'=>'property'],null,$this),$this),$this->setup_args('_list_max_cols','setvar',$this),$this,'setvar')?>

<?php endif;$_ded920_local_params=$_ded920_old_params['_cf9c14'];$_ded920_local_vars=$_ded920_old_vars['_cf9c14'];?>

<?php $_ded920_old_params['_0cee7f']=$_ded920_local_params;$_ded920_old_vars['_0cee7f']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_list_max_cols','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
      <?php $_ded920_old_params['_5d0067']=$_ded920_local_params;$_ded920_old_vars['_5d0067']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the dialog.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php else:?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the display.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php endif;$_ded920_local_params=$_ded920_old_params['_5d0067'];$_ded920_local_vars=$_ded920_old_vars['_5d0067'];?>

    }
});
</script>
<?php endif;$_ded920_local_params=$_ded920_old_params['_0cee7f'];$_ded920_local_vars=$_ded920_old_vars['_0cee7f'];?>

<?php endif;$_9ad848=ob_get_clean();echo $this->modifier_trim_space($_9ad848,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_ded920_local_params=$_ded920_old_params['_9ad848'];$_ded920_local_vars=$_ded920_old_vars['_9ad848'];?>

            <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

          <?php endif;$_ded920_local_params=$_ded920_old_params['_b85494'];$_ded920_local_vars=$_ded920_old_vars['_b85494'];?>

            <?php $_ded920_old_params['_cd525a']=$_ded920_local_params;$_ded920_old_vars['_cd525a']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
              <?php $_ded920_old_params['_450e26']=$_ded920_local_params;$_ded920_old_vars['_450e26']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
              <?php endif;$_ded920_local_params=$_ded920_old_params['_450e26'];$_ded920_local_vars=$_ded920_old_vars['_450e26'];?>

                <div class="form-inline" style="margin: 10px 7px">
                  <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload Path','this_tag'=>'trans'],null,$this),$this)?>

                  <?php $_ded920_old_params['_f3db5f']=$_ded920_local_params;$_ded920_old_vars['_f3db5f']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model_out_path','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->modifier_add_slash(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model_out_path','escape'=>'','add_slash'=>'','setvar'=>'model_out_path','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('','add_slash',$this),$this,'add_slash'),$this->setup_args('model_out_path','setvar',$this),$this,'setvar')?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'extra_path','value'=>'$model_out_path','append'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_ded920_local_params=$_ded920_old_params['_f3db5f'];$_ded920_local_vars=$_ded920_old_vars['_f3db5f'];?>

                  <input id="extra_path" type="text" style="width:200px;" class="form-control" name="extra_path" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'extra_path','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                  <?php echo $this->function_setvar($this->setup_args(['name'=>'upload_paths','value'=>'$extra_path','function'=>'unshift','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php echo $this->modifier_setvar($this->modifier_array_unique($this->function_var($this->setup_args(['name'=>'upload_paths','array_unique'=>'','setvar'=>'upload_paths','this_tag'=>'var'],null,$this),$this),$this->setup_args('','array_unique',$this),$this,'array_unique'),$this->setup_args('upload_paths','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_count($this->setup_args(['name'=>'$upload_paths','setvar'=>'path_cnt','this_tag'=>'count'],null,$this),$this),$this->setup_args('path_cnt','setvar',$this),$this,'setvar')?>

                <?php $_ded920_old_params['_421a28']=$_ded920_local_params;$_ded920_old_vars['_421a28']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'path_cnt','gt'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <div id="upload_paths-box">
                  <?php $c_5191e5=null;$_ded920_old_params['_5191e5']=$_ded920_local_params;$_ded920_old_vars['_5191e5']=$_ded920_local_vars;$a_5191e5=$this->setup_args(['name'=>'upload_paths','this_tag'=>'loop'],null,$this);$_5191e5=-1;$r_5191e5=true;while($r_5191e5===true):$r_5191e5=($_5191e5!==-1)?false:true;echo $this->block_loop($a_5191e5,$c_5191e5,$this,$r_5191e5,++$_5191e5,'_5191e5');ob_start();?>
<?php $c_5191e5 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_5191e5=false;}if($c_5191e5 ):?>

                    <?php $_ded920_old_params['_1c5343']=$_ded920_local_params;$_ded920_old_vars['_1c5343']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button class="btn ml-3 btn-secondary" id="toggle-upload_path"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <span class="hidden" id="upload_path-wrapper">
                    <select class="form-control custom-select short" name="upload_path" id="upload_path"><?php endif;$_ded920_local_params=$_ded920_old_params['_1c5343'];$_ded920_local_vars=$_ded920_old_vars['_1c5343'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_ded920_old_params['_0d0ae0']=$_ded920_local_params;$_ded920_old_vars['_0d0ae0']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'extra_path','eq'=>'$__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_ded920_local_params=$_ded920_old_params['_0d0ae0'];$_ded920_local_vars=$_ded920_old_vars['_0d0ae0'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php $_ded920_old_params['_88f050']=$_ded920_local_params;$_ded920_old_vars['_88f050']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</select>
                    <button class="btn ml-0 btn-secondary btn-sm" id="clear-upload_path">  <i class="fa fa-trash" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Clear','this_tag'=>'trans'],null,$this),$this)?>
</span></button>
                    </span>
                  </div>
                    <?php endif;$_ded920_local_params=$_ded920_old_params['_88f050'];$_ded920_local_vars=$_ded920_old_vars['_88f050'];?>

                  <?php endif;$c_5191e5=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_5191e5'];$_ded920_local_vars=$_ded920_old_vars['_5191e5'];?>

                <?php endif;$_ded920_local_params=$_ded920_old_params['_421a28'];$_ded920_local_vars=$_ded920_old_vars['_421a28'];?>

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

<?php $_ded920_old_params['_20af5c']=$_ded920_local_params;$_ded920_old_vars['_20af5c']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&filter_params=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&filter_params=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&magic_token=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&magic_token=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&query=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&query=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php endif;$_ded920_local_params=$_ded920_old_params['_20af5c'];$_ded920_local_vars=$_ded920_old_vars['_20af5c'];?>

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
?<?php $_ded920_old_params['_064f65']=$_ded920_local_params;$_ded920_old_vars['_064f65']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&<?php endif;$_ded920_local_params=$_ded920_old_params['_064f65'];$_ded920_local_vars=$_ded920_old_vars['_064f65'];?>
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
$('#drop-zone').css('border','3px dashed <?php $_ded920_old_params['_e5740c']=$_ded920_local_params;$_ded920_old_vars['_e5740c']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
#ccc<?php endif;$_ded920_local_params=$_ded920_old_params['_e5740c'];$_ded920_local_vars=$_ded920_old_vars['_e5740c'];?>
');
$('#drop-zone').css('margin','1px');
$('#drop-zone').css('padding','8px');
$(function () {
    'use strict';
    var url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=upload_multi&magic_token=<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&model=asset&name=file<?php $_ded920_old_params['_83a34a']=$_ded920_local_params;$_ded920_old_vars['_83a34a']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','eq'=>'filter_class_image','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&select_system_filters=filter_class_image<?php endif;$_ded920_local_params=$_ded920_old_params['_83a34a'];$_ded920_local_vars=$_ded920_old_vars['_83a34a'];?>
';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        dropZone: $("#drop-zone"),
        // formData: {extra_path: $('#extra_path').val()},
        add: function (e, data) {
            data.formData = {extra_path: $('#extra_path').val()<?php $_ded920_old_params['_16bbe2']=$_ded920_local_params;$_ded920_old_vars['_16bbe2']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
, overwrite: $('#asset_overwrite').val()<?php endif;$_ded920_local_params=$_ded920_old_params['_16bbe2'];$_ded920_local_vars=$_ded920_old_vars['_16bbe2'];?>
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
    <?php $_ded920_old_params['_025ccb']=$_ded920_local_params;$_ded920_old_vars['_025ccb']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    $("#__mode").prop('value', 'insert_asset');
    $("#list-select-form").submit();
    <?php else:?>

    submit_params_to_post( this_url );
    <?php endif;$_ded920_local_params=$_ded920_old_params['_025ccb'];$_ded920_local_vars=$_ded920_old_vars['_025ccb'];?>

}
</script>
            <?php endif;$_ded920_local_params=$_ded920_old_params['_cd525a'];$_ded920_local_vars=$_ded920_old_vars['_cd525a'];?>

        <?php endif;$_ded920_local_params=$_ded920_old_params['_13a526'];$_ded920_local_vars=$_ded920_old_vars['_13a526'];?>

        <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

          <?php $_ded920_old_params['_e2d01d']=$_ded920_local_params;$_ded920_old_vars['_e2d01d']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php ob_start();$_ded920_old_params['_a2bcf7']=$_ded920_local_params;$_ded920_old_vars['_a2bcf7']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
        <?php $_ded920_old_params['_c056f3']=$_ded920_local_params;$_ded920_old_vars['_c056f3']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
        <?php endif;$_ded920_local_params=$_ded920_old_params['_c056f3'];$_ded920_local_vars=$_ded920_old_vars['_c056f3'];?>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10" id="edit_options_loop">
              <span id="_start_options"></span>
          <?php $_ded920_old_params['_53729a']=$_ded920_local_params;$_ded920_old_vars['_53729a']=$_ded920_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

            <?php $c_a3cacb=null;$_ded920_old_params['_a3cacb']=$_ded920_local_params;$_ded920_old_vars['_a3cacb']=$_ded920_local_vars;$a_a3cacb=$this->setup_args(['type'=>'edit','option'=>'1','this_tag'=>'objectcols'],null,$this);$_a3cacb=-1;$r_a3cacb=true;while($r_a3cacb===true):$r_a3cacb=($_a3cacb!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_a3cacb,$c_a3cacb,$this,$r_a3cacb,++$_a3cacb,'_a3cacb');ob_start();?>
<?php $c_a3cacb = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_a3cacb=false;}if($c_a3cacb ):?>

              <?php $_ded920_old_params['_3e6f8f']=$_ded920_local_params;$_ded920_old_vars['_3e6f8f']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','ne'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_ded920_old_params['_436747']=$_ded920_local_params;$_ded920_old_vars['_436747']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'hidden','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_ded920_old_params['_052c00']=$_ded920_local_params;$_ded920_old_vars['_052c00']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'allow_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'accept_comment','setvar'=>'accept_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

                    <?php $_ded920_old_params['_871488']=$_ded920_local_params;$_ded920_old_vars['_871488']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <?php $_ded920_old_params['_254624']=$_ded920_local_params;$_ded920_old_vars['_254624']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <?php endif;$_ded920_local_params=$_ded920_old_params['_254624'];$_ded920_local_vars=$_ded920_old_vars['_254624'];?>

                    <?php endif;$_ded920_local_params=$_ded920_old_params['_871488'];$_ded920_local_vars=$_ded920_old_vars['_871488'];?>

                  <?php endif;$_ded920_local_params=$_ded920_old_params['_052c00'];$_ded920_local_vars=$_ded920_old_vars['_052c00'];?>

                <?php endif;$_ded920_local_params=$_ded920_old_params['_436747'];$_ded920_local_vars=$_ded920_old_vars['_436747'];?>

                <?php $_ded920_old_params['_6c0b69']=$_ded920_local_params;$_ded920_old_vars['_6c0b69']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_ded920_old_params['_0fde7f']=$_ded920_local_params;$_ded920_old_vars['_0fde7f']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_0fde7f'];$_ded920_local_vars=$_ded920_old_vars['_0fde7f'];?>

                  <?php $_ded920_old_params['_e95484']=$_ded920_local_params;$_ded920_old_vars['_e95484']=$_ded920_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_ded920_local_params=$_ded920_old_params['_e95484'];$_ded920_local_vars=$_ded920_old_vars['_e95484'];?>

                  <label class="edit-options-child <?php $_ded920_old_params['_8c09cf']=$_ded920_local_params;$_ded920_old_vars['_8c09cf']=$_ded920_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_ded920_local_params=$_ded920_old_params['_8c09cf'];$_ded920_local_vars=$_ded920_old_vars['_8c09cf'];?>
custom-control custom-checkbox" id="label-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                    <?php $_ded920_old_params['_a3d167']=$_ded920_local_params;$_ded920_old_vars['_a3d167']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <input type="hidden" id="" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <?php endif;$_ded920_local_params=$_ded920_old_params['_a3d167'];$_ded920_local_vars=$_ded920_old_vars['_a3d167'];?>

                    <input<?php $_ded920_old_params['_717225']=$_ded920_local_params;$_ded920_old_vars['_717225']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php else:?>
<?php $_ded920_old_params['_666a98']=$_ded920_local_params;$_ded920_old_vars['_666a98']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 onclick="return false;" checked <?php else:?>

                    <?php $_ded920_old_params['_4a261d']=$_ded920_local_params;$_ded920_old_vars['_4a261d']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_ded920_local_params=$_ded920_old_params['_4a261d'];$_ded920_local_vars=$_ded920_old_vars['_4a261d'];?>

                    <?php endif;$_ded920_local_params=$_ded920_old_params['_666a98'];$_ded920_local_vars=$_ded920_old_vars['_666a98'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_717225'];$_ded920_local_vars=$_ded920_old_vars['_717225'];?>
<?php $_ded920_old_params['_16cbc3']=$_ded920_local_params;$_ded920_old_vars['_16cbc3']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_ded920_local_params=$_ded920_old_params['_16cbc3'];$_ded920_local_vars=$_ded920_old_vars['_16cbc3'];?>
 type="<?php $_ded920_old_params['_44a497']=$_ded920_local_params;$_ded920_old_vars['_44a497']=$_ded920_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
checkbox<?php endif;$_ded920_local_params=$_ded920_old_params['_44a497'];$_ded920_local_vars=$_ded920_old_vars['_44a497'];?>
" class="custom-control-input disp_option disp_option-cb" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator<?php $_ded920_old_params['_03dac3']=$_ded920_local_params;$_ded920_old_vars['_03dac3']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_ded920_local_params=$_ded920_old_params['_03dac3'];$_ded920_local_vars=$_ded920_old_vars['_03dac3'];?>
<?php $_ded920_old_params['_4d6f3c']=$_ded920_local_params;$_ded920_old_vars['_4d6f3c']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_ded920_local_params=$_ded920_old_params['_4d6f3c'];$_ded920_local_vars=$_ded920_old_vars['_4d6f3c'];?>
"></span>
                    <span class="custom-control-description"> 
                    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
                  </label>
                <?php endif;$_ded920_local_params=$_ded920_old_params['_6c0b69'];$_ded920_local_vars=$_ded920_old_vars['_6c0b69'];?>

              <?php endif;$_ded920_local_params=$_ded920_old_params['_3e6f8f'];$_ded920_local_vars=$_ded920_old_vars['_3e6f8f'];?>

            <?php endif;$c_a3cacb=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_a3cacb'];$_ded920_local_vars=$_ded920_old_vars['_a3cacb'];?>

          <?php endif;$_ded920_local_params=$_ded920_old_params['_53729a'];$_ded920_local_vars=$_ded920_old_vars['_53729a'];?>

                <?php $c_c686a4=null;$_ded920_old_params['_c686a4']=$_ded920_local_params;$_ded920_old_vars['_c686a4']=$_ded920_local_vars;$a_c686a4=$this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$model','id'=>'$object_id','this_tag'=>'fieldloop'],null,$this);$_c686a4=-1;$r_c686a4=true;while($r_c686a4===true):$r_c686a4=($_c686a4!==-1)?false:true;echo $this->component('PTTags')->hdlr_fieldloop($a_c686a4,$c_c686a4,$this,$r_c686a4,++$_c686a4,'_c686a4');ob_start();?>
<?php $c_c686a4 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_c686a4=false;}if($c_c686a4 ):?>

                <?php $c_4ed95d=null;$_ded920_old_params['_4ed95d']=$_ded920_local_params;$_ded920_old_vars['_4ed95d']=$_ded920_local_vars;$a_4ed95d=$this->setup_args(['name'=>'_fieldbasename','this_tag'=>'setvarblock'],null,$this);ob_start();?>
field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_4ed95d=ob_get_clean();$c_4ed95d=$this->block_setvarblock($a_4ed95d,$c_4ed95d,$this,$r_4ed95d,1,'_4ed95d');echo($c_4ed95d); $_ded920_local_params=$_ded920_old_params['_4ed95d'];?>

                <label class="<?php $_ded920_old_params['_0979a4']=$_ded920_local_params;$_ded920_old_vars['_0979a4']=$_ded920_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_ded920_local_params=$_ded920_old_params['_0979a4'];$_ded920_local_vars=$_ded920_old_vars['_0979a4'];?>
custom-control custom-checkbox" id="label-<?php echo $this->function_var($this->setup_args(['name'=>'_fieldbasename','this_tag'=>'var'],null,$this),$this)?>
">
                  <input<?php $_ded920_old_params['_fea81f']=$_ded920_local_params;$_ded920_old_vars['_fea81f']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_ded920_local_params=$_ded920_old_params['_fea81f'];$_ded920_local_vars=$_ded920_old_vars['_fea81f'];?>

                  <?php $_ded920_old_params['_3e257a']=$_ded920_local_params;$_ded920_old_vars['_3e257a']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_ded920_local_params=$_ded920_old_params['_3e257a'];$_ded920_local_vars=$_ded920_old_vars['_3e257a'];?>

                  <?php $_ded920_old_params['_815b5f']=$_ded920_local_params;$_ded920_old_vars['_815b5f']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_ded920_local_params=$_ded920_old_params['_815b5f'];$_ded920_local_vars=$_ded920_old_vars['_815b5f'];?>
 <?php $_ded920_old_params['_661729']=$_ded920_local_params;$_ded920_old_vars['_661729']=$_ded920_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_ded920_local_params=$_ded920_old_params['_661729'];$_ded920_local_vars=$_ded920_old_vars['_661729'];?>
 type="checkbox" class="custom-control-input disp_option disp_option-cb" id="field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_ded920_old_params['_d977d7']=$_ded920_local_params;$_ded920_old_vars['_d977d7']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_ded920_local_params=$_ded920_old_params['_d977d7'];$_ded920_local_vars=$_ded920_old_vars['_d977d7'];?>
"></span>
                  <span class="custom-control-description"> 
                  <?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'field__name','trans'=>'1','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans'),ENT_QUOTES)?>
</span>
                </label>
                <?php endif;$c_c686a4=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_c686a4'];$_ded920_local_vars=$_ded920_old_vars['_c686a4'];?>

              <?php $_ded920_old_params['_598e39']=$_ded920_local_params;$_ded920_old_vars['_598e39']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div>
                  <p class="text-muted hint-block">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can change the display order of fields with drag &amp; drop.','this_tag'=>'trans'],null,$this),$this)?>

                  </p>
                </div>
              <?php endif;$_ded920_local_params=$_ded920_old_params['_598e39'];$_ded920_local_vars=$_ded920_old_vars['_598e39'];?>

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
<?php endif;$_a2bcf7=ob_get_clean();echo $this->modifier_trim_space($_a2bcf7,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_ded920_local_params=$_ded920_old_params['_a2bcf7'];$_ded920_local_vars=$_ded920_old_vars['_a2bcf7'];?>

<script>
<?php $_ded920_old_params['_eb8317']=$_ded920_local_params;$_ded920_old_vars['_eb8317']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#edit_options_loop').sortable({
    stop: function( evt, ui ) {
        sort_fields();
    }
});
$("#edit_options_loop").ksortable();
<?php endif;$_ded920_local_params=$_ded920_old_params['_eb8317'];$_ded920_local_vars=$_ded920_old_vars['_eb8317'];?>

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

<?php $_ded920_old_params['_f53315']=$_ded920_local_params;$_ded920_old_vars['_f53315']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php endif;$_ded920_local_params=$_ded920_old_params['_f53315'];$_ded920_local_vars=$_ded920_old_vars['_f53315'];?>

    }
    updateFieldSelector();
});
</script>
            <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

          <?php endif;$_ded920_local_params=$_ded920_old_params['_e2d01d'];$_ded920_local_vars=$_ded920_old_vars['_e2d01d'];?>

        <?php endif;$_ded920_local_params=$_ded920_old_params['_f45efb'];$_ded920_local_vars=$_ded920_old_vars['_f45efb'];?>

    <?php endif;$_ded920_local_params=$_ded920_old_params['_a38673'];$_ded920_local_vars=$_ded920_old_vars['_a38673'];?>

    <?php endif;$_ded920_local_params=$_ded920_old_params['_9cfa33'];$_ded920_local_vars=$_ded920_old_vars['_9cfa33'];?>

  <?php endif;$_ded920_local_params=$_ded920_old_params['_bf8220'];$_ded920_local_vars=$_ded920_old_vars['_bf8220'];?>

  <?php $_ded920_old_params['_186cff']=$_ded920_local_params;$_ded920_old_vars['_186cff']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'save','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    
    <?php $_ded920_old_params['_9508b2']=$_ded920_local_params;$_ded920_old_vars['_9508b2']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php ob_start();$_ded920_old_params['_2822f1']=$_ded920_local_params;$_ded920_old_vars['_2822f1']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
        <?php $_ded920_old_params['_813236']=$_ded920_local_params;$_ded920_old_vars['_813236']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
        <?php endif;$_ded920_local_params=$_ded920_old_params['_813236'];$_ded920_local_vars=$_ded920_old_vars['_813236'];?>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10" id="edit_options_loop">
              <span id="_start_options"></span>
          <?php $_ded920_old_params['_2e71b0']=$_ded920_local_params;$_ded920_old_vars['_2e71b0']=$_ded920_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

            <?php $c_90b98f=null;$_ded920_old_params['_90b98f']=$_ded920_local_params;$_ded920_old_vars['_90b98f']=$_ded920_local_vars;$a_90b98f=$this->setup_args(['type'=>'edit','option'=>'1','this_tag'=>'objectcols'],null,$this);$_90b98f=-1;$r_90b98f=true;while($r_90b98f===true):$r_90b98f=($_90b98f!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_90b98f,$c_90b98f,$this,$r_90b98f,++$_90b98f,'_90b98f');ob_start();?>
<?php $c_90b98f = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_90b98f=false;}if($c_90b98f ):?>

              <?php $_ded920_old_params['_fc7152']=$_ded920_local_params;$_ded920_old_vars['_fc7152']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','ne'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_ded920_old_params['_fac359']=$_ded920_local_params;$_ded920_old_vars['_fac359']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'hidden','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_ded920_old_params['_a4706a']=$_ded920_local_params;$_ded920_old_vars['_a4706a']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'allow_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'accept_comment','setvar'=>'accept_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

                    <?php $_ded920_old_params['_cd5cb8']=$_ded920_local_params;$_ded920_old_vars['_cd5cb8']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <?php $_ded920_old_params['_a4b7a0']=$_ded920_local_params;$_ded920_old_vars['_a4b7a0']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <?php endif;$_ded920_local_params=$_ded920_old_params['_a4b7a0'];$_ded920_local_vars=$_ded920_old_vars['_a4b7a0'];?>

                    <?php endif;$_ded920_local_params=$_ded920_old_params['_cd5cb8'];$_ded920_local_vars=$_ded920_old_vars['_cd5cb8'];?>

                  <?php endif;$_ded920_local_params=$_ded920_old_params['_a4706a'];$_ded920_local_vars=$_ded920_old_vars['_a4706a'];?>

                <?php endif;$_ded920_local_params=$_ded920_old_params['_fac359'];$_ded920_local_vars=$_ded920_old_vars['_fac359'];?>

                <?php $_ded920_old_params['_b872c9']=$_ded920_local_params;$_ded920_old_vars['_b872c9']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_ded920_old_params['_15b94e']=$_ded920_local_params;$_ded920_old_vars['_15b94e']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_15b94e'];$_ded920_local_vars=$_ded920_old_vars['_15b94e'];?>

                  <?php $_ded920_old_params['_a75915']=$_ded920_local_params;$_ded920_old_vars['_a75915']=$_ded920_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_ded920_local_params=$_ded920_old_params['_a75915'];$_ded920_local_vars=$_ded920_old_vars['_a75915'];?>

                  <label class="edit-options-child <?php $_ded920_old_params['_fa3c44']=$_ded920_local_params;$_ded920_old_vars['_fa3c44']=$_ded920_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_ded920_local_params=$_ded920_old_params['_fa3c44'];$_ded920_local_vars=$_ded920_old_vars['_fa3c44'];?>
custom-control custom-checkbox" id="label-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                    <?php $_ded920_old_params['_24eb84']=$_ded920_local_params;$_ded920_old_vars['_24eb84']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <input type="hidden" id="" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <?php endif;$_ded920_local_params=$_ded920_old_params['_24eb84'];$_ded920_local_vars=$_ded920_old_vars['_24eb84'];?>

                    <input<?php $_ded920_old_params['_3e978e']=$_ded920_local_params;$_ded920_old_vars['_3e978e']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php else:?>
<?php $_ded920_old_params['_fff5ea']=$_ded920_local_params;$_ded920_old_vars['_fff5ea']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 onclick="return false;" checked <?php else:?>

                    <?php $_ded920_old_params['_d208fa']=$_ded920_local_params;$_ded920_old_vars['_d208fa']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_ded920_local_params=$_ded920_old_params['_d208fa'];$_ded920_local_vars=$_ded920_old_vars['_d208fa'];?>

                    <?php endif;$_ded920_local_params=$_ded920_old_params['_fff5ea'];$_ded920_local_vars=$_ded920_old_vars['_fff5ea'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_3e978e'];$_ded920_local_vars=$_ded920_old_vars['_3e978e'];?>
<?php $_ded920_old_params['_bd764e']=$_ded920_local_params;$_ded920_old_vars['_bd764e']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_ded920_local_params=$_ded920_old_params['_bd764e'];$_ded920_local_vars=$_ded920_old_vars['_bd764e'];?>
 type="<?php $_ded920_old_params['_cc597d']=$_ded920_local_params;$_ded920_old_vars['_cc597d']=$_ded920_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
checkbox<?php endif;$_ded920_local_params=$_ded920_old_params['_cc597d'];$_ded920_local_vars=$_ded920_old_vars['_cc597d'];?>
" class="custom-control-input disp_option disp_option-cb" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator<?php $_ded920_old_params['_75e17d']=$_ded920_local_params;$_ded920_old_vars['_75e17d']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_ded920_local_params=$_ded920_old_params['_75e17d'];$_ded920_local_vars=$_ded920_old_vars['_75e17d'];?>
<?php $_ded920_old_params['_e96a00']=$_ded920_local_params;$_ded920_old_vars['_e96a00']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_ded920_local_params=$_ded920_old_params['_e96a00'];$_ded920_local_vars=$_ded920_old_vars['_e96a00'];?>
"></span>
                    <span class="custom-control-description"> 
                    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
                  </label>
                <?php endif;$_ded920_local_params=$_ded920_old_params['_b872c9'];$_ded920_local_vars=$_ded920_old_vars['_b872c9'];?>

              <?php endif;$_ded920_local_params=$_ded920_old_params['_fc7152'];$_ded920_local_vars=$_ded920_old_vars['_fc7152'];?>

            <?php endif;$c_90b98f=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_90b98f'];$_ded920_local_vars=$_ded920_old_vars['_90b98f'];?>

          <?php endif;$_ded920_local_params=$_ded920_old_params['_2e71b0'];$_ded920_local_vars=$_ded920_old_vars['_2e71b0'];?>

                <?php $c_55fb27=null;$_ded920_old_params['_55fb27']=$_ded920_local_params;$_ded920_old_vars['_55fb27']=$_ded920_local_vars;$a_55fb27=$this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$model','id'=>'$object_id','this_tag'=>'fieldloop'],null,$this);$_55fb27=-1;$r_55fb27=true;while($r_55fb27===true):$r_55fb27=($_55fb27!==-1)?false:true;echo $this->component('PTTags')->hdlr_fieldloop($a_55fb27,$c_55fb27,$this,$r_55fb27,++$_55fb27,'_55fb27');ob_start();?>
<?php $c_55fb27 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_55fb27=false;}if($c_55fb27 ):?>

                <?php $c_34af76=null;$_ded920_old_params['_34af76']=$_ded920_local_params;$_ded920_old_vars['_34af76']=$_ded920_local_vars;$a_34af76=$this->setup_args(['name'=>'_fieldbasename','this_tag'=>'setvarblock'],null,$this);ob_start();?>
field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_34af76=ob_get_clean();$c_34af76=$this->block_setvarblock($a_34af76,$c_34af76,$this,$r_34af76,1,'_34af76');echo($c_34af76); $_ded920_local_params=$_ded920_old_params['_34af76'];?>

                <label class="<?php $_ded920_old_params['_6b47bc']=$_ded920_local_params;$_ded920_old_vars['_6b47bc']=$_ded920_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_ded920_local_params=$_ded920_old_params['_6b47bc'];$_ded920_local_vars=$_ded920_old_vars['_6b47bc'];?>
custom-control custom-checkbox" id="label-<?php echo $this->function_var($this->setup_args(['name'=>'_fieldbasename','this_tag'=>'var'],null,$this),$this)?>
">
                  <input<?php $_ded920_old_params['_18a9f5']=$_ded920_local_params;$_ded920_old_vars['_18a9f5']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_ded920_local_params=$_ded920_old_params['_18a9f5'];$_ded920_local_vars=$_ded920_old_vars['_18a9f5'];?>

                  <?php $_ded920_old_params['_2e497a']=$_ded920_local_params;$_ded920_old_vars['_2e497a']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_ded920_local_params=$_ded920_old_params['_2e497a'];$_ded920_local_vars=$_ded920_old_vars['_2e497a'];?>

                  <?php $_ded920_old_params['_217fdf']=$_ded920_local_params;$_ded920_old_vars['_217fdf']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_ded920_local_params=$_ded920_old_params['_217fdf'];$_ded920_local_vars=$_ded920_old_vars['_217fdf'];?>
 <?php $_ded920_old_params['_7c89f4']=$_ded920_local_params;$_ded920_old_vars['_7c89f4']=$_ded920_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_ded920_local_params=$_ded920_old_params['_7c89f4'];$_ded920_local_vars=$_ded920_old_vars['_7c89f4'];?>
 type="checkbox" class="custom-control-input disp_option disp_option-cb" id="field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_ded920_old_params['_560e43']=$_ded920_local_params;$_ded920_old_vars['_560e43']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_ded920_local_params=$_ded920_old_params['_560e43'];$_ded920_local_vars=$_ded920_old_vars['_560e43'];?>
"></span>
                  <span class="custom-control-description"> 
                  <?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'field__name','trans'=>'1','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans'),ENT_QUOTES)?>
</span>
                </label>
                <?php endif;$c_55fb27=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_55fb27'];$_ded920_local_vars=$_ded920_old_vars['_55fb27'];?>

              <?php $_ded920_old_params['_3067ea']=$_ded920_local_params;$_ded920_old_vars['_3067ea']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div>
                  <p class="text-muted hint-block">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can change the display order of fields with drag &amp; drop.','this_tag'=>'trans'],null,$this),$this)?>

                  </p>
                </div>
              <?php endif;$_ded920_local_params=$_ded920_old_params['_3067ea'];$_ded920_local_vars=$_ded920_old_vars['_3067ea'];?>

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
<?php endif;$_2822f1=ob_get_clean();echo $this->modifier_trim_space($_2822f1,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_ded920_local_params=$_ded920_old_params['_2822f1'];$_ded920_local_vars=$_ded920_old_vars['_2822f1'];?>

<script>
<?php $_ded920_old_params['_df8bff']=$_ded920_local_params;$_ded920_old_vars['_df8bff']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#edit_options_loop').sortable({
    stop: function( evt, ui ) {
        sort_fields();
    }
});
$("#edit_options_loop").ksortable();
<?php endif;$_ded920_local_params=$_ded920_old_params['_df8bff'];$_ded920_local_vars=$_ded920_old_vars['_df8bff'];?>

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

<?php $_ded920_old_params['_3de913']=$_ded920_local_params;$_ded920_old_vars['_3de913']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php endif;$_ded920_local_params=$_ded920_old_params['_3de913'];$_ded920_local_vars=$_ded920_old_vars['_3de913'];?>

    }
    updateFieldSelector();
});
</script>
      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_ded920_local_params=$_ded920_old_params['_9508b2'];$_ded920_local_vars=$_ded920_old_vars['_9508b2'];?>

  <?php endif;$_ded920_local_params=$_ded920_old_params['_186cff'];$_ded920_local_vars=$_ded920_old_vars['_186cff'];?>

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
<?php $_ded920_old_params['_25f797']=$_ded920_local_params;$_ded920_old_vars['_25f797']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'output_container','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <div class="container-fluid">
<?php endif;$_ded920_local_params=$_ded920_old_params['_25f797'];$_ded920_local_vars=$_ded920_old_vars['_25f797'];?>

      <div class="row">
        <main class="col-md-12 pt-3">
          <h1 id="page-title" <?php $_ded920_old_params['_3a3531']=$_ded920_local_params;$_ded920_old_vars['_3a3531']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_583c71']=$_ded920_local_params;$_ded920_old_vars['_583c71']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_8fa67b']=$_ded920_local_params;$_ded920_old_vars['_8fa67b']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-top:-33px"<?php else:?>
style="margin-top:-36px"<?php endif;$_ded920_local_params=$_ded920_old_params['_8fa67b'];$_ded920_local_vars=$_ded920_old_vars['_8fa67b'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_583c71'];$_ded920_local_vars=$_ded920_old_vars['_583c71'];?>
 class="title-with-opt"<?php else:?>
 <?php $_ded920_old_params['_a28a20']=$_ded920_local_params;$_ded920_old_vars['_a28a20']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_3afcd0']=$_ded920_local_params;$_ded920_old_vars['_3afcd0']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
style="margin-top:-3px"<?php else:?>
style="margin-top:-11px"<?php endif;$_ded920_local_params=$_ded920_old_params['_3afcd0'];$_ded920_local_vars=$_ded920_old_vars['_3afcd0'];?>
<?php else:?>
style="margin-top:-10px"<?php endif;$_ded920_local_params=$_ded920_old_params['_a28a20'];$_ded920_local_vars=$_ded920_old_vars['_a28a20'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_3a3531'];$_ded920_local_vars=$_ded920_old_vars['_3a3531'];?>
>
          <span class="title">
          <?php $_ded920_old_params['_ca6cf1']=$_ded920_local_params;$_ded920_old_vars['_ca6cf1']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_c6770c']=$_ded920_local_params;$_ded920_old_vars['_c6770c']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php $_ded920_old_params['_58959b']=$_ded920_local_params;$_ded920_old_vars['_58959b']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;manage_revision=1<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.revision_select','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&amp;manage_revision=1<?php endif;$_ded920_local_params=$_ded920_old_params['_58959b'];$_ded920_local_vars=$_ded920_old_vars['_58959b'];?>
"><?php endif;$_ded920_local_params=$_ded920_old_params['_c6770c'];$_ded920_local_vars=$_ded920_old_vars['_c6770c'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_ca6cf1'];$_ded920_local_vars=$_ded920_old_vars['_ca6cf1'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'page_title','this_tag'=>'var'],null,$this),$this)?>
<?php $_ded920_old_params['_ebf4c2']=$_ded920_local_params;$_ded920_old_vars['_ebf4c2']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_e5492b']=$_ded920_local_params;$_ded920_old_vars['_e5492b']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</a><?php endif;$_ded920_local_params=$_ded920_old_params['_e5492b'];$_ded920_local_vars=$_ded920_old_vars['_e5492b'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_ebf4c2'];$_ded920_local_vars=$_ded920_old_vars['_ebf4c2'];?>

          </span>
          <?php echo $this->function_var($this->setup_args(['name'=>'add_heading','this_tag'=>'var'],null,$this),$this)?>

      <?php $_ded920_old_params['_9ce319']=$_ded920_local_params;$_ded920_old_vars['_9ce319']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php $_ded920_old_params['_5318bb']=$_ded920_local_params;$_ded920_old_vars['_5318bb']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_ded920_old_params['_a2f2c0']=$_ded920_local_params;$_ded920_old_vars['_a2f2c0']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_ded920_old_params['_761589']=$_ded920_local_params;$_ded920_old_vars['_761589']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'dashboard','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_ded920_old_params['_7aa70b']=$_ded920_local_params;$_ded920_old_vars['_7aa70b']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'error','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_ded920_old_params['_d916c2']=$_ded920_local_params;$_ded920_old_vars['_d916c2']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#filterOptions">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Filters','this_tag'=>'trans'],null,$this),$this)?>

          </button>
          <?php endif;$_ded920_local_params=$_ded920_old_params['_d916c2'];$_ded920_local_vars=$_ded920_old_vars['_d916c2'];?>

          <?php endif;$_ded920_local_params=$_ded920_old_params['_7aa70b'];$_ded920_local_vars=$_ded920_old_vars['_7aa70b'];?>

          <?php endif;$_ded920_local_params=$_ded920_old_params['_761589'];$_ded920_local_vars=$_ded920_old_vars['_761589'];?>

        <?php endif;$_ded920_local_params=$_ded920_old_params['_a2f2c0'];$_ded920_local_vars=$_ded920_old_vars['_a2f2c0'];?>

        <?php $_ded920_old_params['_fe0876']=$_ded920_local_params;$_ded920_old_vars['_fe0876']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'can_create','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_ded920_old_params['_08b3a0']=$_ded920_local_params;$_ded920_old_vars['_08b3a0']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_ded920_old_params['_1bed4e']=$_ded920_local_params;$_ded920_old_vars['_1bed4e']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_ded920_old_params['_4caa69']=$_ded920_local_params;$_ded920_old_vars['_4caa69']=$_ded920_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'update_all','model'=>'$this_model','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

              <?php endif;$_ded920_local_params=$_ded920_old_params['_4caa69'];$_ded920_local_vars=$_ded920_old_vars['_4caa69'];?>

            <?php endif;$_ded920_local_params=$_ded920_old_params['_1bed4e'];$_ded920_local_vars=$_ded920_old_vars['_1bed4e'];?>

          <?php endif;$_ded920_local_params=$_ded920_old_params['_08b3a0'];$_ded920_local_vars=$_ded920_old_vars['_08b3a0'];?>

        <?php endif;$_ded920_local_params=$_ded920_old_params['_fe0876'];$_ded920_local_vars=$_ded920_old_vars['_fe0876'];?>

        <?php $_ded920_old_params['_4009b1']=$_ded920_local_params;$_ded920_old_vars['_4009b1']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_create','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_ded920_old_params['_33603a']=$_ded920_local_params;$_ded920_old_vars['_33603a']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_ded920_old_params['_c8ab54']=$_ded920_local_params;$_ded920_old_vars['_c8ab54']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'label','setvar'=>'orig_label','this_tag'=>'var'],null,$this),$this),$this->setup_args('orig_label','setvar',$this),$this,'setvar')?>

              <?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'Syetem\'s Role','setvar'=>'label','this_tag'=>'trans'],null,$this),$this),$this->setup_args('label','setvar',$this),$this,'setvar')?>

            <?php endif;$_ded920_local_params=$_ded920_old_params['_c8ab54'];$_ded920_local_vars=$_ded920_old_vars['_c8ab54'];?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php $_ded920_old_params['_f5e974']=$_ded920_local_params;$_ded920_old_vars['_f5e974']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._system_filters_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_5e7fb2']=$_ded920_local_params;$_ded920_old_vars['_5e7fb2']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'tag','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;tag_obj=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_5e7fb2'];$_ded920_local_vars=$_ded920_old_vars['_5e7fb2'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_f5e974'];$_ded920_local_vars=$_ded920_old_vars['_f5e974'];?>
">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php $_ded920_old_params['_d6ca27']=$_ded920_local_params;$_ded920_old_vars['_d6ca27']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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

            <?php endif;$_ded920_local_params=$_ded920_old_params['_d6ca27'];$_ded920_local_vars=$_ded920_old_vars['_d6ca27'];?>

            <?php $_ded920_old_params['_b5b8df']=$_ded920_local_params;$_ded920_old_vars['_b5b8df']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_fd1593']=$_ded920_local_params;$_ded920_old_vars['_fd1593']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php endif;$_ded920_local_params=$_ded920_old_params['_fd1593'];$_ded920_local_vars=$_ded920_old_vars['_fd1593'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_b5b8df'];$_ded920_local_vars=$_ded920_old_vars['_b5b8df'];?>

          <?php endif;$_ded920_local_params=$_ded920_old_params['_33603a'];$_ded920_local_vars=$_ded920_old_vars['_33603a'];?>

          <?php $_ded920_old_params['_42ee47']=$_ded920_local_params;$_ded920_old_vars['_42ee47']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_ded920_old_params['_c37d93']=$_ded920_local_params;$_ded920_old_vars['_c37d93']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.saved','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_ded920_old_params['_1700b0']=$_ded920_local_params;$_ded920_old_vars['_1700b0']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_455004']=$_ded920_local_params;$_ded920_old_vars['_455004']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request._profile','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_ded920_old_params['_ba0788']=$_ded920_local_params;$_ded920_old_vars['_ba0788']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','ne'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_ba0788'];$_ded920_local_vars=$_ded920_old_vars['_ba0788'];?>
">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php endif;$_ded920_local_params=$_ded920_old_params['_455004'];$_ded920_local_vars=$_ded920_old_vars['_455004'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_1700b0'];$_ded920_local_vars=$_ded920_old_vars['_1700b0'];?>

            <?php endif;$_ded920_local_params=$_ded920_old_params['_c37d93'];$_ded920_local_vars=$_ded920_old_vars['_c37d93'];?>

            <?php $_ded920_old_params['_f03296']=$_ded920_local_params;$_ded920_old_vars['_f03296']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','ne'=>'hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_ded920_old_params['_5070e6']=$_ded920_local_params;$_ded920_old_vars['_5070e6']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'user','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_ded920_old_params['_4afe9d']=$_ded920_local_params;$_ded920_old_vars['_4afe9d']=$_ded920_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_06f61e']=$_ded920_local_params;$_ded920_old_vars['_06f61e']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request._profile','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
              <?php endif;$_ded920_local_params=$_ded920_old_params['_06f61e'];$_ded920_local_vars=$_ded920_old_vars['_06f61e'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_4afe9d'];$_ded920_local_vars=$_ded920_old_vars['_4afe9d'];?>

            <?php else:?>

          <a class="btn btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_ded920_old_params['_f78399']=$_ded920_local_params;$_ded920_old_vars['_f78399']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._model','ne'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_f78399'];$_ded920_local_vars=$_ded920_old_vars['_f78399'];?>
">
            <i class="hidden fa fa-list" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php $_ded920_old_params['_c1d802']=$_ded920_local_params;$_ded920_old_vars['_c1d802']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_de0f70']=$_ded920_local_params;$_ded920_old_vars['_de0f70']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php endif;$_ded920_local_params=$_ded920_old_params['_de0f70'];$_ded920_local_vars=$_ded920_old_vars['_de0f70'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_c1d802'];$_ded920_local_vars=$_ded920_old_vars['_c1d802'];?>

            <?php endif;$_ded920_local_params=$_ded920_old_params['_5070e6'];$_ded920_local_vars=$_ded920_old_vars['_5070e6'];?>

            <?php endif;$_ded920_local_params=$_ded920_old_params['_f03296'];$_ded920_local_vars=$_ded920_old_vars['_f03296'];?>

          <?php endif;$_ded920_local_params=$_ded920_old_params['_42ee47'];$_ded920_local_vars=$_ded920_old_vars['_42ee47'];?>

          <?php $_ded920_old_params['_321d38']=$_ded920_local_params;$_ded920_old_vars['_321d38']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_ded920_old_params['_25ede3']=$_ded920_local_params;$_ded920_old_vars['_25ede3']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_ded920_old_params['_d9719c']=$_ded920_local_params;$_ded920_old_vars['_d9719c']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_create','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#startUpload">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload','this_tag'=>'trans'],null,$this),$this)?>

          </button>
            <?php endif;$_ded920_local_params=$_ded920_old_params['_d9719c'];$_ded920_local_vars=$_ded920_old_vars['_d9719c'];?>

            <?php endif;$_ded920_local_params=$_ded920_old_params['_25ede3'];$_ded920_local_vars=$_ded920_old_vars['_25ede3'];?>

          <?php endif;$_ded920_local_params=$_ded920_old_params['_321d38'];$_ded920_local_vars=$_ded920_old_vars['_321d38'];?>

        <?php else:?>

          <?php $_ded920_old_params['_c226b4']=$_ded920_local_params;$_ded920_old_vars['_c226b4']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_ded920_old_params['_4d2798']=$_ded920_local_params;$_ded920_old_vars['_4d2798']=$_ded920_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'list','model'=>'$model','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php endif;$_ded920_local_params=$_ded920_old_params['_4d2798'];$_ded920_local_vars=$_ded920_old_vars['_4d2798'];?>

            <?php $_ded920_old_params['_1e7719']=$_ded920_local_params;$_ded920_old_vars['_1e7719']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._model','eq'=>'comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request._model','eq'=>'contact','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php endif;$_ded920_local_params=$_ded920_old_params['_1e7719'];$_ded920_local_vars=$_ded920_old_vars['_1e7719'];?>

            <?php $_ded920_old_params['_779e5e']=$_ded920_local_params;$_ded920_old_vars['_779e5e']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'show_return_to_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php endif;$_ded920_local_params=$_ded920_old_params['_779e5e'];$_ded920_local_vars=$_ded920_old_vars['_779e5e'];?>

          <?php endif;$_ded920_local_params=$_ded920_old_params['_c226b4'];$_ded920_local_vars=$_ded920_old_vars['_c226b4'];?>

        <?php endif;$_ded920_local_params=$_ded920_old_params['_4009b1'];$_ded920_local_vars=$_ded920_old_vars['_4009b1'];?>

          <?php $_ded920_old_params['_7d023e']=$_ded920_local_params;$_ded920_old_vars['_7d023e']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
          <?php endif;$_ded920_local_params=$_ded920_old_params['_7d023e'];$_ded920_local_vars=$_ded920_old_vars['_7d023e'];?>

      <?php endif;$_ded920_local_params=$_ded920_old_params['_5318bb'];$_ded920_local_vars=$_ded920_old_vars['_5318bb'];?>

      <?php endif;$_ded920_local_params=$_ded920_old_params['_9ce319'];$_ded920_local_vars=$_ded920_old_vars['_9ce319'];?>

      <?php $_ded920_old_params['_0f9436']=$_ded920_local_params;$_ded920_old_vars['_0f9436']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_ded920_old_params['_3e5890']=$_ded920_local_params;$_ded920_old_vars['_3e5890']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_ded920_old_params['_5e0ce0']=$_ded920_local_params;$_ded920_old_vars['_5e0ce0']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_ded920_old_params['_8a7c40']=$_ded920_local_params;$_ded920_old_vars['_8a7c40']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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

          <?php $_ded920_old_params['_2bd91a']=$_ded920_local_params;$_ded920_old_vars['_2bd91a']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="pack-left btn btn-secondary btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
&amp;manage_revision=1">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Revision','this_tag'=>'trans'],null,$this),$this)?>

          </a>
          <?php endif;$_ded920_local_params=$_ded920_old_params['_2bd91a'];$_ded920_local_vars=$_ded920_old_vars['_2bd91a'];?>

          <?php endif;$_ded920_local_params=$_ded920_old_params['_8a7c40'];$_ded920_local_vars=$_ded920_old_vars['_8a7c40'];?>

          <?php endif;$_ded920_local_params=$_ded920_old_params['_5e0ce0'];$_ded920_local_vars=$_ded920_old_vars['_5e0ce0'];?>

        <?php endif;$_ded920_local_params=$_ded920_old_params['_3e5890'];$_ded920_local_vars=$_ded920_old_vars['_3e5890'];?>

      <?php endif;$_ded920_local_params=$_ded920_old_params['_0f9436'];$_ded920_local_vars=$_ded920_old_vars['_0f9436'];?>

      <?php $_ded920_old_params['_4bd0fa']=$_ded920_local_params;$_ded920_old_vars['_4bd0fa']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_ded920_old_params['_cd589a']=$_ded920_local_params;$_ded920_old_vars['_cd589a']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_ded920_old_params['_368420']=$_ded920_local_params;$_ded920_old_vars['_368420']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'dashboard','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a class="btn btn-sm header-btn-icon" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=dashboard&amp;<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
">
          <i class="hidden fa fa-home" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
"></i>
          <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
</span>
        </a>
      <?php endif;$_ded920_local_params=$_ded920_old_params['_368420'];$_ded920_local_vars=$_ded920_old_vars['_368420'];?>

      <?php endif;$_ded920_local_params=$_ded920_old_params['_cd589a'];$_ded920_local_vars=$_ded920_old_vars['_cd589a'];?>

      <?php endif;$_ded920_local_params=$_ded920_old_params['_4bd0fa'];$_ded920_local_vars=$_ded920_old_vars['_4bd0fa'];?>

          </h1>
    <?php $c_7fe646=null;$_ded920_old_params['_7fe646']=$_ded920_local_params;$_ded920_old_vars['_7fe646']=$_ded920_local_vars;$a_7fe646=$this->setup_args(['name'=>'alert_close','this_tag'=>'setvarblock'],null,$this);ob_start();?>

    <button type="button" class="close" data-dismiss="alert" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
      <span aria-hidden="true">&times;</span>
    </button>
    <?php $c_7fe646=ob_get_clean();$c_7fe646=$this->block_setvarblock($a_7fe646,$c_7fe646,$this,$r_7fe646,1,'_7fe646');echo($c_7fe646); $_ded920_local_params=$_ded920_old_params['_7fe646'];?>

    <div class="alert alert-success hidden" id="header-alert" role="alert" tabindex="0">
      <button onclick="$('#header-alert').hide();" type="button" id="header-alert-close" class="close" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
        <span aria-hidden="true">&times;</span>
      </button>
      <span id="header-alert-message"></span>
    </div>
    <?php $_ded920_old_params['_ef90a7']=$_ded920_local_params;$_ded920_old_vars['_ef90a7']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'header_alert_message','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <div id="header-alert-message" class="alert alert-<?php $_ded920_old_params['_7dc140']=$_ded920_local_params;$_ded920_old_vars['_7dc140']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'header_alert_class','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'header_alert_class','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
success<?php endif;$_ded920_local_params=$_ded920_old_params['_7dc140'];$_ded920_local_vars=$_ded920_old_vars['_7dc140'];?>
" tabindex="0">
      <?php $_ded920_old_params['_d3312f']=$_ded920_local_params;$_ded920_old_vars['_d3312f']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'header_alert_force','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'alert_close','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_d3312f'];$_ded920_local_vars=$_ded920_old_vars['_d3312f'];?>

      <?php echo $this->function_var($this->setup_args(['name'=>'header_alert_message','this_tag'=>'var'],null,$this),$this)?>

      <?php $_ded920_old_params['_28fe68']=$_ded920_local_params;$_ded920_old_vars['_28fe68']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.need_rebuild','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild<?php $_ded920_old_params['_c5044e']=$_ded920_local_params;$_ded920_old_vars['_c5044e']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_ded920_local_params=$_ded920_old_params['_c5044e'];$_ded920_local_vars=$_ded920_old_vars['_c5044e'];?>
" class="popup">
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Publish your site to see these changes take effect.','this_tag'=>'trans'],null,$this),$this)?>

        </a>
      <?php endif;$_ded920_local_params=$_ded920_old_params['_28fe68'];$_ded920_local_vars=$_ded920_old_vars['_28fe68'];?>

    </div>
    <script>
    $('#header-alert-message').focus();
    </script>
    <?php endif;$_ded920_local_params=$_ded920_old_params['_ef90a7'];$_ded920_local_vars=$_ded920_old_vars['_ef90a7'];?>

    <?php $_ded920_old_params['_6686e4']=$_ded920_local_params;$_ded920_old_vars['_6686e4']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <div id="header-error-message" class="alert alert-danger" role="alert" tabindex="0">
      <?php echo paml_modifier_funcs('nl2br', paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'error','escape'=>'1','nl2br'=>'1','this_tag'=>'var'],null,$this),$this),ENT_QUOTES))?>

      </div>
    <script>
    $('#header-error-message').focus();
    </script>
    <?php endif;$_ded920_local_params=$_ded920_old_params['_6686e4'];$_ded920_local_vars=$_ded920_old_vars['_6686e4'];?>

<?php $_ded920_old_params['_101881']=$_ded920_local_params;$_ded920_old_vars['_101881']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.apply_theme','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div id="theme-alert-message" class="alert alert-success" role="alert" tabindex="0">
    <?php echo $this->function_trans($this->setup_args(['phrase'=>'The theme \'%s\' has been applied.','params'=>'$current_label','this_tag'=>'trans'],null,$this),$this)?>

    <?php $_ded920_old_params['_617839']=$_ded920_local_params;$_ded920_old_vars['_617839']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.skipped','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.skipped','setvar'=>'object_skipped','this_tag'=>'var'],null,$this),$this),$this->setup_args('object_skipped','setvar',$this),$this,'setvar')?>

      ( <?php echo paml_htmlspecialchars($this->function_trans($this->setup_args(['phrase'=>'%s object(s) has been skipped because it already existed.','params'=>'$object_skipped','escape'=>'','this_tag'=>'trans'],null,$this),$this),ENT_QUOTES)?>
 
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'To see the details, go to the list of Logs.','this_tag'=>'trans'],null,$this),$this)?>
 )
    <?php endif;$_ded920_local_params=$_ded920_old_params['_617839'];$_ded920_local_vars=$_ded920_old_vars['_617839'];?>

  </div>
    <script>
    $('#theme-alert-message').focus();
    </script>
<?php endif;$_ded920_local_params=$_ded920_old_params['_101881'];$_ded920_local_vars=$_ded920_old_vars['_101881'];?>

<?php $_ded920_old_params['_52af7c']=$_ded920_local_params;$_ded920_old_vars['_52af7c']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_theme','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="alert alert-info" role="alert" tabindex="0">
    <span id="current_theme"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Current theme is \'%s\'.','params'=>'$current_label','this_tag'=>'trans'],null,$this),$this)?>
</span>
  </div>
<?php else:?>

  <div class="alert alert-info" role="alert" tabindex="0">
    <span id="current_theme"><?php echo $this->function_trans($this->setup_args(['phrase'=>'The theme not selected.','this_tag'=>'trans'],null,$this),$this)?>
</span>
  </div>
<?php endif;$_ded920_local_params=$_ded920_old_params['_52af7c'];$_ded920_local_vars=$_ded920_old_vars['_52af7c'];?>

<?php $_ded920_old_params['_62be10']=$_ded920_local_params;$_ded920_old_vars['_62be10']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.pull','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.pull_theme_id','escape'=>'','setvar'=>'pull_theme_id','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('pull_theme_id','setvar',$this),$this,'setvar')?>

  <div class="alert alert-info" id="pull_theme_id" role="alert" tabindex="0">
    <?php echo $this->function_trans($this->setup_args(['phrase'=>'Exported the theme \'%s\' from a branch. Please select and apply this theme.','params'=>'$pull_theme_id','this_tag'=>'trans'],null,$this),$this)?>

  </div>
    <script>
    $('#pull_theme_id').focus();
    </script>
<?php endif;$_ded920_local_params=$_ded920_old_params['_62be10'];$_ded920_local_vars=$_ded920_old_vars['_62be10'];?>

<div class="table-screen">
<?php $c_f978b5=null;$_ded920_old_params['_f978b5']=$_ded920_local_params;$_ded920_old_vars['_f978b5']=$_ded920_local_vars;$a_f978b5=$this->setup_args(['name'=>'table_header','this_tag'=>'setvarblock'],null,$this);ob_start();?>

  <tr>
  <th class="cb-col"></th>
  <th><?php echo $this->function_trans($this->setup_args(['class'=>'short-col','phrase'=>'Name','this_tag'=>'trans'],null,$this),$this)?>
</th>
  <th style="width:80px">Ver.</th>
  <th><?php echo $this->function_trans($this->setup_args(['phrase'=>'Description','this_tag'=>'trans'],null,$this),$this)?>
</th>
</tr>
<?php $c_f978b5=ob_get_clean();$c_f978b5=$this->block_setvarblock($a_f978b5,$c_f978b5,$this,$r_f978b5,1,'_f978b5');echo($c_f978b5); $_ded920_local_params=$_ded920_old_params['_f978b5'];?>


<form action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST">
<input type="hidden" name="__mode" value="manage_theme">
<input type="hidden" name="magic_token" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'magic_token','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<input type="hidden" name="_type" value="apply_theme">
<input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
<table class="table table-striped table-sm listing-table table-hover">
<thead>
  <?php echo $this->function_var($this->setup_args(['name'=>'table_header','this_tag'=>'var'],null,$this),$this)?>

</thead>
<tbody id="list_body">
<?php $c_2cfa4e=null;$_ded920_old_params['_2cfa4e']=$_ded920_local_params;$_ded920_old_vars['_2cfa4e']=$_ded920_local_vars;$a_2cfa4e=$this->setup_args(['name'=>'theme_loop','this_tag'=>'loop'],null,$this);$_2cfa4e=-1;$r_2cfa4e=true;while($r_2cfa4e===true):$r_2cfa4e=($_2cfa4e!==-1)?false:true;echo $this->block_loop($a_2cfa4e,$c_2cfa4e,$this,$r_2cfa4e,++$_2cfa4e,'_2cfa4e');ob_start();?>
<?php $c_2cfa4e = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_2cfa4e=false;}if($c_2cfa4e ):?>

<tr id="line_<?php echo paml_htmlspecialchars($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'theme_id','regex_replace'=>'\'/[^0-9a-zA-Z]/\',\'\'','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/[^0-9a-zA-Z]/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),ENT_QUOTES)?>
" <?php $_ded920_old_params['_c09c0a']=$_ded920_local_params;$_ded920_old_vars['_c09c0a']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_theme','eq'=>'$theme_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
style="background-color:#ffefff"<?php endif;$_ded920_local_params=$_ded920_old_params['_c09c0a'];$_ded920_local_vars=$_ded920_old_vars['_c09c0a'];?>
>
  <th class="cb-col">
    <label class="custom-control custom-radio">
      <input class="custom-control-input selector" <?php $_ded920_old_params['_426461']=$_ded920_local_params;$_ded920_old_vars['_426461']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_theme','eq'=>'$theme_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_ded920_local_params=$_ded920_old_params['_426461'];$_ded920_local_vars=$_ded920_old_vars['_426461'];?>
 type="radio" id="box_<?php echo paml_htmlspecialchars($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'theme_id','regex_replace'=>'\'/[^0-9a-zA-Z]/\',\'\'','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/[^0-9a-zA-Z]/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),ENT_QUOTES)?>
"
        name="theme_id" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'theme_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <span class="custom-control-indicator"></span>
    </label>
  </th>
  <td><img style="vertical-align:top !important" src="<?php echo $this->function_var($this->setup_args(['name'=>'thumbnail','this_tag'=>'var'],null,$this),$this)?>
" width="48" height="48" alt="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Thumbnail','this_tag'=>'trans'],null,$this),$this)?>
">
  &nbsp;
  <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

<?php $_ded920_old_params['_62ee41']=$_ded920_local_params;$_ded920_old_vars['_62ee41']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'author_link','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<br><?php echo $this->function_trans($this->setup_args(['phrase'=>'Creator','this_tag'=>'trans'],null,$this),$this)?>
 : <a target="_blank" href="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'author_link','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php endif;$_ded920_local_params=$_ded920_old_params['_62ee41'];$_ded920_local_vars=$_ded920_old_vars['_62ee41'];?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'author','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_ded920_old_params['_ebe17e']=$_ded920_local_params;$_ded920_old_vars['_ebe17e']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'author_link','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</a><?php endif;$_ded920_local_params=$_ded920_old_params['_ebe17e'];$_ded920_local_vars=$_ded920_old_vars['_ebe17e'];?>

  </td>
  <td><span id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'theme_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
_version"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'version','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
    <?php $_ded920_old_params['_b6ea4b']=$_ded920_local_params;$_ded920_old_vars['_b6ea4b']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_theme','eq'=>'$theme_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_5f6926']=$_ded920_local_params;$_ded920_old_vars['_5f6926']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'repository','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_b27f6d']=$_ded920_local_params;$_ded920_old_vars['_b27f6d']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_write','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <button type="button" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'theme_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
_edit_version" class="branch-ctl">
      <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Edit Version','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-pencil-square" aria-hidden="true"></i>
      <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Edit','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </button>
    <?php endif;$_ded920_local_params=$_ded920_old_params['_b27f6d'];$_ded920_local_vars=$_ded920_old_vars['_b27f6d'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_5f6926'];$_ded920_local_vars=$_ded920_old_vars['_5f6926'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_b6ea4b'];$_ded920_local_vars=$_ded920_old_vars['_b6ea4b'];?>

  </td>
  <td><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'description','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

  <?php $_ded920_old_params['_f70ff5']=$_ded920_local_params;$_ded920_old_vars['_f70ff5']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'repository','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <hr>
    <?php $_ded920_old_params['_5a57e8']=$_ded920_local_params;$_ded920_old_vars['_5a57e8']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'upgrade_version','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="alert alert-warning" role="alert" tabindex="0" style="margin-left:-10px">
    <?php echo paml_htmlspecialchars($this->function_trans($this->setup_args(['phrase'=>'There is a new version (ver. %s).','params'=>'$upgrade_version','escape'=>'','this_tag'=>'trans'],null,$this),$this),ENT_QUOTES)?>

  </div>
    <?php endif;$_ded920_local_params=$_ded920_old_params['_5a57e8'];$_ded920_local_vars=$_ded920_old_vars['_5a57e8'];?>

    <a href="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'repository','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" target="_blank"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'repository','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</a>
    <?php $c_a4030d=null;$_ded920_old_params['_a4030d']=$_ded920_local_params;$_ded920_old_vars['_a4030d']=$_ded920_local_vars;$a_a4030d=$this->setup_args(['name'=>'branches','this_tag'=>'loop'],null,$this);$_a4030d=-1;$r_a4030d=true;while($r_a4030d===true):$r_a4030d=($_a4030d!==-1)?false:true;echo $this->block_loop($a_a4030d,$c_a4030d,$this,$r_a4030d,++$_a4030d,'_a4030d');ob_start();?>
<?php $c_a4030d = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_a4030d=false;}if($c_a4030d ):?>

    <?php $_ded920_old_params['_3513b1']=$_ded920_local_params;$_ded920_old_vars['_3513b1']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    /tree/
    <select style="height:28px;width:90px;padding-left:5px;padding-right:5px;" class="form-control form-control-sm custom-select branch-ctl" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'theme_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
_branch" name="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'theme_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
_branch">
    <?php endif;$_ded920_local_params=$_ded920_old_params['_3513b1'];$_ded920_local_vars=$_ded920_old_vars['_3513b1'];?>

    <option <?php $_ded920_old_params['_ede480']=$_ded920_local_params;$_ded920_old_vars['_ede480']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_branch','eq'=>'$__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_ded920_local_params=$_ded920_old_params['_ede480'];$_ded920_local_vars=$_ded920_old_vars['_ede480'];?>
 value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
    <?php $_ded920_old_params['_efc9a2']=$_ded920_local_params;$_ded920_old_vars['_efc9a2']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    </select>
    <?php endif;$_ded920_local_params=$_ded920_old_params['_efc9a2'];$_ded920_local_vars=$_ded920_old_vars['_efc9a2'];?>

    <?php endif;$c_a4030d=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_a4030d'];$_ded920_local_vars=$_ded920_old_vars['_a4030d'];?>

    <?php $_ded920_old_params['_43d2bc']=$_ded920_local_params;$_ded920_old_vars['_43d2bc']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'theme_link','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <a class="btn btn-secondary btn-sm branch-ctl" href="<?php echo $this->function_var($this->setup_args(['name'=>'theme_link','this_tag'=>'var'],null,$this),$this)?>
" target="_blank" style="padding:4px 8px">
      <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View on GitHub','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-external-link" aria-hidden="true"></i>
      <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View on GitHub','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </a>
    <?php endif;$_ded920_local_params=$_ded920_old_params['_43d2bc'];$_ded920_local_vars=$_ded920_old_vars['_43d2bc'];?>

    <button type="button" class="btn btn-secondary btn-sm branch-ctl" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'theme_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
_token">
      <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Set personal access token for GitHub','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-lock" aria-hidden="true"></i>
      <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Token','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </button>
    <button type="button" class="btn btn-info btn-sm branch-ctl" style="padding:5px 10px" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'theme_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
_pull">
      <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Pull theme from GitHub','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-refresh" aria-hidden="true"></i>
      <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Pull','this_tag'=>'trans'],null,$this),$this)?>
"</span>
    </button>
    <?php $_ded920_old_params['_5dc7f1']=$_ded920_local_params;$_ded920_old_vars['_5dc7f1']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_theme','eq'=>'$theme_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_278430']=$_ded920_local_params;$_ded920_old_vars['_278430']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'repository','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ded920_old_params['_7cd899']=$_ded920_local_params;$_ded920_old_vars['_7cd899']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_write','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <!--Commit Update Files-->
    <?php endif;$_ded920_local_params=$_ded920_old_params['_7cd899'];$_ded920_local_vars=$_ded920_old_vars['_7cd899'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_278430'];$_ded920_local_vars=$_ded920_old_vars['_278430'];?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_5dc7f1'];$_ded920_local_vars=$_ded920_old_vars['_5dc7f1'];?>

  <?php endif;$_ded920_local_params=$_ded920_old_params['_f70ff5'];$_ded920_local_vars=$_ded920_old_vars['_f70ff5'];?>

  </td>
</tr>
<script>
$('#<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'theme_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
_branch').change(function() {
    var branch = $(this).val();
    var str = '__mode=theme_setting&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&theme_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'theme_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
        str += '&magic_token=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'magic_token','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&_type=branch&branch=' + branch;
    $.post('<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
', str,
    function ( data ) {
        if( data.result == true ) {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'Save theme\'s branch of the theme \'%s\'.','params'=>'$theme_id','this_tag'=>'trans'],null,$this),$this)?>
");
        } else {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'Failed to save theme\'s branch of the theme \'%s\'.','params'=>'$theme_id','this_tag'=>'trans'],null,$this),$this)?>
", 'danger');
        }
    },
    "json"
    );
});
$('#<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'theme_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
_token').click(function() {
    var token = prompt('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Please enter personal access token for GitHub.','this_tag'=>'trans'],null,$this),$this)?>
', '' );
    if ( token == null ) {
        return;
    }
    if (! token ) {
        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'You did not any input.','this_tag'=>'trans'],null,$this),$this)?>
' );
        return;
    }
    var str = '__mode=theme_setting&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&theme_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'theme_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
        str += '&magic_token=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'magic_token','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&_type=token&token=' + token;
    $.post('<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
', str,
    function ( data ) {
        if( data.result == true ) {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'Save personal access token for GitHub of the theme \'%s\'.','params'=>'$theme_id','this_tag'=>'trans'],null,$this),$this)?>
");
        } else {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'Failed to save personal access token for GitHub of the theme \'%s\'.','params'=>'$theme_id','this_tag'=>'trans'],null,$this),$this)?>
", 'danger');
        }
    },
    "json"
    );
});
$('#<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'theme_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
_edit_version').click(function() {
    var current = $('#<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'theme_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
_version').html();
    var version = prompt('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Please enter new version number for this theme.','this_tag'=>'trans'],null,$this),$this)?>
', current );
    if ( version == null ) {
        return;
    }
    if (! version ) {
        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'You did not any input.','this_tag'=>'trans'],null,$this),$this)?>
' );
        return;
    }
    if (! version.match(/^[0-9\.]{1,}$/) ) {
        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Please enter the correct version number.','this_tag'=>'trans'],null,$this),$this)?>
' );
        return;
    }
    if ( version == current ) {
        return;
    }
    var str = '__mode=theme_setting&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&theme_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'theme_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
        str += '&magic_token=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'magic_token','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&_type=version&version=' + version;
    $.post('<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
', str,
    function ( data ) {
        if( data.result == true ) {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'The version of the theme \'%s\' has been updated.','params'=>'$theme_id','this_tag'=>'trans'],null,$this),$this)?>
");
            $('#<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'theme_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
_version').html( version );
        } else {
            alert( data.message );
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'Failed to update version of the theme \'%s\'.','params'=>'$theme_id','this_tag'=>'trans'],null,$this),$this)?>
", 'danger');
        }
    },
    "json"
    );
});
$('#<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'theme_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
_pull').click(function() {
    if(! confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to pull this theme from remote branch?','this_tag'=>'trans'],null,$this),$this)?>
') ) {
        return false;
    }
    var str = '__mode=theme_setting&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&theme_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'theme_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
        str += '&magic_token=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'magic_token','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&_type=pull&pull=pull';
    $.post('<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
', str,
    function ( data ) {
        if( data.result == true ) {
            var redirectTo = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=manage_theme&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&pull_theme_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'theme_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&pull=1';
            window.location.href = redirectTo;
        } else {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'Failed to export theme \'%s\' from a remote branch.','params'=>'$theme_id','this_tag'=>'trans'],null,$this),$this)?>
", 'danger');
        }
    },
    "json"
    );
});
</script>
<?php endif;$c_2cfa4e=ob_get_clean();endwhile; $_ded920_local_params=$_ded920_old_params['_2cfa4e'];$_ded920_local_vars=$_ded920_old_vars['_2cfa4e'];?>

</tbody>
<tfoot>
  <?php echo $this->function_var($this->setup_args(['name'=>'table_header','this_tag'=>'var'],null,$this),$this)?>

</tfoot>
</table>
<div <?php $_ded920_old_params['_67e26b']=$_ded920_local_params;$_ded920_old_vars['_67e26b']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_stickey_buttons','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
class="form-group edit-action-bar pl-2" style="margin-left:-15px;margin-right:-15px"<?php else:?>
class="form-group"<?php endif;$_ded920_local_params=$_ded920_old_params['_67e26b'];$_ded920_local_vars=$_ded920_old_vars['_67e26b'];?>
>
  <button type="submit" class="apply-btn btn btn-primary"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
</div>
</form>
</div>
<script>
var in_link = false;
$('input').mouseover(function() {
    in_link = true;
});
$('input').mouseout(function() {
    in_link = false;
});
$('.branch-ctl').click(function(eo){
    eo.stopPropagation();
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
});
$('.selector').click(function(){
    return false;
});
$('.apply-btn').click(function() {
    if (! $('input[name=theme_id]:checked').val() ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'The theme not selected.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    if(! confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to apply this theme?','this_tag'=>'trans'],null,$this),$this)?>
') ) {
        return false;
    }
});
$(":radio").keypress(function(e) {
    if ( e.keyCode == 13 ) {
        if ( $(this).prop('checked') ) {
            $(this).prop('checked', false);
        } else {
            $(this).prop('checked', true);
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

  <?php $_ded920_old_params['_8a73c7']=$_ded920_local_params;$_ded920_old_vars['_8a73c7']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'copyright','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <footer class="footer bar">
      <?php $_ded920_old_params['_c82f28']=$_ded920_local_params;$_ded920_old_vars['_c82f28']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <span class="copyright"><?php echo $this->modifier_eval($this->function_var($this->setup_args(['name'=>'copyright','eval'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','eval',$this),$this,'eval')?>
</span>
      <?php endif;$_ded920_local_params=$_ded920_old_params['_c82f28'];$_ded920_local_vars=$_ded920_old_vars['_c82f28'];?>

    </footer>
  <?php endif;$_ded920_local_params=$_ded920_old_params['_8a73c7'];$_ded920_local_vars=$_ded920_old_vars['_8a73c7'];?>

<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script>
$(function() {
    $(".popup").click(function(){
        window.open(this.href,"RebuildPopupWindow","width=420,height=<?php $_ded920_old_params['_95bbbc']=$_ded920_local_params;$_ded920_old_vars['_95bbbc']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'debug_mode','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
360<?php else:?>
320<?php endif;$_ded920_local_params=$_ded920_old_params['_95bbbc'];$_ded920_local_vars=$_ded920_old_vars['_95bbbc'];?>
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
<?php $_ded920_old_params['_e5aec2']=$_ded920_local_params;$_ded920_old_vars['_e5aec2']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_ded920_old_params['_4c28b6']=$_ded920_local_params;$_ded920_old_vars['_4c28b6']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_ded920_old_params['_a8de34']=$_ded920_local_params;$_ded920_old_vars['_a8de34']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_ded920_old_params['_dc239d']=$_ded920_local_params;$_ded920_old_vars['_dc239d']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_ded920_local_params=$_ded920_old_params['_dc239d'];$_ded920_local_vars=$_ded920_old_vars['_dc239d'];?>

<?php endif;$_ded920_local_params=$_ded920_old_params['_a8de34'];$_ded920_local_vars=$_ded920_old_vars['_a8de34'];?>

<?php $_ded920_old_params['_7e074f']=$_ded920_local_params;$_ded920_old_vars['_7e074f']=$_ded920_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_ded920_old_params['_19340a']=$_ded920_local_params;$_ded920_old_vars['_19340a']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_ded920_local_params=$_ded920_old_params['_19340a'];$_ded920_local_vars=$_ded920_old_vars['_19340a'];?>

<?php $_ded920_old_params['_ebb7d8']=$_ded920_local_params;$_ded920_old_vars['_ebb7d8']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_ded920_local_params=$_ded920_old_params['_ebb7d8'];$_ded920_local_vars=$_ded920_old_vars['_ebb7d8'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_ded920_local_params=$_ded920_old_params['_7e074f'];$_ded920_local_vars=$_ded920_old_vars['_7e074f'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_ded920_old_params['_eaa7a9']=$_ded920_local_params;$_ded920_old_vars['_eaa7a9']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_ded920_local_params=$_ded920_old_params['_eaa7a9'];$_ded920_local_vars=$_ded920_old_vars['_eaa7a9'];?>

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
?__mode=view&_type=list&_model=asset<?php $_ded920_old_params['_570261']=$_ded920_local_params;$_ded920_old_vars['_570261']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_570261'];$_ded920_local_vars=$_ded920_old_vars['_570261'];?>
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
?__mode=view&_type=list&_model=asset<?php $_ded920_old_params['_e20bfc']=$_ded920_local_params;$_ded920_old_vars['_e20bfc']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_e20bfc'];$_ded920_local_vars=$_ded920_old_vars['_e20bfc'];?>
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
            <?php $_ded920_old_params['_f3b724']=$_ded920_local_params;$_ded920_old_vars['_f3b724']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            if(ed.id && ed.id == 'text'){
              var clipboard_image = $('#clipboard-image');
              var inline_image = $('#inline-image');
              var bg_image_url = clipboard_image.val();
              if ( inline_image.length ) {
                  bg_image_url = inline_image.attr('href');
              }
              if ( clipboard_image.length ) {
                <?php $_ded920_old_params['_f61647']=$_ded920_local_params;$_ded920_old_vars['_f61647']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_f61647'];$_ded920_local_vars=$_ded920_old_vars['_f61647'];?>

                <?php $_ded920_old_params['_c26dec']=$_ded920_local_params;$_ded920_old_vars['_c26dec']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_c26dec'];$_ded920_local_vars=$_ded920_old_vars['_c26dec'];?>

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
            <?php endif;$_ded920_local_params=$_ded920_old_params['_f3b724'];$_ded920_local_vars=$_ded920_old_vars['_f3b724'];?>

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
<?php $_ded920_old_params['_28d093']=$_ded920_local_params;$_ded920_old_vars['_28d093']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_ded920_old_params['_143a79']=$_ded920_local_params;$_ded920_old_vars['_143a79']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_ded920_local_params=$_ded920_old_params['_143a79'];$_ded920_local_vars=$_ded920_old_vars['_143a79'];?>

<?php endif;$_ded920_local_params=$_ded920_old_params['_28d093'];$_ded920_local_vars=$_ded920_old_vars['_28d093'];?>

<?php $_ded920_old_params['_dcc514']=$_ded920_local_params;$_ded920_old_vars['_dcc514']=$_ded920_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_ded920_old_params['_d4be79']=$_ded920_local_params;$_ded920_old_vars['_d4be79']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_ded920_local_params=$_ded920_old_params['_d4be79'];$_ded920_local_vars=$_ded920_old_vars['_d4be79'];?>

<?php $_ded920_old_params['_a55fe7']=$_ded920_local_params;$_ded920_old_vars['_a55fe7']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_ded920_local_params=$_ded920_old_params['_a55fe7'];$_ded920_local_vars=$_ded920_old_vars['_a55fe7'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_ded920_local_params=$_ded920_old_params['_dcc514'];$_ded920_local_vars=$_ded920_old_vars['_dcc514'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_ded920_old_params['_5f337b']=$_ded920_local_params;$_ded920_old_vars['_5f337b']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_ded920_local_params=$_ded920_old_params['_5f337b'];$_ded920_local_vars=$_ded920_old_vars['_5f337b'];?>

        relative_urls : false,
        image_advtab: true,
        promotion: false,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code<?php $_ded920_old_params['_83a14d']=$_ded920_local_params;$_ded920_old_vars['_83a14d']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','lt'=>'6','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 print paste<?php endif;$_ded920_local_params=$_ded920_old_params['_83a14d'];$_ded920_local_vars=$_ded920_old_vars['_83a14d'];?>
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
                <?php $_ded920_old_params['_c8ef17']=$_ded920_local_params;$_ded920_old_vars['_c8ef17']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'gallery',
                <?php endif;$_ded920_local_params=$_ded920_old_params['_c8ef17'];$_ded920_local_vars=$_ded920_old_vars['_c8ef17'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_ded920_old_params['_06ea6f']=$_ded920_local_params;$_ded920_old_vars['_06ea6f']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_06ea6f'];$_ded920_local_vars=$_ded920_old_vars['_06ea6f'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.ui.registry.addButton('pt-file', {
                <?php $_ded920_old_params['_97fb2e']=$_ded920_local_params;$_ded920_old_vars['_97fb2e']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'browse',
                <?php endif;$_ded920_local_params=$_ded920_old_params['_97fb2e'];$_ded920_local_vars=$_ded920_old_vars['_97fb2e'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_ded920_old_params['_9b5345']=$_ded920_local_params;$_ded920_old_vars['_9b5345']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_9b5345'];$_ded920_local_vars=$_ded920_old_vars['_9b5345'];?>
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
            <?php $_ded920_old_params['_3041d8']=$_ded920_local_params;$_ded920_old_vars['_3041d8']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
                      <?php $_ded920_old_params['_8257fd']=$_ded920_local_params;$_ded920_old_vars['_8257fd']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_8257fd'];$_ded920_local_vars=$_ded920_old_vars['_8257fd'];?>

                      <?php $_ded920_old_params['_e339a7']=$_ded920_local_params;$_ded920_old_vars['_e339a7']=$_ded920_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ded920_local_params=$_ded920_old_params['_e339a7'];$_ded920_local_vars=$_ded920_old_vars['_e339a7'];?>

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
            <?php endif;$_ded920_local_params=$_ded920_old_params['_3041d8'];$_ded920_local_vars=$_ded920_old_vars['_3041d8'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php endif;$_ded920_local_params=$_ded920_old_params['_4c28b6'];$_ded920_local_vars=$_ded920_old_vars['_4c28b6'];?>

<?php endif;$_ded920_local_params=$_ded920_old_params['_e5aec2'];$_ded920_local_vars=$_ded920_old_vars['_e5aec2'];?>

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
<?php $_ded920_old_params['_29b23a']=$_ded920_local_params;$_ded920_old_vars['_29b23a']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_ded920_old_params['_a691fe']=$_ded920_local_params;$_ded920_old_vars['_a691fe']=$_ded920_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','ne'=>'loading','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php endif;$_ded920_local_params=$_ded920_old_params['_a691fe'];$_ded920_local_vars=$_ded920_old_vars['_a691fe'];?>

<?php endif;$_ded920_local_params=$_ded920_old_params['_29b23a'];$_ded920_local_vars=$_ded920_old_vars['_29b23a'];?>

</script>
  </div>
<?php echo $this->function_var($this->setup_args(['name'=>'html_body_footer','this_tag'=>'var'],null,$this),$this)?>

  </body>
</html>

<?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\manage_theme.tmpl' => 1694708530,
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
  'time' => 1744002346,
);?>