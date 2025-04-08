<?php ob_start();?>(() => {
  window.textnode_ruby_map = window.textnode_ruby_map || {};
  
  window.__SJFurigana = window.__SJFurigana || {};
  __SJFurigana.html = document.querySelector('html');
  __SJFurigana.hasRuby = __SJFurigana.cookie.get('__SJFurigana');
  __SJFurigana.rubyButton = document.querySelectorAll('.p-rubyButton');
  __SJFurigana.rubyLabel = document.querySelectorAll('.p-rubyButton__label');
  // __SJFurigana.jsonURL = null;

  // ひらがなのJSONを取得する
  __SJFurigana.getRubyJSON = async () => {
    const headers = {
      'Content-Type': 'application/json',
    };
    const response = await fetch(__SJFurigana.jsonURL, {
      method: 'get',
      // cache: 'no-cache',
      headers: headers,
    });
    return response;
  };

  // 「やさしい日本語」のcookieをチェックする
  __SJFurigana.hasEasy = () => {
    let tsutaeruCookie = __SJFurigana.cookie.get('__tsutaeruMO');
    if (tsutaeruCookie && tsutaeruCookie == 'easy') {
      return true;
    }
    return false;
  };

  __SJFurigana.updateRuby = async (init = false) => {
    const phrases = document.querySelectorAll('.tsutaeruRuby__phrase');
    const translations = document.querySelectorAll('.tsutaeruRuby__translation');
  
    // 以下の条件でひらがなを表示する
    // ・ページ読み込み時にひらがなが有効（Cookieが保存されている時）
    // ・ひらがな非表示時に「ひらがなをつける」ボタン押下
    if ((init && __SJFurigana.hasRuby !== 'disable') || (!init && __SJFurigana.hasRuby === 'disable')) {
      if (__SJFurigana.hasEasy()) {
        // Cookieにひらがな有効を保存
        __SJFurigana.cookie.bake({
          name: '__SJFurigana',
          value: 'enable'
        });
  
        if (__tsutaeruMO) {
          // リロードする
          __tsutaeruMO.reset();
        } else {
          // 「やさしい日本語」の cookie を削除する
          __SJFurigana.cookie.remove('__tsutaeruMO');
        }
        return false;
      }

      if (window.textnode_ruby_map && __SJFurigana.jsonURL) {
        __SJFurigana.rubyButton.forEach((button) => {
          button.style.opacity = '0.5';
          button.style.cursor = 'progress';
        });
        const response = await __SJFurigana.getRubyJSON();
        if (response.status === 200) {
          const json = await response.json();
          Object.assign(window.textnode_ruby_map, json);
        }
        __SJFurigana.rubyButton.forEach((button) => {
          button.style.opacity = '';
          button.style.cursor = '';
        });
      }

      // JSON形式のひらがなデータからテキストノードの置き換えを実行
      __SJFurigana.init();
  
      // 変換前のテキスト（ひらがな無し）を非表示
      phrases.forEach((phrase) => {
        phrase.setAttribute('aria-hidden', 'true');
      });
      // 変換後のテキスト（ひらがな付き）を表示
      translations.forEach((translation) => {
        translation.setAttribute('aria-hidden', 'false');
      });
  
      // ボタンの文言を「ひらがなを消す」に切り替え
      __SJFurigana.rubyLabel.forEach((label) => {
        label.innerHTML = 'ひらがなを<ruby>消<rt>け</rt></ruby>す';
      });
      __SJFurigana.rubyButton.forEach((button) => {
        button.setAttribute('aria-label', 'ひらがなをけす: スクリーンリーダーでは、ひらがなを消すと読み上げをスムーズにできます');
      });
  
      // Cookieにひらがな有効を保存
      __SJFurigana.cookie.bake({
        name: '__SJFurigana',
        value: 'enable'
      });
      __SJFurigana.enable = true;
      __SJFurigana.hasRuby = 'enable';
      __SJFurigana.html.classList.add('-hasRuby');
      __SJFurigana.html.classList.remove('-hideRuby');
  
    // 「ひらがなを消す」ボタン押下で非表示とする
    } else if (!init) {
      // 変換前のテキスト（ひらがな無し）を表示
      phrases.forEach((phrase) => {
        phrase.setAttribute('aria-hidden', 'false');
      });
      // 変換後のテキスト（ひらがな付き）を非表示
      translations.forEach((translation) => {
        translation.setAttribute('aria-hidden', 'true');
      });
  
      // ボタンの文言を「ひらがなをつける」に切り替え
      __SJFurigana.rubyLabel.forEach((label) => {
        label.innerHTML = 'ひらがなをつける';
      });
      __SJFurigana.rubyButton.forEach((button) => {
        button.setAttribute('aria-label', 'ひらがなをつける');
      });
  
      // Cookieにひらがな無効を保存
      __SJFurigana.cookie.bake({
        name: '__SJFurigana',
        value: 'disable'
      });
      __SJFurigana.enable = false;
      __SJFurigana.hasRuby = 'disable';
      __SJFurigana.html.classList.remove('-hasRuby');
      __SJFurigana.html.classList.add('-hideRuby');
  
      __SJFurigana.config.complete();
    }
  };

  __SJFurigana.siteInit = () => {
    __SJFurigana.rubyButton.forEach((button) => {
      button.addEventListener('click', () => {
        __SJFurigana.updateRuby();
      });
    });
      
    window.addEventListener('DOMContentLoaded', () => {
      // 状態の保存がなければデフォルトでひらがな無効に設定
      if (!__SJFurigana.cookie.get('__SJFurigana')) {
        __SJFurigana.cookie.bake({
          name: '__SJFurigana',
          value: 'disable'
        });
        __SJFurigana.hasRuby = 'disable';
      }
      __SJFurigana.updateRuby(true);
    });
  };
})();<?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005690,
);?>