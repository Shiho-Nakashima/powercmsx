# AWS\_S3プラグイン

## 概要

静的ファイルを Amazon Simple Storage Service\(S3\) に同期します。  
AWS\_CloudFrontプラグインと併用が可能です。AWS\_CloudFrontプラグインと併用する場合、ファイルの更新・削除後に S3へ同期、その後にキャッシュをパージします。  
このプラグインの動作には PowerCMS X ver\.2\.6 以上が必要です。

## 制限事項

このプラグインによって同期されるのは PowerCMS X によって出力・削除されたファイルのみとなります。<b>FTPなどで直接設置・削除したファイルは対象外</b>となります。  
同期処理は 1ファイル単位で行われます。

## 設定・環境変数の設定

AWS SDK for PHP をインストールします。パスは include\_path の配下であればどこでも構いません\(autoload\.phpのパスを環境変数 composer\_autoload に指定します\)。

        composer require aws/aws-sdk-php

AWS\_S3プラグイン用の環境変数を指定します。config\.jsonに記述する場合は、Web経由で config\.jsonにアクセスできないように制限をかけてください。

1. <b>composer\_autoload</b> : composerでインストールしたパスの autoload\.phpのパスを指定します。
1. <b>aws\_s3\_queue\_interval</b> : キューの実行間隔をミリ秒で指定します。初期値は 100 です。aws\_s3\_realtime\_sync 指定のある時も同期処理に指定したミリ秒分の間隔を空けて処理をします。
1. <b>aws\_s3\_realtime\_sync</b> : 管理画面操作時に、リアルタイムで同期する時に「true」とします。初期値は「true」で、falseの時、処理はキューに登録され、次回の定期実行タスク実行時に行われます。
1. <b>aws\_s3\_cache\_max\_age</b> : アップロードしたファイルに対して CacheControl:max\-age を設定します。初期値は 86400\(1日\)です。
1. <b>aws\_s3\_realtime\_maxsize</b> : 「aws\_s3\_realtime\_sync」指定のある時も、このサイズを超えるファイルはキューによって同期されます。初期値は 20971520\(20MB\)です。
1. <b>aws\_s3\_exclude\_exts</b> : 処理対象外の拡張子をカンマ区切りで指定します。指定のない場合は、環境変数「denied\_exts」に指定されている拡張子のファイルが対象外となります。プラグイン設定が指定されているときはそちらが優先されます。
1. <b>aws\_s3\_setting\_by\_scope</b> : スコープごとに個別の設定を許可します。
1. <b>aws\_s3\_pagination\_limit</b> : オブジェクトの一覧画面でページネーションの単位を指定します。
1. <b>aws\_s3\_use\_custom\_mapping</b> : 拡張子ごとに同期するバケットを指定できるようにします。
1. <b>aws\_s3\_use\_list\_caching</b> : バケットのオブジェクト一覧を同一セッションの間キャッシュします。
1. <b>aws\_s3\_task\_exclude\_exts</b> : task\_ids に「aws\_s3\_synchronize\_s3」を指定して worker\.php を実行時に同期を除外する拡張子を指定します。
1. <b>aws\_s3\_use\_mediaconvert</b> : AWS Elemental MediaConvertと連携している時、キューの状態を管理画面で確認できるようにします。
1. <b>aws\_s3\_mediaconvert\_api\_version</b> : AWS Elemental MediaConvertの APIバージョンを指定します。
1. <b>aws\_s3\_modified\_only</b> : バケットに存在するオブジェクトの更新日より新しいもののみを PUT、バケットに存在するオブジェクトがあるもののみ DELETEリクエストを送信します。
1. <b>aws\_s3\_worker\_only</b> : task\_ids に「aws\_s3\_synchronize\_s3」を指定して worker\.php を実行した時のみ同期を実行します。
1. <b>aws\_s3\_max\_list\_actions</b> : URLの一覧画面から同期を実行する時の最大処理数を指定します。指定数を超えたものはキューによって同期が実行されます。
1. <b>aws\_s3\_skip\_rebuild\_phase</b> : ポップアップからの再構築によって更新されたファイルの同期をスキップします。この設定は \-\-task\_idsに「aws\_s3\_synchronize\_s3」を指定して worker\.php を実行して同期することを想定しています。

        "composer_autoload" : "/var/www/PowerCMSX/vendor/autoload.php",
        "aws_s3_queue_interval" : 100,
        "aws_s3_realtime_sync": true,
        "aws_s3_cache_max_age" : 86400,
        "aws_s3_realtime_maxsize": 104857600,
        "aws_s3_exclude_exts" : "",
        "aws_s3_setting_by_scope": false,
        "aws_s3_pagination_limit" : 1000,
        "aws_s3_use_custom_mapping": false,
        "aws_s3_use_list_caching": true,
        "aws_s3_task_exclude_exts": "",
        "aws_s3_use_mediaconvert" : false,
        "aws_s3_mediaconvert_api_version" : "2017-08-29",
        "aws_s3_modified_only" : false,
        "aws_s3_worker_only" : false
        "aws_s3_max_list_actions" : 30,
        "aws_s3_skip_rebuild_phase" : false

※ <b>「composer\_autoload」の指定がないとプラグインを有効化できません</b>。  
※ 環境変数「denied\_exts」に指定されている拡張子は <a href="https://powercmsx.jp/about/denied_exts.html" target="_blank">環境変数「denied_exts」の初期値 <i class="fa fa-external-link" aria-hidden="true"></i></a> でご確認ください。
※「aws\_s3\_realtime\_sync」指定のある時も、実際の処理は \_\_destruct \(非同期処理を含むすべての処理が行われた後\) に実行されるため、多少のタイムラグが生じます。  
※「aws\_s3\_realtime\_sync」指定のある時も、以下の場合はキューによって同期します。

- 同期対象のファイルの容量が 20MB\(環境変数 aws\_s3\_realtime\_maxsize指定値\)を超える時
- PowerCMS Xの処理時間が 50分\(max\_exec\_time \- 10分\)を超えている時

## プラグイン設定

プラグインを有効化し、設定を行います。プラグイン設定は、システム、スペースなどのスコープごとに設定します。

- アクセスキー\(システムのみ\) : APIへアクセスするためのアクセスキーを登録します。
- シークレットアクセスキー\(システムのみ\) : APIへアクセスするためのシークレットアクセスキーを登録します。
- システム設定を利用\(スペースのみ\) : システムの設定をスペースで継承する時にチェックします。
- バケット名 : AWS S3 のバケット名を指定します。指定のないスコープでは何の処理も行いません。
- リージョン : リージョンを指定します。初期値は「ap\-northeast\-1」\(東京リージョン\)です。
- ACL : ACL\(アクセスコントロールリスト\)を指定します。
- 拡張子 : 同期するファイルの拡張子を限定する場合にカンマ区切りで拡張子を指定してください。指定のない場合は環境変数「aws\_s3\_exclude\_exts」または「denied\_exts」に指定のないもので「除外する拡張子」に指定のないものが同期対象となります。\*を指定すると全てのファイルが同期対象となります。
- 除外する拡張子 : 同期しないファイルの拡張子を限定する場合にカンマ区切りで拡張子を指定してください。
- キャッシュ有効期限 : キャッシュの有効期限を秒で指定します。拡張子=秒のカンマ区切りで拡張子毎の有効期限を設定できます\(例:default=86400,png=604800,jpg=604800,webp=604800\)。

## 同期されるタイミング

- ファイルが新規作成された時
- ファイルが更新された時 \(ページの内容に変更があってパブリッシュされた、もしくは上書きアップロードされた時\)
- ファイルが削除された時
- URL一覧画面の「アクション」から URLを選択して「AWS S3へのファイル同期」を実行した時\(削除フラグのあるものは削除、そうでないものはアップロード\)

## すべてのファイルを同期する

task\_ids に「aws\_s3\_synchronize\_s3」を指定して worker\.php を実行することで、すべてのファイル\(除外設定されているものを除く\)をアップロード、削除フラグのあるもの\(除外設定されているものを除く\)については削除します。

    cd /path/to/PowerCMSX; sudo -u apache php ./tools/worker.php --verbose --task_ids aws_s3_synchronize_s3

この時、以下のオプションが指定できます。

- \-\-modified\_only : 更新されているもののみを同期、S3に存在するもののみを削除します。
- \-\-put\_only : PUTのみを実行します。
- \-\-delete\_only : 削除のみを実行します。
- \-\-update\_from : 指定時間以降に更新されているもののみを同期します。引数にタイムスタンプまたは PHPの strtotime関数に渡せる文字列を指定できます\(例 : \-6 hour\)。

## AWS Elemental MediaConvertのジョブの一覧を確認できるようにする

環境変数「aws\_s3\_use\_mediaconvert」を指定するとプラグイン設定画面に「AWS Elemental MediaConvertのカスタムエンドポイント」「AWS Elemental MediaConvertのリージョン」欄が追加されます。  
S3と連携している場合、ここに値を登録すると、JOBのステータス毎に最大 20件の JOBを管理画面から確認できるようになります。

____

※ AWS、Amazon S3 および CloudFront、AWS Elemental MediaConvertは、AWS の米国およびその他の国における登録商標です。