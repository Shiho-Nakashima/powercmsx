<?php ob_start();?><?php $_f0094b_vars=&$this->vars;$_f0094b_old_params=&$this->old_params;$_f0094b_local_params=&$this->local_params;$_f0094b_old_vars=&$this->old_vars;$_f0094b_local_vars=&$this->local_vars;?><?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'options','split'=>',','setvar'=>'_options_loop','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('_options_loop','setvar',$this),$this,'setvar')?>

<div class="row form-group">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
      <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'1','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

      <?php $_f0094b_old_params['_2e97a2']=$_f0094b_local_params;$_f0094b_old_vars['_2e97a2']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_2e97a2'];$_f0094b_local_vars=$_f0094b_old_vars['_2e97a2'];?>

    </label>
  </div>
  <div class="col-lg-10 form-inline">
    <?php $_f0094b_old_params['_6e89cf']=$_f0094b_local_params;$_f0094b_old_vars['_6e89cf']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','gt'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <select <?php $_f0094b_old_params['_4d70d5']=$_f0094b_local_params;$_f0094b_old_vars['_4d70d5']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 readonly onmousedown="return false;"<?php endif;$_f0094b_local_params=$_f0094b_old_params['_4d70d5'];$_f0094b_local_vars=$_f0094b_old_vars['_4d70d5'];?>
 id="status-selector" class="form-control short custom-select" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
    <?php $c_bd7166=null;$_f0094b_old_params['_bd7166']=$_f0094b_local_params;$_f0094b_old_vars['_bd7166']=$_f0094b_local_vars;$a_bd7166=$this->setup_args(['name'=>'_options_loop','this_tag'=>'loop'],null,$this);$_bd7166=-1;$r_bd7166=true;while($r_bd7166===true):$r_bd7166=($_bd7166!==-1)?false:true;echo $this->block_loop($a_bd7166,$c_bd7166,$this,$r_bd7166,++$_bd7166,'_bd7166');ob_start();?>
<?php $c_bd7166 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_bd7166=false;}if($c_bd7166 ):?>

      <?php $_f0094b_old_params['_d21209']=$_f0094b_local_params;$_f0094b_old_vars['_d21209']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__index__','le'=>'$max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_f0094b_old_params['_e9d5ad']=$_f0094b_local_params;$_f0094b_old_vars['_e9d5ad']=$_f0094b_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.edit_revision','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        <?php $_f0094b_old_params['_34ab12']=$_f0094b_local_params;$_f0094b_old_vars['_34ab12']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <option <?php $_f0094b_old_params['_8dae91']=$_f0094b_local_params;$_f0094b_old_vars['_8dae91']=$_f0094b_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'object_status','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_f0094b_old_params['_2c37bb']=$_f0094b_local_params;$_f0094b_old_vars['_2c37bb']=$_f0094b_local_vars;if($this->conditional_isset($this->setup_args(['name'=>'object_status','this_tag'=>'isset'],null,$this),null,$this,true,true)):?>
<?php else:?>
<?php $_f0094b_old_params['_8c40db']=$_f0094b_local_params;$_f0094b_old_vars['_8c40db']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_default_status','eq'=>'$__index__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php else:?>
<?php $_f0094b_old_params['_150e62']=$_f0094b_local_params;$_f0094b_old_vars['_150e62']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 style="display:none"<?php endif;$_f0094b_local_params=$_f0094b_old_params['_150e62'];$_f0094b_local_vars=$_f0094b_old_vars['_150e62'];?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_8c40db'];$_f0094b_local_vars=$_f0094b_old_vars['_8c40db'];?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_2c37bb'];$_f0094b_local_vars=$_f0094b_old_vars['_2c37bb'];?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_8dae91'];$_f0094b_local_vars=$_f0094b_old_vars['_8dae91'];?>
<?php $_f0094b_old_params['_0e8704']=$_f0094b_local_params;$_f0094b_old_vars['_0e8704']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_status','eq'=>'$__index__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php else:?>
<?php $_f0094b_old_params['_16f8f8']=$_f0094b_local_params;$_f0094b_old_vars['_16f8f8']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 style="display:none"<?php endif;$_f0094b_local_params=$_f0094b_old_params['_16f8f8'];$_f0094b_local_vars=$_f0094b_old_vars['_16f8f8'];?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_0e8704'];$_f0094b_local_vars=$_f0094b_old_vars['_0e8704'];?>
 value="<?php echo $this->function_var($this->setup_args(['name'=>'__index__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo paml_htmlspecialchars($this->function_trans($this->setup_args(['phrase'=>'$__value__','escape'=>'','this_tag'=>'trans'],null,$this),$this),ENT_QUOTES)?>
</option>
        <?php endif;$_f0094b_local_params=$_f0094b_old_params['_34ab12'];$_f0094b_local_vars=$_f0094b_old_vars['_34ab12'];?>

      <?php else:?>

        <?php $_f0094b_old_params['_bb622c']=$_f0094b_local_params;$_f0094b_old_vars['_bb622c']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__index__','ne'=>'$status_published','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_f0094b_old_params['_b18605']=$_f0094b_local_params;$_f0094b_old_vars['_b18605']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__index__','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'__value','value'=>'Reserved(Replace)','this_tag'=>'setvar'],null,$this),$this)?>

            <?php else:?>

              <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__','setvar'=>'__value','this_tag'=>'var'],null,$this),$this),$this->setup_args('__value','setvar',$this),$this,'setvar')?>

            <?php endif;$_f0094b_local_params=$_f0094b_old_params['_b18605'];$_f0094b_local_vars=$_f0094b_old_vars['_b18605'];?>

        <option <?php $_f0094b_old_params['_2c957c']=$_f0094b_local_params;$_f0094b_old_vars['_2c957c']=$_f0094b_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'object_status','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_f0094b_old_params['_63e32f']=$_f0094b_local_params;$_f0094b_old_vars['_63e32f']=$_f0094b_local_vars;if($this->conditional_isset($this->setup_args(['name'=>'object_status','this_tag'=>'isset'],null,$this),null,$this,true,true)):?>
<?php else:?>
<?php $_f0094b_old_params['_86ce33']=$_f0094b_local_params;$_f0094b_old_vars['_86ce33']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_default_status','eq'=>'$__index__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php else:?>
<?php $_f0094b_old_params['_6b7a22']=$_f0094b_local_params;$_f0094b_old_vars['_6b7a22']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 style="display:none"<?php endif;$_f0094b_local_params=$_f0094b_old_params['_6b7a22'];$_f0094b_local_vars=$_f0094b_old_vars['_6b7a22'];?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_86ce33'];$_f0094b_local_vars=$_f0094b_old_vars['_86ce33'];?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_63e32f'];$_f0094b_local_vars=$_f0094b_old_vars['_63e32f'];?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_2c957c'];$_f0094b_local_vars=$_f0094b_old_vars['_2c957c'];?>
<?php $_f0094b_old_params['_99bea7']=$_f0094b_local_params;$_f0094b_old_vars['_99bea7']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_status','eq'=>'$__index__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php else:?>
<?php $_f0094b_old_params['_588db0']=$_f0094b_local_params;$_f0094b_old_vars['_588db0']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 style="display:none"<?php endif;$_f0094b_local_params=$_f0094b_old_params['_588db0'];$_f0094b_local_vars=$_f0094b_old_vars['_588db0'];?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_99bea7'];$_f0094b_local_vars=$_f0094b_old_vars['_99bea7'];?>
 value="<?php echo $this->function_var($this->setup_args(['name'=>'__index__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo paml_htmlspecialchars($this->function_trans($this->setup_args(['phrase'=>'$__value','escape'=>'','this_tag'=>'trans'],null,$this),$this),ENT_QUOTES)?>
</option>
        <?php endif;$_f0094b_local_params=$_f0094b_old_params['_bb622c'];$_f0094b_local_vars=$_f0094b_old_vars['_bb622c'];?>

      <?php endif;$_f0094b_local_params=$_f0094b_old_params['_e9d5ad'];$_f0094b_local_vars=$_f0094b_old_vars['_e9d5ad'];?>

      <?php endif;$_f0094b_local_params=$_f0094b_old_params['_d21209'];$_f0094b_local_vars=$_f0094b_old_vars['_d21209'];?>

    <?php endif;$c_bd7166=ob_get_clean();endwhile; $_f0094b_local_params=$_f0094b_old_params['_bd7166'];$_f0094b_local_vars=$_f0094b_old_vars['_bd7166'];?>

    </select>
    <?php $_f0094b_old_params['_dcea96']=$_f0094b_local_params;$_f0094b_old_vars['_dcea96']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_has_workflow','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <span id="status-alterative" class="hidden badge left-margin badge-warning-lite status-alterative"></span>
    <?php endif;$_f0094b_local_params=$_f0094b_old_params['_dcea96'];$_f0094b_local_vars=$_f0094b_old_vars['_dcea96'];?>

    <?php else:?>

    <select id="status-selector" class="form-control short custom-select " name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
    <?php $c_14e0ed=null;$_f0094b_old_params['_14e0ed']=$_f0094b_local_params;$_f0094b_old_vars['_14e0ed']=$_f0094b_local_vars;$a_14e0ed=$this->setup_args(['name'=>'_options_loop','this_tag'=>'loop'],null,$this);$_14e0ed=-1;$r_14e0ed=true;while($r_14e0ed===true):$r_14e0ed=($_14e0ed!==-1)?false:true;echo $this->block_loop($a_14e0ed,$c_14e0ed,$this,$r_14e0ed,++$_14e0ed,'_14e0ed');ob_start();?>
<?php $c_14e0ed = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_14e0ed=false;}if($c_14e0ed ):?>

      <?php $_f0094b_old_params['_14aa11']=$_f0094b_local_params;$_f0094b_old_vars['_14aa11']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','le'=>'$max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_f0094b_old_params['_d7b83d']=$_f0094b_local_params;$_f0094b_old_vars['_d7b83d']=$_f0094b_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.edit_revision','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        <option <?php $_f0094b_old_params['_4b2195']=$_f0094b_local_params;$_f0094b_old_vars['_4b2195']=$_f0094b_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'object_status','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_f0094b_old_params['_e507b7']=$_f0094b_local_params;$_f0094b_old_vars['_e507b7']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_default_status','eq'=>'$__counter__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php else:?>
<?php $_f0094b_old_params['_ddcf4f']=$_f0094b_local_params;$_f0094b_old_vars['_ddcf4f']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 style="display:none"<?php endif;$_f0094b_local_params=$_f0094b_old_params['_ddcf4f'];$_f0094b_local_vars=$_f0094b_old_vars['_ddcf4f'];?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_e507b7'];$_f0094b_local_vars=$_f0094b_old_vars['_e507b7'];?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_4b2195'];$_f0094b_local_vars=$_f0094b_old_vars['_4b2195'];?>
<?php $_f0094b_old_params['_0f3746']=$_f0094b_local_params;$_f0094b_old_vars['_0f3746']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_status','eq'=>'$__counter__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php else:?>
<?php $_f0094b_old_params['_e279c2']=$_f0094b_local_params;$_f0094b_old_vars['_e279c2']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 style="display:none"<?php endif;$_f0094b_local_params=$_f0094b_old_params['_e279c2'];$_f0094b_local_vars=$_f0094b_old_vars['_e279c2'];?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_0f3746'];$_f0094b_local_vars=$_f0094b_old_vars['_0f3746'];?>
 value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo paml_htmlspecialchars($this->function_trans($this->setup_args(['phrase'=>'$__value__','escape'=>'','this_tag'=>'trans'],null,$this),$this),ENT_QUOTES)?>
</option>
      <?php else:?>

        <?php $_f0094b_old_params['_b5506c']=$_f0094b_local_params;$_f0094b_old_vars['_b5506c']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','ne'=>'$status_published','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_f0094b_old_params['_49029e']=$_f0094b_local_params;$_f0094b_old_vars['_49029e']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'__value','value'=>'Reserved(Replace)','this_tag'=>'setvar'],null,$this),$this)?>

            <?php else:?>

              <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__','setvar'=>'__value','this_tag'=>'var'],null,$this),$this),$this->setup_args('__value','setvar',$this),$this,'setvar')?>

            <?php endif;$_f0094b_local_params=$_f0094b_old_params['_49029e'];$_f0094b_local_vars=$_f0094b_old_vars['_49029e'];?>

        <option <?php $_f0094b_old_params['_f66eed']=$_f0094b_local_params;$_f0094b_old_vars['_f66eed']=$_f0094b_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'object_status','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_f0094b_old_params['_297fa3']=$_f0094b_local_params;$_f0094b_old_vars['_297fa3']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_default_status','eq'=>'$__counter__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php else:?>
<?php $_f0094b_old_params['_e3fe85']=$_f0094b_local_params;$_f0094b_old_vars['_e3fe85']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 style="display:none"<?php endif;$_f0094b_local_params=$_f0094b_old_params['_e3fe85'];$_f0094b_local_vars=$_f0094b_old_vars['_e3fe85'];?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_297fa3'];$_f0094b_local_vars=$_f0094b_old_vars['_297fa3'];?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_f66eed'];$_f0094b_local_vars=$_f0094b_old_vars['_f66eed'];?>
<?php $_f0094b_old_params['_500c29']=$_f0094b_local_params;$_f0094b_old_vars['_500c29']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_status','eq'=>'$__counter__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php else:?>
<?php $_f0094b_old_params['_d417d8']=$_f0094b_local_params;$_f0094b_old_vars['_d417d8']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 style="display:none"<?php endif;$_f0094b_local_params=$_f0094b_old_params['_d417d8'];$_f0094b_local_vars=$_f0094b_old_vars['_d417d8'];?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_500c29'];$_f0094b_local_vars=$_f0094b_old_vars['_500c29'];?>
 value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo paml_htmlspecialchars($this->function_trans($this->setup_args(['phrase'=>'$__value','escape'=>'','this_tag'=>'trans'],null,$this),$this),ENT_QUOTES)?>
</option>
        <?php endif;$_f0094b_local_params=$_f0094b_old_params['_b5506c'];$_f0094b_local_vars=$_f0094b_old_vars['_b5506c'];?>

      <?php endif;$_f0094b_local_params=$_f0094b_old_params['_d7b83d'];$_f0094b_local_vars=$_f0094b_old_vars['_d7b83d'];?>

      <?php endif;$_f0094b_local_params=$_f0094b_old_params['_14aa11'];$_f0094b_local_vars=$_f0094b_old_vars['_14aa11'];?>

    <?php endif;$c_14e0ed=ob_get_clean();endwhile; $_f0094b_local_params=$_f0094b_old_params['_14e0ed'];$_f0094b_local_vars=$_f0094b_old_vars['_14e0ed'];?>

    </select>
    <?php endif;$_f0094b_local_params=$_f0094b_old_params['_6e89cf'];$_f0094b_local_vars=$_f0094b_old_vars['_6e89cf'];?>

  <?php $_f0094b_old_params['_949a1c']=$_f0094b_local_params;$_f0094b_old_vars['_949a1c']=$_f0094b_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['column'=>'has_deadline','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

    <?php $_f0094b_old_params['_3d0316']=$_f0094b_local_params;$_f0094b_old_vars['_3d0316']=$_f0094b_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php $c_ce25ac=null;$_f0094b_old_params['_ce25ac']=$_f0094b_local_params;$_f0094b_old_vars['_ce25ac']=$_f0094b_local_vars;$a_ce25ac=$this->setup_args(['model'=>'$model','name'=>'has_deadline','prefix'=>'obj','this_tag'=>'objectcols'],null,$this);$_ce25ac=-1;$r_ce25ac=true;while($r_ce25ac===true):$r_ce25ac=($_ce25ac!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_ce25ac,$c_ce25ac,$this,$r_ce25ac,++$_ce25ac,'_ce25ac');ob_start();?>
<?php $c_ce25ac = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_ce25ac=false;}if($c_ce25ac ):?>

      <?php $_f0094b_old_params['_51ebe6']=$_f0094b_local_params;$_f0094b_old_vars['_51ebe6']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'obj_name','eq'=>'has_deadline','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_f0094b_old_params['_951018']=$_f0094b_local_params;$_f0094b_old_vars['_951018']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'obj_default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_var($this->setup_args(['name'=>'object_has_deadline','value'=>'1','this_tag'=>'var'],null,$this),$this)?>

      <?php endif;$_f0094b_local_params=$_f0094b_old_params['_951018'];$_f0094b_local_vars=$_f0094b_old_vars['_951018'];?>

      <?php endif;$_f0094b_local_params=$_f0094b_old_params['_51ebe6'];$_f0094b_local_vars=$_f0094b_old_vars['_51ebe6'];?>

      <?php endif;$c_ce25ac=ob_get_clean();endwhile; $_f0094b_local_params=$_f0094b_old_params['_ce25ac'];$_f0094b_local_vars=$_f0094b_old_vars['_ce25ac'];?>

    <?php endif;$_f0094b_local_params=$_f0094b_old_params['_3d0316'];$_f0094b_local_vars=$_f0094b_old_vars['_3d0316'];?>

    <input type="hidden" name="has_deadline" value="0">
    <label class="custom-control custom-checkbox status-has_deadline-cb">
    <input <?php $_f0094b_old_params['_b59d4e']=$_f0094b_local_params;$_f0094b_old_vars['_b59d4e']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
disabled<?php endif;$_f0094b_local_params=$_f0094b_old_params['_b59d4e'];$_f0094b_local_vars=$_f0094b_old_vars['_b59d4e'];?>
 id="has_deadline" class="status-has_deadline-cb form-control custom-control-input" type="checkbox" name="has_deadline" value="1" <?php $_f0094b_old_params['_517ee2']=$_f0094b_local_params;$_f0094b_old_vars['_517ee2']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_has_deadline','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_f0094b_local_params=$_f0094b_old_params['_517ee2'];$_f0094b_local_vars=$_f0094b_old_vars['_517ee2'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Specify the Deadline','this_tag'=>'trans'],null,$this),$this)?>

        </span>
    </label>
  <?php endif;$_f0094b_local_params=$_f0094b_old_params['_949a1c'];$_f0094b_local_vars=$_f0094b_old_vars['_949a1c'];?>

  </div>
</div>
<?php $_f0094b_old_params['_1ad952']=$_f0094b_local_params;$_f0094b_old_vars['_1ad952']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_has_workflow','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div class="row form-group" style="margin:-1em 0 0 -10px" id="status-alert-block">
  <div class="col-lg-2">
  </div>
  <div class="col-lg-10">
  <p class="text-muted text-danger hint-block">
    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Caution','this_tag'=>'trans'],null,$this),$this)?>
</span>
    <span id="status-alert-message"></span>
  </p>
  </div>
</div>
<script>
$('#status-alert-block').hide();
</script>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_1ad952'];$_f0094b_local_vars=$_f0094b_old_vars['_1ad952'];?>


<?php $_f0094b_old_params['_8b3356']=$_f0094b_local_params;$_f0094b_old_vars['_8b3356']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.edit_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_f0094b_old_params['_26968e']=$_f0094b_local_params;$_f0094b_old_vars['_26968e']=$_f0094b_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['column'=>'rev_type','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<div class="row form-group" style="margin:-1em 0 0 -10px" id="status-hint">
  <div class="col-lg-2">
  </div>
  <div class="col-lg-10">
  <p class="text-muted hint-block">
    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
    <?php echo $this->function_trans($this->setup_args(['phrase'=>'The status at replacement will be status of the master.','this_tag'=>'trans'],null,$this),$this)?>

    ( <?php echo $this->function_trans($this->setup_args(['phrase'=>'Current status of Master','this_tag'=>'trans'],null,$this),$this)?>
 : <?php echo $this->component('PTTags')->hdlr_statustext($this->setup_args(['status'=>'$_master_status','text'=>'1','icon'=>'1','model'=>'$model','this_tag'=>'statustext'],null,$this),$this)?>
)
  </p>
  </div>
</div>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_26968e'];$_f0094b_local_vars=$_f0094b_old_vars['_26968e'];?>

<?php endif;$_f0094b_local_params=$_f0094b_old_params['_8b3356'];$_f0094b_local_vars=$_f0094b_old_vars['_8b3356'];?>

<?php $_f0094b_old_params['_38eb6c']=$_f0094b_local_params;$_f0094b_old_vars['_38eb6c']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_has_workflow','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
  __workflow_owner_max_status = 0;
  <?php $_f0094b_old_params['_7ad612']=$_f0094b_local_params;$_f0094b_old_vars['_7ad612']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_workflow_owner_type','eq'=>'creator','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  __workflow_owner_max_status = 0;
  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'_workflow_owner_type','eq'=>'reviewer','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

  __workflow_owner_max_status = 1;
  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'_workflow_owner_type','eq'=>'publisher','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

  __workflow_owner_max_status = 5;
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_7ad612'];$_f0094b_local_vars=$_f0094b_old_vars['_7ad612'];?>

  __workflow_orig_max_status = __workflow_owner_max_status;
  __workflow_current_status = $('#status-selector').val();
  __workflow_orig_status = __workflow_current_status;
<?php $_f0094b_old_params['_690bdd']=$_f0094b_local_params;$_f0094b_old_vars['_690bdd']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_user_id','ne'=>'$user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#status-selector').change(function(){
    $('#status-alert-block').hide();
    if ( $(this).val() > __workflow_owner_max_status ) {
        if( window.confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'You are trying to specify a status that can not be set by the current user. Changing the status will change the user to you. Are you sure you want to change the status?','this_tag'=>'trans'],null,$this),$this)?>
') ) {
            __workflow_current_status = $(this).val();
            $('[name=__workflow_type]:eq(0)').prop('checked', true);
            if ( __enable_workflow ) {
                __reset_workflow();
            }
            $('#badge-change-user').html('<span><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_nickname','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>');
            $('#badge-change-user').css('display', 'inline');
            $('#badge-change-arrow').css('display', 'inline');
            $('#__workflow_message-wrapper').show();
            $('#__workflow_message').focus();
        } else {
            $(this).val( __workflow_current_status );
            return;
        }
    }
});
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_690bdd'];$_f0094b_local_vars=$_f0094b_old_vars['_690bdd'];?>

</script>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_38eb6c'];$_f0094b_local_vars=$_f0094b_old_vars['_38eb6c'];?>

<?php $_f0094b_old_params['_f7d1c0']=$_f0094b_local_params;$_f0094b_old_vars['_f7d1c0']=$_f0094b_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['column'=>'published_on','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<style>
@media ( max-width: 576px ) {
  #published_on_date { float:left; }
  #published_on_time{ float:left; }
  .unpublished-on-col-mark{ display:none !important;}
  #published-on-col-wrapper { display: block !important; width:100% !important; }
  #unpublished-on-col-wrapper { display: block !important; width:100% !important; }
  #unpublished_on_date { float:left; }
  #unpublished_on_time{ float:left; }
  #published_on_date { width: 165px !important; }
  #unpublished_on_date { width: 165px !important; }
  #published_on_time { width: 93px !important; height: 37px !important; }
  #unpublished_on_time { width: 93px !important; height: 37px !important; }
}
#published_on_date, #published_on_time, #unpublished_on_date, #unpublished_on_time { height: 38px }
</style>
<div class="row form-group published_on-col">
  <div class="col-lg-2">
      <label for="published_on_date"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Publish Date','this_tag'=>'trans'],null,$this),$this)?>
 <span class="unpublished-on-col"> / <?php echo $this->function_trans($this->setup_args(['phrase'=>'Unpublish Date','this_tag'=>'trans'],null,$this),$this)?>
</span></label>
  </div>
  <div class="col-lg-10 form-inline">
  <span style="white-space:nowrap" id="published-on-col-wrapper">
    <span class="date-input">
    <input id="published_on_date" type="date" class="form-control date" name="published_on_date" value="<?php $_f0094b_old_params['_af652e']=$_f0094b_local_params;$_f0094b_old_vars['_af652e']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_published_on','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_format_ts($this->function_var($this->setup_args(['name'=>'object_published_on','format_ts'=>'Y-m-d','this_tag'=>'var'],null,$this),$this),$this->setup_args('Y-m-d','format_ts',$this),$this,'format_ts')?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_af652e'];$_f0094b_local_vars=$_f0094b_old_vars['_af652e'];?>
">
    </span>
    <span class="date-input time-input">
    <input id="published_on_time" step="<?php $_f0094b_old_params['_e22857']=$_f0094b_local_params;$_f0094b_old_vars['_e22857']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'time_step','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'time_step','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
1<?php endif;$_f0094b_local_params=$_f0094b_old_params['_e22857'];$_f0094b_local_vars=$_f0094b_old_vars['_e22857'];?>
" <?php $_f0094b_old_params['_791d5d']=$_f0094b_local_params;$_f0094b_old_vars['_791d5d']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
disabled<?php endif;$_f0094b_local_params=$_f0094b_old_params['_791d5d'];$_f0094b_local_vars=$_f0094b_old_vars['_791d5d'];?>
 type="time" step="1" class="form-control time" name="published_on_time" value="<?php $_f0094b_old_params['_94aa74']=$_f0094b_local_params;$_f0094b_old_vars['_94aa74']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_published_on','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_format_ts($this->function_var($this->setup_args(['name'=>'object_published_on','format_ts'=>'H:i:s','this_tag'=>'var'],null,$this),$this),$this->setup_args('H:i:s','format_ts',$this),$this,'format_ts')?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_94aa74'];$_f0094b_local_vars=$_f0094b_old_vars['_94aa74'];?>
">
    </span>
  </span>
<?php $_f0094b_old_params['_7b08ae']=$_f0094b_local_params;$_f0094b_old_vars['_7b08ae']=$_f0094b_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['column'=>'unpublished_on','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<span class="period-separator unpublished-on-col">
<i class="fa fa-arrows-h unpublished-on-col unpublished-on-col-mark" aria-hidden="true"></i>
  <label for="unpublished_on_date"><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'To','this_tag'=>'trans'],null,$this),$this)?>
</span></label>
</span>
  <span style="white-space:nowrap" id="unpublished-on-col-wrapper">
    <span class="date-input">
    <span class="unpublished-on-col">
    <input id="unpublished_on_date" type="date" class="form-control date" name="unpublished_on_date" value="<?php $_f0094b_old_params['_1fc69b']=$_f0094b_local_params;$_f0094b_old_vars['_1fc69b']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_unpublished_on','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_format_ts($this->function_var($this->setup_args(['name'=>'object_unpublished_on','format_ts'=>'Y-m-d','this_tag'=>'var'],null,$this),$this),$this->setup_args('Y-m-d','format_ts',$this),$this,'format_ts')?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_1fc69b'];$_f0094b_local_vars=$_f0094b_old_vars['_1fc69b'];?>
">
    </span>
    </span>
    <span class="date-input time-input">
    <span class="unpublished-on-col">
    <input id="unpublished_on_time" type="time" step="<?php $_f0094b_old_params['_19de6a']=$_f0094b_local_params;$_f0094b_old_vars['_19de6a']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'time_step','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'time_step','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
1<?php endif;$_f0094b_local_params=$_f0094b_old_params['_19de6a'];$_f0094b_local_vars=$_f0094b_old_vars['_19de6a'];?>
" class="form-control time" name="unpublished_on_time" value="<?php $_f0094b_old_params['_4cca0b']=$_f0094b_local_params;$_f0094b_old_vars['_4cca0b']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_unpublished_on','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_format_ts($this->function_var($this->setup_args(['name'=>'object_unpublished_on','format_ts'=>'H:i:s','this_tag'=>'var'],null,$this),$this),$this->setup_args('H:i:s','format_ts',$this),$this,'format_ts')?>
<?php else:?>
00:00:00<?php endif;$_f0094b_local_params=$_f0094b_old_params['_4cca0b'];$_f0094b_local_vars=$_f0094b_old_vars['_4cca0b'];?>
">
    </span>
    </span>
  </span>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_7b08ae'];$_f0094b_local_vars=$_f0094b_old_vars['_7b08ae'];?>

  </div>
</div>
<?php $_f0094b_old_params['_0bdad0']=$_f0094b_local_params;$_f0094b_old_vars['_0bdad0']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.edit_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_f0094b_old_params['_442749']=$_f0094b_local_params;$_f0094b_old_vars['_442749']=$_f0094b_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['column'=>'rev_type','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<div class="row form-group">
  <div class="col-lg-2">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Revision Type','this_tag'=>'trans'],null,$this),$this)?>

  </div>
  <div class="col-lg-10">
    <select class="form-control short custom-select" name="rev_type" id="object-rev_type">
      <option <?php $_f0094b_old_params['_1f8399']=$_f0094b_local_params;$_f0094b_old_vars['_1f8399']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_rev_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_f0094b_local_params=$_f0094b_old_params['_1f8399'];$_f0094b_local_vars=$_f0094b_old_vars['_1f8399'];?>
 value="1"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Auto Save','this_tag'=>'trans'],null,$this),$this)?>
</option>
      <option <?php $_f0094b_old_params['_84eaac']=$_f0094b_local_params;$_f0094b_old_vars['_84eaac']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_rev_type','eq'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_f0094b_local_params=$_f0094b_old_params['_84eaac'];$_f0094b_local_vars=$_f0094b_old_vars['_84eaac'];?>
 value="2"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Revision','this_tag'=>'trans'],null,$this),$this)?>
</option>
    </select>
  </div>
</div>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_442749'];$_f0094b_local_vars=$_f0094b_old_vars['_442749'];?>

<?php endif;$_f0094b_local_params=$_f0094b_old_params['_0bdad0'];$_f0094b_local_vars=$_f0094b_old_vars['_0bdad0'];?>

<script>
var object_rev_type = '<?php echo $this->function_var($this->setup_args(['name'=>'object_rev_type','this_tag'=>'var'],null,$this),$this)?>
';
<?php $_f0094b_old_params['_5eb8b1']=$_f0094b_local_params;$_f0094b_old_vars['_5eb8b1']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.edit_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_f0094b_old_params['_29f4aa']=$_f0094b_local_params;$_f0094b_old_vars['_29f4aa']=$_f0094b_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['column'=>'rev_type','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_f0094b_old_params['_f3b751']=$_f0094b_local_params;$_f0094b_old_vars['_f3b751']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_status','ne'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#status-hint').hide();
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_f3b751'];$_f0094b_local_vars=$_f0094b_old_vars['_f3b751'];?>

$('#status-selector').change(function(){
    if ( $(this).val() == 3 ) {
        $('#status-hint').show();
        $('select[name="rev_type"]').val(2);
    } else {
        $('#status-hint').hide();
        $('select[name="rev_type"]').val(object_rev_type);
    }
});
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_29f4aa'];$_f0094b_local_vars=$_f0094b_old_vars['_29f4aa'];?>

<?php endif;$_f0094b_local_params=$_f0094b_old_params['_5eb8b1'];$_f0094b_local_vars=$_f0094b_old_vars['_5eb8b1'];?>

$(function () {
    if ( $('#has_deadline').prop('checked') == false ) {
        $('.unpublished-on-col').hide();
    }
});
$('#has_deadline').click(function(){
    if ( $(this).prop('checked') ) {
        $('.unpublished-on-col').show();
        $('#unpublished_on_date').focus();
    } else {
        $('.unpublished-on-col').hide();
    }
});
</script>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_f7d1c0'];$_f0094b_local_vars=$_f0094b_old_vars['_f7d1c0'];?><?php $this->out=ob_get_clean();$this->meta=array (
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