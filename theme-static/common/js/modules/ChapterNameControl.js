export default class ChapterNameControl extends videojs.getComponent('Component') {
    constructor(player, options = {}) {
        super(player, options);

        this.defaults = {
            breakPoint: 768,
            lang: 'ja',
        };
        this.settings = Object.assign(this.defaults, options);
        this.settings.mql = window.matchMedia(`(min-width: ${this.settings.breakPoint}px)`);

        this.addClass('vjs-chapter-name vjs-control vjs-time-control');
        this.tracks = null;
        this.chapterDisplay = null;
        this.chapterList = player.el().closest('.p-pcmsxVideoPlayer').querySelector('.p-chapters');

        this.player().on('ready', () => {
            this.init();
        });
    }

    getCurrentChapter() {
        const currentTime = this.player().currentTime();

        if (!this.tracks.cues) {
            return '';
        }

        for (let i = 0; i < this.tracks.cues.length; i += 1) {
            if (
                this.tracks.cues[i].startTime <= currentTime
                && currentTime <= this.tracks.cues[i].endTime
            ) {
                return this.tracks.cues[i].text;
            }
        }

        return '';
    }

    updateChapter_() {
        const currentChapter = this.getCurrentChapter();
        this.chapterDisplay.textContent = currentChapter;
    }

    detectChapterTrack() {
        const tracks = this.player().textTracks() || [];
        for (let i = tracks.length - 1; i >= 0; i -= 1) {
            const track = tracks[i];
            if (track.kind === 'chapters') {
                this.tracks = track;
            }
        }
    }

    init() {
        this.detectChapterTrack();

        if (!this.tracks) {
            return;
        }

        const button = this.createEl('button', {
            type: 'button',
            title: this.settings.lang === 'ja' ? 'チャプター' : 'Chapter',
        });
        this.chapterDisplay = this.createEl('span');
        button.appendChild(this.chapterDisplay);

        const arrowText = document.createTextNode(String.fromCharCode(62));
        button.appendChild(arrowText);

        button.addEventListener('click', () => {
            if (this.settings.mql.matches) {
                if (this.chapterList.open) {
                    this.chapterList.addEventListener('animationend', () => {
                        this.chapterList.classList.remove('-hideAnimation');
                        this.chapterList.open = false;
                    }, { once: true });
                    this.chapterList.classList.add('-hideAnimation');
                } else {
                    this.chapterList.open = true;
                    this.chapterList.focus();
                }
            } else {
                this.chapterList.showModal();
            }
        });
        this.el().appendChild(button);

        this.tracks.on('cuechange', () => {
            this.updateChapter_();
        });
        this.updateChapter_();

        this.settings.mql.addEventListener('change', () => {
            this.chapterList.close();
            this.chapterList.classList.remove('-hideAnimation');
        });

        this.player().on('ended', () => {
            this.chapterDisplay.textContent = this.tracks.cues[this.tracks.cues.length - 1].text;
        });
    }
}

videojs.registerComponent('ChapterNameControl', ChapterNameControl);
