# AxeRunnerプラグイン

## 概要

axe\-core\(アックスコア\)を利用したアクセシビリティ自動検証機能を提供します。

具体的には、PHPを実行すると URLモデルから MIMEタイプが`text/html`であるURLを収集し、1URLずつ Node\.jsのプログラムに渡します。  
Node\.jsのプログラムはヘッドレスブラウザを起動して指定 URLのレンダリングを行い、アクセシビリティ検証のためのスクリプトを実行します。

- チェックした結果はページごとに `axe_core_result`モデル\(A11Y検証結果\)のオブジェクトとして保存されます。
- レポートは管理画面で確認できる他、CSVファイルにエクスポートすることもできます。
- チェックチェッカの一覧画面にエラーの上位項目のサマリを表示します。
- チェック結果はワークフロー機能に対応しています。
- プラグイン「NuHtmlChecker」が有効の時、検証結果のページから HTMLに対するチェックを行うことができます。
- プラグイン「HTML\_CodeSniffer」が有効の時、検証結果のページから、ブラウザ上で HTML\_CodeSnifferによるチェックを行うことができます。

## 準備

### Node\.jsの準備

[nvm](https://github.com/nvm-sh/nvm)や[nodenv](https://github.com/nodenv/nodenv)を利用して Node\.jsをインストールしてください。

- Node\.jsバージョン14以降が必要です
- `/usr/local/bin`などログインユーザー以外\(apacheユーザー等\)でもアクセス可能なディレクトリにインストールしてください

### 環境変数の設定と依存モジュールのインストール

`config.json`に環境変数`node_path`を追加し、`node`へのパスを記述します。\(パスはコマンド`which node`で確認します。\)以下に記述例を示します。
`axerunner_module_path`に指定したディレクトリに`powercmsx/plugins/AxeRunner/node_app/a11ycheck`をコピー、ディレクトリへ移動し、`npm i`コマンドで依存モジュールのインストールを実施します。
<pre>
"config_settings": {
    "php_binary": "/usr/bin/php",
    "axerunner_list_limit" : 10,
    "axerunner_module_path" : "/var/www/powercmsx/support/a11ycheck",
    "node_path": "/usr/local/nvm/versions/node/v16.15.1/bin/node"
}
</pre>

※ `axerunner_list_limit`には、自動検証後のサマリレポートに表示する上位の項目の件数を指定します。初期値は 10です。
※ プラグインが更新され、依存モジュールのバージョンがアップデートされた場合は`a11ycheck`ディレクトリで再度`npm i`コマンドを実行します。

### 自動実行の設定

システムプラグイン設定で、以下の設定を行ってください。

- タスクを実行する曜日 : 実行する曜日にチェックを入れてください。
- 実行時刻 : 実行時刻\(1日に1回だけ実行されます\)。
- 検査の対象 : 追加されたページのみを対象にする場合にチェックを入れます。
- スコープのID : 検証の対象とするスコープのID\(数値\)をカンマ区切りで指定してください。省略時はすべてを検証の対象とします。

### cronの設定

スケジュールタスクとは別に cronで指定日時にアクセシビリティ検証を実行するように設定することもできます。以下に記述例を示します。

<pre>
1 3 * * 6 apache cd /var/www/powercmsx && php ./plugins/AxeRunner/tools/axeRunner.php

</pre>

- オプション`--workspace_ids`でスペースの IDを指定できます\(カンマ区切りの数字\)。
- オプション`--urlinfo_ids`で URLオブジェクトのIDを指定できます\(カンマ区切りの数字\)。
- オプション`--only_newer`で未検証の URLのみを対象にすることができます。
- オプション`--silence`で標準出力をストップします。

### URL一覧画面からの検証の実行

- URLの一覧画面でシステムフィルタ「有効なHTMLのURL」を適用します。
- 検証対象の URLにチェックを入れて、アクション「axe-coreによるA11Y検証」を実行します。検証はバックグラウンドで実行されます。

## その他のプラグイン設定

- HTTP認証 ユーザー名 : URLにアクセスする際に必要な HTTP認証のユーザー名を指定します。
- HTTP認証 パスワード : URLにアクセスする際に必要な HTTP認証のパスワードを指定します。
- Digest認証 : HTTP認証が Digest認証の時、チェックします。
- 自動検証後にアサインするユーザーのID : ワークフローを利用する時、自動検証後にアサインするユーザーの IDを指定します。
- 検証終了後にメールを送信する : アサインしたユーザーに検証終了を知らせるメールを送信する場合にチェックします。※
- サイトクロール用メンバーのID\(システムスコープのみ・全ワークスペースで利用\) : URLにアクセスする際に必要なメンバーの IDを指定します。
- 対象とするWCAGレベル : 検証対象とするWCAG 2\.xのレベルを指定します。
- 除外する達成基準 : 除外する達成基準をカンマ区切りで入力してください\(例 : `1.1.1,1.2.1`)。
- 除外するURL : 1行に1URLを指定します。URL、部分一致または正規表現\(正規表現のデリミタは「!」\)。
- 違反の項目のみ表示 : 「要確認」\(人の手で検証が必要な項目\) を表示しない場合は「はい」を選択します。
- レポートの言語 : レポートの言語を選択します。スコープごとに異なる言語を指定している場合、一覧画面の上位項目のサマリの言語が混在することがあります。

※ メールのテンプレートは、`powercmsx/plugins/plugins/AxeRunner/tmpl/email/axe_core_result.tmpl`が使われます。  
※ メールテンプレートのカスタマイズについては [メールテンプレートのカスタマイズドキュメント](https://powercmsx.jp/about/email_tmpl.html)を参照してください。

## トラブルシューティング

### PHP Fatal error:  Uncaught Exception: App Property `node_path` required.エラーが出る

<pre>PHP Fatal error:  Uncaught Exception: App Property `node_path` required. in /var/www/powercmsx/plugins/AxeRunner/tools/axeRunner.php:121
Stack trace:
#0 /var/www/powercmsx/plugins/AxeRunner/tools/axeRunner.php(177): AxeRunnerWorker->exec_axe_core()
#1 /var/www/powercmsx/plugins/AxeRunner/tools/axeRunner.php(183): AxeRunnerWorker->run(Array)
#2 {main}
  thrown in /var/www/powercmsx/plugins/AxeRunner/tools/axeRunner.php on line 121
</pre>

本ドキュメント「準備」の中の「環境変数の設定」を参照し、環境変数の設定をしてください。

### `npm i`で依存モジュールのインストールを行う際にエラーが出る

<pre># npm i
npm ERR! code 127
npm ERR! path /var/www/powercmsx/plugins/AxeRunner/node_app/a11ycheck/node_modules/puppeteer
npm ERR! command failed
npm ERR! command sh -c node install.js
npm ERR! sh: node: コマンドが見つかりません</pre>

インストールの途中でnodeへのパスが見つからないことが原因です。nodeのインストール・パス設定を見直してください。

### Cannot find module 'puppeteer'エラーが出る

<pre>node:internal/modules/cjs/loader:936
  throw err;
  ^

Error: Cannot find module 'puppeteer'
Require stack:
- /var/www/powercmsx/plugins/AxeRunner/node_app/a11ycheck/app.js
    at Function.Module._resolveFilename (node:internal/modules/cjs/loader:933:15)
    at Function.Module._load (node:internal/modules/cjs/loader:778:27)
    at Module.require (node:internal/modules/cjs/loader:1005:19)
    at require (node:internal/modules/cjs/helpers:102:18)
    at Object.<anonymous> (/var/www/powercmsx/plugins/AxeRunner/node_app/a11ycheck/app.js:1:19)
    at Module._compile (node:internal/modules/cjs/loader:1103:14)
    at Object.Module._extensions..js (node:internal/modules/cjs/loader:1155:10)
    at Module.load (node:internal/modules/cjs/loader:981:32)
    at Function.Module._load (node:internal/modules/cjs/loader:822:12)
    at Function.executeUserEntryPoint [as runMain] (node:internal/modules/run_main:77:12) {
  code: 'MODULE_NOT_FOUND',
  requireStack: [
    '/var/www/powercmsx/plugins/AxeRunner/node_app/a11ycheck/app.js'
  ]
}</pre>

本ドキュメント「準備」の中の「依存モジュールのインストール」を参照し、インストールを実行してください。

### error while loading shared librariesエラーが出る

<pre>Error: Failed to launch the browser process!
var/www/powercmsx/plugins/AxeRunner/node_app/a11ycheck/node_modules/puppeteer/.local-chromium/linux-1002410/chrome-linux/chrome: error while loading shared libraries: libatk-bridge-2.0.so.0: cannot open shared object file: No such file or directory</pre>

OSにライブラリのインストールが必要です。`yum whatprovides libatk-bridge-2.0.so.0`等でどのライブラリが必要かを特定し、`yum install [ライブラリ名]`でインストールしてください。

### chrome\_crashpad\_handler: --database is requiredエラーが出る

<pre>/var/www/powercmsx/support/a11ycheck/node_modules/@puppeteer/browsers/lib/cjs/launch.js:267
                reject(new Error([
                       ^

Error: Failed to launch the browser process!
chrome_crashpad_handler: --database is required
Try 'chrome_crashpad_handler --help' for more information.
[618210:618210:0416/160041.612838:ERROR:socket.cc(120)] recvmsg: Connection reset by peer (104)</pre>

Amazon Linux 2023等でChromiumではなくChrome for Linuxをインストールした場合、`a11ycheck/`ディレクトリに`.env`ファイルを作成し、下記のように記述してください。

<pre>CHROME=1</pre>

## axe\-coreについて

- axe\-coreは GitHubの[dequelabs / axe-core](https://github.com/dequelabs/axe-core)にて提供されているアクセシビリティ検証エンジンです。
- axe\-coreのライセンスはこちら[axe-core/LICENSE](https://github.com/dequelabs/axe-core/blob/develop/LICENSE)