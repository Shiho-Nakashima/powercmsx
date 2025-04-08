<?php ob_start();?><?php $_500643_vars=&$this->vars;$_500643_old_params=&$this->old_params;$_500643_local_params=&$this->local_params;$_500643_old_vars=&$this->old_vars;$_500643_local_vars=&$this->local_vars;?><?php $c_95ff6b=null;$_500643_old_params['_95ff6b']=$_500643_local_params;$_500643_old_vars['_95ff6b']=$_500643_local_vars;$a_95ff6b=$this->setup_args(['module'=>'(Media) Site Layout','this_tag'=>'includeblock'],null,$this);$_95ff6b=-1;$r_95ff6b=true;while($r_95ff6b===true):$r_95ff6b=($_95ff6b!==-1)?false:true;echo $this->component('PTTags')->hdlr_includeblock($a_95ff6b,$c_95ff6b,$this,$r_95ff6b,++$_95ff6b,'_95ff6b');ob_start();?>
<?php $c_95ff6b = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_95ff6b=false;}if($c_95ff6b ):?>

  <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Site Config','this_tag'=>'include'],null,$this),$this)?>

  <?php echo $this->modifier_setvar($this->component('PTTags')->filter_language($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['language'=>'$language','setvar'=>'archive_title','this_tag'=>'entrytitle'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('archive_title','setvar',$this),$this,'setvar')?>

  <?php $_500643_old_params['_2c4d8a']=$_500643_local_params;$_500643_old_vars['_2c4d8a']=$_500643_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'entryexcerpt','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['setvar'=>'page_description','this_tag'=>'entryexcerpt'],null,$this),$this),$this->setup_args('page_description','setvar',$this),$this,'setvar')?>

  <?php endif;$_500643_local_params=$_500643_old_params['_2c4d8a'];$_500643_local_vars=$_500643_old_vars['_2c4d8a'];?>

  <?php $_500643_old_params['_750da8']=$_500643_local_params;$_500643_old_vars['_750da8']=$_500643_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'entrykeywords','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['setvar'=>'page_keywords','this_tag'=>'entrykeywords'],null,$this),$this),$this->setup_args('page_keywords','setvar',$this),$this,'setvar')?>

  <?php endif;$_500643_local_params=$_500643_old_params['_750da8'];$_500643_local_vars=$_500643_old_vars['_750da8'];?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'ogp_image','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

  <?php $c_038dce=null;$_500643_old_params['_038dce']=$_500643_local_params;$_500643_old_vars['_038dce']=$_500643_local_vars;$a_038dce=$this->setup_args(['class'=>'image','limit'=>'1','this_tag'=>'entryassets'],null,$this);$_038dce=-1;$r_038dce=true;while($r_038dce===true):$r_038dce=($_038dce!==-1)?false:true;echo $this->component('PTTags')->hdlr_get_relatedobjs($a_038dce,$c_038dce,$this,$r_038dce,++$_038dce,'_038dce');ob_start();?>
<?php $c_038dce = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_038dce=false;}if($c_038dce ):?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_get_objecturl($this->setup_args(['setvar'=>'ogp_image','this_tag'=>'assetfileurl'],null,$this),$this),$this->setup_args('ogp_image','setvar',$this),$this,'setvar')?>

  <?php endif;$c_038dce=ob_get_clean();endwhile; $_500643_local_params=$_500643_old_params['_038dce'];$_500643_local_vars=$_500643_old_vars['_038dce'];?>

  <?php $_500643_old_params['_1041ed']=$_500643_local_params;$_500643_old_vars['_1041ed']=$_500643_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'ogp_image','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php $c_3e0aeb=null;$_500643_old_params['_3e0aeb']=$_500643_local_params;$_500643_old_vars['_3e0aeb']=$_500643_local_vars;$a_3e0aeb=$this->setup_args(['cols'=>'basename','limit'=>'1','this_tag'=>'entrycategories'],null,$this);$_3e0aeb=-1;$r_3e0aeb=true;while($r_3e0aeb===true):$r_3e0aeb=($_3e0aeb!==-1)?false:true;echo $this->component('PTTags')->hdlr_get_relatedobjs($a_3e0aeb,$c_3e0aeb,$this,$r_3e0aeb,++$_3e0aeb,'_3e0aeb');ob_start();?>
<?php $c_3e0aeb = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_3e0aeb=false;}if($c_3e0aeb ):?>

      <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['setvar'=>'category_basename','this_tag'=>'categorybasename'],null,$this),$this),$this->setup_args('category_basename','setvar',$this),$this,'setvar')?>

    <?php endif;$c_3e0aeb=ob_get_clean();endwhile; $_500643_local_params=$_500643_old_params['_3e0aeb'];$_500643_local_vars=$_500643_old_vars['_3e0aeb'];?>

    <?php $c_1dcc59=null;$_500643_old_params['_1dcc59']=$_500643_local_params;$_500643_old_vars['_1dcc59']=$_500643_local_vars;$a_1dcc59=$this->setup_args(['name'=>'ogp_image','this_tag'=>'setvarblock'],null,$this);ob_start();?>
<?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) OGP Image URL','ogp_image_key'=>'$category_basename','this_tag'=>'include'],null,$this),$this)?>
<?php $c_1dcc59=ob_get_clean();$c_1dcc59=$this->block_setvarblock($a_1dcc59,$c_1dcc59,$this,$r_1dcc59,1,'_1dcc59');echo($c_1dcc59); $_500643_local_params=$_500643_old_params['_1dcc59'];?>

  <?php endif;$_500643_local_params=$_500643_old_params['_1041ed'];$_500643_local_vars=$_500643_old_vars['_1041ed'];?>

  <?php echo $this->modifier_setvar($this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['language'=>'$language','phrase'=>'Entries','setvar'=>'translated_phrase__entries','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('translated_phrase__entries','setvar',$this),$this,'setvar')?>

  <div class="row">
    <div class="col-lg-8">
      <main class="content-section">
        <div class="section-head">
          <h1 class="section-title align-center mb-4 display-5"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'archive_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</h1>
          <p class="section-info align-right mb-4">
            <time datetime="<?php echo $this->modifier_format_ts($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['format_ts'=>'Y-m-d','this_tag'=>'entrydate'],null,$this),$this),$this->setup_args('Y-m-d','format_ts',$this),$this,'format_ts')?>
"><?php echo $this->modifier_format_ts($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['format_ts'=>'$datetime_format','this_tag'=>'entrydate'],null,$this),$this),$this->setup_args('$datetime_format','format_ts',$this),$this,'format_ts')?>
</time>
            <?php $c_043f0d=null;$_500643_old_params['_043f0d']=$_500643_local_params;$_500643_old_vars['_043f0d']=$_500643_local_vars;$a_043f0d=$this->setup_args(['cols'=>'label','this_tag'=>'entrycategories'],null,$this);$_043f0d=-1;$r_043f0d=true;while($r_043f0d===true):$r_043f0d=($_043f0d!==-1)?false:true;echo $this->component('PTTags')->hdlr_get_relatedobjs($a_043f0d,$c_043f0d,$this,$r_043f0d,++$_043f0d,'_043f0d');ob_start();?>
<?php $c_043f0d = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_043f0d=false;}if($c_043f0d ):?>

              <?php $_500643_old_params['_151f51']=$_500643_local_params;$_500643_old_vars['_151f51']=$_500643_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<span class="category"><?php endif;$_500643_local_params=$_500643_old_params['_151f51'];$_500643_local_vars=$_500643_old_vars['_151f51'];?>

              <a href="<?php echo $this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['this_tag'=>'categorypermalink'],null,$this),$this)?>
" class="badge badge-info ml-2"><?php echo $this->modifier_escape($this->component('PTTags')->filter_language($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['language'=>'$language','escape'=>'single','this_tag'=>'categorylabel'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
              <?php $_500643_old_params['_b96983']=$_500643_local_params;$_500643_old_vars['_b96983']=$_500643_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</span><?php endif;$_500643_local_params=$_500643_old_params['_b96983'];$_500643_local_vars=$_500643_old_vars['_b96983'];?>

            <?php endif;$c_043f0d=ob_get_clean();endwhile; $_500643_local_params=$_500643_old_params['_043f0d'];$_500643_local_vars=$_500643_old_vars['_043f0d'];?>

          </p>
        </div>
        <div class="text content-block">
          <?php echo $this->component('PTTags')->filter_convert_breaks($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['convert_breaks'=>'auto','this_tag'=>'entrybody'],null,$this),$this),$this->setup_args('auto','convert_breaks',$this),$this,'convert_breaks')?>

        </div>
  <?php $_500643_old_params['_320816']=$_500643_local_params;$_500643_old_vars['_320816']=$_500643_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'entrymore','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <div class="text content-block">
          <?php echo $this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['this_tag'=>'entrymore'],null,$this),$this)?>

        </div>
  <?php endif;$_500643_local_params=$_500643_old_params['_320816'];$_500643_local_vars=$_500643_old_vars['_320816'];?>

  <?php $c_a9d5ab=null;$_500643_old_params['_a9d5ab']=$_500643_local_params;$_500643_old_vars['_a9d5ab']=$_500643_local_vars;$a_a9d5ab=$this->setup_args(['this_tag'=>'entrytags'],null,$this);$_a9d5ab=-1;$r_a9d5ab=true;while($r_a9d5ab===true):$r_a9d5ab=($_a9d5ab!==-1)?false:true;echo $this->component('PTTags')->hdlr_get_relatedobjs($a_a9d5ab,$c_a9d5ab,$this,$r_a9d5ab,++$_a9d5ab,'_a9d5ab');ob_start();?>
<?php $c_a9d5ab = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_a9d5ab=false;}if($c_a9d5ab ):?>

    <?php $_500643_old_params['_2e3aa1']=$_500643_local_params;$_500643_old_vars['_2e3aa1']=$_500643_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <div class="text content-block">
          <p class="tags-block">
            <?php echo $this->modifier_escape($this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['language'=>'$language','phrase'=>'Tags','escape'=>'single','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('single','escape',$this),$this,'escape')?>
 :
    <?php endif;$_500643_local_params=$_500643_old_params['_2e3aa1'];$_500643_local_vars=$_500643_old_vars['_2e3aa1'];?>

            <a href="<?php echo $this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['this_tag'=>'tagpermalink'],null,$this),$this)?>
" class="badge badge-success ml-2"><?php echo $this->modifier_escape($this->component('PTTags')->filter_language($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['language'=>'$language','escape'=>'single','this_tag'=>'tagname'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
    <?php $_500643_old_params['_503f45']=$_500643_local_params;$_500643_old_vars['_503f45']=$_500643_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          </p>
        </div>
    <?php endif;$_500643_local_params=$_500643_old_params['_503f45'];$_500643_local_vars=$_500643_old_vars['_503f45'];?>

  <?php endif;$c_a9d5ab=ob_get_clean();endwhile; $_500643_local_params=$_500643_old_params['_a9d5ab'];$_500643_local_vars=$_500643_old_vars['_a9d5ab'];?>

      </main>
  <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Comment Form','this_tag'=>'include'],null,$this),$this)?>

  <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['setvar'=>'exclude_entry_id','this_tag'=>'entryid'],null,$this),$this),$this->setup_args('exclude_entry_id','setvar',$this),$this,'setvar')?>

  <?php $c_e88539=null;$_500643_old_params['_e88539']=$_500643_local_params;$_500643_old_vars['_e88539']=$_500643_local_vars;$a_e88539=$this->setup_args(['cols'=>'id,label','ignore_filter'=>'1','limit'=>'1','this_tag'=>'entrycategories'],null,$this);$_e88539=-1;$r_e88539=true;while($r_e88539===true):$r_e88539=($_e88539!==-1)?false:true;echo $this->component('PTTags')->hdlr_get_relatedobjs($a_e88539,$c_e88539,$this,$r_e88539,++$_e88539,'_e88539');ob_start();?>
<?php $c_e88539 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_e88539=false;}if($c_e88539 ):?>

    <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Latest Entries by Category','exclude_entry_id'=>'$exclude_entry_id','this_tag'=>'include'],null,$this),$this)?>

  <?php endif;$c_e88539=ob_get_clean();endwhile; $_500643_local_params=$_500643_old_params['_e88539'];$_500643_local_vars=$_500643_old_vars['_e88539'];?>

    </div>
    <div class="col-lg-4">
  <?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Side Bar','this_tag'=>'include'],null,$this),$this)?>

    </div>
  </div>
<?php endif;$c_95ff6b=ob_get_clean();endwhile; $_500643_local_params=$_500643_old_params['_95ff6b'];$_500643_local_vars=$_500643_old_vars['_95ff6b'];?>
<?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744075969,
);?>