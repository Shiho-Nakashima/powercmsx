<?php ob_start();?><?php $_ba1604_vars=&$this->vars;$_ba1604_old_params=&$this->old_params;$_ba1604_local_params=&$this->local_params;$_ba1604_old_vars=&$this->old_vars;$_ba1604_local_vars=&$this->local_vars;?><?php echo $this->function_setvar($this->setup_args(['name'=>'page_title','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

<?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'Login','setvar'=>'html_title','this_tag'=>'trans'],null,$this),$this),$this->setup_args('html_title','setvar',$this),$this,'setvar')?>

<?php $c_409193=null;$_ba1604_old_params['_409193']=$_ba1604_local_params;$_ba1604_old_vars['_409193']=$_ba1604_local_vars;$a_409193=$this->setup_args(['name'=>'recover_link','this_tag'=>'setvarblock'],null,$this);ob_start();?>

<a href="<?php echo $this->modifier_relative($this->function_var($this->setup_args(['name'=>'script_uri','relative'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('','relative',$this),$this,'relative')?>
?__mode=start_recover"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Password Reset','this_tag'=>'trans'],null,$this),$this)?>
</a>
<?php $c_409193=ob_get_clean();$c_409193=$this->block_setvarblock($a_409193,$c_409193,$this,$r_409193,1,'_409193');echo($c_409193); $_ba1604_local_params=$_ba1604_old_params['_409193'];?>

<?php $c_5f063c=null;$_ba1604_old_params['_5f063c']=$_ba1604_local_params;$_ba1604_old_vars['_5f063c']=$_ba1604_local_vars;$a_5f063c=$this->setup_args(['name'=>'html_head','append'=>'1','this_tag'=>'setvarblock'],null,$this);ob_start();?>

<style>
body { background-color: #efefef; }
h1 { display: none; }
.card-img-top { max-width: 15rem; }
.card { margin:auto; width:60%; max-width: 640px; margin-top: 5rem; border-color: #ccc; border-radius: 10px; }
.card-image-wrapper { border-radius: 10px 10px 0 0; }
@media ( max-width: 991px ) {
  .card-img-top { width: 37% !important; }
  .card { width:70% !important; }
}
@media ( max-width: 769px ) {
  .card-img-top { width: 40% !important; }
  .card { width:88% !important; }
}
@media ( max-width: 576px ) {
  .card { width:95% !important; }
  .card-inner { padding: 1.5rem !important; }
}
@media ( max-height: 650px ) {
  .card { margin-top: 1.5rem }
}
@media ( max-height: 500px ) {
  .card { margin-top: -0.5rem }
}
.btn {
  margin-left: 0;
}
.footer-btns {
  margin-left: 0px;
}
</style>
<?php $c_5f063c=ob_get_clean();$c_5f063c=$this->block_setvarblock($a_5f063c,$c_5f063c,$this,$r_5f063c,1,'_5f063c');echo($c_5f063c); $_ba1604_local_params=$_ba1604_old_params['_5f063c'];?>

<?php $_ba1604_old_params['_44c0ec']=$_ba1604_local_params;$_ba1604_old_vars['_44c0ec']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._lockout','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $_ba1604_old_params['_b8d813']=$_ba1604_local_params;$_ba1604_old_vars['_b8d813']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'ip','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'This IP address was locked out because you failed to log in continuously.','setvar'=>'lockout_error','this_tag'=>'trans'],null,$this),$this),$this->setup_args('lockout_error','setvar',$this),$this,'setvar')?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request._type','eq'=>'user','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'This User was locked out because you failed to log in continuously.','setvar'=>'lockout_error','this_tag'=>'trans'],null,$this),$this),$this->setup_args('lockout_error','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'lockout_error','value'=>'$recover_link','append'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_ba1604_local_params=$_ba1604_old_params['_b8d813'];$_ba1604_local_vars=$_ba1604_old_vars['_b8d813'];?>

<?php endif;$_ba1604_local_params=$_ba1604_old_params['_44c0ec'];$_ba1604_local_vars=$_ba1604_old_vars['_44c0ec'];?>

<?php $_ba1604_old_params['_bf5e82']=$_ba1604_local_params;$_ba1604_old_vars['_bf5e82']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'logout','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_ba1604_old_params['_36138b']=$_ba1604_local_params;$_ba1604_old_vars['_36138b']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'admin_ip','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'Administrator login from this IP address is not allowed.','setvar'=>'lockout_error','this_tag'=>'trans'],null,$this),$this),$this->setup_args('lockout_error','setvar',$this),$this,'setvar')?>

<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request._type','eq'=>'not_allowed_ip','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'Login from this IP address is not allowed.','setvar'=>'lockout_error','this_tag'=>'trans'],null,$this),$this),$this->setup_args('lockout_error','setvar',$this),$this,'setvar')?>

<?php endif;$_ba1604_local_params=$_ba1604_old_params['_36138b'];$_ba1604_local_vars=$_ba1604_old_vars['_36138b'];?>

<?php endif;$_ba1604_local_params=$_ba1604_old_params['_bf5e82'];$_ba1604_local_vars=$_ba1604_old_vars['_bf5e82'];?>

<!DOCTYPE html>
<html lang="<?php $_ba1604_old_params['_e52215']=$_ba1604_local_params;$_ba1604_old_vars['_e52215']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_language','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_language','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
en<?php endif;$_ba1604_local_params=$_ba1604_old_params['_e52215'];$_ba1604_local_vars=$_ba1604_old_vars['_e52215'];?>
">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="author" content="Alfasado Inc.">
    <meta name="robots" content="noindex">
    <meta name="robots" content="nofollow">
    <link rel="icon" href="favicon.ico">
    <title><?php $_ba1604_old_params['_a463da']=$_ba1604_local_params;$_ba1604_old_vars['_a463da']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'html_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'html_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php else:?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'page_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_a463da'];$_ba1604_local_vars=$_ba1604_old_vars['_a463da'];?>
 | <?php echo $this->modifier_escape($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'appname','escape'=>'single','this_tag'=>'getoption'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php $_ba1604_old_params['_18c60f']=$_ba1604_local_params;$_ba1604_old_vars['_18c60f']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ba1604_old_params['_6fe5c6']=$_ba1604_local_params;$_ba1604_old_vars['_6fe5c6']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 | <?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_6fe5c6'];$_ba1604_local_vars=$_ba1604_old_vars['_6fe5c6'];?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_18c60f'];$_ba1604_local_vars=$_ba1604_old_vars['_18c60f'];?>
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
    <?php $_ba1604_old_params['_821e3f']=$_ba1604_local_params;$_ba1604_old_vars['_821e3f']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ba1604_old_params['_10d601']=$_ba1604_local_params;$_ba1604_old_vars['_10d601']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'list_screen','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_10d601'];$_ba1604_local_vars=$_ba1604_old_vars['_10d601'];?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_821e3f'];$_ba1604_local_vars=$_ba1604_old_vars['_821e3f'];?>

    <style type="text/css">
    <?php $_ba1604_old_params['_1c4286']=$_ba1604_local_params;$_ba1604_old_vars['_1c4286']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'list_screen','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
.disp-option-button { position:absolute; top: 5px; right: 15px; }<?php endif;$_ba1604_local_params=$_ba1604_old_params['_1c4286'];$_ba1604_local_vars=$_ba1604_old_vars['_1c4286'];?>

    <?php $_ba1604_old_params['_767ed4']=$_ba1604_local_params;$_ba1604_old_vars['_767ed4']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_stickey_buttons','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ba1604_old_params['_a5a127']=$_ba1604_local_params;$_ba1604_old_vars['_a5a127']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_ba1604_old_params['_79b59d']=$_ba1604_local_params;$_ba1604_old_vars['_79b59d']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickybgcolor','value'=>'$workspace_barcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_79b59d'];$_ba1604_local_vars=$_ba1604_old_vars['_79b59d'];?>

      <?php $_ba1604_old_params['_8d28d8']=$_ba1604_local_params;$_ba1604_old_vars['_8d28d8']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickycolor','value'=>'$workspace_bartextcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_8d28d8'];$_ba1604_local_vars=$_ba1604_old_vars['_8d28d8'];?>

      <?php endif;$_ba1604_local_params=$_ba1604_old_params['_a5a127'];$_ba1604_local_vars=$_ba1604_old_vars['_a5a127'];?>

      <?php $_ba1604_old_params['_17407d']=$_ba1604_local_params;$_ba1604_old_vars['_17407d']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickybgcolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'barcolor','setvar'=>'stickybgcolor','this_tag'=>'getoption'],null,$this),$this),$this->setup_args('stickybgcolor','setvar',$this),$this,'setvar')?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_17407d'];$_ba1604_local_vars=$_ba1604_old_vars['_17407d'];?>

      <?php $_ba1604_old_params['_7225ea']=$_ba1604_local_params;$_ba1604_old_vars['_7225ea']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickycolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'bartextcolor','setvar'=>'stickycolor','this_tag'=>'getoption'],null,$this),$this),$this->setup_args('stickycolor','setvar',$this),$this,'setvar')?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_7225ea'];$_ba1604_local_vars=$_ba1604_old_vars['_7225ea'];?>

      @media ( min-height: 576px ) {
      .edit-action-bar { position: sticky; bottom: 0px; z-index: 1040; background: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickybgcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
;
          padding: 10px 0px; vertical-align: middle; line-height: 1; border-top: 1px solid #CCC; }
      .edit-action-bar button { border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      .edit-action-bar label { color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      }
    <?php endif;$_ba1604_local_params=$_ba1604_old_params['_767ed4'];$_ba1604_local_vars=$_ba1604_old_vars['_767ed4'];?>

      .nav-top,.brand-prototype{ background-color: <?php echo $this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'barcolor','this_tag'=>'getoption'],null,$this),$this)?>
 !important; color: <?php echo $this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'bartextcolor','this_tag'=>'getoption'],null,$this),$this)?>
 !important; }
      <?php $_ba1604_old_params['_6c1afe']=$_ba1604_local_params;$_ba1604_old_vars['_6c1afe']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .form-control, .custom-select, .relation_nestable_list, .custom-control-indicator, .tox-tinymce, .mce-tinymce, .btn-outline-secondary, .btn-secondary, .pagination-sm li a{ border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important }
      <?php endif;$_ba1604_local_params=$_ba1604_old_params['_6c1afe'];$_ba1604_local_vars=$_ba1604_old_vars['_6c1afe'];?>

    </style>
    <?php echo $this->function_var($this->setup_args(['name'=>'html_head','this_tag'=>'var'],null,$this),$this)?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_css','setvar'=>'config_user_css','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_css','setvar',$this),$this,'setvar')?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_js','setvar'=>'config_user_js','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_js','setvar',$this),$this,'setvar')?>

    <?php $_ba1604_old_params['_57acd1']=$_ba1604_local_params;$_ba1604_old_vars['_57acd1']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_css','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_css','this_tag'=>'var'],null,$this),$this)?>
"><?php endif;$_ba1604_local_params=$_ba1604_old_params['_57acd1'];$_ba1604_local_vars=$_ba1604_old_vars['_57acd1'];?>

    <?php $_ba1604_old_params['_80fe68']=$_ba1604_local_params;$_ba1604_old_vars['_80fe68']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_js','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_js','this_tag'=>'var'],null,$this),$this)?>
"></script><?php endif;$_ba1604_local_params=$_ba1604_old_params['_80fe68'];$_ba1604_local_vars=$_ba1604_old_vars['_80fe68'];?>

  </head>
  <body class="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'body_class','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 dialog">
<?php $_ba1604_old_params['_2b8cb0']=$_ba1604_local_params;$_ba1604_old_vars['_2b8cb0']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
jQuery.fn.extend({
  ksortable: function(options) {
    let self = this;
    self.sortable(options);
    $(self).children().attr('tabindex', 0);
    $(self).on('keydown', '> *', function(event) {
    // $('li', this).attr('tabindex', 0).bind('keydown', function(event) {
        if ( event.target && /^(input|textarea|select)$/.test(event.target.tagName.toLowerCase()) ) {
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
<?php $_ba1604_old_params['_cd6ac3']=$_ba1604_local_params;$_ba1604_old_vars['_cd6ac3']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_loader','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div id="__loader-bg">
  <img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif" alt="" width="45" height="45">
</div>
<script>
window.addEventListener('load', function(){
    $('#__loader-bg').hide("fast");
});
</script>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_cd6ac3'];$_ba1604_local_vars=$_ba1604_old_vars['_cd6ac3'];?>

<?php endif;$_ba1604_local_params=$_ba1604_old_params['_2b8cb0'];$_ba1604_local_vars=$_ba1604_old_vars['_2b8cb0'];?>

<?php $_ba1604_old_params['_e349de']=$_ba1604_local_params;$_ba1604_old_vars['_e349de']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ba1604_old_params['_f73983']=$_ba1604_local_params;$_ba1604_old_vars['_f73983']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.direct_edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ba1604_old_params['_71a312']=$_ba1604_local_params;$_ba1604_old_vars['_71a312']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.saved','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div id="__loader-bg">
  <img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif" alt="" width="45" height="45">
</div>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_71a312'];$_ba1604_local_vars=$_ba1604_old_vars['_71a312'];?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_f73983'];$_ba1604_local_vars=$_ba1604_old_vars['_f73983'];?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_e349de'];$_ba1604_local_vars=$_ba1604_old_vars['_e349de'];?>

    <div class="container-fluid full">
    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    
  <?php $_ba1604_old_params['_529069']=$_ba1604_local_params;$_ba1604_old_vars['_529069']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'can_action','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'disp_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_ba1604_old_params['_7272e0']=$_ba1604_local_params;$_ba1604_old_vars['_7272e0']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'child_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_ba1604_old_params['_750b25']=$_ba1604_local_params;$_ba1604_old_vars['_750b25']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_ba1604_local_params=$_ba1604_old_params['_750b25'];$_ba1604_local_vars=$_ba1604_old_vars['_750b25'];?>

    <?php endif;$_ba1604_local_params=$_ba1604_old_params['_7272e0'];$_ba1604_local_vars=$_ba1604_old_vars['_7272e0'];?>

    <?php $_ba1604_old_params['_45ac58']=$_ba1604_local_params;$_ba1604_old_vars['_45ac58']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_ba1604_local_params=$_ba1604_old_params['_45ac58'];$_ba1604_local_vars=$_ba1604_old_vars['_45ac58'];?>

    <?php $_ba1604_old_params['_df5bf6']=$_ba1604_local_params;$_ba1604_old_vars['_df5bf6']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'comment','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'attachmentfile','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'user','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php $_ba1604_old_params['_ab038a']=$_ba1604_local_params;$_ba1604_old_vars['_ab038a']=$_ba1604_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>

      <?php else:?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'disp_option','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_ba1604_local_params=$_ba1604_old_params['_ab038a'];$_ba1604_local_vars=$_ba1604_old_vars['_ab038a'];?>

    <?php endif;$_ba1604_local_params=$_ba1604_old_params['_df5bf6'];$_ba1604_local_vars=$_ba1604_old_vars['_df5bf6'];?>

    <?php $_ba1604_old_params['_bc2ff3']=$_ba1604_local_params;$_ba1604_old_vars['_bc2ff3']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_ba1604_local_params=$_ba1604_old_params['_bc2ff3'];$_ba1604_local_vars=$_ba1604_old_vars['_bc2ff3'];?>

    <?php $_ba1604_old_params['_3dc4b6']=$_ba1604_local_params;$_ba1604_old_vars['_3dc4b6']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_ba1604_old_params['_22b03b']=$_ba1604_local_params;$_ba1604_old_vars['_22b03b']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php ob_start();$_ba1604_old_params['_349d51']=$_ba1604_local_params;$_ba1604_old_vars['_349d51']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
        <?php $_ba1604_old_params['_065ef9']=$_ba1604_local_params;$_ba1604_old_vars['_065ef9']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
        <?php endif;$_ba1604_local_params=$_ba1604_old_params['_065ef9'];$_ba1604_local_vars=$_ba1604_old_vars['_065ef9'];?>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10" id="edit_options_loop">
              <span id="_start_options"></span>
          <?php $_ba1604_old_params['_5c49dc']=$_ba1604_local_params;$_ba1604_old_vars['_5c49dc']=$_ba1604_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

            <?php $c_78a1cc=null;$_ba1604_old_params['_78a1cc']=$_ba1604_local_params;$_ba1604_old_vars['_78a1cc']=$_ba1604_local_vars;$a_78a1cc=$this->setup_args(['type'=>'edit','option'=>'1','this_tag'=>'objectcols'],null,$this);$_78a1cc=-1;$r_78a1cc=true;while($r_78a1cc===true):$r_78a1cc=($_78a1cc!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_78a1cc,$c_78a1cc,$this,$r_78a1cc,++$_78a1cc,'_78a1cc');ob_start();?>
<?php $c_78a1cc = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_78a1cc=false;}if($c_78a1cc ):?>

              <?php $_ba1604_old_params['_929422']=$_ba1604_local_params;$_ba1604_old_vars['_929422']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','ne'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_ba1604_old_params['_b42f9d']=$_ba1604_local_params;$_ba1604_old_vars['_b42f9d']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'hidden','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_ba1604_old_params['_14d5d0']=$_ba1604_local_params;$_ba1604_old_vars['_14d5d0']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'allow_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'accept_comment','setvar'=>'accept_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

                    <?php $_ba1604_old_params['_cbfe0e']=$_ba1604_local_params;$_ba1604_old_vars['_cbfe0e']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <?php $_ba1604_old_params['_f0df01']=$_ba1604_local_params;$_ba1604_old_vars['_f0df01']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <?php endif;$_ba1604_local_params=$_ba1604_old_params['_f0df01'];$_ba1604_local_vars=$_ba1604_old_vars['_f0df01'];?>

                    <?php endif;$_ba1604_local_params=$_ba1604_old_params['_cbfe0e'];$_ba1604_local_vars=$_ba1604_old_vars['_cbfe0e'];?>

                  <?php endif;$_ba1604_local_params=$_ba1604_old_params['_14d5d0'];$_ba1604_local_vars=$_ba1604_old_vars['_14d5d0'];?>

                <?php endif;$_ba1604_local_params=$_ba1604_old_params['_b42f9d'];$_ba1604_local_vars=$_ba1604_old_vars['_b42f9d'];?>

                <?php $_ba1604_old_params['_1b0fea']=$_ba1604_local_params;$_ba1604_old_vars['_1b0fea']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_ba1604_old_params['_832b52']=$_ba1604_local_params;$_ba1604_old_vars['_832b52']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_832b52'];$_ba1604_local_vars=$_ba1604_old_vars['_832b52'];?>

                  <?php $_ba1604_old_params['_969d05']=$_ba1604_local_params;$_ba1604_old_vars['_969d05']=$_ba1604_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_ba1604_local_params=$_ba1604_old_params['_969d05'];$_ba1604_local_vars=$_ba1604_old_vars['_969d05'];?>

                  <label class="edit-options-child <?php $_ba1604_old_params['_7cc740']=$_ba1604_local_params;$_ba1604_old_vars['_7cc740']=$_ba1604_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_ba1604_local_params=$_ba1604_old_params['_7cc740'];$_ba1604_local_vars=$_ba1604_old_vars['_7cc740'];?>
custom-control custom-checkbox" id="label-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                    <?php $_ba1604_old_params['_b297eb']=$_ba1604_local_params;$_ba1604_old_vars['_b297eb']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <input type="hidden" id="" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <?php endif;$_ba1604_local_params=$_ba1604_old_params['_b297eb'];$_ba1604_local_vars=$_ba1604_old_vars['_b297eb'];?>

                    <input<?php $_ba1604_old_params['_ca491f']=$_ba1604_local_params;$_ba1604_old_vars['_ca491f']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php else:?>
<?php $_ba1604_old_params['_2d5b0e']=$_ba1604_local_params;$_ba1604_old_vars['_2d5b0e']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 onclick="return false;" checked <?php else:?>

                    <?php $_ba1604_old_params['_270326']=$_ba1604_local_params;$_ba1604_old_vars['_270326']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_ba1604_local_params=$_ba1604_old_params['_270326'];$_ba1604_local_vars=$_ba1604_old_vars['_270326'];?>

                    <?php endif;$_ba1604_local_params=$_ba1604_old_params['_2d5b0e'];$_ba1604_local_vars=$_ba1604_old_vars['_2d5b0e'];?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_ca491f'];$_ba1604_local_vars=$_ba1604_old_vars['_ca491f'];?>
<?php $_ba1604_old_params['_987e31']=$_ba1604_local_params;$_ba1604_old_vars['_987e31']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_ba1604_local_params=$_ba1604_old_params['_987e31'];$_ba1604_local_vars=$_ba1604_old_vars['_987e31'];?>
 type="<?php $_ba1604_old_params['_278b2b']=$_ba1604_local_params;$_ba1604_old_vars['_278b2b']=$_ba1604_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
checkbox<?php endif;$_ba1604_local_params=$_ba1604_old_params['_278b2b'];$_ba1604_local_vars=$_ba1604_old_vars['_278b2b'];?>
" class="custom-control-input disp_option disp_option-cb" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator<?php $_ba1604_old_params['_e64c56']=$_ba1604_local_params;$_ba1604_old_vars['_e64c56']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_ba1604_local_params=$_ba1604_old_params['_e64c56'];$_ba1604_local_vars=$_ba1604_old_vars['_e64c56'];?>
<?php $_ba1604_old_params['_720525']=$_ba1604_local_params;$_ba1604_old_vars['_720525']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_ba1604_local_params=$_ba1604_old_params['_720525'];$_ba1604_local_vars=$_ba1604_old_vars['_720525'];?>
"></span>
                    <span class="custom-control-description"> 
                    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
                  </label>
                <?php endif;$_ba1604_local_params=$_ba1604_old_params['_1b0fea'];$_ba1604_local_vars=$_ba1604_old_vars['_1b0fea'];?>

              <?php endif;$_ba1604_local_params=$_ba1604_old_params['_929422'];$_ba1604_local_vars=$_ba1604_old_vars['_929422'];?>

            <?php endif;$c_78a1cc=ob_get_clean();endwhile; $_ba1604_local_params=$_ba1604_old_params['_78a1cc'];$_ba1604_local_vars=$_ba1604_old_vars['_78a1cc'];?>

          <?php endif;$_ba1604_local_params=$_ba1604_old_params['_5c49dc'];$_ba1604_local_vars=$_ba1604_old_vars['_5c49dc'];?>

                <?php $c_7bc2a0=null;$_ba1604_old_params['_7bc2a0']=$_ba1604_local_params;$_ba1604_old_vars['_7bc2a0']=$_ba1604_local_vars;$a_7bc2a0=$this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$model','id'=>'$object_id','this_tag'=>'fieldloop'],null,$this);$_7bc2a0=-1;$r_7bc2a0=true;while($r_7bc2a0===true):$r_7bc2a0=($_7bc2a0!==-1)?false:true;echo $this->component('PTTags')->hdlr_fieldloop($a_7bc2a0,$c_7bc2a0,$this,$r_7bc2a0,++$_7bc2a0,'_7bc2a0');ob_start();?>
<?php $c_7bc2a0 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_7bc2a0=false;}if($c_7bc2a0 ):?>

                <?php $c_bbad14=null;$_ba1604_old_params['_bbad14']=$_ba1604_local_params;$_ba1604_old_vars['_bbad14']=$_ba1604_local_vars;$a_bbad14=$this->setup_args(['name'=>'_fieldbasename','this_tag'=>'setvarblock'],null,$this);ob_start();?>
field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_bbad14=ob_get_clean();$c_bbad14=$this->block_setvarblock($a_bbad14,$c_bbad14,$this,$r_bbad14,1,'_bbad14');echo($c_bbad14); $_ba1604_local_params=$_ba1604_old_params['_bbad14'];?>

                <label class="<?php $_ba1604_old_params['_772233']=$_ba1604_local_params;$_ba1604_old_vars['_772233']=$_ba1604_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_ba1604_local_params=$_ba1604_old_params['_772233'];$_ba1604_local_vars=$_ba1604_old_vars['_772233'];?>
custom-control custom-checkbox" id="label-<?php echo $this->function_var($this->setup_args(['name'=>'_fieldbasename','this_tag'=>'var'],null,$this),$this)?>
">
                  <input<?php $_ba1604_old_params['_32208f']=$_ba1604_local_params;$_ba1604_old_vars['_32208f']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_ba1604_local_params=$_ba1604_old_params['_32208f'];$_ba1604_local_vars=$_ba1604_old_vars['_32208f'];?>

                  <?php $_ba1604_old_params['_35a602']=$_ba1604_local_params;$_ba1604_old_vars['_35a602']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_ba1604_local_params=$_ba1604_old_params['_35a602'];$_ba1604_local_vars=$_ba1604_old_vars['_35a602'];?>

                  <?php $_ba1604_old_params['_3ee3ab']=$_ba1604_local_params;$_ba1604_old_vars['_3ee3ab']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_ba1604_local_params=$_ba1604_old_params['_3ee3ab'];$_ba1604_local_vars=$_ba1604_old_vars['_3ee3ab'];?>
 <?php $_ba1604_old_params['_0e90d8']=$_ba1604_local_params;$_ba1604_old_vars['_0e90d8']=$_ba1604_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_ba1604_local_params=$_ba1604_old_params['_0e90d8'];$_ba1604_local_vars=$_ba1604_old_vars['_0e90d8'];?>
 type="checkbox" class="custom-control-input disp_option disp_option-cb" id="field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_ba1604_old_params['_32afea']=$_ba1604_local_params;$_ba1604_old_vars['_32afea']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_ba1604_local_params=$_ba1604_old_params['_32afea'];$_ba1604_local_vars=$_ba1604_old_vars['_32afea'];?>
"></span>
                  <span class="custom-control-description"> 
                  <?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'field__name','trans'=>'1','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans'),ENT_QUOTES)?>
</span>
                </label>
                <?php endif;$c_7bc2a0=ob_get_clean();endwhile; $_ba1604_local_params=$_ba1604_old_params['_7bc2a0'];$_ba1604_local_vars=$_ba1604_old_vars['_7bc2a0'];?>

              <?php $_ba1604_old_params['_146a3f']=$_ba1604_local_params;$_ba1604_old_vars['_146a3f']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div>
                  <p class="text-muted hint-block">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can change the display order of fields with drag &amp; drop.','this_tag'=>'trans'],null,$this),$this)?>

                  </p>
                </div>
              <?php endif;$_ba1604_local_params=$_ba1604_old_params['_146a3f'];$_ba1604_local_vars=$_ba1604_old_vars['_146a3f'];?>

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
<?php endif;$_349d51=ob_get_clean();echo $this->modifier_trim_space($_349d51,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_ba1604_local_params=$_ba1604_old_params['_349d51'];$_ba1604_local_vars=$_ba1604_old_vars['_349d51'];?>

<script>
<?php $_ba1604_old_params['_927070']=$_ba1604_local_params;$_ba1604_old_vars['_927070']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#edit_options_loop').sortable({
    stop: function( evt, ui ) {
        sort_fields();
    }
});
$("#edit_options_loop").ksortable();
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_927070'];$_ba1604_local_vars=$_ba1604_old_vars['_927070'];?>

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

<?php $_ba1604_old_params['_79a01b']=$_ba1604_local_params;$_ba1604_old_vars['_79a01b']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_79a01b'];$_ba1604_local_vars=$_ba1604_old_vars['_79a01b'];?>

    }
    updateFieldSelector();
});
</script>
        <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_ba1604_local_params=$_ba1604_old_params['_22b03b'];$_ba1604_local_vars=$_ba1604_old_vars['_22b03b'];?>

    <?php endif;$_ba1604_local_params=$_ba1604_old_params['_3dc4b6'];$_ba1604_local_vars=$_ba1604_old_vars['_3dc4b6'];?>

    <?php $_ba1604_old_params['_b2e460']=$_ba1604_local_params;$_ba1604_old_vars['_b2e460']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php $_ba1604_old_params['_5d4bb3']=$_ba1604_local_params;$_ba1604_old_vars['_5d4bb3']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php $_ba1604_old_params['_231026']=$_ba1604_local_params;$_ba1604_old_vars['_231026']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="single_select" value="1"><?php endif;$_ba1604_local_params=$_ba1604_old_params['_231026'];$_ba1604_local_vars=$_ba1604_old_vars['_231026'];?>

            <?php $_ba1604_old_params['_ff5c18']=$_ba1604_local_params;$_ba1604_old_vars['_ff5c18']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._from_scope','ne'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_from_scope" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php endif;$_ba1604_local_params=$_ba1604_old_params['_ff5c18'];$_ba1604_local_vars=$_ba1604_old_vars['_ff5c18'];?>

          <?php $_ba1604_old_params['_d4a1f9']=$_ba1604_local_params;$_ba1604_old_vars['_d4a1f9']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
          <?php endif;$_ba1604_local_params=$_ba1604_old_params['_d4a1f9'];$_ba1604_local_vars=$_ba1604_old_vars['_d4a1f9'];?>

          <?php $_ba1604_old_params['_5f23e2']=$_ba1604_local_params;$_ba1604_old_vars['_5f23e2']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="manage_revision" value="1">
          <?php endif;$_ba1604_local_params=$_ba1604_old_params['_5f23e2'];$_ba1604_local_vars=$_ba1604_old_vars['_5f23e2'];?>

          <?php $_ba1604_old_params['_4dadf2']=$_ba1604_local_params;$_ba1604_old_vars['_4dadf2']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="dialog_view" value="1">
            <?php $_ba1604_old_params['_a32054']=$_ba1604_local_params;$_ba1604_old_vars['_a32054']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_ba1604_local_params=$_ba1604_old_params['_a32054'];$_ba1604_local_vars=$_ba1604_old_vars['_a32054'];?>

          <?php $_ba1604_old_params['_4c727f']=$_ba1604_local_params;$_ba1604_old_vars['_4c727f']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
          <?php endif;$_ba1604_local_params=$_ba1604_old_params['_4c727f'];$_ba1604_local_vars=$_ba1604_old_vars['_4c727f'];?>

            <?php $_ba1604_old_params['_70365d']=$_ba1604_local_params;$_ba1604_old_vars['_70365d']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
              <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_ba1604_local_params=$_ba1604_old_params['_70365d'];$_ba1604_local_vars=$_ba1604_old_vars['_70365d'];?>

          <?php endif;$_ba1604_local_params=$_ba1604_old_params['_4dadf2'];$_ba1604_local_vars=$_ba1604_old_vars['_4dadf2'];?>

          <?php $_ba1604_old_params['_e9609b']=$_ba1604_local_params;$_ba1604_old_vars['_e9609b']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_select" value="1">
          <?php endif;$_ba1604_local_params=$_ba1604_old_params['_e9609b'];$_ba1604_local_vars=$_ba1604_old_vars['_e9609b'];?>

          <?php $_ba1604_old_params['_4dd8b0']=$_ba1604_local_params;$_ba1604_old_vars['_4dd8b0']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="selected_ids" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="from_obj" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.from_obj','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php $_ba1604_old_params['_1f9d65']=$_ba1604_local_params;$_ba1604_old_vars['_1f9d65']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="select_add" value="1">
          <?php endif;$_ba1604_local_params=$_ba1604_old_params['_1f9d65'];$_ba1604_local_vars=$_ba1604_old_vars['_1f9d65'];?>

          <?php $_ba1604_old_params['_7440af']=$_ba1604_local_params;$_ba1604_old_vars['_7440af']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ids_only','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ids_only" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ids_only','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php endif;$_ba1604_local_params=$_ba1604_old_params['_7440af'];$_ba1604_local_vars=$_ba1604_old_vars['_7440af'];?>

          <?php endif;$_ba1604_local_params=$_ba1604_old_params['_4dd8b0'];$_ba1604_local_vars=$_ba1604_old_vars['_4dd8b0'];?>

            <div class="modal-body">
              <div class="container-fluid">
                <?php $_ba1604_old_params['_649ce2']=$_ba1604_local_params;$_ba1604_old_vars['_649ce2']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <?php $c_8bedb6=null;$_ba1604_old_params['_8bedb6']=$_ba1604_local_params;$_ba1604_old_vars['_8bedb6']=$_ba1604_local_vars;$a_8bedb6=$this->setup_args(['name'=>'system_filters','this_tag'=>'loop'],null,$this);$_8bedb6=-1;$r_8bedb6=true;while($r_8bedb6===true):$r_8bedb6=($_8bedb6!==-1)?false:true;echo $this->block_loop($a_8bedb6,$c_8bedb6,$this,$r_8bedb6,++$_8bedb6,'_8bedb6');ob_start();?>
<?php $c_8bedb6 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_8bedb6=false;}if($c_8bedb6 ):?>

                      <?php $_ba1604_old_params['_6b9bc0']=$_ba1604_local_params;$_ba1604_old_vars['_6b9bc0']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select_system_filters" id="select_system_filters">
                        <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php endif;$_ba1604_local_params=$_ba1604_old_params['_6b9bc0'];$_ba1604_local_vars=$_ba1604_old_vars['_6b9bc0'];?>

                        <option <?php $_ba1604_old_params['_c93018']=$_ba1604_local_params;$_ba1604_old_vars['_c93018']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'input','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
data-input="1" data-hint="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'hint','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php endif;$_ba1604_local_params=$_ba1604_old_params['_c93018'];$_ba1604_local_vars=$_ba1604_old_vars['_c93018'];?>
data-option="<?php echo $this->function_var($this->setup_args(['name'=>'option','this_tag'=>'var'],null,$this),$this)?>
" <?php $_ba1604_old_params['_32f0f8']=$_ba1604_local_params;$_ba1604_old_vars['_32f0f8']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_system_filter','eq'=>'$name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_ba1604_local_params=$_ba1604_old_params['_32f0f8'];$_ba1604_local_vars=$_ba1604_old_vars['_32f0f8'];?>
 value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php $_ba1604_old_params['_86a011']=$_ba1604_local_params;$_ba1604_old_vars['_86a011']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        </select>
                      <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="system_filter-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                      <?php endif;$_ba1604_local_params=$_ba1604_old_params['_86a011'];$_ba1604_local_vars=$_ba1604_old_vars['_86a011'];?>

                    <?php endif;$c_8bedb6=ob_get_clean();endwhile; $_ba1604_local_params=$_ba1604_old_params['_8bedb6'];$_ba1604_local_vars=$_ba1604_old_vars['_8bedb6'];?>

                  </div>
                </div>
                <?php endif;$_ba1604_local_params=$_ba1604_old_params['_649ce2'];$_ba1604_local_vars=$_ba1604_old_vars['_649ce2'];?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Your Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select-user_filters" id="select-user_filters">
                      <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php $c_388f15=null;$_ba1604_old_params['_388f15']=$_ba1604_local_params;$_ba1604_old_vars['_388f15']=$_ba1604_local_vars;$a_388f15=$this->setup_args(['model'=>'option','kind'=>'list_filter','key'=>'$model','user_id'=>'$user_id','workspace_id'=>'$workspace_id','this_tag'=>'objectloop'],null,$this);$_388f15=-1;$r_388f15=true;while($r_388f15===true):$r_388f15=($_388f15!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_388f15,$c_388f15,$this,$r_388f15,++$_388f15,'_388f15');ob_start();?>
<?php $c_388f15 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_388f15=false;}if($c_388f15 ):?>

                      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_ba1604_old_params['_29de91']=$_ba1604_local_params;$_ba1604_old_vars['_29de91']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_filter_id','eq'=>'$id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_ba1604_local_params=$_ba1604_old_params['_29de91'];$_ba1604_local_vars=$_ba1604_old_vars['_29de91'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'value','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php endif;$c_388f15=ob_get_clean();endwhile; $_ba1604_local_params=$_ba1604_old_params['_388f15'];$_ba1604_local_vars=$_ba1604_old_vars['_388f15'];?>

                      <option value="add_new_filter"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Add New Filter','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    </select>
                    <?php $_ba1604_old_params['_48e33f']=$_ba1604_local_params;$_ba1604_old_vars['_48e33f']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="filter-select-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <button type="button" class="delete-filter-elem hidden delete-bun-sm btn btn-secondary btn-sm filter-selecter-ctrl" id="filter-select-delete-button" class="close" data-dismiss="modal">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Delete','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    </button>
                    <?php endif;$_ba1604_local_params=$_ba1604_old_params['_48e33f'];$_ba1604_local_vars=$_ba1604_old_vars['_48e33f'];?>

                  </div>
                </div>
                <div class="row form-group new-filter-elem hidden">
                  <div class="col-md-3" style="float:left;"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" name="filters-selector" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" id="filters-selector">
                    <?php $c_6ce923=null;$_ba1604_old_params['_6ce923']=$_ba1604_local_params;$_ba1604_old_vars['_6ce923']=$_ba1604_local_vars;$a_6ce923=$this->setup_args(['name'=>'filter_options','this_tag'=>'loop'],null,$this);$_6ce923=-1;$r_6ce923=true;while($r_6ce923===true):$r_6ce923=($_6ce923!==-1)?false:true;echo $this->block_loop($a_6ce923,$c_6ce923,$this,$r_6ce923,++$_6ce923,'_6ce923');ob_start();?>
<?php $c_6ce923 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_6ce923=false;}if($c_6ce923 ):?>

                    <?php $_ba1604_old_params['_b885cc']=$_ba1604_local_params;$_ba1604_old_vars['_b885cc']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <option><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    <?php endif;$_ba1604_local_params=$_ba1604_old_params['_b885cc'];$_ba1604_local_vars=$_ba1604_old_vars['_b885cc'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" class="coltype_<?php $_ba1604_old_params['_a1631b']=$_ba1604_local_params;$_ba1604_old_vars['_a1631b']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'created_by','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
reference<?php else:?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_a1631b'];$_ba1604_local_vars=$_ba1604_old_vars['_a1631b'];?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php endif;$c_6ce923=ob_get_clean();endwhile; $_ba1604_local_params=$_ba1604_old_params['_6ce923'];$_ba1604_local_vars=$_ba1604_old_vars['_6ce923'];?>

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

                              <input type="datetime-local" step="<?php $_ba1604_old_params['_ad2740']=$_ba1604_local_params;$_ba1604_old_vars['_ad2740']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'time_step','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'time_step','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
1<?php endif;$_ba1604_local_params=$_ba1604_old_params['_ad2740'];$_ba1604_local_vars=$_ba1604_old_vars['_ad2740'];?>
" class="form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="" value="<?php $_ba1604_old_params['_097e4d']=$_ba1604_local_params;$_ba1604_old_vars['_097e4d']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'published_on_default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_format_ts($this->function_date($this->setup_args(['format'=>'$published_on_default','format_ts'=>'Y-m-d\\TH:i:s','this_tag'=>'date'],null,$this),$this),$this->setup_args('Y-m-d\\\\TH:i:s','format_ts',$this),$this,'format_ts')?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_097e4d'];$_ba1604_local_vars=$_ba1604_old_vars['_097e4d'];?>
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

                            <?php $_ba1604_old_params['_61ac69']=$_ba1604_local_params;$_ba1604_old_vars['_61ac69']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'status_options','split'=>',','setvar'=>'status_label','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                            <?php else:?>

                              <?php $_ba1604_old_params['_d9d13d']=$_ba1604_local_params;$_ba1604_old_vars['_d9d13d']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Draft,Review,Approval Pending,Reserved,Publish,Ended','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php else:?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Disable,Enable','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php endif;$_ba1604_local_params=$_ba1604_old_params['_d9d13d'];$_ba1604_local_vars=$_ba1604_old_vars['_d9d13d'];?>

                            <?php endif;$_ba1604_local_params=$_ba1604_old_params['_61ac69'];$_ba1604_local_vars=$_ba1604_old_vars['_61ac69'];?>

                            <select class="form-control form-control-sm custom-select short filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <?php $_ba1604_old_params['_af2afa']=$_ba1604_local_params;$_ba1604_old_vars['_af2afa']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                            <?php $c_e6cba1=null;$_ba1604_old_params['_e6cba1']=$_ba1604_local_params;$_ba1604_old_vars['_e6cba1']=$_ba1604_local_vars;$a_e6cba1=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_e6cba1=-1;$r_e6cba1=true;while($r_e6cba1===true):$r_e6cba1=($_e6cba1!==-1)?false:true;echo $this->block_loop($a_e6cba1,$c_e6cba1,$this,$r_e6cba1,++$_e6cba1,'_e6cba1');ob_start();?>
<?php $c_e6cba1 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_e6cba1=false;}if($c_e6cba1 ):?>

                              <?php $_ba1604_old_params['_c20624']=$_ba1604_local_params;$_ba1604_old_vars['_c20624']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__index__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php $_ba1604_old_params['_d1d6f3']=$_ba1604_local_params;$_ba1604_old_vars['_d1d6f3']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__index__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_ba1604_local_params=$_ba1604_old_params['_d1d6f3'];$_ba1604_local_vars=$_ba1604_old_vars['_d1d6f3'];?>

                              <?php endif;$_ba1604_local_params=$_ba1604_old_params['_c20624'];$_ba1604_local_vars=$_ba1604_old_vars['_c20624'];?>

                            <?php endif;$c_e6cba1=ob_get_clean();endwhile; $_ba1604_local_params=$_ba1604_old_params['_e6cba1'];$_ba1604_local_vars=$_ba1604_old_vars['_e6cba1'];?>

                            <?php else:?>

                            <?php $c_229b84=null;$_ba1604_old_params['_229b84']=$_ba1604_local_params;$_ba1604_old_vars['_229b84']=$_ba1604_local_vars;$a_229b84=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_229b84=-1;$r_229b84=true;while($r_229b84===true):$r_229b84=($_229b84!==-1)?false:true;echo $this->block_loop($a_229b84,$c_229b84,$this,$r_229b84,++$_229b84,'_229b84');ob_start();?>
<?php $c_229b84 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_229b84=false;}if($c_229b84 ):?>

                              <?php $_ba1604_old_params['_45e9ae']=$_ba1604_local_params;$_ba1604_old_vars['_45e9ae']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_ba1604_local_params=$_ba1604_old_params['_45e9ae'];$_ba1604_local_vars=$_ba1604_old_vars['_45e9ae'];?>

                            <?php endif;$c_229b84=ob_get_clean();endwhile; $_ba1604_local_params=$_ba1604_old_params['_229b84'];$_ba1604_local_vars=$_ba1604_old_vars['_229b84'];?>

                            <?php endif;$_ba1604_local_params=$_ba1604_old_params['_af2afa'];$_ba1604_local_vars=$_ba1604_old_vars['_af2afa'];?>

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
            <?php $_ba1604_old_params['_26be44']=$_ba1604_local_params;$_ba1604_old_vars['_26be44']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            loc += '&workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
            <?php endif;$_ba1604_local_params=$_ba1604_old_params['_26be44'];$_ba1604_local_vars=$_ba1604_old_vars['_26be44'];?>

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
    <?php endif;$_ba1604_local_params=$_ba1604_old_params['_5d4bb3'];$_ba1604_local_vars=$_ba1604_old_vars['_5d4bb3'];?>

    <?php $_ba1604_old_params['_092c14']=$_ba1604_local_params;$_ba1604_old_vars['_092c14']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_ba1604_old_params['_d27f8f']=$_ba1604_local_params;$_ba1604_old_vars['_d27f8f']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
              <?php $_ba1604_old_params['_5c4d51']=$_ba1604_local_params;$_ba1604_old_vars['_5c4d51']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
              <?php endif;$_ba1604_local_params=$_ba1604_old_params['_5c4d51'];$_ba1604_local_vars=$_ba1604_old_vars['_5c4d51'];?>

                <div class="form-inline" style="margin: 10px 7px">
                  <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload Path','this_tag'=>'trans'],null,$this),$this)?>

                  <?php $_ba1604_old_params['_d2d18d']=$_ba1604_local_params;$_ba1604_old_vars['_d2d18d']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model_out_path','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->modifier_add_slash(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model_out_path','escape'=>'','add_slash'=>'','setvar'=>'model_out_path','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('','add_slash',$this),$this,'add_slash'),$this->setup_args('model_out_path','setvar',$this),$this,'setvar')?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'extra_path','value'=>'$model_out_path','append'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_ba1604_local_params=$_ba1604_old_params['_d2d18d'];$_ba1604_local_vars=$_ba1604_old_vars['_d2d18d'];?>

                  <input id="extra_path" type="text" style="width:200px;" class="form-control" name="extra_path" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'extra_path','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                  <?php echo $this->function_setvar($this->setup_args(['name'=>'upload_paths','value'=>'$extra_path','function'=>'unshift','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php echo $this->modifier_setvar($this->modifier_array_unique($this->function_var($this->setup_args(['name'=>'upload_paths','array_unique'=>'','setvar'=>'upload_paths','this_tag'=>'var'],null,$this),$this),$this->setup_args('','array_unique',$this),$this,'array_unique'),$this->setup_args('upload_paths','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_count($this->setup_args(['name'=>'$upload_paths','setvar'=>'path_cnt','this_tag'=>'count'],null,$this),$this),$this->setup_args('path_cnt','setvar',$this),$this,'setvar')?>

                <?php $_ba1604_old_params['_28c040']=$_ba1604_local_params;$_ba1604_old_vars['_28c040']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'path_cnt','gt'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <div id="upload_paths-box">
                  <?php $c_ccf155=null;$_ba1604_old_params['_ccf155']=$_ba1604_local_params;$_ba1604_old_vars['_ccf155']=$_ba1604_local_vars;$a_ccf155=$this->setup_args(['name'=>'upload_paths','this_tag'=>'loop'],null,$this);$_ccf155=-1;$r_ccf155=true;while($r_ccf155===true):$r_ccf155=($_ccf155!==-1)?false:true;echo $this->block_loop($a_ccf155,$c_ccf155,$this,$r_ccf155,++$_ccf155,'_ccf155');ob_start();?>
<?php $c_ccf155 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_ccf155=false;}if($c_ccf155 ):?>

                    <?php $_ba1604_old_params['_397615']=$_ba1604_local_params;$_ba1604_old_vars['_397615']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button class="btn ml-3 btn-secondary" id="toggle-upload_path"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <span class="hidden" id="upload_path-wrapper">
                    <select class="form-control custom-select short" name="upload_path" id="upload_path"><?php endif;$_ba1604_local_params=$_ba1604_old_params['_397615'];$_ba1604_local_vars=$_ba1604_old_vars['_397615'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_ba1604_old_params['_f1c180']=$_ba1604_local_params;$_ba1604_old_vars['_f1c180']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'extra_path','eq'=>'$__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_ba1604_local_params=$_ba1604_old_params['_f1c180'];$_ba1604_local_vars=$_ba1604_old_vars['_f1c180'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php $_ba1604_old_params['_829be1']=$_ba1604_local_params;$_ba1604_old_vars['_829be1']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</select>
                    <button class="btn ml-0 btn-secondary btn-sm" id="clear-upload_path">  <i class="fa fa-trash" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Clear','this_tag'=>'trans'],null,$this),$this)?>
</span></button>
                    </span>
                  </div>
                    <?php endif;$_ba1604_local_params=$_ba1604_old_params['_829be1'];$_ba1604_local_vars=$_ba1604_old_vars['_829be1'];?>

                  <?php endif;$c_ccf155=ob_get_clean();endwhile; $_ba1604_local_params=$_ba1604_old_params['_ccf155'];$_ba1604_local_vars=$_ba1604_old_vars['_ccf155'];?>

                <?php endif;$_ba1604_local_params=$_ba1604_old_params['_28c040'];$_ba1604_local_vars=$_ba1604_old_vars['_28c040'];?>

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

<?php $_ba1604_old_params['_75e52e']=$_ba1604_local_params;$_ba1604_old_vars['_75e52e']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&filter_params=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&filter_params=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&magic_token=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&magic_token=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&query=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&query=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php endif;$_ba1604_local_params=$_ba1604_old_params['_75e52e'];$_ba1604_local_vars=$_ba1604_old_vars['_75e52e'];?>

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
?<?php $_ba1604_old_params['_d86c04']=$_ba1604_local_params;$_ba1604_old_vars['_d86c04']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&<?php endif;$_ba1604_local_params=$_ba1604_old_params['_d86c04'];$_ba1604_local_vars=$_ba1604_old_vars['_d86c04'];?>
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
$('#drop-zone').css('border','3px dashed <?php $_ba1604_old_params['_166895']=$_ba1604_local_params;$_ba1604_old_vars['_166895']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
#ccc<?php endif;$_ba1604_local_params=$_ba1604_old_params['_166895'];$_ba1604_local_vars=$_ba1604_old_vars['_166895'];?>
');
$('#drop-zone').css('margin','1px');
$('#drop-zone').css('padding','8px');
$(function () {
    'use strict';
    var url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=upload_multi&magic_token=<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&model=asset&name=file<?php $_ba1604_old_params['_873e03']=$_ba1604_local_params;$_ba1604_old_vars['_873e03']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','eq'=>'filter_class_image','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&select_system_filters=filter_class_image<?php endif;$_ba1604_local_params=$_ba1604_old_params['_873e03'];$_ba1604_local_vars=$_ba1604_old_vars['_873e03'];?>
';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        dropZone: $("#drop-zone"),
        // formData: {extra_path: $('#extra_path').val()},
        add: function (e, data) {
            data.formData = {extra_path: $('#extra_path').val()<?php $_ba1604_old_params['_22dd78']=$_ba1604_local_params;$_ba1604_old_vars['_22dd78']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
, overwrite: $('#asset_overwrite').val()<?php endif;$_ba1604_local_params=$_ba1604_old_params['_22dd78'];$_ba1604_local_vars=$_ba1604_old_vars['_22dd78'];?>
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
    <?php $_ba1604_old_params['_71b15e']=$_ba1604_local_params;$_ba1604_old_vars['_71b15e']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    $("#__mode").prop('value', 'insert_asset');
    $("#list-select-form").submit();
    <?php else:?>

    submit_params_to_post( this_url );
    <?php endif;$_ba1604_local_params=$_ba1604_old_params['_71b15e'];$_ba1604_local_vars=$_ba1604_old_vars['_71b15e'];?>

}
</script>
      <?php endif;$_ba1604_local_params=$_ba1604_old_params['_d27f8f'];$_ba1604_local_vars=$_ba1604_old_vars['_d27f8f'];?>

    <?php endif;$_ba1604_local_params=$_ba1604_old_params['_092c14'];$_ba1604_local_vars=$_ba1604_old_vars['_092c14'];?>

    <?php endif;$_ba1604_local_params=$_ba1604_old_params['_b2e460'];$_ba1604_local_vars=$_ba1604_old_vars['_b2e460'];?>

  <?php endif;$_ba1604_local_params=$_ba1604_old_params['_529069'];$_ba1604_local_vars=$_ba1604_old_vars['_529069'];?>

      <div class="row">
        <main class="pt-3 full <?php $_ba1604_old_params['_4b4703']=$_ba1604_local_params;$_ba1604_old_vars['_4b4703']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'list_screen','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 col-md-12<?php endif;$_ba1604_local_params=$_ba1604_old_params['_4b4703'];$_ba1604_local_vars=$_ba1604_old_vars['_4b4703'];?>
">
        <?php $_ba1604_old_params['_a8d421']=$_ba1604_local_params;$_ba1604_old_vars['_a8d421']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'list_screen','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<div class="col-md-12 full"><?php endif;$_ba1604_local_params=$_ba1604_old_params['_a8d421'];$_ba1604_local_vars=$_ba1604_old_vars['_a8d421'];?>

          <h1 id="page-title" class="<?php $_ba1604_old_params['_b5bf3c']=$_ba1604_local_params;$_ba1604_old_vars['_b5bf3c']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'full_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
page-title-full<?php endif;$_ba1604_local_params=$_ba1604_old_params['_b5bf3c'];$_ba1604_local_vars=$_ba1604_old_vars['_b5bf3c'];?>
<?php $_ba1604_old_params['_43889d']=$_ba1604_local_params;$_ba1604_old_vars['_43889d']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 title-with-opt<?php endif;$_ba1604_local_params=$_ba1604_old_params['_43889d'];$_ba1604_local_vars=$_ba1604_old_vars['_43889d'];?>
"><span class="title"><?php echo $this->function_var($this->setup_args(['name'=>'page_title','this_tag'=>'var'],null,$this),$this)?>
</span>
          <?php echo $this->function_var($this->setup_args(['name'=>'add_heading','this_tag'=>'var'],null,$this),$this)?>

    <?php $_ba1604_old_params['_fe55aa']=$_ba1604_local_params;$_ba1604_old_vars['_fe55aa']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ba1604_old_params['_7645a1']=$_ba1604_local_params;$_ba1604_old_vars['_7645a1']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      
      <?php echo $this->function_setvar($this->setup_args(['name'=>'_hide_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'select_role','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_ba1604_local_params=$_ba1604_old_params['_7645a1'];$_ba1604_local_vars=$_ba1604_old_vars['_7645a1'];?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_fe55aa'];$_ba1604_local_vars=$_ba1604_old_vars['_fe55aa'];?>

    <?php $_ba1604_old_params['_22b500']=$_ba1604_local_params;$_ba1604_old_vars['_22b500']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'select_role','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php $_ba1604_old_params['_ba152f']=$_ba1604_local_params;$_ba1604_old_vars['_ba152f']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php $_ba1604_old_params['_c03784']=$_ba1604_local_params;$_ba1604_old_vars['_c03784']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_ba1604_old_params['_088eae']=$_ba1604_local_params;$_ba1604_old_vars['_088eae']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_param','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_ba1604_old_params['_ba2a8f']=$_ba1604_local_params;$_ba1604_old_vars['_ba2a8f']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $c_91e7cf=null;$_ba1604_old_params['_91e7cf']=$_ba1604_local_params;$_ba1604_old_vars['_91e7cf']=$_ba1604_local_vars;$a_91e7cf=$this->setup_args(['name'=>'workspace_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_91e7cf=ob_get_clean();$c_91e7cf=$this->block_setvarblock($a_91e7cf,$c_91e7cf,$this,$r_91e7cf,1,'_91e7cf');echo($c_91e7cf); $_ba1604_local_params=$_ba1604_old_params['_91e7cf'];?>

        <?php endif;$_ba1604_local_params=$_ba1604_old_params['_ba2a8f'];$_ba1604_local_vars=$_ba1604_old_vars['_ba2a8f'];?>

          <?php $_ba1604_old_params['_0c2d55']=$_ba1604_local_params;$_ba1604_old_vars['_0c2d55']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_ba1604_old_params['_49e436']=$_ba1604_local_params;$_ba1604_old_vars['_49e436']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_ba1604_old_params['_1fe8db']=$_ba1604_local_params;$_ba1604_old_vars['_1fe8db']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_ba1604_old_params['_f27c24']=$_ba1604_local_params;$_ba1604_old_vars['_f27c24']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._start_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'_hide_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

              <?php endif;$_ba1604_local_params=$_ba1604_old_params['_f27c24'];$_ba1604_local_vars=$_ba1604_old_vars['_f27c24'];?>

            <?php endif;$_ba1604_local_params=$_ba1604_old_params['_1fe8db'];$_ba1604_local_vars=$_ba1604_old_vars['_1fe8db'];?>

          <?php endif;$_ba1604_local_params=$_ba1604_old_params['_49e436'];$_ba1604_local_vars=$_ba1604_old_vars['_49e436'];?>

          <?php $_ba1604_old_params['_28fac0']=$_ba1604_local_params;$_ba1604_old_vars['_28fac0']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'error','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_ba1604_old_params['_104f5d']=$_ba1604_local_params;$_ba1604_old_vars['_104f5d']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <button type="button" id="filter-button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#filterOptions">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Filters','this_tag'=>'trans'],null,$this),$this)?>

          </button>
          <?php endif;$_ba1604_local_params=$_ba1604_old_params['_104f5d'];$_ba1604_local_vars=$_ba1604_old_vars['_104f5d'];?>

          <?php endif;$_ba1604_local_params=$_ba1604_old_params['_28fac0'];$_ba1604_local_vars=$_ba1604_old_vars['_28fac0'];?>

          <?php $_ba1604_old_params['_91a7b6']=$_ba1604_local_params;$_ba1604_old_vars['_91a7b6']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_create','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ba1604_old_params['_cbc0f3']=$_ba1604_local_params;$_ba1604_old_vars['_cbc0f3']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_ba1604_old_params['_01b571']=$_ba1604_local_params;$_ba1604_old_vars['_01b571']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','ne'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_01b571'];$_ba1604_local_vars=$_ba1604_old_vars['_01b571'];?>
&amp;dialog_view=1<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php $_ba1604_old_params['_1d7ab6']=$_ba1604_local_params;$_ba1604_old_vars['_1d7ab6']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;target=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;get_col=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_ba1604_old_params['_bd0ecd']=$_ba1604_local_params;$_ba1604_old_vars['_bd0ecd']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;single_select=1<?php endif;$_ba1604_local_params=$_ba1604_old_params['_bd0ecd'];$_ba1604_local_vars=$_ba1604_old_vars['_bd0ecd'];?>
<?php $_ba1604_old_params['_56bef8']=$_ba1604_local_params;$_ba1604_old_vars['_56bef8']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.selected_ids','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;selected_ids=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_56bef8'];$_ba1604_local_vars=$_ba1604_old_vars['_56bef8'];?>
<?php $_ba1604_old_params['_2f63d1']=$_ba1604_local_params;$_ba1604_old_vars['_2f63d1']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;select_add=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_add','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_2f63d1'];$_ba1604_local_vars=$_ba1604_old_vars['_2f63d1'];?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&amp;select_system_filters=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_system_filters_option=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_filter=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._filter','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;insert=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_1d7ab6'];$_ba1604_local_vars=$_ba1604_old_vars['_1d7ab6'];?>
<?php $_ba1604_old_params['_fbf951']=$_ba1604_local_params;$_ba1604_old_vars['_fbf951']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._system_filters_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ba1604_old_params['_07b2c7']=$_ba1604_local_params;$_ba1604_old_vars['_07b2c7']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'tag','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;tag_obj=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_07b2c7'];$_ba1604_local_vars=$_ba1604_old_vars['_07b2c7'];?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_fbf951'];$_ba1604_local_vars=$_ba1604_old_vars['_fbf951'];?>
<?php $_ba1604_old_params['_65c358']=$_ba1604_local_params;$_ba1604_old_vars['_65c358']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;insert_editor=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert_editor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_65c358'];$_ba1604_local_vars=$_ba1604_old_vars['_65c358'];?>
">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_ba1604_local_params=$_ba1604_old_params['_cbc0f3'];$_ba1604_local_vars=$_ba1604_old_vars['_cbc0f3'];?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_91a7b6'];$_ba1604_local_vars=$_ba1604_old_vars['_91a7b6'];?>

          <?php endif;$_ba1604_local_params=$_ba1604_old_params['_0c2d55'];$_ba1604_local_vars=$_ba1604_old_vars['_0c2d55'];?>

        <?php endif;$_ba1604_local_params=$_ba1604_old_params['_088eae'];$_ba1604_local_vars=$_ba1604_old_vars['_088eae'];?>

        <?php $_ba1604_old_params['_048190']=$_ba1604_local_params;$_ba1604_old_vars['_048190']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_ba1604_old_params['_1e5394']=$_ba1604_local_params;$_ba1604_old_vars['_1e5394']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_c7d3b7=null;$_ba1604_old_params['_c7d3b7']=$_ba1604_local_params;$_ba1604_old_vars['_c7d3b7']=$_ba1604_local_vars;$a_c7d3b7=$this->setup_args(['name'=>'filter_cond','this_tag'=>'setvarblock'],null,$this);ob_start();?>

&amp;select_system_filters=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

&amp;_system_filters_option=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

&amp;_filter=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

<?php $c_c7d3b7=ob_get_clean();$c_c7d3b7=$this->block_setvarblock($a_c7d3b7,$c_c7d3b7,$this,$r_c7d3b7,1,'_c7d3b7');echo($c_c7d3b7); $_ba1604_local_params=$_ba1604_old_params['_c7d3b7'];?>

          <?php endif;$_ba1604_local_params=$_ba1604_old_params['_1e5394'];$_ba1604_local_vars=$_ba1604_old_vars['_1e5394'];?>

          <a class="btn btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
&amp;dialog_view=1<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php $_ba1604_old_params['_fddc76']=$_ba1604_local_params;$_ba1604_old_vars['_fddc76']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.rev_object_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;single_select=1&amp;revision_select=1&amp;rev_object_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.rev_object_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_fddc76'];$_ba1604_local_vars=$_ba1604_old_vars['_fddc76'];?>
<?php $_ba1604_old_params['_c845ac']=$_ba1604_local_params;$_ba1604_old_vars['_c845ac']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;target=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;get_col=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_ba1604_old_params['_e0f08e']=$_ba1604_local_params;$_ba1604_old_vars['_e0f08e']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;single_select=1<?php endif;$_ba1604_local_params=$_ba1604_old_params['_e0f08e'];$_ba1604_local_vars=$_ba1604_old_vars['_e0f08e'];?>
<?php $_ba1604_old_params['_8545f1']=$_ba1604_local_params;$_ba1604_old_vars['_8545f1']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.selected_ids','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;selected_ids=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_8545f1'];$_ba1604_local_vars=$_ba1604_old_vars['_8545f1'];?>
<?php $_ba1604_old_params['_afcbaa']=$_ba1604_local_params;$_ba1604_old_vars['_afcbaa']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;select_add=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_add','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_afcbaa'];$_ba1604_local_vars=$_ba1604_old_vars['_afcbaa'];?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&amp;select_system_filters=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_system_filters_option=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_filter=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._filter','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;insert=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_c845ac'];$_ba1604_local_vars=$_ba1604_old_vars['_c845ac'];?>
<?php $_ba1604_old_params['_8cc02b']=$_ba1604_local_params;$_ba1604_old_vars['_8cc02b']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.any_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;any_model=1<?php endif;$_ba1604_local_params=$_ba1604_old_params['_8cc02b'];$_ba1604_local_vars=$_ba1604_old_vars['_8cc02b'];?>
<?php $_ba1604_old_params['_94dd00']=$_ba1604_local_params;$_ba1604_old_vars['_94dd00']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;insert_editor=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert_editor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_94dd00'];$_ba1604_local_vars=$_ba1604_old_vars['_94dd00'];?>
&amp;_from_scope=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <i class="hidden fa fa-list" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Home','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$_ba1604_local_params=$_ba1604_old_params['_048190'];$_ba1604_local_vars=$_ba1604_old_vars['_048190'];?>

        <?php $_ba1604_old_params['_6d6d80']=$_ba1604_local_params;$_ba1604_old_vars['_6d6d80']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_ba1604_old_params['_378273']=$_ba1604_local_params;$_ba1604_old_vars['_378273']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_ba1604_old_params['_abf17e']=$_ba1604_local_params;$_ba1604_old_vars['_abf17e']=$_ba1604_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'create','model'=>'asset','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#startUpload">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload','this_tag'=>'trans'],null,$this),$this)?>

          </button>
          <?php endif;$_ba1604_local_params=$_ba1604_old_params['_abf17e'];$_ba1604_local_vars=$_ba1604_old_vars['_abf17e'];?>

          <?php endif;$_ba1604_local_params=$_ba1604_old_params['_378273'];$_ba1604_local_vars=$_ba1604_old_vars['_378273'];?>

        <?php endif;$_ba1604_local_params=$_ba1604_old_params['_6d6d80'];$_ba1604_local_vars=$_ba1604_old_vars['_6d6d80'];?>

      <?php endif;$_ba1604_local_params=$_ba1604_old_params['_c03784'];$_ba1604_local_vars=$_ba1604_old_vars['_c03784'];?>

      <?php endif;$_ba1604_local_params=$_ba1604_old_params['_ba152f'];$_ba1604_local_vars=$_ba1604_old_vars['_ba152f'];?>

    <?php endif;$_ba1604_local_params=$_ba1604_old_params['_22b500'];$_ba1604_local_vars=$_ba1604_old_vars['_22b500'];?>

          </h1>
    <?php $_ba1604_old_params['_6975f3']=$_ba1604_local_params;$_ba1604_old_vars['_6975f3']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_ba1604_old_params['_c099ac']=$_ba1604_local_params;$_ba1604_old_vars['_c099ac']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_per_page','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_ba1604_old_params['_20fcbf']=$_ba1604_local_params;$_ba1604_old_vars['_20fcbf']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php ob_start();$_ba1604_old_params['_4c7966']=$_ba1604_local_params;$_ba1604_old_vars['_4c7966']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
      <?php $_ba1604_old_params['_95dc47']=$_ba1604_local_params;$_ba1604_old_vars['_95dc47']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
      <?php endif;$_ba1604_local_params=$_ba1604_old_params['_95dc47'];$_ba1604_local_vars=$_ba1604_old_vars['_95dc47'];?>

      <?php $_ba1604_old_params['_5645b3']=$_ba1604_local_params;$_ba1604_old_vars['_5645b3']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_select" value="1">
      <?php endif;$_ba1604_local_params=$_ba1604_old_params['_5645b3'];$_ba1604_local_vars=$_ba1604_old_vars['_5645b3'];?>

      <?php $_ba1604_old_params['_bf1f17']=$_ba1604_local_params;$_ba1604_old_vars['_bf1f17']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="dialog_view" value="1">
        <?php $_ba1604_old_params['_1dc32e']=$_ba1604_local_params;$_ba1604_old_vars['_1dc32e']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <?php endif;$_ba1604_local_params=$_ba1604_old_params['_1dc32e'];$_ba1604_local_vars=$_ba1604_old_vars['_1dc32e'];?>

          <?php $_ba1604_old_params['_66c18b']=$_ba1604_local_params;$_ba1604_old_vars['_66c18b']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="single_select" value="1">
          <?php endif;$_ba1604_local_params=$_ba1604_old_params['_66c18b'];$_ba1604_local_vars=$_ba1604_old_vars['_66c18b'];?>

        <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php $_ba1604_old_params['_fa624a']=$_ba1604_local_params;$_ba1604_old_vars['_fa624a']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php endif;$_ba1604_local_params=$_ba1604_old_params['_fa624a'];$_ba1604_local_vars=$_ba1604_old_vars['_fa624a'];?>

      <?php endif;$_ba1604_local_params=$_ba1604_old_params['_bf1f17'];$_ba1604_local_vars=$_ba1604_old_vars['_bf1f17'];?>

        <input type="hidden" name="return_args" value="<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'selected_ids_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
">
        <div class="modal-body">
          <div class="container-fluid">
          <?php $_ba1604_old_params['_8dc41c']=$_ba1604_local_params;$_ba1604_old_vars['_8dc41c']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_ba1604_old_params['_07e51d']=$_ba1604_local_params;$_ba1604_old_vars['_07e51d']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <?php $c_349119=null;$_ba1604_old_params['_349119']=$_ba1604_local_params;$_ba1604_old_vars['_349119']=$_ba1604_local_vars;$a_349119=$this->setup_args(['name'=>'disp_options','this_tag'=>'loop'],null,$this);$_349119=-1;$r_349119=true;while($r_349119===true):$r_349119=($_349119!==-1)?false:true;echo $this->block_loop($a_349119,$c_349119,$this,$r_349119,++$_349119,'_349119');ob_start();?>
<?php $c_349119 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_349119=false;}if($c_349119 ):?>

            <?php $_ba1604_old_params['_2d7977']=$_ba1604_local_params;$_ba1604_old_vars['_2d7977']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
            <?php endif;$_ba1604_local_params=$_ba1604_old_params['_2d7977'];$_ba1604_local_vars=$_ba1604_old_vars['_2d7977'];?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_ba1604_old_params['_945e88']=$_ba1604_local_params;$_ba1604_old_vars['_945e88']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php $_ba1604_old_params['_cc92f2']=$_ba1604_local_params;$_ba1604_old_vars['_cc92f2']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__key__','eq'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_ba1604_local_params=$_ba1604_old_params['_cc92f2'];$_ba1604_local_vars=$_ba1604_old_vars['_cc92f2'];?>

                <?php endif;$_ba1604_local_params=$_ba1604_old_params['_945e88'];$_ba1604_local_vars=$_ba1604_old_vars['_945e88'];?>

                <?php $_ba1604_old_params['_7b8315']=$_ba1604_local_params;$_ba1604_old_vars['_7b8315']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__display','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[2]','setvar'=>'_type','this_tag'=>'var'],null,$this),$this),$this->setup_args('_type','setvar',$this),$this,'setvar')?>

                <label class="custom-control custom-checkbox 
                <?php $_ba1604_old_params['_ee9b78']=$_ba1604_local_params;$_ba1604_old_vars['_ee9b78']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_ba1604_old_params['_c781fa']=$_ba1604_local_params;$_ba1604_old_vars['_c781fa']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_checked','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_ba1604_local_params=$_ba1604_old_params['_c781fa'];$_ba1604_local_vars=$_ba1604_old_vars['_c781fa'];?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_ee9b78'];$_ba1604_local_vars=$_ba1604_old_vars['_ee9b78'];?>

                <?php $_ba1604_old_params['_f8aeda']=$_ba1604_local_params;$_ba1604_old_vars['_f8aeda']=$_ba1604_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_list_options','value'=>'$__key__','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_ba1604_local_params=$_ba1604_old_params['_f8aeda'];$_ba1604_local_vars=$_ba1604_old_vars['_f8aeda'];?>
">
                  <?php $_ba1604_old_params['_45e5bf']=$_ba1604_local_params;$_ba1604_old_vars['_45e5bf']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1"><?php endif;$_ba1604_local_params=$_ba1604_old_params['_45e5bf'];$_ba1604_local_vars=$_ba1604_old_vars['_45e5bf'];?>

                  <input <?php $_ba1604_old_params['_1c1bdb']=$_ba1604_local_params;$_ba1604_old_vars['_1c1bdb']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_ba1604_local_params=$_ba1604_old_params['_1c1bdb'];$_ba1604_local_vars=$_ba1604_old_vars['_1c1bdb'];?>
 <?php $_ba1604_old_params['_f6d8be']=$_ba1604_local_params;$_ba1604_old_vars['_f6d8be']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_ba1604_local_params=$_ba1604_old_params['_f6d8be'];$_ba1604_local_vars=$_ba1604_old_vars['_f6d8be'];?>
<?php $_ba1604_old_params['_526f67']=$_ba1604_local_params;$_ba1604_old_vars['_526f67']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_ba1604_local_params=$_ba1604_old_params['_526f67'];$_ba1604_local_vars=$_ba1604_old_vars['_526f67'];?>
<?php $_ba1604_old_params['_03adb0']=$_ba1604_local_params;$_ba1604_old_vars['_03adb0']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_no_primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ba1604_old_params['_9d13cc']=$_ba1604_local_params;$_ba1604_old_vars['_9d13cc']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_ba1604_local_params=$_ba1604_old_params['_9d13cc'];$_ba1604_local_vars=$_ba1604_old_vars['_9d13cc'];?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_03adb0'];$_ba1604_local_vars=$_ba1604_old_vars['_03adb0'];?>
<?php $_ba1604_old_params['_da7fb6']=$_ba1604_local_params;$_ba1604_old_vars['_da7fb6']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_ba1604_local_params=$_ba1604_old_params['_da7fb6'];$_ba1604_local_vars=$_ba1604_old_vars['_da7fb6'];?>
 type="checkbox" class="custom-control-input disp-option-item" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_ba1604_old_params['_37201f']=$_ba1604_local_params;$_ba1604_old_vars['_37201f']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_ba1604_local_params=$_ba1604_old_params['_37201f'];$_ba1604_local_vars=$_ba1604_old_vars['_37201f'];?>
"></span>
                  <span class="custom-control-description"> <?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                </label>
                <?php endif;$_ba1604_local_params=$_ba1604_old_params['_7b8315'];$_ba1604_local_vars=$_ba1604_old_vars['_7b8315'];?>

            <?php $_ba1604_old_params['_91ca63']=$_ba1604_local_params;$_ba1604_old_vars['_91ca63']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
            </div>
            <?php endif;$_ba1604_local_params=$_ba1604_old_params['_91ca63'];$_ba1604_local_vars=$_ba1604_old_vars['_91ca63'];?>

            <?php endif;$c_349119=ob_get_clean();endwhile; $_ba1604_local_params=$_ba1604_old_params['_349119'];$_ba1604_local_vars=$_ba1604_old_vars['_349119'];?>

          <?php endif;$_ba1604_local_params=$_ba1604_old_params['_07e51d'];$_ba1604_local_vars=$_ba1604_old_vars['_07e51d'];?>

          <?php endif;$_ba1604_local_params=$_ba1604_old_params['_8dc41c'];$_ba1604_local_vars=$_ba1604_old_vars['_8dc41c'];?>

            <div class="row form-group">
              <div class="col-md-2"><label for="_per_page"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Paging','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <input id="_per_page" step="1" list="per_page_complete" type="number" min="1" max="5000" class="form-control form-control-sm very-short control-inline" name="_per_page" value="<?php echo $this->function_var($this->setup_args(['name'=>'_per_page','this_tag'=>'var'],null,$this),$this)?>
">
                <?php echo $this->function_trans($this->setup_args(['phrase'=>'Items per Page','this_tag'=>'trans'],null,$this),$this)?>

              </div>
            </div>
            <?php $_ba1604_old_params['_fe9c40']=$_ba1604_local_params;$_ba1604_old_vars['_fe9c40']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'search_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <?php $c_1ebb75=null;$_ba1604_old_params['_1ebb75']=$_ba1604_local_params;$_ba1604_old_vars['_1ebb75']=$_ba1604_local_vars;$a_1ebb75=$this->setup_args(['name'=>'search_options','this_tag'=>'loop'],null,$this);$_1ebb75=-1;$r_1ebb75=true;while($r_1ebb75===true):$r_1ebb75=($_1ebb75!==-1)?false:true;echo $this->block_loop($a_1ebb75,$c_1ebb75,$this,$r_1ebb75,++$_1ebb75,'_1ebb75');ob_start();?>
<?php $c_1ebb75 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_1ebb75=false;}if($c_1ebb75 ):?>

                  <label class="custom-control custom-checkbox">
                    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                    <input<?php $_ba1604_old_params['_f5c51f']=$_ba1604_local_params;$_ba1604_old_vars['_f5c51f']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_ba1604_local_params=$_ba1604_old_params['_f5c51f'];$_ba1604_local_vars=$_ba1604_old_vars['_f5c51f'];?>
 type="checkbox" class="custom-control-input" name="_s_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"> <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[0]','setvar'=>'search_col','this_tag'=>'var'],null,$this),$this),$this->setup_args('search_col','setvar',$this),$this,'setvar')?>
<?php echo $this->function_trans($this->setup_args(['phrase'=>'$search_col','this_tag'=>'trans'],null,$this),$this)?>
</span>
                  </label>
                <?php endif;$c_1ebb75=ob_get_clean();endwhile; $_ba1604_local_params=$_ba1604_old_params['_1ebb75'];$_ba1604_local_vars=$_ba1604_old_vars['_1ebb75'];?>

              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search Type','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-5">
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_ba1604_old_params['_aa034a']=$_ba1604_local_params;$_ba1604_old_vars['_aa034a']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_search_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_ba1604_local_params=$_ba1604_old_params['_aa034a'];$_ba1604_local_vars=$_ba1604_old_vars['_aa034a'];?>
<?php $_ba1604_old_params['_4c99f8']=$_ba1604_local_params;$_ba1604_old_vars['_4c99f8']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_ba1604_local_params=$_ba1604_old_params['_4c99f8'];$_ba1604_local_vars=$_ba1604_old_vars['_4c99f8'];?>
 name="_user_search_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Phrase','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_ba1604_old_params['_73b5dd']=$_ba1604_local_params;$_ba1604_old_vars['_73b5dd']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_ba1604_local_params=$_ba1604_old_params['_73b5dd'];$_ba1604_local_vars=$_ba1604_old_vars['_73b5dd'];?>
 name="_user_search_type" value="2">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'OR','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_ba1604_old_params['_18623d']=$_ba1604_local_params;$_ba1604_old_vars['_18623d']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_ba1604_local_params=$_ba1604_old_params['_18623d'];$_ba1604_local_vars=$_ba1604_old_vars['_18623d'];?>
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
                  <input type="checkbox" <?php $_ba1604_old_params['_81bc22']=$_ba1604_local_params;$_ba1604_old_vars['_81bc22']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_user_keep_search','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_ba1604_local_params=$_ba1604_old_params['_81bc22'];$_ba1604_local_vars=$_ba1604_old_vars['_81bc22'];?>
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
                  <input class="custom-control-input" type="radio" <?php $_ba1604_old_params['_ee10dd']=$_ba1604_local_params;$_ba1604_old_vars['_ee10dd']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_replace_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_ba1604_local_params=$_ba1604_old_params['_ee10dd'];$_ba1604_local_vars=$_ba1604_old_vars['_ee10dd'];?>
 name="_user_replace_type" value="0">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Insensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_ba1604_old_params['_72dcc5']=$_ba1604_local_params;$_ba1604_old_vars['_72dcc5']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_replace_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_ba1604_local_params=$_ba1604_old_params['_72dcc5'];$_ba1604_local_vars=$_ba1604_old_vars['_72dcc5'];?>
 name="_user_replace_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Sensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
            </div>
            <?php endif;$_ba1604_local_params=$_ba1604_old_params['_fe9c40'];$_ba1604_local_vars=$_ba1604_old_vars['_fe9c40'];?>

            <div class="row form-group">
              <?php $c_d97469=null;$_ba1604_old_params['_d97469']=$_ba1604_local_params;$_ba1604_old_vars['_d97469']=$_ba1604_local_vars;$a_d97469=$this->setup_args(['name'=>'sort_options','this_tag'=>'loop'],null,$this);$_d97469=-1;$r_d97469=true;while($r_d97469===true):$r_d97469=($_d97469!==-1)?false:true;echo $this->block_loop($a_d97469,$c_d97469,$this,$r_d97469,++$_d97469,'_d97469');ob_start();?>
<?php $c_d97469 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_d97469=false;}if($c_d97469 ):?>

              <?php $_ba1604_old_params['_14d6e2']=$_ba1604_local_params;$_ba1604_old_vars['_14d6e2']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Sort','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-7">
              <?php endif;$_ba1604_local_params=$_ba1604_old_params['_14d6e2'];$_ba1604_local_vars=$_ba1604_old_vars['_14d6e2'];?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <label class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" <?php $_ba1604_old_params['_54a1aa']=$_ba1604_local_params;$_ba1604_old_vars['_54a1aa']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_ba1604_local_params=$_ba1604_old_params['_54a1aa'];$_ba1604_local_vars=$_ba1604_old_vars['_54a1aa'];?>
 name="_user_sort_by" value="<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                  </label>
              <?php $_ba1604_old_params['_7cdc54']=$_ba1604_local_params;$_ba1604_old_vars['_7cdc54']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
              <div class="col-md-3">
                <select name="_user_sort_order" class="form-control custom-select">
                  <?php $c_ade146=null;$_ba1604_old_params['_ade146']=$_ba1604_local_params;$_ba1604_old_vars['_ade146']=$_ba1604_local_vars;$a_ade146=$this->setup_args(['name'=>'order_options','this_tag'=>'loop'],null,$this);$_ade146=-1;$r_ade146=true;while($r_ade146===true):$r_ade146=($_ade146!==-1)?false:true;echo $this->block_loop($a_ade146,$c_ade146,$this,$r_ade146,++$_ade146,'_ade146');ob_start();?>
<?php $c_ade146 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_ade146=false;}if($c_ade146 ):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"<?php $_ba1604_old_params['_30a7f5']=$_ba1604_local_params;$_ba1604_old_vars['_30a7f5']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 selected<?php endif;$_ba1604_local_params=$_ba1604_old_params['_30a7f5'];$_ba1604_local_vars=$_ba1604_old_vars['_30a7f5'];?>
><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</option>
                  <?php endif;$c_ade146=ob_get_clean();endwhile; $_ba1604_local_params=$_ba1604_old_params['_ade146'];$_ba1604_local_vars=$_ba1604_old_vars['_ade146'];?>

                </select>
              </div>
              <?php endif;$_ba1604_local_params=$_ba1604_old_params['_7cdc54'];$_ba1604_local_vars=$_ba1604_old_vars['_7cdc54'];?>

              <?php endif;$c_d97469=ob_get_clean();endwhile; $_ba1604_local_params=$_ba1604_old_params['_d97469'];$_ba1604_local_vars=$_ba1604_old_vars['_d97469'];?>

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

<?php $_ba1604_old_params['_9a9f63']=$_ba1604_local_params;$_ba1604_old_vars['_9a9f63']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'dialog_max_cols','setvar'=>'_list_max_cols','this_tag'=>'property'],null,$this),$this),$this->setup_args('_list_max_cols','setvar',$this),$this,'setvar')?>

<?php endif;$_ba1604_local_params=$_ba1604_old_params['_9a9f63'];$_ba1604_local_vars=$_ba1604_old_vars['_9a9f63'];?>

<?php $_ba1604_old_params['_7f625b']=$_ba1604_local_params;$_ba1604_old_vars['_7f625b']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_list_max_cols','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
      <?php $_ba1604_old_params['_189e62']=$_ba1604_local_params;$_ba1604_old_vars['_189e62']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the dialog.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php else:?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the display.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php endif;$_ba1604_local_params=$_ba1604_old_params['_189e62'];$_ba1604_local_vars=$_ba1604_old_vars['_189e62'];?>

    }
});
</script>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_7f625b'];$_ba1604_local_vars=$_ba1604_old_vars['_7f625b'];?>

<?php endif;$_4c7966=ob_get_clean();echo $this->modifier_trim_space($_4c7966,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_ba1604_local_params=$_ba1604_old_params['_4c7966'];$_ba1604_local_vars=$_ba1604_old_vars['_4c7966'];?>

        <?php endif;$_ba1604_local_params=$_ba1604_old_params['_20fcbf'];$_ba1604_local_vars=$_ba1604_old_vars['_20fcbf'];?>

      <?php endif;$_ba1604_local_params=$_ba1604_old_params['_c099ac'];$_ba1604_local_vars=$_ba1604_old_vars['_c099ac'];?>

    <?php endif;$_ba1604_local_params=$_ba1604_old_params['_6975f3'];$_ba1604_local_vars=$_ba1604_old_vars['_6975f3'];?>

    <?php $c_4bbc68=null;$_ba1604_old_params['_4bbc68']=$_ba1604_local_params;$_ba1604_old_vars['_4bbc68']=$_ba1604_local_vars;$a_4bbc68=$this->setup_args(['name'=>'alert_close','this_tag'=>'setvarblock'],null,$this);ob_start();?>

      <button type="button" class="close" data-dismiss="alert" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
        <span aria-hidden="true">&times;</span>
      </button>
    <?php $c_4bbc68=ob_get_clean();$c_4bbc68=$this->block_setvarblock($a_4bbc68,$c_4bbc68,$this,$r_4bbc68,1,'_4bbc68');echo($c_4bbc68); $_ba1604_local_params=$_ba1604_old_params['_4bbc68'];?>

    <div class="alert alert-success hidden" id="header-alert" role="alert" tabindex="0">
      <button onclick="$('#header-alert').hide();" type="button" id="header-alert-close" class="close" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
        <span aria-hidden="true">&times;</span>
      </button>
      <span id="header-alert-message"></span>
    </div>
    <?php $_ba1604_old_params['_799fba']=$_ba1604_local_params;$_ba1604_old_vars['_799fba']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_ba1604_old_params['_770967']=$_ba1604_local_params;$_ba1604_old_vars['_770967']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <div class="alert alert-danger" id="header-error-message" tabindex="0" role="alert">
        <?php echo paml_modifier_funcs('nl2br', paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'error','escape'=>'1','nl2br'=>'1','this_tag'=>'var'],null,$this),$this),ENT_QUOTES))?>

      </div>
      <script>
      $('#header-error-message').focus();
      </script>
      <?php echo $this->function_setvar($this->setup_args(['name'=>'error','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_ba1604_local_params=$_ba1604_old_params['_770967'];$_ba1604_local_vars=$_ba1604_old_vars['_770967'];?>

    <?php endif;$_ba1604_local_params=$_ba1604_old_params['_799fba'];$_ba1604_local_vars=$_ba1604_old_vars['_799fba'];?>

<script>
$(function () {
    if (window.ontouchstart !== null) {
        $('[data-toggle="tooltip"]').tooltip();
    }
})
</script>
<div class="card">
<div class="card-image-wrapper"><img class="card-img-top img-fluid" src="assets/brand/PowerCMSX.svg" alt="PowerCMS X"></div>
<div class="col-md-12 form-group pt-5 pl-5 pr-5 card-inner">
<?php $_ba1604_old_params['_c4e3ea']=$_ba1604_local_params;$_ba1604_old_vars['_c4e3ea']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'lockout_error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div id="header-error-message" class="alert alert-danger" role="alert" tabindex="0">
    <?php echo $this->function_var($this->setup_args(['name'=>'lockout_error','this_tag'=>'var'],null,$this),$this)?>

  </div>
  <script>
    $('#header-error-message').focus();
  </script>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'error','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

  <div id="header-error-message" class="alert alert-danger" role="alert" tabindex="0">
    <?php echo $this->function_var($this->setup_args(['name'=>'error','this_tag'=>'var'],null,$this),$this)?>

  </div>
  <script>
    $('#header-error-message').focus();
  </script>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.recovered','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

  <div id="dialog-header-message" class="alert alert-success" role="alert" tabindex="0">
    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You have reset your password.','this_tag'=>'trans'],null,$this),$this)?>

  </div>
  <script>
    $('#dialog-header-message').focus();
  </script>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.__mode','eq'=>'logout','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

  <div id="dialog-header-message" class="alert alert-success" role="alert" tabindex="0">
    <?php echo $this->function_trans($this->setup_args(['phrase'=>'Your %s session has ended. If you wish to login again, you can do so below.','params'=>'$appname','this_tag'=>'trans'],null,$this),$this)?>

  </div>
  <script>
    $('#dialog-header-message').focus();
  </script>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_c4e3ea'];$_ba1604_local_vars=$_ba1604_old_vars['_c4e3ea'];?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'disallow_pwd_login','setvar'=>'disallow_pwd_login','this_tag'=>'property'],null,$this),$this),$this->setup_args('disallow_pwd_login','setvar',$this),$this,'setvar')?>

<?php $_ba1604_old_params['_3a4717']=$_ba1604_local_params;$_ba1604_old_vars['_3a4717']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'disallow_pwd_login','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<form action="<?php echo $this->modifier_relative($this->function_var($this->setup_args(['name'=>'script_uri','relative'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('','relative',$this),$this,'relative')?>
" method="POST" id="login-form">
  <input type="hidden" name="__mode" value="login">
  <input type="hidden" name="return_url" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'return_url','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<?php $_ba1604_old_params['_e229ce']=$_ba1604_local_params;$_ba1604_old_vars['_e229ce']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','ne'=>'logout','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <input type="hidden" name="return_args" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'query_string','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_e229ce'];$_ba1604_local_vars=$_ba1604_old_vars['_e229ce'];?>

<div class="form-group">
  <label for="name"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Username','this_tag'=>'trans'],null,$this),$this)?>
 :</label>
  <input id="name" type="text" class="form-control" name="name" value="<?php echo $this->function_var($this->setup_args(['name'=>'name','this_tag'=>'var'],null,$this),$this)?>
">
</div>

<div class="form-group">
  <label for="password"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Password','this_tag'=>'trans'],null,$this),$this)?>
 :</label>
  <input id="password" autocomplete="off" type="password" class="form-control" name="password" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'password','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
</div>

<div class="form-group mb-0">
  <label class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="remember" value="1">
    <span class="custom-control-indicator"></span>
    <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Remember me?','this_tag'=>'trans'],null,$this),$this)?>
</span>
  </label>
</div>
<div class="form-group mt-1">
<a href="<?php echo $this->modifier_relative($this->function_var($this->setup_args(['name'=>'script_uri','relative'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('','relative',$this),$this,'relative')?>
?__mode=start_recover">
<?php echo $this->function_trans($this->setup_args(['phrase'=>'Forgot your password?','this_tag'=>'trans'],null,$this),$this)?>

</a>
</div>
<div class="row form-group footer-btns">
  <button type="submit" id="__login" class="btn btn-primary"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Login','this_tag'=>'trans'],null,$this),$this)?>
</button>
  <?php echo $this->function_var($this->setup_args(['name'=>'add_login_action_bar','this_tag'=>'var'],null,$this),$this)?>

</div>
</form>
<?php else:?>

  <?php echo $this->function_var($this->setup_args(['name'=>'alternative_login_screen','this_tag'=>'var'],null,$this),$this)?>

<?php endif;$_ba1604_local_params=$_ba1604_old_params['_3a4717'];$_ba1604_local_vars=$_ba1604_old_vars['_3a4717'];?>

</div>
</div>
<script>
$('#__login').click(function(){
    $(this).attr('disabled', true);
    $('#login-form').submit();
    return false;
});
</script>
          <?php $_ba1604_old_params['_d95eb5']=$_ba1604_local_params;$_ba1604_old_vars['_d95eb5']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ba1604_old_params['_f0a536']=$_ba1604_local_params;$_ba1604_old_vars['_f0a536']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</div><?php endif;$_ba1604_local_params=$_ba1604_old_params['_f0a536'];$_ba1604_local_vars=$_ba1604_old_vars['_f0a536'];?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_d95eb5'];$_ba1604_local_vars=$_ba1604_old_vars['_d95eb5'];?>

        </main>
      </div>
    </div>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<?php $_ba1604_old_params['_3a7f9e']=$_ba1604_local_params;$_ba1604_old_vars['_3a7f9e']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_ba1604_old_params['_f2f19f']=$_ba1604_local_params;$_ba1604_old_vars['_f2f19f']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_ba1604_old_params['_227bca']=$_ba1604_local_params;$_ba1604_old_vars['_227bca']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_ba1604_old_params['_826c70']=$_ba1604_local_params;$_ba1604_old_vars['_826c70']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_ba1604_local_params=$_ba1604_old_params['_826c70'];$_ba1604_local_vars=$_ba1604_old_vars['_826c70'];?>

<?php endif;$_ba1604_local_params=$_ba1604_old_params['_227bca'];$_ba1604_local_vars=$_ba1604_old_vars['_227bca'];?>

<?php $_ba1604_old_params['_24032c']=$_ba1604_local_params;$_ba1604_old_vars['_24032c']=$_ba1604_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_ba1604_old_params['_1450f2']=$_ba1604_local_params;$_ba1604_old_vars['_1450f2']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_ba1604_local_params=$_ba1604_old_params['_1450f2'];$_ba1604_local_vars=$_ba1604_old_vars['_1450f2'];?>

<?php $_ba1604_old_params['_63d486']=$_ba1604_local_params;$_ba1604_old_vars['_63d486']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_63d486'];$_ba1604_local_vars=$_ba1604_old_vars['_63d486'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_24032c'];$_ba1604_local_vars=$_ba1604_old_vars['_24032c'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_ba1604_old_params['_b61f2b']=$_ba1604_local_params;$_ba1604_old_vars['_b61f2b']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_ba1604_local_params=$_ba1604_old_params['_b61f2b'];$_ba1604_local_vars=$_ba1604_old_vars['_b61f2b'];?>

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
?__mode=view&_type=list&_model=asset<?php $_ba1604_old_params['_43dcf2']=$_ba1604_local_params;$_ba1604_old_vars['_43dcf2']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_43dcf2'];$_ba1604_local_vars=$_ba1604_old_vars['_43dcf2'];?>
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
?__mode=view&_type=list&_model=asset<?php $_ba1604_old_params['_c3a996']=$_ba1604_local_params;$_ba1604_old_vars['_c3a996']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_c3a996'];$_ba1604_local_vars=$_ba1604_old_vars['_c3a996'];?>
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
            <?php $_ba1604_old_params['_0801d5']=$_ba1604_local_params;$_ba1604_old_vars['_0801d5']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            if(ed.id && ed.id == 'text'){
              var clipboard_image = $('#clipboard-image');
              var inline_image = $('#inline-image');
              var bg_image_url = clipboard_image.val();
              if ( inline_image.length ) {
                  bg_image_url = inline_image.attr('href');
              }
              if ( clipboard_image.length ) {
                <?php $_ba1604_old_params['_26f1d4']=$_ba1604_local_params;$_ba1604_old_vars['_26f1d4']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_26f1d4'];$_ba1604_local_vars=$_ba1604_old_vars['_26f1d4'];?>

                <?php $_ba1604_old_params['_0a78fb']=$_ba1604_local_params;$_ba1604_old_vars['_0a78fb']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_0a78fb'];$_ba1604_local_vars=$_ba1604_old_vars['_0a78fb'];?>

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
            <?php endif;$_ba1604_local_params=$_ba1604_old_params['_0801d5'];$_ba1604_local_vars=$_ba1604_old_vars['_0801d5'];?>

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
<?php $_ba1604_old_params['_1b5ac4']=$_ba1604_local_params;$_ba1604_old_vars['_1b5ac4']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_ba1604_old_params['_501c4b']=$_ba1604_local_params;$_ba1604_old_vars['_501c4b']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_ba1604_local_params=$_ba1604_old_params['_501c4b'];$_ba1604_local_vars=$_ba1604_old_vars['_501c4b'];?>

<?php endif;$_ba1604_local_params=$_ba1604_old_params['_1b5ac4'];$_ba1604_local_vars=$_ba1604_old_vars['_1b5ac4'];?>

<?php $_ba1604_old_params['_6bc135']=$_ba1604_local_params;$_ba1604_old_vars['_6bc135']=$_ba1604_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_ba1604_old_params['_067168']=$_ba1604_local_params;$_ba1604_old_vars['_067168']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_ba1604_local_params=$_ba1604_old_params['_067168'];$_ba1604_local_vars=$_ba1604_old_vars['_067168'];?>

<?php $_ba1604_old_params['_fa436e']=$_ba1604_local_params;$_ba1604_old_vars['_fa436e']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_fa436e'];$_ba1604_local_vars=$_ba1604_old_vars['_fa436e'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_6bc135'];$_ba1604_local_vars=$_ba1604_old_vars['_6bc135'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_ba1604_old_params['_1d8569']=$_ba1604_local_params;$_ba1604_old_vars['_1d8569']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_ba1604_local_params=$_ba1604_old_params['_1d8569'];$_ba1604_local_vars=$_ba1604_old_vars['_1d8569'];?>

        relative_urls : false,
        image_advtab: true,
        promotion: false,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code<?php $_ba1604_old_params['_ccc6ec']=$_ba1604_local_params;$_ba1604_old_vars['_ccc6ec']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','lt'=>'6','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 print paste<?php endif;$_ba1604_local_params=$_ba1604_old_params['_ccc6ec'];$_ba1604_local_vars=$_ba1604_old_vars['_ccc6ec'];?>
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
                <?php $_ba1604_old_params['_171c42']=$_ba1604_local_params;$_ba1604_old_vars['_171c42']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'gallery',
                <?php endif;$_ba1604_local_params=$_ba1604_old_params['_171c42'];$_ba1604_local_vars=$_ba1604_old_vars['_171c42'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_ba1604_old_params['_3c17b3']=$_ba1604_local_params;$_ba1604_old_vars['_3c17b3']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_3c17b3'];$_ba1604_local_vars=$_ba1604_old_vars['_3c17b3'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.ui.registry.addButton('pt-file', {
                <?php $_ba1604_old_params['_de3999']=$_ba1604_local_params;$_ba1604_old_vars['_de3999']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'browse',
                <?php endif;$_ba1604_local_params=$_ba1604_old_params['_de3999'];$_ba1604_local_vars=$_ba1604_old_vars['_de3999'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_ba1604_old_params['_25d0c6']=$_ba1604_local_params;$_ba1604_old_vars['_25d0c6']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_25d0c6'];$_ba1604_local_vars=$_ba1604_old_vars['_25d0c6'];?>
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
            <?php $_ba1604_old_params['_3c2cfd']=$_ba1604_local_params;$_ba1604_old_vars['_3c2cfd']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
                      <?php $_ba1604_old_params['_9d912a']=$_ba1604_local_params;$_ba1604_old_vars['_9d912a']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_9d912a'];$_ba1604_local_vars=$_ba1604_old_vars['_9d912a'];?>

                      <?php $_ba1604_old_params['_ebfde8']=$_ba1604_local_params;$_ba1604_old_vars['_ebfde8']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_ebfde8'];$_ba1604_local_vars=$_ba1604_old_vars['_ebfde8'];?>

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
            <?php endif;$_ba1604_local_params=$_ba1604_old_params['_3c2cfd'];$_ba1604_local_vars=$_ba1604_old_vars['_3c2cfd'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_f2f19f'];$_ba1604_local_vars=$_ba1604_old_vars['_f2f19f'];?>

<?php endif;$_ba1604_local_params=$_ba1604_old_params['_3a7f9e'];$_ba1604_local_vars=$_ba1604_old_vars['_3a7f9e'];?>

<script>
function disp_header_alert ( message, dialog_class ) {
    $("#header-alert-message").html( message );
    if (! dialog_class ) {
        dialog_class = 'success';
    }
    if ( dialog_class == 'success' ) {
        $("#header-alert").removeClass("alert-danger");
        $("#header-alert").addClass("alert-success");
    } else {
        $("#header-alert").removeClass("alert-success");
        $("#header-alert").addClass("alert-danger");
    }
    $("#header-alert").show();
    setTimeout(focus_header_dialog, 500);
}
$(function() {
    $(".popup").click(function(){
        window.open(this.href,"WindowName","width=480,height=380,resizable=yes,scrollbars=yes");
        return false;
    });
});
</script>
<?php $_ba1604_old_params['_cde935']=$_ba1604_local_params;$_ba1604_old_vars['_cde935']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>


<?php $_ba1604_old_params['_e114cf']=$_ba1604_local_params;$_ba1604_old_vars['_e114cf']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_ba1604_old_params['_4ea949']=$_ba1604_local_params;$_ba1604_old_vars['_4ea949']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_ba1604_old_params['_eaa03e']=$_ba1604_local_params;$_ba1604_old_vars['_eaa03e']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_ba1604_old_params['_b6379a']=$_ba1604_local_params;$_ba1604_old_vars['_b6379a']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_ba1604_local_params=$_ba1604_old_params['_b6379a'];$_ba1604_local_vars=$_ba1604_old_vars['_b6379a'];?>

<?php endif;$_ba1604_local_params=$_ba1604_old_params['_eaa03e'];$_ba1604_local_vars=$_ba1604_old_vars['_eaa03e'];?>

<?php $_ba1604_old_params['_956d2b']=$_ba1604_local_params;$_ba1604_old_vars['_956d2b']=$_ba1604_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_ba1604_old_params['_d73af7']=$_ba1604_local_params;$_ba1604_old_vars['_d73af7']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_ba1604_local_params=$_ba1604_old_params['_d73af7'];$_ba1604_local_vars=$_ba1604_old_vars['_d73af7'];?>

<?php $_ba1604_old_params['_5b132b']=$_ba1604_local_params;$_ba1604_old_vars['_5b132b']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_5b132b'];$_ba1604_local_vars=$_ba1604_old_vars['_5b132b'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_956d2b'];$_ba1604_local_vars=$_ba1604_old_vars['_956d2b'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_ba1604_old_params['_376e1e']=$_ba1604_local_params;$_ba1604_old_vars['_376e1e']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_ba1604_local_params=$_ba1604_old_params['_376e1e'];$_ba1604_local_vars=$_ba1604_old_vars['_376e1e'];?>

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
?__mode=view&_type=list&_model=asset<?php $_ba1604_old_params['_cc5f29']=$_ba1604_local_params;$_ba1604_old_vars['_cc5f29']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_cc5f29'];$_ba1604_local_vars=$_ba1604_old_vars['_cc5f29'];?>
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
?__mode=view&_type=list&_model=asset<?php $_ba1604_old_params['_088b80']=$_ba1604_local_params;$_ba1604_old_vars['_088b80']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_088b80'];$_ba1604_local_vars=$_ba1604_old_vars['_088b80'];?>
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
            <?php $_ba1604_old_params['_a773b8']=$_ba1604_local_params;$_ba1604_old_vars['_a773b8']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            if(ed.id && ed.id == 'text'){
              var clipboard_image = $('#clipboard-image');
              var inline_image = $('#inline-image');
              var bg_image_url = clipboard_image.val();
              if ( inline_image.length ) {
                  bg_image_url = inline_image.attr('href');
              }
              if ( clipboard_image.length ) {
                <?php $_ba1604_old_params['_4f283b']=$_ba1604_local_params;$_ba1604_old_vars['_4f283b']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_4f283b'];$_ba1604_local_vars=$_ba1604_old_vars['_4f283b'];?>

                <?php $_ba1604_old_params['_4c6fc8']=$_ba1604_local_params;$_ba1604_old_vars['_4c6fc8']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_4c6fc8'];$_ba1604_local_vars=$_ba1604_old_vars['_4c6fc8'];?>

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
            <?php endif;$_ba1604_local_params=$_ba1604_old_params['_a773b8'];$_ba1604_local_vars=$_ba1604_old_vars['_a773b8'];?>

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
<?php $_ba1604_old_params['_313b75']=$_ba1604_local_params;$_ba1604_old_vars['_313b75']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_ba1604_old_params['_0a3e4d']=$_ba1604_local_params;$_ba1604_old_vars['_0a3e4d']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_ba1604_local_params=$_ba1604_old_params['_0a3e4d'];$_ba1604_local_vars=$_ba1604_old_vars['_0a3e4d'];?>

<?php endif;$_ba1604_local_params=$_ba1604_old_params['_313b75'];$_ba1604_local_vars=$_ba1604_old_vars['_313b75'];?>

<?php $_ba1604_old_params['_36faa7']=$_ba1604_local_params;$_ba1604_old_vars['_36faa7']=$_ba1604_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_ba1604_old_params['_59d7e7']=$_ba1604_local_params;$_ba1604_old_vars['_59d7e7']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_ba1604_local_params=$_ba1604_old_params['_59d7e7'];$_ba1604_local_vars=$_ba1604_old_vars['_59d7e7'];?>

<?php $_ba1604_old_params['_5f6f24']=$_ba1604_local_params;$_ba1604_old_vars['_5f6f24']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_5f6f24'];$_ba1604_local_vars=$_ba1604_old_vars['_5f6f24'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_36faa7'];$_ba1604_local_vars=$_ba1604_old_vars['_36faa7'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_ba1604_old_params['_71a1ab']=$_ba1604_local_params;$_ba1604_old_vars['_71a1ab']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_ba1604_local_params=$_ba1604_old_params['_71a1ab'];$_ba1604_local_vars=$_ba1604_old_vars['_71a1ab'];?>

        relative_urls : false,
        image_advtab: true,
        promotion: false,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code<?php $_ba1604_old_params['_46b7da']=$_ba1604_local_params;$_ba1604_old_vars['_46b7da']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','lt'=>'6','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 print paste<?php endif;$_ba1604_local_params=$_ba1604_old_params['_46b7da'];$_ba1604_local_vars=$_ba1604_old_vars['_46b7da'];?>
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
                <?php $_ba1604_old_params['_cb606d']=$_ba1604_local_params;$_ba1604_old_vars['_cb606d']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'gallery',
                <?php endif;$_ba1604_local_params=$_ba1604_old_params['_cb606d'];$_ba1604_local_vars=$_ba1604_old_vars['_cb606d'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_ba1604_old_params['_f1f7ba']=$_ba1604_local_params;$_ba1604_old_vars['_f1f7ba']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_f1f7ba'];$_ba1604_local_vars=$_ba1604_old_vars['_f1f7ba'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.ui.registry.addButton('pt-file', {
                <?php $_ba1604_old_params['_ab25cd']=$_ba1604_local_params;$_ba1604_old_vars['_ab25cd']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'browse',
                <?php endif;$_ba1604_local_params=$_ba1604_old_params['_ab25cd'];$_ba1604_local_vars=$_ba1604_old_vars['_ab25cd'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_ba1604_old_params['_c62bcd']=$_ba1604_local_params;$_ba1604_old_vars['_c62bcd']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_c62bcd'];$_ba1604_local_vars=$_ba1604_old_vars['_c62bcd'];?>
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
            <?php $_ba1604_old_params['_1c365f']=$_ba1604_local_params;$_ba1604_old_vars['_1c365f']=$_ba1604_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
                      <?php $_ba1604_old_params['_654b2e']=$_ba1604_local_params;$_ba1604_old_vars['_654b2e']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_654b2e'];$_ba1604_local_vars=$_ba1604_old_vars['_654b2e'];?>

                      <?php $_ba1604_old_params['_fc8872']=$_ba1604_local_params;$_ba1604_old_vars['_fc8872']=$_ba1604_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_fc8872'];$_ba1604_local_vars=$_ba1604_old_vars['_fc8872'];?>

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
            <?php endif;$_ba1604_local_params=$_ba1604_old_params['_1c365f'];$_ba1604_local_vars=$_ba1604_old_vars['_1c365f'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_4ea949'];$_ba1604_local_vars=$_ba1604_old_vars['_4ea949'];?>

<?php endif;$_ba1604_local_params=$_ba1604_old_params['_e114cf'];$_ba1604_local_vars=$_ba1604_old_vars['_e114cf'];?>

<script>
$(document).keydown(evnt_keydown);
function evnt_keydown(e) {
    if ( e.keyCode == 27 ) {
        window.location.href = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=loading';
        window.parent.$('#modal').modal('hide');
    }
}
function disp_header_alert ( message, dialog_class ) {
    $("#header-alert-message").html( message );
    if (! dialog_class ) {
        dialog_class = 'success';
    }
    if ( dialog_class == 'success' ) {
        $("#header-alert").removeClass("alert-danger");
        $("#header-alert").addClass("alert-success");
    } else {
        $("#header-alert").removeClass("alert-success");
        $("#header-alert").addClass("alert-danger");
    }
    $("#header-alert").show();
    setTimeout(focus_header_dialog, 500);
}
function focus_header_dialog () {
    $("#header-alert").focus();
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
</script>
<div id="modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true" data-keyboard="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
      <iframe id="modal-iframe" name="dialog-modal" style="width:100%;height:100%;"></iframe>
    </div>
  </div>
</div>
<?php endif;$_ba1604_local_params=$_ba1604_old_params['_cde935'];$_ba1604_local_vars=$_ba1604_old_vars['_cde935'];?>

<script>
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
$('#modal-iframe').attr('src', '<?php echo $this->function_var($this->setup_args(['name'=>'“script_uri”','this_tag'=>'var'],null,$this),$this)?>
?__mode=loading' );
</script>
<?php echo $this->function_var($this->setup_args(['name'=>'html_body_footer','this_tag'=>'var'],null,$this),$this)?>

  </body>
</html>

<?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\login.tmpl' => 1694708530,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\dialog_footer.tmpl' => 1718664344,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\dialog_header.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\richtext.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\list_options.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\start_upload.tmpl' => 1694708530,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\list_filters.tmpl' => 1718664344,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit_options.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\richtext4.tmpl' => 1718664276,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1743988084,
);?>