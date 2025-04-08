# NuHtmlCheckerプラグイン

## 概要

W3Cのサービスを利用して HTMLの構文チェックを行います。  
プレビューが可能で出力ファイルの MIMEタイプが「text/html」であるオブジェクトの作成・編集画面に「HTMLを検証」ボタンが表示されます。

## 免責事項

- サーバーに検証ツールをインストールしてURLを別途設定しない場合、作成中のコンテンツを外部サービスに送信します。
- 検証結果は <a href="https://validator.w3.org/nu/" target="_blank">Nu Html Checker<i class="fa fa-external-link" aria-hidden="true"></i></a> が生成しており、検証結果の正当性については保証・サポートしません。
- 翻訳結果については <a href="https://powercmsx.jp/contact/support.html" target="_blank">PowerCMS X サポート<i class="fa fa-external-link" aria-hidden="true"></i></a> にフィードバックしてください。

### システムプラグイン設定

- 免責事項への同意 : 作成中のコンテンツを外部サービスに送信することについて同意してください。チェックのない場合、機能は利用できません。
- URL : サーバーに検証ツールをインストールしてURLを別途設定する場合は、そのURLを登録してください。
- 結果を翻訳・整形する : 検証結果をローカライズして、整形したレポートを表示します。
- 結果をキャッシュする : 「結果を翻訳・整形する」設定のある時、統一のHTMLに対する検証結果をキャッシュします。

### 環境変数と初期値

        "nuhtmlchecker_debug" : false,
        "nuhtmlchecker_cache_expires" : 613200

※ nuhtmlchecker\_debug を指定すると、翻訳フレーズに登録のない検証結果をレポートするために inputフィールドを表示します。  
※ nuhtmlchecker\_cache\_expires は検証結果のキャッシュ有効期限です。期限切れキャッシュは定期実行タスクでクリアされるほか、プラグイン設定を保存するとすべてのキャッシュがクリアされます。
