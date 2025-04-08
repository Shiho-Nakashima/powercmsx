# Keywordsプラグイン

## 概要

登録されたキーワードを自動抽出してリンクをセットします。  
登録されたキーワードを含むオブジェクトの保存時にキーワードカラム、タグ\(またはその両方\)に値をセットします。  
text\(本文\) と excerpt\(概要\)カラムのあるモデルを対象に、text から excerpt を自動生成します。

## 設置とインストール

- pluginsディレクトリに Keywordsディレクトリを設置します。
- システムのプラグインの管理画面で、Keywordsにチェックを入れて有効化します。
- スキーマ管理画面から「keyword」モデルを選択してアップグレードします。

### 環境変数と初期値

keywords\_use\_mecab を trueに設定すると、キーワードの判別に形態素解析器 MeCab を利用します。  
例えば「京都」をキーワードに指定した時「東京都」を対象外とすることができます。

        "keywords_use_mecab" : false,
        "keywords_mecab_path" : "/usr/local/bin/mecab",
        "keywords_estcmd_path" : "/usr/local/bin/estcmd",
        "keywords_mecab_dict_index_path" : "/usr/local/libexec/mecab/mecab-dict-index",
        "keywords_mecab_dic_path" : "/usr/local/lib/mecab/dic/ipadic"

### プラグイン設定

- 自動的にタグをセット : 同一スコープに登録されたキーワードと一致する文字列を含む時、オブジェクトの保存時に自動的にタグをセットします。
- 自動的にキーワードをセット : 同一スコープに登録されたキーワードと一致する文字列を含む時、オブジェクトの保存時に自動的にキーワードをセットします。
- 自動的に概要を生成 : text\(本文\) と excerpt\(概要\)カラムのあるモデルを対象に、text から excerpt を自動生成します。
- 追加文字列 : 作成された概要が設定文字数を超えていた時、指定の文字列を追加します\(例 : \.\.\.\)。

※ タグ、キーワード、概要の自動生成は管理画面からの保存のみに対応しています。データ移行やインポート時には自動でセットされません。  
※ <b>自動的に概要を生成には、Hyper Estraier と MeCab がサーバーにインストールされている必要があります。</b>  
※ モデルがタグ付けに対応していない時、モデルにキーワードカラムがない時、そのモデルに対しては設定できません。  
※ キーワードの抽出については、大文字小文字を区別しません。

### テンプレート・タグ

### ブロックタグ

<b>mt:autokeywords \(mt:keyword2link\)</b>

ブロック内に出現するキーワードに自動的にリンクをセットします。

<em>タグ属性</em>

- <b>*case\_sensitive*</b> : 指定のある時、キーワードの大文字小文字を区別します。
- <b>*model*</b> : keywordモデル以外のモデルを利用する時にそのモデル名を指定します。
- <b>*name*</b> : \(keywordモデル以外のモデルを利用する時\)keywordモデルの「name」にあたるカラム名を指定します。
- <b>*url*</b> : \(keywordモデル以外のモデルを利用する時\)keywordモデルの「url」にあたるカラム名を指定します。
- <b>*title*</b> : \(keywordモデル以外のモデルを利用する時\)keywordモデルの「title」にあたるカラム名を指定します。
- <b>*class*</b> : \(keywordモデル以外のモデルを利用する時\)classカラムのある時その値でフィルタします。
- <b>*tag*</b> : urlカラム、permalinkを利用せずに指定したテンプレート・タグをビルドします。
- <b>*no\_title*</b> : 指定のある時、title属性を追加しません。
- <b>*target\_blank*</b> : 指定のある、時リンクに'target=&quot;\_blank&quot;'を追加します。
- <b>*add\_attr*</b> : a要素に追加する属性を指定します。
- <b>*replace\_once*</b> : 指定のある時、最初に出現した箇所のみをリンクに置き換えます。
- <b>*word\_boundary*</b> : 指定のある時、単語境界と隣接するキーワードのみを置き換えます\(※\)。
- <b>*min\_length*</b> : 指定した文字数以上のワードのみをリンクに置き換えます。
- <b>*enclosure*</b> : 指定した文字列でタグを囲います。
- <b>*prefix*</b> : タグの前に指定した文字を追加します。
- <b>*postfix*</b> : タグの後に指定した文字を追加します。
- <b>*include\_workspaces*</b> : 指定のスコープのキーワードを対象にします\(カンマ区切りの数字または'this'または'children'\)。
- <b>*exclude\_workspaces*</b> : 指定のスコープのキーワードを除外します\(カンマ区切りの数字\)。
- <b>*workspace\_id*</b> : 特定のworkspaceのキーワードを対象にします。
- <b>*workspace\_ids*</b> : 'include\_workspaces'のエイリアスです。

※　<b>*word\_boundary*</b> 指定のある時「PowerCMS X 」「PowerCMS X!」「PowerCMS X?」は対象になりますが「PowerCMS XX」は対象になりません。日本語キーワードについては影響はありません。
