<?php ob_start();?><?php $_aeb42d_vars=&$this->vars;$_aeb42d_old_params=&$this->old_params;$_aeb42d_local_params=&$this->local_params;$_aeb42d_old_vars=&$this->old_vars;$_aeb42d_local_vars=&$this->local_vars;?><div class="row form-group">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
      <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

      <?php $_aeb42d_old_params['_2e5a57']=$_aeb42d_local_params;$_aeb42d_old_vars['_2e5a57']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_2e5a57'];$_aeb42d_local_vars=$_aeb42d_old_vars['_2e5a57'];?>

    </label>
  </div>
  <div class="col-lg-10">
    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'timezone','setvar'=>'system_timezone','this_tag'=>'property'],null,$this),$this),$this->setup_args('system_timezone','setvar',$this),$this,'setvar')?>

    <select id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" class="form-control custom-select watch-changed" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
    <?php $c_c9e002=null;$_aeb42d_old_params['_c9e002']=$_aeb42d_local_params;$_aeb42d_old_vars['_c9e002']=$_aeb42d_local_vars;$a_c9e002=$this->setup_args(['name'=>'timezones','this_tag'=>'loop'],null,$this);$_c9e002=-1;$r_c9e002=true;while($r_c9e002===true):$r_c9e002=($_c9e002!==-1)?false:true;echo $this->block_loop($a_c9e002,$c_c9e002,$this,$r_c9e002,++$_c9e002,'_c9e002');ob_start();?>
<?php $c_c9e002 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_c9e002=false;}if($c_c9e002 ):?>

      <?php $_aeb42d_old_params['_53f8c7']=$_aeb42d_local_params;$_aeb42d_old_vars['_53f8c7']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <option value="">
          <?php echo $this->function_trans($this->setup_args(['phrase'=>'Unspecified','this_tag'=>'trans'],null,$this),$this)?>

        </option>
      <?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_53f8c7'];$_aeb42d_local_vars=$_aeb42d_old_vars['_53f8c7'];?>

        <option <?php $_aeb42d_old_params['_2fd404']=$_aeb42d_local_params;$_aeb42d_old_vars['_2fd404']=$_aeb42d_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__col_value__','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_aeb42d_old_params['_674878']=$_aeb42d_local_params;$_aeb42d_old_vars['_674878']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'system_timezone','eq'=>'$__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 selected <?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_674878'];$_aeb42d_local_vars=$_aeb42d_old_vars['_674878'];?>
<?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_2fd404'];$_aeb42d_local_vars=$_aeb42d_old_vars['_2fd404'];?>
<?php $_aeb42d_old_params['_1dd4a8']=$_aeb42d_local_params;$_aeb42d_old_vars['_1dd4a8']=$_aeb42d_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__col_value__','eq'=>'$__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 selected <?php endif;$_aeb42d_local_params=$_aeb42d_old_params['_1dd4a8'];$_aeb42d_local_vars=$_aeb42d_old_vars['_1dd4a8'];?>
 value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo paml_htmlspecialchars($this->function_trans($this->setup_args(['phrase'=>'$__key__','escape'=>'','this_tag'=>'trans'],null,$this),$this),ENT_QUOTES)?>
</option>
    <?php endif;$c_c9e002=ob_get_clean();endwhile; $_aeb42d_local_params=$_aeb42d_old_params['_c9e002'];$_aeb42d_local_vars=$_aeb42d_old_vars['_c9e002'];?>

    </select>
  </div>
</div><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744002381,
);?>