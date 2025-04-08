# TaxonomyUtilsプラグイン

## 概要

情報分類モデルの機能を拡張します。

- 一覧画面にシステムフィルタ「情報分類でフィルタ」「情報分類でフィルタ\(部分一致\)」を追加します。
- 一覧画面にアクション「情報分類を追加」「情報分類を削除」を追加します。
- 「情報分類」一覧画面にアクション「正規化」を追加します。
- 情報分類がリレーションで設定されているモデルのオブジェクトをマージしてループ出力するブロックタグ「mt:taxonomyobjects」を追加します。
- 「mt:taxonomies」タグにタグ属性「has_child」を追加します。カンマ区切りのテキストまたはモデル名の配列を指定して\(省略した場合はすべてのモデルが対象\)関連付けのあるもののみをフィルタします。
- 条件タグ「mt:iftaxonomyhaschild」を追加します。情報分類に関連づいているオブジェクトがある場合に値を出力します。
- ファンクションタグ「mt:taxonomychildcount」を追加します。情報分類に関連づいているオブジェクトの数を出力します。

<mt:ifcomponent component="MTMLReference">

<hr class="mt-4">
### タグリファレンス

- <a target="_blank" href="<mt:var name="script_uri">?__mode=mtml_reference&query=mt%3Ataxonomies">&lt;mt:taxonomies&gt;〜&lt;/mt:taxonomies&gt; &nbsp; <i class="fa fa-external-link" aria-hidden="true" aria-label="<mt:trans phrase="Open in new window">"></i></a>
- <a target="_blank" href="<mt:var name="script_uri">?__mode=mtml_reference&query=mt%3Ataxonomyobjects">&lt;mt:taxonomyobjects&gt;〜&lt;/mt:taxonomyobjects&gt; &nbsp; <i class="fa fa-external-link" aria-hidden="true" aria-label="<mt:trans phrase="Open in new window">"></i></a>
- <a target="_blank" href="<mt:var name="script_uri">?__mode=mtml_reference&query=mt%3Aiftaxonomyhaschild">&lt;mt:iftaxonomyhaschild&gt;〜&lt;/mt:iftaxonomyhaschild&gt; &nbsp; <i class="fa fa-external-link" aria-hidden="true" aria-label="<mt:trans phrase="Open in new window">"></i></a>
- <a target="_blank" href="<mt:var name="script_uri">?__mode=mtml_reference&query=mt%3Ataxonomychildcount">&lt;mt:taxonomychildcount&gt; &nbsp; <i class="fa fa-external-link" aria-hidden="true" aria-label="<mt:trans phrase="Open in new window">"></i></a>
</mt:ifcomponent>