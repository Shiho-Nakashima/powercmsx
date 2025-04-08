<?php ob_start();?><?php $_ad2869_vars=&$this->vars;$_ad2869_old_params=&$this->old_params;$_ad2869_local_params=&$this->local_params;$_ad2869_old_vars=&$this->old_vars;$_ad2869_local_vars=&$this->local_vars;?><?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'permalink','setvar'=>'__permalink','this_tag'=>'var'],null,$this),$this),$this->setup_args('__permalink','setvar',$this),$this,'setvar')?>

<?php $_ad2869_old_params['_49f190']=$_ad2869_local_params;$_ad2869_old_vars['_49f190']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php $_ad2869_old_params['_001d20']=$_ad2869_local_params;$_ad2869_old_vars['_001d20']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar($this->modifier_replace($this->function_var($this->setup_args(['name'=>'__permalink','replace'=>'\'$workspace_site_url\',\'$workspace_link_url\'','setvar'=>'__permalink','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'$workspace_site_url\\\',\\\'$workspace_link_url\\\'','replace',$this),$this,'replace'),$this->setup_args('__permalink','setvar',$this),$this,'setvar')?>

  <?php endif;$_ad2869_local_params=$_ad2869_old_params['_001d20'];$_ad2869_local_vars=$_ad2869_old_vars['_001d20'];?>

<?php else:?>

  <?php $_ad2869_old_params['_a0d3f8']=$_ad2869_local_params;$_ad2869_old_vars['_a0d3f8']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar($this->modifier_replace($this->function_var($this->setup_args(['name'=>'__permalink','replace'=>'\'$site_url\',\'$link_url\'','setvar'=>'__permalink','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'$site_url\\\',\\\'$link_url\\\'','replace',$this),$this,'replace'),$this->setup_args('__permalink','setvar',$this),$this,'setvar')?>

  <?php endif;$_ad2869_local_params=$_ad2869_old_params['_a0d3f8'];$_ad2869_local_vars=$_ad2869_old_vars['_a0d3f8'];?>

<?php endif;$_ad2869_local_params=$_ad2869_old_params['_49f190'];$_ad2869_local_vars=$_ad2869_old_vars['_49f190'];?>

<div class="row form-group" style="margin-bottom:3px">
  <div class="col-lg-8 input-group-lg">
  <?php $_ad2869_old_params['_e2c993']=$_ad2869_local_params;$_ad2869_old_vars['_e2c993']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'permalink','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <div class="input-group copy-url copy-url-permalink">
    <input type="text" class="form-control form-control-sm clipboard-url" id="_permalink-clipboard"
    value="<?php echo $this->function_var($this->setup_args(['name'=>'__permalink','this_tag'=>'var'],null,$this),$this)?>
" readonly>
    <button type="button" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Copy to Clipboard','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="input-group-addon copy-clipboard" data-clipboard-target="#_permalink-clipboard"><i class="fa fa-clipboard" aria-hidden="true" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Copy to Clipboard','this_tag'=>'trans'],null,$this),$this)?>
"></i></button>
    <button type="button" id="__view-permalink" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="input-group-addon"><i class="fa fa-external-link" aria-hidden="true" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
"></i></button>
<?php $_ad2869_old_params['_47cd26']=$_ad2869_local_params;$_ad2869_old_vars['_47cd26']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <button type="button" id="__view-published" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="input-group-addon"><i class="fa fa-globe" aria-hidden="true" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
"></i></button>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_47cd26'];$_ad2869_local_vars=$_ad2869_old_vars['_47cd26'];?>

    </div>
    <input type="hidden" name="__permalink" id="_permalink" value="<?php $_ad2869_old_params['_dc24a1']=$_ad2869_local_params;$_ad2869_old_vars['_dc24a1']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'permalink','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'__permalink','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_dc24a1'];$_ad2869_local_vars=$_ad2869_old_vars['_dc24a1'];?>
">
  <?php $_ad2869_old_params['_98d7f7']=$_ad2869_local_params;$_ad2869_old_vars['_98d7f7']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <input type="hidden" name="__permalink_published" id="_permalink_published" value="<?php echo $this->function_var($this->setup_args(['name'=>'__permalink','this_tag'=>'var'],null,$this),$this)?>
">
  <?php endif;$_ad2869_local_params=$_ad2869_old_params['_98d7f7'];$_ad2869_local_vars=$_ad2869_old_vars['_98d7f7'];?>

    <script>
    <?php $_ad2869_old_params['_d9969c']=$_ad2869_local_params;$_ad2869_old_vars['_d9969c']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.saved','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    $('#_permalink-clipboard').css( 'color', 'gray' );
    $('#_permalink-clipboard').val( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Getting permalink...','this_tag'=>'trans'],null,$this),$this)?>
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
                $('#_permalink-clipboard').css( 'color', '#555555' );
                $('#_permalink-clipboard').val( data.view_link );
                <?php $_ad2869_old_params['_178c7c']=$_ad2869_local_params;$_ad2869_old_vars['_178c7c']=$_ad2869_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_show_both','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

                if ( data.view_link ) {
                    $('#__permalink').val( data.view_link );
                }
                <?php endif;$_ad2869_local_params=$_ad2869_old_params['_178c7c'];$_ad2869_local_vars=$_ad2869_old_vars['_178c7c'];?>

            } else {
                $('#_permalink-clipboard').css( 'color', '#555555' );
            }
        },
        "json"
        );
    }
    var get_permalink_error = function(){
        if ( __permalink_success == false ) {
            $('#_permalink-clipboard').val( '<?php echo $this->function_var($this->setup_args(['name'=>'permalink','this_tag'=>'var'],null,$this),$this)?>
' );
            $('#_permalink-clipboard').css( 'color', '#555555' );
        } 
    }
    setTimeout( get_current_permalink, 2500 );
    <?php endif;$_ad2869_local_params=$_ad2869_old_params['_d9969c'];$_ad2869_local_vars=$_ad2869_old_vars['_d9969c'];?>

    $('#__view-permalink').click(function(){
        var permalink = $('#_permalink').val();
        window.open( permalink, '_blank');
    });
    $('#__view-published').click(function(){
        var permalink = $('#_permalink_published').val();
        window.open( permalink, '_blank');
    });
    </script>
  <?php endif;$_ad2869_local_params=$_ad2869_old_params['_e2c993'];$_ad2869_local_vars=$_ad2869_old_vars['_e2c993'];?>

  </div>
  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'object_text_format','setvar'=>'object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('object_text_format','setvar',$this),$this,'setvar')?>

  <?php $_ad2869_old_params['_e18399']=$_ad2869_local_params;$_ad2869_old_vars['_e18399']=$_ad2869_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php $_ad2869_old_params['_989f97']=$_ad2869_local_params;$_ad2869_old_vars['_989f97']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

    <?php else:?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_ad2869_local_params=$_ad2869_old_params['_989f97'];$_ad2869_local_vars=$_ad2869_old_vars['_989f97'];?>

  <?php endif;$_ad2869_local_params=$_ad2869_old_params['_e18399'];$_ad2869_local_vars=$_ad2869_old_vars['_e18399'];?>

  <?php $_ad2869_old_params['_b19f2f']=$_ad2869_local_params;$_ad2869_old_vars['_b19f2f']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_text_format','eq'=>'convert line breaks','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'object_text_format','value'=>'convert_breaks','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_ad2869_local_params=$_ad2869_old_params['_b19f2f'];$_ad2869_local_vars=$_ad2869_old_vars['_b19f2f'];?>

  <div class="col-lg-4">
    <div class="text-format-box">
    <span class="pull-right form-inline">
    <label for="text_format-select"><span class="text-format-label"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Format','this_tag'=>'trans'],null,$this),$this)?>
 : </span></label>
    <select id="text_format-select" name="text_format" class="custom-select form-control form-control-sm very-short">
      <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'None','this_tag'=>'trans'],null,$this),$this)?>
</option>
      <option value="convert_breaks" <?php $_ad2869_old_params['_07cf5d']=$_ad2869_local_params;$_ad2869_old_vars['_07cf5d']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_text_format','eq'=>'convert_breaks','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_ad2869_local_params=$_ad2869_old_params['_07cf5d'];$_ad2869_local_vars=$_ad2869_old_vars['_07cf5d'];?>
><?php echo $this->function_trans($this->setup_args(['phrase'=>'Convert Line Breaks','this_tag'=>'trans'],null,$this),$this)?>
</option>
      <option value="markdown" <?php $_ad2869_old_params['_e45f2a']=$_ad2869_local_params;$_ad2869_old_vars['_e45f2a']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_text_format','eq'=>'markdown','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_ad2869_local_params=$_ad2869_old_params['_e45f2a'];$_ad2869_local_vars=$_ad2869_old_vars['_e45f2a'];?>
><?php echo $this->function_trans($this->setup_args(['phrase'=>'Markdown','this_tag'=>'trans'],null,$this),$this)?>
</option>
      
      <option value="richtext" <?php $_ad2869_old_params['_93cc6b']=$_ad2869_local_params;$_ad2869_old_vars['_93cc6b']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_ad2869_local_params=$_ad2869_old_params['_93cc6b'];$_ad2869_local_vars=$_ad2869_old_vars['_93cc6b'];?>
><?php echo $this->function_trans($this->setup_args(['phrase'=>'RichText','this_tag'=>'trans'],null,$this),$this)?>
</option>
      
    </select>
    </span>
  </div>
</div>
</div>
<div class="row form-group">
  <div class="col-lg-12">
    <div id="input-helper" class="hidden">
<button title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Heading %s','params'=>'1','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="btn btn-sm btn-secondary editor-btn" onclick="surroundHTML('h1','<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
');">H1</button>
<button title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Heading %s','params'=>'2','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="btn btn-sm btn-secondary editor-btn" onclick="surroundHTML('h2','<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
');">H2</button>
<button title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Heading %s','params'=>'3','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="btn btn-sm btn-secondary editor-btn" onclick="surroundHTML('h3','<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
');">H3</button>
<button title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Heading %s','params'=>'4','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="btn btn-sm btn-secondary editor-btn" onclick="surroundHTML('h4','<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
');">H4</button>
<button title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Bold','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="btn btn-sm btn-secondary editor-btn" onclick="surroundHTML('strong','<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
');"><i class="fa fa-bold"></i><span class="sr-only">STRONG</span></button>
<button title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Italic','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="btn btn-sm btn-secondary editor-btn" onclick="surroundHTML('em','<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
');"><i class="fa fa-italic"></i><span class="sr-only">EM</span></button>
<button title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Link','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="btn btn-sm btn-secondary editor-btn" onclick="surroundHTML('a','<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
');"><i class="fa fa-link"></i><span class="sr-only">A</span></button>
<button title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Paragraph','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="btn btn-sm btn-secondary editor-btn" onclick="surroundHTML('p','<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
');"><i class="fa fa-paragraph"></i><span class="sr-only">P</span></button>
<button title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Blockquote','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="btn btn-sm btn-secondary editor-btn" onclick="surroundHTML('blockquote','<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
');"><i class="fa fa-quote-left"></i><span class="sr-only">BLOCKQUOTE</span></button>
<button title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Bullet list','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="btn btn-sm btn-secondary editor-btn" onclick="surroundHTML('ul','<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
');"><i class="fa fa-list-ul"></i><span class="sr-only">UL</span></button>
<button title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Ordered list','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="btn btn-sm btn-secondary editor-btn" onclick="surroundHTML('ol','<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
');"><i class="fa fa-list-ol"></i><span class="sr-only">OL</span></button>
<button title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'list item','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="btn btn-sm btn-secondary editor-btn" onclick="surroundHTML('li','<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
');">LI</button>
<button title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Line break','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="btn btn-sm btn-secondary editor-btn" onclick="surroundHTML('br','<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
');">BR</button>
<button type="button" class="btn btn-sm btn-secondary editor-btn" data-toggle="modal" data-target="#modal" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
"
data-href="" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=asset<?php $_ad2869_old_params['_4c81f3']=$_ad2869_local_params;$_ad2869_old_vars['_4c81f3']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&amp;_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_4c81f3'];$_ad2869_local_vars=$_ad2869_old_vars['_4c81f3'];?>
&amp;dialog_view=1&amp;insert_editor=1&amp;insert=text"><i class="fa fa-file-o"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
</span></button>
<button type="button" class="btn btn-sm btn-secondary editor-btn" data-toggle="modal" data-target="#modal" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
"
data-href="" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=asset<?php $_ad2869_old_params['_bb5598']=$_ad2869_local_params;$_ad2869_old_vars['_bb5598']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&amp;_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_bb5598'];$_ad2869_local_vars=$_ad2869_old_vars['_bb5598'];?>
&amp;dialog_view=1&amp;select_system_filters=filter_class_image&amp;_system_filters_option=image&amp;_filter=asset&amp;insert_editor=1&amp;insert=text"><i class="fa fa-image"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
</span></button>
<?php echo $this->component('PTTags')->filter__eval($this->function_var($this->setup_args(['name'=>'custom_html_insert_buttons','_eval'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','_eval',$this),$this,'_eval')?>

    </div>
<?php $_ad2869_old_params['_7c5650']=$_ad2869_local_params;$_ad2869_old_vars['_7c5650']=$_ad2869_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'default','escape'=>'','setvar'=>'value','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('value','setvar',$this),$this,'setvar')?>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_7c5650'];$_ad2869_local_vars=$_ad2869_old_vars['_7c5650'];?>

    <div id="editor-text-wrapper"><textarea area-label="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" placeholder="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" rows="<?php $_ad2869_old_params['_683ab1']=$_ad2869_local_params;$_ad2869_old_vars['_683ab1']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'options','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
20<?php endif;$_ad2869_local_params=$_ad2869_old_params['_683ab1'];$_ad2869_local_vars=$_ad2869_old_vars['_683ab1'];?>
"
    class="form-control richtext watch-changed" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
<?php $_ad2869_old_params['_7165ae']=$_ad2869_local_params;$_ad2869_old_vars['_7165ae']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.text','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'value','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_7165ae'];$_ad2869_local_vars=$_ad2869_old_vars['_7165ae'];?>
</textarea>
<?php $_ad2869_old_params['_0994f8']=$_ad2869_local_params;$_ad2869_old_vars['_0994f8']=$_ad2869_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_hint','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="ml-1">
    <?php echo $this->function_var($this->setup_args(['name'=>'_hint','this_tag'=>'var'],null,$this),$this)?>

  </div>
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_0994f8'];$_ad2869_local_vars=$_ad2869_old_vars['_0994f8'];?>

</div>
  </div>
</div>
<script>
<?php $_ad2869_old_params['_a52853']=$_ad2869_local_params;$_ad2869_old_vars['_a52853']=$_ad2869_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'object_text_format','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'object_text_format','value'=>'none','this_tag'=>'setvar'],null,$this),$this)?>

  $('#input-helper').show();
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'object_text_format','ne'=>'richtext','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

  $('#input-helper').show();
<?php endif;$_ad2869_local_params=$_ad2869_old_params['_a52853'];$_ad2869_local_vars=$_ad2869_old_vars['_a52853'];?>

var editorMode = '<?php echo $this->modifier_regex_replace($this->modifier_escape($this->function_var($this->setup_args(['name'=>'object_text_format','escape'=>'js','regex_replace'=>'\'/\\\'/g\',\'\\\\\'\'','this_tag'=>'var'],null,$this),$this),$this->setup_args('js','escape',$this),$this,'escape'),$this->setup_args('\\\'/\\\\\\\'/g\\\',\\\'\\\\\\\\\\\'\\\'','regex_replace',$this),$this,'regex_replace')?>
';
$('#text_format-select').change(function(){
    if ( $(this).val() == 'richtext' ) {
        editorInit();
        $('#input-helper').hide();
    } else {
        tinymce.EditorManager.remove();
        $('#input-helper').show();
    }
    editorMode = $(this).val();
});
</script><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\primary_permalink.tmpl' => 1697132444,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744011352,
);?>