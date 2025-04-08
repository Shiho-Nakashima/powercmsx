# Feedsプラグイン

## 概要

RSSフィードをパースしてテンプレート変数にセットします。

## 対応しているフィードのフォーマット

- RSS1\.0
- RSS2\.0
- ATOM

## テンプレート・タグ

<mt:ifcomponent component="Feeds">
<mt:ifcomponent component="MTMLReference">
<ul>
<li><a href="<mt:var name="script_uri">?__mode=mtml_reference&query=feed">'feed'を含むタグの一覧</a></li>
</ul>
</mt:ifcomponent>
</mt:ifcomponent>

### ブロックタグ

<b>mt:feed</b>

- uri 属性で指定したフィードの内容を表示するためのブロックタグです。
- タグ属性 : uri=フィードのURL / cache\_ttl=キャッシュする時間\(秒\)

<b>mt:feedentries</b>

- mt:feedブロックタグで指定したフィードの内容を表示するためのブロックタグです。タグ属性で表示件数、表示順を指定できます。
- タグ属性 : limit または lastn=表示件数 / offset=スキップする件数 / sort_order=ascendを指定すると表示順を反対にします
- その他、ループ・ブロックタグ用の予約変数が利用できます。

<b>mt:getxml2vars</b>

- フィード以外のXMLを汎用的に取得してXMLのキーを変数名にしてテンプレート変数に値をセットします。
- タグ属性 : key=取得する配列のキー / \(以降はkey属性指定のある時のみ利用可能\)limit または lastn=表示件数 / offset=スキップする件数 / sort_order=ascendを指定すると表示順を反対にします / prefix=指定した値を変数名の前に追加します。
- その他、ループ・ブロックタグ用の予約変数が利用できます。

<b>mt:getjson2vars</b>

- JSONを取得してJSONのキーを変数名にしてテンプレート変数に値をセットします。
- タグ属性 : key=取得する配列のキー / \(以降はkey属性指定のある時のみ利用可能\)limit または lastn=表示件数 / offset=スキップする件数 / sort_order=ascendを指定すると表示順を反対にします / prefix=指定した値を変数名の前に追加します。
- その他、ループ・ブロックタグ用の予約変数が利用できます。

JSONの例 : 

     {"totalResults":2,"items": [{"title":"PowerCMS X","permalink":"https://powercmsx.jp/"},{"title":"Contact Us","permalink":"https://powercmsx.jp/contact/contact_us.html"}]}

key属性指定のビューの例 :

    <mt:getjson2vars uri="http://powercmsx.jp/test.json" key="items">
    <mt:if name="__first__"><ul></mt:if>
      <li><a href="<mt:var name="permalink" escape>"><mt:var name="title"></a></li>
    <mt:if name="__last__"></ul></mt:if>
    </mt:getjson2vars>

key属性指定なしのビューの例 :

    <mt:getjson2vars uri="http://powercmsx.jp/test.json">
    <mt:loop name="items">
    <mt:if name="__first__"><ul></mt:if>
      <li><a href="<mt:var name="permalink" escape>"><mt:var name="title"></a></li>
    <mt:if name="__last__"></ul></mt:if>
    </mt:loop>
    </mt:getjson2vars>

### ファンクションタグ

<b>mt:feedtitle</b>

- 読み込んだ RSS フィードを持つサイトの名前を表示します。

<b>mt:feedlink</b>

- 読み込んだ RSS フィードを持つサイトの URL を表示します。

<b>mt:feedentrytitle</b>

- 読み込んだ RSS フィードにある個別ページのタイトルを表示します。

<b>mt:feedentrylink</b>

- 読み込んだ RSS フィードにある個別ページの URL を表示します。

<b>mt:feedinclude</b>

- uri 属性で指定した RSS フィードを、あらかじめ決まったフォーマットで表示するためのファンクションタグです。
- 出力フォーマットがあらかじめ決められているため、フィード URL を指定するだけで簡単に表示できます。
- 出力フォーマットは ul タグを使用するリスト形式で、以下のビューのサンプルを記述した場合と同じ内容が出力されます。
- タグ属性 : uri=フィードのURL / cache\_ttl=キャッシュする時間\(秒\) / limit または lastn=表示件数 / offset=スキップする件数 / sort_order=ascendを指定すると表示順を反対にします


## ビューのサンプル

    <mt:feed uri="https://www.metro.tokyo.lg.jp/rss/index.rdf">
    <h2><a href="<mt:feedlink>"><mt:feedtitle></a></h2>
    <ul>
    <mt:feedentries>
      <li><a href="<mt:feedentrylink escape>"><mt:feedentrytitle></a></li>
    </mt:feedentries>
    </ul>
    </mt:feed>

