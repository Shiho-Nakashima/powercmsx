<?php ob_start();?><?php $_63d9f8_vars=&$this->vars;$_63d9f8_old_params=&$this->old_params;$_63d9f8_local_params=&$this->local_params;$_63d9f8_old_vars=&$this->old_vars;$_63d9f8_local_vars=&$this->local_vars;?><div class="row form-group">
  <div class="col-lg-2">
    <label for="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
      <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'label','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>

      <?php $_63d9f8_old_params['_7394b9']=$_63d9f8_local_params;$_63d9f8_old_vars['_7394b9']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'not_null','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_var($this->setup_args(['name'=>'field_required','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_7394b9'];$_63d9f8_local_vars=$_63d9f8_old_vars['_7394b9'];?>

    </label>
  </div>
  <div class="col-lg-<?php $_63d9f8_old_params['_d3ba69']=$_63d9f8_local_params;$_63d9f8_old_vars['_d3ba69']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','like'=>'select','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
3<?php else:?>
10<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_d3ba69'];$_63d9f8_local_vars=$_63d9f8_old_vars['_d3ba69'];?>
">
    <?php $_63d9f8_old_params['_c56e1b']=$_63d9f8_local_params;$_63d9f8_old_vars['_c56e1b']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','like'=>'reference','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

    <?php echo paml_htmlspecialchars($this->component('PTTags')->hdlr_getobjectname($this->setup_args(['id'=>'$value','type'=>'$edit','escape'=>'','this_tag'=>'getobjectname'],null,$this),$this),ENT_QUOTES)?>

    <input type="hidden" id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" value="<?php echo $this->function_var($this->setup_args(['name'=>'value','this_tag'=>'var'],null,$this),$this)?>
">
    <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_c56e1b'];$_63d9f8_local_vars=$_63d9f8_old_vars['_c56e1b'];?>

    <?php echo $this->modifier_setvar($this->modifier_split($this->function_var($this->setup_args(['name'=>'edit','split'=>':','setvar'=>'edit_props','this_tag'=>'var'],null,$this),$this),$this->setup_args(':','split',$this),$this,'split'),$this->setup_args('edit_props','setvar',$this),$this,'setvar')?>

    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'edit_props[1]','setvar'=>'rel_model','this_tag'=>'var'],null,$this),$this),$this->setup_args('rel_model','setvar',$this),$this,'setvar')?>

    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'edit_props[2]','setvar'=>'rel_col','this_tag'=>'var'],null,$this),$this),$this->setup_args('rel_col','setvar',$this),$this,'setvar')?>

    <?php echo $this->modifier_setvar($this->function_var($this->setup_args(['name'=>'edit_props[3]','setvar'=>'rel_type','this_tag'=>'var'],null,$this),$this),$this->setup_args('rel_type','setvar',$this),$this,'setvar')?>

      <?php $_63d9f8_old_params['_138a00']=$_63d9f8_local_params;$_63d9f8_old_vars['_138a00']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'edit','like'=>'dialog','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

        <?php $_63d9f8_old_params['_554f0b']=$_63d9f8_local_params;$_63d9f8_old_vars['_554f0b']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'type','eq'=>'relation','this_tag'=>'if'],null,$this),null,$this,true,true)):?>

          <?php $c_8fc540=null;$_63d9f8_old_params['_8fc540']=$_63d9f8_local_params;$_63d9f8_old_vars['_8fc540']=$_63d9f8_local_vars;$a_8fc540=$this->setup_args(['name'=>'__rel_name__','this_tag'=>'setvarblock'],null,$this);ob_start();?>
object_<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
<?php $c_8fc540=ob_get_clean();$c_8fc540=$this->block_setvarblock($a_8fc540,$c_8fc540,$this,$r_8fc540,1,'_8fc540');echo($c_8fc540); $_63d9f8_local_params=$_63d9f8_old_params['_8fc540'];?>

          <ul id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" class="group-relation-list">
            <li <?php $_63d9f8_old_params['_40de08']=$_63d9f8_local_params;$_63d9f8_old_vars['_40de08']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'$__rel_name__','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
style="display:none" <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_40de08'];$_63d9f8_local_vars=$_63d9f8_old_vars['_40de08'];?>
class="card" id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
-none">
            <?php echo $this->function_trans($this->setup_args(['phrase'=>'(None selected)','this_tag'=>'trans'],null,$this),$this)?>

            </li>
            <li class="hidden card card-inverse group-item badge-draggable" id="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
-tmpl">
            <span><?php echo $this->function_trans($this->setup_args(['phrase'=>'Default','this_tag'=>'trans'],null,$this),$this)?>
</span>
            <button type="button" class="_<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
-edit hidden btn mr-5 pr-4 pl-2 badge-wide btn-secondary btn-sm relation-editor" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Edit','this_tag'=>'trans'],null,$this),$this)?>
"
                data-toggle="modal" data-target="#modal"
                data-href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'rel_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;id=__value__<?php $_63d9f8_old_params['_0d463e']=$_63d9f8_local_params;$_63d9f8_old_vars['_0d463e']=$_63d9f8_local_vars;if($this->component('PTTags')->hdlr_ifworkspacemodel($this->setup_args(['model'=>'$rel_model','this_tag'=>'ifworkspacemodel'],null,$this),null,$this,true,true)):?>
<?php $_63d9f8_old_params['_3d6687']=$_63d9f8_local_params;$_63d9f8_old_vars['_3d6687']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_3d6687'];$_63d9f8_local_vars=$_63d9f8_old_vars['_3d6687'];?>
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_0d463e'];$_63d9f8_local_vars=$_63d9f8_old_vars['_0d463e'];?>
&amp;dialog_view=1&amp;target=<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
&amp;get_col=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'rel_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;select_add=1&amp;direct_edit=1&amp;ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
">
              <i class="fa fa-pencil"></i>
            </button>
            <button type="button" class="btn btn-secondary btn-sm close-sm detach-relation" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
" data-name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
              <span aria-hidden="true">&times;</span>
            </button>
            <input type="hidden" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
[]" value="">
            </li>
          <?php $c_62a794=null;$_63d9f8_old_params['_62a794']=$_63d9f8_local_params;$_63d9f8_old_vars['_62a794']=$_63d9f8_local_vars;$a_62a794=$this->setup_args(['name'=>'selected_ids','this_tag'=>'setvarblock'],null,$this);ob_start();?>
<?php $c_8a4c06=null;$_63d9f8_old_params['_8a4c06']=$_63d9f8_local_params;$_63d9f8_old_vars['_8a4c06']=$_63d9f8_local_vars;$a_8a4c06=$this->setup_args(['name'=>'$__rel_name__','glue'=>',','this_tag'=>'loop'],null,$this);$_8a4c06=-1;$r_8a4c06=true;while($r_8a4c06===true):$r_8a4c06=($_8a4c06!==-1)?false:true;echo $this->block_loop($a_8a4c06,$c_8a4c06,$this,$r_8a4c06,++$_8a4c06,'_8a4c06');ob_start();?>
<?php $c_8a4c06 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_8a4c06=false;}if($c_8a4c06 ):?>
<?php echo $this->function_var($this->setup_args(['name'=>'__value__','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$c_8a4c06=ob_get_clean();endwhile; $_63d9f8_local_params=$_63d9f8_old_params['_8a4c06'];$_63d9f8_local_vars=$_63d9f8_old_vars['_8a4c06'];?>
<?php $c_62a794=ob_get_clean();$c_62a794=$this->block_setvarblock($a_62a794,$c_62a794,$this,$r_62a794,1,'_62a794');echo($c_62a794); $_63d9f8_local_params=$_63d9f8_old_params['_62a794'];?>

          <?php $c_f1e920=null;$_63d9f8_old_params['_f1e920']=$_63d9f8_local_params;$_63d9f8_old_vars['_f1e920']=$_63d9f8_local_vars;$a_f1e920=$this->setup_args(['name'=>'$__rel_name__','this_tag'=>'loop'],null,$this);$_f1e920=-1;$r_f1e920=true;while($r_f1e920===true):$r_f1e920=($_f1e920!==-1)?false:true;echo $this->block_loop($a_f1e920,$c_f1e920,$this,$r_f1e920,++$_f1e920,'_f1e920');ob_start();?>
<?php $c_f1e920 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_f1e920=false;}if($c_f1e920 ):?>

            <li class="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
-child card card-inverse group-item badge-draggable">
            <span>
              <?php echo $this->modifier_setvar(paml_htmlspecialchars($this->component('PTTags')->hdlr_getobjectname($this->setup_args(['id'=>'$__value__','type'=>'$edit','escape'=>'','setvar'=>'_related_object','this_tag'=>'getobjectname'],null,$this),$this),ENT_QUOTES),$this->setup_args('_related_object','setvar',$this),$this,'setvar')?>

              <?php echo $this->component('PTTags')->filter_trans($this->function_var($this->setup_args(['name'=>'_related_object','trans'=>'$translate','this_tag'=>'var'],null,$this),$this),$this->setup_args('$translate','trans',$this),$this,'trans')?>

            </span>
            <?php $_63d9f8_old_params['_3b56bb']=$_63d9f8_local_params;$_63d9f8_old_vars['_3b56bb']=$_63d9f8_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['action'=>'edit','model'=>'$rel_model','id'=>'$__value__','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

              <button type="button" class="_<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
-edit btn mr-5 pr-4 pl-2 badge-wide btn-secondary btn-sm relation-editor" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Edit','this_tag'=>'trans'],null,$this),$this)?>
"
                  data-toggle="modal" data-target="#modal"
                  data-href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'rel_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;id=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_63d9f8_old_params['_ddfb48']=$_63d9f8_local_params;$_63d9f8_old_vars['_ddfb48']=$_63d9f8_local_vars;if($this->component('PTTags')->hdlr_ifworkspacemodel($this->setup_args(['model'=>'$rel_model','this_tag'=>'ifworkspacemodel'],null,$this),null,$this,true,true)):?>
<?php $_63d9f8_old_params['_bcd307']=$_63d9f8_local_params;$_63d9f8_old_vars['_bcd307']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_bcd307'];$_63d9f8_local_vars=$_63d9f8_old_vars['_bcd307'];?>
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_ddfb48'];$_63d9f8_local_vars=$_63d9f8_old_vars['_ddfb48'];?>
&amp;dialog_view=1&amp;target=<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
&amp;get_col=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'rel_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;select_add=1&amp;direct_edit=1&amp;ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
">
                <i class="fa fa-pencil"></i>
              </button>
            <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_3b56bb'];$_63d9f8_local_vars=$_63d9f8_old_vars['_3b56bb'];?>

            <button type="button" class="btn btn-secondary btn-sm close-sm detach-relation" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'Detach','this_tag'=>'trans'],null,$this),$this)?>
" data-name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
">
              <span aria-hidden="true">&times;</span>
            </button>
            <input type="hidden" name="<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
[]" value="<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'__value__','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
"></li>
          <?php endif;$c_f1e920=ob_get_clean();endwhile; $_63d9f8_local_params=$_63d9f8_old_params['_f1e920'];$_63d9f8_local_vars=$_63d9f8_old_vars['_f1e920'];?>

          </ul>
          <button style="margin-left:0px" type="button" id="add_<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
" class="btn btn-primary btn-sm dialog-chooser" data-toggle="modal" data-target="#modal"
            data-href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=list&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'rel_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_63d9f8_old_params['_fd94f0']=$_63d9f8_local_params;$_63d9f8_old_vars['_fd94f0']=$_63d9f8_local_vars;if($this->component('PTTags')->hdlr_ifworkspacemodel($this->setup_args(['model'=>'$rel_model','this_tag'=>'ifworkspacemodel'],null,$this),null,$this,true,true)):?>
<?php $_63d9f8_old_params['_5890d9']=$_63d9f8_local_params;$_63d9f8_old_vars['_5890d9']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php else:?>
&amp;_filter=question&amp;select_system_filters=system_objects<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_5890d9'];$_63d9f8_local_vars=$_63d9f8_old_vars['_5890d9'];?>
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_fd94f0'];$_63d9f8_local_vars=$_63d9f8_old_vars['_fd94f0'];?>
&amp;dialog_view=1&amp;target=<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
&amp;get_col=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'rel_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;select_add=1&amp;ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
"><?php echo $this->function_trans($this->setup_args(['phrase'=>'Select...','this_tag'=>'trans'],null,$this),$this)?>
</button>
      <?php $_63d9f8_old_params['_8710f1']=$_63d9f8_local_params;$_63d9f8_old_vars['_8710f1']=$_63d9f8_local_vars;if($this->component('PTTags')->hdlr_ifusercan($this->setup_args(['model'=>'$rel_model','action'=>'create','workspace_id'=>'$workspace_id','this_tag'=>'ifusercan'],null,$this),null,$this,true,true)):?>

        <button title="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New...','this_tag'=>'trans'],null,$this),$this)?>
" type="button" class="ml-0 btn btn-info btn-sm" aria-label="<?php echo $this->function_trans($this->setup_args(['phrase'=>'New...','this_tag'=>'trans'],null,$this),$this)?>
"
            data-toggle="modal" data-target="#modal"
            data-href="<?php echo $this->function_var($this->setup_args(['name'=>'script_uri','this_tag'=>'var'],null,$this),$this)?>
?__mode=view&amp;_type=edit&amp;_model=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'rel_model','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
<?php $_63d9f8_old_params['_c95625']=$_63d9f8_local_params;$_63d9f8_old_vars['_c95625']=$_63d9f8_local_vars;if($this->component('PTTags')->hdlr_ifworkspacemodel($this->setup_args(['model'=>'$rel_model','this_tag'=>'ifworkspacemodel'],null,$this),null,$this,true,true)):?>
<?php $_63d9f8_old_params['_ee6099']=$_63d9f8_local_params;$_63d9f8_old_vars['_ee6099']=$_63d9f8_local_vars;if($this->conditional_if($this->setup_args(['name'=>'workspace_id','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
&amp;workspace_id=<?php echo $this->function_var($this->setup_args(['name'=>'workspace_id','this_tag'=>'var'],null,$this),$this)?>
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_ee6099'];$_63d9f8_local_vars=$_63d9f8_old_vars['_ee6099'];?>
<?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_c95625'];$_63d9f8_local_vars=$_63d9f8_old_vars['_c95625'];?>
&amp;dialog_view=1&amp;target=<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
&amp;get_col=<?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'rel_col','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
&amp;select_add=1&amp;direct_edit=1&amp;ref_model=<?php echo $this->function_var($this->setup_args(['name'=>'model','this_tag'=>'var'],null,$this),$this)?>
">
          <i class="fa fa-plus-circle"></i>
        </button>
      <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_8710f1'];$_63d9f8_local_vars=$_63d9f8_old_vars['_8710f1'];?>

          <script>
            var <?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
_add_objects = [];
            $('#<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
').sortable ( {
                stop: function( evt, ui ) {
                    editContentChanged = true;
                }
            });
            $("#<?php echo $this->function_var($this->setup_args(['name'=>'__col_name__','this_tag'=>'var'],null,$this),$this)?>
").ksortable();
          </script>
        <?php else:?>

        <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_554f0b'];$_63d9f8_local_vars=$_63d9f8_old_vars['_554f0b'];?>

      <?php endif;$_63d9f8_local_params=$_63d9f8_old_params['_138a00'];$_63d9f8_local_vars=$_63d9f8_old_vars['_138a00'];?>

    <?php echo $this->function_var($this->setup_args(['name'=>'_hint','this_tag'=>'var'],null,$this),$this)?>

  </div>
</div><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\edit.tmpl' => 1738110796,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\entry\\column_title.tmpl' => 1718664276,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\primary_permalink.tmpl' => 1697132444,
    'C:\\xampp\\htdocs\\PowerCMSX\\tmpl\\include\\edit\\entry\\column_text.tmpl' => 1738110796,
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1743988263,
);?>