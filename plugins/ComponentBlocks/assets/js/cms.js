/*
 * CMS本体から移植したコード集（テンプレートに記載されていて再利用できないもの）
 */
export const setRelationAsset = async (data) => {
  const target_control = 'assets';

  if (!window.jQuery) {
    return;
  }

  // 以下insert_asset.tmplからほぼほぼそのまま移植
  data.forEach((asset) => {
    if ($(`#${target_control} li div[data-id="${asset.id}"]`).length === 0) {
      $('#'+target_control+'-none').hide();
      var _li = $('#'+target_control+'-tmpl');
      var newli = _li.clone( true ).appendTo('#'+target_control );
      newli.removeClass('hidden');
      var col_value = asset.label;
      var obj_permalink = asset.permalink;
      newli.children('.asset-download-btn').attr( 'href', obj_permalink );
      var fInfo = obj_permalink.split('.');
      var fileExtension = fInfo[fInfo.length-1].toLowerCase();
      var extensionsInline = ['csv', 'xls', 'xlsx', 'doc', 'docx', 'ppt', 'pptx'];
      if (extensionsInline.indexOf(fileExtension) < 0){
        newli.children('.asset-download-btn').attr('target', '_blank');
        newli.children('.asset-download-btn').children('i').removeClass('fa-download');
        newli.children('.asset-download-btn').children('i').addClass('fa-external-link-square');
        newli.children('.asset-download-btn').attr('aria-label', componentBlocksSettings.phrases.view);
      }
      newli.children('.insert-file-id').attr('value',asset.id);
      newli.children('.insert-file-name').attr('value',col_value);
      newli.children('.insert-file-name').attr('id','_' + target_control + '_label_' + asset.id);
      newli.children('span').attr('id', '_' + target_control + '_name_' + asset.id);
      if (asset.canEdit) {
        newli.children('.label_edit_btn').attr('data-name','_' + target_control + '_label_' + asset.id);
        newli.children('.label_edit_btn').attr('data-label', col_value );
        var dataHref = newli.children('.relation-editor').attr('data-href');
        dataHref = dataHref.replace( /&id=[^0-9]*&/, '&id=' + asset.id + '&' );
        newli.children('.relation-editor').attr('data-href', dataHref);
      } else {
        newli.find('.relation-editor').hide();
      }
      newli.children('span').html( col_value );
      newli.removeAttr('id');
      newli.addClass( target_control+'-child');
      newli.children('.assets-child-thumb').attr('data-id',asset.id).css('background-image', `url('${componentBlocksSettings.scriptUri}?__mode=get_thumbnail&square=1&_model=asset&id=${asset.id}')`);
      newli.children('.assets-child-thumb').show();
      newli.show();
    }
  });
};
