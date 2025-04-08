const AXE_SOURCE = require('axe-core').source;
const AXE_LOCALE_JA = require('axe-core/locales/ja.json');
const deepExtend = require('deep-extend');
const fs = require('fs');

function mergeConfig(options) {
    const defaultUserConfigPath = process.cwd() + '/axe-runner.config.js';
    const defaltConfig = {
        config: {
            locale: AXE_LOCALE_JA,
        },
        context: null,
        options: {
            runOnly: ['wcag2a', 'wcag21a', 'wcag22a', 'wcag2aa', 'wcag21aa', 'wcag22aa'],
            resultTypes: ['violations', 'incomplete'],
        },
        navigateOptions: {
            waitUntil: ['load', 'networkidle0'],
        },
    };
    let userConfig;
    if (options.config) {
        const userConfigPath = process.cwd() + '/' + options.config;
        if (fs.existsSync(userConfigPath)) {
            userConfig = require(userConfigPath);
        }
    } else if (fs.existsSync(defaultUserConfigPath)) {
        userConfig = require(defaultUserConfigPath);
    }
    const execConfig = deepExtend(defaltConfig, userConfig);
    return execConfig;
}

async function setupDevice(browser, execConfig) {
    let device;
    if (execConfig.device) {
        if (typeof execConfig.device === 'string') {
            device = puppeteer.devices[execConfig.device];
        } else if (typeof execConfig.device === 'object') {
            device = execConfig.device;
        }
    }

    if (!device) {
        const userAgentString = await browser.userAgent();
        device = {
            name: 'Chrome',
            userAgent: userAgentString,
            viewport: {
                width: 1280,
                height: 800,
                deviceScaleFactor: 1,
                isMobile: false,
                hasTouch: false,
                isLandscape: false
            }
        };
    }

    return device;
}

function filterRunOnlySetting(options, runOnly) {
    if (options.version === 'wcag21') {
        runOnly = runOnly.filter(item => !/^wcag22/.test(item));
    } else if (options.version === 'wcag2') {
        runOnly = runOnly.filter(item => !/^wcag2(1|2)/.test(item));
    }

    if (parseInt(options.level) === 1) {
        runOnly = runOnly.filter(item => /\da$/.test(item));
    }

    return runOnly;
}

module.exports = async function a11ycheck(browser, url, options = {}) {
    if (options.appdir) {
        process.chdir(options.appdir);
    }
    // require('dotenv').config();
    const context = await browser.createIncognitoBrowserContext();
    const page = await context.newPage();
    const execConfig = mergeConfig(options);
    const device = await setupDevice(browser, execConfig);

    // プラグイン設定で指定した検証設定の反映
    execConfig.options.runOnly = filterRunOnlySetting(options, execConfig.options.runOnly);

    // プラグイン設定で指定した言語設定の反映
    if (options.locale) {
        const locale = options.locale.replace(/^'(.*)'$/, '$1');
        if (locale !== 'en') {
            execConfig.config.locale = require('axe-core/locales/' + locale + '.json');
        } else {
            delete execConfig.config.locale;
        }
    }

    await page.setBypassCSP(true);
    await page.emulate(device);
    await page.setDefaultTimeout( 0 );

    if (options.username && options.password) {
        await page.authenticate({
            username: options.username,
            password: options.password
        });
    }

    if (options.sessionNamePath) {
        const session_name = fs.readFileSync(options.sessionNamePath, 'utf-8');
        const cookies = [
            {
                'name': 'pt-member',
                'value': session_name,
                'domain': url.replace( /^https?:\/\/([^\/]+)\/.*/, '$1'),
            }
        ];
        await page.setCookie(...cookies);
    }

    // イベント設定
    let redirectUrl = null;
    await page.setRequestInterception(true);
    page.on('request', async request => {
        if (
            request.isNavigationRequest() &&
            (request.url() === redirectUrl || request.redirectChain().length)
        ) {
            await request.abort();
        } else {
            await request.continue();
        }
    });

    page.on('response', async response => {
        if (response.url() === url) {
            if (response.status() === 401) {
                console.error('HTTP 401 Unauthorized -', response.url());
            } else if (response.status() === 404) {
                console.error('HTTP 404 Not Found -', response.url());
            } else if (response.status() !== 301 && response.status() !== 302) {
                const refreshRegex = /http-equiv="refresh"\s+content="(\d+);\s*URL=([^"]+)"/;
                const body = await response.text();
                const found = body.match(refreshRegex);
                if (found) {
                    redirectUrl = found[2];
                    if (found[1] * 1 > 0) {
                        await page.evaluate(_ => window.stop());
                    }
                }
            }
        }
    });

    // ページ読み込み
    const response = await page.goto(url, execConfig.navigateOptions);
    // await page.screenshot({ path: '_check.png', fullPage: true });
    let message = null;
    if (!response) {
        if (redirectUrl) {
            page.close();
            context.close();
            return {};
        } else {
            message = 'HTTP 500 An Error Occurred'
        }
    } else if (response.status() !== 200) {

        if (response.status() === 401) {
            message = 'HTTP 401 Unauthorized';
        } else if (response.status() === 404) {
            message = 'HTTP 404 Not Found';
        } else if (response.status() === 500) {
            message = 'HTTP 500 Internal Server Error';
        }
    }

    if (message) {
        page.close();
        context.close();
        return {
            timestamp: new Date().toISOString(),
            error: message,
            url: url,
        };
    }

    // axeを注入して実行
    // See also: https://www.mitsue.co.jp/knowledge/blog/a11y/201903/07_1700.html
    await page.evaluate(`eval(${JSON.stringify(AXE_SOURCE)});`);
    const result = await page.evaluate(
        (config, context, options = {}) => {
            const { axe } = window;
            axe.configure(config);
            return axe.run(context || document, options);
        },
        execConfig.config,
        execConfig.context,
        execConfig.options,
    );

    page.close();
    context.close();
    return result;
}
