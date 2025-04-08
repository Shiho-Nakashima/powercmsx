const Button = videojs.getComponent('Button');

videojs.addLanguage('ja', {
    'Cancel mini player': 'ミニプレーヤーを解除',
});

/**
 * 動画ページをスクロールした時に動画をミニプレーヤーにする（右下に小さく表示する）機能
 * Video.jsの親要素を使用して表示を実現する
 */
class MiniPlayer extends videojs.getPlugin('plugin') {
    constructor(player, options) {
        super(player, options);
        this.player = player;
        this.closeButton = null;
        this.observer = null;
        this.defaults = {
            miniPlayerClassName: '-enable-miniplayer',
            threshold: 0.25,
            rootMargin: '0px',
            breakPoint: 768,
        };

        this.settings = Object.assign(this.defaults, options);
        this.settings.mql = window.matchMedia(`(min-width: ${this.settings.breakPoint}px)`);
        player.on('ready', () => {
            this.init_();
        });
    }

    /**
     * ミニプレーヤーの解除ボタン
     */
    createDisableButton_() {
        const button = new Button(this.player, {});
        button.controlText('Cancel mini player');
        button.addClass('vjs-disable-miniplayer');
        button.on('click', () => {
            this.player.removeClass(this.settings.miniPlayerClassName);
            this.observer.disconnect();
            button.disabled = true;
            button.setAttribute('aria-disabled', true);
        });
        this.player.addChild(button);
        this.closeButton = button;
    }

    /**
     * スクロール監視のセットアップ
     */
    createObserver_() {
        const options = {
            root: null,
            rootMargin: this.settings.rootMargin,
            threshold: this.settings.threshold,
        };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    this.player.removeClass(this.settings.miniPlayerClassName);
                    this.closeButton.disabled = true;
                    this.closeButton.setAttribute('aria-disabled', true);
                } else {
                    this.player.addClass(this.settings.miniPlayerClassName);
                    this.closeButton.disabled = false;
                    this.closeButton.setAttribute('aria-disabled', false);
                }
            });
        }, options);

        return observer;
    }

    /**
     * Initialize
     */
    init_() {
        const videoContainer = this.player.el().parentNode;
        const observer = this.createObserver_();
        this.observer = observer;

        this.createDisableButton_();

        // NOTE: ナロー画面のロード時にobserveしなければいい位の気持ちで簡易な設定
        if (this.settings.mql.matches) {
            observer.observe(videoContainer);
        } else {
            this.settings.mql.addEventListener('change', (e) => {
                if (e.matches) {
                    observer.observe(videoContainer);
                } else {
                    observer.disconnect();
                }
            });
        }
    }
}

videojs.registerPlugin('miniPlayer', MiniPlayer);
