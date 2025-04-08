# Text2OgImageプラグイン

## 概要

テキストからog:imageを生成してアセットに登録します。

### 必要な外部コマンド・ライブラリ

- wkhtmltoimage \(wkhtmltopdfと一緒にインストールされます\)

### 外部コマンド・ライブラリの入手先

- wkhtmltoimage : <a href="https://wkhtmltopdf.org/" target="_blank">https://wkhtmltopdf.org/ <i class="fa fa-external-link" aria-hidden="true"></i></a>

### 環境変数と初期値

        "simplifiedjapanese_wkhtmltoimage_path" : "/usr/local/bin/wkhtmltoimage",
        "text2ogimage_model": "urlinfo",
        "text2ogimage_realtime": false,
        "text2ogimage_at_preview": true,
        "text2ogimage_fonts": "Noto Sans JP,M PLUS Rounded 1c,BIZ UDPGothic,Noto Serif JP,Kaisei Opti,RocknRoll One"

- simplifiedjapanese\_wkhtmltoimage\_path : wkhtmltoimage のパス
- text2ogimage\_model : 画像を保存するモデル\(urlinfoまたはasset\)
- text2ogimage\_realtime : ビューがビルドされる時にバックグラウンドではなくリアルタイムに画像を生成するか\(trueとした場合、再構築に時間がかかりようになります\)
- text2ogimage\_at\_preview : プレビュー時にキャッシュを生成します\(あらかじめプレビューを行っておくことで再構築などの処理を高速化できます\)
- text2ogimage\_fonts : プラグイン設定で選択可能なキャプションのフォント\(カンマ区切り\)

※ simplifiedjapanese\_wkhtmltoimage\_path はプラグイン「SimplifiedJapanese」の設定と共通です。

### プラグイン設定

- システム設定を利用する : スペースでのみ表示されます。システムの設定を継承します。
- 背景画像のパス : og:imageの背景画像のパスを指定します。
- 画質 \(%\) : 1〜100の数値で画質を指定します。
- ベースネーム : 画像のファイル名のベースネームを指定します。初期値は「&lt;mt:var name=&quot;model&quot;&gt;-&lt;mt:var name=&quot;id&quot;&gt;\-og\_image」で、記事IDが1の場合「entry\-1\-og\_image\.png」のようなファイル名となります。
- 文字色 : 文字の色を指定します。
- 背景色 : 背景画像の背景色を指定します。
- フォント : 文字のフォントを指定します。サーバーにフォントがインストールされている必要がありますが、デフォルトでは Google Webフォントを利用して「Noto Sans JP」が既定値となっています。
- padding\-left \(%\) : 左余白を指定します。
- padding\-right \(%\) : 右余白を指定します。
- font\-size \(%\) : フォントサイズを指定します。
- text\-align : テキストを左寄せ、中央揃え、右寄せのいずれかにするかを選択します。
- 拡張子 : 生成する画像の拡張子を指定します。デフォルトは「png」です。

## ファンクション・タグ

    <mt:text2ogimage text="$text" furigana="1|2|3">

og:imageを作成して、その URLを出力します。画像は非同期にバックグラウンドで生成されるため、実際に画像が出力されるタイミングにはタイムラグがあります。

### 指定できるタグ属性

- text : 画像化するテキストを指定します。
- furigana : '1'を指定するとふりがなを追加 '2'を指定すると分かち書きしたテキストにふりがなを追加 '3'を指定するとふりがなを追加せずに分かち書きのみを適用します。

## エディタへのボタンの追加

プラグイン「TinyMCE」を有効化して、プラグイン設定のツールバーに「pt\-ogimage」を追加してください。選択範囲のテキストから画像を生成します。

※ Google Fonts は Google LLC の商標です。