<?php ob_start();?><?php $_2111b6_vars=&$this->vars;$_2111b6_old_params=&$this->old_params;$_2111b6_local_params=&$this->local_params;$_2111b6_old_vars=&$this->old_vars;$_2111b6_local_vars=&$this->local_vars;?><?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'options','split'=>',','setvar'=>'_options_loop','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('_options_loop','setvar',$this),$this,'setvar')?>

<div class="row form-group">
  <div class="col-lg-2">
    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'1','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

  </div>
  <div class="col-lg-10 form-inline">
    <select id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" class="form-control custom-select watch-changed short" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
    <?php $c_58c2ef=null;$_2111b6_old_params['_58c2ef']=$_2111b6_local_params;$_2111b6_old_vars['_58c2ef']=$_2111b6_local_vars;$a_58c2ef=$this->setup_args(['name'=>'_options_loop','this_tag'=>'loop'],null,$this);$_58c2ef=-1;$r_58c2ef=true;while($r_58c2ef===true):$r_58c2ef=($_58c2ef!==-1)?false:true;echo $this->block_loop($a_58c2ef,$c_58c2ef,$this,$r_58c2ef,++$_58c2ef,'_58c2ef');ob_start();?>
<?php $c_58c2ef = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_58c2ef=false;}if($c_58c2ef ):?>

      <?php $_2111b6_old_params['_6e2a4c']=$_2111b6_local_params;$_2111b6_old_vars['_6e2a4c']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_2111b6_old_params['_a5a738']=$_2111b6_local_params;$_2111b6_old_vars['_a5a738']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'not_null','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        <option value="">
          <?php echo $this->function_trans($this->setup_args(['phrase'=>'Unspecified','this_tag'=>'trans'],null,$this),$this)?>

        </option>
      <?php endif;$_2111b6_local_params=$_2111b6_old_params['_a5a738'];$_2111b6_local_vars=$_2111b6_old_vars['_a5a738'];?>

      <?php endif;$_2111b6_local_params=$_2111b6_old_params['_6e2a4c'];$_2111b6_local_vars=$_2111b6_old_vars['_6e2a4c'];?>

      <?php echo $this->modifier_setvar(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','setvar'=>'__esc_value__','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('__esc_value__','setvar',$this),$this,'setvar')?>

        <option <?php $_2111b6_old_params['_b974cb']=$_2111b6_local_params;$_2111b6_old_vars['_b974cb']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__col_value__','eq'=>'$__esc_value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_2111b6_local_params=$_2111b6_old_params['_b974cb'];$_2111b6_local_vars=$_2111b6_old_vars['_b974cb'];?>
 value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo paml_htmlspecialchars($this->function_trans($this->setup_args(['phrase'=>'$__value__','escape'=>'','this_tag'=>'trans'],null,$this),$this),ENT_QUOTES)?>
</option>
    <?php $_2111b6_old_params['_27fd7d']=$_2111b6_local_params;$_2111b6_old_vars['_27fd7d']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_var($this->setup_args(['name'=>'__col_value__','this_tag'=>'var'],null,$this),$this)?>

<?php $c_07e508=null;$_2111b6_old_params['_07e508']=$_2111b6_local_params;$_2111b6_old_vars['_07e508']=$_2111b6_local_vars;$a_07e508=$this->setup_args(['name'=>'form_validations','this_tag'=>'loop'],null,$this);$_07e508=-1;$r_07e508=true;while($r_07e508===true):$r_07e508=($_07e508!==-1)?false:true;echo $this->block_loop($a_07e508,$c_07e508,$this,$r_07e508,++$_07e508,'_07e508');ob_start();?>
<?php $c_07e508 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_07e508=false;}if($c_07e508 ):?>

<option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"
<?php $_2111b6_old_params['_5965d2']=$_2111b6_local_params;$_2111b6_old_vars['_5965d2']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__col_value__','eq'=>'$__key__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_2111b6_local_params=$_2111b6_old_params['_5965d2'];$_2111b6_local_vars=$_2111b6_old_vars['_5965d2'];?>

<?php $c_386127=null;$_2111b6_old_params['_386127']=$_2111b6_local_params;$_2111b6_old_vars['_386127']=$_2111b6_local_vars;$a_386127=$this->setup_args(['name'=>'__value__','this_tag'=>'loop'],null,$this);$_386127=-1;$r_386127=true;while($r_386127===true):$r_386127=($_386127!==-1)?false:true;echo $this->block_loop($a_386127,$c_386127,$this,$r_386127,++$_386127,'_386127');ob_start();?>
<?php $c_386127 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_386127=false;}if($c_386127 ):?>

<?php $_2111b6_old_params['_89db0e']=$_2111b6_local_params;$_2111b6_old_vars['_89db0e']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__key__','eq'=>'label','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'validation_label','value'=>'$__value__','this_tag'=>'setvar'],null,$this),$this)?>

<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__key__','eq'=>'component','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'validation_component','value'=>'$__value__','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_2111b6_local_params=$_2111b6_old_params['_89db0e'];$_2111b6_local_vars=$_2111b6_old_vars['_89db0e'];?>

<?php endif;$c_386127=ob_get_clean();endwhile; $_2111b6_local_params=$_2111b6_old_params['_386127'];$_2111b6_local_vars=$_2111b6_old_vars['_386127'];?>

><?php echo $this->function_trans($this->setup_args(['phrase'=>'$validation_label','component'=>'$validation_component','this_tag'=>'trans'],null,$this),$this)?>
</option>
<?php endif;$c_07e508=ob_get_clean();endwhile; $_2111b6_local_params=$_2111b6_old_params['_07e508'];$_2111b6_local_vars=$_2111b6_old_vars['_07e508'];?>

    <?php endif;$_2111b6_local_params=$_2111b6_old_params['_27fd7d'];$_2111b6_local_vars=$_2111b6_old_vars['_27fd7d'];?>

    <?php endif;$c_58c2ef=ob_get_clean();endwhile; $_2111b6_local_params=$_2111b6_old_params['_58c2ef'];$_2111b6_local_vars=$_2111b6_old_vars['_58c2ef'];?>

    </select>
<span id="reply_to-wrapper" <?php $_2111b6_old_params['_0712be']=$_2111b6_local_params;$_2111b6_old_vars['_0712be']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__col_value__','match'=>'/^Email/','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
class="hidden"<?php endif;$_2111b6_local_params=$_2111b6_old_params['_0712be'];$_2111b6_local_vars=$_2111b6_old_vars['_0712be'];?>
>
   <input type="hidden" name="reply_to" value="0">
    <label class="custom-control custom-checkbox">
    <input id="reply_to" class="form-control custom-control-input watch-changed"
     type="checkbox" name="reply_to" value="1" <?php $_2111b6_old_params['_ec9307']=$_2111b6_local_params;$_2111b6_old_vars['_ec9307']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_reply_to','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_2111b6_local_params=$_2111b6_old_params['_ec9307'];$_2111b6_local_vars=$_2111b6_old_vars['_ec9307'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Reply-To','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
</span>
    <input type="hidden" name="normalize" value="0">
    <label class="custom-control custom-checkbox">
    <input id="normalize" class="form-control custom-control-input watch-changed"
     type="checkbox" name="normalize" value="1" <?php $_2111b6_old_params['_d8a406']=$_2111b6_local_params;$_2111b6_old_vars['_d8a406']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_normalize','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_2111b6_local_params=$_2111b6_old_params['_d8a406'];$_2111b6_local_vars=$_2111b6_old_vars['_d8a406'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Normalize','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    &nbsp; &nbsp;<label><?php echo $this->function_trans($this->setup_args(['phrase'=>'Format','this_tag'=>'trans'],null,$this),$this)?>
 : <input type="text" name="format" class="form-control e-num watch-changed" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'object_format','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"></label>
  </div>
</div>
<script>
$('#<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
').change(function(){
    let value = $(this).val();
    if ( value.match( /^Email/ ) ) {
        $('#reply_to-wrapper').show(100);
    } else {
        $('#reply_to-wrapper').hide(100);
    }
});
</script><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005007,
);?>