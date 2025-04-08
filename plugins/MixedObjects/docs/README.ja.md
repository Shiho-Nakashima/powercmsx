# MixedObjectsプラグイン

## 概要

複数のモデルのオブジェクトを1つにマージしてループ出力します。

### テンプレート・タグ

### ブロックタグ

<b>mt:mixedobjects</b>

models 属性または params属性のキーに指定した複数のモデルのオブジェクトを1つにマージしてループ出力します。  
models 属性または params属性のどちらかが必須です。params属性を省略した時、読み込まれるのは idカラムとプライマリカラムの値、sort\_by属性指定のあるときはそのカラムとなります。  
<b>このタグは LivePreview には対応していません。</b>

<em>予約変数</em>

- <b>*\_\_model\_\_*</b> : オブジェクトのモデル名
- <b>*\_\_first\_\_*</b> : ループの初回に1がセットされます
- <b>*\_\_last\_\_*</b> : ループの最終回に1がセットされます
- <b>*\_\_odd\_\_*</b> : ループの奇数回に1がセットされます
- <b>*\_\_even\_\_*</b> : ループの偶数回に1がセットされます
- <b>*\_\_counter\_\_*</b> : ループのカウンター\(1から始まる\)
- <b>*\_\_index\_\_*</b> : 'var'属性が与えられた時、ループのカウントがセットされます
- <b>*\_\_total\_\_*</b> : ループの総回数がセットされます\(配列またはオブジェクトの数\)

<em>タグ属性</em>

- <b>*models*</b> : モデル名の配列またはカンマ区切りテキスト
- <b>*params*</b> : モデル名をキー、カラム名を値にした配列\(ハッシュ\)
- <b>*conditions*</b> : モデル名をキー、フィルタ条件のカンマ区切りテキストを値にした配列\(ハッシュ\)
- <b>*prefix*</b> : 変数のプレフィックス\(省略時'object'\)
- <b>*set\_context*</b> : ループのオブジェクトのコンテキストをセットする
- <b>*offset*</b> : N番目からリストを開始する\(Nは正の整数\)
- <b>*limit*</b> : 表示する件数\(数値\)
- <b>*sort\_by*</b> : 指定のカラム値でオブジェクトをソートする
- <b>*sort\_order*</b> : 'ascend\(昇順\)' または 'descend\(降順\)'
- <b>*glue*</b> : 繰り返し処理の際に指定された文字列で各ブロックを連結する
- <b>*include\_workspaces*</b> : オブジェクトに'workspace\_id'カラムが存在する時、指定のスペースに存在するオブジェクトに絞り込む\(カンマ区切りの数字または'this'または'all'または'children'\)
- <b>*exclude\_workspaces*</b> : オブジェクトに'workspace\_id'カラムが存在する時、指定のスペースに存在しないオブジェクトに絞り込む\(カンマ区切りの数字\)
- <b>*workspace\_id*</b> : スペースIDでの絞り込み
- <b>*workspace\_ids*</b> : 'include\_workspaces'のエイリアス

### ビューの記述例

- 以下の例では、記事/ページ/アセットモデルを公開日\(published\_on\)カラムの値で降順に5件読み込みます。  
- 2つ目以降のモデルの指定カラム名に関わらず、最初に指定したモデルのカラム名で変数に格納されます\(assetモデルの labelの値は object\_labelではなく object\_title変数に格納されます\)。  
- ハッシュでモデル名とカラム名を指定する時、カラム名'id'は省略可能です。

        <mt:sethashvars name="params">
        entry=title,published_on
        page=title,published_on
        asset=label,published_on
        </mt:sethashvars>
        <mt:mixedobjects params="$params" sort_by="published_on" limit="5" sort_order="descend" set_context="1">
          <mt:if name="__first__"><ul></mt:if>
          <li>
          <mt:if name="__model__" eq="entry">
            <a href="<mt:entrypermalink>">
          <mt:elseif name="__model__" eq="page">
            <a href="<mt:pagepermalink>">
          <mt:elseif name="__model__" eq="asset">
            <a href="<mt:assetfileurl>">
          </mt:if>
            <mt:var name="object_title">(<mt:var name="__model__"> : ID <mt:var name="object_id">)
            </a>
          </li>
          <mt:if name="__last__"></ul></mt:if>
        </mt:mixedobjects>

または、

        <mt:mixedobjects models="entry,page,asset" sort_by="published_on" limit="5" sort_order="descend" set_context="1">
          <mt:if name="__first__"><ul></mt:if>
          <li>
          <mt:if name="__model__" eq="entry">
            <a href="<mt:entrypermalink>">
          <mt:elseif name="__model__" eq="page">
            <a href="<mt:pagepermalink>">
          <mt:elseif name="__model__" eq="asset">
            <a href="<mt:assetfileurl>">
          </mt:if>
            <mt:var name="object_title">(<mt:var name="__model__"> : ID <mt:var name="object_id">)
            </a>
          </li>
          <mt:if name="__last__"></ul></mt:if>
        </mt:mixedobjects>


この時、発行されるSQLは以下のようになります\(システムスコープのビューの場合\)。

    (SELECT entry_id,entry_title,entry_published_on,'entry' AS table_name FROM mt_entry WHERE entry_rev_type=0 AND entry_status=4 AND entry_workspace_id = 0)
        UNION
    (SELECT page_id,page_title,page_published_on,'page' AS table_name FROM mt_page WHERE page_rev_type=0 AND page_status=4 AND page_workspace_id = 0)
        UNION
    (SELECT asset_id,asset_label,asset_published_on,'asset' AS table_name FROM mt_asset WHERE asset_rev_type=0 AND asset_status=4 AND asset_workspace_id = 0)
        ORDER BY entry_published_on DESC LIMIT 5

### フィルタ条件 conditions の指定の仕方

各モデルをフィルタ指定する条件をモデルに対して1つずつ conditions 属性で渡すことができます。  
キーにモデル名、値に「カラム名,条件,フィルタする値」を指定した配列\(ハッシュ\)として渡してください。

        <mt:sethashvars name="conditions">
        entry=title,ct,PowerCMS X
        page=title,ct,PowerCMS X
        asset=label,ct,PowerCMS X
        </mt:sethashvars>

        <mt:mixedobjects params="$params" sort_by="published_on" limit="5"  sort_order="descend" conditions="$conditions" set_context="1">
        〜
        </mt:mixedobjects>

  <table class="table">
    <tbody>
      <tr>
        <th>条件</th>
        <th>説明</th>
      </tr>
      <tr>
        <th>ct(like)</th>
        <td>Contains (含む)</td>
      </tr>
      <tr>
        <th>nc</th>
        <td>Not Contains (含まない)</td>
      </tr>
      <tr>
        <th>gt</th>
        <td>Greater Than (より大きい)</td>
      </tr>
      <tr>
        <th>lt</th>
        <td>Less Than (より小さい)</td>
      </tr>
      <tr>
        <th>ge</th>
        <td>Greater than or Equal (以上)</td>
      </tr>
      <tr>
        <th>le</th>
        <td>Less than or Equal (以下)</td>
      </tr>
      <tr>
        <th>eq</th>
        <td>Equal (等しい)</td>
      </tr>
      <tr>
        <th>ne</th>
        <td>Not Equal (等しくない)</td>
      </tr>
      <tr>
        <th>bw</th>
        <td>Begin with (から始まる)</td>
      </tr>
      <tr>
        <th>ew</th>
        <td>End with (で終わる)</td>
      </tr>
    </tbody>
  </table>
