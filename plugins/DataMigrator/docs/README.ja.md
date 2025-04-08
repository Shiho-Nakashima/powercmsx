# DataMigratorプラグイン

## 概要

データ移行機能を提供します。
標準で WordPress\(WXR形式\)と Movable Type\(MT形式\)に対応しています。  
プラグインによって対応フォーマットを追加することができます。

## 有効化

- システムのプラグインの管理画面で、DataMigratorにチェックを入れて有効化します。

## 利用方法

- 対象となるスコープの「ツール <i data-toggle="tooltip" data-placement="right" title="ツール" class="fa fa-plug" aria-hidden="true"></i>」メニューから「データ移行」を選択します。
- フォーマットをドロップダウンから選択します。
- 対象となるモデルを選択します。
- ファイルをドラッグ&ドロップするか、「ファイルを選択\.\.\.」ボタンを押してインポートファイルを選択してアップロードします。
- オプションを設定します。「その他のカラム」については、PowerCMS Xの側は標準フィールドのみ対応しています。
- 「インポート開始」ボタンをクリックして、データ取り込みを行います。

## プラグインによる対応フォーマットの追加

__構成__

    plugins/
     └ CustomImport/ (root)
       ├ config.json (定義ファイル)
       ├ CustomImport.php (プラグイン・クラス)
       ├ tmpl (テンプレート・ファイル)
       │  └ options/
       │    └ customimport.tmpl (ドロップダウン選択時に表示するフォームコントロール)
       └ locale/
          └ ja.json (翻訳ファイル)

__定義ファイル\(config\.json\)__

レジストリ「import\_format」に以下の設定を定義します。

- component : プラグインクラス
- label     : ドロップダウンのラベル\(locale に言語ファイルがあるとき翻訳されます\)
- method    : プラグインクラスのメソッド名
- models    : 対応するモデルの配列
- order     : ドロップダウンの表示順
- options   : customimport\.tmplで追加するフォームコントロール名の配列 ※

※ customimport\.tmplでは、optionsに指定する名前の前に「customimport\_」を追加して name属性値とします。

例 :

    <textarea name="customimport_field_settings" rows="4"></textarea>

__config\.json__

    {
        "label"       : "CustomImport",
        "id"          : "customimport",
        "component"   : "CustomImport",
        "version"     : "1.0",
        "author"      : "Alfasado Inc.",
        "author_link" : "https://alfasado.net/",
        "description" : "It provides data migration function from Custom Import format.",
        "import_format": {
            "customimport": {
                "component"  : "CustomImport",
                "label"      : "CustomImport",
                "method"     : "import_custom_import",
                "models"     : ["entry", "page"],
                "order"      : 40,
                "options"    : ["field_settings", "text_format"]
            }
        }
    }

__CustomImport\.php__

    <?php
    require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );
    
    class CustomImport extends PTPlugin {
    
        function __construct () {
            $app = Prototype::get_instance();
            $app->db->caching = false; // 大量のデータを移行する時はキャッシュオフ
            if ( $max_execution_time = $app->max_exec_time ) {
                $max_execution_time = (int) $max_execution_time;
                ini_set( 'max_execution_time', $max_execution_time ); // タイムアウトの延長
            }
            parent::__construct(); // プラグインの初期化
        }

        function import_custom_import ( $app, $import_files, $session ) {
            // $app = クラス Prototype オブジェクト
            // $import_files = アップロードしたファイルの配列
            // アップロードファイルは1ファイルのみですが、zipファイルをアップロードした時は
            // アーカイブ内のファイルを展開したものが配列に、単一ファイルの場合も、配列で渡されます
            // $session = アップロードファイルの情報をセットした sessionオブジェクト
        
            $migrator = $app->component( 'DataMigrator' ); // クラス DataMigrator オブジェクト
            $import_model = $app->param( 'import_model' ); // ラジオボタンで選択したインポート対象のモデル
            $table = $app->get_table( $import_model );
            if (! $table ) {
                return $app->error( $this->translate( "Unknown model %s.", $import_model ), true );
            }
            $obj_label = $app->translate( $table->plural ); // 記事 or ページ

            // 進捗の表示
            $migrator->print( $this->translate( 'Start import %s...', $obj_label ) );
        
            $text_format = $app->param( 'customimport_text_format' ); // オプションパラメタ
            $field_settings = $app->param( 'customimport_field_settings' );
            
            $workspace_id = (int) $app->param( 'workspace_id' );
        
            // インポート処理
            // $migrator->pause(); // 一時停止 : 開発・デバッグ用
        
            $migrator->end_import( $session, $counter, $obj_label_plural ); // 終了処理
        }
