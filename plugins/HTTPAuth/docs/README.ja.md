# HTTPAuthプラグイン

## 概要

管理画面とサイトURLに対して HTTP認証を設定します。

※ 設定を間違えるとログインできなくなる可能性がありますので、設定はよく注意して行なってください。  
※ 管理画面への HTTP認証を失敗すると、管理画面と同様に IPアドレス・ユーザーロックアウトの対象になります。

## 環境変数

- httpauth\_admin\_always : 管理画面へのアクセス時、すでにログイン済みのユーザーに対しても HTTP認証のチェックを実行します。初期値は falseです。

※ この値を trueにすることでよりセキュアになりますが、設定を trueにしている時、管理画面で設定を変更した後に即設定が反映されますので、ご注意ください。

## 管理画面への HTTP認証の設定

- システムプラグイン設定で「管理画面の設定」「認証を設定する」にチェックを入れます。
- 「ログインID」と「利用するパスワード」を設定します。
- 「独自の共通ID」「独自の共通パスワード」を選択した時は、それぞれの値を登録して保存します。
- プラグイン設定後、ブラウザを修了すると次回管理画面へのアクセス時に HTTP認証情報の入力を求められるようになります。

※ 設定を間違えるとログインできなくなる可能性がありますので、注意してください。

### 管理画面の HTTP認証方式

- ユーザー名とユーザーのパスワードを選択した時、Basic認証となります。
- ユーザー名とパスワードに「ユーザーのカラム」を選択した時、カラムが「パスワードハッシュ」型のカラムの時はBasic認証となります。
- 上記以外の時は、Digest認証となります。

## サイトURLへの HTTP認証の設定

- Digest/Basic認証用の「\.htaccess」「\.htdigest」または「\.htpasswd」ファイルを生成します。
- 各スコープでプラグイン設定画面で「ドキュメントルートの設定」「認証を設定する」にチェックを入れます。
- 「認証方式」に入力した値に応じてファイル名が「\.htdigest」または「\.htpasswd」になります。形式を変更した時、作成済みのファイルは削除されませんのでご注意ください。
- 「認証名」に入力した値は \.htaccessの「AuthName」項目にセットされます。
- 「ユーザー名」「パスワード」に入力された値は 「\.htdigest」または「\.htpasswd」に暗号化され、保存されます。
- 「\.htpasswdと\.htaccessを作成する」ボタンをクリックします。

※ 設定を間違えるとログインできなくなる可能性がありますので、注意してください。  
※ 「認証方式」「認証名」以外の値はデータベースには保存されません。  
※「\.htaccess」「\.htpasswd」ファイルが存在する場合は項目を追記しますので注意してください。  
※「\.htaccess」「\.htpasswd」ファイルをビューに登録している場合、ビューを更新してから再構築を行います。変更前のビューはリビジョンとしてバックアップされます。  
※ コメント「\# Generate from HTTPAuth plugin\.」〜「\# /Generate from HTTPAuth plugin\.」を含む時、囲まれた部分を更新します。  

### \.htaccessの例

    # Generate from HTTPAuth plugin.
    AuthUserFile /var/www/html/.htdigest
    AuthName "Please enter your ID and password"
    AuthType Digest
    require valid-user
    # /Generate from HTTPAuth plugin.

### \.htdigestの例

    # Generate from HTTPAuth plugin.
    test:Please enter your ID and password:5d3554478a9797f4988340922f033356
    # /Generate from HTTPAuth plugin.

### \.htpasswdの例

    # Generate from HTTPAuth plugin.
    username:$apr1$FEt4wP44$l5Dc6SUaQtNgHdXcpgAot1
    # /Generate from HTTPAuth plugin.