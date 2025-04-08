# SearchEstraierプラグイン

## 概要

Hyper Estraier を利用したサイト内検索機能を提供します。  
また、ユーザーの閲覧履歴\(※\)やコンテンツデータの属性により関連性の高いコンテンツを自動抽出するAPIを提供します。  

※ ユーザーの閲覧履歴の保存には Cookieを利用するため、サイトのプライバシーポリシーに留意してください。

## 設置とインストール

- Hyper Estraier と MeCab\(オプション\)をインストールします。
- estcmd のパスが /usr/local/bin/estcmd でない時、環境変数「searchestraier\_estcmd\_path」に estcmd のパスを追加します。
- mecab のパスが /usr/local/bin/mecab でない時、環境変数「searchestraier\_mecab\_path」に mecab のパスを追加します。
- プラグインを有効化します。
- 検索対象のスコープのプラグイン設定で、インデックスのパスを入力し、「検索を有効化」にチェックを入れます。
- tools/worker\.phpを実行します。
- ビューを作成します。サンプルは plugins/SearchEstraier/theme/views/ 以下に含まれています。
- ビューに対する URLマッピングでアーカイブ種別を「インデックス」とし、ファイル出力を「ダイナミック」とします。

## tools/syncCasket.php について

共有ディスクなど、遅いディスクにインデックスを設置している時、高速なディスクにインデックスをコピーして、そのインデックスを利用することで検索速度を改善できます。

    cd /path/to/PowerCMSX; sudo -u apache php tools/syncCasket.php --from /efs/support/search/index --to /var/www/support/search/index

環境変数

- searchestraier\_sync\_max\_retry : リトライ回数\(初期値50\)
- searchestraier\_sync\_sleep : リトライ時のスリープ秒数\(初期値5\)


## プラグイン設定

- 検索を有効化\(スコープでの全文検索を有効化します\)
- クッキーをスコープ固有にする\(ユーザーの閲覧履歴を保存するクッキーをスコープ毎に設定します\)
- 動的ページを検索対象にする ※1 \(URLマップのファイル出力が「ダイナミック」「オンデマンド」のコンテンツを検索対象にします\)
- インデックスのパス ※2 \(CMSから書込み可能な検索インデックスを保存するディレクトリを指定します\)  
- アーカイブ種別\(検索対象とするアーカイブ種別を指定します\)
- 文書のタイトル\(文書のタイトルをどこから取得するかを指定します。「自動」とするとアーカイブのタイトルを文書のタイトルとします\)
- タイトルの重み\(0\.0〜1\.0の範囲で指定し、数字が大きいほどタイトルに含まれるキーワードが優先されすりょうになります\)
- 文書の本文\(文書のタイトルをどこから取得するかを指定します\)
- サムネイルを作成 / 幅 ※3 \(検索結果にアイキャッチとして表示させるサムネイルを作成する場合に指定します\)

### 注釈

- ※1 ダイナミックコンテンツを検索対象にする場合、コンテンツ更新時に内部的に再構築を行います。ダイナミック、オンデマンド指定のURLマップで、可能なものは静的に変更することをお勧めします。
- ※2 &lt;mt:property name=&quot;support\_dir&quot;&gt; は、環境変数 support\_dir で指定するパスです。指定のない時、アプリケーションの直下の support/ ディレクトリとなります。  
   異なるスコープで同一のインデックスを指定することで、スコープをまたがった検索が可能となります。
- ※3 metaタグ「og:image」がある場合はその画像、ない場合は本文エリアに出現する最初の img要素からサムネイルを作成します。SVGには対応していません。

## 表記の揺れを吸収する

当該のスコープでプラグイン「Keywords」のキーワードオブジェクトに「代替フレーズ」を指定したキーワードを登録することで、表記の揺れを吸収することができるようになります。表記揺れの吸収は双方向に有効となります。

例 : 

「ウイルス」に対する代替フレーズ「ウィルス」を登録した時、以下の両方ともどちらのワードでもヒットするようになります。

- キーワード「ウイルス」を含んでいて「ウィルス」を含まないコンテンツ
- キーワード「ウィルス」を含んでいて「ウイルス」を含まないコンテンツ

## 形態素解析エンジン MeCab を利用したキーワード抽出

MeCabがインストールされている時、文書内のキーワードを自動抽出して、レコメンドAPIによる「閲覧履歴による興味関心」の精度を上げることができます。  
あわせて php\-mecabのインストールを推奨します\(必須ではありません\)。

以下の環境変数を config\.json の config\_settings に記述します。

- searchestraier\_auto\_keywords を true。
- searchestraier\_mecab\_path に mecab コマンドのパス。
- searchestraier\_end\_of\_sentense\(省略可能\)に文章の終わりを識別する文字。デフォルトは「。」
- searchestraier\_min\_word\_len\(省略可能\)にキーワードの最小文字数。デフォルトは3文字以上。
- searchestraier\_min\_word\_cnt\(省略可能\)にキーワードの出現回数。デフォルトは3回以上出現したキーワードを対象にします。
- searchestraier\_word\_multibyte\_only\(省略可能\)に true もしくは false。抽出するキーワードをマルチバイト文字列のみとします。デフォルトは true。
- searchestraier\_re\_index_at\_rebuild\(省略可能\)に true もしくは false。再構築処理の時にインデックスをアップデートするかを指定します。デフォルトは true。
- searchestraier\_mecab\_userdic\(省略可能\)に mecabのユーザー辞書のパス。
- searchestraier\_punctuation\_weight に数字\(初期値10\)。本文抽出時に文章を判別する句読点の閾値で、数字が大きいほど短い文章がヒットします。
- searchestraier\_thumb\_minimum\_area にサムネイル対象とする画像の最小面積\(widthとheight属性の積\)を指定します。初期値は1500です。
- searchestraier\_thumb\_minimum\_size に widthとheight属性が省略された画像をサムネイル対象とする最小のサイズ\(バイト数\)を指定します。初期値はありません。
- searchestraier\_api\_caching APIのタイプが「similar」の時、結果をキャッシュ場合 true\(この設定は管理画面からは行えません\)
- searchestraier\_api\_relative\_url レコメンドAPIが返却する URLをルート相対パスにする場合に true。
- searchestraier\_index\_lt 解析するテキストのサイズ制限をキロバイト単位で指定します。デフォルトは 32768KB\(約32MB\)。

## noindex メタタグを使用した検索インデックス登録の除外

環境変数「searchestraier\_skip\_noindex」を true にすると、「`<meta name=robots content=noindex>`」に相当するタグが含まれる HTML 文書を検索インデックスに含めないようにします。

## 検索インデックス洗い替え時の処理の高速化

スケジュールタスクに時間がかかる時、以下の環境変数を調整してしてください。尚、「searchestraier\_task\_proc」は Windows環境ではサポートされません。

- searchestraier\_update\_idx\_frequency : 検索インデックスの洗い替えの実行頻度を秒で指定します。初期値は 86400\(1日\)、ver\.1\.5までは 1200\(20分\)です。
- searchestraier\_task\_proc : 数値を指定すると、指定した数字の複数のプロセスで並列処理を行います。コア数 × 2 程度を目安にすると良いでしょう。
- searchestraier\_task\_proc\_per : 並列処理時に何ファイルずつ処理するかを指定します。初期値は 10です。

## UTF8以外の文字コードのファイルをインデックスに含める場合、以下の環境変数を指定してください。

- searchestraier\_convert\_utf8 : true

## 表記揺れの対応

デフォルトで、表記統合辞書を用いた表記揺れの吸収が有効です。プラグイン設定に表記揺れをカンマで区切って追加指定することができます。

例 : 

    例 : スマホ,スマートフォン,スマートホン

環境変数「searchestraier\_bannedwords\_rules」指定のある時、プラグイン「BannedWords」に登録した言い換えの設定を合わせて利用します。初期値は trueです。

## 重みづけの調整

以下の環境変数で重みづけの調整が可能です。

        "searchestraier_consider_headings" : true,
        "searchestraier_use_weight" : true,
        "searchestraier_doc_weight" : {"html":1.0,"htm":1.0,"php":1.0,"pdf":0.8,"doc":0.7,"xls":0.6,"ppt":0.6,"docx":0.6,"xlsx":0.6,"pptx":0.6},
        "searchestraier_model_weight": {},

- searchestraier\_consider\_headings : 文書がHTML文書で本文を XPath、CSSセレクタに指定している時、見出しの重みづけを有効にします。
- searchestraier\_use\_weight : searchestraier\_doc\_weightと searchestraier\_model\_weight による重みづけを有効化します。初期値は trueです。
- searchestraier\_doc\_weight : 文書の拡張子ごとに重みづけを指定します。
- searchestraier\_model\_weight : モデル毎に重みづけを指定します。指定がある時は searchestraier\_doc\_weight の値 × searchestraier\_model\_weightの値が、重みづけの値となります。

## 検索フォームと検索結果のビュー

以下のようなビューを作成します。 

    <form method="GET" action="<mt:var name="current_archive_url">">
    <div class="form-inline">
      <label> キーワード
      <input type="text" value="<mt:var name="query" escape>" name="query" "></label>
      <label>
        <input type="radio" name="and_or" value="AND" <mt:if name="request.and_or" eq="AND">checked</mt:if>>
        AND
      </label>
      <label>
        <input type="radio" name="and_or" value="OR" <mt:if name="request.and_or" eq="OR">checked</mt:if>>
        AND
      </label>
      <button type="submit">検索</button>
    </div>
    </form>
    <mt:var name="request.query" setvar="query">
    <mt:estraiersearch phrase="$query" prefix="estraier_" and_or="AND" default_limit="10" snippet_width="200" workspace_ids="0,1">
      <mt:if name="__first__">
        <p>
        「<mt:var name="query" escape>」の検索結果( <mt:var name="search_hit">件ヒットしました )
        </p>
    <ul class="list-unstyled"></mt:if>
      <mt:if name="estraier_thumbnail_square">
        <mt:var name="estraier_thumbnail_square" setvar="thumbnail_url">
      <mt:else>
        <mt:setvarblock name="thumbnail_url"><mt:var name="theme_static">website/images/no-image.png</mt:setvarblock>
      </mt:if>
      <li class="mb-2"><div class="d-flex"><div class="thumbnail"><img src="<mt:var name="thumbnail_url" escape>" width="80"  height="80" alt=""></div>
      <div><a href="<mt:var name="estraier_uri" escape>"><strong><mt:var name="estraier_title" escape></strong></a>
      <p class="snippet"><mt:var name="estraier_snippet"></p></div></div>
      </li>
    <mt:if name="__last__"></ul>
      </mt:if>
    </mt:estraiersearch>
    <mt:if name="query">
    <mt:unless name="search_hit">
    <p>「<mt:var name="query" escape>」にマッチするページはありませんでした。</p>
    </mt:unless>
    </mt:if>

## ページネーションのビュー

    <mt:if name="estraier_pagertotal" gt="1">
    <mt:for from="1" to="$estraier_pagertotal">
    <mt:if name="__first__">
    <nav aria-label="ページネーション">
      <ul>
        <li>
          <a aria-label="先頭へ" href="<mt:var name="current_archive_url">?query=<mt:var name="query" escape encode_url="1"><mt:if name="request.and_or">&amp;and_or=<mt:var name="request.and_or" escape></mt:if>">
            &laquo;
          </a>
        </li>
        <mt:if name="request.offset">
          <a aria-label="前へ" href="<mt:var name="current_archive_url">?query=<mt:var name="query" escape encode_url="1">&amp;offset=<mt:var name="estraier_prevoffset"><mt:if name="request.and_or">&amp;and_or=<mt:var name="request.and_or" escape></mt:if>">
            &lsaquo;
          </a>
        </mt:if>
    </mt:if>
        <li class="<mt:if name="__value__" eq="$estraier_currentpage"> active</mt:if>">
          <mt:var name="search_offset" value="$__index__">
          <mt:var name="search_offset" op="*" value="$estraier_limit">
          <a href="<mt:var name="current_archive_url">?query=<mt:var name="query" escape encode_url="1">&amp;offset=<mt:var name="search_offset"><mt:if name="request.and_or">&amp;and_or=<mt:var name="request.and_or" escape></mt:if>"><mt:var name="__value__"></a>
        </li>
    <mt:if name="__last__">
        <mt:if name="estraier_nextoffset">
          <a aria-label="次へ" href="<mt:var name="current_archive_url">?query=<mt:var name="query" escape encode_url="1">&amp;offset=<mt:var name="estraier_nextoffset"><mt:if name="request.and_or">&amp;and_or=<mt:var name="request.and_or" escape></mt:if>">
            &rsaquo;
          </a>
        </mt:if>
        <li>
          <mt:var name="search_offset" value="$estraier_pagertotal">
          <mt:var name="search_offset" op="-" value="1">
          <mt:var name="search_offset" op="*" value="$estraier_limit">
          <a aria-label="最後へ" href="<mt:var name="current_archive_url">?query=<mt:var name="query" escape encode_url="1">&amp;offset=<mt:var name="search_offset">">
            &raquo;
          </a>
        </li>
      </ul>
    </nav>
    </mt:if>

## レコメンドAPIアプリケーション

    <アプリのURL>/plugins/SearchEstraier/app/pt-recommend-api.php

必要に応じて別の場所に移動してください。

- URLをAPIに渡すことで、関連性の高い文書を表示させたり、ユーザーの興味・関心にマッチする文書をレコメンドできます。  
- 閲覧ユーザーの興味・関心の基準となるのは閲覧したページのモデルに関連づいた「タグ」「メタデータ」metaタグ\(keywords\)です。  
- これらのメタデータを数多く指定することによってマッチングの精度を高くすることができます。
- 興味・関心の保存にはクッキーを利用します。
- システム、スペースなどのスコープ毎にクッキーを別名で保存したい時は、プラグイン設定で「クッキーをスコープ固有にする」にチェックを入れてください。

### パラメタ

    pt-recommend-api.php?url=<mt:var name="current_archive_url" escape="url">&workspace_ids=0,1&type=interest&limit=5&model=page

- url=urlencode\(URL\) \(呼び出し元ページのURL。URLがインデックスされているドキュメントでない場合、エラーとなります。\)
- type=interest ※\(このパラメタを付けるとユーザーの閲覧履歴からお勧めするページのリストを返します。\)
- workspace\_ids=0,1 \(検索対象とするworkspace\_id をカンマ区切りで指定します。\)
- workspace\_id=0 \(検索対象とするworkspace\_id が一つの時、数字を指定します。また、特定スコープのプラグイン設定を適用する場合、workspace\_idsとは別にこのパラメタを指定します。\)
- limit=5 \(検索する件数を指定します。\)
- model=model\_name \(特定のモデルを指定する時に追加します。\)
- exclude\_models=model1,model2 \(特定のモデルを除外する時に追加します。\)
- relative=1 \(URLをルート相対パスで返却する場合に追加します。\)

※ typeパラメタに渡せるのは、similar\(類似\)、interest\(閲覧履歴による興味関心\)、both\(その両方\)です。

### サンプル・レスポンス \(JSON形式\)

    {"interest":[{"snippet":"フォーム機能で作成した設問に対するカスタム・バリデーションをプラグインで作成することができます... ",
                  "uri":"https:\/\/powercmsx.jp\/about\/form_validation_plugin.html",
                  "author":"Junnama Noda",
                  "cdate":"2019-04-01T15:23:27Z",
                  "description":"PowerCMS Xは日本国内で導入実績 3,000 サイトを超える、高性能・高機能...",
                  "digest":"79eff0c3f31662ac08078d4dc028f52b",
                  "extracted":"バリデーション,フォーム,テキスト,フィールド",
                  "mdate":"2019-04-01T15:23:21Z",
                  "metadata":"設問の作成画面,生成された設問,CustomValidation.zip (4KB),About PowerCMS X,ドキュメント",
                  "mime_type":"text\/html",
                  "model":"page",
                  "object_id":"530",
                  "site_name":"PowerCMS X",
                  "tags":"ドキュメント",
                  "thumbnail":"https:\/\/powercmsx.jp\/assets\/thumbnails\/thumb-400xauto-174-file.png",
                  "thumbnail_square":"https:\/\/powercmsx.jp\/assets\/thumbnails\/thumb-400xauto-square-174-file.png",
                  "title":"フォームのバリデーション・プラグインの作成",
                  "workspace_id":"1"}],
     "similar":[{"snippet":"静的に生成されたオブジェクトの一覧ページに特定のパラメタを付与することで、動的ページネーションを実装できます... ",
                 "uri":"https:\/\/powercmsx.jp\/about\/pagination.html",
                 "author":"Junnama Noda",
                 "cdate":"2019-01-07T11:00:00Z",
                 "description":"静的(スタティック)ページ作成をベースとしながら、サイト内検索やページネーション、ログインが必要な会員サイト、フォームへの投稿など...",
                 "digest":"eb0fab9d404cc063d093f1df6e092c7d",
                 "extracted":"ページネーション",
                 "mdate":"2019-01-07T11:15:08Z",
                 "metadata":"ページネーション(スクリーンショット),About PowerCMS X,ドキュメント",
                 "mime_type":"text\/html",
                 "model":"page",
                 "object_id":"400",
                 "site_name":"PowerCMS X",
                 "tags":"ドキュメント",
                 "thumbnail":"https:\/\/powercmsx.jp\/assets\/thumbnails\/thumb-400xauto-153-file.png",
                 "thumbnail_square":"https:\/\/powercmsx.jp\/assets\/thumbnails\/thumb-400xauto-square-153-file.png","title":"ページネーション",
                 "workspace_id":"1"}]}

### レスポンスからお勧めページを表示させるビューのサンプル \(jQueryを利用\)

    <mt:ignore>Move style elements into the head element.</mt:ignore>
    <style type="text/css">
    .recommend-list li:first-child { border-top: 1px solid #ccc; }
    .recommend-list_item { border-bottom: 1px solid #ccc; padding: 10px 10px 10px 0; }
    .recommend-list_item img { border: 1px solid #ccc; }
    .recommend-link{ display: block; overflow: hidden;  text-overflow: ellipsis; }
    .recommend-thumbnail{ min-width : 50px; margin-right: 10px; }
    .recommend-date{ color: #777; font-size: 90%; }
    </style>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div id="similar-list-wrapper" style="display:none;">
            <h2 class="font-weight-normal"><small>関連性の高いページ</small></h2>
            <ul id="similar-list" class="list-unstyled ml-0 recommend-list">
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div id="interest-list-wrapper" style="display:none">
            <h2 class="font-weight-normal"><small>あなたへのお勧め</small></h2>
            <ul id="interest-list" class="list-unstyled ml-0 recommend-list">
            </ul>
          </div>
        </div>
      </div>
    </div>
    <script>
    $(function(){
        $.ajax({
            url: '<mt:property name="path">plugins/SearchEstraier/app/pt-recommend-api.php?type=both&limit=4&url=<mt:var name="current_archive_url" escape="url">',
            type: 'GET',
            dataType: 'json',
            timeout: 10000,
            success: function( responce ){
                similar = responce.similar;
                append_recommend( similar, 'similar' );
                interest = responce.interest;
                append_recommend( interest, 'interest' );
            },
            error: function(){
                // error
            }
        });
    });
    function append_recommend( recommend, target ){
        if ( recommend.length > 0 ) {
            for(let k in recommend) {
                var uri = recommend[k].uri;
                var title = recommend[k].title;
                var thumbnail = recommend[k].thumbnail_square;
                if (! thumbnail ) {
                    thumbnail = '<mt:var name="theme_static">website/images/no-image.png';
                }
                var cdate = recommend[k].cdate;
                cdate = cdate.replace('T', ' ');
                cdate = cdate.replace('Z', '');
                cdate = cdate.replace( /:[0-9]{2}$/, '');
                cdate = '<mt:trans phrase="Publish Date"> : ' + cdate;
                var link = $('<a>', { text : title, href : uri, class : 'recommend-link' });
                var flex_wrapper = $('<div>', { class : 'd-flex' } );
                var litag = $('<li>', { class : 'recommend-list_item' });
                var img = $('<img>', { src : thumbnail, alt: '', width: 50, height : 50 });
                var thumb_wrapper = $('<div>', { class : 'recommend-thumbnail' } );
                var link_wrapper = $('<div>', { class : 'recommend-link-wrapper' } );
                var date_wrapper = $('<span>', { text : cdate, class : 'recommend-date' });
                link_wrapper.append(link);
                thumb_wrapper.append(img);
                flex_wrapper.append(thumb_wrapper);
                link_wrapper.append(date_wrapper);
                flex_wrapper.append(link_wrapper);
                litag.append(flex_wrapper);
                $('#'+target+'-list').append(litag);
            }
            $('#'+target+'-list-wrapper').show();
        }
    }
    </script>