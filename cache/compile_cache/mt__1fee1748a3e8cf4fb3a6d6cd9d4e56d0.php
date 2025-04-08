<?php ob_start();?><?php $_6c1c9e_vars=&$this->vars;$_6c1c9e_old_params=&$this->old_params;$_6c1c9e_local_params=&$this->local_params;$_6c1c9e_old_vars=&$this->old_vars;$_6c1c9e_local_vars=&$this->local_vars;?><div style="height: 30px;margin-top:-10px">
<span class="pull-right">
<button type="button" class="btn btn-primary btn-sm toggle-editor-btn" onclick="
    if ( editTemplateMode == 'CodeMirror' ) {
        $('#text').show();
        $('.CodeMirror').hide();
        editTemplateMode = 'None';
        $(this).removeClass('btn-primary');
        $(this).addClass('btn-secondary');
        editor.save();
        $('#text').val(editor.getTextArea().value);
        $.cookie( 'pt-template-editor-mode', 'Plain', { expires: 365 });
    } else {
        $('#text').hide();
        $('.CodeMirror').show();
        editTemplateMode = 'CodeMirror';
        $(this).removeClass('btn-secondary');
        $(this).addClass('btn-primary');
        editor.setValue($('#text').val());
        $.cookie( 'pt-template-editor-mode', 'CodeMirror', { expires: 365 });
    }
">
    <i class="fa fa-code" aria-hidden="true"></i>
    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Editor','this_tag'=>'trans'],null,$this),$this)?>
</span>
</button>
</span>
</div>

<link rel=stylesheet href="assets/codemirror/lib/codemirror.css">
<script src="assets/codemirror/lib/codemirror.js"></script>
<script src="assets/codemirror/mode/javascript/javascript.js"></script>
<script src="assets/codemirror/mode/css/css.js"></script>
<script src="assets/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<script src="assets/codemirror/addon/edit/matchbrackets.js"></script>
<script src="assets/codemirror/Prototype/xml.js"></script>
<script src="assets/codemirror/Prototype/htmlmixed.js"></script>

<div class="row form-group">
  <div class="col-lg-12">
<textarea id="text" rows="40"
  class="form-control watch-changed" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
<?php echo $this->function_var($this->setup_args(['name'=>'value','this_tag'=>'var'],null,$this),$this)?>
</textarea>
  </div>
</div>

<script>
$('#edit-form-main').submit(function(){
    if ( editTemplateMode == 'None' ) {
        editTemplateMode = 'CodeMirror';
        editor.setValue($('#text').val());
        $('#text').show();
        $('.CodeMirror').hide();
        editTemplateMode = 'None';
        editor.save();
        $('#text').val(editor.getTextArea().value);
    }
});
var editTemplateMode = 'CodeMirror';
var editor;
function init_codemirror () {
      editor = CodeMirror.fromTextArea(document.getElementById("text"), {
      lineNumbers: true,
      mode: "text/html"
    });
    editor.setSize('100%', 600);
}
init_codemirror();
var editor_mode = $.cookie( 'pt-template-editor-mode' );
if ( editor_mode == 'Plain' ) {
    $('#text').show();
    $('.CodeMirror').hide();
    editTemplateMode = 'None';
    $('.toggle-editor-btn').removeClass('btn-primary');
    $('.toggle-editor-btn').addClass('btn-secondary');
    editor.save();
    $('#text').val(editor.getTextArea().value);
}
</script><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\template\\screen_header.tmpl' => 1694708530,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744075530,
);?>