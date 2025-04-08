<?php ob_start();?><?php $_6c1c9e_vars=&$this->vars;$_6c1c9e_old_params=&$this->old_params;$_6c1c9e_local_params=&$this->local_params;$_6c1c9e_old_vars=&$this->old_vars;$_6c1c9e_local_vars=&$this->local_vars;?><?php echo $this->function_setvar($this->setup_args(['name'=>'_primary','value'=>'$value','this_tag'=>'setvar'],null,$this),$this)?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'_languages','value'=>'$languages','this_tag'=>'setvar'],null,$this),$this)?>

<div class="row form-group">
  <div class="col-lg-12 input-group-lg">
    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" type="text" class="form-control watch-changed" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="<?php echo $this->function_var($this->setup_args(['name'=>'value','this_tag'=>'var'],null,$this),$this)?>
"
      aria-label="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" placeholder="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_6c1c9e_old_params['_c0d43d']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_c0d43d']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
readonly<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_c0d43d'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_c0d43d'];?>
>
  <?php $_6c1c9e_old_params['_0ee4c9']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_0ee4c9']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__permalink__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__permalink__','setvar'=>'permalink','this_tag'=>'var'],null,$this),$this),$this->setup_args('permalink','setvar',$this),$this,'setvar')?>
<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_0ee4c9'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_0ee4c9'];?>

<?php $_6c1c9e_old_params['_6c9fda']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_6c9fda']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'permalink','setvar'=>'__permalink','this_tag'=>'var'],null,$this),$this),$this->setup_args('__permalink','setvar',$this),$this,'setvar')?>

  <?php $_6c1c9e_old_params['_2388a3']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_2388a3']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $_6c1c9e_old_params['_2b431e']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_2b431e']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->modifier_setvar($this->modifier_replace($this->function_var($this->setup_args(['name'=>'permalink','replace'=>'\'$workspace_site_url\',\'$workspace_link_url\'','setvar'=>'permalink','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'$workspace_site_url\\\',\\\'$workspace_link_url\\\'','replace',$this),$this,'replace'),$this->setup_args('permalink','setvar',$this),$this,'setvar')?>

    <?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_2b431e'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_2b431e'];?>

  <?php else:?>

    <?php $_6c1c9e_old_params['_2b6c9b']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_2b6c9b']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->modifier_setvar($this->modifier_replace($this->function_var($this->setup_args(['name'=>'permalink','replace'=>'\'$site_url\',\'$link_url\'','setvar'=>'permalink','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'$site_url\\\',\\\'$link_url\\\'','replace',$this),$this,'replace'),$this->setup_args('permalink','setvar',$this),$this,'setvar')?>

    <?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_2b6c9b'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_2b6c9b'];?>

  <?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_2388a3'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_2388a3'];?>

<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_6c9fda'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_6c9fda'];?>

  <?php $_6c1c9e_old_params['_94f9b8']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_94f9b8']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'permalink','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="input-group copy-url copy-url-permalink">
  <input type="text" class="form-control form-control-sm clipboard-url" id="__permalink-clipboard"
  value="<?php echo $this->function_var($this->setup_args(['name'=>'permalink','this_tag'=>'var'],null,$this),$this)?>
">
  <button data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Copy to Clipboard','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="input-group-addon copy-clipboard" data-clipboard-target="#__permalink-clipboard"><i class="fa fa-clipboard" aria-hidden="true" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Copy to Clipboard','this_tag'=>'trans'],null,$this),$this)?>
"></i></button>
  <button id="__view-permalink" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="input-group-addon"><i class="fa fa-external-link" aria-hidden="true" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
"></i></button>
<?php $_6c1c9e_old_params['_41e1cf']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_41e1cf']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <button id="__view-published" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="input-group-addon"><i class="fa fa-globe" aria-hidden="true" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
"></i></button>
<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_41e1cf'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_41e1cf'];?>

  </div>
<script>
$('#__view-permalink').click(function(){
<?php $_6c1c9e_old_params['_8b6c7e']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_8b6c7e']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    window.open( '<?php echo $this->function_var($this->setup_args(['name'=>'__permalink','this_tag'=>'var'],null,$this),$this)?>
', '_blank');
<?php else:?>

    var permalink = $('#__permalink-clipboard').val();
    window.open( permalink, '_blank');
<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_8b6c7e'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_8b6c7e'];?>


});
<?php $_6c1c9e_old_params['_cd0faf']=$_6c1c9e_local_params;$_6c1c9e_old_vars['_cd0faf']=$_6c1c9e_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#__view-published').click(function(){
    var permalink = $('#__permalink-clipboard').val();
    window.open( permalink, '_blank');
});
<?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_cd0faf'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_cd0faf'];?>

</script>
  <?php endif;$_6c1c9e_local_params=$_6c1c9e_old_params['_94f9b8'];$_6c1c9e_local_vars=$_6c1c9e_old_vars['_94f9b8'];?>

  </div>
</div>
<?php echo $this->function_setvar($this->setup_args(['name'=>'permalink','value'=>'','this_tag'=>'setvar'],null,$this),$this)?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\template\\screen_header.tmpl' => 1694708530,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744075530,
);?>