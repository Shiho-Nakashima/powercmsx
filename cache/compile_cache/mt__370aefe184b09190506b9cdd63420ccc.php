<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><?php $_ba5c34_old_params['_5f4094']=$_ba5c34_local_params;$_ba5c34_old_vars['_5f4094']=$_ba5c34_local_vars;if($this->component('PTTags')->hdlr_ifacceptcomment($this->setup_args(['this_tag'=>'ifacceptcomment'],null,$this),null,$this,true,true)):?>

<div class="container-fluid">
<?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Comments','this_tag'=>'include'],null,$this),$this)?>

<hr>
<h2 id="comment"><span class="title"><?php echo $this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['phrase'=>'New Comment','language'=>'$language','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language')?>
</span></h2>
<hr>
<?php $_ba5c34_old_params['_b5ede8']=$_ba5c34_local_params;$_ba5c34_old_vars['_b5ede8']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.comment_publish_on_post','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <p class="text-center"><?php echo $this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['phrase'=>'Please complete the form below and click Confirm button.','language'=>'$language','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language')?>
</p>
<?php else:?>

  <?php $_ba5c34_old_params['_9983a1']=$_ba5c34_local_params;$_ba5c34_old_vars['_9983a1']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'submit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $_ba5c34_old_params['_cb595e']=$_ba5c34_local_params;$_ba5c34_old_vars['_cb595e']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <p class="text-center text-danger"><?php echo $this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['phrase'=>'An error occurred.','language'=>'$language','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language')?>
</p>
      <?php $c_b82309=null;$_ba5c34_old_params['_b82309']=$_ba5c34_local_params;$_ba5c34_old_vars['_b82309']=$_ba5c34_local_vars;$a_b82309=$this->setup_args(['name'=>'errors','this_tag'=>'loop'],null,$this);$_b82309=-1;$r_b82309=true;while($r_b82309===true):$r_b82309=($_b82309!==-1)?false:true;echo $this->block_loop($a_b82309,$c_b82309,$this,$r_b82309,++$_b82309,'_b82309');ob_start();?>
<?php $c_b82309 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_b82309=false;}if($c_b82309 ):?>

        <?php $_ba5c34_old_params['_9dd7a9']=$_ba5c34_local_params;$_ba5c34_old_vars['_9dd7a9']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<ul><?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_9dd7a9'];$_ba5c34_local_vars=$_ba5c34_old_vars['_9dd7a9'];?>

        <li><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</li>
        <?php $_ba5c34_old_params['_365168']=$_ba5c34_local_params;$_ba5c34_old_vars['_365168']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</ul><?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_365168'];$_ba5c34_local_vars=$_ba5c34_old_vars['_365168'];?>

      <?php endif;$c_b82309=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_b82309'];$_ba5c34_local_vars=$_ba5c34_old_vars['_b82309'];?>

    <?php else:?>

    <p class="text-center">
      <?php echo $this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['phrase'=>'Thank you for your comment.','language'=>'$language','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language')?>

      <?php $_ba5c34_old_params['_f4da06']=$_ba5c34_local_params;$_ba5c34_old_vars['_f4da06']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'comment_status','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['phrase'=>'Your comment has been received and held for review by administrator.','language'=>'$language','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language')?>
<?php else:?>
<script>window.location.hash='comment-<?php echo $this->function_var($this->setup_args(['name'=>'comment_id','this_tag'=>'var'],null,$this),$this)?>
';</script><?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_f4da06'];$_ba5c34_local_vars=$_ba5c34_old_vars['_f4da06'];?>

    </p>
    <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_cb595e'];$_ba5c34_local_vars=$_ba5c34_old_vars['_cb595e'];?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.submit','eq'=>'1','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <p class="text-center">
      <?php echo $this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['phrase'=>'Thank you for your comment.','language'=>'$language','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language')?>

      <?php $_ba5c34_old_params['_81d9f4']=$_ba5c34_local_params;$_ba5c34_old_vars['_81d9f4']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'comment_status','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['phrase'=>'Your comment has been received and held for review by administrator.','language'=>'$language','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language')?>
<?php else:?>
<script>window.location.hash='comment-<?php echo $this->function_var($this->setup_args(['name'=>'comment_id','this_tag'=>'var'],null,$this),$this)?>
';</script><?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_81d9f4'];$_ba5c34_local_vars=$_ba5c34_old_vars['_81d9f4'];?>

    </p>
  <?php else:?>

    <?php $_ba5c34_old_params['_d4a263']=$_ba5c34_local_params;$_ba5c34_old_vars['_d4a263']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <p class="text-center"><?php echo $this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['phrase'=>'Please check your entries.','language'=>'$language','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language')?>
</p>
      <?php $c_3c34d8=null;$_ba5c34_old_params['_3c34d8']=$_ba5c34_local_params;$_ba5c34_old_vars['_3c34d8']=$_ba5c34_local_vars;$a_3c34d8=$this->setup_args(['name'=>'errors','this_tag'=>'loop'],null,$this);$_3c34d8=-1;$r_3c34d8=true;while($r_3c34d8===true):$r_3c34d8=($_3c34d8!==-1)?false:true;echo $this->block_loop($a_3c34d8,$c_3c34d8,$this,$r_3c34d8,++$_3c34d8,'_3c34d8');ob_start();?>
<?php $c_3c34d8 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_3c34d8=false;}if($c_3c34d8 ):?>

        <?php $_ba5c34_old_params['_b2a200']=$_ba5c34_local_params;$_ba5c34_old_vars['_b2a200']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<ul><?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_b2a200'];$_ba5c34_local_vars=$_ba5c34_old_vars['_b2a200'];?>

        <li><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</li>
        <?php $_ba5c34_old_params['_147f30']=$_ba5c34_local_params;$_ba5c34_old_vars['_147f30']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</ul><?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_147f30'];$_ba5c34_local_vars=$_ba5c34_old_vars['_147f30'];?>

      <?php endif;$c_3c34d8=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_3c34d8'];$_ba5c34_local_vars=$_ba5c34_old_vars['_3c34d8'];?>

    <?php else:?>

      <?php $_ba5c34_old_params['_222db2']=$_ba5c34_local_params;$_ba5c34_old_vars['_222db2']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'confirm_ok','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <p class="text-center"><?php echo $this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['phrase'=>'Confirm the following and click Submit button.','language'=>'$language','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language')?>
</p>
      <?php else:?>

        <p class="text-center"><?php echo $this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['phrase'=>'Please complete the form below and click Confirm button.','language'=>'$language','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language')?>
</p>
      <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_222db2'];$_ba5c34_local_vars=$_ba5c34_old_vars['_222db2'];?>

    <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_d4a263'];$_ba5c34_local_vars=$_ba5c34_old_vars['_d4a263'];?>

  <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_9983a1'];$_ba5c34_local_vars=$_ba5c34_old_vars['_9983a1'];?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_b5ede8'];$_ba5c34_local_vars=$_ba5c34_old_vars['_b5ede8'];?>

</div>
<div class="container-fluid">
<?php $c_242dff=null;$_ba5c34_old_params['_242dff']=$_ba5c34_local_params;$_ba5c34_old_vars['_242dff']=$_ba5c34_local_vars;$a_242dff=$this->setup_args(['name'=>'autoset_cols','this_tag'=>'setvarblock'],null,$this);ob_start();?>
id,remote_ip,object_id,model,status,contributor_id,contributor_type,parent_id,created_by,modified_by,,created_on,modified_on,workspace_id<?php $c_242dff=ob_get_clean();$c_242dff=$this->block_setvarblock($a_242dff,$c_242dff,$this,$r_242dff,1,'_242dff');echo($c_242dff); $_ba5c34_local_params=$_ba5c34_old_params['_242dff'];?>

<?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'autoset_cols','split'=>',','setvar'=>'autoset_cols','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('autoset_cols','setvar',$this),$this,'setvar')?>

<form action="<?php echo $this->function_var($this->setup_args(['name'=>'current_archive_url','this_tag'=>'var'],null,$this),$this)?>
#comment" method="POST">
  <input type="hidden" name="__mode" value="<?php $_ba5c34_old_params['_34c92d']=$_ba5c34_local_params;$_ba5c34_old_vars['_34c92d']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'confirm_ok','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
submit<?php else:?>
confirm<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_34c92d'];$_ba5c34_local_vars=$_ba5c34_old_vars['_34c92d'];?>
">
  <input type="hidden" name="_type" value="comment">
  <input type="hidden" name="_language" value="<?php echo $this->function_var($this->setup_args(['name'=>'language','this_tag'=>'var'],null,$this),$this)?>
">
  <input type="hidden" name="model" value="<?php echo $this->function_var($this->setup_args(['name'=>'current_archive_model','this_tag'=>'var'],null,$this),$this)?>
">  
  <input type="hidden" name="object_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'current_object_id','this_tag'=>'var'],null,$this),$this)?>
">
  <input type="hidden" name="magic_token" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'magic_token','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
  <table class="table table-hover table-striped form-table">
    <tbody>
      <?php $c_bfa257=null;$_ba5c34_old_params['_bfa257']=$_ba5c34_local_params;$_ba5c34_old_vars['_bfa257']=$_ba5c34_local_vars;$a_bfa257=$this->setup_args(['model'=>'comment','this_tag'=>'objectcols'],null,$this);$_bfa257=-1;$r_bfa257=true;while($r_bfa257===true):$r_bfa257=($_bfa257!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_bfa257,$c_bfa257,$this,$r_bfa257,++$_bfa257,'_bfa257');ob_start();?>
<?php $c_bfa257 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_bfa257=false;}if($c_bfa257 ):?>

      <?php $_ba5c34_old_params['_ffccc0']=$_ba5c34_local_params;$_ba5c34_old_vars['_ffccc0']=$_ba5c34_local_vars;if($this->conditional_ifinarray($this->setup_args(['value'=>'$name','array'=>'$autoset_cols','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

      <?php else:?>

        <?php $c_2ccf37=null;$_ba5c34_old_params['_2ccf37']=$_ba5c34_local_params;$_ba5c34_old_vars['_2ccf37']=$_ba5c34_local_vars;$a_2ccf37=$this->setup_args(['name'=>'error_key','this_tag'=>'setvarblock'],null,$this);ob_start();?>
errors[<?php echo $this->function_var($this->setup_args(['name'=>'name','this_tag'=>'var'],null,$this),$this)?>
]<?php $c_2ccf37=ob_get_clean();$c_2ccf37=$this->block_setvarblock($a_2ccf37,$c_2ccf37,$this,$r_2ccf37,1,'_2ccf37');echo($c_2ccf37); $_ba5c34_local_params=$_ba5c34_old_params['_2ccf37'];?>

        <?php $_ba5c34_old_params['_1e3ae9']=$_ba5c34_local_params;$_ba5c34_old_vars['_1e3ae9']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'text','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['phrase'=>'Comment','language'=>'$language','setvar'=>'column_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('column_label','setvar',$this),$this,'setvar')?>

        <?php else:?>
<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'label','setvar'=>'column_label','this_tag'=>'var'],null,$this),$this),$this->setup_args('column_label','setvar',$this),$this,'setvar')?>

        <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_1e3ae9'];$_ba5c34_local_vars=$_ba5c34_old_vars['_1e3ae9'];?>

      <tr class="<?php $_ba5c34_old_params['_6e3bcc']=$_ba5c34_local_params;$_ba5c34_old_vars['_6e3bcc']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'$error_key','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
has-danger<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_6e3bcc'];$_ba5c34_local_vars=$_ba5c34_old_vars['_6e3bcc'];?>
">
        <th scope="row" class="cell-form-question">
          <label class="form-control-label" for="<?php echo $this->function_var($this->setup_args(['name'=>'name','this_tag'=>'var'],null,$this),$this)?>
">
            <?php echo $this->function_var($this->setup_args(['name'=>'column_label','this_tag'=>'var'],null,$this),$this)?>

            <?php $_ba5c34_old_params['_6e1d60']=$_ba5c34_local_params;$_ba5c34_old_vars['_6e1d60']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <small><span>(<?php echo $this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['phrase'=>'Required','language'=>'$language','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language')?>
)</span></small>
            <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_6e1d60'];$_ba5c34_local_vars=$_ba5c34_old_vars['_6e1d60'];?>

          </label>
        </th>
        <td class="cell-form-input">
          <?php $_ba5c34_old_params['_015726']=$_ba5c34_local_params;$_ba5c34_old_vars['_015726']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','ne'=>'save','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_ba5c34_old_params['_51a47d']=$_ba5c34_local_params;$_ba5c34_old_vars['_51a47d']=$_ba5c34_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.comment_publish_on_post','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

            <?php $c_08fe35=null;$_ba5c34_old_params['_08fe35']=$_ba5c34_local_params;$_ba5c34_old_vars['_08fe35']=$_ba5c34_local_vars;$a_08fe35=$this->setup_args(['name'=>'request_name','this_tag'=>'setvarblock'],null,$this);ob_start();?>
request.<?php echo $this->function_var($this->setup_args(['name'=>'name','this_tag'=>'var'],null,$this),$this)?>
<?php $c_08fe35=ob_get_clean();$c_08fe35=$this->block_setvarblock($a_08fe35,$c_08fe35,$this,$r_08fe35,1,'_08fe35');echo($c_08fe35); $_ba5c34_local_params=$_ba5c34_old_params['_08fe35'];?>

          <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_51a47d'];$_ba5c34_local_vars=$_ba5c34_old_vars['_51a47d'];?>
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_015726'];$_ba5c34_local_vars=$_ba5c34_old_vars['_015726'];?>

          <?php $_ba5c34_old_params['_13daef']=$_ba5c34_local_params;$_ba5c34_old_vars['_13daef']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'confirm_ok','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_modifier_funcs('nl2br', paml_htmlspecialchars(paml_modifier_funcs('trim', $this->function_var($this->setup_args(['name'=>'$request_name','trim'=>'','escape'=>'','nl2br'=>'','this_tag'=>'var'],null,$this),$this)),ENT_QUOTES))?>
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_13daef'];$_ba5c34_local_vars=$_ba5c34_old_vars['_13daef'];?>

          <?php $_ba5c34_old_params['_4d3a45']=$_ba5c34_local_params;$_ba5c34_old_vars['_4d3a45']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'textarea','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_ba5c34_old_params['_6129a2']=$_ba5c34_local_params;$_ba5c34_old_vars['_6129a2']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'confirm_ok','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <input type="hidden" id="<?php echo $this->function_var($this->setup_args(['name'=>'name','this_tag'=>'var'],null,$this),$this)?>
" name="<?php echo $this->function_var($this->setup_args(['name'=>'name','this_tag'=>'var'],null,$this),$this)?>
" value="<?php $_ba5c34_old_params['_61558b']=$_ba5c34_local_params;$_ba5c34_old_vars['_61558b']=$_ba5c34_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'submit_ok','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars(paml_modifier_funcs('trim', $this->function_var($this->setup_args(['name'=>'$request_name','trim'=>'','escape'=>'','this_tag'=>'var'],null,$this),$this)),ENT_QUOTES)?>
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_61558b'];$_ba5c34_local_vars=$_ba5c34_old_vars['_61558b'];?>
"> 
            <?php else:?>

              <textarea class="form-control watch-changed <?php $_ba5c34_old_params['_6202a0']=$_ba5c34_local_params;$_ba5c34_old_vars['_6202a0']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'$error_key','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
form-control-danger<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_6202a0'];$_ba5c34_local_vars=$_ba5c34_old_vars['_6202a0'];?>
" id="<?php echo $this->function_var($this->setup_args(['name'=>'name','this_tag'=>'var'],null,$this),$this)?>
" name="<?php echo $this->function_var($this->setup_args(['name'=>'name','this_tag'=>'var'],null,$this),$this)?>
" rows="5"><?php $_ba5c34_old_params['_c6adfc']=$_ba5c34_local_params;$_ba5c34_old_vars['_c6adfc']=$_ba5c34_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'submit_ok','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars(paml_modifier_funcs('trim', $this->function_var($this->setup_args(['name'=>'$request_name','trim'=>'','escape'=>'','this_tag'=>'var'],null,$this),$this)),ENT_QUOTES)?>
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_c6adfc'];$_ba5c34_local_vars=$_ba5c34_old_vars['_c6adfc'];?>
</textarea>
              <?php $_ba5c34_old_params['_e6d36e']=$_ba5c34_local_params;$_ba5c34_old_vars['_e6d36e']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'$error_key','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<div class="form-control-feedback"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'$error_key','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</div><?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_e6d36e'];$_ba5c34_local_vars=$_ba5c34_old_vars['_e6d36e'];?>

            <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_6129a2'];$_ba5c34_local_vars=$_ba5c34_old_vars['_6129a2'];?>

          <?php else:?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'input_type','value'=>'text','this_tag'=>'setvar'],null,$this),$this)?>

              <?php $_ba5c34_old_params['_028ad4']=$_ba5c34_local_params;$_ba5c34_old_vars['_028ad4']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','like'=>'date','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'input_type','value'=>'date','this_tag'=>'setvar'],null,$this),$this)?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'input_short','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

              <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'edit','like'=>'number','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'input_type','value'=>'number','this_tag'=>'setvar'],null,$this),$this)?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'input_short','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

              <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'edit','like'=>'short','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'input_short','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

              <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_028ad4'];$_ba5c34_local_vars=$_ba5c34_old_vars['_028ad4'];?>

            <input type="<?php $_ba5c34_old_params['_56ca64']=$_ba5c34_local_params;$_ba5c34_old_vars['_56ca64']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'confirm_ok','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'input_type','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_56ca64'];$_ba5c34_local_vars=$_ba5c34_old_vars['_56ca64'];?>
"
                id="<?php echo $this->function_var($this->setup_args(['name'=>'name','this_tag'=>'var'],null,$this),$this)?>
" class="form-control watch-changed <?php $_ba5c34_old_params['_49e333']=$_ba5c34_local_params;$_ba5c34_old_vars['_49e333']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'input_short','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
short<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_49e333'];$_ba5c34_local_vars=$_ba5c34_old_vars['_49e333'];?>
 <?php $_ba5c34_old_params['_b52c88']=$_ba5c34_local_params;$_ba5c34_old_vars['_b52c88']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'$error_key','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
form-control-danger<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_b52c88'];$_ba5c34_local_vars=$_ba5c34_old_vars['_b52c88'];?>
"
                name="<?php echo $this->function_var($this->setup_args(['name'=>'name','this_tag'=>'var'],null,$this),$this)?>
" value="<?php $_ba5c34_old_params['_b78430']=$_ba5c34_local_params;$_ba5c34_old_vars['_b78430']=$_ba5c34_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'submit_ok','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars(paml_modifier_funcs('trim', $this->function_var($this->setup_args(['name'=>'$request_name','trim'=>'','escape'=>'','this_tag'=>'var'],null,$this),$this)),ENT_QUOTES)?>
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_b78430'];$_ba5c34_local_vars=$_ba5c34_old_vars['_b78430'];?>
">
              <?php $_ba5c34_old_params['_499fce']=$_ba5c34_local_params;$_ba5c34_old_vars['_499fce']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'$error_key','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<div class="form-control-feedback"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'$error_key','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</div><?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_499fce'];$_ba5c34_local_vars=$_ba5c34_old_vars['_499fce'];?>

          <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_4d3a45'];$_ba5c34_local_vars=$_ba5c34_old_vars['_4d3a45'];?>

        </td>
      </tr>
      <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_ffccc0'];$_ba5c34_local_vars=$_ba5c34_old_vars['_ffccc0'];?>

      <?php endif;$c_bfa257=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_bfa257'];$_ba5c34_local_vars=$_ba5c34_old_vars['_bfa257'];?>

      <tr>
        <td colspan="2" class="text-center">
          <button type="submit" class="btn btn-secondary btn-lg"><?php $_ba5c34_old_params['_b80393']=$_ba5c34_local_params;$_ba5c34_old_vars['_b80393']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'confirm_ok','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['phrase'=>'Submit','language'=>'$language','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language')?>
<?php else:?>
<?php echo $this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['phrase'=>'Confirm','language'=>'$language','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language')?>
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_b80393'];$_ba5c34_local_vars=$_ba5c34_old_vars['_b80393'];?>
</button>
        </td>
      </tr>
  </tbody>
</table>
</form>
</div>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'request_method','setvar'=>'request_method','this_tag'=>'property'],null,$this),$this),$this->setup_args('request_method','setvar',$this),$this,'setvar')?>

<?php $_ba5c34_old_params['_15ad43']=$_ba5c34_local_params;$_ba5c34_old_vars['_15ad43']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request_method','eq'=>'POST','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_dc49cd=null;$_ba5c34_old_params['_dc49cd']=$_ba5c34_local_params;$_ba5c34_old_vars['_dc49cd']=$_ba5c34_local_vars;$a_dc49cd=$this->setup_args(['name'=>'additional_script','append'=>'1','this_tag'=>'setvarblock'],null,$this);ob_start();?>

<script>
var adjustHash = function(){
    window.scrollBy(0, -65);
}
if ( window.location.hash ) {
    setTimeout( adjustHash, 50 );
}
</script>
<?php $c_dc49cd=ob_get_clean();$c_dc49cd=$this->block_setvarblock($a_dc49cd,$c_dc49cd,$this,$r_dc49cd,1,'_dc49cd');echo($c_dc49cd); $_ba5c34_local_params=$_ba5c34_old_params['_dc49cd'];?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_15ad43'];$_ba5c34_local_vars=$_ba5c34_old_vars['_15ad43'];?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_5f4094'];$_ba5c34_local_vars=$_ba5c34_old_vars['_5f4094'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744075969,
);?>