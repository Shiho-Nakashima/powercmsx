<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><?php $_ba5c34_old_params['_45e64a']=$_ba5c34_local_params;$_ba5c34_old_vars['_45e64a']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'entries_whith_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'entries_filter','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'entries_pagination','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'entries_filter','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

<?php else:?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'entries_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_45e64a'];$_ba5c34_local_vars=$_ba5c34_old_vars['_45e64a'];?>

<?php $_ba5c34_old_params['_fc9efd']=$_ba5c34_local_params;$_ba5c34_old_vars['_fc9efd']=$_ba5c34_local_vars;if($this->component('PTTags')->hdlr_ifcomponent($this->setup_args(['component'=>'LivePreview','this_tag'=>'ifcomponent'],null,$this),null,$this,true,true)):?>

  <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Entries LivePreview','this_tag'=>'include'],null,$this),$this)?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_fc9efd'];$_ba5c34_local_vars=$_ba5c34_old_vars['_fc9efd'];?>

<?php $_ba5c34_old_params['_e8b6b1']=$_ba5c34_local_params;$_ba5c34_old_vars['_e8b6b1']=$_ba5c34_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'entries_conditions','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'entries_conditions','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_e8b6b1'];$_ba5c34_local_vars=$_ba5c34_old_vars['_e8b6b1'];?>

<?php $c_009c66=null;$_ba5c34_old_params['_009c66']=$_ba5c34_local_params;$_ba5c34_old_vars['_009c66']=$_ba5c34_local_vars;$a_009c66=$this->setup_args(['limit'=>'$entries_limit','cols'=>'title,text,excerpt,published_on','include_workspaces'=>'this','sort_by'=>'published_on','sort_order'=>'descend','ignore_filter'=>'$entries_filter','conditions'=>'$entries_conditions','this_tag'=>'entries'],null,$this);$_009c66=-1;$r_009c66=true;while($r_009c66===true):$r_009c66=($_009c66!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_009c66,$c_009c66,$this,$r_009c66,++$_009c66,'_009c66');ob_start();?>
<?php $c_009c66 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_009c66=false;}if($c_009c66 ):?>

  <?php $_ba5c34_old_params['_06b16e']=$_ba5c34_local_params;$_ba5c34_old_vars['_06b16e']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_var($this->setup_args(['name'=>'col_width','value'=>'6','this_tag'=>'var'],null,$this),$this)?>

    <?php $_ba5c34_old_params['_b86537']=$_ba5c34_local_params;$_ba5c34_old_vars['_b86537']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'entries_columns','gt'=>'0','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_var($this->setup_args(['name'=>'col_width','value'=>'12','this_tag'=>'var'],null,$this),$this)?>

      <?php echo $this->function_var($this->setup_args(['name'=>'col_width','op'=>'/','value'=>'$entries_columns','this_tag'=>'var'],null,$this),$this)?>

    <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_b86537'];$_ba5c34_local_vars=$_ba5c34_old_vars['_b86537'];?>

    <?php $c_4dd679=null;$_ba5c34_old_params['_4dd679']=$_ba5c34_local_params;$_ba5c34_old_vars['_4dd679']=$_ba5c34_local_vars;$a_4dd679=$this->setup_args(['name'=>'item_lg_class','this_tag'=>'setvarblock'],null,$this);ob_start();?>
col-lg-<?php echo $this->function_var($this->setup_args(['name'=>'col_width','this_tag'=>'var'],null,$this),$this)?>
<?php $c_4dd679=ob_get_clean();$c_4dd679=$this->block_setvarblock($a_4dd679,$c_4dd679,$this,$r_4dd679,1,'_4dd679');echo($c_4dd679); $_ba5c34_local_params=$_ba5c34_old_params['_4dd679'];?>

<div class="row mt-3">
  <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_06b16e'];$_ba5c34_local_vars=$_ba5c34_old_vars['_06b16e'];?>

  <div class="item features-image col-12 col-md-6 <?php echo $this->function_var($this->setup_args(['name'=>'item_lg_class','this_tag'=>'var'],null,$this),$this)?>
"<?php $_ba5c34_old_params['_7cfc22']=$_ba5c34_local_params;$_ba5c34_old_vars['_7cfc22']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'entries_data_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 data-item-id="<?php echo $this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['this_tag'=>'entryid'],null,$this),$this)?>
"<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_7cfc22'];$_ba5c34_local_vars=$_ba5c34_old_vars['_7cfc22'];?>
>
    <div class="item-wrapper">
  <?php $_ba5c34_old_params['_027148']=$_ba5c34_local_params;$_ba5c34_old_vars['_027148']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'entries_image','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'asset_url','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $c_028b12=null;$_ba5c34_old_params['_028b12']=$_ba5c34_local_params;$_ba5c34_old_vars['_028b12']=$_ba5c34_local_vars;$a_028b12=$this->setup_args(['cols'=>'label','limit'=>'1','this_tag'=>'entryassets'],null,$this);$_028b12=-1;$r_028b12=true;while($r_028b12===true):$r_028b12=($_028b12!==-1)?false:true;echo $this->component('PTTags')->hdlr_get_relatedobjs($a_028b12,$c_028b12,$this,$r_028b12,++$_028b12,'_028b12');ob_start();?>
<?php $c_028b12 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_028b12=false;}if($c_028b12 ):?>

      <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_assetthumbnailurl($this->setup_args(['width'=>'400','setvar'=>'asset_url','this_tag'=>'assetthumbnailurl'],null,$this),$this),$this->setup_args('asset_url','setvar',$this),$this,'setvar')?>

    <?php endif;$c_028b12=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_028b12'];$_ba5c34_local_vars=$_ba5c34_old_vars['_028b12'];?>

    <?php $_ba5c34_old_params['_a00c2c']=$_ba5c34_local_params;$_ba5c34_old_vars['_a00c2c']=$_ba5c34_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'asset_url','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'category_basename','value'=>'default','this_tag'=>'setvar'],null,$this),$this)?>

      <?php $c_14bf0e=null;$_ba5c34_old_params['_14bf0e']=$_ba5c34_local_params;$_ba5c34_old_vars['_14bf0e']=$_ba5c34_local_vars;$a_14bf0e=$this->setup_args(['cols'=>'basename','limit'=>'1','this_tag'=>'entrycategories'],null,$this);$_14bf0e=-1;$r_14bf0e=true;while($r_14bf0e===true):$r_14bf0e=($_14bf0e!==-1)?false:true;echo $this->component('PTTags')->hdlr_get_relatedobjs($a_14bf0e,$c_14bf0e,$this,$r_14bf0e,++$_14bf0e,'_14bf0e');ob_start();?>
<?php $c_14bf0e = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_14bf0e=false;}if($c_14bf0e ):?>

        <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['setvar'=>'category_basename','this_tag'=>'categorybasename'],null,$this),$this),$this->setup_args('category_basename','setvar',$this),$this,'setvar')?>

      <?php endif;$c_14bf0e=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_14bf0e'];$_ba5c34_local_vars=$_ba5c34_old_vars['_14bf0e'];?>

      <?php $c_eaca01=null;$_ba5c34_old_params['_eaca01']=$_ba5c34_local_params;$_ba5c34_old_vars['_eaca01']=$_ba5c34_local_vars;$a_eaca01=$this->setup_args(['name'=>'asset_url','this_tag'=>'setvarblock'],null,$this);ob_start();?>
<?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) OGP Image URL','ogp_image_key'=>'$category_basename','this_tag'=>'include'],null,$this),$this)?>
<?php $c_eaca01=ob_get_clean();$c_eaca01=$this->block_setvarblock($a_eaca01,$c_eaca01,$this,$r_eaca01,1,'_eaca01');echo($c_eaca01); $_ba5c34_local_params=$_ba5c34_old_params['_eaca01'];?>

    <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_a00c2c'];$_ba5c34_local_vars=$_ba5c34_old_vars['_a00c2c'];?>

      <div class="item-img">
        <img src="<?php echo $this->function_var($this->setup_args(['name'=>'asset_url','this_tag'=>'var'],null,$this),$this)?>
" alt="">
      </div>
  <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_027148'];$_ba5c34_local_vars=$_ba5c34_old_vars['_027148'];?>

      <div class="item-content">
        <p class="item-title display-7"><a href="<?php echo $this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['this_tag'=>'entrypermalink'],null,$this),$this)?>
" class="text-primary"><?php echo $this->modifier_escape($this->component('PTTags')->filter_language($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['language'=>'$language','escape'=>'single','this_tag'=>'entrytitle'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('single','escape',$this),$this,'escape')?>
</a></p>
        <p class="item-subtitle mt-1">
          <time datetime="<?php echo $this->modifier_format_ts($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['format_ts'=>'Y-m-d','this_tag'=>'entrydate'],null,$this),$this),$this->setup_args('Y-m-d','format_ts',$this),$this,'format_ts')?>
"><?php echo $this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['format'=>'$date_format','this_tag'=>'entrydate'],null,$this),$this)?>
</time>
          <?php $_ba5c34_old_params['_c3bac9']=$_ba5c34_local_params;$_ba5c34_old_vars['_c3bac9']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'entries_category_badge','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $c_640bc0=null;$_ba5c34_old_params['_640bc0']=$_ba5c34_local_params;$_ba5c34_old_vars['_640bc0']=$_ba5c34_local_vars;$a_640bc0=$this->setup_args(['cols'=>'label','limit'=>'1','this_tag'=>'entrycategories'],null,$this);$_640bc0=-1;$r_640bc0=true;while($r_640bc0===true):$r_640bc0=($_640bc0!==-1)?false:true;echo $this->component('PTTags')->hdlr_get_relatedobjs($a_640bc0,$c_640bc0,$this,$r_640bc0,++$_640bc0,'_640bc0');ob_start();?>
<?php $c_640bc0 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_640bc0=false;}if($c_640bc0 ):?>

              <?php $_ba5c34_old_params['_9bfc97']=$_ba5c34_local_params;$_ba5c34_old_vars['_9bfc97']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <span class="badges">
              <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_9bfc97'];$_ba5c34_local_vars=$_ba5c34_old_vars['_9bfc97'];?>

              <a href="<?php echo $this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['this_tag'=>'categorypermalink'],null,$this),$this)?>
" class="badge badge-info ml-2"><?php echo $this->modifier_escape($this->component('PTTags')->filter_language($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['language'=>'$language','escape'=>'single','this_tag'=>'categorylabel'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
              <?php $_ba5c34_old_params['_598442']=$_ba5c34_local_params;$_ba5c34_old_vars['_598442']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </span>
              <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_598442'];$_ba5c34_local_vars=$_ba5c34_old_vars['_598442'];?>

            <?php endif;$c_640bc0=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_640bc0'];$_ba5c34_local_vars=$_ba5c34_old_vars['_640bc0'];?>

          <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_c3bac9'];$_ba5c34_local_vars=$_ba5c34_old_vars['_c3bac9'];?>

        </p>
        <p class="text mt-3"><?php $_ba5c34_old_params['_01402c']=$_ba5c34_local_params;$_ba5c34_old_vars['_01402c']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'entryexcerpt','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_escape($this->modifier_remove_blank(paml_modifier_funcs('strip_tags', $this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['remove_html'=>'','remove_blank'=>'','escape'=>'single','this_tag'=>'entryexcerpt'],null,$this),$this)),$this->setup_args('','remove_blank',$this),$this,'remove_blank'),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php else:?>
<?php echo $this->modifier_escape($this->modifier_trim_to($this->modifier_remove_blank(paml_modifier_funcs('strip_tags', $this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['remove_html'=>'','remove_blank'=>'','trim_to'=>'50+...','escape'=>'single','this_tag'=>'entrytext'],null,$this),$this)),$this->setup_args('','remove_blank',$this),$this,'remove_blank'),$this->setup_args('50+...','trim_to',$this),$this,'trim_to'),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_01402c'];$_ba5c34_local_vars=$_ba5c34_old_vars['_01402c'];?>
</p>
      </div>
      <div class="section-btn item-footer mt-2"><a href="<?php echo $this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['this_tag'=>'entrypermalink'],null,$this),$this)?>
" class="btn item-btn btn-primary"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Read More','this_tag'=>'trans'],null,$this),$this)?>
</a></div>
    </div>
  </div>
  <?php $_ba5c34_old_params['_4b14e7']=$_ba5c34_local_params;$_ba5c34_old_vars['_4b14e7']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

</div>
    <?php $_ba5c34_old_params['_4f5b58']=$_ba5c34_local_params;$_ba5c34_old_vars['_4f5b58']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'entries_pagination','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Pagination : Prev and Next','filter_model'=>'entry','pagination_limit'=>'$entries_limit','this_tag'=>'include'],null,$this),$this)?>

    <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_4f5b58'];$_ba5c34_local_vars=$_ba5c34_old_vars['_4f5b58'];?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'entries_whith_filter','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'entries_filter','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'entries_conditions','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'entries_columns','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'entries_data_id','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'entries_image','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'entries_pagination','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'entries_category_badge','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_4b14e7'];$_ba5c34_local_vars=$_ba5c34_old_vars['_4b14e7'];?>

<?php endif;$c_009c66=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_009c66'];$_ba5c34_local_vars=$_ba5c34_old_vars['_009c66'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744075969,
);?>