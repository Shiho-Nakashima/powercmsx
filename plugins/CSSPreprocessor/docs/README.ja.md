# CSSPreprocessorプラグイン

## 概要

CSS PreprocessorのコードをCSSにコンパイルします。

### 準備

利用にあたっては composer で必要な PHPライブラリのインストールと、サーバーへのコマンドのインストールが必要です。

#### Sass / SCSS

Sassのインストールが予め必要です。

環境変数「csspreprocessor\_sass\_cmd」に実行エンジンを指定してください\(初期値「Dart」\)。
環境変数「csspreprocessor\_sass\_path」に Sassのパスを指定してください\(初期値「/usr/local/bin/sass」\)。

    "csspreprocessor_sass_cmd" : "Dart",
    "csspreprocessor_sass_path" : "/usr/local/bin/sass",

プラグイン設定で「CSSコードを圧縮する」を指定している時、デフォルトではプレビュー時にはコード圧縮されません。  
コード圧縮を行うには、以下の環境変数を指定してください。

    "csspreprocessor_minify_preview" : true,

#### プラグインの有効化時にエラーが出る場合

<b>Sassが'/usr/local/bin/sass'にインストールされていません。</b>

Sassのパスを環境変数「csspreprocessor\_sass\_path」に指定してください。

<b>環境変数'csspreprocessor\_sass\_cmd'に'Ruby'を指定してください。</b>

インストールされているのが Rubyによる Sassのため、環境変数「csspreprocessor\_sass\_cmd」に'Ruby'を指定してください。

<b>Sassを利用せず、Less/Stylusのみを利用する場合</b>

以下の環境変数を指定してください。

    "csspreprocessor_use_sass" : false,

#### Less

composer で wikimedia/less\.php をインストールします。

    $ composer require wikimedia/less.php

環境変数「composer\_autoload」にcomposerでインストール時に生成された autoload\.phpのパスを指定します。
composer\_autoloadのパスは他のプラグインと共通でなければなりません。

#### Stylus

Stylusのインストールが予め必要です。

    $ npm i -g stylus

環境変数「csspreprocessor\_stylus\_path」に「Stylus」のパスを指定してください。

    "csspreprocessor_stylus_path" : "/Users/alfasado/.nodebrew/current/bin/stylus"

### コード全体のコンパイル

スコープごとのプラグイン設定でパブリッシュ時にコンパイルを行うかどうかを設定します。

- 自動コンパイル : ビューの「ファイルへのリンク」に指定した拡張子が'sass', 'scss', 'styl', 'less'のいずれかと一致して、出力されるファイルの拡張子が「css」の時に自動的にコンパイルを行います。
- CSSをコード圧縮する : コンパイルした CSSコードを圧縮\(Minify\)します。

### テンプレート・タグによるコンパイル

ブロックタグ「mt:csspreprocessor」が利用可能になります。ビューの中のコンパイルしたい部分をブロックで囲ってください。

#### タグ属性

- type\(必須\) : 'Sass', 'SCSS', 'Less', 'Stylus' のいずれか
- compress : コンパイルした CSSを Minifyするかどうか
