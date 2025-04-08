// https://stackoverflow.com/questions/35604358/videojs-v5-adding-custom-components-in-es6-am-i-doing-it-right

const buttonClassName = '.vjs-custom-setting-control';

videojs.addLanguage('ja', {
    Auto: '自動',
    Normal: '標準',
    'Playback Rate': '再生速度',
    Quality: '画質',
    Settings: '設定',
});

/**
 * パネル
 */
export class CustomSettingPanel extends videojs.getComponent('Component') {
    constructor(player, options = {}) {
        super(player, options);

        this.defaults = {
            lang: 'ja',
        };
        this.settings = Object.assign(this.defaults, options);

        this.statusPanel = null;
        this.ratePanel = null;
        this.qualityPanel = null;
        this.qualities = [];
        this.qualityListCreated = false;
        this.autoQualitySelect = true;
        this.isShow = false;

        this.addClass('vjs-custom-setting-panel');
        this.setupPanel_();
    }

    /**
     * パネルの表示設定
     * @param {string} name - 表示するパネル
     * @param {string} focusButton - ステータスパネルでフォーカスするボタン
     */
    selectPanel(name, focusButton = null, skipStatusUpdate = false) {
        switch (name) {
        case 'rate':
            this.ratePanel.setAttribute('aria-hidden', false);
            this.ratePanel.querySelector('.heading').focus();
            this.statusPanel.setAttribute('aria-hidden', true);
            break;

        case 'quality':
            this.qualityPanel.setAttribute('aria-hidden', false);
            this.qualityPanel.querySelector('.heading').focus();
            this.statusPanel.setAttribute('aria-hidden', true);
            break;

        default:
            // NOTE: status
            if (!skipStatusUpdate) {
                this.updateStatusPanel_();
            }
            this.ratePanel.setAttribute('aria-hidden', true);
            this.qualityPanel.setAttribute('aria-hidden', true);
            this.statusPanel.setAttribute('aria-hidden', false);
            if (focusButton) {
                this.statusPanel.querySelector(`.${focusButton}`).focus();
            }
            break;
        }
    }

    /**
     * 再生速度選択パネル
     * @return {object} 再生速度設定パネル要素
     */
    setupRatePanel_() {
        const el = this.createEl('div', {
            className: 'vjs-playback-rate-panel',
        }, {
            'aria-hidden': true,
        });

        // 見出し
        const heading = this.createEl('div', {
            textContent: this.localize('Playback Rate'),
            className: 'heading',
            tabIndex: -1,
        });
        el.appendChild(heading);

        // 再生速度リスト項目
        const rates = this.player().playbackRates();
        const rateListItems = document.createDocumentFragment();
        rates.forEach((rate) => {
            const list = this.createEl('li');
            const button = this.createEl('button', {
                type: 'button',
                textContent: rate === 1 ? this.localize('Normal') : rate,
            });
            button.dataset.rate = rate;
            list.appendChild(button);
            list.dataset.rate = rate;
            rateListItems.appendChild(list);
        });

        // 再生速度リスト
        const rateList = this.createEl('ul', {
            className: 'vjs-playback-rates',
        });
        rateList.appendChild(rateListItems);
        rateList.addEventListener('click', (e) => {
            const selectRate = e.target.dataset.rate;
            this.player().playbackRate(selectRate);
            this.selectPanel('status', 'rate');
        });

        el.appendChild(rateList);
        this.contentEl().appendChild(el);

        return el;
    }

    /**
     * 画質選択パネル
     * @return {object} 画質設定パネル要素
     */
    setupQualityPanel_() {
        const el = this.createEl('div', {
            className: 'vjs-quality-panel',
        }, {
            'aria-hidden': true,
        });

        // 見出し
        const heading = this.createEl('div', {
            textContent: this.localize('Quality'),
            className: 'heading',
            tabIndex: -1,
        });
        el.appendChild(heading);

        // 画質リスト
        const qualityList = this.createEl('ul', {
            className: 'vjs-qualities',
        });
        el.appendChild(qualityList);
        this.contentEl().appendChild(el);

        // 再生後に画質が追加されるので配列に追加する（画質順とは限らない・パネル表示までには全部はいっているだろうという前提）
        this.player().qualityLevels().on('addqualitylevel', (qualityLevel) => {
            this.qualities.push(qualityLevel.qualityLevel.height);
        });

        return el;
    }

    /**
     * 画質リスト項目
     */
    setupQualityList_() {
        const qualityList = this.player().el().querySelector('.vjs-qualities');

        // 画質順に並び替えてリスト項目を生成
        this.qualities.sort((a, b) => a - b);
        this.qualities.push('auto');
        this.qualities.forEach((quality) => {
            const list = this.createEl('li');
            const button = this.createEl('button', {
                type: 'button',
                textContent: quality === 'auto' ? this.localize('Auto') : `${quality}p`,
            });
            button.dataset.quality = quality;
            list.dataset.quality = quality;
            list.appendChild(button);
            qualityList.appendChild(list);
        });

        this.qualityListCreated = true;

        // リスト項目押下時の処理（videojs-hls-quality-selectorの実装を参考にした）
        qualityList.addEventListener('click', (e) => {
            const { quality } = e.target.dataset;
            const qualityLevels = this.player().qualityLevels();
            for (let i = 0; i < qualityLevels.length; i += 1) {
                const { width, height } = qualityLevels[i];
                const pixels = width > height ? height : width;
                qualityLevels[i].enabled = (pixels === Number(quality) || quality === 'auto');
            }
            this.selectPanel('status', 'quality');
        });
    }

    /**
     * 再生速度・画質選択状態パネル
     * @return {object} 再生速度・画質選択状態パネル要素
     */
    setupStatusPanel_() {
        const el = this.createEl('div', {
            className: 'vjs-status-panel',
        });
        const list = document.createElement('ul');

        const panels = ['rate', 'quality'];
        const buttonText = {
            rate: 'Playback Rate',
            quality: 'Quality',
        };
        panels.forEach((panel) => {
            const listItem = document.createElement('li');
            const valueElem = document.createElement('span');
            const button = this.createEl('button', {
                type: 'button',
                className: panel,
                textContent: this.localize(buttonText[panel]),
            });
            button.addEventListener('click', () => {
                this.selectPanel(panel);
            });
            button.appendChild(valueElem);
            listItem.appendChild(button);
            list.appendChild(listItem);
        });

        el.appendChild(list);
        this.contentEl().appendChild(el);

        return el;
    }

    /**
     * 設定パネルのセットアップ
     */
    setupPanel_() {
        this.statusPanel = this.setupStatusPanel_();
        this.ratePanel = this.setupRatePanel_();
        this.qualityPanel = this.setupQualityPanel_();

        if (this.settings.dialog) {
            const dialogCloseButton = this.createEl('button', {
                type: 'button',
            });
            dialogCloseButton.classList.add('vjs-custom-setting-panel-close');
            dialogCloseButton.innerHTML = `<svg role="img" aria-label="${this.localize('Close')}" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><clipPath id="a"><path d="m0 0h16v16h-16z"/></clipPath><g clip-path="url(#a)"><path d="m9.483 8 6.21-6.21a1.049 1.049 0 0 0 -1.483-1.483l-6.21 6.21-6.21-6.21a1.049 1.049 0 0 0 -1.483 1.483l6.21 6.21-6.21 6.21a1.049 1.049 0 0 0 1.483 1.483l6.21-6.21 6.21 6.21a1.049 1.049 0 0 0 1.483-1.483z" fill="#fff"/></g></svg>`;
            dialogCloseButton.addEventListener('click', () => {
                this.settings.dialog.close();
            });
            this.contentEl().appendChild(dialogCloseButton);
        }

        this.on('keydown', (e) => {
            if (e.which === 27 && this.isShow) {
                this.closePanel();
                this.player().$(buttonClassName).focus();
            }
        });
    }

    /**
     * 再生速度リストのアクティブ状態更新
     * @param {number} rate - 現在の再生速度
     */
    updateActiveRate_(rate) {
        const rateList = this.ratePanel.querySelectorAll('li');
        rateList.forEach((rateItem) => {
            if (rate === Number(rateItem.dataset.rate)) {
                rateItem.querySelector('button').setAttribute('aria-current', true);
            } else {
                rateItem.querySelector('button').removeAttribute('aria-current', true);
            }
        });
    }

    /**
     * 画質リストのアクティブ状態更新
     * @param {number} quality - 現在の画質
     */
    updateActiveQuality_(quality) {
        const qualityList = this.qualityPanel.querySelectorAll('li');
        qualityList.forEach((qualityItem) => {
            // eslint-disable-next-line eqeqeq
            if (quality == qualityItem.dataset.quality) {
                qualityItem.querySelector('button').setAttribute('aria-current', true);
            } else {
                qualityItem.querySelector('button').removeAttribute('aria-current', true);
            }
        });
    }

    /**
     * 再生速度・画質選択状態パネルの値更新
     * 選択肢リストのアクティブ状態もここで反映する
     */
    updateStatusPanel_() {
        const rateDisplay = this.statusPanel.querySelector('.rate span');
        const rate = this.player().techGet_('playbackRate'); // NOTE: this.player().playbackRate()だとcacheが出る
        rateDisplay.textContent = rate === 1 ? this.localize('Normal') : rate;
        this.updateActiveRate_(rate);

        const qualityDisplay = this.statusPanel.querySelector('.quality span');
        const qualityLevels = this.player().qualityLevels();
        const enabledQuality = Array.from(qualityLevels).filter((qualityLevel) => qualityLevel.enabled);
        if (enabledQuality.length === 1) {
            qualityDisplay.textContent = `${enabledQuality[0].height}p`;
            this.updateActiveQuality_(enabledQuality[0].height);
        } else {
            qualityDisplay.textContent = this.localize('Auto');
            this.updateActiveQuality_('auto');
        }
    }

    /**
     * パネルを可視状態にする前の処理
     */
    beforeShow() {
        if (!this.qualityListCreated) {
            if (this.qualities && this.qualities[0] !== undefined) {
                this.setupQualityList_();
            } else {
                this.statusPanel.querySelector('.quality').parentNode.style.display = 'none';
            }
        }

        this.updateStatusPanel_();
        this.selectPanel('status', null, true);
    }

    /**
     * パネルを閉じる
     */
    closePanel() {
        this.removeClass('show');
        this.isShow = false;
        this.player().off('click', this.clickCloseHandler);
        this.player().addTechControlsListeners_(); // NOTE: private methodを実行している
    }

    /**
     * パネルを開く
     */
    openPanel() {
        this.beforeShow();
        this.addClass('show');
        this.isShow = true;
        this.player().removeTechControlsListeners_(); // NOTE: 画面クリックで再生・停止を一旦やめる。private methodを実行している

        const clickClose = (e) => {
            if (e.target.tagName.toLowerCase() === 'video') {
                this.closePanel();
            }
        };
        this.clickCloseHandler = clickClose.bind(this);
        this.player().on('click', this.clickCloseHandler);
    }
}

/**
 * パネル開閉ボタン
 */
class CustomSettingsControlButton extends videojs.getComponent('Button') {
    constructor(player, options = {}) {
        super(player, options);
        this.addClass(buttonClassName.replace(/^\./u, ''));
        this.controlText('Settings');
    }

    handleClick() {
        if (this.panel.isShow) {
            this.panel.closePanel();
        } else {
            this.panel.openPanel();
        }
    }
}

/**
 * パネルコントロール（パネルと開閉ボタンを包含するクラス）
 */
export class CustomSettingsControl extends videojs.getComponent('Component') {
    constructor(player, options = {}) {
        super(player, options);
        this.addClass('vjs-custom-setting-control-wrapper');

        this.addChild('CustomSettingsControlButton');
        const button = this.getChild('CustomSettingsControlButton');

        const panel = this.addChild('CustomSettingPanel');
        button.panel = panel;
    }
}

/**
 *パネルを表示するダイアログの表示コントロールボタン
 */
export class CustomSettingsDialogToggle extends videojs.getComponent('Button') {
    constructor(player, options = {}) {
        super(player, options);
        this.addClass('vjs-custom-setting-dialog-toggle');
        this.controlText('Settings');

        this.dialog = document.getElementById(`vjs-custom-settings-dialog-${player.el().id}`);
        this.dialogComponent = options.dialogComponent;
        this.dialogComponent.qualityListSelector = `#vjs-custom-settings-dialog-${player.el().id} .vjs-qualities`;
    }

    handleClick() {
        if (this.dialogComponent.isShow) {
            // NOTE: モーダルなので実際には閉じることはできない
            this.dialog.close();
        } else {
            this.dialogComponent.beforeShow();
            this.dialog.showModal();
        }
    }
}

videojs.registerComponent('CustomSettingPanel', CustomSettingPanel);
videojs.registerComponent('CustomSettingsControlButton', CustomSettingsControlButton);
videojs.registerComponent('CustomSettingsControl', CustomSettingsControl);
videojs.registerComponent('CustomSettingsDialogToggle', CustomSettingsDialogToggle);
