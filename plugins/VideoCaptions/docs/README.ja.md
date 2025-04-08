# VideoCaptionsプラグイン

<style>
ul {margin-left:-1rem;}
h2 {margin-bottom: 0.6rem;margin-top: 1.4rem;}
</style>

## 概要

プラグイン「FileUploader」によってアップロードしたビデオにキャプションを追加します。  
キャプションは WebVTTファイルとして生成されます。また、動画にキャプションを合成することもできます。  
キャプションと同期するナレーション・音声ガイドを合成音声で作成して動画と合成することができます。  
MP4形式のファイルをHLS形式のファイル群へコンバートすることができます。

## はじめに〜WebVTTと 合成字幕について

Web ビデオテキストトラックフォーマット \(WebVTT\) は、__&lt;track&gt;__ 要素を使用して時間指定のテキストトラック\(字幕やキャプションなど\)を表示するためのフォーマットです。 
VideoCaptionsプラグインでは、この WebVTT 形式のファイルと、WebVTTファイルがなくても動画自身にキャプションを合成することにより字幕を再生できる合成動画の作成もサポートしています。

それぞれのメリットとデメリットは以下の通りです。

<table class="table">
  <thead>
    <tr><th></th><th>WebVTT</th><th>合成動画</th></tr>
  </thead>
  <tbody>
    <tr><th>メリット</th>
      <td>
        <ul>
          <li>軽量・低負荷</li>
          <li>修正が容易</li>
          <li>他言語版など、複数のバージョンを作成可能</li>
          <li>字幕の ON・OFF選択が可能</li>
        </ul>
      </td>
      <td>
        <ul>
          <li>作成時のサーバーの負荷が高い</li>
          <li>ブラウザによる差異がなく常に同一の表示が可能</li>
          <li>ルビなどについても環境依存がない</li>
          <li>ダウンロードした場合なども字幕が再生可能</li>
        </ul>
      </td>
    </tr>
    <tr><th>デメリット</th>
      <td>
        <ul>
          <li>ブラウザによって対応状況がまちまち</li>
          <li>ルビに対応しているのは Firefoxのみ</li>
          <li>Webブラウザ上でのみ再生可能</li>
          <li>ダウンロードした場合などは字幕がつかない</li>
        </ul>
      </td>
      <td>
        <ul>
          <li>データ容量が大きい</li>
          <li>修正が手間</li>
          <li>単一のバージョンのみとなる</li>
          <li>字幕の ON・OFF選択はできない</li>
        </ul>
      </td>
    </tr>
  </tbody>
</table>

WebVTTのデメリットをカバーするため、このプラグインでは以下のような仕組みを用いています。

- ルビ付きのバージョンと、ルビを括弧内に展開した互換バージョンのファイルを同時生成
- JavaScriptによるオリジナルの動画プレイヤー\(Video\.jsのカスタマイズ版\)を同梱してブラウザによる差異を吸収

合成動画の作成については以下のフォーマットでの動作を確認しています。

- mp4
- mov
- webm

______

## インストール

- このプラグインを有効化するためにはプラグイン「FileUploader」が有効である必要があります。
- キャプションにふりがなを追加、キャプションをビデオに合成する、ナレーション・音声ガイドを作成して合成するためにはプラグイン「SimplifiedJapanese」が有効である必要があります。

## 追加されるカラム

モデル「upload\_file」に浮動小数点型のカラム「thumbnail\_sec」\(サムネイル書き出し\(秒\)\)が追加されます。

### 必要な外部コマンド・ライブラリ

- MeCab と MeCab用の辞書 \(IPA 辞書等\) ※ キャプションにふりがなを自動追加するのに必要
- mecab\-dict\-indexコマンド \(MeCabと一緒にインストールされます\) ※ キャプションにふりがなを自動追加するのに必要
- wkhtmltoimage \(wkhtmltopdfと一緒にインストールされます\) ※ キャプションをビデオに合成するのに必要
- FFmpeg ※ キャプションをビデオに合成するのに必要

### 外部コマンド・ライブラリの入手先

- MeCab : <a href="https://taku910.github.io/mecab/" target="_blank">https://taku910.github.io/mecab/ <i class="fa fa-external-link" aria-hidden="true"></i></a>
- IPA 辞書 : <a href="https://drive.google.com/uc?export=download&id=0B4y35FiV1wh7MWVlSDBCSXZMTXM">https://drive.google.com/uc?export=download&id=0B4y35FiV1wh7MWVlSDBCSXZMTXM <i class="fa fa-external-link" aria-hidden="true"></i></a>
- wkhtmltoimage : <a href="https://wkhtmltopdf.org/" target="_blank">https://wkhtmltopdf.org/ <i class="fa fa-external-link" aria-hidden="true"></i></a>
- FFmpeg / ffprobe : <a href="https://www.ffmpeg.org/" target="_blank">https://www.ffmpeg.org/ <i class="fa fa-external-link" aria-hidden="true"></i></a>
- openh264 : <a href="https://github.com/cisco/openh264" target="_blank">https://github.com/cisco/openh264 <i class="fa fa-external-link" aria-hidden="true"></i></a>

### 環境変数

        "video_captions_postfix": "-with-caption",
        "video_captions_compat_postfix": "-compat",
        "video_captions_video_id": "video-player",
        "video_captions_video_class": "video-js",
        "video_captions_text_shadow" : 2,
        "video_captions_can_bake" : false,
        "video_captions_bake_parallel" : 1,
        "video_captions_bake_queue" : true,
        "video_captions_keep_audio" : false,
        "video_captions_fonts": "Noto Sans JP,Noto Serif JP",
        "video_captions_backup_expires": 7200,
        "video_captions_cache_expires": 86400,
        "video_captions_codec": ""
        "video_captions_can_convert_hls" : false,
        "video_captions_hls_queue": true,
        "video_captions_hls_queue_sleep": 3,
        "video_captions_hls_parallel" : 1,
        "video_captions_hls_time": 10,
        "video_captions_framerate": 30,
        "video_captions_hls_playlist_type": 2,
        "video_captions_hls_allow_overwrite": true,
        "video_captions_hls_mkdir": true,
        "video_captions_hls_scales": "",
        "video_captions_chapter_json": false,
        "video_captions_thumbnail_ext": "png",
        "video_captions_thumbnail_width": 240,
        "simplifiedjapanese_wkhtmltoimage" : true,
        "simplifiedjapanese_wkhtmltoimage_path" : "/usr/local/bin/wkhtmltoimage",
        "simplifiedjapanese_ffprobe_path" : "/usr/local/bin/ffprobe", 
        "simplifiedjapanese_ffmpeg_path" : "/usr/local/bin/ffmpeg",

- video\_captions\_postfix : キャプションを合成したビデオファイルのベースネームに追加する文字列
- video\_captions\_compat\_postfix : ルビを括弧内に展開した WebVTTファイルのベースネームに追加する文字列
- video\_captions\_video\_id : テンプレート・タグによって videoタグを出力する時のデフォルトの id属性値
- video\_captions\_video\_class : テンプレート・タグによって videoタグを出力する時のデフォルトの class属性値
- video\_captions\_text\_shadow : 合成字幕作成時の文字の縁取りの太さ
- video\_captions\_can\_bake : キャプションをビデオに合成する機能を有効化する
- video\_captions\_bake\_parallel : 同時に実行できる合成字幕プロセスの数\(初期値 : 1\)
- video\_captions\_bake\_queue : リアルタイムに合成字幕を作成せずにキューを利用して作成する
- video\_captions\_keep\_audio : キャプションをビデオに合成するときに音声データを劣化させない
- video\_captions\_fonts : プラグイン設定で選択可能なキャプションのフォント
- video\_captions\_backup\_expires : 合成ファイル、WebVTTファイルのバックアップファイルの有効期限
- video\_captions\_cache\_expires : キャプション合成用の画像のキャッシュ有効期限
- video\_captions\_codec : キャプション合成時 / HLS変換時のコーデック \(※\)
- video\_captions\_can\_convert\_hls : HLSへの変換を有効化する\(初期値 false\)
- video\_captions\_hls\_queue : HLSへのコンバートをキューを利用して行う
- video\_captions\_hls\_queue\_sleep : キュー実行後の一時停止時間
- video\_captions\_hls\_parallel : キュー指定でない時同時に実行できる HLS変換プロセスの数\(初期値 : 1\)
- video\_captions\_hls\_time : 分割する際の間隔\(秒\)
- video\_captions\_hls\_digits : .tsファイルに付くセグメントの桁数\(0の時は自動で設定される\)
- video\_captions\_hls\_playlist\_type : 0\(指定なし\)、1\(event\)、2\(vod\)
- video\_captions\_framerate : 1秒間のフレーム数
- video\_captions\_hls\_allow\_overwrite : HLSファイルが存在する時に上書き\(再生成\)を許可する\(初期値 true\)
- video\_captions\_hls\_mkdir : HLSファイル作成時にオリジナルファイルのベースネーム名のディレクトリを生成する\(初期値 true\)
- video\_captions\_hls\_scales : HLSの生成時にスケール指定でリサイズ版を作成する\(例 : "1080xauto,480xauto,240xauto"\)
- video\_captions\_chapter\_json : JSON形式のサムネイル付きチャプター用ファイルを出力する\(初期値 false\)
- video\_captions\_thumbnail\_ext : チャプター用ファイルを「json」形式に指定した時、サムネイルを作成する時に拡張子を指定します。設定できる値は「webp」「png\(初期値\)」「jpg」です。
- video\_captions\_thumbnail\_width : チャプター用ファイルを「json」形式に指定した時、サムネイルの幅を指定します。
- simplifiedjapanese\_wkhtmltoimage : キャプションをビデオに合成する機能を有効化する
- simplifiedjapanese\_wkhtmltoimage\_path : wkhtmltoimageコマンドのパス
- simplifiedjapanese\_ffprobe\_path : ffprobeコマンドのパス
- simplifiedjapanese\_ffmpeg\_path : ffmpegコマンドのパス

※ simplifiedjapanese\_ffmpeg\_path の指定がある時、動画のサムネイルが利用できます。

#### サムネイル付きの JSON形式のチャプターについて

VTT以外に、オリジナルフォーマットのサムネイル付きの JSONファイルを生成することができます。フォーマットは以下の通りです。

    [
        {
            "startTime": "00:00:00",
            "name": "イントロダクション",
            "thumbnail": "\/assets\/thumbnails\/thumb-upload_file-240xauto-24-binary_file.png"
        },
        {
            "startTime": "00:00:21",
            "name": "本編",
            "thumbnail": "\/assets\/thumbnails\/thumb-upload_file-240xauto-24-21-binary_file.png"
        },
        {
            "startTime": "00:02:40",
            "name": "エンディング",
            "thumbnail": "\/assets\/thumbnails\/thumb-upload_file-240xauto-24-160-binary_file.png"
        }
    ]

#### ※ FFmpegのコーデック指定について

H\.264 エンコードにはライセンス料がかかります。  
Cisco が配布する binary moduleについてはライセンス料が支払い済みなため、動画のコーデックには libopenh264を利用すると良いでしょう。

- openh264 をインストールする
- Cisco が配布するコンパイル済みファイル <a href="https://github.com/cisco/openh264/releases/" target="_blank">https://github.com/cisco/openh264/releases/ <i class="fa fa-external-link" aria-hidden="true"></i></a> と差し替える
- FFmpegを libopenh264 を有効な状態でコンパイルしてインストールする

        .configure --enable-libopenh264

- 環境変数「video\_captions\_codec」に「libopenh264」を指定する

        "video_captions_codec": "libopenh264"

## HLS / MPEG\-DASH 動画のアップロード

HLS または MPEG\-DASH を構成するファイル群が圧縮された ZIPファイルをアップロードすると以下のメッセージが画面に表示されます。

<div class="alert alert-success" role="alert" tabindex="0">このZIPファイルにはストリーミング再生可能な動画ファイルが含まれています。アーカイブを展開してビデオを登録しますか?</div>

メッセージのチェックボックスにチェックを入れて保存すると、ZIPファイルをサーバーで解凍して展開、m3u8ファイルのみをアップロードファイルとして登録します。

<b>※ HLS動画には音声合成や字幕の合成はできません。</b>

## ナレーション・音声ガイドの追加

- プラグイン「SimplifiedJapanese」を有効化して、システムプラグイン設定の「Amazon Polly API」の設定を指定している時、ナレーション・音声ガイドの作成と合成が有効化されます。
- 読み上げ音声やピッチ、速度についての設定はプラグイン「SimplifiedJapanese」のプラグイン設定が利用されます。

### オーディオに関する処理

- 何もしない : 何も処理しません。
- 削除 : オーディオトラックを削除します。
- 復旧 : アップロード時のオリジナルのオーディオトラックを復元します。
- 音声作成・差し替え : ナレーション・音声ガイドを作成して合成、動画の元の音声は失われます。
- 音声作成・合成 : ナレーション・音声ガイドを作成して合成、元の音声に合成します。

### キャプションと音声が異なる時の独自タグについて

    <noaudio>〜</noaudio> : キャプションには表示させるが音声は作成しないテキストを指定
    <nocaption>〜</nocaption> : 音声に含めるがキャプションには表示させないテキストを指定

## 読み上げテキスト・発音を指定する

rubyタグを指定することで漢字の読み上げ方を指定することができます。rt要素にカタカナと「'\(アポストロフィ\)」を指定することで高低アクセントを指定することができます。  
カタカナと「'\(アポストロフィ\)」を指定した読み上げ指定は、キャプション生成時にはひらがなに変換され、「'」は削除されます。

    <ruby>難波<rt>ナ'ンバ</rt></ruby>の次の駅は<ruby>日本橋<rt>にっぽんばし</rt></ruby>です。
    ↓
    読み上げ時
    <phoneme alphabet="x-amazon-pron-kana" ph="ナ'ンバ">難波</phoneme>の次の駅は<phoneme type="ruby" ph="にっぽんばし">日本橋</phoneme>です。
    ↓
    キャプション生成時
    <ruby>難波<rt>なんば</rt></ruby>の次の駅は<ruby>日本橋<rt>にっぽんばし</rt></ruby>です。

## リッチテキストエディタへのボタンの追加

以下のボタンが利用可能になります。

- ビデオを挿入 \(pt\-video\) : クラスが「video」のファイル一覧を表示・選択して videoタグを挿入します。

## ビューへの動画埋め込みの最小限のコード

リレーションまたはフィールド機能で記事やページにビデオを関連付けている時、その動画ファイルを自動的に埋め込みます。

    <mt:websitelanguage setvar="language">
    <!DOCTYPE html>
    <html lang="<mt:var name="language">">
      <head>
        <meta charset="utf-8">
        <title>VideoCaptionsのサンプル・ビュー</title>
        <mt:videojsscript link="8">
      </head>
      <body>
        <mt:embedvideo controls="always" script>
      </body>
    </html>

mt:videojsscriptタグやmt:embedvideoを必ず使用しなければならない、ということはありませんので、必要に応じて出力されたソースコードを基にカスタマイズをしていただくことが可能です。

## 条件タグ

    <mt:ifembedvideo>現在のコンテキストにビデオが存在する場合に出力</mt:ifembedvideo>

現在のコンテキストにビデオが存在する場合に内容を出力します。  
モデル「ファイル」に対するリレーション型のカラムか、「ビデオ」もしくは「ビデオ \(複数\)」型のフィールドにファイルがセットされているかどうかで判断されます。

## ファンクション・タグ

    <mt:embedvideo object_id="ファイルのID" controls="always" script>

アップロードしたファイルを再生する videoタグを出力します。

### 指定できるタグ属性

- id : 数値を指定した時ファイルのID、文字列を指定したときは videoタグの id属性値となります。
- object\_id : ファイルのIDを指定します。ID指定のない時、現在のコンテキストからファイルを判断します。
- url : videoタグの代わりに URL\(キャプション合成済みファイルのある場合はそのURL、ない場合はオリジナルのURL\)を出力します。
- original\_url : videoタグの代わりに URL\(オリジナルのURL\)を出力します。
- caption\_url :  videoタグの代わりに URL\(キャプション合成済みファイルのURL\)を出力します。
- vtt\_url : videoタグの代わりに WebVTTファイルのURLを出力します。
- chapter\_url : videoタグの代わりにチャプター用 WebVTTファイルのURLを出力します。
- vtt\_compat\_url : videoタグの代わりにルビを括弧内に展開した WebVTTファイルのURLを出力します。
- attributes : videoタグのタグ属性を指定します。指定のない場合、プラグイン設定の「Videoタグ」が使われます。
- language : trackタグの srclang 属性値を指定します。
- script : videoタグの後に動画プレイヤー用の JavaScriptコードを出力します。
- controls: コントロールを表示します。属性値に「always」を指定すると、コントロールを常時表示します。
- unique\_id : video要素の id属性をユニークな値\(video\-アップロードファイルのID\)で指定します。
- indent : 出力される HTMLコードに対するインデントのスペース数を指定します。
- vtt : 字幕合成動画のある時も、オリジナルのビデオ + VTT をタグで出力します。
- original : 字幕合成動画のある時も、オリジナルのビデオを出力します。
- without\_vtt : WebVTTファイルがある時も trackタグを出力しません。
- priority : 属性値に「vtt」を指定すると、字幕合成動画があって、WebVTTファイルがある時はオリジナルビデオ + WebVTTのタグを出力します。

### mt:embedvideo タグに指定できる videoタグの属性

#### 論理属性 \(属性値を持たない\)

- controls, autoplay, loop, muted, playsinline, disableRemotePlayback, autoPictureInPicture

#### 属性 \(属性値を持つ\)

- id, width, height, class, style, duration, controlslist, crossorigin, intrinsicsize, src, preload, poster, disablePictureInPicture
______
- <a href="https://developer.mozilla.org/ja/docs/Web/HTML/Element/video" target="_blank">&lt;video&gt;: 動画埋め込み要素 - HTML: HyperText Markup Language | MDN <i class="fa fa-external-link" aria-hidden="true"></i></a>
______

    <mt:videojsscript id="video-player">
    <mt:videojsscript link="8" googlefont>

動画プレイヤー用の JavaScriptコードを出力します。

### 指定できるタグ属性

- id : videoタグの id属性値。省略時は環境変数「video\_captions\_video\_id」\(初期値 : video\-player\)の値となります。
- link : 動画プレイヤー用の CSSと JavaScriptファイルを読み込むタグを出力します。属性値に「8」を指定するとVideo.jsバージョン8が利用できます。
- googlefont : link属性とあわせて指定することで、Google Fonts\(プラグイン設定で指定したフォント\)を読み込む link要素を出力します。
- indent : 出力される HTMLコードに対するインデントのスペース数

## キャプションの作成

「ファイル」よりビデオファイルをアップロード後、保存ボタン押下でキャプションが作成可能になります。以下の2パターンの作成に対応しています。

1. 「キャプションの追加」ボタンより一つずつ作成 \(ダイアログモード\)
2. TSV形式で一括作成 \(TSVモード\)

TSVモードで一括作成後、ダイアログモードで編集するなど併用可能です。1行に収まる文字数は、位置がタイトルのとき概ね16文字、位置が上・下の時概ね26文字です。

### ダイアログモード

動画下のタブ「カード一覧」クリックでダイアログモードになります。

- キャプションの新規作成 : 「キャプションの追加」ボタン押下でキャプションを作成します。
- キャプションの編集 : カード一覧より対象のカードクリックでキャプションを編集します。

#### ダイアログモードの編集手順

1. 動画の再生時間をキャプションの表示開始時間に合わせて開始横のカメラアイコンをクリック。
2. 同様に表示終了時間に合わせて終了横のカメラアイコンをクリック。
3. キャプションや表示位置などを設定後、確定ボタン押下で反映します。

### TSVモード

動画下のタブ「タブ区切りテキスト」クリックでTSVモードになります。

    00:00:00.5	00:00:05.0	吾輩は猫である	3	1	1

フォーマットは前から順に

1. 表示開始時間\(必須\)
2. 表示終了時間\(必須\)
3. キャプション\(必須\)
4. 表示位置
5. 文字色
6. ルビ・分かち書き
7. キャプションではなくチャプターとする場合に指定

となります。4〜6を省略するとプラグイン設定を初期値として利用します。

時間指定は以下の3パターンに対応しています。以下はいずれも開始から0.5秒を表しています。

- 秒数 \(ex : 0\.5\)
- mm:ss\.0 \(ex : 00:00\.5\)
- hh:mm:ss\.0 \(ex : 00:00:00\.5\)

TSV形式のテキストは、表計算ソフトに入力してペーストすると良いでしょう。

______

### 動画プレイヤーを利用した WebVTT字幕のテキストのスタイル

以下のようにしてスタイルを適用することができます。

    .vttTitle, .vttTitle ruby, .vttTitle rt,
    .vttTop, .vttTop ruby, .vttTop rt,
    .vttBottom, .vttBottom ruby, .vttBottom rt  {
        /* 適用したいスタイル */
    }

### videoのサムネイル作成

ファンクション・タグ : mt:videothumbnail

ビデオのサムネイルを生成してその URLを出力します。サイズを省略した時はビデオのサイズと同サイズの画像を作成します。  

#### 指定できるタグ属性  

- id : ファイルのIDを指定します。ID指定のない時、現在のコンテキストからファイルを判断します。
- starttime : サムネイルを作成する動画のタイミング\(秒\)を指定します。小数点以下第1位まで指定できます。
- extension : 出力する画像の拡張子を指定します\(jpg, png またはwebp\)。
- withcaption : 字幕合成後の動画がある場合、字幕合成後の動画のサムネイルを作成します。
- width : 生成するサムネイルの幅
- height : 生成するサムネイルの高さ
- square : 1をセットすると正方形のサムネイルを生成
- scale : 拡大・縮小のパーセンテージ

※ その他のタグについてはタグリファレンスを参照してください。

※ AWS、Amazon Polly は、米国および/またはその他の諸国における、Amazon.com, Inc. またはその関連会社の商標です。  
※ Google Fonts は Google LLC の商標です。