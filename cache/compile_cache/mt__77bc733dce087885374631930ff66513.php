<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><!DOCTYPE html>
<html>
<head>
  <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) HTML Header','this_tag'=>'include'],null,$this),$this)?>

</head>
<body>
<?php $c_3a96d3=null;$_ba5c34_old_params['_3a96d3']=$_ba5c34_local_params;$_ba5c34_old_vars['_3a96d3']=$_ba5c34_local_vars;$a_3a96d3=$this->setup_args(['cache_key'=>'__header__','workspace_id'=>'$website_id','this_tag'=>'cacheblock'],null,$this);$_3a96d3=-1;$r_3a96d3=true;while($r_3a96d3===true):$r_3a96d3=($_3a96d3!==-1)?false:true;echo $this->component('PTTags')->hdlr_cacheblock($a_3a96d3,$c_3a96d3,$this,$r_3a96d3,++$_3a96d3,'_3a96d3');ob_start();?>
<?php $c_3a96d3 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_3a96d3=false;}if($c_3a96d3 ):?>

  <section class="nav-section">
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
      <div class="container">
        <div class="navbar-brand">
          <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-6" href="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'website_url','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'website_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</a></span>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
">
          <div class="hamburger"><span></span><span></span><span></span><span></span></div>
        </button>
  <?php $c_3cbc06=null;ob_start();$_ba5c34_old_params['_3cbc06']=$_ba5c34_local_params;$_ba5c34_old_vars['_3cbc06']=$_ba5c34_local_vars;$a_3cbc06=$this->setup_args(['basename'=>'media_global_navigation','cols'=>'id','this_tag'=>'menuitems'],null,$this);$_3cbc06=-1;$r_3cbc06=true;while($r_3cbc06===true):$r_3cbc06=($_3cbc06!==-1)?false:true;echo $this->component('PTTags')->hdlr_menuitems($a_3cbc06,$c_3cbc06,$this,$r_3cbc06,++$_3cbc06,'_3cbc06');ob_start();?>
<?php $c_3cbc06 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_3cbc06=false;}if($c_3cbc06 ):?>

    <?php $_ba5c34_old_params['_40a360']=$_ba5c34_local_params;$_ba5c34_old_vars['_40a360']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
    <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_40a360'];$_ba5c34_local_vars=$_ba5c34_old_vars['_40a360'];?>

            <li class="nav-item"><a class="nav-link link text-black display-8" href="<?php echo $this->function_var($this->setup_args(['name'=>'__item_url__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo paml_htmlspecialchars($this->component('PTTags')->filter_language($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'__item_primary__','regex_replace'=>'\'/^\\(Media\\)\\s/\',\'\'','language'=>'$language','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/^\\\\(Media\\\\)\\\\s/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('$language','language',$this),$this,'language'),ENT_QUOTES)?>
</a></li>
    <?php $_ba5c34_old_params['_9464d5']=$_ba5c34_local_params;$_ba5c34_old_vars['_9464d5']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          </ul>
        </div>
    <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_9464d5'];$_ba5c34_local_vars=$_ba5c34_old_vars['_9464d5'];?>

  <?php endif;$c_3cbc06=ob_get_clean();endwhile;$c_3cbc06=ob_get_clean();echo($this->modifier_basename($c_3cbc06,$this->setup_args('media_global_navigation','basename',$this),$this,'basename')); $_ba5c34_local_params=$_ba5c34_old_params['_3cbc06'];$_ba5c34_local_vars=$_ba5c34_old_vars['_3cbc06'];?>

      </div>
    </nav>
  </section>
<?php endif;$c_3a96d3=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_3a96d3'];$_ba5c34_local_vars=$_ba5c34_old_vars['_3a96d3'];?>


<?php $_ba5c34_old_params['_e106bc']=$_ba5c34_local_params;$_ba5c34_old_vars['_e106bc']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_furigana_js','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Furigana) Button HTML','this_tag'=>'include'],null,$this),$this)?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_e106bc'];$_ba5c34_local_vars=$_ba5c34_old_vars['_e106bc'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744075969,
);?>