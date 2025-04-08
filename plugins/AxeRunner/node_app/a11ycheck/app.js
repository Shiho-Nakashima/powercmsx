const puppeteer = require('puppeteer');
const a11ycheck = require('./a11ycheck');
const AxeReports = require('powercms-axe-reports');
const { Command } = require('commander');
const program = new Command();
const PUPPETEER_LAUNCH_OPTION = process.env.NO_SANDBOX ? { args: ['--no-sandbox', '--disable-setuid-sandbox'] } : {args:['--headless']};

// NOTE: Amazon Linux 2023対応。最新のPuppeteerではこのオプションは必要ないと思われる。
if (process.env.CHROME) {
    if (PUPPETEER_LAUNCH_OPIOTN.args) {
        PUPPETEER_LAUNCH_OPTION.args.push('--headless=new');
    } else {
        PUPPETEER_LAUNCH_OPTION.args = ['--headless=new'];
    }
}

program
    .arguments('<url>')
    .option('-c, --config <value>', 'Path to configuration file.')
    .option('--appdir <value>', 'Application directory path.')
    .option('--username <value>', 'Username for basic authentication.')
    .option('--password <value>', 'Password for basic authentication.')
    .option('--version <value>', 'WCAG Target Version.')
    .option('--level <value>', 'WCAG Target Level.')
    .option('--violation-only <value>', 'Show only violation items.')
    .option('--proxy <value>', 'Proxy server address.')
    .option('--session-name-path <value>', 'Session name data path.')
    .option('--locale <value>', 'Report language settings.')
    .action(async (url, options) => {
        if (options.proxy) {
            if (PUPPETEER_LAUNCH_OPTION.args) {
                PUPPETEER_LAUNCH_OPTION.args.push('--proxy-server=' + options.proxy);
            } else {
                PUPPETEER_LAUNCH_OPTION.args = ['--proxy-server=' + options.proxy];
            }
        }

        PUPPETEER_LAUNCH_OPTION.headless = 'new';
        const browser = await puppeteer.launch(PUPPETEER_LAUNCH_OPTION);
        const result = await a11ycheck(browser, url, options);
        await browser.close();

        // プラグイン設定で指定した検証設定の反映
        if (parseInt(options.violationOnly) === 1) {
            delete result.incomplete;
        }

        // process.stdout.write(JSON.stringify(result) + "\n");
        if (result.error) {
            process.stdout.write(result.error);
        } else {
            AxeReports.createCsvReportRow(result, 'ja');
        }
    });

program.parse();
