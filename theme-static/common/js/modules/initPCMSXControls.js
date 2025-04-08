import './ChapterNameControl.js';
import './CustomSettingsControl.js';
import './MiniPlayer.js';
import chapterList from './chapterList.js';
import ControlsBackground from './ControlsBackground.js';

const initPCMSXControls = (player, options) => {
    if (!options.breakPoint) {
        options.breakPoint = 768; // NOTE: 無指定でmergeされるとundefinedになってしまう
    }

    // ワイド画面向け設定パネル
    const customSettingsControl = player.addChild('CustomSettingsControl');
    const fullScreenToggleButton = player.controlBar.getChild('fullscreenToggle');
    player.controlBar.el().insertBefore(customSettingsControl.el(), fullScreenToggleButton.el());

    // ナロー画面向け設定パネル
    const dialog = document.createElement('dialog');
    const dialogComponent = player.addChild('CustomSettingPanel', { dialog });
    dialog.appendChild(dialogComponent.el());
    dialog.id = `vjs-custom-settings-dialog-${player.el().id}`;
    dialog.classList.add('vjs-custom-settings-dialog');
    dialog.addEventListener('click', (e) => {
        if (e.target.tagName.toLowerCase() === 'dialog') {
            dialog.close();
        }
    });
    document.body.appendChild(dialog);

    // ナロー画面向け設定パネル開閉ボタン
    const customSettingsDialogToggle = player.addChild('CustomSettingsDialogToggle', { dialogComponent });
    player.addChild(customSettingsDialogToggle);

    if (options.expandedChapterList) {
        player.addClass('pcmsx-expanded-chapter-list');

        // チャプター名表示
        const chapterNameControl = player.addChild('ChapterNameControl', {
            lang: options.language,
            breakPoint: options.breakPoint,
        });
        const targetControl = player.controlBar.getChild('durationDisplay');
        const targetControlIndex = player.controlBar.children().indexOf(targetControl);
        const targetControlNode = player.controlBar.el().children[targetControlIndex + 1];
        player.controlBar.el().insertBefore(chapterNameControl.el(), targetControlNode);

        // チャプターリスト
        chapterList(player, {
            breakPoint: options.breakPoint,
        });
    }

    // コントロールの背景（可視性向上のための透過黒背景）
    new ControlsBackground(player);

    // ミニプレーヤー
    if (options.miniPlayer !== false) {
        const miniPlayerOptions = options.miniPlayer === true ? {} : options.miniPlayer;
        miniPlayerOptions.breakPoint = options.breakPoint;
        player.miniPlayer(miniPlayerOptions);
    }
};

export default initPCMSXControls;
