# TableOfContentsプラグイン

## 概要

見出しから目次(ページ内アンカー)を生成します。

<h3>テンプレート・タグ</h3>
<dl>
  <dt>mt:generatetableofcontents(ブロックタグ)</dt>
  <dd>
    <p>見出しを含むコンテンツ部分をブロックタグで囲います。出力時にH2〜H6タグにID属性を追加して目次の配列を変数にセットします。</p>
    <dl>
      <dt>タグ属性</dt>
      <dd>
        <ul>
          <li>name : ネストされたリストの配列を格納する変数名(省略時は「generated_table_of_contents」)</li>
          <li>prefix : アンカーとなる見出しタグに追加されるID属性のプレフィックス(省略時は「anchor」)</li>
          <li>add_html : 指定すると目次のリストとIDを付与したコンテンツを連結して出力します。</li>
        </ul>
      </dd>
    </dl>
    ※ name属性+「_html」(省略時「generated_table_of_contents_html」)変数に ULタグに組み立てられた HTMLがセットされます。
  </dd>
</dl>
<h4>テンプレート・タグの記述例</h4>
<p>mt:setvartemplateタグを使って再起的に呼び出すことで、ネストされたリストを出力できます。</p>

    <mt:generatetableofcontents prefix="anchor" name="children" setvar="contents">
      <h2>TableOfContentsプラグイン</h2>
      <p>見出しから目次(ページ内アンカー)を生成します。</p>
      <h3>テンプレート・タグ</h3>
      <dl>
        <dt>mt:generatetableofcontents(ブロックタグ)</dt>
        <dd>
          見出しを含むコンテンツ部分をブロックタグで囲います。出力時にH2〜H6タグにID属性を追加して目次の配列を変数にセットします。
          <dl>
            <dt>タグ属性</dt>
            <dd>
              <ul>
                <li>name : ネストされたリストの配列を格納する変数名(省略時は「generated_table_of_contents」)</li>
                <li>prefix : アンカーとなる見出しタグに追加されるID属性のプレフィックス(省略時は「anchor」)</li>
                <li>add_html : 指定すると目次のリストとIDを付与したコンテンツを連結して出力します。</li>
              </ul>
            </dd>
          </dl>
          ※ name属性+「_html」(省略時「generated_table_of_contents_html」)変数に ULタグに組み立てられた HTMLがセットされます。
        </dd>
      </dl>
      <h4>テンプレート・タグの記述例</h4>
      <p>mt:setvartemplateタグを使って再起的に呼び出すことで、ネストされたリストを出力できます。</p>
    </mt:generatetableofcontents>

    <mt:setvartemplate name="table_of_contents">
    <mt:loop name="children">
    <mt:if name="__first__"><ul></mt:if>
      <li><a href="#<mt:var name="__key__">"><mt:var name="__value__[content]"></a>
      <mt:var name="__value__[children]" setvar="children">
      <mt:if name="children">
      <mt:var name="table_of_contents">
      </mt:if></li>
    <mt:if name="__last__"></ul></mt:if>
    </mt:loop>
    </mt:setvartemplate>
    
    <div class="toc_box">
      <h2>目次</h2>
      <mt:var name="table_of_contents" note="リストが出力される">
    </div>
    
    <mt:var name="contents" note="見出しにID属性を付与したコンテンツが出力される">

見出しレベルによる分岐 \_\_value\_\_\_\[tag\]でタグ名が取得できます。
以下のテンプレートでは、H2のみが OLタグ、それ以外は ULタグでマークアップされます。

    <mt:setvartemplate name="table_of_contents">
    <mt:loop name="children">
    <mt:if name="__first__"><mt:if name="__value__[tag]" eq="h2"><ol><mt:else><ul></mt:if></mt:if>
      <li><a href="#<mt:var name="__key__">"><mt:var name="__value__[content]"></a>
      <mt:var name="__value__[children]" setvar="children">
      <mt:if name="children">
      <mt:var name="table_of_contents">
      </mt:if></li>
    <mt:if name="__last__"><mt:if name="__value__[tag]" eq="h2"></ol><mt:else></ul></mt:if></mt:if>
    </mt:loop>
    </mt:setvartemplate>

    出力結果

    <ol>
      <li><a href="#anchor01">TableOfContentsプラグイン</a>
        <ul>
          <li><a href="#anchor01-01">テンプレート・タグ</a>
            <ul>
              <li><a href="#anchor01-01-01">テンプレート・タグの記述例</a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
    </ol>