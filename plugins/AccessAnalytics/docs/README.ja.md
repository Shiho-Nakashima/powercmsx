# AccessAnalyticsプラグイン

## 概要

アクティビティを記録し ランキング出力を可能にします。

## 設置とインストール

- pluginsディレクトリに AccessAnalyticsディレクトリを設置します。
- システムのプラグインの管理画面で、AccessAnalyticsにチェックを入れて有効化します。
- スキーマ管理画面から「activity」モデルと「searchword」モデルを選択してアップグレードします。

## プラグイン設定

- アプリのURL : pt\-accessanalytics\.phpのURLを入力します。アプリへのリクエストがあったときに指定がなければ自動で設定されます。
- 集計期間 \(日\) : アクティビティの一覧画面とページビューレポートに表示されるレポートの期間を日で指定します\(初期値30\)。
- ランキングの表示件数 : アクティビティの一覧画面に上位表示する件数を指定します\(初期値10\)。
- 除外する IPアドレス \(カンマ区切り\) : アクティビティの除外対象のIPアドレスをカンマ区切りで指定します\(システムのみ\)。
- 除外する User\-Agent \(カンマ区切り\) : アクティビティの除外対象の User\-Agentの部分文字列をカンマ区切りで指定します\(システムのみ\)。

## アプリケーション

    http://example.com/powercmsx/plugins/AccessAnalytics/app/pt-accessanalytics.php

必要に応じて別の場所に移動してください。  
移動した場合は環境変数「accessanalytics\_app\_url」にURLを追加するか、プラグイン設定の「アプリのURL」にURLを指定してください。  
プラグイン設定がある場合は常にそちらが優先されます。

## アプリケーションの呼び出し方

    pt-accessanalytics.php?lang=言語&url=URLエンコードされたURL&referrer=URLエンコードされたリファラ

ファンクションタグ「mt:accesstracking」を利用すると以下のコードがビルドされたものが出力されます。

    <script>
    var trackingURL="<mt:var name="app_url">?<mt:if name="language">lang=<mt:var name="language" escape=js>&uri="+encodeURIComponent(location.href);
    trackingURL+="&referrer="+encodeURIComponent(document.referrer);
    var req=new XMLHttpRequest();req.open('GET', trackingURL, true);
    req.send(null);
    <noscript>
    <iframe src="<mt:var name="app_url">?<mt:if name="language">lang=<mt:var name="language" escape=html>&</mt:if>uri=<mt:var name="current_archive_url" escape="url">" height="0" width="0" style="display:none;visibility:hidden">
    </iframe>
    </noscript>
    </script>

- download=1 パラメタを付与するとアクティビティを保存してからデータをダウンロードさせることができます。

## 記録されるもの

- ページへのアクセス
- サイト内検索
- フォームへのコンタクトの投稿
- コメント
- 会員サイトへのログイン
- 会員サイトへのログアウト
- ダウンロード

### テンプレート・タグ

### ブロックタグ

<b>mt:rankedobjects</b>

アクセスの多い順にオブジェクトをループ出力します。ループの中ではオブジェクトのコンテキストがセットされます。  
<b>このタグは LivePreview には対応していません。</b>

<em>予約変数</em>

- <b>*\_\_model\_\_*</b> : オブジェクトのモデル名
- <b>*\_\_first\_\_*</b> : ループの初回に1がセットされます
- <b>*\_\_last\_\_*</b> : ループの最終回に1がセットされます
- <b>*\_\_odd\_\_*</b> : ループの奇数回に1がセットされます
- <b>*\_\_even\_\_*</b> : ループの偶数回に1がセットされます
- <b>*\_\_counter\_\_*</b> : ループのカウンター\(1から始まる\)
- <b>*\_\_index\_\_*</b> : 'var'属性が与えられた時、ループのカウントがセットされます
- <b>*\_\_total\_\_*</b> : ループの総回数がセットされます\(配列またはオブジェクトの数\)

<em>セットされる変数</em>

- <b>*object_id*</b> : オブジェクトのID
- <b>*object_label*</b> : オブジェクトのプライマリカラムの値
- <b>*object_url*</b> : オブジェクトのURL
- <b>*object_count*</b> : アクセス数の集計
- <b>*object_model*</b> : オブジェクトのモデル名
- <b>*object_table*</b> : オブジェクトのモデルのラベル名

<em>タグ属性</em>

- <b>*models*</b> : モデル名の配列またはカンマ区切りテキスト
- <b>*period*</b> : 集計期間\(YmdHis 形式のタイムスタンプまたは last[n]days / last[n]weeks / last[n]months / last[n]years\)
- <b>*period\_end*</b> : 集計期間の終わり\(YmdHis 形式のタイムスタンプまたは last[n]days / last[n]weeks / last[n]months / last[n]years\) 省略時は現在時刻となります
- <b>*class*</b> : アクティビティオブジェクトのクラス名\(省略時「Page View」\)
- <b>*prefix*</b> : 変数のプレフィックス\(省略時'object'\)
- <b>*limit*</b> : 表示する件数\(数値\)
- <b>*min\_count*</b> : n件以上のアクセスのみを出力する
- <b>*glue*</b> : 繰り返し処理の際に指定された文字列で各ブロックを連結する
- <b>*include\_draft*</b> : オブジェクトが'status'カラムを持つ時、公開されていない下書きなどのオブジェクトを含む
- <b>*include\_workspaces*</b> : オブジェクトに'workspace\_id'カラムが存在する時、指定のスペースに存在するオブジェクトに絞り込む\(カンマ区切りの数字または'this'または'all'または'children'\)
- <b>*exclude\_workspaces*</b> : オブジェクトに'workspace\_id'カラムが存在する時、指定のスペースに存在しないオブジェクトに絞り込む\(カンマ区切りの数字\)
- <b>*workspace\_id*</b> : スペースIDでの絞り込み
- <b>*workspace\_ids*</b> : 'include\_workspaces'のエイリアス

<b>mt:rankedkeywords</b>

検索キーワードを検索された回数順にループ出力します。

<em>予約変数</em>

- <b>*\_\_first\_\_*</b> : ループの初回に1がセットされます
- <b>*\_\_last\_\_*</b> : ループの最終回に1がセットされます
- <b>*\_\_odd\_\_*</b> : ループの奇数回に1がセットされます
- <b>*\_\_even\_\_*</b> : ループの偶数回に1がセットされます
- <b>*\_\_counter\_\_*</b> : ループのカウンター\(1から始まる\)
- <b>*\_\_index\_\_*</b> : 'var'属性が与えられた時、ループのカウントがセットされます
- <b>*\_\_total\_\_*</b> : ループの総回数がセットされます\(配列またはオブジェクトの数\)

<em>セットされる変数</em>

- <b>*object_keyword*</b> : キーワード\(アルファベットについては小文字に揃えられます\)
- <b>*object_count*</b> : 検索数の集計

<em>タグ属性</em>

- <b>*period*</b> : 集計期間\(YmdHis 形式のタイムスタンプまたは last[n]days / last[n]weeks / last[n]months / last[n]years\)
- <b>*period\_end*</b> : 集計期間の終わり\(YmdHis 形式のタイムスタンプまたは last[n]days / last[n]weeks / last[n]months / last[n]years\) 省略時は現在時刻となります
- <b>*prefix*</b> : 変数のプレフィックス\(省略時'object'\)
- <b>*limit*</b> : 表示する件数\(数値\)
- <b>*min\_length*</b> : n文字以上のキーワードのみを出力する
- <b>*min\_count*</b> : n件以上検索されたキーワードのみを出力する
- <b>*glue*</b> : 繰り返し処理の際に指定された文字列で各ブロックを連結する
- <b>*include\_workspaces*</b> : オブジェクトに'workspace\_id'カラムが存在する時、指定のスペースに存在するオブジェクトに絞り込む\(カンマ区切りの数字または'this'または'all'または'children'\)
- <b>*exclude\_workspaces*</b> : オブジェクトに'workspace\_id'カラムが存在する時、指定のスペースに存在しないオブジェクトに絞り込む\(カンマ区切りの数字\)
- <b>*workspace\_id*</b> : スペースIDでの絞り込み
- <b>*workspace\_ids*</b> : 'include\_workspaces'のエイリアス

### ファンクションタグ

<b>mt:accesstracking</b>

アクティビティを記録します。静的出力時はJavaScriptコードを出力します。

<em>タグ属性</em>

- <b>*url*</b> : JavaScriptコードを生成せずにトラッキングPHPプログラムのURLを出力する
- <b>*relative*</b> : URLをルート相対パスに変換する
- <b>*language*</b> : Webページの言語を指定
- <b>*lang*</b> : 'language'のエイリアス