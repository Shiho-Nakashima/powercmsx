<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><?php $c_a8310c=null;ob_start();$_ba5c34_old_params['_a8310c']=$_ba5c34_local_params;$_ba5c34_old_vars['_a8310c']=$_ba5c34_local_vars;$a_a8310c=$this->setup_args(['merge_linefeeds'=>'1','this_tag'=>'block'],null,$this);$_a8310c=-1;$r_a8310c=true;while($r_a8310c===true):$r_a8310c=($_a8310c!==-1)?false:true;echo $this->block_block($a_a8310c,$c_a8310c,$this,$r_a8310c,++$_a8310c,'_a8310c');ob_start();?>
<?php $c_a8310c = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_a8310c=false;}if($c_a8310c ):?>

<?php $_ba5c34_old_params['_1b9e5f']=$_ba5c34_local_params;$_ba5c34_old_vars['_1b9e5f']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'websiteid','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['setvar'=>'barcolor','this_tag'=>'workspacebarcolor'],null,$this),$this),$this->setup_args('barcolor','setvar',$this),$this,'setvar')?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['setvar'=>'bartextcolor','this_tag'=>'workspacebartextcolor'],null,$this),$this),$this->setup_args('bartextcolor','setvar',$this),$this,'setvar')?>
<?php else:?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'barcolor','setvar'=>'barcolor','this_tag'=>'property'],null,$this),$this),$this->setup_args('barcolor','setvar',$this),$this,'setvar')?>
<?php echo $this->modifier_setvar($this->component('PTTags')->hdlr_property($this->setup_args(['name'=>'bartextcolor','setvar'=>'bartextcolor','this_tag'=>'property'],null,$this),$this),$this->setup_args('bartextcolor','setvar',$this),$this,'setvar')?>
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_1b9e5f'];$_ba5c34_local_vars=$_ba5c34_old_vars['_1b9e5f'];?>

<?php $_ba5c34_old_params['_34a278']=$_ba5c34_local_params;$_ba5c34_old_vars['_34a278']=$_ba5c34_local_vars;if($this->conditional_unless($this->setup_args(['name'=>'barcolor','this_tag'=>'unless'],null,$this),null,$this,true,true)):?>
<?php echo $this->function_setvar($this->setup_args(['name'=>'barcolor','value'=>'#e44','this_tag'=>'setvar'],null,$this),$this)?>
<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_34a278'];$_ba5c34_local_vars=$_ba5c34_old_vars['_34a278'];?>

@charset "UTF-8";
@font-face{font-family:'FontAwesome';src:url('<?php echo $this->function_var($this->setup_args(['name'=>'theme_static','this_tag'=>'var'],null,$this),$this)?>
media/fonts/fontawesome-webfont.eot?v=4.7.0');src:url('<?php echo $this->function_var($this->setup_args(['name'=>'theme_static','this_tag'=>'var'],null,$this),$this)?>
media/fonts/fontawesome-webfont.eot?#iefix&v=4.7.0') format('embedded-opentype'),url('<?php echo $this->function_var($this->setup_args(['name'=>'theme_static','this_tag'=>'var'],null,$this),$this)?>
media/fonts/fontawesome-webfont.woff2?v=4.7.0') format('woff2'),url('<?php echo $this->function_var($this->setup_args(['name'=>'theme_static','this_tag'=>'var'],null,$this),$this)?>
media/fonts/fontawesome-webfont.woff?v=4.7.0') format('woff'),url('<?php echo $this->function_var($this->setup_args(['name'=>'theme_static','this_tag'=>'var'],null,$this),$this)?>
media/fonts/fontawesome-webfont.ttf?v=4.7.0') format('truetype'),url('<?php echo $this->function_var($this->setup_args(['name'=>'theme_static','this_tag'=>'var'],null,$this),$this)?>
media/fonts/fontawesome-webfont.svg?v=4.7.0#fontawesomeregular') format('svg');font-weight:normal;font-style:normal}.fa{display:inline-block;font:normal normal normal 14px/1 FontAwesome;font-size:inherit;text-rendering:auto;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.fa-lg{font-size:1.33333333em;line-height:.75em;vertical-align:-15%}.fa-2x{font-size:2em}.fa-3x{font-size:3em}.fa-4x{font-size:4em}.fa-5x{font-size:5em}.fa-fw{width:1.28571429em;text-align:center}.fa-ul{padding-left:0;margin-left:2.14285714em;list-style-type:none}.fa-ul>li{position:relative}.fa-li{position:absolute;left:-2.14285714em;width:2.14285714em;top:.14285714em;text-align:center}.fa-li.fa-lg{left:-1.85714286em}.fa-border{padding:.2em .25em .15em;border:solid .08em #eee;border-radius:.1em}.fa-pull-left{float:left}.fa-pull-right{float:right}.fa.fa-pull-left{margin-right:.3em}.fa.fa-pull-right{margin-left:.3em}.pull-right{float:right}.pull-left{float:left}.fa.pull-left{margin-right:.3em}.fa.pull-right{margin-left:.3em}.fa-spin{-webkit-animation:fa-spin 2s infinite linear;animation:fa-spin 2s infinite linear}.fa-pulse{-webkit-animation:fa-spin 1s infinite steps(8);animation:fa-spin 1s infinite steps(8)}@-webkit-keyframes fa-spin{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}100%{-webkit-transform:rotate(359deg);transform:rotate(359deg)}}@keyframes fa-spin{0%{-webkit-transform:rotate(0deg);transform:rotate(0deg)}100%{-webkit-transform:rotate(359deg);transform:rotate(359deg)}}.fa-rotate-90{-ms-filter:"progid:DXImageTransform.Microsoft.BasicImage(rotation=1)";-webkit-transform:rotate(90deg);-ms-transform:rotate(90deg);transform:rotate(90deg)}.fa-rotate-180{-ms-filter:"progid:DXImageTransform.Microsoft.BasicImage(rotation=2)";-webkit-transform:rotate(180deg);-ms-transform:rotate(180deg);transform:rotate(180deg)}.fa-rotate-270{-ms-filter:"progid:DXImageTransform.Microsoft.BasicImage(rotation=3)";-webkit-transform:rotate(270deg);-ms-transform:rotate(270deg);transform:rotate(270deg)}.fa-flip-horizontal{-ms-filter:"progid:DXImageTransform.Microsoft.BasicImage(rotation=0, mirror=1)";-webkit-transform:scale(-1, 1);-ms-transform:scale(-1, 1);transform:scale(-1, 1)}.fa-flip-vertical{-ms-filter:"progid:DXImageTransform.Microsoft.BasicImage(rotation=2, mirror=1)";-webkit-transform:scale(1, -1);-ms-transform:scale(1, -1);transform:scale(1, -1)}:root .fa-rotate-90,:root .fa-rotate-180,:root .fa-rotate-270,:root .fa-flip-horizontal,:root .fa-flip-vertical{filter:none}.fa-stack{position:relative;display:inline-block;width:2em;height:2em;line-height:2em;vertical-align:middle}.fa-stack-1x,.fa-stack-2x{position:absolute;left:0;width:100%;text-align:center}.fa-stack-1x{line-height:inherit}.fa-stack-2x{font-size:2em}.fa-inverse{color:#fff}.fa-glass:before{content:"\f000"}.fa-music:before{content:"\f001"}.fa-search:before{content:"\f002"}.fa-envelope-o:before{content:"\f003"}.fa-heart:before{content:"\f004"}.fa-star:before{content:"\f005"}.fa-star-o:before{content:"\f006"}.fa-user:before{content:"\f007"}.fa-film:before{content:"\f008"}.fa-th-large:before{content:"\f009"}.fa-th:before{content:"\f00a"}.fa-th-list:before{content:"\f00b"}.fa-check:before{content:"\f00c"}.fa-remove:before,.fa-close:before,.fa-times:before{content:"\f00d"}.fa-search-plus:before{content:"\f00e"}.fa-search-minus:before{content:"\f010"}.fa-power-off:before{content:"\f011"}.fa-signal:before{content:"\f012"}.fa-gear:before,.fa-cog:before{content:"\f013"}.fa-trash-o:before{content:"\f014"}.fa-home:before{content:"\f015"}.fa-file-o:before{content:"\f016"}.fa-clock-o:before{content:"\f017"}.fa-road:before{content:"\f018"}.fa-download:before{content:"\f019"}.fa-arrow-circle-o-down:before{content:"\f01a"}.fa-arrow-circle-o-up:before{content:"\f01b"}.fa-inbox:before{content:"\f01c"}.fa-play-circle-o:before{content:"\f01d"}.fa-rotate-right:before,.fa-repeat:before{content:"\f01e"}.fa-refresh:before{content:"\f021"}.fa-list-alt:before{content:"\f022"}.fa-lock:before{content:"\f023"}.fa-flag:before{content:"\f024"}.fa-headphones:before{content:"\f025"}.fa-volume-off:before{content:"\f026"}.fa-volume-down:before{content:"\f027"}.fa-volume-up:before{content:"\f028"}.fa-qrcode:before{content:"\f029"}.fa-barcode:before{content:"\f02a"}.fa-tag:before{content:"\f02b"}.fa-tags:before{content:"\f02c"}.fa-book:before{content:"\f02d"}.fa-bookmark:before{content:"\f02e"}.fa-print:before{content:"\f02f"}.fa-camera:before{content:"\f030"}.fa-font:before{content:"\f031"}.fa-bold:before{content:"\f032"}.fa-italic:before{content:"\f033"}.fa-text-height:before{content:"\f034"}.fa-text-width:before{content:"\f035"}.fa-align-left:before{content:"\f036"}.fa-align-center:before{content:"\f037"}.fa-align-right:before{content:"\f038"}.fa-align-justify:before{content:"\f039"}.fa-list:before{content:"\f03a"}.fa-dedent:before,.fa-outdent:before{content:"\f03b"}.fa-indent:before{content:"\f03c"}.fa-video-camera:before{content:"\f03d"}.fa-photo:before,.fa-image:before,.fa-picture-o:before{content:"\f03e"}.fa-pencil:before{content:"\f040"}.fa-map-marker:before{content:"\f041"}.fa-adjust:before{content:"\f042"}.fa-tint:before{content:"\f043"}.fa-edit:before,.fa-pencil-square-o:before{content:"\f044"}.fa-share-square-o:before{content:"\f045"}.fa-check-square-o:before{content:"\f046"}.fa-arrows:before{content:"\f047"}.fa-step-backward:before{content:"\f048"}.fa-fast-backward:before{content:"\f049"}.fa-backward:before{content:"\f04a"}.fa-play:before{content:"\f04b"}.fa-pause:before{content:"\f04c"}.fa-stop:before{content:"\f04d"}.fa-forward:before{content:"\f04e"}.fa-fast-forward:before{content:"\f050"}.fa-step-forward:before{content:"\f051"}.fa-eject:before{content:"\f052"}.fa-chevron-left:before{content:"\f053"}.fa-chevron-right:before{content:"\f054"}.fa-plus-circle:before{content:"\f055"}.fa-minus-circle:before{content:"\f056"}.fa-times-circle:before{content:"\f057"}.fa-check-circle:before{content:"\f058"}.fa-question-circle:before{content:"\f059"}.fa-info-circle:before{content:"\f05a"}.fa-crosshairs:before{content:"\f05b"}.fa-times-circle-o:before{content:"\f05c"}.fa-check-circle-o:before{content:"\f05d"}.fa-ban:before{content:"\f05e"}.fa-arrow-left:before{content:"\f060"}.fa-arrow-right:before{content:"\f061"}.fa-arrow-up:before{content:"\f062"}.fa-arrow-down:before{content:"\f063"}.fa-mail-forward:before,.fa-share:before{content:"\f064"}.fa-expand:before{content:"\f065"}.fa-compress:before{content:"\f066"}.fa-plus:before{content:"\f067"}.fa-minus:before{content:"\f068"}.fa-asterisk:before{content:"\f069"}.fa-exclamation-circle:before{content:"\f06a"}.fa-gift:before{content:"\f06b"}.fa-leaf:before{content:"\f06c"}.fa-fire:before{content:"\f06d"}.fa-eye:before{content:"\f06e"}.fa-eye-slash:before{content:"\f070"}.fa-warning:before,.fa-exclamation-triangle:before{content:"\f071"}.fa-plane:before{content:"\f072"}.fa-calendar:before{content:"\f073"}.fa-random:before{content:"\f074"}.fa-comment:before{content:"\f075"}.fa-magnet:before{content:"\f076"}.fa-chevron-up:before{content:"\f077"}.fa-chevron-down:before{content:"\f078"}.fa-retweet:before{content:"\f079"}.fa-shopping-cart:before{content:"\f07a"}.fa-folder:before{content:"\f07b"}.fa-folder-open:before{content:"\f07c"}.fa-arrows-v:before{content:"\f07d"}.fa-arrows-h:before{content:"\f07e"}.fa-bar-chart-o:before,.fa-bar-chart:before{content:"\f080"}.fa-twitter-square:before{content:"\f081"}.fa-facebook-square:before{content:"\f082"}.fa-camera-retro:before{content:"\f083"}.fa-key:before{content:"\f084"}.fa-gears:before,.fa-cogs:before{content:"\f085"}.fa-comments:before{content:"\f086"}.fa-thumbs-o-up:before{content:"\f087"}.fa-thumbs-o-down:before{content:"\f088"}.fa-star-half:before{content:"\f089"}.fa-heart-o:before{content:"\f08a"}.fa-sign-out:before{content:"\f08b"}.fa-linkedin-square:before{content:"\f08c"}.fa-thumb-tack:before{content:"\f08d"}.fa-external-link:before{content:"\f08e"}.fa-sign-in:before{content:"\f090"}.fa-trophy:before{content:"\f091"}.fa-github-square:before{content:"\f092"}.fa-upload:before{content:"\f093"}.fa-lemon-o:before{content:"\f094"}.fa-phone:before{content:"\f095"}.fa-square-o:before{content:"\f096"}.fa-bookmark-o:before{content:"\f097"}.fa-phone-square:before{content:"\f098"}.fa-twitter:before{content:"\f099"}.fa-facebook-f:before,.fa-facebook:before{content:"\f09a"}.fa-github:before{content:"\f09b"}.fa-unlock:before{content:"\f09c"}.fa-credit-card:before{content:"\f09d"}.fa-feed:before,.fa-rss:before{content:"\f09e"}.fa-hdd-o:before{content:"\f0a0"}.fa-bullhorn:before{content:"\f0a1"}.fa-bell:before{content:"\f0f3"}.fa-certificate:before{content:"\f0a3"}.fa-hand-o-right:before{content:"\f0a4"}.fa-hand-o-left:before{content:"\f0a5"}.fa-hand-o-up:before{content:"\f0a6"}.fa-hand-o-down:before{content:"\f0a7"}.fa-arrow-circle-left:before{content:"\f0a8"}.fa-arrow-circle-right:before{content:"\f0a9"}.fa-arrow-circle-up:before{content:"\f0aa"}.fa-arrow-circle-down:before{content:"\f0ab"}.fa-globe:before{content:"\f0ac"}.fa-wrench:before{content:"\f0ad"}.fa-tasks:before{content:"\f0ae"}.fa-filter:before{content:"\f0b0"}.fa-briefcase:before{content:"\f0b1"}.fa-arrows-alt:before{content:"\f0b2"}.fa-group:before,.fa-users:before{content:"\f0c0"}.fa-chain:before,.fa-link:before{content:"\f0c1"}.fa-cloud:before{content:"\f0c2"}.fa-flask:before{content:"\f0c3"}.fa-cut:before,.fa-scissors:before{content:"\f0c4"}.fa-copy:before,.fa-files-o:before{content:"\f0c5"}.fa-paperclip:before{content:"\f0c6"}.fa-save:before,.fa-floppy-o:before{content:"\f0c7"}.fa-square:before{content:"\f0c8"}.fa-navicon:before,.fa-reorder:before,.fa-bars:before{content:"\f0c9"}.fa-list-ul:before{content:"\f0ca"}.fa-list-ol:before{content:"\f0cb"}.fa-strikethrough:before{content:"\f0cc"}.fa-underline:before{content:"\f0cd"}.fa-table:before{content:"\f0ce"}.fa-magic:before{content:"\f0d0"}.fa-truck:before{content:"\f0d1"}.fa-pinterest:before{content:"\f0d2"}.fa-pinterest-square:before{content:"\f0d3"}.fa-google-plus-square:before{content:"\f0d4"}.fa-google-plus:before{content:"\f0d5"}.fa-money:before{content:"\f0d6"}.fa-caret-down:before{content:"\f0d7"}.fa-caret-up:before{content:"\f0d8"}.fa-caret-left:before{content:"\f0d9"}.fa-caret-right:before{content:"\f0da"}.fa-columns:before{content:"\f0db"}.fa-unsorted:before,.fa-sort:before{content:"\f0dc"}.fa-sort-down:before,.fa-sort-desc:before{content:"\f0dd"}.fa-sort-up:before,.fa-sort-asc:before{content:"\f0de"}.fa-envelope:before{content:"\f0e0"}.fa-linkedin:before{content:"\f0e1"}.fa-rotate-left:before,.fa-undo:before{content:"\f0e2"}.fa-legal:before,.fa-gavel:before{content:"\f0e3"}.fa-dashboard:before,.fa-tachometer:before{content:"\f0e4"}.fa-comment-o:before{content:"\f0e5"}.fa-comments-o:before{content:"\f0e6"}.fa-flash:before,.fa-bolt:before{content:"\f0e7"}.fa-sitemap:before{content:"\f0e8"}.fa-umbrella:before{content:"\f0e9"}.fa-paste:before,.fa-clipboard:before{content:"\f0ea"}.fa-lightbulb-o:before{content:"\f0eb"}.fa-exchange:before{content:"\f0ec"}.fa-cloud-download:before{content:"\f0ed"}.fa-cloud-upload:before{content:"\f0ee"}.fa-user-md:before{content:"\f0f0"}.fa-stethoscope:before{content:"\f0f1"}.fa-suitcase:before{content:"\f0f2"}.fa-bell-o:before{content:"\f0a2"}.fa-coffee:before{content:"\f0f4"}.fa-cutlery:before{content:"\f0f5"}.fa-file-text-o:before{content:"\f0f6"}.fa-building-o:before{content:"\f0f7"}.fa-hospital-o:before{content:"\f0f8"}.fa-ambulance:before{content:"\f0f9"}.fa-medkit:before{content:"\f0fa"}.fa-fighter-jet:before{content:"\f0fb"}.fa-beer:before{content:"\f0fc"}.fa-h-square:before{content:"\f0fd"}.fa-plus-square:before{content:"\f0fe"}.fa-angle-double-left:before{content:"\f100"}.fa-angle-double-right:before{content:"\f101"}.fa-angle-double-up:before{content:"\f102"}.fa-angle-double-down:before{content:"\f103"}.fa-angle-left:before{content:"\f104"}.fa-angle-right:before{content:"\f105"}.fa-angle-up:before{content:"\f106"}.fa-angle-down:before{content:"\f107"}.fa-desktop:before{content:"\f108"}.fa-laptop:before{content:"\f109"}.fa-tablet:before{content:"\f10a"}.fa-mobile-phone:before,.fa-mobile:before{content:"\f10b"}.fa-circle-o:before{content:"\f10c"}.fa-quote-left:before{content:"\f10d"}.fa-quote-right:before{content:"\f10e"}.fa-spinner:before{content:"\f110"}.fa-circle:before{content:"\f111"}.fa-mail-reply:before,.fa-reply:before{content:"\f112"}.fa-github-alt:before{content:"\f113"}.fa-folder-o:before{content:"\f114"}.fa-folder-open-o:before{content:"\f115"}.fa-smile-o:before{content:"\f118"}.fa-frown-o:before{content:"\f119"}.fa-meh-o:before{content:"\f11a"}.fa-gamepad:before{content:"\f11b"}.fa-keyboard-o:before{content:"\f11c"}.fa-flag-o:before{content:"\f11d"}.fa-flag-checkered:before{content:"\f11e"}.fa-terminal:before{content:"\f120"}.fa-code:before{content:"\f121"}.fa-mail-reply-all:before,.fa-reply-all:before{content:"\f122"}.fa-star-half-empty:before,.fa-star-half-full:before,.fa-star-half-o:before{content:"\f123"}.fa-location-arrow:before{content:"\f124"}.fa-crop:before{content:"\f125"}.fa-code-fork:before{content:"\f126"}.fa-unlink:before,.fa-chain-broken:before{content:"\f127"}.fa-question:before{content:"\f128"}.fa-info:before{content:"\f129"}.fa-exclamation:before{content:"\f12a"}.fa-superscript:before{content:"\f12b"}.fa-subscript:before{content:"\f12c"}.fa-eraser:before{content:"\f12d"}.fa-puzzle-piece:before{content:"\f12e"}.fa-microphone:before{content:"\f130"}.fa-microphone-slash:before{content:"\f131"}.fa-shield:before{content:"\f132"}.fa-calendar-o:before{content:"\f133"}.fa-fire-extinguisher:before{content:"\f134"}.fa-rocket:before{content:"\f135"}.fa-maxcdn:before{content:"\f136"}.fa-chevron-circle-left:before{content:"\f137"}.fa-chevron-circle-right:before{content:"\f138"}.fa-chevron-circle-up:before{content:"\f139"}.fa-chevron-circle-down:before{content:"\f13a"}.fa-html5:before{content:"\f13b"}.fa-css3:before{content:"\f13c"}.fa-anchor:before{content:"\f13d"}.fa-unlock-alt:before{content:"\f13e"}.fa-bullseye:before{content:"\f140"}.fa-ellipsis-h:before{content:"\f141"}.fa-ellipsis-v:before{content:"\f142"}.fa-rss-square:before{content:"\f143"}.fa-play-circle:before{content:"\f144"}.fa-ticket:before{content:"\f145"}.fa-minus-square:before{content:"\f146"}.fa-minus-square-o:before{content:"\f147"}.fa-level-up:before{content:"\f148"}.fa-level-down:before{content:"\f149"}.fa-check-square:before{content:"\f14a"}.fa-pencil-square:before{content:"\f14b"}.fa-external-link-square:before{content:"\f14c"}.fa-share-square:before{content:"\f14d"}.fa-compass:before{content:"\f14e"}.fa-toggle-down:before,.fa-caret-square-o-down:before{content:"\f150"}.fa-toggle-up:before,.fa-caret-square-o-up:before{content:"\f151"}.fa-toggle-right:before,.fa-caret-square-o-right:before{content:"\f152"}.fa-euro:before,.fa-eur:before{content:"\f153"}.fa-gbp:before{content:"\f154"}.fa-dollar:before,.fa-usd:before{content:"\f155"}.fa-rupee:before,.fa-inr:before{content:"\f156"}.fa-cny:before,.fa-rmb:before,.fa-yen:before,.fa-jpy:before{content:"\f157"}.fa-ruble:before,.fa-rouble:before,.fa-rub:before{content:"\f158"}.fa-won:before,.fa-krw:before{content:"\f159"}.fa-bitcoin:before,.fa-btc:before{content:"\f15a"}.fa-file:before{content:"\f15b"}.fa-file-text:before{content:"\f15c"}.fa-sort-alpha-asc:before{content:"\f15d"}.fa-sort-alpha-desc:before{content:"\f15e"}.fa-sort-amount-asc:before{content:"\f160"}.fa-sort-amount-desc:before{content:"\f161"}.fa-sort-numeric-asc:before{content:"\f162"}.fa-sort-numeric-desc:before{content:"\f163"}.fa-thumbs-up:before{content:"\f164"}.fa-thumbs-down:before{content:"\f165"}.fa-youtube-square:before{content:"\f166"}.fa-youtube:before{content:"\f167"}.fa-xing:before{content:"\f168"}.fa-xing-square:before{content:"\f169"}.fa-youtube-play:before{content:"\f16a"}.fa-dropbox:before{content:"\f16b"}.fa-stack-overflow:before{content:"\f16c"}.fa-instagram:before{content:"\f16d"}.fa-flickr:before{content:"\f16e"}.fa-adn:before{content:"\f170"}.fa-bitbucket:before{content:"\f171"}.fa-bitbucket-square:before{content:"\f172"}.fa-tumblr:before{content:"\f173"}.fa-tumblr-square:before{content:"\f174"}.fa-long-arrow-down:before{content:"\f175"}.fa-long-arrow-up:before{content:"\f176"}.fa-long-arrow-left:before{content:"\f177"}.fa-long-arrow-right:before{content:"\f178"}.fa-apple:before{content:"\f179"}.fa-windows:before{content:"\f17a"}.fa-android:before{content:"\f17b"}.fa-linux:before{content:"\f17c"}.fa-dribbble:before{content:"\f17d"}.fa-skype:before{content:"\f17e"}.fa-foursquare:before{content:"\f180"}.fa-trello:before{content:"\f181"}.fa-female:before{content:"\f182"}.fa-male:before{content:"\f183"}.fa-gittip:before,.fa-gratipay:before{content:"\f184"}.fa-sun-o:before{content:"\f185"}.fa-moon-o:before{content:"\f186"}.fa-archive:before{content:"\f187"}.fa-bug:before{content:"\f188"}.fa-vk:before{content:"\f189"}.fa-weibo:before{content:"\f18a"}.fa-renren:before{content:"\f18b"}.fa-pagelines:before{content:"\f18c"}.fa-stack-exchange:before{content:"\f18d"}.fa-arrow-circle-o-right:before{content:"\f18e"}.fa-arrow-circle-o-left:before{content:"\f190"}.fa-toggle-left:before,.fa-caret-square-o-left:before{content:"\f191"}.fa-dot-circle-o:before{content:"\f192"}.fa-wheelchair:before{content:"\f193"}.fa-vimeo-square:before{content:"\f194"}.fa-turkish-lira:before,.fa-try:before{content:"\f195"}.fa-plus-square-o:before{content:"\f196"}.fa-space-shuttle:before{content:"\f197"}.fa-slack:before{content:"\f198"}.fa-envelope-square:before{content:"\f199"}.fa-wordpress:before{content:"\f19a"}.fa-openid:before{content:"\f19b"}.fa-institution:before,.fa-bank:before,.fa-university:before{content:"\f19c"}.fa-mortar-board:before,.fa-graduation-cap:before{content:"\f19d"}.fa-yahoo:before{content:"\f19e"}.fa-google:before{content:"\f1a0"}.fa-reddit:before{content:"\f1a1"}.fa-reddit-square:before{content:"\f1a2"}.fa-stumbleupon-circle:before{content:"\f1a3"}.fa-stumbleupon:before{content:"\f1a4"}.fa-delicious:before{content:"\f1a5"}.fa-digg:before{content:"\f1a6"}.fa-pied-piper-pp:before{content:"\f1a7"}.fa-pied-piper-alt:before{content:"\f1a8"}.fa-drupal:before{content:"\f1a9"}.fa-joomla:before{content:"\f1aa"}.fa-language:before{content:"\f1ab"}.fa-fax:before{content:"\f1ac"}.fa-building:before{content:"\f1ad"}.fa-child:before{content:"\f1ae"}.fa-paw:before{content:"\f1b0"}.fa-spoon:before{content:"\f1b1"}.fa-cube:before{content:"\f1b2"}.fa-cubes:before{content:"\f1b3"}.fa-behance:before{content:"\f1b4"}.fa-behance-square:before{content:"\f1b5"}.fa-steam:before{content:"\f1b6"}.fa-steam-square:before{content:"\f1b7"}.fa-recycle:before{content:"\f1b8"}.fa-automobile:before,.fa-car:before{content:"\f1b9"}.fa-cab:before,.fa-taxi:before{content:"\f1ba"}.fa-tree:before{content:"\f1bb"}.fa-spotify:before{content:"\f1bc"}.fa-deviantart:before{content:"\f1bd"}.fa-soundcloud:before{content:"\f1be"}.fa-database:before{content:"\f1c0"}.fa-file-pdf-o:before{content:"\f1c1"}.fa-file-word-o:before{content:"\f1c2"}.fa-file-excel-o:before{content:"\f1c3"}.fa-file-powerpoint-o:before{content:"\f1c4"}.fa-file-photo-o:before,.fa-file-picture-o:before,.fa-file-image-o:before{content:"\f1c5"}.fa-file-zip-o:before,.fa-file-archive-o:before{content:"\f1c6"}.fa-file-sound-o:before,.fa-file-audio-o:before{content:"\f1c7"}.fa-file-movie-o:before,.fa-file-video-o:before{content:"\f1c8"}.fa-file-code-o:before{content:"\f1c9"}.fa-vine:before{content:"\f1ca"}.fa-codepen:before{content:"\f1cb"}.fa-jsfiddle:before{content:"\f1cc"}.fa-life-bouy:before,.fa-life-buoy:before,.fa-life-saver:before,.fa-support:before,.fa-life-ring:before{content:"\f1cd"}.fa-circle-o-notch:before{content:"\f1ce"}.fa-ra:before,.fa-resistance:before,.fa-rebel:before{content:"\f1d0"}.fa-ge:before,.fa-empire:before{content:"\f1d1"}.fa-git-square:before{content:"\f1d2"}.fa-git:before{content:"\f1d3"}.fa-y-combinator-square:before,.fa-yc-square:before,.fa-hacker-news:before{content:"\f1d4"}.fa-tencent-weibo:before{content:"\f1d5"}.fa-qq:before{content:"\f1d6"}.fa-wechat:before,.fa-weixin:before{content:"\f1d7"}.fa-send:before,.fa-paper-plane:before{content:"\f1d8"}.fa-send-o:before,.fa-paper-plane-o:before{content:"\f1d9"}.fa-history:before{content:"\f1da"}.fa-circle-thin:before{content:"\f1db"}.fa-header:before{content:"\f1dc"}.fa-paragraph:before{content:"\f1dd"}.fa-sliders:before{content:"\f1de"}.fa-share-alt:before{content:"\f1e0"}.fa-share-alt-square:before{content:"\f1e1"}.fa-bomb:before{content:"\f1e2"}.fa-soccer-ball-o:before,.fa-futbol-o:before{content:"\f1e3"}.fa-tty:before{content:"\f1e4"}.fa-binoculars:before{content:"\f1e5"}.fa-plug:before{content:"\f1e6"}.fa-slideshare:before{content:"\f1e7"}.fa-twitch:before{content:"\f1e8"}.fa-yelp:before{content:"\f1e9"}.fa-newspaper-o:before{content:"\f1ea"}.fa-wifi:before{content:"\f1eb"}.fa-calculator:before{content:"\f1ec"}.fa-paypal:before{content:"\f1ed"}.fa-google-wallet:before{content:"\f1ee"}.fa-cc-visa:before{content:"\f1f0"}.fa-cc-mastercard:before{content:"\f1f1"}.fa-cc-discover:before{content:"\f1f2"}.fa-cc-amex:before{content:"\f1f3"}.fa-cc-paypal:before{content:"\f1f4"}.fa-cc-stripe:before{content:"\f1f5"}.fa-bell-slash:before{content:"\f1f6"}.fa-bell-slash-o:before{content:"\f1f7"}.fa-trash:before{content:"\f1f8"}.fa-copyright:before{content:"\f1f9"}.fa-at:before{content:"\f1fa"}.fa-eyedropper:before{content:"\f1fb"}.fa-paint-brush:before{content:"\f1fc"}.fa-birthday-cake:before{content:"\f1fd"}.fa-area-chart:before{content:"\f1fe"}.fa-pie-chart:before{content:"\f200"}.fa-line-chart:before{content:"\f201"}.fa-lastfm:before{content:"\f202"}.fa-lastfm-square:before{content:"\f203"}.fa-toggle-off:before{content:"\f204"}.fa-toggle-on:before{content:"\f205"}.fa-bicycle:before{content:"\f206"}.fa-bus:before{content:"\f207"}.fa-ioxhost:before{content:"\f208"}.fa-angellist:before{content:"\f209"}.fa-cc:before{content:"\f20a"}.fa-shekel:before,.fa-sheqel:before,.fa-ils:before{content:"\f20b"}.fa-meanpath:before{content:"\f20c"}.fa-buysellads:before{content:"\f20d"}.fa-connectdevelop:before{content:"\f20e"}.fa-dashcube:before{content:"\f210"}.fa-forumbee:before{content:"\f211"}.fa-leanpub:before{content:"\f212"}.fa-sellsy:before{content:"\f213"}.fa-shirtsinbulk:before{content:"\f214"}.fa-simplybuilt:before{content:"\f215"}.fa-skyatlas:before{content:"\f216"}.fa-cart-plus:before{content:"\f217"}.fa-cart-arrow-down:before{content:"\f218"}.fa-diamond:before{content:"\f219"}.fa-ship:before{content:"\f21a"}.fa-user-secret:before{content:"\f21b"}.fa-motorcycle:before{content:"\f21c"}.fa-street-view:before{content:"\f21d"}.fa-heartbeat:before{content:"\f21e"}.fa-venus:before{content:"\f221"}.fa-mars:before{content:"\f222"}.fa-mercury:before{content:"\f223"}.fa-intersex:before,.fa-transgender:before{content:"\f224"}.fa-transgender-alt:before{content:"\f225"}.fa-venus-double:before{content:"\f226"}.fa-mars-double:before{content:"\f227"}.fa-venus-mars:before{content:"\f228"}.fa-mars-stroke:before{content:"\f229"}.fa-mars-stroke-v:before{content:"\f22a"}.fa-mars-stroke-h:before{content:"\f22b"}.fa-neuter:before{content:"\f22c"}.fa-genderless:before{content:"\f22d"}.fa-facebook-official:before{content:"\f230"}.fa-pinterest-p:before{content:"\f231"}.fa-whatsapp:before{content:"\f232"}.fa-server:before{content:"\f233"}.fa-user-plus:before{content:"\f234"}.fa-user-times:before{content:"\f235"}.fa-hotel:before,.fa-bed:before{content:"\f236"}.fa-viacoin:before{content:"\f237"}.fa-train:before{content:"\f238"}.fa-subway:before{content:"\f239"}.fa-medium:before{content:"\f23a"}.fa-yc:before,.fa-y-combinator:before{content:"\f23b"}.fa-optin-monster:before{content:"\f23c"}.fa-opencart:before{content:"\f23d"}.fa-expeditedssl:before{content:"\f23e"}.fa-battery-4:before,.fa-battery:before,.fa-battery-full:before{content:"\f240"}.fa-battery-3:before,.fa-battery-three-quarters:before{content:"\f241"}.fa-battery-2:before,.fa-battery-half:before{content:"\f242"}.fa-battery-1:before,.fa-battery-quarter:before{content:"\f243"}.fa-battery-0:before,.fa-battery-empty:before{content:"\f244"}.fa-mouse-pointer:before{content:"\f245"}.fa-i-cursor:before{content:"\f246"}.fa-object-group:before{content:"\f247"}.fa-object-ungroup:before{content:"\f248"}.fa-sticky-note:before{content:"\f249"}.fa-sticky-note-o:before{content:"\f24a"}.fa-cc-jcb:before{content:"\f24b"}.fa-cc-diners-club:before{content:"\f24c"}.fa-clone:before{content:"\f24d"}.fa-balance-scale:before{content:"\f24e"}.fa-hourglass-o:before{content:"\f250"}.fa-hourglass-1:before,.fa-hourglass-start:before{content:"\f251"}.fa-hourglass-2:before,.fa-hourglass-half:before{content:"\f252"}.fa-hourglass-3:before,.fa-hourglass-end:before{content:"\f253"}.fa-hourglass:before{content:"\f254"}.fa-hand-grab-o:before,.fa-hand-rock-o:before{content:"\f255"}.fa-hand-stop-o:before,.fa-hand-paper-o:before{content:"\f256"}.fa-hand-scissors-o:before{content:"\f257"}.fa-hand-lizard-o:before{content:"\f258"}.fa-hand-spock-o:before{content:"\f259"}.fa-hand-pointer-o:before{content:"\f25a"}.fa-hand-peace-o:before{content:"\f25b"}.fa-trademark:before{content:"\f25c"}.fa-registered:before{content:"\f25d"}.fa-creative-commons:before{content:"\f25e"}.fa-gg:before{content:"\f260"}.fa-gg-circle:before{content:"\f261"}.fa-tripadvisor:before{content:"\f262"}.fa-odnoklassniki:before{content:"\f263"}.fa-odnoklassniki-square:before{content:"\f264"}.fa-get-pocket:before{content:"\f265"}.fa-wikipedia-w:before{content:"\f266"}.fa-safari:before{content:"\f267"}.fa-chrome:before{content:"\f268"}.fa-firefox:before{content:"\f269"}.fa-opera:before{content:"\f26a"}.fa-internet-explorer:before{content:"\f26b"}.fa-tv:before,.fa-television:before{content:"\f26c"}.fa-contao:before{content:"\f26d"}.fa-500px:before{content:"\f26e"}.fa-amazon:before{content:"\f270"}.fa-calendar-plus-o:before{content:"\f271"}.fa-calendar-minus-o:before{content:"\f272"}.fa-calendar-times-o:before{content:"\f273"}.fa-calendar-check-o:before{content:"\f274"}.fa-industry:before{content:"\f275"}.fa-map-pin:before{content:"\f276"}.fa-map-signs:before{content:"\f277"}.fa-map-o:before{content:"\f278"}.fa-map:before{content:"\f279"}.fa-commenting:before{content:"\f27a"}.fa-commenting-o:before{content:"\f27b"}.fa-houzz:before{content:"\f27c"}.fa-vimeo:before{content:"\f27d"}.fa-black-tie:before{content:"\f27e"}.fa-fonticons:before{content:"\f280"}.fa-reddit-alien:before{content:"\f281"}.fa-edge:before{content:"\f282"}.fa-credit-card-alt:before{content:"\f283"}.fa-codiepie:before{content:"\f284"}.fa-modx:before{content:"\f285"}.fa-fort-awesome:before{content:"\f286"}.fa-usb:before{content:"\f287"}.fa-product-hunt:before{content:"\f288"}.fa-mixcloud:before{content:"\f289"}.fa-scribd:before{content:"\f28a"}.fa-pause-circle:before{content:"\f28b"}.fa-pause-circle-o:before{content:"\f28c"}.fa-stop-circle:before{content:"\f28d"}.fa-stop-circle-o:before{content:"\f28e"}.fa-shopping-bag:before{content:"\f290"}.fa-shopping-basket:before{content:"\f291"}.fa-hashtag:before{content:"\f292"}.fa-bluetooth:before{content:"\f293"}.fa-bluetooth-b:before{content:"\f294"}.fa-percent:before{content:"\f295"}.fa-gitlab:before{content:"\f296"}.fa-wpbeginner:before{content:"\f297"}.fa-wpforms:before{content:"\f298"}.fa-envira:before{content:"\f299"}.fa-universal-access:before{content:"\f29a"}.fa-wheelchair-alt:before{content:"\f29b"}.fa-question-circle-o:before{content:"\f29c"}.fa-blind:before{content:"\f29d"}.fa-audio-description:before{content:"\f29e"}.fa-volume-control-phone:before{content:"\f2a0"}.fa-braille:before{content:"\f2a1"}.fa-assistive-listening-systems:before{content:"\f2a2"}.fa-asl-interpreting:before,.fa-american-sign-language-interpreting:before{content:"\f2a3"}.fa-deafness:before,.fa-hard-of-hearing:before,.fa-deaf:before{content:"\f2a4"}.fa-glide:before{content:"\f2a5"}.fa-glide-g:before{content:"\f2a6"}.fa-signing:before,.fa-sign-language:before{content:"\f2a7"}.fa-low-vision:before{content:"\f2a8"}.fa-viadeo:before{content:"\f2a9"}.fa-viadeo-square:before{content:"\f2aa"}.fa-snapchat:before{content:"\f2ab"}.fa-snapchat-ghost:before{content:"\f2ac"}.fa-snapchat-square:before{content:"\f2ad"}.fa-pied-piper:before{content:"\f2ae"}.fa-first-order:before{content:"\f2b0"}.fa-yoast:before{content:"\f2b1"}.fa-themeisle:before{content:"\f2b2"}.fa-google-plus-circle:before,.fa-google-plus-official:before{content:"\f2b3"}.fa-fa:before,.fa-font-awesome:before{content:"\f2b4"}.fa-handshake-o:before{content:"\f2b5"}.fa-envelope-open:before{content:"\f2b6"}.fa-envelope-open-o:before{content:"\f2b7"}.fa-linode:before{content:"\f2b8"}.fa-address-book:before{content:"\f2b9"}.fa-address-book-o:before{content:"\f2ba"}.fa-vcard:before,.fa-address-card:before{content:"\f2bb"}.fa-vcard-o:before,.fa-address-card-o:before{content:"\f2bc"}.fa-user-circle:before{content:"\f2bd"}.fa-user-circle-o:before{content:"\f2be"}.fa-user-o:before{content:"\f2c0"}.fa-id-badge:before{content:"\f2c1"}.fa-drivers-license:before,.fa-id-card:before{content:"\f2c2"}.fa-drivers-license-o:before,.fa-id-card-o:before{content:"\f2c3"}.fa-quora:before{content:"\f2c4"}.fa-free-code-camp:before{content:"\f2c5"}.fa-telegram:before{content:"\f2c6"}.fa-thermometer-4:before,.fa-thermometer:before,.fa-thermometer-full:before{content:"\f2c7"}.fa-thermometer-3:before,.fa-thermometer-three-quarters:before{content:"\f2c8"}.fa-thermometer-2:before,.fa-thermometer-half:before{content:"\f2c9"}.fa-thermometer-1:before,.fa-thermometer-quarter:before{content:"\f2ca"}.fa-thermometer-0:before,.fa-thermometer-empty:before{content:"\f2cb"}.fa-shower:before{content:"\f2cc"}.fa-bathtub:before,.fa-s15:before,.fa-bath:before{content:"\f2cd"}.fa-podcast:before{content:"\f2ce"}.fa-window-maximize:before{content:"\f2d0"}.fa-window-minimize:before{content:"\f2d1"}.fa-window-restore:before{content:"\f2d2"}.fa-times-rectangle:before,.fa-window-close:before{content:"\f2d3"}.fa-times-rectangle-o:before,.fa-window-close-o:before{content:"\f2d4"}.fa-bandcamp:before{content:"\f2d5"}.fa-grav:before{content:"\f2d6"}.fa-etsy:before{content:"\f2d7"}.fa-imdb:before{content:"\f2d8"}.fa-ravelry:before{content:"\f2d9"}.fa-eercast:before{content:"\f2da"}.fa-microchip:before{content:"\f2db"}.fa-snowflake-o:before{content:"\f2dc"}.fa-superpowers:before{content:"\f2dd"}.fa-wpexplorer:before{content:"\f2de"}.fa-meetup:before{content:"\f2e0"}.sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0, 0, 0, 0);border:0}.sr-only-focusable:active,.sr-only-focusable:focus{position:static;width:auto;height:auto;margin:0;overflow:visible;clip:auto}
html {
  scroll-padding-top: 70px;
  overflow: auto;
}
* {
  font-family: 'Noto Sans JP', sans-serif;
  font-weight: 400;
}
h1 {
  font-family: 'Noto Sans JP', sans-serif;
  font-weight: 700;
}
h1 span, h2 span, h3 span, h4 span, h5 span, h6 span {
  font-weight: 500;
}
h2,h3,h4,h5,h6 {
  font-family: 'Noto Sans JP', sans-serif;
  font-weight: 500;
}
iframe {
  display: block;
  width: 100%;
}
img {
  display: block;
  max-width: 100%;
  height: auto;
}
.item-img img {
  width: 100%;
}
.content-block img {
  margin: 1rem 0;
}
.content-block p {
  line-height: 2.4rem;
}
.badge {
  font-weight: 500;
  padding: 7px;
  border: 1px solid white;
}
.section-heading {
  text-align: center;
  font-size: 1.5em;
}
h1.section-heading {
  text-align: center;
  font-size: 2em;
}
.next-prev-btns {
  justify-content: space-between;
  display: flex;
  flex-wrap: wrap;
  width: 100%;
  margin: 0 1rem 4rem 1rem;
}
.section-heading::before {
  content: "/   ";
  color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
;
  white-space: pre-wrap;
}
.section-heading::after {
  content: "   /";
  color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
;
  white-space: pre-wrap;
}
.show-list {
  text-decoration: underline !important;
  font-weight: 500;
  color: #4370c4;
}
.item-subtitle em {
  font-weight: 400 !important;
}
.item-subtitle time {
  display: block !important;
}
.search-box {
  display: flex;
  justify-content: flex-end;
}
.search-box input {
  width:280px;
  margin-right: 0.6rem;
}
@media (max-width:992px) {
    .search-box input {
        width :calc(100% - 90px) !important;
        margin-right: 10px !important;
    }
}
.search-box button {
  width:90px;
  height: 48px;
  display: inline-block !important;
}
.new-section.search-section .item {
  cursor: default;
}
.new-section.search-section .item-wrapper {
  flex-flow: row nowrap;
}
.new-section.search-section .item-wrapper .item-content {
  padding: 0.5rem 0.5rem;
}
.new-section.search-section .item-img {
  min-width: 100px;
  height: 100px;
}
.search-section .item-img img {
  width: 100px;
  height: 100px;
  border: 1px solid rgba(0, 0, 0, 0.125);
  border-radius: 4px;
}
.search-section .text {
  line-height: 1.6;
}
.page-link {
  line-height: 1.8;
}
.page-item.active .page-link {
  color: #fff !important;
}
.list-active {
  background-color: #f1ffff
}
section {
  background-color: #ffffff;
}
body {
  font-style: normal;
  line-height: 1.5;
  font-weight: 400;
  color: #232323;
  position: relative;
}
section,
.container,
.container-fluid {
  position: relative;
  word-wrap: break-word;
}
a.iconfont:hover {
  text-decoration: none;
}
.article .lead p,
.article .lead ul,
.article .lead ol,
.article .lead pre,
.article .lead blockquote {
  margin-bottom: 0;
}
a {
  font-style: normal;
  font-weight: 400;
  cursor: pointer;
}
a, a:hover {
  text-decoration: none;
}
.section-title {
  font-style: normal;
  line-height: 1.3;
}
.section-subtitle {
  line-height: 1.3;
}
.text {
  font-style: normal;
  line-height: 1.7;
}
h1,
h2,
h3,
h4,
h5,
h6,
.display-1,
.display-2,
.display-4,
.display-5,
.display-7,
a {
  line-height: 1.8;
  word-break: break-word;
  word-wrap: break-word;
  font-weight: 500;
}
.section-subtitle span {
  font-weight: 500;
}
p {
  line-height: 2.2;
  font-weight: 400;
}
b,
strong {
  font-weight: bold;
}
input:-webkit-autofill, input:-webkit-autofill:hover, input:-webkit-autofill:focus, input:-webkit-autofill:active {
  transition-delay: 9999s;
  -webkit-transition-property: background-color, color;
  transition-property: background-color, color;
}
textarea[type=hidden] {
  display: none;
}
section {
  background-position: 50% 50%;
  background-repeat: no-repeat;
  background-size: cover;
}
section .background-video,
section .background-video-preview {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  top: 0;
}
.hidden {
  visibility: hidden;
}
.z-index20 {
  z-index: 20;
}
.white {
  color: #ffffff;
}
.black {
  color: #111111;
}
.bg-white {
  background-color: #ffffff;
}
.bg-black {
  background-color: #000000;
}
.align-left {
  text-align: left;
}
.align-center {
  text-align: center;
}
.align-right {
  text-align: right;
}
.light {
  font-weight: 300;
}
.regular {
  font-weight: 400;
}
.semibold {
  font-weight: 500;
}
.bold {
  font-weight: 700;
}
.media-content {
  flex-basis: 100%;
}
.media-container-row {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: center;
  align-content: center;
  align-items: start;
}
.media-container-row .media-size-item {
  width: 400px;
}
.media-container-column {
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  justify-content: center;
  align-content: center;
  align-items: stretch;
}
.media-container-column > * {
  width: 100%;
}
@media (min-width: 992px) {
  .media-container-row {
    flex-wrap: nowrap;
  }
}
figure {
  margin-bottom: 0;
  overflow: hidden;
}
figure[media-size] {
  transition: width 0.1s;
}
.card {
  background-color: transparent;
  border: none;
}
.card-box {
  width: 100%;
}
.card-img {
  text-align: center;
  flex-shrink: 0;
  -webkit-flex-shrink: 0;
}
.media {
  max-width: 100%;
  margin: 0 auto;
}
.figure {
  align-self: center;
}
.media-container > div {
  max-width: 100%;
}
.figure img,
.card-img img {
  width: 100%;
}
@media (max-width: 991px) {
  .media-size-item {
    width: auto !important;
  }
  h1.section-title {
    font-size: 2.0em;
    line-height: 1.3;
  }
  .media {
    width: auto;
  }
  .figure {
    width: 100% !important;
  }
}
@media (max-width: 767px) {
  .search-box {
    justify-content: center;
  }
  .search-box input {
    width:200px !important;
  }
  .search-box button {
    width:80px;
    height: 48px;
  }
  h1.section-title {
    font-size: 1.8em;
  }
}
.section-btn {
  margin-left: -0.6rem;
  margin-right: -0.6rem;
  font-size: 0;
}
.btn {
  font-weight: 600;
  border-width: 1px;
  font-style: normal;
  margin: 0.6rem 0.6rem;
  white-space: normal;
  transition: all 0.2s ease-in-out;
  word-break: break-word;
  padding: 10px 20px !important;
}
.btn-sm {
  font-weight: 600;
  letter-spacing: 0px;
  transition: all 0.3s ease-in-out;
}
.btn-md {
  font-weight: 600;
  letter-spacing: 0px;
  transition: all 0.3s ease-in-out;
}
.btn-lg {
  font-weight: 600;
  letter-spacing: 0px;
  transition: all 0.3s ease-in-out;
}
.btn-form {
  margin: 0;
}
.btn-form:hover {
  cursor: pointer;
}
nav .section-btn {
  margin-left: 0rem;
  margin-right: 0rem;
}
.btn .iconfont,
.btn.btn-sm .iconfont {
  order: 1;
  cursor: pointer;
  margin-left: 0.5rem;
  vertical-align: sub;
}
.btn.btn-md .iconfont,
.btn.btn-md .iconfont {
  margin-left: 0.8rem;
}
.regular {
  font-weight: 400;
}
.semibold {
  font-weight: 500;
}
.bold {
  font-weight: 700;
}
[type=submit] {
  -webkit-appearance: none;
}
.fullscreen .overlay {
  min-height: 100vh;
}
.fullscreen {
  display: flex;
  display: -moz-flex;
  display: -ms-flex;
  display: -o-flex;
  align-items: center;
  min-height: 100vh;
  padding-top: 3rem;
  padding-bottom: 3rem;
}
.map {
  height: 25rem;
  position: relative;
}
.map iframe {
  width: 100%;
  height: 100%;
}
.arrow-up {
  bottom: 25px;
  right: 90px;
  position: fixed;
  text-align: right;
  z-index: 5000;
  color: #ffffff;
  font-size: 22px;
}
.arrow-up a {
  background: rgba(0, 0, 0, 0.2);
  border-radius: 50%;
  color: #fff;
  display: inline-block;
  height: 60px;
  width: 60px;
  border: 2px solid #fff;
  outline-style: none !important;
  position: relative;
  text-decoration: none;
  transition: all 0.3s ease-in-out;
  cursor: pointer;
  text-align: center;
}
.arrow-up a:hover {
  background-color: rgba(0, 0, 0, 0.4);
}
.arrow-up a i {
  line-height: 60px;
}
.arrow-up-icon {
  display: block;
  color: #fff;
}
.arrow-up-icon::before {
  content: "›";
  display: inline-block;
  font-family: serif;
  font-size: 22px;
  line-height: 1;
  font-style: normal;
  position: relative;
  top: 6px;
  left: -4px;
  transform: rotate(-90deg);
}
.arrow {
  position: absolute;
  bottom: 45px;
  left: 50%;
  width: 60px;
  height: 60px;
  cursor: pointer;
  background-color: rgba(80, 80, 80, 0.5);
  border-radius: 50%;
  transform: translateX(-50%);
}
@media (max-width: 767px) {
  .arrow {
    display: none;
  }
}
.arrow > a {
  display: inline-block;
  text-decoration: none;
  outline-style: none;
  -webkit-animation: arrowdown 1.7s ease-in-out infinite;
          animation: arrowdown 1.7s ease-in-out infinite;
  color: #ffffff;
}
.arrow > a > i {
  position: absolute;
  top: -2px;
  left: 15px;
  font-size: 2rem;
}
#scrollToTop a i::before {
  content: "";
  position: absolute;
  display: block;
  border-bottom: 2.5px solid #fff;
  border-left: 2.5px solid #fff;
  width: 27.8%;
  height: 27.8%;
  left: 50%;
  top: 51%;
  transform: translateY(-30%) translateX(-50%) rotate(135deg);
}
@keyframes arrowdown {
  0% {
    transform: translateY(0px);
  }
  50% {
    transform: translateY(-5px);
  }
  100% {
    transform: translateY(0px);
  }
}
@-webkit-keyframes arrowdown {
  0% {
    transform: translateY(0px);
  }
  50% {
    transform: translateY(-5px);
  }
  100% {
    transform: translateY(0px);
  }
}
@media (max-width: 500px) {
  .arrow-up {
    left: 0;
    right: 0;
    text-align: center;
  }
  .new-section.search-section .item-img {
    display:none;
  }
  .new-section.search-section .item-wrapper .item-content {
    padding: 0 0;
  }
}
@keyframes gradient-animation {
  from {
    background-position: 0% 100%;
    -webkit-animation-timing-function: ease-in-out;
            animation-timing-function: ease-in-out;
  }
  to {
    background-position: 100% 0%;
    -webkit-animation-timing-function: ease-in-out;
            animation-timing-function: ease-in-out;
  }
}
@-webkit-keyframes gradient-animation {
  from {
    background-position: 0% 100%;
    -webkit-animation-timing-function: ease-in-out;
            animation-timing-function: ease-in-out;
  }
  to {
    background-position: 100% 0%;
    -webkit-animation-timing-function: ease-in-out;
            animation-timing-function: ease-in-out;
  }
}
.bg-gradient {
  background-size: 200% 200%;
  animation: gradient-animation 5s infinite alternate;
  -webkit-animation: gradient-animation 5s infinite alternate;
}
.menu .navbar-brand {
  display: -webkit-flex;
}
.menu .navbar-brand span {
  display: flex;
  display: -webkit-flex;
}
.menu .navbar-brand .navbar-caption-wrap {
  display: -webkit-flex;
}
.menu .navbar-brand .navbar-logo img {
  display: -webkit-flex;
  width: auto;
}
@media (min-width: 768px) and (max-width: 991px) {
  .menu .navbar-toggleable-sm .navbar-nav {
    display: -ms-flexbox;
  }
}
@media (max-width: 991px) {
  .menu .navbar-collapse {
    max-height: 93.5vh;
  }
  .menu .navbar-collapse.show {
    overflow: auto;
  }
}
@media (min-width: 992px) {
  .menu .navbar-nav.nav-dropdown {
    display: -webkit-flex;
  }
  .menu .navbar-toggleable-sm .navbar-collapse {
    display: -webkit-flex !important;
  }
  .menu .collapsed .navbar-collapse {
    max-height: 93.5vh;
  }
  .menu .collapsed .navbar-collapse.show {
    overflow: auto;
  }
}
@media (max-width: 767px) {
  .menu .navbar-collapse {
    max-height: 80vh;
  }
}
.nav-link .iconfont {
  margin-right: 0.5rem;
}
.navbar {
  display: -webkit-flex;
  -webkit-flex-wrap: wrap;
  -webkit-align-items: center;
  -webkit-justify-content: space-between;
}
.navbar-collapse {
  -webkit-flex-basis: 100%;
  -webkit-flex-grow: 1;
  -webkit-align-items: center;
}
.nav-dropdown .link {
  padding: 0.667em 1.667em !important;
  margin: 0 !important;
}
.nav {
  display: -webkit-flex;
  -webkit-flex-wrap: wrap;
}
.row {
  display: -webkit-flex;
  -webkit-flex-wrap: wrap;
}
.justify-content-center {
  -webkit-justify-content: center;
}
.form-inline {
  display: -webkit-flex;
}
.card-wrapper {
  -webkit-flex: 1;
}
.carousel-control {
  z-index: 10;
  display: -webkit-flex;
}
.carousel-controls {
  display: -webkit-flex;
}
.media {
  display: -webkit-flex;
}
.jq-selectbox__select {
  padding: 7px 0;
  position: relative;
}
.jq-selectbox__dropdown {
  overflow: hidden;
  border-radius: 10px;
  position: absolute;
  top: 100%;
  left: 0 !important;
  width: 100% !important;
}
.jq-selectbox__trigger-arrow {
  right: 0;
  transform: translateY(-50%);
}
.jq-selectbox li {
  padding: 1.07em 0.5em;
}
input[type=range] {
  padding-left: 0 !important;
  padding-right: 0 !important;
}
.modal-dialog,
.modal-content {
  height: 100%;
}
.modal-dialog .carousel-inner {
  height: calc(100vh - 1.75rem);
}
@media (max-width: 575px) {
  .modal-dialog .carousel-inner {
    height: calc(100vh - 1rem);
  }
}
.carousel-item {
  text-align: center;
}
.carousel-item img {
  margin: auto;
}
.navbar-toggler {
  align-self: flex-start;
  padding: 0.25rem 0.75rem;
  font-size: 1.25rem;
  line-height: 1;
  background: transparent;
  border: 1px solid transparent;
  border-radius: 0.25rem;
}
.navbar-toggler:focus,
.navbar-toggler:hover {
  text-decoration: none;
}
.navbar-toggler-icon {
  display: inline-block;
  width: 1.5em;
  height: 1.5em;
  vertical-align: middle;
  content: "";
  background: no-repeat center center;
  background-size: 100% 100%;
}
.navbar-toggler-left {
  position: absolute;
  left: 1rem;
}
.navbar-toggler-right {
  position: absolute;
  right: 1rem;
}
.card-img {
  width: auto;
}
.menu .navbar.collapsed:not(.beta-menu) {
  flex-direction: column;
}
.carousel-item.active,
.carousel-item-next,
.carousel-item-prev {
  display: flex;
}
.note-air-layout .dropup .dropdown-menu,
.note-air-layout .navbar-fixed-bottom .dropdown .dropdown-menu {
  bottom: initial !important;
}
html,
body {
  height: auto;
  min-height: 100vh;
}
.dropup .dropdown-toggle::after {
  display: none;
}
.form-asterisk {
  font-family: initial;
  position: absolute;
  top: -2px;
  font-weight: normal;
}
.form-control-label {
  position: relative;
  cursor: pointer;
  margin-bottom: 0.357em;
  padding: 0;
}
.alert {
  color: #ffffff;
  border-radius: 0;
  border: 0;
  font-size: 1.1rem;
  line-height: 1.5;
  margin-bottom: 1.875rem;
  padding: 1.25rem;
  position: relative;
  text-align: center;
}
.alert.alert-form::after {
  background-color: inherit;
  bottom: -7px;
  content: "";
  display: block;
  height: 14px;
  left: 50%;
  margin-left: -7px;
  position: absolute;
  transform: rotate(45deg);
  width: 14px;
}
.form-control {
  background-color: #ffffff;
  background-clip: border-box;
  color: #232323;
  line-height: 1rem !important;
  height: auto;
  padding: 0.6rem 1.2rem;
  transition: border-color 0.25s ease 0s;
  border: 1px solid gray !important;
  border-radius: 4px;
  box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px 0px, rgba(0, 0, 0, 0.07) 0px 1px 3px 0px, rgba(0, 0, 0, 0.03) 0px 0px 0px 1px;
}
.form-active .form-control:invalid {
  border-color: red;
}
form .row {
  margin-left: -0.6rem;
  margin-right: -0.6rem;
}
form .row [class*=col] {
  padding-left: 0.6rem;
  padding-right: 0.6rem;
}
form .section-btn {
  margin: 0;
  padding-left: 0.6rem;
  padding-right: 0.6rem;
}
form .btn {
  display: flex;
  padding: 0.6rem 1.2rem;
  margin: 0;
}
form .form-check-input {
  margin-top: 0.5;
}
textarea.form-control {
  line-height: 1.5rem !important;
}
.form-group {
  margin-bottom: 1.2rem;
}
.form-control,
form .btn {
  min-height: 48px;
}
.gdpr-block label span.textGDPR input[name=gdpr] {
  top: 7px;
}
.form-control:focus {
  box-shadow: none;
}
.overlay {
  background-color: #000;
  bottom: 0;
  left: 0;
  opacity: 0.5;
  position: absolute;
  right: 0;
  top: 0;
  z-index: 0;
  pointer-events: none;
}
blockquote {
  font-style: italic;
  padding: 1.5rem 2rem;
  position: relative;
  border-left: 3px solid;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.14);
}
blockquote:before{
  display: inline-block;
  position: absolute;
  top: 3px;
  left: 0;
  vertical-align: middle;
  content: '"';
  font-family: serif;
  color: #aaa;
  font-size: 60px;
  line-height: 1;
}
ul,
ol,
pre,
blockquote {
  margin-bottom: 2.3125rem;
}
.mt-4 {
  margin-top: 2rem !important;
}
.mb-4 {
  margin-bottom: 2rem !important;
}
@media (min-width: 992px) {
  .container {
    padding-left: 16px;
    padding-right: 16px;
  }
  .row {
    margin-left: -16px;
    margin-right: -16px;
  }
  .row > [class*=col] {
    padding-left: 16px;
    padding-right: 16px;
  }
}
@media (min-width: 768px) {
  .container-fluid {
    padding-left: 32px;
    padding-right: 32px;
  }
}
@media (min-width: 768px) and (max-width: 991px) {
  .container {
    padding-left: 32px;
    padding-right: 32px;
  }
}
@media (max-width: 767px) {
  .container {
    padding-left: 16px;
    padding-right: 16px;
  }
}
.card-wrapper,
.item-wrapper {
  overflow: hidden;
}
.app-video-wrapper > img {
  opacity: 1;
}
.display-1 {
  font-size: 4.6rem;
  line-height: 1.1;
}
.display-1 > .iconfont {
  font-size: 5.75rem;
}
.display-2 {
  font-size: 3rem;
  line-height: 1.1;
}
.display-2 > .iconfont {
  font-size: 3.75rem;
}
.display-4 {
  font-size: 1.1rem;
  line-height: 1.5;
}
.display-4 > .iconfont {
  font-size: 1.375rem;
}
.display-5 {
  font-size: 2.2rem;
  line-height: 1.5;
}
.display-5 > .iconfont {
  font-size: 2.75rem;
}
.display-7 {
  font-size: 1.2rem;
  line-height: 1.5;
}
.display-7 > .iconfont {
  font-size: 1.5rem;
}
.display-8 {
  font-size: 1.3em;
}
@media (max-width: 992px) {
  .display-1 {
    font-size: 3.68rem;
  }
}
@media (max-width: 768px) {
  .display-1 {
    font-size: 3.22rem;
    font-size: calc( 2.26rem + (4.6 - 2.26) * ((100vw - 20rem) / (48 - 20)));
    line-height: calc( 1.1 * (2.26rem + (4.6 - 2.26) * ((100vw - 20rem) / (48 - 20))));
  }
  .display-2 {
    font-size: 2.4rem;
    font-size: calc( 1.7rem + (3 - 1.7) * ((100vw - 20rem) / (48 - 20)));
    line-height: calc( 1.3 * (1.7rem + (3 - 1.7) * ((100vw - 20rem) / (48 - 20))));
  }
  .display-4 {
    font-size: 0.88rem;
    font-size: calc( 1.0350000000000001rem + (1.1 - 1.0350000000000001) * ((100vw - 20rem) / (48 - 20)));
    line-height: calc( 1.4 * (1.0350000000000001rem + (1.1 - 1.0350000000000001) * ((100vw - 20rem) / (48 - 20))));
  }
  .display-5 {
    font-size: 1.76rem;
    font-size: calc( 1.42rem + (2.2 - 1.42) * ((100vw - 20rem) / (48 - 20)));
    line-height: calc( 1.4 * (1.42rem + (2.2 - 1.42) * ((100vw - 20rem) / (48 - 20))));
  }
  .display-7 {
    font-size: 0.96rem;
    font-size: calc( 1.07rem + (1.2 - 1.07) * ((100vw - 20rem) / (48 - 20)));
    line-height: calc( 1.4 * (1.07rem + (1.2 - 1.07) * ((100vw - 20rem) / (48 - 20))));
  }
  .display-8 {
    font-size: 0.9rem;
    font-size: calc( 1.07rem + (1.2 - 1.07) * ((100vw - 20rem) / (48 - 20)));
    line-height: calc( 1.4 * (1.07rem + (1.2 - 1.07) * ((100vw - 20rem) / (48 - 20))));
  }
}
.btn {
  padding: 0.6rem 1.2rem;
  border-radius: 4px;
}
.btn-sm {
  padding: 0.6rem 1.2rem;
  border-radius: 4px;
}
.btn-md {
  padding: 0.6rem 1.2rem;
  border-radius: 4px;
}
.btn-lg {
  padding: 1rem 2.6rem;
  border-radius: 4px;
}
.bg-primary {
  background-color: #6592e6 !important;
}
.bg-success {
  background-color: #40b0bf !important;
}
.bg-info {
  background-color: #47b5ed !important;
}
.bg-warning {
  background-color: #ffe161 !important;
}
.bg-danger {
  background-color: #ff9966 !important;
}
.btn-primary,
.btn-primary:active {
  background-color: #4370c4 !important;
  border-color: #6592e6 !important;
  color: #ffffff !important;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2);
}
.btn-primary:hover,
.btn-primary:focus,
.btn-primary.focus,
.btn-primary.active {
  color: #ffffff !important;
  background-color: #2260d2 !important;
  border: 2px solid #1130d2 !important;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2);
}
.btn-primary.disabled,
.btn-primary:disabled {
  color: #ffffff !important;
  background-color: #2260d2 !important;
  border-color: #2260d2 !important;
}
.btn-secondary,
.btn-secondary:active {
  background-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important;
  border-color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'bartextcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important;
  color: #ffffff !important;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2);
}
.btn-secondary:hover,
.btn-secondary:focus,
.btn-secondary.focus,
.btn-secondary.active {
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2);
}
.btn-secondary.disabled,
.btn-secondary:disabled {
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2);
}
.btn-info,
.btn-info:active {
  background-color: #47b5ed !important;
  border-color: #47b5ed !important;
  color: #ffffff !important;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2);
}
.btn-info:hover,
.btn-info:focus,
.btn-info.focus,
.btn-info.active {
  color: #ffffff !important;
  background-color: #148cca !important;
  border-color: #148cca !important;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2);
}
.btn-info.disabled,
.btn-info:disabled {
  color: #ffffff !important;
  background-color: #148cca !important;
  border-color: #148cca !important;
}
.btn-success,
.btn-success:active {
  background-color: #40b0bf !important;
  border-color: #40b0bf !important;
  color: #ffffff !important;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2);
}
.btn-success:hover,
.btn-success:focus,
.btn-success.focus,
.btn-success.active {
  color: #ffffff !important;
  background-color: #2a747e !important;
  border-color: #2a747e !important;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2);
}
.btn-success.disabled,
.btn-success:disabled {
  color: #ffffff !important;
  background-color: #2a747e !important;
  border-color: #2a747e !important;
}
.btn-warning,
.btn-warning:active {
  background-color: #ffe161 !important;
  border-color: #ffe161 !important;
  color: #614f00 !important;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2);
}
.btn-warning:hover,
.btn-warning:focus,
.btn-warning.focus,
.btn-warning.active {
  color: #0a0800 !important;
  background-color: #ffd10a !important;
  border-color: #ffd10a !important;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2);
}
.btn-warning.disabled,
.btn-warning:disabled {
  color: #614f00 !important;
  background-color: #ffd10a !important;
  border-color: #ffd10a !important;
}
.btn-danger,
.btn-danger:active {
  background-color: #ff9966 !important;
  border-color: #ff9966 !important;
  color: #ffffff !important;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2);
}
.btn-danger:hover,
.btn-danger:focus,
.btn-danger.focus,
.btn-danger.active {
  color: #ffffff !important;
  background-color: #ff5f0f !important;
  border-color: #ff5f0f !important;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2);
}
.btn-danger.disabled,
.btn-danger:disabled {
  color: #ffffff !important;
  background-color: #ff5f0f !important;
  border-color: #ff5f0f !important;
}
.btn-white,
.btn-white:active {
  background-color: #fafafa !important;
  border-color: #fafafa !important;
  color: #7a7a7a !important;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2);
}
.btn-white:hover,
.btn-white:focus,
.btn-white.focus,
.btn-white.active {
  color: #4f4f4f !important;
  background-color: #cfcfcf !important;
  border-color: #cfcfcf !important;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2);
}
.btn-white.disabled,
.btn-white:disabled {
  color: #222 !important;
  background-color: #cfcfcf !important;
  border-color: #cfcfcf !important;
}
.btn-black,
.btn-black:active {
  background-color: #232323 !important;
  border-color: #232323 !important;
  color: #ffffff !important;
  box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2);
}
.btn-black:hover,
.btn-black:focus,
.btn-black.focus,
.btn-black.active {
  color: #ffffff !important;
  background-color: #000000 !important;
  border-color: #000000 !important;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.2);
}
.btn-black.disabled,
.btn-black:disabled {
  color: #ffffff !important;
  background-color: #000000 !important;
  border-color: #000000 !important;
}
.btn-primary-outline,
.btn-primary-outline:active {
  background-color: transparent !important;
  border-color: transparent;
  color: #6592e6;
}
.btn-primary-outline:hover,
.btn-primary-outline:focus,
.btn-primary-outline.focus,
.btn-primary-outline.active {
  color: #2260d2 !important;
  background-color: transparent!important;
  border-color: transparent!important;
  box-shadow: none!important;
}
.btn-primary-outline.disabled,
.btn-primary-outline:disabled {
  color: #ffffff !important;
  background-color: #6592e6 !important;
  border-color: #6592e6 !important;
}
.btn-secondary-outline,
.btn-secondary-outline:active {
  background-color: transparent !important;
  border-color: transparent;
  color: #ff6666;
}
.btn-secondary-outline:hover,
.btn-secondary-outline:focus,
.btn-secondary-outline.focus,
.btn-secondary-outline.active {
  color: <?php echo paml_htmlspecialchars($this->function_var($this->setup_args(['name'=>'barcolor','escape'=>'','this_tag'=>'var'],null,$this),$this),ENT_QUOTES)?>
 !important;
  background-color: transparent!important;
  border-color: transparent!important;
  box-shadow: none!important;
}
.btn-secondary-outline.disabled,
.btn-secondary-outline:disabled {
  color: #ffffff !important;
  background-color: #ff6666 !important;
  border-color: #ff6666 !important;
}
.btn-info-outline,
.btn-info-outline:active {
  background-color: transparent !important;
  border-color: transparent;
  color: #47b5ed;
}
.btn-info-outline:hover,
.btn-info-outline:focus,
.btn-info-outline.focus,
.btn-info-outline.active {
  color: #148cca !important;
  background-color: transparent!important;
  border-color: transparent!important;
  box-shadow: none!important;
}
.btn-info-outline.disabled,
.btn-info-outline:disabled {
  color: #ffffff !important;
  background-color: #47b5ed !important;
  border-color: #47b5ed !important;
}
.btn-success-outline,
.btn-success-outline:active {
  background-color: transparent !important;
  border-color: transparent;
  color: #40b0bf;
}
.btn-success-outline:hover,
.btn-success-outline:focus,
.btn-success-outline.focus,
.btn-success-outline.active {
  color: #2a747e !important;
  background-color: transparent!important;
  border-color: transparent!important;
  box-shadow: none!important;
}
.btn-success-outline.disabled,
.btn-success-outline:disabled {
  color: #ffffff !important;
  background-color: #40b0bf !important;
  border-color: #40b0bf !important;
}
.btn-warning-outline,
.btn-warning-outline:active {
  background-color: transparent !important;
  border-color: transparent;
  color: #ffe161;
}
.btn-warning-outline:hover,
.btn-warning-outline:focus,
.btn-warning-outline.focus,
.btn-warning-outline.active {
  color: #ffd10a !important;
  background-color: transparent!important;
  border-color: transparent!important;
  box-shadow: none!important;
}
.btn-warning-outline.disabled,
.btn-warning-outline:disabled {
  color: #614f00 !important;
  background-color: #ffe161 !important;
  border-color: #ffe161 !important;
}
.btn-danger-outline,
.btn-danger-outline:active {
  background-color: transparent !important;
  border-color: transparent;
  color: #ff9966;
}
.btn-danger-outline:hover,
.btn-danger-outline:focus,
.btn-danger-outline.focus,
.btn-danger-outline.active {
  color: #ff5f0f !important;
  background-color: transparent!important;
  border-color: transparent!important;
  box-shadow: none!important;
}
.btn-danger-outline.disabled,
.btn-danger-outline:disabled {
  color: #ffffff !important;
  background-color: #ff9966 !important;
  border-color: #ff9966 !important;
}
.btn-black-outline,
.btn-black-outline:active {
  background-color: transparent !important;
  border-color: transparent;
  color: #232323;
}
.btn-black-outline:hover,
.btn-black-outline:focus,
.btn-black-outline.focus,
.btn-black-outline.active {
  color: #000000 !important;
  background-color: transparent!important;
  border-color: transparent!important;
  box-shadow: none!important;
}
.btn-black-outline.disabled,
.btn-black-outline:disabled {
  color: #ffffff !important;
  background-color: #232323 !important;
  border-color: #232323 !important;
}
.btn-white-outline,
.btn-white-outline:active {
  background-color: transparent !important;
  border-color: transparent;
  color: #fafafa;
}
.btn-white-outline:hover,
.btn-white-outline:focus,
.btn-white-outline.focus,
.btn-white-outline.active {
  color: #cfcfcf !important;
  background-color: transparent!important;
  border-color: transparent!important;
  box-shadow: none!important;
}
.btn-white-outline.disabled,
.btn-white-outline:disabled {
  color: #7a7a7a !important;
  background-color: #fafafa !important;
  border-color: #fafafa !important;
}
a {
  color: #4370c4 !important;
  text-decoration: underline;
}
.badge {
  color: #fff !important;
}
.text-primary {
  color: #4370c4 !important;
  text-decoration: none;
}
.text-secondary {
  color: #ff6666 !important;
  text-decoration: none;
}
.text-success {
  color: #fff !important;
  text-decoration: none;
}
.text-info {
  color: #47b5ed !important;
}
.text-warning {
  color: #ffe161 !important;
}
.text-danger {
  color: #ff9966 !important;
}
.text-white {
  color: #fafafa !important;
}
.text-black {
  color: #232323 !important;
}
a.text-primary:hover,
a.text-primary:focus,
a.text-primary.active {
  color: #205ac5 !important;
}
a.text-secondary:hover,
a.text-secondary:focus,
a.text-secondary.active {
  color: #ff0000 !important;
}
a.text-success:hover,
a.text-success:focus,
a.text-success.active {
  color: #9bb !important;
}
a.text-info:hover,
a.text-info:focus,
a.text-info.active {
  color: #1283bc !important;
}
a.text-warning:hover,
a.text-warning:focus,
a.text-warning.active {
  color: #facb00 !important;
}
a.text-danger:hover,
a.text-danger:focus,
a.text-danger.active {
  color: #ff5500 !important;
}
a.text-white:hover,
a.text-white:focus,
a.text-white.active {
  color: #c7c7c7 !important;
}
a.text-black:hover,
a.text-black:focus,
a.text-black.active {
  color: #000000 !important;
}
a[class*="text-"]:not(.nav-link):not(.dropdown-item):not([role]):not(.navbar-caption) {
  position: relative;
  background-image: transparent;
  background-size: 10000px 2px;
  background-repeat: no-repeat;
  background-position: 0px 1.2em;
  background-position: -10000px 1.2em;
}
a[class*="text-"]:not(.nav-link):not(.dropdown-item):not([role]):not(.navbar-caption):hover {
  transition: background-position 2s ease-in-out;
  background-image: linear-gradient(currentColor 50%, currentColor 50%);
  background-position: 0px 1.2em;
}
.nav-tabs .nav-link.active {
  color: #6592e6;
}
.nav-tabs .nav-link:not(.active) {
  color: #232323;
}
.alert-success {
  background-color: #70c770;
}
.alert-info {
  background-color: #47b5ed;
}
.alert-warning {
  background-color: #ffe161;
}
.alert-danger {
  background-color: #ff9966;
}
.gallery-filter li.active .btn {
  background-color: #6592e6;
  border-color: #6592e6;
  color: #ffffff;
}
.gallery-filter li.active .btn:focus {
  box-shadow: none;
}
a,
a:hover {
  color: #6592e6;
}
.plan-header.bg-primary .plan-subtitle,
.plan-header.bg-primary .plan-price-desc {
  color: #ffffff;
}
.plan-header.bg-success .plan-subtitle,
.plan-header.bg-success .plan-price-desc {
  color: #a0d8df;
}
.plan-header.bg-info .plan-subtitle,
.plan-header.bg-info .plan-price-desc {
  color: #ffffff;
}
.plan-header.bg-warning .plan-subtitle,
.plan-header.bg-warning .plan-price-desc {
  color: #ffffff;
}
.plan-header.bg-danger .plan-subtitle,
.plan-header.bg-danger .plan-price-desc {
  color: #ffffff;
}
.scrollToTop_wraper {
  display: none;
}
.form-control {
  font-size: 1.1rem;
  line-height: 1.5;
  font-weight: 400;
}
.form-control > .iconfont {
  font-size: 1.375rem;
}
.form-control:hover,
.form-control:focus {
  box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px 0px, rgba(0, 0, 0, 0.07) 0px 1px 3px 0px, rgba(0, 0, 0, 0.03) 0px 0px 0px 1px;
  border-color: #6592e6 !important;
}
.form-control:-webkit-input-placeholder {
  font-size: 1.1rem;
  line-height: 1.5;
  font-weight: 400;
}
.form-control:-webkit-input-placeholder > .iconfont {
  font-size: 1.375rem;
}
.cell-form-question {
  width: 30%;
}
.cell-form-input {
  width: 70%;
}
.form-table button[type=submit] {
  width: 100%;
}
@media (max-width: 767px) {
  .form-table .cell-form-input {
    border-top: 0;
  }
  .form-table {
    display: block !important;
    width: 100% !important;
  }
  .form-table thead, .form-table tbody, .form-table tfoot, .form-table tr, .form-table th, .form-table td {
    display: block !important;
    width: 100% !important;
    text-align: left !important;
  }
  .form-table th {
    padding-bottom: 8px !important;
  }
  .form-table th label {
    margin: 0;
    padding: 0;
    width: 100%;
  }
}
blockquote {
  border-color: #6592e6;
}
.jq-selectbox li:hover,
.jq-selectbox li.selected {
  background-color: #6592e6;
  color: #ffffff;
}
.jq-number__spin {
  transition: 0.25s ease;
}
.jq-number__spin:hover {
  border-color: #6592e6;
}
.jq-selectbox .jq-selectbox__trigger-arrow,
.jq-number__spin.minus:after,
.jq-number__spin.plus:after {
  transition: 0.4s;
  border-top-color: #353535;
  border-bottom-color: #353535;
}
.jq-selectbox:hover .jq-selectbox__trigger-arrow,
.jq-number__spin.minus:hover:after,
.jq-number__spin.plus:hover:after {
  border-top-color: #6592e6;
  border-bottom-color: #6592e6;
}
.xdsoft_datetimepicker .xdsoft_calendar td.xdsoft_default,
.xdsoft_datetimepicker .xdsoft_calendar td.xdsoft_current,
.xdsoft_datetimepicker .xdsoft_timepicker .xdsoft_time_box > div > div.xdsoft_current {
  color: #ffffff !important;
  background-color: #6592e6 !important;
  box-shadow: none !important;
}
.xdsoft_datetimepicker .xdsoft_calendar td:hover,
.xdsoft_datetimepicker .xdsoft_timepicker .xdsoft_time_box > div > div:hover {
  color: #000000 !important;
  background: #ff6666 !important;
  box-shadow: none !important;
}
.lazy-bg {
  background-image: none !important;
}
.lazy-placeholder:not(section),
.lazy-none {
  display: block;
  position: relative;
  padding-bottom: 56.25%;
  width: 100%;
  height: auto;
}
iframe.lazy-placeholder,
.lazy-placeholder:after {
  content: '';
  position: absolute;
  width: 200px;
  height: 200px;
  background: transparent no-repeat center;
  background-size: contain;
  top: 50%;
  left: 50%;
  transform: translateX(-50%) translateY(-50%);
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg width='32' height='32' viewBox='0 0 64 64' xmlns='http://www.w3.org/2000/svg' stroke='%236592e6' %3e%3cg fill='none' fill-rule='evenodd'%3e%3cg transform='translate(16 16)' stroke-width='2'%3e%3ccircle stroke-opacity='.5' cx='16' cy='16' r='16'/%3e%3cpath d='M32 16c0-9.94-8.06-16-16-16'%3e%3canimateTransform attributeName='transform' type='rotate' from='0 16 16' to='360 16 16' dur='1s' repeatCount='indefinite'/%3e%3c/path%3e%3c/g%3e%3c/g%3e%3c/svg%3e");
}
section.lazy-placeholder:after {
  opacity: 0.5;
}
body {
  overflow-x: hidden;
}
a {
  transition: color 0.6s;
}
.new-section {
  padding-bottom: 1rem;
  background-color: #ffffff;
}
.new-section img,
.new-section .item-img {
  height: 100%;
  height: 200px;
  object-fit: cover;
}
.new-section ruby,.ranking-section ruby,
.category-section ruby, text-primary ruby {
  font-weight: 500;
}
.text ruby {
  font-weight: 400;
}
.new-section .item {
  margin-bottom: 2rem;
}
.new-section .item-wrapper {
  position: relative;
  border-radius: 4px;
  background: #fafafa;
  height: 100%;
  display: flex;
  flex-flow: column nowrap;
}
@media (min-width: 992px) {
  .new-section .item-wrapper .item-content {
    padding: 2rem 2rem 0;
  }
  .new-section .item-wrapper .item-footer {
    padding: 0 2rem 2rem;
  }
}
@media (max-width: 991px) {
  .new-section .item-wrapper .item-content {
    padding: 1rem 1rem 0;
  }
  .new-section .item-wrapper .item-footer {
    padding: 0 1rem 1rem;
  }
}
.new-section .section-btn {
  margin-top: auto !important;
}
.new-section .section-title {
  color: #232323;
}
.new-section .text,
.new-section .section-btn {
  text-align: left;
}
.new-section .item-title {
  text-align: left;
}
.new-section .item-subtitle {
  text-align: right;
  color: #232323;
}
.nav-section {
  position: relative;
  z-index: 1000;
  width: 100%;
  min-height: 60px;
  margin-top: 2rem;
}
.nav-section nav.navbar {
  position: fixed;
}
.nav-section .dropdown-item:before {
  font-family: Moririse2 !important;
  content: "\e966";
  display: inline-block;
  width: 0;
  position: absolute;
  left: 1rem;
  top: 0.5rem;
  margin-right: 0.5rem;
  line-height: 1;
  font-size: inherit;
  vertical-align: middle;
  text-align: center;
  overflow: hidden;
  transform: scale(0, 1);
  transition: all 0.25s ease-in-out;
}
.nav-section .dropdown-menu {
  padding: 0;
  border-radius: 4px;
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
}
.nav-section .dropdown-item {
  border-bottom: 1px solid #e6e6e6;
}
.nav-section .dropdown-item:hover,
.nav-section .dropdown-item:focus {
  background: #6592e6 !important;
  color: white !important;
}
.nav-section .dropdown-item:first-child {
  border-top-left-radius: 4px;
  border-top-right-radius: 4px;
}
.nav-section .dropdown-item:last-child {
  border-bottom: none;
  border-bottom-left-radius: 4px;
  border-bottom-right-radius: 4px;
}
.nav-section .nav-dropdown .link {
  padding: 0 0.3em !important;
  margin: 0.667em 1em !important;
}
.nav-section .nav-dropdown .link.dropdown-toggle::after {
  margin-left: 0.5rem;
  margin-top: 0.2rem;
}
.nav-section .nav-link {
  position: relative;
}
.nav-section .container {
  display: flex;
  margin: auto;
}
.nav-section .iconfont-wrapper {
  color: #000000 !important;
  font-size: 1.5rem;
  padding-right: 0.5rem;
}
.nav-section .dropdown-menu,
.nav-section .navbar.opened {
  background: #ffffff !important;
}
.nav-section .dropdown .dropdown-menu .dropdown-item {
  width: auto;
  transition: all 0.25s ease-in-out;
}
.nav-section .dropdown .dropdown-menu .dropdown-item::after {
  right: 0.5rem;
}
.nav-section .dropdown .dropdown-menu .dropdown-item .iconfont {
  margin-right: 0.5rem;
  vertical-align: sub;
}
.nav-section .dropdown .dropdown-menu .dropdown-item .iconfont:before {
  display: inline-block;
  transform: scale(1, 1);
  transition: all 0.25s ease-in-out;
}
.nav-section .collapsed .dropdown-menu .dropdown-item:before {
  display: none;
}
.nav-section .collapsed .dropdown .dropdown-menu .dropdown-item {
  padding: 0.235em 1.5em 0.235em 1.5em !important;
  transition: none;
  margin: 0 !important;
}
.nav-section .navbar {
  min-height: 70px;
  transition: all 0.3s;
  border-bottom: 1px solid transparent;
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
  background: #ffffff;
}
.nav-section .navbar.opened {
  transition: all 0.3s;
}
.nav-section .navbar .dropdown-item {
  padding: 0.5rem 1.8rem;
}
.nav-section .navbar .navbar-logo img {
  width: auto;
}
.nav-section .navbar .navbar-collapse {
  justify-content: flex-end;
  z-index: 1;
}
.nav-section .navbar.collapsed {
  justify-content: center;
}
.nav-section .navbar.collapsed .nav-item .nav-link::before {
  display: none;
}
.nav-section .navbar.collapsed.opened .dropdown-menu {
  top: 0;
}
.nav-section .navbar.collapsed .dropdown-menu .dropdown-submenu {
  left: 0 !important;
}
.nav-section .navbar.collapsed .dropdown-menu .dropdown-item:after {
  right: auto;
}
.nav-section .navbar.collapsed .dropdown-menu .dropdown-toggle[data-toggle="dropdown-submenu"]:after {
  margin-left: 0.5rem;
  margin-top: 0.2rem;
  border-top: 0.35em solid;
  border-right: 0.35em solid transparent;
  border-left: 0.35em solid transparent;
  border-bottom: 0;
  top: 41%;
}
.nav-section .navbar.collapsed ul.navbar-nav li {
  margin: auto;
}
.nav-section .navbar.collapsed .dropdown-menu .dropdown-item {
  padding: 0.25rem 1.5rem;
  text-align: center;
}
.nav-section .navbar.collapsed .icons-menu {
  padding-left: 0;
  padding-right: 0;
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
}
@media (max-width: 991px) {
  .nav-section .navbar .nav-item .nav-link::before {
    display: none;
  }
  .nav-section .navbar.opened .dropdown-menu {
    top: 0;
  }
  .nav-section .navbar .dropdown-menu .dropdown-submenu {
    left: 0 !important;
  }
  .nav-section .navbar .dropdown-menu .dropdown-item:after {
    right: auto;
  }
  .nav-section .navbar .dropdown-menu .dropdown-toggle[data-toggle="dropdown-submenu"]:after {
    margin-left: 0.5rem;
    margin-top: 0.2rem;
    border-top: 0.35em solid;
    border-right: 0.35em solid transparent;
    border-left: 0.35em solid transparent;
    border-bottom: 0;
    top: 40%;
  }
  .nav-section .navbar .navbar-logo img {
    height: 3rem !important;
  }
  .nav-section .navbar ul.navbar-nav li {
    margin: auto;
  }
  .nav-section .navbar .dropdown-menu .dropdown-item {
    padding: 0.25rem 1.5rem !important;
    text-align: center;
  }
  .nav-section .navbar .navbar-brand {
    flex-shrink: initial;
    flex-basis: auto;
    word-break: break-word;
    padding-right: 2rem;
  }
  .nav-section .navbar .navbar-toggler {
    flex-basis: auto;
  }
  .nav-section .navbar .icons-menu {
    padding-left: 0;
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
  }
}
.nav-section .navbar.navbar-short {
  min-height: 60px;
}
.nav-section .navbar.navbar-short .navbar-logo img {
  height: 2.5rem !important;
}
.nav-section .navbar.navbar-short .navbar-brand {
  min-height: 60px;
  padding: 0;
}
.nav-section .navbar-brand {
  min-height: 70px;
  flex-shrink: 0;
  align-items: center;
  margin-right: 0;
  padding: 10px 0;
  transition: all 0.3s;
  word-break: break-word;
  z-index: 1;
}
.nav-section .navbar-brand .navbar-caption {
  line-height: inherit !important;
}
.nav-section .dropdown-item.active,
.nav-section .dropdown-item:active {
  background-color: transparent;
}
.nav-section .navbar-expand-lg .navbar-nav .nav-link {
  padding: 0;
}
.nav-section .nav-dropdown .link.dropdown-toggle {
  margin-right: 1.667em;
}
.nav-section .nav-dropdown .link.dropdown-toggle[aria-expanded="true"] {
  margin-right: 0;
  padding: 0.667em 1.667em;
}
.nav-section .navbar.navbar-expand-lg .dropdown .dropdown-menu {
  background: #ffffff;
}
.nav-section .navbar.navbar-expand-lg .dropdown .dropdown-menu .dropdown-submenu {
  margin: 0;
  left: 100%;
}
.nav-section .navbar .dropdown.open > .dropdown-menu {
  display: block;
}
.nav-section ul.navbar-nav {
  flex-wrap: wrap;
  align-items: baseline;
}
.nav-section .navbar-buttons {
  text-align: center;
  min-width: 170px;
}
.nav-section button.navbar-toggler {
  width: 31px;
  height: 20px;
  cursor: pointer;
  transition: all 0.2s;
  position: relative;
  align-self: center;
}
.nav-section button.navbar-toggler .hamburger span {
  position: absolute;
  right: 0;
  width: 30px;
  height: 2px;
  border-right: 5px;
  background-color: #000000;
}
.nav-section button.navbar-toggler .hamburger span:nth-child(1) {
  top: 0;
  transition: all 0.2s;
}
.nav-section button.navbar-toggler .hamburger span:nth-child(2) {
  top: 8px;
  transition: all 0.15s;
}
.nav-section button.navbar-toggler .hamburger span:nth-child(3) {
  top: 8px;
  transition: all 0.15s;
}
.nav-section button.navbar-toggler .hamburger span:nth-child(4) {
  top: 16px;
  transition: all 0.2s;
}
.nav-section nav.opened .hamburger span:nth-child(1) {
  top: 8px;
  width: 0;
  opacity: 0;
  right: 50%;
  transition: all 0.2s;
}
.nav-section nav.opened .hamburger span:nth-child(2) {
  transform: rotate(45deg);
  transition: all 0.25s;
}
.nav-section nav.opened .hamburger span:nth-child(3) {
  transform: rotate(-45deg);
  transition: all 0.25s;
}
.nav-section nav.opened .hamburger span:nth-child(4) {
  top: 8px;
  width: 0;
  opacity: 0;
  right: 50%;
  transition: all 0.2s;
}
.nav-section .navbar-dropdown {
  padding: 0 1rem;
  position: fixed;
}
.nav-section a.nav-link {
  display: flex;
  align-items: baseline;
  justify-content: center;
}
.nav-section .icons-menu {
  flex-wrap: nowrap;
  display: flex;
  justify-content: center;
  padding-left: 1rem;
  padding-right: 1rem;
  padding-top: 0.3rem;
  text-align: center;
}
@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {
  .nav-section .navbar {
    height: 70px;
  }
  .nav-section .navbar.opened {
    height: auto;
  }
  .nav-section .nav-item .nav-link:hover::before {
    width: 175%;
    max-width: calc(100% + 2rem);
    left: -1rem;
  }
}
.yearly-section {
  padding-top: 2rem;
  padding-bottom: 2rem;
  background-color: #ffffff;
}
.category-section {
  padding-bottom: 2rem;
  background-color: #ffffff;
}
.pr-section {
  padding-top: 2rem;
  padding-bottom: 2rem;
  background-color: #ffffff;
}
.ranking-section {
  padding-top: 2rem;
  padding-bottom: 2rem;
  background-color: #ffffff;
}
.ranking-section .counter-container ol {
  margin-bottom: 0;
  counter-reset: myCounter;
}
.ranking-section .counter-container ol li {
  margin-bottom: 1rem;
}
.ranking-section .counter-container ol li {
  list-style: none;
  padding-left: 1rem;
  position: relative;
}
.ranking-section .counter-container ol li:before {
  position: absolute;
  left: -20px;
  margin-top: 1px;
  counter-increment: myCounter;
  content: counter(myCounter);
  line-height: 40px;
  transition: all .2s;
  color: #ffffff;
  background: #4370c4;
  width: 28px;
  height: 28px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 400;
}
.footer-section {
  padding-top: 2rem;
  padding-bottom: 2rem;
  background-color: #232323;
}
.footer-section .row-links {
  width: 100%;
  justify-content: center;
}
.footer-section .social-row {
  width: 100%;
  justify-content: center;
}
.footer-section .media-container-row {
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.footer-section .media-container-row .foot-menu {
  list-style: none;
  display: flex;
  align-items: baseline;
  justify-content: center;
  flex-wrap: wrap;
  padding: 0;
  margin-bottom: 0;
}
.footer-section .media-container-row .foot-menu li {
  padding: 0 1rem 1rem 1rem;
}
.footer-section .media-container-row .foot-menu li p {
  margin: 0;
}
.footer-section .media-container-row .social-list {
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-end;
}
.footer-section .media-container-row .social-list .iconfont-social {
  font-size: 1.5rem;
  color: #ffffff;
}
.footer-section .media-container-row .social-list .soc-item {
  margin: 0 .5rem;
}
.footer-section .media-container-row .social-list a {
  margin: 0;
}
.footer-section .media-container-row .social-list a:hover {
  opacity: 1;
}
@media (max-width: 767px) {
  .footer-section .media-container-row .social-list {
    -webkit-justify-content: center;
    justify-content: center;
  }
}
@media (max-width: 767px) {
  .section-heading:before,
  .section-heading-l:before {
    margin-right: 1rem;
  }
  .section-heading:after,
  .section-heading-l:after {
    margin-left: 1rem;
  }
}
.footer-section .media-container-row .row-copirayt {
  word-break: break-word;
  width: 100%;
}
.footer-section .media-container-row .row-copirayt p {
  width: 100%;
}
label.custom-radio, label.custom-checkbox {
  display: flex !important;
  flex-wrap: wrap !important;
  align-items: center !important;
}
.custom-control-input {
  opacity: 1 !important;
}
.table-striped tbody tr:nth-of-type(odd) {
  background-color: #fbfbfb;
}
.navbar {
  overflow-y: scroll !important;
  max-height: 100% !important;
  -webkit-overflow-scrolling: touch !important;
}
.tags-block {
  display: flex;
  flex-wrap: wrap;
}

.tags-block > * {
  margin-right: 0.5rem;
}

.tags-block a {
  display: flex;
  align-items: center;
  min-height:2.5rem;
}
.badge-info {
  background-color: #071792;
}

.badge-success {
  background-color: #005A17;
}
<?php endif;$c_a8310c=ob_get_clean();endwhile;$c_a8310c=ob_get_clean();echo($this->modifier_merge_linefeeds($c_a8310c,$this->setup_args('1','merge_linefeeds',$this),$this,'merge_linefeeds')); $_ba5c34_local_params=$_ba5c34_old_params['_a8310c'];$_ba5c34_local_vars=$_ba5c34_old_vars['_a8310c'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005690,
);?>