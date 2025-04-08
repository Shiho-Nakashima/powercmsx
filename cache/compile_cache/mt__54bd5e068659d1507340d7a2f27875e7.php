<?php ob_start();?><?php $_f0094b_vars=&$this->vars;$_f0094b_old_params=&$this->old_params;$_f0094b_local_params=&$this->local_params;$_f0094b_old_vars=&$this->old_vars;$_f0094b_local_vars=&$this->local_vars;?><?php $_f0094b_old_params['_c63914']=$_f0094b_local_params;$_f0094b_old_vars['_c63914']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div class="row form-group" id="_password-default">
  <div class="col-lg-2">
    <?php echo $this->function_trans($this->setup_args(['phrase'=>'Password','this_tag'=>'trans'],null,$this),$this)?>

    <?php $_f0094b_old_params['_3cadf7']=$_f0094b_local_params;$_f0094b_old_vars['_3cadf7']=$_f0094b_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php $_f0094b_old_params['_291028']=$_f0094b_local_params;$_f0094b_old_vars['_291028']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_291028'];$_f0094b_local_vars=$_f0094b_old_vars['_291028'];?>

    <?php endif;$_f0094b_local_params=$_f0094b_old_params['_3cadf7'];$_f0094b_local_vars=$_f0094b_old_vars['_3cadf7'];?>

  </div>
  <div class="col-lg-10 lg-10-btn-wrapper">
    <button type="button" class="btn btn-secondary btn-sm" id="__toggle_password"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Change Password','this_tag'=>'trans'],null,$this),$this)?>
</button>
  </div>
</div>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_c63914'];$_f0094b_local_vars=$_f0094b_old_vars['_c63914'];?>

<div class="row form-group _password-edit">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
    <?php $_f0094b_old_params['_89714c']=$_f0094b_local_params;$_f0094b_old_vars['_89714c']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo paml_htmlspecialchars($this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','escape'=>'','this_tag'=>'trans'],null,$this),$this),ENT_QUOTES)?>

    <?php else:?>

      <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

    <?php endif;$_f0094b_local_params=$_f0094b_old_params['_89714c'];$_f0094b_local_vars=$_f0094b_old_vars['_89714c'];?>

    <?php $_f0094b_old_params['_0d5bb0']=$_f0094b_local_params;$_f0094b_old_vars['_0d5bb0']=$_f0094b_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php $_f0094b_old_params['_2f9ac4']=$_f0094b_local_params;$_f0094b_old_vars['_2f9ac4']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_2f9ac4'];$_f0094b_local_vars=$_f0094b_old_vars['_2f9ac4'];?>

    <?php endif;$_f0094b_local_params=$_f0094b_old_params['_0d5bb0'];$_f0094b_local_vars=$_f0094b_old_vars['_0d5bb0'];?>

    </label>
  </div>
  <div class="col-lg-10">
    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" autocomplete="new-password" type="<?php $_f0094b_old_params['_3a8ae9']=$_f0094b_local_params;$_f0094b_old_vars['_3a8ae9']=$_f0094b_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
password<?php else:?>
text<?php endif;$_f0094b_local_params=$_f0094b_old_params['_3a8ae9'];$_f0094b_local_vars=$_f0094b_old_vars['_3a8ae9'];?>
" class="form-control watch-changed" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="">
  </div>
</div>
<div class="row form-group _password-edit">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
-verify">
    <?php $_f0094b_old_params['_a842ba']=$_f0094b_local_params;$_f0094b_old_vars['_a842ba']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo paml_htmlspecialchars($this->function_trans($this->setup_args(['phrase'=>'New %s (Confirm)','params'=>'$label','escape'=>'','this_tag'=>'trans'],null,$this),$this),ENT_QUOTES)?>

    <?php else:?>

      <?php echo paml_htmlspecialchars($this->function_trans($this->setup_args(['phrase'=>'%s (Confirm)','params'=>'$label','escape'=>'','this_tag'=>'trans'],null,$this),$this),ENT_QUOTES)?>

    <?php endif;$_f0094b_local_params=$_f0094b_old_params['_a842ba'];$_f0094b_local_vars=$_f0094b_old_vars['_a842ba'];?>

    </label>
  </div>
  <div class="col-lg-10">
    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
-verify" autocomplete="new-password" type="<?php $_f0094b_old_params['_f8c0b3']=$_f0094b_local_params;$_f0094b_old_vars['_f8c0b3']=$_f0094b_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
password<?php else:?>
text<?php endif;$_f0094b_local_params=$_f0094b_old_params['_f8c0b3'];$_f0094b_local_vars=$_f0094b_old_vars['_f8c0b3'];?>
" class="form-control watch-changed" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
-verify" value="">
    <?php echo $this->function_var($this->setup_args(['name'=>'_hint','this_tag'=>'var'],null,$this),$this)?>

  </div>
</div>
<?php $_f0094b_old_params['_cc618d']=$_f0094b_local_params;$_f0094b_old_vars['_cc618d']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
$('._password-edit').hide();
</script>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_cc618d'];$_f0094b_local_vars=$_f0094b_old_vars['_cc618d'];?>

<script>
$('#__toggle_password').click(function(){
    $('._password-edit').show();
    $('#_password-default').hide();
    $('#<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
').attr( 'type', 'password' );
    $('#<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
-verify').attr( 'type', 'password' );
});
</script><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\footer.tmpl' => 1718664344,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\dialog_footer.tmpl' => 1718664344,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\relation_attachmentfile.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\reference_attachmentfile.tmpl' => 1697132444,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\relation_asset.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\relation_any.tmpl' => 1694708530,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\header.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\dialog_header.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\richtext.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit_options.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\start_upload.tmpl' => 1694708530,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\list_options.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\list_filters.tmpl' => 1718664344,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\richtext4.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\primary_permalink.tmpl' => 1697132444,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1743988196,
);?>