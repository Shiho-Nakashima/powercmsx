<?php ob_start();?><?php $_63d9f8_vars=&$this->vars;$_63d9f8_old_params=&$this->old_params;$_63d9f8_local_params=&$this->local_params;$_63d9f8_old_vars=&$this->old_vars;$_63d9f8_local_vars=&$this->local_vars;?><?php echo $this->function_setvar($this->setup_args(['name'=>'_primary','value'=>'$value','this_tag'=>'setvar'],null,$this),$this)?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'_languages','value'=>'$languages','this_tag'=>'setvar'],null,$this),$this)?>

<div class="row form-group row-title-main">
  <div class="col-lg-12 input-group-lg">
    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" type="text" class="title-original form-control watch-changed" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="<?php $_63d9f8_old_params['_34c837']=$_63d9f8_local_params;$_63d9f8_old_vars['_34c837']=$_63d9f8_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__col_value__','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'default','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'__col_value__','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_34c837'];$_63d9f8_local_vars=$_63d9f8_old_vars['_34c837'];?>
"
      aria-label="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" placeholder="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_63d9f8_old_params['_221b4a']=$_63d9f8_local_params;$_63d9f8_old_vars['_221b4a']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
readonly<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_221b4a'];$_63d9f8_local_vars=$_63d9f8_old_vars['_221b4a'];?>
>
<?php $_63d9f8_old_params['_e42c75']=$_63d9f8_local_params;$_63d9f8_old_vars['_e42c75']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_hint','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="ml-1">
    <?php echo $this->function_var($this->setup_args(['name'=>'_hint','this_tag'=>'var'],null,$this),$this)?>

  </div>
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_e42c75'];$_63d9f8_local_vars=$_63d9f8_old_vars['_e42c75'];?>

  </div>
</div>
<div class="mb-4<?php $_63d9f8_old_params['_c8203b']=$_63d9f8_local_params;$_63d9f8_old_vars['_c8203b']=$_63d9f8_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'display_options','value'=>'text','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_c8203b'];$_63d9f8_local_vars=$_63d9f8_old_vars['_c8203b'];?>
" id="entry-primary-permalink">
    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'permalink','setvar'=>'__permalink','this_tag'=>'var'],null,$this),$this),$this->setup_args('__permalink','setvar',$this),$this,'setvar')?>

  <?php $_63d9f8_old_params['_4c6194']=$_63d9f8_local_params;$_63d9f8_old_vars['_4c6194']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $_63d9f8_old_params['_3e3ad7']=$_63d9f8_local_params;$_63d9f8_old_vars['_3e3ad7']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->modifier_setvar($this->modifier_replace($this->function_var($this->setup_args(['name'=>'__permalink','replace'=>'\'$workspace_site_url\',\'$workspace_link_url\'','setvar'=>'__permalink','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'$workspace_site_url\\\',\\\'$workspace_link_url\\\'','replace',$this),$this,'replace'),$this->setup_args('__permalink','setvar',$this),$this,'setvar')?>

    <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_3e3ad7'];$_63d9f8_local_vars=$_63d9f8_old_vars['_3e3ad7'];?>

  <?php else:?>

    <?php $_63d9f8_old_params['_df9814']=$_63d9f8_local_params;$_63d9f8_old_vars['_df9814']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->modifier_setvar($this->modifier_replace($this->function_var($this->setup_args(['name'=>'__permalink','replace'=>'\'$site_url\',\'$link_url\'','setvar'=>'__permalink','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'$site_url\\\',\\\'$link_url\\\'','replace',$this),$this,'replace'),$this->setup_args('__permalink','setvar',$this),$this,'setvar')?>

    <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_df9814'];$_63d9f8_local_vars=$_63d9f8_old_vars['_df9814'];?>

  <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_4c6194'];$_63d9f8_local_vars=$_63d9f8_old_vars['_4c6194'];?>

  <?php $_63d9f8_old_params['_8150f0']=$_63d9f8_local_params;$_63d9f8_old_vars['_8150f0']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'permalink','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="input-group copy-url copy-url-permalink">
  <input type="text" class="form-control form-control-sm clipboard-url" id="__permalink-clipboard"
  value="<?php echo $this->function_var($this->setup_args(['name'=>'__permalink','this_tag'=>'var'],null,$this),$this)?>
" readonly>
  <button data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Copy to Clipboard','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="input-group-addon copy-clipboard" data-clipboard-target="#__permalink-clipboard"><i class="fa fa-clipboard" aria-hidden="true" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Copy to Clipboard','this_tag'=>'trans'],null,$this),$this)?>
"></i></button>
  <button id="_view-permalink" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="input-group-addon"><i class="fa fa-external-link" aria-hidden="true" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Open in new window','this_tag'=>'trans'],null,$this),$this)?>
"></i></button>
<?php $_63d9f8_old_params['_e885dc']=$_63d9f8_local_params;$_63d9f8_old_vars['_e885dc']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <button id="_view-published" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="input-group-addon"><i class="fa fa-globe" aria-hidden="true" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
"></i></button>
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_e885dc'];$_63d9f8_local_vars=$_63d9f8_old_vars['_e885dc'];?>

  </div>
  <input type="hidden" name="__permalink" id="__permalink" value="<?php $_63d9f8_old_params['_744cd3']=$_63d9f8_local_params;$_63d9f8_old_vars['_744cd3']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'permalink','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'__permalink','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_744cd3'];$_63d9f8_local_vars=$_63d9f8_old_vars['_744cd3'];?>
">
<?php $_63d9f8_old_params['_f1595e']=$_63d9f8_local_params;$_63d9f8_old_vars['_f1595e']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <input type="hidden" name="__permalink_published" id="__permalink_published" value="<?php echo $this->function_var($this->setup_args(['name'=>'__permalink','this_tag'=>'var'],null,$this),$this)?>
">
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_f1595e'];$_63d9f8_local_vars=$_63d9f8_old_vars['_f1595e'];?>

  <script>
  <?php $_63d9f8_old_params['_1c5341']=$_63d9f8_local_params;$_63d9f8_old_vars['_1c5341']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.saved','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  $('#__permalink-clipboard').css( 'color', 'gray' );
  $('#__permalink-clipboard').val( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Getting permalink...','this_tag'=>'trans'],null,$this),$this)?>
' );
  var __permalink_success = false;
  var get_current_permalink = function(){
      setTimeout( get_permalink_error, 2000 );
      $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", {
          '__mode' : 'get_current_permalink',
          '_model' : '<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
',
          'id'     : <?php echo $this->function_var($this->setup_args(['name'=>'object_id','this_tag'=>'var'],null,$this),$this)?>
,
          'workspace_id' : '<?php echo $this->modifier_cast_to($this->function_var($this->setup_args(['name'=>'workspace_id','cast_to'=>'int','this_tag'=>'var'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to')?>
',
          'magic_token': '<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
'
      },
      function ( data ) {
          if( data.permalink ) {
              __permalink_success = true;
              $('#__permalink-clipboard').css( 'color', '#555555' );
              $('#__permalink-clipboard').val( data.view_link );
              <?php $_63d9f8_old_params['_b3650d']=$_63d9f8_local_params;$_63d9f8_old_vars['_b3650d']=$_63d9f8_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_show_both','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

              if ( data.view_link ) {
                  $('#__permalink').val( data.view_link );
              }
              <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_b3650d'];$_63d9f8_local_vars=$_63d9f8_old_vars['_b3650d'];?>

          } else {
              $('#__permalink-clipboard').css( 'color', '#555555' );
          }
      },
      "json"
      );
  }
  var get_permalink_error = function(){
      if ( __permalink_success == false ) {
          $('#__permalink-clipboard').val( '<?php echo $this->function_var($this->setup_args(['name'=>'permalink','this_tag'=>'var'],null,$this),$this)?>
' );
          $('#__permalink-clipboard').css( 'color', '#555555' );
      } 
  }
  setTimeout( get_current_permalink, 2500 );
  <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_1c5341'];$_63d9f8_local_vars=$_63d9f8_old_vars['_1c5341'];?>

  $('#_view-permalink').click(function(){
      var permalink = $('#__permalink').val();
      window.open( permalink, '_blank');
  });
  $('#_view-published').click(function(){
      var permalink = $('#__permalink_published').val();
      window.open( permalink, '_blank');
  });
  </script>
  <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_8150f0'];$_63d9f8_local_vars=$_63d9f8_old_vars['_8150f0'];?>

</div>
<script>
$('.disp_option-cb').change(function(){
    if ( $(this).prop('name') == '_d_text' ) {
        if ( $(this).prop('checked') ) {
            $('#entry-primary-permalink').hide( 50 );
        } else {
            $('#entry-primary-permalink').show( 50 );
        }
    }
});
</script>
<?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\entry\\column_title.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\primary_permalink.tmpl' => 1697132444,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1743988263,
);?>