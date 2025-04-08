<?php ob_start();?><?php $_2111b6_vars=&$this->vars;$_2111b6_old_params=&$this->old_params;$_2111b6_local_params=&$this->local_params;$_2111b6_old_vars=&$this->old_vars;$_2111b6_local_vars=&$this->local_vars;?><div class="row form-group">
  <div class="col-lg-2">
    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'1','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

  </div>
  <div class="col-lg-10 form-inline">
    <?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'edit','split'=>':','setvar'=>'edit_props','this_tag'=>'var'],null,$this),$this),$this->setup_args(':','split',$this),$this,'split'),$this->setup_args('edit_props','setvar',$this),$this,'setvar')?>

    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'edit_props[1]','setvar'=>'rel_model','this_tag'=>'var'],null,$this),$this),$this->setup_args('rel_model','setvar',$this),$this,'setvar')?>

    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'edit_props[2]','setvar'=>'rel_col','this_tag'=>'var'],null,$this),$this),$this->setup_args('rel_col','setvar',$this),$this,'setvar')?>

    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'edit_props[3]','setvar'=>'rel_type','this_tag'=>'var'],null,$this),$this),$this->setup_args('rel_type','setvar',$this),$this,'setvar')?>

    <select id="questiontype_id-selector" class="form-control custom-select watch-changed" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
    <?php $c_e7a8bc=null;$_2111b6_old_params['_e7a8bc']=$_2111b6_local_params;$_2111b6_old_vars['_e7a8bc']=$_2111b6_local_vars;$a_e7a8bc=$this->setup_args(['model'=>'$rel_model','sort_by'=>'order','this_tag'=>'objectloop'],null,$this);$_e7a8bc=-1;$r_e7a8bc=true;while($r_e7a8bc===true):$r_e7a8bc=($_e7a8bc!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_e7a8bc,$c_e7a8bc,$this,$r_e7a8bc,++$_e7a8bc,'_e7a8bc');ob_start();?>
<?php $c_e7a8bc = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_e7a8bc=false;}if($c_e7a8bc ):?>

    <?php $_2111b6_old_params['_320ea1']=$_2111b6_local_params;$_2111b6_old_vars['_320ea1']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <option value="">
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Unspecified','this_tag'=>'trans'],null,$this),$this)?>

      </option>
    <?php endif;$_2111b6_local_params=$_2111b6_old_params['_320ea1'];$_2111b6_local_vars=$_2111b6_old_vars['_320ea1'];?>

      <option style="display:inline" class="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_2111b6_old_params['_c54536']=$_2111b6_local_params;$_2111b6_old_vars['_c54536']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__col_value__','eq'=>'$id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_2111b6_local_params=$_2111b6_old_params['_c54536'];$_2111b6_local_vars=$_2111b6_old_vars['_c54536'];?>
 value="<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
"><?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'$rel_col','trans'=>'$translate','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('$translate','trans',$this),$this,'trans'),ENT_QUOTES)?>
</option>
    <?php endif;$c_e7a8bc=ob_get_clean();endwhile; $_2111b6_local_params=$_2111b6_old_params['_e7a8bc'];$_2111b6_local_vars=$_2111b6_old_vars['_e7a8bc'];?>

    </select>
    <button class="btn btn-secondary" type="button" id="_apply_question_type"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
    &nbsp;
    <input type="hidden" name="delete_lb" value="0">
    <label class="custom-control custom-checkbox ml-4" id="delete_lb-label">
    <input id="delete_lb" class="form-control custom-control-input watch-changed"
     type="checkbox" name="delete_lb" value="1" <?php $_2111b6_old_params['_5b01c1']=$_2111b6_local_params;$_2111b6_old_vars['_5b01c1']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_delete_lb','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_2111b6_local_params=$_2111b6_old_params['_5b01c1'];$_2111b6_local_vars=$_2111b6_old_vars['_5b01c1'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Delete Line Breaks','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
  </div>
</div>
<div class="row mb-2">
  <div class="col-lg-2">
  </div>
  <div class="col-lg-10">
    <input type="hidden" name="required" value="0">
    <label class="custom-control custom-checkbox">
    <input id="required" class="form-control custom-control-input watch-changed"
    <?php $_2111b6_old_params['_5cbc15']=$_2111b6_local_params;$_2111b6_old_vars['_5cbc15']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_2111b6_local_params=$_2111b6_old_params['_5cbc15'];$_2111b6_local_vars=$_2111b6_old_vars['_5cbc15'];?>

     type="checkbox" name="required" value="1" <?php $_2111b6_old_params['_1377e9']=$_2111b6_local_params;$_2111b6_old_vars['_1377e9']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_2111b6_local_params=$_2111b6_old_params['_1377e9'];$_2111b6_local_vars=$_2111b6_old_vars['_1377e9'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Required','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    &nbsp;
    <input type="hidden" name="is_primary" value="0">
    <label class="custom-control custom-checkbox is_primary">
    <input id="is_primary" class="form-control custom-control-input watch-changed"
    <?php $_2111b6_old_params['_b79791']=$_2111b6_local_params;$_2111b6_old_vars['_b79791']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_2111b6_local_params=$_2111b6_old_params['_b79791'];$_2111b6_local_vars=$_2111b6_old_vars['_b79791'];?>

     type="checkbox" name="is_primary" value="1" <?php $_2111b6_old_params['_dd2a8d']=$_2111b6_local_params;$_2111b6_old_vars['_dd2a8d']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_is_primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_2111b6_local_params=$_2111b6_old_params['_dd2a8d'];$_2111b6_local_vars=$_2111b6_old_vars['_dd2a8d'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Primary','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    &nbsp;
    <input type="hidden" name="is_name" value="0">
    <label class="custom-control custom-checkbox is_primary">
    <input id="is_name" class="form-control custom-control-input watch-changed"
    <?php $_2111b6_old_params['_18d205']=$_2111b6_local_params;$_2111b6_old_vars['_18d205']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'readonly','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_2111b6_local_params=$_2111b6_old_params['_18d205'];$_2111b6_local_vars=$_2111b6_old_vars['_18d205'];?>

     type="checkbox" name="is_name" value="1" <?php $_2111b6_old_params['_c04515']=$_2111b6_local_params;$_2111b6_old_vars['_c04515']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_is_name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_2111b6_local_params=$_2111b6_old_params['_c04515'];$_2111b6_local_vars=$_2111b6_old_vars['_c04515'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Name','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    &nbsp;
    <label class="custom-control custom-checkbox">
    <input id="aggregate" class="form-control custom-control-input watch-changed"
        type="checkbox" name="aggregate" value="1" <?php $_2111b6_old_params['_85fb6a']=$_2111b6_local_params;$_2111b6_old_vars['_85fb6a']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_aggregate','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_2111b6_local_params=$_2111b6_old_params['_85fb6a'];$_2111b6_local_vars=$_2111b6_old_vars['_85fb6a'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Aggregate','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
    &nbsp;
    <label class="custom-control custom-checkbox">
    <input id="hide_in_email" class="form-control custom-control-input watch-changed"
        type="checkbox" name="hide_in_email" value="1" <?php $_2111b6_old_params['_f1d0d4']=$_2111b6_local_params;$_2111b6_old_vars['_f1d0d4']=$_2111b6_local_vars;if($this->conditional_if($this->setup_args(['name'=>'object_hide_in_email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_2111b6_local_params=$_2111b6_old_params['_f1d0d4'];$_2111b6_local_vars=$_2111b6_old_vars['_f1d0d4'];?>
>
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"> 
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Hide in email','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </label>
  </div>
</div>
<script>
<?php $_2111b6_old_params['_e8828d']=$_2111b6_local_params;$_2111b6_old_vars['_e8828d']=$_2111b6_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'object_required','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  $('.is_primary').hide();
<?php endif;$_2111b6_local_params=$_2111b6_old_params['_e8828d'];$_2111b6_local_vars=$_2111b6_old_vars['_e8828d'];?>

$('#required').change(function(){
    if ( $(this).prop('checked') ) {
        $('.is_primary').show();
    } else {
        $('#is_primary').prop('checked',false);
        $('.is_primary').hide();
    }
});
$('#questiontype_id-selector').change(function(){
    var class_name = $('[name=<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
] option:selected').prop('class');
    class_selector_chenge( class_name );
});
var __old_class = '';
function class_selector_chenge( class_name ) {
    if ( class_name.indexOf('checkbox') != -1
        || class_name.indexOf('radio') != -1
        || class_name.indexOf('file') != -1
        || class_name.indexOf('attachment') != -1
        || class_name.indexOf('dropdown') != -1
        || class_name.indexOf('input_group') != -1 ) {
        $('#options-wrapper').show();
        if ( class_name.indexOf('file') != -1 || class_name.indexOf('attachment') != -1 ) {
            $('#values-wrapper').hide();
        } else {
            $('#values-wrapper').show();
        }
        if ( class_name.indexOf('checkboxes') != -1 ) {
            if (! $('#connector').val() ) {
                $('#connector').val(', ');
            }
        }
    } else {
        $('#options-wrapper').hide();
        $('#values-wrapper').hide();
    }
    if ( class_name.indexOf('textarea') != -1 ) {
        $('#rows-wrapper').show();
    } else {
        $('#rows-wrapper').hide();
    }
    if ( class_name == 'checkbox' ) {
        $('#column-options-label').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'Label','this_tag'=>'trans'],null,$this),$this)?>
</span>');
        $('#options-hint-wrapper').hide();
        $('#column-values-hint').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'If you want to receive a value different from the value entered for the label, please enter alternative value.','this_tag'=>'trans'],null,$this),$this)?>
</span>');
    } else {
        $('#column-options-label').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'Options','this_tag'=>'trans'],null,$this),$this)?>
</span>');
        $('#options-hint-wrapper').show();
        $('#column-values-hint').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'If you want to receive a value different from the value entered for the options, please enter alternative comma separated list.','this_tag'=>'trans'],null,$this),$this)?>
</span>');
    }
    if ( class_name.indexOf('checkboxes') != -1
        || class_name.indexOf('date') != -1
        || class_name.indexOf('input_group') != -1 ) {
        $('#connector-wrapper').show();
    } else {
        $('#connector-wrapper').hide();
    }
    if ( class_name.indexOf('input_group') != -1 ) {
        $('#count_fields-wrapper').show();
        $('#values-wrapper').hide();
        $('#options-hint').html('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Please enter the width (number) of the fields(Comma separated list).','this_tag'=>'trans'],null,$this),$this)?>
');
    } else if ( class_name.indexOf('file') != -1 ) {
        $('#values-wrapper').hide();
        $('#options-hint').html('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Please enter the file extension for allow(Comma separated list).','this_tag'=>'trans'],null,$this),$this)?>
');
    } else if ( class_name.indexOf('attachment') != -1 ) {
        $('#values-wrapper').hide();
        $('#options-hint').html('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Please enter the file extension for allow(Comma separated list).','this_tag'=>'trans'],null,$this),$this)?>
');
    } else {
        $('#count_fields-wrapper').hide();
        $('#options-hint').html('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Please enter all allowable options for this field as a comma separated list.','this_tag'=>'trans'],null,$this),$this)?>
');
    }
    if ( class_name.indexOf('date') != -1 ) {
        if (! $('#connector').val() ) {
            $('#connector').val('<?php echo $this->function_trans($this->setup_args(['phrase'=>'(Year)','this_tag'=>'trans'],null,$this),$this)?>
,<?php echo $this->function_trans($this->setup_args(['phrase'=>'(Month)','this_tag'=>'trans'],null,$this),$this)?>
,<?php echo $this->function_trans($this->setup_args(['phrase'=>'(Day)','this_tag'=>'trans'],null,$this),$this)?>
');
        }
        if (! $('#default_value').val() ) {
            $('#default_value').val('<'+'mt:date format="Y"'+'>,<'+'mt:date format="m"'+'>,<'+'mt:date format="d"'+'>');
        }
        $('#options-wrapper').show();
        if (! $('#options').val() ) {
            $('#options').val('1930,<'+'mt:date format="Y"'+'>');
        }
    } else {
        if ( __old_class == 'date' ) {
            $('#options').val('');
            $('#connector').val('');
            $('#default_value').val('');
        }
    }
    if ( class_name.indexOf('attachment') != -1 || class_name.indexOf('file') != -1 ) {
        $('#validation_type-wrapper').hide();
        $('#column_maxlength-label').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'Max File Size','this_tag'=>'trans'],null,$this),$this)?>
</span>');
        $('#column_maxlength-option').hide();
        $('#default_value-wrapper').hide();
        $('.unit-label').show();
    } else {
        $('#validation_type-wrapper').show();
        $('#column_maxlength-label').html('<span><?php echo $this->function_trans($this->setup_args(['phrase'=>'Max Length','this_tag'=>'trans'],null,$this),$this)?>
</span>');
        $('#column_maxlength-option').show();
        $('#default_value-wrapper').show();
        $('.unit-label').hide();
    }
    if ( class_name.indexOf('attachment') != -1 || class_name.indexOf('file') != -1 || class_name.indexOf('date') != -1 ) {
        $('#delete_lb-label').hide();
    } else {
        $('#delete_lb-label').show();
    }
    __old_class = class_name;
}
$('#_apply_question_type').click(function(){
    var questiontype_id = $('#questiontype_id-selector').val();
    if ( questiontype_id ) {
        if ( !confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to apply the default template?','this_tag'=>'trans'],null,$this),$this)?>
') ) {
            return false;
        }
        var str = '__mode=get_field_html&_type=questiontype';
        str += '&magic_token=<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
&id=' + questiontype_id;
        $.post('<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
', str,
            function ( data ) {
                if ( data.status != 200 ) {
                    alert( data.message );
                    return;
                }
                let content = data.content;
                $('#template').val( content );
                if ( content.match(/placeholder=/i)) {
                    $('#placeholder-wrapper').show();
                }
                let class_name = data.class;
                if ( class_name ) {
                    class_selector_chenge( class_name );
                }
                let aria_label = data.aria_label;
                if ( aria_label ) {
                    $('#aria_label').val( aria_label );
                }
                // text,textarea,text_input_group,radio,checkbox,checkboxes,dropdown,date,file
                disp_header_alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'The default template was successfully applied. The applied template will not be reflected until you save this page.','this_tag'=>'trans'],null,$this),$this)?>
' );
            },
            'json'
        );
    } else {
        <?php echo $this->modifier_setvar(paml_htmlspecialchars($this->function_trans($this->setup_args(['phrase'=>'Question Type','escape'=>'','setvar'=>'question_type_label','this_tag'=>'trans'],null,$this),$this),ENT_QUOTES),$this->setup_args('question_type_label','setvar',$this),$this,'setvar')?>

        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'\'%s\' not specified.','params'=>'$question_type_label','this_tag'=>'trans'],null,$this),$this)?>
');
    }
});
var __selector_class_name = $('[name=<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
] option:selected').prop('class');
class_selector_chenge( __selector_class_name );
</script><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005007,
);?>