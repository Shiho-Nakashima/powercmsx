# AWS\_CloudFrontプラグイン

<style>
blockquote {
  background-color: #ddd;
  padding: 1em 0.7em 0.7em 3em;
  position: relative;
}
blockquote:before{
  content:'"';
  font-size: 520%;
  line-height: 1em;
  color: #999;
  position: absolute;
  left: 0;
  top:0;
}
h2 {
  margin-bottom: 11px;
}
h3 {
  margin-top: 25px;
  margin-bottom: 11px;
}
h4 {
  border-left: 3px solid #aaa;
  border-bottom: 1px solid #aaa;
  padding: 6px;
}
</style>

## 概要

静的ファイルのパブリッシュ・削除と連動して AWS CloudFront のキャッシュを無効化します。  
AWS\_S3プラグインと併用が可能です。AWS\_S3プラグインと併用する場合、ファイルの更新・削除後に S3へ同期、その後にキャッシュを無効化リクエストを送信します。  
このプラグインは PowerCMS X ver\.2\.6 以上が必要です。  
<b>月間 1,000 パス以上の無効化リクエストには料金が発生します。</b>予算に上限のある場合、<a href="#caution">「無効化リクエストの送信数を減らすために」</a>の内容に従い適切に設定を行ってください。

## 制限事項

このプラグインによって無効化リクエストが送信されるのは PowerCMS X によって出力・削除されたファイルに対してのみとなります。<b>FTPなどで直接設置・削除したファイルは対象外</b>となります。  
また、パラメタ付きURLについては「ルート相対パスとパージ対象パスのマッピング」設定によりクリアできる場合を除き無効化対象とはなりません。

## 設定・環境変数の設定

AWS SDK for PHP をインストールします。パスは include\_path の配下であればどこでも構いません\(autoload\.phpのパスを環境変数 composer\_autoload に指定します\)。

        composer require aws/aws-sdk-php

AWS\_CloudFrontプラグイン用の環境変数を指定します。config\.jsonに記述する場合は、Web経由で config\.jsonにアクセスできないように制限をかけてください。

1. <b>composer\_autoload</b> : composerでインストールしたパスの autoload\.phpのパスを指定します。
1. <b>aws\_cloudfront\_api\_version</b> : 初期値は「2019\-03\-26」です。
1. <b>aws\_cloudfront\_api\_interval</b> : APIコールの実行間隔をミリ秒で指定します。初期値は 1000です。
1. <b>aws\_cloudfront\_bulk\_per</b> : 複数のキャシュの無効化リクエストを送信するとき、1度の APIコールで最大どれだけのパスを送信するかを指定します。初期値は 100です。
1. <b>aws\_cloudfront\_min\_delay</b> : ジョブ・キューの実行待ち時間の最低秒です。初期値は 180秒\(3分\)です。
1. <b>aws\_cloudfront\_job\_delay</b> : ジョブの実行開始までの待ち時間を秒で指定します。初期値は 1800\(30分\)です。この間に同一ファイルが更新された場合、そのファイルの無効化リクエストは1回で済みます\(ver\.2\.0よりジョブとは独立してキューによる実行が可能になりました\)。
1. <b>aws\_cloudfront\_queue\_delay</b> : キューの実行開始までの待ち時間を秒で指定します。初期値は 1800\(30分\)です。この間に同一ファイルが更新された場合、そのファイルの無効化リクエストは1回で済みます。
1. <b>aws\_cloudfront\_ts\_job</b> : ver\.2\.0よりジョブとは独立してキューによる実行が可能になりました。falseを指定するとジョブを作成せずにキューにより実行します。
1. <b>aws\_cloudfront\_maxpurge\_per\_once</b> : 1度の処理\(管理画面操作もしくはスケジュールタスク\)での最大無効化リクエスト数の上限を指定します。この数字を超える無効化リクエストはすべての無効化リクエスト\(「/*」\)にまとめられます。初期値は 15です。
1. <b>aws\_cloudfront\_maxpurge\_per\_month</b> : 月間の無効化リクエスト数の上限を指定します。「\-1」を指定すると上限はなくなります。初期値は 1000です。無効化リクエスト数が月間 1000以内の時、無効化リクエストに対する料金はかかりません。この数値を超えた時、キャッシュはクリアされなくなります。
1. <b>aws\_cloudfront\_realtime\_purge</b> : ファイル更新・削除時に、リアルタイムでキャッシュの無効化リクエストを送信する時に「true」とします。初期値は「false」で、falseの時、処理はキューに登録され、次回の定期実行タスク実行時に行われます。
1. <b>aws\_cloudfront\_purge\_dynamic</b> : ダイナミック・パブリッシング及びファイル出力が「オンデマンド」のアーカイブの更新時にキャッシュの無効化リクエストを送信します。初期値は trueです。
1. <b>aws\_cloudfront\_purge\_directry\_without\_slash</b> : ディレクトリ・インデックスファイル名の設定のある時、「/dirname/index\.html」が更新された時、「/dirname/」とあわせて「/dirname」に対するキャッシュのの無効化リクエストを送信します。初期値は falseです。
1. <b>aws\_cloudfront\_inherit\_S3\_extensions</b> : AWS\_S3プラグインが有効の時、拡張子に関する設定を継承します。初期値は trueです。

        "aws_cloudfront_api_version": "2019-03-26",
        "aws_cloudfront_api_interval" : 1000,
        "aws_cloudfront_min_delay" : 180,
        "aws_cloudfront_job_delay" : 1800,
        "aws_cloudfront_queue_delay" : 1800,
        "aws_cloudfront_ts_job" : false,
        "aws_cloudfront_maxpurge_per_once" : 15,
        "aws_cloudfront_maxpurge_per_month" : 1000,
        "aws_cloudfront_realtime_purge": false,
        "aws_cloudfront_purge_dynamic" : true,
        "aws_cloudfront_purge_directry_without_slash" : false,
        "aws_cloudfront_inherit_S3_extensions" : true

※ <b>「composer\_autoload」の指定がないとプラグインを有効化できません</b>。  
※ 環境変数「denied\_exts」に指定されている拡張子は <a href="https://powercmsx.jp/about/denied_exts.html" target="_blank">環境変数「denied\_exts」の初期値 <i class="fa fa-external-link" aria-hidden="true"></i></a> でご確認ください。
※「aws\_cloudfront\_realtime\_purge」指定のある時も、実際の処理は \_\_destruct \(非同期処理を含むすべての処理が行われた後\) に実行されるため、多少のタイムラグが生じます。  
※「AWS\_S3」をあわせて利用している時、「aws\_cloudfront\_realtime\_purge」指定のある時も、キューによって S3に同期するファイルに対するキャッシュの無効化リクエスト送信は同期時点で行われます。  
※「AWS\_S3」をあわせて利用している時、「aws\_s3\_exclude\_exts」または「denied\_exts」指定の拡張子のファイル更新は無視されます。  
※ 「aws\_cloudfront\_maxpurge\_per\_month」に対する月間の無効化リクエスト数については、ログから算出します。ログが削除されているとコール数の算出が不正確になりますのでご注意ください。また、実際の利用状況と月間の無効化リクエスト数が異なることがありますので、<b>正確な利用状況は必ず <a href="https://ap-northeast-3.console.aws.amazon.com/console/home" target="_blank">AWSのコンソール <i class="fa fa-external-link" aria-hidden="true"></i></a> で確認してください</b>。

## プラグイン設定

プラグインを有効化し、設定を行います。プラグイン設定は、システム、スペースなどのスコープごとに設定します。

- アクセスキー\(システムのみ\) : APIへアクセスするためのアクセスキーを登録します。
- シークレットアクセスキー\(システムのみ\) : APIへアクセスするためのシークレットアクセスキーを登録します。
- システム設定を利用\(スペースのみ\) : システムの設定をスペースで継承する時にチェックします。
- ディストリビューションID : AWS CloudFront のディストリビューションIDを指定します。指定のないスコープでは何の処理も行いません。
- リージョン : リージョンを指定します。初期値は「ap\-northeast\-1」\(東京リージョン\)です。
- 無効化のトリガー : ファイル更新時、ファイル削除時にキャッシュの無効化リクエストを送信するかを指定します。「パスを指定して無効化」を指定すると、プラグイン設定画面でパスを指定して手動で無効化リクエストを送信できます。
- ディレクトリ・インデックスファイル名 : 初期値は「index\.html」で、「/dirname/index\.html」が更新された時、「/dirname/」のキャッシュの無効化リクエストを送信します。
- ディレクトリのみを無効化 : 「/dirname/index.html」が更新された時「/dirname/」のキャッシュのみを無効化し「/dirname/index.html」については無効化を行いません。
- 常に無効化リクエストを送信するパス : 無効化のトリガーの指定の有無にかかわらず、作成・更新・削除時に強制的に無効化リクエストを送信するパスをルート相対パスで指定します。ルート相対パスとパージ対象パスのマッピングにマッチした場合は適用されます。ワイルドカードの指定が可能です。
- ルート相対パスとパージ対象パスのマッピング : 例えば「/search\.html,/search\.html\*」「/contents/\*,/search\.html\*」「\*」を指定することでパラメタ付きリクエストのキャッシュもあわせてクリアすることができます。またはカンマで区切らずに単に「/articles/\*」のように指定できます\(無効化リクエストをまとめることができます\)。
- 除外パターン : ファイル更新・削除時に無効化リクエスト対象外とするルート相対パスのパターンを指定します。例えば「^/page_url.html」「^/dirname/\*」「\.png$」のように指定できます。
- 除外するURLマップID : 除外するURLマップのIDをカンマ区切りで指定します。

## キャッシュがクリアされるタイミング \(設定により異なる\)

- ファイルが更新された時 \(ページの内容に変更があってパブリッシュされた、もしくは上書きアップロードされた時\)
- ファイルが削除された時
- パスを指定して無効化リクエストを送信した時
- task\_ids に「aws\_cloudfront\_purge\_cache」を指定して worker\.php を実行した時
- URL一覧画面の「アクション」から URLを選択して「AWS CloudFront キャッシュ無効化」を実行した時\(複数ファイルを選択して実行した時、リクエストはディストリビューションごとにまとめて送信されます\)

## すべてのキャッシュの無効化リクエストを送信する

task\_ids に「aws\_cloudfront\_purge\_cache」を指定して worker\.php を実行することで、すべてのキャッシュを無効化します。

    cd /path/to/PowerCMSX; sudo -u apache php ./tools/worker.php --verbose --task_ids aws_cloudfront_purge_cache

<h2 id="caution">無効化リクエストの送信数を減らすために</h2>

Amazon CloudFrontの無効化リクエストの利用料金については AWSのドキュメントを参照ください。

- <a href="https://aws.amazon.com/jp/cloudfront/pricing/" target="_blank">料金 - Amazon CloudFront | AWS <i class="fa fa-external-link" aria-hidden="true"></i></a>

<blockquote>1か月に最初の 1,000 件の無効化パスを送信するのは無料です。それ以降は、無効化要求されたパスごとに 0.005 USD が課金されます。(2023年4月現在)</blockquote>

### 予算に上限を設けない場合

環境変数「aws\_cloudfront\_maxpurge\_per\_month」に「\-1」を指定すると、上限なく無効化リクエストを送信します。  
「aws\_cloudfront\_realtime\_purge」を指定すると、キャッシュパージまでの時間が最も短くなります。常に最新の情報を返す必要のあるケースで指定してください。

以下に、無効化リクエストの数を減らして料金が想定外にかからないための設定や運用方法について説明します。

### 予算を設定して無効化リクエストにかかる費用を抑えたい場合のヒント

※「aws\_cloudfront\_maxpurge\_per\_month」に対する月間の無効化リクエスト数はプラグイン設定画面で確認できます。ただし、この数字については、ログから算出します。ログが削除されているとコール数の算出が不正確になりますのでご注意ください。また、実際の利用状況と月間の無効化リクエスト数が異なることがありますので、<b>正確な利用状況は必ず <a href="https://ap-northeast-3.console.aws.amazon.com/console/home" target="_blank">AWSのコンソール <i class="fa fa-external-link" aria-hidden="true"></i></a> で確認してください</b>。

#### トリガーを指定せず「常に無効化リクエストを送信するパス」を個別に指定する

特定のパスのファイル、またはワイルドカードで指定した特定のパス以下が更新された時にのみ無効化リクエストを送信するように設定します。カンマ区切りで数値を追加することでキューの実行開始までの待ち時間\(秒\)を指定できます。  
例えば、

    /index.html,300 => /index.htmlが更新された時、5分後に無効化リクエストを送信する
    /*,300 => 何らかのファイルが更新された時、 5分後に無効化リクエストを送信する

ここで指定した数値\(秒\)はあくまでもキューの開始時刻であり、実際にはスケジュールタスク実行時に処理が行われます。

#### プラグイン設定で「除外パス」を適切に設定する

個別のコンテンツを無効化リクエストから除外するのであれば、たとえば「/contents/\*」「/articles/\*」などのようにワイルドカードを使ってディレクトリ配下のコンテンツを除外します。
「\.php$」のように指定すると拡張子の除外設定も可能です。

#### プラグイン設定「除外するURLマップID」で除外対象を指定する

除外するURLマップのIDをカンマ区切りで指定します。単一コンテンツの更新時にトリガーなどにより多くのファイルが更新される時、日付アーカイブやトップページ以外の一覧系のページなど比較的アクセスの少ないページに指定するとよいでしょう。

#### プラグイン設定の「ルート相対パスとパージ対象パスのマッピング」で無効化リクエストをまとめる

「除外パス」の代わりに「ルート相対パスとパージ対象パスのマッピング」にワイルドカード付きのパスを指定することで、無効化リクエストをまとめることができます。
例えば、カンマで区切らずに単に「/articles/\*」のように指定すると、「/articles/2021/09/entry1\.html」「/articles/2021/09/entry2\.html」が同時に更新された時も無効化リクエストは「/articles/\*」の 1つだけ作成されます。  
最も極端な例では「/\*」のみ設定すれば、コンテンツの更新があったたびに更新ファイルの数にかかわらず 1リクエストのみが作成されます。

#### プラグイン設定で「無効化のトリガー」の設定を状況に応じて変更する

コンテンツの更新などでまとまった作業を行うときは「ファイル更新時」「ファイル削除時」のチェックを外しておき、作業が終わったところで、「/\*」パスを指定して無効化することで無効化リクエストをまとめることができます。

#### キューの開始時間を遅らせる

環境変数「aws\_cloudfront\_queue\_delay」でキューの実行開始までの待ち時間を秒で指定します。初期値は 1800\(30分\)です。この間に同一ファイルが更新された場合、そのファイルのパージのための無効化リクエストは1回で済みます。  
この環境変数を「3600」などと長くすることで、同一ファイルが頻繁に更新される時の無効化リクエストの回数を減らすことができます。


#### 1回あたりの無効化リクエスト数に上限を設ける

環境変数「aws\_cloudfront\_maxpurge\_per\_once」の指定数を超える無効化リクエストは「/\*」にまとめられます。初期値は「15」です。この数字を小さくすることで無効化リクエストの発行回数を減らすことができます。  

※ <b>いずれにしても、無効化リクエストの発行回数とリアルタイムに確実にキャッシュをコントロールすることは相反する要求事項となりますので、コストと効果のバランスを見ながら各パラメタを設定してください。</b>

____

※ AWS、Amazon S3 および CloudFront は、AWS の米国およびその他の国における登録商標です。