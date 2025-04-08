# ImageInfoプラグイン

## 概要

画像とPDFに関する様々な情報を取得してアクセシビリティを検証します。

### 設定

- Microsoft Azure の Computer Vision と Translator のサブスクリプション・キーが必要です。サブスクリプション・キーとエンドポイントについての情報をシステムプラグイン設定に保存する必要があります。
- サーバーOSごとにプラグインディレクトリ配下の helper/Linux\(Mac/Windows\)配下のプログラムを利用します。実行可能なパーミッションを設定してください。
- SVGの検証には PHP拡張モジュール「imagick」が必要です。
- PDFの検証には Poppler メタデータの設定には ExifTool のインストールが必要です。
- PDFの読み上げ検証については、SimplifiedJapaneseプラグインを有効化して AWSのアカウントを取得して、Amazon Pollyを利用できるように設定してください。

### 外部コマンド・ライブラリの入手先

- Poppler : <a href="https://poppler.freedesktop.org/" target="_blank">https://poppler.freedesktop.org/ <i class="fa fa-external-link" aria-hidden="true"></i></a>
- ExifTool : <a href="https://exiftool.org/" target="_blank">https://exiftool.org/ <i class="fa fa-external-link" aria-hidden="true"></i></a>
- AWS SDK for PHP : <a href="https://github.com/aws/aws-sdk-php" target="_blank">https://github.com/aws/aws-sdk-php <i class="fa fa-external-link" aria-hidden="true"></i></a>
- FFmpeg : <a href="https://www.ffmpeg.org/" target="_blank">https://www.ffmpeg.org/ <i class="fa fa-external-link" aria-hidden="true"></i></a>

### 環境変数と初期値

        "imageinfo_ocr_sleep" : 3,
        "imageinfo_ocr_retry" : 100,
        "imageinfo_set_asset_label" : true,
        "imageinfo_check_contrast" : true,
        "imageinfo_img_autocheck": true,
        "imageinfo_pdf_autocheck" : false,
        "imageinfo_html_autocheck": false,
        "imageinfo_cache_expires" : 7200,
        "imageinfo_pt_to_px" : 2,
        "imageinfo_inspection_background": 0,
        "imageinfo_pdfinfo_path" : "", (pdfinfoのパス)
        "imageinfo_exiftool_path" : "", (ExifToolのパス)
        "simplifiedjapanese_ffmpeg_path" : "", (FFmpegのパス)

- imageinfo\_ocr\_sleep : Computer VisionでOCRによるテキスト抽出を行う時、処理中の時にリトライするまでの休止時間を秒で指定します。
- imageinfo\_ocr\_retry : Computer VisionでOCRによるテキスト抽出を行う時、処理中の時にリトライする回数を指定します。
- imageinfo\_set\_asset\_label  : アセットのファイルを編集した時、代替テキスト欄に加えてラベルをセットするかどうかを指定します。
- imageinfo\_check\_contrast : 画像のコントラストと種別を自動判別する時に指定します。
- imageinfo\_img\_autocheck : アセットに画像ファイルをアップロードした時に自動試験を行います。
- imageinfo\_pdf\_autocheck : アセットにPDFファイルをアップロードした時に自動試験を行います。
- imageinfo\_html\_autocheck : アセットにHTMLファイルを\(ステータス「公開」で\)アップロードした時に自動試験を行います。プラグイン「AxeRunner」が必要です。
- imageinfo\_cache\_expires : アップロード直後のセッションに対する検査結果のキャッシュの有効期限を秒で指定します。
- imageinfo\_pt\_to\_px : 「mt:pdfthumbnail」タグでサムネイルを生成する時、pointをpixcelに変換してそのザイズで画像を作成します。
- imageinfo\_inspection\_background : 一覧画面からの検証時に設定した数値を超えるアセットを選択している時、バックグラウンドで検証を行います。
- imageinfo\_pdfinfo\_path : Poppler をインストール後の pdfinfoコマンドのパスを指定します。
- imageinfo\_exiftool\_path : ExifTool をインストール後の exiftoolコマンドのパスを指定します。

※ imageinfo\_assets\_base は、プラグインを powercmsx/plugins以外の場所に設置する時、ImageInfo/assets へのルート相対パスまたはURLを指定します。

### エディタへの画像挿入時に代替テキストを AIで作成する

画像挿入画面の代替テキスト欄の横に 2つのボタンが表示されます。
<button data-toggle="tooltip" data-placement="bottom" title="<mt:trans phrase="Analyze the image" component="ImageInfo">" type="button" class="btn btn-sm get-image-info-btn" data-asset-id="<mt:var name="id">">
<i class="fa fa-info-circle" aria-hidden="true"></i>
<mt:trans phrase="Analyze the image" component="ImageInfo">
</button>
<button data-toggle="tooltip" data-placement="bottom" title="<mt:trans phrase="Extract text from an image" component="ImageInfo">" type="button" class="btn btn-sm get-image-text-btn" data-asset-id="<mt:var name="id">">
<i class="fa fa-font" aria-hidden="true"></i>
<mt:trans phrase="Extract text from an image" component="ImageInfo">
</button>
「画像を解析する」ボタンをクリックすると Computer Vision によって画像を解析してその画像に何が写っているかを「画像からテキストを抽出する」をクリックすると、OCRで画像を解析して画像に含まれているテキストを抽出して代替テキスト欄にセットします。

### バイナリカラムの「情報\.\.\.」ボタンで画像の情報を表示する

<button type="button" class="btn btn-info"><mt:trans phrase="Info..." component="ImageInfo"></button> ボタンをクリックすると、画像に関する情報を表示します。
画像が検証済みの場合、このボタンの横に
<i class="fa fa-certificate" style="color:#089" aria-hidden="true" title="<mt:trans phrase="Verified This Image" component="ImageInfo">">
<span class="sr-only"><mt:trans phrase="Verified This Image" component="ImageInfo"></span>
</i>
アイコンが表示されます。

- ファイルのサイズ
- 幅
- 高さ
- MIME Type
- 種別 : 写真か\(テキストなどを含む\)グラフィックか\(自動判別\)
- 前景色\(自動判別\)
- 背景色\(自動判別\)
- コントラスト比\(自動判別\)
- コントラスト比の JIS X 8341-3 適合状況

※ 自動判別された値は正しくない場合があります。種別についてはラジオボタンで、色については各々の色をクリックして OSのカラーピッカーで選択し直すことが可能です。  
※ 代替テキスト欄の横に 2つのボタンが表示されます。画像の挿入時と同じく <button data-toggle="tooltip" data-placement="bottom" title="<mt:trans phrase="Analyze the image" component="ImageInfo">" type="button" class="btn btn-sm get-image-info-btn" data-asset-id="<mt:var name="id">">
<i class="fa fa-info-circle" aria-hidden="true"></i>
<mt:trans phrase="Analyze the image" component="ImageInfo">
</button>
<button data-toggle="tooltip" data-placement="bottom" title="<mt:trans phrase="Extract text from an image" component="ImageInfo">" type="button" class="btn btn-sm get-image-text-btn" data-asset-id="<mt:var name="id">">
<i class="fa fa-font" aria-hidden="true"></i>
<mt:trans phrase="Extract text from an image" component="ImageInfo">
</button>
「画像を解析する」ボタンをクリックすると Computer Vision によって画像を解析してその画像に何が写っているかを「画像からテキストを抽出する」をクリックすると、OCRで画像を解析して画像に含まれているテキストを抽出して代替テキスト欄にセットします。

### バイナリカラムの「情報\.\.\.」ボタンでPDFの情報を表示する

<button type="button" class="btn btn-info"><mt:trans phrase="Info..." component="ImageInfo"></button> ボタンをクリックすると、PDFに関する情報を表示します。
PDFが検証済みの場合、このボタンの横に
<i class="fa fa-certificate" style="color:#089" aria-hidden="true" title="<mt:trans phrase="Verified This Image" component="ImageInfo">">
<span class="sr-only"><mt:trans phrase="Verified This Image" component="ImageInfo"></span>
</i>
アイコンが表示されます。

- 1ページ目のプレビュー
- ファイルのサイズ
- 用紙サイズ
- ページ数
- 画像を含むかどうか
- タグ付けがされているかどうか
- 暗号化されているかどうか
- テキストが抽出できたかどうか
- PDFバージョン
- 作成ソフト
- タイトル
- サブタイトル
- キーワード
- 作成者
- 抽出テキスト \(読み上げ検証\)
- アウトライン \(見出しの構造\)
- 前景色\(自動判別\)
- 背景色\(自動判別\)
- コントラスト比\(自動判別\)
- コントラスト比の JIS X 8341-3 適合状況
- Acrobatアクセシビリティレポート\(添付されている場合\)

※ このうち「タイトル」「サブタイトル」「キーワード」「作成者」は編集して上書き保存が可能です。  
※ 自動判別された値は正しくない場合があります。色については1ページ目から判別します。各々の色をクリックして OSのカラーピッカーで選択し直すことが可能です。  
※ 読み上げ検証については Acrobatや実際のスクリーンリーダーの読み上げ結果と異なることがあります。

### 検証結果を保存する

画像の検証が完了したら「この画像は検証済みです」にチェックを入れて「保存」をクリックしてください。結果が保存されます。

### PDFのサムネイル作成

ファンクション・タグ : mt:pdfthumbnail

PDFのサムネイルを生成してその URLを出力します。サイズを省略した時は PDFのサイズと同サイズの画像を作成します※。  

※ pointをpixcelに変換してそのザイズで画像を作成します。変換時の係数は環境変数「imageinfo\_pt\_to\_px」\(初期値 : 2\)で指定します。

#### 指定できるタグ属性  

- width : 生成するサムネイルの幅
- height : 生成するサムネイルの高さ
- square : 1をセットすると正方形のサムネイルを生成
- scale : 拡大・縮小のパーセンテージ

※ Microsoft および Azure は、米国 Microsoft Corporation の、米国およびその他の国における登録商標です。  
※ AWS、Amazon Polly は、米国および/またはその他の諸国における、Amazon.com, Inc. またはその関連会社の商標です。  
※ Adobe、Acrobatは、Adobe Systems. Incorporated \(アドビシステムズ社\) の商標です。