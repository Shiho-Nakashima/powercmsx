<?php ob_start();?><?php $_f0094b_vars=&$this->vars;$_f0094b_old_params=&$this->old_params;$_f0094b_local_params=&$this->local_params;$_f0094b_old_vars=&$this->old_vars;$_f0094b_local_vars=&$this->local_vars;?><?php $_f0094b_old_params['_26292e']=$_f0094b_local_params;$_f0094b_old_vars['_26292e']=$_f0094b_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>

<div class="row form-group">
  <div class="col-lg-2">
    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

    <?php $_f0094b_old_params['_e84d32']=$_f0094b_local_params;$_f0094b_old_vars['_e84d32']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_e84d32'];$_f0094b_local_vars=$_f0094b_old_vars['_e84d32'];?>

  </div>
  <div class="col-lg-10">
    <input type="hidden" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="0">
    <label class="custom-control custom-checkbox">
    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" class="custom-control-input watch-changed"
    <?php $_f0094b_old_params['_b15414']=$_f0094b_local_params;$_f0094b_old_vars['_b15414']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_f0094b_local_params=$_f0094b_old_params['_b15414'];$_f0094b_local_vars=$_f0094b_old_vars['_b15414'];?>

     type="checkbox" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="1" <?php $_f0094b_old_params['_9fda39']=$_f0094b_local_params;$_f0094b_old_vars['_9fda39']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'value','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_f0094b_local_params=$_f0094b_old_params['_9fda39'];$_f0094b_local_vars=$_f0094b_old_vars['_9fda39'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
    </label>
    <?php $_f0094b_old_params['_608a5b']=$_f0094b_local_params;$_f0094b_old_vars['_608a5b']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.id','eq'=>'$user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <input type="hidden" name="debug" value="0">
    <label class="custom-control custom-checkbox">
    <input id="debug" class="custom-control-input watch-changed"
     type="checkbox" name="debug" value="1" <?php $_f0094b_old_params['_c51012']=$_f0094b_local_params;$_f0094b_old_vars['_c51012']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_debug','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_f0094b_local_params=$_f0094b_old_params['_c51012'];$_f0094b_local_vars=$_f0094b_old_vars['_c51012'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Debug Mode','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    <input type="hidden" name="develop" value="0">
    <label class="custom-control custom-checkbox">
    <input id="debug" class="custom-control-input watch-changed"
     type="checkbox" name="develop" value="1" <?php $_f0094b_old_params['_0a33df']=$_f0094b_local_params;$_f0094b_old_vars['_0a33df']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_develop','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_f0094b_local_params=$_f0094b_old_params['_0a33df'];$_f0094b_local_vars=$_f0094b_old_vars['_0a33df'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Developer Mode','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    <?php endif;$_f0094b_local_params=$_f0094b_old_params['_608a5b'];$_f0094b_local_vars=$_f0094b_old_vars['_608a5b'];?>

  </div>
</div>
<?php $_f0094b_old_params['_6d1cb6']=$_f0094b_local_params;$_f0094b_old_vars['_6d1cb6']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.id','eq'=>'$user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_f0094b_old_params['_b2088e']=$_f0094b_local_params;$_f0094b_old_vars['_b2088e']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'value','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
$('#<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
').change(function(){
    if (! $(this).prop('checked') ) {
        if (! confirm( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'If you uncheck the administrator, you will not be able to set yourself as an administrator. Do you want to continue?','this_tag'=>'trans'],null,$this),$this)?>
' ) ) {
            $(this).prop('checked', false );
        }
    }
});
</script>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_b2088e'];$_f0094b_local_vars=$_f0094b_old_vars['_b2088e'];?>

<?php endif;$_f0094b_local_params=$_f0094b_old_params['_6d1cb6'];$_f0094b_local_vars=$_f0094b_old_vars['_6d1cb6'];?>

<?php endif;$_f0094b_local_params=$_f0094b_old_params['_26292e'];$_f0094b_local_vars=$_f0094b_old_vars['_26292e'];?><?php $this->out=ob_get_clean();$this->meta=array (
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