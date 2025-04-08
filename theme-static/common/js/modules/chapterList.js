const chapterList = (player, options = {}) => {
    const chaptersElem = player.el().closest('.p-pcmsxVideoPlayer').querySelector('.p-chapters__inner');
    const defaults = {
        breakPoint: 768,
    };
    const settings = Object.assign(defaults, options);
    const mql = window.matchMedia(`(min-width: ${settings.breakPoint}px)`);

    if (!chaptersElem) {
        return;
    }

    const chaptersWrapperElem = chaptersElem.parentNode;
    const closeButton = chaptersElem.querySelector('.p-chapters__close');
    const jsonUrl = chaptersElem.dataset.chapterJson;

    const displayChapters = (chapters) => {
        const template = chaptersElem.querySelector('.p-chapters__template');
        const list = chaptersElem.querySelector('.p-chapters__list');

        chapters.forEach((chapter) => {
            const clone = template.content.cloneNode(true);
            const image = clone.querySelector('img');
            const name = clone.querySelector('.p-chapters__name');
            const time = clone.querySelector('.p-chapters__time');
            const button = clone.querySelector('.p-chapters__button');
            image.src = chapter.thumbnail;
            name.textContent = chapter.name;
            time.textContent = chapter.startTime;
            button.addEventListener('click', () => {
                const [hour, minute, second] = chapter.startTime.split(':');
                player.currentTime((Number(hour) * 60 * 60) + (Number(minute) * 60) + Number(second));
                if (!mql.matches) {
                    chaptersWrapperElem.close();
                }
            });

            list.appendChild(clone);
        });
    };

    closeButton.addEventListener('click', () => {
        if (mql.matches) {
            chaptersWrapperElem.classList.remove('-show');
            chaptersWrapperElem.addEventListener('animationend', () => {
                chaptersWrapperElem.classList.remove('-hideAnimation');
                chaptersWrapperElem.open = false;
            }, { once: true });
            chaptersWrapperElem.classList.add('-hideAnimation');
            player.el().querySelector('.vjs-chapter-name button').focus();
        } else {
            chaptersWrapperElem.close();
        }
    });

    const closeHandler = (e) => {
        if (e.target.tagName.toLowerCase() === 'dialog') {
            chaptersWrapperElem.close();
        }
    };
    const observer = new MutationObserver((mutations) => {
        if (!mql.matches) {
            if (mutations[0].attributeName === 'open' && mutations[0].oldValue === null) {
                window.addEventListener('touchend', closeHandler);
            } else {
                window.removeEventListener('touchend', closeHandler);
            }
        }
    });
    observer.observe(chaptersElem.parentNode, {
        attributes: true,
        attributeOldValue: true,
    });

    fetch(jsonUrl)
        .then((response) => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            return response.json();
        })
        .then((json) => {
            displayChapters(json);
        });
};

export default chapterList;
