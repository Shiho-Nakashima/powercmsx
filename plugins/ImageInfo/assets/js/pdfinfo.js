import './pdf.min.mjs';

/**
 * PDFに関する情報の表示
 */
class PTPDFInfo {

    constructor() {
        /** @type {HTMLElement} */
        this.extractedTextElem = document.getElementById('extracted-text');

        /** @type {PDFDocumentProxy} */
        this.doc = null;

        /** @type {number} */
        this.nPages = 0;

        /** @type {object} */
        this.altTextData = {};

        /** @type {array} */
        this.imageObjectsData = [];
    }

    /**
     * 構造ツリーから代替テキストを収集する
     */
     async collectAltTextData() {
        const _this = this;
        for (let pageNum = 1; pageNum <= this.nPages; pageNum += 1) {
            const page = await this.doc.getPage(pageNum);
            const structTree = await page.getStructTree();
            function treeWalk(elements) {
                elements.forEach((elem) => {
                    if (elem.role === 'Figure') {
                        const num = elem.children[0].id.replace(/.*mc([0-9]+)$/, '$1');
                        _this.altTextData[num] = elem.alt ? elem.alt : '（代替テキストがありません）';
                    } else if (elem.alt) {
                        const num = elem.children[0].id.replace(/.*mc([0-9]+)$/, '$1');
                        _this.altTextData[num] = '（装飾的な画像としてマーク）';
                    } else if (elem.children) {
                        treeWalk(elem.children);
                    }
                });
            }

            if (structTree) {
                treeWalk(structTree.children);
            }
        }
    }

    /**
     * ページのオペレータ一覧から画像情報を収集する
     */
     async collectImageObjectsData() {
        for (let pageNum = 1; pageNum <= this.nPages; pageNum += 1) {
            const page = await this.doc.getPage(pageNum);
            await page.getOperatorList().then((ops) => {
                const fns = ops.fnArray;
                const args = ops.argsArray;
                let i = 0;
                let mcid = 0; // mcid: Marked Content ID
                fns.forEach(item => {
                    for (let prop in pdfjsLib.OPS) {
                        if (item === pdfjsLib.OPS[prop]) {
                            if (prop === 'beginMarkedContentProps') {
                                mcid = args[i][1];
                            } else if (prop === 'paintImageXObject') {
                                this.imageObjectsData.push({
                                    mcid: mcid,
                                    object_id: args[i][0],
                                    page: pageNum,
                                })
                            }
                        }
                    }
                    i += 1;
                });
            });
        }
    }

    /**
     * 画像と代替テキストの描画
     * @param {string} 描画先のdiv要素id属性値
     */
     async renderImageAndAltText(id) {
        const target = document.getElementById(id);
        const fragment = document.createDocumentFragment();
        const options = {
            containerClass: 'carousel-item',
        };

        let page = null;
        let currentPage = 0;
        for (let i = 0, nObjects = this.imageObjectsData.length; i < nObjects; i += 1) {
            const object = this.imageObjectsData[i];
            let pageNum = object.page;
            if (pageNum !== currentPage) {
                page = await this.doc.getPage(pageNum);
                currentPage = pageNum;
            }

            await page.objs.get(object.object_id, img => {
                const containerElem = document.createElement('div');
                containerElem.dataset.order = i;
                if (options.containerClass) {
                    containerElem.classList.add(options.containerClass);
                    if (i === 0) {
                        containerElem.classList.add('active');
                    }
                }

                const contentElem = document.createElement('div');
                const imageElem = document.createElement('div');
                imageElem.classList.add('image');
                const altTextElem = document.createElement('div');
                altTextElem.textContent = this.altTextData[object.mcid];
                altTextElem.classList.add('text');

                const canvas = document.createElement('canvas');
                canvas.width = img.width;
                canvas.height = img.height;
                const ctx = canvas.getContext('2d');

                try {
                    ctx.drawImage(img.bitmap, 0, 0);
                    imageElem.appendChild(canvas);
                } catch (e) {
                    console.log(e.message);
                    imageElem.textContent = '画像 ' + object.mcid + ' が正しく読み込めませんでした';
                }
                contentElem.appendChild(altTextElem);
                contentElem.appendChild(imageElem);
                containerElem.appendChild(contentElem);
                fragment.appendChild(containerElem);
            });
        }

        target.appendChild(fragment);
    }

    /**
     * 指定ページのテキストを取得
     * @param {number} ページ番号
     */
     _extractPageText(pageNum) {
        return new Promise(async (resolve) => {
            let buffer = '';
            const page = await this.doc.getPage(pageNum);
            const reader = page.streamTextContent().getReader();
            reader.read().then(function pomp({ done, value }) {
                if (done) {
                    buffer += '\n\n';
                    resolve(buffer);
                    return;
                }
                value.items.forEach((data) => {
                    buffer += data.str;
                    if (data.hasEOL) {
                        buffer += '\n';
                    }
                });
                reader.read().then(pomp);
            });
        });
    }

    /**
     * テキストを取得
     */
     async extractText() {
        let buffer = '';
        for (let pageNum = 1; pageNum <= this.nPages; pageNum += 1) {
            const text = await this._extractPageText(pageNum);
            if (text.trim()) {
                buffer += `(Page: ${pageNum})\n${text}`;
            }
        }

        if (buffer) {
            this.extractedTextElem.textContent = buffer;
            if (window.setPDFInfoCache) {
                window.setPDFInfoCache(buffer);
            }
        }
    };

    /**
     * 初期化
     * @param {string} PDFファイルのURL
     */
     async init(fileUrl, assetDir) {
        pdfjsLib.GlobalWorkerOptions.workerSrc = `${assetDir}/js/pdf.worker.min.mjs`;

        return new Promise(async (resolve) => {
            const loadingTask = pdfjsLib.getDocument({
                url: fileUrl,
                cMapUrl: `${assetDir}/js/cmaps/`,
                cMapPacked: true,
            });
            const doc = this.doc = await loadingTask.promise;
            this.nPages = doc.numPages;
            resolve();
        });
    }

}

window.PTPDFInfo = PTPDFInfo;
