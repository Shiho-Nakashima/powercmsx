<?php ob_start();?><?php $_3c60e0_vars=&$this->vars;$_3c60e0_old_params=&$this->old_params;$_3c60e0_local_params=&$this->local_params;$_3c60e0_old_vars=&$this->old_vars;$_3c60e0_local_vars=&$this->local_vars;?><?php $_3c60e0_old_params['_cb2eed']=$_3c60e0_local_params;$_3c60e0_old_vars['_cb2eed']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'iframe','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<!DOCTYPE html>
<html lang="<?php $_3c60e0_old_params['_c703ff']=$_3c60e0_local_params;$_3c60e0_old_vars['_c703ff']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_language','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_language','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
en<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c703ff'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c703ff'];?>
">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title><?php $_3c60e0_old_params['_f4037c']=$_3c60e0_local_params;$_3c60e0_old_vars['_f4037c']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'html_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'html_title','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'page_title','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f4037c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f4037c'];?>
<?php $_3c60e0_old_params['_a7a5e4']=$_3c60e0_local_params;$_3c60e0_old_vars['_a7a5e4']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 | <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a7a5e4'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a7a5e4'];?>
 | <?php echo paml_htmlspecialchars($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'appname','escape'=>'','this_tag'=>'getoption'],null,$this),$this),ENT_QUOTES)?>
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
    <style type="text/css">
      .nav-top,.brand-prototype{ background-color: <?php echo $this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'barcolor','this_tag'=>'getoption'],null,$this),$this)?>
 !important; color: <?php echo $this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'bartextcolor','this_tag'=>'getoption'],null,$this),$this)?>
 !important; }
      <?php $_3c60e0_old_params['_b86466']=$_3c60e0_local_params;$_3c60e0_old_vars['_b86466']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php ob_start();$_3c60e0_old_params['_ad8a01']=$_3c60e0_local_params;$_3c60e0_old_vars['_ad8a01']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .brand-workspace, .workspace-bar{ background-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; }
      <?php endif;$_ad8a01=ob_get_clean();echo paml_htmlspecialchars($_ad8a01,ENT_QUOTES);$_3c60e0_local_params=$_3c60e0_old_params['_ad8a01'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ad8a01'];?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b86466'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b86466'];?>

      <?php $_3c60e0_old_params['_9bd3fe']=$_3c60e0_local_params;$_3c60e0_old_vars['_9bd3fe']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .form-control, .custom-select, .relation_nestable_list, .custom-control-indicator, .tox-tinymce, .mce-tinymce, .btn-outline-secondary, .btn-secondary, .pagination-sm li a{ border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important }
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_9bd3fe'];$_3c60e0_local_vars=$_3c60e0_old_vars['_9bd3fe'];?>

    </style>
    <?php echo $this->function_var($this->setup_args(['name'=>'html_head','this_tag'=>'var'],null,$this),$this)?>

  </head>
  <body class="<?php echo $this->function_var($this->setup_args(['name'=>'body_class','this_tag'=>'var'],null,$this),$this)?>
">
  <div id="main-content">
    <div class="container-fluid">
      <div class="row">
        <main class="col-md-12 pt-3">
          <h1 class="title-with-opt"><span class="title"><?php echo $this->function_var($this->setup_args(['name'=>'page_title','this_tag'=>'var'],null,$this),$this)?>
</span></h1>
    <?php $c_2e40b4=null;$_3c60e0_old_params['_2e40b4']=$_3c60e0_local_params;$_3c60e0_old_vars['_2e40b4']=$_3c60e0_local_vars;$a_2e40b4=$this->setup_args(['name'=>'alert_close','this_tag'=>'setvarblock'],null,$this);ob_start();?>

    <button type="button" class="close" data-dismiss="alert" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
      <span aria-hidden="true">&times;</span>
    </button>
    <?php $c_2e40b4=ob_get_clean();$c_2e40b4=$this->block_setvarblock($a_2e40b4,$c_2e40b4,$this,$r_2e40b4,1,'_2e40b4');echo($c_2e40b4); $_3c60e0_local_params=$_3c60e0_old_params['_2e40b4'];?>


    <div class="alert alert-success hidden" id="header-alert" role="alert" tabindex="0">
      <button onclick="$('#header-alert').hide();" type="button" id="header-alert-close" class="close" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
        <span aria-hidden="true">&times;</span>
      </button>
      <span id="header-alert-message"></span>
    </div>

    <?php $_3c60e0_old_params['_da8e16']=$_3c60e0_local_params;$_3c60e0_old_vars['_da8e16']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'header_alert_message','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <div id="header-alert-message" class="alert alert-success" tabindex="0">
      <?php echo $this->function_var($this->setup_args(['name'=>'alert_close','this_tag'=>'var'],null,$this),$this)?>

      <?php echo $this->function_var($this->setup_args(['name'=>'header_alert_message','this_tag'=>'var'],null,$this),$this)?>

    </div>
    <script>
    $('#header-alert-message').focus();
    </script>
    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_da8e16'];$_3c60e0_local_vars=$_3c60e0_old_vars['_da8e16'];?>


    <?php $_3c60e0_old_params['_cb28fe']=$_3c60e0_local_params;$_3c60e0_old_vars['_cb28fe']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <div id="header-error-message" class="alert alert-danger" role="alert" tabindex="0">
      <?php echo paml_modifier_funcs('nl2br', paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'error','escape'=>'1','nl2br'=>'1','this_tag'=>'var'],null,$this),$this),ENT_QUOTES))?>

      </div>
    <script>
    $('#header-error-message').focus();
    </script>
    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_cb28fe'];$_3c60e0_local_vars=$_3c60e0_old_vars['_cb28fe'];?>


        </main>
      </div>
    </div>
  </div>
  </body>
</html>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'popup','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

<!DOCTYPE html>
<html lang="<?php $_3c60e0_old_params['_f47a21']=$_3c60e0_local_params;$_3c60e0_old_vars['_f47a21']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_language','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_language','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
en<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f47a21'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f47a21'];?>
">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="author" content="Alfasado Inc.">
    <meta name="robots" content="noindex">
    <meta name="robots" content="nofollow">
    <link rel="icon" href="favicon.ico">
    <title><?php $_3c60e0_old_params['_18847f']=$_3c60e0_local_params;$_3c60e0_old_vars['_18847f']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'html_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'html_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php else:?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'page_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_18847f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_18847f'];?>
<?php $_3c60e0_old_params['_11ee5c']=$_3c60e0_local_params;$_3c60e0_old_vars['_11ee5c']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_6c883b']=$_3c60e0_local_params;$_3c60e0_old_vars['_6c883b']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_e9f37f']=$_3c60e0_local_params;$_3c60e0_old_vars['_e9f37f']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.rebuild_all','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 | <?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e9f37f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e9f37f'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_6c883b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_6c883b'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_11ee5c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_11ee5c'];?>
 | <?php echo $this->modifier_escape($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'appname','escape'=>'single','this_tag'=>'getoption'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
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
assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery.cookie.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery-ui.min.js"></script>
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/theme.min.css?v=<?php echo $this->function_var($this->setup_args(['name'=>'version','this_tag'=>'var'],null,$this),$this)?>
" rel="stylesheet">
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/jquery-ui.min.css" rel="stylesheet">
    <style type="text/css">
      .nav-top,.brand-prototype, .footer{ background-color: <?php echo $this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'barcolor','this_tag'=>'getoption'],null,$this),$this)?>
 !important; color: <?php echo $this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'bartextcolor','this_tag'=>'getoption'],null,$this),$this)?>
 !important; }
      <?php $_3c60e0_old_params['_1a73dd']=$_3c60e0_local_params;$_3c60e0_old_vars['_1a73dd']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_b3e76c']=$_3c60e0_local_params;$_3c60e0_old_vars['_b3e76c']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .brand-workspace, .workspace-bar{ background-color: <?php echo $this->function_var($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; }
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b3e76c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b3e76c'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_1a73dd'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1a73dd'];?>

      <?php $_3c60e0_old_params['_b86c83']=$_3c60e0_local_params;$_3c60e0_old_vars['_b86c83']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .form-control, .custom-select, .relation_nestable_list, .custom-control-indicator, .tox-tinymce, .mce-tinymce, .btn-outline-secondary, .btn-secondary, .pagination-sm li a{ border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important }
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b86c83'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b86c83'];?>

    </style>
    <?php echo $this->function_var($this->setup_args(['name'=>'html_head','this_tag'=>'var'],null,$this),$this)?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_css','setvar'=>'config_user_css','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_css','setvar',$this),$this,'setvar')?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_js','setvar'=>'config_user_js','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_js','setvar',$this),$this,'setvar')?>

    <?php $_3c60e0_old_params['_e8a583']=$_3c60e0_local_params;$_3c60e0_old_vars['_e8a583']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_css','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_css','this_tag'=>'var'],null,$this),$this)?>
"><?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e8a583'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e8a583'];?>

    <?php $_3c60e0_old_params['_11f433']=$_3c60e0_local_params;$_3c60e0_old_vars['_11f433']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_js','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_js','this_tag'=>'var'],null,$this),$this)?>
"></script><?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_11f433'];$_3c60e0_local_vars=$_3c60e0_old_vars['_11f433'];?>

  </head>
  <?php echo $this->function_setvar($this->setup_args(['name'=>'body_class','value'=>' popup','append'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <body class="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'body_class','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
  <div id="main-content">
    <nav class="bar navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse nav-top">
      <span class="navbar-brand brand-prototype"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'appname','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
    </nav>
      <?php $_3c60e0_old_params['_300f9e']=$_3c60e0_local_params;$_3c60e0_old_vars['_300f9e']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_845a2a']=$_3c60e0_local_params;$_3c60e0_old_vars['_845a2a']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.rebuild_all','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <nav class="bar navbar navbar-toggleable-md navbar-inverse bg-inverse workspace-bar" style="z-index:4">
      <span class="navbar-brand brand-workspace"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
    </nav>
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_845a2a'];$_3c60e0_local_vars=$_3c60e0_old_vars['_845a2a'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_300f9e'];$_3c60e0_local_vars=$_3c60e0_old_vars['_300f9e'];?>

    <div class="container-fluid">
      <div class="row">
        <main class="col-md-12 pt-3">
          <h1><span class="title"><?php $_3c60e0_old_params['_6f9679']=$_3c60e0_local_params;$_3c60e0_old_vars['_6f9679']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'icon_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<img src="<?php echo $this->function_var($this->setup_args(['name'=>'icon_url','this_tag'=>'var'],null,$this),$this)?>
" class="loading" alt=""> <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_6f9679'];$_3c60e0_local_vars=$_3c60e0_old_vars['_6f9679'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'page_title','this_tag'=>'var'],null,$this),$this)?>
</span></h1>
          <?php $_3c60e0_old_params['_f1daf8']=$_3c60e0_local_params;$_3c60e0_old_vars['_f1daf8']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <div class="alert alert-danger" id="header-error-message" tabindex="0" role="alert">
              <?php echo paml_modifier_funcs('nl2br', paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'error','escape'=>'1','nl2br'=>'1','this_tag'=>'var'],null,$this),$this),ENT_QUOTES))?>

            </div>
            <script>
            $('#header-error-message').focus();
            </script>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f1daf8'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f1daf8'];?>


        </main>
      </div>
    </div>
    <footer class="footer bar"></footer>
  </div>
  </body>
</html>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'dialog','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

<!DOCTYPE html>
<html lang="<?php $_3c60e0_old_params['_2e926b']=$_3c60e0_local_params;$_3c60e0_old_vars['_2e926b']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_language','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_language','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
en<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_2e926b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_2e926b'];?>
">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="author" content="Alfasado Inc.">
    <meta name="robots" content="noindex">
    <meta name="robots" content="nofollow">
    <link rel="icon" href="favicon.ico">
    <title><?php $_3c60e0_old_params['_b43cd1']=$_3c60e0_local_params;$_3c60e0_old_vars['_b43cd1']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'html_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'html_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php else:?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'page_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b43cd1'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b43cd1'];?>
 | <?php echo $this->modifier_escape($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'appname','escape'=>'single','this_tag'=>'getoption'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php $_3c60e0_old_params['_0fd0c0']=$_3c60e0_local_params;$_3c60e0_old_vars['_0fd0c0']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_868c8b']=$_3c60e0_local_params;$_3c60e0_old_vars['_868c8b']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 | <?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_868c8b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_868c8b'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_0fd0c0'];$_3c60e0_local_vars=$_3c60e0_old_vars['_0fd0c0'];?>
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
    <?php $_3c60e0_old_params['_e5dc33']=$_3c60e0_local_params;$_3c60e0_old_vars['_e5dc33']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_837a06']=$_3c60e0_local_params;$_3c60e0_old_vars['_837a06']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'list_screen','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_837a06'];$_3c60e0_local_vars=$_3c60e0_old_vars['_837a06'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e5dc33'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e5dc33'];?>

    <style type="text/css">
    <?php $_3c60e0_old_params['_f5d152']=$_3c60e0_local_params;$_3c60e0_old_vars['_f5d152']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'list_screen','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
.disp-option-button { position:absolute; top: 5px; right: 15px; }<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f5d152'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f5d152'];?>

    <?php $_3c60e0_old_params['_542527']=$_3c60e0_local_params;$_3c60e0_old_vars['_542527']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_stickey_buttons','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_a5adce']=$_3c60e0_local_params;$_3c60e0_old_vars['_a5adce']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_3c60e0_old_params['_5b9175']=$_3c60e0_local_params;$_3c60e0_old_vars['_5b9175']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickybgcolor','value'=>'$workspace_barcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_5b9175'];$_3c60e0_local_vars=$_3c60e0_old_vars['_5b9175'];?>

      <?php $_3c60e0_old_params['_e49fe9']=$_3c60e0_local_params;$_3c60e0_old_vars['_e49fe9']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickycolor','value'=>'$workspace_bartextcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e49fe9'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e49fe9'];?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a5adce'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a5adce'];?>

      <?php $_3c60e0_old_params['_a829e1']=$_3c60e0_local_params;$_3c60e0_old_vars['_a829e1']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickybgcolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'barcolor','setvar'=>'stickybgcolor','this_tag'=>'getoption'],null,$this),$this),$this->setup_args('stickybgcolor','setvar',$this),$this,'setvar')?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a829e1'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a829e1'];?>

      <?php $_3c60e0_old_params['_b2cb52']=$_3c60e0_local_params;$_3c60e0_old_vars['_b2cb52']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickycolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'bartextcolor','setvar'=>'stickycolor','this_tag'=>'getoption'],null,$this),$this),$this->setup_args('stickycolor','setvar',$this),$this,'setvar')?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b2cb52'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b2cb52'];?>

      @media ( min-height: 576px ) {
      .edit-action-bar { position: sticky; bottom: 0px; z-index: 1040; background: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickybgcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
;
          padding: 10px 0px; vertical-align: middle; line-height: 1; border-top: 1px solid #CCC; }
      .edit-action-bar button { border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      .edit-action-bar label { color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      }
    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_542527'];$_3c60e0_local_vars=$_3c60e0_old_vars['_542527'];?>

      .nav-top,.brand-prototype{ background-color: <?php echo $this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'barcolor','this_tag'=>'getoption'],null,$this),$this)?>
 !important; color: <?php echo $this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'bartextcolor','this_tag'=>'getoption'],null,$this),$this)?>
 !important; }
      <?php $_3c60e0_old_params['_d5426b']=$_3c60e0_local_params;$_3c60e0_old_vars['_d5426b']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .form-control, .custom-select, .relation_nestable_list, .custom-control-indicator, .tox-tinymce, .mce-tinymce, .btn-outline-secondary, .btn-secondary, .pagination-sm li a{ border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important }
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_d5426b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_d5426b'];?>

    </style>
    <?php echo $this->function_var($this->setup_args(['name'=>'html_head','this_tag'=>'var'],null,$this),$this)?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_css','setvar'=>'config_user_css','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_css','setvar',$this),$this,'setvar')?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_js','setvar'=>'config_user_js','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_js','setvar',$this),$this,'setvar')?>

    <?php $_3c60e0_old_params['_f6b41f']=$_3c60e0_local_params;$_3c60e0_old_vars['_f6b41f']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_css','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_css','this_tag'=>'var'],null,$this),$this)?>
"><?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f6b41f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f6b41f'];?>

    <?php $_3c60e0_old_params['_f2913f']=$_3c60e0_local_params;$_3c60e0_old_vars['_f2913f']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_js','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_js','this_tag'=>'var'],null,$this),$this)?>
"></script><?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f2913f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f2913f'];?>

  </head>
  <body class="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'body_class','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 dialog">
<?php $_3c60e0_old_params['_9b0783']=$_3c60e0_local_params;$_3c60e0_old_vars['_9b0783']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php $_3c60e0_old_params['_193ed5']=$_3c60e0_local_params;$_3c60e0_old_vars['_193ed5']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_loader','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div id="__loader-bg">
  <img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif" alt="" width="45" height="45">
</div>
<script>
window.addEventListener('load', function(){
    $('#__loader-bg').hide("fast");
});
</script>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_193ed5'];$_3c60e0_local_vars=$_3c60e0_old_vars['_193ed5'];?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_9b0783'];$_3c60e0_local_vars=$_3c60e0_old_vars['_9b0783'];?>

<?php $_3c60e0_old_params['_e5e15c']=$_3c60e0_local_params;$_3c60e0_old_vars['_e5e15c']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_ce59dc']=$_3c60e0_local_params;$_3c60e0_old_vars['_ce59dc']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.direct_edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_5f7fe3']=$_3c60e0_local_params;$_3c60e0_old_vars['_5f7fe3']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.saved','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div id="__loader-bg">
  <img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif" alt="" width="45" height="45">
</div>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_5f7fe3'];$_3c60e0_local_vars=$_3c60e0_old_vars['_5f7fe3'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ce59dc'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ce59dc'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e5e15c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e5e15c'];?>

    <div class="container-fluid full">
    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    
  <?php $_3c60e0_old_params['_c34df2']=$_3c60e0_local_params;$_3c60e0_old_vars['_c34df2']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'can_action','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'disp_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_3c60e0_old_params['_cc4241']=$_3c60e0_local_params;$_3c60e0_old_vars['_cc4241']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'child_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_3c60e0_old_params['_c2fce9']=$_3c60e0_local_params;$_3c60e0_old_vars['_c2fce9']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c2fce9'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c2fce9'];?>

    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_cc4241'];$_3c60e0_local_vars=$_3c60e0_old_vars['_cc4241'];?>

    <?php $_3c60e0_old_params['_970b99']=$_3c60e0_local_params;$_3c60e0_old_vars['_970b99']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_970b99'];$_3c60e0_local_vars=$_3c60e0_old_vars['_970b99'];?>

    <?php $_3c60e0_old_params['_49daad']=$_3c60e0_local_params;$_3c60e0_old_vars['_49daad']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'comment','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'attachmentfile','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'user','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php $_3c60e0_old_params['_42ccff']=$_3c60e0_local_params;$_3c60e0_old_vars['_42ccff']=$_3c60e0_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>

      <?php else:?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'disp_option','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_42ccff'];$_3c60e0_local_vars=$_3c60e0_old_vars['_42ccff'];?>

    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_49daad'];$_3c60e0_local_vars=$_3c60e0_old_vars['_49daad'];?>

    <?php $_3c60e0_old_params['_b80f51']=$_3c60e0_local_params;$_3c60e0_old_vars['_b80f51']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b80f51'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b80f51'];?>

    <?php $_3c60e0_old_params['_5f5900']=$_3c60e0_local_params;$_3c60e0_old_vars['_5f5900']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_3c60e0_old_params['_e8f659']=$_3c60e0_local_params;$_3c60e0_old_vars['_e8f659']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php ob_start();$_3c60e0_old_params['_2a7fcb']=$_3c60e0_local_params;$_3c60e0_old_vars['_2a7fcb']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
        <?php $_3c60e0_old_params['_dce79c']=$_3c60e0_local_params;$_3c60e0_old_vars['_dce79c']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_dce79c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_dce79c'];?>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10" id="edit_options_loop">
              <span id="_start_options"></span>
          <?php $_3c60e0_old_params['_b16204']=$_3c60e0_local_params;$_3c60e0_old_vars['_b16204']=$_3c60e0_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

            <?php $c_bf604b=null;$_3c60e0_old_params['_bf604b']=$_3c60e0_local_params;$_3c60e0_old_vars['_bf604b']=$_3c60e0_local_vars;$a_bf604b=$this->setup_args(['type'=>'edit','option'=>'1','this_tag'=>'objectcols'],null,$this);$_bf604b=-1;$r_bf604b=true;while($r_bf604b===true):$r_bf604b=($_bf604b!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_bf604b,$c_bf604b,$this,$r_bf604b,++$_bf604b,'_bf604b');ob_start();?>
<?php $c_bf604b = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_bf604b=false;}if($c_bf604b ):?>

              <?php $_3c60e0_old_params['_41186a']=$_3c60e0_local_params;$_3c60e0_old_vars['_41186a']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','ne'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_3c60e0_old_params['_a08a34']=$_3c60e0_local_params;$_3c60e0_old_vars['_a08a34']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'hidden','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_3c60e0_old_params['_e428e3']=$_3c60e0_local_params;$_3c60e0_old_vars['_e428e3']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'allow_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'accept_comment','setvar'=>'accept_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

                    <?php $_3c60e0_old_params['_db77fa']=$_3c60e0_local_params;$_3c60e0_old_vars['_db77fa']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <?php $_3c60e0_old_params['_7b92e5']=$_3c60e0_local_params;$_3c60e0_old_vars['_7b92e5']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_7b92e5'];$_3c60e0_local_vars=$_3c60e0_old_vars['_7b92e5'];?>

                    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_db77fa'];$_3c60e0_local_vars=$_3c60e0_old_vars['_db77fa'];?>

                  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e428e3'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e428e3'];?>

                <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a08a34'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a08a34'];?>

                <?php $_3c60e0_old_params['_1a67e2']=$_3c60e0_local_params;$_3c60e0_old_vars['_1a67e2']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_3c60e0_old_params['_c2d8af']=$_3c60e0_local_params;$_3c60e0_old_vars['_c2d8af']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c2d8af'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c2d8af'];?>

                  <?php $_3c60e0_old_params['_253e59']=$_3c60e0_local_params;$_3c60e0_old_vars['_253e59']=$_3c60e0_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_253e59'];$_3c60e0_local_vars=$_3c60e0_old_vars['_253e59'];?>

                  <label class="edit-options-child <?php $_3c60e0_old_params['_cb0a29']=$_3c60e0_local_params;$_3c60e0_old_vars['_cb0a29']=$_3c60e0_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_cb0a29'];$_3c60e0_local_vars=$_3c60e0_old_vars['_cb0a29'];?>
custom-control custom-checkbox" id="label-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                    <?php $_3c60e0_old_params['_29740d']=$_3c60e0_local_params;$_3c60e0_old_vars['_29740d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <input type="hidden" id="" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_29740d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_29740d'];?>

                    <input<?php $_3c60e0_old_params['_dcd235']=$_3c60e0_local_params;$_3c60e0_old_vars['_dcd235']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php else:?>
<?php $_3c60e0_old_params['_782ef6']=$_3c60e0_local_params;$_3c60e0_old_vars['_782ef6']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 onclick="return false;" checked <?php else:?>

                    <?php $_3c60e0_old_params['_de5f39']=$_3c60e0_local_params;$_3c60e0_old_vars['_de5f39']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_de5f39'];$_3c60e0_local_vars=$_3c60e0_old_vars['_de5f39'];?>

                    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_782ef6'];$_3c60e0_local_vars=$_3c60e0_old_vars['_782ef6'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_dcd235'];$_3c60e0_local_vars=$_3c60e0_old_vars['_dcd235'];?>
<?php $_3c60e0_old_params['_3f873c']=$_3c60e0_local_params;$_3c60e0_old_vars['_3f873c']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3f873c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3f873c'];?>
 type="<?php $_3c60e0_old_params['_c6ad14']=$_3c60e0_local_params;$_3c60e0_old_vars['_c6ad14']=$_3c60e0_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
checkbox<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c6ad14'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c6ad14'];?>
" class="custom-control-input disp_option disp_option-cb" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator<?php $_3c60e0_old_params['_23498e']=$_3c60e0_local_params;$_3c60e0_old_vars['_23498e']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_23498e'];$_3c60e0_local_vars=$_3c60e0_old_vars['_23498e'];?>
<?php $_3c60e0_old_params['_1b5205']=$_3c60e0_local_params;$_3c60e0_old_vars['_1b5205']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_1b5205'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1b5205'];?>
"></span>
                    <span class="custom-control-description"> 
                    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
                  </label>
                <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_1a67e2'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1a67e2'];?>

              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_41186a'];$_3c60e0_local_vars=$_3c60e0_old_vars['_41186a'];?>

            <?php endif;$c_bf604b=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_bf604b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_bf604b'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b16204'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b16204'];?>

                <?php $c_a9ad4d=null;$_3c60e0_old_params['_a9ad4d']=$_3c60e0_local_params;$_3c60e0_old_vars['_a9ad4d']=$_3c60e0_local_vars;$a_a9ad4d=$this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$model','id'=>'$object_id','this_tag'=>'fieldloop'],null,$this);$_a9ad4d=-1;$r_a9ad4d=true;while($r_a9ad4d===true):$r_a9ad4d=($_a9ad4d!==-1)?false:true;echo $this->component('PTTags')->hdlr_fieldloop($a_a9ad4d,$c_a9ad4d,$this,$r_a9ad4d,++$_a9ad4d,'_a9ad4d');ob_start();?>
<?php $c_a9ad4d = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_a9ad4d=false;}if($c_a9ad4d ):?>

                <?php $c_9b2ae5=null;$_3c60e0_old_params['_9b2ae5']=$_3c60e0_local_params;$_3c60e0_old_vars['_9b2ae5']=$_3c60e0_local_vars;$a_9b2ae5=$this->setup_args(['name'=>'_fieldbasename','this_tag'=>'setvarblock'],null,$this);ob_start();?>
field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_9b2ae5=ob_get_clean();$c_9b2ae5=$this->block_setvarblock($a_9b2ae5,$c_9b2ae5,$this,$r_9b2ae5,1,'_9b2ae5');echo($c_9b2ae5); $_3c60e0_local_params=$_3c60e0_old_params['_9b2ae5'];?>

                <label class="<?php $_3c60e0_old_params['_289e83']=$_3c60e0_local_params;$_3c60e0_old_vars['_289e83']=$_3c60e0_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_289e83'];$_3c60e0_local_vars=$_3c60e0_old_vars['_289e83'];?>
custom-control custom-checkbox" id="label-<?php echo $this->function_var($this->setup_args(['name'=>'_fieldbasename','this_tag'=>'var'],null,$this),$this)?>
">
                  <input<?php $_3c60e0_old_params['_0585b8']=$_3c60e0_local_params;$_3c60e0_old_vars['_0585b8']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_0585b8'];$_3c60e0_local_vars=$_3c60e0_old_vars['_0585b8'];?>

                  <?php $_3c60e0_old_params['_96dcdc']=$_3c60e0_local_params;$_3c60e0_old_vars['_96dcdc']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_96dcdc'];$_3c60e0_local_vars=$_3c60e0_old_vars['_96dcdc'];?>

                  <?php $_3c60e0_old_params['_7b1e52']=$_3c60e0_local_params;$_3c60e0_old_vars['_7b1e52']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_7b1e52'];$_3c60e0_local_vars=$_3c60e0_old_vars['_7b1e52'];?>
 <?php $_3c60e0_old_params['_f73a47']=$_3c60e0_local_params;$_3c60e0_old_vars['_f73a47']=$_3c60e0_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f73a47'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f73a47'];?>
 type="checkbox" class="custom-control-input disp_option disp_option-cb" id="field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_3c60e0_old_params['_f34ac1']=$_3c60e0_local_params;$_3c60e0_old_vars['_f34ac1']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f34ac1'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f34ac1'];?>
"></span>
                  <span class="custom-control-description"> 
                  <?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'field__name','trans'=>'1','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans'),ENT_QUOTES)?>
</span>
                </label>
                <?php endif;$c_a9ad4d=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_a9ad4d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a9ad4d'];?>

              <?php $_3c60e0_old_params['_4f9a57']=$_3c60e0_local_params;$_3c60e0_old_vars['_4f9a57']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div>
                  <p class="text-muted hint-block">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can change the display order of fields with drag &amp; drop.','this_tag'=>'trans'],null,$this),$this)?>

                  </p>
                </div>
              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_4f9a57'];$_3c60e0_local_vars=$_3c60e0_old_vars['_4f9a57'];?>

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
<?php endif;$_2a7fcb=ob_get_clean();echo $this->modifier_trim_space($_2a7fcb,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_3c60e0_local_params=$_3c60e0_old_params['_2a7fcb'];$_3c60e0_local_vars=$_3c60e0_old_vars['_2a7fcb'];?>

<script>
<?php $_3c60e0_old_params['_a91641']=$_3c60e0_local_params;$_3c60e0_old_vars['_a91641']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#edit_options_loop').sortable({
    stop: function( evt, ui ) {
        sort_fields();
    }
});
$("#edit_options_loop").ksortable();
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a91641'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a91641'];?>

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

<?php $_3c60e0_old_params['_f3f80c']=$_3c60e0_local_params;$_3c60e0_old_vars['_f3f80c']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f3f80c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f3f80c'];?>

    }
    updateFieldSelector();
});
</script>
        <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e8f659'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e8f659'];?>

    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_5f5900'];$_3c60e0_local_vars=$_3c60e0_old_vars['_5f5900'];?>

    <?php $_3c60e0_old_params['_138ac4']=$_3c60e0_local_params;$_3c60e0_old_vars['_138ac4']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php $_3c60e0_old_params['_fa73df']=$_3c60e0_local_params;$_3c60e0_old_vars['_fa73df']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php $_3c60e0_old_params['_c2d07f']=$_3c60e0_local_params;$_3c60e0_old_vars['_c2d07f']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="single_select" value="1"><?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c2d07f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c2d07f'];?>

            <?php $_3c60e0_old_params['_27d3f8']=$_3c60e0_local_params;$_3c60e0_old_vars['_27d3f8']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._from_scope','ne'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_from_scope" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_27d3f8'];$_3c60e0_local_vars=$_3c60e0_old_vars['_27d3f8'];?>

          <?php $_3c60e0_old_params['_8db0ec']=$_3c60e0_local_params;$_3c60e0_old_vars['_8db0ec']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_8db0ec'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8db0ec'];?>

          <?php $_3c60e0_old_params['_7f73e7']=$_3c60e0_local_params;$_3c60e0_old_vars['_7f73e7']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="manage_revision" value="1">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_7f73e7'];$_3c60e0_local_vars=$_3c60e0_old_vars['_7f73e7'];?>

          <?php $_3c60e0_old_params['_55eb37']=$_3c60e0_local_params;$_3c60e0_old_vars['_55eb37']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="dialog_view" value="1">
            <?php $_3c60e0_old_params['_c16979']=$_3c60e0_local_params;$_3c60e0_old_vars['_c16979']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c16979'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c16979'];?>

          <?php $_3c60e0_old_params['_7bc5c4']=$_3c60e0_local_params;$_3c60e0_old_vars['_7bc5c4']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_7bc5c4'];$_3c60e0_local_vars=$_3c60e0_old_vars['_7bc5c4'];?>

            <?php $_3c60e0_old_params['_b7e8fb']=$_3c60e0_local_params;$_3c60e0_old_vars['_b7e8fb']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
              <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b7e8fb'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b7e8fb'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_55eb37'];$_3c60e0_local_vars=$_3c60e0_old_vars['_55eb37'];?>

          <?php $_3c60e0_old_params['_afdecb']=$_3c60e0_local_params;$_3c60e0_old_vars['_afdecb']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_select" value="1">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_afdecb'];$_3c60e0_local_vars=$_3c60e0_old_vars['_afdecb'];?>

          <?php $_3c60e0_old_params['_33b1df']=$_3c60e0_local_params;$_3c60e0_old_vars['_33b1df']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="selected_ids" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="from_obj" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.from_obj','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php $_3c60e0_old_params['_b71bd0']=$_3c60e0_local_params;$_3c60e0_old_vars['_b71bd0']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="select_add" value="1">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b71bd0'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b71bd0'];?>

          <?php $_3c60e0_old_params['_a96494']=$_3c60e0_local_params;$_3c60e0_old_vars['_a96494']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ids_only','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ids_only" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ids_only','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a96494'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a96494'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_33b1df'];$_3c60e0_local_vars=$_3c60e0_old_vars['_33b1df'];?>

            <div class="modal-body">
              <div class="container-fluid">
                <?php $_3c60e0_old_params['_64c057']=$_3c60e0_local_params;$_3c60e0_old_vars['_64c057']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <?php $c_25ec83=null;$_3c60e0_old_params['_25ec83']=$_3c60e0_local_params;$_3c60e0_old_vars['_25ec83']=$_3c60e0_local_vars;$a_25ec83=$this->setup_args(['name'=>'system_filters','this_tag'=>'loop'],null,$this);$_25ec83=-1;$r_25ec83=true;while($r_25ec83===true):$r_25ec83=($_25ec83!==-1)?false:true;echo $this->block_loop($a_25ec83,$c_25ec83,$this,$r_25ec83,++$_25ec83,'_25ec83');ob_start();?>
<?php $c_25ec83 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_25ec83=false;}if($c_25ec83 ):?>

                      <?php $_3c60e0_old_params['_8f19ed']=$_3c60e0_local_params;$_3c60e0_old_vars['_8f19ed']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select_system_filters" id="select_system_filters">
                        <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_8f19ed'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8f19ed'];?>

                        <option <?php $_3c60e0_old_params['_8baaef']=$_3c60e0_local_params;$_3c60e0_old_vars['_8baaef']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'input','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
data-input="1" data-hint="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'hint','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_8baaef'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8baaef'];?>
data-option="<?php echo $this->function_var($this->setup_args(['name'=>'option','this_tag'=>'var'],null,$this),$this)?>
" <?php $_3c60e0_old_params['_3ac97d']=$_3c60e0_local_params;$_3c60e0_old_vars['_3ac97d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_system_filter','eq'=>'$name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3ac97d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3ac97d'];?>
 value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php $_3c60e0_old_params['_f420e3']=$_3c60e0_local_params;$_3c60e0_old_vars['_f420e3']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        </select>
                      <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="system_filter-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f420e3'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f420e3'];?>

                    <?php endif;$c_25ec83=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_25ec83'];$_3c60e0_local_vars=$_3c60e0_old_vars['_25ec83'];?>

                  </div>
                </div>
                <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_64c057'];$_3c60e0_local_vars=$_3c60e0_old_vars['_64c057'];?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Your Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select-user_filters" id="select-user_filters">
                      <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php $c_0a72aa=null;$_3c60e0_old_params['_0a72aa']=$_3c60e0_local_params;$_3c60e0_old_vars['_0a72aa']=$_3c60e0_local_vars;$a_0a72aa=$this->setup_args(['model'=>'option','kind'=>'list_filter','key'=>'$model','user_id'=>'$user_id','workspace_id'=>'$workspace_id','this_tag'=>'objectloop'],null,$this);$_0a72aa=-1;$r_0a72aa=true;while($r_0a72aa===true):$r_0a72aa=($_0a72aa!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_0a72aa,$c_0a72aa,$this,$r_0a72aa,++$_0a72aa,'_0a72aa');ob_start();?>
<?php $c_0a72aa = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_0a72aa=false;}if($c_0a72aa ):?>

                      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_3c60e0_old_params['_3eb0f4']=$_3c60e0_local_params;$_3c60e0_old_vars['_3eb0f4']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_filter_id','eq'=>'$id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3eb0f4'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3eb0f4'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'value','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php endif;$c_0a72aa=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_0a72aa'];$_3c60e0_local_vars=$_3c60e0_old_vars['_0a72aa'];?>

                      <option value="add_new_filter"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Add New Filter','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    </select>
                    <?php $_3c60e0_old_params['_f80ced']=$_3c60e0_local_params;$_3c60e0_old_vars['_f80ced']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="filter-select-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <button type="button" class="delete-filter-elem hidden delete-bun-sm btn btn-secondary btn-sm filter-selecter-ctrl" id="filter-select-delete-button" class="close" data-dismiss="modal">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Delete','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    </button>
                    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f80ced'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f80ced'];?>

                  </div>
                </div>
                <div class="row form-group new-filter-elem hidden">
                  <div class="col-md-3" style="float:left;"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" name="filters-selector" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" id="filters-selector">
                    <?php $c_43d33f=null;$_3c60e0_old_params['_43d33f']=$_3c60e0_local_params;$_3c60e0_old_vars['_43d33f']=$_3c60e0_local_vars;$a_43d33f=$this->setup_args(['name'=>'filter_options','this_tag'=>'loop'],null,$this);$_43d33f=-1;$r_43d33f=true;while($r_43d33f===true):$r_43d33f=($_43d33f!==-1)?false:true;echo $this->block_loop($a_43d33f,$c_43d33f,$this,$r_43d33f,++$_43d33f,'_43d33f');ob_start();?>
<?php $c_43d33f = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_43d33f=false;}if($c_43d33f ):?>

                    <?php $_3c60e0_old_params['_4ad73c']=$_3c60e0_local_params;$_3c60e0_old_vars['_4ad73c']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <option><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_4ad73c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_4ad73c'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" class="coltype_<?php $_3c60e0_old_params['_27d46d']=$_3c60e0_local_params;$_3c60e0_old_vars['_27d46d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'created_by','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
reference<?php else:?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_27d46d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_27d46d'];?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php endif;$c_43d33f=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_43d33f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_43d33f'];?>

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

                              <input type="datetime-local" step="<?php $_3c60e0_old_params['_2d2b4d']=$_3c60e0_local_params;$_3c60e0_old_vars['_2d2b4d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'time_step','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'time_step','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
1<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_2d2b4d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_2d2b4d'];?>
" class="form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="" value="<?php $_3c60e0_old_params['_491310']=$_3c60e0_local_params;$_3c60e0_old_vars['_491310']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'published_on_default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_format_ts($this->function_date($this->setup_args(['format'=>'$published_on_default','format_ts'=>'Y-m-d\\TH:i:s','this_tag'=>'date'],null,$this),$this),$this->setup_args('Y-m-d\\\\TH:i:s','format_ts',$this),$this,'format_ts')?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_491310'];$_3c60e0_local_vars=$_3c60e0_old_vars['_491310'];?>
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

                            <?php $_3c60e0_old_params['_f3323b']=$_3c60e0_local_params;$_3c60e0_old_vars['_f3323b']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'status_options','split'=>',','setvar'=>'status_label','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                            <?php else:?>

                              <?php $_3c60e0_old_params['_dfa6db']=$_3c60e0_local_params;$_3c60e0_old_vars['_dfa6db']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Draft,Review,Approval Pending,Reserved,Publish,Ended','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php else:?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Disable,Enable','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_dfa6db'];$_3c60e0_local_vars=$_3c60e0_old_vars['_dfa6db'];?>

                            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f3323b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f3323b'];?>

                            <select class="form-control form-control-sm custom-select short filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <?php $_3c60e0_old_params['_316933']=$_3c60e0_local_params;$_3c60e0_old_vars['_316933']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                            <?php $c_1faa7e=null;$_3c60e0_old_params['_1faa7e']=$_3c60e0_local_params;$_3c60e0_old_vars['_1faa7e']=$_3c60e0_local_vars;$a_1faa7e=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_1faa7e=-1;$r_1faa7e=true;while($r_1faa7e===true):$r_1faa7e=($_1faa7e!==-1)?false:true;echo $this->block_loop($a_1faa7e,$c_1faa7e,$this,$r_1faa7e,++$_1faa7e,'_1faa7e');ob_start();?>
<?php $c_1faa7e = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_1faa7e=false;}if($c_1faa7e ):?>

                              <?php $_3c60e0_old_params['_fc10a6']=$_3c60e0_local_params;$_3c60e0_old_vars['_fc10a6']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__index__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php $_3c60e0_old_params['_69df65']=$_3c60e0_local_params;$_3c60e0_old_vars['_69df65']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__index__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_69df65'];$_3c60e0_local_vars=$_3c60e0_old_vars['_69df65'];?>

                              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_fc10a6'];$_3c60e0_local_vars=$_3c60e0_old_vars['_fc10a6'];?>

                            <?php endif;$c_1faa7e=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_1faa7e'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1faa7e'];?>

                            <?php else:?>

                            <?php $c_18facd=null;$_3c60e0_old_params['_18facd']=$_3c60e0_local_params;$_3c60e0_old_vars['_18facd']=$_3c60e0_local_vars;$a_18facd=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_18facd=-1;$r_18facd=true;while($r_18facd===true):$r_18facd=($_18facd!==-1)?false:true;echo $this->block_loop($a_18facd,$c_18facd,$this,$r_18facd,++$_18facd,'_18facd');ob_start();?>
<?php $c_18facd = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_18facd=false;}if($c_18facd ):?>

                              <?php $_3c60e0_old_params['_be7714']=$_3c60e0_local_params;$_3c60e0_old_vars['_be7714']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_be7714'];$_3c60e0_local_vars=$_3c60e0_old_vars['_be7714'];?>

                            <?php endif;$c_18facd=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_18facd'];$_3c60e0_local_vars=$_3c60e0_old_vars['_18facd'];?>

                            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_316933'];$_3c60e0_local_vars=$_3c60e0_old_vars['_316933'];?>

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
            <?php $_3c60e0_old_params['_44366f']=$_3c60e0_local_params;$_3c60e0_old_vars['_44366f']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            loc += '&workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_44366f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_44366f'];?>

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
    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_fa73df'];$_3c60e0_local_vars=$_3c60e0_old_vars['_fa73df'];?>

    <?php $_3c60e0_old_params['_d61663']=$_3c60e0_local_params;$_3c60e0_old_vars['_d61663']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_3c60e0_old_params['_0c46db']=$_3c60e0_local_params;$_3c60e0_old_vars['_0c46db']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
              <?php $_3c60e0_old_params['_a57a7d']=$_3c60e0_local_params;$_3c60e0_old_vars['_a57a7d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a57a7d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a57a7d'];?>

                <div class="form-inline" style="margin: 10px 7px">
                  <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload Path','this_tag'=>'trans'],null,$this),$this)?>

                  <?php $_3c60e0_old_params['_a02239']=$_3c60e0_local_params;$_3c60e0_old_vars['_a02239']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model_out_path','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->modifier_add_slash(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model_out_path','escape'=>'','add_slash'=>'','setvar'=>'model_out_path','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('','add_slash',$this),$this,'add_slash'),$this->setup_args('model_out_path','setvar',$this),$this,'setvar')?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'extra_path','value'=>'$model_out_path','append'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a02239'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a02239'];?>

                  <input id="extra_path" type="text" style="width:200px;" class="form-control" name="extra_path" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'extra_path','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                  <?php echo $this->function_setvar($this->setup_args(['name'=>'upload_paths','value'=>'$extra_path','function'=>'unshift','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php echo $this->modifier_setvar($this->modifier_array_unique($this->function_var($this->setup_args(['name'=>'upload_paths','array_unique'=>'','setvar'=>'upload_paths','this_tag'=>'var'],null,$this),$this),$this->setup_args('','array_unique',$this),$this,'array_unique'),$this->setup_args('upload_paths','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_count($this->setup_args(['name'=>'$upload_paths','setvar'=>'path_cnt','this_tag'=>'count'],null,$this),$this),$this->setup_args('path_cnt','setvar',$this),$this,'setvar')?>

                <?php $_3c60e0_old_params['_5cfd24']=$_3c60e0_local_params;$_3c60e0_old_vars['_5cfd24']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'path_cnt','gt'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <div id="upload_paths-box">
                  <?php $c_a1d65a=null;$_3c60e0_old_params['_a1d65a']=$_3c60e0_local_params;$_3c60e0_old_vars['_a1d65a']=$_3c60e0_local_vars;$a_a1d65a=$this->setup_args(['name'=>'upload_paths','this_tag'=>'loop'],null,$this);$_a1d65a=-1;$r_a1d65a=true;while($r_a1d65a===true):$r_a1d65a=($_a1d65a!==-1)?false:true;echo $this->block_loop($a_a1d65a,$c_a1d65a,$this,$r_a1d65a,++$_a1d65a,'_a1d65a');ob_start();?>
<?php $c_a1d65a = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_a1d65a=false;}if($c_a1d65a ):?>

                    <?php $_3c60e0_old_params['_1b054f']=$_3c60e0_local_params;$_3c60e0_old_vars['_1b054f']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button class="btn ml-3 btn-secondary" id="toggle-upload_path"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <span class="hidden" id="upload_path-wrapper">
                    <select class="form-control custom-select short" name="upload_path" id="upload_path"><?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_1b054f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1b054f'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_3c60e0_old_params['_e2e7e8']=$_3c60e0_local_params;$_3c60e0_old_vars['_e2e7e8']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'extra_path','eq'=>'$__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e2e7e8'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e2e7e8'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php $_3c60e0_old_params['_10ab1a']=$_3c60e0_local_params;$_3c60e0_old_vars['_10ab1a']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</select>
                    <button class="btn ml-0 btn-secondary btn-sm" id="clear-upload_path">  <i class="fa fa-trash" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Clear','this_tag'=>'trans'],null,$this),$this)?>
</span></button>
                    </span>
                  </div>
                    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_10ab1a'];$_3c60e0_local_vars=$_3c60e0_old_vars['_10ab1a'];?>

                  <?php endif;$c_a1d65a=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_a1d65a'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a1d65a'];?>

                <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_5cfd24'];$_3c60e0_local_vars=$_3c60e0_old_vars['_5cfd24'];?>

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

<?php $_3c60e0_old_params['_65af35']=$_3c60e0_local_params;$_3c60e0_old_vars['_65af35']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&filter_params=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&filter_params=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&magic_token=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&magic_token=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&query=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&query=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_65af35'];$_3c60e0_local_vars=$_3c60e0_old_vars['_65af35'];?>

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
?<?php $_3c60e0_old_params['_25a07e']=$_3c60e0_local_params;$_3c60e0_old_vars['_25a07e']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_25a07e'];$_3c60e0_local_vars=$_3c60e0_old_vars['_25a07e'];?>
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
$('#drop-zone').css('border','3px dashed <?php $_3c60e0_old_params['_caff27']=$_3c60e0_local_params;$_3c60e0_old_vars['_caff27']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
#ccc<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_caff27'];$_3c60e0_local_vars=$_3c60e0_old_vars['_caff27'];?>
');
$('#drop-zone').css('margin','1px');
$('#drop-zone').css('padding','8px');
$(function () {
    'use strict';
    var url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=upload_multi&magic_token=<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&model=asset&name=file<?php $_3c60e0_old_params['_19bba6']=$_3c60e0_local_params;$_3c60e0_old_vars['_19bba6']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','eq'=>'filter_class_image','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&select_system_filters=filter_class_image<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_19bba6'];$_3c60e0_local_vars=$_3c60e0_old_vars['_19bba6'];?>
';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        dropZone: $("#drop-zone"),
        // formData: {extra_path: $('#extra_path').val()},
        add: function (e, data) {
            data.formData = {extra_path: $('#extra_path').val()<?php $_3c60e0_old_params['_9d3a94']=$_3c60e0_local_params;$_3c60e0_old_vars['_9d3a94']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
, overwrite: $('#asset_overwrite').val()<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_9d3a94'];$_3c60e0_local_vars=$_3c60e0_old_vars['_9d3a94'];?>
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
    <?php $_3c60e0_old_params['_df8040']=$_3c60e0_local_params;$_3c60e0_old_vars['_df8040']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    $("#__mode").prop('value', 'insert_asset');
    $("#list-select-form").submit();
    <?php else:?>

    submit_params_to_post( this_url );
    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_df8040'];$_3c60e0_local_vars=$_3c60e0_old_vars['_df8040'];?>

}
</script>
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_0c46db'];$_3c60e0_local_vars=$_3c60e0_old_vars['_0c46db'];?>

    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_d61663'];$_3c60e0_local_vars=$_3c60e0_old_vars['_d61663'];?>

    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_138ac4'];$_3c60e0_local_vars=$_3c60e0_old_vars['_138ac4'];?>

  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c34df2'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c34df2'];?>

      <div class="row">
        <main class="pt-3 full <?php $_3c60e0_old_params['_ea3215']=$_3c60e0_local_params;$_3c60e0_old_vars['_ea3215']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'list_screen','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 col-md-12<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ea3215'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ea3215'];?>
">
        <?php $_3c60e0_old_params['_bad874']=$_3c60e0_local_params;$_3c60e0_old_vars['_bad874']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'list_screen','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<div class="col-md-12 full"><?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_bad874'];$_3c60e0_local_vars=$_3c60e0_old_vars['_bad874'];?>

          <h1 id="page-title" class="<?php $_3c60e0_old_params['_fe6e29']=$_3c60e0_local_params;$_3c60e0_old_vars['_fe6e29']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'full_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
page-title-full<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_fe6e29'];$_3c60e0_local_vars=$_3c60e0_old_vars['_fe6e29'];?>
<?php $_3c60e0_old_params['_8d47b5']=$_3c60e0_local_params;$_3c60e0_old_vars['_8d47b5']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 title-with-opt<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_8d47b5'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8d47b5'];?>
"><span class="title"><?php echo $this->function_var($this->setup_args(['name'=>'page_title','this_tag'=>'var'],null,$this),$this)?>
</span>
          <?php echo $this->function_var($this->setup_args(['name'=>'add_heading','this_tag'=>'var'],null,$this),$this)?>

    <?php $_3c60e0_old_params['_3d4637']=$_3c60e0_local_params;$_3c60e0_old_vars['_3d4637']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_2dc0da']=$_3c60e0_local_params;$_3c60e0_old_vars['_2dc0da']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      
      <?php echo $this->function_setvar($this->setup_args(['name'=>'_hide_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'select_role','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_2dc0da'];$_3c60e0_local_vars=$_3c60e0_old_vars['_2dc0da'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3d4637'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3d4637'];?>

    <?php $_3c60e0_old_params['_40e4f6']=$_3c60e0_local_params;$_3c60e0_old_vars['_40e4f6']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'select_role','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php $_3c60e0_old_params['_3b8eee']=$_3c60e0_local_params;$_3c60e0_old_vars['_3b8eee']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php $_3c60e0_old_params['_909ff0']=$_3c60e0_local_params;$_3c60e0_old_vars['_909ff0']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_3c60e0_old_params['_d6b706']=$_3c60e0_local_params;$_3c60e0_old_vars['_d6b706']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_param','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_3c60e0_old_params['_1ed510']=$_3c60e0_local_params;$_3c60e0_old_vars['_1ed510']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $c_c41417=null;$_3c60e0_old_params['_c41417']=$_3c60e0_local_params;$_3c60e0_old_vars['_c41417']=$_3c60e0_local_vars;$a_c41417=$this->setup_args(['name'=>'workspace_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_c41417=ob_get_clean();$c_c41417=$this->block_setvarblock($a_c41417,$c_c41417,$this,$r_c41417,1,'_c41417');echo($c_c41417); $_3c60e0_local_params=$_3c60e0_old_params['_c41417'];?>

        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_1ed510'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1ed510'];?>

          <?php $_3c60e0_old_params['_578184']=$_3c60e0_local_params;$_3c60e0_old_vars['_578184']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_3c60e0_old_params['_895a87']=$_3c60e0_local_params;$_3c60e0_old_vars['_895a87']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_3c60e0_old_params['_116155']=$_3c60e0_local_params;$_3c60e0_old_vars['_116155']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_3c60e0_old_params['_a4001f']=$_3c60e0_local_params;$_3c60e0_old_vars['_a4001f']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._start_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'_hide_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a4001f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a4001f'];?>

            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_116155'];$_3c60e0_local_vars=$_3c60e0_old_vars['_116155'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_895a87'];$_3c60e0_local_vars=$_3c60e0_old_vars['_895a87'];?>

          <?php $_3c60e0_old_params['_8ebcdd']=$_3c60e0_local_params;$_3c60e0_old_vars['_8ebcdd']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'error','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_3c60e0_old_params['_c5b7cf']=$_3c60e0_local_params;$_3c60e0_old_vars['_c5b7cf']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <button type="button" id="filter-button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#filterOptions">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Filters','this_tag'=>'trans'],null,$this),$this)?>

          </button>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c5b7cf'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c5b7cf'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_8ebcdd'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8ebcdd'];?>

          <?php $_3c60e0_old_params['_f8a45f']=$_3c60e0_local_params;$_3c60e0_old_vars['_f8a45f']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_create','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_cf9e15']=$_3c60e0_local_params;$_3c60e0_old_vars['_cf9e15']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_3c60e0_old_params['_78ba5e']=$_3c60e0_local_params;$_3c60e0_old_vars['_78ba5e']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','ne'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_78ba5e'];$_3c60e0_local_vars=$_3c60e0_old_vars['_78ba5e'];?>
&amp;dialog_view=1<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php $_3c60e0_old_params['_9d7f33']=$_3c60e0_local_params;$_3c60e0_old_vars['_9d7f33']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;target=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;get_col=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_3c60e0_old_params['_b4eaa4']=$_3c60e0_local_params;$_3c60e0_old_vars['_b4eaa4']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;single_select=1<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b4eaa4'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b4eaa4'];?>
<?php $_3c60e0_old_params['_a08e41']=$_3c60e0_local_params;$_3c60e0_old_vars['_a08e41']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.selected_ids','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;selected_ids=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a08e41'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a08e41'];?>
<?php $_3c60e0_old_params['_02e437']=$_3c60e0_local_params;$_3c60e0_old_vars['_02e437']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;select_add=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_add','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_02e437'];$_3c60e0_local_vars=$_3c60e0_old_vars['_02e437'];?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&amp;select_system_filters=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_system_filters_option=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_filter=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._filter','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;insert=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_9d7f33'];$_3c60e0_local_vars=$_3c60e0_old_vars['_9d7f33'];?>
<?php $_3c60e0_old_params['_f79f2d']=$_3c60e0_local_params;$_3c60e0_old_vars['_f79f2d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._system_filters_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_a633b7']=$_3c60e0_local_params;$_3c60e0_old_vars['_a633b7']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'tag','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;tag_obj=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a633b7'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a633b7'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f79f2d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f79f2d'];?>
<?php $_3c60e0_old_params['_3e781a']=$_3c60e0_local_params;$_3c60e0_old_vars['_3e781a']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;insert_editor=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert_editor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3e781a'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3e781a'];?>
">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_cf9e15'];$_3c60e0_local_vars=$_3c60e0_old_vars['_cf9e15'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f8a45f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f8a45f'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_578184'];$_3c60e0_local_vars=$_3c60e0_old_vars['_578184'];?>

        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_d6b706'];$_3c60e0_local_vars=$_3c60e0_old_vars['_d6b706'];?>

        <?php $_3c60e0_old_params['_252969']=$_3c60e0_local_params;$_3c60e0_old_vars['_252969']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_3c60e0_old_params['_dd4ae8']=$_3c60e0_local_params;$_3c60e0_old_vars['_dd4ae8']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_ea4b49=null;$_3c60e0_old_params['_ea4b49']=$_3c60e0_local_params;$_3c60e0_old_vars['_ea4b49']=$_3c60e0_local_vars;$a_ea4b49=$this->setup_args(['name'=>'filter_cond','this_tag'=>'setvarblock'],null,$this);ob_start();?>

&amp;select_system_filters=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

&amp;_system_filters_option=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

&amp;_filter=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

<?php $c_ea4b49=ob_get_clean();$c_ea4b49=$this->block_setvarblock($a_ea4b49,$c_ea4b49,$this,$r_ea4b49,1,'_ea4b49');echo($c_ea4b49); $_3c60e0_local_params=$_3c60e0_old_params['_ea4b49'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_dd4ae8'];$_3c60e0_local_vars=$_3c60e0_old_vars['_dd4ae8'];?>

          <a class="btn btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
&amp;dialog_view=1<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php $_3c60e0_old_params['_134369']=$_3c60e0_local_params;$_3c60e0_old_vars['_134369']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.rev_object_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;single_select=1&amp;revision_select=1&amp;rev_object_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.rev_object_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_134369'];$_3c60e0_local_vars=$_3c60e0_old_vars['_134369'];?>
<?php $_3c60e0_old_params['_ed1a14']=$_3c60e0_local_params;$_3c60e0_old_vars['_ed1a14']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;target=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;get_col=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_3c60e0_old_params['_1d985b']=$_3c60e0_local_params;$_3c60e0_old_vars['_1d985b']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;single_select=1<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_1d985b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1d985b'];?>
<?php $_3c60e0_old_params['_b16e38']=$_3c60e0_local_params;$_3c60e0_old_vars['_b16e38']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.selected_ids','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;selected_ids=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b16e38'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b16e38'];?>
<?php $_3c60e0_old_params['_f3a3ca']=$_3c60e0_local_params;$_3c60e0_old_vars['_f3a3ca']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;select_add=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_add','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f3a3ca'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f3a3ca'];?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&amp;select_system_filters=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_system_filters_option=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_filter=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._filter','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;insert=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ed1a14'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ed1a14'];?>
<?php $_3c60e0_old_params['_209a49']=$_3c60e0_local_params;$_3c60e0_old_vars['_209a49']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.any_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;any_model=1<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_209a49'];$_3c60e0_local_vars=$_3c60e0_old_vars['_209a49'];?>
<?php $_3c60e0_old_params['_3f2a21']=$_3c60e0_local_params;$_3c60e0_old_vars['_3f2a21']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;insert_editor=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert_editor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3f2a21'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3f2a21'];?>
&amp;_from_scope=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <i class="hidden fa fa-list" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Home','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_252969'];$_3c60e0_local_vars=$_3c60e0_old_vars['_252969'];?>

        <?php $_3c60e0_old_params['_4e2f3e']=$_3c60e0_local_params;$_3c60e0_old_vars['_4e2f3e']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_3c60e0_old_params['_ada543']=$_3c60e0_local_params;$_3c60e0_old_vars['_ada543']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_3c60e0_old_params['_6e8906']=$_3c60e0_local_params;$_3c60e0_old_vars['_6e8906']=$_3c60e0_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'create','model'=>'asset','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#startUpload">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload','this_tag'=>'trans'],null,$this),$this)?>

          </button>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_6e8906'];$_3c60e0_local_vars=$_3c60e0_old_vars['_6e8906'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ada543'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ada543'];?>

        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_4e2f3e'];$_3c60e0_local_vars=$_3c60e0_old_vars['_4e2f3e'];?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_909ff0'];$_3c60e0_local_vars=$_3c60e0_old_vars['_909ff0'];?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3b8eee'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3b8eee'];?>

    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_40e4f6'];$_3c60e0_local_vars=$_3c60e0_old_vars['_40e4f6'];?>

          </h1>
    <?php $_3c60e0_old_params['_22cd8e']=$_3c60e0_local_params;$_3c60e0_old_vars['_22cd8e']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_3c60e0_old_params['_b14d95']=$_3c60e0_local_params;$_3c60e0_old_vars['_b14d95']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_per_page','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_3c60e0_old_params['_91a78f']=$_3c60e0_local_params;$_3c60e0_old_vars['_91a78f']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php ob_start();$_3c60e0_old_params['_1dc682']=$_3c60e0_local_params;$_3c60e0_old_vars['_1dc682']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
      <?php $_3c60e0_old_params['_542fa4']=$_3c60e0_local_params;$_3c60e0_old_vars['_542fa4']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_542fa4'];$_3c60e0_local_vars=$_3c60e0_old_vars['_542fa4'];?>

      <?php $_3c60e0_old_params['_ea58f0']=$_3c60e0_local_params;$_3c60e0_old_vars['_ea58f0']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_select" value="1">
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ea58f0'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ea58f0'];?>

      <?php $_3c60e0_old_params['_b0f8de']=$_3c60e0_local_params;$_3c60e0_old_vars['_b0f8de']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="dialog_view" value="1">
        <?php $_3c60e0_old_params['_a7de14']=$_3c60e0_local_params;$_3c60e0_old_vars['_a7de14']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a7de14'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a7de14'];?>

          <?php $_3c60e0_old_params['_0138ea']=$_3c60e0_local_params;$_3c60e0_old_vars['_0138ea']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="single_select" value="1">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_0138ea'];$_3c60e0_local_vars=$_3c60e0_old_vars['_0138ea'];?>

        <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php $_3c60e0_old_params['_aa1fde']=$_3c60e0_local_params;$_3c60e0_old_vars['_aa1fde']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_aa1fde'];$_3c60e0_local_vars=$_3c60e0_old_vars['_aa1fde'];?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b0f8de'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b0f8de'];?>

        <input type="hidden" name="return_args" value="<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'selected_ids_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
">
        <div class="modal-body">
          <div class="container-fluid">
          <?php $_3c60e0_old_params['_2976d1']=$_3c60e0_local_params;$_3c60e0_old_vars['_2976d1']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_3c60e0_old_params['_17279b']=$_3c60e0_local_params;$_3c60e0_old_vars['_17279b']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <?php $c_02f1f6=null;$_3c60e0_old_params['_02f1f6']=$_3c60e0_local_params;$_3c60e0_old_vars['_02f1f6']=$_3c60e0_local_vars;$a_02f1f6=$this->setup_args(['name'=>'disp_options','this_tag'=>'loop'],null,$this);$_02f1f6=-1;$r_02f1f6=true;while($r_02f1f6===true):$r_02f1f6=($_02f1f6!==-1)?false:true;echo $this->block_loop($a_02f1f6,$c_02f1f6,$this,$r_02f1f6,++$_02f1f6,'_02f1f6');ob_start();?>
<?php $c_02f1f6 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_02f1f6=false;}if($c_02f1f6 ):?>

            <?php $_3c60e0_old_params['_19bf1b']=$_3c60e0_local_params;$_3c60e0_old_vars['_19bf1b']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_19bf1b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_19bf1b'];?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_3c60e0_old_params['_8c08d1']=$_3c60e0_local_params;$_3c60e0_old_vars['_8c08d1']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php $_3c60e0_old_params['_de0cbd']=$_3c60e0_local_params;$_3c60e0_old_vars['_de0cbd']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__key__','eq'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_de0cbd'];$_3c60e0_local_vars=$_3c60e0_old_vars['_de0cbd'];?>

                <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_8c08d1'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8c08d1'];?>

                <?php $_3c60e0_old_params['_2d11e4']=$_3c60e0_local_params;$_3c60e0_old_vars['_2d11e4']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__display','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[2]','setvar'=>'_type','this_tag'=>'var'],null,$this),$this),$this->setup_args('_type','setvar',$this),$this,'setvar')?>

                <label class="custom-control custom-checkbox 
                <?php $_3c60e0_old_params['_b57afe']=$_3c60e0_local_params;$_3c60e0_old_vars['_b57afe']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_89bf57']=$_3c60e0_local_params;$_3c60e0_old_vars['_89bf57']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_checked','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_89bf57'];$_3c60e0_local_vars=$_3c60e0_old_vars['_89bf57'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b57afe'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b57afe'];?>

                <?php $_3c60e0_old_params['_ff0828']=$_3c60e0_local_params;$_3c60e0_old_vars['_ff0828']=$_3c60e0_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_list_options','value'=>'$__key__','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ff0828'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ff0828'];?>
">
                  <?php $_3c60e0_old_params['_3a9031']=$_3c60e0_local_params;$_3c60e0_old_vars['_3a9031']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1"><?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3a9031'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3a9031'];?>

                  <input <?php $_3c60e0_old_params['_559bdf']=$_3c60e0_local_params;$_3c60e0_old_vars['_559bdf']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_559bdf'];$_3c60e0_local_vars=$_3c60e0_old_vars['_559bdf'];?>
 <?php $_3c60e0_old_params['_3508b4']=$_3c60e0_local_params;$_3c60e0_old_vars['_3508b4']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3508b4'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3508b4'];?>
<?php $_3c60e0_old_params['_fcc76f']=$_3c60e0_local_params;$_3c60e0_old_vars['_fcc76f']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_fcc76f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_fcc76f'];?>
<?php $_3c60e0_old_params['_cbf6d3']=$_3c60e0_local_params;$_3c60e0_old_vars['_cbf6d3']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_no_primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_cc8e6d']=$_3c60e0_local_params;$_3c60e0_old_vars['_cc8e6d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_cc8e6d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_cc8e6d'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_cbf6d3'];$_3c60e0_local_vars=$_3c60e0_old_vars['_cbf6d3'];?>
<?php $_3c60e0_old_params['_1bc273']=$_3c60e0_local_params;$_3c60e0_old_vars['_1bc273']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_1bc273'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1bc273'];?>
 type="checkbox" class="custom-control-input disp-option-item" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_3c60e0_old_params['_5cbadd']=$_3c60e0_local_params;$_3c60e0_old_vars['_5cbadd']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_5cbadd'];$_3c60e0_local_vars=$_3c60e0_old_vars['_5cbadd'];?>
"></span>
                  <span class="custom-control-description"> <?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                </label>
                <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_2d11e4'];$_3c60e0_local_vars=$_3c60e0_old_vars['_2d11e4'];?>

            <?php $_3c60e0_old_params['_67c74d']=$_3c60e0_local_params;$_3c60e0_old_vars['_67c74d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
            </div>
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_67c74d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_67c74d'];?>

            <?php endif;$c_02f1f6=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_02f1f6'];$_3c60e0_local_vars=$_3c60e0_old_vars['_02f1f6'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_17279b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_17279b'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_2976d1'];$_3c60e0_local_vars=$_3c60e0_old_vars['_2976d1'];?>

            <div class="row form-group">
              <div class="col-md-2"><label for="_per_page"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Paging','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <input id="_per_page" step="1" list="per_page_complete" type="number" min="1" max="5000" class="form-control form-control-sm very-short control-inline" name="_per_page" value="<?php echo $this->function_var($this->setup_args(['name'=>'_per_page','this_tag'=>'var'],null,$this),$this)?>
">
                <?php echo $this->function_trans($this->setup_args(['phrase'=>'Items per Page','this_tag'=>'trans'],null,$this),$this)?>

              </div>
            </div>
            <?php $_3c60e0_old_params['_001bac']=$_3c60e0_local_params;$_3c60e0_old_vars['_001bac']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'search_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <?php $c_be4284=null;$_3c60e0_old_params['_be4284']=$_3c60e0_local_params;$_3c60e0_old_vars['_be4284']=$_3c60e0_local_vars;$a_be4284=$this->setup_args(['name'=>'search_options','this_tag'=>'loop'],null,$this);$_be4284=-1;$r_be4284=true;while($r_be4284===true):$r_be4284=($_be4284!==-1)?false:true;echo $this->block_loop($a_be4284,$c_be4284,$this,$r_be4284,++$_be4284,'_be4284');ob_start();?>
<?php $c_be4284 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_be4284=false;}if($c_be4284 ):?>

                  <label class="custom-control custom-checkbox">
                    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                    <input<?php $_3c60e0_old_params['_a93f62']=$_3c60e0_local_params;$_3c60e0_old_vars['_a93f62']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a93f62'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a93f62'];?>
 type="checkbox" class="custom-control-input" name="_s_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"> <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[0]','setvar'=>'search_col','this_tag'=>'var'],null,$this),$this),$this->setup_args('search_col','setvar',$this),$this,'setvar')?>
<?php echo $this->function_trans($this->setup_args(['phrase'=>'$search_col','this_tag'=>'trans'],null,$this),$this)?>
</span>
                  </label>
                <?php endif;$c_be4284=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_be4284'];$_3c60e0_local_vars=$_3c60e0_old_vars['_be4284'];?>

              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search Type','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-5">
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_3c60e0_old_params['_1e9e05']=$_3c60e0_local_params;$_3c60e0_old_vars['_1e9e05']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_search_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_1e9e05'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1e9e05'];?>
<?php $_3c60e0_old_params['_2dbfcc']=$_3c60e0_local_params;$_3c60e0_old_vars['_2dbfcc']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_2dbfcc'];$_3c60e0_local_vars=$_3c60e0_old_vars['_2dbfcc'];?>
 name="_user_search_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Phrase','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_3c60e0_old_params['_565283']=$_3c60e0_local_params;$_3c60e0_old_vars['_565283']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_565283'];$_3c60e0_local_vars=$_3c60e0_old_vars['_565283'];?>
 name="_user_search_type" value="2">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'OR','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_3c60e0_old_params['_2ae96d']=$_3c60e0_local_params;$_3c60e0_old_vars['_2ae96d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_2ae96d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_2ae96d'];?>
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
                  <input type="checkbox" <?php $_3c60e0_old_params['_373124']=$_3c60e0_local_params;$_3c60e0_old_vars['_373124']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_user_keep_search','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_373124'];$_3c60e0_local_vars=$_3c60e0_old_vars['_373124'];?>
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
                  <input class="custom-control-input" type="radio" <?php $_3c60e0_old_params['_479cc5']=$_3c60e0_local_params;$_3c60e0_old_vars['_479cc5']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_replace_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_479cc5'];$_3c60e0_local_vars=$_3c60e0_old_vars['_479cc5'];?>
 name="_user_replace_type" value="0">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Insensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_3c60e0_old_params['_ad30cf']=$_3c60e0_local_params;$_3c60e0_old_vars['_ad30cf']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_replace_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ad30cf'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ad30cf'];?>
 name="_user_replace_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Sensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
            </div>
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_001bac'];$_3c60e0_local_vars=$_3c60e0_old_vars['_001bac'];?>

            <div class="row form-group">
              <?php $c_d00520=null;$_3c60e0_old_params['_d00520']=$_3c60e0_local_params;$_3c60e0_old_vars['_d00520']=$_3c60e0_local_vars;$a_d00520=$this->setup_args(['name'=>'sort_options','this_tag'=>'loop'],null,$this);$_d00520=-1;$r_d00520=true;while($r_d00520===true):$r_d00520=($_d00520!==-1)?false:true;echo $this->block_loop($a_d00520,$c_d00520,$this,$r_d00520,++$_d00520,'_d00520');ob_start();?>
<?php $c_d00520 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_d00520=false;}if($c_d00520 ):?>

              <?php $_3c60e0_old_params['_9ea54c']=$_3c60e0_local_params;$_3c60e0_old_vars['_9ea54c']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Sort','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-7">
              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_9ea54c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_9ea54c'];?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <label class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" <?php $_3c60e0_old_params['_4972ee']=$_3c60e0_local_params;$_3c60e0_old_vars['_4972ee']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_4972ee'];$_3c60e0_local_vars=$_3c60e0_old_vars['_4972ee'];?>
 name="_user_sort_by" value="<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                  </label>
              <?php $_3c60e0_old_params['_e916f6']=$_3c60e0_local_params;$_3c60e0_old_vars['_e916f6']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
              <div class="col-md-3">
                <select name="_user_sort_order" class="form-control custom-select">
                  <?php $c_71d6c6=null;$_3c60e0_old_params['_71d6c6']=$_3c60e0_local_params;$_3c60e0_old_vars['_71d6c6']=$_3c60e0_local_vars;$a_71d6c6=$this->setup_args(['name'=>'order_options','this_tag'=>'loop'],null,$this);$_71d6c6=-1;$r_71d6c6=true;while($r_71d6c6===true):$r_71d6c6=($_71d6c6!==-1)?false:true;echo $this->block_loop($a_71d6c6,$c_71d6c6,$this,$r_71d6c6,++$_71d6c6,'_71d6c6');ob_start();?>
<?php $c_71d6c6 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_71d6c6=false;}if($c_71d6c6 ):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"<?php $_3c60e0_old_params['_94ea51']=$_3c60e0_local_params;$_3c60e0_old_vars['_94ea51']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 selected<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_94ea51'];$_3c60e0_local_vars=$_3c60e0_old_vars['_94ea51'];?>
><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</option>
                  <?php endif;$c_71d6c6=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_71d6c6'];$_3c60e0_local_vars=$_3c60e0_old_vars['_71d6c6'];?>

                </select>
              </div>
              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e916f6'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e916f6'];?>

              <?php endif;$c_d00520=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_d00520'];$_3c60e0_local_vars=$_3c60e0_old_vars['_d00520'];?>

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

<?php $_3c60e0_old_params['_ce65b8']=$_3c60e0_local_params;$_3c60e0_old_vars['_ce65b8']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'dialog_max_cols','setvar'=>'_list_max_cols','this_tag'=>'property'],null,$this),$this),$this->setup_args('_list_max_cols','setvar',$this),$this,'setvar')?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ce65b8'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ce65b8'];?>

<?php $_3c60e0_old_params['_8eb346']=$_3c60e0_local_params;$_3c60e0_old_vars['_8eb346']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_list_max_cols','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
      <?php $_3c60e0_old_params['_fb0fae']=$_3c60e0_local_params;$_3c60e0_old_vars['_fb0fae']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the dialog.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php else:?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the display.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_fb0fae'];$_3c60e0_local_vars=$_3c60e0_old_vars['_fb0fae'];?>

    }
});
</script>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_8eb346'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8eb346'];?>

<?php endif;$_1dc682=ob_get_clean();echo $this->modifier_trim_space($_1dc682,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_3c60e0_local_params=$_3c60e0_old_params['_1dc682'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1dc682'];?>

        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_91a78f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_91a78f'];?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b14d95'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b14d95'];?>

    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_22cd8e'];$_3c60e0_local_vars=$_3c60e0_old_vars['_22cd8e'];?>

    <?php $c_330b66=null;$_3c60e0_old_params['_330b66']=$_3c60e0_local_params;$_3c60e0_old_vars['_330b66']=$_3c60e0_local_vars;$a_330b66=$this->setup_args(['name'=>'alert_close','this_tag'=>'setvarblock'],null,$this);ob_start();?>

      <button type="button" class="close" data-dismiss="alert" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
        <span aria-hidden="true">&times;</span>
      </button>
    <?php $c_330b66=ob_get_clean();$c_330b66=$this->block_setvarblock($a_330b66,$c_330b66,$this,$r_330b66,1,'_330b66');echo($c_330b66); $_3c60e0_local_params=$_3c60e0_old_params['_330b66'];?>

    <div class="alert alert-success hidden" id="header-alert" role="alert" tabindex="0">
      <button onclick="$('#header-alert').hide();" type="button" id="header-alert-close" class="close" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
        <span aria-hidden="true">&times;</span>
      </button>
      <span id="header-alert-message"></span>
    </div>
    <?php $_3c60e0_old_params['_e9696a']=$_3c60e0_local_params;$_3c60e0_old_vars['_e9696a']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_3c60e0_old_params['_74d713']=$_3c60e0_local_params;$_3c60e0_old_vars['_74d713']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <div class="alert alert-danger" id="header-error-message" tabindex="0" role="alert">
        <?php echo paml_modifier_funcs('nl2br', paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'error','escape'=>'1','nl2br'=>'1','this_tag'=>'var'],null,$this),$this),ENT_QUOTES))?>

      </div>
      <script>
      $('#header-error-message').focus();
      </script>
      <?php echo $this->function_setvar($this->setup_args(['name'=>'error','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_74d713'];$_3c60e0_local_vars=$_3c60e0_old_vars['_74d713'];?>

    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e9696a'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e9696a'];?>

<script>
$(function () {
    if (window.ontouchstart !== null) {
        $('[data-toggle="tooltip"]').tooltip();
    }
})
</script>
          <?php $_3c60e0_old_params['_0884d0']=$_3c60e0_local_params;$_3c60e0_old_vars['_0884d0']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_a57dea']=$_3c60e0_local_params;$_3c60e0_old_vars['_a57dea']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</div><?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a57dea'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a57dea'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_0884d0'];$_3c60e0_local_vars=$_3c60e0_old_vars['_0884d0'];?>

        </main>
      </div>
    </div>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<?php $_3c60e0_old_params['_51d842']=$_3c60e0_local_params;$_3c60e0_old_vars['_51d842']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_3c60e0_old_params['_336a36']=$_3c60e0_local_params;$_3c60e0_old_vars['_336a36']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_3c60e0_old_params['_ecce83']=$_3c60e0_local_params;$_3c60e0_old_vars['_ecce83']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_3c60e0_old_params['_52ba4f']=$_3c60e0_local_params;$_3c60e0_old_vars['_52ba4f']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_52ba4f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_52ba4f'];?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ecce83'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ecce83'];?>

<?php $_3c60e0_old_params['_7686dd']=$_3c60e0_local_params;$_3c60e0_old_vars['_7686dd']=$_3c60e0_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_3c60e0_old_params['_91e4eb']=$_3c60e0_local_params;$_3c60e0_old_vars['_91e4eb']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_91e4eb'];$_3c60e0_local_vars=$_3c60e0_old_vars['_91e4eb'];?>

<?php $_3c60e0_old_params['_b9bd6b']=$_3c60e0_local_params;$_3c60e0_old_vars['_b9bd6b']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b9bd6b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b9bd6b'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_7686dd'];$_3c60e0_local_vars=$_3c60e0_old_vars['_7686dd'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_3c60e0_old_params['_873362']=$_3c60e0_local_params;$_3c60e0_old_vars['_873362']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_873362'];$_3c60e0_local_vars=$_3c60e0_old_vars['_873362'];?>

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
?__mode=view&_type=list&_model=asset<?php $_3c60e0_old_params['_cf9823']=$_3c60e0_local_params;$_3c60e0_old_vars['_cf9823']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_cf9823'];$_3c60e0_local_vars=$_3c60e0_old_vars['_cf9823'];?>
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
?__mode=view&_type=list&_model=asset<?php $_3c60e0_old_params['_291f2c']=$_3c60e0_local_params;$_3c60e0_old_vars['_291f2c']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_291f2c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_291f2c'];?>
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
            <?php $_3c60e0_old_params['_f4f8e8']=$_3c60e0_local_params;$_3c60e0_old_vars['_f4f8e8']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            if(ed.id && ed.id == 'text'){
              var clipboard_image = $('#clipboard-image');
              var inline_image = $('#inline-image');
              var bg_image_url = clipboard_image.val();
              if ( inline_image.length ) {
                  bg_image_url = inline_image.attr('href');
              }
              if ( clipboard_image.length ) {
                <?php $_3c60e0_old_params['_c5f5ef']=$_3c60e0_local_params;$_3c60e0_old_vars['_c5f5ef']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c5f5ef'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c5f5ef'];?>

                <?php $_3c60e0_old_params['_e55af7']=$_3c60e0_local_params;$_3c60e0_old_vars['_e55af7']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e55af7'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e55af7'];?>

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
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f4f8e8'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f4f8e8'];?>

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
<?php $_3c60e0_old_params['_781618']=$_3c60e0_local_params;$_3c60e0_old_vars['_781618']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_3c60e0_old_params['_c78e8c']=$_3c60e0_local_params;$_3c60e0_old_vars['_c78e8c']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c78e8c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c78e8c'];?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_781618'];$_3c60e0_local_vars=$_3c60e0_old_vars['_781618'];?>

<?php $_3c60e0_old_params['_147809']=$_3c60e0_local_params;$_3c60e0_old_vars['_147809']=$_3c60e0_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_3c60e0_old_params['_fe2d9b']=$_3c60e0_local_params;$_3c60e0_old_vars['_fe2d9b']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_fe2d9b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_fe2d9b'];?>

<?php $_3c60e0_old_params['_16e7cf']=$_3c60e0_local_params;$_3c60e0_old_vars['_16e7cf']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_16e7cf'];$_3c60e0_local_vars=$_3c60e0_old_vars['_16e7cf'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_147809'];$_3c60e0_local_vars=$_3c60e0_old_vars['_147809'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_3c60e0_old_params['_8086e9']=$_3c60e0_local_params;$_3c60e0_old_vars['_8086e9']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_8086e9'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8086e9'];?>

        relative_urls : false,
        image_advtab: true,
        promotion: false,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code<?php $_3c60e0_old_params['_f4fcfb']=$_3c60e0_local_params;$_3c60e0_old_vars['_f4fcfb']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','lt'=>'6','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 print paste<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f4fcfb'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f4fcfb'];?>
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
                <?php $_3c60e0_old_params['_c6e2f1']=$_3c60e0_local_params;$_3c60e0_old_vars['_c6e2f1']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'gallery',
                <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c6e2f1'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c6e2f1'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_3c60e0_old_params['_aaf6dc']=$_3c60e0_local_params;$_3c60e0_old_vars['_aaf6dc']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_aaf6dc'];$_3c60e0_local_vars=$_3c60e0_old_vars['_aaf6dc'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.ui.registry.addButton('pt-file', {
                <?php $_3c60e0_old_params['_ae2768']=$_3c60e0_local_params;$_3c60e0_old_vars['_ae2768']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'browse',
                <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ae2768'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ae2768'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_3c60e0_old_params['_6ab0e2']=$_3c60e0_local_params;$_3c60e0_old_vars['_6ab0e2']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_6ab0e2'];$_3c60e0_local_vars=$_3c60e0_old_vars['_6ab0e2'];?>
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
            <?php $_3c60e0_old_params['_af39b5']=$_3c60e0_local_params;$_3c60e0_old_vars['_af39b5']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
                      <?php $_3c60e0_old_params['_92ba33']=$_3c60e0_local_params;$_3c60e0_old_vars['_92ba33']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_92ba33'];$_3c60e0_local_vars=$_3c60e0_old_vars['_92ba33'];?>

                      <?php $_3c60e0_old_params['_f22bc1']=$_3c60e0_local_params;$_3c60e0_old_vars['_f22bc1']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f22bc1'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f22bc1'];?>

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
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_af39b5'];$_3c60e0_local_vars=$_3c60e0_old_vars['_af39b5'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_336a36'];$_3c60e0_local_vars=$_3c60e0_old_vars['_336a36'];?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_51d842'];$_3c60e0_local_vars=$_3c60e0_old_vars['_51d842'];?>

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
<?php $_3c60e0_old_params['_33e7b5']=$_3c60e0_local_params;$_3c60e0_old_vars['_33e7b5']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>


<?php $_3c60e0_old_params['_61c2e5']=$_3c60e0_local_params;$_3c60e0_old_vars['_61c2e5']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_3c60e0_old_params['_965e73']=$_3c60e0_local_params;$_3c60e0_old_vars['_965e73']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_3c60e0_old_params['_60cb8d']=$_3c60e0_local_params;$_3c60e0_old_vars['_60cb8d']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_3c60e0_old_params['_b614f9']=$_3c60e0_local_params;$_3c60e0_old_vars['_b614f9']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b614f9'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b614f9'];?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_60cb8d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_60cb8d'];?>

<?php $_3c60e0_old_params['_541836']=$_3c60e0_local_params;$_3c60e0_old_vars['_541836']=$_3c60e0_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_3c60e0_old_params['_e2e1fc']=$_3c60e0_local_params;$_3c60e0_old_vars['_e2e1fc']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e2e1fc'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e2e1fc'];?>

<?php $_3c60e0_old_params['_614559']=$_3c60e0_local_params;$_3c60e0_old_vars['_614559']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_614559'];$_3c60e0_local_vars=$_3c60e0_old_vars['_614559'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_541836'];$_3c60e0_local_vars=$_3c60e0_old_vars['_541836'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_3c60e0_old_params['_c3bad1']=$_3c60e0_local_params;$_3c60e0_old_vars['_c3bad1']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c3bad1'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c3bad1'];?>

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
?__mode=view&_type=list&_model=asset<?php $_3c60e0_old_params['_e6dc43']=$_3c60e0_local_params;$_3c60e0_old_vars['_e6dc43']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e6dc43'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e6dc43'];?>
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
?__mode=view&_type=list&_model=asset<?php $_3c60e0_old_params['_0dd31d']=$_3c60e0_local_params;$_3c60e0_old_vars['_0dd31d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_0dd31d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_0dd31d'];?>
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
            <?php $_3c60e0_old_params['_f24e53']=$_3c60e0_local_params;$_3c60e0_old_vars['_f24e53']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            if(ed.id && ed.id == 'text'){
              var clipboard_image = $('#clipboard-image');
              var inline_image = $('#inline-image');
              var bg_image_url = clipboard_image.val();
              if ( inline_image.length ) {
                  bg_image_url = inline_image.attr('href');
              }
              if ( clipboard_image.length ) {
                <?php $_3c60e0_old_params['_b86639']=$_3c60e0_local_params;$_3c60e0_old_vars['_b86639']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b86639'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b86639'];?>

                <?php $_3c60e0_old_params['_11d20f']=$_3c60e0_local_params;$_3c60e0_old_vars['_11d20f']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_11d20f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_11d20f'];?>

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
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f24e53'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f24e53'];?>

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
<?php $_3c60e0_old_params['_9544bf']=$_3c60e0_local_params;$_3c60e0_old_vars['_9544bf']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_3c60e0_old_params['_88a661']=$_3c60e0_local_params;$_3c60e0_old_vars['_88a661']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_88a661'];$_3c60e0_local_vars=$_3c60e0_old_vars['_88a661'];?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_9544bf'];$_3c60e0_local_vars=$_3c60e0_old_vars['_9544bf'];?>

<?php $_3c60e0_old_params['_91d3f7']=$_3c60e0_local_params;$_3c60e0_old_vars['_91d3f7']=$_3c60e0_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_3c60e0_old_params['_fcdd90']=$_3c60e0_local_params;$_3c60e0_old_vars['_fcdd90']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_fcdd90'];$_3c60e0_local_vars=$_3c60e0_old_vars['_fcdd90'];?>

<?php $_3c60e0_old_params['_f15b58']=$_3c60e0_local_params;$_3c60e0_old_vars['_f15b58']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f15b58'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f15b58'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_91d3f7'];$_3c60e0_local_vars=$_3c60e0_old_vars['_91d3f7'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_3c60e0_old_params['_59c745']=$_3c60e0_local_params;$_3c60e0_old_vars['_59c745']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_59c745'];$_3c60e0_local_vars=$_3c60e0_old_vars['_59c745'];?>

        relative_urls : false,
        image_advtab: true,
        promotion: false,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code<?php $_3c60e0_old_params['_746d5f']=$_3c60e0_local_params;$_3c60e0_old_vars['_746d5f']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','lt'=>'6','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 print paste<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_746d5f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_746d5f'];?>
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
                <?php $_3c60e0_old_params['_eeead6']=$_3c60e0_local_params;$_3c60e0_old_vars['_eeead6']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'gallery',
                <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_eeead6'];$_3c60e0_local_vars=$_3c60e0_old_vars['_eeead6'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_3c60e0_old_params['_256aa4']=$_3c60e0_local_params;$_3c60e0_old_vars['_256aa4']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_256aa4'];$_3c60e0_local_vars=$_3c60e0_old_vars['_256aa4'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.ui.registry.addButton('pt-file', {
                <?php $_3c60e0_old_params['_7d23a5']=$_3c60e0_local_params;$_3c60e0_old_vars['_7d23a5']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'browse',
                <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_7d23a5'];$_3c60e0_local_vars=$_3c60e0_old_vars['_7d23a5'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_3c60e0_old_params['_90a3d8']=$_3c60e0_local_params;$_3c60e0_old_vars['_90a3d8']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_90a3d8'];$_3c60e0_local_vars=$_3c60e0_old_vars['_90a3d8'];?>
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
            <?php $_3c60e0_old_params['_233c53']=$_3c60e0_local_params;$_3c60e0_old_vars['_233c53']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
                      <?php $_3c60e0_old_params['_f91b4b']=$_3c60e0_local_params;$_3c60e0_old_vars['_f91b4b']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f91b4b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f91b4b'];?>

                      <?php $_3c60e0_old_params['_289791']=$_3c60e0_local_params;$_3c60e0_old_vars['_289791']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_289791'];$_3c60e0_local_vars=$_3c60e0_old_vars['_289791'];?>

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
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_233c53'];$_3c60e0_local_vars=$_3c60e0_old_vars['_233c53'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_965e73'];$_3c60e0_local_vars=$_3c60e0_old_vars['_965e73'];?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_61c2e5'];$_3c60e0_local_vars=$_3c60e0_old_vars['_61c2e5'];?>

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
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_33e7b5'];$_3c60e0_local_vars=$_3c60e0_old_vars['_33e7b5'];?>

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
<?php else:?>

<?php $_3c60e0_old_params['_7bb830']=$_3c60e0_local_params;$_3c60e0_old_vars['_7bb830']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'popup','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php else:?>

<?php $_3c60e0_old_params['_ea8a59']=$_3c60e0_local_params;$_3c60e0_old_vars['_ea8a59']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_f4975d']=$_3c60e0_local_params;$_3c60e0_old_vars['_f4975d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_fix_spacebar','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f4975d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f4975d'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ea8a59'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ea8a59'];?>

<!DOCTYPE html>
<html lang="<?php $_3c60e0_old_params['_b42b42']=$_3c60e0_local_params;$_3c60e0_old_vars['_b42b42']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_language','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_language','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
en<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b42b42'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b42b42'];?>
">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="author" content="Alfasado Inc.">
    <meta name="robots" content="noindex">
    <meta name="robots" content="nofollow">
    <link rel="icon" href="favicon.ico">
    <title><?php $_3c60e0_old_params['_4e6697']=$_3c60e0_local_params;$_3c60e0_old_vars['_4e6697']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'html_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'html_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php else:?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'page_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_4e6697'];$_3c60e0_local_vars=$_3c60e0_old_vars['_4e6697'];?>
<?php $_3c60e0_old_params['_2c95d0']=$_3c60e0_local_params;$_3c60e0_old_vars['_2c95d0']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_abbc0e']=$_3c60e0_local_params;$_3c60e0_old_vars['_abbc0e']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 | <?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_abbc0e'];$_3c60e0_local_vars=$_3c60e0_old_vars['_abbc0e'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_2c95d0'];$_3c60e0_local_vars=$_3c60e0_old_vars['_2c95d0'];?>
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
    <?php $_3c60e0_old_params['_759e03']=$_3c60e0_local_params;$_3c60e0_old_vars['_759e03']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_stickey_buttons','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_305752']=$_3c60e0_local_params;$_3c60e0_old_vars['_305752']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_3c60e0_old_params['_84d145']=$_3c60e0_local_params;$_3c60e0_old_vars['_84d145']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickybgcolor','value'=>'$workspace_barcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_84d145'];$_3c60e0_local_vars=$_3c60e0_old_vars['_84d145'];?>

      <?php $_3c60e0_old_params['_add591']=$_3c60e0_local_params;$_3c60e0_old_vars['_add591']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickycolor','value'=>'$workspace_bartextcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_add591'];$_3c60e0_local_vars=$_3c60e0_old_vars['_add591'];?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_305752'];$_3c60e0_local_vars=$_3c60e0_old_vars['_305752'];?>

      <?php $_3c60e0_old_params['_0bd360']=$_3c60e0_local_params;$_3c60e0_old_vars['_0bd360']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickybgcolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'barcolor','setvar'=>'stickybgcolor','this_tag'=>'var'],null,$this),$this),$this->setup_args('stickybgcolor','setvar',$this),$this,'setvar')?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_0bd360'];$_3c60e0_local_vars=$_3c60e0_old_vars['_0bd360'];?>

      <?php $_3c60e0_old_params['_371966']=$_3c60e0_local_params;$_3c60e0_old_vars['_371966']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickycolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'bartextcolor','setvar'=>'stickycolor','this_tag'=>'var'],null,$this),$this),$this->setup_args('stickycolor','setvar',$this),$this,'setvar')?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_371966'];$_3c60e0_local_vars=$_3c60e0_old_vars['_371966'];?>

      @media ( min-height: 576px ) {
      .edit-action-bar { position: sticky; bottom: 0px; z-index: 1020; background: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickybgcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
;
          padding: 10px 0px; vertical-align: middle; border-top: 1px solid #CCC; }
      .edit-action-bar button { border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      .edit-action-bar label { color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      }
    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_759e03'];$_3c60e0_local_vars=$_3c60e0_old_vars['_759e03'];?>

      .fixed-top { z-index: 1030 !important; }
      .nav-top,.navbar-brand,.dropdown-menu, .nav-top a, footer{ background-color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_barcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; }
      .nav-top .my-sm-0, .nav-top .navbar-toggler{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      <?php $_3c60e0_old_params['_8e7254']=$_3c60e0_local_params;$_3c60e0_old_vars['_8e7254']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php ob_start();$_3c60e0_old_params['_f11c1d']=$_3c60e0_local_params;$_3c60e0_old_vars['_f11c1d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .brand-workspace, .workspace-bar, .workspace-bar a,
      .workspace-bar .dropdown-menu{ background-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      .workspace-bar button.my-sm-0{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      .workspace-bar .my-sm-0, .workspace-bar .navbar-toggler{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      <?php endif;$_f11c1d=ob_get_clean();echo paml_htmlspecialchars($_f11c1d,ENT_QUOTES);$_3c60e0_local_params=$_3c60e0_old_params['_f11c1d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f11c1d'];?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_8e7254'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8e7254'];?>

      <?php $_3c60e0_old_params['_e0b879']=$_3c60e0_local_params;$_3c60e0_old_vars['_e0b879']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .form-control, .custom-select, .relation_nestable_list, .custom-control-indicator, .tox-tinymce, .mce-tinymce, .btn-outline-secondary, .btn-secondary, .pagination-sm li a{ border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important }
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e0b879'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e0b879'];?>

      <?php $_3c60e0_old_params['_1c9d83']=$_3c60e0_local_params;$_3c60e0_old_vars['_1c9d83']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'panel_width','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
.nav-link{ max-width: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'panel_width','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
px !important }<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_1c9d83'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1c9d83'];?>

      .navbar .btn { width:35px }
      <?php $_3c60e0_old_params['_4ee671']=$_3c60e0_local_params;$_3c60e0_old_vars['_4ee671']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'this_mode','eq'=>'config','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'this_mode','eq'=>'upgrade','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_4ee671'];$_3c60e0_local_vars=$_3c60e0_old_vars['_4ee671'];?>

      <?php $_3c60e0_old_params['_f08618']=$_3c60e0_local_params;$_3c60e0_old_vars['_f08618']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'in_editing','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      @media (min-width: 992px) {
      .col-lg-2{ max-width:13rem !important }
      .col-lg-10{ min-width: -webkit-calc(100% - 13rem); min-width: calc(100% - 13rem) } }
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f08618'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f08618'];?>

    </style>
    <?php echo $this->function_var($this->setup_args(['name'=>'html_head','this_tag'=>'var'],null,$this),$this)?>

    <?php $_3c60e0_old_params['_21a719']=$_3c60e0_local_params;$_3c60e0_old_vars['_21a719']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'invisible_selector','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <style><?php echo $this->modifier_join($this->function_var($this->setup_args(['name'=>'invisible_selector','join'=>',','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','join',$this),$this,'join')?>
{display:none !important}</style>
    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_21a719'];$_3c60e0_local_vars=$_3c60e0_old_vars['_21a719'];?>

    <?php $_3c60e0_old_params['_f8de99']=$_3c60e0_local_params;$_3c60e0_old_vars['_f8de99']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<style><?php $_3c60e0_old_params['_2329af']=$_3c60e0_local_params;$_3c60e0_old_vars['_2329af']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
body { padding-top: 80px; } .workspace-bar { margin-top: 0;}
    <?php else:?>
.workspace-bar { margin-bottom: 14px;}<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_2329af'];$_3c60e0_local_vars=$_3c60e0_old_vars['_2329af'];?>
</style><?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f8de99'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f8de99'];?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_css','setvar'=>'config_user_css','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_css','setvar',$this),$this,'setvar')?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_js','setvar'=>'config_user_js','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_js','setvar',$this),$this,'setvar')?>

    <?php $_3c60e0_old_params['_90999d']=$_3c60e0_local_params;$_3c60e0_old_vars['_90999d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_css','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_css','this_tag'=>'var'],null,$this),$this)?>
"><?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_90999d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_90999d'];?>

    <?php $_3c60e0_old_params['_1c1e93']=$_3c60e0_local_params;$_3c60e0_old_vars['_1c1e93']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_js','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_js','this_tag'=>'var'],null,$this),$this)?>
"></script><?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_1c1e93'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1c1e93'];?>

  </head>
  <body class="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'body_class','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<?php $_3c60e0_old_params['_f9f753']=$_3c60e0_local_params;$_3c60e0_old_vars['_f9f753']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php $_3c60e0_old_params['_aeb6d5']=$_3c60e0_local_params;$_3c60e0_old_vars['_aeb6d5']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_loader','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div id="__loader-bg">
  <img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif" alt="" width="45" height="45">
</div>
<script>
window.addEventListener('load', function(){
    $('#__loader-bg').hide("fast");
});
</script>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_aeb6d5'];$_3c60e0_local_vars=$_3c60e0_old_vars['_aeb6d5'];?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f9f753'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f9f753'];?>

  <div id="main-content">
<?php $_3c60e0_old_params['_5f58f1']=$_3c60e0_local_params;$_3c60e0_old_vars['_5f58f1']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="fixed-top">
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_5f58f1'];$_3c60e0_local_vars=$_3c60e0_old_vars['_5f58f1'];?>

  <?php $_3c60e0_old_params['_0c8d02']=$_3c60e0_local_params;$_3c60e0_old_vars['_0c8d02']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_0ff2b2']=$_3c60e0_local_params;$_3c60e0_old_vars['_0ff2b2']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.__mode','match'=>'/^(?:login|logout)$/iu','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'is_login','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_0ff2b2'];$_3c60e0_local_vars=$_3c60e0_old_vars['_0ff2b2'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_0c8d02'];$_3c60e0_local_vars=$_3c60e0_old_vars['_0c8d02'];?>

  <?php $_3c60e0_old_params['_899b48']=$_3c60e0_local_params;$_3c60e0_old_vars['_899b48']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'member_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'is_login','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_899b48'];$_3c60e0_local_vars=$_3c60e0_old_vars['_899b48'];?>

    <nav class="bar navbar navbar-toggleable-md navbar-inverse bg-inverse nav-top<?php $_3c60e0_old_params['_0d24fc']=$_3c60e0_local_params;$_3c60e0_old_vars['_0d24fc']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 fixed-top<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_0d24fc'];$_3c60e0_local_vars=$_3c60e0_old_vars['_0d24fc'];?>
">
      <?php $_3c60e0_old_params['_ad4ad0']=$_3c60e0_local_params;$_3c60e0_old_vars['_ad4ad0']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_3c60e0_old_params['_55e6ae']=$_3c60e0_local_params;$_3c60e0_old_vars['_55e6ae']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'install','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a class="navbar-brand brand-prototype" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
">PowerCMS X</a>
        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_55e6ae'];$_3c60e0_local_vars=$_3c60e0_old_vars['_55e6ae'];?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ad4ad0'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ad4ad0'];?>

      <?php $_3c60e0_old_params['_bef62f']=$_3c60e0_local_params;$_3c60e0_old_vars['_bef62f']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'is_login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <button style="background-color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_barcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; z-index:7" class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </button>
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_bef62f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_bef62f'];?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_param','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_3c60e0_old_params['_5b9fd0']=$_3c60e0_local_params;$_3c60e0_old_vars['_5b9fd0']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $c_d66615=null;$_3c60e0_old_params['_d66615']=$_3c60e0_local_params;$_3c60e0_old_vars['_d66615']=$_3c60e0_local_vars;$a_d66615=$this->setup_args(['name'=>'workspace_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_d66615=ob_get_clean();$c_d66615=$this->block_setvarblock($a_d66615,$c_d66615,$this,$r_d66615,1,'_d66615');echo($c_d66615); $_3c60e0_local_params=$_3c60e0_old_params['_d66615'];?>

        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_5b9fd0'];$_3c60e0_local_vars=$_3c60e0_old_vars['_5b9fd0'];?>

      <?php $_3c60e0_old_params['_516677']=$_3c60e0_local_params;$_3c60e0_old_vars['_516677']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <a class="navbar-brand"<?php $_3c60e0_old_params['_01b4a9']=$_3c60e0_local_params;$_3c60e0_old_vars['_01b4a9']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_01b4a9'];$_3c60e0_local_vars=$_3c60e0_old_vars['_01b4a9'];?>
 style="z-index:1"><?php echo $this->modifier_trim_to(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'appname','escape'=>'','trim_to'=>'20+...','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('20+...','trim_to',$this),$this,'trim_to')?>
<span id="navbar-brand-end"></span></a>
      <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_counter','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php $_3c60e0_old_params['_e17db0']=$_3c60e0_local_params;$_3c60e0_old_vars['_e17db0']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_1ddafe']=$_3c60e0_local_params;$_3c60e0_old_vars['_1ddafe']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'ws_selector_limit','setvar'=>'selector_limit','this_tag'=>'property'],null,$this),$this),$this->setup_args('selector_limit','setvar',$this),$this,'setvar')?>

        <?php $_3c60e0_old_params['_ec1b82']=$_3c60e0_local_params;$_3c60e0_old_vars['_ec1b82']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'selector_limit','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'selector_limit','value'=>'16','this_tag'=>'setvar'],null,$this),$this)?>

        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ec1b82'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ec1b82'];?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'selector_limit','op'=>'+','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_by','value'=>'last_update','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_order','value'=>'descend','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_3c60e0_old_params['_2d6fd3']=$_3c60e0_local_params;$_3c60e0_old_vars['_2d6fd3']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_space_order','eq'=>'Default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_by','value'=>'order','this_tag'=>'setvar'],null,$this),$this)?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_order','value'=>'ascend','this_tag'=>'setvar'],null,$this),$this)?>

        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_2d6fd3'];$_3c60e0_local_vars=$_3c60e0_old_vars['_2d6fd3'];?>

        <?php $c_47d5c7=null;$_3c60e0_old_params['_47d5c7']=$_3c60e0_local_params;$_3c60e0_old_vars['_47d5c7']=$_3c60e0_local_vars;$a_47d5c7=$this->setup_args(['cols'=>'id,name,barcolor,bartextcolor','model'=>'workspace','can_access'=>'1','limit'=>'$selector_limit','sort_by'=>'$ws_sort_by','direction'=>'$ws_sort_order','this_tag'=>'objectloop'],null,$this);$_47d5c7=-1;$r_47d5c7=true;while($r_47d5c7===true):$r_47d5c7=($_47d5c7!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_47d5c7,$c_47d5c7,$this,$r_47d5c7,++$_47d5c7,'_47d5c7');ob_start();?>
<?php $c_47d5c7 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_47d5c7=false;}if($c_47d5c7 ):?>

        <?php $_3c60e0_old_params['_626438']=$_3c60e0_local_params;$_3c60e0_old_vars['_626438']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <div class="hidden nav-item dropdown workspace-dd-wrapper active" id="workspace-selector" style="z-index:5">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpaces','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
            <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Select a WorkSpace','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cube workspace-dd" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpaces','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_626438'];$_3c60e0_local_vars=$_3c60e0_old_vars['_626438'];?>

            <?php $_3c60e0_old_params['_ab614d']=$_3c60e0_local_params;$_3c60e0_old_vars['_ab614d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','lt'=>'$selector_limit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <a<?php $_3c60e0_old_params['_3281d9']=$_3c60e0_local_params;$_3c60e0_old_vars['_3281d9']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_color_the_selector','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_9794f0']=$_3c60e0_local_params;$_3c60e0_old_vars['_9794f0']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_3906eb']=$_3c60e0_local_params;$_3c60e0_old_vars['_3906eb']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 style="<?php $_3c60e0_old_params['_208cd3']=$_3c60e0_local_params;$_3c60e0_old_vars['_208cd3']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__last__','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
margin-bottom:3px;<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_208cd3'];$_3c60e0_local_vars=$_3c60e0_old_vars['_208cd3'];?>
background-color:<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important;color:<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3906eb'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3906eb'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_9794f0'];$_3c60e0_local_vars=$_3c60e0_old_vars['_9794f0'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3281d9'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3281d9'];?>
 class="dropdown-item btn-sm <?php $_3c60e0_old_params['_53cace']=$_3c60e0_local_params;$_3c60e0_old_vars['_53cace']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'id','eq'=>'$workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_53cace'];$_3c60e0_local_vars=$_3c60e0_old_vars['_53cace'];?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?_selector=1&amp;<?php $_3c60e0_old_params['_16c4db']=$_3c60e0_local_params;$_3c60e0_old_vars['_16c4db']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request_method','eq'=>'GET','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_46c9d6']=$_3c60e0_local_params;$_3c60e0_old_vars['_46c9d6']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->modifier_replace($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'query_string','regex_replace'=>'\'/&offset=[0-9]*/\',\'\'','replace'=>'\'does_act=1\',\'\'','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&offset=[0-9]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('\\\'does_act=1\\\',\\\'\\\'','replace',$this),$this,'replace'),ENT_QUOTES)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_46c9d6'];$_3c60e0_local_vars=$_3c60e0_old_vars['_46c9d6'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_16c4db'];$_3c60e0_local_vars=$_3c60e0_old_vars['_16c4db'];?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
">
              <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

            </a>
            <?php else:?>

            <a class="dropdown-item btn-sm" data-toggle="modal" data-target="#modal"
                data-href="" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=workspace&amp;dialog_view=1&amp;workspace_select=1"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select...','this_tag'=>'trans'],null,$this),$this)?>
</a>
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ab614d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ab614d'];?>

        <?php $_3c60e0_old_params['_ccbb6a']=$_3c60e0_local_params;$_3c60e0_old_vars['_ccbb6a']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ccbb6a'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ccbb6a'];?>

        <?php endif;$c_47d5c7=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_47d5c7'];$_3c60e0_local_vars=$_3c60e0_old_vars['_47d5c7'];?>

      <div class="collapse navbar-collapse" id="navbars" <?php $_3c60e0_old_params['_4e0fb5']=$_3c60e0_local_params;$_3c60e0_old_vars['_4e0fb5']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_counter','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-left:-66px;z-index:0"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_4e0fb5'];$_3c60e0_local_vars=$_3c60e0_old_vars['_4e0fb5'];?>
>
        <ul class="nav-pills navbar-nav mr-auto" id="system-panel">
        <?php $c_73a3b9=null;$_3c60e0_old_params['_73a3b9']=$_3c60e0_local_params;$_3c60e0_old_vars['_73a3b9']=$_3c60e0_local_vars;$a_73a3b9=$this->setup_args(['menu_type'=>'6','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_73a3b9=-1;$r_73a3b9=true;while($r_73a3b9===true):$r_73a3b9=($_73a3b9!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_73a3b9,$c_73a3b9,$this,$r_73a3b9,++$_73a3b9,'_73a3b9');ob_start();?>
<?php $c_73a3b9 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_73a3b9=false;}if($c_73a3b9 ):?>

          <?php $_3c60e0_old_params['_513602']=$_3c60e0_local_params;$_3c60e0_old_vars['_513602']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-bookmark" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_513602'];$_3c60e0_local_vars=$_3c60e0_old_vars['_513602'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3c60e0_old_params['_c2b898']=$_3c60e0_local_params;$_3c60e0_old_vars['_c2b898']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c2b898'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c2b898'];?>

        <?php endif;$c_73a3b9=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_73a3b9'];$_3c60e0_local_vars=$_3c60e0_old_vars['_73a3b9'];?>

        <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'panel_limit','setvar'=>'panel_limit','this_tag'=>'property'],null,$this),$this),$this->setup_args('panel_limit','setvar',$this),$this,'setvar')?>

        <?php $c_322702=null;$_3c60e0_old_params['_322702']=$_3c60e0_local_params;$_3c60e0_old_vars['_322702']=$_3c60e0_local_vars;$a_322702=$this->setup_args(['limit'=>'$panel_limit','menu_type'=>'1','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_322702=-1;$r_322702=true;while($r_322702===true):$r_322702=($_322702!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_322702,$c_322702,$this,$r_322702,++$_322702,'_322702');ob_start();?>
<?php $c_322702 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_322702=false;}if($c_322702 ):?>

          <li class="nav-item <?php $_3c60e0_old_params['_e4eff2']=$_3c60e0_local_params;$_3c60e0_old_vars['_e4eff2']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'$model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e4eff2'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e4eff2'];?>
">
            <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'label','count_chars'=>'','setvar'=>'count_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('count_chars','setvar',$this),$this,'setvar')?>
<a class="nav-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php $_3c60e0_old_params['_f2909d']=$_3c60e0_local_params;$_3c60e0_old_vars['_f2909d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'count_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 data-toggle="tooltip" data-placement="right" title="<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f2909d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f2909d'];?>
><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          </li>
        <?php endif;$c_322702=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_322702'];$_3c60e0_local_vars=$_3c60e0_old_vars['_322702'];?>

        <?php $c_041bc1=null;$_3c60e0_old_params['_041bc1']=$_3c60e0_local_params;$_3c60e0_old_vars['_041bc1']=$_3c60e0_local_vars;$a_041bc1=$this->setup_args(['limit'=>'100000','offset'=>'$panel_limit','menu_type'=>'1','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_041bc1=-1;$r_041bc1=true;while($r_041bc1===true):$r_041bc1=($_041bc1!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_041bc1,$c_041bc1,$this,$r_041bc1,++$_041bc1,'_041bc1');ob_start();?>
<?php $c_041bc1 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_041bc1=false;}if($c_041bc1 ):?>

          <?php $_3c60e0_old_params['_5e3339']=$_3c60e0_local_params;$_3c60e0_old_vars['_5e3339']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-window-maximize" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_5e3339'];$_3c60e0_local_vars=$_3c60e0_old_vars['_5e3339'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3c60e0_old_params['_9422ab']=$_3c60e0_local_params;$_3c60e0_old_vars['_9422ab']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_9422ab'];$_3c60e0_local_vars=$_3c60e0_old_vars['_9422ab'];?>

        <?php endif;$c_041bc1=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_041bc1'];$_3c60e0_local_vars=$_3c60e0_old_vars['_041bc1'];?>

        <?php $c_496d60=null;$_3c60e0_old_params['_496d60']=$_3c60e0_local_params;$_3c60e0_old_vars['_496d60']=$_3c60e0_local_vars;$a_496d60=$this->setup_args(['menu_type'=>'2','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_496d60=-1;$r_496d60=true;while($r_496d60===true):$r_496d60=($_496d60!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_496d60,$c_496d60,$this,$r_496d60,++$_496d60,'_496d60');ob_start();?>
<?php $c_496d60 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_496d60=false;}if($c_496d60 ):?>

          <?php $_3c60e0_old_params['_49f468']=$_3c60e0_local_params;$_3c60e0_old_vars['_49f468']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cog" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_49f468'];$_3c60e0_local_vars=$_3c60e0_old_vars['_49f468'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3c60e0_old_params['_552981']=$_3c60e0_local_params;$_3c60e0_old_vars['_552981']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_552981'];$_3c60e0_local_vars=$_3c60e0_old_vars['_552981'];?>

        <?php endif;$c_496d60=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_496d60'];$_3c60e0_local_vars=$_3c60e0_old_vars['_496d60'];?>

        <?php $c_122f55=null;$_3c60e0_old_params['_122f55']=$_3c60e0_local_params;$_3c60e0_old_vars['_122f55']=$_3c60e0_local_vars;$a_122f55=$this->setup_args(['menu_type'=>'3','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_122f55=-1;$r_122f55=true;while($r_122f55===true):$r_122f55=($_122f55!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_122f55,$c_122f55,$this,$r_122f55,++$_122f55,'_122f55');ob_start();?>
<?php $c_122f55 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_122f55=false;}if($c_122f55 ):?>

          <?php $_3c60e0_old_params['_1017e6']=$_3c60e0_local_params;$_3c60e0_old_vars['_1017e6']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-database" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_1017e6'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1017e6'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3c60e0_old_params['_2cd85c']=$_3c60e0_local_params;$_3c60e0_old_vars['_2cd85c']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_2cd85c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_2cd85c'];?>

        <?php endif;$c_122f55=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_122f55'];$_3c60e0_local_vars=$_3c60e0_old_vars['_122f55'];?>

        <?php $c_95fd5f=null;$_3c60e0_old_params['_95fd5f']=$_3c60e0_local_params;$_3c60e0_old_vars['_95fd5f']=$_3c60e0_local_vars;$a_95fd5f=$this->setup_args(['menu_type'=>'4','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_95fd5f=-1;$r_95fd5f=true;while($r_95fd5f===true):$r_95fd5f=($_95fd5f!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_95fd5f,$c_95fd5f,$this,$r_95fd5f,++$_95fd5f,'_95fd5f');ob_start();?>
<?php $c_95fd5f = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_95fd5f=false;}if($c_95fd5f ):?>

          <?php $_3c60e0_old_params['_7a26c5']=$_3c60e0_local_params;$_3c60e0_old_vars['_7a26c5']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-comments" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_7a26c5'];$_3c60e0_local_vars=$_3c60e0_old_vars['_7a26c5'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3c60e0_old_params['_fe6cb6']=$_3c60e0_local_params;$_3c60e0_old_vars['_fe6cb6']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_fe6cb6'];$_3c60e0_local_vars=$_3c60e0_old_vars['_fe6cb6'];?>

        <?php endif;$c_95fd5f=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_95fd5f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_95fd5f'];?>

        <?php $c_4294a1=null;$_3c60e0_old_params['_4294a1']=$_3c60e0_local_params;$_3c60e0_old_vars['_4294a1']=$_3c60e0_local_vars;$a_4294a1=$this->setup_args(['menu_type'=>'5','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_4294a1=-1;$r_4294a1=true;while($r_4294a1===true):$r_4294a1=($_4294a1!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_4294a1,$c_4294a1,$this,$r_4294a1,++$_4294a1,'_4294a1');ob_start();?>
<?php $c_4294a1 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_4294a1=false;}if($c_4294a1 ):?>

          <?php $_3c60e0_old_params['_4b6fc1']=$_3c60e0_local_params;$_3c60e0_old_vars['_4b6fc1']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-user-plus" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_4b6fc1'];$_3c60e0_local_vars=$_3c60e0_old_vars['_4b6fc1'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3c60e0_old_params['_1cf437']=$_3c60e0_local_params;$_3c60e0_old_vars['_1cf437']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_1cf437'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1cf437'];?>

        <?php endif;$c_4294a1=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_4294a1'];$_3c60e0_local_vars=$_3c60e0_old_vars['_4294a1'];?>

        <?php $c_d6f020=null;$_3c60e0_old_params['_d6f020']=$_3c60e0_local_params;$_3c60e0_old_vars['_d6f020']=$_3c60e0_local_vars;$a_d6f020=$this->setup_args(['name'=>'system_menus','this_tag'=>'loop'],null,$this);$_d6f020=-1;$r_d6f020=true;while($r_d6f020===true):$r_d6f020=($_d6f020!==-1)?false:true;echo $this->block_loop($a_d6f020,$c_d6f020,$this,$r_d6f020,++$_d6f020,'_d6f020');ob_start();?>
<?php $c_d6f020 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_d6f020=false;}if($c_d6f020 ):?>

          <?php $_3c60e0_old_params['_6f1b33']=$_3c60e0_local_params;$_3c60e0_old_vars['_6f1b33']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <?php $_3c60e0_old_params['_e078e8']=$_3c60e0_local_params;$_3c60e0_old_vars['_e078e8']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<div class="badge-icon-badge"></div><?php elseif($this->conditional_elseif($this->setup_args(['name'=>'plugin_upgrade_count','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
<div class="badge-icon-badge"></div><?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e078e8'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e078e8'];?>

            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-plug" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_6f1b33'];$_3c60e0_local_vars=$_3c60e0_old_vars['_6f1b33'];?>

            <a <?php $_3c60e0_old_params['_dfa13f']=$_3c60e0_local_params;$_3c60e0_old_vars['_dfa13f']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
target="<?php echo $this->function_var($this->setup_args(['name'=>'menu_target','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_dfa13f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_dfa13f'];?>
 class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=<?php echo $this->function_var($this->setup_args(['name'=>'menu_mode','this_tag'=>'var'],null,$this),$this)?>
<?php $c_c80ce2=null;$_3c60e0_old_params['_c80ce2']=$_3c60e0_local_params;$_3c60e0_old_vars['_c80ce2']=$_3c60e0_local_vars;$a_c80ce2=$this->setup_args(['name'=>'menu_args','this_tag'=>'loop'],null,$this);$_c80ce2=-1;$r_c80ce2=true;while($r_c80ce2===true):$r_c80ce2=($_c80ce2!==-1)?false:true;echo $this->block_loop($a_c80ce2,$c_c80ce2,$this,$r_c80ce2,++$_c80ce2,'_c80ce2');ob_start();?>
<?php $c_c80ce2 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_c80ce2=false;}if($c_c80ce2 ):?>
&amp;<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
=<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$c_c80ce2=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_c80ce2'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c80ce2'];?>
">
            <?php echo $this->function_var($this->setup_args(['name'=>'menu_label','this_tag'=>'var'],null,$this),$this)?>

            <?php $_3c60e0_old_params['_909c11']=$_3c60e0_local_params;$_3c60e0_old_vars['_909c11']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_mode','eq'=>'manage_scheme','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_98ac84']=$_3c60e0_local_params;$_3c60e0_old_vars['_98ac84']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="badge-icon-badge badge-icon-middle"></div>
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_98ac84'];$_3c60e0_local_vars=$_3c60e0_old_vars['_98ac84'];?>

            <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'menu_mode','eq'=>'manage_plugins','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_995a82']=$_3c60e0_local_params;$_3c60e0_old_vars['_995a82']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'plugin_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="badge-icon-badge badge-icon-middle"></div>
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_995a82'];$_3c60e0_local_vars=$_3c60e0_old_vars['_995a82'];?>

            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_909c11'];$_3c60e0_local_vars=$_3c60e0_old_vars['_909c11'];?>

            </a>
          <?php $_3c60e0_old_params['_775577']=$_3c60e0_local_params;$_3c60e0_old_vars['_775577']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_775577'];$_3c60e0_local_vars=$_3c60e0_old_vars['_775577'];?>

        <?php endif;$c_d6f020=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_d6f020'];$_3c60e0_local_vars=$_3c60e0_old_vars['_d6f020'];?>

        </ul>
        <div class="header-util">
          <?php echo $this->function_var($this->setup_args(['name'=>'add_header_system','this_tag'=>'var'],null,$this),$this)?>

          <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'show_both','setvar'=>'__show_both','this_tag'=>'property'],null,$this),$this),$this->setup_args('__show_both','setvar',$this),$this,'setvar')?>

          <a href="<?php $_3c60e0_old_params['_a42a01']=$_3c60e0_local_params;$_3c60e0_old_vars['_a42a01']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_88dbac']=$_3c60e0_local_params;$_3c60e0_old_vars['_88dbac']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'site_url','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'link_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_88dbac'];$_3c60e0_local_vars=$_3c60e0_old_vars['_88dbac'];?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'site_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a42a01'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a42a01'];?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-external-link-square" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_3c60e0_old_params['_bfab5a']=$_3c60e0_local_params;$_3c60e0_old_vars['_bfab5a']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'link_url','this_tag'=>'var'],null,$this),$this)?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-globe" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_bfab5a'];$_3c60e0_local_vars=$_3c60e0_old_vars['_bfab5a'];?>

        <?php $_3c60e0_old_params['_f1d60f']=$_3c60e0_local_params;$_3c60e0_old_vars['_f1d60f']=$_3c60e0_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'can_rebuild','workspace_id'=>'0','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

        <?php $c_3c28a9=null;$_3c60e0_old_params['_3c28a9']=$_3c60e0_local_params;$_3c60e0_old_vars['_3c28a9']=$_3c60e0_local_vars;$a_3c28a9=$this->setup_args(['model'=>'urlmapping','count'=>'model','group'=>'\'workspace_id\',\'model\'','workspace_id'=>'0','limit'=>'1','this_tag'=>'countgroupby'],null,$this);$_3c28a9=-1;$r_3c28a9=true;while($r_3c28a9===true):$r_3c28a9=($_3c28a9!==-1)?false:true;echo $this->component('PTTags')->hdlr_countgroupby($a_3c28a9,$c_3c28a9,$this,$r_3c28a9,++$_3c28a9,'_3c28a9');ob_start();?>
<?php $c_3c28a9 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_3c28a9=false;}if($c_3c28a9 ):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild" class="popup btn btn-sm btn-secondary my-2 my-sm-0 rebuild-popup" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-refresh" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$c_3c28a9=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_3c28a9'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3c28a9'];?>

        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f1d60f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f1d60f'];?>

          <a style="padding:<?php $_3c60e0_old_params['_108f57']=$_3c60e0_local_params;$_3c60e0_old_vars['_108f57']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_photo','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
0 3px<?php else:?>
4px<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_108f57'];$_3c60e0_local_vars=$_3c60e0_old_vars['_108f57'];?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=user&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'user_id','this_tag'=>'var'],null,$this),$this)?>
&amp;_profile=1" class="btn btn-sm btn-secondary my-2 my-sm-0 profile-btn" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
">
          <?php $_3c60e0_old_params['_880699']=$_3c60e0_local_params;$_3c60e0_old_vars['_880699']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_photo','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_880699'];$_3c60e0_local_vars=$_3c60e0_old_vars['_880699'];?>

          </a>
          <a id="__logout" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=logout" class="btn btn-sm btn-secondary my-2 my-sm-0 logout-btn" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_3c60e0_old_params['_6ea854']=$_3c60e0_local_params;$_3c60e0_old_vars['_6ea854']=$_3c60e0_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=config" class="btn btn-sm btn-secondary my-2 my-sm-0 config-system" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Config','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-wrench" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Config','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_6ea854'];$_3c60e0_local_vars=$_3c60e0_old_vars['_6ea854'];?>

        </div>
      </div>
        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_1ddafe'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1ddafe'];?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e17db0'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e17db0'];?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_516677'];$_3c60e0_local_vars=$_3c60e0_old_vars['_516677'];?>

      <?php $_3c60e0_old_params['_73d517']=$_3c60e0_local_params;$_3c60e0_old_vars['_73d517']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'member_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <div class="collapse navbar-collapse" id="navbars" <?php $_3c60e0_old_params['_773450']=$_3c60e0_local_params;$_3c60e0_old_vars['_773450']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_counter','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-left:-66px;z-index:0"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_773450'];$_3c60e0_local_vars=$_3c60e0_old_vars['_773450'];?>
>
        <ul class="nav-pills navbar-nav mr-auto" id="system-panel"></ul>
          <div class="header-util">
          <?php echo $this->function_var($this->setup_args(['name'=>'add_header_workspace','this_tag'=>'var'],null,$this),$this)?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=logout<?php $_3c60e0_old_params['_2707cb']=$_3c60e0_local_params;$_3c60e0_old_vars['_2707cb']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_2707cb'];$_3c60e0_local_vars=$_3c60e0_old_vars['_2707cb'];?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 logout-btn" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=edit_profile<?php $_3c60e0_old_params['_e83d28']=$_3c60e0_local_params;$_3c60e0_old_vars['_e83d28']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e83d28'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e83d28'];?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 profile-btn" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          </div>
        </div>
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_73d517'];$_3c60e0_local_vars=$_3c60e0_old_vars['_73d517'];?>

    </nav>
  <?php $_3c60e0_old_params['_eba2bb']=$_3c60e0_local_params;$_3c60e0_old_vars['_eba2bb']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $_3c60e0_old_params['_1aefcd']=$_3c60e0_local_params;$_3c60e0_old_vars['_1aefcd']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_96ce3c']=$_3c60e0_local_params;$_3c60e0_old_vars['_96ce3c']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_3c60e0_old_params['_4e953e']=$_3c60e0_local_params;$_3c60e0_old_vars['_4e953e']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <nav class="bar navbar navbar-toggleable-md navbar-inverse bg-inverse workspace-bar"<?php $_3c60e0_old_params['_3f3d47']=$_3c60e0_local_params;$_3c60e0_old_vars['_3f3d47']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 style="z-index:1029;"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3f3d47'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3f3d47'];?>
>
      <?php $_3c60e0_old_params['_3fb9eb']=$_3c60e0_local_params;$_3c60e0_old_vars['_3fb9eb']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <button style="background-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important;" class="navbar-toggler navbar-toggler-right btn-ws" type="button" data-toggle="collapse" data-target="#navbars-ws" aria-controls="navbars" aria-expanded="false" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </button>
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3fb9eb'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3fb9eb'];?>

      <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'workspace_name','count_chars'=>'','setvar'=>'workspace_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('workspace_chars','setvar',$this),$this,'setvar')?>
<a class="navbar-brand brand-workspace" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=dashboard&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
"<?php $_3c60e0_old_params['_a2c1ce']=$_3c60e0_local_params;$_3c60e0_old_vars['_a2c1ce']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 title="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a2c1ce'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a2c1ce'];?>
><?php echo $this->modifier_trim_to(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'','trim_to'=>'20+...','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('20+...','trim_to',$this),$this,'trim_to')?>
</a>
      <div class="collapse navbar-collapse" id="navbars-ws">
        <ul class="nav-pills navbar-nav mr-auto">
          <?php $c_35dba9=null;$_3c60e0_old_params['_35dba9']=$_3c60e0_local_params;$_3c60e0_old_vars['_35dba9']=$_3c60e0_local_vars;$a_35dba9=$this->setup_args(['type'=>'display_space','menu_type'=>'6','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_35dba9=-1;$r_35dba9=true;while($r_35dba9===true):$r_35dba9=($_35dba9!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_35dba9,$c_35dba9,$this,$r_35dba9,++$_35dba9,'_35dba9');ob_start();?>
<?php $c_35dba9 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_35dba9=false;}if($c_35dba9 ):?>

            <?php $_3c60e0_old_params['_21d34f']=$_3c60e0_local_params;$_3c60e0_old_vars['_21d34f']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <li class="nav-item dropdown">
              <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-bookmark" aria-hidden="true"></i>
                <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
</span>
              </a>
              <div class="dropdown-menu">
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_21d34f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_21d34f'];?>

              <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_3c60e0_old_params['_e96d6d']=$_3c60e0_local_params;$_3c60e0_old_vars['_e96d6d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e96d6d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e96d6d'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
            <?php $_3c60e0_old_params['_6ff45c']=$_3c60e0_local_params;$_3c60e0_old_vars['_6ff45c']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
              </li>
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_6ff45c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_6ff45c'];?>

          <?php endif;$c_35dba9=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_35dba9'];$_3c60e0_local_vars=$_3c60e0_old_vars['_35dba9'];?>

        <?php $c_d7029a=null;$_3c60e0_old_params['_d7029a']=$_3c60e0_local_params;$_3c60e0_old_vars['_d7029a']=$_3c60e0_local_vars;$a_d7029a=$this->setup_args(['limit'=>'$panel_limit','type'=>'display_space','menu_type'=>'1','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_d7029a=-1;$r_d7029a=true;while($r_d7029a===true):$r_d7029a=($_d7029a!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_d7029a,$c_d7029a,$this,$r_d7029a,++$_d7029a,'_d7029a');ob_start();?>
<?php $c_d7029a = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_d7029a=false;}if($c_d7029a ):?>

          <li class="nav-item nav-item-ws <?php $_3c60e0_old_params['_959e22']=$_3c60e0_local_params;$_3c60e0_old_vars['_959e22']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'$model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_959e22'];$_3c60e0_local_vars=$_3c60e0_old_vars['_959e22'];?>
">
            <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'label','count_chars'=>'','setvar'=>'count_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('count_chars','setvar',$this),$this,'setvar')?>
<a class="nav-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_3c60e0_old_params['_53dad6']=$_3c60e0_local_params;$_3c60e0_old_vars['_53dad6']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_53dad6'];$_3c60e0_local_vars=$_3c60e0_old_vars['_53dad6'];?>
"<?php $_3c60e0_old_params['_00b6d6']=$_3c60e0_local_params;$_3c60e0_old_vars['_00b6d6']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'count_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 data-toggle="tooltip" data-placement="right" title="<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_00b6d6'];$_3c60e0_local_vars=$_3c60e0_old_vars['_00b6d6'];?>
><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          </li>
        <?php endif;$c_d7029a=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_d7029a'];$_3c60e0_local_vars=$_3c60e0_old_vars['_d7029a'];?>

        <?php $c_368b4b=null;$_3c60e0_old_params['_368b4b']=$_3c60e0_local_params;$_3c60e0_old_vars['_368b4b']=$_3c60e0_local_vars;$a_368b4b=$this->setup_args(['limit'=>'100000','offset'=>'$panel_limit','type'=>'display_space','menu_type'=>'1','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_368b4b=-1;$r_368b4b=true;while($r_368b4b===true):$r_368b4b=($_368b4b!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_368b4b,$c_368b4b,$this,$r_368b4b,++$_368b4b,'_368b4b');ob_start();?>
<?php $c_368b4b = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_368b4b=false;}if($c_368b4b ):?>

          <?php $_3c60e0_old_params['_f42022']=$_3c60e0_local_params;$_3c60e0_old_vars['_f42022']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-window-maximize" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f42022'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f42022'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_3c60e0_old_params['_1da9de']=$_3c60e0_local_params;$_3c60e0_old_vars['_1da9de']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_1da9de'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1da9de'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3c60e0_old_params['_236d97']=$_3c60e0_local_params;$_3c60e0_old_vars['_236d97']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_236d97'];$_3c60e0_local_vars=$_3c60e0_old_vars['_236d97'];?>

        <?php endif;$c_368b4b=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_368b4b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_368b4b'];?>

        <?php $c_c4f441=null;$_3c60e0_old_params['_c4f441']=$_3c60e0_local_params;$_3c60e0_old_vars['_c4f441']=$_3c60e0_local_vars;$a_c4f441=$this->setup_args(['type'=>'display_space','menu_type'=>'2','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_c4f441=-1;$r_c4f441=true;while($r_c4f441===true):$r_c4f441=($_c4f441!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_c4f441,$c_c4f441,$this,$r_c4f441,++$_c4f441,'_c4f441');ob_start();?>
<?php $c_c4f441 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_c4f441=false;}if($c_c4f441 ):?>

          <?php $_3c60e0_old_params['_2c74d4']=$_3c60e0_local_params;$_3c60e0_old_vars['_2c74d4']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cog" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_2c74d4'];$_3c60e0_local_vars=$_3c60e0_old_vars['_2c74d4'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_3c60e0_old_params['_15ed47']=$_3c60e0_local_params;$_3c60e0_old_vars['_15ed47']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_15ed47'];$_3c60e0_local_vars=$_3c60e0_old_vars['_15ed47'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3c60e0_old_params['_ca27a7']=$_3c60e0_local_params;$_3c60e0_old_vars['_ca27a7']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ca27a7'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ca27a7'];?>

        <?php endif;$c_c4f441=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_c4f441'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c4f441'];?>

        <?php $c_eeeaa7=null;$_3c60e0_old_params['_eeeaa7']=$_3c60e0_local_params;$_3c60e0_old_vars['_eeeaa7']=$_3c60e0_local_vars;$a_eeeaa7=$this->setup_args(['type'=>'display_space','menu_type'=>'3','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_eeeaa7=-1;$r_eeeaa7=true;while($r_eeeaa7===true):$r_eeeaa7=($_eeeaa7!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_eeeaa7,$c_eeeaa7,$this,$r_eeeaa7,++$_eeeaa7,'_eeeaa7');ob_start();?>
<?php $c_eeeaa7 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_eeeaa7=false;}if($c_eeeaa7 ):?>

          <?php $_3c60e0_old_params['_fce964']=$_3c60e0_local_params;$_3c60e0_old_vars['_fce964']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-database" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_fce964'];$_3c60e0_local_vars=$_3c60e0_old_vars['_fce964'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_3c60e0_old_params['_730c95']=$_3c60e0_local_params;$_3c60e0_old_vars['_730c95']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_730c95'];$_3c60e0_local_vars=$_3c60e0_old_vars['_730c95'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3c60e0_old_params['_5c0d43']=$_3c60e0_local_params;$_3c60e0_old_vars['_5c0d43']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_5c0d43'];$_3c60e0_local_vars=$_3c60e0_old_vars['_5c0d43'];?>

        <?php endif;$c_eeeaa7=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_eeeaa7'];$_3c60e0_local_vars=$_3c60e0_old_vars['_eeeaa7'];?>

        <?php $c_094793=null;$_3c60e0_old_params['_094793']=$_3c60e0_local_params;$_3c60e0_old_vars['_094793']=$_3c60e0_local_vars;$a_094793=$this->setup_args(['type'=>'display_space','menu_type'=>'4','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_094793=-1;$r_094793=true;while($r_094793===true):$r_094793=($_094793!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_094793,$c_094793,$this,$r_094793,++$_094793,'_094793');ob_start();?>
<?php $c_094793 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_094793=false;}if($c_094793 ):?>

          <?php $_3c60e0_old_params['_44a11e']=$_3c60e0_local_params;$_3c60e0_old_vars['_44a11e']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-comments" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_44a11e'];$_3c60e0_local_vars=$_3c60e0_old_vars['_44a11e'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_3c60e0_old_params['_bf4469']=$_3c60e0_local_params;$_3c60e0_old_vars['_bf4469']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_bf4469'];$_3c60e0_local_vars=$_3c60e0_old_vars['_bf4469'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3c60e0_old_params['_f8e441']=$_3c60e0_local_params;$_3c60e0_old_vars['_f8e441']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f8e441'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f8e441'];?>

        <?php endif;$c_094793=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_094793'];$_3c60e0_local_vars=$_3c60e0_old_vars['_094793'];?>

        <?php $c_46f86a=null;$_3c60e0_old_params['_46f86a']=$_3c60e0_local_params;$_3c60e0_old_vars['_46f86a']=$_3c60e0_local_vars;$a_46f86a=$this->setup_args(['type'=>'display_space','menu_type'=>'5','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_46f86a=-1;$r_46f86a=true;while($r_46f86a===true):$r_46f86a=($_46f86a!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_46f86a,$c_46f86a,$this,$r_46f86a,++$_46f86a,'_46f86a');ob_start();?>
<?php $c_46f86a = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_46f86a=false;}if($c_46f86a ):?>

          <?php $_3c60e0_old_params['_24bc19']=$_3c60e0_local_params;$_3c60e0_old_vars['_24bc19']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-user-plus" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_24bc19'];$_3c60e0_local_vars=$_3c60e0_old_vars['_24bc19'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_3c60e0_old_params['_cf7eb0']=$_3c60e0_local_params;$_3c60e0_old_vars['_cf7eb0']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_cf7eb0'];$_3c60e0_local_vars=$_3c60e0_old_vars['_cf7eb0'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_3c60e0_old_params['_b99d53']=$_3c60e0_local_params;$_3c60e0_old_vars['_b99d53']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b99d53'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b99d53'];?>

        <?php endif;$c_46f86a=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_46f86a'];$_3c60e0_local_vars=$_3c60e0_old_vars['_46f86a'];?>

        <?php $c_94ba46=null;$_3c60e0_old_params['_94ba46']=$_3c60e0_local_params;$_3c60e0_old_vars['_94ba46']=$_3c60e0_local_vars;$a_94ba46=$this->setup_args(['name'=>'workspace_menus','this_tag'=>'loop'],null,$this);$_94ba46=-1;$r_94ba46=true;while($r_94ba46===true):$r_94ba46=($_94ba46!==-1)?false:true;echo $this->block_loop($a_94ba46,$c_94ba46,$this,$r_94ba46,++$_94ba46,'_94ba46');ob_start();?>
<?php $c_94ba46 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_94ba46=false;}if($c_94ba46 ):?>

          <?php $_3c60e0_old_params['_2dce71']=$_3c60e0_local_params;$_3c60e0_old_vars['_2dce71']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-plug" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_2dce71'];$_3c60e0_local_vars=$_3c60e0_old_vars['_2dce71'];?>

            <a <?php $_3c60e0_old_params['_8eecb6']=$_3c60e0_local_params;$_3c60e0_old_vars['_8eecb6']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
target="<?php echo $this->function_var($this->setup_args(['name'=>'menu_target','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_8eecb6'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8eecb6'];?>
 class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=<?php echo $this->function_var($this->setup_args(['name'=>'menu_mode','this_tag'=>'var'],null,$this),$this)?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_60d583=null;$_3c60e0_old_params['_60d583']=$_3c60e0_local_params;$_3c60e0_old_vars['_60d583']=$_3c60e0_local_vars;$a_60d583=$this->setup_args(['name'=>'menu_args','this_tag'=>'loop'],null,$this);$_60d583=-1;$r_60d583=true;while($r_60d583===true):$r_60d583=($_60d583!==-1)?false:true;echo $this->block_loop($a_60d583,$c_60d583,$this,$r_60d583,++$_60d583,'_60d583');ob_start();?>
<?php $c_60d583 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_60d583=false;}if($c_60d583 ):?>
&amp;<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
=<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$c_60d583=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_60d583'];$_3c60e0_local_vars=$_3c60e0_old_vars['_60d583'];?>
"><?php echo $this->function_var($this->setup_args(['name'=>'menu_label','this_tag'=>'var'],null,$this),$this)?>
</a>
          <?php $_3c60e0_old_params['_b5f45d']=$_3c60e0_local_params;$_3c60e0_old_vars['_b5f45d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b5f45d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b5f45d'];?>

        <?php endif;$c_94ba46=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_94ba46'];$_3c60e0_local_vars=$_3c60e0_old_vars['_94ba46'];?>

        </ul>
        <div class="header-util">
          <a href="<?php $_3c60e0_old_params['_21eb67']=$_3c60e0_local_params;$_3c60e0_old_vars['_21eb67']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_25f1b7']=$_3c60e0_local_params;$_3c60e0_old_vars['_25f1b7']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_url','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_25f1b7'];$_3c60e0_local_vars=$_3c60e0_old_vars['_25f1b7'];?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_21eb67'];$_3c60e0_local_vars=$_3c60e0_old_vars['_21eb67'];?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-external-link-square" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_3c60e0_old_params['_62e10c']=$_3c60e0_local_params;$_3c60e0_old_vars['_62e10c']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_3c60e0_old_params['_f280d6']=$_3c60e0_local_params;$_3c60e0_old_vars['_f280d6']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'var'],null,$this),$this)?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-globe" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f280d6'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f280d6'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_62e10c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_62e10c'];?>

        <?php $_3c60e0_old_params['_763cf8']=$_3c60e0_local_params;$_3c60e0_old_vars['_763cf8']=$_3c60e0_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'can_rebuild','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

        <?php $c_8d9cec=null;$_3c60e0_old_params['_8d9cec']=$_3c60e0_local_params;$_3c60e0_old_vars['_8d9cec']=$_3c60e0_local_vars;$a_8d9cec=$this->setup_args(['model'=>'urlmapping','count'=>'model','group'=>'\'workspace_id\',\'model\'','workspace_id'=>'$workspace_id','limit'=>'1','this_tag'=>'countgroupby'],null,$this);$_8d9cec=-1;$r_8d9cec=true;while($r_8d9cec===true):$r_8d9cec=($_8d9cec!==-1)?false:true;echo $this->component('PTTags')->hdlr_countgroupby($a_8d9cec,$c_8d9cec,$this,$r_8d9cec,++$_8d9cec,'_8d9cec');ob_start();?>
<?php $c_8d9cec = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_8d9cec=false;}if($c_8d9cec ):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
" class="popup btn btn-sm btn-secondary my-2 my-sm-0 rebuild-popup" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-refresh" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$c_8d9cec=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_8d9cec'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8d9cec'];?>

        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_763cf8'];$_3c60e0_local_vars=$_3c60e0_old_vars['_763cf8'];?>

        <?php $_3c60e0_old_params['_87f1c3']=$_3c60e0_local_params;$_3c60e0_old_vars['_87f1c3']=$_3c60e0_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'edit','model'=>'workspace','id'=>'$workspace_id','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=workspace&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 config-workspace" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Settings','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-wrench" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpace Settings','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_87f1c3'];$_3c60e0_local_vars=$_3c60e0_old_vars['_87f1c3'];?>

        </div>
      </div>
    </nav>
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_4e953e'];$_3c60e0_local_vars=$_3c60e0_old_vars['_4e953e'];?>

    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_96ce3c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_96ce3c'];?>

<?php $_3c60e0_old_params['_72123b']=$_3c60e0_local_params;$_3c60e0_old_vars['_72123b']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  </div>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_72123b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_72123b'];?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'can_action','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'disp_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_3c60e0_old_params['_b13511']=$_3c60e0_local_params;$_3c60e0_old_vars['_b13511']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'child_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_3c60e0_old_params['_11b2e0']=$_3c60e0_local_params;$_3c60e0_old_vars['_11b2e0']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_11b2e0'];$_3c60e0_local_vars=$_3c60e0_old_vars['_11b2e0'];?>

    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b13511'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b13511'];?>

    <?php $_3c60e0_old_params['_0452ab']=$_3c60e0_local_params;$_3c60e0_old_vars['_0452ab']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_0452ab'];$_3c60e0_local_vars=$_3c60e0_old_vars['_0452ab'];?>

    <?php $_3c60e0_old_params['_5af89b']=$_3c60e0_local_params;$_3c60e0_old_vars['_5af89b']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_3c60e0_old_params['_5b7d39']=$_3c60e0_local_params;$_3c60e0_old_vars['_5b7d39']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','ne'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_5b7d39'];$_3c60e0_local_vars=$_3c60e0_old_vars['_5b7d39'];?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'comment','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'attachmentfile','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'contact','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_5af89b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_5af89b'];?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'output_container','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <div class="container-fluid">
    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_3c60e0_old_params['_c5d50d']=$_3c60e0_local_params;$_3c60e0_old_vars['_c5d50d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_3c60e0_old_params['_cb87e7']=$_3c60e0_local_params;$_3c60e0_old_vars['_cb87e7']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_3c60e0_old_params['_2c9458']=$_3c60e0_local_params;$_3c60e0_old_vars['_2c9458']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_3c60e0_old_params['_bb8ab7']=$_3c60e0_local_params;$_3c60e0_old_vars['_bb8ab7']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php $_3c60e0_old_params['_56a10b']=$_3c60e0_local_params;$_3c60e0_old_vars['_56a10b']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="single_select" value="1"><?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_56a10b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_56a10b'];?>

            <?php $_3c60e0_old_params['_7462e5']=$_3c60e0_local_params;$_3c60e0_old_vars['_7462e5']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._from_scope','ne'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_from_scope" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_7462e5'];$_3c60e0_local_vars=$_3c60e0_old_vars['_7462e5'];?>

          <?php $_3c60e0_old_params['_03fb83']=$_3c60e0_local_params;$_3c60e0_old_vars['_03fb83']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_03fb83'];$_3c60e0_local_vars=$_3c60e0_old_vars['_03fb83'];?>

          <?php $_3c60e0_old_params['_5f8761']=$_3c60e0_local_params;$_3c60e0_old_vars['_5f8761']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="manage_revision" value="1">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_5f8761'];$_3c60e0_local_vars=$_3c60e0_old_vars['_5f8761'];?>

          <?php $_3c60e0_old_params['_0b8238']=$_3c60e0_local_params;$_3c60e0_old_vars['_0b8238']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="dialog_view" value="1">
            <?php $_3c60e0_old_params['_16d740']=$_3c60e0_local_params;$_3c60e0_old_vars['_16d740']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_16d740'];$_3c60e0_local_vars=$_3c60e0_old_vars['_16d740'];?>

          <?php $_3c60e0_old_params['_10c753']=$_3c60e0_local_params;$_3c60e0_old_vars['_10c753']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_10c753'];$_3c60e0_local_vars=$_3c60e0_old_vars['_10c753'];?>

            <?php $_3c60e0_old_params['_d348bf']=$_3c60e0_local_params;$_3c60e0_old_vars['_d348bf']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
              <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_d348bf'];$_3c60e0_local_vars=$_3c60e0_old_vars['_d348bf'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_0b8238'];$_3c60e0_local_vars=$_3c60e0_old_vars['_0b8238'];?>

          <?php $_3c60e0_old_params['_b452bb']=$_3c60e0_local_params;$_3c60e0_old_vars['_b452bb']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_select" value="1">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b452bb'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b452bb'];?>

          <?php $_3c60e0_old_params['_ed68da']=$_3c60e0_local_params;$_3c60e0_old_vars['_ed68da']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="selected_ids" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="from_obj" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.from_obj','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php $_3c60e0_old_params['_8b6d5b']=$_3c60e0_local_params;$_3c60e0_old_vars['_8b6d5b']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="select_add" value="1">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_8b6d5b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8b6d5b'];?>

          <?php $_3c60e0_old_params['_edbde4']=$_3c60e0_local_params;$_3c60e0_old_vars['_edbde4']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ids_only','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ids_only" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ids_only','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_edbde4'];$_3c60e0_local_vars=$_3c60e0_old_vars['_edbde4'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ed68da'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ed68da'];?>

            <div class="modal-body">
              <div class="container-fluid">
                <?php $_3c60e0_old_params['_3c9b5d']=$_3c60e0_local_params;$_3c60e0_old_vars['_3c9b5d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <?php $c_f912cc=null;$_3c60e0_old_params['_f912cc']=$_3c60e0_local_params;$_3c60e0_old_vars['_f912cc']=$_3c60e0_local_vars;$a_f912cc=$this->setup_args(['name'=>'system_filters','this_tag'=>'loop'],null,$this);$_f912cc=-1;$r_f912cc=true;while($r_f912cc===true):$r_f912cc=($_f912cc!==-1)?false:true;echo $this->block_loop($a_f912cc,$c_f912cc,$this,$r_f912cc,++$_f912cc,'_f912cc');ob_start();?>
<?php $c_f912cc = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_f912cc=false;}if($c_f912cc ):?>

                      <?php $_3c60e0_old_params['_7d1c00']=$_3c60e0_local_params;$_3c60e0_old_vars['_7d1c00']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select_system_filters" id="select_system_filters">
                        <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_7d1c00'];$_3c60e0_local_vars=$_3c60e0_old_vars['_7d1c00'];?>

                        <option <?php $_3c60e0_old_params['_6d3508']=$_3c60e0_local_params;$_3c60e0_old_vars['_6d3508']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'input','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
data-input="1" data-hint="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'hint','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_6d3508'];$_3c60e0_local_vars=$_3c60e0_old_vars['_6d3508'];?>
data-option="<?php echo $this->function_var($this->setup_args(['name'=>'option','this_tag'=>'var'],null,$this),$this)?>
" <?php $_3c60e0_old_params['_c6ccfc']=$_3c60e0_local_params;$_3c60e0_old_vars['_c6ccfc']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_system_filter','eq'=>'$name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c6ccfc'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c6ccfc'];?>
 value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php $_3c60e0_old_params['_c8229b']=$_3c60e0_local_params;$_3c60e0_old_vars['_c8229b']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        </select>
                      <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="system_filter-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c8229b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c8229b'];?>

                    <?php endif;$c_f912cc=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_f912cc'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f912cc'];?>

                  </div>
                </div>
                <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3c9b5d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3c9b5d'];?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Your Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select-user_filters" id="select-user_filters">
                      <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php $c_d60f32=null;$_3c60e0_old_params['_d60f32']=$_3c60e0_local_params;$_3c60e0_old_vars['_d60f32']=$_3c60e0_local_vars;$a_d60f32=$this->setup_args(['model'=>'option','kind'=>'list_filter','key'=>'$model','user_id'=>'$user_id','workspace_id'=>'$workspace_id','this_tag'=>'objectloop'],null,$this);$_d60f32=-1;$r_d60f32=true;while($r_d60f32===true):$r_d60f32=($_d60f32!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_d60f32,$c_d60f32,$this,$r_d60f32,++$_d60f32,'_d60f32');ob_start();?>
<?php $c_d60f32 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_d60f32=false;}if($c_d60f32 ):?>

                      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_3c60e0_old_params['_852230']=$_3c60e0_local_params;$_3c60e0_old_vars['_852230']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_filter_id','eq'=>'$id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_852230'];$_3c60e0_local_vars=$_3c60e0_old_vars['_852230'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'value','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php endif;$c_d60f32=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_d60f32'];$_3c60e0_local_vars=$_3c60e0_old_vars['_d60f32'];?>

                      <option value="add_new_filter"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Add New Filter','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    </select>
                    <?php $_3c60e0_old_params['_c94b20']=$_3c60e0_local_params;$_3c60e0_old_vars['_c94b20']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="filter-select-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <button type="button" class="delete-filter-elem hidden delete-bun-sm btn btn-secondary btn-sm filter-selecter-ctrl" id="filter-select-delete-button" class="close" data-dismiss="modal">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Delete','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    </button>
                    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c94b20'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c94b20'];?>

                  </div>
                </div>
                <div class="row form-group new-filter-elem hidden">
                  <div class="col-md-3" style="float:left;"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" name="filters-selector" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" id="filters-selector">
                    <?php $c_7a5cb0=null;$_3c60e0_old_params['_7a5cb0']=$_3c60e0_local_params;$_3c60e0_old_vars['_7a5cb0']=$_3c60e0_local_vars;$a_7a5cb0=$this->setup_args(['name'=>'filter_options','this_tag'=>'loop'],null,$this);$_7a5cb0=-1;$r_7a5cb0=true;while($r_7a5cb0===true):$r_7a5cb0=($_7a5cb0!==-1)?false:true;echo $this->block_loop($a_7a5cb0,$c_7a5cb0,$this,$r_7a5cb0,++$_7a5cb0,'_7a5cb0');ob_start();?>
<?php $c_7a5cb0 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_7a5cb0=false;}if($c_7a5cb0 ):?>

                    <?php $_3c60e0_old_params['_40bf76']=$_3c60e0_local_params;$_3c60e0_old_vars['_40bf76']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <option><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_40bf76'];$_3c60e0_local_vars=$_3c60e0_old_vars['_40bf76'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" class="coltype_<?php $_3c60e0_old_params['_3862db']=$_3c60e0_local_params;$_3c60e0_old_vars['_3862db']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'created_by','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
reference<?php else:?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3862db'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3862db'];?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php endif;$c_7a5cb0=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_7a5cb0'];$_3c60e0_local_vars=$_3c60e0_old_vars['_7a5cb0'];?>

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

                              <input type="datetime-local" step="<?php $_3c60e0_old_params['_7124eb']=$_3c60e0_local_params;$_3c60e0_old_vars['_7124eb']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'time_step','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'time_step','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
1<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_7124eb'];$_3c60e0_local_vars=$_3c60e0_old_vars['_7124eb'];?>
" class="form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="" value="<?php $_3c60e0_old_params['_942e01']=$_3c60e0_local_params;$_3c60e0_old_vars['_942e01']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'published_on_default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_format_ts($this->function_date($this->setup_args(['format'=>'$published_on_default','format_ts'=>'Y-m-d\\TH:i:s','this_tag'=>'date'],null,$this),$this),$this->setup_args('Y-m-d\\\\TH:i:s','format_ts',$this),$this,'format_ts')?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_942e01'];$_3c60e0_local_vars=$_3c60e0_old_vars['_942e01'];?>
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

                            <?php $_3c60e0_old_params['_27c3c7']=$_3c60e0_local_params;$_3c60e0_old_vars['_27c3c7']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'status_options','split'=>',','setvar'=>'status_label','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                            <?php else:?>

                              <?php $_3c60e0_old_params['_2817f3']=$_3c60e0_local_params;$_3c60e0_old_vars['_2817f3']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Draft,Review,Approval Pending,Reserved,Publish,Ended','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php else:?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Disable,Enable','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_2817f3'];$_3c60e0_local_vars=$_3c60e0_old_vars['_2817f3'];?>

                            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_27c3c7'];$_3c60e0_local_vars=$_3c60e0_old_vars['_27c3c7'];?>

                            <select class="form-control form-control-sm custom-select short filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <?php $_3c60e0_old_params['_96cf68']=$_3c60e0_local_params;$_3c60e0_old_vars['_96cf68']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                            <?php $c_a791e1=null;$_3c60e0_old_params['_a791e1']=$_3c60e0_local_params;$_3c60e0_old_vars['_a791e1']=$_3c60e0_local_vars;$a_a791e1=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_a791e1=-1;$r_a791e1=true;while($r_a791e1===true):$r_a791e1=($_a791e1!==-1)?false:true;echo $this->block_loop($a_a791e1,$c_a791e1,$this,$r_a791e1,++$_a791e1,'_a791e1');ob_start();?>
<?php $c_a791e1 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_a791e1=false;}if($c_a791e1 ):?>

                              <?php $_3c60e0_old_params['_297de7']=$_3c60e0_local_params;$_3c60e0_old_vars['_297de7']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__index__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php $_3c60e0_old_params['_d1905c']=$_3c60e0_local_params;$_3c60e0_old_vars['_d1905c']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__index__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_d1905c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_d1905c'];?>

                              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_297de7'];$_3c60e0_local_vars=$_3c60e0_old_vars['_297de7'];?>

                            <?php endif;$c_a791e1=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_a791e1'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a791e1'];?>

                            <?php else:?>

                            <?php $c_62c66a=null;$_3c60e0_old_params['_62c66a']=$_3c60e0_local_params;$_3c60e0_old_vars['_62c66a']=$_3c60e0_local_vars;$a_62c66a=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_62c66a=-1;$r_62c66a=true;while($r_62c66a===true):$r_62c66a=($_62c66a!==-1)?false:true;echo $this->block_loop($a_62c66a,$c_62c66a,$this,$r_62c66a,++$_62c66a,'_62c66a');ob_start();?>
<?php $c_62c66a = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_62c66a=false;}if($c_62c66a ):?>

                              <?php $_3c60e0_old_params['_ae56af']=$_3c60e0_local_params;$_3c60e0_old_vars['_ae56af']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ae56af'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ae56af'];?>

                            <?php endif;$c_62c66a=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_62c66a'];$_3c60e0_local_vars=$_3c60e0_old_vars['_62c66a'];?>

                            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_96cf68'];$_3c60e0_local_vars=$_3c60e0_old_vars['_96cf68'];?>

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
            <?php $_3c60e0_old_params['_3bf146']=$_3c60e0_local_params;$_3c60e0_old_vars['_3bf146']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            loc += '&workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3bf146'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3bf146'];?>

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
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_bb8ab7'];$_3c60e0_local_vars=$_3c60e0_old_vars['_bb8ab7'];?>

          <?php $_3c60e0_old_params['_8cb10f']=$_3c60e0_local_params;$_3c60e0_old_vars['_8cb10f']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php ob_start();$_3c60e0_old_params['_773387']=$_3c60e0_local_params;$_3c60e0_old_vars['_773387']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
      <?php $_3c60e0_old_params['_f624bf']=$_3c60e0_local_params;$_3c60e0_old_vars['_f624bf']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f624bf'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f624bf'];?>

      <?php $_3c60e0_old_params['_b52a25']=$_3c60e0_local_params;$_3c60e0_old_vars['_b52a25']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_select" value="1">
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b52a25'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b52a25'];?>

      <?php $_3c60e0_old_params['_cd3319']=$_3c60e0_local_params;$_3c60e0_old_vars['_cd3319']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="dialog_view" value="1">
        <?php $_3c60e0_old_params['_ea9c54']=$_3c60e0_local_params;$_3c60e0_old_vars['_ea9c54']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ea9c54'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ea9c54'];?>

          <?php $_3c60e0_old_params['_05026a']=$_3c60e0_local_params;$_3c60e0_old_vars['_05026a']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="single_select" value="1">
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_05026a'];$_3c60e0_local_vars=$_3c60e0_old_vars['_05026a'];?>

        <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php $_3c60e0_old_params['_9011e9']=$_3c60e0_local_params;$_3c60e0_old_vars['_9011e9']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_9011e9'];$_3c60e0_local_vars=$_3c60e0_old_vars['_9011e9'];?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_cd3319'];$_3c60e0_local_vars=$_3c60e0_old_vars['_cd3319'];?>

        <input type="hidden" name="return_args" value="<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'selected_ids_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
">
        <div class="modal-body">
          <div class="container-fluid">
          <?php $_3c60e0_old_params['_32a6bf']=$_3c60e0_local_params;$_3c60e0_old_vars['_32a6bf']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_3c60e0_old_params['_38bce9']=$_3c60e0_local_params;$_3c60e0_old_vars['_38bce9']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <?php $c_c7539a=null;$_3c60e0_old_params['_c7539a']=$_3c60e0_local_params;$_3c60e0_old_vars['_c7539a']=$_3c60e0_local_vars;$a_c7539a=$this->setup_args(['name'=>'disp_options','this_tag'=>'loop'],null,$this);$_c7539a=-1;$r_c7539a=true;while($r_c7539a===true):$r_c7539a=($_c7539a!==-1)?false:true;echo $this->block_loop($a_c7539a,$c_c7539a,$this,$r_c7539a,++$_c7539a,'_c7539a');ob_start();?>
<?php $c_c7539a = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_c7539a=false;}if($c_c7539a ):?>

            <?php $_3c60e0_old_params['_ccb815']=$_3c60e0_local_params;$_3c60e0_old_vars['_ccb815']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ccb815'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ccb815'];?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_3c60e0_old_params['_118865']=$_3c60e0_local_params;$_3c60e0_old_vars['_118865']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php $_3c60e0_old_params['_9ffb1c']=$_3c60e0_local_params;$_3c60e0_old_vars['_9ffb1c']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__key__','eq'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_9ffb1c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_9ffb1c'];?>

                <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_118865'];$_3c60e0_local_vars=$_3c60e0_old_vars['_118865'];?>

                <?php $_3c60e0_old_params['_be32b8']=$_3c60e0_local_params;$_3c60e0_old_vars['_be32b8']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__display','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[2]','setvar'=>'_type','this_tag'=>'var'],null,$this),$this),$this->setup_args('_type','setvar',$this),$this,'setvar')?>

                <label class="custom-control custom-checkbox 
                <?php $_3c60e0_old_params['_e10bdd']=$_3c60e0_local_params;$_3c60e0_old_vars['_e10bdd']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_75289a']=$_3c60e0_local_params;$_3c60e0_old_vars['_75289a']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_checked','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_75289a'];$_3c60e0_local_vars=$_3c60e0_old_vars['_75289a'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e10bdd'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e10bdd'];?>

                <?php $_3c60e0_old_params['_be59ff']=$_3c60e0_local_params;$_3c60e0_old_vars['_be59ff']=$_3c60e0_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_list_options','value'=>'$__key__','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_be59ff'];$_3c60e0_local_vars=$_3c60e0_old_vars['_be59ff'];?>
">
                  <?php $_3c60e0_old_params['_930dab']=$_3c60e0_local_params;$_3c60e0_old_vars['_930dab']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1"><?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_930dab'];$_3c60e0_local_vars=$_3c60e0_old_vars['_930dab'];?>

                  <input <?php $_3c60e0_old_params['_65efc5']=$_3c60e0_local_params;$_3c60e0_old_vars['_65efc5']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_65efc5'];$_3c60e0_local_vars=$_3c60e0_old_vars['_65efc5'];?>
 <?php $_3c60e0_old_params['_736860']=$_3c60e0_local_params;$_3c60e0_old_vars['_736860']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_736860'];$_3c60e0_local_vars=$_3c60e0_old_vars['_736860'];?>
<?php $_3c60e0_old_params['_2410fc']=$_3c60e0_local_params;$_3c60e0_old_vars['_2410fc']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_2410fc'];$_3c60e0_local_vars=$_3c60e0_old_vars['_2410fc'];?>
<?php $_3c60e0_old_params['_76cade']=$_3c60e0_local_params;$_3c60e0_old_vars['_76cade']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_no_primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_32f632']=$_3c60e0_local_params;$_3c60e0_old_vars['_32f632']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_32f632'];$_3c60e0_local_vars=$_3c60e0_old_vars['_32f632'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_76cade'];$_3c60e0_local_vars=$_3c60e0_old_vars['_76cade'];?>
<?php $_3c60e0_old_params['_cd5e9b']=$_3c60e0_local_params;$_3c60e0_old_vars['_cd5e9b']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_cd5e9b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_cd5e9b'];?>
 type="checkbox" class="custom-control-input disp-option-item" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_3c60e0_old_params['_710de4']=$_3c60e0_local_params;$_3c60e0_old_vars['_710de4']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_710de4'];$_3c60e0_local_vars=$_3c60e0_old_vars['_710de4'];?>
"></span>
                  <span class="custom-control-description"> <?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                </label>
                <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_be32b8'];$_3c60e0_local_vars=$_3c60e0_old_vars['_be32b8'];?>

            <?php $_3c60e0_old_params['_c7218f']=$_3c60e0_local_params;$_3c60e0_old_vars['_c7218f']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
            </div>
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c7218f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c7218f'];?>

            <?php endif;$c_c7539a=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_c7539a'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c7539a'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_38bce9'];$_3c60e0_local_vars=$_3c60e0_old_vars['_38bce9'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_32a6bf'];$_3c60e0_local_vars=$_3c60e0_old_vars['_32a6bf'];?>

            <div class="row form-group">
              <div class="col-md-2"><label for="_per_page"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Paging','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <input id="_per_page" step="1" list="per_page_complete" type="number" min="1" max="5000" class="form-control form-control-sm very-short control-inline" name="_per_page" value="<?php echo $this->function_var($this->setup_args(['name'=>'_per_page','this_tag'=>'var'],null,$this),$this)?>
">
                <?php echo $this->function_trans($this->setup_args(['phrase'=>'Items per Page','this_tag'=>'trans'],null,$this),$this)?>

              </div>
            </div>
            <?php $_3c60e0_old_params['_03f96d']=$_3c60e0_local_params;$_3c60e0_old_vars['_03f96d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'search_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <?php $c_c625a2=null;$_3c60e0_old_params['_c625a2']=$_3c60e0_local_params;$_3c60e0_old_vars['_c625a2']=$_3c60e0_local_vars;$a_c625a2=$this->setup_args(['name'=>'search_options','this_tag'=>'loop'],null,$this);$_c625a2=-1;$r_c625a2=true;while($r_c625a2===true):$r_c625a2=($_c625a2!==-1)?false:true;echo $this->block_loop($a_c625a2,$c_c625a2,$this,$r_c625a2,++$_c625a2,'_c625a2');ob_start();?>
<?php $c_c625a2 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_c625a2=false;}if($c_c625a2 ):?>

                  <label class="custom-control custom-checkbox">
                    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                    <input<?php $_3c60e0_old_params['_cc494d']=$_3c60e0_local_params;$_3c60e0_old_vars['_cc494d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_cc494d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_cc494d'];?>
 type="checkbox" class="custom-control-input" name="_s_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"> <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[0]','setvar'=>'search_col','this_tag'=>'var'],null,$this),$this),$this->setup_args('search_col','setvar',$this),$this,'setvar')?>
<?php echo $this->function_trans($this->setup_args(['phrase'=>'$search_col','this_tag'=>'trans'],null,$this),$this)?>
</span>
                  </label>
                <?php endif;$c_c625a2=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_c625a2'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c625a2'];?>

              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search Type','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-5">
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_3c60e0_old_params['_5123c4']=$_3c60e0_local_params;$_3c60e0_old_vars['_5123c4']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_search_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_5123c4'];$_3c60e0_local_vars=$_3c60e0_old_vars['_5123c4'];?>
<?php $_3c60e0_old_params['_c701f7']=$_3c60e0_local_params;$_3c60e0_old_vars['_c701f7']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c701f7'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c701f7'];?>
 name="_user_search_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Phrase','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_3c60e0_old_params['_4c43d0']=$_3c60e0_local_params;$_3c60e0_old_vars['_4c43d0']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_4c43d0'];$_3c60e0_local_vars=$_3c60e0_old_vars['_4c43d0'];?>
 name="_user_search_type" value="2">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'OR','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_3c60e0_old_params['_18c9fe']=$_3c60e0_local_params;$_3c60e0_old_vars['_18c9fe']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_18c9fe'];$_3c60e0_local_vars=$_3c60e0_old_vars['_18c9fe'];?>
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
                  <input type="checkbox" <?php $_3c60e0_old_params['_57768a']=$_3c60e0_local_params;$_3c60e0_old_vars['_57768a']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_user_keep_search','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_57768a'];$_3c60e0_local_vars=$_3c60e0_old_vars['_57768a'];?>
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
                  <input class="custom-control-input" type="radio" <?php $_3c60e0_old_params['_7bc79b']=$_3c60e0_local_params;$_3c60e0_old_vars['_7bc79b']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_replace_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_7bc79b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_7bc79b'];?>
 name="_user_replace_type" value="0">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Insensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_3c60e0_old_params['_dec015']=$_3c60e0_local_params;$_3c60e0_old_vars['_dec015']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_replace_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_dec015'];$_3c60e0_local_vars=$_3c60e0_old_vars['_dec015'];?>
 name="_user_replace_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Sensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
            </div>
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_03f96d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_03f96d'];?>

            <div class="row form-group">
              <?php $c_1de756=null;$_3c60e0_old_params['_1de756']=$_3c60e0_local_params;$_3c60e0_old_vars['_1de756']=$_3c60e0_local_vars;$a_1de756=$this->setup_args(['name'=>'sort_options','this_tag'=>'loop'],null,$this);$_1de756=-1;$r_1de756=true;while($r_1de756===true):$r_1de756=($_1de756!==-1)?false:true;echo $this->block_loop($a_1de756,$c_1de756,$this,$r_1de756,++$_1de756,'_1de756');ob_start();?>
<?php $c_1de756 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_1de756=false;}if($c_1de756 ):?>

              <?php $_3c60e0_old_params['_e657ec']=$_3c60e0_local_params;$_3c60e0_old_vars['_e657ec']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Sort','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-7">
              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e657ec'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e657ec'];?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <label class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" <?php $_3c60e0_old_params['_ae9fd2']=$_3c60e0_local_params;$_3c60e0_old_vars['_ae9fd2']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ae9fd2'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ae9fd2'];?>
 name="_user_sort_by" value="<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                  </label>
              <?php $_3c60e0_old_params['_4bfcd1']=$_3c60e0_local_params;$_3c60e0_old_vars['_4bfcd1']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
              <div class="col-md-3">
                <select name="_user_sort_order" class="form-control custom-select">
                  <?php $c_75ffe8=null;$_3c60e0_old_params['_75ffe8']=$_3c60e0_local_params;$_3c60e0_old_vars['_75ffe8']=$_3c60e0_local_vars;$a_75ffe8=$this->setup_args(['name'=>'order_options','this_tag'=>'loop'],null,$this);$_75ffe8=-1;$r_75ffe8=true;while($r_75ffe8===true):$r_75ffe8=($_75ffe8!==-1)?false:true;echo $this->block_loop($a_75ffe8,$c_75ffe8,$this,$r_75ffe8,++$_75ffe8,'_75ffe8');ob_start();?>
<?php $c_75ffe8 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_75ffe8=false;}if($c_75ffe8 ):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"<?php $_3c60e0_old_params['_971cbc']=$_3c60e0_local_params;$_3c60e0_old_vars['_971cbc']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 selected<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_971cbc'];$_3c60e0_local_vars=$_3c60e0_old_vars['_971cbc'];?>
><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</option>
                  <?php endif;$c_75ffe8=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_75ffe8'];$_3c60e0_local_vars=$_3c60e0_old_vars['_75ffe8'];?>

                </select>
              </div>
              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_4bfcd1'];$_3c60e0_local_vars=$_3c60e0_old_vars['_4bfcd1'];?>

              <?php endif;$c_1de756=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_1de756'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1de756'];?>

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

<?php $_3c60e0_old_params['_4fd275']=$_3c60e0_local_params;$_3c60e0_old_vars['_4fd275']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'dialog_max_cols','setvar'=>'_list_max_cols','this_tag'=>'property'],null,$this),$this),$this->setup_args('_list_max_cols','setvar',$this),$this,'setvar')?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_4fd275'];$_3c60e0_local_vars=$_3c60e0_old_vars['_4fd275'];?>

<?php $_3c60e0_old_params['_6a73b8']=$_3c60e0_local_params;$_3c60e0_old_vars['_6a73b8']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_list_max_cols','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
      <?php $_3c60e0_old_params['_a06387']=$_3c60e0_local_params;$_3c60e0_old_vars['_a06387']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the dialog.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php else:?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the display.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a06387'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a06387'];?>

    }
});
</script>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_6a73b8'];$_3c60e0_local_vars=$_3c60e0_old_vars['_6a73b8'];?>

<?php endif;$_773387=ob_get_clean();echo $this->modifier_trim_space($_773387,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_3c60e0_local_params=$_3c60e0_old_params['_773387'];$_3c60e0_local_vars=$_3c60e0_old_vars['_773387'];?>

            <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_8cb10f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8cb10f'];?>

            <?php $_3c60e0_old_params['_60465d']=$_3c60e0_local_params;$_3c60e0_old_vars['_60465d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
              <?php $_3c60e0_old_params['_53993a']=$_3c60e0_local_params;$_3c60e0_old_vars['_53993a']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_53993a'];$_3c60e0_local_vars=$_3c60e0_old_vars['_53993a'];?>

                <div class="form-inline" style="margin: 10px 7px">
                  <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload Path','this_tag'=>'trans'],null,$this),$this)?>

                  <?php $_3c60e0_old_params['_9538f4']=$_3c60e0_local_params;$_3c60e0_old_vars['_9538f4']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model_out_path','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->modifier_add_slash(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model_out_path','escape'=>'','add_slash'=>'','setvar'=>'model_out_path','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('','add_slash',$this),$this,'add_slash'),$this->setup_args('model_out_path','setvar',$this),$this,'setvar')?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'extra_path','value'=>'$model_out_path','append'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_9538f4'];$_3c60e0_local_vars=$_3c60e0_old_vars['_9538f4'];?>

                  <input id="extra_path" type="text" style="width:200px;" class="form-control" name="extra_path" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'extra_path','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                  <?php echo $this->function_setvar($this->setup_args(['name'=>'upload_paths','value'=>'$extra_path','function'=>'unshift','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php echo $this->modifier_setvar($this->modifier_array_unique($this->function_var($this->setup_args(['name'=>'upload_paths','array_unique'=>'','setvar'=>'upload_paths','this_tag'=>'var'],null,$this),$this),$this->setup_args('','array_unique',$this),$this,'array_unique'),$this->setup_args('upload_paths','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_count($this->setup_args(['name'=>'$upload_paths','setvar'=>'path_cnt','this_tag'=>'count'],null,$this),$this),$this->setup_args('path_cnt','setvar',$this),$this,'setvar')?>

                <?php $_3c60e0_old_params['_e2812b']=$_3c60e0_local_params;$_3c60e0_old_vars['_e2812b']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'path_cnt','gt'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <div id="upload_paths-box">
                  <?php $c_908061=null;$_3c60e0_old_params['_908061']=$_3c60e0_local_params;$_3c60e0_old_vars['_908061']=$_3c60e0_local_vars;$a_908061=$this->setup_args(['name'=>'upload_paths','this_tag'=>'loop'],null,$this);$_908061=-1;$r_908061=true;while($r_908061===true):$r_908061=($_908061!==-1)?false:true;echo $this->block_loop($a_908061,$c_908061,$this,$r_908061,++$_908061,'_908061');ob_start();?>
<?php $c_908061 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_908061=false;}if($c_908061 ):?>

                    <?php $_3c60e0_old_params['_ae094c']=$_3c60e0_local_params;$_3c60e0_old_vars['_ae094c']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button class="btn ml-3 btn-secondary" id="toggle-upload_path"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <span class="hidden" id="upload_path-wrapper">
                    <select class="form-control custom-select short" name="upload_path" id="upload_path"><?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ae094c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ae094c'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_3c60e0_old_params['_338ae1']=$_3c60e0_local_params;$_3c60e0_old_vars['_338ae1']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'extra_path','eq'=>'$__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_338ae1'];$_3c60e0_local_vars=$_3c60e0_old_vars['_338ae1'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php $_3c60e0_old_params['_8a302e']=$_3c60e0_local_params;$_3c60e0_old_vars['_8a302e']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</select>
                    <button class="btn ml-0 btn-secondary btn-sm" id="clear-upload_path">  <i class="fa fa-trash" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Clear','this_tag'=>'trans'],null,$this),$this)?>
</span></button>
                    </span>
                  </div>
                    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_8a302e'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8a302e'];?>

                  <?php endif;$c_908061=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_908061'];$_3c60e0_local_vars=$_3c60e0_old_vars['_908061'];?>

                <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e2812b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e2812b'];?>

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

<?php $_3c60e0_old_params['_8b8cc6']=$_3c60e0_local_params;$_3c60e0_old_vars['_8b8cc6']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&filter_params=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&filter_params=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&magic_token=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&magic_token=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&query=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&query=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_8b8cc6'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8b8cc6'];?>

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
?<?php $_3c60e0_old_params['_ad6980']=$_3c60e0_local_params;$_3c60e0_old_vars['_ad6980']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ad6980'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ad6980'];?>
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
$('#drop-zone').css('border','3px dashed <?php $_3c60e0_old_params['_23a100']=$_3c60e0_local_params;$_3c60e0_old_vars['_23a100']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
#ccc<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_23a100'];$_3c60e0_local_vars=$_3c60e0_old_vars['_23a100'];?>
');
$('#drop-zone').css('margin','1px');
$('#drop-zone').css('padding','8px');
$(function () {
    'use strict';
    var url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=upload_multi&magic_token=<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&model=asset&name=file<?php $_3c60e0_old_params['_50fa05']=$_3c60e0_local_params;$_3c60e0_old_vars['_50fa05']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','eq'=>'filter_class_image','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&select_system_filters=filter_class_image<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_50fa05'];$_3c60e0_local_vars=$_3c60e0_old_vars['_50fa05'];?>
';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        dropZone: $("#drop-zone"),
        // formData: {extra_path: $('#extra_path').val()},
        add: function (e, data) {
            data.formData = {extra_path: $('#extra_path').val()<?php $_3c60e0_old_params['_919faf']=$_3c60e0_local_params;$_3c60e0_old_vars['_919faf']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
, overwrite: $('#asset_overwrite').val()<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_919faf'];$_3c60e0_local_vars=$_3c60e0_old_vars['_919faf'];?>
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
    <?php $_3c60e0_old_params['_1fcd39']=$_3c60e0_local_params;$_3c60e0_old_vars['_1fcd39']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    $("#__mode").prop('value', 'insert_asset');
    $("#list-select-form").submit();
    <?php else:?>

    submit_params_to_post( this_url );
    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_1fcd39'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1fcd39'];?>

}
</script>
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_60465d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_60465d'];?>

        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_2c9458'];$_3c60e0_local_vars=$_3c60e0_old_vars['_2c9458'];?>

        <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

          <?php $_3c60e0_old_params['_34b05b']=$_3c60e0_local_params;$_3c60e0_old_vars['_34b05b']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php ob_start();$_3c60e0_old_params['_2c7641']=$_3c60e0_local_params;$_3c60e0_old_vars['_2c7641']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
        <?php $_3c60e0_old_params['_0baf54']=$_3c60e0_local_params;$_3c60e0_old_vars['_0baf54']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_0baf54'];$_3c60e0_local_vars=$_3c60e0_old_vars['_0baf54'];?>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10" id="edit_options_loop">
              <span id="_start_options"></span>
          <?php $_3c60e0_old_params['_a95bd5']=$_3c60e0_local_params;$_3c60e0_old_vars['_a95bd5']=$_3c60e0_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

            <?php $c_ddac12=null;$_3c60e0_old_params['_ddac12']=$_3c60e0_local_params;$_3c60e0_old_vars['_ddac12']=$_3c60e0_local_vars;$a_ddac12=$this->setup_args(['type'=>'edit','option'=>'1','this_tag'=>'objectcols'],null,$this);$_ddac12=-1;$r_ddac12=true;while($r_ddac12===true):$r_ddac12=($_ddac12!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_ddac12,$c_ddac12,$this,$r_ddac12,++$_ddac12,'_ddac12');ob_start();?>
<?php $c_ddac12 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_ddac12=false;}if($c_ddac12 ):?>

              <?php $_3c60e0_old_params['_6b0d07']=$_3c60e0_local_params;$_3c60e0_old_vars['_6b0d07']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','ne'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_3c60e0_old_params['_f93e40']=$_3c60e0_local_params;$_3c60e0_old_vars['_f93e40']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'hidden','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_3c60e0_old_params['_139235']=$_3c60e0_local_params;$_3c60e0_old_vars['_139235']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'allow_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'accept_comment','setvar'=>'accept_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

                    <?php $_3c60e0_old_params['_c99176']=$_3c60e0_local_params;$_3c60e0_old_vars['_c99176']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <?php $_3c60e0_old_params['_52d61c']=$_3c60e0_local_params;$_3c60e0_old_vars['_52d61c']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_52d61c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_52d61c'];?>

                    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c99176'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c99176'];?>

                  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_139235'];$_3c60e0_local_vars=$_3c60e0_old_vars['_139235'];?>

                <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f93e40'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f93e40'];?>

                <?php $_3c60e0_old_params['_dbb75b']=$_3c60e0_local_params;$_3c60e0_old_vars['_dbb75b']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_3c60e0_old_params['_f9654f']=$_3c60e0_local_params;$_3c60e0_old_vars['_f9654f']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f9654f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f9654f'];?>

                  <?php $_3c60e0_old_params['_c0df23']=$_3c60e0_local_params;$_3c60e0_old_vars['_c0df23']=$_3c60e0_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c0df23'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c0df23'];?>

                  <label class="edit-options-child <?php $_3c60e0_old_params['_fffff6']=$_3c60e0_local_params;$_3c60e0_old_vars['_fffff6']=$_3c60e0_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_fffff6'];$_3c60e0_local_vars=$_3c60e0_old_vars['_fffff6'];?>
custom-control custom-checkbox" id="label-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                    <?php $_3c60e0_old_params['_a1d148']=$_3c60e0_local_params;$_3c60e0_old_vars['_a1d148']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <input type="hidden" id="" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a1d148'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a1d148'];?>

                    <input<?php $_3c60e0_old_params['_1e9e47']=$_3c60e0_local_params;$_3c60e0_old_vars['_1e9e47']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php else:?>
<?php $_3c60e0_old_params['_c34929']=$_3c60e0_local_params;$_3c60e0_old_vars['_c34929']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 onclick="return false;" checked <?php else:?>

                    <?php $_3c60e0_old_params['_f2b7b8']=$_3c60e0_local_params;$_3c60e0_old_vars['_f2b7b8']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f2b7b8'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f2b7b8'];?>

                    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c34929'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c34929'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_1e9e47'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1e9e47'];?>
<?php $_3c60e0_old_params['_6701a1']=$_3c60e0_local_params;$_3c60e0_old_vars['_6701a1']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_6701a1'];$_3c60e0_local_vars=$_3c60e0_old_vars['_6701a1'];?>
 type="<?php $_3c60e0_old_params['_c93610']=$_3c60e0_local_params;$_3c60e0_old_vars['_c93610']=$_3c60e0_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
checkbox<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c93610'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c93610'];?>
" class="custom-control-input disp_option disp_option-cb" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator<?php $_3c60e0_old_params['_df2c1f']=$_3c60e0_local_params;$_3c60e0_old_vars['_df2c1f']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_df2c1f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_df2c1f'];?>
<?php $_3c60e0_old_params['_3d42f1']=$_3c60e0_local_params;$_3c60e0_old_vars['_3d42f1']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3d42f1'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3d42f1'];?>
"></span>
                    <span class="custom-control-description"> 
                    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
                  </label>
                <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_dbb75b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_dbb75b'];?>

              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_6b0d07'];$_3c60e0_local_vars=$_3c60e0_old_vars['_6b0d07'];?>

            <?php endif;$c_ddac12=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_ddac12'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ddac12'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a95bd5'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a95bd5'];?>

                <?php $c_bd5a5c=null;$_3c60e0_old_params['_bd5a5c']=$_3c60e0_local_params;$_3c60e0_old_vars['_bd5a5c']=$_3c60e0_local_vars;$a_bd5a5c=$this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$model','id'=>'$object_id','this_tag'=>'fieldloop'],null,$this);$_bd5a5c=-1;$r_bd5a5c=true;while($r_bd5a5c===true):$r_bd5a5c=($_bd5a5c!==-1)?false:true;echo $this->component('PTTags')->hdlr_fieldloop($a_bd5a5c,$c_bd5a5c,$this,$r_bd5a5c,++$_bd5a5c,'_bd5a5c');ob_start();?>
<?php $c_bd5a5c = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_bd5a5c=false;}if($c_bd5a5c ):?>

                <?php $c_e83231=null;$_3c60e0_old_params['_e83231']=$_3c60e0_local_params;$_3c60e0_old_vars['_e83231']=$_3c60e0_local_vars;$a_e83231=$this->setup_args(['name'=>'_fieldbasename','this_tag'=>'setvarblock'],null,$this);ob_start();?>
field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_e83231=ob_get_clean();$c_e83231=$this->block_setvarblock($a_e83231,$c_e83231,$this,$r_e83231,1,'_e83231');echo($c_e83231); $_3c60e0_local_params=$_3c60e0_old_params['_e83231'];?>

                <label class="<?php $_3c60e0_old_params['_5b336e']=$_3c60e0_local_params;$_3c60e0_old_vars['_5b336e']=$_3c60e0_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_5b336e'];$_3c60e0_local_vars=$_3c60e0_old_vars['_5b336e'];?>
custom-control custom-checkbox" id="label-<?php echo $this->function_var($this->setup_args(['name'=>'_fieldbasename','this_tag'=>'var'],null,$this),$this)?>
">
                  <input<?php $_3c60e0_old_params['_0e3307']=$_3c60e0_local_params;$_3c60e0_old_vars['_0e3307']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_0e3307'];$_3c60e0_local_vars=$_3c60e0_old_vars['_0e3307'];?>

                  <?php $_3c60e0_old_params['_5369d2']=$_3c60e0_local_params;$_3c60e0_old_vars['_5369d2']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_5369d2'];$_3c60e0_local_vars=$_3c60e0_old_vars['_5369d2'];?>

                  <?php $_3c60e0_old_params['_a09dc0']=$_3c60e0_local_params;$_3c60e0_old_vars['_a09dc0']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a09dc0'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a09dc0'];?>
 <?php $_3c60e0_old_params['_bdbe04']=$_3c60e0_local_params;$_3c60e0_old_vars['_bdbe04']=$_3c60e0_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_bdbe04'];$_3c60e0_local_vars=$_3c60e0_old_vars['_bdbe04'];?>
 type="checkbox" class="custom-control-input disp_option disp_option-cb" id="field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_3c60e0_old_params['_fee912']=$_3c60e0_local_params;$_3c60e0_old_vars['_fee912']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_fee912'];$_3c60e0_local_vars=$_3c60e0_old_vars['_fee912'];?>
"></span>
                  <span class="custom-control-description"> 
                  <?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'field__name','trans'=>'1','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans'),ENT_QUOTES)?>
</span>
                </label>
                <?php endif;$c_bd5a5c=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_bd5a5c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_bd5a5c'];?>

              <?php $_3c60e0_old_params['_8cab65']=$_3c60e0_local_params;$_3c60e0_old_vars['_8cab65']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div>
                  <p class="text-muted hint-block">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can change the display order of fields with drag &amp; drop.','this_tag'=>'trans'],null,$this),$this)?>

                  </p>
                </div>
              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_8cab65'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8cab65'];?>

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
<?php endif;$_2c7641=ob_get_clean();echo $this->modifier_trim_space($_2c7641,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_3c60e0_local_params=$_3c60e0_old_params['_2c7641'];$_3c60e0_local_vars=$_3c60e0_old_vars['_2c7641'];?>

<script>
<?php $_3c60e0_old_params['_a8a73d']=$_3c60e0_local_params;$_3c60e0_old_vars['_a8a73d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#edit_options_loop').sortable({
    stop: function( evt, ui ) {
        sort_fields();
    }
});
$("#edit_options_loop").ksortable();
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a8a73d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a8a73d'];?>

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

<?php $_3c60e0_old_params['_bf742d']=$_3c60e0_local_params;$_3c60e0_old_vars['_bf742d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_bf742d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_bf742d'];?>

    }
    updateFieldSelector();
});
</script>
            <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_34b05b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_34b05b'];?>

        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_cb87e7'];$_3c60e0_local_vars=$_3c60e0_old_vars['_cb87e7'];?>

    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c5d50d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c5d50d'];?>

    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_1aefcd'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1aefcd'];?>

  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_eba2bb'];$_3c60e0_local_vars=$_3c60e0_old_vars['_eba2bb'];?>

  <?php $_3c60e0_old_params['_bc0f67']=$_3c60e0_local_params;$_3c60e0_old_vars['_bc0f67']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'save','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    
    <?php $_3c60e0_old_params['_d4303d']=$_3c60e0_local_params;$_3c60e0_old_vars['_d4303d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php ob_start();$_3c60e0_old_params['_e973f0']=$_3c60e0_local_params;$_3c60e0_old_vars['_e973f0']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
        <?php $_3c60e0_old_params['_621243']=$_3c60e0_local_params;$_3c60e0_old_vars['_621243']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_621243'];$_3c60e0_local_vars=$_3c60e0_old_vars['_621243'];?>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10" id="edit_options_loop">
              <span id="_start_options"></span>
          <?php $_3c60e0_old_params['_131875']=$_3c60e0_local_params;$_3c60e0_old_vars['_131875']=$_3c60e0_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

            <?php $c_fda278=null;$_3c60e0_old_params['_fda278']=$_3c60e0_local_params;$_3c60e0_old_vars['_fda278']=$_3c60e0_local_vars;$a_fda278=$this->setup_args(['type'=>'edit','option'=>'1','this_tag'=>'objectcols'],null,$this);$_fda278=-1;$r_fda278=true;while($r_fda278===true):$r_fda278=($_fda278!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_fda278,$c_fda278,$this,$r_fda278,++$_fda278,'_fda278');ob_start();?>
<?php $c_fda278 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_fda278=false;}if($c_fda278 ):?>

              <?php $_3c60e0_old_params['_75feb6']=$_3c60e0_local_params;$_3c60e0_old_vars['_75feb6']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','ne'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_3c60e0_old_params['_b0bc46']=$_3c60e0_local_params;$_3c60e0_old_vars['_b0bc46']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'hidden','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_3c60e0_old_params['_b022fd']=$_3c60e0_local_params;$_3c60e0_old_vars['_b022fd']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'allow_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'accept_comment','setvar'=>'accept_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

                    <?php $_3c60e0_old_params['_4eb50d']=$_3c60e0_local_params;$_3c60e0_old_vars['_4eb50d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <?php $_3c60e0_old_params['_147b26']=$_3c60e0_local_params;$_3c60e0_old_vars['_147b26']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_147b26'];$_3c60e0_local_vars=$_3c60e0_old_vars['_147b26'];?>

                    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_4eb50d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_4eb50d'];?>

                  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b022fd'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b022fd'];?>

                <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b0bc46'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b0bc46'];?>

                <?php $_3c60e0_old_params['_a6da69']=$_3c60e0_local_params;$_3c60e0_old_vars['_a6da69']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_3c60e0_old_params['_608e08']=$_3c60e0_local_params;$_3c60e0_old_vars['_608e08']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_608e08'];$_3c60e0_local_vars=$_3c60e0_old_vars['_608e08'];?>

                  <?php $_3c60e0_old_params['_d41a59']=$_3c60e0_local_params;$_3c60e0_old_vars['_d41a59']=$_3c60e0_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_d41a59'];$_3c60e0_local_vars=$_3c60e0_old_vars['_d41a59'];?>

                  <label class="edit-options-child <?php $_3c60e0_old_params['_36bddc']=$_3c60e0_local_params;$_3c60e0_old_vars['_36bddc']=$_3c60e0_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_36bddc'];$_3c60e0_local_vars=$_3c60e0_old_vars['_36bddc'];?>
custom-control custom-checkbox" id="label-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                    <?php $_3c60e0_old_params['_6f5438']=$_3c60e0_local_params;$_3c60e0_old_vars['_6f5438']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <input type="hidden" id="" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_6f5438'];$_3c60e0_local_vars=$_3c60e0_old_vars['_6f5438'];?>

                    <input<?php $_3c60e0_old_params['_e1462a']=$_3c60e0_local_params;$_3c60e0_old_vars['_e1462a']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php else:?>
<?php $_3c60e0_old_params['_3d8e26']=$_3c60e0_local_params;$_3c60e0_old_vars['_3d8e26']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 onclick="return false;" checked <?php else:?>

                    <?php $_3c60e0_old_params['_2625a5']=$_3c60e0_local_params;$_3c60e0_old_vars['_2625a5']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_2625a5'];$_3c60e0_local_vars=$_3c60e0_old_vars['_2625a5'];?>

                    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3d8e26'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3d8e26'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e1462a'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e1462a'];?>
<?php $_3c60e0_old_params['_fb4d4a']=$_3c60e0_local_params;$_3c60e0_old_vars['_fb4d4a']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_fb4d4a'];$_3c60e0_local_vars=$_3c60e0_old_vars['_fb4d4a'];?>
 type="<?php $_3c60e0_old_params['_9a8fc0']=$_3c60e0_local_params;$_3c60e0_old_vars['_9a8fc0']=$_3c60e0_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
checkbox<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_9a8fc0'];$_3c60e0_local_vars=$_3c60e0_old_vars['_9a8fc0'];?>
" class="custom-control-input disp_option disp_option-cb" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator<?php $_3c60e0_old_params['_c0949c']=$_3c60e0_local_params;$_3c60e0_old_vars['_c0949c']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c0949c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c0949c'];?>
<?php $_3c60e0_old_params['_554ef7']=$_3c60e0_local_params;$_3c60e0_old_vars['_554ef7']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_554ef7'];$_3c60e0_local_vars=$_3c60e0_old_vars['_554ef7'];?>
"></span>
                    <span class="custom-control-description"> 
                    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
                  </label>
                <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a6da69'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a6da69'];?>

              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_75feb6'];$_3c60e0_local_vars=$_3c60e0_old_vars['_75feb6'];?>

            <?php endif;$c_fda278=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_fda278'];$_3c60e0_local_vars=$_3c60e0_old_vars['_fda278'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_131875'];$_3c60e0_local_vars=$_3c60e0_old_vars['_131875'];?>

                <?php $c_872301=null;$_3c60e0_old_params['_872301']=$_3c60e0_local_params;$_3c60e0_old_vars['_872301']=$_3c60e0_local_vars;$a_872301=$this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$model','id'=>'$object_id','this_tag'=>'fieldloop'],null,$this);$_872301=-1;$r_872301=true;while($r_872301===true):$r_872301=($_872301!==-1)?false:true;echo $this->component('PTTags')->hdlr_fieldloop($a_872301,$c_872301,$this,$r_872301,++$_872301,'_872301');ob_start();?>
<?php $c_872301 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_872301=false;}if($c_872301 ):?>

                <?php $c_82d9e9=null;$_3c60e0_old_params['_82d9e9']=$_3c60e0_local_params;$_3c60e0_old_vars['_82d9e9']=$_3c60e0_local_vars;$a_82d9e9=$this->setup_args(['name'=>'_fieldbasename','this_tag'=>'setvarblock'],null,$this);ob_start();?>
field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_82d9e9=ob_get_clean();$c_82d9e9=$this->block_setvarblock($a_82d9e9,$c_82d9e9,$this,$r_82d9e9,1,'_82d9e9');echo($c_82d9e9); $_3c60e0_local_params=$_3c60e0_old_params['_82d9e9'];?>

                <label class="<?php $_3c60e0_old_params['_17c32e']=$_3c60e0_local_params;$_3c60e0_old_vars['_17c32e']=$_3c60e0_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_17c32e'];$_3c60e0_local_vars=$_3c60e0_old_vars['_17c32e'];?>
custom-control custom-checkbox" id="label-<?php echo $this->function_var($this->setup_args(['name'=>'_fieldbasename','this_tag'=>'var'],null,$this),$this)?>
">
                  <input<?php $_3c60e0_old_params['_aee9ba']=$_3c60e0_local_params;$_3c60e0_old_vars['_aee9ba']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_aee9ba'];$_3c60e0_local_vars=$_3c60e0_old_vars['_aee9ba'];?>

                  <?php $_3c60e0_old_params['_8d108d']=$_3c60e0_local_params;$_3c60e0_old_vars['_8d108d']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_8d108d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8d108d'];?>

                  <?php $_3c60e0_old_params['_b23cb5']=$_3c60e0_local_params;$_3c60e0_old_vars['_b23cb5']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b23cb5'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b23cb5'];?>
 <?php $_3c60e0_old_params['_56e522']=$_3c60e0_local_params;$_3c60e0_old_vars['_56e522']=$_3c60e0_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_56e522'];$_3c60e0_local_vars=$_3c60e0_old_vars['_56e522'];?>
 type="checkbox" class="custom-control-input disp_option disp_option-cb" id="field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_3c60e0_old_params['_29e5f3']=$_3c60e0_local_params;$_3c60e0_old_vars['_29e5f3']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_29e5f3'];$_3c60e0_local_vars=$_3c60e0_old_vars['_29e5f3'];?>
"></span>
                  <span class="custom-control-description"> 
                  <?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'field__name','trans'=>'1','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans'),ENT_QUOTES)?>
</span>
                </label>
                <?php endif;$c_872301=ob_get_clean();endwhile; $_3c60e0_local_params=$_3c60e0_old_params['_872301'];$_3c60e0_local_vars=$_3c60e0_old_vars['_872301'];?>

              <?php $_3c60e0_old_params['_bc6ebf']=$_3c60e0_local_params;$_3c60e0_old_vars['_bc6ebf']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div>
                  <p class="text-muted hint-block">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can change the display order of fields with drag &amp; drop.','this_tag'=>'trans'],null,$this),$this)?>

                  </p>
                </div>
              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_bc6ebf'];$_3c60e0_local_vars=$_3c60e0_old_vars['_bc6ebf'];?>

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
<?php endif;$_e973f0=ob_get_clean();echo $this->modifier_trim_space($_e973f0,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_3c60e0_local_params=$_3c60e0_old_params['_e973f0'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e973f0'];?>

<script>
<?php $_3c60e0_old_params['_6ec791']=$_3c60e0_local_params;$_3c60e0_old_vars['_6ec791']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#edit_options_loop').sortable({
    stop: function( evt, ui ) {
        sort_fields();
    }
});
$("#edit_options_loop").ksortable();
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_6ec791'];$_3c60e0_local_vars=$_3c60e0_old_vars['_6ec791'];?>

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

<?php $_3c60e0_old_params['_405a2c']=$_3c60e0_local_params;$_3c60e0_old_vars['_405a2c']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_405a2c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_405a2c'];?>

    }
    updateFieldSelector();
});
</script>
      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_d4303d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_d4303d'];?>

  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_bc0f67'];$_3c60e0_local_vars=$_3c60e0_old_vars['_bc0f67'];?>

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
<?php $_3c60e0_old_params['_f306e4']=$_3c60e0_local_params;$_3c60e0_old_vars['_f306e4']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'output_container','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <div class="container-fluid">
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f306e4'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f306e4'];?>

      <div class="row">
        <main class="col-md-12 pt-3">
          <h1 id="page-title" <?php $_3c60e0_old_params['_7aa4f9']=$_3c60e0_local_params;$_3c60e0_old_vars['_7aa4f9']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_8bd810']=$_3c60e0_local_params;$_3c60e0_old_vars['_8bd810']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_ad7ca0']=$_3c60e0_local_params;$_3c60e0_old_vars['_ad7ca0']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-top:-33px"<?php else:?>
style="margin-top:-36px"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ad7ca0'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ad7ca0'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_8bd810'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8bd810'];?>
 class="title-with-opt"<?php else:?>
 <?php $_3c60e0_old_params['_3dc606']=$_3c60e0_local_params;$_3c60e0_old_vars['_3dc606']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_8dcf22']=$_3c60e0_local_params;$_3c60e0_old_vars['_8dcf22']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
style="margin-top:-3px"<?php else:?>
style="margin-top:-11px"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_8dcf22'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8dcf22'];?>
<?php else:?>
style="margin-top:-10px"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3dc606'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3dc606'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_7aa4f9'];$_3c60e0_local_vars=$_3c60e0_old_vars['_7aa4f9'];?>
>
          <span class="title">
          <?php $_3c60e0_old_params['_0de386']=$_3c60e0_local_params;$_3c60e0_old_vars['_0de386']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_0a1c42']=$_3c60e0_local_params;$_3c60e0_old_vars['_0a1c42']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php $_3c60e0_old_params['_735b91']=$_3c60e0_local_params;$_3c60e0_old_vars['_735b91']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;manage_revision=1<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.revision_select','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&amp;manage_revision=1<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_735b91'];$_3c60e0_local_vars=$_3c60e0_old_vars['_735b91'];?>
"><?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_0a1c42'];$_3c60e0_local_vars=$_3c60e0_old_vars['_0a1c42'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_0de386'];$_3c60e0_local_vars=$_3c60e0_old_vars['_0de386'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'page_title','this_tag'=>'var'],null,$this),$this)?>
<?php $_3c60e0_old_params['_c8a307']=$_3c60e0_local_params;$_3c60e0_old_vars['_c8a307']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_0a6b11']=$_3c60e0_local_params;$_3c60e0_old_vars['_0a6b11']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</a><?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_0a6b11'];$_3c60e0_local_vars=$_3c60e0_old_vars['_0a6b11'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c8a307'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c8a307'];?>

          </span>
          <?php echo $this->function_var($this->setup_args(['name'=>'add_heading','this_tag'=>'var'],null,$this),$this)?>

      <?php $_3c60e0_old_params['_61995b']=$_3c60e0_local_params;$_3c60e0_old_vars['_61995b']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php $_3c60e0_old_params['_a27019']=$_3c60e0_local_params;$_3c60e0_old_vars['_a27019']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_3c60e0_old_params['_04d215']=$_3c60e0_local_params;$_3c60e0_old_vars['_04d215']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_3c60e0_old_params['_87c65d']=$_3c60e0_local_params;$_3c60e0_old_vars['_87c65d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'dashboard','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_3c60e0_old_params['_c9e491']=$_3c60e0_local_params;$_3c60e0_old_vars['_c9e491']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'error','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_3c60e0_old_params['_8e7bf0']=$_3c60e0_local_params;$_3c60e0_old_vars['_8e7bf0']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#filterOptions">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Filters','this_tag'=>'trans'],null,$this),$this)?>

          </button>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_8e7bf0'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8e7bf0'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_c9e491'];$_3c60e0_local_vars=$_3c60e0_old_vars['_c9e491'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_87c65d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_87c65d'];?>

        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_04d215'];$_3c60e0_local_vars=$_3c60e0_old_vars['_04d215'];?>

        <?php $_3c60e0_old_params['_07d4f5']=$_3c60e0_local_params;$_3c60e0_old_vars['_07d4f5']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'can_create','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_3c60e0_old_params['_fb21d9']=$_3c60e0_local_params;$_3c60e0_old_vars['_fb21d9']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_3c60e0_old_params['_f45ae9']=$_3c60e0_local_params;$_3c60e0_old_vars['_f45ae9']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_3c60e0_old_params['_79eec2']=$_3c60e0_local_params;$_3c60e0_old_vars['_79eec2']=$_3c60e0_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'update_all','model'=>'$this_model','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_79eec2'];$_3c60e0_local_vars=$_3c60e0_old_vars['_79eec2'];?>

            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f45ae9'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f45ae9'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_fb21d9'];$_3c60e0_local_vars=$_3c60e0_old_vars['_fb21d9'];?>

        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_07d4f5'];$_3c60e0_local_vars=$_3c60e0_old_vars['_07d4f5'];?>

        <?php $_3c60e0_old_params['_b9bd14']=$_3c60e0_local_params;$_3c60e0_old_vars['_b9bd14']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_create','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_3c60e0_old_params['_243799']=$_3c60e0_local_params;$_3c60e0_old_vars['_243799']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_3c60e0_old_params['_37e088']=$_3c60e0_local_params;$_3c60e0_old_vars['_37e088']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'label','setvar'=>'orig_label','this_tag'=>'var'],null,$this),$this),$this->setup_args('orig_label','setvar',$this),$this,'setvar')?>

              <?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'Syetem\'s Role','setvar'=>'label','this_tag'=>'trans'],null,$this),$this),$this->setup_args('label','setvar',$this),$this,'setvar')?>

            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_37e088'];$_3c60e0_local_vars=$_3c60e0_old_vars['_37e088'];?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php $_3c60e0_old_params['_1d1dfb']=$_3c60e0_local_params;$_3c60e0_old_vars['_1d1dfb']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._system_filters_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_706dde']=$_3c60e0_local_params;$_3c60e0_old_vars['_706dde']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'tag','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;tag_obj=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_706dde'];$_3c60e0_local_vars=$_3c60e0_old_vars['_706dde'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_1d1dfb'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1d1dfb'];?>
">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php $_3c60e0_old_params['_a43819']=$_3c60e0_local_params;$_3c60e0_old_vars['_a43819']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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

            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a43819'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a43819'];?>

            <?php $_3c60e0_old_params['_3d6330']=$_3c60e0_local_params;$_3c60e0_old_vars['_3d6330']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_9406ef']=$_3c60e0_local_params;$_3c60e0_old_vars['_9406ef']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_9406ef'];$_3c60e0_local_vars=$_3c60e0_old_vars['_9406ef'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3d6330'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3d6330'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_243799'];$_3c60e0_local_vars=$_3c60e0_old_vars['_243799'];?>

          <?php $_3c60e0_old_params['_b816d2']=$_3c60e0_local_params;$_3c60e0_old_vars['_b816d2']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_3c60e0_old_params['_8dcabf']=$_3c60e0_local_params;$_3c60e0_old_vars['_8dcabf']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.saved','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_3c60e0_old_params['_8a1f0b']=$_3c60e0_local_params;$_3c60e0_old_vars['_8a1f0b']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_35116c']=$_3c60e0_local_params;$_3c60e0_old_vars['_35116c']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request._profile','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_3c60e0_old_params['_29fed8']=$_3c60e0_local_params;$_3c60e0_old_vars['_29fed8']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','ne'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_29fed8'];$_3c60e0_local_vars=$_3c60e0_old_vars['_29fed8'];?>
">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_35116c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_35116c'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_8a1f0b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8a1f0b'];?>

            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_8dcabf'];$_3c60e0_local_vars=$_3c60e0_old_vars['_8dcabf'];?>

            <?php $_3c60e0_old_params['_f81ad8']=$_3c60e0_local_params;$_3c60e0_old_vars['_f81ad8']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','ne'=>'hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_3c60e0_old_params['_dfe591']=$_3c60e0_local_params;$_3c60e0_old_vars['_dfe591']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'user','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_3c60e0_old_params['_934e12']=$_3c60e0_local_params;$_3c60e0_old_vars['_934e12']=$_3c60e0_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_954e82']=$_3c60e0_local_params;$_3c60e0_old_vars['_954e82']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request._profile','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

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
              <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_954e82'];$_3c60e0_local_vars=$_3c60e0_old_vars['_954e82'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_934e12'];$_3c60e0_local_vars=$_3c60e0_old_vars['_934e12'];?>

            <?php else:?>

          <a class="btn btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_3c60e0_old_params['_7743b4']=$_3c60e0_local_params;$_3c60e0_old_vars['_7743b4']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._model','ne'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_7743b4'];$_3c60e0_local_vars=$_3c60e0_old_vars['_7743b4'];?>
">
            <i class="hidden fa fa-list" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php $_3c60e0_old_params['_55a490']=$_3c60e0_local_params;$_3c60e0_old_vars['_55a490']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_3c60e0_old_params['_cbfcf0']=$_3c60e0_local_params;$_3c60e0_old_vars['_cbfcf0']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_cbfcf0'];$_3c60e0_local_vars=$_3c60e0_old_vars['_cbfcf0'];?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_55a490'];$_3c60e0_local_vars=$_3c60e0_old_vars['_55a490'];?>

            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_dfe591'];$_3c60e0_local_vars=$_3c60e0_old_vars['_dfe591'];?>

            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f81ad8'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f81ad8'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b816d2'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b816d2'];?>

          <?php $_3c60e0_old_params['_7f5287']=$_3c60e0_local_params;$_3c60e0_old_vars['_7f5287']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_3c60e0_old_params['_7c742f']=$_3c60e0_local_params;$_3c60e0_old_vars['_7c742f']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_3c60e0_old_params['_5af2da']=$_3c60e0_local_params;$_3c60e0_old_vars['_5af2da']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_create','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#startUpload">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload','this_tag'=>'trans'],null,$this),$this)?>

          </button>
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_5af2da'];$_3c60e0_local_vars=$_3c60e0_old_vars['_5af2da'];?>

            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_7c742f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_7c742f'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_7f5287'];$_3c60e0_local_vars=$_3c60e0_old_vars['_7f5287'];?>

        <?php else:?>

          <?php $_3c60e0_old_params['_beb556']=$_3c60e0_local_params;$_3c60e0_old_vars['_beb556']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_3c60e0_old_params['_0c7cfb']=$_3c60e0_local_params;$_3c60e0_old_vars['_0c7cfb']=$_3c60e0_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'list','model'=>'$model','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_0c7cfb'];$_3c60e0_local_vars=$_3c60e0_old_vars['_0c7cfb'];?>

            <?php $_3c60e0_old_params['_175385']=$_3c60e0_local_params;$_3c60e0_old_vars['_175385']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._model','eq'=>'comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request._model','eq'=>'contact','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_175385'];$_3c60e0_local_vars=$_3c60e0_old_vars['_175385'];?>

            <?php $_3c60e0_old_params['_dedfa3']=$_3c60e0_local_params;$_3c60e0_old_vars['_dedfa3']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'show_return_to_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_dedfa3'];$_3c60e0_local_vars=$_3c60e0_old_vars['_dedfa3'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_beb556'];$_3c60e0_local_vars=$_3c60e0_old_vars['_beb556'];?>

        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b9bd14'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b9bd14'];?>

          <?php $_3c60e0_old_params['_63830d']=$_3c60e0_local_params;$_3c60e0_old_vars['_63830d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_63830d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_63830d'];?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_a27019'];$_3c60e0_local_vars=$_3c60e0_old_vars['_a27019'];?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_61995b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_61995b'];?>

      <?php $_3c60e0_old_params['_3a9629']=$_3c60e0_local_params;$_3c60e0_old_vars['_3a9629']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_3c60e0_old_params['_72a4d8']=$_3c60e0_local_params;$_3c60e0_old_vars['_72a4d8']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_3c60e0_old_params['_4af11f']=$_3c60e0_local_params;$_3c60e0_old_vars['_4af11f']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_3c60e0_old_params['_9f4709']=$_3c60e0_local_params;$_3c60e0_old_vars['_9f4709']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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

          <?php $_3c60e0_old_params['_22498b']=$_3c60e0_local_params;$_3c60e0_old_vars['_22498b']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="pack-left btn btn-secondary btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
&amp;manage_revision=1">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Revision','this_tag'=>'trans'],null,$this),$this)?>

          </a>
          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_22498b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_22498b'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_9f4709'];$_3c60e0_local_vars=$_3c60e0_old_vars['_9f4709'];?>

          <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_4af11f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_4af11f'];?>

        <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_72a4d8'];$_3c60e0_local_vars=$_3c60e0_old_vars['_72a4d8'];?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3a9629'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3a9629'];?>

      <?php $_3c60e0_old_params['_7cd2cf']=$_3c60e0_local_params;$_3c60e0_old_vars['_7cd2cf']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_3c60e0_old_params['_909067']=$_3c60e0_local_params;$_3c60e0_old_vars['_909067']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_3c60e0_old_params['_93dc4d']=$_3c60e0_local_params;$_3c60e0_old_vars['_93dc4d']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'dashboard','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a class="btn btn-sm header-btn-icon" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=dashboard&amp;<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
">
          <i class="hidden fa fa-home" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
"></i>
          <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
</span>
        </a>
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_93dc4d'];$_3c60e0_local_vars=$_3c60e0_old_vars['_93dc4d'];?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_909067'];$_3c60e0_local_vars=$_3c60e0_old_vars['_909067'];?>

      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_7cd2cf'];$_3c60e0_local_vars=$_3c60e0_old_vars['_7cd2cf'];?>

          </h1>
    <?php $c_bdd496=null;$_3c60e0_old_params['_bdd496']=$_3c60e0_local_params;$_3c60e0_old_vars['_bdd496']=$_3c60e0_local_vars;$a_bdd496=$this->setup_args(['name'=>'alert_close','this_tag'=>'setvarblock'],null,$this);ob_start();?>

    <button type="button" class="close" data-dismiss="alert" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
      <span aria-hidden="true">&times;</span>
    </button>
    <?php $c_bdd496=ob_get_clean();$c_bdd496=$this->block_setvarblock($a_bdd496,$c_bdd496,$this,$r_bdd496,1,'_bdd496');echo($c_bdd496); $_3c60e0_local_params=$_3c60e0_old_params['_bdd496'];?>

    <div class="alert alert-success hidden" id="header-alert" role="alert" tabindex="0">
      <button onclick="$('#header-alert').hide();" type="button" id="header-alert-close" class="close" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
        <span aria-hidden="true">&times;</span>
      </button>
      <span id="header-alert-message"></span>
    </div>
    <?php $_3c60e0_old_params['_f8ce47']=$_3c60e0_local_params;$_3c60e0_old_vars['_f8ce47']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'header_alert_message','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <div id="header-alert-message" class="alert alert-<?php $_3c60e0_old_params['_71ed8e']=$_3c60e0_local_params;$_3c60e0_old_vars['_71ed8e']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'header_alert_class','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'header_alert_class','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
success<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_71ed8e'];$_3c60e0_local_vars=$_3c60e0_old_vars['_71ed8e'];?>
" tabindex="0">
      <?php $_3c60e0_old_params['_dec494']=$_3c60e0_local_params;$_3c60e0_old_vars['_dec494']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'header_alert_force','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'alert_close','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_dec494'];$_3c60e0_local_vars=$_3c60e0_old_vars['_dec494'];?>

      <?php echo $this->function_var($this->setup_args(['name'=>'header_alert_message','this_tag'=>'var'],null,$this),$this)?>

      <?php $_3c60e0_old_params['_1d5aba']=$_3c60e0_local_params;$_3c60e0_old_vars['_1d5aba']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.need_rebuild','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild<?php $_3c60e0_old_params['_0acf07']=$_3c60e0_local_params;$_3c60e0_old_vars['_0acf07']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_0acf07'];$_3c60e0_local_vars=$_3c60e0_old_vars['_0acf07'];?>
" class="popup">
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Publish your site to see these changes take effect.','this_tag'=>'trans'],null,$this),$this)?>

        </a>
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_1d5aba'];$_3c60e0_local_vars=$_3c60e0_old_vars['_1d5aba'];?>

    </div>
    <script>
    $('#header-alert-message').focus();
    </script>
    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_f8ce47'];$_3c60e0_local_vars=$_3c60e0_old_vars['_f8ce47'];?>

    <?php $_3c60e0_old_params['_e3ff42']=$_3c60e0_local_params;$_3c60e0_old_vars['_e3ff42']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <div id="header-error-message" class="alert alert-danger" role="alert" tabindex="0">
      <?php echo paml_modifier_funcs('nl2br', paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'error','escape'=>'1','nl2br'=>'1','this_tag'=>'var'],null,$this),$this),ENT_QUOTES))?>

      </div>
    <script>
    $('#header-error-message').focus();
    </script>
    <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e3ff42'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e3ff42'];?>

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

  <?php $_3c60e0_old_params['_eef328']=$_3c60e0_local_params;$_3c60e0_old_vars['_eef328']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'copyright','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <footer class="footer bar">
      <?php $_3c60e0_old_params['_0cd321']=$_3c60e0_local_params;$_3c60e0_old_vars['_0cd321']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <span class="copyright"><?php echo $this->modifier_eval($this->function_var($this->setup_args(['name'=>'copyright','eval'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','eval',$this),$this,'eval')?>
</span>
      <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_0cd321'];$_3c60e0_local_vars=$_3c60e0_old_vars['_0cd321'];?>

    </footer>
  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_eef328'];$_3c60e0_local_vars=$_3c60e0_old_vars['_eef328'];?>

<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script>
$(function() {
    $(".popup").click(function(){
        window.open(this.href,"RebuildPopupWindow","width=420,height=<?php $_3c60e0_old_params['_576291']=$_3c60e0_local_params;$_3c60e0_old_vars['_576291']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'debug_mode','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
360<?php else:?>
320<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_576291'];$_3c60e0_local_vars=$_3c60e0_old_vars['_576291'];?>
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
<?php $_3c60e0_old_params['_4d7d18']=$_3c60e0_local_params;$_3c60e0_old_vars['_4d7d18']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_3c60e0_old_params['_59e091']=$_3c60e0_local_params;$_3c60e0_old_vars['_59e091']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_3c60e0_old_params['_996938']=$_3c60e0_local_params;$_3c60e0_old_vars['_996938']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_3c60e0_old_params['_d7a894']=$_3c60e0_local_params;$_3c60e0_old_vars['_d7a894']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_d7a894'];$_3c60e0_local_vars=$_3c60e0_old_vars['_d7a894'];?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_996938'];$_3c60e0_local_vars=$_3c60e0_old_vars['_996938'];?>

<?php $_3c60e0_old_params['_40ac9c']=$_3c60e0_local_params;$_3c60e0_old_vars['_40ac9c']=$_3c60e0_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_3c60e0_old_params['_072553']=$_3c60e0_local_params;$_3c60e0_old_vars['_072553']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_072553'];$_3c60e0_local_vars=$_3c60e0_old_vars['_072553'];?>

<?php $_3c60e0_old_params['_45c473']=$_3c60e0_local_params;$_3c60e0_old_vars['_45c473']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_45c473'];$_3c60e0_local_vars=$_3c60e0_old_vars['_45c473'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_40ac9c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_40ac9c'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_3c60e0_old_params['_817c11']=$_3c60e0_local_params;$_3c60e0_old_vars['_817c11']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_817c11'];$_3c60e0_local_vars=$_3c60e0_old_vars['_817c11'];?>

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
?__mode=view&_type=list&_model=asset<?php $_3c60e0_old_params['_5cf779']=$_3c60e0_local_params;$_3c60e0_old_vars['_5cf779']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_5cf779'];$_3c60e0_local_vars=$_3c60e0_old_vars['_5cf779'];?>
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
?__mode=view&_type=list&_model=asset<?php $_3c60e0_old_params['_3521a7']=$_3c60e0_local_params;$_3c60e0_old_vars['_3521a7']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_3521a7'];$_3c60e0_local_vars=$_3c60e0_old_vars['_3521a7'];?>
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
            <?php $_3c60e0_old_params['_e96ad0']=$_3c60e0_local_params;$_3c60e0_old_vars['_e96ad0']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            if(ed.id && ed.id == 'text'){
              var clipboard_image = $('#clipboard-image');
              var inline_image = $('#inline-image');
              var bg_image_url = clipboard_image.val();
              if ( inline_image.length ) {
                  bg_image_url = inline_image.attr('href');
              }
              if ( clipboard_image.length ) {
                <?php $_3c60e0_old_params['_74705c']=$_3c60e0_local_params;$_3c60e0_old_vars['_74705c']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_74705c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_74705c'];?>

                <?php $_3c60e0_old_params['_e6c8e9']=$_3c60e0_local_params;$_3c60e0_old_vars['_e6c8e9']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e6c8e9'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e6c8e9'];?>

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
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_e96ad0'];$_3c60e0_local_vars=$_3c60e0_old_vars['_e96ad0'];?>

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
<?php $_3c60e0_old_params['_aa9e09']=$_3c60e0_local_params;$_3c60e0_old_vars['_aa9e09']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_3c60e0_old_params['_9accf9']=$_3c60e0_local_params;$_3c60e0_old_vars['_9accf9']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_9accf9'];$_3c60e0_local_vars=$_3c60e0_old_vars['_9accf9'];?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_aa9e09'];$_3c60e0_local_vars=$_3c60e0_old_vars['_aa9e09'];?>

<?php $_3c60e0_old_params['_7ebe61']=$_3c60e0_local_params;$_3c60e0_old_vars['_7ebe61']=$_3c60e0_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_3c60e0_old_params['_2d197b']=$_3c60e0_local_params;$_3c60e0_old_vars['_2d197b']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_2d197b'];$_3c60e0_local_vars=$_3c60e0_old_vars['_2d197b'];?>

<?php $_3c60e0_old_params['_b203d9']=$_3c60e0_local_params;$_3c60e0_old_vars['_b203d9']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b203d9'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b203d9'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_7ebe61'];$_3c60e0_local_vars=$_3c60e0_old_vars['_7ebe61'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_3c60e0_old_params['_24de91']=$_3c60e0_local_params;$_3c60e0_old_vars['_24de91']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_24de91'];$_3c60e0_local_vars=$_3c60e0_old_vars['_24de91'];?>

        relative_urls : false,
        image_advtab: true,
        promotion: false,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code<?php $_3c60e0_old_params['_489989']=$_3c60e0_local_params;$_3c60e0_old_vars['_489989']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','lt'=>'6','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 print paste<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_489989'];$_3c60e0_local_vars=$_3c60e0_old_vars['_489989'];?>
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
                <?php $_3c60e0_old_params['_7650a2']=$_3c60e0_local_params;$_3c60e0_old_vars['_7650a2']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'gallery',
                <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_7650a2'];$_3c60e0_local_vars=$_3c60e0_old_vars['_7650a2'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_3c60e0_old_params['_b6183c']=$_3c60e0_local_params;$_3c60e0_old_vars['_b6183c']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b6183c'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b6183c'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.ui.registry.addButton('pt-file', {
                <?php $_3c60e0_old_params['_279387']=$_3c60e0_local_params;$_3c60e0_old_vars['_279387']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'browse',
                <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_279387'];$_3c60e0_local_vars=$_3c60e0_old_vars['_279387'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_3c60e0_old_params['_bb243f']=$_3c60e0_local_params;$_3c60e0_old_vars['_bb243f']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_bb243f'];$_3c60e0_local_vars=$_3c60e0_old_vars['_bb243f'];?>
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
            <?php $_3c60e0_old_params['_4ce8d8']=$_3c60e0_local_params;$_3c60e0_old_vars['_4ce8d8']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
                      <?php $_3c60e0_old_params['_b508d1']=$_3c60e0_local_params;$_3c60e0_old_vars['_b508d1']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_b508d1'];$_3c60e0_local_vars=$_3c60e0_old_vars['_b508d1'];?>

                      <?php $_3c60e0_old_params['_5a81ad']=$_3c60e0_local_params;$_3c60e0_old_vars['_5a81ad']=$_3c60e0_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_5a81ad'];$_3c60e0_local_vars=$_3c60e0_old_vars['_5a81ad'];?>

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
            <?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_4ce8d8'];$_3c60e0_local_vars=$_3c60e0_old_vars['_4ce8d8'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_59e091'];$_3c60e0_local_vars=$_3c60e0_old_vars['_59e091'];?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_4d7d18'];$_3c60e0_local_vars=$_3c60e0_old_vars['_4d7d18'];?>

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
<?php $_3c60e0_old_params['_deb7a7']=$_3c60e0_local_params;$_3c60e0_old_vars['_deb7a7']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_3c60e0_old_params['_ba75e3']=$_3c60e0_local_params;$_3c60e0_old_vars['_ba75e3']=$_3c60e0_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','ne'=>'loading','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_ba75e3'];$_3c60e0_local_vars=$_3c60e0_old_vars['_ba75e3'];?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_deb7a7'];$_3c60e0_local_vars=$_3c60e0_old_vars['_deb7a7'];?>

</script>
  </div>
<?php echo $this->function_var($this->setup_args(['name'=>'html_body_footer','this_tag'=>'var'],null,$this),$this)?>

  </body>
</html>
<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_7bb830'];$_3c60e0_local_vars=$_3c60e0_old_vars['_7bb830'];?>

<?php endif;$_3c60e0_local_params=$_3c60e0_old_params['_cb2eed'];$_3c60e0_local_vars=$_3c60e0_old_vars['_cb2eed'];?>


<?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\error.tmpl' => 1694708434,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\footer.tmpl' => 1718664344,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\header.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\dialog_footer.tmpl' => 1718664344,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\dialog_header.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\popup_footer.tmpl' => 1694708434,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\popup_header.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\footer_iframe.tmpl' => 1694708434,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\header_iframe.tmpl' => 1694708530,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\richtext.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit_options.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\start_upload.tmpl' => 1694708530,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\list_options.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\list_filters.tmpl' => 1718664344,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\richtext4.tmpl' => 1718664276,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005690,
);?>