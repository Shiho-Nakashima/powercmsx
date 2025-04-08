const utilities = (player) => {
    // Mute選択の保存
    player.on('volumechange', () => {
        window.sessionStorage.setItem('pcmsx_player_muted', player.muted());
    });

    // コントロールの表示非表示変化時に字幕の位置を調整
    let userActive;
    const userActiveHandler = (isActive) => {
        if (userActive !== isActive) {
            player.el().dispatchEvent(new Event('playerresize'));
            userActive = isActive;
        }
    };
    player.on('useractive', () => {
        userActiveHandler(true);
    });
    player.on('userinactive', () => {
        window.setTimeout(() => {
            userActiveHandler(false);
        }, 500);
    });
};

export default utilities;
