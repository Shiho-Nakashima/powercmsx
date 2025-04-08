<?php ob_start();?><?php $_63d9f8_vars=&$this->vars;$_63d9f8_old_params=&$this->old_params;$_63d9f8_local_params=&$this->local_params;$_63d9f8_old_vars=&$this->old_vars;$_63d9f8_local_vars=&$this->local_vars;?><div class="row form-group">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Send Notification Email','this_tag'=>'trans'],null,$this),$this)?>

      <?php $_63d9f8_old_params['_1bc5da']=$_63d9f8_local_params;$_63d9f8_old_vars['_1bc5da']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_1bc5da'];$_63d9f8_local_vars=$_63d9f8_old_vars['_1bc5da'];?>

    </label>
  </div>
  <div class="col-lg-10">
    <input type="hidden" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="0">
    <label class="custom-control custom-checkbox">
    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" class="custom-control-input watch-changed"
    <?php $_63d9f8_old_params['_8e09da']=$_63d9f8_local_params;$_63d9f8_old_vars['_8e09da']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_8e09da'];$_63d9f8_local_vars=$_63d9f8_old_vars['_8e09da'];?>

     type="checkbox" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="1" <?php $_63d9f8_old_params['_b3575c']=$_63d9f8_local_params;$_63d9f8_old_vars['_b3575c']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'value','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_b3575c'];$_63d9f8_local_vars=$_63d9f8_old_vars['_b3575c'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
    </label>
    <input type="hidden" name="not_save" value="0">
    <label class="custom-control custom-checkbox send_email">
    <input class="custom-control-input watch-changed"
     type="checkbox" name="not_save" value="1" <?php $_63d9f8_old_params['_b3e081']=$_63d9f8_local_params;$_63d9f8_old_vars['_b3e081']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_not_save','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_b3e081'];$_63d9f8_local_vars=$_63d9f8_old_vars['_b3e081'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Does not save the data into the database','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
  </div>
</div>
<div class="row form-group send_email">
  <div class="col-lg-2">
  </div>
  <div class="col-lg-10">
    <input type="hidden" name="send_thanks" value="0">
    <label class="custom-control custom-checkbox mb-4">
    <input id="send_thanks" class="custom-control-input watch-changed"
     type="checkbox" name="send_thanks" value="1" <?php $_63d9f8_old_params['_dfe391']=$_63d9f8_local_params;$_63d9f8_old_vars['_dfe391']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_send_thanks','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_dfe391'];$_63d9f8_local_vars=$_63d9f8_old_vars['_dfe391'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Send Thank You Message','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    <div class="row form-group send_thanks">
      <div class="col-lg-2">
        <label for="thanks_template">
          <?php echo $this->function_trans($this->setup_args(['phrase'=>'Template','this_tag'=>'trans'],null,$this),$this)?>
 : 
        </label>
      </div>
      <div class="col-lg-9">
        <select id="thanks_template" class="form-control custom-select watch-changed" name="thanks_template">
          <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'Unspecified','this_tag'=>'trans'],null,$this),$this)?>
</option>
        <?php $c_f6eec6=null;$_63d9f8_old_params['_f6eec6']=$_63d9f8_local_params;$_63d9f8_old_vars['_f6eec6']=$_63d9f8_local_vars;$a_f6eec6=$this->setup_args(['model'=>'template','sort_by'=>'order','prefix'=>'template','class'=>'Mail','workspace_id'=>'0','this_tag'=>'objectloop'],null,$this);$_f6eec6=-1;$r_f6eec6=true;while($r_f6eec6===true):$r_f6eec6=($_f6eec6!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_f6eec6,$c_f6eec6,$this,$r_f6eec6,++$_f6eec6,'_f6eec6');ob_start();?>
<?php $c_f6eec6 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_f6eec6=false;}if($c_f6eec6 ):?>

          <option value="<?php echo $this->function_var($this->setup_args(['name'=>'template_id','this_tag'=>'var'],null,$this),$this)?>
"
            <?php $_63d9f8_old_params['_b32de1']=$_63d9f8_local_params;$_63d9f8_old_vars['_b32de1']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_thanks_template','eq'=>'$template_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_b32de1'];$_63d9f8_local_vars=$_63d9f8_old_vars['_b32de1'];?>

            ><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'template_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 (<?php echo $this->function_trans($this->setup_args(['phrase'=>'System','this_tag'=>'trans'],null,$this),$this)?>
)</option>
        <?php endif;$c_f6eec6=ob_get_clean();endwhile; $_63d9f8_local_params=$_63d9f8_old_params['_f6eec6'];$_63d9f8_local_vars=$_63d9f8_old_vars['_f6eec6'];?>

        <?php $_63d9f8_old_params['_ba6d7b']=$_63d9f8_local_params;$_63d9f8_old_vars['_ba6d7b']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $c_504d9a=null;$_63d9f8_old_params['_504d9a']=$_63d9f8_local_params;$_63d9f8_old_vars['_504d9a']=$_63d9f8_local_vars;$a_504d9a=$this->setup_args(['model'=>'template','sort_by'=>'order','prefix'=>'template','class'=>'Mail','workspace_id'=>'$workspace_id','this_tag'=>'objectloop'],null,$this);$_504d9a=-1;$r_504d9a=true;while($r_504d9a===true):$r_504d9a=($_504d9a!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_504d9a,$c_504d9a,$this,$r_504d9a,++$_504d9a,'_504d9a');ob_start();?>
<?php $c_504d9a = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_504d9a=false;}if($c_504d9a ):?>

          <option value="<?php echo $this->function_var($this->setup_args(['name'=>'template_id','this_tag'=>'var'],null,$this),$this)?>
"
            <?php $_63d9f8_old_params['_70d7b4']=$_63d9f8_local_params;$_63d9f8_old_vars['_70d7b4']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_thanks_template','eq'=>'$template_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_70d7b4'];$_63d9f8_local_vars=$_63d9f8_old_vars['_70d7b4'];?>

            ><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'template_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 (<?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpace','this_tag'=>'trans'],null,$this),$this)?>
)</option>
          <?php endif;$c_504d9a=ob_get_clean();endwhile; $_63d9f8_local_params=$_63d9f8_old_params['_504d9a'];$_63d9f8_local_vars=$_63d9f8_old_vars['_504d9a'];?>

        <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_ba6d7b'];$_63d9f8_local_vars=$_63d9f8_old_vars['_ba6d7b'];?>

        </select>
      </div>
    </div>
    <div class="row form-group send_thanks" style="margin-top:1.2em !important">
      <div class="col-lg-2">
        <label for="email_from">
          <?php echo $this->function_trans($this->setup_args(['phrase'=>'Mail From','this_tag'=>'trans'],null,$this),$this)?>
 : 
        </label>
      </div>
      <div class="col-lg-9">
        <input id="email_from" type="text" class="form-control watch-changed" name="email_from" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'object_email_from','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      </div>
    </div>
    <div class="row form-group send_thanks">
      <div class="col-lg-2">
        <label for="thanks_return_path">
          <?php echo $this->function_trans($this->setup_args(['phrase'=>'Return-Path','this_tag'=>'trans'],null,$this),$this)?>
 : 
        </label>
      </div>
      <div class="col-lg-9">
        <input type="text" id="thanks_return_path" name="thanks_return_path" class="form-control" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'object_thanks_return_path','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      </div>
    </div>
    <div class="row form-group send_thanks">
      <div class="col-lg-2">
        <label for="thanks_cc">
          <?php echo $this->function_trans($this->setup_args(['phrase'=>'Thanks Cc','this_tag'=>'trans'],null,$this),$this)?>
 : 
        </label>
      </div>
      <div class="col-lg-9">
        <input type="text" id="thanks_cc" name="thanks_cc" class="form-control" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'object_thanks_cc','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      </div>
    </div>
    <div class="row form-group send_thanks">
      <div class="col-lg-2">
        <label for="thanks_bcc">
          <?php echo $this->function_trans($this->setup_args(['phrase'=>'Thanks Bcc','this_tag'=>'trans'],null,$this),$this)?>
 : 
        </label>
      </div>
      <div class="col-lg-9">
        <input type="text" id="thanks_bcc" name="thanks_bcc" class="form-control" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'object_thanks_bcc','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <p class="text-muted hint-block" id="bannedwords_hint">
          <i class="fa fa-question-circle-o" aria-hidden="true"></i>
          <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
          <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can use template tags in the email address field.','this_tag'=>'trans'],null,$this),$this)?>

        </p>
      </div>
    </div>
  </div>
</div>
<hr>
<div class="row form-group send_email">
  <div class="col-lg-2">
  </div>
  <div class="col-lg-10">
    <input type="hidden" name="send_notify" value="0">
    <label class="custom-control custom-checkbox mb-4">
    <input id="send_notify" class="custom-control-input watch-changed"
     type="checkbox" name="send_notify" value="1" <?php $_63d9f8_old_params['_ce8627']=$_63d9f8_local_params;$_63d9f8_old_vars['_ce8627']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_send_notify','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_ce8627'];$_63d9f8_local_vars=$_63d9f8_old_vars['_ce8627'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Send Notify Message','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    <div class="row form-group send_notify">
      <div class="col-lg-2">
        <label for="notify_template">
          <?php echo $this->function_trans($this->setup_args(['phrase'=>'Template','this_tag'=>'trans'],null,$this),$this)?>
 : 
        </label>
      </div>
      <div class="col-lg-9">
        <select id="notify_template" class="form-control custom-select watch-changed" name="notify_template">
          <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'Unspecified','this_tag'=>'trans'],null,$this),$this)?>
</option>
        <?php $c_2696a1=null;$_63d9f8_old_params['_2696a1']=$_63d9f8_local_params;$_63d9f8_old_vars['_2696a1']=$_63d9f8_local_vars;$a_2696a1=$this->setup_args(['model'=>'template','sort_by'=>'order','prefix'=>'template','class'=>'Mail','workspace_id'=>'0','this_tag'=>'objectloop'],null,$this);$_2696a1=-1;$r_2696a1=true;while($r_2696a1===true):$r_2696a1=($_2696a1!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_2696a1,$c_2696a1,$this,$r_2696a1,++$_2696a1,'_2696a1');ob_start();?>
<?php $c_2696a1 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_2696a1=false;}if($c_2696a1 ):?>

          <option value="<?php echo $this->function_var($this->setup_args(['name'=>'template_id','this_tag'=>'var'],null,$this),$this)?>
"
            <?php $_63d9f8_old_params['_b4135c']=$_63d9f8_local_params;$_63d9f8_old_vars['_b4135c']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_notify_template','eq'=>'$template_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_b4135c'];$_63d9f8_local_vars=$_63d9f8_old_vars['_b4135c'];?>

            ><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'template_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 (<?php echo $this->function_trans($this->setup_args(['phrase'=>'System','this_tag'=>'trans'],null,$this),$this)?>
)</option>
        <?php endif;$c_2696a1=ob_get_clean();endwhile; $_63d9f8_local_params=$_63d9f8_old_params['_2696a1'];$_63d9f8_local_vars=$_63d9f8_old_vars['_2696a1'];?>

        <?php $_63d9f8_old_params['_1e0023']=$_63d9f8_local_params;$_63d9f8_old_vars['_1e0023']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $c_eafd14=null;$_63d9f8_old_params['_eafd14']=$_63d9f8_local_params;$_63d9f8_old_vars['_eafd14']=$_63d9f8_local_vars;$a_eafd14=$this->setup_args(['model'=>'template','sort_by'=>'order','prefix'=>'template','class'=>'Mail','workspace_id'=>'$workspace_id','this_tag'=>'objectloop'],null,$this);$_eafd14=-1;$r_eafd14=true;while($r_eafd14===true):$r_eafd14=($_eafd14!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_eafd14,$c_eafd14,$this,$r_eafd14,++$_eafd14,'_eafd14');ob_start();?>
<?php $c_eafd14 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_eafd14=false;}if($c_eafd14 ):?>

          <option value="<?php echo $this->function_var($this->setup_args(['name'=>'template_id','this_tag'=>'var'],null,$this),$this)?>
"
            <?php $_63d9f8_old_params['_c91e23']=$_63d9f8_local_params;$_63d9f8_old_vars['_c91e23']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_notify_template','eq'=>'$template_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_c91e23'];$_63d9f8_local_vars=$_63d9f8_old_vars['_c91e23'];?>

            ><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'template_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 (<?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpace','this_tag'=>'trans'],null,$this),$this)?>
)</option>
          <?php endif;$c_eafd14=ob_get_clean();endwhile; $_63d9f8_local_params=$_63d9f8_old_params['_eafd14'];$_63d9f8_local_vars=$_63d9f8_old_vars['_eafd14'];?>

        <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_1e0023'];$_63d9f8_local_vars=$_63d9f8_old_vars['_1e0023'];?>

        </select>
      </div>
    </div>
    <div class="row form-group send_notify" style="margin-top:1.2em !important">
      <div class="col-lg-2">
        <label for="notify_from">
          <?php echo $this->function_trans($this->setup_args(['phrase'=>'Mail From','this_tag'=>'trans'],null,$this),$this)?>
 : 
        </label>
      </div>
      <div class="col-lg-9">
        <input id="notify_from" type="text" class="form-control watch-changed" name="notify_from" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'object_notify_from','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      </div>
    </div>
    <div class="row form-group send_notify">
      <div class="col-lg-2">
        <label for="notify_return_path">
          <?php echo $this->function_trans($this->setup_args(['phrase'=>'Return-Path','this_tag'=>'trans'],null,$this),$this)?>
 : 
        </label>
      </div>
      <div class="col-lg-9">
        <input type="text" id="notify_return_path" name="notify_return_path" class="form-control" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'object_notify_return_path','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      </div>
    </div>
    <div class="row form-group send_notify">
      <div class="col-lg-2">
        <label for="notify_to">
          <?php echo $this->function_trans($this->setup_args(['phrase'=>'Notify To','this_tag'=>'trans'],null,$this),$this)?>
 <?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
 : 
        </label>
      </div>
      <div class="col-lg-9">
        <input type="text" id="notify_to" name="notify_to" class="form-control" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'object_notify_to','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      </div>
    </div>
    <div class="row form-group send_notify">
      <div class="col-lg-2">
        <label for="notify_cc">
          <?php echo $this->function_trans($this->setup_args(['phrase'=>'Notify Cc','this_tag'=>'trans'],null,$this),$this)?>
 : 
        </label>
      </div>
      <div class="col-lg-9">
        <input type="text" id="notify_cc" name="notify_cc" class="form-control" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'object_notify_cc','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      </div>
    </div>
    <div class="row form-group send_notify">
      <div class="col-lg-2">
        <label for="notify_bcc">
          <?php echo $this->function_trans($this->setup_args(['phrase'=>'Notify Bcc','this_tag'=>'trans'],null,$this),$this)?>
 : 
        </label>
      </div>
      <div class="col-lg-9">
        <input type="text" id="notify_bcc" name="notify_bcc" class="form-control" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'object_notify_bcc','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <p class="text-muted hint-block" id="bannedwords_hint">
          <i class="fa fa-question-circle-o" aria-hidden="true"></i>
          <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
          <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can use template tags in the email address field.','this_tag'=>'trans'],null,$this),$this)?>

        </p>
      </div>
    </div>
  </div>
</div>
<script>
<?php $_63d9f8_old_params['_c5cf10']=$_63d9f8_local_params;$_63d9f8_old_vars['_c5cf10']=$_63d9f8_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'object_send_notify','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  $('.send_notify').hide();
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_c5cf10'];$_63d9f8_local_vars=$_63d9f8_old_vars['_c5cf10'];?>

$('#send_notify').change(function(){
    if ( $(this).prop('checked') ) {
        $('.send_notify').show();
    } else {
        $('.send_notify').hide();
    }
});
<?php $_63d9f8_old_params['_0efd36']=$_63d9f8_local_params;$_63d9f8_old_vars['_0efd36']=$_63d9f8_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'object_send_thanks','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  $('.send_thanks').hide();
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_0efd36'];$_63d9f8_local_vars=$_63d9f8_old_vars['_0efd36'];?>

$('#send_thanks').change(function(){
    if ( $(this).prop('checked') ) {
        $('.send_thanks').show();
    } else {
        $('.send_thanks').hide();
    }
});
<?php $_63d9f8_old_params['_9eefb1']=$_63d9f8_local_params;$_63d9f8_old_vars['_9eefb1']=$_63d9f8_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'object_send_email','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  $('.send_email').hide();
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_9eefb1'];$_63d9f8_local_vars=$_63d9f8_old_vars['_9eefb1'];?>

$('#<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
').change(function(){
    if ( $(this).prop('checked') ) {
        $('.send_email').show();
    } else {
        $('.send_email').hide();
    }
});
</script><?php $this->out=ob_get_clean();$this->meta=array (
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