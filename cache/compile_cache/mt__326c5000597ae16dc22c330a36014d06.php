<?php ob_start();?><?php $_63d9f8_vars=&$this->vars;$_63d9f8_old_params=&$this->old_params;$_63d9f8_local_params=&$this->local_params;$_63d9f8_old_vars=&$this->old_vars;$_63d9f8_local_vars=&$this->local_vars;?><div class="row form-group mt-4 mb-4">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Unique','this_tag'=>'trans'],null,$this),$this)?>

      <?php $_63d9f8_old_params['_d214e6']=$_63d9f8_local_params;$_63d9f8_old_vars['_d214e6']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_d214e6'];$_63d9f8_local_vars=$_63d9f8_old_vars['_d214e6'];?>

    </label>
  </div>
  <div class="col-lg-10 form-inline row-more form-inline-left-margin">
    <input type="hidden" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="0">
    <label class="custom-control custom-checkbox">
    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" class="custom-control-input watch-changed"
    <?php $_63d9f8_old_params['_68eb87']=$_63d9f8_local_params;$_63d9f8_old_vars['_68eb87']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_68eb87'];$_63d9f8_local_vars=$_63d9f8_old_vars['_68eb87'];?>

     type="checkbox" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="1" <?php $_63d9f8_old_params['_abb4ed']=$_63d9f8_local_params;$_63d9f8_old_vars['_abb4ed']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'value','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_abb4ed'];$_63d9f8_local_vars=$_63d9f8_old_vars['_abb4ed'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Limit posts to one per person','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    <p class="text-muted hint-block mb-0" style="width:100%; margin-left:15px">
    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
    <?php echo $this->function_trans($this->setup_args(['phrase'=>'Determine by email address.','this_tag'=>'trans'],null,$this),$this)?>

    </p>
  </div>
</div><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\entry\\column_title.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\primary_permalink.tmpl' => 1697132444,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\entry\\column_text.tmpl' => 1738110796,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1743988263,
);?>