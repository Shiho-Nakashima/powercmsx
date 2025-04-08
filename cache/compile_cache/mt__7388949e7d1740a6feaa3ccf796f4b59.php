<?php ob_start();?><?php $_b7ec14_vars=&$this->vars;$_b7ec14_old_params=&$this->old_params;$_b7ec14_local_params=&$this->local_params;$_b7ec14_old_vars=&$this->old_vars;$_b7ec14_local_vars=&$this->local_vars;?><?php $_b7ec14_old_params['_8e8c3e']=$_b7ec14_local_params;$_b7ec14_old_vars['_8e8c3e']=$_b7ec14_local_vars;if($this->conditional_if($this->setup_args(['name'=>'news_box_content','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div class="card dashboard-widget" id="widget-newsbox">
  <h2 class="card-header"><?php echo $this->function_trans($this->setup_args(['phrase'=>'PowerCMS X Events and News','this_tag'=>'trans'],null,$this),$this)?>

    <button  type="button" class="detatch-widget" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
" data-name="widget-newsbox">
      <span aria-hidden="true">&times;</span>
    </button>
  </h2>
  <div class="card-block">
    <?php echo $this->function_var($this->setup_args(['name'=>'news_box_content','this_tag'=>'var'],null,$this),$this)?>

  </div>
</div>
<?php endif;$_b7ec14_local_params=$_b7ec14_old_params['_8e8c3e'];$_b7ec14_local_vars=$_b7ec14_old_vars['_8e8c3e'];?><?php $this->out=ob_get_clean();$this->meta=array (
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
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\widgets\\activity.tmpl' => 1718664344,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\widgets\\workspaces.tmpl' => 1694708434,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\widgets\\workflow.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\widgets\\newsbox.tmpl' => 1694708434,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1743988087,
);?>