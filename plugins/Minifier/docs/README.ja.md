# Minifierプラグイン

## 概要

HTML, JavaScript, CSSコードを圧縮します。

## 有効化

- システムのプラグインの管理画面で、Minifier にチェックを入れて有効化します。

## 利用方法

### 環境変数

- minifier\_preview : コード全体の圧縮の設定がある時プレビューでもコード圧縮をする場合に指定します。初期値は「false」です。
- minifier\_use\_smarty : ver\.1\.2 から、これまでの Smartyのフィルタから TinyHtmlMinifierに利用ライブラリが変更になりました。従来との互換性を保つときに「true」としてください。初期値は「false」です。
- minifier\_use\_jshrink : ver\.1\.3 から、JavaScriptの圧縮に JShrinkを利用するようになりました。従来との互換性を保つときに「false」としてください。初期値は「true」です。

### コード全体の圧縮

スコープごとのプラグイン設定でパブリッシュ時に行う圧縮対象を設定できます。

- 静的ページを自動的にMinifyする : 静的ページパブリッシュ時にコード全体に圧縮をかけます。
- 動的ページを自動的にMinifyする : 動的ページパブリッシュ時にコード全体に圧縮をかけます。
- HTML, JavaScript, CSS : それぞれチェックをいれたものを圧縮対象にします。JavaScript, CSSにチェックのある時、HTML中の JavaScript, CSSもコード圧縮されます。

### テンプレート・タグによるコード圧縮

以下の3つのブロックタグが利用可能になります。ビューの中のコードを圧縮したい部分をブロックで囲ってください。

- mt:jsminifier \(JavaScriptコードの圧縮\)
- mt:cssminifier \(CSSコードの圧縮\)
- mt:htmlminifier \(HTMLコードの圧縮\)

例 :

    <mt:jsminifier>
      <script>
        JavaScriptコード
      </script>
    </mt:jsminifier>
    <mt:cssminifier>
      <style>
        CSSコード
      </style>
    </mt:cssminifier>
    <mt:htmlminifier>
      HTMLコード
    </mt:htmlminifier>