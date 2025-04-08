# HTMLTidyプラグイン

## インストール

拡張モジュールは PHP にバンドルされています。configure オプション \-\-with\-tidy を指定すればインストールすることができます。

## 概要

Tidyを利用してパースされたマークアップに設定に基づく誤りの修正を行います。また、DOM操作によって独自の処理を行い、HTML文法の誤りを可能な範囲で修正します。

### 環境変数と初期値

Tidyを利用してパースされた HTMLに対する修復\(不足している閉じタグの補完など\)を行った後、以下の設定に沿って DOM操作によって独自の修正を行い、最後にもう一度 Tidyを利用して HTMLを整形します。

- tidy\_html5 : HTML5で追加されたタグを認識させます。初期値は trueです。
- tidy\_cleanup : HTMLTidyによるマークアップの修復を行います。空の要素などは削除されます。初期値は falseです。
- tidy\_re\_save\_html : 修正後の HTMLを再度 DomDocumentで loadHTMLし、saveHTMLします。初期値は falseです。
- tidy\_outputfilter : trueを指定すると再構築時に文書全体に対して処理を行います。初期値は falseです。
- tidy\_css\_to\_head : 廃止された要素を CSSに置き換えを行う時、インライン CSSではなく classを付与して HTMLの head内に styleタグを追加します。初期値は falseです。
- tidy\_class\_prefix : tidy\_css\_to\_head指定のある時、要素に追加する class名のプレフィックスです。初期値は「tidy」です。
- tidy\_clean\_table : テーブル\(table, tr, th, td\)のクリーンナップを行います。廃止された属性を CSSに変換します\('width', 'height', 'align', 'valign', 'cellpadding', 'nowrap', 'bgcolor'\)。また、tdタグに scope属性があったら削除します。初期値は trueです。
- tidy\_clean\_table\_border : table要素の border属性の値が「0」以外の時、属性を削除します。初期値は trueです。
- tidy\_clean\_table\_zero\_border : table要素の border属性の値が「0」の時、属性を削除します。初期値は trueです。
- tidy\_table\_presentation\_class : 指定した値にマッチする class名が付与されている table要素に role="presentation"を追加します。初期値の指定はありません。
- tidy\_clean\_image : imgタグのクリーンナップを行います。廃止された属性を CSSに変換します\('vspace', 'hspace', 'border'\)。不正な width, height を削除します\(空文字・数字を含まないなど\)。alt属性のない img要素に alt="" を追加します。初期値は trueです。
- tidy\_clean\_duplicate\_alt : img要素が aタグの中にある時、aタグの要素内容のテキストと画像の alt属性値が重複している時、alt属性値を空にします。「2」を指定すると、aタグの要素内容のテキストと画像の alt属性値が同一の時のみ、属性値を空にします。tidy\_clean\_imageが有効な時のみ作用します。初期値は 0です。
- tidy\_clean\_image\_attrs : img要素に指定できない属性を削除します。初期値は「longdesc,name」です。longdescについては alt属性値にマージされます。
- tidy\_clean\_block\_align : ブロック要素の align属性を CSSの text\-alignに置換します。対象は\('p', 'div', 'dd', 'li'\)要素で、初期値は trueです。 trueの代わりに要素名の配列を指定することもできます。
- tidy\_clean\_br\_clear : br要素に指定された clear属性を CSSに変換します。初期値は trueです。
- tidy\_clean\_a\_href : URLに指定できない文字列を置き換えます。初期値は\('&\#13;' => '', ' ' => '%20'\)です。
- tidy\_clean\_a\_name : a要素の name属性を id属性に置き換えます。初期値は falseです。
- tidy\_clean\_font : font要素を span要素に置き換えて color, size, face属性値を CSSに変換します。初期値は trueです。
- tidy\_clean\_dl : dl要素に必要な子要素がない時、必要な要素を補完します。dl要素もdd要素も存在しない場合、p要素に置き換えるか、内容がなければ要素自体を削除します。また、置くことのできない要素が直接置かれている時に、直近の dt、dd要素にマージします。初期値は trueです。
- tidy\_clean\_ul\_ol : ul、ol要素に必要な子要素がない時、必要な要素を補完します。また、置くことのできない要素が直接置かれている時に、直近の li要素にマージします。初期値は trueです。
- tidy\_clean\_area : area要素の nohref属性\(廃止\)を削除し、coords内のスペースを削除します。初期値は trueです。
- tidy\_clean\_iframe : iframe要素の frameborder属性\(非推奨\)を削除します。初期値は trueです。
- tidy\_clean\_lang : lang属性の誤りを修正します。初期値は指定なしです。単に trueを指定した場合 jp を ja に置き換えます。他のパターンをハッシュで指定することもできます。初期値は「\{"jp":"ja"\}」です。
- tidy\_clean\_deprecated : 設定で指定した廃止された要素を置き換え可能な要素に置き換えます。初期値は{"acronym":"abbr","s":"del","strike":"del","dir":"ul","big":"span","tt":"span","u":"span","center":"div"}です。
- tidy\_clean\_applet : applet要素を object要素に置き換えます。初期値は trueです。
- tidy\_clean\_empty\_attrs : カンマ区切りで指定した属性の属性値が空文字であるものを削除します。初期値はありません。
- tidy\_clean\_empty\_a : href属性を含み、name属性のない a要素の要素内容が空\(または空文字のみ\)の時、a要素を削除します。初期値は falseです。
- tidy\_clean\_comment : コメントノードを削除します。初期値は trueです。
- tidy\_clean\_double\_byte\_space : 'table', 'ul', 'ol', 'dl'要素内に直接置かれた全角スペースを半角スペースに置き換えます。初期値は trueです。
- tidy\_repair\_ldquo\_rdquo : 「&amp;#147;」を「&ldquo;」に、「&amp;#148;」を「&rdquo;」に、「&amp;#151;」を「&mdash;」置き換えます。初期値は falseです。
- tidy\_force\_utf8 : 文字コードが UTF8のみである時に指定します。初期値は trueです。
- tidy\_clean\_code\_point : 不正なコードポイントを UTF8文字に置き換えます。初期値は falseです。
- tidy\_html\_wrap : 整形後の HTMLを折り返す文字数を指定します。初期値は「0」です。
- tidy\_config : PHPの「tidy\_parse\_string」に渡す第2引数のハッシュを指定します。初期値の指定はありません。※

※ オプションについての説明は <a href="http://api.html-tidy.org/#quick-reference" target="_blank">» http://api.html-tidy.org/#quick-reference <i class="fa fa-external-link" aria-hidden="true"></i></a> を参照ください。

### プラグイン設定

- htmltidy\_exclude\_petterns: 置換しない文字列パターンを改行区切りで指定します。
- htmltidy\_exclude\_string: 指定した文字列を含むHTML文書を処理対象外にします。
- htmltidy\_replace\_petterns: 置換したいパターンを CSVで指定します。
- htmltidy\_archive\_types: 環境変数「tidy\_outputfilter」指定のある時、対象のアーカイブタイプを指定します。
- htmltidy\_body\_pettern: 本文部分の開始と終了を判別する文字列をカンマ区切りで指定します。例 : &lt;main&gt;,&lt;/main&gt;
- htmltidy\_use\_system\_setting: \(スペースの設定のみ\) システムの設定を継承します。

## グローバル・モディファイア

    htmltidy
    
    部分的に修正を適用します。tidy_css_to_head 設定は反映されませんが、属性値に「2」を指定すると、パブリッシュ時に head内に styleタグを追加します。
