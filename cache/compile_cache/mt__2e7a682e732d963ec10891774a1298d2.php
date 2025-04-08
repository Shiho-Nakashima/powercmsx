<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><?php $c_02923f=null;$_ba5c34_old_params['_02923f']=$_ba5c34_local_params;$_ba5c34_old_vars['_02923f']=$_ba5c34_local_vars;$a_02923f=$this->setup_args(['cache_key'=>'__footer__','workspace_id'=>'$website_id','this_tag'=>'cacheblock'],null,$this);$_02923f=-1;$r_02923f=true;while($r_02923f===true):$r_02923f=($_02923f!==-1)?false:true;echo $this->component('PTTags')->hdlr_cacheblock($a_02923f,$c_02923f,$this,$r_02923f,++$_02923f,'_02923f');ob_start();?>
<?php $c_02923f = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_02923f=false;}if($c_02923f ):?>

  <footer class="footer-section">
    <div class="container">
      <div class="media-container-row align-center white">
        <div class="row social-row mb-2">
          <div class="social-list pb-2">
            <div class="soc-item">
              <a href="" target="_blank">
                <i class="fa fa-twitter-square fa-2x white" aria-hidden="true"></i>
                <span class="sr-only">Twitter</span>
              </a>
            </div>
            <div class="soc-item">
              <a href="" target="_blank">
                <i class="fa fa-facebook-square fa-2x white" aria-hidden="true"></i>
                <span class="sr-only">Facebook</span>
              </a>
            </div>
            <div class="soc-item">
              <a href="" target="_blank">
                <i class="fa fa-instagram fa-2x white" aria-hidden="true"></i>
                <span class="sr-only">Instagram</span>
              </a>
            </div>
            <div class="soc-item">
              <a href="" target="_blank">
                <i class="fa fa-youtube-square fa-2x white" aria-hidden="true"></i>
                <span class="sr-only">YouTube</span>
              </a>
            </div>
          </div>
        </div>
    <?php $c_7255b9=null;ob_start();$_ba5c34_old_params['_7255b9']=$_ba5c34_local_params;$_ba5c34_old_vars['_7255b9']=$_ba5c34_local_vars;$a_7255b9=$this->setup_args(['basename'=>'media_footer_navigation','cols'=>'id','this_tag'=>'menuitems'],null,$this);$_7255b9=-1;$r_7255b9=true;while($r_7255b9===true):$r_7255b9=($_7255b9!==-1)?false:true;echo $this->component('PTTags')->hdlr_menuitems($a_7255b9,$c_7255b9,$this,$r_7255b9,++$_7255b9,'_7255b9');ob_start();?>
<?php $c_7255b9 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_7255b9=false;}if($c_7255b9 ):?>

      <?php $_ba5c34_old_params['_61db4c']=$_ba5c34_local_params;$_ba5c34_old_vars['_61db4c']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <div class="row row-links">
          <ul class="foot-menu">
      <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_61db4c'];$_ba5c34_local_vars=$_ba5c34_old_vars['_61db4c'];?>

            <li class="foot-menu-item"><a href="<?php echo $this->function_var($this->setup_args(['name'=>'__item_url__','this_tag'=>'var'],null,$this),$this)?>
" class="text-success"><?php echo $this->modifier_escape($this->component('PTTags')->filter_language($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'__item_primary__','regex_replace'=>'\'/^\\(Media\\)\\s/\',\'\'','language'=>'$language','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/^\\\\(Media\\\\)\\\\s/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('single','escape',$this),$this,'escape')?>
</a></li>
      <?php $_ba5c34_old_params['_b48b74']=$_ba5c34_local_params;$_ba5c34_old_vars['_b48b74']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          </ul>
        </div>
      <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_b48b74'];$_ba5c34_local_vars=$_ba5c34_old_vars['_b48b74'];?>

    <?php endif;$c_7255b9=ob_get_clean();endwhile;$c_7255b9=ob_get_clean();echo($this->modifier_basename($c_7255b9,$this->setup_args('media_footer_navigation','basename',$this),$this,'basename')); $_ba5c34_local_params=$_ba5c34_old_params['_7255b9'];$_ba5c34_local_vars=$_ba5c34_old_vars['_7255b9'];?>

        <div class="row row-copirayt">
          <p class="text mb-0 white align-center"><?php echo $this->component('PTTags')->filter__eval($this->function_var($this->setup_args(['name'=>'website_copyright','_eval'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','_eval',$this),$this,'_eval')?>
</p>
        </div>
      </div>
    </div>
  </footer>
<?php endif;$c_02923f=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_02923f'];$_ba5c34_local_vars=$_ba5c34_old_vars['_02923f'];?>

<?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Media) Scripts','this_tag'=>'include'],null,$this),$this)?>

<?php $_ba5c34_old_params['_f9e8f6']=$_ba5c34_local_params;$_ba5c34_old_vars['_f9e8f6']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_furigana_js','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->component('PTTags')->hdlr_include($this->setup_args(['module'=>'(Furigana) Footer HTML','this_tag'=>'include'],null,$this),$this)?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_f9e8f6'];$_ba5c34_local_vars=$_ba5c34_old_vars['_f9e8f6'];?>

</body>
</html><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744075969,
);?>