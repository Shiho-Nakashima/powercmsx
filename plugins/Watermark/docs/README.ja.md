# Watermarkプラグイン

## 概要

画像とビデオに透かしを追加します。
透かしを付ける対象となるのは、クラス「image」のアセット、クラス「image」「video」のファイル\(FileUploadプラグインによるアップロード・ファイル\)です。

ビデオへの透かしの合成については以下のフォーマットでの動作を確認しています。

- mp4
- mov
- webm

## インストール

- ビデオに透かしを追加するにはプラグイン「FileUploader」が有効である必要があります。

### 必要な外部コマンド・ライブラリ

- FFmpeg ※ ビデオに透かしを追加するのに必要

### 外部コマンド・ライブラリの入手先

- FFmpeg / ffprobe : <a href="https://www.ffmpeg.org/" target="_blank">https://www.ffmpeg.org/ <i class="fa fa-external-link" aria-hidden="true"></i></a>
- openh264 : <a href="https://github.com/cisco/openh264" target="_blank">https://github.com/cisco/openh264 <i class="fa fa-external-link" aria-hidden="true"></i></a>

### 環境変数

        "video_captions_codec": ""
        "simplifiedjapanese_ffprobe_path" : "/usr/local/bin/ffprobe", 
        "simplifiedjapanese_ffmpeg_path" : "/usr/local/bin/ffmpeg",

- video\_captions\_codec : キャプション合成時のコーデック \(※\)
- simplifiedjapanese\_ffprobe\_path : ffprobeコマンドのパス
- simplifiedjapanese\_ffmpeg\_path : ffmpegコマンドのパス

#### ※ FFmpegのコーデック指定について

H\.264 エンコードにはライセンス料がかかります。  
Cisco が配布する binary moduleについてはライセンス料が支払い済みなため、動画のコーデックには libopenh264を利用すると良いでしょう。

- openh264 をインストールする
- Cisco が配布するコンパイル済みファイル <a href="https://github.com/cisco/openh264/releases/" target="_blank">https://github.com/cisco/openh264/releases/ <i class="fa fa-external-link" aria-hidden="true"></i></a> と差し替える
- FFmpegを libopenh264 を有効な状態でコンパイルしてインストールする

        .configure --enable-libopenh264

- 環境変数「video\_captions\_codec」に「libopenh264」を指定する

        "video_captions_codec": "libopenh264"

※ 動画への透かしの追加には数分かかることがあります。

## プラグイン設定

- 位置\(既定値\) : デフォルトのラジオボタンの選択項目を指定します。
- 画像ディレクトリ : 透かし用の画像\(透過PNGフォーマット\)の保存場所を指定します※。指定のないときは plugins/Watermark/watermark 配下の画像が対象になります。
- システム設定を利用\(スペースのみで指定可能\) : システム設定を継承する時にチェックします。

※ 画像ディレクトリには、right\.png\(右寄せ\)、left\.png\(左寄せ\)の2つのファイルが必要です。  
※ 画像の横幅は合成するビデオや画像の最大幅にあわせて濁世してください。plugins/Watermark/watermark 配下の画像の横幅は、1940pxです。


