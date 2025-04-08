<?php ob_start();?><?php $_63d9f8_vars=&$this->vars;$_63d9f8_old_params=&$this->old_params;$_63d9f8_local_params=&$this->local_params;$_63d9f8_old_vars=&$this->old_vars;$_63d9f8_local_vars=&$this->local_vars;?><?php $_63d9f8_old_params['_778d5c']=$_63d9f8_local_params;$_63d9f8_old_vars['_778d5c']=$_63d9f8_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['column'=>'extra_path','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_columnproperty($this->setup_args(['model'=>'$_model','name'=>'extra_path','property'=>'edit','setvar'=>'_tablehasextrapath','this_tag'=>'columnproperty'],null,$this),$this),$this->setup_args('_tablehasextrapath','setvar',$this),$this,'setvar')?>

<?php $_63d9f8_old_params['_d6c6f9']=$_63d9f8_local_params;$_63d9f8_old_vars['_d6c6f9']=$_63d9f8_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_tablehasextrapath','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'_modelhasextrapath','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_d6c6f9'];$_63d9f8_local_vars=$_63d9f8_old_vars['_d6c6f9'];?>

<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_778d5c'];$_63d9f8_local_vars=$_63d9f8_old_vars['_778d5c'];?>

<?php $_63d9f8_old_params['_f4bbfb']=$_63d9f8_local_params;$_63d9f8_old_vars['_f4bbfb']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_modelhasextrapath','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $_63d9f8_old_params['_798639']=$_63d9f8_local_params;$_63d9f8_old_vars['_798639']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'entry','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $_63d9f8_old_params['_46ff68']=$_63d9f8_local_params;$_63d9f8_old_vars['_46ff68']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'show_path_entry','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_extra_path','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_46ff68'];$_63d9f8_local_vars=$_63d9f8_old_vars['_46ff68'];?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'page','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php $_63d9f8_old_params['_a953df']=$_63d9f8_local_params;$_63d9f8_old_vars['_a953df']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'show_path_page','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_extra_path','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_a953df'];$_63d9f8_local_vars=$_63d9f8_old_vars['_a953df'];?>

  <?php else:?>

    <?php $_63d9f8_old_params['_8ce4dd']=$_63d9f8_local_params;$_63d9f8_old_vars['_8ce4dd']=$_63d9f8_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['column'=>'extra_path','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'has_extra_path','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_8ce4dd'];$_63d9f8_local_vars=$_63d9f8_old_vars['_8ce4dd'];?>

  <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_798639'];$_63d9f8_local_vars=$_63d9f8_old_vars['_798639'];?>

<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_f4bbfb'];$_63d9f8_local_vars=$_63d9f8_old_vars['_f4bbfb'];?>

<div class="row form-group">
  <div class="col-lg-2">
    <?php $_63d9f8_old_params['_572ca7']=$_63d9f8_local_params;$_63d9f8_old_vars['_572ca7']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_extra_path','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<label for="basename_extra_path"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Path','this_tag'=>'trans'],null,$this),$this)?>
</label> &middot; <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_572ca7'];$_63d9f8_local_vars=$_63d9f8_old_vars['_572ca7'];?>

    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

    <?php $_63d9f8_old_params['_e97332']=$_63d9f8_local_params;$_63d9f8_old_vars['_e97332']=$_63d9f8_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'has_extra_path','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_63d9f8_old_params['_034f27']=$_63d9f8_local_params;$_63d9f8_old_vars['_034f27']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_034f27'];$_63d9f8_local_vars=$_63d9f8_old_vars['_034f27'];?>
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_e97332'];$_63d9f8_local_vars=$_63d9f8_old_vars['_e97332'];?>

    </label>
  </div>
  <div class="col-lg-10<?php $_63d9f8_old_params['_18fe2a']=$_63d9f8_local_params;$_63d9f8_old_vars['_18fe2a']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_extra_path','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 form-inline<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_18fe2a'];$_63d9f8_local_vars=$_63d9f8_old_vars['_18fe2a'];?>
">
    <?php $_63d9f8_old_params['_4e8675']=$_63d9f8_local_params;$_63d9f8_old_vars['_4e8675']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_extra_path','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <input type="text" id="basename_extra_path" class="form-control watch-changed <?php $_63d9f8_old_params['_7b6c0c']=$_63d9f8_local_params;$_63d9f8_old_vars['_7b6c0c']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_extra_path','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
extra-path<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_7b6c0c'];$_63d9f8_local_vars=$_63d9f8_old_vars['_7b6c0c'];?>
" name="extra_path" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'object_extra_path','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" placeholder="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Path','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Path','this_tag'=>'trans'],null,$this),$this)?>
">
    <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_4e8675'];$_63d9f8_local_vars=$_63d9f8_old_vars['_4e8675'];?>

    <?php $_63d9f8_old_params['_da2458']=$_63d9f8_local_params;$_63d9f8_old_vars['_da2458']=$_63d9f8_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_63d9f8_old_params['_18c4b7']=$_63d9f8_local_params;$_63d9f8_old_vars['_18c4b7']=$_63d9f8_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'forward_params','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'default','escape'=>'','setvar'=>'value','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('value','setvar',$this),$this,'setvar')?>
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_18c4b7'];$_63d9f8_local_vars=$_63d9f8_old_vars['_18c4b7'];?>
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_da2458'];$_63d9f8_local_vars=$_63d9f8_old_vars['_da2458'];?>

    <?php $_63d9f8_old_params['_ebd186']=$_63d9f8_local_params;$_63d9f8_old_vars['_ebd186']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__col_name__','eq'=>'uuid','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_63d9f8_old_params['_39e6da']=$_63d9f8_local_params;$_63d9f8_old_vars['_39e6da']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._duplicate','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'value','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_39e6da'];$_63d9f8_local_vars=$_63d9f8_old_vars['_39e6da'];?>

    <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_ebd186'];$_63d9f8_local_vars=$_63d9f8_old_vars['_ebd186'];?>

    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" type="<?php $_63d9f8_old_params['_b125e4']=$_63d9f8_local_params;$_63d9f8_old_vars['_b125e4']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','like'=>'num','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
number<?php else:?>
text<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_b125e4'];$_63d9f8_local_vars=$_63d9f8_old_vars['_b125e4'];?>
" class="form-control watch-changed <?php echo $this->function_var($this->setup_args(['name'=>'ctrl_class','this_tag'=>'var'],null,$this),$this)?>
<?php $_63d9f8_old_params['_650027']=$_63d9f8_local_params;$_63d9f8_old_vars['_650027']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_extra_path','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 extra-path<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_650027'];$_63d9f8_local_vars=$_63d9f8_old_vars['_650027'];?>
" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="<?php echo $this->function_var($this->setup_args(['name'=>'value','this_tag'=>'var'],null,$this),$this)?>
"
      <?php $_63d9f8_old_params['_2a1685']=$_63d9f8_local_params;$_63d9f8_old_vars['_2a1685']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
readonly<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_2a1685'];$_63d9f8_local_vars=$_63d9f8_old_vars['_2a1685'];?>
 <?php $_63d9f8_old_params['_2af4f7']=$_63d9f8_local_params;$_63d9f8_old_vars['_2af4f7']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_extra_path','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
placeholder="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Basename','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Basename','this_tag'=>'trans'],null,$this),$this)?>
"<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_2af4f7'];$_63d9f8_local_vars=$_63d9f8_old_vars['_2af4f7'];?>
>
    <?php echo $this->function_var($this->setup_args(['name'=>'_hint','this_tag'=>'var'],null,$this),$this)?>

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