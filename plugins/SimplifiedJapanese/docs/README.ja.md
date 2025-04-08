# SimplifiedJapaneseプラグイン

## 概要

やさしい日本語の作成を支援します。

- 管理画面でやさしい日本語化、ふりがなの追加、分かち書きを行う機能を提供します。
- ふりがな用のカスタム辞書を作成できます。
- オリジナルのテキストと変換後のテキストの語彙の難易度を可視化します。
- リッチテキストエディタに、やさしい日本語化、ふりがな、ルビの編集ボタンを追加できるようになります。
- ふりがな付きHTMLのエクスポート、画像化、PDF化、Microsoft Word、MP3形式のファイルエクスポートが行えます※。

※ Wordへのエクスポートでは、段落、改行、ふりがな以外の書式\(画像など\)は失われます。  
※ MP3形式のファイルエクスポートを行うためには、AWSのアカウントを取得して、Amazon Pollyを利用できるようにしてください。

- <a href="https://aws.amazon.com/jp/polly/" target="_blank">https://aws.amazon.com/jp/polly/ <i class="fa fa-external-link" aria-hidden="true"></i></a>

### 必要な外部コマンド・ライブラリ

- MeCab と MeCab用の辞書 \(IPA 辞書等\) 
- mecab\-dict\-indexコマンド \(MeCabと一緒にインストールされます)
- wkhtmltopdf
- wkhtmltoimage \(wkhtmltopdfと一緒にインストールされます)
- PHPOffice/ PHPWord
- AWS SDK for PHP
- FFmpeg

### 外部コマンド・ライブラリの入手先

- MeCab : <a href="https://taku910.github.io/mecab/" target="_blank">https://taku910.github.io/mecab/ <i class="fa fa-external-link" aria-hidden="true"></i></a>
- CaboCha: <a href="https://taku910.github.io/cabocha/" target="_blank">https://taku910.github.io/cabocha/ <i class="fa fa-external-link" aria-hidden="true"></i></a>
- IPA 辞書 : <a href="https://drive.google.com/uc?export=download&id=0B4y35FiV1wh7MWVlSDBCSXZMTXM">https://drive.google.com/uc?export=download&amp;id=0B4y35FiV1wh7MWVlSDBCSXZMTXM <i class="fa fa-external-link" aria-hidden="true"></i></a>
- wkhtmltopdf : <a href="https://wkhtmltopdf.org/" target="_blank">https://wkhtmltopdf.org/ <i class="fa fa-external-link" aria-hidden="true"></i></a>
- wkhtmltoimage : <a href="https://wkhtmltopdf.org/" target="_blank">https://wkhtmltopdf.org/ <i class="fa fa-external-link" aria-hidden="true"></i></a>
- PHPOffice/ PHPWord : <a href="https://github.com/PHPOffice/PHPWord" target="_blank">https://github.com/PHPOffice/PHPWord <i class="fa fa-external-link" aria-hidden="true"></i></a>
- AWS SDK for PHP : <a href="https://github.com/aws/aws-sdk-php" target="_blank">https://github.com/aws/aws-sdk-php <i class="fa fa-external-link" aria-hidden="true"></i></a>
- FFmpeg : <a href="https://www.ffmpeg.org/" target="_blank">https://www.ffmpeg.org/ <i class="fa fa-external-link" aria-hidden="true"></i></a>

※ MeCabがインストールされていない時、環境変数「simplifiedjapanese\_mecab\_path」を""\(空\)にすると、伝えるウェブAPIを利用してふりがな作成を行なうことができます。  
※ 環境変数 simplifiedjapanese\_wkhtmltoimage が trueで、wkhtmltoimageがインストールされている時、サーバーで画像を生成します。  
※ wkhtmltoimageがインストールされていない場合、ブラウザの機能で画像を生成します。  
※ simplifiedjapanese\_wkhtmltopdf が true で wkhtmltopdf がインストールされている時、PDFを作成することができます。  
※ wkhtmltopdf / wkhtmltoimageを利用する時はサーバーに日本語フォントをインストールする必要があります。  
※ PHPOffice/ PHPWord を利用するときは、PowerCMSX/lib/PhpOffice/PhpWord にライブラリを設置するか、composerを使ってインストールしてください。  
※ AWS SDK for PHPは composerを使ってインストールしてください。
※ composerを使ってインストールした時は、環境変数「composer\_autoload」に vendor/autoload\.php へのパスを指定してください
※ FFmpeg をインストールすることで、音声ファイル作成時に音声と同期する字幕を表示するための JavaScriptファイルを作成できるようになります。

<b>composer\.json</b>

    {
        "require": {
            "phpoffice/phpword": "dev-master"
        }
    }

<b>composer update を実行し、環境変数「composer\_autoload」に vendor/autoload\.php へのパスを指定</b>

    $ composer update
    $ composer require aws/aws-sdk-php

### 環境変数と初期値

        "composer_autoload" : "",
        "simplifiedjapanese_mecab_path" : "/usr/local/bin/mecab",
        "simplifiedjapanese_cabocha_path" : "/usr/local/bin/cabocha",
        "simplifiedjapanese_mecab_dict_index_path" : "/usr/local/libexec/mecab/mecab-dict-index",
        "simplifiedjapanese_mecab_dic_path" : "/usr/local/lib/mecab/dic/ipadic",
        "simplifiedjapanese_wkhtmltopdf_path" : "/usr/local/bin/wkhtmltopdf",
        "simplifiedjapanese_wkhtmltoimage_path" : "/usr/local/bin/wkhtmltoimage",
        "simplifiedjapanese_wkhtmltopdf" : false,
        "simplifiedjapanese_wkhtmltoimage" : false,
        "simplifiedjapanese_cache_expires" : 613200,
        "simplifiedjapanese_fonts": "Noto Sans JP,M PLUS Rounded 1c,BIZ UDPGothic,BIZ UDPMincho,Zen Maru Gothic,Noto Serif JP,Kaisei Opti,RocknRoll One", (設定で選択可能なフォントのリスト)
        "simplifiedjapanese_google_font_url" : "https://fonts.googleapis.com/css2?", (Google Web FontのURL)
        "simplifiedjapanese_mp3_by_month" : -1, (MP3の月間ダウンロード数 : -1で無制限)
        "simplifiedjapanese_mp3_by_scope" : true, (MP3の月間ダウンロード数をスコープ単位でカウント)
        "simplifiedjapanese_ruby_length" : 3, (ルビを付けた時に漢字より後ろのひらがなを丸める文字数)
        "simplifiedjapanese_editor_history" : 10, (やさしい日本語エディタの一時保存の最大履歴数)
        "simplifiedjapanese_exception_all" : true, (辞書の「例外」で全てにスコープの辞書を対象にする)
        "simplifiedjapanese_ffprobe_path" : "", 
        "simplifiedjapanese_ffmpeg_path" : "", (FFmpegのパス)
        "simplifiedjapanese_caption_js_tmpl" : "js_caption_player.tmpl", (音声と同期する字幕用JavaScriptファイルのテンプレート名 : カスタマイズしない場合は標準のファイルが使われます)
        "simplifiedjapanese_caption_ext" : "js", (音声と同期する字幕用ファイルの拡張子)
        "simplifiedjapanese_audio_id" : "audio-player", (字幕と同期するaudio要素の id)
        "simplifiedjapanese_caption_id" : "caption-area", (動的に生成する字幕エリアの p要素の id)
        "simplifiedjapanese_caption_backcolor" : "black", (字幕エリアの背景色)
        "simplifiedjapanese_caption_forecolor" : "white", (字幕エリアの文字色)
        "simplifiedjapanese_caption_align" : "center", (字幕エリアのテキスト位置)
        "simplifiedjapanese_reflects_dates": true, (「ついたち」「ふつか」のような日付の読み方をふりがなに反映する)
        "simplifiedjapanese_api_endpoint": "", (RESTfulAPIのエンドポイントのパス)
        "simplifiedjapanese_furigana_queue_per": 100, (1回のスケジュールタスクあたりのふりがなの JSONファイルのキューの実行数)
        "simplifiedjapanese_furigana_force_queue": false, (ふりがなの JSONファイルを常にキュー経由で生成する)
        "simplifiedjapanese_furigana_api_only": false, (ふりがなの JSONの静的ファイルを生成せずに RESTfulAPIのエンドポイントを利用する)
        "simplifiedjapanese_furigana_default_arg": 1, (ふりがなの JSONファイル生成時のタグ属性の初期値)
        "simplifiedjapanese_furigana_default_map": "furigana/<mt:var name=\"current_archive_type\"><mt:if name=\"archive_date_based\">/<mt:var name=\"current_container\">/<mt:archivedate format=\"Ymd\"></mt:if>/<mt:var name=\"current_object_id\">.json", (ふりがなの JSONファイルの URLマッピングの初期値)
        "simplifiedjapanese_pdf_header_footer": false, (PDF出力の際に header, footer要素内の内容を差し込む)
        "simplifiedjapanese_pdf_page_number": false, (PDF出力の際にフッタにページ番号を入れる)
        "tsutaeru_token_endpoint" : "https://tsutaeru.cloud/api/token/index.php", (伝えるウェブ APIの認証)
        "tsutaeru_parse_endpoint" : "https://tsutaeru.cloud/api/parse/index.php", (伝えるウェブ APIの形態素解析のエンドポイント)
        "tsutaeru_simplified_endpoint" : "https://tsutaeru.cloud/api/simplified/index.php" (伝えるウェブ APIのやさしい日本語変換のエンドポイント)

※ simplifiedjapanese\_assets\_base は、プラグインを powercmsx/plugins以外の場所に設置する時、SimplifiedJapanese/assets へのルート相対パスまたはURLを指定します。

### プラグインの有効化と設定

- プラグインを管理画面から有効化し、スキーマをアップグレードしてください。

## プラグイン設定

- システム辞書を作成する\(システムプラグイン設定のみ\) : すべてのスコープの辞書データを含むシステム辞書を作成します。
- システム辞書を利用する : そのスコープで、システム辞書を利用します。
- 非対応ブラウザのために &lt;rp&gt;~&lt;/rp&gt; タグを追加する : rpタグで' \(' と '\) 'を前後に追加します。
- 結果をキャッシュする : 変換した結果をキャッシュします。プラグイン設定を保存した時、ユーザー辞書を保存・削除した時にキャッシュはクリアされます。
- 分かち書きの区切り文字 : 分かち書きの区切り文字を指定します。
- リッチテキストへのふりがな追加時に分かち書きする : 指定のある時、リッチテキストエディタでふりがなを自動追加する時、分かち書きをあわせて行います。シフトキーを押しながらボタンをクリックすると反対の設定になります。
- リッチテキストのやさしい日本語化時に分かち書きする : 指定のある時、リッチテキストエディタでやさしい日本語化する時、分かち書きをあわせて行います。シフトキーを押しながらボタンをクリックすると反対の設定になります。
- リッチテキストのやさしい日本語化時にふりがなを追加する : 指定のある時、リッチテキストエディタでやさしい日本語化する時、ふりがなの追加をあわせて行います。オプションキーを押しながらボタンをクリックすると反対の設定になります。
- 編集画面にヘルパーボタンを表示する : 作成・編集画面からダイアログでヘルパーを呼び出せるようになります。
- 中国語を自動検出する : 連続した漢字を自動判別して中国語を翻訳対象から除外します。
- 要約を有効化する : 要約ボタンを表示します。要約を実行すると書式やHTMLは削除されます。
- 形態素解析の結果を表示する : 支援ツールで「やさしい日本語にする」ボタンクリックで表示される結果に形態素解析の結果を追加表示します。
- 音声ファイルエクスポートを有効化する : MP3形式のファイルのダウンロードボタンを表示します。
- ピッチ : 音声ファイルの読み上げピッチを指定します。
- 速度 : 音声ファイルの読み上げ速度を指定します。
- 声 : 読み上げの声を指定します。Mizukiが女性、Takumiが男性となります。
- キャンバスの文字色・背景色 : 画像のダウンロードを行う時の画像の文字色と背景色を指定します。
- キャンバスのフォント : 画像のダウンロードを行う時の画像中の文字のフォントを serif\(明朝体\)、sans-serif\(ゴシック体\)から選択します。
- Google Webフォントを利用 : Google Fontsを利用します。
- フォント/ウェイト : エディタと PDFや画像エクスポート時のフォントとウェイトを選択します。
- カスタムCSS : 画像のダウンロードを行う時の画像に対してスタイルを指定します。
- 伝えるウェブAPIのクライアントID/クライアント・シークレット : やさしい日本語化を行なう時、mecabがインストールされていない環境でふりがなを作成する時に必要です※。
- AWSのクライアントID/AWSのクライアントシークレット/AWSのリージョン : MP3形式のファイルのダウンロードに対応させるには、AWSのアカウントを取得して、Amazon Pollyを利用できるようにしてください。

※ 初期値は試用版のクライアントID/クライアント・シークレットが設定されています。ユーザー登録してアカウントを作成すると、Webページ翻訳や、やさしい日本語のカスタム辞書機能が利用できるようになります。

## やさしい日本語エディタ

やさしい日本語作成を支援する画面が追加され、ツールメニューから呼び出すことができます。「編集画面にヘルパーボタンを表示する」設定のある時、オブジェクトの作成・編集画面からダイアログを呼び出すことができるようになります。

- <a target="_blank" href="<mt:var name="script_uri">?__mode=simplifiedjapanese_helper<mt:if name="workspace_id">&amp;workspace_id=<mt:var name="workspace_id"></mt:if>"><mt:var name="script_uri">?\_\_mode=simplifiedjapanese\_helper<mt:if name="workspace_id">&amp;workspace\_id=<mt:var name="workspace_id"></mt:if> <i class="fa fa-external-link" aria-hidden="true"></i></a>

### 支援ツールの利用方法

- 「ふりがなをつける」「分かち書きをする」「やさしい日本語にする」の1つまたは複数にチェックを入れて、実行ボタンをクリックすると、下部に変換結果が表示されます。
- 生成されたふりがな付き HTMLや、やさしい日本語化された HTMLをコピーして、リッチテキストにペーストするか、「HTMLを表示」ボタンをクリックして HTMLソースを表示し、コピーしたHTMLを必要な箇所にペーストしてください。
- 「HTMLを表示」で表示された HTMLは、「エクスポート」ボタンでダウンロードできます。
- 表示されたHTMLを編集して、「修正を適用」ボタンをクリックすると、変換結果を修正できます。
- 「画像ダウンロード」ボタンをクリックすると、ふりがな付き HTMLや、やさしい日本語化された HTMLをレンダリングした結果を画像化してダウンロードできます。
- やさしい日本語化した後の画面で「結果の詳細」ボタンをクリックすると、文中の単語の語彙の難易度を比較表示します。

## リッチテキストエディタへのボタンの追加

以下の4つのボタンが利用可能になります。

- やさしい日本語にする \(pt\-simplified\-japanese\) : 選択範囲を自動的にやさしい日本語にします。
- 分かち書きをする \(pt\-break\-with\-clauses\) : 選択範囲を分かち書きします。
- ふりがなをつける \(pt\-furigana\) : 選択範囲に自動的にふりがなを適用します。
- ふりがなを編集する \(pt\-ruby\) : 選択範囲に対して、手動でルビを追加、また、追加済みのルビを再編集することができます。
- ふりがなを消す\(pt\-remove\-ruby\) : 選択範囲のルビを削除します。シフトキーを押しながらボタンをクリックすると、選択範囲に含まれる分かち書きを同時に削除します。

やさしい日本語エディタでは、加えて以下のボタンが追加できます。

- 一時保存する \(pt\-sj\-tmp\-save\) : エディタで編集中のデータを一時保存します。
- 一時データを復元\(戻る\) :  \(pt\-sj\-tmp\-restore\) : 一時保存したデータを復元します\(クリックで1つづつ古いデータへ\)。
- 一時データを復元\(進む\) : \(pt\-sj\-tmp\-forward\) : 一時保存したデータを復元します\(クリックで1つづつ新しいデータへ\)。
- 一時保存データを削除する : \(pt\-sj\-tmp\-delete\) : 一時保存したデータを削除します。

ボタンは以下の手順で追加します\(TinyMCEプラグインがすでに有効で、ツールバーなどの設定が保存されているときはSimplifiedJapaneseプラグイン有効化時に自動的に追加されます\)。

- TinyMCEプラグインが無効な場合、TinyMCEプラグインを有効化します。その後、スキーマのアップグレードが必要です。
- ツールバーに、以下を追加します。

    pt-furigana pt-break-with-clauses pt-simplified-japanese pt-ruby pt-sj-tmp-save pt-remove-ruby pt-sj-tmp-forward pt-sj-tmp-backword pt-sj-tmp-forward 

## MP3で読み上げテキスト・発音を指定する

rubyタグを指定することで漢字の読み上げ方を指定することができます。rt要素にカタカナと「'\(アポストロフィ\)」を指定することで高低アクセントを指定することができます。  
カタカナと「'\(アポストロフィ\)」を指定した読み上げ指定は、furiganaモディファイアまたは ssml2furiganaモディファイアによってひらがなに変換され、「'」を削除できます。

    <ruby>難波<rt>ナ'ンバ</rt></ruby>の次の駅は<ruby>日本橋<rt>にっぽんばし</rt></ruby>です。
    ↓
    読み上げ時
    <phoneme alphabet="x-amazon-pron-kana" ph="ナ'ンバ">難波</phoneme>の次の駅は<phoneme type="ruby" ph="にっぽんばし">日本橋</phoneme>です。
    ↓
    HTML出力時
    <ruby>難波<rt>なんば</rt></ruby>の次の駅は<ruby>日本橋<rt>にっぽんばし</rt></ruby>です。

## テキストノードのテキストとふりがな付きテキストのマッピングを JSON形式のファイルに出力する

URLマップの「ふりがな用のJSONを生成する」にチェックを入れると、テキストノードのテキストとふりがな付きテキストのマッピングを JSON形式のファイルにして、アーカイブと同じパスに拡張子「\.json」でファイル出力します。

## テンプレート・タグ

### ファンクション・タグ

    <mt:makemp3 path="パス" text="読み上げるテキスト" js_caption="1">
      
      Amazon Pollyの設定が有効な時にのみ利用可能なタグです。
      path(スコープのサイト・パス以下のパスを指定)と textを指定して生成した MP3ファイルの URLを返します。
      プレビュー時にはファイルを生成せずに URLのみを返します。
      FFmpegがインストールされていない時、テキストが SSML タグを含んで 3000文字を超える場合、ファイルは生成されません。その場合はこのタグの出力値は空となります。
      FFmpegがインストールされている時、js_caption属性の指定で、音声ファイルと同じ場所に同じ名前で(拡張子のみ異なる)字幕を表示するための JavaScriptファイルを生成します。

    <mt:furiganajsonurl>

      URLマッピングに「ふりがな用のJSONを生成する」設定されている時 JSONの URLを出力します。プレビュー時にはプレビュー用の管理画面URLを出力します。
      動的ページでは、RESTfulAPIのエンドポイントを返します。
      
      設定のない場合、以下のようにして取得することもできます。タグ属性「api」を付与すると静的出力されたファイルの URLの代わりに APIエンドポイントを出力します。。

      /api/v1/1/dynamic_furigana_json?url=%2Fcontents%2Ffile_name.html

### グローバル・モディファイア

    furigana="1|2|3"
    
    '1'を指定するとふりがなを追加 '2'を指定すると分かち書きしたテキストにふりがなを追加 '3'を指定するとふりがなを追加せずに分かち書きのみを適用します。

    hiragana="1|2"
    
    '1'を指定すると漢字とカタカナをふりがなに変換 '2'を指定すると漢字のみをひらがなに変換します。

    katakana="1|2"
    
    '1'を指定すると漢字とひらがなをカタカナに変換 '2'を指定すると漢字のみをカタカナに変換します。

    ssml2furigana="1"
    
    phoneme要素をruby要素に変換し、rt要素、ph属性のカタカナをひらがなに変換して「'」を削除します。

    textnode_to_json="1|2|3"

    HTML内のテキストノードと変換したテキストをキーバリュー形式のJSONで返却します。
    '1'を指定するとふりがなを追加 '2'を指定すると分かち書きしたテキストにふりがなを追加 '3'を指定するとふりがなを追加せずに分かち書きのみを適用します。

MeCabがインストールされていない環境では、furiganaモディファイアは利用できません\(APIによるふりがな追加はできません\)。

## RESTfulAPIエンドポイント

### dynamic\_furigana\_json

URLを引数に指定することでテキストノードのテキストとふりがな付きテキストのマッピングを JSON形式で動的に生成して返します。

- 例 : /api/v1/1/dynamic\_furigana\_json?url=%2Fcontents%2Ffile\_name\.html

### get\_furigana\_mapping

テキストとふりがな付きテキストのマッピングを JSON形式で動的に生成して返します。

- 例 : /api/v1/1/get\_furigana\_mapping

データの例(modeはfuriganaモディファイアに渡す数値)  

    let  data = {
        mode: 1,
        phrases : ['文字列1', '文字列2'...],
    };

※ Microsoft Wordは、米国 Microsoft Corporationの米国およびその他の国における登録商標または商標です。  
※ AWS、Amazon Polly は、米国および/またはその他の諸国における、Amazon.com, Inc. またはその関連会社の商標です。  
※ Google Fonts は Google LLC の商標です。  
※ フォント名は各フォントの提供元各社の商標です。