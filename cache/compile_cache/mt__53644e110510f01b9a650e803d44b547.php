<?php ob_start();?><?php $_f0094b_vars=&$this->vars;$_f0094b_old_params=&$this->old_params;$_f0094b_local_params=&$this->local_params;$_f0094b_old_vars=&$this->old_vars;$_f0094b_local_vars=&$this->local_vars;?><div class="row form-group">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
      <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

      <?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>

    </label>
  </div>
  <div class="col-lg-10 input-group-lg">
    <input id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" type="text" class="form-control watch-changed" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="<?php echo $this->function_var($this->setup_args(['name'=>'value','this_tag'=>'var'],null,$this),$this)?>
"
      aria-label="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" placeholder="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_f0094b_old_params['_d08670']=$_f0094b_local_params;$_f0094b_old_vars['_d08670']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
readonly<?php endif;$_f0094b_local_params=$_f0094b_old_params['_d08670'];$_f0094b_local_vars=$_f0094b_old_vars['_d08670'];?>
>
      <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'permalink','setvar'=>'__permalink','this_tag'=>'var'],null,$this),$this),$this->setup_args('__permalink','setvar',$this),$this,'setvar')?>

  <?php $_f0094b_old_params['_c8c462']=$_f0094b_local_params;$_f0094b_old_vars['_c8c462']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $_f0094b_old_params['_1483ac']=$_f0094b_local_params;$_f0094b_old_vars['_1483ac']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->modifier_setvar($this->modifier_replace($this->function_var($this->setup_args(['name'=>'__permalink','replace'=>'\'$workspace_site_url\',\'$workspace_link_url\'','setvar'=>'__permalink','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'$workspace_site_url\\\',\\\'$workspace_link_url\\\'','replace',$this),$this,'replace'),$this->setup_args('__permalink','setvar',$this),$this,'setvar')?>

    <?php endif;$_f0094b_local_params=$_f0094b_old_params['_1483ac'];$_f0094b_local_vars=$_f0094b_old_vars['_1483ac'];?>

  <?php else:?>

    <?php $_f0094b_old_params['_da1e41']=$_f0094b_local_params;$_f0094b_old_vars['_da1e41']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->modifier_setvar($this->modifier_replace($this->function_var($this->setup_args(['name'=>'__permalink','replace'=>'\'$site_url\',\'$link_url\'','setvar'=>'__permalink','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'$site_url\\\',\\\'$link_url\\\'','replace',$this),$this,'replace'),$this->setup_args('__permalink','setvar',$this),$this,'setvar')?>

    <?php endif;$_f0094b_local_params=$_f0094b_old_params['_da1e41'];$_f0094b_local_vars=$_f0094b_old_vars['_da1e41'];?>

  <?php endif;$_f0094b_local_params=$_f0094b_old_params['_c8c462'];$_f0094b_local_vars=$_f0094b_old_vars['_c8c462'];?>

  <?php $_f0094b_old_params['_16c0af']=$_f0094b_local_params;$_f0094b_old_vars['_16c0af']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'permalink','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
<?php $_f0094b_old_params['_2441eb']=$_f0094b_local_params;$_f0094b_old_vars['_2441eb']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <button id="_view-published" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="input-group-addon"><i class="fa fa-globe" aria-hidden="true" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
"></i></button>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_2441eb'];$_f0094b_local_vars=$_f0094b_old_vars['_2441eb'];?>

  </div>
  <input type="hidden" name="__permalink" id="__permalink" value="<?php $_f0094b_old_params['_bd2dd9']=$_f0094b_local_params;$_f0094b_old_vars['_bd2dd9']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'permalink','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'__permalink','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_bd2dd9'];$_f0094b_local_vars=$_f0094b_old_vars['_bd2dd9'];?>
">
<?php $_f0094b_old_params['_f5323c']=$_f0094b_local_params;$_f0094b_old_vars['_f5323c']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <input type="hidden" name="__permalink_published" id="__permalink_published" value="<?php echo $this->function_var($this->setup_args(['name'=>'__permalink','this_tag'=>'var'],null,$this),$this)?>
">
<?php endif;$_f0094b_local_params=$_f0094b_old_params['_f5323c'];$_f0094b_local_vars=$_f0094b_old_vars['_f5323c'];?>

  <script>
  <?php $_f0094b_old_params['_9254fc']=$_f0094b_local_params;$_f0094b_old_vars['_9254fc']=$_f0094b_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.saved','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

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
              <?php $_f0094b_old_params['_004c21']=$_f0094b_local_params;$_f0094b_old_vars['_004c21']=$_f0094b_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_show_both','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

              if ( data.view_link ) {
                  $('#__permalink').val( data.view_link );
              }
              <?php endif;$_f0094b_local_params=$_f0094b_old_params['_004c21'];$_f0094b_local_vars=$_f0094b_old_vars['_004c21'];?>

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
  <?php endif;$_f0094b_local_params=$_f0094b_old_params['_9254fc'];$_f0094b_local_vars=$_f0094b_old_vars['_9254fc'];?>

  $('#_view-permalink').click(function(){
      var permalink = $('#__permalink').val();
      window.open( permalink, '_blank');
  });
  $('#_view-published').click(function(){
      var permalink = $('#__permalink_published').val();
      window.open( permalink, '_blank');
  });
  </script>
  <?php endif;$_f0094b_local_params=$_f0094b_old_params['_16c0af'];$_f0094b_local_vars=$_f0094b_old_vars['_16c0af'];?>

  </div>
</div><?php $this->out=ob_get_clean();$this->meta=array (
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