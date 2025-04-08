# Recaptchaプラグイン

## 概要

フォームと会員登録フォームにreCAPTCHA v3による認証を追加します。  

## 事前準備

Googleアカウントを使用して、reCAPTCHAのAPI サイトキー/シークレットキーを取得します。  
以下URLより登録を行ってプラグイン設定に入力します。  
[https://www.google.com/recaptcha/about/](https://www.google.com/recaptcha/about/)

## プラグイン設定

API サイトキー、API シークレットキーへ取得したキーを入力してください。

- API JS URL : reCAPTCHA API URLを指定します。（初期値：https://www.google.com/recaptcha/api.js）
- API エンドポイント : reCAPTCHA APIのエンドポイントを指定します。（初期値：https://www.google.com/recaptcha/api/siteverify）
- API サイトキー : API サイトキーを指定します。JavaScriptでトークン発行時に利用します。
- API シークレットキー : API シークレットキーを指定します。サーバーサイドでの認証時に利用します。
- トークン(hidden) の name 属性 : サーバーにトークンを送信する際のkeyを指定します。（初期値：g_recaptcha_response）
- reCAPTCHAを認証する最低スコア : reCAPTCHAがBOTと判定するスコアを指定します。1.0が最も厳しく、0.1など下げると緩くなります。（初期値：0.7）
- 会員ページ : チェックを入れるとmemberの登録・編集フォームでreCAPTCHAが利用可能になります。

## 利用手順

システムのプラグイン管理画面でRecaptchaプラグインを有効化します。  
※プラグインを有効化するとformモデルに「reCAPTCHAを利用する」チェックボックスを追加します。

### ビューへトークン発行コードの追加

フォームよりAPIが生成したトークンをサーバーへ送信して認証します。  
後述のファンクションタグ mt:recaptchaaddtoken をフォーム及び会員登録・編集画面のビューに追加します。

## テンプレート・タグ

### ファンクションタグ

mt:recaptchaaddtoken

フォーム画面にトークン発行タグ（JavaScript）を挿入する際に利用します。  
form_class属性で、対象のform要素のクラス名を指定可能です（初期値は.recaptcha-form）。

    <mt:recaptchaaddtoken form_class=".recaptcha-form" />


展開すると以下コードになります。

    <script src="<mt:Var name="api_js_url" />?render=<mt:Var name="api_site_key" escape />"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
      const contactForm = document.querySelector('<mt:Var name="form_class" escape />');
      let recaptchaInput;
      function appendInput(name, value) {
        if (!contactForm) {
          return;
        }
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = value;
        contactForm.appendChild(input);
        return input;
      }
      grecaptcha.ready(() => {
        grecaptcha.execute('<mt:Var name="api_site_key" escape />', { action: 'contact' }).then((token) => {
          recaptchaInput = document.querySelector('[name="<mt:Var name="token_hidden_name" escape />"]');
          if (recaptchaInput) {
            recaptchaInput.value = token;
          } else {
            recaptchaInput = appendInput('<mt:Var name="token_hidden_name" escape />', token);
          }
        });

        setInterval(function() {
          grecaptcha.execute('<mt:Var name="api_site_key" escape />', { action: 'contact' }).then((token) => {
            if (recaptchaInput) {
              recaptchaInput.value = token;
            }
          });
        }, ((60 * 1000) * 3));
      });
    });
    </script>
