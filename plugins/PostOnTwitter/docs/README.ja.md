# PostOnTwitter プラグイン

## 概要

記事やページ等のオブジェクト公開時に 𝕏 にツイートする事ができます。

## 有効化

* システムのプラグインの管理画面で PostOnTwitter にチェックを入れて有効化します。
* システムの PostOnTwitter プラグイン設定ダイアログの 𝕏 アプリに関する設定を行います。
* 設定には 𝕏 Apps の登録が必用です。
* システムや各スペースの PostOnTwitter プラグイン設定ダイアログのツイート機能の利用設定を有効にします。

-----

## ツイートを行う

プラグイン設定「ツイート設定: 対象モデル」で選択したモデルのオブジェクト編集画面に、「公開時に 𝕏 へ投稿する」チェックボックスが追加されます。<br>
チェックを入れたオブジェクトが公開された時、連携している 𝕏 アカウントでツイートを行います。

\* ツイートは初回公開時のみ行われます。<br>
\* ツイートされたオブジェクトの編集画面にはツイートを行った日付が表示されます。

-----

## プラグイン設定

### 𝕏 アプリに関する設定

PostOnTwitter プラグインでは 𝕏 API を利用して PowerCMS X から Tiwtter へツイートを行います。

\* 𝕏 アプリが必用となりますので、お持ちでない方は <a href="https://𝕏.com/apps/new" target="_blank">𝕏 アプリの登録 <i class="fa fa-external-link" aria-hidden="true"></i></a> を行ってください。<br>
\* PowerCMS X から投稿するために 𝕏 アプリの設定「Read and write」を選択してください。

システムの PostOnTwitter プラグイン設定で作成した 𝕏 アプリの下記情報を設定します。

* API key
* API secret key

### 共通設定

共通設定を入力しておくことで、システム・スペースの PostOnTwitter プラグイン設定で共通設定を利用できます。<br>
共通設定を利用するか、システム・スペース独自に設定を行うか選択できます。

### ツイート機能の利用設定

システム・スコープ毎に機能の有効/無効が選択できます。

### 𝕏 アカウント設定

ツイートする 𝕏 アカウントの連携をします。

「クリックして Access Token を取得してください」ボタンをクリックし、連携したい 𝕏 アカウントでログインし連携アプリを承認します。

連携が成功すると次の項目に自動で値が設定されます。

* アカウント名
* Access token
* Access token secret

連携を解除するには、チェックボックス「連携を解除する」にチェックを入れてプラグイン設定を保存してください。<br>
PowerCMS X に保存しているデータを削除します。

\* 𝕏 アカウントに保存されている「アプリとセッション」からは削除されませんので、別途 𝕏 にログインして連携解除を行ってください。

### ツイート設定: 対象モデル

優先アーカイブが存在するモデルの一覧から対象のモデルを選択します。

<p class="alert alert-info" role="alert">「対象となるモデルがありません」と表示される場合は、設定しているシステム・スペースに URL マップが存在するか、URL マップの「優先」がチェックされているかを確認してください。</p>

### ツイート設定: ツイートビュー

対象モデルが公開された時にツイートする内容を設定します。

* テンプレート・タグが利用可能です
* 公開されたオブジェクトのパーマリンクが末尾に記載されます（自動）
* ツイート内容が 150 文字を超えた場合は自動的に省略されます

下記予約変数が用意されています。

<div class="table-responsive">
  <table class="table table-striped table-bordered text-nowrap">
    <thead>
      <tr>
        <th>テンプレート変数名</th>
        <th>取得できるデータ</th>
        <th>コードサンプル</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>model</td>
        <td>ツイートするオブジェクトのモデル名</td>
        <td><code>&lt;mt:var name="model"&gt;</code></td>
      </tr>
      <tr>
        <td>model_label</td>
        <td>ツイートするオブジェクトのモデルラベル</td>
        <td><code>&lt;mt:var name="model_label"&gt;</code></td>
      </tr>
      <tr>
        <td>object_id</td>
        <td>ツイートするオブジェクトのID</td>
        <td><code>&lt;mt:var name="object_id"&gt;</code></td>
      </tr>
      <tr>
        <td>object_primary</td>
        <td>ツイートするオブジェクトのプライマリデータ</td>
        <td><code>&lt;mt:var name="object_primary"&gt;</code></td>
      </tr>
    </tbody>
  </table>
</div>

ツイートするオブジェクトのテンプレート・タグを利用できます。

    <mt:for trim_space="1">
      <mt:if name="model" eq="entry">
        <mt:entrytitle>
        <mt:entrycategories glue=","><mt:if name="__first__"> [</mt:if><mt:categorylabel><mt:if name="__last__">]</mt:if></mt:entrycategories>
      <mt:elseif name="model" eq="foo">
        foo ...
      <mt:elseif name="model" eq="bar">
        bar ...
      </mt:if>
    </mt:for>

-----

## テンプレート・タグ

### 条件タグ

#### mt:ifPostOnTwitterEnabled

ツイート機能が有効になっているかを判別します。<br>
タグ属性「workspace_id」に判別対象のスペースの ID を指定可能です ( 省略時は現在のコンテキストのワークスペースになります ) 。

#### mt:ifPostOnTwitterTweetModel

タグ属性「model」に指定したモデルがツイート対象のモデルかを判別します。<br>
タグ属性「workspace_id」に判別対象のスペースの ID を指定可能です ( 省略時は現在のコンテキストのワークスペースになります ) 。