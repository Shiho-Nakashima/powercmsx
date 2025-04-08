export default class ControlsBackground extends videojs.getComponent('Component') {
    constructor(player) {
        super(player);
        this.player().on('ready', () => {
            ControlsBackground.init(player);
        });
    }

    static init(player) {
        const background = document.createElement('div');
        background.classList.add('vjs-controls-background');
        background.addEventListener('click', () => {
            if (player.paused()) {
                player.play();
            } else {
                player.pause();
            }
        });

        const poster = player.el().querySelector('.vjs-poster');
        poster.parentNode.insertBefore(background, poster);
    }
}

videojs.registerComponent('ControlsBackground', ControlsBackground);
