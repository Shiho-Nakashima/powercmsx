# RESTfulAPI v1 ドキュメント

https://example.com/powercmsx/api/ 配下のリクエストを https://example.com/powercmsx/api/index.php に渡すように設定します。

    <IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^index\.php$ - [L]
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule . index.php [L]
    </IfModule>

スコープの設定画面とモデルの編集画面で「APIを有効化」にチェックを入れることで、利用可能になります。
認証\(authentication\)エンドポイントについては環境変数「api\_allow\_login」指定のある場合に利用可能になります\(初期値true\)。

## 環境変数

idプロパティの値は「RESTfulAPI」です。

通常の config\.json, AppPropertiesプラグインでの管理画面での登録のほか、アプリケーションディレクトリ直下に api\-config\.json に以下のようにキー : 値の形式で指定することが可能です。Webアクセスができないようにしてください。

    {
        "api_allow_login" : true,
        "api_list_limit" : 25,
        "api_methods": {
            "1" : {
                "entry" : ["list", "get"]
            }
        }
    }

- api\_methods : スコープ・モデルに対して利用可能にするエンドポイントを制限したい場合にスコープのIDをキーにして配列で指定します。スペース 1 に対して list, getエンドポイントのみを許可する場合、以下のように指定します。

    "api_methods": {
        "1" : {
            "entry" : ["list", "get"]
        }
    }

- api\_list\_limit : listエンドポイントで limit指定のない時のデフォルト返却件数を指定します。初期値は 10です。
- api\_name\_column : authenticationエンドポイントで nameパラメタに対応するユーザーのカラム名を指定します。初期値は nameです。
- api\_password\_column : authenticationエンドポイントで nameパラメタに対応するユーザーのカラム名を指定します。初期値は passwordです。
- api\_sess\_expires : authenticationエンドポイントで取得したアクセストークンの有効期限秒を指定します。初期値は 3600です。
- api\_caching : APIのレスポンスをキャッシュします。初期値は trueです。
- api\_cache\_methods : 初期値は\['list', 'get', 'search', 'scheme'\]です。
- api\_contains\_username : 各エンドポイントから返却される JSONでオブジェクトの作成者情報のうち、ユーザー名を除去します。初期値は trueです。
- api\_contains\_useremail : 各エンドポイントから返却される JSONでオブジェクトの作成者情報のうち、メールアドレスを除去します。初期値は trueです。
- api\_unescaped\_unicode : 各エンドポイントから返却される JSON生成時に「JSON\_UNESCAPED\_UNICODE」オプションを追加します。
- api\_pretty\_print : 各エンドポイントから返却される JSON生成時に「JSON\_PRETTY\_PRINT」オプションを追加します。
- api\_allow\_login : authenticationエンドポイントを有効化します。初期値は trueです。
- api\_debug : RESTful API のデバッグ時に指定します。指定時には api\_unescaped\_unicode, api\_pretty\_print は有効化され、GETリクエストで POSTリクエストのテストを行うことが可能になります。
- api\_debug\_user\_id : api\_debugが有効な時、アクセストークンやクッキーがなくてもそのユーザーとして振る舞います。
- api\_debug\_json\_path : api\_debugが有効な時、リクエストボディにセットする JSONの代わりに、指定したパスの JSONファイルをデータとして利用します。
- api\_user\_lockout : authenticationエンドポイントで認証に失敗した時、システム設定のルールに基づきユーザーをロックアウトします。初期値は trueです。
- api\_ip\_lockout : authenticationエンドポイントで認証に失敗した時、システム設定のルールに基づき IPアドレスをロックアウトします。初期値は falseです。
- api\_use\_cookie : アクセストークンに加えて authenticationエンドポイントで認証した時にクッキーを発行し、その後の認証付きリクエスト時にクッキーをあわせてチェックします。初期値は falseです。
- api\_cookie\_name : api\_use\_cookieが有効な時に発行するクッキー名です。初期値は「pt\-api\-user」です。
- api\_allow\_remember : authenticationエンドポイントで認証の有効期限を 1年延長する remember追加パラメタを許可します。初期値は falseです。
- api\_allow\_contact : 「contact」モデルが「APIを有効化」に設定されていない時にも「token」「confirm」「submit」エンドポイントの利用を許可します。初期値は trueです。
- api\_status\_text : オブジェクトJSONの返却時にステータスを数値ではなくテキストで返却します。
- api\_requires\_login : get, listエンドポイントで認証を必要とするモデルを配列で指定します。初期値は['log', 'contact', 'activity', 'permission', 'role', 'searchword']です。

※ 不特定多数がアクセスできる環境では絶対に「api\_debug」「api\_debug\_user\_id」を指定しないでください。

## オブジェクトJSON

返却されるオブジェクトJSONの形は基本的に以下のフォーマットです。list/searchエンドポイントではキー「items」に配列で返却されます。

    {
        "id" : "オブジェクトID",
        "カラム名1" : "カラム1の値",
        "カラム名2" : "カラム2の値"
    }

### リレーションを含むオブジェクトJSON

リレーションを含むオブジェクトJSONのフォーマットは以下の通りです。関連オブジェクトのさらに関連オブジェクトについては展開されません。

    {
        "id" : "オブジェクトID",
        "カラム名1" : "カラム1の値",
        "数値型単一リレーションカラム" : {
            "id" : "オブジェクトID",
            "カラム名1" : "カラム1の値",
            "カラム名2" : "カラム2の値"
        },
        "複数リレーション型カラム" : [
            {
                "id" : "オブジェクトID",
                "カラム名1" : "カラム1の値",
                "カラム名2" : "カラム2の値"
            },
            {
                "id" : "オブジェクトID",
                "カラム名1" : "カラム1の値",
                "カラム名2" : "カラム2の値"
            }
        ]
    }

### メタデータ

オブジェクトのカラムの値やリレーションによる関連オブジェクトのカラムの値以外のデータをメタデータと呼びます。
メタデータのキーは、必ず大文字で始まります。メタデータには以下のものがあります。

- Url : カラム名のキーに対する配列内に設定されます。バイナリ型のカラムにファイルを添付している時、その URLです。
- Label : カラム名のキーに対する配列内に設定されます。バイナリ型のカラムにファイルを添付している時、そのラベルまたは代替テキストです。
- Metadata : カラム名のキーに対する配列内に設定されます。バイナリ型のカラムにファイルを添付している時、そのファイルに関する情報の配列です。
- Permalink : オブジェクトのパーマリンクです。URLマップによるアーカイブのあるときは優先アーカイブの URL、URLマップがなくバイナリ型のカラムにファイルを添付している時は、1つめのファイルの URLです。
- Thumbnail : 環境変数「assets\_c」「assets\_c\_path」を指定して、静的にサムネイルファイルを出力している時はその URL、静的サムネイルがない時、認証付きで権限のあるユーザーに対しては動的サムネイルの URLとなります。動的サムネイルの URLに「square=1」パラメタをつけると、正方形のサムネイルを返します。
- Path : 階層付きオブジェクトの場合、basenameカラムの存在するモデルでは「basename」を、そうでないモデルについてはプライマリカラムの値を「/」で区切ったパスをセットします。
- Fields : オブジェクトのフィールドにセットされた値の配列です。
- Meta : フィールド、バイナリ型のカラムのファイル情報以外のメタデータの配列です。
- Workflow : 「approval\(承認依頼\)」または「remand\(差し戻し\)」
- Message : ワークフロー通知に含めるメール用のメッセージ

### バイナリデータ\(ファイル\)の送信

例えば、記事にバイナリ型のカラムを追加している時、以下のようにして\(Data URI schemeの形式で\)ファイルのデータを送信します。

    {
        "id" : "オブジェクトID",
        "og_image" : {
            "Label" : "ラベルまたは代替テキスト",
            "Data" : "data:image/png;base64,..................."
        }
    }

アセットと添付ファイルについては、記事などのリレーションデータとして登録できます。「Path」にはサイト・パスを「%r」として相対パスを指定します。「Path」が指定できるのはアセットのみで、添付ファイルについては保存場所は自動で設定されます。

    {
        "title": "Welcome!",
        "assets": [
            {
                "file": {
                    "Label" : "ラベルまたは代替テキスト",
                    "Data": "data:image/png;base64,...................",
                    "Path": "%r/assets/filename.png"
                }
            }
        ]
    }

アセットの関連付けの解除、添付ファイルの削除には「Detach」を指定します。「id」をあわせて指定しなければなりません。  
添付ファイルの場合は、そのファイルを削除、アセットの場合には、そのアセットは削除されず、関連付けのみが解除されます。数値型単一選択のリレーション型にも対応しています。

    {
        "title": "Welcome!",
        "assets": [
            {
                "id":23,
                "Detach":true
            }
        ]
    }

contactモデルの confirm/submitエンドポイントに送信するときは、ファイル名、設問のベースネームを付けて送信します。

    {
        "Identifier": "contact_us",
        "Language": "ja",
        "Permalink":"https:\/\/localhost\/01\/contact\/website_contact_us.html",
        "website_your_name": "野田純生",
        "website_email": "webmaster@alfasado.jp",
        "website_subject": "テスト投稿",
        "website_message": "テスト投稿です",
        "website_privacy_policy": "agree",
        "attachmentfiles": [
            {
                "name": "ファイル名.docx",
                "basename": "website_attachment1",
                "file": {
                    "Data": "data:application\/vnd.openxmlformats-officedocument.wordprocessingml.document;base64,............"
                }
            }
        ]
    }

### ステータス\(status\)に指定可能な値

ステータスには数値以外に文字列でも指定できます。環境変数「status\_text」に指定がある場合はテキストで返却されます。

有効期限対応指定のあるモデルの場合

- 0 : 「Draft」\(下書き\)
- 1 : 「Review」\(レビュー\)
- 2 : 「Approval Pending」\(承認待ち\)
- 3 : 「Reserved」\(公開予約\)
- 4 : 「Publish」\(公開\)
- 5 : 「Ended」\(終了\)

有効期限対応指定のないモデルの場合

- 1 : 「Disable」\(無効\)
- 2 : 「Enable」\(有効\)

## insert, updateメソッドにおけるワークフローの利用

insert, updateでワークローを利用するには以下のルールでオブジェクトJSONを指定します。モデルがワークフローに対応していて、そのスコープでワークフローが設定されていることが必要です。

- user\_id : 承認依頼または差し戻すユーザーのID
- status   : 異なる権限グループのユーザーへ渡す時は、そのユーザーが指定できるステータス以下の値
- Workflow : 「approval\(承認依頼\)」または「remand\(差し戻し\)」
- Message  : ワークフロー通知に含めるメール用のメッセージ

    {
        "user_id"  : ユーザーのID,
        "status"   : ユーザーに応じたステータス,
        "Workflow" : "approval",
        "Message"  : "メールに含めるメッセージのテキスト",
    }

ワークフロー対応モデルのステータスの数字は以下の通りです。

- 0 : 下書き
- 1 : レビュー
- 2 : 承認待ち
- 3 : 公開予約
- 4 : 公開
- 5 : 終了

権限グループによって指定できるステータスの最大値は以下の通りです\(カッコ内は異なるグループのユーザーへ渡す時に指定する値\)。

- 作成者\(creator\) : 0 \(0\)
- レビュワー\(reviewer\) : 1 \(1\)
- 公開者\(publisher\) : 5 \(2\)

ワークフローの設定がない時、ワークフローで渡すことのできるユーザー以外のIDを指定した時、上記のステータスより大きな値の数字を渡したときは権限エラーとなります。

    {
        "status": 403,
        "message": "Permission denied."
    }

### insert, update メソッドでのリビジョンの指定

リビジョンを指定するには「rev\_type」「rev\_object\_id」を指定します。rev\_type=1 が自動保存、rev\_type=2 がリビジョンです。

    {
        "rev_type" : 1または2,
        "rev_object_id" : マスタのID
    }

マスタが存在しない時、マスタとリビジョンのスコープが違うときはエラーとなります。マスタを update メソッドでリビジョンに変更することはできません。

## エンドポイント

authentication エンドポイントは以下のパス

    /api/バージョン/authentication

それ以外のエンドポイントは以下の形のパスとなります

    /api/バージョン/スコープID/モデル名/メソッド/オブジェクトID(オプション)?キー1=値1&キー2=値2...

### 共通レスポンス・エラー : 

バージョン指定文字列が不正もしくはそのバージョンがサポートされていない

    {
        "status": 400,
        "message": "Version 'バージョン' is not supported."
    }

環境変数「api\_methods」によってそのスコープに対して許可されていないメソッド

    {
        "status": 403,
        "Method 'メソッド名' for model 'モデル名' not allowed in this scope."
    }

環境変数「api\_allow\_login」指定がない時に authentication メソッドへアクセスした

    {
        "status": 403,
        "Authentication not allowed."
    }

指定したモデルが存在しない

    {
        "status": 404,
        "Model 'モデル名' does not exist."
    }

そのモデルで「APIを有効化」が指定されていない

    {
        "status": 406,
        "API use of model 'モデル名' is not allowed."
    }

指定したオブジェクトが存在しないか、オブジェクトIDが指定されていない

    {
        "status": 404,
        "The モデル名 was not found."
    }

指定したメソッドがサポートされていない

    {
        "status": 405,
        "Method '%s' is not supported."
    }

指定したスコープ IDが API利用を許可していない

    {
        "status": 403,
        "WorkSpace ID:'スコープID' does not support API."
    }

認証が必要なリクエストに対して認証なし、もしくは認証に成功しなかった

    {
        "status": 403,
        "This method requires login."
    }

許可されないリクエストメソッド

    {
        "status": 400,
        "message": "Method リクエストメソッド not allowed."
    }

### authentication : 認証を行いアクセストークンを発行します。環境変数「api\_use\_cookie」指定のある時、あわせてクッキーをセットします。

エンドポイント :

    /api/v1/authentication

メソッド : POST

リクエストボディに JSONを指定するか、パラメタを送信します。
rememberはオプションで、環境変数「api\_allow\_remember」指定のある時、アクセストークンが 1年間有効になります。  
authentication成功後に認証付きリクエストを送信するには「access\_token」\(ver\.3\.02以降は「X\-PCMSX\-Authorization」\)リクエストヘッダを付けてアクセスします。

JSON :

    {
        "name" : "ユーザー名",
        "password" : "ユーザーのパスワード",
        "remember" : true
    }

パラメタ : 

    ?name=ユーザー名&password=ユーザーのパスワード&remember=1


レスポンス\(成功時\) :

    {
        "access_token": "アクセストークン",
        "expires_in": 有効期限(UNIXタイムスタンプ)
    }

レスポンス・エラー : 

許可されないリクエストメソッド

    {
        "status": 400,
        "message": "Method リクエストメソッド not allowed."
    }

JSONのパースエラー

    {
        "status": 400,
        "message": "Invalid request."
    }

パラメタが不足している

    {
        "status": 401,
        "message": "Name and password are required."
    }

認証に失敗したか、ユーザーがロックアウトされている

    {
        "status": 401,
        "message": "Authentication faild."
    }

IPアドレスがロックアウトされている

    {
        "status": 401,
        "message": "This IP address was locked out."
    }

### scheme : モデルのスキーマを取得します。認証付きリクエストでそのスコープ・モデルに対する権限が必要です。

エンドポイント\(記事の例\) :

    /api/v1/スコープID/モデル名/scheme
    /api/v1/1/entry/scheme

メソッド : GET

パラメタ : 

    ?keys=返却するキー1,返却するキー2

レスポンス\(成功時\) :

    {
        "label": "記事",
        "plural": "Entries",
        "version": "2.3",
        "primary": "title",
        "display_system": 1,
        "auditing": 1,
        "order": 10,
        "menu_type": 1,
        "taggable": 1,
        "revisable": 1,
        "start_end": 1,
        "has_assets": 1,
        "template_tags": 1,
        "display_space": 1,
        "has_basename": 1,
        "has_status": 1,
        "assign_user": 1,
        "display_dashboard": 1,
        "allow_comment": 1,
        "default_status": 2,
        "has_uuid": 1,
        "show_activity": 1,
        "column_defs": {
            "id": {
                "type": "int",
                "size": 11,
                "not_null": 1
            },
            "title": {
                "type": "string",
                "size": 255,
                "not_null": 1
            },
            "text": {
                "type": "text"
            },
            "text_format": {
                "type": "string",
                "size": 255
            },
            "assets": {
                "type": "relation"
            },
            "text_more": {
                "type": "text"
            },
            "excerpt": {
                "type": "text"
            },
            "keywords": {
                "type": "string",
                "size": 255
            },
            "categories": {
                "type": "relation"
            },
            "tags": {
                "type": "relation"
            },
            "extra_path": {
                "type": "string",
                "size": 255
            },
            "basename": {
                "type": "string",
                "size": 255,
                "not_null": 1
            },
            "status": {
                "type": "int",
                "size": 11,
                "default": "2"
            },
            "has_deadline": {
                "type": "tinyint",
                "size": 4
            },
            "published_on": {
                "type": "datetime"
            },
            "unpublished_on": {
                "type": "datetime"
            },
            "rev_note": {
                "type": "string",
                "size": 255
            },
            "rev_diff": {
                "type": "text"
            },
            "rev_type": {
                "type": "int",
                "size": 11,
                "not_null": 1,
                "default": "0"
            },
            "user_id": {
                "type": "int",
                "size": 11
            },
            "previous_owner": {
                "type": "int",
                "size": 11
            },
            "rev_changed": {
                "type": "string",
                "size": 255
            },
            "allow_comment": {
                "type": "tinyint",
                "size": 4
            },
            "created_on": {
                "type": "datetime"
            },
            "modified_on": {
                "type": "datetime"
            },
            "created_by": {
                "type": "int",
                "size": 11
            },
            "modified_by": {
                "type": "int",
                "size": 11
            },
            "workspace_id": {
                "type": "int",
                "size": 11,
                "default": "0"
            },
            "rev_object_id": {
                "type": "int",
                "size": 11
            },
            "uuid": {
                "type": "string",
                "size": 255
            }
        },
        "indexes": {
            "PRIMARY": "id",
            "title": "title",
            "keywords": "keywords",
            "extra_path": "extra_path",
            "basename": "basename",
            "status": "status",
            "has_deadline": "has_deadline",
            "published_on": "published_on",
            "unpublished_on": "unpublished_on",
            "rev_note": "rev_note",
            "rev_type": "rev_type",
            "user_id": "user_id",
            "previous_owner": "previous_owner",
            "created_on": "created_on",
            "modified_on": "modified_on",
            "created_by": "created_by",
            "modified_by": "modified_by",
            "workspace_id": "workspace_id",
            "rev_object_id": "rev_object_id",
            "uuid": "uuid"
        },
        "sort_by": {
            "published_on": "descend"
        },
        "relations": {
            "assets": "asset",
            "categories": "category",
            "tags": "tag"
        },
        "autoset": [
            "rev_diff",
            "rev_type",
            "rev_changed",
            "created_on",
            "modified_on",
            "created_by",
            "modified_by",
            "workspace_id",
            "rev_object_id"
        ],
        "unchangeable": [
            "workspace_id",
            "uuid"
        ],
        "translate": [
            "categories"
        ],
        "hide_edit_options": [
            "status",
            "published_on",
            "unpublished_on",
            "user_id"
        ],
        "edit_properties": {
            "id": "hidden",
            "title": "primary",
            "text": "richtext",
            "assets": "relation:asset:label:dialog",
            "text_more": "textarea",
            "excerpt": "textarea",
            "keywords": "text",
            "categories": "relation:category:label:hierarchy",
            "tags": "relation:tag:name:dialog",
            "basename": "text_short",
            "status": "selection",
            "published_on": "datetime",
            "unpublished_on": "datetime",
            "user_id": "relation:user:nickname:dialog",
            "allow_comment": "hidden",
            "uuid": "text_short"
        },
        "list_properties": {
            "id": "number",
            "title": "primary",
            "categories": "reference:category:label",
            "tags": "reference:tag:name",
            "extra_path": "text_short",
            "basename": "text_short",
            "status": "number",
            "has_deadline": "checkbox",
            "published_on": "date",
            "unpublished_on": "date",
            "rev_note": "text",
            "rev_diff": "popover",
            "rev_type": "text_short",
            "user_id": "reference:user:nickname",
            "previous_owner": "reference:user:nickname",
            "rev_changed": "text",
            "modified_on": "datetime",
            "created_by": "reference:user:nickname",
            "modified_by": "reference:user:nickname",
            "workspace_id": "reference:workspace:name"
        },
        "default_list_items": [
            "title",
            "status",
            "published_on",
            "user_id",
            "workspace_id"
        ],
        "options": {
            "text": "20",
            "text_more": "3",
            "status": "Draft,Review,Approval Pending,Reserved,Publish,Ended"
        },
        "column_labels": {
            "extra_path": "Path"
        },
        "max_revisions": 20,
        "im_export": 1,
        "extras": [],
        "disp_edit": {
            "user_id": "relation"
        },
        "labels": {
            "id": "ID",
            "title": "Title",
            "text": "Body",
            "text_format": "Text Format",
            "assets": "Assets",
            "text_more": "More",
            "excerpt": "Excerpt",
            "keywords": "Keywords",
            "categories": "Categories",
            "tags": "Tags",
            "extra_path": "Path",
            "basename": "Basename",
            "status": "Status",
            "has_deadline": "Specify the Deadline",
            "published_on": "Publish Date",
            "unpublished_on": "Unpublish Date",
            "rev_note": "Change Note",
            "rev_diff": "Diff",
            "rev_type": "Type",
            "user_id": "User",
            "previous_owner": "Previous Owner",
            "rev_changed": "Changed",
            "allow_comment": "Accept Comments",
            "created_on": "Date Created",
            "modified_on": "Date Modified",
            "created_by": "Created By",
            "modified_by": "Modified By",
            "workspace_id": "WorkSpace",
            "rev_object_id": "Object ID",
            "uuid": "UUID"
        },
        "locale": {
            "default": {
                "id": "ID",
                "title": "Title",
                "text": "Body",
                "text_format": "Text Format",
                "assets": "Assets",
                "text_more": "More",
                "excerpt": "Excerpt",
                "keywords": "Keywords",
                "categories": "Categories",
                "tags": "Tags",
                "extra_path": "Path",
                "basename": "Basename",
                "status": "Status",
                "has_deadline": "Specify the Deadline",
                "published_on": "Publish Date",
                "unpublished_on": "Unpublish Date",
                "rev_note": "Change Note",
                "rev_diff": "Diff",
                "rev_type": "Type",
                "user_id": "User",
                "previous_owner": "Previous Owner",
                "rev_changed": "Changed",
                "allow_comment": "Accept Comments",
                "created_on": "Date Created",
                "modified_on": "Date Modified",
                "created_by": "Created By",
                "modified_by": "Modified By",
                "workspace_id": "WorkSpace",
                "rev_object_id": "Object ID",
                "uuid": "UUID"
            },
            "ja": {
                "Entry": "記事",
                "Entries": "記事",
                "ID": "ID",
                "Title": "タイトル",
                "Body": "本文",
                "Text Format": "フォーマット",
                "Assets": "アセット",
                "More": "続き",
                "Excerpt": "概要",
                "Keywords": "キーワード",
                "Categories": "カテゴリ",
                "Tags": "タグ",
                "Path": "パス",
                "Basename": "ベースネーム",
                "Status": "ステータス",
                "Specify the Deadline": "公開終了日を指定",
                "Publish Date": "公開日",
                "Unpublish Date": "公開終了日",
                "Change Note": "変更メモ",
                "Diff": "差分",
                "Type": "タイプ",
                "User": "ユーザー",
                "Previous Owner": "直前のユーザー",
                "Changed": "変更",
                "Accept Comments": "コメントを許可",
                "Date Created": "作成日",
                "Date Modified": "更新日",
                "Created By": "作成者",
                "Modified By": "更新者",
                "WorkSpace": "スペース",
                "Object ID": "オブジェクトID",
                "UUID": "UUID"
            }
        },
        "fields": [
            {
                "id": 1,
                "name": "Field",
                "basename": "field",
                "translate": 0,
                "fieldtype_id": {
                    "id": 1,
                    "name": "Input Text",
                    "basename": "text",
                    "order": 1
                },
                "label": "    <label for=\"field.<mt:var name=\"field_uniqueid\">\">\n      <mt:var name=\"field_name\" escape>\n      <mt:if name=\"field_required\">\n      <i class=\"fa fa-asterisk required\" aria-hidden=\"true\"><\/i>\n      <span class=\"sr-only\"><mt:trans phrase=\"Required\"><\/span>\n      <\/mt:if>\n    <\/label>",
                "hide_label": 0,
                "content": "    <input id=\"field.<mt:var name=\"field_uniqueid\">\" class=\"form-control watch-changed\" type=\"text\" name=\"value\" value=\"<mt:var name=\"field.value\" escape>\">",
                "options": "",
                "options_labels": "",
                "required": 0,
                "display": 0,
                "translate_labels": 0,
                "multiple": 0,
                "order": 1,
                "workspace_id": 0,
                "created_on": "2021-09-02 20:37:34",
                "modified_on": "2021-09-02 20:37:34",
                "created_by": 1,
                "modified_by": 1
            }
        ]
    }

レスポンス・エラー : 

許可されないリクエストメソッド

    {
        "status": 400,
        "message": "Method リクエストメソッド not allowed."
    }

認証付きリクエストではない、またはログイン中のユーザーがそのモデルに対する権限がない

    {
        "status": 403,
        "message": "Permission denied."
    }

### get : 単一オブジェクトを返します。ステータス付きモデルの場合認証付きリクエストで権限がない場合、非公開・無効なオブジェクトは取得できません。

エンドポイント\(記事の例\) :

    /api/v1/スコープID/モデル名/get/オブジェクトID
    /api/v1/スコープID/モデル名/get/プライマリカラムの値
    /api/v1/スコープID/モデル名/get/?basename=オブジェクトのベースネーム
    /api/v1/1/entry/get/1
    /api/v1/1/entry/get/Welcome%20to%20our%20website%21
    /api/v1/1/entry/get/?basename=powercmsx

※ オブジェクトID以外の指定では、リビジョンは取得できません。

メソッド : GET

パラメタ : 

    ?cols=返却するキー1,返却するキー2

レスポンス\(成功時\) :

    {
        "id": 1,
        "title": "Welcome!",
        "text": "<h2>Our Story<\/h2>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\/p>\n<blockquote>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\/p>\n<\/blockquote>",
        "text_format": "richtext",
        "assets": [
            {
                "id": 26,
                "label": "powercmsx",
                "file": {
                    "Url": "https:\/\/localhost\/01\/assets\/powercmsx.png",
                    "Label": null,
                    "Metadata": {
                        "file_size": 76618,
                        "image_width": 600,
                        "image_height": 600,
                        "class": "image",
                        "extension": "png",
                        "mime_type": "image\/png",
                        "uploaded": "2021-09-02 15:11:58",
                        "user_id": 1
                    }
                },
                "extra_path": "assets\/",
                "file_name": "powercmsx.png",
                "file_ext": "png",
                "mime_type": "image\/png",
                "tags": [],
                "size": 76618,
                "image_width": 600,
                "image_height": 600,
                "class": "image",
                "status": 4,
                "created_by": 1,
                "modified_by": 1,
                "created_on": "2021-09-02 15:11:58",
                "modified_on": "2021-09-02 15:11:58",
                "workspace_id": 1,
                "published_on": "2021-09-02 15:11:58",
                "rev_type": 0,
                "user_id": 1,
                "uuid": "a415ce51-5e70-4b1b-9413-8342f3e864ab",
                "Permalink": "https:\/\/localhost\/01\/assets\/powercmsx.png",
                "Thumbnail": "https:\/\/localhost\/powercmsx\/assets_c\/thumb-asset-128xauto-square-26-file.png"
            }
        ],
        "text_more": "",
        "excerpt": "Our StoryLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        "keywords": "",
        "categories": [
            {
                "id": 1,
                "label": "Press Release",
                "order": 1,
                "basename": "press_release",
                "workspace_id": 1,
                "created_on": "2021-08-27 15:13:45",
                "modified_on": "2021-08-27 15:13:45",
                "created_by": 1,
                "modified_by": 1,
                "Permalink": "https:\/\/localhost\/01\/press_release\/index.html",
                "Path": "press_release"
            }
        ],
        "tags": [
            {
                "id": 6,
                "name": "PowerCMS X",
                "normalize": "powercmsx",
                "class": "entry",
                "order": 2,
                "workspace_id": 1,
                "created_on": "2021-09-02 15:09:57",
                "modified_on": "2021-09-02 15:09:57",
                "created_by": 1,
                "modified_by": 1
            }
        ],
        "extra_path": "",
        "basename": "powercmsx",
        "status": 4,
        "has_deadline": 0,
        "published_on": "2021-09-01 12:47:46",
        "rev_note": "",
        "rev_diff": "",
        "rev_type": 0,
        "user_id": {
            "id": 1,
            "nickname": "Junnama Noda",
            "photo": "",
            "text_format": "",
            "space_order": "",
            "fix_spacebar": 1,
            "language": "ja",
            "control_border": "",
            "status": 2
        },
        "previous_owner": 0,
        "rev_changed": "",
        "allow_comment": 0,
        "created_on": "2021-08-27 15:13:45",
        "modified_on": "2021-09-02 15:12:06",
        "created_by": 1,
        "modified_by": 1,
        "workspace_id": 1,
        "rev_object_id": 0,
        "uuid": "d574478a-6762-434f-b002-723c835444ee",
        "Permalink": "https:\/\/localhost\/01\/press_release\/powercmsx.html"
    }

レスポンス・エラー : 

許可されないリクエストメソッド

    {
        "status": 400,
        "message": "Method リクエストメソッド not allowed."
    }

該当するオブジェクトが存在しない

    {
        "status": 404,
        "message": "The モデル名 was not found."
    }

認証付きリクエストでログイン中のユーザーがそのオブジェクトに対する権限がない

    {
        "status": 403,
        "message": "Permission denied."
    }

### list : オブジェクトの一覧を返します。ステータス付きモデルの場合認証付きリクエストで権限がない場合、非公開・無効なオブジェクトは取得できません。

※ 認証付きリクエストで listエンドポイントにアクセスした時、ユーザーの権限に基づき、管理画面のオブジェクト一覧画面のルールでオブジェクトを取得します。

エンドポイント\(記事の例\) :

    /api/v1/スコープID/モデル名/list
    /api/v1/1/entry/list

メソッド : GET または POST

パラメタ : 

- limit : 取得する最大件数\(省略時環境変数 api\_list\_limit : 初期値25\)
- offset : スキップする件数
- sort\_by : ソートするカラム名
- sort\_order : ascend\(昇順\) もしくは descend\(降順\)
- cols : 返却するキー
- query : キーワード\(スペース区切りで複数指定可能\)
- search\_cols : 検索対象のカラム名のカンマ区切り
- search\_type : phrase\(デフォルト\), and または or。
- manage\_revision : リビジョン対応のモデルの時、リビジョンの一覧を表示します。

※ パラメタはすべてオプションです。

    ?limit=件数&offset=スキップする件数&sort_by=カラム名&sort_order=昇順もしくは降順&cols=返却するキー1,返却するキー2&query=キーワード&search_cols=検索対象のカラム1,search_cols=検索対象のカラム2&search_type=検索タイプ

フィルタ : 

管理画面やダイナミックパブリッシングで利用できる一覧のフィルタ指定が可能です。

- \_filter\_value\_カラム名\[\] : 検索するカラムに対する検索文字列や数値を指定します。配列\(末尾に\[\]を付与\)として指定してください。複数の値が渡せます。
- \_filter\_cond\_カラム名\[\] : 検索条件を指定します。ctはcontains\(含む\)となります。\_filter\_value\_カラム名\[\]に渡した値の数分指定の必要があります。
- \_filter\_and\_or\_カラム名 : 「AND」または「OR」を指定可能です。管理画面のフィルタは常にAND検索となりますが、代わりにORを指定すると、OR検索となります\(配列ではなく、1つのみ指定できます\)。
- \_filter\_and\_or : 複数のカラムを検索対象とするとき、AND検索かOR検索かを指定します\(配列ではなく、1つのみ指定できます\)。

指定可能な検索条件 : 

ct : Contains \(含む\)
nc : Not Contains \(含まない\)
gt : Greater Than \(より大きい\)
lt : Less Than \(より小さい\)
ge : Greater than or Equal \(以上\)
le : Less than or Equal \(以下\)
eq : Equal \(等しい\)
ne : Not Equal \(等しくない\)
bw : Begin with \(から始まる\)
ew : End with \(で終わる\)

例えば特定のユーザーの記事のIDとタイトルのみを取得する場合は以下のようなリクエストとなります\(リレーション指定の時、ユーザーの場合はnickname、その他のモデルではプライマリカラムの値を指定します\)

    https://example.com/powercmsx/api/v1/1/entry/list?_filter_value_user_id[]=User%20Name&_filter_cond_user_id[]=eq&cols=id,title

[参考リンク : 複数の条件を指定可能なウェブサイト内検索](https://powercmsx.jp/about/restful_api_list.html)

レスポンス\(成功時\) :

totalResultには、limitに関わらず指定した条件にマッチするオブジェクトのトータル件数がセットされます。

    {
        "totalResult": 10,
        "items": [
            {
                "id": 1,
                "title": "Welcome!",
                "text": "<h2>Our Story<\/h2>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\/p>\n<blockquote>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\/p>\n<\/blockquote>",
                "text_format": "richtext",
                "assets": [
                    {
                        "id": 26,
                        "label": "powercmsx",
                        "file": {
                            "Url": "https:\/\/localhost\/01\/assets\/powercmsx.png",
                            "Label": null,
                            "Metadata": {
                                "file_size": 76618,
                                "image_width": 600,
                                "image_height": 600,
                                "class": "image",
                                "extension": "png",
                                "mime_type": "image\/png",
                                "uploaded": "2021-09-02 15:11:58",
                                "user_id": 1
                            }
                        },
                        "extra_path": "assets\/",
                        "file_name": "powercmsx.png",
                        "file_ext": "png",
                        "mime_type": "image\/png",
                        "tags": [],
                        "size": 76618,
                        "image_width": 600,
                        "image_height": 600,
                        "class": "image",
                        "status": 4,
                        "created_by": 1,
                        "modified_by": 1,
                        "created_on": "2021-09-02 15:11:58",
                        "modified_on": "2021-09-02 15:11:58",
                        "workspace_id": 1,
                        "published_on": "2021-09-02 15:11:58",
                        "rev_type": 0,
                        "user_id": 1,
                        "uuid": "a415ce51-5e70-4b1b-9413-8342f3e864ab",
                        "Permalink": "http:\/\/mt4local.alfasado.net\/01\/assets\/powercmsx.png",
                        "Thumbnail": "https:\/\/localhost\/powercmsx\/assets_c\/thumb-asset-128xauto-square-26-file.png"
                    }
                ],
                "text_more": "",
                "excerpt": "Our StoryLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "keywords": "",
                "categories": [
                    {
                        "id": 1,
                        "label": "Press Release",
                        "order": 1,
                        "basename": "press_release",
                        "workspace_id": 1,
                        "created_on": "2021-08-27 15:13:45",
                        "modified_on": "2021-08-27 15:13:45",
                        "created_by": 1,
                        "modified_by": 1,
                        "Permalink": "http:\/\/mt4local.alfasado.net\/01\/press_release\/index.html",
                        "Path": "press_release"
                    }
                ],
                "tags": [
                    {
                        "id": 6,
                        "name": "PowerCMS X",
                        "normalize": "powercmsx",
                        "class": "entry",
                        "order": 2,
                        "workspace_id": 1,
                        "created_on": "2021-09-02 15:09:57",
                        "modified_on": "2021-09-02 15:09:57",
                        "created_by": 1,
                        "modified_by": 1
                    }
                ],
                "extra_path": "",
                "basename": "powercmsx",
                "status": 4,
                "has_deadline": 0,
                "published_on": "2021-09-01 12:47:46",
                "user_id": {
                    "id": 1,
                    "nickname": "Junnama Noda",
                    "photo": "",
                    "text_format": "",
                    "space_order": "",
                    "fix_spacebar": 1,
                    "language": "ja",
                    "control_border": "",
                    "status": 2
                },
                "previous_owner": 0,
                "allow_comment": 0,
                "created_on": "2021-08-27 15:13:45",
                "modified_on": "2021-09-02 15:12:06",
                "created_by": 1,
                "modified_by": 1,
                "workspace_id": 1,
                "uuid": "d574478a-6762-434f-b002-723c835444ee",
                "Permalink": "http:\/\/mt4local.alfasado.net\/01\/press_release\/powercmsx.html"
            }
        ]
    }

レスポンス・エラー : 

許可されないリクエストメソッド

    {
        "status": 400,
        "message": "Method リクエストメソッド not allowed."
    }

認証付きリクエストでログイン中のユーザーがそのオブジェクトに対する一覧表示権限がない

    {
        "status": 403,
        "message": "Permission denied."
    }

### insert : オブジェクトを新規作成します。認証付きリクエストでログイン中のユーザーがそのスコープへのオブジェクトに対する作成権限が必要です。

エンドポイント\(記事の例\) :  

    /api/v1/スコープID/モデル名/insert
    /api/v1/1/entry/insert

メソッド : POST

リクエストボディ  

    {
        "title": "Welcome!",
        "text": "<h2>Our Story<\/h2>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\/p>\n<blockquote>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\/p>\n<\/blockquote>",
        "text_format": "richtext",
        "assets": [
            {
                "id": 26
            }
        ],
        "excerpt": "Our StoryLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        "categories": [
            {
                "id": 1
            }
        ],
        "tags": [
            {
                "id": 6
            }
        ],
        "basename": "powercmsx",
        "status": 4,
        "has_deadline": 0,
        "published_on": "2021-09-01 12:47:46",
        "allow_comment": 0
    }

レスポンス\(成功時\) :  

オブジェクトの idとリクエストボディの JSONで指定したキーの値を返します。

    {
        "id": 54,
        "title": "Welcome!",
        "text": "<h2>Our Story<\/h2>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\/p>\n<blockquote>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\/p>\n<\/blockquote>",
        "text_format": "richtext",
        "assets": [
            {
                "id": 26,
                "label": "powercmsx",
                "file": {
                    "Url": "https:\/\/localhost\/01\/assets\/powercmsx.png",
                    "Label": null,
                    "Metadata": {
                        "file_size": 76618,
                        "image_width": 600,
                        "image_height": 600,
                        "class": "image",
                        "extension": "png",
                        "mime_type": "image\/png",
                        "uploaded": "2021-09-02 15:11:58",
                        "user_id": 1
                    }
                },
                "Permalink": "https:\/\/localhost\/01\/assets\/powercmsx.png",
                "Thumbnail": "https:\/\/localhost\/powercmsx\/assets_c\/thumb-asset-128xauto-square-26-file.png"
            }
        ],
        "excerpt": "Our StoryLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        "categories": [
            {
                "id": 1,
                "label": "Press Release",
                "Permalink": "https:\/\/localhost\/01\/press_release\/index.html"
            }
        ],
        "tags": [
            {
                "id": 6,
                "name": "PowerCMS X"
            }
        ],
        "basename": "powercmsx_1",
        "status": 4,
        "has_deadline": 0,
        "published_on": "2021-09-01 12:47:46",
        "allow_comment": 0
    }

レスポンス・エラー : 

許可されないリクエストメソッド

    {
        "status": 400,
        "message": "Method リクエストメソッド not allowed."
    }

JSONのパースエラー、JSONにキー「id」指定がある

    {
        "status": 400,
        "message": "Invalid request."
    }

認証付きリクエストでないか、有効なユーザーではない、権限がない、またはユーザーが指定できないステータスを指定しようとしている

    {
        "status": 403,
        "message": "Permission denied."
    }

JSONにキー「workspace\_id」指定があって、実行中のスコープと異なる

    {
        "status": 403,
        "message": "Invalid workspace_id specified."
    }

バリデーション・エラー

- Required\(必須\)
- Invalid(バリデーションエラー\)
- Duplicate\(ユニークカラムの重複\)

各々をキーとしてカラム名とエラーメッセージの配列を errorsにセットして返します。

    {
        "status": 406,
        "message": "The input data is missing or contains incorrect values.",
        "errors": {
            "Required": {
                "カラム名": "エラーメッセージ"
            },
            "Invalid": {
                "カラム名": "エラーメッセージ"
            },
            "Duplicate": {
                "カラム名": "エラーメッセージ"
            }
        }
    }

プラグインなどのコールバックによって insertがキャンセルされた

    {
        "status": 406,
        "message": "Insert canceled by callback(エラー内容)."
    }

オブジェクトの保存に失敗した

    {
        "status": 500,
        "message": "An error occurred while save object."
    }

リビジョンのマスタが存在しない

    {
        "status": 500,
        "message": "Master not found."
    }

### update : オブジェクトを更新します。認証付きリクエストでログイン中のユーザーがそのオブジェクトに対する編集権限が必要です。

エンドポイント\(記事の例\) :  

    /api/v1/スコープID/モデル名/update/オブジェクトID
    /api/v1/1/entry/update/1

メソッド : PUT または POST  

リクエストボディ  

    {
        "title": "Welcome!",
        "text": "<h2>Our Story<\/h2>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\/p>\n<blockquote>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\/p>\n<\/blockquote>",
        "text_format": "richtext",
        "assets": [
            {
                "id": 26
            }
        ],
        "excerpt": "Our StoryLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        "categories": [
            {
                "id": 1
            }
        ],
        "tags": [
            {
                "id": 6
            }
        ],
        "basename": "powercmsx",
        "status": 4,
        "has_deadline": 0,
        "published_on": "2021-09-01 12:47:46",
        "allow_comment": 0
    }

レスポンス\(成功時\) :  

オブジェクトの idとリクエストボディの JSONで指定したキーの値を返します。

    {
        "id": 54,
        "title": "Welcome!",
        "text": "<h2>Our Story<\/h2>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\/p>\n<blockquote>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\/p>\n<\/blockquote>",
        "text_format": "richtext",
        "assets": [
            {
                "id": 26,
                "label": "powercmsx",
                "file": {
                    "Url": "https:\/\/localhost\/01\/assets\/powercmsx.png",
                    "Label": null,
                    "Metadata": {
                        "file_size": 76618,
                        "image_width": 600,
                        "image_height": 600,
                        "class": "image",
                        "extension": "png",
                        "mime_type": "image\/png",
                        "uploaded": "2021-09-02 15:11:58",
                        "user_id": 1
                    }
                },
                "Permalink": "https:\/\/localhost\/01\/assets\/powercmsx.png",
                "Thumbnail": "https:\/\/localhost\/powercmsx\/assets_c\/thumb-asset-128xauto-square-26-file.png"
            }
        ],
        "excerpt": "Our StoryLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
        "categories": [
            {
                "id": 1,
                "label": "Press Release",
                "Permalink": "https:\/\/localhost\/01\/press_release\/index.html"
            }
        ],
        "tags": [
            {
                "id": 6,
                "name": "PowerCMS X"
            }
        ],
        "basename": "powercmsx_1",
        "status": 4,
        "has_deadline": 0,
        "published_on": "2021-09-01 12:47:46",
        "allow_comment": 0
    }


レスポンス・エラー : 

許可されないリクエストメソッド

    {
        "status": 400,
        "message": "Method リクエストメソッド not allowed."
    }

JSONのパースエラー、JSONにキー「id」指定があり、対象のオブジェクトIDと異なっている

    {
        "status": 400,
        "message": "Invalid request."
    }

認証付きリクエストでないか、有効なユーザーではない、権限がない、またはユーザーが指定できないステータスを指定しようとしている

    {
        "status": 403,
        "message": "Permission denied."
    }

JSONにキー「workspace\_id」指定があって、実行中のスコープと異なる

    {
        "status": 403,
        "message": "Invalid workspace_id specified."
    }

バリデーション・エラー  

- Required\(必須\)
- Invalid(バリデーションエラー\)
- Duplicate\(ユニークカラムの重複\)

各々をキーとしてカラム名とエラーメッセージの配列を errorsにセットして返します。

    {
        "status": 406,
        "message": "The input data is missing or contains incorrect values.",
        "errors": {
            "Required": {
                "カラム名": "エラーメッセージ"
            },
            "Invalid": {
                "カラム名": "エラーメッセージ"
            },
            "Duplicate": {
                "カラム名": "エラーメッセージ"
            }
        }
    }

プラグインなどのコールバックによって updateがキャンセルされた

    {
        "status": 406,
        "message": "Update canceled by callback(エラー内容)."
    }

オブジェクトの保存に失敗した

    {
        "status": 500,
        "message": "An error occurred while save object."
    }

### delete : オブジェクトを削除します。認証付きリクエストでログイン中のユーザーがそのオブジェクトに対する削除権限が必要です。

エンドポイント\(記事の例\) :

    /api/v1/スコープID/モデル名/delete/オブジェクトID
    /api/v1/1/entry/delete/1

メソッド : DELETE または POST  

リクエストボディ  

なし  

レスポンス\(成功時\) :  

    {
        "Success": 1
    }

レスポンス・エラー : 

許可されないリクエストメソッド

    {
        "status": 400,
        "message": "Method リクエストメソッド not allowed."
    }

該当するオブジェクトが存在しない

    {
        "status": 404,
        "message": "The モデル名 was not found."
    }

認証付きリクエストでないか、有効なユーザーではない、権限がない

    {
        "status": 403,
        "message": "Permission denied."
    }

プラグインなどのコールバックによって deleteがキャンセルされた

    {
        "status": 406,
        "message": "Delete canceled by callback(エラー内容)."
    }

オブジェクトの削除に失敗した

    {
        "status": 500,
        "message": "An error occurred while delete object."
    }

### token : モデル「contact」に対してのみ有効なエンドポイントです。トークンを必要とするフォームに対して一時トークンを取得します。

エンドポイント :

    /api/v1/スコープID/contact/token/フォームID
    /api/v1/1/contact/token/1

メソッド : POST  

リクエストボディ  

なし  

レスポンス\(成功時\) :  

    {
        "magic_token": "一時トークン"
    }

レスポンス・エラー : 

トークンの生成に失敗した

    {
        "status": 500,
        "message": "An error occurred while generating token."
    }


### confirm : モデル「contact」に対してのみ有効なエンドポイントです。バリデーションを実行して結果を返します。

エンドポイント :

    /api/v1/スコープID/contact/confirm/フォームID
    /api/v1/1/contact/confirm/1

メソッド : POST  

リクエストボディ  

※ リクエストボディの代わりにフォームで生成した HTMLフォームのパラメタを POSTすることも可能です。

- Identifier : コンタクトの識別子です。
- Language : 言語を指定します。
- Permalink : フォームに URLが存在する場合、そのURL
- ObjectId : Permalinkを指定しない時、どのオブジェクトに対するフォームであるかを指定する場合にオブジェクトの IDを指定します。
- Model : Permalinkを指定しない時、どのオブジェクトに対するフォームであるかを指定する場合にオブジェクトのモデル名を指定します。

これらのキーはすべて省略可能です。すべて大文字で始まることに注意してください。これらのキーと別に、フォーム項目のベースネームと値を配列で追加します。

    {
        "Identifier": "contact_us",
        "Language": "ja",
        "Permalink":"https:\/\/localhost\/01\/contact\/website_contact_us.html",
        "website_your_name": "野田純生",
        "website_email": "webmaster@alfasado.jp",
        "website_subject": "テスト投稿",
        "website_message": "テスト投稿です",
        "website_privacy_policy": "agree"
    }

レスポンス\(成功時\) :  

    {
        "magic_token": "ebfb7c8cade1150b2734e46e7ca5ca5d",
        "params": {
            "Identifier": "contact_us",
            "Language": "ja",
            "Permalink": "https:\/\/localhost\/01\/contact\/website_contact_us.html",
            "website_your_name": "野田純生",
            "website_email": "webmaster@alfasado.jp",
            "website_subject": "テスト投稿",
            "website_message": "テスト投稿です",
            "website_privacy_policy": "agree"
        }
    }

※ バリデーション・エラーがあった時

    {
        "messages": [
            "お名前は必須です。",
            "正しいメールアドレスを指定してください。"
        ],
        "errors": {
            "website_your_name": "お名前は必須です。",
            "website_email": "正しいメールアドレスを指定してください。"
        },
        "params": {
            "Identifier": "contact_us",
            "Language": "ja",
            "Permalink": "https:\/\/localhost\/01\/contact\/website_contact_us.html",
            "website_your_name": "",
            "website_email": "webmaster",
            "website_subject": "テスト投稿",
            "website_message": "テスト投稿です",
            "website_privacy_policy": "agree"
        }
    }

レスポンス・エラー : 

何らかのエラーで一時トークンが発行できなかった時

    {
        "status": 500,
        "message": "An error occurred while generating token."
    }

### submit : モデル「contact」に対してのみ有効なエンドポイントです。フォームに対して投稿を行います。

エンドポイント :

    /api/v1/スコープID/contact/submit/フォームID
    /api/v1/1/contact/submit/1

メソッド : POST  

リクエストボディ  

※ リクエストボディの代わりにフォームで生成した HTMLフォームのパラメタを POSTすることも可能です。

- Identifier : コンタクトの識別子です。
- Language : 言語を指定します。
- Permalink : フォームに URLが存在する場合、そのURL
- ObjectId : Permalinkを指定しない時、どのオブジェクトに対するフォームであるかを指定する場合にオブジェクトの IDを指定します。
- Model : Permalinkを指定しない時、どのオブジェクトに対するフォームであるかを指定する場合にオブジェクトのモデル名を指定します。
- MagicToken : tokenエンドポイントまたは confirmエンドポイントへのリクエストで発行された一時トークン

これらのキーは一時トークンを必要とするフォームに対する「MagicToken」以外はすべて省略可能です。  
すべて大文字で始まることに注意してください。これらのキーと別に、フォーム項目のベースネームと値を配列で追加します。

    {
        "Identifier": "contact_us",
        "Language": "ja",
        "Permalink":"https:\/\/localhost\/01\/contact\/website_contact_us.html",
        "MagicToken" : "一時トークン",
        "website_your_name": "野田純生",
        "website_email": "webmaster@alfasado.jp",
        "website_subject": "テスト投稿",
        "website_message": "テスト投稿です",
        "website_privacy_policy": "agree"
    }

レスポンス\(成功時\) :  

フォームにリダイレクト先が指定されている時、redirect\_url にリダイレクト先が追加されます。  

    {
        "Success": 1,
        "contact": {
            "id": 30,
            "subject": "テスト投稿",
            "name": "野田純生",
            "email": "junnama@alfasado.jp",
            "identifier": "contact_us",
            "data": {
                "question_1": "野田純生",
                "question_2": "junnama@alfasado.jp",
                "question_3": "テスト投稿",
                "question_4": "テスト投稿です",
                "question_5": "agree"
            },
            "question_map": {
                "question_1": "Your Name",
                "question_2": "Email",
                "question_3": "Subject",
                "question_4": "Message",
                "question_5": "Privacy Policy"
            },
            "tags": [],
            "state": 1,
            "created_on": "2021-09-02 19:02:25",
            "model": "form",
            "remote_ip": "::1",
            "workspace_id": 1
        },
        "params": {
            "Identifier": "contact_us",
            "Language": "ja",
            "MagicToken": "一時トークン",
            "Permalink": "https:\/\/localhost\/01\/contact\/website_contact_us.html",
            "website_your_name": "野田純生",
            "website_email": "webmaster@alfasado.jp",
            "website_subject": "テスト投稿",
            "website_message": "テスト投稿です",
            "website_privacy_policy": "agree"
        },
        "redirect_url": "?submit=1"
    }

※ バリデーション・エラーがあった時

    {
        "messages": [
            "お名前は必須です。",
            "正しいメールアドレスを指定してください。"
        ],
        "errors": {
            "website_your_name": "お名前は必須です。",
            "website_email": "正しいメールアドレスを指定してください。"
        },
        "params": {
            "Identifier": "contact_us",
            "Language": "ja",
            "Permalink": "https:\/\/localhost\/01\/contact\/website_contact_us.html",
            "website_your_name": "",
            "website_email": "webmaster",
            "website_subject": "テスト投稿",
            "website_message": "テスト投稿です",
            "website_privacy_policy": "agree"
        }
    }

レスポンス・エラー : 


一時トークンが必要なフォームで一時トークンが渡されなかったか、正しくなかった時

    {
        "status": 403,
        "message": "Invalid request."
    }

一時トークンの有効期限が切れていた時

    {
        "status": 403,
        "message": "Your session has expired."
    }

環境変数「validate\_token\_ip」が指定されていて token or confirm 時と IPアドレスが異なる時

    {
        "status": 403,
        "message": "Invalid IP address."
    }

環境変数「validate\_token\_ua」が指定されていて token or confirm 時と User Agent が異なる時

    {
        "status": 403,
        "message": "Invalid User Agent."
    }

フォームに「セッションを利用する」が指定されていて、セッションが正しくなかった時

    {
        "status": 403,
        "message": "Invalid session."
    }

### search : プラグイン「SearchEstraier」が有効でそのスコープ、そのモデルに対して検索インデックスが作成されている時に全文検索を行います。

エンドポイント\(記事の例\) :

    /api/v1/スコープID/モデル名/search
    /api/v1/1/entry/search/

メソッド : GET または POST

パラメタ : 

- query : キーワード\(スペース区切りで複数指定可能\)
- limit : 取得する最大件数\(省略時環境変数 api\_list\_limit : 初期値25\)
- offset : スキップする件数
- sort\_by : ソートするメタ情報のキー
- sort\_order : ascend\(昇順\) もしくは descend\(降順\)
- and\_or : AND もしくは OR
- cols : 返却するキー

query は必須です。このエンドポイントは、インデックスされていて、URLマップが設定されて公開されているオブジェクトのみが検索対象となります。  
sort\_by が省略されているとき、キーワードに対するマッチ順に表示されます。

    ?limit=件数&offset=スキップする件数&sort_by=メタ情報のキー&sort_order=昇順もしくは降順&cols=返却するキー1,返却するキー2&query=キーワード&and_or=AND

レスポンス\(成功時\) :

totalResultには、limitに関わらず指定した条件にマッチするオブジェクトのトータル件数がセットされます。

    {
        "totalResult": 10,
        "items": [
            {
                "id": 1,
                "title": "Welcome!",
                "text": "<h2>Our Story<\/h2>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\/p>\n<blockquote>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<\/p>\n<\/blockquote>",
                "text_format": "richtext",
                "assets": [
                    {
                        "id": 26,
                        "label": "powercmsx",
                        "file": {
                            "Url": "https:\/\/localhost\/01\/assets\/powercmsx.png",
                            "Label": null,
                            "Metadata": {
                                "file_size": 76618,
                                "image_width": 600,
                                "image_height": 600,
                                "class": "image",
                                "extension": "png",
                                "mime_type": "image\/png",
                                "uploaded": "2021-09-02 15:11:58",
                                "user_id": 1
                            }
                        },
                        "extra_path": "assets\/",
                        "file_name": "powercmsx.png",
                        "file_ext": "png",
                        "mime_type": "image\/png",
                        "tags": [],
                        "size": 76618,
                        "image_width": 600,
                        "image_height": 600,
                        "class": "image",
                        "status": 4,
                        "created_by": 1,
                        "modified_by": 1,
                        "created_on": "2021-09-02 15:11:58",
                        "modified_on": "2021-09-02 15:11:58",
                        "workspace_id": 1,
                        "published_on": "2021-09-02 15:11:58",
                        "rev_type": 0,
                        "user_id": 1,
                        "uuid": "a415ce51-5e70-4b1b-9413-8342f3e864ab",
                        "Permalink": "http:\/\/mt4local.alfasado.net\/01\/assets\/powercmsx.png",
                        "Thumbnail": "https:\/\/localhost\/powercmsx\/assets_c\/thumb-asset-128xauto-square-26-file.png"
                    }
                ],
                "text_more": "",
                "excerpt": "Our StoryLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "keywords": "",
                "categories": [
                    {
                        "id": 1,
                        "label": "Press Release",
                        "order": 1,
                        "basename": "press_release",
                        "workspace_id": 1,
                        "created_on": "2021-08-27 15:13:45",
                        "modified_on": "2021-08-27 15:13:45",
                        "created_by": 1,
                        "modified_by": 1,
                        "Permalink": "http:\/\/mt4local.alfasado.net\/01\/press_release\/index.html",
                        "Path": "press_release"
                    }
                ],
                "tags": [
                    {
                        "id": 6,
                        "name": "PowerCMS X",
                        "normalize": "powercmsx",
                        "class": "entry",
                        "order": 2,
                        "workspace_id": 1,
                        "created_on": "2021-09-02 15:09:57",
                        "modified_on": "2021-09-02 15:09:57",
                        "created_by": 1,
                        "modified_by": 1
                    }
                ],
                "extra_path": "",
                "basename": "powercmsx",
                "status": 4,
                "has_deadline": 0,
                "published_on": "2021-09-01 12:47:46",
                "user_id": {
                    "id": 1,
                    "nickname": "Junnama Noda",
                    "photo": "",
                    "text_format": "",
                    "space_order": "",
                    "fix_spacebar": 1,
                    "language": "ja",
                    "control_border": "",
                    "status": 2
                },
                "previous_owner": 0,
                "allow_comment": 0,
                "created_on": "2021-08-27 15:13:45",
                "modified_on": "2021-09-02 15:12:06",
                "created_by": 1,
                "modified_by": 1,
                "workspace_id": 1,
                "uuid": "d574478a-6762-434f-b002-723c835444ee",
                "Permalink": "http:\/\/mt4local.alfasado.net\/01\/press_release\/powercmsx.html"
            }
        ]
    }

レスポンス・エラー : 

許可されないリクエストメソッド

    {
        "status": 400,
        "message": "Method リクエストメソッド not allowed."
    }

## プラグインによる RESTful APIへのメソッドの追加

プラグインによって RESTful APIへメソッドを追加することができます。

config\.json

    {
        "label": "RESTfulAPIEndPoint",
        "id": "restfulapiendpoint",
        "component": "RESTfulAPIEndPoint",
        "description": "Provides RESTful API Custom EndPoint.",
        "version": "1.0",
        "author": "Alfasado Inc.",
        "author_link": "https://alfasado.net/",
        "api_methods": {
            "v1" : {
                "custom_end_point": {
                    "component": "RESTfulAPIEndPoint",
                    "method": "custom_end_point",
                    "permission": "create_entry",
                    "allowed" : [
                        "PUT",
                        "POST"
                    ]
                }
            }
        }
    }

RESTfulAPIEndPoint\.php

    <?php
    require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

    class RESTfulAPIEndPoint extends PTPlugin {

        function __construct () {
            parent::__construct();
        }

        function custom_end_point ( $app ) {
            // $app は PTRESTfulAPIv1 クラス
            // $app->id は 'RESTfulAPI'
            // $app->json_error( 'An error has occurred.', 403 );
            // $app->json_error( 'An error has occurred(%s).', 'Error Messaage', 403 );
            $json = [];
            $app->print_json( $json );
        }
    }

## フックとコールバック

- フックは管理画面と同様に動作します。
- insert, update, delete 時には管理画面の save, deleteメソッド実行時のコールバックが呼ばれます。
- ファイルのパブリッシュ時は publish\_callbacks 関連のコールバックが呼ばれます。

モデル restfulapi に対する「pre\_response」コールバックを登録することで、レスポンスを返す直前のデータの配列にアクセスできます。

    $app->init_callbacks( 'restfulapi', 'pre_response' );
    $callback = ['name' => 'pre_response'];
    $this->run_callbacks( $callback, 'restfulapi', $json );

第3引数 &$json をカスタマイズすることで、そのデータを返します。

    function pre_response ( $cb, $app, &$json ) {
    }
