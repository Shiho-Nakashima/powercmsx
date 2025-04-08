# Abs2Rel プラグイン

## 概要

出力する HTML ファイル内のリンク ( href, src, action ) をそのファイルを起点とした相対パスに変換します。

## 有効化

- プラグイン「Abs2Rel」の設定ダイアログにある「静的コンテンツ」チェックボックス、「動的コンテンツ」チェックボックスにチェックを入れます。
- スコープ\( システムまたはスペース \)毎に `有効` / `無効` を切り替えることが可能です。

---

## 相対パスへ変換する条件

下記条件を満たす場合に相対パスへの変換が行われます。

1. __ファイルの拡張子__
    - ファイルの拡張子がマッチする時
2. __HTML 属性__
    - `href`
    - `src`
    - `action`
3. __HTML 属性値__
    - 対象ファイルの URL と同じドメインの URL
    - ドキュメント相対パス ( / 始まりのパス )
4. __プラグイン設定の「除外設定」にあてはまらない__
    - ディレクトリ
    - リンク URL

## 変換例

<div class="table-responsive">
  <table class="table table-striped table-bordered text-nowrap">
    <thead>
      <tr>
        <th>ファイル URL</th>
        <th>変換前</th>
        <th>変換後(ルート相対パス)</th>
        <th>変換後(相対パス)</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>http://example.jp/index.html</td>
        <td><code>&lt;a href="http://example.jp/dir/file.html"&gt;</code></td>
        <td><code>&lt;a href="/dir/file.html"&gt;</code></td>
        <td><code>&lt;a href="./dir/file.html"&gt;</code></td>
      </tr>
      <tr>
        <td>http://example.jp/index.html</td>
        <td><code>&lt;a href="/dir/file.html"&gt;</code></td>
        <td><code>&lt;a href="/dir/file.html"&gt;</code></td>
        <td><code>&lt;a href="./dir/file.html"&gt;</code></td>
      </tr>
      <tr>
        <td>http://example.jp/dir/file.html</td>
        <td><code>&lt;a href="http://example.jp/index.html"&gt;</code></td>
        <td><code>&lt;a href="/index.html"&gt;</code></td>
        <td><code>&lt;a href="./../index.html"&gt;</code></td>
      </tr>
      <tr>
        <td>http://example.jp/dir/file.html</td>
        <td><code>&lt;a href="/index.html"&gt;</code></td>
        <td><code>&lt;a href="/index.html"&gt;</code></td>
        <td><code>&lt;a href="./../index.html"&gt;</code></td>
      </tr>
      <tr>
        <td>http://example.jp/dir/file.html</td>
        <td><code>&lt;a href="http://example.jp/dir/file.html"&gt;</code></td>
        <td><code>&lt;a href="/dir/file.html"&gt;</code></td>
        <td><code>&lt;a href="./file.html"&gt;</code></td>
      </tr>
    </tbody>
  </table>
</div>

---

## 環境変数

<dl>
  <dt>abs2rel_preview</dt>
  <dd>true を指定するとプレビュー時にパスを変換します(初期値 false)。</dd>
  <dt>abs2rel_caching</dt>
  <dd>true を指定すると変換結果をキャッシュします(初期値 false)。プラグイン設定を保存するとキャッシュはクリアされます。</dd>
</dl>

---

## プラグイン設定

<dl>
  <dt>静的コンテンツ</dt>
  <dd>静的コンテンツに対して処理を行います。</dd>
  <dt>動的コンテンツ</dt>
  <dd>動的コンテンツに対して処理を行います。</dd>
</dl>
<dl>
  <dt>システム設定を利用する</dt>
  <dd>
    システムのプラグイン設定の値を利用します。
  </dd>
  <dd>
    * ワークスペース毎のプラグイン設定にのみ表示されます。<br>
    *「静的コンテンツ」「動的コンテンツ」はワークスペース毎の設定値が利用されます。
  </dd>
</dl>

## 設定

<dl>
  <dt>ファイルの拡張子</dt>
  <dd>
    変換処理の対象とするファイルの拡張子を指定できます。<br>
  </dd>
  <dd>
    例 ) <code>html,php</code>
  </dd>
  <dd>
    * カンマ区切りで複数の拡張子を指定できます。
  </dd>
</dl>

<dl>
  <dt>パス変換の種類</dt>
  <dd>
    <value>ルート相対パス</value> もしくは <value>相対パス</value> を選択出来ます。
  </dd>
  <dd>
    * ルート相対パスとは <code>/</code> から始まるパスです。
  </dd>
</dl>

<dl>
  <dt>補完するファイル名</dt>
  <dd>
    <code>/</code> で終わるリンクに補完するファイル名を指定します。
  </dd>
  <dd>
    例 ) <code>index.html</code>
  </dd>
</dl>

## 除外設定

<dl>
  <dt>BASE要素を変換しない</dt>
  <dd>
    &lt;base href=&quot;...&quot;&gt; 内については変換処理を行いません。
  </dd>
</dl>
<dl>
  <dt>SCRIPT要素内を無視する</dt>
  <dd>
    &lt;script&gt;〜&lt;/script&gt; 内については変換処理を行いません。
  </dd>
</dl>
<dl>
  <dt>HTMLコメント内を無視する</dt>
  <dd>
    &lt;!--〜--&gt; 内については変換処理を行いません。
  </dd>
</dl>
<dl>
  <dt>ディレクトリ</dt>
  <dd>
    変換処理の対象外とするディレクトリを指定できます。<br>
    ディレクトリはドキュメントルートを基準 ( <code>/</code> 始まりのパス ) で指定します。
  </dd>
  <dd>
    例 ) <code>/path/to/target/dir/</code>
  </dd>
  <dd>
    * 改行区切りで複数のディレクトリを指定できます。
  </dd>
</dl>
<dl>
  <dt>リンク URL</dt>
  <dd>
    変換処理の対象外とするリンク URL を指定できます。
  </dd>
  <dd>
    例 ) <code>http://example.jp/dir/file.html</code>
  </dd>
  <dd>
    * <span class="text-danger">変換対象となるファイル URL ではなく、HTML 内のリンクテキストの除外設定です。</span><br>
    * 後方一致でマッチさせます。<br>
    * 改行区切りで複数の リンク URL を指定できます。
  </dd>
</dl>

---

## テンプレート・タグ

### グローバル・モディファイア

#### abs2relconvert

URL を相対パスに変換します。

<div class="table-responsive">
  <table class="table table-striped table-bordered text-nowrap">
    <thead>
      <tr>
        <th>属性値</th>
        <th>説明</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><code>relative_path</code></td>
        <td>相対パスに変換</td>
      </tr>
      <tr>
        <td><code>root_relative_path</code></td>
        <td>ルート相対パスに変換</td>
      </tr>
      <tr>
        <td>省略</td>
        <td>プラグイン設定値を参照</td>
      </tr>
    </tbody>
  </table>
</div>
