<?php ob_start();?><?php $literal_old__750987_=$this->literal_vars;$this->literal_vars=array (
  0 => '
<mtnestableobjects model="$model" parent_id="$_parent_id" permalink="1">
<mtif name="__first__"><ol class="dd-list"<mtunless name="_parent_id"> id="parent-ol"</mtunless>></mtif>
  <li class="dd-item" data-id="<mtvar name="id" />">
    <div class="dd-handle dd--handle"><span class="sr-only"><mttrans phrase="Drag" /></span></div>
    <div class="dd-content">
      <mtunless name="request.dialog_view">
      <mtifusercan action="edit" model="$model" id="$id" workspace_id="$workspace_id"><a href="<mtvar name="script_uri" />?__mode=view&amp;_type=edit&amp;_model=<mtvar name="model" />&amp;id=<mtvar name="id" /><mtif name="workspace_id">&amp;workspace_id=<mtvar name="workspace_id" /></mtif>"></mtifusercan>
      </mtunless>
        <span id="object_label-<mtvar name="id" />" class="obj-label">
        <mtvar name="object_label" escape />
        </span>
      <mtunless name="request.dialog_view"><mtifusercan action="edit" model="$model" id="$id" workspace_id="$workspace_id"></a></mtifusercan></mtunless>
      <mtif name="has_basename"><span id="object_basename-<mtvar name="id" />" class="obj-basename"> ( <mtvar name="basename" escape /> ) </span></mtif>
        <input placeholder="<mtvar name="object_primary" />" id="label-<mtvar name="id" />" name="label-<mtvar name="id" />" type="text" class="add_param editable-label editable hidden form-control very-short form-control-sm" value="<mtvar name="object_label" escape />">
      <mtif name="has_basename">
        <input placeholder="<mttrans phrase="Basename" />" id="basename-<mtvar name="id" />" name="basename-<mtvar name="id" />" type="text" class="add_param editable hidden form-control very-short form-control-sm" value="<mtvar name="basename" escape />">
      </mtif>
        <mtifusercan action="edit" model="$model" id="$id" workspace_id="$workspace_id">
        <button id="edit-<mtvar name="id" />" type="button" class="edit-btn btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="right" title="<mttrans phrase="Edit" />">
          <i class="fa fa-pencil-square" aria-hidden="true"></i>
          <span class="sr-only"><mttrans phrase="Edit" /></span>
        </button>
        </mtifusercan>
        <mtifusercan action="create" model="$model" workspace_id="$workspace_id">
        <button id="add-<mtvar name="id" />" type="button" class="add-btn btn btn-success btn-sm" data-toggle="tooltip" data-placement="right" title="<mttrans phrase="Add" />">
          <i class="fa fa-plus-circle" aria-hidden="true"></i>
          <span class="sr-only"><mttrans phrase="Add" /></span>
        </button>
        </mtifusercan>
        <button id="save-<mtvar name="id" />" type="button" class="hidden save-btn btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="right" title="<mttrans phrase="Save" />">
          <i class="fa fa-floppy-o" aria-hidden="true"></i>
          <span class="sr-only"><mttrans phrase="Save" /></span>
        </button>
        <button id="cancel-<mtvar name="id" />" type="button" class="hidden cancel-btn btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="right" title="<mttrans phrase="Cancel" />">
          <i class="fa fa-ban" aria-hidden="true"></i>
          <span class="sr-only"><mttrans phrase="Cancel" /></span>
        </button>
        <mtifusercan action="delete" model="$model" id="$id" workspace_id="$workspace_id">
        <button id="delete-<mtvar name="id" />" type="button" class="delete-btn btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="right" title="<mttrans phrase="Delete" />">
          <i class="fa fa-trash" aria-hidden="true"></i>
          <span class="sr-only"><mttrans phrase="Delete" /></span>
        </button>
        </mtifusercan>
        <mtif name="object_permalink">
          <mtif name="_link_url">
            <mtvar name="object_permalink" replace="\'$_site_url\',\'$_link_url\'" setvar="__permalink" />
          <mtelse />
            <mtvar name="object_permalink" setvar="__permalink" />
          </mtif>
          <mtif name="_show_both">
            <a class="external-link-pub" target="_blank" href="<mtvar name="__permalink" />" data-toggle="tooltip" data-placement="bottom" title="<mttrans phrase="View Published" />">
              <i class="fa fa-globe" aria-hidden="true"></i>
              <span class="sr-only"><mttrans phrase="Open in new window" /></span>
            </a>
          </mtif>
          <a class="external-link" target="_blank" href="<mtif name="_show_both"><mtvar name="object_permalink" /><mtelse /><mtvar name="__permalink" /></mtif>" data-toggle="tooltip" data-placement="bottom" title="<mttrans phrase="View" />">
            <i class="fa fa-external-link" aria-hidden="true"></i>
            <span class="sr-only"><mttrans phrase="Open in new window" /></span>
          </a>
        </mtif>
    </div>
<mtif name="has_children">
<mtvar name="id" setvar="_parent_id" />
  <mtvar name="nestable_obj_list" />
</mtif>
  </li>
<mtif name="__last__">
</ol>
<mtsetvar name="__hierarchy_out" value="1" />
</mtif>
</mtnestableobjects>
',
  1 => '
  <mtnestableobjects model="$model" parent_id="$_parent_id">
    <mtif name="__first__"><ul class="nestableobjects-list"></mtif>
      <li>
        <button style="padding:0px 5px" id="<mtvar name="__col_name__" />_id_<mtvar name="id" />" type="button" class="<mtvar name="__col_name__" />_primary_chooser btn btn-sm btn-outline-secondary">
          <i class="fa <mtif name="id" eq="$relation_primary_id">fa fa-star<mtelse />fa-check</mtif>" style="margin-right:3px;color:#777;font-size:70%" aria-hidden="true"></i>
          <span class="sr-only"><mttrans phrase="Unspecified" /></span>
        </button>
        &nbsp;
        <label class="custom-control custom-checkbox">
          <input type="checkbox"
            id="<mtvar name="__col_name__" />_cb_<mtvar name="id" />"
            class="custom-control-input watch-changed" name="<mtvar name="__col_name__" />[]" value="<mtvar name="id" />">
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description"><mtif name="$rel_col" eq="">null(id:<mtvar name="id" />)<mtelse /><mtif name="translate"><mtvar name="$rel_col" translate escape /><mtelse /><mtvar name="$rel_col" escape /></mtif></mtif>
          </span>
        </label>
        <mtif name="has_children">
          <mtvar name="id" setvar="_parent_id" />
          <mtvar name="nestable_obj_list" />
        </mtif>
      </li>
    <mtif name="__last__"></ul></mtif>
  </mtnestableobjects>
  ',
  2 => '
  <mtnestableobjects model="$model" parent_id="$_parent_id">
    <mtif name="__first__"><ul>
      <mtunless name="_parent_id">
      <li class="nestable-unspecified">
      <label class="custom-control custom-radio">
        <input class="custom-control-input" type="radio" name="<mtvar name="__col_name__" />" value="">
        <span class="custom-control-indicator"></span>
        <span class="custom-control-description"><mttrans phrase="Unspecified" /></span>
      </label>
      </li>
      </mtunless>
    </mtif>
      <li <mtunless name="__index__">class="nestable-first"</mtunless>>
        <label class="custom-control custom-radio">
          <input class="custom-control-input watch-changed" type="radio" name="<mtvar name="__col_name__" />" value="<mtvar name="id" />">
          <span class="custom-control-indicator"></span>
          <span class="custom-control-description"><mtif name="$rel_col" eq="">null(id:<mtvar name="id" />)<mtelse /><mtif name="translate"><mtvar name="$rel_col" translate escape /><mtelse /><mtvar name="$rel_col" escape /></mtif></mtif></span>
        </label>
        <mtif name="has_children">
          <mtvar name="id" setvar="_parent_id" />
          <mtvar name="nestable_obj_list" />
        </mtif>
      </li>
    <mtif name="__last__"></ul></mtif>
  </mtnestableobjects>
  ',
);?><?php $_750987_vars=&$this->vars;$_750987_old_params=&$this->old_params;$_750987_local_params=&$this->local_params;$_750987_old_vars=&$this->old_vars;$_750987_local_vars=&$this->local_vars;?><?php $_750987_old_params['_174977']=$_750987_local_params;$_750987_old_vars['_174977']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.insert','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<?php $_750987_old_params['_21e3a0']=$_750987_local_params;$_750987_old_vars['_21e3a0']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<!DOCTYPE html>
<html lang="<?php $_750987_old_params['_77a876']=$_750987_local_params;$_750987_old_vars['_77a876']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_language','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_language','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
en<?php endif;$_750987_local_params=$_750987_old_params['_77a876'];$_750987_local_vars=$_750987_old_vars['_77a876'];?>
">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="author" content="Alfasado Inc.">
    <meta name="robots" content="noindex">
    <meta name="robots" content="nofollow">
    <link rel="icon" href="favicon.ico">
    <title><?php $_750987_old_params['_d12d7f']=$_750987_local_params;$_750987_old_vars['_d12d7f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'html_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'html_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php else:?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'page_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_750987_local_params=$_750987_old_params['_d12d7f'];$_750987_local_vars=$_750987_old_vars['_d12d7f'];?>
 | <?php echo $this->modifier_escape($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'appname','escape'=>'single','this_tag'=>'getoption'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php $_750987_old_params['_da39d0']=$_750987_local_params;$_750987_old_vars['_da39d0']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_461f8c']=$_750987_local_params;$_750987_old_vars['_461f8c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 | <?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_750987_local_params=$_750987_old_params['_461f8c'];$_750987_local_vars=$_750987_old_vars['_461f8c'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_da39d0'];$_750987_local_vars=$_750987_old_vars['_da39d0'];?>
</title>
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tether.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery.cookie.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/clipboard.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/ie10-viewport-bug-workaround.js"></script>
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/theme.min.css?v=<?php echo $this->function_var($this->setup_args(['name'=>'version','this_tag'=>'var'],null,$this),$this)?>
" rel="stylesheet">
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/jquery.fileupload.css">
    <?php $_750987_old_params['_11c83e']=$_750987_local_params;$_750987_old_vars['_11c83e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_d3bcd7']=$_750987_local_params;$_750987_old_vars['_d3bcd7']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'list_screen','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_d3bcd7'];$_750987_local_vars=$_750987_old_vars['_d3bcd7'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_11c83e'];$_750987_local_vars=$_750987_old_vars['_11c83e'];?>

    <style type="text/css">
    <?php $_750987_old_params['_cb6adf']=$_750987_local_params;$_750987_old_vars['_cb6adf']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'list_screen','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
.disp-option-button { position:absolute; top: 5px; right: 15px; }<?php endif;$_750987_local_params=$_750987_old_params['_cb6adf'];$_750987_local_vars=$_750987_old_vars['_cb6adf'];?>

    <?php $_750987_old_params['_bc6f51']=$_750987_local_params;$_750987_old_vars['_bc6f51']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_stickey_buttons','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_ed849d']=$_750987_local_params;$_750987_old_vars['_ed849d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_9f2b1a']=$_750987_local_params;$_750987_old_vars['_9f2b1a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickybgcolor','value'=>'$workspace_barcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_9f2b1a'];$_750987_local_vars=$_750987_old_vars['_9f2b1a'];?>

      <?php $_750987_old_params['_a15b4e']=$_750987_local_params;$_750987_old_vars['_a15b4e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickycolor','value'=>'$workspace_bartextcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_a15b4e'];$_750987_local_vars=$_750987_old_vars['_a15b4e'];?>

      <?php endif;$_750987_local_params=$_750987_old_params['_ed849d'];$_750987_local_vars=$_750987_old_vars['_ed849d'];?>

      <?php $_750987_old_params['_0d0e73']=$_750987_local_params;$_750987_old_vars['_0d0e73']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickybgcolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'barcolor','setvar'=>'stickybgcolor','this_tag'=>'getoption'],null,$this),$this),$this->setup_args('stickybgcolor','setvar',$this),$this,'setvar')?>
<?php endif;$_750987_local_params=$_750987_old_params['_0d0e73'];$_750987_local_vars=$_750987_old_vars['_0d0e73'];?>

      <?php $_750987_old_params['_90e7ce']=$_750987_local_params;$_750987_old_vars['_90e7ce']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickycolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'bartextcolor','setvar'=>'stickycolor','this_tag'=>'getoption'],null,$this),$this),$this->setup_args('stickycolor','setvar',$this),$this,'setvar')?>
<?php endif;$_750987_local_params=$_750987_old_params['_90e7ce'];$_750987_local_vars=$_750987_old_vars['_90e7ce'];?>

      @media ( min-height: 576px ) {
      .edit-action-bar { position: sticky; bottom: 0px; z-index: 1040; background: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickybgcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
;
          padding: 10px 0px; vertical-align: middle; line-height: 1; border-top: 1px solid #CCC; }
      .edit-action-bar button { border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      .edit-action-bar label { color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      }
    <?php endif;$_750987_local_params=$_750987_old_params['_bc6f51'];$_750987_local_vars=$_750987_old_vars['_bc6f51'];?>

      .nav-top,.brand-prototype{ background-color: <?php echo $this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'barcolor','this_tag'=>'getoption'],null,$this),$this)?>
 !important; color: <?php echo $this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'bartextcolor','this_tag'=>'getoption'],null,$this),$this)?>
 !important; }
      <?php $_750987_old_params['_98aef3']=$_750987_local_params;$_750987_old_vars['_98aef3']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .form-control, .custom-select, .relation_nestable_list, .custom-control-indicator, .tox-tinymce, .mce-tinymce, .btn-outline-secondary, .btn-secondary, .pagination-sm li a{ border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important }
      <?php endif;$_750987_local_params=$_750987_old_params['_98aef3'];$_750987_local_vars=$_750987_old_vars['_98aef3'];?>

    </style>
    <?php echo $this->function_var($this->setup_args(['name'=>'html_head','this_tag'=>'var'],null,$this),$this)?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_css','setvar'=>'config_user_css','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_css','setvar',$this),$this,'setvar')?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_js','setvar'=>'config_user_js','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_js','setvar',$this),$this,'setvar')?>

    <?php $_750987_old_params['_2c581d']=$_750987_local_params;$_750987_old_vars['_2c581d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_css','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_css','this_tag'=>'var'],null,$this),$this)?>
"><?php endif;$_750987_local_params=$_750987_old_params['_2c581d'];$_750987_local_vars=$_750987_old_vars['_2c581d'];?>

    <?php $_750987_old_params['_ac1615']=$_750987_local_params;$_750987_old_vars['_ac1615']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_js','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_js','this_tag'=>'var'],null,$this),$this)?>
"></script><?php endif;$_750987_local_params=$_750987_old_params['_ac1615'];$_750987_local_vars=$_750987_old_vars['_ac1615'];?>

  </head>
  <body class="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'body_class','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 dialog">
<?php $_750987_old_params['_3fd823']=$_750987_local_params;$_750987_old_vars['_3fd823']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
jQuery.fn.extend({
  ksortable: function(options) {
    let self = this;
    self.sortable(options);
    $(self).children().attr('tabindex', 0);
    $(self).on('keydown', '> *', function(event) {
    // $('li', this).attr('tabindex', 0).bind('keydown', function(event) {
        if ( event.target && /^(input|textarea|select)$/.test(event.target.tagName.toLowerCase()) ) {
            return;
        }
        if(event.which == 37 || event.which == 38) { // left or up
          $(this).insertBefore($(this).prev());
        } 
        if(event.which == 39 || event.which == 40) { // right or down
          $(this).insertAfter($(this).next()); 
        }     
        if (event.which == 84 || event.which == 33) { // "t" or page-up
          $(this).parent().prepend($(this));
        } 
        if (event.which == 66 || event.which == 34) { // "b" or page-down
          $(this).parent().append($(this));
        } 
        if(event.which == 82) { // "r"
          var p = $(this).parent();
          p.children().each(function(){p.prepend($(this))})
        } 
        if(event.which == 83) { // "s"
          var p = $(this).parent();
          p.children().each(function(){
            if(Math.random()<.5)
              p.prepend($(this));
            else
              p.append($(this));
          })
        }
        var keyNums = [33, 34, 37, 38, 39, 40, 66, 82, 83, 84];
        var keyNum = event.which + 0;
        if (keyNums.indexOf(keyNum) >= 0){
          event.stopPropagation();
          $(this).focus();
          if ( $(this).hasClass("edit-options-child") ) {
            sort_fields();
          } else if ( $(this).hasClass("badge-relation") ) {
            editContentChanged = true;
          }
          $(self).sortable('refresh').sortable('refreshPositions');
          $(self).trigger('ksortupdate', this);
        }
    });
    return self;
  }
});
</script>
<?php $_750987_old_params['_8b2686']=$_750987_local_params;$_750987_old_vars['_8b2686']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_loader','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div id="__loader-bg">
  <img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif" alt="" width="45" height="45">
</div>
<script>
window.addEventListener('load', function(){
    $('#__loader-bg').hide("fast");
});
</script>
<?php endif;$_750987_local_params=$_750987_old_params['_8b2686'];$_750987_local_vars=$_750987_old_vars['_8b2686'];?>

<?php endif;$_750987_local_params=$_750987_old_params['_3fd823'];$_750987_local_vars=$_750987_old_vars['_3fd823'];?>

<?php $_750987_old_params['_6c545b']=$_750987_local_params;$_750987_old_vars['_6c545b']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_68d681']=$_750987_local_params;$_750987_old_vars['_68d681']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.direct_edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_0c2dab']=$_750987_local_params;$_750987_old_vars['_0c2dab']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.saved','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div id="__loader-bg">
  <img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif" alt="" width="45" height="45">
</div>
<?php endif;$_750987_local_params=$_750987_old_params['_0c2dab'];$_750987_local_vars=$_750987_old_vars['_0c2dab'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_68d681'];$_750987_local_vars=$_750987_old_vars['_68d681'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_6c545b'];$_750987_local_vars=$_750987_old_vars['_6c545b'];?>

    <div class="container-fluid full">
    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    
  <?php $_750987_old_params['_40699c']=$_750987_local_params;$_750987_old_vars['_40699c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'can_action','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'disp_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_750987_old_params['_1a37a3']=$_750987_local_params;$_750987_old_vars['_1a37a3']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'child_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_a2d36c']=$_750987_local_params;$_750987_old_vars['_a2d36c']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_750987_local_params=$_750987_old_params['_a2d36c'];$_750987_local_vars=$_750987_old_vars['_a2d36c'];?>

    <?php endif;$_750987_local_params=$_750987_old_params['_1a37a3'];$_750987_local_vars=$_750987_old_vars['_1a37a3'];?>

    <?php $_750987_old_params['_6f6d9d']=$_750987_local_params;$_750987_old_vars['_6f6d9d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_750987_local_params=$_750987_old_params['_6f6d9d'];$_750987_local_vars=$_750987_old_vars['_6f6d9d'];?>

    <?php $_750987_old_params['_f6d187']=$_750987_local_params;$_750987_old_vars['_f6d187']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'comment','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'attachmentfile','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'user','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_26ef37']=$_750987_local_params;$_750987_old_vars['_26ef37']=$_750987_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>

      <?php else:?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'disp_option','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_750987_local_params=$_750987_old_params['_26ef37'];$_750987_local_vars=$_750987_old_vars['_26ef37'];?>

    <?php endif;$_750987_local_params=$_750987_old_params['_f6d187'];$_750987_local_vars=$_750987_old_vars['_f6d187'];?>

    <?php $_750987_old_params['_d283e5']=$_750987_local_params;$_750987_old_vars['_d283e5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_750987_local_params=$_750987_old_params['_d283e5'];$_750987_local_vars=$_750987_old_vars['_d283e5'];?>

    <?php $_750987_old_params['_b819c3']=$_750987_local_params;$_750987_old_vars['_b819c3']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_1b05c7']=$_750987_local_params;$_750987_old_vars['_1b05c7']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php ob_start();$_750987_old_params['_cff156']=$_750987_local_params;$_750987_old_vars['_cff156']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <div class="text-right disp-option">
    <button type="button" class="btn btn-outline-primary btn-sm disp-option-button" data-toggle="modal" data-target="#dispOptions">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>

    </button>
    <button data-toggle="modal" data-target="#dispOptions" class="hidden btn btn-secondary alt-disp-option-button btn-sm" type="button">
      <i class="fa fa-television" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </button>
  </div>
  <div class="modal fade" id="dispOptions" tabindex="-1" role="dialog" aria-labelledby="LongTitle" aria-hidden="true"
    style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'Display Options','setvar'=>'options_title','this_tag'=>'trans'],null,$this),$this),$this->setup_args('options_title','setvar',$this),$this,'setvar')?>

          <h5 class="modal-title" id="LongTitle"><?php echo $this->function_var($this->setup_args(['name'=>'options_title','this_tag'=>'var'],null,$this),$this)?>
</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST" id="disp_options_form">
        <input type="hidden" name="__mode" value="display_options">
        <input type="hidden" name="_model" value="<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
">
        <input type="hidden" name="_type" value="edit">
        <input type="hidden" name="_reset" value="" id="_reset-disp-oprions">
        <input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">
        <input type="hidden" id="_field_sort_order" name="field_sort_order" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'_field_sort_order','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <?php $_750987_old_params['_4ce005']=$_750987_local_params;$_750987_old_vars['_4ce005']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
        <?php endif;$_750987_local_params=$_750987_old_params['_4ce005'];$_750987_local_vars=$_750987_old_vars['_4ce005'];?>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10" id="edit_options_loop">
              <span id="_start_options"></span>
          <?php $_750987_old_params['_1895ab']=$_750987_local_params;$_750987_old_vars['_1895ab']=$_750987_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

            <?php $c_2324db=null;$_750987_old_params['_2324db']=$_750987_local_params;$_750987_old_vars['_2324db']=$_750987_local_vars;$a_2324db=$this->setup_args(['type'=>'edit','option'=>'1','this_tag'=>'objectcols'],null,$this);$_2324db=-1;$r_2324db=true;while($r_2324db===true):$r_2324db=($_2324db!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_2324db,$c_2324db,$this,$r_2324db,++$_2324db,'_2324db');ob_start();?>
<?php $c_2324db = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_2324db=false;}if($c_2324db ):?>

              <?php $_750987_old_params['_878480']=$_750987_local_params;$_750987_old_vars['_878480']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','ne'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_750987_old_params['_93b032']=$_750987_local_params;$_750987_old_vars['_93b032']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'hidden','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_750987_old_params['_fbad19']=$_750987_local_params;$_750987_old_vars['_fbad19']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'allow_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'accept_comment','setvar'=>'accept_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

                    <?php $_750987_old_params['_e9f1e1']=$_750987_local_params;$_750987_old_vars['_e9f1e1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <?php $_750987_old_params['_de8a71']=$_750987_local_params;$_750987_old_vars['_de8a71']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <?php endif;$_750987_local_params=$_750987_old_params['_de8a71'];$_750987_local_vars=$_750987_old_vars['_de8a71'];?>

                    <?php endif;$_750987_local_params=$_750987_old_params['_e9f1e1'];$_750987_local_vars=$_750987_old_vars['_e9f1e1'];?>

                  <?php endif;$_750987_local_params=$_750987_old_params['_fbad19'];$_750987_local_vars=$_750987_old_vars['_fbad19'];?>

                <?php endif;$_750987_local_params=$_750987_old_params['_93b032'];$_750987_local_vars=$_750987_old_vars['_93b032'];?>

                <?php $_750987_old_params['_c67d99']=$_750987_local_params;$_750987_old_vars['_c67d99']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_750987_old_params['_258cad']=$_750987_local_params;$_750987_old_vars['_258cad']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_258cad'];$_750987_local_vars=$_750987_old_vars['_258cad'];?>

                  <?php $_750987_old_params['_b45832']=$_750987_local_params;$_750987_old_vars['_b45832']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_750987_local_params=$_750987_old_params['_b45832'];$_750987_local_vars=$_750987_old_vars['_b45832'];?>

                  <label class="edit-options-child <?php $_750987_old_params['_fe4cad']=$_750987_local_params;$_750987_old_vars['_fe4cad']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_750987_local_params=$_750987_old_params['_fe4cad'];$_750987_local_vars=$_750987_old_vars['_fe4cad'];?>
custom-control custom-checkbox" id="label-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                    <?php $_750987_old_params['_0adb02']=$_750987_local_params;$_750987_old_vars['_0adb02']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <input type="hidden" id="" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <?php endif;$_750987_local_params=$_750987_old_params['_0adb02'];$_750987_local_vars=$_750987_old_vars['_0adb02'];?>

                    <input<?php $_750987_old_params['_2e85cf']=$_750987_local_params;$_750987_old_vars['_2e85cf']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php else:?>
<?php $_750987_old_params['_1b4bbd']=$_750987_local_params;$_750987_old_vars['_1b4bbd']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 onclick="return false;" checked <?php else:?>

                    <?php $_750987_old_params['_28a70d']=$_750987_local_params;$_750987_old_vars['_28a70d']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_750987_local_params=$_750987_old_params['_28a70d'];$_750987_local_vars=$_750987_old_vars['_28a70d'];?>

                    <?php endif;$_750987_local_params=$_750987_old_params['_1b4bbd'];$_750987_local_vars=$_750987_old_vars['_1b4bbd'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_2e85cf'];$_750987_local_vars=$_750987_old_vars['_2e85cf'];?>
<?php $_750987_old_params['_c79962']=$_750987_local_params;$_750987_old_vars['_c79962']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_750987_local_params=$_750987_old_params['_c79962'];$_750987_local_vars=$_750987_old_vars['_c79962'];?>
 type="<?php $_750987_old_params['_46f9da']=$_750987_local_params;$_750987_old_vars['_46f9da']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
checkbox<?php endif;$_750987_local_params=$_750987_old_params['_46f9da'];$_750987_local_vars=$_750987_old_vars['_46f9da'];?>
" class="custom-control-input disp_option disp_option-cb" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator<?php $_750987_old_params['_8c6997']=$_750987_local_params;$_750987_old_vars['_8c6997']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_750987_local_params=$_750987_old_params['_8c6997'];$_750987_local_vars=$_750987_old_vars['_8c6997'];?>
<?php $_750987_old_params['_38bfd9']=$_750987_local_params;$_750987_old_vars['_38bfd9']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_750987_local_params=$_750987_old_params['_38bfd9'];$_750987_local_vars=$_750987_old_vars['_38bfd9'];?>
"></span>
                    <span class="custom-control-description"> 
                    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
                  </label>
                <?php endif;$_750987_local_params=$_750987_old_params['_c67d99'];$_750987_local_vars=$_750987_old_vars['_c67d99'];?>

              <?php endif;$_750987_local_params=$_750987_old_params['_878480'];$_750987_local_vars=$_750987_old_vars['_878480'];?>

            <?php endif;$c_2324db=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_2324db'];$_750987_local_vars=$_750987_old_vars['_2324db'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_1895ab'];$_750987_local_vars=$_750987_old_vars['_1895ab'];?>

                <?php $c_a49247=null;$_750987_old_params['_a49247']=$_750987_local_params;$_750987_old_vars['_a49247']=$_750987_local_vars;$a_a49247=$this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$model','id'=>'$object_id','this_tag'=>'fieldloop'],null,$this);$_a49247=-1;$r_a49247=true;while($r_a49247===true):$r_a49247=($_a49247!==-1)?false:true;echo $this->component('PTTags')->hdlr_fieldloop($a_a49247,$c_a49247,$this,$r_a49247,++$_a49247,'_a49247');ob_start();?>
<?php $c_a49247 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_a49247=false;}if($c_a49247 ):?>

                <?php $c_9c48e4=null;$_750987_old_params['_9c48e4']=$_750987_local_params;$_750987_old_vars['_9c48e4']=$_750987_local_vars;$a_9c48e4=$this->setup_args(['name'=>'_fieldbasename','this_tag'=>'setvarblock'],null,$this);ob_start();?>
field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_9c48e4=ob_get_clean();$c_9c48e4=$this->block_setvarblock($a_9c48e4,$c_9c48e4,$this,$r_9c48e4,1,'_9c48e4');echo($c_9c48e4); $_750987_local_params=$_750987_old_params['_9c48e4'];?>

                <label class="<?php $_750987_old_params['_b9027f']=$_750987_local_params;$_750987_old_vars['_b9027f']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_750987_local_params=$_750987_old_params['_b9027f'];$_750987_local_vars=$_750987_old_vars['_b9027f'];?>
custom-control custom-checkbox" id="label-<?php echo $this->function_var($this->setup_args(['name'=>'_fieldbasename','this_tag'=>'var'],null,$this),$this)?>
">
                  <input<?php $_750987_old_params['_245a61']=$_750987_local_params;$_750987_old_vars['_245a61']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_750987_local_params=$_750987_old_params['_245a61'];$_750987_local_vars=$_750987_old_vars['_245a61'];?>

                  <?php $_750987_old_params['_0add27']=$_750987_local_params;$_750987_old_vars['_0add27']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_750987_local_params=$_750987_old_params['_0add27'];$_750987_local_vars=$_750987_old_vars['_0add27'];?>

                  <?php $_750987_old_params['_356ed1']=$_750987_local_params;$_750987_old_vars['_356ed1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_750987_local_params=$_750987_old_params['_356ed1'];$_750987_local_vars=$_750987_old_vars['_356ed1'];?>
 <?php $_750987_old_params['_9ddbd0']=$_750987_local_params;$_750987_old_vars['_9ddbd0']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_9ddbd0'];$_750987_local_vars=$_750987_old_vars['_9ddbd0'];?>
 type="checkbox" class="custom-control-input disp_option disp_option-cb" id="field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_750987_old_params['_7ae441']=$_750987_local_params;$_750987_old_vars['_7ae441']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_750987_local_params=$_750987_old_params['_7ae441'];$_750987_local_vars=$_750987_old_vars['_7ae441'];?>
"></span>
                  <span class="custom-control-description"> 
                  <?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'field__name','trans'=>'1','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans'),ENT_QUOTES)?>
</span>
                </label>
                <?php endif;$c_a49247=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_a49247'];$_750987_local_vars=$_750987_old_vars['_a49247'];?>

              <?php $_750987_old_params['_e1df95']=$_750987_local_params;$_750987_old_vars['_e1df95']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div>
                  <p class="text-muted hint-block">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can change the display order of fields with drag &amp; drop.','this_tag'=>'trans'],null,$this),$this)?>

                  </p>
                </div>
              <?php endif;$_750987_local_params=$_750987_old_params['_e1df95'];$_750987_local_vars=$_750987_old_vars['_e1df95'];?>

              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="reset-disp-option" class="btn btn-warning" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Reset','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="button" id="disp_options_save" class="btn btn-primary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Save Changes','this_tag'=>'trans'],null,$this),$this)?>
</button>
        </div>
      </form>
      </div>
    </div>
  </div>
<?php endif;$_cff156=ob_get_clean();echo $this->modifier_trim_space($_cff156,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_750987_local_params=$_750987_old_params['_cff156'];$_750987_local_vars=$_750987_old_vars['_cff156'];?>

<script>
<?php $_750987_old_params['_65c8c1']=$_750987_local_params;$_750987_old_vars['_65c8c1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#edit_options_loop').sortable({
    stop: function( evt, ui ) {
        sort_fields();
    }
});
$("#edit_options_loop").ksortable();
<?php endif;$_750987_local_params=$_750987_old_params['_65c8c1'];$_750987_local_vars=$_750987_old_vars['_65c8c1'];?>

function sort_fields(){
    var editor_data = [];
    if(tinymce && tinymce.editors){
        for(var i = tinymce.editors.length -1; i >= 0; i--){
            var ed = tinymce.editors[i];
            editor_data.push({
                target  : ed.targetElm,
                setting : ed.settings
            });
        }
    }
    var field_objects = [];
    var field_names = [];
    $('.disp_option-cb').each(function(){
        var field_name = $(this).prop('name');
        field_name = field_name.replace( /^_d_/, '' );
        field_names.push( field_name );
        field_objects.push( $('#' + field_name + '-wrapper' ) );
        $('#' + field_name + '-wrapper' ).find('');
    });
    $('#_field_sort_order').val(field_names.join(','));
    $('#_start_fields').after(field_objects);
    for(var i = 0; i < editor_data.length; i++){
        tinyMCE.execCommand('mceAddEditor', false, editor_data[i].target);
    }
    reorder_fields();
}
function reorder_fields(){
    var field_objects = [];
    var field_names = [];
    $('.disp_option-cb').each(function(){
        let field_name = $(this).prop('name');
        field_name = field_name.replace( /^_d_/, '' );
        field_names.push( field_name );
        field_objects.push( $('#' + field_name + '-wrapper' ) );
    });
    $('#_field_sort_order').val(field_names.join(','));
    $('#_start_fields').after(field_objects);
    var oldTextFormat = null;
    if ( $('#text_format-select').length ){
        oldTextFormat = $('#text_format-select').val();
    }
    if( tinymce && ( oldTextFormat == null || oldTextFormat == 'richtext' ) ){
        tinymce.EditorManager.remove();
        editorInit();
    }
    $(document).trigger('pcmsx.reorder_fields_done');
}
$("#disp_options_save").click(function(){
    let str = $("#disp_options_form").serialize();
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", str,
    function ( data ) {
        if( data.result == true ) {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'%s\'s display options saved successfully.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
");
        } else {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while saving %s.','params'=>'$options_title','this_tag'=>'trans'],null,$this),$this)?>
", 'danger');
        }
    },
    "json"
    );
});
$('#reset-disp-option').click(function(){
    if (! confirm( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to reset display options?','this_tag'=>'trans'],null,$this),$this)?>
' ) ) {
        return false;
    }
    $('#_reset-disp-oprions').val(1);
    let str = $("#disp_options_form").serialize();
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", str,
    function ( data ) {
        $('#_reset-disp-oprions').val('');
        if( data.result == true ) {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'%s\'s display options reset successfully.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
 <?php echo $this->function_trans($this->setup_args(['phrase'=>'Changes will be reflected the next time you open the screen.','this_tag'=>'trans'],null,$this),$this)?>
", 'warning');
        } else {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while resetting %s.','params'=>'$options_title','this_tag'=>'trans'],null,$this),$this)?>
", 'danger');
        }
    },
    "json"
    );
});
$(".disp_option").change(function(){
    let colname = $(this).prop("id");
    let wrapper_name = "#" + colname + 'wrapper';
    let option_name = "." + colname + 'option';
    let wrapper = $(wrapper_name);
    let option  = $(option_name);
    if($(this).prop("checked")) {
        wrapper.show("fade");
        option.show();
    } else {
        wrapper.hide("fade");
        option.hide();
    }
    let richtext = wrapper.find('textarea.richtext');
    if ( richtext.length && $(this).prop('checked') ) {
<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_750987_old_params['_6116c9']=$_750987_local_params;$_750987_old_vars['_6116c9']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        let editor4 = $('.mce-edit-area iframe');
        if ( editor4.length ) {
            let editor_height = richtext.attr( 'rows' );
            editor_height *= 25;
            editor4.css( 'height', editor_height + 'px' );
        }
<?php else:?>

        if ( richtext.next().attr('role') == 'application' ) {
            let editor_height = richtext.attr( 'rows' );
            editor_height *= 25;
            richtext.next().css( 'height', editor_height + 'px' );
        }
<?php endif;$_750987_local_params=$_750987_old_params['_6116c9'];$_750987_local_vars=$_750987_old_vars['_6116c9'];?>

    }
    updateFieldSelector();
});
</script>
        <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_750987_local_params=$_750987_old_params['_1b05c7'];$_750987_local_vars=$_750987_old_vars['_1b05c7'];?>

    <?php endif;$_750987_local_params=$_750987_old_params['_b819c3'];$_750987_local_vars=$_750987_old_vars['_b819c3'];?>

    <?php $_750987_old_params['_b9e473']=$_750987_local_params;$_750987_old_vars['_b9e473']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php $_750987_old_params['_d2da98']=$_750987_local_params;$_750987_old_vars['_d2da98']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'time_step','setvar'=>'time_step','this_tag'=>'property'],null,$this),$this),$this->setup_args('time_step','setvar',$this),$this,'setvar')?>

      <div class="modal fade" id="filterOptions" tabindex="-1" role="dialog" aria-labelledby="listFiltersTitle" aria-hidden="true"
        style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="listFiltersTitle"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Filters','this_tag'=>'trans'],null,$this),$this)?>
</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <form id="list_filter_form" action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST">
            <input type="hidden" name="__mode" value="view" id="this_mode">
            <input type="hidden" name="_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="_type" value="list">
            <input type="hidden" name="_filter" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="_filter_id" id="_filter_id" value="">
            <input type="hidden" name="_save_filter_name" id="_save_filter_name" value="">
            <input type="hidden" name="_detach_filter" id="_detach_filter" value="">
            <input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">
            <input type="hidden" name="_system_filters_option" value="" id="_system_filters_option">
            <?php $_750987_old_params['_811738']=$_750987_local_params;$_750987_old_vars['_811738']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="single_select" value="1"><?php endif;$_750987_local_params=$_750987_old_params['_811738'];$_750987_local_vars=$_750987_old_vars['_811738'];?>

            <?php $_750987_old_params['_dd6252']=$_750987_local_params;$_750987_old_vars['_dd6252']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._from_scope','ne'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_from_scope" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php endif;$_750987_local_params=$_750987_old_params['_dd6252'];$_750987_local_vars=$_750987_old_vars['_dd6252'];?>

          <?php $_750987_old_params['_aa6c4a']=$_750987_local_params;$_750987_old_vars['_aa6c4a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
          <?php endif;$_750987_local_params=$_750987_old_params['_aa6c4a'];$_750987_local_vars=$_750987_old_vars['_aa6c4a'];?>

          <?php $_750987_old_params['_4c2fe1']=$_750987_local_params;$_750987_old_vars['_4c2fe1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="manage_revision" value="1">
          <?php endif;$_750987_local_params=$_750987_old_params['_4c2fe1'];$_750987_local_vars=$_750987_old_vars['_4c2fe1'];?>

          <?php $_750987_old_params['_492120']=$_750987_local_params;$_750987_old_vars['_492120']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="dialog_view" value="1">
            <?php $_750987_old_params['_619db6']=$_750987_local_params;$_750987_old_vars['_619db6']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_750987_local_params=$_750987_old_params['_619db6'];$_750987_local_vars=$_750987_old_vars['_619db6'];?>

          <?php $_750987_old_params['_8e06e5']=$_750987_local_params;$_750987_old_vars['_8e06e5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="select_system_filters" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="_system_filters_option" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="insert" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="insert_editor" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert_editor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="_filter" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._filter','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php endif;$_750987_local_params=$_750987_old_params['_8e06e5'];$_750987_local_vars=$_750987_old_vars['_8e06e5'];?>

            <?php $_750987_old_params['_279872']=$_750987_local_params;$_750987_old_vars['_279872']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
              <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_750987_local_params=$_750987_old_params['_279872'];$_750987_local_vars=$_750987_old_vars['_279872'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_492120'];$_750987_local_vars=$_750987_old_vars['_492120'];?>

          <?php $_750987_old_params['_6b575d']=$_750987_local_params;$_750987_old_vars['_6b575d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_select" value="1">
          <?php endif;$_750987_local_params=$_750987_old_params['_6b575d'];$_750987_local_vars=$_750987_old_vars['_6b575d'];?>

          <?php $_750987_old_params['_b11fc4']=$_750987_local_params;$_750987_old_vars['_b11fc4']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="selected_ids" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="from_obj" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.from_obj','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php $_750987_old_params['_4e00b3']=$_750987_local_params;$_750987_old_vars['_4e00b3']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="select_add" value="1">
          <?php endif;$_750987_local_params=$_750987_old_params['_4e00b3'];$_750987_local_vars=$_750987_old_vars['_4e00b3'];?>

          <?php $_750987_old_params['_569275']=$_750987_local_params;$_750987_old_vars['_569275']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ids_only','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ids_only" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ids_only','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php endif;$_750987_local_params=$_750987_old_params['_569275'];$_750987_local_vars=$_750987_old_vars['_569275'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_b11fc4'];$_750987_local_vars=$_750987_old_vars['_b11fc4'];?>

            <div class="modal-body">
              <div class="container-fluid">
                <?php $_750987_old_params['_c47d27']=$_750987_local_params;$_750987_old_vars['_c47d27']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <?php $c_0ac7a2=null;$_750987_old_params['_0ac7a2']=$_750987_local_params;$_750987_old_vars['_0ac7a2']=$_750987_local_vars;$a_0ac7a2=$this->setup_args(['name'=>'system_filters','this_tag'=>'loop'],null,$this);$_0ac7a2=-1;$r_0ac7a2=true;while($r_0ac7a2===true):$r_0ac7a2=($_0ac7a2!==-1)?false:true;echo $this->block_loop($a_0ac7a2,$c_0ac7a2,$this,$r_0ac7a2,++$_0ac7a2,'_0ac7a2');ob_start();?>
<?php $c_0ac7a2 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_0ac7a2=false;}if($c_0ac7a2 ):?>

                      <?php $_750987_old_params['_9a3887']=$_750987_local_params;$_750987_old_vars['_9a3887']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select_system_filters" id="select_system_filters">
                        <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php endif;$_750987_local_params=$_750987_old_params['_9a3887'];$_750987_local_vars=$_750987_old_vars['_9a3887'];?>

                        <option <?php $_750987_old_params['_1a4d82']=$_750987_local_params;$_750987_old_vars['_1a4d82']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'input','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
data-input="1" data-hint="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'hint','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php endif;$_750987_local_params=$_750987_old_params['_1a4d82'];$_750987_local_vars=$_750987_old_vars['_1a4d82'];?>
data-option="<?php echo $this->function_var($this->setup_args(['name'=>'option','this_tag'=>'var'],null,$this),$this)?>
" <?php $_750987_old_params['_2c6c96']=$_750987_local_params;$_750987_old_vars['_2c6c96']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_system_filter','eq'=>'$name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_750987_local_params=$_750987_old_params['_2c6c96'];$_750987_local_vars=$_750987_old_vars['_2c6c96'];?>
 value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php $_750987_old_params['_ce189e']=$_750987_local_params;$_750987_old_vars['_ce189e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        </select>
                      <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="system_filter-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                      <?php endif;$_750987_local_params=$_750987_old_params['_ce189e'];$_750987_local_vars=$_750987_old_vars['_ce189e'];?>

                    <?php endif;$c_0ac7a2=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_0ac7a2'];$_750987_local_vars=$_750987_old_vars['_0ac7a2'];?>

                  </div>
                </div>
                <?php endif;$_750987_local_params=$_750987_old_params['_c47d27'];$_750987_local_vars=$_750987_old_vars['_c47d27'];?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Your Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select-user_filters" id="select-user_filters">
                      <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php $c_8b4eb2=null;$_750987_old_params['_8b4eb2']=$_750987_local_params;$_750987_old_vars['_8b4eb2']=$_750987_local_vars;$a_8b4eb2=$this->setup_args(['model'=>'option','kind'=>'list_filter','key'=>'$model','user_id'=>'$user_id','workspace_id'=>'$workspace_id','this_tag'=>'objectloop'],null,$this);$_8b4eb2=-1;$r_8b4eb2=true;while($r_8b4eb2===true):$r_8b4eb2=($_8b4eb2!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_8b4eb2,$c_8b4eb2,$this,$r_8b4eb2,++$_8b4eb2,'_8b4eb2');ob_start();?>
<?php $c_8b4eb2 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_8b4eb2=false;}if($c_8b4eb2 ):?>

                      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_750987_old_params['_2555ba']=$_750987_local_params;$_750987_old_vars['_2555ba']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_filter_id','eq'=>'$id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_750987_local_params=$_750987_old_params['_2555ba'];$_750987_local_vars=$_750987_old_vars['_2555ba'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'value','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php endif;$c_8b4eb2=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_8b4eb2'];$_750987_local_vars=$_750987_old_vars['_8b4eb2'];?>

                      <option value="add_new_filter"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Add New Filter','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    </select>
                    <?php $_750987_old_params['_cb4217']=$_750987_local_params;$_750987_old_vars['_cb4217']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="filter-select-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <button type="button" class="delete-filter-elem hidden delete-bun-sm btn btn-secondary btn-sm filter-selecter-ctrl" id="filter-select-delete-button" class="close" data-dismiss="modal">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Delete','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    </button>
                    <?php endif;$_750987_local_params=$_750987_old_params['_cb4217'];$_750987_local_vars=$_750987_old_vars['_cb4217'];?>

                  </div>
                </div>
                <div class="row form-group new-filter-elem hidden">
                  <div class="col-md-3" style="float:left;"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" name="filters-selector" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" id="filters-selector">
                    <?php $c_42dd83=null;$_750987_old_params['_42dd83']=$_750987_local_params;$_750987_old_vars['_42dd83']=$_750987_local_vars;$a_42dd83=$this->setup_args(['name'=>'filter_options','this_tag'=>'loop'],null,$this);$_42dd83=-1;$r_42dd83=true;while($r_42dd83===true):$r_42dd83=($_42dd83!==-1)?false:true;echo $this->block_loop($a_42dd83,$c_42dd83,$this,$r_42dd83,++$_42dd83,'_42dd83');ob_start();?>
<?php $c_42dd83 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_42dd83=false;}if($c_42dd83 ):?>

                    <?php $_750987_old_params['_f94d46']=$_750987_local_params;$_750987_old_vars['_f94d46']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <option><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    <?php endif;$_750987_local_params=$_750987_old_params['_f94d46'];$_750987_local_vars=$_750987_old_vars['_f94d46'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" class="coltype_<?php $_750987_old_params['_2b3cd5']=$_750987_local_params;$_750987_old_vars['_2b3cd5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'created_by','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
reference<?php else:?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_2b3cd5'];$_750987_local_vars=$_750987_old_vars['_2b3cd5'];?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php endif;$c_42dd83=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_42dd83'];$_750987_local_vars=$_750987_old_vars['_42dd83'];?>

                    </select>
                   <button type="button" class="btn btn-sm btn-secondary filter-selecter-ctrl-apply" id="filter-add-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Add','this_tag'=>'trans'],null,$this),$this)?>
</button>
                  </div>
                </div>
                <div class="row form-group new-filter-elem">
                  <div class="col-md-12">
                    <div class="card hidden" id="filter-parant-block">
                      <ul class="list-group list-group-flush" id="filters-list">
                        <li class="list-group-item hidden" id="selector-tmpl-int">
                          <div class="form-inline">
                            <span class="selector_col"></span> 
                            &nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>' is ','this_tag'=>'trans'],null,$this),$this)?>

                              <input type="number" class="short-padding form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <select name="" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-sm">
                              <option value="eq"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="lt"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Less than','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="gt"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Grater than','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="ne"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Not Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="ge"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Greater Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="le"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Less Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                            </select>
                            <button type="button" class="btn btn-secondary btn-sm close-sm detach-filter detach-filter-btn" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </li>
                        <li class="list-group-item hidden" id="selector-tmpl-text">
                          <div class="form-inline">
                            <span class="selector_col"></span> 
                            &nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>' is ','this_tag'=>'trans'],null,$this),$this)?>

                              <input type="text" class="short-padding form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <select name="" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-sm">
                              <option value="ct"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Contains','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="nc"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Not Contains','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="eq"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="ne"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Not Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="bw"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Begin with','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="ew"><?php echo $this->function_trans($this->setup_args(['phrase'=>'End with','this_tag'=>'trans'],null,$this),$this)?>
</option>
                            </select>
                            <button type="button" class="btn btn-secondary btn-sm close-sm detach-filter detach-filter-btn" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </li>
                        <li class="list-group-item hidden" id="selector-tmpl-date">
                          <div class="form-inline">
                            <span class="selector_col"></span> 
                            &nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>' is ','this_tag'=>'trans'],null,$this),$this)?>

                              <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'published_on_default','setvar'=>'published_on_default','this_tag'=>'property'],null,$this),$this),$this->setup_args('published_on_default','setvar',$this),$this,'setvar')?>

                              <input type="datetime-local" step="<?php $_750987_old_params['_d7020a']=$_750987_local_params;$_750987_old_vars['_d7020a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'time_step','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'time_step','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
1<?php endif;$_750987_local_params=$_750987_old_params['_d7020a'];$_750987_local_vars=$_750987_old_vars['_d7020a'];?>
" class="form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="" value="<?php $_750987_old_params['_d92e78']=$_750987_local_params;$_750987_old_vars['_d92e78']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'published_on_default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_format_ts($this->function_date($this->setup_args(['format'=>'$published_on_default','format_ts'=>'Y-m-d\\TH:i:s','this_tag'=>'date'],null,$this),$this),$this->setup_args('Y-m-d\\\\TH:i:s','format_ts',$this),$this,'format_ts')?>
<?php endif;$_750987_local_params=$_750987_old_params['_d92e78'];$_750987_local_vars=$_750987_old_vars['_d92e78'];?>
">
                            <select name="" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-sm">
                              <option value="gt"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Newer than','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="lt"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Older than','this_tag'=>'trans'],null,$this),$this)?>
</option>
                            </select>
                            <button type="button" class="btn btn-secondary btn-sm close-sm detach-filter detach-filter-btn" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </li>
                        <li class="list-group-item hidden" id="selector-tmpl-status">
                          <div class="form-inline">
                            <span class="selector_col"></span> 
                            &nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>' is ','this_tag'=>'trans'],null,$this),$this)?>

                            <?php $_750987_old_params['_6c7afb']=$_750987_local_params;$_750987_old_vars['_6c7afb']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'status_options','split'=>',','setvar'=>'status_label','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                            <?php else:?>

                              <?php $_750987_old_params['_096682']=$_750987_local_params;$_750987_old_vars['_096682']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Draft,Review,Approval Pending,Reserved,Publish,Ended','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php else:?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Disable,Enable','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php endif;$_750987_local_params=$_750987_old_params['_096682'];$_750987_local_vars=$_750987_old_vars['_096682'];?>

                            <?php endif;$_750987_local_params=$_750987_old_params['_6c7afb'];$_750987_local_vars=$_750987_old_vars['_6c7afb'];?>

                            <select class="form-control form-control-sm custom-select short filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <?php $_750987_old_params['_93f5f1']=$_750987_local_params;$_750987_old_vars['_93f5f1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                            <?php $c_e13deb=null;$_750987_old_params['_e13deb']=$_750987_local_params;$_750987_old_vars['_e13deb']=$_750987_local_vars;$a_e13deb=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_e13deb=-1;$r_e13deb=true;while($r_e13deb===true):$r_e13deb=($_e13deb!==-1)?false:true;echo $this->block_loop($a_e13deb,$c_e13deb,$this,$r_e13deb,++$_e13deb,'_e13deb');ob_start();?>
<?php $c_e13deb = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_e13deb=false;}if($c_e13deb ):?>

                              <?php $_750987_old_params['_73ea1b']=$_750987_local_params;$_750987_old_vars['_73ea1b']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__index__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php $_750987_old_params['_0bc7d8']=$_750987_local_params;$_750987_old_vars['_0bc7d8']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__index__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_750987_local_params=$_750987_old_params['_0bc7d8'];$_750987_local_vars=$_750987_old_vars['_0bc7d8'];?>

                              <?php endif;$_750987_local_params=$_750987_old_params['_73ea1b'];$_750987_local_vars=$_750987_old_vars['_73ea1b'];?>

                            <?php endif;$c_e13deb=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_e13deb'];$_750987_local_vars=$_750987_old_vars['_e13deb'];?>

                            <?php else:?>

                            <?php $c_571539=null;$_750987_old_params['_571539']=$_750987_local_params;$_750987_old_vars['_571539']=$_750987_local_vars;$a_571539=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_571539=-1;$r_571539=true;while($r_571539===true):$r_571539=($_571539!==-1)?false:true;echo $this->block_loop($a_571539,$c_571539,$this,$r_571539,++$_571539,'_571539');ob_start();?>
<?php $c_571539 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_571539=false;}if($c_571539 ):?>

                              <?php $_750987_old_params['_7b75e9']=$_750987_local_params;$_750987_old_vars['_7b75e9']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_750987_local_params=$_750987_old_params['_7b75e9'];$_750987_local_vars=$_750987_old_vars['_7b75e9'];?>

                            <?php endif;$c_571539=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_571539'];$_750987_local_vars=$_750987_old_vars['_571539'];?>

                            <?php endif;$_750987_local_params=$_750987_old_params['_93f5f1'];$_750987_local_vars=$_750987_old_vars['_93f5f1'];?>

                            </select>
                            <input type="hidden" name="" value="eq">
                            <button type="button" class="btn btn-secondary btn-sm close-sm detach-filter detach-filter-btn" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-secondary delete-filter-elem hidden" id="detach-filter-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach Filter','this_tag'=>'trans'],null,$this),$this)?>
</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
              <button type="submit" class="btn btn-primary new-filter-elem hidden" id="filter-apply"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
              <button type="submit" class="btn btn-secondary new-filter-elem hidden" id="filter-save-apply"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Save and Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
<script>
$('#system_filter-apply-button').click(function(){
    if (! $('[name=select_system_filters] option:selected').val() ) {
        if ( filter_itemCount ) {
            return $('#filter-apply').trigger('click');
        }
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    let input = $('[name=select_system_filters] option:selected').data( 'input' );
    let hint = $('[name=select_system_filters] option:selected').data( 'hint' );
    let filter_option = $('[name=select_system_filters] option:selected').attr('data-option');
    if ( input ) {
        if (! hint ) {
            hint = '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Please enter the value.','this_tag'=>'trans'],null,$this),$this)?>
';
        }
        filter_option = prompt( hint, filter_option );
        if (! filter_option ) {
            return false;
        }
    }
    $('#select-user_filters').val('');
    $('#_system_filters_option').val( filter_option );
});
$('#filter-select-delete-button').click(function(){
    var filter_id = $('#select-user_filters').val();
    if ( filter_id == 'add_new_filter' || filter_id == '' ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    if(!confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to remove selected filter?','this_tag'=>'trans'],null,$this),$this)?>
')){
        return false;
    }
    $('#_filter_id').val( filter_id );
    $('#this_mode').val( 'delete_filter' );
    $('[name=select-user_filters] option:selected').remove();
    var str = $("#list_filter_form").serialize();
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", str,
    function ( data ) {
        if( data.result == true ) {
            $("#header-alert-message").html('<?php echo $this->function_trans($this->setup_args(['phrase'=>'The Filter has successfully deleted.','this_tag'=>'trans'],null,$this),$this)?>
');
            $("#header-alert").removeClass("alert-danger");
            $("#header-alert").addClass("alert-success");
        } else {
            $("#header-alert-message").html('<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while removing the Filter.','this_tag'=>'trans'],null,$this),$this)?>
');
            $("#header-alert").removeClass("alert-success");
            $("#header-alert").addClass("alert-danger");
        }
        $("#header-alert").show();
        setTimeout(focus_header_dialog, 500);
        $(".current-filter").hide();
        $('#this_mode').val( 'list' );
        $('#_filter_id').val('');
        $('#filter-select-delete-button').hide();
        var loc = $(location).attr('href');
        if ( loc.indexOf('?') == -1 ) {
            loc = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&_type=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
            <?php $_750987_old_params['_7adeef']=$_750987_local_params;$_750987_old_vars['_7adeef']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            loc += '&workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
            <?php endif;$_750987_local_params=$_750987_old_params['_7adeef'];$_750987_local_vars=$_750987_old_vars['_7adeef'];?>

            loc += '&_detach_filter=1';
            location.href = loc;
        } else {
            loc += '&_detach_filter=1';
            location.href = loc;
        }
    },
    "json"
    );
});
function focus_header_dialog () {
    $("#header-alert").focus();
}
$('#filter-select-apply-button').click(function(){
    var filter_id = $('#select-user_filters').val();
    if ( filter_id == 'add_new_filter' || filter_id == '' ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    $('#select_system_filters').val('');
    $('#_filter_id').val( filter_id );
    return true;
});
$('#select-user_filters').change(function(){
    if ($(this).val() == 'add_new_filter' ) {
        $('.new-filter-elem').show();
        $('.delete-filter-elem').hide();
    } else {
        $('.new-filter-elem').hide();
        if ( $(this).val() ) {
            $('.delete-filter-elem').show();
        }
    }
});
var curr_user_filter = $('#select-user_filters').val();
if ( curr_user_filter != 'add_new_filter' && curr_user_filter != '' ) {
    $('.delete-filter-elem').show();
}
var filter_itemCount = 0;
$('#filter-apply').click(function(){
    if (! filter_itemCount ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
});
$('#filter-save-apply').click(function(){
    if (! filter_itemCount ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    var filter_name = prompt('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Please enter the Name of this Filter.','this_tag'=>'trans'],null,$this),$this)?>
', '');
    if (! filter_name ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'The Filter Name is required.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    $('#_save_filter_name').val(filter_name);
});
$('#detach-filter-button').click(function(){
    $('#filters-list').remove();
    $('#_detach_filter').val(1);
});
$('#filter-add-button').click(function(){
    var selected_col = $('#filters-selector').val();
    var sel_class = $('[name=filters-selector] option:selected').attr('class');
    var sel_label = $('[name=filters-selector] option:selected').text();
    sel_class = sel_class.replace( 'coltype_', '' );
    var filter_tmpl = $('#selector-tmpl-text');
    if ( selected_col == 'status' ) {
        filter_tmpl = $('#selector-tmpl-status');
    } else if ( sel_class == 'int' || sel_class == 'tinyint' || sel_class == 'double' || sel_class.indexOf('decimal') == 0 ) {
        filter_tmpl = $('#selector-tmpl-int');
    } else if ( sel_class == 'datetime' ) {
        filter_tmpl = $('#selector-tmpl-date');
    }
    var addSelecter = filter_tmpl.clone( true ).appendTo('#filters-list');
    addSelecter.removeClass('hidden');
    addSelecter.removeAttr('id');
    addSelecter.children('div').children('span').html(sel_label);
    if ( selected_col == 'status' ) {
        addSelecter.children('div').children('input').attr('name', '_filter_cond_' + selected_col + '[]');
        addSelecter.children('div').children('select').attr('name', '_filter_value_' + selected_col + '[]');
    } else {
        addSelecter.children('div').children('input').attr('name', '_filter_value_' + selected_col + '[]');
        addSelecter.children('div').children('select').attr('name', '_filter_cond_' + selected_col + '[]');
    }
    $('#filter-parant-block').show();
    $('#filter-parant-block').css('border','none');
    addSelecter.show();
    filter_itemCount++;
});
$('.detach-filter').click(function(){
    if(!confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to remove this filter condition?','this_tag'=>'trans'],null,$this),$this)?>
')){
        return false;
    }
    $(this).parent().parent().remove();
    filter_itemCount--;
});
</script>
    <?php endif;$_750987_local_params=$_750987_old_params['_d2da98'];$_750987_local_vars=$_750987_old_vars['_d2da98'];?>

    <?php $_750987_old_params['_8e5768']=$_750987_local_params;$_750987_old_vars['_8e5768']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_65fb36']=$_750987_local_params;$_750987_old_vars['_65fb36']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="modal fade" id="startUpload" tabindex="-1" role="dialog" aria-labelledby="startUploadTitle" aria-hidden="true"
        style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="startUploadTitle"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload','this_tag'=>'trans'],null,$this),$this)?>
</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="alert alert-success hidden" id="clear-history-alert" role="alert" tabindex="0">
              <button onclick="$('#clear-history-alert').hide();" type="button" class="close" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
                <span aria-hidden="true">&times;</span>
              </button>
              <?php echo $this->function_trans($this->setup_args(['phrase'=>'The upload path history has been cleared successfully.','this_tag'=>'trans'],null,$this),$this)?>

            </div>
              <div class="container-fluid" id="drop-zone">
                <form>
                <span id="file-chooser" class="btn btn-success fileinput-button">
                    <span><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select File...','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="files[]" multiple
                        onfocus="$('#file-chooser').css('border','2px solid green');"
                        onblur="$('#file-chooser').css('border','none');">
                </span>
              <?php $_750987_old_params['_ce7a11']=$_750987_local_params;$_750987_old_vars['_ce7a11']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <label class="custom-control custom-checkbox" style="margin-top: 10px;margin-left: 7px">
                  <input type="checkbox" class="custom-control-input"
                    id="asset_overwrite" name="overwrite" value="0">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Overwrite files with the same path','this_tag'=>'trans'],null,$this),$this)?>

                </label>
                <script>
                $('#asset_overwrite').change(function(){
                    if ($(this).prop('checked')) {
                        $(this).val('1');
                    } else {
                        $(this).val('0');
                    }
                });
                </script>
              <?php endif;$_750987_local_params=$_750987_old_params['_ce7a11'];$_750987_local_vars=$_750987_old_vars['_ce7a11'];?>

                <div class="form-inline" style="margin: 10px 7px">
                  <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload Path','this_tag'=>'trans'],null,$this),$this)?>

                  <?php $_750987_old_params['_df6738']=$_750987_local_params;$_750987_old_vars['_df6738']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model_out_path','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->modifier_add_slash(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model_out_path','escape'=>'','add_slash'=>'','setvar'=>'model_out_path','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('','add_slash',$this),$this,'add_slash'),$this->setup_args('model_out_path','setvar',$this),$this,'setvar')?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'extra_path','value'=>'$model_out_path','append'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_750987_local_params=$_750987_old_params['_df6738'];$_750987_local_vars=$_750987_old_vars['_df6738'];?>

                  <input id="extra_path" type="text" style="width:200px;" class="form-control" name="extra_path" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'extra_path','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                  <?php echo $this->function_setvar($this->setup_args(['name'=>'upload_paths','value'=>'$extra_path','function'=>'unshift','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php echo $this->modifier_setvar($this->modifier_array_unique($this->function_var($this->setup_args(['name'=>'upload_paths','array_unique'=>'','setvar'=>'upload_paths','this_tag'=>'var'],null,$this),$this),$this->setup_args('','array_unique',$this),$this,'array_unique'),$this->setup_args('upload_paths','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_count($this->setup_args(['name'=>'$upload_paths','setvar'=>'path_cnt','this_tag'=>'count'],null,$this),$this),$this->setup_args('path_cnt','setvar',$this),$this,'setvar')?>

                <?php $_750987_old_params['_fcd010']=$_750987_local_params;$_750987_old_vars['_fcd010']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'path_cnt','gt'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <div id="upload_paths-box">
                  <?php $c_2510ae=null;$_750987_old_params['_2510ae']=$_750987_local_params;$_750987_old_vars['_2510ae']=$_750987_local_vars;$a_2510ae=$this->setup_args(['name'=>'upload_paths','this_tag'=>'loop'],null,$this);$_2510ae=-1;$r_2510ae=true;while($r_2510ae===true):$r_2510ae=($_2510ae!==-1)?false:true;echo $this->block_loop($a_2510ae,$c_2510ae,$this,$r_2510ae,++$_2510ae,'_2510ae');ob_start();?>
<?php $c_2510ae = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_2510ae=false;}if($c_2510ae ):?>

                    <?php $_750987_old_params['_6e448f']=$_750987_local_params;$_750987_old_vars['_6e448f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button class="btn ml-3 btn-secondary" id="toggle-upload_path"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <span class="hidden" id="upload_path-wrapper">
                    <select class="form-control custom-select short" name="upload_path" id="upload_path"><?php endif;$_750987_local_params=$_750987_old_params['_6e448f'];$_750987_local_vars=$_750987_old_vars['_6e448f'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_750987_old_params['_744519']=$_750987_local_params;$_750987_old_vars['_744519']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'extra_path','eq'=>'$__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_750987_local_params=$_750987_old_params['_744519'];$_750987_local_vars=$_750987_old_vars['_744519'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php $_750987_old_params['_6458c9']=$_750987_local_params;$_750987_old_vars['_6458c9']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</select>
                    <button class="btn ml-0 btn-secondary btn-sm" id="clear-upload_path">  <i class="fa fa-trash" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Clear','this_tag'=>'trans'],null,$this),$this)?>
</span></button>
                    </span>
                  </div>
                    <?php endif;$_750987_local_params=$_750987_old_params['_6458c9'];$_750987_local_vars=$_750987_old_vars['_6458c9'];?>

                  <?php endif;$c_2510ae=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_2510ae'];$_750987_local_vars=$_750987_old_vars['_2510ae'];?>

                <?php endif;$_750987_local_params=$_750987_old_params['_fcd010'];$_750987_local_vars=$_750987_old_vars['_fcd010'];?>

                </div>
                <!-- The container for the uploaded files -->
                <div id="files" class="files"></div>
                </form>
              </div>
              <!-- The global progress bar -->
              <div id="progress" class="progress">
                <div class="progress-bar progress-bar-success"></div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary upload-cancel-button" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
              <button type="submit" class="btn btn-primary new-filter-elem hidden" id="filter-apply"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Next','this_tag'=>'trans'],null,$this),$this)?>
</button>
            </div>
          </div>
        </div>
      </div>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="assets/js/vendor/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="assets/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'query_string','regex_replace'=>'\'/&offset=[0-9]{1,}/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&offset=[0-9]{1,}/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&deleted=1/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&deleted=1/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php $_750987_old_params['_900cf8']=$_750987_local_params;$_750987_old_vars['_900cf8']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&filter_params=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&filter_params=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&magic_token=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&magic_token=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&query=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&query=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php endif;$_750987_local_params=$_750987_old_params['_900cf8'];$_750987_local_vars=$_750987_old_vars['_900cf8'];?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&{0,1}does_act=[0-9]{1,}/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&{0,1}does_act=[0-9]{1,}/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&{0,1}apply_actions=[0-9]{1,}/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&{0,1}apply_actions=[0-9]{1,}/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&{0,1}background_proccess_running=[0-9]{1,}/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&{0,1}background_proccess_running=[0-9]{1,}/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&{0,1}html_background_proccess=1/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&{0,1}html_background_proccess=1/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&+/\',\'&\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&+/\\\',\\\'&\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/^&+/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/^&+/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<script src="assets/js/jquery.fileupload.js"></script>
<script>
$('#upload_path').change(function(){
    $('#extra_path').val( $(this).val() );
});
$('#clear-upload_path').click(function(){
    if ( !confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to delete the upload path history?','this_tag'=>'trans'],null,$this),$this)?>
') ) {
        return false;
    }
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", {
        '__mode' : 'clear_extra_paths',
        'workspace_id' : '<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
',
        'magic_token': '<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
'
    },
    function ( data ) {
        if( data.result == true ) {
            $('#upload_paths-box').hide( 300 );
            $('#clear-history-alert').show();
            $('#clear-history-alert').focus();
        } else {
            alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while clearing upload path history.','this_tag'=>'trans'],null,$this),$this)?>
");
        }
    },
    "json"
    );
    return false;
});
$('#toggle-upload_path').click(function(){
    $('#upload_path-wrapper').toggle();
    if ( $(this).html() == '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
' ) {
        $(this).html( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Hide','this_tag'=>'trans'],null,$this),$this)?>
' );
        $('#upload_path-wrapper').css('display', 'inline');
    } else {
        $(this).html( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
' );
    }
    return false;
});
var this_url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?<?php $_750987_old_params['_f039b3']=$_750987_local_params;$_750987_old_vars['_f039b3']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&<?php endif;$_750987_local_params=$_750987_old_params['_f039b3'];$_750987_local_vars=$_750987_old_vars['_f039b3'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'_query_string','this_tag'=>'var'],null,$this),$this)?>
&sort=id&direction=desc';
var selected_ids = [];
var upload_count = 0;
var receive_count = 0;
var DropZone = document.getElementById('drop-zone');
DropZone.addEventListener('dragover', function (event) {
    $('#drop-zone').css('background-color','#ddf');
});
DropZone.addEventListener('dragleave', function (event) {
    $('#drop-zone').css('background-color','#fff');
});
$('#drop-zone').css('border','3px dashed <?php $_750987_old_params['_42e1e5']=$_750987_local_params;$_750987_old_vars['_42e1e5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
#ccc<?php endif;$_750987_local_params=$_750987_old_params['_42e1e5'];$_750987_local_vars=$_750987_old_vars['_42e1e5'];?>
');
$('#drop-zone').css('margin','1px');
$('#drop-zone').css('padding','8px');
$(function () {
    'use strict';
    var url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=upload_multi&magic_token=<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&model=asset&name=file<?php $_750987_old_params['_6a77f3']=$_750987_local_params;$_750987_old_vars['_6a77f3']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','eq'=>'filter_class_image','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&select_system_filters=filter_class_image<?php endif;$_750987_local_params=$_750987_old_params['_6a77f3'];$_750987_local_vars=$_750987_old_vars['_6a77f3'];?>
';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        dropZone: $("#drop-zone"),
        // formData: {extra_path: $('#extra_path').val()},
        add: function (e, data) {
            data.formData = {extra_path: $('#extra_path').val()<?php $_750987_old_params['_f33e7e']=$_750987_local_params;$_750987_old_vars['_f33e7e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
, overwrite: $('#asset_overwrite').val()<?php endif;$_750987_local_params=$_750987_old_params['_f33e7e'];$_750987_local_vars=$_750987_old_vars['_f33e7e'];?>
};
            data.submit();
            upload_count++;
            $("#drop-zone").hide( 'slow' );
            $('.upload-cancel-button').hide( 'slow' );
        },
        done: function (e, data) {
            $('#clear-history-alert').hide();
            if (!data.result.files) {
                var error = data.result.message;
                $('#progress .progress-bar').css(
                    'width', 0
                );
                alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while uploading.','this_tag'=>'trans'],null,$this),$this)?>
"+' (' + error + ')');
                upload_count = 0;
                receive_count = 0;
                selected_ids = [];
                return;
            }
            $("input[name='id[]']").each(function(){
                if ( $(this).prop('checked') ) {
                    if( $.inArray($(this).val(), selected_ids ) == -1 ) {
                        selected_ids.push($(this).val());
                    }
                }
            });
            $.each(data.result.files, function (index, file) {
                // $('<p/>').text(file.name).appendTo('#files');
                var input_cb = $('#select_ids_tmpl');
                var new_input = input_cb.clone( true ).appendTo('#list-select-form');
                new_input.removeAttr('id');
                new_input.attr('name','id[]');
                new_input.val(file.asset_id);
                selected_ids.push(file.asset_id);
                receive_count++;
                //if ( upload_count == receive_count ) {
                setTimeout(uploaded_hdlr, 1000);
                //}
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
            $('#drop-zone').css('background-color','#fff');
            $("#drop-zone").show( 'slow' );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
function uploaded_hdlr () {
    this_url += '&selected_ids=' + selected_ids.join(',');
    <?php $_750987_old_params['_fded84']=$_750987_local_params;$_750987_old_vars['_fded84']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    $("#__mode").prop('value', 'insert_asset');
    $("#list-select-form").submit();
    <?php else:?>

    submit_params_to_post( this_url );
    <?php endif;$_750987_local_params=$_750987_old_params['_fded84'];$_750987_local_vars=$_750987_old_vars['_fded84'];?>

}
</script>
      <?php endif;$_750987_local_params=$_750987_old_params['_65fb36'];$_750987_local_vars=$_750987_old_vars['_65fb36'];?>

    <?php endif;$_750987_local_params=$_750987_old_params['_8e5768'];$_750987_local_vars=$_750987_old_vars['_8e5768'];?>

    <?php endif;$_750987_local_params=$_750987_old_params['_b9e473'];$_750987_local_vars=$_750987_old_vars['_b9e473'];?>

  <?php endif;$_750987_local_params=$_750987_old_params['_40699c'];$_750987_local_vars=$_750987_old_vars['_40699c'];?>

      <div class="row">
        <main class="pt-3 full <?php $_750987_old_params['_28ae56']=$_750987_local_params;$_750987_old_vars['_28ae56']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'list_screen','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 col-md-12<?php endif;$_750987_local_params=$_750987_old_params['_28ae56'];$_750987_local_vars=$_750987_old_vars['_28ae56'];?>
">
        <?php $_750987_old_params['_9113e1']=$_750987_local_params;$_750987_old_vars['_9113e1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'list_screen','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<div class="col-md-12 full"><?php endif;$_750987_local_params=$_750987_old_params['_9113e1'];$_750987_local_vars=$_750987_old_vars['_9113e1'];?>

          <h1 id="page-title" class="<?php $_750987_old_params['_eb90f9']=$_750987_local_params;$_750987_old_vars['_eb90f9']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'full_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
page-title-full<?php endif;$_750987_local_params=$_750987_old_params['_eb90f9'];$_750987_local_vars=$_750987_old_vars['_eb90f9'];?>
<?php $_750987_old_params['_0f8696']=$_750987_local_params;$_750987_old_vars['_0f8696']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 title-with-opt<?php endif;$_750987_local_params=$_750987_old_params['_0f8696'];$_750987_local_vars=$_750987_old_vars['_0f8696'];?>
"><span class="title"><?php echo $this->function_var($this->setup_args(['name'=>'page_title','this_tag'=>'var'],null,$this),$this)?>
</span>
          <?php echo $this->function_var($this->setup_args(['name'=>'add_heading','this_tag'=>'var'],null,$this),$this)?>

    <?php $_750987_old_params['_f44448']=$_750987_local_params;$_750987_old_vars['_f44448']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_5ef354']=$_750987_local_params;$_750987_old_vars['_5ef354']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      
      <?php echo $this->function_setvar($this->setup_args(['name'=>'_hide_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'select_role','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_750987_local_params=$_750987_old_params['_5ef354'];$_750987_local_vars=$_750987_old_vars['_5ef354'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_f44448'];$_750987_local_vars=$_750987_old_vars['_f44448'];?>

    <?php $_750987_old_params['_de2c10']=$_750987_local_params;$_750987_old_vars['_de2c10']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'select_role','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_6a525f']=$_750987_local_params;$_750987_old_vars['_6a525f']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_0b4e6d']=$_750987_local_params;$_750987_old_vars['_0b4e6d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_750987_old_params['_8fb581']=$_750987_local_params;$_750987_old_vars['_8fb581']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_param','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_750987_old_params['_1432b5']=$_750987_local_params;$_750987_old_vars['_1432b5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $c_c393ad=null;$_750987_old_params['_c393ad']=$_750987_local_params;$_750987_old_vars['_c393ad']=$_750987_local_vars;$a_c393ad=$this->setup_args(['name'=>'workspace_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_c393ad=ob_get_clean();$c_c393ad=$this->block_setvarblock($a_c393ad,$c_c393ad,$this,$r_c393ad,1,'_c393ad');echo($c_c393ad); $_750987_local_params=$_750987_old_params['_c393ad'];?>

        <?php endif;$_750987_local_params=$_750987_old_params['_1432b5'];$_750987_local_vars=$_750987_old_vars['_1432b5'];?>

          <?php $_750987_old_params['_bbae04']=$_750987_local_params;$_750987_old_vars['_bbae04']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_fb120a']=$_750987_local_params;$_750987_old_vars['_fb120a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_750987_old_params['_85011a']=$_750987_local_params;$_750987_old_vars['_85011a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_750987_old_params['_2fa0b3']=$_750987_local_params;$_750987_old_vars['_2fa0b3']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._start_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'_hide_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

              <?php endif;$_750987_local_params=$_750987_old_params['_2fa0b3'];$_750987_local_vars=$_750987_old_vars['_2fa0b3'];?>

            <?php endif;$_750987_local_params=$_750987_old_params['_85011a'];$_750987_local_vars=$_750987_old_vars['_85011a'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_fb120a'];$_750987_local_vars=$_750987_old_vars['_fb120a'];?>

          <?php $_750987_old_params['_0e8eeb']=$_750987_local_params;$_750987_old_vars['_0e8eeb']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'error','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_5bea65']=$_750987_local_params;$_750987_old_vars['_5bea65']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <button type="button" id="filter-button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#filterOptions">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Filters','this_tag'=>'trans'],null,$this),$this)?>

          </button>
          <?php endif;$_750987_local_params=$_750987_old_params['_5bea65'];$_750987_local_vars=$_750987_old_vars['_5bea65'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_0e8eeb'];$_750987_local_vars=$_750987_old_vars['_0e8eeb'];?>

          <?php $_750987_old_params['_431470']=$_750987_local_params;$_750987_old_vars['_431470']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_create','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_9f23fa']=$_750987_local_params;$_750987_old_vars['_9f23fa']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_750987_old_params['_1eed29']=$_750987_local_params;$_750987_old_vars['_1eed29']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','ne'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_1eed29'];$_750987_local_vars=$_750987_old_vars['_1eed29'];?>
&amp;dialog_view=1<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php $_750987_old_params['_54211c']=$_750987_local_params;$_750987_old_vars['_54211c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;target=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;get_col=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_750987_old_params['_792af0']=$_750987_local_params;$_750987_old_vars['_792af0']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;single_select=1<?php endif;$_750987_local_params=$_750987_old_params['_792af0'];$_750987_local_vars=$_750987_old_vars['_792af0'];?>
<?php $_750987_old_params['_cd9654']=$_750987_local_params;$_750987_old_vars['_cd9654']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.selected_ids','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;selected_ids=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_cd9654'];$_750987_local_vars=$_750987_old_vars['_cd9654'];?>
<?php $_750987_old_params['_206c79']=$_750987_local_params;$_750987_old_vars['_206c79']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;select_add=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_add','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_206c79'];$_750987_local_vars=$_750987_old_vars['_206c79'];?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&amp;select_system_filters=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_system_filters_option=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_filter=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._filter','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;insert=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_54211c'];$_750987_local_vars=$_750987_old_vars['_54211c'];?>
<?php $_750987_old_params['_2db3fb']=$_750987_local_params;$_750987_old_vars['_2db3fb']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._system_filters_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_cc80a4']=$_750987_local_params;$_750987_old_vars['_cc80a4']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'tag','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;tag_obj=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_cc80a4'];$_750987_local_vars=$_750987_old_vars['_cc80a4'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_2db3fb'];$_750987_local_vars=$_750987_old_vars['_2db3fb'];?>
<?php $_750987_old_params['_179e1b']=$_750987_local_params;$_750987_old_vars['_179e1b']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;insert_editor=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert_editor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_179e1b'];$_750987_local_vars=$_750987_old_vars['_179e1b'];?>
">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_750987_local_params=$_750987_old_params['_9f23fa'];$_750987_local_vars=$_750987_old_vars['_9f23fa'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_431470'];$_750987_local_vars=$_750987_old_vars['_431470'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_bbae04'];$_750987_local_vars=$_750987_old_vars['_bbae04'];?>

        <?php endif;$_750987_local_params=$_750987_old_params['_8fb581'];$_750987_local_vars=$_750987_old_vars['_8fb581'];?>

        <?php $_750987_old_params['_225743']=$_750987_local_params;$_750987_old_vars['_225743']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_3eddbd']=$_750987_local_params;$_750987_old_vars['_3eddbd']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_28a62c=null;$_750987_old_params['_28a62c']=$_750987_local_params;$_750987_old_vars['_28a62c']=$_750987_local_vars;$a_28a62c=$this->setup_args(['name'=>'filter_cond','this_tag'=>'setvarblock'],null,$this);ob_start();?>

&amp;select_system_filters=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

&amp;_system_filters_option=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

&amp;_filter=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

<?php $c_28a62c=ob_get_clean();$c_28a62c=$this->block_setvarblock($a_28a62c,$c_28a62c,$this,$r_28a62c,1,'_28a62c');echo($c_28a62c); $_750987_local_params=$_750987_old_params['_28a62c'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_3eddbd'];$_750987_local_vars=$_750987_old_vars['_3eddbd'];?>

          <a class="btn btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
&amp;dialog_view=1<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php $_750987_old_params['_03bffa']=$_750987_local_params;$_750987_old_vars['_03bffa']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.rev_object_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;single_select=1&amp;revision_select=1&amp;rev_object_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.rev_object_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_03bffa'];$_750987_local_vars=$_750987_old_vars['_03bffa'];?>
<?php $_750987_old_params['_dd026d']=$_750987_local_params;$_750987_old_vars['_dd026d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;target=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;get_col=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_750987_old_params['_6a0878']=$_750987_local_params;$_750987_old_vars['_6a0878']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;single_select=1<?php endif;$_750987_local_params=$_750987_old_params['_6a0878'];$_750987_local_vars=$_750987_old_vars['_6a0878'];?>
<?php $_750987_old_params['_4ea6ed']=$_750987_local_params;$_750987_old_vars['_4ea6ed']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.selected_ids','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;selected_ids=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_4ea6ed'];$_750987_local_vars=$_750987_old_vars['_4ea6ed'];?>
<?php $_750987_old_params['_78b7ef']=$_750987_local_params;$_750987_old_vars['_78b7ef']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;select_add=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_add','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_78b7ef'];$_750987_local_vars=$_750987_old_vars['_78b7ef'];?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&amp;select_system_filters=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_system_filters_option=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_filter=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._filter','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;insert=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_dd026d'];$_750987_local_vars=$_750987_old_vars['_dd026d'];?>
<?php $_750987_old_params['_374f0a']=$_750987_local_params;$_750987_old_vars['_374f0a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.any_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;any_model=1<?php endif;$_750987_local_params=$_750987_old_params['_374f0a'];$_750987_local_vars=$_750987_old_vars['_374f0a'];?>
<?php $_750987_old_params['_9a58ad']=$_750987_local_params;$_750987_old_vars['_9a58ad']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;insert_editor=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert_editor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_9a58ad'];$_750987_local_vars=$_750987_old_vars['_9a58ad'];?>
&amp;_from_scope=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <i class="hidden fa fa-list" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Home','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$_750987_local_params=$_750987_old_params['_225743'];$_750987_local_vars=$_750987_old_vars['_225743'];?>

        <?php $_750987_old_params['_f87ede']=$_750987_local_params;$_750987_old_vars['_f87ede']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_c90c1c']=$_750987_local_params;$_750987_old_vars['_c90c1c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_6b8ab2']=$_750987_local_params;$_750987_old_vars['_6b8ab2']=$_750987_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'create','model'=>'asset','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#startUpload">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload','this_tag'=>'trans'],null,$this),$this)?>

          </button>
          <?php endif;$_750987_local_params=$_750987_old_params['_6b8ab2'];$_750987_local_vars=$_750987_old_vars['_6b8ab2'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_c90c1c'];$_750987_local_vars=$_750987_old_vars['_c90c1c'];?>

        <?php endif;$_750987_local_params=$_750987_old_params['_f87ede'];$_750987_local_vars=$_750987_old_vars['_f87ede'];?>

      <?php endif;$_750987_local_params=$_750987_old_params['_0b4e6d'];$_750987_local_vars=$_750987_old_vars['_0b4e6d'];?>

      <?php endif;$_750987_local_params=$_750987_old_params['_6a525f'];$_750987_local_vars=$_750987_old_vars['_6a525f'];?>

    <?php endif;$_750987_local_params=$_750987_old_params['_de2c10'];$_750987_local_vars=$_750987_old_vars['_de2c10'];?>

          </h1>
    <?php $_750987_old_params['_30220f']=$_750987_local_params;$_750987_old_vars['_30220f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_963d3b']=$_750987_local_params;$_750987_old_vars['_963d3b']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_per_page','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_750987_old_params['_9d80b5']=$_750987_local_params;$_750987_old_vars['_9d80b5']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php ob_start();$_750987_old_params['_920591']=$_750987_local_params;$_750987_old_vars['_920591']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <div class="text-right disp-option">
    <button type="button" class="btn btn-outline-primary btn-sm disp-option-button" data-toggle="modal" data-target="#dispOptions">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>

    </button>
    <button data-toggle="modal" data-target="#dispOptions" class="hidden btn btn-secondary alt-disp-option-button btn-sm" type="button">
    <i class="fa fa-television" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </button>
  </div>
  <div class="modal fade" id="dispOptions" tabindex="-1" role="dialog" aria-labelledby="dispOptionsTitle" aria-hidden="true"
    style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="dispOptionsTitle"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>
</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST">
        <input type="hidden" name="__mode" value="display_options">
        <input type="hidden" name="_model" value="<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
">
        <input type="hidden" name="_type" value="list">
        <input type="hidden" name="_reset" value="" id="_reset-disp-oprions">
        <input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">
      <?php $_750987_old_params['_426bc1']=$_750987_local_params;$_750987_old_vars['_426bc1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
      <?php endif;$_750987_local_params=$_750987_old_params['_426bc1'];$_750987_local_vars=$_750987_old_vars['_426bc1'];?>

      <?php $_750987_old_params['_f01cc3']=$_750987_local_params;$_750987_old_vars['_f01cc3']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_select" value="1">
      <?php endif;$_750987_local_params=$_750987_old_params['_f01cc3'];$_750987_local_vars=$_750987_old_vars['_f01cc3'];?>

      <?php $_750987_old_params['_874185']=$_750987_local_params;$_750987_old_vars['_874185']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="dialog_view" value="1">
        <?php $_750987_old_params['_1e3101']=$_750987_local_params;$_750987_old_vars['_1e3101']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <?php endif;$_750987_local_params=$_750987_old_params['_1e3101'];$_750987_local_vars=$_750987_old_vars['_1e3101'];?>

          <?php $_750987_old_params['_3225fe']=$_750987_local_params;$_750987_old_vars['_3225fe']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="single_select" value="1">
          <?php endif;$_750987_local_params=$_750987_old_params['_3225fe'];$_750987_local_vars=$_750987_old_vars['_3225fe'];?>

        <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php $_750987_old_params['_45aac3']=$_750987_local_params;$_750987_old_vars['_45aac3']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php endif;$_750987_local_params=$_750987_old_params['_45aac3'];$_750987_local_vars=$_750987_old_vars['_45aac3'];?>

      <?php endif;$_750987_local_params=$_750987_old_params['_874185'];$_750987_local_vars=$_750987_old_vars['_874185'];?>

        <input type="hidden" name="return_args" value="<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'selected_ids_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
">
        <div class="modal-body">
          <div class="container-fluid">
          <?php $_750987_old_params['_57f982']=$_750987_local_params;$_750987_old_vars['_57f982']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_bc76f7']=$_750987_local_params;$_750987_old_vars['_bc76f7']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <?php $c_16e8ce=null;$_750987_old_params['_16e8ce']=$_750987_local_params;$_750987_old_vars['_16e8ce']=$_750987_local_vars;$a_16e8ce=$this->setup_args(['name'=>'disp_options','this_tag'=>'loop'],null,$this);$_16e8ce=-1;$r_16e8ce=true;while($r_16e8ce===true):$r_16e8ce=($_16e8ce!==-1)?false:true;echo $this->block_loop($a_16e8ce,$c_16e8ce,$this,$r_16e8ce,++$_16e8ce,'_16e8ce');ob_start();?>
<?php $c_16e8ce = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_16e8ce=false;}if($c_16e8ce ):?>

            <?php $_750987_old_params['_e049cd']=$_750987_local_params;$_750987_old_vars['_e049cd']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
            <?php endif;$_750987_local_params=$_750987_old_params['_e049cd'];$_750987_local_vars=$_750987_old_vars['_e049cd'];?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_750987_old_params['_79f06d']=$_750987_local_params;$_750987_old_vars['_79f06d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php $_750987_old_params['_450a22']=$_750987_local_params;$_750987_old_vars['_450a22']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__key__','eq'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_750987_local_params=$_750987_old_params['_450a22'];$_750987_local_vars=$_750987_old_vars['_450a22'];?>

                <?php endif;$_750987_local_params=$_750987_old_params['_79f06d'];$_750987_local_vars=$_750987_old_vars['_79f06d'];?>

                <?php $_750987_old_params['_80be40']=$_750987_local_params;$_750987_old_vars['_80be40']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__display','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[2]','setvar'=>'_type','this_tag'=>'var'],null,$this),$this),$this->setup_args('_type','setvar',$this),$this,'setvar')?>

                <label class="custom-control custom-checkbox 
                <?php $_750987_old_params['_2272bb']=$_750987_local_params;$_750987_old_vars['_2272bb']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_7c2350']=$_750987_local_params;$_750987_old_vars['_7c2350']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_checked','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_750987_local_params=$_750987_old_params['_7c2350'];$_750987_local_vars=$_750987_old_vars['_7c2350'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_2272bb'];$_750987_local_vars=$_750987_old_vars['_2272bb'];?>

                <?php $_750987_old_params['_15703c']=$_750987_local_params;$_750987_old_vars['_15703c']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_list_options','value'=>'$__key__','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_750987_local_params=$_750987_old_params['_15703c'];$_750987_local_vars=$_750987_old_vars['_15703c'];?>
">
                  <?php $_750987_old_params['_db6c54']=$_750987_local_params;$_750987_old_vars['_db6c54']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1"><?php endif;$_750987_local_params=$_750987_old_params['_db6c54'];$_750987_local_vars=$_750987_old_vars['_db6c54'];?>

                  <input <?php $_750987_old_params['_4b23ed']=$_750987_local_params;$_750987_old_vars['_4b23ed']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_750987_local_params=$_750987_old_params['_4b23ed'];$_750987_local_vars=$_750987_old_vars['_4b23ed'];?>
 <?php $_750987_old_params['_36b296']=$_750987_local_params;$_750987_old_vars['_36b296']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_750987_local_params=$_750987_old_params['_36b296'];$_750987_local_vars=$_750987_old_vars['_36b296'];?>
<?php $_750987_old_params['_7da3e0']=$_750987_local_params;$_750987_old_vars['_7da3e0']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_750987_local_params=$_750987_old_params['_7da3e0'];$_750987_local_vars=$_750987_old_vars['_7da3e0'];?>
<?php $_750987_old_params['_5028c4']=$_750987_local_params;$_750987_old_vars['_5028c4']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_no_primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_24905a']=$_750987_local_params;$_750987_old_vars['_24905a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_750987_local_params=$_750987_old_params['_24905a'];$_750987_local_vars=$_750987_old_vars['_24905a'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_5028c4'];$_750987_local_vars=$_750987_old_vars['_5028c4'];?>
<?php $_750987_old_params['_b7aacf']=$_750987_local_params;$_750987_old_vars['_b7aacf']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_750987_local_params=$_750987_old_params['_b7aacf'];$_750987_local_vars=$_750987_old_vars['_b7aacf'];?>
 type="checkbox" class="custom-control-input disp-option-item" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_750987_old_params['_c95302']=$_750987_local_params;$_750987_old_vars['_c95302']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_750987_local_params=$_750987_old_params['_c95302'];$_750987_local_vars=$_750987_old_vars['_c95302'];?>
"></span>
                  <span class="custom-control-description"> <?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                </label>
                <?php endif;$_750987_local_params=$_750987_old_params['_80be40'];$_750987_local_vars=$_750987_old_vars['_80be40'];?>

            <?php $_750987_old_params['_086e1c']=$_750987_local_params;$_750987_old_vars['_086e1c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
            </div>
            <?php endif;$_750987_local_params=$_750987_old_params['_086e1c'];$_750987_local_vars=$_750987_old_vars['_086e1c'];?>

            <?php endif;$c_16e8ce=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_16e8ce'];$_750987_local_vars=$_750987_old_vars['_16e8ce'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_bc76f7'];$_750987_local_vars=$_750987_old_vars['_bc76f7'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_57f982'];$_750987_local_vars=$_750987_old_vars['_57f982'];?>

            <div class="row form-group">
              <div class="col-md-2"><label for="_per_page"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Paging','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <input id="_per_page" step="1" list="per_page_complete" type="number" min="1" max="5000" class="form-control form-control-sm very-short control-inline" name="_per_page" value="<?php echo $this->function_var($this->setup_args(['name'=>'_per_page','this_tag'=>'var'],null,$this),$this)?>
">
                <?php echo $this->function_trans($this->setup_args(['phrase'=>'Items per Page','this_tag'=>'trans'],null,$this),$this)?>

              </div>
            </div>
            <?php $_750987_old_params['_d25613']=$_750987_local_params;$_750987_old_vars['_d25613']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'search_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <?php $c_ef3adb=null;$_750987_old_params['_ef3adb']=$_750987_local_params;$_750987_old_vars['_ef3adb']=$_750987_local_vars;$a_ef3adb=$this->setup_args(['name'=>'search_options','this_tag'=>'loop'],null,$this);$_ef3adb=-1;$r_ef3adb=true;while($r_ef3adb===true):$r_ef3adb=($_ef3adb!==-1)?false:true;echo $this->block_loop($a_ef3adb,$c_ef3adb,$this,$r_ef3adb,++$_ef3adb,'_ef3adb');ob_start();?>
<?php $c_ef3adb = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_ef3adb=false;}if($c_ef3adb ):?>

                  <label class="custom-control custom-checkbox">
                    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                    <input<?php $_750987_old_params['_6794c0']=$_750987_local_params;$_750987_old_vars['_6794c0']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_750987_local_params=$_750987_old_params['_6794c0'];$_750987_local_vars=$_750987_old_vars['_6794c0'];?>
 type="checkbox" class="custom-control-input" name="_s_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"> <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[0]','setvar'=>'search_col','this_tag'=>'var'],null,$this),$this),$this->setup_args('search_col','setvar',$this),$this,'setvar')?>
<?php echo $this->function_trans($this->setup_args(['phrase'=>'$search_col','this_tag'=>'trans'],null,$this),$this)?>
</span>
                  </label>
                <?php endif;$c_ef3adb=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_ef3adb'];$_750987_local_vars=$_750987_old_vars['_ef3adb'];?>

              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search Type','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-5">
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_750987_old_params['_dd7fdc']=$_750987_local_params;$_750987_old_vars['_dd7fdc']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_search_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_dd7fdc'];$_750987_local_vars=$_750987_old_vars['_dd7fdc'];?>
<?php $_750987_old_params['_4ead81']=$_750987_local_params;$_750987_old_vars['_4ead81']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_4ead81'];$_750987_local_vars=$_750987_old_vars['_4ead81'];?>
 name="_user_search_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Phrase','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_750987_old_params['_605cd4']=$_750987_local_params;$_750987_old_vars['_605cd4']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_605cd4'];$_750987_local_vars=$_750987_old_vars['_605cd4'];?>
 name="_user_search_type" value="2">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'OR','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_750987_old_params['_8fa741']=$_750987_local_params;$_750987_old_vars['_8fa741']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_8fa741'];$_750987_local_vars=$_750987_old_vars['_8fa741'];?>
 name="_user_search_type" value="3">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'AND','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Keyword','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-3">
                <input type="hidden" name="_user_keep_search" value="0">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" <?php $_750987_old_params['_7e7814']=$_750987_local_params;$_750987_old_vars['_7e7814']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_user_keep_search','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_7e7814'];$_750987_local_vars=$_750987_old_vars['_7e7814'];?>
 class="custom-control-input" name="_user_keep_search" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"> <?php echo $this->function_trans($this->setup_args(['phrase'=>'Keep Keyword','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Replace','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_750987_old_params['_7bbfb6']=$_750987_local_params;$_750987_old_vars['_7bbfb6']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_replace_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_7bbfb6'];$_750987_local_vars=$_750987_old_vars['_7bbfb6'];?>
 name="_user_replace_type" value="0">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Insensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_750987_old_params['_65f0dc']=$_750987_local_params;$_750987_old_vars['_65f0dc']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_replace_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_65f0dc'];$_750987_local_vars=$_750987_old_vars['_65f0dc'];?>
 name="_user_replace_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Sensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
            </div>
            <?php endif;$_750987_local_params=$_750987_old_params['_d25613'];$_750987_local_vars=$_750987_old_vars['_d25613'];?>

            <div class="row form-group">
              <?php $c_e9560c=null;$_750987_old_params['_e9560c']=$_750987_local_params;$_750987_old_vars['_e9560c']=$_750987_local_vars;$a_e9560c=$this->setup_args(['name'=>'sort_options','this_tag'=>'loop'],null,$this);$_e9560c=-1;$r_e9560c=true;while($r_e9560c===true):$r_e9560c=($_e9560c!==-1)?false:true;echo $this->block_loop($a_e9560c,$c_e9560c,$this,$r_e9560c,++$_e9560c,'_e9560c');ob_start();?>
<?php $c_e9560c = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_e9560c=false;}if($c_e9560c ):?>

              <?php $_750987_old_params['_741e84']=$_750987_local_params;$_750987_old_vars['_741e84']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Sort','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-7">
              <?php endif;$_750987_local_params=$_750987_old_params['_741e84'];$_750987_local_vars=$_750987_old_vars['_741e84'];?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <label class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" <?php $_750987_old_params['_4df181']=$_750987_local_params;$_750987_old_vars['_4df181']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_4df181'];$_750987_local_vars=$_750987_old_vars['_4df181'];?>
 name="_user_sort_by" value="<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                  </label>
              <?php $_750987_old_params['_8b811a']=$_750987_local_params;$_750987_old_vars['_8b811a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
              <div class="col-md-3">
                <select name="_user_sort_order" class="form-control custom-select">
                  <?php $c_edc8ee=null;$_750987_old_params['_edc8ee']=$_750987_local_params;$_750987_old_vars['_edc8ee']=$_750987_local_vars;$a_edc8ee=$this->setup_args(['name'=>'order_options','this_tag'=>'loop'],null,$this);$_edc8ee=-1;$r_edc8ee=true;while($r_edc8ee===true):$r_edc8ee=($_edc8ee!==-1)?false:true;echo $this->block_loop($a_edc8ee,$c_edc8ee,$this,$r_edc8ee,++$_edc8ee,'_edc8ee');ob_start();?>
<?php $c_edc8ee = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_edc8ee=false;}if($c_edc8ee ):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"<?php $_750987_old_params['_08a0c5']=$_750987_local_params;$_750987_old_vars['_08a0c5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 selected<?php endif;$_750987_local_params=$_750987_old_params['_08a0c5'];$_750987_local_vars=$_750987_old_vars['_08a0c5'];?>
><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</option>
                  <?php endif;$c_edc8ee=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_edc8ee'];$_750987_local_vars=$_750987_old_vars['_edc8ee'];?>

                </select>
              </div>
              <?php endif;$_750987_local_params=$_750987_old_params['_8b811a'];$_750987_local_vars=$_750987_old_vars['_8b811a'];?>

              <?php endif;$c_e9560c=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_e9560c'];$_750987_local_vars=$_750987_old_vars['_e9560c'];?>

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="reset-disp-option" class="btn btn-warning"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Reset','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="submit" class="btn btn-primary"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Save Changes','this_tag'=>'trans'],null,$this),$this)?>
</button>
        </div>
      </form>
      </div>
    </div>
  </div>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'list_max_cols','setvar'=>'_list_max_cols','this_tag'=>'property'],null,$this),$this),$this->setup_args('_list_max_cols','setvar',$this),$this,'setvar')?>

<?php $_750987_old_params['_4fef98']=$_750987_local_params;$_750987_old_vars['_4fef98']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'dialog_max_cols','setvar'=>'_list_max_cols','this_tag'=>'property'],null,$this),$this),$this->setup_args('_list_max_cols','setvar',$this),$this,'setvar')?>

<?php endif;$_750987_local_params=$_750987_old_params['_4fef98'];$_750987_local_vars=$_750987_old_vars['_4fef98'];?>

<?php $_750987_old_params['_3803e1']=$_750987_local_params;$_750987_old_vars['_3803e1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_list_max_cols','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
$('#reset-disp-option').click(function(){
    if (! confirm( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to reset display options?','this_tag'=>'trans'],null,$this),$this)?>
' ) ) {
        return false;
    }
    $('#_reset-disp-oprions').val(1);
});
$('.disp-option-item').change(function(){
    let checkdCnt = 0;
    $('.disp-option-item').each(function() {
        if ( $(this).prop( 'checked' ) ) {
            checkdCnt++;
        }
    });
    if ( <?php echo $this->function_var($this->setup_args(['name'=>'_list_max_cols','this_tag'=>'var'],null,$this),$this)?>
 < checkdCnt ) {
      <?php $_750987_old_params['_61ed18']=$_750987_local_params;$_750987_old_vars['_61ed18']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the dialog.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php else:?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the display.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php endif;$_750987_local_params=$_750987_old_params['_61ed18'];$_750987_local_vars=$_750987_old_vars['_61ed18'];?>

    }
});
</script>
<?php endif;$_750987_local_params=$_750987_old_params['_3803e1'];$_750987_local_vars=$_750987_old_vars['_3803e1'];?>

<?php endif;$_920591=ob_get_clean();echo $this->modifier_trim_space($_920591,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_750987_local_params=$_750987_old_params['_920591'];$_750987_local_vars=$_750987_old_vars['_920591'];?>

        <?php endif;$_750987_local_params=$_750987_old_params['_9d80b5'];$_750987_local_vars=$_750987_old_vars['_9d80b5'];?>

      <?php endif;$_750987_local_params=$_750987_old_params['_963d3b'];$_750987_local_vars=$_750987_old_vars['_963d3b'];?>

    <?php endif;$_750987_local_params=$_750987_old_params['_30220f'];$_750987_local_vars=$_750987_old_vars['_30220f'];?>

    <?php $c_5f22a0=null;$_750987_old_params['_5f22a0']=$_750987_local_params;$_750987_old_vars['_5f22a0']=$_750987_local_vars;$a_5f22a0=$this->setup_args(['name'=>'alert_close','this_tag'=>'setvarblock'],null,$this);ob_start();?>

      <button type="button" class="close" data-dismiss="alert" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
        <span aria-hidden="true">&times;</span>
      </button>
    <?php $c_5f22a0=ob_get_clean();$c_5f22a0=$this->block_setvarblock($a_5f22a0,$c_5f22a0,$this,$r_5f22a0,1,'_5f22a0');echo($c_5f22a0); $_750987_local_params=$_750987_old_params['_5f22a0'];?>

    <div class="alert alert-success hidden" id="header-alert" role="alert" tabindex="0">
      <button onclick="$('#header-alert').hide();" type="button" id="header-alert-close" class="close" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
        <span aria-hidden="true">&times;</span>
      </button>
      <span id="header-alert-message"></span>
    </div>
    <?php $_750987_old_params['_8e3d90']=$_750987_local_params;$_750987_old_vars['_8e3d90']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_d000b7']=$_750987_local_params;$_750987_old_vars['_d000b7']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <div class="alert alert-danger" id="header-error-message" tabindex="0" role="alert">
        <?php echo paml_modifier_funcs('nl2br', paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'error','escape'=>'1','nl2br'=>'1','this_tag'=>'var'],null,$this),$this),ENT_QUOTES))?>

      </div>
      <script>
      $('#header-error-message').focus();
      </script>
      <?php echo $this->function_setvar($this->setup_args(['name'=>'error','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_750987_local_params=$_750987_old_params['_d000b7'];$_750987_local_vars=$_750987_old_vars['_d000b7'];?>

    <?php endif;$_750987_local_params=$_750987_old_params['_8e3d90'];$_750987_local_vars=$_750987_old_vars['_8e3d90'];?>

<script>
$(function () {
    if (window.ontouchstart !== null) {
        $('[data-toggle="tooltip"]').tooltip();
    }
})
</script>
<?php else:?>

<?php $_750987_old_params['_f45164']=$_750987_local_params;$_750987_old_vars['_f45164']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_c2442b']=$_750987_local_params;$_750987_old_vars['_c2442b']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_fix_spacebar','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_c2442b'];$_750987_local_vars=$_750987_old_vars['_c2442b'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_f45164'];$_750987_local_vars=$_750987_old_vars['_f45164'];?>

<!DOCTYPE html>
<html lang="<?php $_750987_old_params['_1f4b15']=$_750987_local_params;$_750987_old_vars['_1f4b15']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_language','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_language','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
en<?php endif;$_750987_local_params=$_750987_old_params['_1f4b15'];$_750987_local_vars=$_750987_old_vars['_1f4b15'];?>
">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="author" content="Alfasado Inc.">
    <meta name="robots" content="noindex">
    <meta name="robots" content="nofollow">
    <link rel="icon" href="favicon.ico">
    <title><?php $_750987_old_params['_1f3fdf']=$_750987_local_params;$_750987_old_vars['_1f3fdf']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'html_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'html_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php else:?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'page_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_750987_local_params=$_750987_old_params['_1f3fdf'];$_750987_local_vars=$_750987_old_vars['_1f3fdf'];?>
<?php $_750987_old_params['_c75669']=$_750987_local_params;$_750987_old_vars['_c75669']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_e5574b']=$_750987_local_params;$_750987_old_vars['_e5574b']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 | <?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_750987_local_params=$_750987_old_params['_e5574b'];$_750987_local_vars=$_750987_old_vars['_e5574b'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_c75669'];$_750987_local_vars=$_750987_old_vars['_c75669'];?>
 | <?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'appname','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</title>
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tether.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery.cookie.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/clipboard.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/ie10-viewport-bug-workaround.js"></script>
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/theme.min.css?v=<?php echo $this->function_var($this->setup_args(['name'=>'version','this_tag'=>'var'],null,$this),$this)?>
" rel="stylesheet">
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/jquery.fileupload.css">
    <?php echo $this->modifier_setvar(paml_htmlspecialchars($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'barcolor','escape'=>'','setvar'=>'sys_barcolor','this_tag'=>'getoption'],null,$this),$this),ENT_QUOTES),$this->setup_args('sys_barcolor','setvar',$this),$this,'setvar')?>

    <?php echo $this->modifier_setvar(paml_htmlspecialchars($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'bartextcolor','escape'=>'','setvar'=>'sys_bartextcolor','this_tag'=>'getoption'],null,$this),$this),ENT_QUOTES),$this->setup_args('sys_bartextcolor','setvar',$this),$this,'setvar')?>

    <style type="text/css">
    <?php $_750987_old_params['_298fc0']=$_750987_local_params;$_750987_old_vars['_298fc0']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_stickey_buttons','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_3ad8fc']=$_750987_local_params;$_750987_old_vars['_3ad8fc']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_e7f2e9']=$_750987_local_params;$_750987_old_vars['_e7f2e9']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickybgcolor','value'=>'$workspace_barcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_e7f2e9'];$_750987_local_vars=$_750987_old_vars['_e7f2e9'];?>

      <?php $_750987_old_params['_62eb6d']=$_750987_local_params;$_750987_old_vars['_62eb6d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickycolor','value'=>'$workspace_bartextcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_62eb6d'];$_750987_local_vars=$_750987_old_vars['_62eb6d'];?>

      <?php endif;$_750987_local_params=$_750987_old_params['_3ad8fc'];$_750987_local_vars=$_750987_old_vars['_3ad8fc'];?>

      <?php $_750987_old_params['_4466a8']=$_750987_local_params;$_750987_old_vars['_4466a8']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickybgcolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'barcolor','setvar'=>'stickybgcolor','this_tag'=>'var'],null,$this),$this),$this->setup_args('stickybgcolor','setvar',$this),$this,'setvar')?>
<?php endif;$_750987_local_params=$_750987_old_params['_4466a8'];$_750987_local_vars=$_750987_old_vars['_4466a8'];?>

      <?php $_750987_old_params['_6577ef']=$_750987_local_params;$_750987_old_vars['_6577ef']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickycolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'bartextcolor','setvar'=>'stickycolor','this_tag'=>'var'],null,$this),$this),$this->setup_args('stickycolor','setvar',$this),$this,'setvar')?>
<?php endif;$_750987_local_params=$_750987_old_params['_6577ef'];$_750987_local_vars=$_750987_old_vars['_6577ef'];?>

      @media ( min-height: 576px ) {
      .edit-action-bar { position: sticky; bottom: 0px; z-index: 1020; background: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickybgcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
;
          padding: 10px 0px; vertical-align: middle; border-top: 1px solid #CCC; }
      .edit-action-bar button { border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      .edit-action-bar label { color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      }
    <?php endif;$_750987_local_params=$_750987_old_params['_298fc0'];$_750987_local_vars=$_750987_old_vars['_298fc0'];?>

      .fixed-top { z-index: 1030 !important; }
      .nav-top,.navbar-brand,.dropdown-menu, .nav-top a, footer{ background-color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_barcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; }
      .nav-top .my-sm-0, .nav-top .navbar-toggler{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      <?php $_750987_old_params['_d0ce4d']=$_750987_local_params;$_750987_old_vars['_d0ce4d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php ob_start();$_750987_old_params['_13c664']=$_750987_local_params;$_750987_old_vars['_13c664']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .brand-workspace, .workspace-bar, .workspace-bar a,
      .workspace-bar .dropdown-menu{ background-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      .workspace-bar button.my-sm-0{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      .workspace-bar .my-sm-0, .workspace-bar .navbar-toggler{ border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; }
      <?php endif;$_13c664=ob_get_clean();echo paml_htmlspecialchars($_13c664,ENT_QUOTES);$_750987_local_params=$_750987_old_params['_13c664'];$_750987_local_vars=$_750987_old_vars['_13c664'];?>

      <?php endif;$_750987_local_params=$_750987_old_params['_d0ce4d'];$_750987_local_vars=$_750987_old_vars['_d0ce4d'];?>

      <?php $_750987_old_params['_4a3f25']=$_750987_local_params;$_750987_old_vars['_4a3f25']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .form-control, .custom-select, .relation_nestable_list, .custom-control-indicator, .tox-tinymce, .mce-tinymce, .btn-outline-secondary, .btn-secondary, .pagination-sm li a{ border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important }
      <?php endif;$_750987_local_params=$_750987_old_params['_4a3f25'];$_750987_local_vars=$_750987_old_vars['_4a3f25'];?>

      <?php $_750987_old_params['_0dc28c']=$_750987_local_params;$_750987_old_vars['_0dc28c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'panel_width','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
.nav-link{ max-width: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'panel_width','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
px !important }<?php endif;$_750987_local_params=$_750987_old_params['_0dc28c'];$_750987_local_vars=$_750987_old_vars['_0dc28c'];?>

      .navbar .btn { width:35px }
      <?php $_750987_old_params['_cb0b45']=$_750987_local_params;$_750987_old_vars['_cb0b45']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'this_mode','eq'=>'config','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'this_mode','eq'=>'upgrade','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'in_editing','value'=>'true','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_750987_local_params=$_750987_old_params['_cb0b45'];$_750987_local_vars=$_750987_old_vars['_cb0b45'];?>

      <?php $_750987_old_params['_9a4ec5']=$_750987_local_params;$_750987_old_vars['_9a4ec5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'in_editing','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      @media (min-width: 992px) {
      .col-lg-2{ max-width:13rem !important }
      .col-lg-10{ min-width: -webkit-calc(100% - 13rem); min-width: calc(100% - 13rem) } }
      <?php endif;$_750987_local_params=$_750987_old_params['_9a4ec5'];$_750987_local_vars=$_750987_old_vars['_9a4ec5'];?>

    </style>
    <?php echo $this->function_var($this->setup_args(['name'=>'html_head','this_tag'=>'var'],null,$this),$this)?>

    <?php $_750987_old_params['_f81e44']=$_750987_local_params;$_750987_old_vars['_f81e44']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'invisible_selector','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <style><?php echo $this->modifier_join($this->function_var($this->setup_args(['name'=>'invisible_selector','join'=>',','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','join',$this),$this,'join')?>
{display:none !important}</style>
    <?php endif;$_750987_local_params=$_750987_old_params['_f81e44'];$_750987_local_vars=$_750987_old_vars['_f81e44'];?>

    <?php $_750987_old_params['_227373']=$_750987_local_params;$_750987_old_vars['_227373']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<style><?php $_750987_old_params['_644fe6']=$_750987_local_params;$_750987_old_vars['_644fe6']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
body { padding-top: 80px; } .workspace-bar { margin-top: 0;}
    <?php else:?>
.workspace-bar { margin-bottom: 14px;}<?php endif;$_750987_local_params=$_750987_old_params['_644fe6'];$_750987_local_vars=$_750987_old_vars['_644fe6'];?>
</style><?php endif;$_750987_local_params=$_750987_old_params['_227373'];$_750987_local_vars=$_750987_old_vars['_227373'];?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_css','setvar'=>'config_user_css','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_css','setvar',$this),$this,'setvar')?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_js','setvar'=>'config_user_js','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_js','setvar',$this),$this,'setvar')?>

    <?php $_750987_old_params['_5eab05']=$_750987_local_params;$_750987_old_vars['_5eab05']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_css','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_css','this_tag'=>'var'],null,$this),$this)?>
"><?php endif;$_750987_local_params=$_750987_old_params['_5eab05'];$_750987_local_vars=$_750987_old_vars['_5eab05'];?>

    <?php $_750987_old_params['_d2d877']=$_750987_local_params;$_750987_old_vars['_d2d877']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_js','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_js','this_tag'=>'var'],null,$this),$this)?>
"></script><?php endif;$_750987_local_params=$_750987_old_params['_d2d877'];$_750987_local_vars=$_750987_old_vars['_d2d877'];?>

  </head>
  <body class="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'body_class','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<?php $_750987_old_params['_9f3647']=$_750987_local_params;$_750987_old_vars['_9f3647']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
jQuery.fn.extend({
  ksortable: function(options) {
    let self = this;
    self.sortable(options);
    $(self).children().attr('tabindex', 0);
    $(self).on('keydown', '> *', function(event) {
    // $('li', this).attr('tabindex', 0).bind('keydown', function(event) {
        if ( event.target && /^(input|textarea|select)$/.test( event.target.tagName.toLowerCase()) ) {
            return;
        }
        if(event.which == 37 || event.which == 38) { // left or up
          $(this).insertBefore($(this).prev());
        } 
        if(event.which == 39 || event.which == 40) { // right or down
          $(this).insertAfter($(this).next()); 
        }     
        if (event.which == 84 || event.which == 33) { // "t" or page-up
          $(this).parent().prepend($(this));
        } 
        if (event.which == 66 || event.which == 34) { // "b" or page-down
          $(this).parent().append($(this));
        } 
        if(event.which == 82) { // "r"
          var p = $(this).parent();
          p.children().each(function(){p.prepend($(this))})
        } 
        if(event.which == 83) { // "s"
          var p = $(this).parent();
          p.children().each(function(){
            if(Math.random()<.5)
              p.prepend($(this));
            else
              p.append($(this));
          })
        }
        var keyNums = [33, 34, 37, 38, 39, 40, 66, 82, 83, 84];
        var keyNum = event.which + 0;
        if (keyNums.indexOf(keyNum) >= 0){
          event.stopPropagation();
          $(this).focus();
          if ( $(this).hasClass("edit-options-child") ) {
            sort_fields();
          } else if ( $(this).hasClass("badge-relation") ) {
            editContentChanged = true;
          }
          $(self).sortable('refresh').sortable('refreshPositions');
          $(self).trigger('ksortupdate', this);
        }
    });
    return self;
  }
});
</script>
<?php $_750987_old_params['_433355']=$_750987_local_params;$_750987_old_vars['_433355']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_loader','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div id="__loader-bg">
  <img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif" alt="" width="45" height="45">
</div>
<script>
window.addEventListener('load', function(){
    $('#__loader-bg').hide("fast");
});
</script>
<?php endif;$_750987_local_params=$_750987_old_params['_433355'];$_750987_local_vars=$_750987_old_vars['_433355'];?>

<?php endif;$_750987_local_params=$_750987_old_params['_9f3647'];$_750987_local_vars=$_750987_old_vars['_9f3647'];?>

  <div id="main-content">
<?php $_750987_old_params['_8e2878']=$_750987_local_params;$_750987_old_vars['_8e2878']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <div class="fixed-top">
<?php endif;$_750987_local_params=$_750987_old_params['_8e2878'];$_750987_local_vars=$_750987_old_vars['_8e2878'];?>

  <?php $_750987_old_params['_3d03ba']=$_750987_local_params;$_750987_old_vars['_3d03ba']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_b4946e']=$_750987_local_params;$_750987_old_vars['_b4946e']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.__mode','match'=>'/^(?:login|logout)$/iu','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'is_login','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_750987_local_params=$_750987_old_params['_b4946e'];$_750987_local_vars=$_750987_old_vars['_b4946e'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_3d03ba'];$_750987_local_vars=$_750987_old_vars['_3d03ba'];?>

  <?php $_750987_old_params['_373254']=$_750987_local_params;$_750987_old_vars['_373254']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'member_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'is_login','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_750987_local_params=$_750987_old_params['_373254'];$_750987_local_vars=$_750987_old_vars['_373254'];?>

    <nav class="bar navbar navbar-toggleable-md navbar-inverse bg-inverse nav-top<?php $_750987_old_params['_68e1b5']=$_750987_local_params;$_750987_old_vars['_68e1b5']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 fixed-top<?php endif;$_750987_local_params=$_750987_old_params['_68e1b5'];$_750987_local_vars=$_750987_old_vars['_68e1b5'];?>
">
      <?php $_750987_old_params['_34543e']=$_750987_local_params;$_750987_old_vars['_34543e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_750987_old_params['_648af9']=$_750987_local_params;$_750987_old_vars['_648af9']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'install','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a class="navbar-brand brand-prototype" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
">PowerCMS X</a>
        <?php endif;$_750987_local_params=$_750987_old_params['_648af9'];$_750987_local_vars=$_750987_old_vars['_648af9'];?>

      <?php endif;$_750987_local_params=$_750987_old_params['_34543e'];$_750987_local_vars=$_750987_old_vars['_34543e'];?>

      <?php $_750987_old_params['_d2208b']=$_750987_local_params;$_750987_old_vars['_d2208b']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'is_login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <button style="background-color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_barcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'sys_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important; z-index:7" class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbars" aria-controls="navbars" aria-expanded="false" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </button>
      <?php endif;$_750987_local_params=$_750987_old_params['_d2208b'];$_750987_local_vars=$_750987_old_vars['_d2208b'];?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_param','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_750987_old_params['_1ecfc1']=$_750987_local_params;$_750987_old_vars['_1ecfc1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $c_52b039=null;$_750987_old_params['_52b039']=$_750987_local_params;$_750987_old_vars['_52b039']=$_750987_local_vars;$a_52b039=$this->setup_args(['name'=>'workspace_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_52b039=ob_get_clean();$c_52b039=$this->block_setvarblock($a_52b039,$c_52b039,$this,$r_52b039,1,'_52b039');echo($c_52b039); $_750987_local_params=$_750987_old_params['_52b039'];?>

        <?php endif;$_750987_local_params=$_750987_old_params['_1ecfc1'];$_750987_local_vars=$_750987_old_vars['_1ecfc1'];?>

      <?php $_750987_old_params['_2c7a0f']=$_750987_local_params;$_750987_old_vars['_2c7a0f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <a class="navbar-brand"<?php $_750987_old_params['_3ea4d6']=$_750987_local_params;$_750987_old_vars['_3ea4d6']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_750987_local_params=$_750987_old_params['_3ea4d6'];$_750987_local_vars=$_750987_old_vars['_3ea4d6'];?>
 style="z-index:1"><?php echo $this->modifier_trim_to(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'appname','escape'=>'','trim_to'=>'20+...','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('20+...','trim_to',$this),$this,'trim_to')?>
<span id="navbar-brand-end"></span></a>
      <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_counter','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php $_750987_old_params['_0966d7']=$_750987_local_params;$_750987_old_vars['_0966d7']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_cc8e33']=$_750987_local_params;$_750987_old_vars['_cc8e33']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'ws_selector_limit','setvar'=>'selector_limit','this_tag'=>'property'],null,$this),$this),$this->setup_args('selector_limit','setvar',$this),$this,'setvar')?>

        <?php $_750987_old_params['_edb79b']=$_750987_local_params;$_750987_old_vars['_edb79b']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'selector_limit','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'selector_limit','value'=>'16','this_tag'=>'setvar'],null,$this),$this)?>

        <?php endif;$_750987_local_params=$_750987_old_params['_edb79b'];$_750987_local_vars=$_750987_old_vars['_edb79b'];?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'selector_limit','op'=>'+','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_by','value'=>'last_update','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_order','value'=>'descend','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_750987_old_params['_28c11c']=$_750987_local_params;$_750987_old_vars['_28c11c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_space_order','eq'=>'Default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_by','value'=>'order','this_tag'=>'setvar'],null,$this),$this)?>

          <?php echo $this->function_setvar($this->setup_args(['name'=>'ws_sort_order','value'=>'ascend','this_tag'=>'setvar'],null,$this),$this)?>

        <?php endif;$_750987_local_params=$_750987_old_params['_28c11c'];$_750987_local_vars=$_750987_old_vars['_28c11c'];?>

        <?php $c_e488d6=null;$_750987_old_params['_e488d6']=$_750987_local_params;$_750987_old_vars['_e488d6']=$_750987_local_vars;$a_e488d6=$this->setup_args(['cols'=>'id,name,barcolor,bartextcolor','model'=>'workspace','can_access'=>'1','limit'=>'$selector_limit','sort_by'=>'$ws_sort_by','direction'=>'$ws_sort_order','this_tag'=>'objectloop'],null,$this);$_e488d6=-1;$r_e488d6=true;while($r_e488d6===true):$r_e488d6=($_e488d6!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_e488d6,$c_e488d6,$this,$r_e488d6,++$_e488d6,'_e488d6');ob_start();?>
<?php $c_e488d6 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_e488d6=false;}if($c_e488d6 ):?>

        <?php $_750987_old_params['_d5cfa7']=$_750987_local_params;$_750987_old_vars['_d5cfa7']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <div class="hidden nav-item dropdown workspace-dd-wrapper active" id="workspace-selector" style="z-index:5">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpaces','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
            <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Select a WorkSpace','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cube workspace-dd" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpaces','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
        <?php endif;$_750987_local_params=$_750987_old_params['_d5cfa7'];$_750987_local_vars=$_750987_old_vars['_d5cfa7'];?>

            <?php $_750987_old_params['_a7bd15']=$_750987_local_params;$_750987_old_vars['_a7bd15']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','lt'=>'$selector_limit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <a<?php $_750987_old_params['_3e899a']=$_750987_local_params;$_750987_old_vars['_3e899a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_color_the_selector','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_624751']=$_750987_local_params;$_750987_old_vars['_624751']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_224b61']=$_750987_local_params;$_750987_old_vars['_224b61']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 style="<?php $_750987_old_params['_bfe3ff']=$_750987_local_params;$_750987_old_vars['_bfe3ff']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__last__','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
margin-bottom:3px;<?php endif;$_750987_local_params=$_750987_old_params['_bfe3ff'];$_750987_local_vars=$_750987_old_vars['_bfe3ff'];?>
background-color:<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important;color:<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important"<?php endif;$_750987_local_params=$_750987_old_params['_224b61'];$_750987_local_vars=$_750987_old_vars['_224b61'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_624751'];$_750987_local_vars=$_750987_old_vars['_624751'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_3e899a'];$_750987_local_vars=$_750987_old_vars['_3e899a'];?>
 class="dropdown-item btn-sm <?php $_750987_old_params['_ccb01a']=$_750987_local_params;$_750987_old_vars['_ccb01a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'id','eq'=>'$workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_750987_local_params=$_750987_old_params['_ccb01a'];$_750987_local_vars=$_750987_old_vars['_ccb01a'];?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?_selector=1&amp;<?php $_750987_old_params['_592baa']=$_750987_local_params;$_750987_old_vars['_592baa']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request_method','eq'=>'GET','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_9683db']=$_750987_local_params;$_750987_old_vars['_9683db']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->modifier_replace($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'query_string','regex_replace'=>'\'/&offset=[0-9]*/\',\'\'','replace'=>'\'does_act=1\',\'\'','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&offset=[0-9]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('\\\'does_act=1\\\',\\\'\\\'','replace',$this),$this,'replace'),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_9683db'];$_750987_local_vars=$_750987_old_vars['_9683db'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_592baa'];$_750987_local_vars=$_750987_old_vars['_592baa'];?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'id','this_tag'=>'var'],null,$this),$this)?>
">
              <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

            </a>
            <?php else:?>

            <a class="dropdown-item btn-sm" data-toggle="modal" data-target="#modal"
                data-href="" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=workspace&amp;dialog_view=1&amp;workspace_select=1"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select...','this_tag'=>'trans'],null,$this),$this)?>
</a>
            <?php endif;$_750987_local_params=$_750987_old_params['_a7bd15'];$_750987_local_vars=$_750987_old_vars['_a7bd15'];?>

        <?php $_750987_old_params['_31ce3f']=$_750987_local_params;$_750987_old_vars['_31ce3f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_counter','value'=>'$__counter__','this_tag'=>'setvar'],null,$this),$this)?>

            </div>
          </div>
<script>
$(window).on('load resize', function(){
  $('#navbar-brand-end').css('display','inline-block');
  var brandOffset = $('#navbar-brand-end').offset();
  $('#workspace-selector').css('position','absolute');
  $('#workspace-selector').css('left',brandOffset.left + 8);
  $('#workspace-selector').css('top','1px');
  if ( $('#workspace-selector').is(':hidden') ) {
    $('#workspace-selector').show('fast');
  }
});
</script>
        <?php endif;$_750987_local_params=$_750987_old_params['_31ce3f'];$_750987_local_vars=$_750987_old_vars['_31ce3f'];?>

        <?php endif;$c_e488d6=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_e488d6'];$_750987_local_vars=$_750987_old_vars['_e488d6'];?>

      <div class="collapse navbar-collapse" id="navbars" <?php $_750987_old_params['_a657a0']=$_750987_local_params;$_750987_old_vars['_a657a0']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_counter','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-left:-66px;z-index:0"<?php endif;$_750987_local_params=$_750987_old_params['_a657a0'];$_750987_local_vars=$_750987_old_vars['_a657a0'];?>
>
        <ul class="nav-pills navbar-nav mr-auto" id="system-panel">
        <?php $c_549b3c=null;$_750987_old_params['_549b3c']=$_750987_local_params;$_750987_old_vars['_549b3c']=$_750987_local_vars;$a_549b3c=$this->setup_args(['menu_type'=>'6','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_549b3c=-1;$r_549b3c=true;while($r_549b3c===true):$r_549b3c=($_549b3c!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_549b3c,$c_549b3c,$this,$r_549b3c,++$_549b3c,'_549b3c');ob_start();?>
<?php $c_549b3c = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_549b3c=false;}if($c_549b3c ):?>

          <?php $_750987_old_params['_3bf41d']=$_750987_local_params;$_750987_old_vars['_3bf41d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-bookmark" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_750987_local_params=$_750987_old_params['_3bf41d'];$_750987_local_vars=$_750987_old_vars['_3bf41d'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_750987_old_params['_0796e8']=$_750987_local_params;$_750987_old_vars['_0796e8']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_750987_local_params=$_750987_old_params['_0796e8'];$_750987_local_vars=$_750987_old_vars['_0796e8'];?>

        <?php endif;$c_549b3c=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_549b3c'];$_750987_local_vars=$_750987_old_vars['_549b3c'];?>

        <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'panel_limit','setvar'=>'panel_limit','this_tag'=>'property'],null,$this),$this),$this->setup_args('panel_limit','setvar',$this),$this,'setvar')?>

        <?php $c_bd0414=null;$_750987_old_params['_bd0414']=$_750987_local_params;$_750987_old_vars['_bd0414']=$_750987_local_vars;$a_bd0414=$this->setup_args(['limit'=>'$panel_limit','menu_type'=>'1','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_bd0414=-1;$r_bd0414=true;while($r_bd0414===true):$r_bd0414=($_bd0414!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_bd0414,$c_bd0414,$this,$r_bd0414,++$_bd0414,'_bd0414');ob_start();?>
<?php $c_bd0414 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_bd0414=false;}if($c_bd0414 ):?>

          <li class="nav-item <?php $_750987_old_params['_2f22f1']=$_750987_local_params;$_750987_old_vars['_2f22f1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'$model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_750987_local_params=$_750987_old_params['_2f22f1'];$_750987_local_vars=$_750987_old_vars['_2f22f1'];?>
">
            <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'label','count_chars'=>'','setvar'=>'count_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('count_chars','setvar',$this),$this,'setvar')?>
<a class="nav-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php $_750987_old_params['_c1c6ba']=$_750987_local_params;$_750987_old_vars['_c1c6ba']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'count_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 data-toggle="tooltip" data-placement="right" title="<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
"<?php endif;$_750987_local_params=$_750987_old_params['_c1c6ba'];$_750987_local_vars=$_750987_old_vars['_c1c6ba'];?>
><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          </li>
        <?php endif;$c_bd0414=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_bd0414'];$_750987_local_vars=$_750987_old_vars['_bd0414'];?>

        <?php $c_1f6193=null;$_750987_old_params['_1f6193']=$_750987_local_params;$_750987_old_vars['_1f6193']=$_750987_local_vars;$a_1f6193=$this->setup_args(['limit'=>'100000','offset'=>'$panel_limit','menu_type'=>'1','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_1f6193=-1;$r_1f6193=true;while($r_1f6193===true):$r_1f6193=($_1f6193!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_1f6193,$c_1f6193,$this,$r_1f6193,++$_1f6193,'_1f6193');ob_start();?>
<?php $c_1f6193 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_1f6193=false;}if($c_1f6193 ):?>

          <?php $_750987_old_params['_740d4d']=$_750987_local_params;$_750987_old_vars['_740d4d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-window-maximize" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_750987_local_params=$_750987_old_params['_740d4d'];$_750987_local_vars=$_750987_old_vars['_740d4d'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_750987_old_params['_208e01']=$_750987_local_params;$_750987_old_vars['_208e01']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_750987_local_params=$_750987_old_params['_208e01'];$_750987_local_vars=$_750987_old_vars['_208e01'];?>

        <?php endif;$c_1f6193=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_1f6193'];$_750987_local_vars=$_750987_old_vars['_1f6193'];?>

        <?php $c_60cb86=null;$_750987_old_params['_60cb86']=$_750987_local_params;$_750987_old_vars['_60cb86']=$_750987_local_vars;$a_60cb86=$this->setup_args(['menu_type'=>'2','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_60cb86=-1;$r_60cb86=true;while($r_60cb86===true):$r_60cb86=($_60cb86!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_60cb86,$c_60cb86,$this,$r_60cb86,++$_60cb86,'_60cb86');ob_start();?>
<?php $c_60cb86 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_60cb86=false;}if($c_60cb86 ):?>

          <?php $_750987_old_params['_2d9636']=$_750987_local_params;$_750987_old_vars['_2d9636']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cog" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_750987_local_params=$_750987_old_params['_2d9636'];$_750987_local_vars=$_750987_old_vars['_2d9636'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_750987_old_params['_e3828f']=$_750987_local_params;$_750987_old_vars['_e3828f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_750987_local_params=$_750987_old_params['_e3828f'];$_750987_local_vars=$_750987_old_vars['_e3828f'];?>

        <?php endif;$c_60cb86=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_60cb86'];$_750987_local_vars=$_750987_old_vars['_60cb86'];?>

        <?php $c_d6bf29=null;$_750987_old_params['_d6bf29']=$_750987_local_params;$_750987_old_vars['_d6bf29']=$_750987_local_vars;$a_d6bf29=$this->setup_args(['menu_type'=>'3','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_d6bf29=-1;$r_d6bf29=true;while($r_d6bf29===true):$r_d6bf29=($_d6bf29!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_d6bf29,$c_d6bf29,$this,$r_d6bf29,++$_d6bf29,'_d6bf29');ob_start();?>
<?php $c_d6bf29 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_d6bf29=false;}if($c_d6bf29 ):?>

          <?php $_750987_old_params['_8157ef']=$_750987_local_params;$_750987_old_vars['_8157ef']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-database" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_750987_local_params=$_750987_old_params['_8157ef'];$_750987_local_vars=$_750987_old_vars['_8157ef'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_750987_old_params['_494ccc']=$_750987_local_params;$_750987_old_vars['_494ccc']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_750987_local_params=$_750987_old_params['_494ccc'];$_750987_local_vars=$_750987_old_vars['_494ccc'];?>

        <?php endif;$c_d6bf29=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_d6bf29'];$_750987_local_vars=$_750987_old_vars['_d6bf29'];?>

        <?php $c_92d9e8=null;$_750987_old_params['_92d9e8']=$_750987_local_params;$_750987_old_vars['_92d9e8']=$_750987_local_vars;$a_92d9e8=$this->setup_args(['menu_type'=>'4','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_92d9e8=-1;$r_92d9e8=true;while($r_92d9e8===true):$r_92d9e8=($_92d9e8!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_92d9e8,$c_92d9e8,$this,$r_92d9e8,++$_92d9e8,'_92d9e8');ob_start();?>
<?php $c_92d9e8 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_92d9e8=false;}if($c_92d9e8 ):?>

          <?php $_750987_old_params['_eb1402']=$_750987_local_params;$_750987_old_vars['_eb1402']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-comments" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_750987_local_params=$_750987_old_params['_eb1402'];$_750987_local_vars=$_750987_old_vars['_eb1402'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_750987_old_params['_b35e40']=$_750987_local_params;$_750987_old_vars['_b35e40']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_750987_local_params=$_750987_old_params['_b35e40'];$_750987_local_vars=$_750987_old_vars['_b35e40'];?>

        <?php endif;$c_92d9e8=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_92d9e8'];$_750987_local_vars=$_750987_old_vars['_92d9e8'];?>

        <?php $c_dd1c33=null;$_750987_old_params['_dd1c33']=$_750987_local_params;$_750987_old_vars['_dd1c33']=$_750987_local_vars;$a_dd1c33=$this->setup_args(['menu_type'=>'5','permission'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_dd1c33=-1;$r_dd1c33=true;while($r_dd1c33===true):$r_dd1c33=($_dd1c33!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_dd1c33,$c_dd1c33,$this,$r_dd1c33,++$_dd1c33,'_dd1c33');ob_start();?>
<?php $c_dd1c33 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_dd1c33=false;}if($c_dd1c33 ):?>

          <?php $_750987_old_params['_9cd288']=$_750987_local_params;$_750987_old_vars['_9cd288']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-user-plus" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_750987_local_params=$_750987_old_params['_9cd288'];$_750987_local_vars=$_750987_old_vars['_9cd288'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_750987_old_params['_9fe428']=$_750987_local_params;$_750987_old_vars['_9fe428']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_750987_local_params=$_750987_old_params['_9fe428'];$_750987_local_vars=$_750987_old_vars['_9fe428'];?>

        <?php endif;$c_dd1c33=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_dd1c33'];$_750987_local_vars=$_750987_old_vars['_dd1c33'];?>

        <?php $c_777510=null;$_750987_old_params['_777510']=$_750987_local_params;$_750987_old_vars['_777510']=$_750987_local_vars;$a_777510=$this->setup_args(['name'=>'system_menus','this_tag'=>'loop'],null,$this);$_777510=-1;$r_777510=true;while($r_777510===true):$r_777510=($_777510!==-1)?false:true;echo $this->block_loop($a_777510,$c_777510,$this,$r_777510,++$_777510,'_777510');ob_start();?>
<?php $c_777510 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_777510=false;}if($c_777510 ):?>

          <?php $_750987_old_params['_b4863d']=$_750987_local_params;$_750987_old_vars['_b4863d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <?php $_750987_old_params['_52c6f0']=$_750987_local_params;$_750987_old_vars['_52c6f0']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<div class="badge-icon-badge"></div><?php elseif($this->conditional_elseif($this->setup_args(['name'=>'plugin_upgrade_count','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
<div class="badge-icon-badge"></div><?php endif;$_750987_local_params=$_750987_old_params['_52c6f0'];$_750987_local_vars=$_750987_old_vars['_52c6f0'];?>

            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-plug" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_750987_local_params=$_750987_old_params['_b4863d'];$_750987_local_vars=$_750987_old_vars['_b4863d'];?>

            <a <?php $_750987_old_params['_6ba40c']=$_750987_local_params;$_750987_old_vars['_6ba40c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
target="<?php echo $this->function_var($this->setup_args(['name'=>'menu_target','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_750987_local_params=$_750987_old_params['_6ba40c'];$_750987_local_vars=$_750987_old_vars['_6ba40c'];?>
 class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=<?php echo $this->function_var($this->setup_args(['name'=>'menu_mode','this_tag'=>'var'],null,$this),$this)?>
<?php $c_c954e4=null;$_750987_old_params['_c954e4']=$_750987_local_params;$_750987_old_vars['_c954e4']=$_750987_local_vars;$a_c954e4=$this->setup_args(['name'=>'menu_args','this_tag'=>'loop'],null,$this);$_c954e4=-1;$r_c954e4=true;while($r_c954e4===true):$r_c954e4=($_c954e4!==-1)?false:true;echo $this->block_loop($a_c954e4,$c_c954e4,$this,$r_c954e4,++$_c954e4,'_c954e4');ob_start();?>
<?php $c_c954e4 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_c954e4=false;}if($c_c954e4 ):?>
&amp;<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
=<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$c_c954e4=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_c954e4'];$_750987_local_vars=$_750987_old_vars['_c954e4'];?>
">
            <?php echo $this->function_var($this->setup_args(['name'=>'menu_label','this_tag'=>'var'],null,$this),$this)?>

            <?php $_750987_old_params['_265df2']=$_750987_local_params;$_750987_old_vars['_265df2']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_mode','eq'=>'manage_scheme','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_b3b3c2']=$_750987_local_params;$_750987_old_vars['_b3b3c2']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'scheme_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="badge-icon-badge badge-icon-middle"></div>
            <?php endif;$_750987_local_params=$_750987_old_params['_b3b3c2'];$_750987_local_vars=$_750987_old_vars['_b3b3c2'];?>

            <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'menu_mode','eq'=>'manage_plugins','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_d94635']=$_750987_local_params;$_750987_old_vars['_d94635']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'plugin_upgrade_count','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="badge-icon-badge badge-icon-middle"></div>
            <?php endif;$_750987_local_params=$_750987_old_params['_d94635'];$_750987_local_vars=$_750987_old_vars['_d94635'];?>

            <?php endif;$_750987_local_params=$_750987_old_params['_265df2'];$_750987_local_vars=$_750987_old_vars['_265df2'];?>

            </a>
          <?php $_750987_old_params['_ddf589']=$_750987_local_params;$_750987_old_vars['_ddf589']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_750987_local_params=$_750987_old_params['_ddf589'];$_750987_local_vars=$_750987_old_vars['_ddf589'];?>

        <?php endif;$c_777510=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_777510'];$_750987_local_vars=$_750987_old_vars['_777510'];?>

        </ul>
        <div class="header-util">
          <?php echo $this->function_var($this->setup_args(['name'=>'add_header_system','this_tag'=>'var'],null,$this),$this)?>

          <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'show_both','setvar'=>'__show_both','this_tag'=>'property'],null,$this),$this),$this->setup_args('__show_both','setvar',$this),$this,'setvar')?>

          <a href="<?php $_750987_old_params['_1eebf2']=$_750987_local_params;$_750987_old_vars['_1eebf2']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_8acf35']=$_750987_local_params;$_750987_old_vars['_8acf35']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'site_url','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'link_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_8acf35'];$_750987_local_vars=$_750987_old_vars['_8acf35'];?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'site_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_1eebf2'];$_750987_local_vars=$_750987_old_vars['_1eebf2'];?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-external-link-square" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_750987_old_params['_e418af']=$_750987_local_params;$_750987_old_vars['_e418af']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'link_url','this_tag'=>'var'],null,$this),$this)?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-globe" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_750987_local_params=$_750987_old_params['_e418af'];$_750987_local_vars=$_750987_old_vars['_e418af'];?>

        <?php $_750987_old_params['_0d7ab1']=$_750987_local_params;$_750987_old_vars['_0d7ab1']=$_750987_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'can_rebuild','workspace_id'=>'0','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

        <?php $c_400ce9=null;$_750987_old_params['_400ce9']=$_750987_local_params;$_750987_old_vars['_400ce9']=$_750987_local_vars;$a_400ce9=$this->setup_args(['model'=>'urlmapping','count'=>'model','group'=>'\'workspace_id\',\'model\'','workspace_id'=>'0','limit'=>'1','this_tag'=>'countgroupby'],null,$this);$_400ce9=-1;$r_400ce9=true;while($r_400ce9===true):$r_400ce9=($_400ce9!==-1)?false:true;echo $this->component('PTTags')->hdlr_countgroupby($a_400ce9,$c_400ce9,$this,$r_400ce9,++$_400ce9,'_400ce9');ob_start();?>
<?php $c_400ce9 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_400ce9=false;}if($c_400ce9 ):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild" class="popup btn btn-sm btn-secondary my-2 my-sm-0 rebuild-popup" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-refresh" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$c_400ce9=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_400ce9'];$_750987_local_vars=$_750987_old_vars['_400ce9'];?>

        <?php endif;$_750987_local_params=$_750987_old_params['_0d7ab1'];$_750987_local_vars=$_750987_old_vars['_0d7ab1'];?>

          <a style="padding:<?php $_750987_old_params['_a026fb']=$_750987_local_params;$_750987_old_vars['_a026fb']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_photo','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
0 3px<?php else:?>
4px<?php endif;$_750987_local_params=$_750987_old_params['_a026fb'];$_750987_local_vars=$_750987_old_vars['_a026fb'];?>
" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=user&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'user_id','this_tag'=>'var'],null,$this),$this)?>
&amp;_profile=1" class="btn btn-sm btn-secondary my-2 my-sm-0 profile-btn" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
">
          <?php $_750987_old_params['_59a1c7']=$_750987_local_params;$_750987_old_vars['_59a1c7']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_photo','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery.lazyload.min.js"></script>
            <img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif" class="lazy" style="Border-radius:50%" data-original="<?php echo $this->function_var($this->setup_args(['name'=>'user_photo','this_tag'=>'var'],null,$this),$this)?>
" width="26" height="26" alt="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
">
            <script>$(function() { $('img.lazy').lazyload(); });</script>
          <?php else:?>

            <i class="fa fa-user-circle" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
</span>
          <?php endif;$_750987_local_params=$_750987_old_params['_59a1c7'];$_750987_local_vars=$_750987_old_vars['_59a1c7'];?>

          </a>
          <a id="__logout" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=logout" class="btn btn-sm btn-secondary my-2 my-sm-0 logout-btn" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_750987_old_params['_14d2d1']=$_750987_local_params;$_750987_old_vars['_14d2d1']=$_750987_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=config" class="btn btn-sm btn-secondary my-2 my-sm-0 config-system" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Config','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-wrench" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Config','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_750987_local_params=$_750987_old_params['_14d2d1'];$_750987_local_vars=$_750987_old_vars['_14d2d1'];?>

        </div>
      </div>
        <?php endif;$_750987_local_params=$_750987_old_params['_cc8e33'];$_750987_local_vars=$_750987_old_vars['_cc8e33'];?>

      <?php endif;$_750987_local_params=$_750987_old_params['_0966d7'];$_750987_local_vars=$_750987_old_vars['_0966d7'];?>

      <?php endif;$_750987_local_params=$_750987_old_params['_2c7a0f'];$_750987_local_vars=$_750987_old_vars['_2c7a0f'];?>

      <?php $_750987_old_params['_49525e']=$_750987_local_params;$_750987_old_vars['_49525e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'member_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <div class="collapse navbar-collapse" id="navbars" <?php $_750987_old_params['_4b99ee']=$_750987_local_params;$_750987_old_vars['_4b99ee']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_counter','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-left:-66px;z-index:0"<?php endif;$_750987_local_params=$_750987_old_params['_4b99ee'];$_750987_local_vars=$_750987_old_vars['_4b99ee'];?>
>
        <ul class="nav-pills navbar-nav mr-auto" id="system-panel"></ul>
          <div class="header-util">
          <?php echo $this->function_var($this->setup_args(['name'=>'add_header_workspace','this_tag'=>'var'],null,$this),$this)?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=logout<?php $_750987_old_params['_d00508']=$_750987_local_params;$_750987_old_vars['_d00508']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_d00508'];$_750987_local_vars=$_750987_old_vars['_d00508'];?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 logout-btn" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Logout','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=edit_profile<?php $_750987_old_params['_f30681']=$_750987_local_params;$_750987_old_vars['_f30681']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_f30681'];$_750987_local_vars=$_750987_old_vars['_f30681'];?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 profile-btn" data-toggle="tooltip" data-placement="left" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Profile','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          </div>
        </div>
      <?php endif;$_750987_local_params=$_750987_old_params['_49525e'];$_750987_local_vars=$_750987_old_vars['_49525e'];?>

    </nav>
  <?php $_750987_old_params['_3816d2']=$_750987_local_params;$_750987_old_vars['_3816d2']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php $_750987_old_params['_7e0851']=$_750987_local_params;$_750987_old_vars['_7e0851']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_1fc8f6']=$_750987_local_params;$_750987_old_vars['_1fc8f6']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_12f2e2']=$_750987_local_params;$_750987_old_vars['_12f2e2']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <nav class="bar navbar navbar-toggleable-md navbar-inverse bg-inverse workspace-bar"<?php $_750987_old_params['_0f535f']=$_750987_local_params;$_750987_old_vars['_0f535f']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 style="z-index:1029;"<?php endif;$_750987_local_params=$_750987_old_params['_0f535f'];$_750987_local_vars=$_750987_old_vars['_0f535f'];?>
>
      <?php $_750987_old_params['_ce6d7c']=$_750987_local_params;$_750987_old_vars['_ce6d7c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <button style="background-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important; color: <?php echo $this->function_var($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'var'],null,$this),$this)?>
 !important;" class="navbar-toggler navbar-toggler-right btn-ws" type="button" data-toggle="collapse" data-target="#navbars-ws" aria-controls="navbars" aria-expanded="false" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Toggle Navigation','this_tag'=>'trans'],null,$this),$this)?>
</span>
      </button>
      <?php endif;$_750987_local_params=$_750987_old_params['_ce6d7c'];$_750987_local_vars=$_750987_old_vars['_ce6d7c'];?>

      <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'workspace_name','count_chars'=>'','setvar'=>'workspace_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('workspace_chars','setvar',$this),$this,'setvar')?>
<a class="navbar-brand brand-workspace" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=dashboard&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
"<?php $_750987_old_params['_1ea058']=$_750987_local_params;$_750987_old_vars['_1ea058']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 title="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php endif;$_750987_local_params=$_750987_old_params['_1ea058'];$_750987_local_vars=$_750987_old_vars['_1ea058'];?>
><?php echo $this->modifier_trim_to(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'','trim_to'=>'20+...','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('20+...','trim_to',$this),$this,'trim_to')?>
</a>
      <div class="collapse navbar-collapse" id="navbars-ws">
        <ul class="nav-pills navbar-nav mr-auto">
          <?php $c_ca1722=null;$_750987_old_params['_ca1722']=$_750987_local_params;$_750987_old_vars['_ca1722']=$_750987_local_vars;$a_ca1722=$this->setup_args(['type'=>'display_space','menu_type'=>'6','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_ca1722=-1;$r_ca1722=true;while($r_ca1722===true):$r_ca1722=($_ca1722!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_ca1722,$c_ca1722,$this,$r_ca1722,++$_ca1722,'_ca1722');ob_start();?>
<?php $c_ca1722 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_ca1722=false;}if($c_ca1722 ):?>

            <?php $_750987_old_params['_07f0cd']=$_750987_local_params;$_750987_old_vars['_07f0cd']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <li class="nav-item dropdown">
              <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-bookmark" aria-hidden="true"></i>
                <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Favorites','this_tag'=>'trans'],null,$this),$this)?>
</span>
              </a>
              <div class="dropdown-menu">
            <?php endif;$_750987_local_params=$_750987_old_params['_07f0cd'];$_750987_local_vars=$_750987_old_vars['_07f0cd'];?>

              <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_750987_old_params['_e3760c']=$_750987_local_params;$_750987_old_vars['_e3760c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_e3760c'];$_750987_local_vars=$_750987_old_vars['_e3760c'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
            <?php $_750987_old_params['_4d4e75']=$_750987_local_params;$_750987_old_vars['_4d4e75']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
              </li>
            <?php endif;$_750987_local_params=$_750987_old_params['_4d4e75'];$_750987_local_vars=$_750987_old_vars['_4d4e75'];?>

          <?php endif;$c_ca1722=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_ca1722'];$_750987_local_vars=$_750987_old_vars['_ca1722'];?>

        <?php $c_5bd08e=null;$_750987_old_params['_5bd08e']=$_750987_local_params;$_750987_old_vars['_5bd08e']=$_750987_local_vars;$a_5bd08e=$this->setup_args(['limit'=>'$panel_limit','type'=>'display_space','menu_type'=>'1','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_5bd08e=-1;$r_5bd08e=true;while($r_5bd08e===true):$r_5bd08e=($_5bd08e!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_5bd08e,$c_5bd08e,$this,$r_5bd08e,++$_5bd08e,'_5bd08e');ob_start();?>
<?php $c_5bd08e = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_5bd08e=false;}if($c_5bd08e ):?>

          <li class="nav-item nav-item-ws <?php $_750987_old_params['_c7dd30']=$_750987_local_params;$_750987_old_vars['_c7dd30']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'$model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
active<?php endif;$_750987_local_params=$_750987_old_params['_c7dd30'];$_750987_local_vars=$_750987_old_vars['_c7dd30'];?>
">
            <?php echo $this->modifier_setvar($this->modifier_count_chars($this->function_var($this->setup_args(['name'=>'label','count_chars'=>'','setvar'=>'count_chars','this_tag'=>'var'],null,$this),$this),$this->setup_args('','count_chars',$this),$this,'count_chars'),$this->setup_args('count_chars','setvar',$this),$this,'setvar')?>
<a class="nav-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_750987_old_params['_81112c']=$_750987_local_params;$_750987_old_vars['_81112c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_81112c'];$_750987_local_vars=$_750987_old_vars['_81112c'];?>
"<?php $_750987_old_params['_46e1ed']=$_750987_local_params;$_750987_old_vars['_46e1ed']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'count_chars','gt'=>'18','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 data-toggle="tooltip" data-placement="right" title="<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
"<?php endif;$_750987_local_params=$_750987_old_params['_46e1ed'];$_750987_local_vars=$_750987_old_vars['_46e1ed'];?>
><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          </li>
        <?php endif;$c_5bd08e=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_5bd08e'];$_750987_local_vars=$_750987_old_vars['_5bd08e'];?>

        <?php $c_9332b2=null;$_750987_old_params['_9332b2']=$_750987_local_params;$_750987_old_vars['_9332b2']=$_750987_local_vars;$a_9332b2=$this->setup_args(['limit'=>'100000','offset'=>'$panel_limit','type'=>'display_space','menu_type'=>'1','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_9332b2=-1;$r_9332b2=true;while($r_9332b2===true):$r_9332b2=($_9332b2!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_9332b2,$c_9332b2,$this,$r_9332b2,++$_9332b2,'_9332b2');ob_start();?>
<?php $c_9332b2 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_9332b2=false;}if($c_9332b2 ):?>

          <?php $_750987_old_params['_8946c4']=$_750987_local_params;$_750987_old_vars['_8946c4']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-window-maximize" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Panel','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_750987_local_params=$_750987_old_params['_8946c4'];$_750987_local_vars=$_750987_old_vars['_8946c4'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_750987_old_params['_833391']=$_750987_local_params;$_750987_old_vars['_833391']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_833391'];$_750987_local_vars=$_750987_old_vars['_833391'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_750987_old_params['_3ca3ad']=$_750987_local_params;$_750987_old_vars['_3ca3ad']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_750987_local_params=$_750987_old_params['_3ca3ad'];$_750987_local_vars=$_750987_old_vars['_3ca3ad'];?>

        <?php endif;$c_9332b2=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_9332b2'];$_750987_local_vars=$_750987_old_vars['_9332b2'];?>

        <?php $c_bf14db=null;$_750987_old_params['_bf14db']=$_750987_local_params;$_750987_old_vars['_bf14db']=$_750987_local_vars;$a_bf14db=$this->setup_args(['type'=>'display_space','menu_type'=>'2','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_bf14db=-1;$r_bf14db=true;while($r_bf14db===true):$r_bf14db=($_bf14db!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_bf14db,$c_bf14db,$this,$r_bf14db,++$_bf14db,'_bf14db');ob_start();?>
<?php $c_bf14db = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_bf14db=false;}if($c_bf14db ):?>

          <?php $_750987_old_params['_97d846']=$_750987_local_params;$_750987_old_vars['_97d846']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-cog" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_750987_local_params=$_750987_old_params['_97d846'];$_750987_local_vars=$_750987_old_vars['_97d846'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_750987_old_params['_549763']=$_750987_local_params;$_750987_old_vars['_549763']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_549763'];$_750987_local_vars=$_750987_old_vars['_549763'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_750987_old_params['_c59d84']=$_750987_local_params;$_750987_old_vars['_c59d84']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_750987_local_params=$_750987_old_params['_c59d84'];$_750987_local_vars=$_750987_old_vars['_c59d84'];?>

        <?php endif;$c_bf14db=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_bf14db'];$_750987_local_vars=$_750987_old_vars['_bf14db'];?>

        <?php $c_c1ffa2=null;$_750987_old_params['_c1ffa2']=$_750987_local_params;$_750987_old_vars['_c1ffa2']=$_750987_local_vars;$a_c1ffa2=$this->setup_args(['type'=>'display_space','menu_type'=>'3','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_c1ffa2=-1;$r_c1ffa2=true;while($r_c1ffa2===true):$r_c1ffa2=($_c1ffa2!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_c1ffa2,$c_c1ffa2,$this,$r_c1ffa2,++$_c1ffa2,'_c1ffa2');ob_start();?>
<?php $c_c1ffa2 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_c1ffa2=false;}if($c_c1ffa2 ):?>

          <?php $_750987_old_params['_14a690']=$_750987_local_params;$_750987_old_vars['_14a690']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-database" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Read-only Objects','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_750987_local_params=$_750987_old_params['_14a690'];$_750987_local_vars=$_750987_old_vars['_14a690'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_750987_old_params['_3d04f1']=$_750987_local_params;$_750987_old_vars['_3d04f1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_3d04f1'];$_750987_local_vars=$_750987_old_vars['_3d04f1'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_750987_old_params['_208b80']=$_750987_local_params;$_750987_old_vars['_208b80']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_750987_local_params=$_750987_old_params['_208b80'];$_750987_local_vars=$_750987_old_vars['_208b80'];?>

        <?php endif;$c_c1ffa2=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_c1ffa2'];$_750987_local_vars=$_750987_old_vars['_c1ffa2'];?>

        <?php $c_db00dd=null;$_750987_old_params['_db00dd']=$_750987_local_params;$_750987_old_vars['_db00dd']=$_750987_local_vars;$a_db00dd=$this->setup_args(['type'=>'display_space','menu_type'=>'4','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_db00dd=-1;$r_db00dd=true;while($r_db00dd===true):$r_db00dd=($_db00dd!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_db00dd,$c_db00dd,$this,$r_db00dd,++$_db00dd,'_db00dd');ob_start();?>
<?php $c_db00dd = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_db00dd=false;}if($c_db00dd ):?>

          <?php $_750987_old_params['_2fc2ca']=$_750987_local_params;$_750987_old_vars['_2fc2ca']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-comments" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Communication','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_750987_local_params=$_750987_old_params['_2fc2ca'];$_750987_local_vars=$_750987_old_vars['_2fc2ca'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_750987_old_params['_fa38db']=$_750987_local_params;$_750987_old_vars['_fa38db']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_fa38db'];$_750987_local_vars=$_750987_old_vars['_fa38db'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_750987_old_params['_4fdba1']=$_750987_local_params;$_750987_old_vars['_4fdba1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_750987_local_params=$_750987_old_params['_4fdba1'];$_750987_local_vars=$_750987_old_vars['_4fdba1'];?>

        <?php endif;$c_db00dd=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_db00dd'];$_750987_local_vars=$_750987_old_vars['_db00dd'];?>

        <?php $c_5e9f29=null;$_750987_old_params['_5e9f29']=$_750987_local_params;$_750987_old_vars['_5e9f29']=$_750987_local_vars;$a_5e9f29=$this->setup_args(['type'=>'display_space','menu_type'=>'5','permission'=>'1','workspace_perm'=>'1','cols'=>'id,name,plural','this_tag'=>'tables'],null,$this);$_5e9f29=-1;$r_5e9f29=true;while($r_5e9f29===true):$r_5e9f29=($_5e9f29!==-1)?false:true;echo $this->component('PTTags')->hdlr_tables($a_5e9f29,$c_5e9f29,$this,$r_5e9f29,++$_5e9f29,'_5e9f29');ob_start();?>
<?php $c_5e9f29 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_5e9f29=false;}if($c_5e9f29 ):?>

          <?php $_750987_old_params['_41660c']=$_750987_local_params;$_750987_old_vars['_41660c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-user-plus" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'User and Permission','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_750987_local_params=$_750987_old_params['_41660c'];$_750987_local_vars=$_750987_old_vars['_41660c'];?>

            <a class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_750987_old_params['_b7543f']=$_750987_local_params;$_750987_old_vars['_b7543f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_b7543f'];$_750987_local_vars=$_750987_old_vars['_b7543f'];?>
"><?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'label','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
</a>
          <?php $_750987_old_params['_69f233']=$_750987_local_params;$_750987_old_vars['_69f233']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_750987_local_params=$_750987_old_params['_69f233'];$_750987_local_vars=$_750987_old_vars['_69f233'];?>

        <?php endif;$c_5e9f29=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_5e9f29'];$_750987_local_vars=$_750987_old_vars['_5e9f29'];?>

        <?php $c_72fd74=null;$_750987_old_params['_72fd74']=$_750987_local_params;$_750987_old_vars['_72fd74']=$_750987_local_vars;$a_72fd74=$this->setup_args(['name'=>'workspace_menus','this_tag'=>'loop'],null,$this);$_72fd74=-1;$r_72fd74=true;while($r_72fd74===true):$r_72fd74=($_72fd74!==-1)?false:true;echo $this->block_loop($a_72fd74,$c_72fd74,$this,$r_72fd74,++$_72fd74,'_72fd74');ob_start();?>
<?php $c_72fd74 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_72fd74=false;}if($c_72fd74 ):?>

          <?php $_750987_old_params['_fcdb1d']=$_750987_local_params;$_750987_old_vars['_fcdb1d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <li class="nav-item dropdown">
            <a aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              <i data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
" class="fa fa-plug" aria-hidden="true"></i>
              <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Tools','this_tag'=>'trans'],null,$this),$this)?>
</span>
            </a>
            <div class="dropdown-menu">
          <?php endif;$_750987_local_params=$_750987_old_params['_fcdb1d'];$_750987_local_vars=$_750987_old_vars['_fcdb1d'];?>

            <a <?php $_750987_old_params['_5d2997']=$_750987_local_params;$_750987_old_vars['_5d2997']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
target="<?php echo $this->function_var($this->setup_args(['name'=>'menu_target','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_750987_local_params=$_750987_old_params['_5d2997'];$_750987_local_vars=$_750987_old_vars['_5d2997'];?>
 class="dropdown-item dropdown-sub btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=<?php echo $this->function_var($this->setup_args(['name'=>'menu_mode','this_tag'=>'var'],null,$this),$this)?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_c8914b=null;$_750987_old_params['_c8914b']=$_750987_local_params;$_750987_old_vars['_c8914b']=$_750987_local_vars;$a_c8914b=$this->setup_args(['name'=>'menu_args','this_tag'=>'loop'],null,$this);$_c8914b=-1;$r_c8914b=true;while($r_c8914b===true):$r_c8914b=($_c8914b!==-1)?false:true;echo $this->block_loop($a_c8914b,$c_c8914b,$this,$r_c8914b,++$_c8914b,'_c8914b');ob_start();?>
<?php $c_c8914b = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_c8914b=false;}if($c_c8914b ):?>
&amp;<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
=<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$c_c8914b=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_c8914b'];$_750987_local_vars=$_750987_old_vars['_c8914b'];?>
"><?php echo $this->function_var($this->setup_args(['name'=>'menu_label','this_tag'=>'var'],null,$this),$this)?>
</a>
          <?php $_750987_old_params['_147557']=$_750987_local_params;$_750987_old_vars['_147557']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            </div>
            </li>
          <?php endif;$_750987_local_params=$_750987_old_params['_147557'];$_750987_local_vars=$_750987_old_vars['_147557'];?>

        <?php endif;$c_72fd74=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_72fd74'];$_750987_local_vars=$_750987_old_vars['_72fd74'];?>

        </ul>
        <div class="header-util">
          <a href="<?php $_750987_old_params['_9dbcf4']=$_750987_local_params;$_750987_old_vars['_9dbcf4']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_756c4a']=$_750987_local_params;$_750987_old_vars['_756c4a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_url','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_756c4a'];$_750987_local_vars=$_750987_old_vars['_756c4a'];?>
<?php else:?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_url','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_9dbcf4'];$_750987_local_vars=$_750987_old_vars['_9dbcf4'];?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-external-link-square" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php $_750987_old_params['_406a67']=$_750987_local_params;$_750987_old_vars['_406a67']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_72b0eb']=$_750987_local_params;$_750987_old_vars['_72b0eb']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_link_url','this_tag'=>'var'],null,$this),$this)?>
" target="_blank" class="btn btn-sm btn-secondary my-2 my-sm-0 view-external" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-globe" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'View Published','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_750987_local_params=$_750987_old_params['_72b0eb'];$_750987_local_vars=$_750987_old_vars['_72b0eb'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_406a67'];$_750987_local_vars=$_750987_old_vars['_406a67'];?>

        <?php $_750987_old_params['_c1f67a']=$_750987_local_params;$_750987_old_vars['_c1f67a']=$_750987_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'can_rebuild','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

        <?php $c_23754e=null;$_750987_old_params['_23754e']=$_750987_local_params;$_750987_old_vars['_23754e']=$_750987_local_vars;$a_23754e=$this->setup_args(['model'=>'urlmapping','count'=>'model','group'=>'\'workspace_id\',\'model\'','workspace_id'=>'$workspace_id','limit'=>'1','this_tag'=>'countgroupby'],null,$this);$_23754e=-1;$r_23754e=true;while($r_23754e===true):$r_23754e=($_23754e!==-1)?false:true;echo $this->component('PTTags')->hdlr_countgroupby($a_23754e,$c_23754e,$this,$r_23754e,++$_23754e,'_23754e');ob_start();?>
<?php $c_23754e = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_23754e=false;}if($c_23754e ):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
" class="popup btn btn-sm btn-secondary my-2 my-sm-0 rebuild-popup" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-refresh" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Rebuild','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$c_23754e=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_23754e'];$_750987_local_vars=$_750987_old_vars['_23754e'];?>

        <?php endif;$_750987_local_params=$_750987_old_params['_c1f67a'];$_750987_local_vars=$_750987_old_vars['_c1f67a'];?>

        <?php $_750987_old_params['_6ce874']=$_750987_local_params;$_750987_old_vars['_6ce874']=$_750987_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'edit','model'=>'workspace','id'=>'$workspace_id','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

          <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=workspace&amp;id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
" class="btn btn-sm btn-secondary my-2 my-sm-0 config-workspace" data-toggle="tooltip" data-placement="bottom" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Settings','this_tag'=>'trans'],null,$this),$this)?>
">
            <i class="fa fa-wrench" aria-hidden="true"></i>
            <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'WorkSpace Settings','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$_750987_local_params=$_750987_old_params['_6ce874'];$_750987_local_vars=$_750987_old_vars['_6ce874'];?>

        </div>
      </div>
    </nav>
      <?php endif;$_750987_local_params=$_750987_old_params['_12f2e2'];$_750987_local_vars=$_750987_old_vars['_12f2e2'];?>

    <?php endif;$_750987_local_params=$_750987_old_params['_1fc8f6'];$_750987_local_vars=$_750987_old_vars['_1fc8f6'];?>

<?php $_750987_old_params['_c62be2']=$_750987_local_params;$_750987_old_vars['_c62be2']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  </div>
<?php endif;$_750987_local_params=$_750987_old_params['_c62be2'];$_750987_local_vars=$_750987_old_vars['_c62be2'];?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'can_action','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'disp_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_750987_old_params['_01f642']=$_750987_local_params;$_750987_old_vars['_01f642']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'child_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_0ecfeb']=$_750987_local_params;$_750987_old_vars['_0ecfeb']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_750987_local_params=$_750987_old_params['_0ecfeb'];$_750987_local_vars=$_750987_old_vars['_0ecfeb'];?>

    <?php endif;$_750987_local_params=$_750987_old_params['_01f642'];$_750987_local_vars=$_750987_old_vars['_01f642'];?>

    <?php $_750987_old_params['_25ebd2']=$_750987_local_params;$_750987_old_vars['_25ebd2']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_750987_local_params=$_750987_old_params['_25ebd2'];$_750987_local_vars=$_750987_old_vars['_25ebd2'];?>

    <?php $_750987_old_params['_18e527']=$_750987_local_params;$_750987_old_vars['_18e527']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_2831da']=$_750987_local_params;$_750987_old_vars['_2831da']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','ne'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_750987_local_params=$_750987_old_params['_2831da'];$_750987_local_vars=$_750987_old_vars['_2831da'];?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'comment','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'attachmentfile','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'contact','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_750987_local_params=$_750987_old_params['_18e527'];$_750987_local_vars=$_750987_old_vars['_18e527'];?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'output_container','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <div class="container-fluid">
    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_750987_old_params['_6807dc']=$_750987_local_params;$_750987_old_vars['_6807dc']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_750987_old_params['_7d3506']=$_750987_local_params;$_750987_old_vars['_7d3506']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_750987_old_params['_021211']=$_750987_local_params;$_750987_old_vars['_021211']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_67874e']=$_750987_local_params;$_750987_old_vars['_67874e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'time_step','setvar'=>'time_step','this_tag'=>'property'],null,$this),$this),$this->setup_args('time_step','setvar',$this),$this,'setvar')?>

      <div class="modal fade" id="filterOptions" tabindex="-1" role="dialog" aria-labelledby="listFiltersTitle" aria-hidden="true"
        style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="listFiltersTitle"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Filters','this_tag'=>'trans'],null,$this),$this)?>
</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <form id="list_filter_form" action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST">
            <input type="hidden" name="__mode" value="view" id="this_mode">
            <input type="hidden" name="_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="_type" value="list">
            <input type="hidden" name="_filter" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="_filter_id" id="_filter_id" value="">
            <input type="hidden" name="_save_filter_name" id="_save_filter_name" value="">
            <input type="hidden" name="_detach_filter" id="_detach_filter" value="">
            <input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">
            <input type="hidden" name="_system_filters_option" value="" id="_system_filters_option">
            <?php $_750987_old_params['_9d8dd6']=$_750987_local_params;$_750987_old_vars['_9d8dd6']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="single_select" value="1"><?php endif;$_750987_local_params=$_750987_old_params['_9d8dd6'];$_750987_local_vars=$_750987_old_vars['_9d8dd6'];?>

            <?php $_750987_old_params['_92b9a3']=$_750987_local_params;$_750987_old_vars['_92b9a3']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._from_scope','ne'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_from_scope" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php endif;$_750987_local_params=$_750987_old_params['_92b9a3'];$_750987_local_vars=$_750987_old_vars['_92b9a3'];?>

          <?php $_750987_old_params['_65a085']=$_750987_local_params;$_750987_old_vars['_65a085']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
          <?php endif;$_750987_local_params=$_750987_old_params['_65a085'];$_750987_local_vars=$_750987_old_vars['_65a085'];?>

          <?php $_750987_old_params['_f64307']=$_750987_local_params;$_750987_old_vars['_f64307']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="manage_revision" value="1">
          <?php endif;$_750987_local_params=$_750987_old_params['_f64307'];$_750987_local_vars=$_750987_old_vars['_f64307'];?>

          <?php $_750987_old_params['_137204']=$_750987_local_params;$_750987_old_vars['_137204']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="dialog_view" value="1">
            <?php $_750987_old_params['_fd30f9']=$_750987_local_params;$_750987_old_vars['_fd30f9']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_750987_local_params=$_750987_old_params['_fd30f9'];$_750987_local_vars=$_750987_old_vars['_fd30f9'];?>

          <?php $_750987_old_params['_66522e']=$_750987_local_params;$_750987_old_vars['_66522e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="select_system_filters" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="_system_filters_option" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="insert" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="insert_editor" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert_editor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="_filter" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._filter','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php endif;$_750987_local_params=$_750987_old_params['_66522e'];$_750987_local_vars=$_750987_old_vars['_66522e'];?>

            <?php $_750987_old_params['_1e1cd4']=$_750987_local_params;$_750987_old_vars['_1e1cd4']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
              <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_750987_local_params=$_750987_old_params['_1e1cd4'];$_750987_local_vars=$_750987_old_vars['_1e1cd4'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_137204'];$_750987_local_vars=$_750987_old_vars['_137204'];?>

          <?php $_750987_old_params['_eb8ad5']=$_750987_local_params;$_750987_old_vars['_eb8ad5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_select" value="1">
          <?php endif;$_750987_local_params=$_750987_old_params['_eb8ad5'];$_750987_local_vars=$_750987_old_vars['_eb8ad5'];?>

          <?php $_750987_old_params['_696a52']=$_750987_local_params;$_750987_old_vars['_696a52']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="selected_ids" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="from_obj" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.from_obj','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php $_750987_old_params['_82d6b7']=$_750987_local_params;$_750987_old_vars['_82d6b7']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="select_add" value="1">
          <?php endif;$_750987_local_params=$_750987_old_params['_82d6b7'];$_750987_local_vars=$_750987_old_vars['_82d6b7'];?>

          <?php $_750987_old_params['_c311ea']=$_750987_local_params;$_750987_old_vars['_c311ea']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ids_only','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ids_only" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ids_only','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php endif;$_750987_local_params=$_750987_old_params['_c311ea'];$_750987_local_vars=$_750987_old_vars['_c311ea'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_696a52'];$_750987_local_vars=$_750987_old_vars['_696a52'];?>

            <div class="modal-body">
              <div class="container-fluid">
                <?php $_750987_old_params['_20cc55']=$_750987_local_params;$_750987_old_vars['_20cc55']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <?php $c_b4f438=null;$_750987_old_params['_b4f438']=$_750987_local_params;$_750987_old_vars['_b4f438']=$_750987_local_vars;$a_b4f438=$this->setup_args(['name'=>'system_filters','this_tag'=>'loop'],null,$this);$_b4f438=-1;$r_b4f438=true;while($r_b4f438===true):$r_b4f438=($_b4f438!==-1)?false:true;echo $this->block_loop($a_b4f438,$c_b4f438,$this,$r_b4f438,++$_b4f438,'_b4f438');ob_start();?>
<?php $c_b4f438 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_b4f438=false;}if($c_b4f438 ):?>

                      <?php $_750987_old_params['_8ca944']=$_750987_local_params;$_750987_old_vars['_8ca944']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select_system_filters" id="select_system_filters">
                        <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php endif;$_750987_local_params=$_750987_old_params['_8ca944'];$_750987_local_vars=$_750987_old_vars['_8ca944'];?>

                        <option <?php $_750987_old_params['_47ba23']=$_750987_local_params;$_750987_old_vars['_47ba23']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'input','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
data-input="1" data-hint="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'hint','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php endif;$_750987_local_params=$_750987_old_params['_47ba23'];$_750987_local_vars=$_750987_old_vars['_47ba23'];?>
data-option="<?php echo $this->function_var($this->setup_args(['name'=>'option','this_tag'=>'var'],null,$this),$this)?>
" <?php $_750987_old_params['_a8c7e6']=$_750987_local_params;$_750987_old_vars['_a8c7e6']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_system_filter','eq'=>'$name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_750987_local_params=$_750987_old_params['_a8c7e6'];$_750987_local_vars=$_750987_old_vars['_a8c7e6'];?>
 value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php $_750987_old_params['_3a10f5']=$_750987_local_params;$_750987_old_vars['_3a10f5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        </select>
                      <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="system_filter-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                      <?php endif;$_750987_local_params=$_750987_old_params['_3a10f5'];$_750987_local_vars=$_750987_old_vars['_3a10f5'];?>

                    <?php endif;$c_b4f438=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_b4f438'];$_750987_local_vars=$_750987_old_vars['_b4f438'];?>

                  </div>
                </div>
                <?php endif;$_750987_local_params=$_750987_old_params['_20cc55'];$_750987_local_vars=$_750987_old_vars['_20cc55'];?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Your Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select-user_filters" id="select-user_filters">
                      <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php $c_5754ea=null;$_750987_old_params['_5754ea']=$_750987_local_params;$_750987_old_vars['_5754ea']=$_750987_local_vars;$a_5754ea=$this->setup_args(['model'=>'option','kind'=>'list_filter','key'=>'$model','user_id'=>'$user_id','workspace_id'=>'$workspace_id','this_tag'=>'objectloop'],null,$this);$_5754ea=-1;$r_5754ea=true;while($r_5754ea===true):$r_5754ea=($_5754ea!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_5754ea,$c_5754ea,$this,$r_5754ea,++$_5754ea,'_5754ea');ob_start();?>
<?php $c_5754ea = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_5754ea=false;}if($c_5754ea ):?>

                      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_750987_old_params['_0cd6a7']=$_750987_local_params;$_750987_old_vars['_0cd6a7']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_filter_id','eq'=>'$id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_750987_local_params=$_750987_old_params['_0cd6a7'];$_750987_local_vars=$_750987_old_vars['_0cd6a7'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'value','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php endif;$c_5754ea=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_5754ea'];$_750987_local_vars=$_750987_old_vars['_5754ea'];?>

                      <option value="add_new_filter"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Add New Filter','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    </select>
                    <?php $_750987_old_params['_4ff646']=$_750987_local_params;$_750987_old_vars['_4ff646']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="filter-select-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <button type="button" class="delete-filter-elem hidden delete-bun-sm btn btn-secondary btn-sm filter-selecter-ctrl" id="filter-select-delete-button" class="close" data-dismiss="modal">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Delete','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    </button>
                    <?php endif;$_750987_local_params=$_750987_old_params['_4ff646'];$_750987_local_vars=$_750987_old_vars['_4ff646'];?>

                  </div>
                </div>
                <div class="row form-group new-filter-elem hidden">
                  <div class="col-md-3" style="float:left;"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" name="filters-selector" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" id="filters-selector">
                    <?php $c_5752e4=null;$_750987_old_params['_5752e4']=$_750987_local_params;$_750987_old_vars['_5752e4']=$_750987_local_vars;$a_5752e4=$this->setup_args(['name'=>'filter_options','this_tag'=>'loop'],null,$this);$_5752e4=-1;$r_5752e4=true;while($r_5752e4===true):$r_5752e4=($_5752e4!==-1)?false:true;echo $this->block_loop($a_5752e4,$c_5752e4,$this,$r_5752e4,++$_5752e4,'_5752e4');ob_start();?>
<?php $c_5752e4 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_5752e4=false;}if($c_5752e4 ):?>

                    <?php $_750987_old_params['_fcd629']=$_750987_local_params;$_750987_old_vars['_fcd629']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <option><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    <?php endif;$_750987_local_params=$_750987_old_params['_fcd629'];$_750987_local_vars=$_750987_old_vars['_fcd629'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" class="coltype_<?php $_750987_old_params['_85102c']=$_750987_local_params;$_750987_old_vars['_85102c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'created_by','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
reference<?php else:?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_85102c'];$_750987_local_vars=$_750987_old_vars['_85102c'];?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php endif;$c_5752e4=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_5752e4'];$_750987_local_vars=$_750987_old_vars['_5752e4'];?>

                    </select>
                   <button type="button" class="btn btn-sm btn-secondary filter-selecter-ctrl-apply" id="filter-add-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Add','this_tag'=>'trans'],null,$this),$this)?>
</button>
                  </div>
                </div>
                <div class="row form-group new-filter-elem">
                  <div class="col-md-12">
                    <div class="card hidden" id="filter-parant-block">
                      <ul class="list-group list-group-flush" id="filters-list">
                        <li class="list-group-item hidden" id="selector-tmpl-int">
                          <div class="form-inline">
                            <span class="selector_col"></span> 
                            &nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>' is ','this_tag'=>'trans'],null,$this),$this)?>

                              <input type="number" class="short-padding form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <select name="" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-sm">
                              <option value="eq"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="lt"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Less than','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="gt"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Grater than','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="ne"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Not Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="ge"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Greater Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="le"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Less Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                            </select>
                            <button type="button" class="btn btn-secondary btn-sm close-sm detach-filter detach-filter-btn" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </li>
                        <li class="list-group-item hidden" id="selector-tmpl-text">
                          <div class="form-inline">
                            <span class="selector_col"></span> 
                            &nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>' is ','this_tag'=>'trans'],null,$this),$this)?>

                              <input type="text" class="short-padding form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <select name="" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-sm">
                              <option value="ct"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Contains','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="nc"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Not Contains','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="eq"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="ne"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Not Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="bw"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Begin with','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="ew"><?php echo $this->function_trans($this->setup_args(['phrase'=>'End with','this_tag'=>'trans'],null,$this),$this)?>
</option>
                            </select>
                            <button type="button" class="btn btn-secondary btn-sm close-sm detach-filter detach-filter-btn" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </li>
                        <li class="list-group-item hidden" id="selector-tmpl-date">
                          <div class="form-inline">
                            <span class="selector_col"></span> 
                            &nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>' is ','this_tag'=>'trans'],null,$this),$this)?>

                              <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'published_on_default','setvar'=>'published_on_default','this_tag'=>'property'],null,$this),$this),$this->setup_args('published_on_default','setvar',$this),$this,'setvar')?>

                              <input type="datetime-local" step="<?php $_750987_old_params['_ed00bd']=$_750987_local_params;$_750987_old_vars['_ed00bd']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'time_step','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'time_step','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
1<?php endif;$_750987_local_params=$_750987_old_params['_ed00bd'];$_750987_local_vars=$_750987_old_vars['_ed00bd'];?>
" class="form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="" value="<?php $_750987_old_params['_40c0d1']=$_750987_local_params;$_750987_old_vars['_40c0d1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'published_on_default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_format_ts($this->function_date($this->setup_args(['format'=>'$published_on_default','format_ts'=>'Y-m-d\\TH:i:s','this_tag'=>'date'],null,$this),$this),$this->setup_args('Y-m-d\\\\TH:i:s','format_ts',$this),$this,'format_ts')?>
<?php endif;$_750987_local_params=$_750987_old_params['_40c0d1'];$_750987_local_vars=$_750987_old_vars['_40c0d1'];?>
">
                            <select name="" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-sm">
                              <option value="gt"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Newer than','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="lt"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Older than','this_tag'=>'trans'],null,$this),$this)?>
</option>
                            </select>
                            <button type="button" class="btn btn-secondary btn-sm close-sm detach-filter detach-filter-btn" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </li>
                        <li class="list-group-item hidden" id="selector-tmpl-status">
                          <div class="form-inline">
                            <span class="selector_col"></span> 
                            &nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>' is ','this_tag'=>'trans'],null,$this),$this)?>

                            <?php $_750987_old_params['_4a8cb5']=$_750987_local_params;$_750987_old_vars['_4a8cb5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'status_options','split'=>',','setvar'=>'status_label','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                            <?php else:?>

                              <?php $_750987_old_params['_8b487c']=$_750987_local_params;$_750987_old_vars['_8b487c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Draft,Review,Approval Pending,Reserved,Publish,Ended','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php else:?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Disable,Enable','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php endif;$_750987_local_params=$_750987_old_params['_8b487c'];$_750987_local_vars=$_750987_old_vars['_8b487c'];?>

                            <?php endif;$_750987_local_params=$_750987_old_params['_4a8cb5'];$_750987_local_vars=$_750987_old_vars['_4a8cb5'];?>

                            <select class="form-control form-control-sm custom-select short filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <?php $_750987_old_params['_465adf']=$_750987_local_params;$_750987_old_vars['_465adf']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                            <?php $c_f2a80c=null;$_750987_old_params['_f2a80c']=$_750987_local_params;$_750987_old_vars['_f2a80c']=$_750987_local_vars;$a_f2a80c=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_f2a80c=-1;$r_f2a80c=true;while($r_f2a80c===true):$r_f2a80c=($_f2a80c!==-1)?false:true;echo $this->block_loop($a_f2a80c,$c_f2a80c,$this,$r_f2a80c,++$_f2a80c,'_f2a80c');ob_start();?>
<?php $c_f2a80c = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_f2a80c=false;}if($c_f2a80c ):?>

                              <?php $_750987_old_params['_15e36b']=$_750987_local_params;$_750987_old_vars['_15e36b']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__index__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php $_750987_old_params['_6b3ec3']=$_750987_local_params;$_750987_old_vars['_6b3ec3']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__index__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_750987_local_params=$_750987_old_params['_6b3ec3'];$_750987_local_vars=$_750987_old_vars['_6b3ec3'];?>

                              <?php endif;$_750987_local_params=$_750987_old_params['_15e36b'];$_750987_local_vars=$_750987_old_vars['_15e36b'];?>

                            <?php endif;$c_f2a80c=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_f2a80c'];$_750987_local_vars=$_750987_old_vars['_f2a80c'];?>

                            <?php else:?>

                            <?php $c_e0a2a8=null;$_750987_old_params['_e0a2a8']=$_750987_local_params;$_750987_old_vars['_e0a2a8']=$_750987_local_vars;$a_e0a2a8=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_e0a2a8=-1;$r_e0a2a8=true;while($r_e0a2a8===true):$r_e0a2a8=($_e0a2a8!==-1)?false:true;echo $this->block_loop($a_e0a2a8,$c_e0a2a8,$this,$r_e0a2a8,++$_e0a2a8,'_e0a2a8');ob_start();?>
<?php $c_e0a2a8 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_e0a2a8=false;}if($c_e0a2a8 ):?>

                              <?php $_750987_old_params['_b5088c']=$_750987_local_params;$_750987_old_vars['_b5088c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_750987_local_params=$_750987_old_params['_b5088c'];$_750987_local_vars=$_750987_old_vars['_b5088c'];?>

                            <?php endif;$c_e0a2a8=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_e0a2a8'];$_750987_local_vars=$_750987_old_vars['_e0a2a8'];?>

                            <?php endif;$_750987_local_params=$_750987_old_params['_465adf'];$_750987_local_vars=$_750987_old_vars['_465adf'];?>

                            </select>
                            <input type="hidden" name="" value="eq">
                            <button type="button" class="btn btn-secondary btn-sm close-sm detach-filter detach-filter-btn" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-secondary delete-filter-elem hidden" id="detach-filter-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach Filter','this_tag'=>'trans'],null,$this),$this)?>
</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
              <button type="submit" class="btn btn-primary new-filter-elem hidden" id="filter-apply"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
              <button type="submit" class="btn btn-secondary new-filter-elem hidden" id="filter-save-apply"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Save and Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
<script>
$('#system_filter-apply-button').click(function(){
    if (! $('[name=select_system_filters] option:selected').val() ) {
        if ( filter_itemCount ) {
            return $('#filter-apply').trigger('click');
        }
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    let input = $('[name=select_system_filters] option:selected').data( 'input' );
    let hint = $('[name=select_system_filters] option:selected').data( 'hint' );
    let filter_option = $('[name=select_system_filters] option:selected').attr('data-option');
    if ( input ) {
        if (! hint ) {
            hint = '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Please enter the value.','this_tag'=>'trans'],null,$this),$this)?>
';
        }
        filter_option = prompt( hint, filter_option );
        if (! filter_option ) {
            return false;
        }
    }
    $('#select-user_filters').val('');
    $('#_system_filters_option').val( filter_option );
});
$('#filter-select-delete-button').click(function(){
    var filter_id = $('#select-user_filters').val();
    if ( filter_id == 'add_new_filter' || filter_id == '' ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    if(!confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to remove selected filter?','this_tag'=>'trans'],null,$this),$this)?>
')){
        return false;
    }
    $('#_filter_id').val( filter_id );
    $('#this_mode').val( 'delete_filter' );
    $('[name=select-user_filters] option:selected').remove();
    var str = $("#list_filter_form").serialize();
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", str,
    function ( data ) {
        if( data.result == true ) {
            $("#header-alert-message").html('<?php echo $this->function_trans($this->setup_args(['phrase'=>'The Filter has successfully deleted.','this_tag'=>'trans'],null,$this),$this)?>
');
            $("#header-alert").removeClass("alert-danger");
            $("#header-alert").addClass("alert-success");
        } else {
            $("#header-alert-message").html('<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while removing the Filter.','this_tag'=>'trans'],null,$this),$this)?>
');
            $("#header-alert").removeClass("alert-success");
            $("#header-alert").addClass("alert-danger");
        }
        $("#header-alert").show();
        setTimeout(focus_header_dialog, 500);
        $(".current-filter").hide();
        $('#this_mode').val( 'list' );
        $('#_filter_id').val('');
        $('#filter-select-delete-button').hide();
        var loc = $(location).attr('href');
        if ( loc.indexOf('?') == -1 ) {
            loc = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&_type=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
            <?php $_750987_old_params['_e207bc']=$_750987_local_params;$_750987_old_vars['_e207bc']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            loc += '&workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
            <?php endif;$_750987_local_params=$_750987_old_params['_e207bc'];$_750987_local_vars=$_750987_old_vars['_e207bc'];?>

            loc += '&_detach_filter=1';
            location.href = loc;
        } else {
            loc += '&_detach_filter=1';
            location.href = loc;
        }
    },
    "json"
    );
});
function focus_header_dialog () {
    $("#header-alert").focus();
}
$('#filter-select-apply-button').click(function(){
    var filter_id = $('#select-user_filters').val();
    if ( filter_id == 'add_new_filter' || filter_id == '' ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    $('#select_system_filters').val('');
    $('#_filter_id').val( filter_id );
    return true;
});
$('#select-user_filters').change(function(){
    if ($(this).val() == 'add_new_filter' ) {
        $('.new-filter-elem').show();
        $('.delete-filter-elem').hide();
    } else {
        $('.new-filter-elem').hide();
        if ( $(this).val() ) {
            $('.delete-filter-elem').show();
        }
    }
});
var curr_user_filter = $('#select-user_filters').val();
if ( curr_user_filter != 'add_new_filter' && curr_user_filter != '' ) {
    $('.delete-filter-elem').show();
}
var filter_itemCount = 0;
$('#filter-apply').click(function(){
    if (! filter_itemCount ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
});
$('#filter-save-apply').click(function(){
    if (! filter_itemCount ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    var filter_name = prompt('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Please enter the Name of this Filter.','this_tag'=>'trans'],null,$this),$this)?>
', '');
    if (! filter_name ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'The Filter Name is required.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    $('#_save_filter_name').val(filter_name);
});
$('#detach-filter-button').click(function(){
    $('#filters-list').remove();
    $('#_detach_filter').val(1);
});
$('#filter-add-button').click(function(){
    var selected_col = $('#filters-selector').val();
    var sel_class = $('[name=filters-selector] option:selected').attr('class');
    var sel_label = $('[name=filters-selector] option:selected').text();
    sel_class = sel_class.replace( 'coltype_', '' );
    var filter_tmpl = $('#selector-tmpl-text');
    if ( selected_col == 'status' ) {
        filter_tmpl = $('#selector-tmpl-status');
    } else if ( sel_class == 'int' || sel_class == 'tinyint' || sel_class == 'double' || sel_class.indexOf('decimal') == 0 ) {
        filter_tmpl = $('#selector-tmpl-int');
    } else if ( sel_class == 'datetime' ) {
        filter_tmpl = $('#selector-tmpl-date');
    }
    var addSelecter = filter_tmpl.clone( true ).appendTo('#filters-list');
    addSelecter.removeClass('hidden');
    addSelecter.removeAttr('id');
    addSelecter.children('div').children('span').html(sel_label);
    if ( selected_col == 'status' ) {
        addSelecter.children('div').children('input').attr('name', '_filter_cond_' + selected_col + '[]');
        addSelecter.children('div').children('select').attr('name', '_filter_value_' + selected_col + '[]');
    } else {
        addSelecter.children('div').children('input').attr('name', '_filter_value_' + selected_col + '[]');
        addSelecter.children('div').children('select').attr('name', '_filter_cond_' + selected_col + '[]');
    }
    $('#filter-parant-block').show();
    $('#filter-parant-block').css('border','none');
    addSelecter.show();
    filter_itemCount++;
});
$('.detach-filter').click(function(){
    if(!confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to remove this filter condition?','this_tag'=>'trans'],null,$this),$this)?>
')){
        return false;
    }
    $(this).parent().parent().remove();
    filter_itemCount--;
});
</script>
          <?php endif;$_750987_local_params=$_750987_old_params['_67874e'];$_750987_local_vars=$_750987_old_vars['_67874e'];?>

          <?php $_750987_old_params['_d3ddc0']=$_750987_local_params;$_750987_old_vars['_d3ddc0']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php ob_start();$_750987_old_params['_ffefe7']=$_750987_local_params;$_750987_old_vars['_ffefe7']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <div class="text-right disp-option">
    <button type="button" class="btn btn-outline-primary btn-sm disp-option-button" data-toggle="modal" data-target="#dispOptions">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>

    </button>
    <button data-toggle="modal" data-target="#dispOptions" class="hidden btn btn-secondary alt-disp-option-button btn-sm" type="button">
    <i class="fa fa-television" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </button>
  </div>
  <div class="modal fade" id="dispOptions" tabindex="-1" role="dialog" aria-labelledby="dispOptionsTitle" aria-hidden="true"
    style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="dispOptionsTitle"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>
</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST">
        <input type="hidden" name="__mode" value="display_options">
        <input type="hidden" name="_model" value="<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
">
        <input type="hidden" name="_type" value="list">
        <input type="hidden" name="_reset" value="" id="_reset-disp-oprions">
        <input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">
      <?php $_750987_old_params['_97f9b5']=$_750987_local_params;$_750987_old_vars['_97f9b5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
      <?php endif;$_750987_local_params=$_750987_old_params['_97f9b5'];$_750987_local_vars=$_750987_old_vars['_97f9b5'];?>

      <?php $_750987_old_params['_64f5a4']=$_750987_local_params;$_750987_old_vars['_64f5a4']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_select" value="1">
      <?php endif;$_750987_local_params=$_750987_old_params['_64f5a4'];$_750987_local_vars=$_750987_old_vars['_64f5a4'];?>

      <?php $_750987_old_params['_59e5d7']=$_750987_local_params;$_750987_old_vars['_59e5d7']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="dialog_view" value="1">
        <?php $_750987_old_params['_61f3cf']=$_750987_local_params;$_750987_old_vars['_61f3cf']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <?php endif;$_750987_local_params=$_750987_old_params['_61f3cf'];$_750987_local_vars=$_750987_old_vars['_61f3cf'];?>

          <?php $_750987_old_params['_41fdf7']=$_750987_local_params;$_750987_old_vars['_41fdf7']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="single_select" value="1">
          <?php endif;$_750987_local_params=$_750987_old_params['_41fdf7'];$_750987_local_vars=$_750987_old_vars['_41fdf7'];?>

        <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php $_750987_old_params['_068da8']=$_750987_local_params;$_750987_old_vars['_068da8']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php endif;$_750987_local_params=$_750987_old_params['_068da8'];$_750987_local_vars=$_750987_old_vars['_068da8'];?>

      <?php endif;$_750987_local_params=$_750987_old_params['_59e5d7'];$_750987_local_vars=$_750987_old_vars['_59e5d7'];?>

        <input type="hidden" name="return_args" value="<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'selected_ids_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
">
        <div class="modal-body">
          <div class="container-fluid">
          <?php $_750987_old_params['_24888f']=$_750987_local_params;$_750987_old_vars['_24888f']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_b7d9dc']=$_750987_local_params;$_750987_old_vars['_b7d9dc']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <?php $c_4a4a01=null;$_750987_old_params['_4a4a01']=$_750987_local_params;$_750987_old_vars['_4a4a01']=$_750987_local_vars;$a_4a4a01=$this->setup_args(['name'=>'disp_options','this_tag'=>'loop'],null,$this);$_4a4a01=-1;$r_4a4a01=true;while($r_4a4a01===true):$r_4a4a01=($_4a4a01!==-1)?false:true;echo $this->block_loop($a_4a4a01,$c_4a4a01,$this,$r_4a4a01,++$_4a4a01,'_4a4a01');ob_start();?>
<?php $c_4a4a01 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_4a4a01=false;}if($c_4a4a01 ):?>

            <?php $_750987_old_params['_d30e60']=$_750987_local_params;$_750987_old_vars['_d30e60']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
            <?php endif;$_750987_local_params=$_750987_old_params['_d30e60'];$_750987_local_vars=$_750987_old_vars['_d30e60'];?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_750987_old_params['_3588d5']=$_750987_local_params;$_750987_old_vars['_3588d5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php $_750987_old_params['_138701']=$_750987_local_params;$_750987_old_vars['_138701']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__key__','eq'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_750987_local_params=$_750987_old_params['_138701'];$_750987_local_vars=$_750987_old_vars['_138701'];?>

                <?php endif;$_750987_local_params=$_750987_old_params['_3588d5'];$_750987_local_vars=$_750987_old_vars['_3588d5'];?>

                <?php $_750987_old_params['_9bbc9f']=$_750987_local_params;$_750987_old_vars['_9bbc9f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__display','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[2]','setvar'=>'_type','this_tag'=>'var'],null,$this),$this),$this->setup_args('_type','setvar',$this),$this,'setvar')?>

                <label class="custom-control custom-checkbox 
                <?php $_750987_old_params['_25b825']=$_750987_local_params;$_750987_old_vars['_25b825']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_6a73d0']=$_750987_local_params;$_750987_old_vars['_6a73d0']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_checked','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_750987_local_params=$_750987_old_params['_6a73d0'];$_750987_local_vars=$_750987_old_vars['_6a73d0'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_25b825'];$_750987_local_vars=$_750987_old_vars['_25b825'];?>

                <?php $_750987_old_params['_8e93f2']=$_750987_local_params;$_750987_old_vars['_8e93f2']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_list_options','value'=>'$__key__','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_750987_local_params=$_750987_old_params['_8e93f2'];$_750987_local_vars=$_750987_old_vars['_8e93f2'];?>
">
                  <?php $_750987_old_params['_c55d2f']=$_750987_local_params;$_750987_old_vars['_c55d2f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1"><?php endif;$_750987_local_params=$_750987_old_params['_c55d2f'];$_750987_local_vars=$_750987_old_vars['_c55d2f'];?>

                  <input <?php $_750987_old_params['_3f8dc4']=$_750987_local_params;$_750987_old_vars['_3f8dc4']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_750987_local_params=$_750987_old_params['_3f8dc4'];$_750987_local_vars=$_750987_old_vars['_3f8dc4'];?>
 <?php $_750987_old_params['_ea6eeb']=$_750987_local_params;$_750987_old_vars['_ea6eeb']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_750987_local_params=$_750987_old_params['_ea6eeb'];$_750987_local_vars=$_750987_old_vars['_ea6eeb'];?>
<?php $_750987_old_params['_f66e4e']=$_750987_local_params;$_750987_old_vars['_f66e4e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_750987_local_params=$_750987_old_params['_f66e4e'];$_750987_local_vars=$_750987_old_vars['_f66e4e'];?>
<?php $_750987_old_params['_9c1b5a']=$_750987_local_params;$_750987_old_vars['_9c1b5a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_no_primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_51a3fb']=$_750987_local_params;$_750987_old_vars['_51a3fb']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_750987_local_params=$_750987_old_params['_51a3fb'];$_750987_local_vars=$_750987_old_vars['_51a3fb'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_9c1b5a'];$_750987_local_vars=$_750987_old_vars['_9c1b5a'];?>
<?php $_750987_old_params['_31ee0c']=$_750987_local_params;$_750987_old_vars['_31ee0c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_750987_local_params=$_750987_old_params['_31ee0c'];$_750987_local_vars=$_750987_old_vars['_31ee0c'];?>
 type="checkbox" class="custom-control-input disp-option-item" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_750987_old_params['_732a36']=$_750987_local_params;$_750987_old_vars['_732a36']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_750987_local_params=$_750987_old_params['_732a36'];$_750987_local_vars=$_750987_old_vars['_732a36'];?>
"></span>
                  <span class="custom-control-description"> <?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                </label>
                <?php endif;$_750987_local_params=$_750987_old_params['_9bbc9f'];$_750987_local_vars=$_750987_old_vars['_9bbc9f'];?>

            <?php $_750987_old_params['_eddf33']=$_750987_local_params;$_750987_old_vars['_eddf33']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
            </div>
            <?php endif;$_750987_local_params=$_750987_old_params['_eddf33'];$_750987_local_vars=$_750987_old_vars['_eddf33'];?>

            <?php endif;$c_4a4a01=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_4a4a01'];$_750987_local_vars=$_750987_old_vars['_4a4a01'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_b7d9dc'];$_750987_local_vars=$_750987_old_vars['_b7d9dc'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_24888f'];$_750987_local_vars=$_750987_old_vars['_24888f'];?>

            <div class="row form-group">
              <div class="col-md-2"><label for="_per_page"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Paging','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <input id="_per_page" step="1" list="per_page_complete" type="number" min="1" max="5000" class="form-control form-control-sm very-short control-inline" name="_per_page" value="<?php echo $this->function_var($this->setup_args(['name'=>'_per_page','this_tag'=>'var'],null,$this),$this)?>
">
                <?php echo $this->function_trans($this->setup_args(['phrase'=>'Items per Page','this_tag'=>'trans'],null,$this),$this)?>

              </div>
            </div>
            <?php $_750987_old_params['_e0433f']=$_750987_local_params;$_750987_old_vars['_e0433f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'search_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <?php $c_77bd3d=null;$_750987_old_params['_77bd3d']=$_750987_local_params;$_750987_old_vars['_77bd3d']=$_750987_local_vars;$a_77bd3d=$this->setup_args(['name'=>'search_options','this_tag'=>'loop'],null,$this);$_77bd3d=-1;$r_77bd3d=true;while($r_77bd3d===true):$r_77bd3d=($_77bd3d!==-1)?false:true;echo $this->block_loop($a_77bd3d,$c_77bd3d,$this,$r_77bd3d,++$_77bd3d,'_77bd3d');ob_start();?>
<?php $c_77bd3d = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_77bd3d=false;}if($c_77bd3d ):?>

                  <label class="custom-control custom-checkbox">
                    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                    <input<?php $_750987_old_params['_81a73f']=$_750987_local_params;$_750987_old_vars['_81a73f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_750987_local_params=$_750987_old_params['_81a73f'];$_750987_local_vars=$_750987_old_vars['_81a73f'];?>
 type="checkbox" class="custom-control-input" name="_s_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"> <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[0]','setvar'=>'search_col','this_tag'=>'var'],null,$this),$this),$this->setup_args('search_col','setvar',$this),$this,'setvar')?>
<?php echo $this->function_trans($this->setup_args(['phrase'=>'$search_col','this_tag'=>'trans'],null,$this),$this)?>
</span>
                  </label>
                <?php endif;$c_77bd3d=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_77bd3d'];$_750987_local_vars=$_750987_old_vars['_77bd3d'];?>

              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search Type','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-5">
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_750987_old_params['_058b2d']=$_750987_local_params;$_750987_old_vars['_058b2d']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_search_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_058b2d'];$_750987_local_vars=$_750987_old_vars['_058b2d'];?>
<?php $_750987_old_params['_19be72']=$_750987_local_params;$_750987_old_vars['_19be72']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_19be72'];$_750987_local_vars=$_750987_old_vars['_19be72'];?>
 name="_user_search_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Phrase','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_750987_old_params['_693dcc']=$_750987_local_params;$_750987_old_vars['_693dcc']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_693dcc'];$_750987_local_vars=$_750987_old_vars['_693dcc'];?>
 name="_user_search_type" value="2">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'OR','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_750987_old_params['_2b324a']=$_750987_local_params;$_750987_old_vars['_2b324a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_2b324a'];$_750987_local_vars=$_750987_old_vars['_2b324a'];?>
 name="_user_search_type" value="3">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'AND','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Keyword','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-3">
                <input type="hidden" name="_user_keep_search" value="0">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" <?php $_750987_old_params['_786b29']=$_750987_local_params;$_750987_old_vars['_786b29']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_user_keep_search','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_786b29'];$_750987_local_vars=$_750987_old_vars['_786b29'];?>
 class="custom-control-input" name="_user_keep_search" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"> <?php echo $this->function_trans($this->setup_args(['phrase'=>'Keep Keyword','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Replace','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_750987_old_params['_ba690f']=$_750987_local_params;$_750987_old_vars['_ba690f']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_replace_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_ba690f'];$_750987_local_vars=$_750987_old_vars['_ba690f'];?>
 name="_user_replace_type" value="0">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Insensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_750987_old_params['_eed25e']=$_750987_local_params;$_750987_old_vars['_eed25e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_replace_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_eed25e'];$_750987_local_vars=$_750987_old_vars['_eed25e'];?>
 name="_user_replace_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Sensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
            </div>
            <?php endif;$_750987_local_params=$_750987_old_params['_e0433f'];$_750987_local_vars=$_750987_old_vars['_e0433f'];?>

            <div class="row form-group">
              <?php $c_a5cba1=null;$_750987_old_params['_a5cba1']=$_750987_local_params;$_750987_old_vars['_a5cba1']=$_750987_local_vars;$a_a5cba1=$this->setup_args(['name'=>'sort_options','this_tag'=>'loop'],null,$this);$_a5cba1=-1;$r_a5cba1=true;while($r_a5cba1===true):$r_a5cba1=($_a5cba1!==-1)?false:true;echo $this->block_loop($a_a5cba1,$c_a5cba1,$this,$r_a5cba1,++$_a5cba1,'_a5cba1');ob_start();?>
<?php $c_a5cba1 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_a5cba1=false;}if($c_a5cba1 ):?>

              <?php $_750987_old_params['_0e163f']=$_750987_local_params;$_750987_old_vars['_0e163f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Sort','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-7">
              <?php endif;$_750987_local_params=$_750987_old_params['_0e163f'];$_750987_local_vars=$_750987_old_vars['_0e163f'];?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <label class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" <?php $_750987_old_params['_d963c1']=$_750987_local_params;$_750987_old_vars['_d963c1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_d963c1'];$_750987_local_vars=$_750987_old_vars['_d963c1'];?>
 name="_user_sort_by" value="<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                  </label>
              <?php $_750987_old_params['_b6609c']=$_750987_local_params;$_750987_old_vars['_b6609c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
              <div class="col-md-3">
                <select name="_user_sort_order" class="form-control custom-select">
                  <?php $c_8413d8=null;$_750987_old_params['_8413d8']=$_750987_local_params;$_750987_old_vars['_8413d8']=$_750987_local_vars;$a_8413d8=$this->setup_args(['name'=>'order_options','this_tag'=>'loop'],null,$this);$_8413d8=-1;$r_8413d8=true;while($r_8413d8===true):$r_8413d8=($_8413d8!==-1)?false:true;echo $this->block_loop($a_8413d8,$c_8413d8,$this,$r_8413d8,++$_8413d8,'_8413d8');ob_start();?>
<?php $c_8413d8 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_8413d8=false;}if($c_8413d8 ):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"<?php $_750987_old_params['_d5062e']=$_750987_local_params;$_750987_old_vars['_d5062e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 selected<?php endif;$_750987_local_params=$_750987_old_params['_d5062e'];$_750987_local_vars=$_750987_old_vars['_d5062e'];?>
><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</option>
                  <?php endif;$c_8413d8=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_8413d8'];$_750987_local_vars=$_750987_old_vars['_8413d8'];?>

                </select>
              </div>
              <?php endif;$_750987_local_params=$_750987_old_params['_b6609c'];$_750987_local_vars=$_750987_old_vars['_b6609c'];?>

              <?php endif;$c_a5cba1=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_a5cba1'];$_750987_local_vars=$_750987_old_vars['_a5cba1'];?>

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="reset-disp-option" class="btn btn-warning"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Reset','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="submit" class="btn btn-primary"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Save Changes','this_tag'=>'trans'],null,$this),$this)?>
</button>
        </div>
      </form>
      </div>
    </div>
  </div>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'list_max_cols','setvar'=>'_list_max_cols','this_tag'=>'property'],null,$this),$this),$this->setup_args('_list_max_cols','setvar',$this),$this,'setvar')?>

<?php $_750987_old_params['_0d9fb1']=$_750987_local_params;$_750987_old_vars['_0d9fb1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'dialog_max_cols','setvar'=>'_list_max_cols','this_tag'=>'property'],null,$this),$this),$this->setup_args('_list_max_cols','setvar',$this),$this,'setvar')?>

<?php endif;$_750987_local_params=$_750987_old_params['_0d9fb1'];$_750987_local_vars=$_750987_old_vars['_0d9fb1'];?>

<?php $_750987_old_params['_002e42']=$_750987_local_params;$_750987_old_vars['_002e42']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_list_max_cols','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
$('#reset-disp-option').click(function(){
    if (! confirm( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to reset display options?','this_tag'=>'trans'],null,$this),$this)?>
' ) ) {
        return false;
    }
    $('#_reset-disp-oprions').val(1);
});
$('.disp-option-item').change(function(){
    let checkdCnt = 0;
    $('.disp-option-item').each(function() {
        if ( $(this).prop( 'checked' ) ) {
            checkdCnt++;
        }
    });
    if ( <?php echo $this->function_var($this->setup_args(['name'=>'_list_max_cols','this_tag'=>'var'],null,$this),$this)?>
 < checkdCnt ) {
      <?php $_750987_old_params['_140cc6']=$_750987_local_params;$_750987_old_vars['_140cc6']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the dialog.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php else:?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the display.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php endif;$_750987_local_params=$_750987_old_params['_140cc6'];$_750987_local_vars=$_750987_old_vars['_140cc6'];?>

    }
});
</script>
<?php endif;$_750987_local_params=$_750987_old_params['_002e42'];$_750987_local_vars=$_750987_old_vars['_002e42'];?>

<?php endif;$_ffefe7=ob_get_clean();echo $this->modifier_trim_space($_ffefe7,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_750987_local_params=$_750987_old_params['_ffefe7'];$_750987_local_vars=$_750987_old_vars['_ffefe7'];?>

            <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

          <?php endif;$_750987_local_params=$_750987_old_params['_d3ddc0'];$_750987_local_vars=$_750987_old_vars['_d3ddc0'];?>

            <?php $_750987_old_params['_2b8e40']=$_750987_local_params;$_750987_old_vars['_2b8e40']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <div class="modal fade" id="startUpload" tabindex="-1" role="dialog" aria-labelledby="startUploadTitle" aria-hidden="true"
        style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="startUploadTitle"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload','this_tag'=>'trans'],null,$this),$this)?>
</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="alert alert-success hidden" id="clear-history-alert" role="alert" tabindex="0">
              <button onclick="$('#clear-history-alert').hide();" type="button" class="close" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
                <span aria-hidden="true">&times;</span>
              </button>
              <?php echo $this->function_trans($this->setup_args(['phrase'=>'The upload path history has been cleared successfully.','this_tag'=>'trans'],null,$this),$this)?>

            </div>
              <div class="container-fluid" id="drop-zone">
                <form>
                <span id="file-chooser" class="btn btn-success fileinput-button">
                    <span><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select File...','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="files[]" multiple
                        onfocus="$('#file-chooser').css('border','2px solid green');"
                        onblur="$('#file-chooser').css('border','none');">
                </span>
              <?php $_750987_old_params['_5bc3f5']=$_750987_local_params;$_750987_old_vars['_5bc3f5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <label class="custom-control custom-checkbox" style="margin-top: 10px;margin-left: 7px">
                  <input type="checkbox" class="custom-control-input"
                    id="asset_overwrite" name="overwrite" value="0">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Overwrite files with the same path','this_tag'=>'trans'],null,$this),$this)?>

                </label>
                <script>
                $('#asset_overwrite').change(function(){
                    if ($(this).prop('checked')) {
                        $(this).val('1');
                    } else {
                        $(this).val('0');
                    }
                });
                </script>
              <?php endif;$_750987_local_params=$_750987_old_params['_5bc3f5'];$_750987_local_vars=$_750987_old_vars['_5bc3f5'];?>

                <div class="form-inline" style="margin: 10px 7px">
                  <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload Path','this_tag'=>'trans'],null,$this),$this)?>

                  <?php $_750987_old_params['_c914cb']=$_750987_local_params;$_750987_old_vars['_c914cb']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model_out_path','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->modifier_add_slash(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model_out_path','escape'=>'','add_slash'=>'','setvar'=>'model_out_path','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('','add_slash',$this),$this,'add_slash'),$this->setup_args('model_out_path','setvar',$this),$this,'setvar')?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'extra_path','value'=>'$model_out_path','append'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_750987_local_params=$_750987_old_params['_c914cb'];$_750987_local_vars=$_750987_old_vars['_c914cb'];?>

                  <input id="extra_path" type="text" style="width:200px;" class="form-control" name="extra_path" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'extra_path','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                  <?php echo $this->function_setvar($this->setup_args(['name'=>'upload_paths','value'=>'$extra_path','function'=>'unshift','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php echo $this->modifier_setvar($this->modifier_array_unique($this->function_var($this->setup_args(['name'=>'upload_paths','array_unique'=>'','setvar'=>'upload_paths','this_tag'=>'var'],null,$this),$this),$this->setup_args('','array_unique',$this),$this,'array_unique'),$this->setup_args('upload_paths','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_count($this->setup_args(['name'=>'$upload_paths','setvar'=>'path_cnt','this_tag'=>'count'],null,$this),$this),$this->setup_args('path_cnt','setvar',$this),$this,'setvar')?>

                <?php $_750987_old_params['_86db86']=$_750987_local_params;$_750987_old_vars['_86db86']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'path_cnt','gt'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <div id="upload_paths-box">
                  <?php $c_141cb4=null;$_750987_old_params['_141cb4']=$_750987_local_params;$_750987_old_vars['_141cb4']=$_750987_local_vars;$a_141cb4=$this->setup_args(['name'=>'upload_paths','this_tag'=>'loop'],null,$this);$_141cb4=-1;$r_141cb4=true;while($r_141cb4===true):$r_141cb4=($_141cb4!==-1)?false:true;echo $this->block_loop($a_141cb4,$c_141cb4,$this,$r_141cb4,++$_141cb4,'_141cb4');ob_start();?>
<?php $c_141cb4 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_141cb4=false;}if($c_141cb4 ):?>

                    <?php $_750987_old_params['_c1ae47']=$_750987_local_params;$_750987_old_vars['_c1ae47']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button class="btn ml-3 btn-secondary" id="toggle-upload_path"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <span class="hidden" id="upload_path-wrapper">
                    <select class="form-control custom-select short" name="upload_path" id="upload_path"><?php endif;$_750987_local_params=$_750987_old_params['_c1ae47'];$_750987_local_vars=$_750987_old_vars['_c1ae47'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_750987_old_params['_e924de']=$_750987_local_params;$_750987_old_vars['_e924de']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'extra_path','eq'=>'$__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_750987_local_params=$_750987_old_params['_e924de'];$_750987_local_vars=$_750987_old_vars['_e924de'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php $_750987_old_params['_d8a47b']=$_750987_local_params;$_750987_old_vars['_d8a47b']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</select>
                    <button class="btn ml-0 btn-secondary btn-sm" id="clear-upload_path">  <i class="fa fa-trash" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Clear','this_tag'=>'trans'],null,$this),$this)?>
</span></button>
                    </span>
                  </div>
                    <?php endif;$_750987_local_params=$_750987_old_params['_d8a47b'];$_750987_local_vars=$_750987_old_vars['_d8a47b'];?>

                  <?php endif;$c_141cb4=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_141cb4'];$_750987_local_vars=$_750987_old_vars['_141cb4'];?>

                <?php endif;$_750987_local_params=$_750987_old_params['_86db86'];$_750987_local_vars=$_750987_old_vars['_86db86'];?>

                </div>
                <!-- The container for the uploaded files -->
                <div id="files" class="files"></div>
                </form>
              </div>
              <!-- The global progress bar -->
              <div id="progress" class="progress">
                <div class="progress-bar progress-bar-success"></div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary upload-cancel-button" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
              <button type="submit" class="btn btn-primary new-filter-elem hidden" id="filter-apply"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Next','this_tag'=>'trans'],null,$this),$this)?>
</button>
            </div>
          </div>
        </div>
      </div>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="assets/js/vendor/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="assets/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'query_string','regex_replace'=>'\'/&offset=[0-9]{1,}/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&offset=[0-9]{1,}/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&deleted=1/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&deleted=1/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php $_750987_old_params['_5d5621']=$_750987_local_params;$_750987_old_vars['_5d5621']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&filter_params=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&filter_params=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&magic_token=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&magic_token=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&query=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&query=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php endif;$_750987_local_params=$_750987_old_params['_5d5621'];$_750987_local_vars=$_750987_old_vars['_5d5621'];?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&{0,1}does_act=[0-9]{1,}/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&{0,1}does_act=[0-9]{1,}/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&{0,1}apply_actions=[0-9]{1,}/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&{0,1}apply_actions=[0-9]{1,}/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&{0,1}background_proccess_running=[0-9]{1,}/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&{0,1}background_proccess_running=[0-9]{1,}/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&{0,1}html_background_proccess=1/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&{0,1}html_background_proccess=1/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&+/\',\'&\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&+/\\\',\\\'&\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/^&+/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/^&+/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<script src="assets/js/jquery.fileupload.js"></script>
<script>
$('#upload_path').change(function(){
    $('#extra_path').val( $(this).val() );
});
$('#clear-upload_path').click(function(){
    if ( !confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to delete the upload path history?','this_tag'=>'trans'],null,$this),$this)?>
') ) {
        return false;
    }
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", {
        '__mode' : 'clear_extra_paths',
        'workspace_id' : '<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
',
        'magic_token': '<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
'
    },
    function ( data ) {
        if( data.result == true ) {
            $('#upload_paths-box').hide( 300 );
            $('#clear-history-alert').show();
            $('#clear-history-alert').focus();
        } else {
            alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while clearing upload path history.','this_tag'=>'trans'],null,$this),$this)?>
");
        }
    },
    "json"
    );
    return false;
});
$('#toggle-upload_path').click(function(){
    $('#upload_path-wrapper').toggle();
    if ( $(this).html() == '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
' ) {
        $(this).html( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Hide','this_tag'=>'trans'],null,$this),$this)?>
' );
        $('#upload_path-wrapper').css('display', 'inline');
    } else {
        $(this).html( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
' );
    }
    return false;
});
var this_url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?<?php $_750987_old_params['_b996f3']=$_750987_local_params;$_750987_old_vars['_b996f3']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&<?php endif;$_750987_local_params=$_750987_old_params['_b996f3'];$_750987_local_vars=$_750987_old_vars['_b996f3'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'_query_string','this_tag'=>'var'],null,$this),$this)?>
&sort=id&direction=desc';
var selected_ids = [];
var upload_count = 0;
var receive_count = 0;
var DropZone = document.getElementById('drop-zone');
DropZone.addEventListener('dragover', function (event) {
    $('#drop-zone').css('background-color','#ddf');
});
DropZone.addEventListener('dragleave', function (event) {
    $('#drop-zone').css('background-color','#fff');
});
$('#drop-zone').css('border','3px dashed <?php $_750987_old_params['_de7b3c']=$_750987_local_params;$_750987_old_vars['_de7b3c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
#ccc<?php endif;$_750987_local_params=$_750987_old_params['_de7b3c'];$_750987_local_vars=$_750987_old_vars['_de7b3c'];?>
');
$('#drop-zone').css('margin','1px');
$('#drop-zone').css('padding','8px');
$(function () {
    'use strict';
    var url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=upload_multi&magic_token=<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&model=asset&name=file<?php $_750987_old_params['_89b49e']=$_750987_local_params;$_750987_old_vars['_89b49e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','eq'=>'filter_class_image','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&select_system_filters=filter_class_image<?php endif;$_750987_local_params=$_750987_old_params['_89b49e'];$_750987_local_vars=$_750987_old_vars['_89b49e'];?>
';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        dropZone: $("#drop-zone"),
        // formData: {extra_path: $('#extra_path').val()},
        add: function (e, data) {
            data.formData = {extra_path: $('#extra_path').val()<?php $_750987_old_params['_41fb3d']=$_750987_local_params;$_750987_old_vars['_41fb3d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
, overwrite: $('#asset_overwrite').val()<?php endif;$_750987_local_params=$_750987_old_params['_41fb3d'];$_750987_local_vars=$_750987_old_vars['_41fb3d'];?>
};
            data.submit();
            upload_count++;
            $("#drop-zone").hide( 'slow' );
            $('.upload-cancel-button').hide( 'slow' );
        },
        done: function (e, data) {
            $('#clear-history-alert').hide();
            if (!data.result.files) {
                var error = data.result.message;
                $('#progress .progress-bar').css(
                    'width', 0
                );
                alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while uploading.','this_tag'=>'trans'],null,$this),$this)?>
"+' (' + error + ')');
                upload_count = 0;
                receive_count = 0;
                selected_ids = [];
                return;
            }
            $("input[name='id[]']").each(function(){
                if ( $(this).prop('checked') ) {
                    if( $.inArray($(this).val(), selected_ids ) == -1 ) {
                        selected_ids.push($(this).val());
                    }
                }
            });
            $.each(data.result.files, function (index, file) {
                // $('<p/>').text(file.name).appendTo('#files');
                var input_cb = $('#select_ids_tmpl');
                var new_input = input_cb.clone( true ).appendTo('#list-select-form');
                new_input.removeAttr('id');
                new_input.attr('name','id[]');
                new_input.val(file.asset_id);
                selected_ids.push(file.asset_id);
                receive_count++;
                //if ( upload_count == receive_count ) {
                setTimeout(uploaded_hdlr, 1000);
                //}
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
            $('#drop-zone').css('background-color','#fff');
            $("#drop-zone").show( 'slow' );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
function uploaded_hdlr () {
    this_url += '&selected_ids=' + selected_ids.join(',');
    <?php $_750987_old_params['_7873d5']=$_750987_local_params;$_750987_old_vars['_7873d5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    $("#__mode").prop('value', 'insert_asset');
    $("#list-select-form").submit();
    <?php else:?>

    submit_params_to_post( this_url );
    <?php endif;$_750987_local_params=$_750987_old_params['_7873d5'];$_750987_local_vars=$_750987_old_vars['_7873d5'];?>

}
</script>
            <?php endif;$_750987_local_params=$_750987_old_params['_2b8e40'];$_750987_local_vars=$_750987_old_vars['_2b8e40'];?>

        <?php endif;$_750987_local_params=$_750987_old_params['_021211'];$_750987_local_vars=$_750987_old_vars['_021211'];?>

        <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_a10309']=$_750987_local_params;$_750987_old_vars['_a10309']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php ob_start();$_750987_old_params['_d4f49a']=$_750987_local_params;$_750987_old_vars['_d4f49a']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <div class="text-right disp-option">
    <button type="button" class="btn btn-outline-primary btn-sm disp-option-button" data-toggle="modal" data-target="#dispOptions">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>

    </button>
    <button data-toggle="modal" data-target="#dispOptions" class="hidden btn btn-secondary alt-disp-option-button btn-sm" type="button">
      <i class="fa fa-television" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </button>
  </div>
  <div class="modal fade" id="dispOptions" tabindex="-1" role="dialog" aria-labelledby="LongTitle" aria-hidden="true"
    style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'Display Options','setvar'=>'options_title','this_tag'=>'trans'],null,$this),$this),$this->setup_args('options_title','setvar',$this),$this,'setvar')?>

          <h5 class="modal-title" id="LongTitle"><?php echo $this->function_var($this->setup_args(['name'=>'options_title','this_tag'=>'var'],null,$this),$this)?>
</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST" id="disp_options_form">
        <input type="hidden" name="__mode" value="display_options">
        <input type="hidden" name="_model" value="<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
">
        <input type="hidden" name="_type" value="edit">
        <input type="hidden" name="_reset" value="" id="_reset-disp-oprions">
        <input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">
        <input type="hidden" id="_field_sort_order" name="field_sort_order" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'_field_sort_order','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <?php $_750987_old_params['_d75de8']=$_750987_local_params;$_750987_old_vars['_d75de8']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
        <?php endif;$_750987_local_params=$_750987_old_params['_d75de8'];$_750987_local_vars=$_750987_old_vars['_d75de8'];?>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10" id="edit_options_loop">
              <span id="_start_options"></span>
          <?php $_750987_old_params['_a42b6c']=$_750987_local_params;$_750987_old_vars['_a42b6c']=$_750987_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

            <?php $c_13eee2=null;$_750987_old_params['_13eee2']=$_750987_local_params;$_750987_old_vars['_13eee2']=$_750987_local_vars;$a_13eee2=$this->setup_args(['type'=>'edit','option'=>'1','this_tag'=>'objectcols'],null,$this);$_13eee2=-1;$r_13eee2=true;while($r_13eee2===true):$r_13eee2=($_13eee2!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_13eee2,$c_13eee2,$this,$r_13eee2,++$_13eee2,'_13eee2');ob_start();?>
<?php $c_13eee2 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_13eee2=false;}if($c_13eee2 ):?>

              <?php $_750987_old_params['_2ce902']=$_750987_local_params;$_750987_old_vars['_2ce902']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','ne'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_750987_old_params['_369a10']=$_750987_local_params;$_750987_old_vars['_369a10']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'hidden','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_750987_old_params['_2c8e19']=$_750987_local_params;$_750987_old_vars['_2c8e19']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'allow_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'accept_comment','setvar'=>'accept_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

                    <?php $_750987_old_params['_6f2f2f']=$_750987_local_params;$_750987_old_vars['_6f2f2f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <?php $_750987_old_params['_028242']=$_750987_local_params;$_750987_old_vars['_028242']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <?php endif;$_750987_local_params=$_750987_old_params['_028242'];$_750987_local_vars=$_750987_old_vars['_028242'];?>

                    <?php endif;$_750987_local_params=$_750987_old_params['_6f2f2f'];$_750987_local_vars=$_750987_old_vars['_6f2f2f'];?>

                  <?php endif;$_750987_local_params=$_750987_old_params['_2c8e19'];$_750987_local_vars=$_750987_old_vars['_2c8e19'];?>

                <?php endif;$_750987_local_params=$_750987_old_params['_369a10'];$_750987_local_vars=$_750987_old_vars['_369a10'];?>

                <?php $_750987_old_params['_815165']=$_750987_local_params;$_750987_old_vars['_815165']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_750987_old_params['_d45099']=$_750987_local_params;$_750987_old_vars['_d45099']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_d45099'];$_750987_local_vars=$_750987_old_vars['_d45099'];?>

                  <?php $_750987_old_params['_8b9d4e']=$_750987_local_params;$_750987_old_vars['_8b9d4e']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_750987_local_params=$_750987_old_params['_8b9d4e'];$_750987_local_vars=$_750987_old_vars['_8b9d4e'];?>

                  <label class="edit-options-child <?php $_750987_old_params['_e4b04c']=$_750987_local_params;$_750987_old_vars['_e4b04c']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_750987_local_params=$_750987_old_params['_e4b04c'];$_750987_local_vars=$_750987_old_vars['_e4b04c'];?>
custom-control custom-checkbox" id="label-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                    <?php $_750987_old_params['_a3dc25']=$_750987_local_params;$_750987_old_vars['_a3dc25']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <input type="hidden" id="" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <?php endif;$_750987_local_params=$_750987_old_params['_a3dc25'];$_750987_local_vars=$_750987_old_vars['_a3dc25'];?>

                    <input<?php $_750987_old_params['_74487a']=$_750987_local_params;$_750987_old_vars['_74487a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php else:?>
<?php $_750987_old_params['_b41df5']=$_750987_local_params;$_750987_old_vars['_b41df5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 onclick="return false;" checked <?php else:?>

                    <?php $_750987_old_params['_761589']=$_750987_local_params;$_750987_old_vars['_761589']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_750987_local_params=$_750987_old_params['_761589'];$_750987_local_vars=$_750987_old_vars['_761589'];?>

                    <?php endif;$_750987_local_params=$_750987_old_params['_b41df5'];$_750987_local_vars=$_750987_old_vars['_b41df5'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_74487a'];$_750987_local_vars=$_750987_old_vars['_74487a'];?>
<?php $_750987_old_params['_426139']=$_750987_local_params;$_750987_old_vars['_426139']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_750987_local_params=$_750987_old_params['_426139'];$_750987_local_vars=$_750987_old_vars['_426139'];?>
 type="<?php $_750987_old_params['_09df79']=$_750987_local_params;$_750987_old_vars['_09df79']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
checkbox<?php endif;$_750987_local_params=$_750987_old_params['_09df79'];$_750987_local_vars=$_750987_old_vars['_09df79'];?>
" class="custom-control-input disp_option disp_option-cb" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator<?php $_750987_old_params['_ef7729']=$_750987_local_params;$_750987_old_vars['_ef7729']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_750987_local_params=$_750987_old_params['_ef7729'];$_750987_local_vars=$_750987_old_vars['_ef7729'];?>
<?php $_750987_old_params['_95e95d']=$_750987_local_params;$_750987_old_vars['_95e95d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_750987_local_params=$_750987_old_params['_95e95d'];$_750987_local_vars=$_750987_old_vars['_95e95d'];?>
"></span>
                    <span class="custom-control-description"> 
                    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
                  </label>
                <?php endif;$_750987_local_params=$_750987_old_params['_815165'];$_750987_local_vars=$_750987_old_vars['_815165'];?>

              <?php endif;$_750987_local_params=$_750987_old_params['_2ce902'];$_750987_local_vars=$_750987_old_vars['_2ce902'];?>

            <?php endif;$c_13eee2=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_13eee2'];$_750987_local_vars=$_750987_old_vars['_13eee2'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_a42b6c'];$_750987_local_vars=$_750987_old_vars['_a42b6c'];?>

                <?php $c_4f944a=null;$_750987_old_params['_4f944a']=$_750987_local_params;$_750987_old_vars['_4f944a']=$_750987_local_vars;$a_4f944a=$this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$model','id'=>'$object_id','this_tag'=>'fieldloop'],null,$this);$_4f944a=-1;$r_4f944a=true;while($r_4f944a===true):$r_4f944a=($_4f944a!==-1)?false:true;echo $this->component('PTTags')->hdlr_fieldloop($a_4f944a,$c_4f944a,$this,$r_4f944a,++$_4f944a,'_4f944a');ob_start();?>
<?php $c_4f944a = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_4f944a=false;}if($c_4f944a ):?>

                <?php $c_6bf54b=null;$_750987_old_params['_6bf54b']=$_750987_local_params;$_750987_old_vars['_6bf54b']=$_750987_local_vars;$a_6bf54b=$this->setup_args(['name'=>'_fieldbasename','this_tag'=>'setvarblock'],null,$this);ob_start();?>
field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_6bf54b=ob_get_clean();$c_6bf54b=$this->block_setvarblock($a_6bf54b,$c_6bf54b,$this,$r_6bf54b,1,'_6bf54b');echo($c_6bf54b); $_750987_local_params=$_750987_old_params['_6bf54b'];?>

                <label class="<?php $_750987_old_params['_1cc20e']=$_750987_local_params;$_750987_old_vars['_1cc20e']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_750987_local_params=$_750987_old_params['_1cc20e'];$_750987_local_vars=$_750987_old_vars['_1cc20e'];?>
custom-control custom-checkbox" id="label-<?php echo $this->function_var($this->setup_args(['name'=>'_fieldbasename','this_tag'=>'var'],null,$this),$this)?>
">
                  <input<?php $_750987_old_params['_49d197']=$_750987_local_params;$_750987_old_vars['_49d197']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_750987_local_params=$_750987_old_params['_49d197'];$_750987_local_vars=$_750987_old_vars['_49d197'];?>

                  <?php $_750987_old_params['_b9c0a8']=$_750987_local_params;$_750987_old_vars['_b9c0a8']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_750987_local_params=$_750987_old_params['_b9c0a8'];$_750987_local_vars=$_750987_old_vars['_b9c0a8'];?>

                  <?php $_750987_old_params['_f11644']=$_750987_local_params;$_750987_old_vars['_f11644']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_750987_local_params=$_750987_old_params['_f11644'];$_750987_local_vars=$_750987_old_vars['_f11644'];?>
 <?php $_750987_old_params['_9b15a1']=$_750987_local_params;$_750987_old_vars['_9b15a1']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_9b15a1'];$_750987_local_vars=$_750987_old_vars['_9b15a1'];?>
 type="checkbox" class="custom-control-input disp_option disp_option-cb" id="field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_750987_old_params['_22c53a']=$_750987_local_params;$_750987_old_vars['_22c53a']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_750987_local_params=$_750987_old_params['_22c53a'];$_750987_local_vars=$_750987_old_vars['_22c53a'];?>
"></span>
                  <span class="custom-control-description"> 
                  <?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'field__name','trans'=>'1','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans'),ENT_QUOTES)?>
</span>
                </label>
                <?php endif;$c_4f944a=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_4f944a'];$_750987_local_vars=$_750987_old_vars['_4f944a'];?>

              <?php $_750987_old_params['_8ad9a1']=$_750987_local_params;$_750987_old_vars['_8ad9a1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div>
                  <p class="text-muted hint-block">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can change the display order of fields with drag &amp; drop.','this_tag'=>'trans'],null,$this),$this)?>

                  </p>
                </div>
              <?php endif;$_750987_local_params=$_750987_old_params['_8ad9a1'];$_750987_local_vars=$_750987_old_vars['_8ad9a1'];?>

              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="reset-disp-option" class="btn btn-warning" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Reset','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="button" id="disp_options_save" class="btn btn-primary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Save Changes','this_tag'=>'trans'],null,$this),$this)?>
</button>
        </div>
      </form>
      </div>
    </div>
  </div>
<?php endif;$_d4f49a=ob_get_clean();echo $this->modifier_trim_space($_d4f49a,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_750987_local_params=$_750987_old_params['_d4f49a'];$_750987_local_vars=$_750987_old_vars['_d4f49a'];?>

<script>
<?php $_750987_old_params['_f29b1f']=$_750987_local_params;$_750987_old_vars['_f29b1f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#edit_options_loop').sortable({
    stop: function( evt, ui ) {
        sort_fields();
    }
});
$("#edit_options_loop").ksortable();
<?php endif;$_750987_local_params=$_750987_old_params['_f29b1f'];$_750987_local_vars=$_750987_old_vars['_f29b1f'];?>

function sort_fields(){
    var editor_data = [];
    if(tinymce && tinymce.editors){
        for(var i = tinymce.editors.length -1; i >= 0; i--){
            var ed = tinymce.editors[i];
            editor_data.push({
                target  : ed.targetElm,
                setting : ed.settings
            });
        }
    }
    var field_objects = [];
    var field_names = [];
    $('.disp_option-cb').each(function(){
        var field_name = $(this).prop('name');
        field_name = field_name.replace( /^_d_/, '' );
        field_names.push( field_name );
        field_objects.push( $('#' + field_name + '-wrapper' ) );
        $('#' + field_name + '-wrapper' ).find('');
    });
    $('#_field_sort_order').val(field_names.join(','));
    $('#_start_fields').after(field_objects);
    for(var i = 0; i < editor_data.length; i++){
        tinyMCE.execCommand('mceAddEditor', false, editor_data[i].target);
    }
    reorder_fields();
}
function reorder_fields(){
    var field_objects = [];
    var field_names = [];
    $('.disp_option-cb').each(function(){
        let field_name = $(this).prop('name');
        field_name = field_name.replace( /^_d_/, '' );
        field_names.push( field_name );
        field_objects.push( $('#' + field_name + '-wrapper' ) );
    });
    $('#_field_sort_order').val(field_names.join(','));
    $('#_start_fields').after(field_objects);
    var oldTextFormat = null;
    if ( $('#text_format-select').length ){
        oldTextFormat = $('#text_format-select').val();
    }
    if( tinymce && ( oldTextFormat == null || oldTextFormat == 'richtext' ) ){
        tinymce.EditorManager.remove();
        editorInit();
    }
    $(document).trigger('pcmsx.reorder_fields_done');
}
$("#disp_options_save").click(function(){
    let str = $("#disp_options_form").serialize();
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", str,
    function ( data ) {
        if( data.result == true ) {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'%s\'s display options saved successfully.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
");
        } else {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while saving %s.','params'=>'$options_title','this_tag'=>'trans'],null,$this),$this)?>
", 'danger');
        }
    },
    "json"
    );
});
$('#reset-disp-option').click(function(){
    if (! confirm( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to reset display options?','this_tag'=>'trans'],null,$this),$this)?>
' ) ) {
        return false;
    }
    $('#_reset-disp-oprions').val(1);
    let str = $("#disp_options_form").serialize();
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", str,
    function ( data ) {
        $('#_reset-disp-oprions').val('');
        if( data.result == true ) {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'%s\'s display options reset successfully.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
 <?php echo $this->function_trans($this->setup_args(['phrase'=>'Changes will be reflected the next time you open the screen.','this_tag'=>'trans'],null,$this),$this)?>
", 'warning');
        } else {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while resetting %s.','params'=>'$options_title','this_tag'=>'trans'],null,$this),$this)?>
", 'danger');
        }
    },
    "json"
    );
});
$(".disp_option").change(function(){
    let colname = $(this).prop("id");
    let wrapper_name = "#" + colname + 'wrapper';
    let option_name = "." + colname + 'option';
    let wrapper = $(wrapper_name);
    let option  = $(option_name);
    if($(this).prop("checked")) {
        wrapper.show("fade");
        option.show();
    } else {
        wrapper.hide("fade");
        option.hide();
    }
    let richtext = wrapper.find('textarea.richtext');
    if ( richtext.length && $(this).prop('checked') ) {
<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_750987_old_params['_cabecf']=$_750987_local_params;$_750987_old_vars['_cabecf']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        let editor4 = $('.mce-edit-area iframe');
        if ( editor4.length ) {
            let editor_height = richtext.attr( 'rows' );
            editor_height *= 25;
            editor4.css( 'height', editor_height + 'px' );
        }
<?php else:?>

        if ( richtext.next().attr('role') == 'application' ) {
            let editor_height = richtext.attr( 'rows' );
            editor_height *= 25;
            richtext.next().css( 'height', editor_height + 'px' );
        }
<?php endif;$_750987_local_params=$_750987_old_params['_cabecf'];$_750987_local_vars=$_750987_old_vars['_cabecf'];?>

    }
    updateFieldSelector();
});
</script>
            <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

          <?php endif;$_750987_local_params=$_750987_old_params['_a10309'];$_750987_local_vars=$_750987_old_vars['_a10309'];?>

        <?php endif;$_750987_local_params=$_750987_old_params['_7d3506'];$_750987_local_vars=$_750987_old_vars['_7d3506'];?>

    <?php endif;$_750987_local_params=$_750987_old_params['_6807dc'];$_750987_local_vars=$_750987_old_vars['_6807dc'];?>

    <?php endif;$_750987_local_params=$_750987_old_params['_7e0851'];$_750987_local_vars=$_750987_old_vars['_7e0851'];?>

  <?php endif;$_750987_local_params=$_750987_old_params['_3816d2'];$_750987_local_vars=$_750987_old_vars['_3816d2'];?>

  <?php $_750987_old_params['_1d3e61']=$_750987_local_params;$_750987_old_vars['_1d3e61']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'save','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    
    <?php $_750987_old_params['_02288f']=$_750987_local_params;$_750987_old_vars['_02288f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php ob_start();$_750987_old_params['_acf7b9']=$_750987_local_params;$_750987_old_vars['_acf7b9']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <div class="text-right disp-option">
    <button type="button" class="btn btn-outline-primary btn-sm disp-option-button" data-toggle="modal" data-target="#dispOptions">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>

    </button>
    <button data-toggle="modal" data-target="#dispOptions" class="hidden btn btn-secondary alt-disp-option-button btn-sm" type="button">
      <i class="fa fa-television" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </button>
  </div>
  <div class="modal fade" id="dispOptions" tabindex="-1" role="dialog" aria-labelledby="LongTitle" aria-hidden="true"
    style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'Display Options','setvar'=>'options_title','this_tag'=>'trans'],null,$this),$this),$this->setup_args('options_title','setvar',$this),$this,'setvar')?>

          <h5 class="modal-title" id="LongTitle"><?php echo $this->function_var($this->setup_args(['name'=>'options_title','this_tag'=>'var'],null,$this),$this)?>
</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST" id="disp_options_form">
        <input type="hidden" name="__mode" value="display_options">
        <input type="hidden" name="_model" value="<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
">
        <input type="hidden" name="_type" value="edit">
        <input type="hidden" name="_reset" value="" id="_reset-disp-oprions">
        <input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">
        <input type="hidden" id="_field_sort_order" name="field_sort_order" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'_field_sort_order','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <?php $_750987_old_params['_a88a3a']=$_750987_local_params;$_750987_old_vars['_a88a3a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
        <?php endif;$_750987_local_params=$_750987_old_params['_a88a3a'];$_750987_local_vars=$_750987_old_vars['_a88a3a'];?>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10" id="edit_options_loop">
              <span id="_start_options"></span>
          <?php $_750987_old_params['_0ffed4']=$_750987_local_params;$_750987_old_vars['_0ffed4']=$_750987_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

            <?php $c_e1fc5d=null;$_750987_old_params['_e1fc5d']=$_750987_local_params;$_750987_old_vars['_e1fc5d']=$_750987_local_vars;$a_e1fc5d=$this->setup_args(['type'=>'edit','option'=>'1','this_tag'=>'objectcols'],null,$this);$_e1fc5d=-1;$r_e1fc5d=true;while($r_e1fc5d===true):$r_e1fc5d=($_e1fc5d!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_e1fc5d,$c_e1fc5d,$this,$r_e1fc5d,++$_e1fc5d,'_e1fc5d');ob_start();?>
<?php $c_e1fc5d = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_e1fc5d=false;}if($c_e1fc5d ):?>

              <?php $_750987_old_params['_7fd281']=$_750987_local_params;$_750987_old_vars['_7fd281']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','ne'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_750987_old_params['_d1ca21']=$_750987_local_params;$_750987_old_vars['_d1ca21']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'hidden','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_750987_old_params['_0edead']=$_750987_local_params;$_750987_old_vars['_0edead']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'allow_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'accept_comment','setvar'=>'accept_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

                    <?php $_750987_old_params['_116711']=$_750987_local_params;$_750987_old_vars['_116711']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <?php $_750987_old_params['_688b92']=$_750987_local_params;$_750987_old_vars['_688b92']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <?php endif;$_750987_local_params=$_750987_old_params['_688b92'];$_750987_local_vars=$_750987_old_vars['_688b92'];?>

                    <?php endif;$_750987_local_params=$_750987_old_params['_116711'];$_750987_local_vars=$_750987_old_vars['_116711'];?>

                  <?php endif;$_750987_local_params=$_750987_old_params['_0edead'];$_750987_local_vars=$_750987_old_vars['_0edead'];?>

                <?php endif;$_750987_local_params=$_750987_old_params['_d1ca21'];$_750987_local_vars=$_750987_old_vars['_d1ca21'];?>

                <?php $_750987_old_params['_9f35df']=$_750987_local_params;$_750987_old_vars['_9f35df']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_750987_old_params['_8e1665']=$_750987_local_params;$_750987_old_vars['_8e1665']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_8e1665'];$_750987_local_vars=$_750987_old_vars['_8e1665'];?>

                  <?php $_750987_old_params['_819bdf']=$_750987_local_params;$_750987_old_vars['_819bdf']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_750987_local_params=$_750987_old_params['_819bdf'];$_750987_local_vars=$_750987_old_vars['_819bdf'];?>

                  <label class="edit-options-child <?php $_750987_old_params['_65dbda']=$_750987_local_params;$_750987_old_vars['_65dbda']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_750987_local_params=$_750987_old_params['_65dbda'];$_750987_local_vars=$_750987_old_vars['_65dbda'];?>
custom-control custom-checkbox" id="label-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                    <?php $_750987_old_params['_fc89b5']=$_750987_local_params;$_750987_old_vars['_fc89b5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <input type="hidden" id="" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <?php endif;$_750987_local_params=$_750987_old_params['_fc89b5'];$_750987_local_vars=$_750987_old_vars['_fc89b5'];?>

                    <input<?php $_750987_old_params['_ccd9fe']=$_750987_local_params;$_750987_old_vars['_ccd9fe']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php else:?>
<?php $_750987_old_params['_32d344']=$_750987_local_params;$_750987_old_vars['_32d344']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 onclick="return false;" checked <?php else:?>

                    <?php $_750987_old_params['_a3a512']=$_750987_local_params;$_750987_old_vars['_a3a512']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_750987_local_params=$_750987_old_params['_a3a512'];$_750987_local_vars=$_750987_old_vars['_a3a512'];?>

                    <?php endif;$_750987_local_params=$_750987_old_params['_32d344'];$_750987_local_vars=$_750987_old_vars['_32d344'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_ccd9fe'];$_750987_local_vars=$_750987_old_vars['_ccd9fe'];?>
<?php $_750987_old_params['_319eb0']=$_750987_local_params;$_750987_old_vars['_319eb0']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_750987_local_params=$_750987_old_params['_319eb0'];$_750987_local_vars=$_750987_old_vars['_319eb0'];?>
 type="<?php $_750987_old_params['_3d489a']=$_750987_local_params;$_750987_old_vars['_3d489a']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
checkbox<?php endif;$_750987_local_params=$_750987_old_params['_3d489a'];$_750987_local_vars=$_750987_old_vars['_3d489a'];?>
" class="custom-control-input disp_option disp_option-cb" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator<?php $_750987_old_params['_e545fc']=$_750987_local_params;$_750987_old_vars['_e545fc']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_750987_local_params=$_750987_old_params['_e545fc'];$_750987_local_vars=$_750987_old_vars['_e545fc'];?>
<?php $_750987_old_params['_c4ae9e']=$_750987_local_params;$_750987_old_vars['_c4ae9e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_750987_local_params=$_750987_old_params['_c4ae9e'];$_750987_local_vars=$_750987_old_vars['_c4ae9e'];?>
"></span>
                    <span class="custom-control-description"> 
                    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
                  </label>
                <?php endif;$_750987_local_params=$_750987_old_params['_9f35df'];$_750987_local_vars=$_750987_old_vars['_9f35df'];?>

              <?php endif;$_750987_local_params=$_750987_old_params['_7fd281'];$_750987_local_vars=$_750987_old_vars['_7fd281'];?>

            <?php endif;$c_e1fc5d=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_e1fc5d'];$_750987_local_vars=$_750987_old_vars['_e1fc5d'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_0ffed4'];$_750987_local_vars=$_750987_old_vars['_0ffed4'];?>

                <?php $c_d4a1b0=null;$_750987_old_params['_d4a1b0']=$_750987_local_params;$_750987_old_vars['_d4a1b0']=$_750987_local_vars;$a_d4a1b0=$this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$model','id'=>'$object_id','this_tag'=>'fieldloop'],null,$this);$_d4a1b0=-1;$r_d4a1b0=true;while($r_d4a1b0===true):$r_d4a1b0=($_d4a1b0!==-1)?false:true;echo $this->component('PTTags')->hdlr_fieldloop($a_d4a1b0,$c_d4a1b0,$this,$r_d4a1b0,++$_d4a1b0,'_d4a1b0');ob_start();?>
<?php $c_d4a1b0 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_d4a1b0=false;}if($c_d4a1b0 ):?>

                <?php $c_8356e5=null;$_750987_old_params['_8356e5']=$_750987_local_params;$_750987_old_vars['_8356e5']=$_750987_local_vars;$a_8356e5=$this->setup_args(['name'=>'_fieldbasename','this_tag'=>'setvarblock'],null,$this);ob_start();?>
field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_8356e5=ob_get_clean();$c_8356e5=$this->block_setvarblock($a_8356e5,$c_8356e5,$this,$r_8356e5,1,'_8356e5');echo($c_8356e5); $_750987_local_params=$_750987_old_params['_8356e5'];?>

                <label class="<?php $_750987_old_params['_960d94']=$_750987_local_params;$_750987_old_vars['_960d94']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_750987_local_params=$_750987_old_params['_960d94'];$_750987_local_vars=$_750987_old_vars['_960d94'];?>
custom-control custom-checkbox" id="label-<?php echo $this->function_var($this->setup_args(['name'=>'_fieldbasename','this_tag'=>'var'],null,$this),$this)?>
">
                  <input<?php $_750987_old_params['_7b3e27']=$_750987_local_params;$_750987_old_vars['_7b3e27']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_750987_local_params=$_750987_old_params['_7b3e27'];$_750987_local_vars=$_750987_old_vars['_7b3e27'];?>

                  <?php $_750987_old_params['_586ffd']=$_750987_local_params;$_750987_old_vars['_586ffd']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_750987_local_params=$_750987_old_params['_586ffd'];$_750987_local_vars=$_750987_old_vars['_586ffd'];?>

                  <?php $_750987_old_params['_a9765c']=$_750987_local_params;$_750987_old_vars['_a9765c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_750987_local_params=$_750987_old_params['_a9765c'];$_750987_local_vars=$_750987_old_vars['_a9765c'];?>
 <?php $_750987_old_params['_3d026a']=$_750987_local_params;$_750987_old_vars['_3d026a']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_3d026a'];$_750987_local_vars=$_750987_old_vars['_3d026a'];?>
 type="checkbox" class="custom-control-input disp_option disp_option-cb" id="field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_750987_old_params['_b32592']=$_750987_local_params;$_750987_old_vars['_b32592']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_750987_local_params=$_750987_old_params['_b32592'];$_750987_local_vars=$_750987_old_vars['_b32592'];?>
"></span>
                  <span class="custom-control-description"> 
                  <?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'field__name','trans'=>'1','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans'),ENT_QUOTES)?>
</span>
                </label>
                <?php endif;$c_d4a1b0=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_d4a1b0'];$_750987_local_vars=$_750987_old_vars['_d4a1b0'];?>

              <?php $_750987_old_params['_36944d']=$_750987_local_params;$_750987_old_vars['_36944d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div>
                  <p class="text-muted hint-block">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can change the display order of fields with drag &amp; drop.','this_tag'=>'trans'],null,$this),$this)?>

                  </p>
                </div>
              <?php endif;$_750987_local_params=$_750987_old_params['_36944d'];$_750987_local_vars=$_750987_old_vars['_36944d'];?>

              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="reset-disp-option" class="btn btn-warning" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Reset','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="button" id="disp_options_save" class="btn btn-primary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Save Changes','this_tag'=>'trans'],null,$this),$this)?>
</button>
        </div>
      </form>
      </div>
    </div>
  </div>
<?php endif;$_acf7b9=ob_get_clean();echo $this->modifier_trim_space($_acf7b9,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_750987_local_params=$_750987_old_params['_acf7b9'];$_750987_local_vars=$_750987_old_vars['_acf7b9'];?>

<script>
<?php $_750987_old_params['_19ca6c']=$_750987_local_params;$_750987_old_vars['_19ca6c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#edit_options_loop').sortable({
    stop: function( evt, ui ) {
        sort_fields();
    }
});
$("#edit_options_loop").ksortable();
<?php endif;$_750987_local_params=$_750987_old_params['_19ca6c'];$_750987_local_vars=$_750987_old_vars['_19ca6c'];?>

function sort_fields(){
    var editor_data = [];
    if(tinymce && tinymce.editors){
        for(var i = tinymce.editors.length -1; i >= 0; i--){
            var ed = tinymce.editors[i];
            editor_data.push({
                target  : ed.targetElm,
                setting : ed.settings
            });
        }
    }
    var field_objects = [];
    var field_names = [];
    $('.disp_option-cb').each(function(){
        var field_name = $(this).prop('name');
        field_name = field_name.replace( /^_d_/, '' );
        field_names.push( field_name );
        field_objects.push( $('#' + field_name + '-wrapper' ) );
        $('#' + field_name + '-wrapper' ).find('');
    });
    $('#_field_sort_order').val(field_names.join(','));
    $('#_start_fields').after(field_objects);
    for(var i = 0; i < editor_data.length; i++){
        tinyMCE.execCommand('mceAddEditor', false, editor_data[i].target);
    }
    reorder_fields();
}
function reorder_fields(){
    var field_objects = [];
    var field_names = [];
    $('.disp_option-cb').each(function(){
        let field_name = $(this).prop('name');
        field_name = field_name.replace( /^_d_/, '' );
        field_names.push( field_name );
        field_objects.push( $('#' + field_name + '-wrapper' ) );
    });
    $('#_field_sort_order').val(field_names.join(','));
    $('#_start_fields').after(field_objects);
    var oldTextFormat = null;
    if ( $('#text_format-select').length ){
        oldTextFormat = $('#text_format-select').val();
    }
    if( tinymce && ( oldTextFormat == null || oldTextFormat == 'richtext' ) ){
        tinymce.EditorManager.remove();
        editorInit();
    }
    $(document).trigger('pcmsx.reorder_fields_done');
}
$("#disp_options_save").click(function(){
    let str = $("#disp_options_form").serialize();
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", str,
    function ( data ) {
        if( data.result == true ) {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'%s\'s display options saved successfully.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
");
        } else {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while saving %s.','params'=>'$options_title','this_tag'=>'trans'],null,$this),$this)?>
", 'danger');
        }
    },
    "json"
    );
});
$('#reset-disp-option').click(function(){
    if (! confirm( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to reset display options?','this_tag'=>'trans'],null,$this),$this)?>
' ) ) {
        return false;
    }
    $('#_reset-disp-oprions').val(1);
    let str = $("#disp_options_form").serialize();
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", str,
    function ( data ) {
        $('#_reset-disp-oprions').val('');
        if( data.result == true ) {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'%s\'s display options reset successfully.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
 <?php echo $this->function_trans($this->setup_args(['phrase'=>'Changes will be reflected the next time you open the screen.','this_tag'=>'trans'],null,$this),$this)?>
", 'warning');
        } else {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while resetting %s.','params'=>'$options_title','this_tag'=>'trans'],null,$this),$this)?>
", 'danger');
        }
    },
    "json"
    );
});
$(".disp_option").change(function(){
    let colname = $(this).prop("id");
    let wrapper_name = "#" + colname + 'wrapper';
    let option_name = "." + colname + 'option';
    let wrapper = $(wrapper_name);
    let option  = $(option_name);
    if($(this).prop("checked")) {
        wrapper.show("fade");
        option.show();
    } else {
        wrapper.hide("fade");
        option.hide();
    }
    let richtext = wrapper.find('textarea.richtext');
    if ( richtext.length && $(this).prop('checked') ) {
<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_750987_old_params['_fb8ef8']=$_750987_local_params;$_750987_old_vars['_fb8ef8']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        let editor4 = $('.mce-edit-area iframe');
        if ( editor4.length ) {
            let editor_height = richtext.attr( 'rows' );
            editor_height *= 25;
            editor4.css( 'height', editor_height + 'px' );
        }
<?php else:?>

        if ( richtext.next().attr('role') == 'application' ) {
            let editor_height = richtext.attr( 'rows' );
            editor_height *= 25;
            richtext.next().css( 'height', editor_height + 'px' );
        }
<?php endif;$_750987_local_params=$_750987_old_params['_fb8ef8'];$_750987_local_vars=$_750987_old_vars['_fb8ef8'];?>

    }
    updateFieldSelector();
});
</script>
      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_750987_local_params=$_750987_old_params['_02288f'];$_750987_local_vars=$_750987_old_vars['_02288f'];?>

  <?php endif;$_750987_local_params=$_750987_old_params['_1d3e61'];$_750987_local_vars=$_750987_old_vars['_1d3e61'];?>

<script>
$(function () {
    if (window.ontouchstart !== null) {
        $('[data-toggle="tooltip"]').tooltip();
    }
})
$('.dropdown-sub').each(function(){
    if ( $(this).hasClass( 'active' ) ) {
        $(this).parent().parent().css('background-color','#444');
    }
})
$('#__logout').click(function(e){
    <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->modifier_escape($this->function_var($this->setup_args(['name'=>'appname','escape'=>'js','regex_replace'=>'\'/\\\'/g\',\'\\\\\'\'','setvar'=>'_appname','this_tag'=>'var'],null,$this),$this),$this->setup_args('js','escape',$this),$this,'escape'),$this->setup_args('\\\'/\\\\\\\'/g\\\',\\\'\\\\\\\\\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_appname','setvar',$this),$this,'setvar')?>

    if (! window.confirm( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to log out from %s?','params'=>'$_appname','this_tag'=>'trans'],null,$this),$this)?>
' ) ) {
        e.preventDefault();
    }
})
</script>
<?php $_750987_old_params['_398c55']=$_750987_local_params;$_750987_old_vars['_398c55']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'output_container','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <div class="container-fluid">
<?php endif;$_750987_local_params=$_750987_old_params['_398c55'];$_750987_local_vars=$_750987_old_vars['_398c55'];?>

      <div class="row">
        <main class="col-md-12 pt-3">
          <h1 id="page-title" <?php $_750987_old_params['_120e7f']=$_750987_local_params;$_750987_old_vars['_120e7f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_ab612f']=$_750987_local_params;$_750987_old_vars['_ab612f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_7630b8']=$_750987_local_params;$_750987_old_vars['_7630b8']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
style="margin-top:-33px"<?php else:?>
style="margin-top:-36px"<?php endif;$_750987_local_params=$_750987_old_params['_7630b8'];$_750987_local_vars=$_750987_old_vars['_7630b8'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_ab612f'];$_750987_local_vars=$_750987_old_vars['_ab612f'];?>
 class="title-with-opt"<?php else:?>
 <?php $_750987_old_params['_5ef5b0']=$_750987_local_params;$_750987_old_vars['_5ef5b0']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_52ced6']=$_750987_local_params;$_750987_old_vars['_52ced6']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_fix_spacebar','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
style="margin-top:-3px"<?php else:?>
style="margin-top:-11px"<?php endif;$_750987_local_params=$_750987_old_params['_52ced6'];$_750987_local_vars=$_750987_old_vars['_52ced6'];?>
<?php else:?>
style="margin-top:-10px"<?php endif;$_750987_local_params=$_750987_old_params['_5ef5b0'];$_750987_local_vars=$_750987_old_vars['_5ef5b0'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_120e7f'];$_750987_local_vars=$_750987_old_vars['_120e7f'];?>
>
          <span class="title">
          <?php $_750987_old_params['_095a4e']=$_750987_local_params;$_750987_old_vars['_095a4e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_d58641']=$_750987_local_params;$_750987_old_vars['_d58641']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php $_750987_old_params['_64c97b']=$_750987_local_params;$_750987_old_vars['_64c97b']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;manage_revision=1<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.revision_select','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&amp;manage_revision=1<?php endif;$_750987_local_params=$_750987_old_params['_64c97b'];$_750987_local_vars=$_750987_old_vars['_64c97b'];?>
"><?php endif;$_750987_local_params=$_750987_old_params['_d58641'];$_750987_local_vars=$_750987_old_vars['_d58641'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_095a4e'];$_750987_local_vars=$_750987_old_vars['_095a4e'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'page_title','this_tag'=>'var'],null,$this),$this)?>
<?php $_750987_old_params['_f31751']=$_750987_local_params;$_750987_old_vars['_f31751']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_e2837e']=$_750987_local_params;$_750987_old_vars['_e2837e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</a><?php endif;$_750987_local_params=$_750987_old_params['_e2837e'];$_750987_local_vars=$_750987_old_vars['_e2837e'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_f31751'];$_750987_local_vars=$_750987_old_vars['_f31751'];?>

          </span>
          <?php echo $this->function_var($this->setup_args(['name'=>'add_heading','this_tag'=>'var'],null,$this),$this)?>

      <?php $_750987_old_params['_22fbe4']=$_750987_local_params;$_750987_old_vars['_22fbe4']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_370590']=$_750987_local_params;$_750987_old_vars['_370590']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_750987_old_params['_4be209']=$_750987_local_params;$_750987_old_vars['_4be209']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_610b5c']=$_750987_local_params;$_750987_old_vars['_610b5c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'dashboard','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_d02f0a']=$_750987_local_params;$_750987_old_vars['_d02f0a']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'error','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_21cdce']=$_750987_local_params;$_750987_old_vars['_21cdce']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#filterOptions">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Filters','this_tag'=>'trans'],null,$this),$this)?>

          </button>
          <?php endif;$_750987_local_params=$_750987_old_params['_21cdce'];$_750987_local_vars=$_750987_old_vars['_21cdce'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_d02f0a'];$_750987_local_vars=$_750987_old_vars['_d02f0a'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_610b5c'];$_750987_local_vars=$_750987_old_vars['_610b5c'];?>

        <?php endif;$_750987_local_params=$_750987_old_params['_4be209'];$_750987_local_vars=$_750987_old_vars['_4be209'];?>

        <?php $_750987_old_params['_be32a0']=$_750987_local_params;$_750987_old_vars['_be32a0']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'can_create','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_2c5838']=$_750987_local_params;$_750987_old_vars['_2c5838']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_750987_old_params['_5343cb']=$_750987_local_params;$_750987_old_vars['_5343cb']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_750987_old_params['_0904a4']=$_750987_local_params;$_750987_old_vars['_0904a4']=$_750987_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'update_all','model'=>'$this_model','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

              <?php endif;$_750987_local_params=$_750987_old_params['_0904a4'];$_750987_local_vars=$_750987_old_vars['_0904a4'];?>

            <?php endif;$_750987_local_params=$_750987_old_params['_5343cb'];$_750987_local_vars=$_750987_old_vars['_5343cb'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_2c5838'];$_750987_local_vars=$_750987_old_vars['_2c5838'];?>

        <?php endif;$_750987_local_params=$_750987_old_params['_be32a0'];$_750987_local_vars=$_750987_old_vars['_be32a0'];?>

        <?php $_750987_old_params['_618375']=$_750987_local_params;$_750987_old_vars['_618375']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_create','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_9f0f5b']=$_750987_local_params;$_750987_old_vars['_9f0f5b']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_750987_old_params['_d3050f']=$_750987_local_params;$_750987_old_vars['_d3050f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'label','setvar'=>'orig_label','this_tag'=>'var'],null,$this),$this),$this->setup_args('orig_label','setvar',$this),$this,'setvar')?>

              <?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'Syetem\'s Role','setvar'=>'label','this_tag'=>'trans'],null,$this),$this),$this->setup_args('label','setvar',$this),$this,'setvar')?>

            <?php endif;$_750987_local_params=$_750987_old_params['_d3050f'];$_750987_local_vars=$_750987_old_vars['_d3050f'];?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php $_750987_old_params['_9561fa']=$_750987_local_params;$_750987_old_vars['_9561fa']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._system_filters_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_465d75']=$_750987_local_params;$_750987_old_vars['_465d75']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'tag','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;tag_obj=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_465d75'];$_750987_local_vars=$_750987_old_vars['_465d75'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_9561fa'];$_750987_local_vars=$_750987_old_vars['_9561fa'];?>
">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php $_750987_old_params['_665008']=$_750987_local_params;$_750987_old_vars['_665008']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;workspace_role=1">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New WorkSpace\'s Role','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New WorkSpace\'s Role','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New WorkSpace\'s Role','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'orig_label','setvar'=>'label','this_tag'=>'var'],null,$this),$this),$this->setup_args('label','setvar',$this),$this,'setvar')?>

            <?php endif;$_750987_local_params=$_750987_old_params['_665008'];$_750987_local_vars=$_750987_old_vars['_665008'];?>

            <?php $_750987_old_params['_4160ce']=$_750987_local_params;$_750987_old_vars['_4160ce']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_a6ba89']=$_750987_local_params;$_750987_old_vars['_a6ba89']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a class="pack-left btn btn-secondary btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=hierarchy&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
">
            <i class="hidden fa fa-sitemap" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Hierarchy','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Hierarchy','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Hierarchy','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php endif;$_750987_local_params=$_750987_old_params['_a6ba89'];$_750987_local_vars=$_750987_old_vars['_a6ba89'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_4160ce'];$_750987_local_vars=$_750987_old_vars['_4160ce'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_9f0f5b'];$_750987_local_vars=$_750987_old_vars['_9f0f5b'];?>

          <?php $_750987_old_params['_45f60a']=$_750987_local_params;$_750987_old_vars['_45f60a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_750987_old_params['_ac578e']=$_750987_local_params;$_750987_old_vars['_ac578e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.saved','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_750987_old_params['_6c7d42']=$_750987_local_params;$_750987_old_vars['_6c7d42']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'model','eq'=>'role','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_d16ae5']=$_750987_local_params;$_750987_old_vars['_d16ae5']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request._profile','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_750987_old_params['_43037f']=$_750987_local_params;$_750987_old_vars['_43037f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','ne'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_43037f'];$_750987_local_vars=$_750987_old_vars['_43037f'];?>
">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php endif;$_750987_local_params=$_750987_old_params['_d16ae5'];$_750987_local_vars=$_750987_old_vars['_d16ae5'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_6c7d42'];$_750987_local_vars=$_750987_old_vars['_6c7d42'];?>

            <?php endif;$_750987_local_params=$_750987_old_params['_ac578e'];$_750987_local_vars=$_750987_old_vars['_ac578e'];?>

            <?php $_750987_old_params['_0a143b']=$_750987_local_params;$_750987_old_vars['_0a143b']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','ne'=>'hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_750987_old_params['_bdd2ed']=$_750987_local_params;$_750987_old_vars['_bdd2ed']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'user','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_750987_old_params['_6d0933']=$_750987_local_params;$_750987_old_vars['_6d0933']=$_750987_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_c53971']=$_750987_local_params;$_750987_old_vars['_c53971']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request._profile','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
">
            <i class="hidden fa fa-list" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
              <?php endif;$_750987_local_params=$_750987_old_params['_c53971'];$_750987_local_vars=$_750987_old_vars['_c53971'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_6d0933'];$_750987_local_vars=$_750987_old_vars['_6d0933'];?>

            <?php else:?>

          <a class="btn btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_750987_old_params['_4c4fac']=$_750987_local_params;$_750987_old_vars['_4c4fac']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._model','ne'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_4c4fac'];$_750987_local_vars=$_750987_old_vars['_4c4fac'];?>
">
            <i class="hidden fa fa-list" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php $_750987_old_params['_32629f']=$_750987_local_params;$_750987_old_vars['_32629f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_f19e9c']=$_750987_local_params;$_750987_old_vars['_f19e9c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a class="pack-left btn btn-secondary btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=hierarchy&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
">
            <i class="hidden fa fa-sitemap" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Hierarchy','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Hierarchy','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Hierarchy','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php endif;$_750987_local_params=$_750987_old_params['_f19e9c'];$_750987_local_vars=$_750987_old_vars['_f19e9c'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_32629f'];$_750987_local_vars=$_750987_old_vars['_32629f'];?>

            <?php endif;$_750987_local_params=$_750987_old_params['_bdd2ed'];$_750987_local_vars=$_750987_old_vars['_bdd2ed'];?>

            <?php endif;$_750987_local_params=$_750987_old_params['_0a143b'];$_750987_local_vars=$_750987_old_vars['_0a143b'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_45f60a'];$_750987_local_vars=$_750987_old_vars['_45f60a'];?>

          <?php $_750987_old_params['_c7696c']=$_750987_local_params;$_750987_old_vars['_c7696c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_750987_old_params['_469dff']=$_750987_local_params;$_750987_old_vars['_469dff']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_750987_old_params['_81aa0f']=$_750987_local_params;$_750987_old_vars['_81aa0f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_create','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#startUpload">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload','this_tag'=>'trans'],null,$this),$this)?>

          </button>
            <?php endif;$_750987_local_params=$_750987_old_params['_81aa0f'];$_750987_local_vars=$_750987_old_vars['_81aa0f'];?>

            <?php endif;$_750987_local_params=$_750987_old_params['_469dff'];$_750987_local_vars=$_750987_old_vars['_469dff'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_c7696c'];$_750987_local_vars=$_750987_old_vars['_c7696c'];?>

        <?php else:?>

          <?php $_750987_old_params['_48ff38']=$_750987_local_params;$_750987_old_vars['_48ff38']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_750987_old_params['_5c88ed']=$_750987_local_params;$_750987_old_vars['_5c88ed']=$_750987_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'list','model'=>'$model','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php endif;$_750987_local_params=$_750987_old_params['_5c88ed'];$_750987_local_vars=$_750987_old_vars['_5c88ed'];?>

            <?php $_750987_old_params['_f2f4b8']=$_750987_local_params;$_750987_old_vars['_f2f4b8']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._model','eq'=>'comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request._model','eq'=>'contact','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

              <?php echo $this->function_setvar($this->setup_args(['name'=>'show_return_to_list','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

            <?php endif;$_750987_local_params=$_750987_old_params['_f2f4b8'];$_750987_local_vars=$_750987_old_vars['_f2f4b8'];?>

            <?php $_750987_old_params['_399d85']=$_750987_local_params;$_750987_old_vars['_399d85']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'show_return_to_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
">
            <i class="hidden fa fa-list" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
            <?php endif;$_750987_local_params=$_750987_old_params['_399d85'];$_750987_local_vars=$_750987_old_vars['_399d85'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_48ff38'];$_750987_local_vars=$_750987_old_vars['_48ff38'];?>

        <?php endif;$_750987_local_params=$_750987_old_params['_618375'];$_750987_local_vars=$_750987_old_vars['_618375'];?>

          <?php $_750987_old_params['_07829b']=$_750987_local_params;$_750987_old_vars['_07829b']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'hierarchy','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
">
            <i class="hidden fa fa-list" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_750987_local_params=$_750987_old_params['_07829b'];$_750987_local_vars=$_750987_old_vars['_07829b'];?>

      <?php endif;$_750987_local_params=$_750987_old_params['_370590'];$_750987_local_vars=$_750987_old_vars['_370590'];?>

      <?php endif;$_750987_local_params=$_750987_old_params['_22fbe4'];$_750987_local_vars=$_750987_old_vars['_22fbe4'];?>

      <?php $_750987_old_params['_23136e']=$_750987_local_params;$_750987_old_vars['_23136e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_750987_old_params['_277cdf']=$_750987_local_params;$_750987_old_vars['_277cdf']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_278337']=$_750987_local_params;$_750987_old_vars['_278337']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_54044d']=$_750987_local_params;$_750987_old_vars['_54044d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
">
            <i class="hidden fa fa-list" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php else:?>

          <?php $_750987_old_params['_6d1dc1']=$_750987_local_params;$_750987_old_vars['_6d1dc1']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="pack-left btn btn-secondary btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
&amp;manage_revision=1">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Manage Revision','this_tag'=>'trans'],null,$this),$this)?>

          </a>
          <?php endif;$_750987_local_params=$_750987_old_params['_6d1dc1'];$_750987_local_vars=$_750987_old_vars['_6d1dc1'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_54044d'];$_750987_local_vars=$_750987_old_vars['_54044d'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_278337'];$_750987_local_vars=$_750987_old_vars['_278337'];?>

        <?php endif;$_750987_local_params=$_750987_old_params['_277cdf'];$_750987_local_vars=$_750987_old_vars['_277cdf'];?>

      <?php endif;$_750987_local_params=$_750987_old_params['_23136e'];$_750987_local_vars=$_750987_old_vars['_23136e'];?>

      <?php $_750987_old_params['_f309ac']=$_750987_local_params;$_750987_old_vars['_f309ac']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_7a70b8']=$_750987_local_params;$_750987_old_vars['_7a70b8']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_bcf9a5']=$_750987_local_params;$_750987_old_vars['_bcf9a5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'dashboard','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a class="btn btn-sm header-btn-icon" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=dashboard&amp;<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
">
          <i class="hidden fa fa-home" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
"></i>
          <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Dashboard','this_tag'=>'trans'],null,$this),$this)?>
</span>
        </a>
      <?php endif;$_750987_local_params=$_750987_old_params['_bcf9a5'];$_750987_local_vars=$_750987_old_vars['_bcf9a5'];?>

      <?php endif;$_750987_local_params=$_750987_old_params['_7a70b8'];$_750987_local_vars=$_750987_old_vars['_7a70b8'];?>

      <?php endif;$_750987_local_params=$_750987_old_params['_f309ac'];$_750987_local_vars=$_750987_old_vars['_f309ac'];?>

          </h1>
    <?php $c_cc39fe=null;$_750987_old_params['_cc39fe']=$_750987_local_params;$_750987_old_vars['_cc39fe']=$_750987_local_vars;$a_cc39fe=$this->setup_args(['name'=>'alert_close','this_tag'=>'setvarblock'],null,$this);ob_start();?>

    <button type="button" class="close" data-dismiss="alert" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
      <span aria-hidden="true">&times;</span>
    </button>
    <?php $c_cc39fe=ob_get_clean();$c_cc39fe=$this->block_setvarblock($a_cc39fe,$c_cc39fe,$this,$r_cc39fe,1,'_cc39fe');echo($c_cc39fe); $_750987_local_params=$_750987_old_params['_cc39fe'];?>

    <div class="alert alert-success hidden" id="header-alert" role="alert" tabindex="0">
      <button onclick="$('#header-alert').hide();" type="button" id="header-alert-close" class="close" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
        <span aria-hidden="true">&times;</span>
      </button>
      <span id="header-alert-message"></span>
    </div>
    <?php $_750987_old_params['_549850']=$_750987_local_params;$_750987_old_vars['_549850']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'header_alert_message','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <div id="header-alert-message" class="alert alert-<?php $_750987_old_params['_8c931d']=$_750987_local_params;$_750987_old_vars['_8c931d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'header_alert_class','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'header_alert_class','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
success<?php endif;$_750987_local_params=$_750987_old_params['_8c931d'];$_750987_local_vars=$_750987_old_vars['_8c931d'];?>
" tabindex="0">
      <?php $_750987_old_params['_c475fb']=$_750987_local_params;$_750987_old_vars['_c475fb']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'header_alert_force','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'alert_close','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_c475fb'];$_750987_local_vars=$_750987_old_vars['_c475fb'];?>

      <?php echo $this->function_var($this->setup_args(['name'=>'header_alert_message','this_tag'=>'var'],null,$this),$this)?>

      <?php $_750987_old_params['_ad07b5']=$_750987_local_params;$_750987_old_vars['_ad07b5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.need_rebuild','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <a href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=rebuild_phase&amp;_type=start_rebuild<?php $_750987_old_params['_16e92c']=$_750987_local_params;$_750987_old_vars['_16e92c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
"<?php endif;$_750987_local_params=$_750987_old_params['_16e92c'];$_750987_local_vars=$_750987_old_vars['_16e92c'];?>
" class="popup">
        <?php echo $this->function_trans($this->setup_args(['phrase'=>'Publish your site to see these changes take effect.','this_tag'=>'trans'],null,$this),$this)?>

        </a>
      <?php endif;$_750987_local_params=$_750987_old_params['_ad07b5'];$_750987_local_vars=$_750987_old_vars['_ad07b5'];?>

    </div>
    <script>
    $('#header-alert-message').focus();
    </script>
    <?php endif;$_750987_local_params=$_750987_old_params['_549850'];$_750987_local_vars=$_750987_old_vars['_549850'];?>

    <?php $_750987_old_params['_2efad5']=$_750987_local_params;$_750987_old_vars['_2efad5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <div id="header-error-message" class="alert alert-danger" role="alert" tabindex="0">
      <?php echo paml_modifier_funcs('nl2br', paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'error','escape'=>'1','nl2br'=>'1','this_tag'=>'var'],null,$this),$this),ENT_QUOTES))?>

      </div>
    <script>
    $('#header-error-message').focus();
    </script>
    <?php endif;$_750987_local_params=$_750987_old_params['_2efad5'];$_750987_local_vars=$_750987_old_vars['_2efad5'];?>

<?php endif;$_750987_local_params=$_750987_old_params['_21e3a0'];$_750987_local_vars=$_750987_old_vars['_21e3a0'];?>

<style type="text/css">
.dd { position: relative; display: block; margin: 0; padding: 0; max-width: 100%; list-style: none; font-size: 14px; line-height: 20px; }
.dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }
.dd-list .dd-list { padding-left: 30px; }
.dd-collapsed .dd-list { display: none; }
.dd-item,
.dd-empty,
.dd-placeholder { display: block; position: relative; margin: 0; padding-left: 10px; min-height: 20px; font-size: 16px; line-height: 20px; }
.dd-handle { display: block; height: 40px; margin: 5px 0; padding: 5px 19px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
    background: #fafafa;
    background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:         linear-gradient(top, #fafafa 0%, #eee 100%);
    -webkit-border-radius: 3px;
            border-radius: 3px;
    box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd-handle:hover { color: #333; background: #ddd; }
.dd-item > button { display: block; position: relative; cursor: move; float: left; width: 25px; height: 20px; margin: 5px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; }
.dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; }
.dd-item > button[data-action="collapse"]:before { content: '-'; }
.dd-placeholder,
.dd-empty { margin: 5px 0; padding: 0; min-height: 40px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; -moz-box-sizing: border-box; }
.dd-empty { border: 1px dashed #bbb; min-height: 100px; background-color: #e5e5e5;
    background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                      -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                         -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                              linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-size: 60px 60px;
    background-position: 0 0, 30px 30px;
}
.dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }
.dd-dragel > .dd-item .dd-handle { margin-top: 0; }
.dd-dragel .dd-handle {
    -webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
            box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
}
.nestable-lists { display: block; clear: both; padding: 30px 0; width: 100%; border: 0; border-top: 2px solid #ddd; border-bottom: 2px solid #ddd; }
#nestable-menu { padding: 0; margin: 20px 0; }
#nestable-output,
@media only screen and (min-width: 700px) {
    .dd { float: left; width: 100%; }
    .dd + .dd { margin-left: 2%; }
}
.dd-hover > .dd-handle { background: #2ea8e5 !important; }
.dd-content { display: block; min-height: 41px; margin: 5px 0; padding: 8px 10px 6px 40px; color: #333; text-decoration: none; border: 1px solid #ccc;
    -webkit-border-radius: 3px;
            border-radius: 3px;
    line-height: 1.4rem !important;
    box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd-content:hover { background: #ddd; }
.dd-dragel > . > .dd-content { margin: 0; }
. > button { margin-left: 30px; }
.dd--handle {
    position: absolute;
    margin: 0; left: 0; top: 0;
    cursor: move;
    width: 30px;
    text-indent: 100%;
    white-space: nowrap;
    overflow: hidden;
    border: 1px solid #777;
    background: #777;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.dd--handle:before { content: '≡'; display: block; position: absolute; left: 0; top: 8px; width: 100%; text-align: center; text-indent: 0; color: #fff; font-size: 28px; font-weight: normal; }
.dd--handle:hover { background: #333; }
.socialite { display: block; float: left; height: 35px; }
.editable { margin-left: 0rem !important; margin-top: -2rem; padding-left: 8px; padding-right: 8px; width: <?php $_750987_old_params['_5d4899']=$_750987_local_params;$_750987_old_vars['_5d4899']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
150<?php else:?>
200<?php endif;$_750987_local_params=$_750987_old_params['_5d4899'];$_750987_local_vars=$_750987_old_vars['_5d4899'];?>
px !important; }
.add-btn, .edit-btn, .delete-btn, .save-btn, .cancel-btn { margin-top: -3px; padding:3px 6px; }
.edit-btn { margin-left: 0.6rem; }
#item-add-btn { width:100px; padding-left: 0; }
.btn-success { background-color: #5D9058; border-color: transparent }
.editable-label { margin-left: -0.3rem !important; }
<?php $_750987_old_params['_1397db']=$_750987_local_params;$_750987_old_vars['_1397db']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'workspace_show_both','setvar'=>'_show_both','this_tag'=>'var'],null,$this),$this),$this->setup_args('_show_both','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'workspace_link_url','setvar'=>'_link_url','this_tag'=>'var'],null,$this),$this),$this->setup_args('_link_url','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'workspace_site_url','setvar'=>'_site_url','this_tag'=>'var'],null,$this),$this),$this->setup_args('_site_url','setvar',$this),$this,'setvar')?>

<?php else:?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'show_both','setvar'=>'_show_both','this_tag'=>'var'],null,$this),$this),$this->setup_args('_show_both','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'link_url','setvar'=>'_link_url','this_tag'=>'var'],null,$this),$this),$this->setup_args('_link_url','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'site_url','setvar'=>'_site_url','this_tag'=>'var'],null,$this),$this),$this->setup_args('_site_url','setvar',$this),$this,'setvar')?>

<?php endif;$_750987_local_params=$_750987_old_params['_1397db'];$_750987_local_vars=$_750987_old_vars['_1397db'];?>

.external-link { position: absolute; right: <?php $_750987_old_params['_183d5f']=$_750987_local_params;$_750987_old_vars['_183d5f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_show_both','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
2.5<?php else:?>
1<?php endif;$_750987_local_params=$_750987_old_params['_183d5f'];$_750987_local_vars=$_750987_old_vars['_183d5f'];?>
rem; }
.external-link-pub { position: absolute; right: 1rem; }
.form-control-sm { padding:0 5px; }
</style>
<?php $_750987_old_params['_80f053']=$_750987_local_params;$_750987_old_vars['_80f053']=$_750987_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'basename','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php echo $this->function_setvar($this->setup_args(['name'=>'has_basename','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

<?php endif;$_750987_local_params=$_750987_old_params['_80f053'];$_750987_local_vars=$_750987_old_vars['_80f053'];?>

<form action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST" id="edit-form-main">
<textarea id="nestable-output" name="_nestable_output" class="hidden"></textarea>
<textarea id="nestable-param" name="_nestable_param" class="hidden"></textarea>
<input type="hidden" name="__mode" value="save_hierarchy">
<input type="hidden" name="_model" value="<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
">
<input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">
<input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
<input type="hidden" name="hierarchy_changed" value="" id="hierarchy_changed">
<input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<input type="hidden" name="dialog_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.dialog_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
<?php echo $this->function_setvar($this->setup_args(['name'=>'_parent_id','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_modelproperty($this->setup_args(['name'=>'$model','property'=>'primary','setvar'=>'object_primary','this_tag'=>'modelproperty'],null,$this),$this),$this->setup_args('object_primary','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->component('PTTags')->filter_language($this->function_trans($this->setup_args(['phrase'=>'$object_primary','language'=>'default','setvar'=>'object_primary','this_tag'=>'trans'],null,$this),$this),$this->setup_args('default','language',$this),$this,'language'),$this->setup_args('object_primary','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'$object_primary','setvar'=>'object_primary','this_tag'=>'trans'],null,$this),$this),$this->setup_args('object_primary','setvar',$this),$this,'setvar')?>

<?php $_750987_old_params['_3a3b5c']=$_750987_local_params;$_750987_old_vars['_3a3b5c']=$_750987_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'create','model'=>'$model','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

<button id="item-add-btn" type="button" class="ml-0 mt-0 mb-3 btn btn-success btn-sm">
  <i class="fa fa-plus-circle" aria-hidden="true"></i> <?php echo $this->function_trans($this->setup_args(['phrase'=>'Add','this_tag'=>'trans'],null,$this),$this)?>

</button>
<?php endif;$_750987_local_params=$_750987_old_params['_3a3b5c'];$_750987_local_vars=$_750987_old_vars['_3a3b5c'];?>


<?php $c_9c1212=null;ob_start();$_750987_old_params['_9c1212']=$_750987_local_params;$_750987_old_vars['_9c1212']=$_750987_local_vars;$a_9c1212=$this->setup_args(['setvartemplate'=>'nestable_obj_list','index'=>'0','name'=>'nestable_obj_list','this_tag'=>'literal'],null,$this);$_9c1212=-1;$r_9c1212=true;while($r_9c1212===true):$r_9c1212=($_9c1212!==-1)?false:true;echo $this->block_literal($a_9c1212,$c_9c1212,$this,$r_9c1212,++$_9c1212,'_9c1212');ob_start();?>
<?php $c_9c1212 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_9c1212=false;}if($c_9c1212 ):?>
<?php endif;$c_9c1212=ob_get_clean();endwhile;$c_9c1212=ob_get_clean();echo($this->modifier_setvartemplate($c_9c1212,$this->setup_args('nestable_obj_list','setvartemplate',$this),$this,'setvartemplate')); $_750987_local_params=$_750987_old_params['_9c1212'];$_750987_local_vars=$_750987_old_vars['_9c1212'];?>

<div class="dd" id="nestable">
<?php echo $this->function_var($this->setup_args(['name'=>'nestable_obj_list','this_tag'=>'var'],null,$this),$this)?>

<?php $_750987_old_params['_95894b']=$_750987_local_params;$_750987_old_vars['_95894b']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__hierarchy_out','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

<ol class="dd-list" id="parent-ol">
</ol>
<?php endif;$_750987_local_params=$_750987_old_params['_95894b'];$_750987_local_vars=$_750987_old_vars['_95894b'];?>

</div>
  <ol class="hidden">
    <li class="dd-item" data-id="" id="item-template">
      <div class="dd-handle dd--handle"><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Drag','this_tag'=>'trans'],null,$this),$this)?>
</span></div>
      <div class="dd-content">
         <span id="object_label-" class="obj-label"></span>
         <?php $_750987_old_params['_a8572d']=$_750987_local_params;$_750987_old_vars['_a8572d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_basename','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<span id="object_basename-" class="obj-basename"></span><?php endif;$_750987_local_params=$_750987_old_params['_a8572d'];$_750987_local_vars=$_750987_old_vars['_a8572d'];?>

         <input placeholder="<?php echo $this->function_var($this->setup_args(['name'=>'object_primary','this_tag'=>'var'],null,$this),$this)?>
" style="display:inline" id="label-" name="label-" type="text" class="add_param editable-label editable form-control very-short form-control-sm" value="">
       <?php $_750987_old_params['_d5da25']=$_750987_local_params;$_750987_old_vars['_d5da25']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_basename','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

         <input placeholder="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Basename','this_tag'=>'trans'],null,$this),$this)?>
" style="display:inline" id="basename-" name="basename-" type="text" class="add_param editable form-control very-short form-control-sm" value="">
       <?php endif;$_750987_local_params=$_750987_old_params['_d5da25'];$_750987_local_vars=$_750987_old_vars['_d5da25'];?>

        <button id="edit-" type="button" class="hidden edit-btn btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Edit','this_tag'=>'trans'],null,$this),$this)?>
">
          <i class="fa fa-pencil-square" aria-hidden="true"></i>
          <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Edit','this_tag'=>'trans'],null,$this),$this)?>
</span>
        </button>
        <?php $_750987_old_params['_4724ec']=$_750987_local_params;$_750987_old_vars['_4724ec']=$_750987_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'create','model'=>'$model','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

        <button id="add-" type="button" class="add-btn btn btn-success btn-sm" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Add','this_tag'=>'trans'],null,$this),$this)?>
">
          <i class="fa fa-plus-circle" aria-hidden="true"></i>
          <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Add','this_tag'=>'trans'],null,$this),$this)?>
</span>
        </button>
        <?php endif;$_750987_local_params=$_750987_old_params['_4724ec'];$_750987_local_vars=$_750987_old_vars['_4724ec'];?>

        <button id="save-" type="button" class="save-btn btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Save','this_tag'=>'trans'],null,$this),$this)?>
">
          <i class="fa fa-floppy-o" aria-hidden="true"></i>
          <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Save','this_tag'=>'trans'],null,$this),$this)?>
</span>
        </button>
        <button id="cancel-" type="button" class="cancel-btn btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
">
          <i class="fa fa-ban" aria-hidden="true"></i>
          <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</span>
        </button>
        <button id="delete-" type="button" class="delete-btn btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Delete','this_tag'=>'trans'],null,$this),$this)?>
">
          <i class="fa fa-trash" aria-hidden="true"></i>
          <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Delete','this_tag'=>'trans'],null,$this),$this)?>
</span>
        </button>
      </div>
    </li>
  </ol>
<hr>
<div class="row form-group edit-action-bar">
<?php $_750987_old_params['_f44d27']=$_750987_local_params;$_750987_old_vars['_f44d27']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <button id="dialog-cancel-btn" class="<?php $_750987_old_params['_499bb5']=$_750987_local_params;$_750987_old_vars['_499bb5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_stickey_buttons','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
ml-3 <?php endif;$_750987_local_params=$_750987_old_params['_499bb5'];$_750987_local_vars=$_750987_old_vars['_499bb5'];?>
btn btn-secondary mr-1" type="submit"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
  <button type="submit" id="__save" class="ml-2 btn btn-primary ml-0">
  <?php echo $this->function_trans($this->setup_args(['phrase'=>'Save and Apply','this_tag'=>'trans'],null,$this),$this)?>

  </button>
<script>
$('#dialog-cancel-btn').click(function(){
    window.location.href = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=loading';
    window.parent.$('#modal').modal('hide');
    return false;
});
</script>
<?php else:?>

  <button type="submit" id="__save" class="ml-3 btn btn-primary ml-0" disabled>
  <?php echo $this->function_trans($this->setup_args(['phrase'=>'Save Changes','this_tag'=>'trans'],null,$this),$this)?>

  </button>
<?php endif;$_750987_local_params=$_750987_old_params['_f44d27'];$_750987_local_vars=$_750987_old_vars['_f44d27'];?>

</div>
</form>
<script src="assets/js/jquery.nestable.js"></script>
<script>
window.addEventListener('load', function(){
    $('#__save').removeAttr('disabled');
});
var editContentChanged  = false;
var hierarchyChanged    = false;
var inputContentChanged = false;
$(document).ready(function() {
    var updateOutput = function(e) {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if ( window.JSON && output ) {
            output.val(window.JSON.stringify(list.nestable('serialize')));
            editContentChanged = true;
            hierarchyChanged   = true;
        }
    };
    <?php echo $this->modifier_cast_to($this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'hierarchy_max_depth','setvar'=>'hierarchy_max_depth','cast_to'=>'int','this_tag'=>'property'],null,$this),$this),$this->setup_args('hierarchy_max_depth','setvar',$this),$this,'setvar'),$this->setup_args('int','cast_to',$this),$this,'cast_to')?>

    <?php $_750987_old_params['_315efc']=$_750987_local_params;$_750987_old_vars['_315efc']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'hierarchy_max_depth','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'hierarchy_max_depth','value'=>'100','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_315efc'];$_750987_local_vars=$_750987_old_vars['_315efc'];?>

    $('#nestable').nestable( { maxDepth: <?php echo $this->function_var($this->setup_args(['name'=>'hierarchy_max_depth','this_tag'=>'var'],null,$this),$this)?>
 } )
    .on('change', updateOutput);
    updateOutput($('#nestable').data('output', $('#nestable-output')));
});
setTimeout(setEditContentChanged, 500);
function setEditContentChanged () {
    editContentChanged  = false;
    hierarchyChanged    = false;
    inputContentChanged = false;
}
var currentLabel = '';
var currentBasename = '';
var currentId = null;
$('.edit-btn').click(function(){
    inputContentChanged = false;
    $('.ui-tooltip').hide();
    $('.edit-btn').show();
    $('.save-btn').hide();
    $('.cancel-btn').hide();
    $('.editable').hide();
    $('.obj-label').show();
    $('#label-').show();
    $('#basename-').show();
    $('#edit-').show();
    $('#delete-').show();
    $('#item-add-btn').attr('disabled', true);
    $('.add-btn').attr('disabled', true);
    $('.edit-btn').attr('disabled', true);
    $('.delete-btn').attr('disabled', true);
    let objId = $(this).attr('id');
    objId = objId.replace( /^edit\-/, '' );
    currentId = objId;
    currentLabel = $('#label-' + objId ).val();
    currentBasename = $('#basename-' + objId ).val();
    $('#label-' + objId ).css('display', 'inline');
    <?php $_750987_old_params['_1ee20b']=$_750987_local_params;$_750987_old_vars['_1ee20b']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_basename','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    $('#basename-' + objId ).css('display', 'inline');
    $('#object_basename-' + objId ).hide();
    <?php endif;$_750987_local_params=$_750987_old_params['_1ee20b'];$_750987_local_vars=$_750987_old_vars['_1ee20b'];?>

    $('#label-' + objId ).show();
    $('#label-' + objId ).focus();
    $('#label-' + objId ).select();
    $('#basename-' + objId ).show();
    $('#save-' + objId ).show();
    $('#save-' + objId ).css('display', 'inline');
    $('#cancel-' + objId ).show();
    $('#cancel-' + objId ).css('display', 'inline');
    $('#object_label-' + objId ).hide();
    $(this).hide();
    $('#__save').attr('disabled', true);
});
$('.save-btn').click(function(){
    $('.ui-tooltip').hide();
    let objId = $(this).attr('id');
    objId = objId.replace( /^save\-/, '' );
    if (! $('#label-' + objId ).val() ) {
        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'%s is required.','params'=>'$object_primary','this_tag'=>'trans'],null,$this),$this)?>
' );
        return true;
    }
<?php $_750987_old_params['_ce6aeb']=$_750987_local_params;$_750987_old_vars['_ce6aeb']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'label_unique','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    let this_id = 'label-' + objId;
    let this_val = $('#label-' + objId ).val();
    let error = '';
    $('.editable-label').each(function(){
        let comp_val = $(this).val();
        let comp_id = $(this).prop('id');
        if ( this_id != comp_id && this_val == comp_val ) {
            error = '<?php echo $this->function_trans($this->setup_args(['phrase'=>'A %1$s with the same %2$s \'%3$s\' already exists.','params'=>'\'$label\',\'$object_primary\',\'%%%%\'','this_tag'=>'trans'],null,$this),$this)?>
';
        }
    });
    if ( error ) {
        error = error.replace( /%%%%/, this_val );
        alert( error );
        return true;
    }
<?php endif;$_750987_local_params=$_750987_old_params['_ce6aeb'];$_750987_local_vars=$_750987_old_vars['_ce6aeb'];?>

    $('#object_label-' + objId ).html( escape_html( $('#label-' + objId ).val() ) );
    $('#object_label-' + objId ).show();
    $('#label-' + objId ).hide();
    <?php $_750987_old_params['_0ccbb3']=$_750987_local_params;$_750987_old_vars['_0ccbb3']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_basename','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    $('#basename-' + objId ).hide();
    if ( $('#basename-' + objId ).val() ) {
        $('#object_basename-' + objId ).html( '( ' + escape_html( $('#basename-' + objId ).val() ) + ' )' );
        $('#object_basename-' + objId ).show();
    }
    <?php endif;$_750987_local_params=$_750987_old_params['_0ccbb3'];$_750987_local_vars=$_750987_old_vars['_0ccbb3'];?>

    $('#edit-' + objId ).show();
    $('#edit-' + objId ).css('display', 'inline');
    $('#cancel-' + objId ).hide();
    $(this).hide();
    $('#__save').attr('disabled', false);
    $('#item-add-btn').attr('disabled', false);
    $('.add-btn').attr('disabled', false);
    $('.edit-btn').attr('disabled', false);
    $('.delete-btn').attr('disabled', false);
    editContentChanged = true;
});
$('.external-link').click(function(){
     $('.ui-tooltip').hide();
});
$('.cancel-btn').click(function(){
    $('.ui-tooltip').hide();
    if ( inputContentChanged ) {
        if (! confirm( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to discard the edited contents of the %s?','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
' ) ) {
            return;
        }
    }
    let objId = $(this).attr('id');
    objId = objId.replace( /^cancel\-/, '' );
    if (! $('#label-' + objId ).val() ) {
        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'%s is required.','params'=>'$object_primary','this_tag'=>'trans'],null,$this),$this)?>
' );
        return;
    }
    if (! currentLabel ) {
        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'%s is required.','params'=>'$object_primary','this_tag'=>'trans'],null,$this),$this)?>
' );
        return;
    }
    $('#label-' + objId ).val( currentLabel );
    $('#basename-' + objId ).val( currentBasename );
    $('#object_label-' + objId ).show();
    $('#label-' + objId ).hide();
    <?php $_750987_old_params['_45c94e']=$_750987_local_params;$_750987_old_vars['_45c94e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_basename','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    $('#basename-' + objId ).hide();
    if ( currentBasename ) {
        $('#object_basename-' + objId ).html( '( ' + currentBasename + ' )' );
        $('#object_basename-' + objId ).show();
    }
    <?php endif;$_750987_local_params=$_750987_old_params['_45c94e'];$_750987_local_vars=$_750987_old_vars['_45c94e'];?>

    $('#edit-' + objId ).show();
    $('#save-' + objId ).hide();
    $(this).hide();
    $('#__save').attr('disabled', false);
    $('#item-add-btn').attr('disabled', false);
    $('.add-btn').attr('disabled', false);
    $('.edit-btn').attr('disabled', false);
    $('.delete-btn').attr('disabled', false);
});
var newItemId = 0;
$('.add-btn').click(function(){
    $('.ui-tooltip').hide();
    $('.edit-btn').show();
    $('.save-btn').hide();
    $('.cancel-btn').hide();
    $('.editable').hide();
    $('.obj-label').show();
    $('#label-').show();
    $('#basename-').show();
    $('#edit-').hide();
    $('#save-').show();
    // $('#cancel-').show();
    $(this).attr('disabled', true);
    $('#item-add-btn').attr('disabled', true);
    $('.add-btn').attr('disabled', true);
    $('.edit-btn').attr('disabled', true);
    $('.delete-btn').attr('disabled', true);
    let cloneObj = $('#item-template').clone( true );
    newItemId--;
    currentId = newItemId;
    cloneObj.removeAttr('id');
    cloneObj.attr('data-id', newItemId );
    cloneObj.find('#object_label-').prop('id', 'object_label-' + newItemId );
    <?php $_750987_old_params['_3b835f']=$_750987_local_params;$_750987_old_vars['_3b835f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_basename','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    cloneObj.find('#object_basename-').prop('id', 'object_basename-' + newItemId );
    <?php endif;$_750987_local_params=$_750987_old_params['_3b835f'];$_750987_local_vars=$_750987_old_vars['_3b835f'];?>

    cloneObj.find('#label-').prop('name', 'label-' + newItemId );
    cloneObj.find('#label-').prop('id', 'label-' + newItemId );
    <?php $_750987_old_params['_ed36ee']=$_750987_local_params;$_750987_old_vars['_ed36ee']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_basename','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    cloneObj.find('#basename-').prop('name', 'basename-' + newItemId );
    cloneObj.find('#basename-').prop('id', 'basename-' + newItemId );
    <?php endif;$_750987_local_params=$_750987_old_params['_ed36ee'];$_750987_local_vars=$_750987_old_vars['_ed36ee'];?>

    cloneObj.find('#edit-').prop('id', 'edit-' + newItemId );
    cloneObj.find('#save-').prop('id', 'save-' + newItemId );
    cloneObj.find('#cancel-').prop('id', 'cancel-' + newItemId );
    cloneObj.find('#delete-').prop('id', 'delete-' + newItemId );
    currentLabel = '';
    currentBasename = '';
    let parentNode = $(this).parent().parent();
    let childList = parentNode.children( 'ol' );
    if (! childList.length ) {
        let childList = $('<ol>');
        childList.addClass( 'dd-list' );
        childList.append( cloneObj );
        parentNode.append( childList );
    } else {
        childList.append( cloneObj );
    }
    $('#label-' + newItemId ).focus();
    $('#delete-' + newItemId ).attr('disabled', false);
    let addOutput = function(e) {
        let list   = e.length ? e : $(e.target),
            output = list.data('output');
        if ( window.JSON && output ) {
            output.val(window.JSON.stringify(list.nestable('serialize')));
            editContentChanged = true;
        }
    };
    addOutput($('#nestable').data('output', $('#nestable-output')));
    $('#__save').attr('disabled', true);
});
$('.editable').change(function(){
    inputContentChanged = true;
});
$('#item-add-btn').click(function(){
    $('.edit-btn').show();
    $('.save-btn').hide();
    $('.cancel-btn').hide();
    $('.editable').hide();
    $('.obj-label').show();
    $('#label-').show();
    $('#basename-').show();
    $('#edit-').hide();
    $('#save-').show();
    // $('#cancel-').show();
    $(this).attr('disabled', true);
    $('.add-btn').attr('disabled', true);
    $('.edit-btn').attr('disabled', true);
    $('.delete-btn').attr('disabled', true);
    let cloneObj = $('#item-template').clone( true );
    newItemId--;
    currentId = newItemId;
    cloneObj.removeAttr('id');
    cloneObj.attr('data-id', newItemId );
    cloneObj.find('#object_label-').prop('id', 'object_label-' + newItemId );
    cloneObj.find('#label-').prop('name', 'label-' + newItemId );
    cloneObj.find('#label-').prop('id', 'label-' + newItemId );
    <?php $_750987_old_params['_c3f8ba']=$_750987_local_params;$_750987_old_vars['_c3f8ba']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_basename','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    cloneObj.find('#basename-').prop('name', 'basename-' + newItemId );
    cloneObj.find('#basename-').prop('id', 'basename-' + newItemId );
    cloneObj.find('#object_basename-').prop('id', 'object_basename-' + newItemId );
    <?php endif;$_750987_local_params=$_750987_old_params['_c3f8ba'];$_750987_local_vars=$_750987_old_vars['_c3f8ba'];?>

    cloneObj.find('#edit-').prop('id', 'edit-' + newItemId );
    cloneObj.find('#save-').prop('id', 'save-' + newItemId );
    cloneObj.find('#cancel-').prop('id', 'cancel-' + newItemId );
    cloneObj.find('#delete-').prop('id', 'delete-' + newItemId );
    currentLabel = '';
    currentBasename = '';
    $('#parent-ol').append( cloneObj );
    $('#label-' + newItemId ).focus();
    $('#delete-' + newItemId ).attr('disabled', false);
    let addOutput = function(e) {
        let list   = e.length ? e : $(e.target),
            output = list.data('output');
        if ( window.JSON && output ) {
            output.val(window.JSON.stringify(list.nestable('serialize')));
            editContentChanged = true;
        }
    };
    addOutput($('#nestable').data('output', $('#nestable-output')));
    $('#__save').attr('disabled', true);
});
$('.delete-btn').click(function(){
    if (! confirm( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to remove %s?','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
' ) ) {
        return;
    }
    $('.ui-tooltip').hide();
    let objId = $(this).attr('id');
    objId = objId.replace( /^delete\-/, '' );
    let parentNode = $(this).parent().parent();
    let wrapperNode = $(this).parent().parent().parent();
    if ( parentNode.children( 'ol' ).length ) {
        let children = parentNode.children( 'ol' );
        children.each(function(){
            let grandchild = $(this).children();
            wrapperNode.append( grandchild );
        });
        parentNode.remove();
    } else {
        parentNode.remove();
    }
    let removeOutput = function(e) {
        let list   = e.length ? e : $(e.target),
            output = list.data('output');
        if ( window.JSON ) {
            output.val(window.JSON.stringify(list.nestable('serialize')));
            editContentChanged = true;
        }
    };
    removeOutput($('#nestable').data('output', $('#nestable-output')));
    if ( objId < 0 ) {
        $('#item-add-btn').attr('disabled', false);
        $('.add-btn').attr('disabled', false);
        $('.edit-btn').attr('disabled', false);
        $('.delete-btn').attr('disabled', false);
    }
    if ( currentId == objId ) {
        $('#__save').attr('disabled', false);
        currentId = null;
    }
    editContentChanged = true;
});
<?php $_750987_old_params['_cd03a0']=$_750987_local_params;$_750987_old_vars['_cd03a0']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

$(function(){
    $(window).on('beforeunload', function() {
        if (! editContentChanged ) {
            $(window).off('beforeunload');
            return;
        }
        return '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to move from this page? The changes you made are not reflected.','this_tag'=>'trans'],null,$this),$this)?>
';
    });
});
<?php endif;$_750987_local_params=$_750987_old_params['_cd03a0'];$_750987_local_vars=$_750987_old_vars['_cd03a0'];?>

$('#__save').click(function(){
    if ( hierarchyChanged ) {
        $('#hierarchy_changed').val(1);
    }
    let input_data = {};
    $('.add_param').each(function(){
        let name = $(this).attr('name');
        let value = $(this).val();
        $(this).prop('disabled',true);
        input_data[name] = value;
    });
    $('#nestable-param').val(JSON.stringify( input_data ));
    $(this).attr('disabled', true);
    $(window).off('beforeunload');
    $('#edit-form-main').submit();
    return false;
});
</script>
<?php $_750987_old_params['_297e06']=$_750987_local_params;$_750987_old_vars['_297e06']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_cc2551']=$_750987_local_params;$_750987_old_vars['_cc2551']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_6af98b']=$_750987_local_params;$_750987_old_vars['_6af98b']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</div><?php endif;$_750987_local_params=$_750987_old_params['_6af98b'];$_750987_local_vars=$_750987_old_vars['_6af98b'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_cc2551'];$_750987_local_vars=$_750987_old_vars['_cc2551'];?>

        </main>
      </div>
    </div>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<?php $_750987_old_params['_edc102']=$_750987_local_params;$_750987_old_vars['_edc102']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_750987_old_params['_770b43']=$_750987_local_params;$_750987_old_vars['_770b43']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_750987_old_params['_a155b4']=$_750987_local_params;$_750987_old_vars['_a155b4']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_750987_old_params['_fdf1d3']=$_750987_local_params;$_750987_old_vars['_fdf1d3']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_750987_local_params=$_750987_old_params['_fdf1d3'];$_750987_local_vars=$_750987_old_vars['_fdf1d3'];?>

<?php endif;$_750987_local_params=$_750987_old_params['_a155b4'];$_750987_local_vars=$_750987_old_vars['_a155b4'];?>

<?php $_750987_old_params['_2e77f6']=$_750987_local_params;$_750987_old_vars['_2e77f6']=$_750987_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_750987_old_params['_893b4e']=$_750987_local_params;$_750987_old_vars['_893b4e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_750987_local_params=$_750987_old_params['_893b4e'];$_750987_local_vars=$_750987_old_vars['_893b4e'];?>

<?php $_750987_old_params['_ab136d']=$_750987_local_params;$_750987_old_vars['_ab136d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_750987_local_params=$_750987_old_params['_ab136d'];$_750987_local_vars=$_750987_old_vars['_ab136d'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_750987_local_params=$_750987_old_params['_2e77f6'];$_750987_local_vars=$_750987_old_vars['_2e77f6'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_750987_old_params['_5658d8']=$_750987_local_params;$_750987_old_vars['_5658d8']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_750987_local_params=$_750987_old_params['_5658d8'];$_750987_local_vars=$_750987_old_vars['_5658d8'];?>

        relative_urls : false,
        image_advtab: true,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table contextmenu paste code',
        toolbar  : 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | pt-file pt-image',
        setup: function (ed) {
            ed.on('keyDown', function(e) {
                if ( e.keyCode == 16 ) {
                    pressShiftKey = true;
                } else if ( e.keyCode == 91 ) {
                    pressCmdKey = true;
                } else if ( e.keyCode == 18 ) {
                    pressOptKey = true;
                } else if ( e.keyCode == 17 ) {
                    pressCtrlKey = true;
                }
            });
            ed.on('keyUp', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('click', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('paste', function(e) {
                $('.mce-tinymce[role=application]').css('width', '99.9%');
                window.setTimeout( _reset_editor_width , 1 );
            });
            ed.on('change', function(e) {
                editContentChanged = true;
                ed.save();
            });
            ed.addButton('pt-image', {
                image: '<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png',
                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                icon: false,
                onclick: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_750987_old_params['_2acca3']=$_750987_local_params;$_750987_old_vars['_2acca3']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_2acca3'];$_750987_local_vars=$_750987_old_vars['_2acca3'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.addButton('pt-file', {
                image: '<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png',
                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                icon: false,
                onclick: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_750987_old_params['_27f93a']=$_750987_local_params;$_750987_old_vars['_27f93a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_27f93a'];$_750987_local_vars=$_750987_old_vars['_27f93a'];?>
&dialog_view=1&insert_editor=1&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            <?php echo $this->function_var($this->setup_args(['name'=>'editor_buttons','this_tag'=>'var'],null,$this),$this)?>

            var _reset_editor_width = function()
            {
                $('.mce-tinymce[role=application]').css('width', '100%');
                $('#__loader-bg').hide();
            }
            <?php $_750987_old_params['_9f5311']=$_750987_local_params;$_750987_old_vars['_9f5311']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            if(ed.id && ed.id == 'text'){
              var clipboard_image = $('#clipboard-image');
              var inline_image = $('#inline-image');
              var bg_image_url = clipboard_image.val();
              if ( inline_image.length ) {
                  bg_image_url = inline_image.attr('href');
              }
              if ( clipboard_image.length ) {
                <?php $_750987_old_params['_052c83']=$_750987_local_params;$_750987_old_vars['_052c83']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_052c83'];$_750987_local_vars=$_750987_old_vars['_052c83'];?>

                <?php $_750987_old_params['_6ecc4a']=$_750987_local_params;$_750987_old_vars['_6ecc4a']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_6ecc4a'];$_750987_local_vars=$_750987_old_vars['_6ecc4a'];?>

                var rgba = getConversionRgba('<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
');
                ed.settings['content_style'] = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background-color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                  + 'background-size: cover; background-position: center;'
                  + 'text-shadow: 2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                  + '-2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                  + '2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                  + '-2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                  + 'background-image:url("' + bg_image_url + '&rnd=' + Math.random() + '")} body *{background-color: rgba(' + rgba + '); color: <?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
}';
              } else {
                ed.settings['content_style'] = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;}';
              }
            }
            <?php endif;$_750987_local_params=$_750987_old_params['_9f5311'];$_750987_local_vars=$_750987_old_vars['_9f5311'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php else:?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce<?php echo $this->function_var($this->setup_args(['name'=>'tinymce_version','this_tag'=>'var'],null,$this),$this)?>
/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_750987_old_params['_2166fe']=$_750987_local_params;$_750987_old_vars['_2166fe']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_750987_old_params['_464dd2']=$_750987_local_params;$_750987_old_vars['_464dd2']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_750987_local_params=$_750987_old_params['_464dd2'];$_750987_local_vars=$_750987_old_vars['_464dd2'];?>

<?php endif;$_750987_local_params=$_750987_old_params['_2166fe'];$_750987_local_vars=$_750987_old_vars['_2166fe'];?>

<?php $_750987_old_params['_f02ee3']=$_750987_local_params;$_750987_old_vars['_f02ee3']=$_750987_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_750987_old_params['_052292']=$_750987_local_params;$_750987_old_vars['_052292']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_750987_local_params=$_750987_old_params['_052292'];$_750987_local_vars=$_750987_old_vars['_052292'];?>

<?php $_750987_old_params['_e20fb4']=$_750987_local_params;$_750987_old_vars['_e20fb4']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_750987_local_params=$_750987_old_params['_e20fb4'];$_750987_local_vars=$_750987_old_vars['_e20fb4'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_750987_local_params=$_750987_old_params['_f02ee3'];$_750987_local_vars=$_750987_old_vars['_f02ee3'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_750987_old_params['_375535']=$_750987_local_params;$_750987_old_vars['_375535']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_750987_local_params=$_750987_old_params['_375535'];$_750987_local_vars=$_750987_old_vars['_375535'];?>

        relative_urls : false,
        image_advtab: true,
        promotion: false,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code<?php $_750987_old_params['_990230']=$_750987_local_params;$_750987_old_vars['_990230']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','lt'=>'6','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 print paste<?php endif;$_750987_local_params=$_750987_old_params['_990230'];$_750987_local_vars=$_750987_old_vars['_990230'];?>
',
        toolbar  : 'undo redo insert styleselect bold italic alignleft aligncenter alignright alignjustify bullist numlist outdent indent fullscreen link image pt-file pt-image',
        setup: function (ed) {
            ed.on('keyDown', function(e) {
                if ( e.keyCode == 16 ) {
                    pressShiftKey = true;
                } else if ( e.keyCode == 91 ) {
                    pressCmdKey = true;
                } else if ( e.keyCode == 18 ) {
                    pressOptKey = true;
                } else if ( e.keyCode == 17 ) {
                    pressCtrlKey = true;
                }
            });
            ed.on('keyUp', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('click', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('paste', function(e) {
                $('.tox-tinymce').css('width', '99.9%');
                window.setTimeout( _reset_editor_width , 1 );
            });
            ed.on('change', function(e) {
                editContentChanged = true;
                ed.save();
            });
            ed.ui.registry.addButton('pt-image', {
                <?php $_750987_old_params['_f80ed1']=$_750987_local_params;$_750987_old_vars['_f80ed1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'gallery',
                <?php endif;$_750987_local_params=$_750987_old_params['_f80ed1'];$_750987_local_vars=$_750987_old_vars['_f80ed1'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_750987_old_params['_f6ee4c']=$_750987_local_params;$_750987_old_vars['_f6ee4c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_f6ee4c'];$_750987_local_vars=$_750987_old_vars['_f6ee4c'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.ui.registry.addButton('pt-file', {
                <?php $_750987_old_params['_0a5684']=$_750987_local_params;$_750987_old_vars['_0a5684']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'browse',
                <?php endif;$_750987_local_params=$_750987_old_params['_0a5684'];$_750987_local_vars=$_750987_old_vars['_0a5684'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_750987_old_params['_67e5e7']=$_750987_local_params;$_750987_old_vars['_67e5e7']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_67e5e7'];$_750987_local_vars=$_750987_old_vars['_67e5e7'];?>
&dialog_view=1&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            <?php echo $this->function_var($this->setup_args(['name'=>'editor_buttons','this_tag'=>'var'],null,$this),$this)?>

            var _reset_editor_width = function()
            {
                $('.tox-tinymce').css('width', '100%');
                $('#__loader-bg').hide();
            }
            <?php $_750987_old_params['_d1e9ff']=$_750987_local_params;$_750987_old_vars['_d1e9ff']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            ed.on('LoadContent',function(){
                if ( ed.id && ed.id == 'text' ) {
                    let clipboard_image = $('#clipboard-image');
                    let inline_image = $('#inline-image');
                    let bg_image_url = clipboard_image.val();
                    if ( inline_image.length ) {
                        bg_image_url = inline_image.attr('href');
                    }
                    let html_head = ed.iframeElement.contentWindow.document.getElementsByTagName('head')[0];
                    let style = document.createElement('style');
                    let content_style;
                    if ( clipboard_image.length ) {
                      <?php $_750987_old_params['_97a628']=$_750987_local_params;$_750987_old_vars['_97a628']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_97a628'];$_750987_local_vars=$_750987_old_vars['_97a628'];?>

                      <?php $_750987_old_params['_bbe457']=$_750987_local_params;$_750987_old_vars['_bbe457']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_bbe457'];$_750987_local_vars=$_750987_old_vars['_bbe457'];?>

                        var rgba = getConversionRgba('<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
');
                        content_style = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background-color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                        + 'background-size: cover; background-position: center;'
                        + 'text-shadow: 2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                        + '-2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                        + '2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                        + '-2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                        + 'background-image:url("' + bg_image_url + '&rnd=' + Math.random() + '")} body *{background-color: rgba(' + rgba + ')}';
                    } else {
                        content_style = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;}';
                    }
                    style.innerHTML = content_style;
                    html_head.appendChild(style);
                }
            });
            <?php endif;$_750987_local_params=$_750987_old_params['_d1e9ff'];$_750987_local_vars=$_750987_old_vars['_d1e9ff'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php endif;$_750987_local_params=$_750987_old_params['_770b43'];$_750987_local_vars=$_750987_old_vars['_770b43'];?>

<?php endif;$_750987_local_params=$_750987_old_params['_edc102'];$_750987_local_vars=$_750987_old_vars['_edc102'];?>

<script>
function disp_header_alert ( message, dialog_class ) {
    $("#header-alert-message").html( message );
    if (! dialog_class ) {
        dialog_class = 'success';
    }
    if ( dialog_class == 'success' ) {
        $("#header-alert").removeClass("alert-danger");
        $("#header-alert").addClass("alert-success");
    } else {
        $("#header-alert").removeClass("alert-success");
        $("#header-alert").addClass("alert-danger");
    }
    $("#header-alert").show();
    setTimeout(focus_header_dialog, 500);
}
$(function() {
    $(".popup").click(function(){
        window.open(this.href,"WindowName","width=480,height=380,resizable=yes,scrollbars=yes");
        return false;
    });
});
</script>
<?php $_750987_old_params['_9b5a8f']=$_750987_local_params;$_750987_old_vars['_9b5a8f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>


<?php $_750987_old_params['_f652c2']=$_750987_local_params;$_750987_old_vars['_f652c2']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_750987_old_params['_57fca7']=$_750987_local_params;$_750987_old_vars['_57fca7']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_750987_old_params['_2c7399']=$_750987_local_params;$_750987_old_vars['_2c7399']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_750987_old_params['_c59abd']=$_750987_local_params;$_750987_old_vars['_c59abd']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_750987_local_params=$_750987_old_params['_c59abd'];$_750987_local_vars=$_750987_old_vars['_c59abd'];?>

<?php endif;$_750987_local_params=$_750987_old_params['_2c7399'];$_750987_local_vars=$_750987_old_vars['_2c7399'];?>

<?php $_750987_old_params['_89052d']=$_750987_local_params;$_750987_old_vars['_89052d']=$_750987_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_750987_old_params['_abbcc9']=$_750987_local_params;$_750987_old_vars['_abbcc9']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_750987_local_params=$_750987_old_params['_abbcc9'];$_750987_local_vars=$_750987_old_vars['_abbcc9'];?>

<?php $_750987_old_params['_cabfd3']=$_750987_local_params;$_750987_old_vars['_cabfd3']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_750987_local_params=$_750987_old_params['_cabfd3'];$_750987_local_vars=$_750987_old_vars['_cabfd3'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_750987_local_params=$_750987_old_params['_89052d'];$_750987_local_vars=$_750987_old_vars['_89052d'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_750987_old_params['_4b99b2']=$_750987_local_params;$_750987_old_vars['_4b99b2']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_750987_local_params=$_750987_old_params['_4b99b2'];$_750987_local_vars=$_750987_old_vars['_4b99b2'];?>

        relative_urls : false,
        image_advtab: true,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table contextmenu paste code',
        toolbar  : 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | pt-file pt-image',
        setup: function (ed) {
            ed.on('keyDown', function(e) {
                if ( e.keyCode == 16 ) {
                    pressShiftKey = true;
                } else if ( e.keyCode == 91 ) {
                    pressCmdKey = true;
                } else if ( e.keyCode == 18 ) {
                    pressOptKey = true;
                } else if ( e.keyCode == 17 ) {
                    pressCtrlKey = true;
                }
            });
            ed.on('keyUp', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('click', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('paste', function(e) {
                $('.mce-tinymce[role=application]').css('width', '99.9%');
                window.setTimeout( _reset_editor_width , 1 );
            });
            ed.on('change', function(e) {
                editContentChanged = true;
                ed.save();
            });
            ed.addButton('pt-image', {
                image: '<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png',
                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                icon: false,
                onclick: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_750987_old_params['_6382b9']=$_750987_local_params;$_750987_old_vars['_6382b9']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_6382b9'];$_750987_local_vars=$_750987_old_vars['_6382b9'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.addButton('pt-file', {
                image: '<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png',
                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                icon: false,
                onclick: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_750987_old_params['_5418a9']=$_750987_local_params;$_750987_old_vars['_5418a9']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_5418a9'];$_750987_local_vars=$_750987_old_vars['_5418a9'];?>
&dialog_view=1&insert_editor=1&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            <?php echo $this->function_var($this->setup_args(['name'=>'editor_buttons','this_tag'=>'var'],null,$this),$this)?>

            var _reset_editor_width = function()
            {
                $('.mce-tinymce[role=application]').css('width', '100%');
                $('#__loader-bg').hide();
            }
            <?php $_750987_old_params['_84895a']=$_750987_local_params;$_750987_old_vars['_84895a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            if(ed.id && ed.id == 'text'){
              var clipboard_image = $('#clipboard-image');
              var inline_image = $('#inline-image');
              var bg_image_url = clipboard_image.val();
              if ( inline_image.length ) {
                  bg_image_url = inline_image.attr('href');
              }
              if ( clipboard_image.length ) {
                <?php $_750987_old_params['_efc81b']=$_750987_local_params;$_750987_old_vars['_efc81b']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_efc81b'];$_750987_local_vars=$_750987_old_vars['_efc81b'];?>

                <?php $_750987_old_params['_accfff']=$_750987_local_params;$_750987_old_vars['_accfff']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_accfff'];$_750987_local_vars=$_750987_old_vars['_accfff'];?>

                var rgba = getConversionRgba('<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
');
                ed.settings['content_style'] = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background-color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                  + 'background-size: cover; background-position: center;'
                  + 'text-shadow: 2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                  + '-2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                  + '2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                  + '-2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                  + 'background-image:url("' + bg_image_url + '&rnd=' + Math.random() + '")} body *{background-color: rgba(' + rgba + '); color: <?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
}';
              } else {
                ed.settings['content_style'] = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;}';
              }
            }
            <?php endif;$_750987_local_params=$_750987_old_params['_84895a'];$_750987_local_vars=$_750987_old_vars['_84895a'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php else:?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce<?php echo $this->function_var($this->setup_args(['name'=>'tinymce_version','this_tag'=>'var'],null,$this),$this)?>
/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_750987_old_params['_a65fd7']=$_750987_local_params;$_750987_old_vars['_a65fd7']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_750987_old_params['_d8b8fa']=$_750987_local_params;$_750987_old_vars['_d8b8fa']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_750987_local_params=$_750987_old_params['_d8b8fa'];$_750987_local_vars=$_750987_old_vars['_d8b8fa'];?>

<?php endif;$_750987_local_params=$_750987_old_params['_a65fd7'];$_750987_local_vars=$_750987_old_vars['_a65fd7'];?>

<?php $_750987_old_params['_d281e2']=$_750987_local_params;$_750987_old_vars['_d281e2']=$_750987_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_750987_old_params['_e1ec10']=$_750987_local_params;$_750987_old_vars['_e1ec10']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_750987_local_params=$_750987_old_params['_e1ec10'];$_750987_local_vars=$_750987_old_vars['_e1ec10'];?>

<?php $_750987_old_params['_d5e98c']=$_750987_local_params;$_750987_old_vars['_d5e98c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_750987_local_params=$_750987_old_params['_d5e98c'];$_750987_local_vars=$_750987_old_vars['_d5e98c'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_750987_local_params=$_750987_old_params['_d281e2'];$_750987_local_vars=$_750987_old_vars['_d281e2'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_750987_old_params['_4dfcd6']=$_750987_local_params;$_750987_old_vars['_4dfcd6']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_750987_local_params=$_750987_old_params['_4dfcd6'];$_750987_local_vars=$_750987_old_vars['_4dfcd6'];?>

        relative_urls : false,
        image_advtab: true,
        promotion: false,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code<?php $_750987_old_params['_bda872']=$_750987_local_params;$_750987_old_vars['_bda872']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','lt'=>'6','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 print paste<?php endif;$_750987_local_params=$_750987_old_params['_bda872'];$_750987_local_vars=$_750987_old_vars['_bda872'];?>
',
        toolbar  : 'undo redo insert styleselect bold italic alignleft aligncenter alignright alignjustify bullist numlist outdent indent fullscreen link image pt-file pt-image',
        setup: function (ed) {
            ed.on('keyDown', function(e) {
                if ( e.keyCode == 16 ) {
                    pressShiftKey = true;
                } else if ( e.keyCode == 91 ) {
                    pressCmdKey = true;
                } else if ( e.keyCode == 18 ) {
                    pressOptKey = true;
                } else if ( e.keyCode == 17 ) {
                    pressCtrlKey = true;
                }
            });
            ed.on('keyUp', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('click', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('paste', function(e) {
                $('.tox-tinymce').css('width', '99.9%');
                window.setTimeout( _reset_editor_width , 1 );
            });
            ed.on('change', function(e) {
                editContentChanged = true;
                ed.save();
            });
            ed.ui.registry.addButton('pt-image', {
                <?php $_750987_old_params['_e69417']=$_750987_local_params;$_750987_old_vars['_e69417']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'gallery',
                <?php endif;$_750987_local_params=$_750987_old_params['_e69417'];$_750987_local_vars=$_750987_old_vars['_e69417'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_750987_old_params['_360e4a']=$_750987_local_params;$_750987_old_vars['_360e4a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_360e4a'];$_750987_local_vars=$_750987_old_vars['_360e4a'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.ui.registry.addButton('pt-file', {
                <?php $_750987_old_params['_ef858b']=$_750987_local_params;$_750987_old_vars['_ef858b']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'browse',
                <?php endif;$_750987_local_params=$_750987_old_params['_ef858b'];$_750987_local_vars=$_750987_old_vars['_ef858b'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_750987_old_params['_3f2d60']=$_750987_local_params;$_750987_old_vars['_3f2d60']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_3f2d60'];$_750987_local_vars=$_750987_old_vars['_3f2d60'];?>
&dialog_view=1&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            <?php echo $this->function_var($this->setup_args(['name'=>'editor_buttons','this_tag'=>'var'],null,$this),$this)?>

            var _reset_editor_width = function()
            {
                $('.tox-tinymce').css('width', '100%');
                $('#__loader-bg').hide();
            }
            <?php $_750987_old_params['_4f3d82']=$_750987_local_params;$_750987_old_vars['_4f3d82']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            ed.on('LoadContent',function(){
                if ( ed.id && ed.id == 'text' ) {
                    let clipboard_image = $('#clipboard-image');
                    let inline_image = $('#inline-image');
                    let bg_image_url = clipboard_image.val();
                    if ( inline_image.length ) {
                        bg_image_url = inline_image.attr('href');
                    }
                    let html_head = ed.iframeElement.contentWindow.document.getElementsByTagName('head')[0];
                    let style = document.createElement('style');
                    let content_style;
                    if ( clipboard_image.length ) {
                      <?php $_750987_old_params['_4bcf44']=$_750987_local_params;$_750987_old_vars['_4bcf44']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_4bcf44'];$_750987_local_vars=$_750987_old_vars['_4bcf44'];?>

                      <?php $_750987_old_params['_284e28']=$_750987_local_params;$_750987_old_vars['_284e28']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_284e28'];$_750987_local_vars=$_750987_old_vars['_284e28'];?>

                        var rgba = getConversionRgba('<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
');
                        content_style = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background-color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                        + 'background-size: cover; background-position: center;'
                        + 'text-shadow: 2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                        + '-2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                        + '2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                        + '-2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                        + 'background-image:url("' + bg_image_url + '&rnd=' + Math.random() + '")} body *{background-color: rgba(' + rgba + ')}';
                    } else {
                        content_style = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;}';
                    }
                    style.innerHTML = content_style;
                    html_head.appendChild(style);
                }
            });
            <?php endif;$_750987_local_params=$_750987_old_params['_4f3d82'];$_750987_local_vars=$_750987_old_vars['_4f3d82'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php endif;$_750987_local_params=$_750987_old_params['_57fca7'];$_750987_local_vars=$_750987_old_vars['_57fca7'];?>

<?php endif;$_750987_local_params=$_750987_old_params['_f652c2'];$_750987_local_vars=$_750987_old_vars['_f652c2'];?>

<script>
$(document).keydown(evnt_keydown);
function evnt_keydown(e) {
    if ( e.keyCode == 27 ) {
        window.location.href = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=loading';
        window.parent.$('#modal').modal('hide');
    }
}
function disp_header_alert ( message, dialog_class ) {
    $("#header-alert-message").html( message );
    if (! dialog_class ) {
        dialog_class = 'success';
    }
    if ( dialog_class == 'success' ) {
        $("#header-alert").removeClass("alert-danger");
        $("#header-alert").addClass("alert-success");
    } else {
        $("#header-alert").removeClass("alert-success");
        $("#header-alert").addClass("alert-danger");
    }
    $("#header-alert").show();
    setTimeout(focus_header_dialog, 500);
}
function focus_header_dialog () {
    $("#header-alert").focus();
}
$(function(){
    $(document).on('click','[data-target="#modal"]',function(){
        let $this = $(this);
        let $modal = $('#modal');
        let url = '';
        if( $this.attr('href') ){
            url = $this.attr('href');
        } else if( this.href ){
            url = this.href;
        } else if( $this.data('href') ) {
            url = $this.data('href');
        } else if( $this.attr('data-href') ){
            url = $this.attr('data-href');
        }
        if( url ) {
            $modal.find('iframe').attr('src', url );
        }
    });
});
function getConversionRgba(color_code, alpha) {
    var rgba_code = [];
    rgba_code['red']   = parseInt(color_code.substring(1,3), 16);
    rgba_code['green'] = parseInt(color_code.substring(3,5), 16);
    rgba_code['blue']  = parseInt(color_code.substring(5,7), 16);
    rgba_code['alpha'] = isFinite(alpha) ? alpha : 0.4;
    return Object.values(rgba_code).join(',');
}
</script>
<div id="modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true" data-keyboard="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
      <iframe id="modal-iframe" name="dialog-modal" style="width:100%;height:100%;"></iframe>
    </div>
  </div>
</div>
<?php endif;$_750987_local_params=$_750987_old_params['_9b5a8f'];$_750987_local_vars=$_750987_old_vars['_9b5a8f'];?>

<script>
function escape_html (string) {
  if(typeof string !== 'string') {
    return string;
  }
  return string.replace(/[&'`"<>]/g, function(match) {
    return {
      '&': '&amp;',
      "'": '&#x27;',
      '`': '&#x60;',
      '"': '&quot;',
      '<': '&lt;',
      '>': '&gt;',
    }[match]
  });
}
function unescape_html (string) {
  var div = document.createElement("div");
  div.innerHTML = string.replace(/</g,"&lt;")
                        .replace(/>/g,"&gt;")
                        .replace(/ /g, "&nbsp;")
                        .replace(/\r/g, "&#13;")
                        .replace(/\n/g, "&#10;");
  return div.textContent || div.innerText;
}
function submit_params_to_post ( url ) {
    const url_params = url.split('?');
    const url_param = url_params[1];
    const url_path = url_params[0];
    const url_param_data = JSON.parse('{"' + url_param.replace(/&/g, '","').replace(/=/g,'":"') + '"}', function( key, value ) { return key === "" ? value:decodeURIComponent( value ) } );
    const list_asset_form = document.createElement( 'form' );
    list_asset_form.method = 'post';
    list_asset_form.action = url_path;
    for ( const key in url_param_data ) {
        if ( url_param_data.hasOwnProperty( key ) ) {
            const hiddenField = document.createElement( 'input' );
            hiddenField.type = 'hidden';
            hiddenField.name = key;
            hiddenField.value = url_param_data[ key ];
            list_asset_form.appendChild( hiddenField );
        }
    }
    document.body.appendChild( list_asset_form );
    list_asset_form.submit();
}
$('#modal').on('hidden.bs.modal', function(event) {
    $('#modal-iframe').attr('src', '<?php echo $this->function_var($this->setup_args(['name'=>'“script_uri”','this_tag'=>'var'],null,$this),$this)?>
?__mode=loading' );
});
$('#modal').on('hidden.bs.modal', function(event) {
  if( window._active_ed ) {
      window._active_ed = window._active_ed.focus();
      window._active_ed = false;
  }
});
$('#modal-iframe').attr('src', '<?php echo $this->function_var($this->setup_args(['name'=>'“script_uri”','this_tag'=>'var'],null,$this),$this)?>
?__mode=loading' );
</script>
<?php echo $this->function_var($this->setup_args(['name'=>'html_body_footer','this_tag'=>'var'],null,$this),$this)?>

  </body>
</html>
<?php else:?>

<div id="modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true" data-keyboard="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
      <iframe id="modal-iframe" name="dialog-modal" style="width:100%;height:100%;"></iframe>
    </div>
  </div>
</div>
        </main>
      </div>
    </div>
  <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'copyright','setvar'=>'copyright','this_tag'=>'getoption'],null,$this),$this),$this->setup_args('copyright','setvar',$this),$this,'setvar')?>

  <?php $_750987_old_params['_6caa5c']=$_750987_local_params;$_750987_old_vars['_6caa5c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'copyright','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <footer class="footer bar">
      <?php $_750987_old_params['_569fb6']=$_750987_local_params;$_750987_old_vars['_569fb6']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <span class="copyright"><?php echo $this->modifier_eval($this->function_var($this->setup_args(['name'=>'copyright','eval'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','eval',$this),$this,'eval')?>
</span>
      <?php endif;$_750987_local_params=$_750987_old_params['_569fb6'];$_750987_local_vars=$_750987_old_vars['_569fb6'];?>

    </footer>
  <?php endif;$_750987_local_params=$_750987_old_params['_6caa5c'];$_750987_local_vars=$_750987_old_vars['_6caa5c'];?>

<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script>
$(function() {
    $(".popup").click(function(){
        window.open(this.href,"RebuildPopupWindow","width=420,height=<?php $_750987_old_params['_aa2b5e']=$_750987_local_params;$_750987_old_vars['_aa2b5e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'debug_mode','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
360<?php else:?>
320<?php endif;$_750987_local_params=$_750987_old_params['_aa2b5e'];$_750987_local_vars=$_750987_old_vars['_aa2b5e'];?>
,resizable=yes,scrollbars=yes");
        return false;
    });
});
</script>
<script>
var $win = $(window);
$win.on('load resize', function() {
    var windowWidth = window.innerWidth;
    if ( windowWidth > 768 ) {
        $('.info-box').html('');
        $('.info-box').hide();
        $('.toggle-icn').removeClass('fa-caret-up');
        $('.toggle-icn').addClass('fa-caret-down');
        $('.alt-search-button').hide();
    } else {
        $('.alt-search-button').show();
    }
});
</script>
<?php $_750987_old_params['_81728f']=$_750987_local_params;$_750987_old_vars['_81728f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_750987_old_params['_f29330']=$_750987_local_params;$_750987_old_vars['_f29330']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_750987_old_params['_df9137']=$_750987_local_params;$_750987_old_vars['_df9137']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_750987_old_params['_1ee890']=$_750987_local_params;$_750987_old_vars['_1ee890']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_750987_local_params=$_750987_old_params['_1ee890'];$_750987_local_vars=$_750987_old_vars['_1ee890'];?>

<?php endif;$_750987_local_params=$_750987_old_params['_df9137'];$_750987_local_vars=$_750987_old_vars['_df9137'];?>

<?php $_750987_old_params['_1d090a']=$_750987_local_params;$_750987_old_vars['_1d090a']=$_750987_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_750987_old_params['_d64132']=$_750987_local_params;$_750987_old_vars['_d64132']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_750987_local_params=$_750987_old_params['_d64132'];$_750987_local_vars=$_750987_old_vars['_d64132'];?>

<?php $_750987_old_params['_e14a07']=$_750987_local_params;$_750987_old_vars['_e14a07']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_750987_local_params=$_750987_old_params['_e14a07'];$_750987_local_vars=$_750987_old_vars['_e14a07'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_750987_local_params=$_750987_old_params['_1d090a'];$_750987_local_vars=$_750987_old_vars['_1d090a'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_750987_old_params['_1fb4dd']=$_750987_local_params;$_750987_old_vars['_1fb4dd']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_750987_local_params=$_750987_old_params['_1fb4dd'];$_750987_local_vars=$_750987_old_vars['_1fb4dd'];?>

        relative_urls : false,
        image_advtab: true,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table contextmenu paste code',
        toolbar  : 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | pt-file pt-image',
        setup: function (ed) {
            ed.on('keyDown', function(e) {
                if ( e.keyCode == 16 ) {
                    pressShiftKey = true;
                } else if ( e.keyCode == 91 ) {
                    pressCmdKey = true;
                } else if ( e.keyCode == 18 ) {
                    pressOptKey = true;
                } else if ( e.keyCode == 17 ) {
                    pressCtrlKey = true;
                }
            });
            ed.on('keyUp', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('click', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('paste', function(e) {
                $('.mce-tinymce[role=application]').css('width', '99.9%');
                window.setTimeout( _reset_editor_width , 1 );
            });
            ed.on('change', function(e) {
                editContentChanged = true;
                ed.save();
            });
            ed.addButton('pt-image', {
                image: '<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png',
                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                icon: false,
                onclick: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_750987_old_params['_02fd85']=$_750987_local_params;$_750987_old_vars['_02fd85']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_02fd85'];$_750987_local_vars=$_750987_old_vars['_02fd85'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.addButton('pt-file', {
                image: '<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png',
                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                icon: false,
                onclick: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_750987_old_params['_a8f476']=$_750987_local_params;$_750987_old_vars['_a8f476']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_a8f476'];$_750987_local_vars=$_750987_old_vars['_a8f476'];?>
&dialog_view=1&insert_editor=1&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            <?php echo $this->function_var($this->setup_args(['name'=>'editor_buttons','this_tag'=>'var'],null,$this),$this)?>

            var _reset_editor_width = function()
            {
                $('.mce-tinymce[role=application]').css('width', '100%');
                $('#__loader-bg').hide();
            }
            <?php $_750987_old_params['_bf3d5c']=$_750987_local_params;$_750987_old_vars['_bf3d5c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            if(ed.id && ed.id == 'text'){
              var clipboard_image = $('#clipboard-image');
              var inline_image = $('#inline-image');
              var bg_image_url = clipboard_image.val();
              if ( inline_image.length ) {
                  bg_image_url = inline_image.attr('href');
              }
              if ( clipboard_image.length ) {
                <?php $_750987_old_params['_6d1fff']=$_750987_local_params;$_750987_old_vars['_6d1fff']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_6d1fff'];$_750987_local_vars=$_750987_old_vars['_6d1fff'];?>

                <?php $_750987_old_params['_f1c3fd']=$_750987_local_params;$_750987_old_vars['_f1c3fd']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_f1c3fd'];$_750987_local_vars=$_750987_old_vars['_f1c3fd'];?>

                var rgba = getConversionRgba('<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
');
                ed.settings['content_style'] = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background-color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                  + 'background-size: cover; background-position: center;'
                  + 'text-shadow: 2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                  + '-2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                  + '2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                  + '-2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                  + 'background-image:url("' + bg_image_url + '&rnd=' + Math.random() + '")} body *{background-color: rgba(' + rgba + '); color: <?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
}';
              } else {
                ed.settings['content_style'] = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;}';
              }
            }
            <?php endif;$_750987_local_params=$_750987_old_params['_bf3d5c'];$_750987_local_vars=$_750987_old_vars['_bf3d5c'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php else:?>

<script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tinymce<?php echo $this->function_var($this->setup_args(['name'=>'tinymce_version','this_tag'=>'var'],null,$this),$this)?>
/tinymce.min.js?version=<?php echo $this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','this_tag'=>'property'],null,$this),$this)?>
"></script>
<script>
<?php $_750987_old_params['_f9b0c9']=$_750987_local_params;$_750987_old_vars['_f9b0c9']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $_750987_old_params['_87612f']=$_750987_local_params;$_750987_old_vars['_87612f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_text_format','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'user_text_format','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'__format_default','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

    <?php echo $this->modifier_setvar(paml_modifier_funcs('strtolower', $this->function_var($this->setup_args(['name'=>'__format_default','lower_case'=>'','setvar'=>'user_text_format','this_tag'=>'var'],null,$this),$this)),$this->setup_args('user_text_format','setvar',$this),$this,'setvar')?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'$user_text_format','this_tag'=>'setvar'],null,$this),$this)?>

  <?php else:?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'_object_text_format','value'=>'richtext','this_tag'=>'setvar'],null,$this),$this)?>

  <?php endif;$_750987_local_params=$_750987_old_params['_87612f'];$_750987_local_vars=$_750987_old_vars['_87612f'];?>

<?php endif;$_750987_local_params=$_750987_old_params['_f9b0c9'];$_750987_local_vars=$_750987_old_vars['_f9b0c9'];?>

<?php $_750987_old_params['_874690']=$_750987_local_params;$_750987_old_vars['_874690']=$_750987_local_vars;if($this->component('PTTags')->hdlr_tablehascolumn($this->setup_args(['model'=>'$model','column'=>'text_format','this_tag'=>'tablehascolumn'],null,$this),null,$this,true,true)):?>

<?php $_750987_old_params['_c8ae5f']=$_750987_local_params;$_750987_old_vars['_c8ae5f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'forward_params','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'request.text_format','setvar'=>'_object_text_format','this_tag'=>'var'],null,$this),$this),$this->setup_args('_object_text_format','setvar',$this),$this,'setvar')?>

<?php endif;$_750987_local_params=$_750987_old_params['_c8ae5f'];$_750987_local_vars=$_750987_old_vars['_c8ae5f'];?>

<?php $_750987_old_params['_cf36f8']=$_750987_local_params;$_750987_old_vars['_cf36f8']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_object_text_format','eq'=>'richtext','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$(function(){
    editorInit();
    editorMode = 'richtext';
});
<?php endif;$_750987_local_params=$_750987_old_params['_cf36f8'];$_750987_local_vars=$_750987_old_vars['_cf36f8'];?>

<?php else:?>

$(function(){
    editorInit();
    window.editorMode = 'richtext';
});
<?php endif;$_750987_local_params=$_750987_old_params['_874690'];$_750987_local_vars=$_750987_old_vars['_874690'];?>

function editorInit () {
    var pressCmdKey    = false;
    var pressShiftKey  = false;
    var pressOptKey    = false;
    var pressCtrlKey   = false;
    tinymce.init({
        language : '<?php echo $this->function_var($this->setup_args(['name'=>'user_language','this_tag'=>'var'],null,$this),$this)?>
',
        selector : 'textarea.richtext',<?php $_750987_old_params['_766eae']=$_750987_local_params;$_750987_old_vars['_766eae']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','like'=>'email','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        convert_urls: false,<?php endif;$_750987_local_params=$_750987_old_params['_766eae'];$_750987_local_vars=$_750987_old_vars['_766eae'];?>

        relative_urls : false,
        image_advtab: true,
        promotion: false,
        menubar: 'edit insert view format table tools',
        content_css: "<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/editor.css",
        onchange_callback : "editHtmlEditor",
        plugins  : 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table code<?php $_750987_old_params['_587406']=$_750987_local_params;$_750987_old_vars['_587406']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','lt'=>'6','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 print paste<?php endif;$_750987_local_params=$_750987_old_params['_587406'];$_750987_local_vars=$_750987_old_vars['_587406'];?>
',
        toolbar  : 'undo redo insert styleselect bold italic alignleft aligncenter alignright alignjustify bullist numlist outdent indent fullscreen link image pt-file pt-image',
        setup: function (ed) {
            ed.on('keyDown', function(e) {
                if ( e.keyCode == 16 ) {
                    pressShiftKey = true;
                } else if ( e.keyCode == 91 ) {
                    pressCmdKey = true;
                } else if ( e.keyCode == 18 ) {
                    pressOptKey = true;
                } else if ( e.keyCode == 17 ) {
                    pressCtrlKey = true;
                }
            });
            ed.on('keyUp', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('click', function(e) {
                pressCmdKey    = false;
                pressShiftKey  = false;
                pressOptKey    = false;
                pressCtrlKey   = false;
            });
            ed.on('paste', function(e) {
                $('.tox-tinymce').css('width', '99.9%');
                window.setTimeout( _reset_editor_width , 1 );
            });
            ed.on('change', function(e) {
                editContentChanged = true;
                ed.save();
            });
            ed.ui.registry.addButton('pt-image', {
                <?php $_750987_old_params['_5d800d']=$_750987_local_params;$_750987_old_vars['_5d800d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_image.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'gallery',
                <?php endif;$_750987_local_params=$_750987_old_params['_5d800d'];$_750987_local_vars=$_750987_old_vars['_5d800d'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert Image','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_750987_old_params['_8d03c5']=$_750987_local_params;$_750987_old_vars['_8d03c5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_8d03c5'];$_750987_local_vars=$_750987_old_vars['_8d03c5'];?>
&dialog_view=1&select_system_filters=filter_class_image&_system_filters_option=image&_filter=asset&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            ed.ui.registry.addButton('pt-file', {
                <?php $_750987_old_params['_15f392']=$_750987_local_params;$_750987_old_vars['_15f392']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'5','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                text: '<img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/insert_file.png" alt="" style="height:18px;width:18px;margin-top:3px;">',
                <?php else:?>

                icon: 'browse',
                <?php endif;$_750987_local_params=$_750987_old_params['_15f392'];$_750987_local_vars=$_750987_old_vars['_15f392'];?>

                tooltip: '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Insert File','this_tag'=>'trans'],null,$this),$this)?>
',
                onAction: function () {
                    url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_type=list&_model=asset<?php $_750987_old_params['_2a0470']=$_750987_local_params;$_750987_old_vars['_2a0470']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_asset_workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'asset_workspace_id','this_tag'=>'var'],null,$this),$this)?>
&_from_scope=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','castto'=>'int','this_tag'=>'var'],null,$this),$this)?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'workspace_id','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_2a0470'];$_750987_local_vars=$_750987_old_vars['_2a0470'];?>
&dialog_view=1&insert_editor=1&ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'_model','this_tag'=>'var'],null,$this),$this)?>
&insert=' + ed.id;
                    $('#modal').modal().find('iframe').attr( 'src', url );
                }
            });
            <?php echo $this->function_var($this->setup_args(['name'=>'editor_buttons','this_tag'=>'var'],null,$this),$this)?>

            var _reset_editor_width = function()
            {
                $('.tox-tinymce').css('width', '100%');
                $('#__loader-bg').hide();
            }
            <?php $_750987_old_params['_e338f2']=$_750987_local_params;$_750987_old_vars['_e338f2']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'widget','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            ed.on('LoadContent',function(){
                if ( ed.id && ed.id == 'text' ) {
                    let clipboard_image = $('#clipboard-image');
                    let inline_image = $('#inline-image');
                    let bg_image_url = clipboard_image.val();
                    if ( inline_image.length ) {
                        bg_image_url = inline_image.attr('href');
                    }
                    let html_head = ed.iframeElement.contentWindow.document.getElementsByTagName('head')[0];
                    let style = document.createElement('style');
                    let content_style;
                    if ( clipboard_image.length ) {
                      <?php $_750987_old_params['_ce1baa']=$_750987_local_params;$_750987_old_vars['_ce1baa']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_back_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_back_color','value'=>'#ffffff','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_ce1baa'];$_750987_local_vars=$_750987_old_vars['_ce1baa'];?>

                      <?php $_750987_old_params['_c55568']=$_750987_local_params;$_750987_old_vars['_c55568']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'__object_fore_color','value'=>'#000000','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_c55568'];$_750987_local_vars=$_750987_old_vars['_c55568'];?>

                        var rgba = getConversionRgba('<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
');
                        content_style = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background-color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                        + 'background-size: cover; background-position: center;'
                        + 'text-shadow: 2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                        + '-2px 2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                        + '2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
,'
                        + '-2px -2px 2px <?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;'
                        + 'background-image:url("' + bg_image_url + '&rnd=' + Math.random() + '")} body *{background-color: rgba(' + rgba + ')}';
                    } else {
                        content_style = 'body {margin: 40px; font-size: 110%;color:<?php echo $this->function_var($this->setup_args(['name'=>'__object_fore_color','this_tag'=>'var'],null,$this),$this)?>
; background:<?php echo $this->function_var($this->setup_args(['name'=>'__object_back_color','this_tag'=>'var'],null,$this),$this)?>
;}';
                    }
                    style.innerHTML = content_style;
                    html_head.appendChild(style);
                }
            });
            <?php endif;$_750987_local_params=$_750987_old_params['_e338f2'];$_750987_local_vars=$_750987_old_vars['_e338f2'];?>

            $('#__loader-bg').hide("fast");
        }
    });
}
</script>
<?php endif;$_750987_local_params=$_750987_old_params['_f29330'];$_750987_local_vars=$_750987_old_vars['_f29330'];?>

<?php endif;$_750987_local_params=$_750987_old_params['_81728f'];$_750987_local_vars=$_750987_old_vars['_81728f'];?>

<script>
function disp_header_alert ( message, dialog_class ) {
    $("#header-alert-message").html( message );
    if (! dialog_class ) {
        dialog_class = 'success';
    }
    if ( dialog_class == 'success' ) {
        $("#header-alert").removeClass("alert-danger");
        $("#header-alert").removeClass("alert-warning");
        $("#header-alert").addClass("alert-success");
    } else if ( dialog_class == 'warning' ) {
        $("#header-alert").removeClass("alert-success");
        $("#header-alert").removeClass("alert-danger");
        $("#header-alert").addClass("alert-warning");
    } else {
        $("#header-alert").removeClass("alert-success");
        $("#header-alert").removeClass("alert-warning");
        $("#header-alert").addClass("alert-danger");
    }
    $("#header-alert").show();
    setTimeout(focus_header_dialog, 500);
}
function focus_header_dialog () {
    $("#header-alert").focus();
}
function escape_html (string) {
  if(typeof string !== 'string') {
    return string;
  }
  return string.replace(/[&'`"<>]/g, function(match) {
    return {
      '&': '&amp;',
      "'": '&#x27;',
      '`': '&#x60;',
      '"': '&quot;',
      '<': '&lt;',
      '>': '&gt;',
    }[match]
  });
}
function unescape_html (string) {
  var div = document.createElement("div");
  div.innerHTML = string.replace(/</g,"&lt;")
                        .replace(/>/g,"&gt;")
                        .replace(/ /g, "&nbsp;")
                        .replace(/\r/g, "&#13;")
                        .replace(/\n/g, "&#10;");
  return div.textContent || div.innerText;
}
function submit_params_to_post ( url ) {
    const url_params = url.split('?');
    const url_param = url_params[1];
    const url_path = url_params[0];
    const url_param_data = JSON.parse('{"' + url_param.replace(/&/g, '","').replace(/=/g,'":"') + '"}', function( key, value ) { return key === "" ? value:decodeURIComponent( value ) } );
    const list_asset_form = document.createElement( 'form' );
    list_asset_form.method = 'post';
    list_asset_form.action = url_path;
    for ( const key in url_param_data ) {
        if ( url_param_data.hasOwnProperty( key ) ) {
            const hiddenField = document.createElement( 'input' );
            hiddenField.type = 'hidden';
            hiddenField.name = key;
            hiddenField.value = url_param_data[ key ];
            list_asset_form.appendChild( hiddenField );
        }
    }
    document.body.appendChild( list_asset_form );
    list_asset_form.submit();
}
$(function(){
    $(document).on('click','[data-target="#modal"]',function(){
        let $this = $(this);
        let $modal = $('#modal');
        let url = '';
        if( $this.attr('href') ){
            url = $this.attr('href');
        } else if( this.href ){
            url = this.href;
        } else if( $this.data('href') ) {
            url = $this.data('href');
        } else if( $this.attr('data-href') ){
            url = $this.attr('data-href');
        }
        if( url ) {
            $modal.find('iframe').attr('src', url );
        }
    });
});
function getConversionRgba(color_code, alpha) {
    var rgba_code = [];
    rgba_code['red']   = parseInt(color_code.substring(1,3), 16);
    rgba_code['green'] = parseInt(color_code.substring(3,5), 16);
    rgba_code['blue']  = parseInt(color_code.substring(5,7), 16);
    rgba_code['alpha'] = isFinite(alpha) ? alpha : 0.4;
    return Object.values(rgba_code).join(',');
}
<?php $_750987_old_params['_80d2ab']=$_750987_local_params;$_750987_old_vars['_80d2ab']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','ne'=>'upgrade','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_750987_old_params['_a45a6a']=$_750987_local_params;$_750987_old_vars['_a45a6a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','ne'=>'loading','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#modal').on('hidden.bs.modal', function(event) {
    $('#modal-iframe').attr('src', '<?php echo $this->function_var($this->setup_args(['name'=>'“script_uri”','this_tag'=>'var'],null,$this),$this)?>
?__mode=loading' );
});
$('#modal').on('hidden.bs.modal', function(event) {
  if( window._active_ed ) {
      window._active_ed = window._active_ed.focus();
      window._active_ed = false;
  }
});
<?php endif;$_750987_local_params=$_750987_old_params['_a45a6a'];$_750987_local_vars=$_750987_old_vars['_a45a6a'];?>

<?php endif;$_750987_local_params=$_750987_old_params['_80d2ab'];$_750987_local_vars=$_750987_old_vars['_80d2ab'];?>

</script>
  </div>
<?php echo $this->function_var($this->setup_args(['name'=>'html_body_footer','this_tag'=>'var'],null,$this),$this)?>

  </body>
</html>
<?php endif;$_750987_local_params=$_750987_old_params['_297e06'];$_750987_local_vars=$_750987_old_vars['_297e06'];?>


<?php else:?>


<!DOCTYPE html>
<html lang="<?php $_750987_old_params['_a81179']=$_750987_local_params;$_750987_old_vars['_a81179']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_language','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_language','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
en<?php endif;$_750987_local_params=$_750987_old_params['_a81179'];$_750987_local_vars=$_750987_old_vars['_a81179'];?>
">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="author" content="Alfasado Inc.">
    <meta name="robots" content="noindex">
    <meta name="robots" content="nofollow">
    <link rel="icon" href="favicon.ico">
    <title><?php $_750987_old_params['_d4e234']=$_750987_local_params;$_750987_old_vars['_d4e234']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'html_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'html_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php else:?>
<?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'page_title','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_750987_local_params=$_750987_old_params['_d4e234'];$_750987_local_vars=$_750987_old_vars['_d4e234'];?>
 | <?php echo $this->modifier_escape($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'appname','escape'=>'single','this_tag'=>'getoption'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php $_750987_old_params['_a33013']=$_750987_local_params;$_750987_old_vars['_a33013']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_cae54e']=$_750987_local_params;$_750987_old_vars['_cae54e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 | <?php echo $this->modifier_escape($this->function_var($this->setup_args(['name'=>'workspace_name','escape'=>'single','this_tag'=>'var'],null,$this),$this),$this->setup_args('single','escape',$this),$this,'escape')?>
<?php endif;$_750987_local_params=$_750987_old_params['_cae54e'];$_750987_local_vars=$_750987_old_vars['_cae54e'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_a33013'];$_750987_local_vars=$_750987_old_vars['_a33013'];?>
</title>
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/tether.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery-ui.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/jquery.cookie.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/clipboard.min.js"></script>
    <script src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/js/ie10-viewport-bug-workaround.js"></script>
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/theme.min.css?v=<?php echo $this->function_var($this->setup_args(['name'=>'version','this_tag'=>'var'],null,$this),$this)?>
" rel="stylesheet">
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/css/jquery.fileupload.css">
    <?php $_750987_old_params['_4d1668']=$_750987_local_params;$_750987_old_vars['_4d1668']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_b32829']=$_750987_local_params;$_750987_old_vars['_b32829']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.__mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'list_screen','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_b32829'];$_750987_local_vars=$_750987_old_vars['_b32829'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_4d1668'];$_750987_local_vars=$_750987_old_vars['_4d1668'];?>

    <style type="text/css">
    <?php $_750987_old_params['_785028']=$_750987_local_params;$_750987_old_vars['_785028']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'list_screen','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
.disp-option-button { position:absolute; top: 5px; right: 15px; }<?php endif;$_750987_local_params=$_750987_old_params['_785028'];$_750987_local_vars=$_750987_old_vars['_785028'];?>

    <?php $_750987_old_params['_4c7151']=$_750987_local_params;$_750987_old_vars['_4c7151']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_stickey_buttons','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_d15bdc']=$_750987_local_params;$_750987_old_vars['_d15bdc']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_30651f']=$_750987_local_params;$_750987_old_vars['_30651f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_barcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickybgcolor','value'=>'$workspace_barcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_30651f'];$_750987_local_vars=$_750987_old_vars['_30651f'];?>

      <?php $_750987_old_params['_a28e9d']=$_750987_local_params;$_750987_old_vars['_a28e9d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_bartextcolor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'stickycolor','value'=>'$workspace_bartextcolor','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_a28e9d'];$_750987_local_vars=$_750987_old_vars['_a28e9d'];?>

      <?php endif;$_750987_local_params=$_750987_old_params['_d15bdc'];$_750987_local_vars=$_750987_old_vars['_d15bdc'];?>

      <?php $_750987_old_params['_aecaf5']=$_750987_local_params;$_750987_old_vars['_aecaf5']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickybgcolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'barcolor','setvar'=>'stickybgcolor','this_tag'=>'getoption'],null,$this),$this),$this->setup_args('stickybgcolor','setvar',$this),$this,'setvar')?>
<?php endif;$_750987_local_params=$_750987_old_params['_aecaf5'];$_750987_local_vars=$_750987_old_vars['_aecaf5'];?>

      <?php $_750987_old_params['_2b1db0']=$_750987_local_params;$_750987_old_vars['_2b1db0']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'stickycolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'bartextcolor','setvar'=>'stickycolor','this_tag'=>'getoption'],null,$this),$this),$this->setup_args('stickycolor','setvar',$this),$this,'setvar')?>
<?php endif;$_750987_local_params=$_750987_old_params['_2b1db0'];$_750987_local_vars=$_750987_old_vars['_2b1db0'];?>

      @media ( min-height: 576px ) {
      .edit-action-bar { position: sticky; bottom: 0px; z-index: 1040; background: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickybgcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
;
          padding: 10px 0px; vertical-align: middle; line-height: 1; border-top: 1px solid #CCC; }
      .edit-action-bar button { border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      .edit-action-bar label { color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'stickycolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
; }
      }
    <?php endif;$_750987_local_params=$_750987_old_params['_4c7151'];$_750987_local_vars=$_750987_old_vars['_4c7151'];?>

      .nav-top,.brand-prototype{ background-color: <?php echo $this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'barcolor','this_tag'=>'getoption'],null,$this),$this)?>
 !important; color: <?php echo $this->component('PTTags')->hdlr_getoption($this->setup_args(['key'=>'bartextcolor','this_tag'=>'getoption'],null,$this),$this)?>
 !important; }
      <?php $_750987_old_params['_c12961']=$_750987_local_params;$_750987_old_vars['_c12961']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      .form-control, .custom-select, .relation_nestable_list, .custom-control-indicator, .tox-tinymce, .mce-tinymce, .btn-outline-secondary, .btn-secondary, .pagination-sm li a{ border: 1px solid <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important }
      <?php endif;$_750987_local_params=$_750987_old_params['_c12961'];$_750987_local_vars=$_750987_old_vars['_c12961'];?>

    </style>
    <?php echo $this->function_var($this->setup_args(['name'=>'html_head','this_tag'=>'var'],null,$this),$this)?>

    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_css','setvar'=>'config_user_css','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_css','setvar',$this),$this,'setvar')?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'user_js','setvar'=>'config_user_js','this_tag'=>'property'],null,$this),$this),$this->setup_args('config_user_js','setvar',$this),$this,'setvar')?>

    <?php $_750987_old_params['_e11699']=$_750987_local_params;$_750987_old_vars['_e11699']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_css','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<link rel="stylesheet" href="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_css','this_tag'=>'var'],null,$this),$this)?>
"><?php endif;$_750987_local_params=$_750987_old_params['_e11699'];$_750987_local_vars=$_750987_old_vars['_e11699'];?>

    <?php $_750987_old_params['_5c8218']=$_750987_local_params;$_750987_old_vars['_5c8218']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'config_user_js','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<script src="<?php echo $this->function_var($this->setup_args(['name'=>'config_user_js','this_tag'=>'var'],null,$this),$this)?>
"></script><?php endif;$_750987_local_params=$_750987_old_params['_5c8218'];$_750987_local_vars=$_750987_old_vars['_5c8218'];?>

  </head>
  <body class="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'body_class','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 dialog">
<?php $_750987_old_params['_a6ca4a']=$_750987_local_params;$_750987_old_vars['_a6ca4a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
jQuery.fn.extend({
  ksortable: function(options) {
    let self = this;
    self.sortable(options);
    $(self).children().attr('tabindex', 0);
    $(self).on('keydown', '> *', function(event) {
    // $('li', this).attr('tabindex', 0).bind('keydown', function(event) {
        if ( event.target && /^(input|textarea|select)$/.test(event.target.tagName.toLowerCase()) ) {
            return;
        }
        if(event.which == 37 || event.which == 38) { // left or up
          $(this).insertBefore($(this).prev());
        } 
        if(event.which == 39 || event.which == 40) { // right or down
          $(this).insertAfter($(this).next()); 
        }     
        if (event.which == 84 || event.which == 33) { // "t" or page-up
          $(this).parent().prepend($(this));
        } 
        if (event.which == 66 || event.which == 34) { // "b" or page-down
          $(this).parent().append($(this));
        } 
        if(event.which == 82) { // "r"
          var p = $(this).parent();
          p.children().each(function(){p.prepend($(this))})
        } 
        if(event.which == 83) { // "s"
          var p = $(this).parent();
          p.children().each(function(){
            if(Math.random()<.5)
              p.prepend($(this));
            else
              p.append($(this));
          })
        }
        var keyNums = [33, 34, 37, 38, 39, 40, 66, 82, 83, 84];
        var keyNum = event.which + 0;
        if (keyNums.indexOf(keyNum) >= 0){
          event.stopPropagation();
          $(this).focus();
          if ( $(this).hasClass("edit-options-child") ) {
            sort_fields();
          } else if ( $(this).hasClass("badge-relation") ) {
            editContentChanged = true;
          }
          $(self).sortable('refresh').sortable('refreshPositions');
          $(self).trigger('ksortupdate', this);
        }
    });
    return self;
  }
});
</script>
<?php $_750987_old_params['_fe28df']=$_750987_local_params;$_750987_old_vars['_fe28df']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show_loader','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div id="__loader-bg">
  <img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif" alt="" width="45" height="45">
</div>
<script>
window.addEventListener('load', function(){
    $('#__loader-bg').hide("fast");
});
</script>
<?php endif;$_750987_local_params=$_750987_old_params['_fe28df'];$_750987_local_vars=$_750987_old_vars['_fe28df'];?>

<?php endif;$_750987_local_params=$_750987_old_params['_a6ca4a'];$_750987_local_vars=$_750987_old_vars['_a6ca4a'];?>

<?php $_750987_old_params['_b381b7']=$_750987_local_params;$_750987_old_vars['_b381b7']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_c9f6ca']=$_750987_local_params;$_750987_old_vars['_c9f6ca']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.direct_edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_805431']=$_750987_local_params;$_750987_old_vars['_805431']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.saved','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<div id="__loader-bg">
  <img src="<?php echo $this->function_var($this->setup_args(['name'=>'prototype_path','this_tag'=>'var'],null,$this),$this)?>
assets/img/loading.gif" alt="" width="45" height="45">
</div>
<?php endif;$_750987_local_params=$_750987_old_params['_805431'];$_750987_local_vars=$_750987_old_vars['_805431'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_c9f6ca'];$_750987_local_vars=$_750987_old_vars['_c9f6ca'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_b381b7'];$_750987_local_vars=$_750987_old_vars['_b381b7'];?>

    <div class="container-fluid full">
    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    
  <?php $_750987_old_params['_5a6a1c']=$_750987_local_params;$_750987_old_vars['_5a6a1c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'can_action','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php echo $this->function_setvar($this->setup_args(['name'=>'disp_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php $_750987_old_params['_921e79']=$_750987_local_params;$_750987_old_vars['_921e79']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'child_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_6d3fc2']=$_750987_local_params;$_750987_old_vars['_6d3fc2']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'workspace_id','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_750987_local_params=$_750987_old_params['_6d3fc2'];$_750987_local_vars=$_750987_old_vars['_6d3fc2'];?>

    <?php endif;$_750987_local_params=$_750987_old_params['_921e79'];$_750987_local_vars=$_750987_old_vars['_921e79'];?>

    <?php $_750987_old_params['_66bfdf']=$_750987_local_params;$_750987_old_vars['_66bfdf']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_750987_local_params=$_750987_old_params['_66bfdf'];$_750987_local_vars=$_750987_old_vars['_66bfdf'];?>

    <?php $_750987_old_params['_fd8d22']=$_750987_local_params;$_750987_old_vars['_fd8d22']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'menu_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'comment','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'attachmentfile','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php elseif($this->conditional_elseif($this->setup_args(['name'=>'model','eq'=>'user','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_515a6e']=$_750987_local_params;$_750987_old_vars['_515a6e']=$_750987_local_vars;if($this->component('PTTags')->hdlr_isadmin($this->setup_args(['this_tag'=>'isadmin'],null,$this),null,$this,true,true)):?>

      <?php else:?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'disp_option','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_750987_local_params=$_750987_old_params['_515a6e'];$_750987_local_vars=$_750987_old_vars['_515a6e'];?>

    <?php endif;$_750987_local_params=$_750987_old_params['_fd8d22'];$_750987_local_vars=$_750987_old_vars['_fd8d22'];?>

    <?php $_750987_old_params['_c4fc99']=$_750987_local_params;$_750987_old_vars['_c4fc99']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php echo $this->function_setvar($this->setup_args(['name'=>'can_create','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_750987_local_params=$_750987_old_params['_c4fc99'];$_750987_local_vars=$_750987_old_vars['_c4fc99'];?>

    <?php $_750987_old_params['_988ea3']=$_750987_local_params;$_750987_old_vars['_988ea3']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_afd150']=$_750987_local_params;$_750987_old_vars['_afd150']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disp_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php ob_start();$_750987_old_params['_70e19e']=$_750987_local_params;$_750987_old_vars['_70e19e']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <div class="text-right disp-option">
    <button type="button" class="btn btn-outline-primary btn-sm disp-option-button" data-toggle="modal" data-target="#dispOptions">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>

    </button>
    <button data-toggle="modal" data-target="#dispOptions" class="hidden btn btn-secondary alt-disp-option-button btn-sm" type="button">
      <i class="fa fa-television" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </button>
  </div>
  <div class="modal fade" id="dispOptions" tabindex="-1" role="dialog" aria-labelledby="LongTitle" aria-hidden="true"
    style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <?php echo $this->modifier_setvar($this->function_trans($this->setup_args(['phrase'=>'Display Options','setvar'=>'options_title','this_tag'=>'trans'],null,$this),$this),$this->setup_args('options_title','setvar',$this),$this,'setvar')?>

          <h5 class="modal-title" id="LongTitle"><?php echo $this->function_var($this->setup_args(['name'=>'options_title','this_tag'=>'var'],null,$this),$this)?>
</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST" id="disp_options_form">
        <input type="hidden" name="__mode" value="display_options">
        <input type="hidden" name="_model" value="<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
">
        <input type="hidden" name="_type" value="edit">
        <input type="hidden" name="_reset" value="" id="_reset-disp-oprions">
        <input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">
        <input type="hidden" id="_field_sort_order" name="field_sort_order" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'_field_sort_order','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <?php $_750987_old_params['_1b6476']=$_750987_local_params;$_750987_old_vars['_1b6476']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
        <?php endif;$_750987_local_params=$_750987_old_params['_1b6476'];$_750987_local_vars=$_750987_old_vars['_1b6476'];?>

        <div class="modal-body">
          <div class="container-fluid">
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10" id="edit_options_loop">
              <span id="_start_options"></span>
          <?php $_750987_old_params['_fcff77']=$_750987_local_params;$_750987_old_vars['_fcff77']=$_750987_local_vars;if($this->component('PTTags')->hdlr_objectcontext($this->setup_args(['this_tag'=>'objectcontext'],null,$this),null,$this,true,true)):?>

            <?php $c_ea99e8=null;$_750987_old_params['_ea99e8']=$_750987_local_params;$_750987_old_vars['_ea99e8']=$_750987_local_vars;$a_ea99e8=$this->setup_args(['type'=>'edit','option'=>'1','this_tag'=>'objectcols'],null,$this);$_ea99e8=-1;$r_ea99e8=true;while($r_ea99e8===true):$r_ea99e8=($_ea99e8!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectcols($a_ea99e8,$c_ea99e8,$this,$r_ea99e8,++$_ea99e8,'_ea99e8');ob_start();?>
<?php $c_ea99e8 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_ea99e8=false;}if($c_ea99e8 ):?>

              <?php $_750987_old_params['_eb05c6']=$_750987_local_params;$_750987_old_vars['_eb05c6']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','ne'=>'id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_750987_old_params['_c27d10']=$_750987_local_params;$_750987_old_vars['_c27d10']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'hidden','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_750987_old_params['_fe4b40']=$_750987_local_params;$_750987_old_vars['_fe4b40']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'allow_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'use_comment','setvar'=>'use_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('use_comment','setvar',$this),$this,'setvar')?>

                    <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'accept_comment','setvar'=>'accept_comment','this_tag'=>'property'],null,$this),$this),$this->setup_args('accept_comment','setvar',$this),$this,'setvar')?>

                    <?php $_750987_old_params['_a10b1c']=$_750987_local_params;$_750987_old_vars['_a10b1c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'accept_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <?php $_750987_old_params['_bfcdbe']=$_750987_local_params;$_750987_old_vars['_bfcdbe']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'use_comment','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        <?php echo $this->function_setvar($this->setup_args(['name'=>'__show','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <?php endif;$_750987_local_params=$_750987_old_params['_bfcdbe'];$_750987_local_vars=$_750987_old_vars['_bfcdbe'];?>

                    <?php endif;$_750987_local_params=$_750987_old_params['_a10b1c'];$_750987_local_vars=$_750987_old_vars['_a10b1c'];?>

                  <?php endif;$_750987_local_params=$_750987_old_params['_fe4b40'];$_750987_local_vars=$_750987_old_vars['_fe4b40'];?>

                <?php endif;$_750987_local_params=$_750987_old_params['_c27d10'];$_750987_local_vars=$_750987_old_vars['_c27d10'];?>

                <?php $_750987_old_params['_da9998']=$_750987_local_params;$_750987_old_vars['_da9998']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__show','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php $_750987_old_params['_f4505a']=$_750987_local_params;$_750987_old_vars['_f4505a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_f4505a'];$_750987_local_vars=$_750987_old_vars['_f4505a'];?>

                  <?php $_750987_old_params['_56395e']=$_750987_local_params;$_750987_old_vars['_56395e']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->function_setvar($this->setup_args(['name'=>'_checked','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_750987_local_params=$_750987_old_params['_56395e'];$_750987_local_vars=$_750987_old_vars['_56395e'];?>

                  <label class="edit-options-child <?php $_750987_old_params['_01ba6b']=$_750987_local_params;$_750987_old_vars['_01ba6b']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_750987_local_params=$_750987_old_params['_01ba6b'];$_750987_local_vars=$_750987_old_vars['_01ba6b'];?>
custom-control custom-checkbox" id="label-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                    <?php $_750987_old_params['_3c75d3']=$_750987_local_params;$_750987_old_vars['_3c75d3']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <input type="hidden" id="" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <?php endif;$_750987_local_params=$_750987_old_params['_3c75d3'];$_750987_local_vars=$_750987_old_vars['_3c75d3'];?>

                    <input<?php $_750987_old_params['_feb821']=$_750987_local_params;$_750987_old_vars['_feb821']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php else:?>
<?php $_750987_old_params['_8610a8']=$_750987_local_params;$_750987_old_vars['_8610a8']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 onclick="return false;" checked <?php else:?>

                    <?php $_750987_old_params['_b958d0']=$_750987_local_params;$_750987_old_vars['_b958d0']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_750987_local_params=$_750987_old_params['_b958d0'];$_750987_local_vars=$_750987_old_vars['_b958d0'];?>

                    <?php endif;$_750987_local_params=$_750987_old_params['_8610a8'];$_750987_local_vars=$_750987_old_vars['_8610a8'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_feb821'];$_750987_local_vars=$_750987_old_vars['_feb821'];?>
<?php $_750987_old_params['_222cd6']=$_750987_local_params;$_750987_old_vars['_222cd6']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_750987_local_params=$_750987_old_params['_222cd6'];$_750987_local_vars=$_750987_old_vars['_222cd6'];?>
 type="<?php $_750987_old_params['_2e6614']=$_750987_local_params;$_750987_old_vars['_2e6614']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$name','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden<?php else:?>
checkbox<?php endif;$_750987_local_params=$_750987_old_params['_2e6614'];$_750987_local_vars=$_750987_old_vars['_2e6614'];?>
" class="custom-control-input disp_option disp_option-cb" id="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator<?php $_750987_old_params['_6af096']=$_750987_local_params;$_750987_old_vars['_6af096']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_750987_local_params=$_750987_old_params['_6af096'];$_750987_local_vars=$_750987_old_vars['_6af096'];?>
<?php $_750987_old_params['_574ad6']=$_750987_local_params;$_750987_old_vars['_574ad6']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'disable_edit_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_750987_local_params=$_750987_old_params['_574ad6'];$_750987_local_vars=$_750987_old_vars['_574ad6'];?>
"></span>
                    <span class="custom-control-description"> 
                    <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</span>
                  </label>
                <?php endif;$_750987_local_params=$_750987_old_params['_da9998'];$_750987_local_vars=$_750987_old_vars['_da9998'];?>

              <?php endif;$_750987_local_params=$_750987_old_params['_eb05c6'];$_750987_local_vars=$_750987_old_vars['_eb05c6'];?>

            <?php endif;$c_ea99e8=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_ea99e8'];$_750987_local_vars=$_750987_old_vars['_ea99e8'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_fcff77'];$_750987_local_vars=$_750987_old_vars['_fcff77'];?>

                <?php $c_4072c2=null;$_750987_old_params['_4072c2']=$_750987_local_params;$_750987_old_vars['_4072c2']=$_750987_local_vars;$a_4072c2=$this->setup_args(['workspace_id'=>'$workspace_id','model'=>'$model','id'=>'$object_id','this_tag'=>'fieldloop'],null,$this);$_4072c2=-1;$r_4072c2=true;while($r_4072c2===true):$r_4072c2=($_4072c2!==-1)?false:true;echo $this->component('PTTags')->hdlr_fieldloop($a_4072c2,$c_4072c2,$this,$r_4072c2,++$_4072c2,'_4072c2');ob_start();?>
<?php $c_4072c2 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_4072c2=false;}if($c_4072c2 ):?>

                <?php $c_8669b6=null;$_750987_old_params['_8669b6']=$_750987_local_params;$_750987_old_vars['_8669b6']=$_750987_local_vars;$a_8669b6=$this->setup_args(['name'=>'_fieldbasename','this_tag'=>'setvarblock'],null,$this);ob_start();?>
field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $c_8669b6=ob_get_clean();$c_8669b6=$this->block_setvarblock($a_8669b6,$c_8669b6,$this,$r_8669b6,1,'_8669b6');echo($c_8669b6); $_750987_local_params=$_750987_old_params['_8669b6'];?>

                <label class="<?php $_750987_old_params['_a73a6c']=$_750987_local_params;$_750987_old_vars['_a73a6c']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_edit_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
hidden <?php endif;$_750987_local_params=$_750987_old_params['_a73a6c'];$_750987_local_vars=$_750987_old_vars['_a73a6c'];?>
custom-control custom-checkbox" id="label-<?php echo $this->function_var($this->setup_args(['name'=>'_fieldbasename','this_tag'=>'var'],null,$this),$this)?>
">
                  <input<?php $_750987_old_params['_d58c61']=$_750987_local_params;$_750987_old_vars['_d58c61']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_750987_local_params=$_750987_old_params['_d58c61'];$_750987_local_vars=$_750987_old_vars['_d58c61'];?>

                  <?php $_750987_old_params['_297c76']=$_750987_local_params;$_750987_old_vars['_297c76']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_750987_local_params=$_750987_old_params['_297c76'];$_750987_local_vars=$_750987_old_vars['_297c76'];?>

                  <?php $_750987_old_params['_f5b178']=$_750987_local_params;$_750987_old_vars['_f5b178']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'field__required','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_750987_local_params=$_750987_old_params['_f5b178'];$_750987_local_vars=$_750987_old_vars['_f5b178'];?>
 <?php $_750987_old_params['_fe0aa1']=$_750987_local_params;$_750987_old_vars['_fe0aa1']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['array'=>'$display_options','value'=>'$_fieldbasename','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_fe0aa1'];$_750987_local_vars=$_750987_old_vars['_fe0aa1'];?>
 type="checkbox" class="custom-control-input disp_option disp_option-cb" id="field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
-" name="_d_field-<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'field__basename','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_750987_old_params['_b242a5']=$_750987_local_params;$_750987_old_vars['_b242a5']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_edit_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_750987_local_params=$_750987_old_params['_b242a5'];$_750987_local_vars=$_750987_old_vars['_b242a5'];?>
"></span>
                  <span class="custom-control-description"> 
                  <?php echo paml_htmlspecialchars($this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'field__name','trans'=>'1','escape'=>'','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','trans',$this),$this,'trans'),ENT_QUOTES)?>
</span>
                </label>
                <?php endif;$c_4072c2=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_4072c2'];$_750987_local_vars=$_750987_old_vars['_4072c2'];?>

              <?php $_750987_old_params['_fb163b']=$_750987_local_params;$_750987_old_vars['_fb163b']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div>
                  <p class="text-muted hint-block">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Hint','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <?php echo $this->function_trans($this->setup_args(['phrase'=>'You can change the display order of fields with drag &amp; drop.','this_tag'=>'trans'],null,$this),$this)?>

                  </p>
                </div>
              <?php endif;$_750987_local_params=$_750987_old_params['_fb163b'];$_750987_local_vars=$_750987_old_vars['_fb163b'];?>

              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" id="reset-disp-option" class="btn btn-warning" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Reset','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="button" id="disp_options_save" class="btn btn-primary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Save Changes','this_tag'=>'trans'],null,$this),$this)?>
</button>
        </div>
      </form>
      </div>
    </div>
  </div>
<?php endif;$_70e19e=ob_get_clean();echo $this->modifier_trim_space($_70e19e,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_750987_local_params=$_750987_old_params['_70e19e'];$_750987_local_vars=$_750987_old_vars['_70e19e'];?>

<script>
<?php $_750987_old_params['_2b41f0']=$_750987_local_params;$_750987_old_vars['_2b41f0']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_can_sort_edit_col','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

$('#edit_options_loop').sortable({
    stop: function( evt, ui ) {
        sort_fields();
    }
});
$("#edit_options_loop").ksortable();
<?php endif;$_750987_local_params=$_750987_old_params['_2b41f0'];$_750987_local_vars=$_750987_old_vars['_2b41f0'];?>

function sort_fields(){
    var editor_data = [];
    if(tinymce && tinymce.editors){
        for(var i = tinymce.editors.length -1; i >= 0; i--){
            var ed = tinymce.editors[i];
            editor_data.push({
                target  : ed.targetElm,
                setting : ed.settings
            });
        }
    }
    var field_objects = [];
    var field_names = [];
    $('.disp_option-cb').each(function(){
        var field_name = $(this).prop('name');
        field_name = field_name.replace( /^_d_/, '' );
        field_names.push( field_name );
        field_objects.push( $('#' + field_name + '-wrapper' ) );
        $('#' + field_name + '-wrapper' ).find('');
    });
    $('#_field_sort_order').val(field_names.join(','));
    $('#_start_fields').after(field_objects);
    for(var i = 0; i < editor_data.length; i++){
        tinyMCE.execCommand('mceAddEditor', false, editor_data[i].target);
    }
    reorder_fields();
}
function reorder_fields(){
    var field_objects = [];
    var field_names = [];
    $('.disp_option-cb').each(function(){
        let field_name = $(this).prop('name');
        field_name = field_name.replace( /^_d_/, '' );
        field_names.push( field_name );
        field_objects.push( $('#' + field_name + '-wrapper' ) );
    });
    $('#_field_sort_order').val(field_names.join(','));
    $('#_start_fields').after(field_objects);
    var oldTextFormat = null;
    if ( $('#text_format-select').length ){
        oldTextFormat = $('#text_format-select').val();
    }
    if( tinymce && ( oldTextFormat == null || oldTextFormat == 'richtext' ) ){
        tinymce.EditorManager.remove();
        editorInit();
    }
    $(document).trigger('pcmsx.reorder_fields_done');
}
$("#disp_options_save").click(function(){
    let str = $("#disp_options_form").serialize();
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", str,
    function ( data ) {
        if( data.result == true ) {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'%s\'s display options saved successfully.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
");
        } else {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while saving %s.','params'=>'$options_title','this_tag'=>'trans'],null,$this),$this)?>
", 'danger');
        }
    },
    "json"
    );
});
$('#reset-disp-option').click(function(){
    if (! confirm( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to reset display options?','this_tag'=>'trans'],null,$this),$this)?>
' ) ) {
        return false;
    }
    $('#_reset-disp-oprions').val(1);
    let str = $("#disp_options_form").serialize();
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", str,
    function ( data ) {
        $('#_reset-disp-oprions').val('');
        if( data.result == true ) {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'%s\'s display options reset successfully.','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
 <?php echo $this->function_trans($this->setup_args(['phrase'=>'Changes will be reflected the next time you open the screen.','this_tag'=>'trans'],null,$this),$this)?>
", 'warning');
        } else {
            disp_header_alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while resetting %s.','params'=>'$options_title','this_tag'=>'trans'],null,$this),$this)?>
", 'danger');
        }
    },
    "json"
    );
});
$(".disp_option").change(function(){
    let colname = $(this).prop("id");
    let wrapper_name = "#" + colname + 'wrapper';
    let option_name = "." + colname + 'option';
    let wrapper = $(wrapper_name);
    let option  = $(option_name);
    if($(this).prop("checked")) {
        wrapper.show("fade");
        option.show();
    } else {
        wrapper.hide("fade");
        option.hide();
    }
    let richtext = wrapper.find('textarea.richtext');
    if ( richtext.length && $(this).prop('checked') ) {
<?php echo $this->modifier_setvar($this->modifier_cast_to($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'tinymce_version','cast_to'=>'int','setvar'=>'tinymce_version','this_tag'=>'property'],null,$this),$this),$this->setup_args('int','cast_to',$this),$this,'cast_to'),$this->setup_args('tinymce_version','setvar',$this),$this,'setvar')?>

<?php $_750987_old_params['_683dfb']=$_750987_local_params;$_750987_old_vars['_683dfb']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'tinymce_version','eq'=>'4','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        let editor4 = $('.mce-edit-area iframe');
        if ( editor4.length ) {
            let editor_height = richtext.attr( 'rows' );
            editor_height *= 25;
            editor4.css( 'height', editor_height + 'px' );
        }
<?php else:?>

        if ( richtext.next().attr('role') == 'application' ) {
            let editor_height = richtext.attr( 'rows' );
            editor_height *= 25;
            richtext.next().css( 'height', editor_height + 'px' );
        }
<?php endif;$_750987_local_params=$_750987_old_params['_683dfb'];$_750987_local_vars=$_750987_old_vars['_683dfb'];?>

    }
    updateFieldSelector();
});
</script>
        <?php echo $this->function_setvar($this->setup_args(['name'=>'has_option','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_750987_local_params=$_750987_old_params['_afd150'];$_750987_local_vars=$_750987_old_vars['_afd150'];?>

    <?php endif;$_750987_local_params=$_750987_old_params['_988ea3'];$_750987_local_vars=$_750987_old_vars['_988ea3'];?>

    <?php $_750987_old_params['_8e6978']=$_750987_local_params;$_750987_old_vars['_8e6978']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

    <?php $_750987_old_params['_045667']=$_750987_local_params;$_750987_old_vars['_045667']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'time_step','setvar'=>'time_step','this_tag'=>'property'],null,$this),$this),$this->setup_args('time_step','setvar',$this),$this,'setvar')?>

      <div class="modal fade" id="filterOptions" tabindex="-1" role="dialog" aria-labelledby="listFiltersTitle" aria-hidden="true"
        style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="listFiltersTitle"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Filters','this_tag'=>'trans'],null,$this),$this)?>
</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <form id="list_filter_form" action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST">
            <input type="hidden" name="__mode" value="view" id="this_mode">
            <input type="hidden" name="_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="_type" value="list">
            <input type="hidden" name="_filter" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="_filter_id" id="_filter_id" value="">
            <input type="hidden" name="_save_filter_name" id="_save_filter_name" value="">
            <input type="hidden" name="_detach_filter" id="_detach_filter" value="">
            <input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">
            <input type="hidden" name="_system_filters_option" value="" id="_system_filters_option">
            <?php $_750987_old_params['_a52e2d']=$_750987_local_params;$_750987_old_vars['_a52e2d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="single_select" value="1"><?php endif;$_750987_local_params=$_750987_old_params['_a52e2d'];$_750987_local_vars=$_750987_old_vars['_a52e2d'];?>

            <?php $_750987_old_params['_193f8c']=$_750987_local_params;$_750987_old_vars['_193f8c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._from_scope','ne'=>'','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_from_scope" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php endif;$_750987_local_params=$_750987_old_params['_193f8c'];$_750987_local_vars=$_750987_old_vars['_193f8c'];?>

          <?php $_750987_old_params['_c92721']=$_750987_local_params;$_750987_old_vars['_c92721']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
          <?php endif;$_750987_local_params=$_750987_old_params['_c92721'];$_750987_local_vars=$_750987_old_vars['_c92721'];?>

          <?php $_750987_old_params['_cf45fe']=$_750987_local_params;$_750987_old_vars['_cf45fe']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="manage_revision" value="1">
          <?php endif;$_750987_local_params=$_750987_old_params['_cf45fe'];$_750987_local_vars=$_750987_old_vars['_cf45fe'];?>

          <?php $_750987_old_params['_144046']=$_750987_local_params;$_750987_old_vars['_144046']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="dialog_view" value="1">
            <?php $_750987_old_params['_222f85']=$_750987_local_params;$_750987_old_vars['_222f85']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_750987_local_params=$_750987_old_params['_222f85'];$_750987_local_vars=$_750987_old_vars['_222f85'];?>

          <?php $_750987_old_params['_72e6de']=$_750987_local_params;$_750987_old_vars['_72e6de']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="select_system_filters" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="_system_filters_option" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="insert" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="insert_editor" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert_editor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="_filter" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._filter','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php endif;$_750987_local_params=$_750987_old_params['_72e6de'];$_750987_local_vars=$_750987_old_vars['_72e6de'];?>

            <?php $_750987_old_params['_89f8d8']=$_750987_local_params;$_750987_old_vars['_89f8d8']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
              <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <?php endif;$_750987_local_params=$_750987_old_params['_89f8d8'];$_750987_local_vars=$_750987_old_vars['_89f8d8'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_144046'];$_750987_local_vars=$_750987_old_vars['_144046'];?>

          <?php $_750987_old_params['_fec30a']=$_750987_local_params;$_750987_old_vars['_fec30a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="workspace_select" value="1">
          <?php endif;$_750987_local_params=$_750987_old_params['_fec30a'];$_750987_local_vars=$_750987_old_vars['_fec30a'];?>

          <?php $_750987_old_params['_8f1cf1']=$_750987_local_params;$_750987_old_vars['_8f1cf1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="selected_ids" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <input type="hidden" name="from_obj" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.from_obj','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php $_750987_old_params['_bad6c7']=$_750987_local_params;$_750987_old_vars['_bad6c7']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="select_add" value="1">
          <?php endif;$_750987_local_params=$_750987_old_params['_bad6c7'];$_750987_local_vars=$_750987_old_vars['_bad6c7'];?>

          <?php $_750987_old_params['_1b1631']=$_750987_local_params;$_750987_old_vars['_1b1631']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ids_only','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <input type="hidden" name="ids_only" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ids_only','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
          <?php endif;$_750987_local_params=$_750987_old_params['_1b1631'];$_750987_local_vars=$_750987_old_vars['_1b1631'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_8f1cf1'];$_750987_local_vars=$_750987_old_vars['_8f1cf1'];?>

            <div class="modal-body">
              <div class="container-fluid">
                <?php $_750987_old_params['_99bd01']=$_750987_local_params;$_750987_old_vars['_99bd01']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'System Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <?php $c_ca3cb5=null;$_750987_old_params['_ca3cb5']=$_750987_local_params;$_750987_old_vars['_ca3cb5']=$_750987_local_vars;$a_ca3cb5=$this->setup_args(['name'=>'system_filters','this_tag'=>'loop'],null,$this);$_ca3cb5=-1;$r_ca3cb5=true;while($r_ca3cb5===true):$r_ca3cb5=($_ca3cb5!==-1)?false:true;echo $this->block_loop($a_ca3cb5,$c_ca3cb5,$this,$r_ca3cb5,++$_ca3cb5,'_ca3cb5');ob_start();?>
<?php $c_ca3cb5 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_ca3cb5=false;}if($c_ca3cb5 ):?>

                      <?php $_750987_old_params['_714fed']=$_750987_local_params;$_750987_old_vars['_714fed']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select_system_filters" id="select_system_filters">
                        <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php endif;$_750987_local_params=$_750987_old_params['_714fed'];$_750987_local_vars=$_750987_old_vars['_714fed'];?>

                        <option <?php $_750987_old_params['_425652']=$_750987_local_params;$_750987_old_vars['_425652']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'input','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
data-input="1" data-hint="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'hint','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"<?php endif;$_750987_local_params=$_750987_old_params['_425652'];$_750987_local_vars=$_750987_old_vars['_425652'];?>
data-option="<?php echo $this->function_var($this->setup_args(['name'=>'option','this_tag'=>'var'],null,$this),$this)?>
" <?php $_750987_old_params['_7b28d8']=$_750987_local_params;$_750987_old_vars['_7b28d8']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_system_filter','eq'=>'$name','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_750987_local_params=$_750987_old_params['_7b28d8'];$_750987_local_vars=$_750987_old_vars['_7b28d8'];?>
 value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php $_750987_old_params['_bb7aa5']=$_750987_local_params;$_750987_old_vars['_bb7aa5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                        </select>
                      <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="system_filter-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                      <?php endif;$_750987_local_params=$_750987_old_params['_bb7aa5'];$_750987_local_vars=$_750987_old_vars['_bb7aa5'];?>

                    <?php endif;$c_ca3cb5=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_ca3cb5'];$_750987_local_vars=$_750987_old_vars['_ca3cb5'];?>

                  </div>
                </div>
                <?php endif;$_750987_local_params=$_750987_old_params['_99bd01'];$_750987_local_vars=$_750987_old_vars['_99bd01'];?>

                <div class="row form-group">
                  <div class="col-md-3"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Your Filters','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" name="select-user_filters" id="select-user_filters">
                      <option value=""><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                      <?php $c_2cd697=null;$_750987_old_params['_2cd697']=$_750987_local_params;$_750987_old_vars['_2cd697']=$_750987_local_vars;$a_2cd697=$this->setup_args(['model'=>'option','kind'=>'list_filter','key'=>'$model','user_id'=>'$user_id','workspace_id'=>'$workspace_id','this_tag'=>'objectloop'],null,$this);$_2cd697=-1;$r_2cd697=true;while($r_2cd697===true):$r_2cd697=($_2cd697!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_2cd697,$c_2cd697,$this,$r_2cd697,++$_2cd697,'_2cd697');ob_start();?>
<?php $c_2cd697 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_2cd697=false;}if($c_2cd697 ):?>

                      <?php echo $this->function_setvar($this->setup_args(['name'=>'has_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_750987_old_params['_86b55c']=$_750987_local_params;$_750987_old_vars['_86b55c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'current_filter_id','eq'=>'$id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_750987_local_params=$_750987_old_params['_86b55c'];$_750987_local_vars=$_750987_old_vars['_86b55c'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'value','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                      <?php endif;$c_2cd697=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_2cd697'];$_750987_local_vars=$_750987_old_vars['_2cd697'];?>

                      <option value="add_new_filter"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Add New Filter','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    </select>
                    <?php $_750987_old_params['_5c4a0e']=$_750987_local_params;$_750987_old_vars['_5c4a0e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button type="submit" class="btn btn-sm btn-primary filter-selecter-ctrl-apply" id="filter-select-apply-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <button type="button" class="delete-filter-elem hidden delete-bun-sm btn btn-secondary btn-sm filter-selecter-ctrl" id="filter-select-delete-button" class="close" data-dismiss="modal">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Delete','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    </button>
                    <?php endif;$_750987_local_params=$_750987_old_params['_5c4a0e'];$_750987_local_vars=$_750987_old_vars['_5c4a0e'];?>

                  </div>
                </div>
                <div class="row form-group new-filter-elem hidden">
                  <div class="col-md-3" style="float:left;"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
                  <div class="col-md-9 form-inline">
                    <select style="width:240px" name="filters-selector" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-dd" id="filters-selector">
                    <?php $c_558189=null;$_750987_old_params['_558189']=$_750987_local_params;$_750987_old_vars['_558189']=$_750987_local_vars;$a_558189=$this->setup_args(['name'=>'filter_options','this_tag'=>'loop'],null,$this);$_558189=-1;$r_558189=true;while($r_558189===true):$r_558189=($_558189!==-1)?false:true;echo $this->block_loop($a_558189,$c_558189,$this,$r_558189,++$_558189,'_558189');ob_start();?>
<?php $c_558189 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_558189=false;}if($c_558189 ):?>

                    <?php $_750987_old_params['_ef164e']=$_750987_local_params;$_750987_old_vars['_ef164e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                      <option><?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>
</option>
                    <?php endif;$_750987_local_params=$_750987_old_params['_ef164e'];$_750987_local_vars=$_750987_old_vars['_ef164e'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'name','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" class="coltype_<?php $_750987_old_params['_158836']=$_750987_local_params;$_750987_old_vars['_158836']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'name','eq'=>'created_by','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
reference<?php else:?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_158836'];$_750987_local_vars=$_750987_old_vars['_158836'];?>
"><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php endif;$c_558189=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_558189'];$_750987_local_vars=$_750987_old_vars['_558189'];?>

                    </select>
                   <button type="button" class="btn btn-sm btn-secondary filter-selecter-ctrl-apply" id="filter-add-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Add','this_tag'=>'trans'],null,$this),$this)?>
</button>
                  </div>
                </div>
                <div class="row form-group new-filter-elem">
                  <div class="col-md-12">
                    <div class="card hidden" id="filter-parant-block">
                      <ul class="list-group list-group-flush" id="filters-list">
                        <li class="list-group-item hidden" id="selector-tmpl-int">
                          <div class="form-inline">
                            <span class="selector_col"></span> 
                            &nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>' is ','this_tag'=>'trans'],null,$this),$this)?>

                              <input type="number" class="short-padding form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <select name="" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-sm">
                              <option value="eq"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="lt"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Less than','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="gt"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Grater than','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="ne"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Not Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="ge"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Greater Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="le"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Less Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                            </select>
                            <button type="button" class="btn btn-secondary btn-sm close-sm detach-filter detach-filter-btn" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </li>
                        <li class="list-group-item hidden" id="selector-tmpl-text">
                          <div class="form-inline">
                            <span class="selector_col"></span> 
                            &nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>' is ','this_tag'=>'trans'],null,$this),$this)?>

                              <input type="text" class="short-padding form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <select name="" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-sm">
                              <option value="ct"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Contains','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="nc"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Not Contains','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="eq"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="ne"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Not Equal','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="bw"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Begin with','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="ew"><?php echo $this->function_trans($this->setup_args(['phrase'=>'End with','this_tag'=>'trans'],null,$this),$this)?>
</option>
                            </select>
                            <button type="button" class="btn btn-secondary btn-sm close-sm detach-filter detach-filter-btn" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </li>
                        <li class="list-group-item hidden" id="selector-tmpl-date">
                          <div class="form-inline">
                            <span class="selector_col"></span> 
                            &nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>' is ','this_tag'=>'trans'],null,$this),$this)?>

                              <?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'published_on_default','setvar'=>'published_on_default','this_tag'=>'property'],null,$this),$this),$this->setup_args('published_on_default','setvar',$this),$this,'setvar')?>

                              <input type="datetime-local" step="<?php $_750987_old_params['_3633b1']=$_750987_local_params;$_750987_old_vars['_3633b1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'time_step','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'time_step','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
1<?php endif;$_750987_local_params=$_750987_old_params['_3633b1'];$_750987_local_vars=$_750987_old_vars['_3633b1'];?>
" class="form-control form-control-sm filter-selecter-ctrl filter-selecter-ctrl-sm" name="" value="<?php $_750987_old_params['_bcfc3f']=$_750987_local_params;$_750987_old_vars['_bcfc3f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'published_on_default','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_format_ts($this->function_date($this->setup_args(['format'=>'$published_on_default','format_ts'=>'Y-m-d\\TH:i:s','this_tag'=>'date'],null,$this),$this),$this->setup_args('Y-m-d\\\\TH:i:s','format_ts',$this),$this,'format_ts')?>
<?php endif;$_750987_local_params=$_750987_old_params['_bcfc3f'];$_750987_local_vars=$_750987_old_vars['_bcfc3f'];?>
">
                            <select name="" class="form-control form-control-sm custom-select filter-selecter-ctrl filter-selecter-ctrl-sm">
                              <option value="gt"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Newer than','this_tag'=>'trans'],null,$this),$this)?>
</option>
                              <option value="lt"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Older than','this_tag'=>'trans'],null,$this),$this)?>
</option>
                            </select>
                            <button type="button" class="btn btn-secondary btn-sm close-sm detach-filter detach-filter-btn" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </li>
                        <li class="list-group-item hidden" id="selector-tmpl-status">
                          <div class="form-inline">
                            <span class="selector_col"></span> 
                            &nbsp; <?php echo $this->function_trans($this->setup_args(['phrase'=>' is ','this_tag'=>'trans'],null,$this),$this)?>

                            <?php $_750987_old_params['_c5f1d5']=$_750987_local_params;$_750987_old_vars['_c5f1d5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'status_options','split'=>',','setvar'=>'status_label','this_tag'=>'var'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                            <?php else:?>

                              <?php $_750987_old_params['_a7fb6a']=$_750987_local_params;$_750987_old_vars['_a7fb6a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Draft,Review,Approval Pending,Reserved,Publish,Ended','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php else:?>

                              <?php echo $this->modifier_setvar($this->modifier_split($this->function_trans($this->setup_args(['phrase'=>'Disable,Enable','split'=>',','setvar'=>'status_label','this_tag'=>'trans'],null,$this),$this),$this->setup_args(',','split',$this),$this,'split'),$this->setup_args('status_label','setvar',$this),$this,'setvar')?>

                              <?php endif;$_750987_local_params=$_750987_old_params['_a7fb6a'];$_750987_local_vars=$_750987_old_vars['_a7fb6a'];?>

                            <?php endif;$_750987_local_params=$_750987_old_params['_c5f1d5'];$_750987_local_vars=$_750987_old_vars['_c5f1d5'];?>

                            <select class="form-control form-control-sm custom-select short filter-selecter-ctrl filter-selecter-ctrl-sm" name="">
                            <?php $_750987_old_params['_2d6011']=$_750987_local_params;$_750987_old_vars['_2d6011']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'status_published','ne'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                            <?php $c_3ca06b=null;$_750987_old_params['_3ca06b']=$_750987_local_params;$_750987_old_vars['_3ca06b']=$_750987_local_vars;$a_3ca06b=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_3ca06b=-1;$r_3ca06b=true;while($r_3ca06b===true):$r_3ca06b=($_3ca06b!==-1)?false:true;echo $this->block_loop($a_3ca06b,$c_3ca06b,$this,$r_3ca06b,++$_3ca06b,'_3ca06b');ob_start();?>
<?php $c_3ca06b = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_3ca06b=false;}if($c_3ca06b ):?>

                              <?php $_750987_old_params['_966ba8']=$_750987_local_params;$_750987_old_vars['_966ba8']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__index__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                              <?php $_750987_old_params['_d85203']=$_750987_local_params;$_750987_old_vars['_d85203']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__index__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_750987_local_params=$_750987_old_params['_d85203'];$_750987_local_vars=$_750987_old_vars['_d85203'];?>

                              <?php endif;$_750987_local_params=$_750987_old_params['_966ba8'];$_750987_local_vars=$_750987_old_vars['_966ba8'];?>

                            <?php endif;$c_3ca06b=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_3ca06b'];$_750987_local_vars=$_750987_old_vars['_3ca06b'];?>

                            <?php else:?>

                            <?php $c_3591b5=null;$_750987_old_params['_3591b5']=$_750987_local_params;$_750987_old_vars['_3591b5']=$_750987_local_vars;$a_3591b5=$this->setup_args(['name'=>'status_label','this_tag'=>'loop'],null,$this);$_3591b5=-1;$r_3591b5=true;while($r_3591b5===true):$r_3591b5=($_3591b5!==-1)?false:true;echo $this->block_loop($a_3591b5,$c_3591b5,$this,$r_3591b5,++$_3591b5,'_3591b5');ob_start();?>
<?php $c_3591b5 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_3591b5=false;}if($c_3591b5 ):?>

                              <?php $_750987_old_params['_9667fa']=$_750987_local_params;$_750987_old_vars['_9667fa']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','le'=>'$list_max_status','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                                <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->modifier_translate($this->function_var($this->setup_args(['name'=>'__value__','translate'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','translate',$this),$this,'translate')?>
</option>
                              <?php endif;$_750987_local_params=$_750987_old_params['_9667fa'];$_750987_local_vars=$_750987_old_vars['_9667fa'];?>

                            <?php endif;$c_3591b5=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_3591b5'];$_750987_local_vars=$_750987_old_vars['_3591b5'];?>

                            <?php endif;$_750987_local_params=$_750987_old_params['_2d6011'];$_750987_local_vars=$_750987_old_vars['_2d6011'];?>

                            </select>
                            <input type="hidden" name="" value="eq">
                            <button type="button" class="btn btn-secondary btn-sm close-sm detach-filter detach-filter-btn" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-secondary delete-filter-elem hidden" id="detach-filter-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach Filter','this_tag'=>'trans'],null,$this),$this)?>
</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
              <button type="submit" class="btn btn-primary new-filter-elem hidden" id="filter-apply"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
              <button type="submit" class="btn btn-secondary new-filter-elem hidden" id="filter-save-apply"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Save and Apply','this_tag'=>'trans'],null,$this),$this)?>
</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
<script>
$('#system_filter-apply-button').click(function(){
    if (! $('[name=select_system_filters] option:selected').val() ) {
        if ( filter_itemCount ) {
            return $('#filter-apply').trigger('click');
        }
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    let input = $('[name=select_system_filters] option:selected').data( 'input' );
    let hint = $('[name=select_system_filters] option:selected').data( 'hint' );
    let filter_option = $('[name=select_system_filters] option:selected').attr('data-option');
    if ( input ) {
        if (! hint ) {
            hint = '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Please enter the value.','this_tag'=>'trans'],null,$this),$this)?>
';
        }
        filter_option = prompt( hint, filter_option );
        if (! filter_option ) {
            return false;
        }
    }
    $('#select-user_filters').val('');
    $('#_system_filters_option').val( filter_option );
});
$('#filter-select-delete-button').click(function(){
    var filter_id = $('#select-user_filters').val();
    if ( filter_id == 'add_new_filter' || filter_id == '' ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    if(!confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to remove selected filter?','this_tag'=>'trans'],null,$this),$this)?>
')){
        return false;
    }
    $('#_filter_id').val( filter_id );
    $('#this_mode').val( 'delete_filter' );
    $('[name=select-user_filters] option:selected').remove();
    var str = $("#list_filter_form").serialize();
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", str,
    function ( data ) {
        if( data.result == true ) {
            $("#header-alert-message").html('<?php echo $this->function_trans($this->setup_args(['phrase'=>'The Filter has successfully deleted.','this_tag'=>'trans'],null,$this),$this)?>
');
            $("#header-alert").removeClass("alert-danger");
            $("#header-alert").addClass("alert-success");
        } else {
            $("#header-alert-message").html('<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while removing the Filter.','this_tag'=>'trans'],null,$this),$this)?>
');
            $("#header-alert").removeClass("alert-success");
            $("#header-alert").addClass("alert-danger");
        }
        $("#header-alert").show();
        setTimeout(focus_header_dialog, 500);
        $(".current-filter").hide();
        $('#this_mode').val( 'list' );
        $('#_filter_id').val('');
        $('#filter-select-delete-button').hide();
        var loc = $(location).attr('href');
        if ( loc.indexOf('?') == -1 ) {
            loc = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&_type=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
            <?php $_750987_old_params['_342f0d']=$_750987_local_params;$_750987_old_vars['_342f0d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            loc += '&workspace_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workspace_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
';
            <?php endif;$_750987_local_params=$_750987_old_params['_342f0d'];$_750987_local_vars=$_750987_old_vars['_342f0d'];?>

            loc += '&_detach_filter=1';
            location.href = loc;
        } else {
            loc += '&_detach_filter=1';
            location.href = loc;
        }
    },
    "json"
    );
});
function focus_header_dialog () {
    $("#header-alert").focus();
}
$('#filter-select-apply-button').click(function(){
    var filter_id = $('#select-user_filters').val();
    if ( filter_id == 'add_new_filter' || filter_id == '' ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    $('#select_system_filters').val('');
    $('#_filter_id').val( filter_id );
    return true;
});
$('#select-user_filters').change(function(){
    if ($(this).val() == 'add_new_filter' ) {
        $('.new-filter-elem').show();
        $('.delete-filter-elem').hide();
    } else {
        $('.new-filter-elem').hide();
        if ( $(this).val() ) {
            $('.delete-filter-elem').show();
        }
    }
});
var curr_user_filter = $('#select-user_filters').val();
if ( curr_user_filter != 'add_new_filter' && curr_user_filter != '' ) {
    $('.delete-filter-elem').show();
}
var filter_itemCount = 0;
$('#filter-apply').click(function(){
    if (! filter_itemCount ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
});
$('#filter-save-apply').click(function(){
    if (! filter_itemCount ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Filter not specified.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    var filter_name = prompt('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Please enter the Name of this Filter.','this_tag'=>'trans'],null,$this),$this)?>
', '');
    if (! filter_name ) {
        alert('<?php echo $this->function_trans($this->setup_args(['phrase'=>'The Filter Name is required.','this_tag'=>'trans'],null,$this),$this)?>
');
        return false;
    }
    $('#_save_filter_name').val(filter_name);
});
$('#detach-filter-button').click(function(){
    $('#filters-list').remove();
    $('#_detach_filter').val(1);
});
$('#filter-add-button').click(function(){
    var selected_col = $('#filters-selector').val();
    var sel_class = $('[name=filters-selector] option:selected').attr('class');
    var sel_label = $('[name=filters-selector] option:selected').text();
    sel_class = sel_class.replace( 'coltype_', '' );
    var filter_tmpl = $('#selector-tmpl-text');
    if ( selected_col == 'status' ) {
        filter_tmpl = $('#selector-tmpl-status');
    } else if ( sel_class == 'int' || sel_class == 'tinyint' || sel_class == 'double' || sel_class.indexOf('decimal') == 0 ) {
        filter_tmpl = $('#selector-tmpl-int');
    } else if ( sel_class == 'datetime' ) {
        filter_tmpl = $('#selector-tmpl-date');
    }
    var addSelecter = filter_tmpl.clone( true ).appendTo('#filters-list');
    addSelecter.removeClass('hidden');
    addSelecter.removeAttr('id');
    addSelecter.children('div').children('span').html(sel_label);
    if ( selected_col == 'status' ) {
        addSelecter.children('div').children('input').attr('name', '_filter_cond_' + selected_col + '[]');
        addSelecter.children('div').children('select').attr('name', '_filter_value_' + selected_col + '[]');
    } else {
        addSelecter.children('div').children('input').attr('name', '_filter_value_' + selected_col + '[]');
        addSelecter.children('div').children('select').attr('name', '_filter_cond_' + selected_col + '[]');
    }
    $('#filter-parant-block').show();
    $('#filter-parant-block').css('border','none');
    addSelecter.show();
    filter_itemCount++;
});
$('.detach-filter').click(function(){
    if(!confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to remove this filter condition?','this_tag'=>'trans'],null,$this),$this)?>
')){
        return false;
    }
    $(this).parent().parent().remove();
    filter_itemCount--;
});
</script>
    <?php endif;$_750987_local_params=$_750987_old_params['_045667'];$_750987_local_vars=$_750987_old_vars['_045667'];?>

    <?php $_750987_old_params['_79ff51']=$_750987_local_params;$_750987_old_vars['_79ff51']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_e584b9']=$_750987_local_params;$_750987_old_vars['_e584b9']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="modal fade" id="startUpload" tabindex="-1" role="dialog" aria-labelledby="startUploadTitle" aria-hidden="true"
        style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="startUploadTitle"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload','this_tag'=>'trans'],null,$this),$this)?>
</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="alert alert-success hidden" id="clear-history-alert" role="alert" tabindex="0">
              <button onclick="$('#clear-history-alert').hide();" type="button" class="close" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
                <span aria-hidden="true">&times;</span>
              </button>
              <?php echo $this->function_trans($this->setup_args(['phrase'=>'The upload path history has been cleared successfully.','this_tag'=>'trans'],null,$this),$this)?>

            </div>
              <div class="container-fluid" id="drop-zone">
                <form>
                <span id="file-chooser" class="btn btn-success fileinput-button">
                    <span><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select File...','this_tag'=>'trans'],null,$this),$this)?>
</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="files[]" multiple
                        onfocus="$('#file-chooser').css('border','2px solid green');"
                        onblur="$('#file-chooser').css('border','none');">
                </span>
              <?php $_750987_old_params['_0707d0']=$_750987_local_params;$_750987_old_vars['_0707d0']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <label class="custom-control custom-checkbox" style="margin-top: 10px;margin-left: 7px">
                  <input type="checkbox" class="custom-control-input"
                    id="asset_overwrite" name="overwrite" value="0">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Overwrite files with the same path','this_tag'=>'trans'],null,$this),$this)?>

                </label>
                <script>
                $('#asset_overwrite').change(function(){
                    if ($(this).prop('checked')) {
                        $(this).val('1');
                    } else {
                        $(this).val('0');
                    }
                });
                </script>
              <?php endif;$_750987_local_params=$_750987_old_params['_0707d0'];$_750987_local_vars=$_750987_old_vars['_0707d0'];?>

                <div class="form-inline" style="margin: 10px 7px">
                  <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload Path','this_tag'=>'trans'],null,$this),$this)?>

                  <?php $_750987_old_params['_d3cc33']=$_750987_local_params;$_750987_old_vars['_d3cc33']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model_out_path','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->modifier_setvar($this->modifier_add_slash(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model_out_path','escape'=>'','add_slash'=>'','setvar'=>'model_out_path','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('','add_slash',$this),$this,'add_slash'),$this->setup_args('model_out_path','setvar',$this),$this,'setvar')?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'extra_path','value'=>'$model_out_path','append'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_750987_local_params=$_750987_old_params['_d3cc33'];$_750987_local_vars=$_750987_old_vars['_d3cc33'];?>

                  <input id="extra_path" type="text" style="width:200px;" class="form-control" name="extra_path" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'extra_path','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
                  <?php echo $this->function_setvar($this->setup_args(['name'=>'upload_paths','value'=>'$extra_path','function'=>'unshift','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php echo $this->modifier_setvar($this->modifier_array_unique($this->function_var($this->setup_args(['name'=>'upload_paths','array_unique'=>'','setvar'=>'upload_paths','this_tag'=>'var'],null,$this),$this),$this->setup_args('','array_unique',$this),$this,'array_unique'),$this->setup_args('upload_paths','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_count($this->setup_args(['name'=>'$upload_paths','setvar'=>'path_cnt','this_tag'=>'count'],null,$this),$this),$this->setup_args('path_cnt','setvar',$this),$this,'setvar')?>

                <?php $_750987_old_params['_9726eb']=$_750987_local_params;$_750987_old_vars['_9726eb']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'path_cnt','gt'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <div id="upload_paths-box">
                  <?php $c_91df08=null;$_750987_old_params['_91df08']=$_750987_local_params;$_750987_old_vars['_91df08']=$_750987_local_vars;$a_91df08=$this->setup_args(['name'=>'upload_paths','this_tag'=>'loop'],null,$this);$_91df08=-1;$r_91df08=true;while($r_91df08===true):$r_91df08=($_91df08!==-1)?false:true;echo $this->block_loop($a_91df08,$c_91df08,$this,$r_91df08,++$_91df08,'_91df08');ob_start();?>
<?php $c_91df08 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_91df08=false;}if($c_91df08 ):?>

                    <?php $_750987_old_params['_e3b6ef']=$_750987_local_params;$_750987_old_vars['_e3b6ef']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <button class="btn ml-3 btn-secondary" id="toggle-upload_path"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
</button>
                    <span class="hidden" id="upload_path-wrapper">
                    <select class="form-control custom-select short" name="upload_path" id="upload_path"><?php endif;$_750987_local_params=$_750987_old_params['_e3b6ef'];$_750987_local_vars=$_750987_old_vars['_e3b6ef'];?>

                      <option value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" <?php $_750987_old_params['_f5360c']=$_750987_local_params;$_750987_old_vars['_f5360c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'extra_path','eq'=>'$__value__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
selected<?php endif;$_750987_local_params=$_750987_old_params['_f5360c'];$_750987_local_vars=$_750987_old_vars['_f5360c'];?>
><?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
</option>
                    <?php $_750987_old_params['_4e6b50']=$_750987_local_params;$_750987_old_vars['_4e6b50']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
</select>
                    <button class="btn ml-0 btn-secondary btn-sm" id="clear-upload_path">  <i class="fa fa-trash" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Clear','this_tag'=>'trans'],null,$this),$this)?>
</span></button>
                    </span>
                  </div>
                    <?php endif;$_750987_local_params=$_750987_old_params['_4e6b50'];$_750987_local_vars=$_750987_old_vars['_4e6b50'];?>

                  <?php endif;$c_91df08=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_91df08'];$_750987_local_vars=$_750987_old_vars['_91df08'];?>

                <?php endif;$_750987_local_params=$_750987_old_params['_9726eb'];$_750987_local_vars=$_750987_old_vars['_9726eb'];?>

                </div>
                <!-- The container for the uploaded files -->
                <div id="files" class="files"></div>
                </form>
              </div>
              <!-- The global progress bar -->
              <div id="progress" class="progress">
                <div class="progress-bar progress-bar-success"></div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary upload-cancel-button" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
              <button type="submit" class="btn btn-primary new-filter-elem hidden" id="filter-apply"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Next','this_tag'=>'trans'],null,$this),$this)?>
</button>
            </div>
          </div>
        </div>
      </div>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="assets/js/vendor/jquery.ui.widget.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="assets/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'query_string','regex_replace'=>'\'/&offset=[0-9]{1,}/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&offset=[0-9]{1,}/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&deleted=1/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&deleted=1/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php $_750987_old_params['_5dcad0']=$_750987_local_params;$_750987_old_vars['_5dcad0']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&filter_params=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&filter_params=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&magic_token=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&magic_token=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

  <?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&query=[^&]*/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&query=[^&]*/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php endif;$_750987_local_params=$_750987_old_params['_5dcad0'];$_750987_local_vars=$_750987_old_vars['_5dcad0'];?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&{0,1}does_act=[0-9]{1,}/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&{0,1}does_act=[0-9]{1,}/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&{0,1}apply_actions=[0-9]{1,}/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&{0,1}apply_actions=[0-9]{1,}/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&{0,1}background_proccess_running=[0-9]{1,}/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&{0,1}background_proccess_running=[0-9]{1,}/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&{0,1}html_background_proccess=1/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&{0,1}html_background_proccess=1/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/&+/\',\'&\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/&+/\\\',\\\'&\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<?php echo $this->modifier_setvar($this->modifier_regex_replace($this->function_var($this->setup_args(['name'=>'_query_string','regex_replace'=>'\'/^&+/\',\'\'','setvar'=>'_query_string','this_tag'=>'var'],null,$this),$this),$this->setup_args('\\\'/^&+/\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('_query_string','setvar',$this),$this,'setvar')?>

<script src="assets/js/jquery.fileupload.js"></script>
<script>
$('#upload_path').change(function(){
    $('#extra_path').val( $(this).val() );
});
$('#clear-upload_path').click(function(){
    if ( !confirm('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to delete the upload path history?','this_tag'=>'trans'],null,$this),$this)?>
') ) {
        return false;
    }
    $.post("<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
", {
        '__mode' : 'clear_extra_paths',
        'workspace_id' : '<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
',
        'magic_token': '<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
'
    },
    function ( data ) {
        if( data.result == true ) {
            $('#upload_paths-box').hide( 300 );
            $('#clear-history-alert').show();
            $('#clear-history-alert').focus();
        } else {
            alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while clearing upload path history.','this_tag'=>'trans'],null,$this),$this)?>
");
        }
    },
    "json"
    );
    return false;
});
$('#toggle-upload_path').click(function(){
    $('#upload_path-wrapper').toggle();
    if ( $(this).html() == '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
' ) {
        $(this).html( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Hide','this_tag'=>'trans'],null,$this),$this)?>
' );
        $('#upload_path-wrapper').css('display', 'inline');
    } else {
        $(this).html( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Select','this_tag'=>'trans'],null,$this),$this)?>
' );
    }
    return false;
});
var this_url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?<?php $_750987_old_params['_3fc6db']=$_750987_local_params;$_750987_old_vars['_3fc6db']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&<?php endif;$_750987_local_params=$_750987_old_params['_3fc6db'];$_750987_local_vars=$_750987_old_vars['_3fc6db'];?>
<?php echo $this->function_var($this->setup_args(['name'=>'_query_string','this_tag'=>'var'],null,$this),$this)?>
&sort=id&direction=desc';
var selected_ids = [];
var upload_count = 0;
var receive_count = 0;
var DropZone = document.getElementById('drop-zone');
DropZone.addEventListener('dragover', function (event) {
    $('#drop-zone').css('background-color','#ddf');
});
DropZone.addEventListener('dragleave', function (event) {
    $('#drop-zone').css('background-color','#fff');
});
$('#drop-zone').css('border','3px dashed <?php $_750987_old_params['_5e1179']=$_750987_local_params;$_750987_old_vars['_5e1179']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'user_control_border','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'user_control_border','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php else:?>
#ccc<?php endif;$_750987_local_params=$_750987_old_params['_5e1179'];$_750987_local_vars=$_750987_old_vars['_5e1179'];?>
');
$('#drop-zone').css('margin','1px');
$('#drop-zone').css('padding','8px');
$(function () {
    'use strict';
    var url = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=upload_multi&magic_token=<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
&workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
&model=asset&name=file<?php $_750987_old_params['_9be995']=$_750987_local_params;$_750987_old_vars['_9be995']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','eq'=>'filter_class_image','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&select_system_filters=filter_class_image<?php endif;$_750987_local_params=$_750987_old_params['_9be995'];$_750987_local_vars=$_750987_old_vars['_9be995'];?>
';
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        dropZone: $("#drop-zone"),
        // formData: {extra_path: $('#extra_path').val()},
        add: function (e, data) {
            data.formData = {extra_path: $('#extra_path').val()<?php $_750987_old_params['_dab4ca']=$_750987_local_params;$_750987_old_vars['_dab4ca']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'asset_overwrite','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
, overwrite: $('#asset_overwrite').val()<?php endif;$_750987_local_params=$_750987_old_params['_dab4ca'];$_750987_local_vars=$_750987_old_vars['_dab4ca'];?>
};
            data.submit();
            upload_count++;
            $("#drop-zone").hide( 'slow' );
            $('.upload-cancel-button').hide( 'slow' );
        },
        done: function (e, data) {
            $('#clear-history-alert').hide();
            if (!data.result.files) {
                var error = data.result.message;
                $('#progress .progress-bar').css(
                    'width', 0
                );
                alert("<?php echo $this->function_trans($this->setup_args(['phrase'=>'An error occurred while uploading.','this_tag'=>'trans'],null,$this),$this)?>
"+' (' + error + ')');
                upload_count = 0;
                receive_count = 0;
                selected_ids = [];
                return;
            }
            $("input[name='id[]']").each(function(){
                if ( $(this).prop('checked') ) {
                    if( $.inArray($(this).val(), selected_ids ) == -1 ) {
                        selected_ids.push($(this).val());
                    }
                }
            });
            $.each(data.result.files, function (index, file) {
                // $('<p/>').text(file.name).appendTo('#files');
                var input_cb = $('#select_ids_tmpl');
                var new_input = input_cb.clone( true ).appendTo('#list-select-form');
                new_input.removeAttr('id');
                new_input.attr('name','id[]');
                new_input.val(file.asset_id);
                selected_ids.push(file.asset_id);
                receive_count++;
                //if ( upload_count == receive_count ) {
                setTimeout(uploaded_hdlr, 1000);
                //}
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
            $('#drop-zone').css('background-color','#fff');
            $("#drop-zone").show( 'slow' );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
function uploaded_hdlr () {
    this_url += '&selected_ids=' + selected_ids.join(',');
    <?php $_750987_old_params['_188b40']=$_750987_local_params;$_750987_old_vars['_188b40']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    $("#__mode").prop('value', 'insert_asset');
    $("#list-select-form").submit();
    <?php else:?>

    submit_params_to_post( this_url );
    <?php endif;$_750987_local_params=$_750987_old_params['_188b40'];$_750987_local_vars=$_750987_old_vars['_188b40'];?>

}
</script>
      <?php endif;$_750987_local_params=$_750987_old_params['_e584b9'];$_750987_local_vars=$_750987_old_vars['_e584b9'];?>

    <?php endif;$_750987_local_params=$_750987_old_params['_79ff51'];$_750987_local_vars=$_750987_old_vars['_79ff51'];?>

    <?php endif;$_750987_local_params=$_750987_old_params['_8e6978'];$_750987_local_vars=$_750987_old_vars['_8e6978'];?>

  <?php endif;$_750987_local_params=$_750987_old_params['_5a6a1c'];$_750987_local_vars=$_750987_old_vars['_5a6a1c'];?>

      <div class="row">
        <main class="pt-3 full <?php $_750987_old_params['_ca586c']=$_750987_local_params;$_750987_old_vars['_ca586c']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'list_screen','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 col-md-12<?php endif;$_750987_local_params=$_750987_old_params['_ca586c'];$_750987_local_vars=$_750987_old_vars['_ca586c'];?>
">
        <?php $_750987_old_params['_695a1e']=$_750987_local_params;$_750987_old_vars['_695a1e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'list_screen','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<div class="col-md-12 full"><?php endif;$_750987_local_params=$_750987_old_params['_695a1e'];$_750987_local_vars=$_750987_old_vars['_695a1e'];?>

          <h1 id="page-title" class="<?php $_750987_old_params['_c7f2e7']=$_750987_local_params;$_750987_old_vars['_c7f2e7']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'full_title','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
page-title-full<?php endif;$_750987_local_params=$_750987_old_params['_c7f2e7'];$_750987_local_vars=$_750987_old_vars['_c7f2e7'];?>
<?php $_750987_old_params['_c89f2d']=$_750987_local_params;$_750987_old_vars['_c89f2d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 title-with-opt<?php endif;$_750987_local_params=$_750987_old_params['_c89f2d'];$_750987_local_vars=$_750987_old_vars['_c89f2d'];?>
"><span class="title"><?php echo $this->function_var($this->setup_args(['name'=>'page_title','this_tag'=>'var'],null,$this),$this)?>
</span>
          <?php echo $this->function_var($this->setup_args(['name'=>'add_heading','this_tag'=>'var'],null,$this),$this)?>

    <?php $_750987_old_params['_70a428']=$_750987_local_params;$_750987_old_vars['_70a428']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_model','eq'=>'role','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_edc493']=$_750987_local_params;$_750987_old_vars['_edc493']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      
      <?php echo $this->function_setvar($this->setup_args(['name'=>'_hide_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'select_role','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

    <?php endif;$_750987_local_params=$_750987_old_params['_edc493'];$_750987_local_vars=$_750987_old_vars['_edc493'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_70a428'];$_750987_local_vars=$_750987_old_vars['_70a428'];?>

    <?php $_750987_old_params['_d75754']=$_750987_local_params;$_750987_old_vars['_d75754']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'select_role','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_993777']=$_750987_local_params;$_750987_old_vars['_993777']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_d43ac4']=$_750987_local_params;$_750987_old_vars['_d43ac4']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_750987_old_params['_fe58f1']=$_750987_local_params;$_750987_old_vars['_fe58f1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','eq'=>'view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php echo $this->function_setvar($this->setup_args(['name'=>'workspace_param','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

        <?php $_750987_old_params['_81762b']=$_750987_local_params;$_750987_old_vars['_81762b']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $c_1cca85=null;$_750987_old_params['_1cca85']=$_750987_local_params;$_750987_old_vars['_1cca85']=$_750987_local_vars;$a_1cca85=$this->setup_args(['name'=>'workspace_param','this_tag'=>'setvarblock'],null,$this);ob_start();?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php $c_1cca85=ob_get_clean();$c_1cca85=$this->block_setvarblock($a_1cca85,$c_1cca85,$this,$r_1cca85,1,'_1cca85');echo($c_1cca85); $_750987_local_params=$_750987_old_params['_1cca85'];?>

        <?php endif;$_750987_local_params=$_750987_old_params['_81762b'];$_750987_local_vars=$_750987_old_vars['_81762b'];?>

          <?php $_750987_old_params['_7918e1']=$_750987_local_params;$_750987_old_vars['_7918e1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_4170e3']=$_750987_local_params;$_750987_old_vars['_4170e3']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <?php $_750987_old_params['_a39b5f']=$_750987_local_params;$_750987_old_vars['_a39b5f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <?php $_750987_old_params['_a0fa9c']=$_750987_local_params;$_750987_old_vars['_a0fa9c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._start_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'_hide_filter','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

              <?php endif;$_750987_local_params=$_750987_old_params['_a0fa9c'];$_750987_local_vars=$_750987_old_vars['_a0fa9c'];?>

            <?php endif;$_750987_local_params=$_750987_old_params['_a39b5f'];$_750987_local_vars=$_750987_old_vars['_a39b5f'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_4170e3'];$_750987_local_vars=$_750987_old_vars['_4170e3'];?>

          <?php $_750987_old_params['_fb3840']=$_750987_local_params;$_750987_old_vars['_fb3840']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'error','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_b10ea7']=$_750987_local_params;$_750987_old_vars['_b10ea7']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'has_filter','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <button type="button" id="filter-button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#filterOptions">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Filters','this_tag'=>'trans'],null,$this),$this)?>

          </button>
          <?php endif;$_750987_local_params=$_750987_old_params['_b10ea7'];$_750987_local_vars=$_750987_old_vars['_b10ea7'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_fb3840'];$_750987_local_vars=$_750987_old_vars['_fb3840'];?>

          <?php $_750987_old_params['_1f8086']=$_750987_local_params;$_750987_old_vars['_1f8086']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'can_create','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_f7f6e3']=$_750987_local_params;$_750987_old_vars['_f7f6e3']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <a class="btn btn-primary btn-sm create-new-link" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_750987_old_params['_55578e']=$_750987_local_params;$_750987_old_vars['_55578e']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','ne'=>'workspace','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_750987_local_params=$_750987_old_params['_55578e'];$_750987_local_vars=$_750987_old_vars['_55578e'];?>
&amp;dialog_view=1<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php $_750987_old_params['_f38d00']=$_750987_local_params;$_750987_old_vars['_f38d00']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;target=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;get_col=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_750987_old_params['_dc3cf8']=$_750987_local_params;$_750987_old_vars['_dc3cf8']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;single_select=1<?php endif;$_750987_local_params=$_750987_old_params['_dc3cf8'];$_750987_local_vars=$_750987_old_vars['_dc3cf8'];?>
<?php $_750987_old_params['_09dc6f']=$_750987_local_params;$_750987_old_vars['_09dc6f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.selected_ids','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;selected_ids=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_09dc6f'];$_750987_local_vars=$_750987_old_vars['_09dc6f'];?>
<?php $_750987_old_params['_ce7e4b']=$_750987_local_params;$_750987_old_vars['_ce7e4b']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;select_add=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_add','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_ce7e4b'];$_750987_local_vars=$_750987_old_vars['_ce7e4b'];?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&amp;select_system_filters=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_system_filters_option=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_filter=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._filter','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;insert=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_f38d00'];$_750987_local_vars=$_750987_old_vars['_f38d00'];?>
<?php $_750987_old_params['_429944']=$_750987_local_params;$_750987_old_vars['_429944']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._system_filters_option','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_3f18a1']=$_750987_local_params;$_750987_old_vars['_3f18a1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'tag','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;tag_obj=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_3f18a1'];$_750987_local_vars=$_750987_old_vars['_3f18a1'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_429944'];$_750987_local_vars=$_750987_old_vars['_429944'];?>
<?php $_750987_old_params['_1588e5']=$_750987_local_params;$_750987_old_vars['_1588e5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;insert_editor=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert_editor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_1588e5'];$_750987_local_vars=$_750987_old_vars['_1588e5'];?>
">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'New %s','params'=>'$label','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
          <?php endif;$_750987_local_params=$_750987_old_params['_f7f6e3'];$_750987_local_vars=$_750987_old_vars['_f7f6e3'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_1f8086'];$_750987_local_vars=$_750987_old_vars['_1f8086'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_7918e1'];$_750987_local_vars=$_750987_old_vars['_7918e1'];?>

        <?php endif;$_750987_local_params=$_750987_old_params['_fe58f1'];$_750987_local_vars=$_750987_old_vars['_fe58f1'];?>

        <?php $_750987_old_params['_af88e3']=$_750987_local_params;$_750987_old_vars['_af88e3']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'edit','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_50e717']=$_750987_local_params;$_750987_old_vars['_50e717']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_system_filters','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $c_69a338=null;$_750987_old_params['_69a338']=$_750987_local_params;$_750987_old_vars['_69a338']=$_750987_local_vars;$a_69a338=$this->setup_args(['name'=>'filter_cond','this_tag'=>'setvarblock'],null,$this);ob_start();?>

&amp;select_system_filters=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

&amp;_system_filters_option=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

&amp;_filter=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

<?php $c_69a338=ob_get_clean();$c_69a338=$this->block_setvarblock($a_69a338,$c_69a338,$this,$r_69a338,1,'_69a338');echo($c_69a338); $_750987_local_params=$_750987_old_params['_69a338'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_50e717'];$_750987_local_vars=$_750987_old_vars['_50e717'];?>

          <a class="btn btn-sm" href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php echo $this->function_var($this->setup_args(['name'=>'workspace_param','this_tag'=>'var'],null,$this),$this)?>
&amp;dialog_view=1<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php $_750987_old_params['_fbc2a2']=$_750987_local_params;$_750987_old_vars['_fbc2a2']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.rev_object_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;single_select=1&amp;revision_select=1&amp;rev_object_id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.rev_object_id','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_fbc2a2'];$_750987_local_vars=$_750987_old_vars['_fbc2a2'];?>
<?php $_750987_old_params['_c8a092']=$_750987_local_params;$_750987_old_vars['_c8a092']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.target','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;target=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;get_col=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_750987_old_params['_c4e299']=$_750987_local_params;$_750987_old_vars['_c4e299']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;single_select=1<?php endif;$_750987_local_params=$_750987_old_params['_c4e299'];$_750987_local_vars=$_750987_old_vars['_c4e299'];?>
<?php $_750987_old_params['_f58183']=$_750987_local_params;$_750987_old_vars['_f58183']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.selected_ids','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;selected_ids=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.selected_ids','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_f58183'];$_750987_local_vars=$_750987_old_vars['_f58183'];?>
<?php $_750987_old_params['_a7ebc5']=$_750987_local_params;$_750987_old_vars['_a7ebc5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.select_add','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;select_add=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_add','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_a7ebc5'];$_750987_local_vars=$_750987_old_vars['_a7ebc5'];?>
<?php elseif($this->conditional_elseif($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'elseif'],null,$this),null,$this,true,true)):?>
&amp;select_system_filters=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.select_system_filters','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_system_filters_option=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._system_filters_option','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;_filter=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._filter','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;insert=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_c8a092'];$_750987_local_vars=$_750987_old_vars['_c8a092'];?>
<?php $_750987_old_params['_26c97c']=$_750987_local_params;$_750987_old_vars['_26c97c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.any_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;any_model=1<?php endif;$_750987_local_params=$_750987_old_params['_26c97c'];$_750987_local_vars=$_750987_old_vars['_26c97c'];?>
<?php $_750987_old_params['_a86859']=$_750987_local_params;$_750987_old_vars['_a86859']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.insert_editor','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;insert_editor=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.insert_editor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php endif;$_750987_local_params=$_750987_old_params['_a86859'];$_750987_local_vars=$_750987_old_vars['_a86859'];?>
&amp;_from_scope=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request._from_scope','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
            <i class="hidden fa fa-list" data-toggle="tooltip" data-placement="right" title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to Home','this_tag'=>'trans'],null,$this),$this)?>
"></i>
            <span class="shrink-button"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Return to List','this_tag'=>'trans'],null,$this),$this)?>
</span>
          </a>
        <?php endif;$_750987_local_params=$_750987_old_params['_af88e3'];$_750987_local_vars=$_750987_old_vars['_af88e3'];?>

        <?php $_750987_old_params['_3e2c3d']=$_750987_local_params;$_750987_old_vars['_3e2c3d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_ce9930']=$_750987_local_params;$_750987_old_vars['_ce9930']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'model','eq'=>'asset','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_89ace5']=$_750987_local_params;$_750987_old_vars['_89ace5']=$_750987_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'create','model'=>'asset','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#startUpload">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'Upload','this_tag'=>'trans'],null,$this),$this)?>

          </button>
          <?php endif;$_750987_local_params=$_750987_old_params['_89ace5'];$_750987_local_vars=$_750987_old_vars['_89ace5'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_ce9930'];$_750987_local_vars=$_750987_old_vars['_ce9930'];?>

        <?php endif;$_750987_local_params=$_750987_old_params['_3e2c3d'];$_750987_local_vars=$_750987_old_vars['_3e2c3d'];?>

      <?php endif;$_750987_local_params=$_750987_old_params['_d43ac4'];$_750987_local_vars=$_750987_old_vars['_d43ac4'];?>

      <?php endif;$_750987_local_params=$_750987_old_params['_993777'];$_750987_local_vars=$_750987_old_vars['_993777'];?>

    <?php endif;$_750987_local_params=$_750987_old_params['_d75754'];$_750987_local_vars=$_750987_old_vars['_d75754'];?>

          </h1>
    <?php $_750987_old_params['_9f2ed4']=$_750987_local_params;$_750987_old_vars['_9f2ed4']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request._type','eq'=>'list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_02d51a']=$_750987_local_params;$_750987_old_vars['_02d51a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_per_page','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_750987_old_params['_4586f8']=$_750987_local_params;$_750987_old_vars['_4586f8']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.revision_select','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php ob_start();$_750987_old_params['_a6524c']=$_750987_local_params;$_750987_old_vars['_a6524c']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['trim_space'=>'3','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <div class="text-right disp-option">
    <button type="button" class="btn btn-outline-primary btn-sm disp-option-button" data-toggle="modal" data-target="#dispOptions">
      <?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>

    </button>
    <button data-toggle="modal" data-target="#dispOptions" class="hidden btn btn-secondary alt-disp-option-button btn-sm" type="button">
    <i class="fa fa-television" aria-hidden="true"></i><span class="sr-only"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>
</span>
    </button>
  </div>
  <div class="modal fade" id="dispOptions" tabindex="-1" role="dialog" aria-labelledby="dispOptionsTitle" aria-hidden="true"
    style="width:100% !important;overflow:auto !important;-webkit-overflow-scrolling:touch !important;">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="dispOptionsTitle"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Display Options','this_tag'=>'trans'],null,$this),$this)?>
</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <form action="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
" method="POST">
        <input type="hidden" name="__mode" value="display_options">
        <input type="hidden" name="_model" value="<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
">
        <input type="hidden" name="_type" value="list">
        <input type="hidden" name="_reset" value="" id="_reset-disp-oprions">
        <input type="hidden" name="magic_token" value="<?php echo $this->function_var($this->setup_args(['name'=>'magic_token','this_tag'=>'var'],null,$this),$this)?>
">
      <?php $_750987_old_params['_17600a']=$_750987_local_params;$_750987_old_vars['_17600a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_id" value="<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
">
      <?php endif;$_750987_local_params=$_750987_old_params['_17600a'];$_750987_local_vars=$_750987_old_vars['_17600a'];?>

      <?php $_750987_old_params['_db5620']=$_750987_local_params;$_750987_old_vars['_db5620']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workspace_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workspace_select" value="1">
      <?php endif;$_750987_local_params=$_750987_old_params['_db5620'];$_750987_local_vars=$_750987_old_vars['_db5620'];?>

      <?php $_750987_old_params['_6a7c55']=$_750987_local_params;$_750987_old_vars['_6a7c55']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="dialog_view" value="1">
        <?php $_750987_old_params['_236312']=$_750987_local_params;$_750987_old_vars['_236312']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.ref_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="ref_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.ref_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <?php endif;$_750987_local_params=$_750987_old_params['_236312'];$_750987_local_vars=$_750987_old_vars['_236312'];?>

          <?php $_750987_old_params['_7725c7']=$_750987_local_params;$_750987_old_vars['_7725c7']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.single_select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="single_select" value="1">
          <?php endif;$_750987_local_params=$_750987_old_params['_7725c7'];$_750987_local_vars=$_750987_old_vars['_7725c7'];?>

        <input type="hidden" name="target" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="get_col" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.get_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php $_750987_old_params['_3f7d99']=$_750987_local_params;$_750987_old_vars['_3f7d99']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.workflow_model','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <input type="hidden" name="workflow_model" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
        <input type="hidden" name="workflow_type" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.workflow_type','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
">
      <?php endif;$_750987_local_params=$_750987_old_params['_3f7d99'];$_750987_local_vars=$_750987_old_vars['_3f7d99'];?>

      <?php endif;$_750987_local_params=$_750987_old_params['_6a7c55'];$_750987_local_vars=$_750987_old_vars['_6a7c55'];?>

        <input type="hidden" name="return_args" value="<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'filter_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'insert_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
<?php echo $this->modifier_strip_linefeeds($this->function_var($this->setup_args(['name'=>'selected_ids_cond','strip_linefeeds'=>'1','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','strip_linefeeds',$this),$this,'strip_linefeeds')?>
">
        <div class="modal-body">
          <div class="container-fluid">
          <?php $_750987_old_params['_dea630']=$_750987_local_params;$_750987_old_vars['_dea630']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

          <?php $_750987_old_params['_a52ca6']=$_750987_local_params;$_750987_old_vars['_a52ca6']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'request.manage_revision','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <?php $c_603b10=null;$_750987_old_params['_603b10']=$_750987_local_params;$_750987_old_vars['_603b10']=$_750987_local_vars;$a_603b10=$this->setup_args(['name'=>'disp_options','this_tag'=>'loop'],null,$this);$_603b10=-1;$r_603b10=true;while($r_603b10===true):$r_603b10=($_603b10!==-1)?false:true;echo $this->block_loop($a_603b10,$c_603b10,$this,$r_603b10,++$_603b10,'_603b10');ob_start();?>
<?php $c_603b10 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_603b10=false;}if($c_603b10 ):?>

            <?php $_750987_old_params['_35245a']=$_750987_local_params;$_750987_old_vars['_35245a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Columns','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
            <?php endif;$_750987_local_params=$_750987_old_params['_35245a'];$_750987_local_vars=$_750987_old_vars['_35245a'];?>

                <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'1','this_tag'=>'setvar'],null,$this),$this)?>

                <?php $_750987_old_params['_b85643']=$_750987_local_params;$_750987_old_vars['_b85643']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php $_750987_old_params['_37559c']=$_750987_local_params;$_750987_old_vars['_37559c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__key__','eq'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                    <?php echo $this->function_setvar($this->setup_args(['name'=>'__display','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

                  <?php endif;$_750987_local_params=$_750987_old_params['_37559c'];$_750987_local_vars=$_750987_old_vars['_37559c'];?>

                <?php endif;$_750987_local_params=$_750987_old_params['_b85643'];$_750987_local_vars=$_750987_old_vars['_b85643'];?>

                <?php $_750987_old_params['_ecec0b']=$_750987_local_params;$_750987_old_vars['_ecec0b']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__display','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[2]','setvar'=>'_type','this_tag'=>'var'],null,$this),$this),$this->setup_args('_type','setvar',$this),$this,'setvar')?>

                <label class="custom-control custom-checkbox 
                <?php $_750987_old_params['_fbaf52']=$_750987_local_params;$_750987_old_vars['_fbaf52']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_f87e4a']=$_750987_local_params;$_750987_old_vars['_f87e4a']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_checked','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_750987_local_params=$_750987_old_params['_f87e4a'];$_750987_local_vars=$_750987_old_vars['_f87e4a'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_fbaf52'];$_750987_local_vars=$_750987_old_vars['_fbaf52'];?>

                <?php $_750987_old_params['_193679']=$_750987_local_params;$_750987_old_vars['_193679']=$_750987_local_vars;if($this->conditional_ifinarray($this->setup_args(['name'=>'hide_list_options','value'=>'$__key__','this_tag'=>'ifinarray'],null,$this),null,$this,true,true)):?>
 hidden<?php endif;$_750987_local_params=$_750987_old_params['_193679'];$_750987_local_vars=$_750987_old_vars['_193679'];?>
">
                  <?php $_750987_old_params['_495ed9']=$_750987_local_params;$_750987_old_vars['_495ed9']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<input type="hidden" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1"><?php endif;$_750987_local_params=$_750987_old_params['_495ed9'];$_750987_local_vars=$_750987_old_vars['_495ed9'];?>

                  <input <?php $_750987_old_params['_43ae67']=$_750987_local_params;$_750987_old_vars['_43ae67']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
onclick="return false;"<?php endif;$_750987_local_params=$_750987_old_params['_43ae67'];$_750987_local_vars=$_750987_old_vars['_43ae67'];?>
 <?php $_750987_old_params['_8f9f02']=$_750987_local_params;$_750987_old_vars['_8f9f02']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'cant_hide_in_list','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_750987_local_params=$_750987_old_params['_8f9f02'];$_750987_local_vars=$_750987_old_vars['_8f9f02'];?>
<?php $_750987_old_params['_e1e2b7']=$_750987_local_params;$_750987_old_vars['_e1e2b7']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_type','eq'=>'primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_750987_local_params=$_750987_old_params['_e1e2b7'];$_750987_local_vars=$_750987_old_vars['_e1e2b7'];?>
<?php $_750987_old_params['_406b95']=$_750987_local_params;$_750987_old_vars['_406b95']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_no_primary','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php $_750987_old_params['_970e29']=$_750987_local_params;$_750987_old_vars['_970e29']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__counter__','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 disabled<?php endif;$_750987_local_params=$_750987_old_params['_970e29'];$_750987_local_vars=$_750987_old_vars['_970e29'];?>
<?php endif;$_750987_local_params=$_750987_old_params['_406b95'];$_750987_local_vars=$_750987_old_vars['_406b95'];?>
<?php $_750987_old_params['_e35e08']=$_750987_local_params;$_750987_old_vars['_e35e08']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_750987_local_params=$_750987_old_params['_e35e08'];$_750987_local_vars=$_750987_old_vars['_e35e08'];?>
 type="checkbox" class="custom-control-input disp-option-item" name="_d_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                  <span class="custom-control-indicator<?php $_750987_old_params['_ec43ec']=$_750987_local_params;$_750987_old_vars['_ec43ec']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_can_hide_list_col','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
 disabled-cb<?php endif;$_750987_local_params=$_750987_old_params['_ec43ec'];$_750987_local_vars=$_750987_old_vars['_ec43ec'];?>
"></span>
                  <span class="custom-control-description"> <?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                </label>
                <?php endif;$_750987_local_params=$_750987_old_params['_ecec0b'];$_750987_local_vars=$_750987_old_vars['_ecec0b'];?>

            <?php $_750987_old_params['_a00d45']=$_750987_local_params;$_750987_old_vars['_a00d45']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
            </div>
            <?php endif;$_750987_local_params=$_750987_old_params['_a00d45'];$_750987_local_vars=$_750987_old_vars['_a00d45'];?>

            <?php endif;$c_603b10=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_603b10'];$_750987_local_vars=$_750987_old_vars['_603b10'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_a52ca6'];$_750987_local_vars=$_750987_old_vars['_a52ca6'];?>

          <?php endif;$_750987_local_params=$_750987_old_params['_dea630'];$_750987_local_vars=$_750987_old_vars['_dea630'];?>

            <div class="row form-group">
              <div class="col-md-2"><label for="_per_page"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Paging','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <input id="_per_page" step="1" list="per_page_complete" type="number" min="1" max="5000" class="form-control form-control-sm very-short control-inline" name="_per_page" value="<?php echo $this->function_var($this->setup_args(['name'=>'_per_page','this_tag'=>'var'],null,$this),$this)?>
">
                <?php echo $this->function_trans($this->setup_args(['phrase'=>'Items per Page','this_tag'=>'trans'],null,$this),$this)?>

              </div>
            </div>
            <?php $_750987_old_params['_26d45c']=$_750987_local_params;$_750987_old_vars['_26d45c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'search_options','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <?php $c_8ff5bd=null;$_750987_old_params['_8ff5bd']=$_750987_local_params;$_750987_old_vars['_8ff5bd']=$_750987_local_vars;$a_8ff5bd=$this->setup_args(['name'=>'search_options','this_tag'=>'loop'],null,$this);$_8ff5bd=-1;$r_8ff5bd=true;while($r_8ff5bd===true):$r_8ff5bd=($_8ff5bd!==-1)?false:true;echo $this->block_loop($a_8ff5bd,$c_8ff5bd,$this,$r_8ff5bd,++$_8ff5bd,'_8ff5bd');ob_start();?>
<?php $c_8ff5bd = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_8ff5bd=false;}if($c_8ff5bd ):?>

                  <label class="custom-control custom-checkbox">
                    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                    <input<?php $_750987_old_params['_45b406']=$_750987_local_params;$_750987_old_vars['_45b406']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 checked<?php endif;$_750987_local_params=$_750987_old_params['_45b406'];$_750987_local_vars=$_750987_old_vars['_45b406'];?>
 type="checkbox" class="custom-control-input" name="_s_<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__key__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
" value="1">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"> <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[0]','setvar'=>'search_col','this_tag'=>'var'],null,$this),$this),$this->setup_args('search_col','setvar',$this),$this,'setvar')?>
<?php echo $this->function_trans($this->setup_args(['phrase'=>'$search_col','this_tag'=>'trans'],null,$this),$this)?>
</span>
                  </label>
                <?php endif;$c_8ff5bd=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_8ff5bd'];$_750987_local_vars=$_750987_old_vars['_8ff5bd'];?>

              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Search Type','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-5">
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_750987_old_params['_972934']=$_750987_local_params;$_750987_old_vars['_972934']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_search_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_972934'];$_750987_local_vars=$_750987_old_vars['_972934'];?>
<?php $_750987_old_params['_22eb38']=$_750987_local_params;$_750987_old_vars['_22eb38']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_22eb38'];$_750987_local_vars=$_750987_old_vars['_22eb38'];?>
 name="_user_search_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Phrase','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_750987_old_params['_497820']=$_750987_local_params;$_750987_old_vars['_497820']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'2','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_497820'];$_750987_local_vars=$_750987_old_vars['_497820'];?>
 name="_user_search_type" value="2">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'OR','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_750987_old_params['_d336ed']=$_750987_local_params;$_750987_old_vars['_d336ed']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_search_type','eq'=>'3','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_d336ed'];$_750987_local_vars=$_750987_old_vars['_d336ed'];?>
 name="_user_search_type" value="3">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'AND','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Keyword','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-3">
                <input type="hidden" name="_user_keep_search" value="0">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" <?php $_750987_old_params['_f9721a']=$_750987_local_params;$_750987_old_vars['_f9721a']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_user_keep_search','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_f9721a'];$_750987_local_vars=$_750987_old_vars['_f9721a'];?>
 class="custom-control-input" name="_user_keep_search" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"> <?php echo $this->function_trans($this->setup_args(['phrase'=>'Keep Keyword','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Replace','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-10">
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_750987_old_params['_277ed3']=$_750987_local_params;$_750987_old_vars['_277ed3']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'_replace_type','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_277ed3'];$_750987_local_vars=$_750987_old_vars['_277ed3'];?>
 name="_user_replace_type" value="0">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Insensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
                <label class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" <?php $_750987_old_params['_a8f608']=$_750987_local_params;$_750987_old_vars['_a8f608']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_replace_type','eq'=>'1','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_a8f608'];$_750987_local_vars=$_750987_old_vars['_a8f608'];?>
 name="_user_replace_type" value="1">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Case Sensitive','this_tag'=>'trans'],null,$this),$this)?>
</span>
                </label>
              </div>
            </div>
            <?php endif;$_750987_local_params=$_750987_old_params['_26d45c'];$_750987_local_vars=$_750987_old_vars['_26d45c'];?>

            <div class="row form-group">
              <?php $c_f6630e=null;$_750987_old_params['_f6630e']=$_750987_local_params;$_750987_old_vars['_f6630e']=$_750987_local_vars;$a_f6630e=$this->setup_args(['name'=>'sort_options','this_tag'=>'loop'],null,$this);$_f6630e=-1;$r_f6630e=true;while($r_f6630e===true):$r_f6630e=($_f6630e!==-1)?false:true;echo $this->block_loop($a_f6630e,$c_f6630e,$this,$r_f6630e,++$_f6630e,'_f6630e');ob_start();?>
<?php $c_f6630e = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_f6630e=false;}if($c_f6630e ):?>

              <?php $_750987_old_params['_ae2e89']=$_750987_local_params;$_750987_old_vars['_ae2e89']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__first__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              <div class="col-md-2"><b><?php echo $this->function_trans($this->setup_args(['phrase'=>'Sort','this_tag'=>'trans'],null,$this),$this)?>
</b></div>
              <div class="col-md-7">
              <?php endif;$_750987_local_params=$_750987_old_params['_ae2e89'];$_750987_local_vars=$_750987_old_vars['_ae2e89'];?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <label class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" <?php $_750987_old_params['_6a97b5']=$_750987_local_params;$_750987_old_vars['_6a97b5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
checked<?php endif;$_750987_local_params=$_750987_old_params['_6a97b5'];$_750987_local_vars=$_750987_old_vars['_6a97b5'];?>
 name="_user_sort_by" value="<?php echo $this->function_var($this->setup_args(['name'=>'__key__','this_tag'=>'var'],null,$this),$this)?>
">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</span>
                  </label>
              <?php $_750987_old_params['_95afc1']=$_750987_local_params;$_750987_old_vars['_95afc1']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'__last__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

              </div>
              <div class="col-md-3">
                <select name="_user_sort_order" class="form-control custom-select">
                  <?php $c_026973=null;$_750987_old_params['_026973']=$_750987_local_params;$_750987_old_vars['_026973']=$_750987_local_vars;$a_026973=$this->setup_args(['name'=>'order_options','this_tag'=>'loop'],null,$this);$_026973=-1;$r_026973=true;while($r_026973===true):$r_026973=($_026973!==-1)?false:true;echo $this->block_loop($a_026973,$c_026973,$this,$r_026973,++$_026973,'_026973');ob_start();?>
<?php $c_026973 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_026973=false;}if($c_026973 ):?>

                  <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'__value__[1]','setvar'=>'_checked','this_tag'=>'var'],null,$this),$this),$this->setup_args('_checked','setvar',$this),$this,'setvar')?>

                  <option value="<?php echo $this->function_var($this->setup_args(['name'=>'__counter__','this_tag'=>'var'],null,$this),$this)?>
"<?php $_750987_old_params['_255efb']=$_750987_local_params;$_750987_old_vars['_255efb']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_checked','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
 selected<?php endif;$_750987_local_params=$_750987_old_params['_255efb'];$_750987_local_vars=$_750987_old_vars['_255efb'];?>
><?php echo $this->function_var($this->setup_args(['name'=>'__value__[0]','this_tag'=>'var'],null,$this),$this)?>
</option>
                  <?php endif;$c_026973=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_026973'];$_750987_local_vars=$_750987_old_vars['_026973'];?>

                </select>
              </div>
              <?php endif;$_750987_local_params=$_750987_old_params['_95afc1'];$_750987_local_vars=$_750987_old_vars['_95afc1'];?>

              <?php endif;$c_f6630e=ob_get_clean();endwhile; $_750987_local_params=$_750987_old_params['_f6630e'];$_750987_local_vars=$_750987_old_vars['_f6630e'];?>

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="reset-disp-option" class="btn btn-warning"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Reset','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Cancel','this_tag'=>'trans'],null,$this),$this)?>
</button>
          <button type="submit" class="btn btn-primary"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Save Changes','this_tag'=>'trans'],null,$this),$this)?>
</button>
        </div>
      </form>
      </div>
    </div>
  </div>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'list_max_cols','setvar'=>'_list_max_cols','this_tag'=>'property'],null,$this),$this),$this->setup_args('_list_max_cols','setvar',$this),$this,'setvar')?>

<?php $_750987_old_params['_f4ec8d']=$_750987_local_params;$_750987_old_vars['_f4ec8d']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'dialog_max_cols','setvar'=>'_list_max_cols','this_tag'=>'property'],null,$this),$this),$this->setup_args('_list_max_cols','setvar',$this),$this,'setvar')?>

<?php endif;$_750987_local_params=$_750987_old_params['_f4ec8d'];$_750987_local_vars=$_750987_old_vars['_f4ec8d'];?>

<?php $_750987_old_params['_b4215c']=$_750987_local_params;$_750987_old_vars['_b4215c']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'_list_max_cols','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<script>
$('#reset-disp-option').click(function(){
    if (! confirm( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'Are you sure you want to reset display options?','this_tag'=>'trans'],null,$this),$this)?>
' ) ) {
        return false;
    }
    $('#_reset-disp-oprions').val(1);
});
$('.disp-option-item').change(function(){
    let checkdCnt = 0;
    $('.disp-option-item').each(function() {
        if ( $(this).prop( 'checked' ) ) {
            checkdCnt++;
        }
    });
    if ( <?php echo $this->function_var($this->setup_args(['name'=>'_list_max_cols','this_tag'=>'var'],null,$this),$this)?>
 < checkdCnt ) {
      <?php $_750987_old_params['_f54ac7']=$_750987_local_params;$_750987_old_vars['_f54ac7']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_view','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the dialog.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php else:?>

        alert( '<?php echo $this->function_trans($this->setup_args(['phrase'=>'More than %s columns are not reflected in the display.','params'=>'$_list_max_cols','this_tag'=>'trans'],null,$this),$this)?>
' );
      <?php endif;$_750987_local_params=$_750987_old_params['_f54ac7'];$_750987_local_vars=$_750987_old_vars['_f54ac7'];?>

    }
});
</script>
<?php endif;$_750987_local_params=$_750987_old_params['_b4215c'];$_750987_local_vars=$_750987_old_vars['_b4215c'];?>

<?php endif;$_a6524c=ob_get_clean();echo $this->modifier_trim_space($_a6524c,$this->setup_args('3','trim_space',$this),$this,'trim_space');$_750987_local_params=$_750987_old_params['_a6524c'];$_750987_local_vars=$_750987_old_vars['_a6524c'];?>

        <?php endif;$_750987_local_params=$_750987_old_params['_4586f8'];$_750987_local_vars=$_750987_old_vars['_4586f8'];?>

      <?php endif;$_750987_local_params=$_750987_old_params['_02d51a'];$_750987_local_vars=$_750987_old_vars['_02d51a'];?>

    <?php endif;$_750987_local_params=$_750987_old_params['_9f2ed4'];$_750987_local_vars=$_750987_old_vars['_9f2ed4'];?>

    <?php $c_da9742=null;$_750987_old_params['_da9742']=$_750987_local_params;$_750987_old_vars['_da9742']=$_750987_local_vars;$a_da9742=$this->setup_args(['name'=>'alert_close','this_tag'=>'setvarblock'],null,$this);ob_start();?>

      <button type="button" class="close" data-dismiss="alert" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
        <span aria-hidden="true">&times;</span>
      </button>
    <?php $c_da9742=ob_get_clean();$c_da9742=$this->block_setvarblock($a_da9742,$c_da9742,$this,$r_da9742,1,'_da9742');echo($c_da9742); $_750987_local_params=$_750987_old_params['_da9742'];?>

    <div class="alert alert-success hidden" id="header-alert" role="alert" tabindex="0">
      <button onclick="$('#header-alert').hide();" type="button" id="header-alert-close" class="close" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Close','this_tag'=>'trans'],null,$this),$this)?>
">
        <span aria-hidden="true">&times;</span>
      </button>
      <span id="header-alert-message"></span>
    </div>
    <?php $_750987_old_params['_eacc4b']=$_750987_local_params;$_750987_old_vars['_eacc4b']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'error','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <?php $_750987_old_params['_f4a3b5']=$_750987_local_params;$_750987_old_vars['_f4a3b5']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'this_mode','ne'=>'login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

      <div class="alert alert-danger" id="header-error-message" tabindex="0" role="alert">
        <?php echo paml_modifier_funcs('nl2br', paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'error','escape'=>'1','nl2br'=>'1','this_tag'=>'var'],null,$this),$this),ENT_QUOTES))?>

      </div>
      <script>
      $('#header-error-message').focus();
      </script>
      <?php echo $this->function_setvar($this->setup_args(['name'=>'error','value'=>'','this_tag'=>'setvar'],null,$this),$this)?>

      <?php endif;$_750987_local_params=$_750987_old_params['_f4a3b5'];$_750987_local_vars=$_750987_old_vars['_f4a3b5'];?>

    <?php endif;$_750987_local_params=$_750987_old_params['_eacc4b'];$_750987_local_vars=$_750987_old_vars['_eacc4b'];?>

<script>
$(function () {
    if (window.ontouchstart !== null) {
        $('[data-toggle="tooltip"]').tooltip();
    }
})
</script>
<?php $_750987_old_params['_37641f']=$_750987_local_params;$_750987_old_vars['_37641f']=$_750987_local_vars;if($this->conditional_if($this->setup_args(['name'=>'request.dialog_type','eq'=>'relation','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

<?php $_750987_old_params['_926f3d']=$_750987_local_params;$_750987_old_vars['_926f3d']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'insert_html','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $c_a9f976=null;$_750987_old_params['_a9f976']=$_750987_local_params;$_750987_old_vars['_a9f976']=$_750987_local_vars;$a_a9f976=$this->setup_args(['name'=>'insert_html','this_tag'=>'setvarblock'],null,$this);ob_start();?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'rel_col','value'=>'$primary_col','this_tag'=>'setvar'],null,$this),$this)?>

  <?php echo $this->modifier_setvar(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','setvar'=>'__col_name__','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('__col_name__','setvar',$this),$this,'setvar')?>

  <?php $c_5ab7cc=null;ob_start();$_750987_old_params['_5ab7cc']=$_750987_local_params;$_750987_old_vars['_5ab7cc']=$_750987_local_vars;$a_5ab7cc=$this->setup_args(['setvartemplate'=>'nestable_obj_list','index'=>'1','name'=>'nestable_obj_list','this_tag'=>'literal'],null,$this);$_5ab7cc=-1;$r_5ab7cc=true;while($r_5ab7cc===true):$r_5ab7cc=($_5ab7cc!==-1)?false:true;echo $this->block_literal($a_5ab7cc,$c_5ab7cc,$this,$r_5ab7cc,++$_5ab7cc,'_5ab7cc');ob_start();?>
<?php $c_5ab7cc = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_5ab7cc=false;}if($c_5ab7cc ):?>
<?php endif;$c_5ab7cc=ob_get_clean();endwhile;$c_5ab7cc=ob_get_clean();echo($this->modifier_setvartemplate($c_5ab7cc,$this->setup_args('nestable_obj_list','setvartemplate',$this),$this,'setvartemplate')); $_750987_local_params=$_750987_old_params['_5ab7cc'];$_750987_local_vars=$_750987_old_vars['_5ab7cc'];?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'_parent_id','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

  <?php echo $this->function_var($this->setup_args(['name'=>'nestable_obj_list','this_tag'=>'var'],null,$this),$this)?>

  <?php $c_a9f976=ob_get_clean();$c_a9f976=$this->block_setvarblock($a_a9f976,$c_a9f976,$this,$r_a9f976,1,'_a9f976');echo($c_a9f976); $_750987_local_params=$_750987_old_params['_a9f976'];?>

<?php endif;$_750987_local_params=$_750987_old_params['_926f3d'];$_750987_local_vars=$_750987_old_vars['_926f3d'];?>

<script>
    var parent_list = window.parent.$('#nestableobjects-list-<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
');
    var parent_primary = window.parent.$('#<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
_primary_id').val();
    var selected_items = [];
    parent_list.find('input').each(function(index, element){
        if ( element.getAttribute('checked') !== null ) {
            selected_items.push( element.getAttribute('id') );
        }
    });
    var insert_html = "<?php echo $this->modifier_escape($this->modifier_eval($this->function_var($this->setup_args(['name'=>'insert_html','eval'=>'1','escape'=>'js','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','eval',$this),$this,'eval'),$this->setup_args('js','escape',$this),$this,'escape')?>
";
    window.parent.$('#nestable_list-<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
').html( insert_html );
    var parent_primary_btn = window.parent.$('#<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
_id_' + parent_primary );
    if ( parent_primary_btn.length ) {
        parent_primary_btn.css('color', '#00a');
        let primary_icon = parent_primary_btn.children('i');
        primary_icon.removeClass( 'fa-check' );
        primary_icon.addClass( 'fa-star' );
        primary_icon.css('color', '#00a');
        primary_icon.css('font-size', '100%');
        primary_icon.css('margin-right', '0px');
        let primary_span = parent_primary_btn.children('span');
        primary_span.css('color', '#000');
        primary_span.html('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Specified','this_tag'=>'trans'],null,$this),$this)?>
');
    }
    var i = 0;
    $.each(selected_items, function() {
        let selected_cb = window.parent.$('#' + this );
        if ( selected_cb.length ) {
            if ( i == 0 && ! parent_primary_btn.length ) {
                let item_id = this.replace( /^<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
_cb_/, '' );
                parent_primary_btn = window.parent.$('#<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
_id_' + item_id );
                if ( parent_primary_btn.length ) {
                    parent_primary_btn.css('color', '#00a');
                    let primary_icon = parent_primary_btn.children('i');
                    primary_icon.removeClass( 'fa-check' );
                    primary_icon.addClass( 'fa-star' );
                    primary_icon.css('color', '#00a');
                    primary_icon.css('font-size', '100%');
                    primary_icon.css('margin-right', '0px');
                    let primary_span = parent_primary_btn.children('span');
                    primary_span.css('color', '#000');
                    primary_span.html('<?php echo $this->function_trans($this->setup_args(['phrase'=>'Specified','this_tag'=>'trans'],null,$this),$this)?>
');
                    window.parent.$('#<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
_primary_id').val( item_id );
                }
            }
            selected_cb.attr( 'checked', 'checked' );
            i++;
        }
    });
    window.parent.$('#modal').modal('hide');
    window.location.href = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=loading';
</script>
<?php else:?>

<?php $_750987_old_params['_b9a9f8']=$_750987_local_params;$_750987_old_vars['_b9a9f8']=$_750987_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'insert_html','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>

  <?php $c_515d32=null;$_750987_old_params['_515d32']=$_750987_local_params;$_750987_old_vars['_515d32']=$_750987_local_vars;$a_515d32=$this->setup_args(['name'=>'insert_html','this_tag'=>'setvarblock'],null,$this);ob_start();?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'rel_col','value'=>'$primary_col','this_tag'=>'setvar'],null,$this),$this)?>

  <?php echo $this->modifier_setvar(paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'request.target','escape'=>'','setvar'=>'__col_name__','this_tag'=>'var'],null,$this),$this),ENT_QUOTES),$this->setup_args('__col_name__','setvar',$this),$this,'setvar')?>

  <?php $c_e2ce5b=null;ob_start();$_750987_old_params['_e2ce5b']=$_750987_local_params;$_750987_old_vars['_e2ce5b']=$_750987_local_vars;$a_e2ce5b=$this->setup_args(['setvartemplate'=>'nestable_obj_list','index'=>'2','name'=>'nestable_obj_list','this_tag'=>'literal'],null,$this);$_e2ce5b=-1;$r_e2ce5b=true;while($r_e2ce5b===true):$r_e2ce5b=($_e2ce5b!==-1)?false:true;echo $this->block_literal($a_e2ce5b,$c_e2ce5b,$this,$r_e2ce5b,++$_e2ce5b,'_e2ce5b');ob_start();?>
<?php $c_e2ce5b = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_e2ce5b=false;}if($c_e2ce5b ):?>
<?php endif;$c_e2ce5b=ob_get_clean();endwhile;$c_e2ce5b=ob_get_clean();echo($this->modifier_setvartemplate($c_e2ce5b,$this->setup_args('nestable_obj_list','setvartemplate',$this),$this,'setvartemplate')); $_750987_local_params=$_750987_old_params['_e2ce5b'];$_750987_local_vars=$_750987_old_vars['_e2ce5b'];?>

  <?php echo $this->function_setvar($this->setup_args(['name'=>'_parent_id','value'=>'0','this_tag'=>'setvar'],null,$this),$this)?>

  <?php echo $this->function_var($this->setup_args(['name'=>'nestable_obj_list','this_tag'=>'var'],null,$this),$this)?>

  <?php $c_515d32=ob_get_clean();$c_515d32=$this->block_setvarblock($a_515d32,$c_515d32,$this,$r_515d32,1,'_515d32');echo($c_515d32); $_750987_local_params=$_750987_old_params['_515d32'];?>

<?php endif;$_750987_local_params=$_750987_old_params['_b9a9f8'];$_750987_local_vars=$_750987_old_vars['_b9a9f8'];?>

<script>
    var selected_id = window.parent.$('input:radio[name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
"]:checked').val();
    var insert_html = "<?php echo $this->modifier_escape($this->modifier_eval($this->function_var($this->setup_args(['name'=>'insert_html','eval'=>'1','escape'=>'js','this_tag'=>'var'],null,$this),$this),$this->setup_args('1','eval',$this),$this,'eval'),$this->setup_args('js','escape',$this),$this,'escape')?>
";
    window.parent.$('#nestable_list-<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
').html( insert_html );
    if ( selected_id ) {
        window.parent.$('input:radio[name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
"]').val([ selected_id ]);
    }
    window.parent.$('#modal').modal('hide');
    window.location.href = '<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=loading';
</script>
<?php endif;$_750987_local_params=$_750987_old_params['_37641f'];$_750987_local_vars=$_750987_old_vars['_37641f'];?>

<?php endif;$_750987_local_params=$_750987_old_params['_174977'];$_750987_local_vars=$_750987_old_vars['_174977'];?>




<?php $this->literal_vars=$literal_old__750987_?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\hierarchy.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\dialog_header.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\footer.tmpl' => 1718664344,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\dialog_footer.tmpl' => 1718664344,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\header.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\list_options.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\start_upload.tmpl' => 1694708530,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\list_filters.tmpl' => 1718664344,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit_options.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\richtext.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\richtext4.tmpl' => 1718664276,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744076062,
);?>