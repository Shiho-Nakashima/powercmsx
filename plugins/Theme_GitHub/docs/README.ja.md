# Theme\_GitHubプラグイン

## 概要

テーマGitHubにコミットします。  
コミットできるのはtheme\.jsonにrepository指定のあるテーマで、現在そのスコープで選択されているテーマです。

## 設定・環境変数の設定

knplabs/github-api をインストールします。パスは include\_path の配下であればどこでも構いません\(autoload\.phpのパスを環境変数 composer\_autoload に指定します\)。

        composer require knplabs/github-api:^3.0 guzzlehttp/guzzle:^7.0.1 http-interop/http-factory-guzzle:^1.0

プラグイン用の環境変数を指定します。config\.jsonに記述する場合は、Web経由で config\.jsonにアクセスできないように制限をかけてください。

- <b>composer\_autoload</b> : composerでのインストール時に生成された autoload\.phpのパスを指定します。
- <b>can\_open\_theme\_dir</b> : ローカル環境で PowerCMS Xを動かしている時、テーマの管理画面で現在のテーマディレクトリを開くボタンを追加します。

composer\_autoloadのパスは他のプラグインと共通でなければなりません。

## プラグイン設定とユーザーごとの設定

プラグインを有効化すると、userモデルに「GitHubアカウント」「GitHub個人トークン」が追加されます。
ユーザーにこれらの設定がある時、コミット時にはこのアカウント/トークンが利用されます。個人の設定がなければプラグイン設定が使われます。  
両方ともに指定のない時、スコープのテーマの個人トークンが使われます。

### プラグイン設定

- GitHubアカウント : GitHubアカウント名
- GitHub個人トークン : GitHubの個人トークン\(Personal access token\)
- \.gitignore : 除外するファイル名のカンマ区切りテキスト

#### スペースプラグイン設定のみ

- システム設定を利用する : スペース独自の設定をせずに、システム設定を継承する場合にチェックしてください。

## テーマをコミットする

theme\.jsonに repository指定がある時、テーマの管理画面の現在選択中のテーマに <button><i class="fa fa-git" aria-hidden="true"></i></button><span class="sr-only"><mt:trans phrase="Commit to GitHub" component="Theme_GitHub"></span> ボタンが表示されます。  
ボタンをクリックするとコミット画面に遷移します。