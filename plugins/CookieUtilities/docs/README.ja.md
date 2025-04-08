# CookieUtilities プラグイン

## 概要

HTTP Cookie を活用するためのテンプレート・タグを提供します。ダイナミック・パブリッシングでのみ利用可能です。

<h2 id="conditional_tags" class="mt-4">条件タグ</h2>
<table class="table table-striped">
<thead class="thead-dark">
<tr>
<th scope="col" style="width:25%">タグ</th>
<th scope="col" style="width:40%">説明</th>
<th scope="col" style="width:35%">タグ属性</th>
</tr>
</thead>
<tr class="ifcookie">
<td style="width:25%">
&lt;mt:ifcookie&gt; ~ &lt;/mt:ifcookie&gt;
</td>
<td style="width:40%">
  指定したクッキーに値がある時、ブロックを評価します。
</td>
<td style="width:35%">
<ul class="mb-0">
<li><i>name</i> : クッキー名</li>
<li><i>key</i> : 指定した変数に取得したクッキーの値をセットする(初期値は'cookie_val')</li>
<li><i>(note)</i> : mt:ifタグの比較用のタグ属性を利用可能</li>
</ul>
</td>
</tr>
</table>
<h2 id="function_tags" class="mt-4">ファンクションタグ</h2>
<table class="table table-striped">
<thead class="thead-dark">
<tr>
<th scope="col" style="width:25%">タグ</th>
<th scope="col" style="width:40%">説明</th>
<th scope="col" style="width:35%">タグ属性</th>
</tr>
</thead>
<tr class="clearallcookies">
<td style="width:25%">
&lt;mt:clearallcookies /&gt;
</td>
<td style="width:40%">
  すべてのクッキーを削除します。
</td>
<td style="width:35%">
<ul class="mb-0">
<li><i>reload</i> : クッキーをクリアした後でページをリロードする</li>
</ul>
</td>
</tr>
<tr class="clearcookie">
<td style="width:25%">
&lt;mt:clearcookie /&gt;
</td>
<td style="width:40%">
  指定したクッキーを削除します。
</td>
<td style="width:35%">
<ul class="mb-0">
<li><i>name</i> : クッキー名</li>
<li><i>reload</i> : クッキーをクリアした後でページをリロードする</li>
</ul>
</td>
</tr>
<tr class="getcookie">
<td style="width:25%">
&lt;mt:getcookie /&gt;
</td>
<td style="width:40%">
  指定した名前のクッキーを取得します。
</td>
<td style="width:35%">
<ul class="mb-0">
<li><i>name</i> : クッキー名</li>
</ul>
</td>
</tr>
<tr class="getenv">
<td style="width:25%">
&lt;mt:getenv /&gt;
</td>
<td style="width:40%">
  指定した名前のサーバー環境変数(スーパーグローバル変数の値)を取得します。
</td>
<td style="width:35%">
<ul class="mb-0">
<li><i>name</i> : 取得する変数名</li>
<li><i>kind</i> : 'SERVER', 'COOKIE', 'ENV', 'REQUEST', 'POST', 'GET' または 'SESSION'</li>
</ul>
</td>
</tr>
<tr class="setcookie">
<td style="width:25%">
&lt;mt:setcookie /&gt;
</td>
<td style="width:40%">
  クッキーに値をセットします。httpsでのアクセス時、セキュアフラグは自動的に付与されます。
</td>
<td style="width:35%">
<ul class="mb-0">
<li><i>name</i> : クッキー名</li>
<li><i>value</i> : クッキーの値</li>
<li><i>path</i> : サーバー上でのクッキーを有効とするパス(初期値は'/')</li>
<li><i>expires</i> : クッキーの有効期限秒(初期値は'86400' *環境変数'sess_timeout'の値)</li>
<li><i>httponly</i> : セットしたクッキーの値には HTTPを通してのみアクセスできるようになります(JapaScript等からはアクセスできません)。</li>
<li><i>reload</i> : クッキーをセットした後でページをリロードする</li>
</ul>
</td>
</tr>
</table>
