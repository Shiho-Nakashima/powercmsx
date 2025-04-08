# QuickEditプラグイン

<style>
#quick-edit-link-view{ color:<mt:var name="bartextcolor">;width:37px; height:27px; background-color:<mt:var name="barcolor">}
#quick-edit-link{ color:<mt:var name="bartextcolor">;width:37px; height:27px; background-color:<mt:var name="barcolor">}
#quick-edit-profile{ color:<mt:var name="bartextcolor">;width:37px; height:27px; background-color:<mt:var name="barcolor">}
</style>

## 概要

公開ページから編集画面へのクイック編集リンク用ブックマークレットを提供します。

## 利用方法

プラグインを有効化し、画面右上の「プロフィール」 <a id="quick-edit-profile" href="<mt:var name="script_uri">?__mode=view&amp;_type=edit&amp;_model=user&amp;id=<mt:var name="user_id">" class="btn btn-sm" data-toggle="tooltip" data-placement="left" title="<mt:trans phrase="Profile">"><i class="fa fa-user-circle" aria-hidden="true"></i><span class="sr-only"><mt:trans phrase="Profile"></span></a> &nbsp; をクリックして「ユーザーの編集」画面へ遷移します。  

画面右上に「クイック編集」<a id="quick-edit-link" href="javascript:window.document.location.href='<mt:var name="script_uri">?__mode=go_to_edit_screen&permalink='+encodeURIComponent(document.location.href);" class="btn btn-sm" data-toggle="tooltip" data-placement="left" title="<mt:trans phrase="Quick Edit" component="QuickEdit">"><i class="fa fa-pencil" aria-hidden="true"></i><span class="sr-only"><mt:trans phrase="Quick Edit" component="QuickEdit"></span></a> 「クイック編集(ビュー)」<a id="quick-edit-link-view" href="javascript:window.document.location.href='<mt:var name="script_uri">?__mode=go_to_edit_screen&type=view&permalink='+encodeURIComponent(document.location.href);" class="btn btn-sm" data-toggle="tooltip" data-placement="left" title="<mt:trans phrase="Quick Edit(View)" component="QuickEdit">"><i class="fa fa-code" aria-hidden="true"></i><span class="sr-only"><mt:trans phrase="Quick Edit(View)" component="QuickEdit"></span></a> が表示されます。  

ブラウザのブックマークバーにボタンをドロップしてブックマークに登録します\(ブックマークレットの登録方法はブラウザによって異なります\)。  

公開されているページをブラウザで開いている状態で、ブックマークレットをクリックします。そのオブジェクトの編集画面またはその画面のビューの編集画面に遷移します。
