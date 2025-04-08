<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
<link rel="shortcut icon" href="<?php echo $this->function_var($this->setup_args(['name'=>'theme_static','this_tag'=>'var'],null,$this),$this)?>
media/images/favicon.ico" type="image/x-icon">
<title><?php $_ba5c34_old_params['_0b9653']=$_ba5c34_local_params;$_ba5c34_old_vars['_0b9653']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'archive_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_strip_linefeeds($this->modifier_escape($this->function_var($this->setup_args(['name'=>'archive_title','escape'=>'single','strip_linefeeds'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape'),$this->setup_args('','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->function_var($this->setup_args(['name'=>'page_title_delimiter','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_0b9653'];$_ba5c34_local_vars=$_ba5c34_old_vars['_0b9653'];?>
<?php echo $this->modifier_strip_linefeeds($this->modifier_escape($this->function_var($this->setup_args(['name'=>'page_title','escape'=>'single','strip_linefeeds'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape'),$this->setup_args('','strip_linefeeds',$this),$this,'strip_linefeeds')?>
</title>
<?php $_ba5c34_old_params['_ed9619']=$_ba5c34_local_params;$_ba5c34_old_vars['_ed9619']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'page_description','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<meta name="description" content="<?php echo $this->modifier_strip_linefeeds($this->modifier_escape(paml_modifier_funcs('strip_tags', $this->function_var($this->setup_args(['name'=>'page_description','remove_html'=>'','escape'=>'single','strip_linefeeds'=>'','this_tag'=>'var'],null,$this),$this)),$this->setup_args('single','escape',$this),$this,'escape'),$this->setup_args('','strip_linefeeds',$this),$this,'strip_linefeeds')?>
"><?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_ed9619'];$_ba5c34_local_vars=$_ba5c34_old_vars['_ed9619'];?>

<?php $_ba5c34_old_params['_b5a9cd']=$_ba5c34_local_params;$_ba5c34_old_vars['_b5a9cd']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'page_keywords','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<meta name="keywords" content="<?php echo $this->modifier_escape(paml_modifier_funcs('strip_tags', $this->function_var($this->setup_args(['name'=>'page_keywords','remove_html'=>'','escape'=>'single','this_tag'=>'var'],null,$this),$this)),$this->setup_args('single','escape',$this),$this,'escape')?>
"><?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_b5a9cd'];$_ba5c34_local_vars=$_ba5c34_old_vars['_b5a9cd'];?>

<link rel="alternate" type="application/rss+xml" href="<?php echo $this->function_var($this->setup_args(['name'=>'website_url','this_tag'=>'var'],null,$this),$this)?>
index.xml" title="RSS2.0">
<link rel="preload" href="//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" as="style">
<link rel="preconnect" href="//fonts.gstatic.com">
<link rel="stylesheet" href="//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap">
<link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'theme_static','this_tag'=>'var'],null,$this),$this)?>
media/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'theme_static','this_tag'=>'var'],null,$this),$this)?>
media/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'theme_static','this_tag'=>'var'],null,$this),$this)?>
media/css/bootstrap-reboot.min.css">
<link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'theme_static','this_tag'=>'var'],null,$this),$this)?>
media/css/dropdown.css">
<link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'theme_static','this_tag'=>'var'],null,$this),$this)?>
media/css/tether.min.css">
<link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'website_url','this_tag'=>'var'],null,$this),$this)?>
css/theme.css">
<meta property="og:url" content="<?php $_ba5c34_old_params['_168c9a']=$_ba5c34_local_params;$_ba5c34_old_vars['_168c9a']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'website_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_replace($this->function_var($this->setup_args(['name'=>'current_archive_url','replace'=>'\'$website_url\',\'$website_link_url\'','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'$website_url\\\',\\\'$website_link_url\\\'','replace',$this),$this,'replace')?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'current_archive_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_168c9a'];$_ba5c34_local_vars=$_ba5c34_old_vars['_168c9a'];?>
">
<meta property="og:title" content="<?php $_ba5c34_old_params['_5538d8']=$_ba5c34_local_params;$_ba5c34_old_vars['_5538d8']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'archive_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_strip_linefeeds($this->modifier_escape($this->function_var($this->setup_args(['name'=>'archive_title','escape'=>'single','strip_linefeeds'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape'),$this->setup_args('','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php else:?>
<?php echo $this->modifier_strip_linefeeds($this->modifier_escape($this->function_var($this->setup_args(['name'=>'page_title','escape'=>'single','strip_linefeeds'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape'),$this->setup_args('','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_5538d8'];$_ba5c34_local_vars=$_ba5c34_old_vars['_5538d8'];?>
">
<meta property="og:type" content="<?php $_ba5c34_old_params['_409c1e']=$_ba5c34_local_params;$_ba5c34_old_vars['_409c1e']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'main_index','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
website<?php else:?>
article<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_409c1e'];$_ba5c34_local_vars=$_ba5c34_old_vars['_409c1e'];?>
">
<?php $_ba5c34_old_params['_c1f0b1']=$_ba5c34_local_params;$_ba5c34_old_vars['_c1f0b1']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'page_description','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<meta property="og:description" content="<?php echo $this->modifier_strip_linefeeds($this->modifier_escape(paml_modifier_funcs('strip_tags', $this->function_var($this->setup_args(['name'=>'page_description','remove_html'=>'','escape'=>'single','strip_linefeeds'=>'','this_tag'=>'var'],null,$this),$this)),$this->setup_args('single','escape',$this),$this,'escape'),$this->setup_args('','strip_linefeeds',$this),$this,'strip_linefeeds')?>
"><?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_c1f0b1'];$_ba5c34_local_vars=$_ba5c34_old_vars['_c1f0b1'];?>

<?php $_ba5c34_old_params['_5737a0']=$_ba5c34_local_params;$_ba5c34_old_vars['_5737a0']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'ogp_image','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<meta property="og:image" content="<?php $_ba5c34_old_params['_c2bd36']=$_ba5c34_local_params;$_ba5c34_old_vars['_c2bd36']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'website_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_replace($this->function_var($this->setup_args(['name'=>'ogp_image','replace'=>'\'$website_url\',\'$website_link_url\'','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'$website_url\\\',\\\'$website_link_url\\\'','replace',$this),$this,'replace')?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'ogp_image','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_c2bd36'];$_ba5c34_local_vars=$_ba5c34_old_vars['_c2bd36'];?>
"><?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_5737a0'];$_ba5c34_local_vars=$_ba5c34_old_vars['_5737a0'];?>

<?php echo $this->function_var($this->setup_args(['name'=>'html_head','this_tag'=>'var'],null,$this),$this)?>

<?php $_ba5c34_old_params['_fd057c']=$_ba5c34_local_params;$_ba5c34_old_vars['_fd057c']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_furigana_js','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Furigana) Head HTML','this_tag'=>'include'],null,$this),$this)?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_fd057c'];$_ba5c34_local_vars=$_ba5c34_old_vars['_fd057c'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744075969,
);?>