<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><?php $_ba5c34_old_params['_19d26f']=$_ba5c34_local_params;$_ba5c34_old_vars['_19d26f']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'call_from_async_parts','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'async_parts_enabled','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_19d26f'];$_ba5c34_local_vars=$_ba5c34_old_vars['_19d26f'];?>


<?php $_ba5c34_old_params['_9b399c']=$_ba5c34_local_params;$_ba5c34_old_vars['_9b399c']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'ranking_enabled','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $_ba5c34_old_params['_7bb7f0']=$_ba5c34_local_params;$_ba5c34_old_vars['_7bb7f0']=$_ba5c34_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'async_parts_enabled','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php $c_d1cdaf=null;$_ba5c34_old_params['_d1cdaf']=$_ba5c34_local_params;$_ba5c34_old_vars['_d1cdaf']=$_ba5c34_local_vars;$a_d1cdaf=$this->setup_args(['cache_key'=>'__widget_ranking__','workspace_id'=>'$website_id','this_tag'=>'cacheblock'],null,$this);$_d1cdaf=-1;$r_d1cdaf=true;while($r_d1cdaf===true):$r_d1cdaf=($_d1cdaf!==-1)?false:true;echo $this->component('PTTags')->hdlr_cacheblock($a_d1cdaf,$c_d1cdaf,$this,$r_d1cdaf,++$_d1cdaf,'_d1cdaf');ob_start();?>
<?php $c_d1cdaf = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_d1cdaf=false;}if($c_d1cdaf ):?>

      <?php echo $this->function_var($this->setup_args(['name'=>'rankedobjects'],null,$this),$this)?>

        <?php $_ba5c34_old_params['_c5d166']=$_ba5c34_local_params;$_ba5c34_old_vars['_c5d166']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php echo $this->modifier_setvar($this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['language'=>'$language','phrase'=>'Ranking','setvar'=>'widget_name','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('widget_name','setvar',$this),$this,'setvar')?>

          <section class="ranking-section">
            <h2 class="section-heading mb-4"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'widget_name','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</h2>
            <div class="counter-container">
              <ol>
        <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_c5d166'];$_ba5c34_local_vars=$_ba5c34_old_vars['_c5d166'];?>

                <li><a href="<?php echo $this->function_var($this->setup_args(['name'=>'object_url','this_tag'=>'var'],null,$this),$this)?>
" class="text-primary"><?php echo $this->modifier_escape($this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['language'=>'$language','phrase'=>'$object_label','escape'=>'single','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('single','escape',$this),$this,'escape')?>
</a></li>
        <?php $_ba5c34_old_params['_2a88ec']=$_ba5c34_local_params;$_ba5c34_old_vars['_2a88ec']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </ol>
              <div class="text-right mt-0 mb-0"><a href="<?php echo $this->function_var($this->setup_args(['name'=>'website_url','this_tag'=>'var'],null,$this),$this)?>
ranking.html" class="text-primary show-list"><?php echo $this->modifier_escape($this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['language'=>'$language','phrase'=>'View all %s','params'=>'$widget_name','escape'=>'single','this_tag'=>'trans'],null,$this),$this),$this->setup_args('$language','language',$this),$this,'language'),$this->setup_args('single','escape',$this),$this,'escape')?>
</a></div>
            </div>
          </section>
        <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_2a88ec'];$_ba5c34_local_vars=$_ba5c34_old_vars['_2a88ec'];?>

      
    <?php endif;$c_d1cdaf=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_d1cdaf'];$_ba5c34_local_vars=$_ba5c34_old_vars['_d1cdaf'];?>

  <?php else:?>

    <div id="__widget_ranking__" hidden></div>
    <?php $c_f3c072=null;$_ba5c34_old_params['_f3c072']=$_ba5c34_local_params;$_ba5c34_old_vars['_f3c072']=$_ba5c34_local_vars;$a_f3c072=$this->setup_args(['name'=>'additional_script','append'=>'1','this_tag'=>'setvarblock'],null,$this);ob_start();?>

      <script>
        $(function () {
          const $needle = $( '#__widget_ranking__' );
          const url = '<?php echo $this->function_var($this->setup_args(['name'=>'website_url_relative','this_tag'=>'var'],null,$this),$this)?>
parts/widgets/ranking.html';
          $.get( { url: url, data: { <?php $_ba5c34_old_params['_4aadd7']=$_ba5c34_local_params;$_ba5c34_old_vars['_4aadd7']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['name'=>'language','ne'=>'$website_language','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
_language: "<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'language','escape'=>'js','this_tag'=>'var'],null,$this),$this),$this->setup_args('js','escape',$this),$this,'escape')?>
"<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_4aadd7'];$_ba5c34_local_vars=$_ba5c34_old_vars['_4aadd7'];?>
 }, dataType: "html" } ).done(function ( html ) {
            $( html ).insertAfter( $needle );
          }).always( function () {
            $needle.remove();
          });
        } );
      </script>
    <?php $c_f3c072=ob_get_clean();$c_f3c072=$this->block_setvarblock($a_f3c072,$c_f3c072,$this,$r_f3c072,1,'_f3c072');echo($c_f3c072); $_ba5c34_local_params=$_ba5c34_old_params['_f3c072'];?>

  <?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_7bb7f0'];$_ba5c34_local_vars=$_ba5c34_old_vars['_7bb7f0'];?>

<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_9b399c'];$_ba5c34_local_vars=$_ba5c34_old_vars['_9b399c'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744075969,
);?>