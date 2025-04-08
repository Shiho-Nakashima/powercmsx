<?php ob_start();?><?php $_ac349a_vars=&$this->vars;$_ac349a_old_params=&$this->old_params;$_ac349a_local_params=&$this->local_params;$_ac349a_old_vars=&$this->old_vars;$_ac349a_local_vars=&$this->local_vars;?><div class="row form-group">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
      <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

      <?php $_ac349a_old_params['_7c5cf7']=$_ac349a_local_params;$_ac349a_old_vars['_7c5cf7']=$_ac349a_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ac349a_local_params=$_ac349a_old_params['_7c5cf7'];$_ac349a_local_vars=$_ac349a_old_vars['_7c5cf7'];?>

    </label>
  </div>
  <div class="col-lg-<?php $_ac349a_old_params['_d154a7']=$_ac349a_local_params;$_ac349a_old_vars['_d154a7']=$_ac349a_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','like'=>'select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
3<?php else:?>
10<?php endif;$_ac349a_local_params=$_ac349a_old_params['_d154a7'];$_ac349a_local_vars=$_ac349a_old_vars['_d154a7'];?>
">
    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getchildrenids($this->setup_args(['id'=>'$object_id','model'=>'$model','setvar'=>'_children_ids','this_tag'=>'getchildrenids'],null,$this),$this),$this->setup_args('_children_ids','setvar',$this),$this,'setvar')?>

    <?php $_ac349a_old_params['_e65f09']=$_ac349a_local_params;$_ac349a_old_vars['_e65f09']=$_ac349a_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'can_hierarchy','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'readonly','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_ac349a_local_params=$_ac349a_old_params['_e65f09'];$_ac349a_local_vars=$_ac349a_old_vars['_e65f09'];?>

    <?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'edit','split'=>':','setvar'=>'edit_props','this_tag'=>'var'],null,$this),$this),$this->setup_args(':','split',$this),$this,'split'),$this->setup_args('edit_props','setvar',$this),$this,'setvar')?>

    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'edit_props[1]','setvar'=>'rel_model','this_tag'=>'var'],null,$this),$this),$this->setup_args('rel_model','setvar',$this),$this,'setvar')?>

    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'edit_props[2]','setvar'=>'rel_col','this_tag'=>'var'],null,$this),$this),$this->setup_args('rel_col','setvar',$this),$this,'setvar')?>

    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'edit_props[3]','setvar'=>'rel_type','this_tag'=>'var'],null,$this),$this),$this->setup_args('rel_type','setvar',$this),$this,'setvar')?>

    <?php $c_7d6648=null;$_ac349a_old_params['_7d6648']=$_ac349a_local_params;$_ac349a_old_vars['_7d6648']=$_ac349a_local_vars;$a_7d6648=$this->setup_args(['name'=>'rel_cols','this_tag'=>'setvarblock'],null,$this);ob_start();?>
id,<?php echo $this->function_var($this->setup_args(['name'=>'rel_col','this_tag'=>'var'],null,$this),$this)?>
<?php $c_7d6648=ob_get_clean();$c_7d6648=$this->block_setvarblock($a_7d6648,$c_7d6648,$this,$r_7d6648,1,'_7d6648');echo($c_7d6648); $_ac349a_local_params=$_ac349a_old_params['_7d6648'];?>

    <?php $_ac349a_old_params['_0bb8c0']=$_ac349a_local_params;$_ac349a_old_vars['_0bb8c0']=$_ac349a_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','like'=>'select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'__options_out','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

      <select id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" class="form-control custom-select short watch-changed" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
        <option value="0">
          <?php echo $this->function_trans($this->setup_args(['phrase'=>'Unspecified','this_tag'=>'trans'],null,$this),$this)?>

        </option>
        <?php $c_84761a=null;$_ac349a_old_params['_84761a']=$_ac349a_local_params;$_ac349a_old_vars['_84761a']=$_ac349a_local_vars;$a_84761a=$this->setup_args(['cols'=>'$rel_cols','model'=>'$rel_model','sort_by'=>'order','include_draft'=>'1','workspace_id'=>'$workspace_id','this_tag'=>'objectloop'],null,$this);$_84761a=-1;$r_84761a=true;while($r_84761a===true):$r_84761a=($_84761a!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_84761a,$c_84761a,$this,$r_84761a,++$_84761a,'_84761a');ob_start();?>
<?php $c_84761a = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_84761a=false;}if($c_84761a ):?>

        <?php $_ac349a_old_params['_4e72f9']=$_ac349a_local_params;$_ac349a_old_vars['_4e72f9']=$_ac349a_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_ac349a_old_params['_117583']=$_ac349a_local_params;$_ac349a_old_vars['_117583']=$_ac349a_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__col_value__','eq'=>'$id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__options_out','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

          <option selected value="<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
"><?php $_ac349a_old_params['_c7eeb1']=$_ac349a_local_params;$_ac349a_old_vars['_c7eeb1']=$_ac349a_local_vars;if($this->conditional_if($this->setup_args(['name'=>'$rel_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'$rel_col','trans'=>'$translate','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('$translate','trans',$this),$this,'trans'),ENT_QUOTES)?>
<?php else:?>
null(id:<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
)<?php endif;$_ac349a_local_params=$_ac349a_old_params['_c7eeb1'];$_ac349a_local_vars=$_ac349a_old_vars['_c7eeb1'];?>
</option>
          <?php endif;$_ac349a_local_params=$_ac349a_old_params['_117583'];$_ac349a_local_vars=$_ac349a_old_vars['_117583'];?>

        <?php else:?>

          <?php $_ac349a_old_params['_65ece8']=$_ac349a_local_params;$_ac349a_old_vars['_65ece8']=$_ac349a_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.id','ne'=>'$id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_ac349a_old_params['_578691']=$_ac349a_local_params;$_ac349a_old_vars['_578691']=$_ac349a_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'_children_ids','value'=>'$id','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

            <?php else:?>

              <option <?php $_ac349a_old_params['_da2029']=$_ac349a_local_params;$_ac349a_old_vars['_da2029']=$_ac349a_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__col_value__','eq'=>'$id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_ac349a_local_params=$_ac349a_old_params['_da2029'];$_ac349a_local_vars=$_ac349a_old_vars['_da2029'];?>
 value="<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
"><?php $_ac349a_old_params['_c1cf73']=$_ac349a_local_params;$_ac349a_old_vars['_c1cf73']=$_ac349a_local_vars;if($this->conditional_if($this->setup_args(['name'=>'$rel_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'$rel_col','trans'=>'$translate','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('$translate','trans',$this),$this,'trans'),ENT_QUOTES)?>
<?php else:?>
null(id:<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
)<?php endif;$_ac349a_local_params=$_ac349a_old_params['_c1cf73'];$_ac349a_local_vars=$_ac349a_old_vars['_c1cf73'];?>
</option>
            <?php endif;$_ac349a_local_params=$_ac349a_old_params['_578691'];$_ac349a_local_vars=$_ac349a_old_vars['_578691'];?>

          <?php endif;$_ac349a_local_params=$_ac349a_old_params['_65ece8'];$_ac349a_local_vars=$_ac349a_old_vars['_65ece8'];?>

        <?php endif;$_ac349a_local_params=$_ac349a_old_params['_4e72f9'];$_ac349a_local_vars=$_ac349a_old_vars['_4e72f9'];?>

        <?php $_ac349a_old_params['_093fac']=$_ac349a_local_params;$_ac349a_old_vars['_093fac']=$_ac349a_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_ac349a_old_params['_450649']=$_ac349a_local_params;$_ac349a_old_vars['_450649']=$_ac349a_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_ac349a_old_params['_e9264c']=$_ac349a_local_params;$_ac349a_old_vars['_e9264c']=$_ac349a_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__options_out','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <option value="">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Unspecified','this_tag'=>'trans'],null,$this),$this)?>

          </option>
          <?php endif;$_ac349a_local_params=$_ac349a_old_params['_e9264c'];$_ac349a_local_vars=$_ac349a_old_vars['_e9264c'];?>

        <?php endif;$_ac349a_local_params=$_ac349a_old_params['_450649'];$_ac349a_local_vars=$_ac349a_old_vars['_450649'];?>

        <?php endif;$_ac349a_local_params=$_ac349a_old_params['_093fac'];$_ac349a_local_vars=$_ac349a_old_vars['_093fac'];?>

        <?php endif;$c_84761a=ob_get_clean();endwhile; $_ac349a_local_params=$_ac349a_old_params['_84761a'];$_ac349a_local_vars=$_ac349a_old_vars['_84761a'];?>

     </select>
   <?php else:?>

     <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" type="number" class="form-control watch-changed <?php echo $this->function_var($this->setup_args(['name'=>'ctrl_class','this_tag'=>'var'],null,$this),$this)?>
" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="<?php echo $this->function_var($this->setup_args(['name'=>'value','this_tag'=>'var'],null,$this),$this)?>
"
     <?php $_ac349a_old_params['_bbb3e8']=$_ac349a_local_params;$_ac349a_old_vars['_bbb3e8']=$_ac349a_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
readonly<?php endif;$_ac349a_local_params=$_ac349a_old_params['_bbb3e8'];$_ac349a_local_vars=$_ac349a_old_vars['_bbb3e8'];?>
>
   <?php endif;$_ac349a_local_params=$_ac349a_old_params['_0bb8c0'];$_ac349a_local_vars=$_ac349a_old_vars['_0bb8c0'];?>

   <?php echo $this->function_var($this->setup_args(['name'=>'_hint','this_tag'=>'var'],null,$this),$this)?>

  </div>
</div><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744011371,
);?>