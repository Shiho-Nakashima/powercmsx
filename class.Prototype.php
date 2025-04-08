<?php
if (! defined( 'DS' ) ) {
    define( 'DS', DIRECTORY_SEPARATOR );
}
define( 'PT_DIR'   , __DIR__ . DS );
define( 'LIB_DIR'  , __DIR__ . DS . 'lib' . DS );
define( 'TMPL_DIR' , __DIR__ . DS . 'tmpl' . DS );
define( 'ALT_TMPL' , __DIR__ . DS . 'alt-tmpl' . DS );
define( 'DB_PREFIX', 'mt_' );
define( 'MB_ENCODE_NUMERICENTITY_MAP', [0x80, 0x10FFFF, 0, 0x1FFFFF] );

const DEBUG_BACKTRACE_ARRAY = 1;
const DEBUG_BACKTRACE_TEXT  = 2;
const DEBUG_BACKTRACE_DUMP  = 3;
const DEBUG_BACKTRACE_LOG   = 4;

ini_set( 'include_path', ini_get( 'include_path' ) . PATH_SEPARATOR
         . __DIR__ . DS . 'lib' . PATH_SEPARATOR . LIB_DIR . 'Prototype' );

function prototype_auto_loader ( $class ) {
    if ( class_exists( $class, false ) ) {
        return true;
    } else if ( is_readable( LIB_DIR . 'Prototype' . DS . "class.{$class}.php" ) ) {
        require_once( LIB_DIR . 'Prototype' . DS . "class.{$class}.php" );
        return true;
    }
}
spl_autoload_register( '\prototype_auto_loader' );

class Prototype {

    public static $app = null;
    public    $app_version   = 3.6300;
    public    $version       = 363000;
    public    $id            = 'Prototype';
    public    $name          = 'Prototype';
    public    $db            = null;
    public    $paml_version  = 4;
    public    $properties    = [];
    public    $allow_login   = false;
    public    $add_param_permalink;
    public    $get_cache     = null;
    public    $update_milti  = false;
    public    $tag_delimiter = null;
    public    $else_in_block = true;
    public    $allow_fileget = false;
    public    $allow_fileput = false;
    public    $allow_unlink  = false;
    public    $system_email  = '';
    public    $mail_transfer = null;
    public    $ip_unlock     = [];
    public    $ctx           = null;
    public    $pid           = null;
    public    $dictionary    = [];
    public    $language      = 'ja';
    public    $sys_language  = null;
    public    $copyright     = null;
    public    $app_path      = null;
    public    $extra_path    = null;
    public    $script_uri    = null;
    public    $validate_url  = true;
    public    $dynamic_ignore_scope = false;
    protected $dbprefix      = 'mt_';
    public    $cookie_name   = 'pt-user';
    public    $login_model   = 'user';
    public    $encoding      = 'UTF-8';
    public    $mode          = 'dashboard';
    public    $timezone      = 'Asia/Tokyo';
    public    $current_tz    = null;
    public    $time_offset   = null;
    public    $use_timezone  = false;
    public    $memory_limit  = '2048M';
    public    $set_names     = false;
    public    $list_limit    = 25;
    public    $per_rebuild   = 50;
    public    $rebuild_time_limit = 30;
    public    $views_per_rebuild = 5;
    public    $rebuild_interval = 0;
    public    $two_factor_auth = false;
    public    $can_rebuild_all = true;
    public    $init_plugins  = false;
    public    $basename_len  = 40;
    public    $password_min  = 8;
    public    $retry_auth    = 3;
    public    $sess_timeout  = 86400;
    public    $sess_expires  = 7200;
    public    $token_expires = 7200;
    public    $form_expires  = 600;
    public    $auth_expires  = 600;
    public    $perm_expires  = 86400;
    public    $cache_expires = 86400;
    public    $search_type   = 1;
    public    $cookie_path   = '/';
    public    $cookie_domain = '';
    public    $cookie_samesite = 'Strict';
    public    $languages     = ['ja', 'en'];
    public    $debug         = false;
    public    $logging       = false;
    public    $log_level     = 4;
    public    $stash         = [];
    public    $__stash       = null;
    public    $installed     = false;
    private   $casket        = [];
    public    $use_casket    = true;
    public    $do_conditional= true;
    public    $conditional   = false;
    public    $unify_breaks  = true;
    public    $theme_static  = null;
    public    $init_tags;
    public    $cfg_init_tags = false;
    public    $protocol;
    public    $log_dir;
    public    $support_dir;
    public    $locale_dir;
    public    $screen_id;
    public    $proc_id;
    public    $use_comment   = false;
    public    $accept_comment= false;
    public    $plugin_order  = 0; // 0=asc, 1=desc
    public    $panel_limit   = 5;
    public    $max_blob_cols = 5;
    public    $template_paths= [__DIR__ . DS . 'alt-tmpl', __DIR__ . DS . 'tmpl'];
    public    $plugin_paths  = [];
    public    $has_include   = [];
    public    $tmpl_paths    = [];
    public    $theme_paths   = [];
    public    $model_paths   = [];
    public    $class_paths   = [];
    public    $import_paths  = [];
    public    $components    = [];
    public    $plugin_dirs   = [];
    public    $cfg_settings  = [];
    public    $plugin_switch = [];
    public    $modules       = [];
    public    $child_modules = null;
    public    $cache_driver  = null;
    public    $memcached_servers = [];
    public    $site_base_path= '';
    public    $compile_dir   = '';
    public    $compile_check = 2;
    public    $in_compile    = false;
    public    $cache_dir     = '';
    public    $db_cache_dir  = '';
    public    $force_compile = false;
    public    $build_compile = false;
    public    $force_prefetch= false;
    public    $incl_force_compile= false;
    public    $ctx_cache_ttl = 604800;
    public    $skip_config_check = false;
    public    $linked_file   = 2;
    public    $trim_tmpl     = false;
    public    $file_mgr      = 'PTFileMgr';
    protected $upload_dirs   = [];
    public    $auto_orient   = true;
    public    $remove_exif   = true;
    public    $fmgr;
    public    $publisher;
    public    $no_cache      = false;
    public    $txn_active    = false;
    public    $worker        = null;
    public    $worker_period = 9000;
    public    $worker_log    = null;
    public    $caching       = false;
    public    $db_caching    = true;
    public    $worker_db_caching = true;
    public    $query_cache   = false;
    public    $not_cache     = ['user', 'session', 'log', 'urlinfo'];
    public    $db_use_buffer = true;
    public    $field_type_asset = 'asset,assets,image,images,video,videos';
    public    $max_revisions = -1;
    public    $leave_revisions = false;
    public    $update_rev_created = false;
    public    $unique_url    = false;
    public    $published_files = [];
    public    $remote_ip;
    public    $x_forwarded_for_last;
    public    $user;
    public    $user_session;
    public    $pt_path       = __FILE__;
    public    $pt_dir        = __DIR__;
    public    $app_protect   = true;
    public    $develop       = false;
    public    $export_without_bin = false;
    public    $export_int2label   = true;
    public    $import_set_default = false;
    public    $force_register_tags = true;
    public    $cache_permalink = true;
    public    $remove_old_link = false;
    public    $appname;
    public    $site_url;
    public    $site_path;
    public    $link_url;
    public    $show_both;
    public    $use_plugin    = true;
    public    $theme_plugin  = true;
    public    $theme_model   = true;
    public    $fiscal_start  = 4;
    public    $max_queries   = 2500;
    public    $persistent    = false;
    public    $base;
    public    $path;
    public    $cfg_path;
    public    $is_secure;
    public    $document_root = '';
    public    $server_api    = 'apache';
    public    $apache_version;
    public    $request;
    public    $request_uri;
    public    $query_string;
    public    $start_time;
    public    $request_time;
    public    $request_id;
    public    $admin_url;
    public    $cfg_admin_url;
    public    $request_method;
    public    $current_magic;
    public    $preview_redirect = true;
    public    $publish_callbacks= false;
    public    $validate_email= true;
    public    $mail_return_path = '';
    public    $mail_encoding = '';
    public    $mail_language = 'ja';
    public    $wrap_email    = 200;
    public    $mail_not_cc   = false;
    public    $check_int_null = false;
    public    $upload_size_limit = 33554432;
    public    $upload_max_pixel = 0;
    public    $upload_image_option = 'resize';
    public    $image_quality = 60;
    public    $max_image_pixel = -1;
    public    $max_exec_time = 9000;
    public    $temp_dir      = '/tmp';
    public    $work_dir      = '/tmp';
    public    $session_dir   = '';
    protected $errors        = [];
    public    $error_bordercolor = '#B72C23';
    public    $tmpl_markup   = 'mt';
    public    $admin_protect = false;
    public    $build_published_only = true;
    public    $search_by_field_compat = false;
    public    $get_relations_compat = false;
    public    $include_scope_compat = true;
    public    $include_realtime = false;
    public    $loopfilter_compat = true;
    public    $ip_protect    = false;
    public    $tags_compat   = false;
    public    $tag_multibyte = true;
    public    $upload_compat = false;
    public    $keys_lower    = false;
    public    $can_pull_back = true;
    public    $delayed       = [];
    public    $versions      = [];
    public    $hooks         = [];
    public    $registry      = [];
    public    $requires      = [];
    public    $panel_width   = 103;
    public    $update_urls   = [];
    public    $fmgr_delayed  = false;
    public    $fmgr_use_tmp  = true;
    public    $dir_perms     = null;
    public    $file_perms    = null;
    public    $path_verify   = 1;
    public    $verify_publish= false;
    public    $esc_trans     = false;
    public    $plugins_tags  = [];

    public    $videos        = ['mov', 'avi', 'qt', 'mp4', 'wmv', 'webm', '3gp', 'asx',
                                'mpg', 'flv', 'mkv', 'ogm', 'm3u8', 'ts', 'm4s', 'mpd'];
    public    $images        = ['jpeg', 'jpg', 'png', 'gif', 'jpe'];
    public    $audios        = ['mp3', 'mid', 'midi', 'wav', 'aif', 'aac', 'flac',
                                'aiff', 'aifc', 'au', 'snd', 'ogg', 'wma', 'm4a', 'm3u'];
    public    $denied_exts   = 'ascx,asis,asp,aspx,bat,cfc,cfm,cgi,cmd,com,cpl,dll,exe,'
                             . 'htaccess,htpasswd,inc,jhtml,jsb,jsp,mht,msi,php,php2,php3,php4,'
                             . 'php5,phps,phtm,phtml,pif,pl,pwml,py,reg,scr,sh,shtm,shtml,'
                             . 'vbs,vxd,pm,so,rb,htc';
    public    $allowed_exts  = '';

    protected $methods       = ['view', 'save', 'delete', 'upload', 'save_order',
                                'list_action', 'display_options', 'get_columns_json',
                                'export_scheme', 'recover_password', 'save_hierarchy',
                                'delete_filter', 'edit_image', 'insert_asset', 'theme_setting',
                                'upload_multi', 'rebuild_phase', 'get_thumbnail',
                                'get_field_html', 'manage_scheme', 'manage_plugins',
                                'import_objects', 'upload_objects', 'preview', 'debug',
                                'can_edit_object', 'flush_session', 'update_dashboard',
                                'get_temporary_file', 'clone_object', 'change_activity',
                                'cleanup_tmp', 'manage_theme', 'view_plugin_doc', 'pull_back',
                                'get_rebuild_status', 'rebuild_action', 'clear_extra_paths',
                                'get_current_permalink', 'start_chunk_upload', 'test_mail',
                                'export_scheme_csv', 'wait_export', 'wait_import',
                                'maintenance_setting', 'process_action', 'chunk_upload'];

    public    $callbacks     = ['pre_save' => [], 'before_save' => [], 'post_save' => [],
                                'pre_delete' => [], 'post_delete' => [], 'save_filter' => [],
                                'delete_filter'=> [], 'pre_listing' => [], 'start_listing'=> [],
                                'template_source' => [], 'template_output' => [], 'pre_view' => [],
                                'post_view' => [], 'post_load_objects' => [], 'pre_archive_list' => [],
                                'pre_archive_count' => [], 'publish_date_based' => [], 'post_load_object' => [],
                                'post_import' => [], 'pre_import' => [], 'scheduled_published' => [],
                                'scheduled_replacement' => [] ];

    public    $permissions   = ['can_rebuild', 'manage_plugins', 'import_objects', 'can_livepreview'];
    public    $can_includes  = ['txt', 'tpl', 'tmpl', 'inc', 'html'];
    public    $compile_cols  = ['template' => 'text', 'urlmapping' => 'mapping', 'question' => 'template',
                                'questiontype' => 'template', 'field' => ['label', 'content'],
                                'fieldtype' => ['label', 'content'] ];
    public    $disp_option;
    public    $workspace_param;
    public    $workspace_id;
    public    $assets_c      = false;
    public    $assets_c_path = '';
    public    $output_compression = true;
    public    $force_filter  = false;
    public    $return_args   = [];
    public    $core_tags;
    private   $encrypt_key   = 'prototype-default-encrypt-key';
    private   $cfg_encrypt_key;
    private   $encrypt_dbpassword;
    public    $ws_menu_type  = 1;
    public    $ws_selector_limit = 15;
    public    $dynamic_view  = true;
    public    $force_dynamic = false;
    public    $allow_static  = false;
    public    $allow_include = true;
    public    $csv_allow_nl  = true;
    public    $static_conditional = true;
    public    $in_dynamic    = false;
    public    $form_interval = 180;
    public    $form_upper_limit = 5;
    public    $rebuild_async = false;
    public    $async_skip    = false;
    public    $wait_async    = true;
    public    $redundancy    = false;
    public    $php_binary    = null;
    public    $parallel_publish_objs = 0;
    public    $async_max_proc_time = 1200;
    public    $comp_url_md5  = false;
    public    $shared_background_publishing = 0;
    public    $enable_on_demand = false;
    public    $async_max_proc= 4;
    public    $resetdb_per_rebuild = false;
    public    $max_packet    = null; //16777216;
    public    $publish_queue = 4;
    public    $status_publish= 4;
    public    $status_ended  = 5;
    public    $max_status_for_revision = 4;
    public    $can_api_multi = true;
    public    $api_caching   = false;
    private   $api_truncate  = false;
    public    $api_path_from = 'REDIRECT_URL';
    public    $build_one_by_one = false;
    public    $reset_url_method= 'rename';
    public    $plugin_configs= [];
    public    $registered_callbacks = [];
    public    $password_symbol = false;
    public    $password_letternum = false;
    public    $password_1byte_letternum = false;
    public    $password_upperlower = false;
    public    $eval_in_view  = false;
    public    $in_preview    = false;
    public    $eval_in_preview = false;
    public    $dynamicmtml_in_preview = false;
    public    $error_document404 = null;
    public    $always_update_login = true;
    public    $updated_login = false;
    public    $force_secure = false;
    public    $add_port_to_url = true;
    public    $rebuild_archives_only = true;
    public    $load_monitoring = false;
    public    $performance_logging = false;
    public    $performance_logging_threshold = 1.0;
    public    $rebuild_optimizer = true;
    public    $maintenance_time = ['020000', '050000'];
    public    $description_cols = ['description', 'excerpt'];
    public    $directory_index = 'index.html';
    public    $system_info_url = 'https://powercmsx.jp/information/dashboard.html';
    public    $news_box_url    = 'https://powercmsx.jp/information/news.html';
    private   $powercmsx_auth  = 'powercmsx:xlpXLP';
    public    $delayed_dependencies = [];
    public    $delayed_publish_objs = [];
    public    $published_maps  = [];
    public    $remove_dirs     = [];
    public    $remove_async    = true;
    public    $remove_objects  = [];
    public    $save_objects    = [];
    public    $url_relations   = [];
    public    $publish_nextprev= false;
    public    $remove4byte     = false;
    public    $rebasename_clone= false;
    public    $publish_clone   = false;
    public    $http_proxy      = '';
    public    $http_request_fulluri = false;
    public    $unchange_disp_upgrade = false;
    public    $redirected      = false;
    public    $queue_max_retries = 5;
    public    $upload_history_by = 'user';
    public    $modifier_funcs  = [];
    public    $template_basename_by_class = true;
    public    $keep_master_basename = false;
    public    $fix_email_from  = null;
    private   $banned_ip       = null;
    public    $immediate_lockout = false;
    public    $tinymce_version = '6.3.2';
    public    $publish_only_archive = false;
    public    $sethashvar_compat = false;
    public    $date_tag_compat = true;
    public    $regex_replace_compat = false;
    public    $basename_separator   = '_';
    public    $basename_upper_lower = false;
    public    $purge_cache_in_error = false;
    public    $republish_date_based = false;
    public    $dynamic_init_tags_later = false;
    public    $cb_save_priority = 1;
    public    $cb_delete_priority = 5;
    public    $imagick_convert_path = null;
    public    $published_on_default = 'YmdHis';
    public    $permalink_compat     = false;
    public    $get_object_cols      = '';
    public    $no_encode_filename   = true;
    public    $hash_multibyte_filename = false;
    public    $pt_check_test_email  = true;
    public    $ifcomponent_compat   = false;
    public    $ifformisopen_compat  = false;
    public    $publish_type         = null;
    public    $allow_objectvar      = false;
    public    $tag_relations_compat = false;
    public    $tag_count_compat     = false;
    public    $job_retry_interval   = 600;
    public    $recompile_views      = null;
    public    $gzip_path            = '/usr/bin/gzip';
    public    $tar_path             = '/usr/bin/tar';
    public    $zip_path             = '/usr/bin/zip';
    public    $mysql_path           = '';
    public    $backup_dir           = '';
    public    $mysqldump_path       = '';
    public    $backup_compress      = '';
    public    $backup_rotate        = 1;
    public    $parallel_sleep_time  = 3;
    public    $no_genarate_basename = [];
    public    $force_thumbnail      = false;
    public    $build_pre_parse      = 0;
    public    $dynamic_compile      = false;
    public    $dynamic_filename_compat = false;
    public    $login_by_workspace   = false;
    public    $ignore_default_widget= false;
    public    $list_max_cols        = 10;
    public    $dialog_max_cols      = 5;
    public    $bake_cookies         = [];
    public    $allow_revision_in_list = false;
    public    $var_nullable         = false;
    public    $contact_not_save_post_save = false;
    public    $keep_published_on    = false;
    public    $duplicate_a_date     = true;
    public    $contact_csv_add_cols = ['created_on'];
    public    $reply_trim_to        = '';
    public    $default_ts           = 'CURRENT_TIMESTAMP';
    public    $use_imagine          = true;
    public    $in_iframe            = false;
    public    $csv_with_bom         = true;
    public    $disallow_pwd_login   = false;
    public    $db_can_reconnect     = true;
    public    $db_stringify         = true;
    public    $db_can_insert_empty  = false;
    public    $confirm_web_service  = 0;
    public    $confirm_web_service_expires = 604800;
    public    $list_header_truncate = 10;
    public    $wait_export          = true;
    public    $by_association_col   = 'user_id';
    public    $__destruct           = false;
    public    $destruct_time        = null;
    public    $proc_session         = false;
    public    $max_input_vars_buffer= 100;
    public    $saved_object_id      = 0;
    public    $strict_offset        = false;
    public    $procs                = [];
    public    $show_editor_loader   = true;
    public    $validation_katakana_unicode = false;
    public    $allowed_domains      = [];
    public    $verify_host          = true;
    public    $filter_relation_cols_and_or_compat = false;
    public    $admin_filter_relation_cols_and_or = '';
    private   $php_sapi_name        = null;
    public    $optimize_data_free   = 5000000;
    public    $optimize_table_cnt   = 3;
    public    $translate_in_user_setting = true;

    const INVALID_PATH_PATTERN = '/((?:[\x00-\x7F]|[\xC0-\xDF][\x80-\xBF]|[\xE0-\xEF]'
                               . '[\x80-\xBF]{2}|[\xF0-\xF7][\x80-\xBF]{3}){1,100})|./x';

    static function get_instance() {
        return self::$app;
    }

    function version () {
        return $this->version;
    }

    function __get ( $prop ) {
        if ( isset( $this->properties[ $prop ] )
            || array_key_exists( $prop, $this->properties ) ) {
            return $this->properties[ $prop ];
        }
        return null;
    }

    function __set ( $prop, $value ) {
        $this->properties[ $prop ] = $value;
    }

    function __construct ( $cfgs = [] ) {
        if (! empty( $cfgs ) ) {
            foreach ( $cfgs as $k => $v ) {
                $k = strtolower( $k );
                $this->$k = $v;
            }
        }
        $this->php_sapi_name = php_sapi_name();
        $config = __DIR__ . DS . 'config.json';
        if ( file_exists( $config ) ) {
            $this->configure_from_json( $config );
            if ( json_last_error() ) {
                echo 'An error occurred while decoding config.json ( ' . json_last_error_msg() . ' ).';
                exit();
            }
        }
        $cfg_language = $this->language;
        if (! empty( $this->requires ) ) {
            foreach ( $this->requires as $require ) {
                require_once( $require );
            }
        }
        if ( $this->path ) {
            $this->cfg_path = $this->path;
        }
        require_once( 'class.' . $this->file_mgr . '.php' );
        $fmgr = new $this->file_mgr;
        if ( $this->verify_publish ) {
            $fmgr->denied_exts = preg_split( '/\s*,\s*/', $this->denied_exts );
        }
        $fmgr->use_tmp = $this->fmgr_use_tmp;
        $fmgr->temp_dir = $this->temp_dir;
        $this->fmgr = $fmgr;
        require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPublisher.php' );
        $publisher = new PTPublisher();
        $this->publisher = $publisher;
        require_once( LIB_DIR . 'Prototype' . DS . 'class.PTUtil.php' );
        $this->cfg_admin_url = $this->cfg_admin_url ? $this->cfg_admin_url : $this->admin_url;
        $this->start_time = isset( $_SERVER['REQUEST_TIME_FLOAT'] )
                          ? $_SERVER['REQUEST_TIME_FLOAT'] : microtime( true );
        $this->request_time = isset( $_SERVER['REQUEST_TIME'] ) ? $_SERVER['REQUEST_TIME'] : time();
        ini_set( 'memory_limit', $this->memory_limit );
        $this->request_method = isset( $_SERVER['REQUEST_METHOD'] ) ? $_SERVER['REQUEST_METHOD'] : '';
        if ( $this->request_method == 'POST' ) {
            setlocale( LC_CTYPE, 'ja_JP.UTF-8' );
            // The attachment file name of the Japanese name created in Windows disappears.
        }
        $this->protocol = isset( $_SERVER['SERVER_PROTOCOL'] ) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.1';
        if ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) && $_SERVER['HTTP_X_FORWARDED_FOR'] ) {
            $remote_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if ( strpos( $remote_ip, ',' ) !== false ) {
                $remote_addrs = preg_split( '/\s*,\s*/', $remote_ip );
                if ( $this->x_forwarded_for_last ) $remote_addrs = array_reverse( $remote_addrs );
                foreach ( $remote_addrs as $remote_addr ) {
                    if ( filter_var( $remote_addr, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE|FILTER_FLAG_NO_RES_RANGE ) ) {
                        $remote_ip = $remote_addr;
                        break;
                    }
                }
            }
            $this->remote_ip = $remote_ip;
        } else if ( isset( $_SERVER['REMOTE_ADDR'] ) ) {
            $this->remote_ip = $_SERVER['REMOTE_ADDR'];
        } else {
            $this->remote_ip = 'localhost';
        }
        if ( $this->assets_c ) {
            $this->assets_c = is_string( $this->assets_c ) && is_dir( $this->assets_c )
                            ? $this->assets_c : 'assets_c';
        }
        $secure = isset( $_SERVER['HTTPS'] ) &&
            strtolower( $_SERVER['HTTPS'] ) !== 'off' ? 's' : '';
        if (! $secure && isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] )
            && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' ) {
            $secure = 's';
        }
        $this->is_secure = $secure ? true : false;
        $base = isset( $_SERVER['HTTP_HOST'] ) ? "http{$secure}://{$_SERVER['HTTP_HOST']}" : null;
        if ( $base === null ) $base = isset( $_SERVER['SERVER_NAME'] ) ? "http{$secure}://{$_SERVER['SERVER_NAME']}" : null;
        $port = isset( $_SERVER['SERVER_PORT'] ) ? (int) $_SERVER['SERVER_PORT'] : null;
        $port = isset( $_SERVER['HTTP_X_FORWARDED_PORT'] ) ? (int) $_SERVER['HTTP_X_FORWARDED_PORT'] : $port;
        if ( $this->add_port_to_url && $port && ( ( $secure && $port != 443 ) || ( !$secure && $port != 80 ) ) ) {
            if (! preg_match( "/:{$port}$/", $base ) ) {
                $base .= ":{$port}";
            }
        }
        $request_uri = '';
        if ( isset( $_SERVER['HTTP_X_REWRITE_URL'] ) ) {
            $request_uri = $_SERVER['HTTP_X_REWRITE_URL'];
        } else if ( isset( $_SERVER['REQUEST_URI'] ) ) {
            $request_uri = $_SERVER['REQUEST_URI'];
        } else if ( isset( $_SERVER['HTTP_X_ORIGINAL_URL'] ) ) {
            $request_uri = $_SERVER['HTTP_X_ORIGINAL_URL'];
            $_SERVER['REQUEST_URI'] = $_SERVER['HTTP_X_ORIGINAL_URL'];
        } else if ( isset( $_SERVER['ORIG_PATH_INFO'] ) ) {
            $request_uri = $_SERVER['ORIG_PATH_INFO'];
            if ( isset( $_SERVER['QUERY_STRING'] ) ) {
                $request_uri .= '?' . $_SERVER['QUERY_STRING'];
            }
        }
        if ( isset( $_SERVER['REDIRECT_QUERY_STRING'] ) ) {
            $r_query = $_SERVER['REDIRECT_QUERY_STRING'];
            $encoding = mb_detect_encoding( $r_query, "UTF-8, Shift_JIS" );
            if ( $encoding && $encoding != 'UTF-8' ) {
                $r_query = mb_convert_encoding( $r_query, 'UTF-8', $encoding );
            }
            parse_str( $r_query, $params );
            $request_method = $this->request_method;
            foreach ( $params as $key => $value ) {
                $_REQUEST[ $key ] = $value;
                if ( $request_method == 'GET' ) $_GET[ $key ] = $value;
            }
        }
        if ( isset( $_SERVER['REDIRECT_STATUS'] ) ) {
            $status = $_SERVER['REDIRECT_STATUS'];
            if ( ( $status == 403 ) || ( $status == 404 ) ) {
                if ( empty( $_POST ) ) {
                    if ( $params = file_get_contents( "php://input" ) ) {
                        parse_str( $params, $_POST );
                    }
                }
                if ( isset( $_SERVER['REDIRECT_REQUEST_METHOD'] ) ) {
                    $this->request_method = $_SERVER['REDIRECT_REQUEST_METHOD'];
                }
            }
        }
        $this->base = $base;
        $this->request_uri = $request_uri;
        $request = $request_uri;
        if ( $request_uri && strpos( $request_uri, '?' ) ) {
            list( $request, $this->query_string ) = explode( '?', $request_uri );
        }
        if ( isset( $_SERVER['SCRIPT_NAME'] ) && stripos( $request, $_SERVER['SCRIPT_NAME'] ) === 0 ) {
            $request = $_SERVER['SCRIPT_NAME'];
        }
        $request = $this->escape( $request );
        $this->request = $request;
        if (! $this->document_root && isset( $_SERVER['DOCUMENT_ROOT'] ) ) {
            $this->document_root = $_SERVER['DOCUMENT_ROOT'];
        } else if (! $this->document_root ) {
            $this->document_root = dirname( __DIR__ );
        } else {
            $this->document_root = rtrim( $this->document_root, '/\\' );
        }
        $path_part = '';
        if ( $this->id != 'Bootstrapper' && $this->id != 'Worker' ) {
            if ( preg_match( "!(^.*?)([^/]*$)!", $request, $mts ) ) {
                list ( $d, $path_part, $this->script ) = $mts;
                if (! $this->path ) $this->path = $path_part;
            }
        } else {
            $this->script = 'index.php';
            if (! $this->path ) {
                $root_quote = preg_quote( $this->document_root, '/' );
                $this->path = dirname( preg_replace( "/^$root_quote/", '', __FILE__ ) ) . '/';
            }
        }
        if ( $mode = $this->param( '__mode' ) ) {
            $this->mode = $mode;
        }
        $path = $this->path;
        if (! $path ) {
            if ( stripos( $this->document_root, __DIR__ ) === 0 ) {
                $search = preg_quote( $this->document_root, '/' );
                $path = preg_replace( "/^$search/", '', __DIR__ ) . DS;
            } else if ( isset( $_SERVER['REQUEST_URI'] ) ) {
                $path = $_SERVER['REQUEST_URI'] . DS;
            }
        }
        $path = str_replace( DS, '/', $path );
        $this->path = $path;
        $basename = $this->id != 'Bootstrapper'
                  && isset( $_SERVER['SCRIPT_FILENAME'] ) ? basename( $_SERVER['SCRIPT_FILENAME'] ) : 'index.php';
        $this->script_uri = $this->base . $this->request;
        if (! $this->admin_url && $this->id === 'Prototype' ) {
            $this->admin_url = $this->script_uri;
        }
        if ( isset( $_SERVER['HTTP_ACCEPT_LANGUAGE'] ) )
            $this->language = substr( $_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2 );
        self::$app = $this;
    }

    function __destruct () {
        if ( $this->__destruct || $this->maintenance_setting || $this->mode === 'maintenance_setting' ) {
            exit();
        }
        $this->__destruct = true;
        $this->destruct_time = time();
        self::$app = $this;
        if ( $this->id === 'Worker' && $this->pid ) {
            if ( $this->verbose ) {
                echo $this->translate( 'The last process is in progress...' ), "\n";
            }
        }
        if ( $this->db === null && isset( $GLOBALS['_APP'] ) ) {
            $this->db = $GLOBALS['_APP']->db;
        }
        if ( $this->ctx === null && isset( $GLOBALS['_APP'] ) ) {
            $this->ctx = $GLOBALS['_APP']->ctx;
        }
        if (! empty( $this->hooks ) ) {
            $this->run_hooks( 'post_run' );
        }
        if (! $this->db ) exit();
        $this->db->debug = false;
        if (! empty( $this->url_relations ) ) {
            // Replace the menu items.
            $url_relations = $this->url_relations;
            foreach ( $url_relations as $idx => $url_relation ) {
                $replaceURL = $url_relation->_url;
                $replace_terms = ['object_id' => $replaceURL->object_id,
                                  'model' => $replaceURL->model,
                                  'urlmapping_id' => $replaceURL->urlmapping_id,
                                  'class' => $replaceURL->class,
                                  'workspace_id' => $replaceURL->workspace_id,
                                  'archive_type' => $replaceURL->archive_type,
                                  'delete_flag' => 0];
                if ( $replaceURL->archive_date ) {
                    $replace_terms['archive_date'] = $replaceURL->archive_date;
                }
                $newURL = $this->db->model( 'urlinfo' )->get_by_key( $replace_terms );
                if ( $newURL->id ) {
                    $url_relation->to_id( $newURL->id );
                    unset( $url_relation->_url );
                    $url_relations[ $idx ] = $url_relation;
                } else {
                    unset( $url_relations[ $idx ] );
                }
            }
            if (! empty( $url_relations ) ) {
                $this->db->model( 'relation' )->update_multi( $url_relations );
            }
            unset( $url_relations, $this->url_relations );
        }
        if ( $this->always_update_login && $this->updated_login ) {
            if ( $sess = $this->user_session ) {
                $expires = $sess->expires - $this->request_time;
                $timeout = $this->sess_timeout - 600;
                if ( $expires < $timeout ) {
                    $sess->expires( $this->request_time + $this->sess_timeout );
                    $sess->save();
                }
                unset( $sess, $this->user_session );
            }
            $login_model = $this->login_model;
            if ( $this->mode === 'save' && $this->param( '_model' ) === $login_model ) {
            } else {
                $user = $this->user( $login_model );
                if ( $user ) {
                    $last_login_on = date( 'YmdHis', $this->request_time );
                    $user->last_login_on( $last_login_on );
                    $user->last_login_ip( $this->remote_ip );
                    $user->save();
                }
            }
        }
        $update_models = [];
        if (! empty ( $this->save_objects ) ) {
            $this->db->cache = [];
            $this->db->caching = false;
            $save_objects = $this->save_objects;
            foreach ( $save_objects as $model => $save_objs ) {
                if (! is_array( $save_objs ) ) continue;
                $update_models[ $model ] = true;
                if ( $model === 'template' || $model === 'urlmapping' ) {
                    $cols = $model === 'template' ? 'id,text,compiled,cache_key,workspace_id'
                          : 'id,model,mapping,compiled,cache_key,is_preferred,workspace_id';
                    foreach ( $save_objs as $save_obj ) {
                        $save_obj = $this->db->model( $model )->load( $save_obj->id, [], $cols );
                        $save_obj->save();
                    }
                } else {
                    $this->db->model( $model )->update_multi( $save_objs );
                }
            }
            unset( $save_objects, $this->save_objects );
        }
        if (! empty ( $this->remove_objects ) ) {
            $remove_objects = $this->remove_objects;
            $this->remove_async = false;
            $table = isset( $remove_objects['__table'] )
                   ? $remove_objects['__table'] : null;
            unset( $remove_objects['__table'] );
            foreach ( $remove_objects as $model => $remove_objs ) {
                $update_models[ $model ] = true;
                if ( $model === 'revisions' || $model === 'attachmentfile' ) {
                    $model_tbl = $model == 'attachmentfile'
                               ? $this->get_table( 'attachmentfile' ) : $table;
                    foreach ( $remove_objs as $remove_obj ) {
                        $this->remove_object( $remove_obj, $model_tbl );
                    }
                } else if ( $model === 'urlinfo' || $model === 'urlmapping' ) {
                    foreach ( $remove_objs as $remove_obj ) {
                        $remove_obj->remove();
                    }
                } else {
                    $this->db->model( $model )->remove_multi( $remove_objs );
                }
            }
            unset( $remove_objects, $this->remove_objects );
        }
        if (! empty( $update_models ) ) {
            $update_models = array_keys( $update_models );
            foreach ( $update_models as $update_model ) {
                $this->db->clear_query( $update_model );
            }
            unset( $update_models );
        }
        if ( $this->db ) {
            if ( $this->api_truncate ) {
                $sql = 'TRUNCATE TABLE ' . DB_PREFIX . 'api_cache';
                try {
                    $this->db->db->query( $sql );
                    $this->db->clear_query( 'api_cache' );
                } catch ( Exception $e ) {
                    trigger_error( $e->getMessage() );
                }
            }
            $this->db->flush_queries();
            $this->db->update_milti = false;
        }
        $queue_realtime = $this->id === 'Prototype' && $this->save_queue_realtime
            && $this->mode === 'save' && $this->saved_object_id;
        if (! empty ( $this->delayed_dependencies ) || ! empty ( $this->delayed_publish_objs )
            || ! empty ( $this->delayed ) || $queue_realtime ) {
            $this->core_tags->register_tags = null;
            $this->core_tags->tags_cache = [];
            $this->init_tags = false;
            $this->core_tags->init_tags();
        }
        $publisher = $this->publisher;
        if (! empty ( $this->update_urls ) ) {
            $update_urls = array_values( $this->update_urls );
            $mtime = time();
            foreach ( $update_urls as $idx => $update_url ) {
                $update_url->filemtime( $mtime );
                $update_urls[ $idx ] = $update_url;
            }
            $this->db->model( 'urlinfo' )->update_multi( $update_urls );
            unset( $update_urls );
        }
        if ( $queue_realtime ) {
            $model = $this->param( '_model' );
            $url_queues = $this->db->model( 'urlinfo' )->load( ['publish_file' => 4,
                                                                'is_published' => 0, 'class' => 'archive',
                                                                'model' => $model,
                                                                'object_id' => $this->saved_object_id ] );
            if (! empty( $url_queues ) ) {
                $app_id = $this->id;
                $this->id = 'Worker';
                foreach ( $url_queues as $url_queue ) {
                    $this->ctx->stash( 'workspace', $url_queue->workspace );
                    $publisher->publish( $url_queue, true );
                }
                $this->id = $app_id;
            }
        }
        $parallel_publish_objs = (int) $this->parallel_publish_objs;
        $published_objs = [];
        $php_binary = $this->php_binary();
        if (! empty ( $this->delayed_dependencies ) ) {
            $dependencies = $this->delayed_dependencies;
            $add_triggers = [];
            foreach ( $dependencies as $path => $params ) {
                list( $param1, $param2, $param3, $param4 ) = $params;
                $url = $this->db->model( 'urlinfo' )->get_by_key(
                          ['file_path' => $path, 'urlmapping_id' => $param2->id,
                           'model' => $param1->_model, 'class' => 'archive'] );
                $publish_file = $param2->publish_file;
                if ( $url->id ) {
                    $url->key( '' );
                    $date_based = $param2->date_based;
                    if ( $date_based && $param4 ) {
                        $archive_type = ( $param2->model !== 'template' )
                                      ? $param2->model . '-' . strtolower( $date_based )
                                      : strtolower( $date_based );
                    } else {
                        $archive_type = $param2->model === 'template' ? 'index' : $param2->model;
                    }
                    $url->archive_type( $archive_type );
                    if ( $publish_file == 2 ) {
                        $this->delayed[ $url->id ] = $url;
                        unset( $dependencies[ $path ] );
                        continue;
                    } else if ( $publish_file == 3 ) {
                        // On demand
                        if ( $this->fmgr->exists( $url->file_path ) ) {
                            $this->fmgr->unlink( $url->file_path );
                        }
                        $url->publish_file( 3 );
                        $url->save();
                        unset( $dependencies[ $path ] );
                        continue;
                    } else if ( $publish_file == 4 ) {
                        // Queue
                        $url->is_published( 0 );
                        $url->publish_file( 4 );
                        if ( $this->mode === 'rebuild_phase' ) {
                            $url->key( 'rebuild_phase' );
                        }
                        $url->save();
                        unset( $dependencies[ $path ] );
                        continue;
                    }
                    unset( $dependencies[ $path ] );
                    $add_triggers[] = $url;
                    continue;
                }
                if ( $param1->has_column( 'workspace_id' ) ) {
                    $this->ctx->stash( 'workspace', $param1->workspace );
                }
                if ( $parallel_publish_objs && $php_binary ) {
                    $published_objs[ $param1->_model . '_' . $param1->id ] = true;
                } else {
                    $this->publish( $path, $param1, $param2, $param3, $param4 );
                }
            }
            unset( $dependencies, $this->delayed_dependencies );
            if (!empty( $add_triggers ) ) {
                $this->delayed = array_merge( $add_triggers, $this->delayed );
            }
        }
        if (! empty ( $this->delayed_publish_objs ) ) {
            $delayed_publish_objs = $this->delayed_publish_objs;
            foreach ( $delayed_publish_objs as $delayed_obj ) {
                if ( $parallel_publish_objs && $php_binary ) {
                    $published_objs[ $delayed_obj->_model . '_' . $delayed_obj->id ] = true;
                } else {
                    $this->ctx->stash( 'workspace', $delayed_obj->workspace );
                    $this->publish_obj( $delayed_obj );
                }
            }
            unset( $delayed_publish_objs, $this->delayed_publish_objs );
        }
        if (! empty( $published_objs ) ) {
            $publisher->parallel_publish_objs( array_keys( $published_objs ), $parallel_publish_objs );
        }
        unset( $published_objs );
        if (! empty ( $this->delayed ) ) {
            $delayed = $this->delayed;
            $count = count( $delayed );
            if ( $this->shared_background_publishing ) {
                $parallel = false;
                if ( $php_binary && $this->parallel_rebuild_trigger && ( $count > $this->parallel_rebuild_trigger ) ) {
                    $parallel = true;
                } else if ( $php_binary && $this->rebuild_trigger_per && ( $count > $this->rebuild_trigger_per ) ) {
                    $parallel = true;
                }
                $publisher->shared_background_publishing( $this, $delayed, $parallel );
                $count = count( $delayed );
            }
            if ( $count ) {
                if ( $php_binary && $this->parallel_rebuild_trigger && ( $count > $this->parallel_rebuild_trigger ) ) {
                    $publisher->parallel_publish( $delayed, (int) $this->parallel_rebuild_trigger );
                } else if ( $php_binary && $this->rebuild_trigger_per && ( $count > $this->rebuild_trigger_per ) ) {
                    $publisher->split_publish( $delayed, (int) $this->rebuild_trigger_per );
                } else {
                    foreach ( $delayed as $url ) {
                        $this->ctx->stash( 'workspace', $url->workspace );
                        $publisher->publish( $url );
                    }
                }
            }
            unset( $delayed );
            $this->delayed = [];
        }
        if (! empty( $this->remove_dirs ) ) {
            PTUtil::remove_empty_dirs( array_unique( $this->remove_dirs ) );
            unset( $this->remove_dirs );
        }
        if ( $this->id === 'Prototype' && $this->db && $this->mode != 'rebuild_phase' && $this->request_method == 'POST' ) {
            $sess_terms = ['value' => $this->request_id, 'kind' => 'CH', 'user_id' => ['>=' => 0] ];
            $this->remove_session( $sess_terms );
        }
        if (! empty ( $this->upload_dirs ) ) {
            $upload_dirs = $this->upload_dirs;
            $keys = array_map( 'strlen', array_keys( $upload_dirs ) );
            array_multisort( $keys, SORT_DESC, $upload_dirs );
            foreach ( $upload_dirs as $dir => $bool ) {
                if ( $bool === false ) {
                    PTUtil::remove_dir( $dir, true );
                } else {
                    PTUtil::remove_dir( $dir );
                }
            }
            unset( $upload_dirs );
        }
        if (! empty( $this->hooks ) ) {
            $this->run_hooks( 'take_down' );
            $this->hooks = [];
        }
        if ( $this->id === 'Worker' && $this->pid ) {
            $past = microtime( true ) - $this->start_time;
            if ( $past < 60 ) {
                $past = $this->translate( '%sseconds', number_format( $past, 2 ) );
            } else {
                $past = PTUtil::sec_to_hms( round( $past ), '%s,%s,%s' );
                $past = $this->translate( '%1$sh %2$smin %3$sseconds', explode( ',', $past ) );
            }
            if ( is_array( $this->worker_log ) && $this->db ) {
                $this->worker_log['message'] .= $this->translate( '(Processing time: %s)', $past );
                $this->log( $this->worker_log );
            }
            if ( $this->verbose ) {
                echo "=========================================================\n";
                echo date( "Y-m-d H:i:s " ), $this->translate( 'The worker is complete (Processing time:%s).', $past ), "\n";
            } else if ( basename( $_SERVER['PHP_SELF'] ) === 'worker.php' ) {
                echo $this->translate( 'Scheduled tasks update.' ), "\n";
            }
            if ( file_exists( $this->pid ) ) {
                @unlink( $this->pid );
            }
            if ( is_object( $this->cache_driver ) ) {
                if ( get_class( $this->cache_driver->_driver ) == 'PTAPCu' && $this->db->query_cache ) {
                    $pid = md5( __FILE__ );
                    touch( $this->temp_dir . DS . $pid . '.pid' );
                }
            }
        }
        if ( is_object( $this->proc_session ) ) {
            $this->proc_session->remove();
        }
        if ( $this->txn_active ) {
            $this->db->commit();
            $this->txn_active = false;
        }
        if (! empty( $this->procs ) ) {
            $procs = $this->procs;
            foreach ( $procs as $proc ) {
                proc_close( $proc );
            }
        }
        if ( $this->load_monitoring ) {
            $app_id = $this->id;
            $peak_memory = function_exists( 'memory_get_peak_usage' )
                         ? memory_get_peak_usage( true ) /1024/ 1024 : '-';
            $load_avg = function_exists( 'sys_getloadavg' ) ? round( sys_getloadavg()[0], 2 ) : '-';
            $query_string = $this->query_string( true, true );
            $query_string = str_replace( ["\r\n", "\r", "\n"], '', $query_string);
            $time = microtime( true );
            $processing_time = $time - $this->start_time;
            $processing_time = round( $processing_time, 2 );
            $message = "id:{$app_id}\tprocessing_time:{$processing_time}\tload_avg:{$load_avg}\tpeak_memory:{$peak_memory}MB\t{$query_string}";
            error_log( $this->date( 'Y-m-d H:i:s T' ) . "\t" . $message . PHP_EOL, 3,
                       $this->log_dir . DS . 'load_avg_peak_memory.log' );
        }
    }

    function init () {
        if (! $this->log_dir ) $this->log_dir = __DIR__ . DS . 'log';
        if ( $this->timezone ) $this->date_default_timezone_set( $this->timezone );
        require_once( LIB_DIR . 'PADO' . DS . 'class.pado.php' );
        $paml_version = $this->paml_version;
        $class_paml = LIB_DIR . 'PAML' . DS . 'class.paml' . $paml_version . '.php';
        if ( file_exists( $class_paml ) ) {
            require_once( $class_paml );
        } else {
            require_once( LIB_DIR . 'PAML' . DS . 'class.paml.php' );
        }
        require_once( LIB_DIR . 'Prototype' . DS . 'core_models.php' );
        $this_mode = $this->mode;
        if ( isset( $_SERVER['SCRIPT_NAME'] ) && $this->id === 'Prototype' && basename( $_SERVER['SCRIPT_NAME'] ) !== 'index.php' ) {
            $this->id = 'Custom';
        }
        if ( $this_mode === 'dashboard' && $this->id === 'Prototype' ) {
            require_once( LIB_DIR . 'Prototype' . DS . 'core_widgets.php' );
        }
        $cfg = __DIR__ . DS . 'db-config.php';
        if ( file_exists( $cfg ) ) {
            require_once( $cfg );
        } else {
            // Backward Compatibility
            $cfg = __DIR__ . DS . 'db-config.json.cgi';
            if ( file_exists( $cfg ) ) {
                $db->configure_from_json( $cfg );
            }
        }
        $db_config = [];
        if ( $this->cfg_encrypt_key && $this->encrypt_dbpassword ) {
            $dbpasswd = $this->decrypt( PADO_DB_PASSWORD, $this->cfg_encrypt_key );
            $db_config['dbpasswd'] = $dbpasswd;
        }
        $db = new PADO( $db_config );
        $ctx = new PAML();
        $ctx->app_name      = null;
        $ctx->request_time  = $this->request_time;
        $ctx->else_in_block = $this->else_in_block;
        $ctx->allow_fileget = $this->allow_fileget;
        $ctx->allow_fileput = $this->allow_fileput;
        $ctx->allow_unlink  = $this->allow_unlink;
        $ctx->var_nullable  = $this->var_nullable;
        $ctx->include_realtime = $this->include_realtime;
        $ctx->includes = $this->can_includes;
        $fmgr = $this->fmgr;
        if ( $this->dir_perms ) {
            $dir_perms = octdec( sprintf ( '%04d', $this->dir_perms ) );
            $this->fmgr->dir_perms = $dir_perms;
        }
        if ( $this->file_perms ) {
            $file_perms = octdec( sprintf ( '%04d', $this->file_perms ) );
            $this->fmgr->file_perms = $file_perms;
        }
        if ( $this_mode !== 'upgrade' ) {
            $db->logging = true;
            $ctx->logging = true;
            $ctx->log_path = $this->log_dir . DS;
            $db->log_path = $this->log_dir . DS;
        } else {
            $db->upgrader = true;
            $this->logging = false;
        }
        $db->max_queries = $this->max_queries;
        $db->persistent = $this->persistent;
        $db->max_packet = $this->max_packet;
        $db->caching = $this->db_caching;
        $db->use_buffer = $this->db_use_buffer;
        $db->can_reconnect = $this->db_can_reconnect;
        $db->stringify = $this->db_stringify;
        $db->insert_empty = $this->db_can_insert_empty;
        set_error_handler( [ $this, 'errorHandler'] );
        $db->prefix = DB_PREFIX;
        // Move to class PADO.
        $db->idxprefix = '<table>_';
        $db->colprefix = '<model>_';
        $db->id_column = 'id';
        $db->set_names = $this->set_names;
        $db->strict_offset = $this->strict_offset;
        $db->init();
        $db->register_callback( '__any__', 'save_filter', 'save_filter_obj', 100, $this );
        $db->register_callback( '__any__', 'post_save', 'flush_cache', 100, $this );
        $db->register_callback( '__any__', 'post_delete', 'flush_cache', 100, $this );
        $this->db = $db;
        $db->app = $this;
        $ctx->prefix = 'mt';
        $ctx->app = $this;
        $ctx->default_component = $this;
        $ctx->unify_breaks = $this->unify_breaks;
        $ctx->esc_trans = $this->esc_trans;
        $ctx->trim_tmpl = $this->trim_tmpl;
        $ctx->sethashvar_compat = $this->sethashvar_compat;
        $ctx->regex_compat = $this->regex_replace_compat;
        $ctx->keys_lower = $this->keys_lower;
        $ctx->cache_ttl = $this->ctx_cache_ttl;
        if ( $this->support_dir ) $this->support_dir = rtrim( $this->support_dir, DS );
        $cache_dir = $this->cache_dir;
        if (! $cache_dir ) {
            if ( $this->temp_dir != '/tmp' ) {
                $cache_dir = rtrim( $this->temp_dir, DS ) . DS
                           . 'com.alfasado.powercmsx' . DS . md5( __FILE__ );
            } else if ( $this->support_dir ) {
                $cache_dir = $this->support_dir . DS . 'cache';
            } else {
                $cache_dir = __DIR__ . DS . 'cache';
            }
        } else {
            $cache_dir = rtrim( $cache_dir, DS );
        }
        $cache_dir .= DS;
        $this->cache_dir = $cache_dir;
        if ( $this->cache_driver == 'File' ) {
            $this->cache_driver = null;
            $this->caching = true;
        } else {
            $drivers = ['Memcached', 'APCu', 'Redis', 'SQLite', 'MySQL'];
            if ( in_array( $this->cache_driver, $drivers ) ) {
                $apcu = $this->cache_driver === 'APCu' ? true : false;
                if ( $this->cache_driver === 'MySQL' ) {
                    // General error: MySQL server has gone away.
                    $this->query_cache = false;
                }
                require_once( LIB_DIR . 'Prototype' . DS . 'class.PTCache.php' );
                $this->cache_driver = new PTCache( $this, ['driver' => $this->cache_driver ] );
                $this->caching = true;
                $db->cache_driver = $this->cache_driver;
                if (! $apcu ) {
                    $ctx->cache_driver = $this->cache_driver;
                } else {
                    $ctx->cache_driver = 'File';
                    $pid = md5( __FILE__ );
                    if ( $this->query_cache && file_exists( $this->temp_dir . DS . $pid . '.pid' ) ) {
                        $db->clear_query();
                        $this->db = $db;
                        @unlink( $this->temp_dir . DS . $pid . '.pid' );
                    }
                }
            }
        }
        if (! is_dir( $cache_dir ) ) {
            $fmgr->mkpath( $cache_dir );
        }
        if (! is_dir( $this->temp_dir ) ) {
            $fmgr->mkpath( $this->temp_dir );
        }
        if ( $this->id === 'Worker' && $this->temp_dir !== $this->work_dir ) {
            if ( $this->work_dir === '/tmp' ) {
                $this->work_dir = $this->temp_dir;
            } else if (! is_dir( $this->work_dir ) ) {
                $fmgr->mkpath( $this->work_dir );
            }
        }
        set_include_path( get_include_path() . PATH_SEPARATOR . $cache_dir );
        $session_dir = $this->session_dir;
        if ( $session_dir ) {
            if (! is_dir( $session_dir ) ) {
                $fmgr->mkpath( $session_dir );
            }
            session_save_path( $session_dir );
        }
        if (! $this->support_dir ) $this->support_dir = __DIR__ . DS . 'support';
        if (!empty( $this->modifier_funcs ) ) {
            require_once( LIB_DIR . 'Prototype' . DS . 'modifier_blacklist.php' );
            $modifier_funcs = $this->modifier_funcs;
            foreach ( $modifier_funcs as $modifier => $function ) {
                if ( in_array( $function, $blacklist ) ) {
                    unset( $modifier_funcs[ $modifier ] );
                }
            }
            $ctx->modifier_funcs = array_merge( $ctx->modifier_funcs, $modifier_funcs );
        }
        if ( $paml_version && $this->tag_delimiter ) {
            $ctx->compatible = $this->tag_delimiter;
        }
        $ctx->init();
        if ( $this->db_caching || $this->query_cache ) {
            $db->json_cache = $this->caching;
            if ( $this->param( 'saved' ) ) {
                $db->query_cache = false;
            } else {
                $db->query_cache = $this->query_cache;
            }
            $db->not_cache = $this->not_cache;
            if ( !is_object( $this->cache_driver ) ) {
                if ( $db_cache_dir = $this->db_cache_dir ) {
                    $this->db_cache_dir = rtrim( $db_cache_dir, DS ) . DS;
                } else {
                    $db_cache_dir = $this->cache_dir . 'query_cache' . DS;
                    $this->db_cache_dir = $db_cache_dir;
                }
                $db->cache_dir = $db_cache_dir;
            }
        }
        require_once( LIB_DIR . 'Prototype' . DS . 'class.PTTags.php' );
        $core_tags = new PTTags;
        $ctx->extends_meth = [ $core_tags, 'hdlr_extends_meth'];
        require_once( LIB_DIR . 'Prototype' . DS . 'core_tags.php' );
        $ctx->force_compile = $this->force_compile;
        $ctx->build_compile = $this->build_compile;
        if (! $this->force_compile ) {
            if ( $compile_dir = $this->compile_dir ) {
                $this->compile_dir = rtrim( $compile_dir, DS ) . DS;
            } else {
                $compile_dir = $this->cache_dir . 'compile_cache' . DS;
                $this->compile_dir = $compile_dir;
            }
            if (! is_dir( $compile_dir ) ) {
                $fmgr->mkpath( $compile_dir );
            }
            $ctx->compile_dir = $compile_dir;
        }
        $this->cache_dir .= 'app_cache' . DS;
        $this->core_tags = $core_tags;
        $ctx->vars['this_mode'] = $this_mode;
        $ctx->vars['languages'] = $this->languages;
        $ctx->vars['request_method'] = $this->request_method;
        $ctx->vars['develop'] = $this->develop;
        $ctx->vars['app_version'] = $this->app_version;
        $ctx->vars['version'] = $this->version;
        $lang = $this->language;
        $ctx->language = $lang;
        $this->ctx = $ctx;
        self::$app = $this;
        $table = $this->installed ? [1] : $db->show_tables( 'table' );
        if ( $this->id == 'Prototype' && empty( $table )
            && $this_mode !== 'upgrade' && $this->request_method !== 'POST' ) {
            $this->clear_all_cache( false, false );
            $this->fmgr->rmdir( $this->compile_dir, true );
            $this->redirect( $this->admin_url . '?__mode=upgrade&_type=install' );
        }
        if ( $table ) {
            $this->installed = true;
        } else {
            $db->upgrader = true;
            $db->json_model = true;
        }
        if ( $this->installed === false && $this->id === 'Worker' ) {
            exit();
        }
        $request_id = $this->param( 'request_id' )
                    ? htmlspecialchars( $this->param( 'request_id' ) ) : $this->request_id;
        if (!$request_id && $this->installed ) {
            $request_id = $this->magic();
            $this->param( 'request_id', $request_id );
            $this->proc_id = $request_id;
        } else if ( $this->installed ) {
            $this->proc_id = $this->magic();
            $request_id = $this->proc_id;
        }
        $this->request_id = $request_id;
        $locale_dir = $this->locale_dir ? $this->locale_dir : __DIR__ . DS . 'locale';
        $this->locale_dir = $locale_dir;
        $locale__c = 'phrase' . DS . 'locale_default__c';
        $locale = $locale_dir . DS . 'default.json';
        $dict = $this->get_cache( $locale__c, null, false, filemtime( $locale ), true );
        if (! $dict ) {
            $dict = json_decode( file_get_contents( $locale ), true );
            $this->set_cache( $locale__c, $dict, true, true );
        }
        $this->dictionary['default'] = $dict ? $dict : [];
        if ( $this_mode !== 'upgrade' ) $this->is_login();
        $app_version = 0;
        $upgrade_count = null;
        array_unshift( $this->model_paths, LIB_DIR . 'PADO' . DS . 'models' );
        $this->db->models_dirs = $this->model_paths;
        if ( $table ) {
            $cfgs = $this->get_cache( 'app_configs__c', true );
            if (! $cfgs ) {
                $sth = $db->model( 'option' )->load_iter( ['kind' => 'config',
                                                       'workspace_id' => 0] , null, 'key,value,data' );
                $cfgs = $sth->fetchAll( PDO::FETCH_ASSOC );
                unset( $sth );
                $this->set_cache( 'app_configs__c', $cfgs, true );
            }
            list( $site_url, $site_path ) = ['', ''];
            $this->stash( 'configs', [] );
            $configs = [];
            foreach ( $cfgs as $idx => $cfg ) {
                $cfg = $db->model( 'option' )->new( $cfg );
                $key = $cfg->key;
                if ( $key === 'document_root' || $key === 'script_uri' ) continue;
                if ( $key === 'maintenance_setting' && $cfg->value ) {
                    if ( $this->php_sapi_name === 'cli' && $this->maintenance_setting === null ) {
                        echo $this->translate( 'We are currently undergoing system maintenance.' ), PHP_EOL;
                        exit();
                    }
                    $this->mode = 'maintenance_setting';
                    $this->maintenance_setting = true;
                    continue;
                }
                $configs[ $key ] = $cfg;
                $ctx->vars[ $key ] = ( $cfg->value !== '' && !$cfg->data )
                                   ? $cfg->value : $cfg->data;
                if ( $key !== 'app_version' && $key !== 'app_path' )
                     $this->$key = $cfg->value;
                if ( $key === 'administrator_ip' && $cfg->value ) {
                    $this->admin_protect = true;
                } else if ( $key === 'allowed_ip_only' && $cfg->value ) {
                    $this->ip_protect = true;
                } else if ( $key === 'timezone' && $cfg->value ) {
                    $this->date_default_timezone_set( $cfg->value );
                } else if ( $key === 'app_version' ) {
                    $app_version = $cfg->value;
                } else if ( $key === 'language' ) {
                    if ( in_array( $cfg->value, $this->languages ) ) {
                        $this->language = $this->sys_language = $cfg->value;
                    } else { // Invalid language.
                        $this->language = $this->sys_language = $ctx->vars[ $key ] = $cfg_language;
                        $cfg->value( $cfg_language );
                        $cfg->data();
                        $cfg->save();
                        $configs[ $key ] = $cfg;
                    }
                } else if ( $key === 'accept_comment' ) {
                    $this->accept_comment = $cfg->value;
                } else if ( $key === 'app_path' && ! $this->app_path ) {
                    $app_path = $cfg->value;
                    if ( $app_path === '//' ) $app_path = '/';
                    $this->app_path = $app_path;
                    if ( $this->id !== 'Prototype' ) $this->path = $app_path;
                    if ( $this->id === 'Prototype' &&
                        dirname( $_SERVER['SCRIPT_NAME'] ) . '/' != $app_path ) {
                        $this->app_path = null;
                    }
                    if (!$this->app_path && dirname( $_SERVER['SCRIPT_NAME'] ) == '/' ) {
                        $this->app_path = '/';
                    }
                }
            }
            if ( $this->id === 'Prototype' && $this->server_api === 'apache'
                && !$this->apache_version && stripos( $this->php_sapi_name, 'apache' ) !== false ) {
                $this->set_config( ['apache_version' => $this->apache_version() ] );
            }
            if (! isset( $configs['path'] ) && $this->id === 'Prototype' && $this->path ) {
                $this->set_config( ['path' => $this->path ] );
            } else if ( isset( $configs['path'] ) && $this->id === 'Prototype' && $this->cfg_path ) {
                if ( $this->path != $this->cfg_path ) {
                    $this->set_config( ['path' => $this->cfg_path ] );
                    $configs['path']->value( $this->cfg_path );
                }
            }
            $this->stash( 'configs', $configs );
        }
        if ( $this->verify_host && $this->php_sapi_name !== 'cli' ) {
            // Verify the HTTP_HOST header.
            $base = $_SERVER['HTTP_HOST'] ?? null;
            if ( $base === null ) $base = isset( $_SERVER['SERVER_NAME'] ) ?? null;
            $allowed_domains = $this->get_cache( 'allowed_domains__c', null, false, filemtime( __DIR__ . DS . 'config.json' ) );
            if (! $allowed_domains ) {
                $allowed_domains = [ parse_url( $this->site_url )['host'] => true];
                if ( $this->link_url ) {
                    $allowed_domains[ parse_url( $this->link_url )['host'] ] = true;
                }
                if ( $this->cfg_admin_url ) {
                    $allowed_domains[ parse_url( $this->cfg_admin_url )['host'] ] = true;
                }
                $workspaces = $db->model( 'workspace' )->load( null, null, 'site_url,link_url' );
                foreach ( $workspaces as $w ) {
                    $allowed_domains[ parse_url( $w->site_url )['host'] ] = true;
                    if ( $w->link_url ) {
                        $allowed_domains[ parse_url( $w->link_url )['host'] ] = true;
                    }
                }
                $allowed_domains = array_unique( array_merge( $this->allowed_domains, array_keys( $allowed_domains ) ) );
                $this->set_cache( 'allowed_domains__c', $allowed_domains, true );
            }
            if ( $this->installed ) {
                if (! $base || !in_array( $base, $allowed_domains ) ) {
                    header( $this->protocol . ' 400 Bad Request' );
                    echo '400 Bad Request';
                    exit();
                }
            }
        }
        if ( $this->immediate_lockout && $this->mode != 'logout' ) {
            $banned_ip = $this->banned_ip ? $this->banned_ip
                       : $this->db->model( 'remote_ip' )->get_by_key(
                         ['ip_address' => $this->remote_ip, 'class' => 'banned', null, 'id'] );
            $this->banned_ip = $banned_ip;
            if ( $banned_ip->id ) {
                $this->redirect( $this->script_uri . '?__mode=logout&_lockout=1&_type=ip' );
                exit();
            }
        }
        if (! $this->app_path && $this->installed && $this->id == 'Prototype' ) {
            $this->app_path = dirname( $_SERVER['SCRIPT_NAME'] ) . '/';
            $this->set_config( ['app_path' => $this->app_path ] );
        }
        if ( $this->installed && $this->id === 'Prototype'
            && $this->admin_url != $this->base . $this->request && isset( $configs['admin_url'] ) ) {
            // admin_url was changed
            unset( $configs['admin_url'] );
        }
        if (! isset( $configs['admin_url'] ) && $this->installed && $this->id === 'Prototype' ) {
            $admin_url = $this->base . $this->request;
            $this->set_config( ['admin_url' => $admin_url ] );
            $this->admin_url = $admin_url;
        }
        if ( $this->id == 'Worker' || $this->id == 'Bootstrapper' ) {
            $this->script_uri = $this->admin_url;
        }
        if ( $this->cfg_admin_url && $this->id == 'Prototype' ) {
            $ctx->vars['script_uri'] = $this->cfg_admin_url;
            $this->admin_url = $this->cfg_admin_url;
        } else {
            $ctx->vars['script_uri'] = $this->script_uri;
        }
        $ctx->vars['admin_url'] = $this->admin_url;
        $ctx->vars['prototype_path'] = $this->app_path ? $this->app_path : $this->path;
        $upgrader = new PTUpgrader;
        if ( $this->installed && $this->app_version > $app_version ) {
            $upgrader->version_up( $this, $app_version, $this->app_version );
            $app_version = $this->app_version;
            $ctx->vars['app_version'] = $app_version;
        }
        if ( $this->installed && ! $app_version ) {
            $this->set_config( ['app_version' => $this->app_version ] );
        }
        $sys_language = $this->language;
        if ( $this->image_quality > 100 ) $this->image_quality = 100;
        $ctx->vars['site_url'] = $this->site_url;
        $ctx->vars['site_path'] = $this->site_path;
        $ctx->allowed_paths[ $this->site_path ] = true;
        $this->components['core'] = $this;
        $dialog_view = $this->param( 'dialog_view' );
        if ( $this_mode != 'rebuild_phase' && $this_mode != 'preview' && $this->id == 'Prototype' ) {
            $ctx->vars['panel_width'] = (int) $this->panel_width;
            if (! $dialog_view ) {
                require_once( LIB_DIR . 'Prototype' . DS . 'core_menus.php' );
            }
            require_once( LIB_DIR . 'Prototype' . DS . 'core_validation_types.php' );
        }
        if (! empty( $this->tmpl_paths ) ) {
            $this->template_paths = array_merge( $this->tmpl_paths, $this->template_paths );
        }
        // Don't use caches when cache_driver is not File.
        $incl_cache = !$this->cache_driver ? $this->get_cache( 'tmpl' . DS . 'has_include' ) : null;
        if (! $this->develop && $incl_cache && is_array( $incl_cache ) ) {
            $this->has_include = $incl_cache;
            $this->has_include['Path Cached'] = true;
        } else {
            foreach ( $this->template_paths as $tmpl_path ) {
                if ( is_dir( rtrim( $tmpl_path, DS ) . DS . 'include' ) ) {
                    $this->has_include[] = rtrim( $tmpl_path, DS );
                }
            }
        }
        if (!$incl_cache && !$this->cache_driver ) {
            $this->set_cache( 'tmpl' . DS . 'has_include', $this->has_include );
        }
        if ( $table && $this->use_plugin ) {
            if ( $this->theme_plugin || $this->theme_model ) {
                $themes_plugin_dirs = !$this->cache_driver ? $this->get_cache( 'themes_plugin_dirs__c' ) : null;
                $themes_model_dirs  = !$this->cache_driver ? $this->get_cache( 'themes_model_dirs__c' ) : null;
                if ( $themes_plugin_dirs === null || $themes_model_dirs === null ) {
                    $themes_plugin_dirs = [];
                    $themes_model_dirs = [];
                    $themes = $this->db->model( 'option' )->load_iter( ['key' => 'theme', 'kind' => 'config'], null, 'data' );
                    $themes = array_unique( $themes->fetchAll( PDO::FETCH_COLUMN ) );
                    if (!empty( $themes ) ) {
                        foreach ( $themes as $theme ) {
                            if ( $theme && is_dir( $theme . DS . 'plugins' ) ) {
                                $themes_plugin_dirs[] = $theme . DS . 'plugins';
                            }
                            if ( $theme && is_dir( $theme . DS . 'models' ) ) {
                                $themes_model_dirs[] = $theme . DS . 'models';
                            }
                        }
                    }
                    if ( !$this->cache_driver ) {
                        $this->set_cache( 'themes_plugin_dirs__c', $themes_plugin_dirs );
                        $this->set_cache( 'themes_model_dirs__c', $themes_model_dirs );
                    }
                }
                if ( $this->theme_plugin && !empty( $themes_plugin_dirs ) ) {
                    $this->plugin_paths = array_merge( $this->plugin_paths, $themes_plugin_dirs );
                }
                if ( $this->theme_model && !empty( $themes_model_dirs ) ) {
                    $this->model_paths = array_merge( $this->model_paths, $themes_model_dirs );
                    $this->db->models_dirs = $this->model_paths;
                }
            }
            if ( ( $plugin_d = __DIR__ . DS . 'plugins' ) && is_dir( $plugin_d ) )
                $this->plugin_paths[] = $plugin_d;
            $this->init_plugins();
        }
        $this->cfg_init_tags = $this->init_tags;
        if ( $this->init_tags === true ) {
            $this->init_tags = false;
            $core_tags->init_tags();
        }
        if ( $http_proxy = $this->http_proxy ) {
            $http_proxy = preg_replace( '!^[^:]+://!', '', $http_proxy );
            stream_context_set_default( [
                'http' => [
                    'proxy' => $http_proxy,
                    'request_fulluri' => $this->http_request_fulluri ? true : false,
                ],
            ] );
        }
        if ( $this->remove4byte && $this->php_sapi_name !== 'cli' ) {
            require_once( LIB_DIR . 'Prototype' . DS . 'remove-4byte-characters.php' );
        }
        if ( isset( $_FILES ) && ! empty( $_FILES ) ) {
            require_once( LIB_DIR . 'Prototype' . DS . 'sanitize-upload-filenames.php' );
            if ( ( $this->max_image_pixel > 0 ) || $this->auto_orient || $this->remove_exif ) {
                require_once( LIB_DIR . 'Prototype' . DS . 'upload-image-resize.php' );
            }
        }
        $models_dirs = $this->db->models_dirs;
        $path_keys = array_map( 'strlen', $models_dirs );
        array_multisort( $path_keys, SORT_DESC, $models_dirs );
        $this->db->models_dirs = $models_dirs;
        $this->update_ctx_include_paths( $ctx );
        $ctx->vars['user_language'] = $this->language;
        if ( $this->debug ) {
            error_reporting( E_ALL );
            $db->debug = 4;
        }
        if ( $this->installed && $user = $this->user() ) {
            $status_published = $this->status_published( $user->_model );
            if ( $user->status != $status_published || $user->lock_out ) {
                return $this->logout();
            }
            if ( $user->is_superuser ) {
                if (!$this->debug && $user->debug ) {
                    $this->debug = true;
                    error_reporting( E_ALL );
                    $db->debug = 4;
                }
                if ( $user->develop ) {
                    $this->develop = true;
                    $ctx->vars['develop'] = true;
                }
            }
            $encrypt_key = PADO_DB_PASSWORD . $user->password;
            if ( $this->user_session ) {
                $encrypt_key .= $this->user_session->name . $this->user_session->id;
            }
            $this->encrypt_key = hash( 'sha256', $encrypt_key );
            $this->language = $user->language;
            $ctx->vars['user_language'] = $this->language;
            $ctx->vars['user_control_border'] = $user->control_border ? $user->control_border : '#7F9DB9';
            $ctx->vars['user_fix_spacebar'] = $user->fix_spacebar;
            $ctx->vars['user_stickey_buttons'] = $user->sticky_buttons;
            $ctx->vars['user_color_the_selector'] = $user->color_the_selector;
            if ( $this->id === 'Prototype' ) {
                if ( $this->admin_protect ) {
                    if ( $user->is_superuser ) {
                        $ip = $db->model( 'remote_ip' )->get_by_key(
                            ['ip_address' => $this->remote_ip, 'class' => 'administrator' ] );
                        if (! $ip->id ) {
                            if ( $this_mode == 'logout' ) $this->logout();
                            return $this->redirect(
                                $this->admin_url . '?__mode=logout&_type=admin_ip' );
                        }
                    }
                }
                if ( $this->ip_protect ) {
                    $ip = $db->model( 'remote_ip' )->get_by_key(
                        ['ip_address' => $this->remote_ip,
                            'class' => ['IN' => ['administrator', 'allow'] ] ] );
                    if (! $ip->id ) {
                        if ( $this_mode == 'logout' ) $this->logout();
                        return $this->redirect(
                            $this->admin_url . '?__mode=logout&_type=not_allowed_ip' );
                    }
                }
            }
            $system = $this->db->model( 'workspace' )->new( ['id' => 0] );
            if ( $this->can_do( 'manage_plugins', null, null, $system ) ) {
                $upgrade_count = $upgrader->upgrade_scheme_check( $this );
                if ( $upgrade_count ) {
                    $ctx->vars['scheme_upgrade_count'] = $upgrade_count;
                }
                $plugin_class = new PTPlugin;
                $upgrade_count = $plugin_class->upgrade_plugin_check( $this );
                if ( $upgrade_count ) {
                    $ctx->vars['plugin_upgrade_count'] = $upgrade_count;
                }
            }
        }
        if ( $lang = $this->language ) {
            $ctx->language = $lang;
            $this->ctx = $ctx;
            $this->set_language( $locale_dir, $lang );
            if ( $lang != $sys_language ) {
                $this->set_language( $locale_dir, $sys_language );
            }
        }
        $workspace = $this->workspace();
        if ( $workspace && $workspace->language !== $sys_language ) {
            $this->set_language( $locale_dir, $workspace->language );
        }
        if ( $this->use_timezone && $workspace && $workspace->timezone
            && $workspace->timezone !== $this->timezone ) {
            $this->date_default_timezone_set( $workspace->timezone );
        }
        if ( $this->allow_include ) {
            $ctx->include_paths[ $this->site_path ] = true;
            if ( $workspace ) {
                $ctx->include_paths[ $workspace->site_path ] = true;
            }
        }
        if ( !$this->maintenance_setting && $this->mode !== 'maintenance_setting' ) {
            $session = $this->db->model( 'session' )->new( ['name' => $request_id, 'kind' => 'PR', 'key' => $this->id ] );
            $session->expires( $this->request_time + $this->worker_period );
            if ( isset( $_SERVER['REDIRECT_URL'] ) ) {
                $session->text( $_SERVER['REDIRECT_URL'] );
            } else if ( $this->php_sapi_name === 'cli' ) {
                $session->text( implode( ' ', $GLOBALS['argv'] ) );
            } else {
                $session->text( $this->mode );
            }
            $session->value( getmypid() );
            $session->data( $this->query_string( true, true ) );
            if ( $workspace ) {
                $session->workspace_id( $workspace->id );
            } else {
                $session->workspace_id( 0 );
            }
            if ( $this->user() ) {
                $session->user_id( $this->user()->id );
            }
            $session->save();
            $this->proc_session = $session;
        }
        $path_keys = array_map( 'strlen', array_keys( $ctx->template_paths ) );
        array_multisort( $path_keys, SORT_DESC, $ctx->template_paths );
        $path_keys = array_map( 'strlen', array_keys( $ctx->include_paths ) );
        array_multisort( $path_keys, SORT_DESC, $ctx->include_paths );
        $this->template_paths = array_keys( $ctx->include_paths );
        if (! empty( $this->hooks ) ) {
            $this->run_hooks( 'post_init' );
        }
        if ( $this->allowed_exts === '' ) {
            $mime_types = PTUtil::mime_types();
            $mime_types[''] = true;
            unset( $mime_types['php'] );
            $allowed_exts = array_keys( $mime_types );
            $this->allowed_exts = implode( ',', $allowed_exts );
        } else if ( $this->allowed_exts ) {
            $this->allowed_exts = strtolower( $this->allowed_exts );
        }
        $this->denied_exts = strtolower( $this->denied_exts );
        if ( $this->imagick_convert_path || function_exists( 'imagecreatefromwebp' ) ) {
            $this->images[] = 'webp';
        }
        $this->fmgr->app = $this;
        self::$app = $this;
        $GLOBALS['_APP'] = $this;
    }

    function set_language ( $locale_dir = null, $lang = 'ja' ) {
        if ( $lang && !in_array( $lang, $this->languages ) ) {
            $lang = 'ja';
        }
        $locale_dir = $locale_dir ? $locale_dir : __DIR__ . DS . 'locale';
        $locale = $locale_dir . DS . $lang . '.json';
        $locale__c = 'phrase' . DS . "locale_{$lang}__c";
        $dict = $this->get_cache( $locale__c );
        if (!$dict ) {
            if ( file_exists( $locale ) ) {
                $dict = json_decode( file_get_contents( $locale ), true );
                $this->dictionary[ $lang ] = $dict;
            }
            if ( $this->mode !== 'upgrade' ) {
                $dictionary =& $this->dictionary;
                $phrases = $this->db->model( 'phrase' )->load_iter( ['lang' => $lang ],
                                    null, 'phrase,trans' );
                if ( is_array( $dict ) ) {
                    $dict = array_merge( $dict, $phrases->fetchAll( PDO::FETCH_KEY_PAIR ) );
                } else {
                    $dict = $phrases->fetchAll( PDO::FETCH_KEY_PAIR );
                }
                unset( $phrases );
                $this->set_cache( $locale__c, $dict, true );
            }
        }
        $this->dictionary[ $lang ] = $dict ? $dict : [];
        return $this->dictionary;
    }

    function init_plugins () {
        if ( $this->init_plugins ) return;
        $settings = $this->get_cache( 'init_plugins__c', 'option', true );
        if (! $settings ) {
            $settings = $this->db->model( 'option' )->load( ['kind' => 'plugin', 'number' => 1] );
            $this->set_cache( 'init_plugins__c', $settings, true );
        }
        $plugin_objs = [];
        foreach ( $settings as $setting ) {
            $plugin_objs[ $setting->key ] = $setting;
        }
        $plugin_paths = $this->plugin_paths;
        $plugin_dirs = [];
        foreach ( $plugin_paths as $dir ) {
            if (! is_dir( $dir ) ) continue;
            $items = scandir( $dir, $this->plugin_order );
            foreach ( $items as $plugin ) {
                if ( strpos( $plugin, '.' ) === 0 ) continue;
                $component = strtolower( $plugin );
                if ( isset( $plugin_dirs[ $component ] ) ) continue;
                if (! isset( $plugin_objs[ $component ] ) && $this->mode != 'manage_plugins' ) {
                    continue;
                }
                $plugin_dirs[ $component ] = true;
                $plugin = $dir . DS . $plugin;
                if (! is_dir( $plugin ) ) continue;
                $_plugin = $plugin . DS . 'config.json';
                if (! file_exists( $_plugin ) ) continue;
                $php_classes = [];
                $register = false;
                list( $cache_id, $cached, $r ) = [ null, false, null ];
                if ( $this->caching ) {
                    $cache_id = 'component' . DS . 'config_' . md5( $_plugin );
                    $r = $this->get_cache( $cache_id, null, false, filemtime( $_plugin ), true );
                }
                if (! $r ) {
                    $r = json_decode( file_get_contents( $_plugin ), true );
                } else {
                    $cached = true;
                }
                if (! is_array( $r ) ) continue;
                if ( $cache_id && ! $cached ) {
                    $this->set_cache( $cache_id, $r, false, true );
                }
                if (! isset( $plugin_objs[ $component ] ) ) {
                    $obj = $this->db->model( 'option' )->get_by_key(
                        ['kind' => 'plugin', 'key' => $component ], null, 'id,key,value,number,kind' );
                    if (! $obj->id ) {
                        $obj->number( 0 );
                    }
                    $plugin_objs[ $component ] = $obj;
                }
                $r['plugin_path'] = dirname( $_plugin );
                $this->plugin_configs[ $component ] = $r;
                $setting = $plugin_objs[ $component ];
                $this->cfg_settings[ $component ] = $r;
                if ( $setting->number ) {
                    $this->configure_from_json( $_plugin, $r, false );
                    $register = true;
                }
                $plugins = scandir( $plugin, $this->plugin_order );
                foreach ( $plugins as $f ) {
                    if ( strpos( $f, '.' ) === 0 ) continue;
                    $_plugin = $plugin . DS . $f;
                    $extension = PTUtil::get_extension( $f );
                    if ( $extension === 'php' && ( $register || $this->mode == 'manage_plugins'
                        || $this->mode == 'view_plugin_doc' ) ) {
                        $php_classes[] = $_plugin;
                        if ( is_dir( $plugin . DS . 'models' ) ) {
                            $this->db->models_dirs[] = $plugin . DS . 'models';
                        }
                    }
                }
                foreach ( $php_classes as $_plugin ) {
                    if(!$component ) $component = strtolower( basename( $_plugin ) );
                    $this->class_paths[ $component ] = $_plugin;
                }
                if ( $register ) {
                    $this->plugin_dirs[] = $plugin;
                    if ( is_dir( $plugin . DS . 'tmpl' ) ) {
                        $this->template_paths[] = $plugin . DS . 'tmpl';
                        if (! isset( $this->has_include['Path Cached'] ) ) {
                            if ( is_dir( $plugin . DS . 'tmpl' . DS . 'include' ) ) {
                                $this->has_include[] = $plugin . DS . 'tmpl';
                            }
                        }
                    }
                    if ( is_dir( $plugin . DS . 'alt-tmpl' ) ) {
                        $this->template_paths[] = $plugin . DS . 'alt-tmpl';
                        if (! isset( $this->has_include['Path Cached'] ) ) {
                            if ( is_dir( $plugin . DS . 'alt-tmpl' . DS . 'include' ) ) {
                                $this->has_include[] = $plugin . DS . 'alt-tmpl';
                            }
                        }
                    }
                }
            }
        }
        $this->plugin_switch = $plugin_objs;
        // registry hooks and tags.
        $registry = $this->registry;
        if ( isset( $registry['hooks'] ) ) {
            $hooks = $registry['hooks'];
            $plugin_hooks = [];
            foreach ( $hooks as $key => $hook ) {
                $event = key( $hook );
                $regi = $hook[ $event ];
                $priority = isset( $regi['priority'] ) ? (int) $regi['priority'] : 5;
                $event_hooks = isset( $plugin_hooks[ $event ] )
                    ? $plugin_hooks[ $event ] : [];
                $event_hooks[ $priority ] = isset( $event_hooks[ $priority ] )
                                          ? $event_hooks[ $priority ] : [];
                unset( $regi['priority'] );
                $event_hooks[ $priority ][] = $regi;
                $plugin_hooks[ $event ] = $event_hooks;
            }
            $this->hooks = $plugin_hooks;
        }
        $ctx = $this->ctx;
        if ( isset( $registry['tags'] ) ) {
            $tags = $registry['tags'];
            foreach ( $tags as $kind => $props ) {
                foreach ( $props as $tag => $func ) {
                    $component = $this->component( $func['component'] );
                    $method = $func['method'];
                    if ( $component && method_exists( $component, $method ) ) {
                        $ctx->register_tag( $tag, $kind, $method, $component );
                        $this->plugins_tags[ $tag ] = $func;
                    }
                }
            }
        }
        $this->init_plugins = true;
        $this->update_ctx_include_paths( $ctx );
        if (! empty( $this->hooks ) ) $this->run_hooks( 'start_app' );
    }

    function update_ctx_include_paths ( $ctx ) {
        foreach ( $this->template_paths as $tmpl_dir ) {
            $ctx->include_paths[ $tmpl_dir ] = true;
        }
    }

    function configure_from_json ( $file, $r = null, $cfg_ow = true ) {
        $r = $r !== null ? $r : json_decode( file_get_contents( $file ), true );
        if (! is_array( $r ) ) return [];
        if ( isset( $r['component'] ) && isset( $r['version'] ) ) {
            $this->versions[ strtolower( $r['component'] ) ] = $r['version'];
        }
        foreach ( $r as $key => $methods ) {
            if ( $key === 'settings' ) continue;
            if ( $key === 'config_settings' || $key === 'config_overwrite' ) {
                foreach ( $methods as $cfg => $setting ) {
                    $property_exists = PTUtil::property_exists( $this, $cfg );
                    if (! $cfg_ow && $property_exists && $key === 'config_settings' ) {
                        continue;
                    } else if ( property_exists( $this, $cfg ) ) {
                        $this->$cfg = $setting;
                    } else {
                        $this->properties[ $cfg ] = $setting;
                    }
                }
            } else if ( $key === 'version' ) {
                if ( isset( $r['component'] ) ) {
                    $this->versions[ $r['component'] ] = $methods;
                }
            } else if ( $key === 'widgets' && $this->mode == 'dashboard' ) {
                if (! isset( $this->registry['widgets'] ) ) {
                    $this->registry['widgets'] = [];
                }
                foreach ( $methods as $widget => $prop ) {
                    if (! in_array( $widget, $this->registry['widgets'] ) ) {
                        $this->registry['widgets'][ $widget ] = $prop;
                    }
                }
            } else if ( is_array( $methods ) ) {
                if ( $key === 'tags' ) {
                    foreach ( $methods as $kind => $props ) {
                        foreach ( $props as $tag => $prop ) {
                            $this->registry['tags'][ $kind ][ $tag ] = $prop;
                        }
                    }
                } else {
                    foreach ( $methods as $meth => $prop ) {
                        if ( $key === 'api_methods' ) {
                            foreach ( $prop as $name => $api_method ) {
                                $this->registry[ $key ][ $meth ][ $name ] = $api_method;
                            }
                        } else {
                            $this->registry[ $key ][ $meth ] = $prop;
                        }
                    }
                }
            }
        }
        return $r;
    }

    function init_callbacks ( $model, $action ) {
        $app = $this;
        if (! is_string( $model ) ||! is_string( $action ) ) {
            return;
        }
        if ( isset( $app->registered_callbacks[ $model ][ $action ] ) ) return;
        $app->registered_callbacks[ $model ][ $action ] = true;
        $registry = $app->registry;
        $callbacks = isset( $registry['callbacks'] ) ? $registry['callbacks'] : [];
        if (! isset( $callbacks ) ) return;
        $components = $app->class_paths;
        foreach ( $callbacks as $callback ) {
            $_model = key( $callback );
            if ( $_model !== $model ) continue;
            $callback = $callback[ $model ];
            if ( strpos( key( $callback ), $action ) !== false ) {
                $kind = key( $callback );
                $callback = $callback[ $kind ];
                $component_name = strtolower( $callback['component'] );
                if ( isset( $components[ $component_name ] ) ) {
                    $_plugin = $components[ $component_name ];
                    $plugin = $callback['component'];
                    if (!class_exists( $plugin, false ) ) 
                        if (!include_once( $_plugin ) )
                            trigger_error( "Plugin '{$_plugin}' load failed!" );
                    if ( class_exists( $plugin, false ) ) {
                        $component = isset( $app->components[ strtolower( $plugin ) ] )
                                   ? $app->components[ strtolower( $plugin ) ]
                                   : new $plugin();
                        $app->components[ strtolower( $plugin ) ] = $component;
                        if (!isset( $callback['priority'] ) ) $callback['priority'] = 5;
                        $app->register_callback( $model, $kind, $callback['method'],
                                                 $callback['priority'], $component );
                    }
                }
            }
        }
    }

    function path () {
        return __DIR__;
    }

    function run () {
        $app = $this;
        $ctx = $app->ctx;
        try {
            if ( $app->mode === 'upgrade' ) {
                $upgrader = new PTUpgrader;
                return $upgrader->upgrade();
            }
            $mode = $app->mode;
            $registry = $app->registry;
            if (! empty( $app->hooks ) ) {
                $app->run_hooks( 'pre_run' );
            }
            $workspace_id = null;
            $workspace = $app->workspace();
            if ( $workspace ) {
                $workspace_id = $workspace->id;
                $app->workspace_id = (int) $workspace_id;
                $ctx->stash( 'workspace', $workspace );
                $ctx->vars['workspace_scope'] = 1;
                $ctx->vars['workspace_url'] = $workspace->site_url;
                $ws_values = $workspace->get_values();
                foreach ( $ws_values as $ws_key => $ws_val ) {
                    $ctx->vars[ $ws_key ] = $ws_val;
                }
                $app->accept_comment = $workspace->accept_comment;
            }
            if ( $app->id === 'Prototype' && $app->disallow_pwd_login ) {
                if ( $mode === 'login' || $mode === 'start_recover' || $mode === 'recover_password' ) {
                    return $this->error( 'Invalid request.' );
                }
            }
            if ( $app->request_method === 'POST' ) {
                $ctx->vars['header_alert_message'] = $app->param( 'header_alert_message' );
                $ctx->vars['error'] = $app->param( 'header_error_message' );
            }
            $user = $app->user();
            if ( $mode != 'rebuild_phase' ) {
                if ( isset( $app->registry['menus'] ) ) {
                    $menus = $app->registry['menus'];
                    PTUtil::sort_by_order( $menus );
                    $system_menus = [];
                    $workspace_menus = [];
                    $_system = $app->db->model( 'workspace' )->new( ['id' => 0] );
                    foreach ( $menus as $menu ) {
                        $component = $app->component( $menu['component'] );
                        $permission = isset( $menu['permission'] )
                                    && $menu['permission'] ? $menu['permission'] : null;
                        $label = $app->translate( $menu['label'], null, $component );
                        $item = ['menu_label' => $label, 'menu_mode' => $menu['mode'] ];
                        if ( isset( $menu['args'] ) ) {
                            $item['menu_args'] = $menu['args'];
                        }
                        if ( isset( $menu['target'] ) ) {
                            $item['menu_target'] = $menu['target'];
                        } else {
                            $item['menu_target'] = false;
                        }
                        if ( isset( $menu['display_system'] ) ) {
                            $can_do = false;
                            if ( $permission && is_string( $permission ) ) {
                                $can_do = $app->can_do( $permission, null, null, $_system );
                            } else if ( $permission && is_array( $permission ) ) {
                                $can_not_do = false;
                                foreach ( $permission as $perm ) {
                                    if (! $app->can_do( $perm, null, null, $_system ) ) {
                                        $can_not_do = true;
                                        break;
                                    }
                                }
                                $can_do = $can_not_do === false;
                            } else if ( $permission === null ) {
                                $can_do = true;
                            }
                            if ( $can_do ) {
                                $cond = true;
                                if ( isset( $menu['condition'] ) ) {
                                    $meth = $menu['condition'];
                                    if ( $component && method_exists( $component, $meth ) ) {
                                        $cond = $component->$meth( $app, null, $menu );
                                    }
                                }
                                if ( $cond ) $system_menus[] = $item;
                            }
                        }
                        if ( $workspace && isset( $menu['display_space'] ) ) {
                            $can_do = false;
                            if ( $permission && is_string( $permission ) ) {
                                $can_do = $app->can_do( $permission, null, null, $workspace );
                            } else if ( $permission && is_array( $permission ) ) {
                                $can_not_do = false;
                                foreach ( $permission as $perm ) {
                                    if (! $app->can_do( $perm, null, null, $workspace ) ) {
                                        $can_not_do = true;
                                        break;
                                    }
                                }
                                $can_do = $can_not_do === false;
                            } else if (! $permission ) {
                                $can_do = true;
                            }
                            if ( $can_do ) {
                                $cond = true;
                                if ( $workspace && isset( $menu['condition'] ) ) {
                                    $meth = $menu['condition'];
                                    if ( $component && method_exists( $component, $meth ) ) {
                                        $cond = $component->$meth( $app, $workspace, $menu );
                                    }
                                }
                                if ( $cond ) $workspace_menus[] = $item;
                            }
                        }
                    }
                    $ctx->vars['system_menus'] = $system_menus;
                    $ctx->vars['workspace_menus'] = $workspace_menus;
                }
                if ( $user ) {
                    $ctx->vars['user_name'] = $user->name;
                    $ctx->vars['user_nickname'] = $user->nickname;
                    $ctx->vars['user_id'] = $user->id;
                    $ctx->vars['user_email'] = $user->email;
                    $ctx->vars['user_space_order'] = $user->space_order;
                    $ctx->vars['user_text_format'] = $user->text_format;
                    if ( $app->id == 'Prototype' &&
                        !$app->param( 'dialog_view' ) && $mode !== 'rebuild_phase' ) {
                        $icon = $app->db->model( 'meta' )->get_by_key( ['model' => 'user',
                          'object_id' => $user->id, 'key' => 'photo', 'kind' => 'metadata'], [], 'id' );
                        if ( $icon->id )
                            $ctx->vars['user_photo'] = $app->admin_url
                                              . '?__mode=get_thumbnail&amp;square=1&amp;id=' . $icon->id;
                        if (!$app->param( 'workspace_id' ) && $mode == 'dashboard' && $app->can_rebuild_all ) {
                            $sql = "SELECT DISTINCT urlmapping_workspace_id FROM {$app->db->prefix}urlmapping";
                            $group = $app->db->query( $sql, PDO::FETCH_COLUMN, 'urlmapping' );
                            $rebuild_perms = 0;
                            foreach ( $group as $data ) {
                                $scope = $data
                                       ? $app->db->model( 'workspace' )->load( $data )
                                       : $app->db->model( 'workspace' )->new( ['id' => 0] );
                                if ( $app->can_do( 'can_rebuild', null, null, $scope ) ) {
                                    $rebuild_perms++;
                                }
                                if ( $rebuild_perms > 1 ) {
                                    $ctx->vars['can_rebuild_all'] = true;
                                    break;
                                }
                            }
                        }
                    }
                }
                if ( isset( $registry['methods'] ) && isset( $registry['methods'][ $mode ] ) ) {
                    $meth = $registry['methods'][ $mode ];
                    $plugin = $meth['component'];
                    $method = $meth['method'];
                    $requires_login = isset( $meth['requires_login'] )
                        ? $meth['requires_login'] : true;
                    if ( $requires_login && ! $app->is_login() ) {
                        return $app->__mode( 'login' );
                    }
                    if ( isset( $meth['application'] )
                        && strtolower( $meth['application'] ) !== strtolower( $this->id ) ) {
                        exit();
                    }
                    $component = $app->component( $plugin );
                    if (!$component ) $component = $app->autoload_component( $plugin );
                    if ( method_exists( $component, $method ) ) {
                        if ( isset( $meth['permission'] ) && $meth['permission'] ) {
                            if (!$app->can_do( $meth['permission'],
                                                null, null, $workspace ) ) {
                                $app->error( 'Permission denied.' );
                            }
                        }
                        return $component->$method( $app );
                    }
                }
            }
            $screen_id = $app->param( '_screen_id' );
            $app->screen_id = $screen_id;
            if (! empty( $app->hooks ) ) {
                $app->run_hooks( 'start_mode' );
            }
            if ( $mode !== 'start_recover' 
                 && $mode !== 'recover_password' && ! $app->is_login() )
                return $app->__mode( 'login' );
            if ( $model = $app->param( '_model' ) ) {
                $table = $app->get_table( $model );
            }
            if ( $workspace ) {
                if ( $user && !$user->is_superuser ) {
                    $permissions = array_keys( $app->permissions() );
                    if (! in_array( $workspace_id, $permissions ) ) {
                        if ( $mode === 'view' && $app->param( '_type' ) === 'list' && $app->param( 'dialog_view' ) ) {
                        } else {
                            $app->return_to_dashboard( ['permission' => 1], true );
                        }
                    }
                }
            }
            if ( isset( $table ) ) {
                if ( $workspace ) {
                    $ctx->vars['workspace_scope'] = $table->space_child;
                    $app->workspace_param = '&workspace_id=' . $workspace_id;
                }
                if ( $table->space_child ) {
                    $ctx->vars['child_model'] = 1;
                }
            }
            $params = $app->param();
            unset( $params['workspace_id'], $params['permission'], $params['id'],
                   $params['saved'], $params['deleted'], $params['saved_props'],
                   $params['apply_actions'] );
            $ctx->vars['query_string'] = http_build_query( $params );
            $ctx->vars['raw_query_string'] = $app->query_string( true );
            if ( $return_args = $app->param( 'return_args' ) ) {
                parse_str( $return_args, $app->return_args );
            }
            if ( in_array( $mode, $app->methods ) ) {
                return $app->$mode( $app );
            }
            return $app->__mode( $mode );
        } catch ( Exception $e ) {
            $errstr = $e->getMessage();
            if ( $app->txn_active ) {
                return $app->rollback( $errstr );
            } else {
                return $app->error( $errstr );
            }
        }
    }

    function autoload_component ( $class_name ) {
        $app = $this;
        if ( $component = $app->component( $class_name ) ) {
            return $component;
        } 
        $components = $app->class_paths;
        if ( isset( $components[ strtolower( $class_name ) ] ) ) {
            $_component = $components[ strtolower( $class_name ) ];
            if (! class_exists( $class_name, false ) && is_readable( $_component ) ) 
                include_once( $_component );
            if ( class_exists( $class_name, false ) ) {
                $component = new $class_name();
                $app->components[ strtolower( $class_name ) ] = $component;
                return $component;
            }
        }
        $plugin_paths = $app->plugin_paths;
        $class_name_lower = strtolower( $class_name );
        foreach ( $plugin_paths as $dir ) {
            if (! is_dir( $dir ) ) continue;
            $items = scandir( $dir, $this->plugin_order );
            foreach ( $items as $plugin ) {
                if ( strpos( $plugin, '.' ) === 0 ) continue;
                $component = strtolower( $plugin );
                if ( $class_name_lower === $component ) {
                    $_component = $dir . DS . $plugin . DS . $plugin . '.php';
                    if ( is_readable( $_component ) ) {
                        include_once( $_component );
                    }
                    $component = new $class_name();
                    $app->components[ strtolower( $class_name ) ] = $component;
                    return $component;
                }
            }
        }
    }

    function component ( $component ) {
        if ( is_object( $component ) ) return $component;
        $components = $this->components;
        if ( isset( $components[ strtolower( $component ) ] ) ) {
            return $components[ strtolower( $component ) ];
        }
        $component_paths = $this->class_paths;
        if ( isset( $component_paths[ strtolower( $component ) ] ) ) {
            $_plugin = $component_paths[ strtolower( $component ) ];
            if (! class_exists( $component, false ) ) include_once( $_plugin );
            if ( class_exists( $component, false ) ) {
                $class = new $component();
                $this->components[ strtolower( $component ) ] = $class;
                return $class;
            }
        }
        foreach ( $components as $class ) {
            if ( is_object( $class ) ) {
                if ( strtolower( get_class( $class ) ) == strtolower( $component ) ) {
                    $this->components[ strtolower( $component ) ] = $class;
                    return $class;
                }
            } else if ( strtolower( $class ) == strtolower( $component ) ) {
                if ( isset( $components[ $class ] ) ) {
                    $class = $components[ $class ];
                    $this->components[ strtolower( $component ) ] = $class;
                    return $class;
                } else {
                    return null;
                }
            }
        }
        if ( class_exists( $component, false ) ) {
            $class = new $component();
            $this->components[ strtolower( $component ) ] = $class;
            return $class;
        }
        if ( strpos( $component, 'PT' ) === 0 ) {
            $lib_dir = LIB_DIR . 'Prototype' . DS;
            if ( file_exists( "{$lib_dir}class.{$component}.php" ) ) {
                $this->components[ strtolower( $component ) ] = new $component();
                return $this->components[ strtolower( $component ) ];
            }
        }
        return null;
    }

    function register_callback ( $model, $kind, $meth, $priority, $obj = null ) {
        if (!$priority ) $priority = 5;
        $this->callbacks[ $kind ][ $model ][ $priority ][] = [ $meth, $obj ];
    }

    function have_method () {
        $r = $this->registry;
        if ( isset( $r['methods'] ) && isset( $r['methods'][ $this->mode ] ) ) {
            $r = $r['methods'][ $this->mode ];
            if ( isset( $r['application'] ) ) {
                if ( strtolower( $r['application'] ) === strtolower( $this->id ) ) {
                    return true;
                }
            } else if ( $this->id == 'Prototype' ) {
                return true;
            }
        }
        return false;
    }

    function get_registries ( $model, $name, &$registries = [] ) {
        $app = $this;
        $registry = $app->registry;
        $current_scope = $app->workspace() ? 'workspace' : 'system';
        $plugin_registries = [];
        if ( isset( $registry[ $name ] ) ) {
            $_registries = $registry[ $name ];
            foreach ( $_registries as $props ) {
                $registry_model = key( $props );
                if ( $model != $registry_model ) continue;
                $method = $props[ $model ];
                $prop = $method[ key( $method ) ];
                $order = isset( $prop['order'] ) ? $prop['order'] : 5;
                $order = (int) $order;
                $scope = isset( $prop['scope'] ) ? $prop['scope'] : null;
                if ( $scope ) {
                    if ( is_array( $scope ) && ! in_array( $current_scope, $scope ) ) {
                        continue;
                    } else if ( is_string( $scope ) && $scope != $current_scope ) {
                        continue;
                    }
                }
                $methods = isset( $plugin_registries[ $order ] )
                         ? $plugin_registries[ $order ] : [];
                $methods[] = $method;
                $plugin_registries[ $order ] = $methods;
            }
        }
        if (! empty( $plugin_registries ) ) {
            $workspace = $app->workspace() ? $app->workspace() : $app->db->model( 'workspace' )->new( ['id' => 0] );
            ksort( $plugin_registries, SORT_NUMERIC );
            $components = $app->class_paths;
            foreach ( $plugin_registries as $methods ) {
                foreach ( $methods as $method ) {
                    $method_name = key( $method );
                    $prop = $method[ $method_name ];
                    $input = isset( $prop['input'] ) ? (int) $prop['input'] : 0;
                    $input_options = isset( $prop['input_options'] ) ? $prop['input_options'] : [];
                    $label = $prop['label'];
                    $plugin = $prop['component'];
                    $option = $prop['option'] ?? null;
                    $_plugin = $components[ strtolower( $plugin ) ] ?? null;
                    if (! $_plugin ) continue;
                    $meth = $prop['method'];
                    $columns = isset( $prop['columns'] ) ? $prop['columns'] : null;
                    $modal = isset( $prop['modal'] ) ? $prop['modal'] : null;
                    $hint = isset( $prop['hint'] ) ? $prop['hint'] : null;
                    $order = isset( $prop['order'] ) ? (int) $prop['order'] : 5;
                    $allow_empty = isset( $prop['allow_empty'] ) ? $prop['allow_empty'] : null;
                    if (!include_once( $_plugin ) )
                        trigger_error( "Plugin '{$_plugin}' load failed!" );
                    if ( class_exists( $plugin, false ) ) {
                        $component = new $plugin();
                        if (! is_object( $component ) ) {
                            continue;
                        }
                        if ( isset( $prop['permission'] ) ) {
                            $permission = $prop['permission'];
                            $can_do = false;
                            if ( is_string( $permission ) ) {
                                $can_do = $app->can_do( $permission, null, null, $workspace );
                            } else if ( is_array( $permission ) ) {
                                $can_not_do = false;
                                foreach ( $permission as $perm ) {
                                    if (! $app->can_do( $perm, null, null, $workspace ) ) {
                                        $can_not_do = true;
                                        break;
                                    }
                                }
                                $can_do = $can_not_do === false;
                            } else if ( $permission === null ) {
                                $can_do = true;
                            }
                            if (! $can_do ) {
                                continue;
                            }
                        }
                        if ( isset( $prop['condition'] ) ) {
                            $meth = $prop['condition'];
                            $cond = true;
                            if ( method_exists( $component, $meth ) ) {
                                $cond = $component->$meth( $app, null, $menu );
                            }
                            if (! $cond ) {
                                continue;
                            }
                        }
                        if ( is_string( $input_options ) ) {
                            if ( method_exists( $component, $input_options ) ) {
                                $input_options = $component->$input_options();
                            } else {
                                $input_options = [];
                            }
                        }
                        $label = $app->translate( $label, null, $component );
                        if ( $hint ) {
                            $hint = $app->translate( $hint, null, $component );
                        }
                        $reg = ['name' => $method_name,
                                'input' => $input,
                                'input_options' => $input_options,
                                'allow_empty' => $allow_empty,
                                'label' => $label,
                                'order' => $order,
                                'option' => $option,
                                'hint' => $hint,
                                'component' => $component,
                                'component_name' => $plugin,
                                'method' => $meth ];
                        $reg = array_merge( $prop, $reg );
                        if ( $columns !== null ) $reg['columns'] = $columns;
                        $registries[] = $reg;
                    }
                    PTUtil::sort_by_order( $registries );
                }
            }
        }
        $all_registries = [];
        if ( is_array( $registries ) ) {
            foreach ( $registries as $reg ) {
                $all_registries[ $reg['name'] ] = $reg;
            }
        }
        return $all_registries;
    }

    function __mode ( $mode, $tmpl = null ) {
        $app = $this;
        if ( $mode === 'logout' ) $app->logout();
        if ( strpos( $mode, '.' ) !== false || strpos( $mode, DS ) !== false ) {
            return $app->error( 'Invalid request.' );
        }
        if ( $app->param( 'workspace_id' ) && !$app->workspace() ) {
            $app->return_to_dashboard();
        }
        $request_time = $app->request_time;
        $ctx = $app->ctx;
        $ctx->vars['this_mode'] = $mode;
        if ( $mode === 'login' ) {
            $login_model = $app->login_model;
            $app->login( $login_model );
            $ctx->vars['query_string'] = $app->query_string;
            if ( $app->request_method === 'POST' && ! $app->user( $login_model ) ) {
                $message = $app->translate( 'Login failed: Username or Password was wrong.' );
                $ctx->vars['error'] = $message;
                $name = $app->param( 'name' );
                $user_terms = ['name' => $name ];
                // $user_terms = ['name' => ['BINARY' => $name ] ];
                $add_return_args = '';
                if ( $app->login_by_workspace && $app->db->model( $login_model )->has_column( 'workspace_id' ) ) {
                    // For customized model.
                    $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
                    $user_terms['workspace_id'] = $workspace_id;
                    $add_return_args = '&workspace_id=' . $workspace_id;
                }
                $faild_user = $app->db->model( $login_model )->get_by_key( $user_terms );
                $password = $app->param( 'password' );
                $password_len = strlen( $password );
                $str_repeat = str_repeat( '*', $password_len );
                $metadata = ['username' => $name,
                             'password' => $str_repeat ];
                $app->log( ['message'  => $message,
                            'category' => 'login',
                            'model'    => $login_model,
                            'object_id'=> $faild_user->id,
                            'metadata' => json_encode( $metadata, JSON_UNESCAPED_UNICODE ),
                            'level'    => 'security'] );
                $cfgs = $app->stash( 'configs' );
                $limit = isset( $cfgs['lockout_limit'] )
                     ? $cfgs['lockout_limit']->value : 0;
                $user_locked_out = false;
                $no_lockout_allowed = isset( $cfgs['no_lockout_allowed_ip'] )
                                    ? $cfgs['no_lockout_allowed_ip']->value : false;
                if ( $no_lockout_allowed ) {
                    $allowed_ip = $app->db->model( 'remote_ip' )->get_by_key(
                            ['ip_address' => $app->remote_ip,
                             'class' => ['IN' => ['administrator', 'allow'] ] ] );
                    if (! $allowed_ip->id ) {
                        $no_lockout_allowed = false;
                    }
                }
                if (! $no_lockout_allowed && $limit && $faild_user->id ) {
                    $interval = $cfgs['lockout_interval']->value
                         ? $cfgs['lockout_interval']->value : 600;
                    $ts = PTUtil::current_ts( $request_time - $interval );
                    $terms = ['object_id' => $faild_user->id, 'created_on' => ['>' => $ts ],
                              'level' => 8, 'category' => 'login', 'model' => $login_model ];
                    $faild_login = $app->db->model( 'log' )->count( $terms, null, 'id' );
                    if ( $faild_login && $faild_login >= $limit ) {
                        $faild_user->lock_out( 1 );
                        $faild_user->lock_out_on( PTUtil::current_ts( $request_time ) );
                        $faild_user->save();
                        $user_locked_out = true;
                    }
                }
                $ip_locked_out = false;
                $limit = isset( $cfgs['ip_lockout_limit'] )
                     ? $cfgs['ip_lockout_limit']->value : 0;
                if (! $no_lockout_allowed && $limit ) {
                    $interval = $cfgs['ip_lockout_interval']->value
                         ? $cfgs['ip_lockout_interval']->value : 600;
                    $ts = PTUtil::current_ts( $request_time - $interval );
                    $terms = ['remote_ip' => $app->remote_ip, 'created_on' => ['>' => $ts ],
                              'level' => 8, 'category' => 'login', 'model' => $login_model ];
                    $faild_login = $app->db->model( 'log' )->count( $terms, null, 'id' );
                    if ( $faild_login && $faild_login >= $limit ) {
                        $banned_ip = $app->banned_ip ? $app->banned_ip
                                    : $app->db->model( 'remote_ip' )->get_by_key(
                                      ['ip_address' => $app->remote_ip ], null, 'id' );
                        $banned_ip->class( 'banned' );
                        $banned_ip->model( $login_model );
                        $app->set_default( $banned_ip );
                        $banned_ip->save();
                        $app->banned_ip = $banned_ip;
                        $ip_locked_out = true;
                    }
                }
                if ( $ip_locked_out ) {
                    return $app->redirect( $app->script_uri . '?__mode=logout&_lockout=1&_type=ip' . $add_return_args );
                } else if ( $user_locked_out ) {
                    return $app->redirect( $app->script_uri . '?__mode=logout&_lockout=1&_type=' . $login_model . $add_return_args );
                }
            }
        }
        if (! isset( $ctx->vars['page_title'] ) || !$ctx->vars['page_title'] ) {
            if ( $mode === 'start_recover' ) {
                $ctx->vars['page_title'] = $app->translate( 'Password Recovery' );
                $ctx->vars['this_mode'] = 'login';
            } else {
                $page_title = explode( '_', $mode );
                array_walk( $page_title, function( &$str ) { $str = ucfirst( $str ); } );
                $ctx->vars['page_title'] = $app->translate( join( ' ', $page_title ) );
            }
        }
        if ( $app->user() && $app->id === 'Prototype' ) {
            if ( $mode === 'config' ) {
                if ( $app->workspace() ) {
                    $app->return_to_dashboard();
                }
                $document_root = $app->get_config( 'document_root' );
                if ( is_object( $document_root ) && $document_root->value ) {
                    $ctx->vars['document_root'] = $document_root->value;
                }
                require_once( LIB_DIR . 'Prototype' . DS . 'timezones.php' );
                $ctx->vars['timezones'] = $timezones; // timezone_identifiers_list();
                if ( $app->request_method === 'POST' &&
                    $app->param( '_type' ) && $app->param( '_type' ) === 'save' ) {
                    return $app->save_config( $app );
                }
            }
            if ( $mode == 'dashboard' ) {
                $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
                $app_widgets = $app->registry['widgets'];
                $option = $app->db->model( 'option' )->get_by_key(
                    ['workspace_id' => $workspace_id,
                     'user_id' => $app->user()->id,
                     'key' => 'dashboard_widget']
                    );
                if (! $option->value ) {
                    PTUtil::sort_by_order( $app_widgets, 25, true );
                }
                $disp_widgets = [];
                $widget_scope = $app->workspace() ? 'workspace' : 'system';
                foreach ( $app_widgets as $widget => $props ) {
                    $scope = isset( $props['scope'] ) ? $props['scope'] : null;
                    if ( ! $scope || in_array( $widget_scope, $scope ) ) {
                        $disp_widgets[] = $widget;
                    }
                }
                $disabled_widgets = [];
                $disp_widgets = array_unique( $disp_widgets );
                if ( $option->id ) {
                    if ( $disabled = $option->data ) {
                        $user_widget = [];
                        $disabled = explode( ',', $disabled );
                        foreach ( $disp_widgets as $widget ) {
                            if (! in_array( $widget, $disabled ) ) {
                                $user_widget[] = $widget;
                            } else {
                                $prop = $app_widgets[ $widget ];
                                $label = $app->component(
                                    $prop['component'] )->translate( $prop['label'] );
                                $disabled_widgets[ $widget ] = $label;
                            }
                        }
                        $disp_widgets = $user_widget;
                    }
                    if ( $widgets = $option->value ) {
                        $widgets = explode( ',', $widgets );
                        $disp_widgets = array_merge( $widgets, $disp_widgets );
                        $user_widget = [];
                        foreach ( $disp_widgets as $widget ) {
                            if (! isset( $disabled_widgets[ $widget ] ) ) {
                                if ( isset( $app_widgets[ $widget ] ) ) {
                                    $user_widget[] = $widget;
                                }
                            }
                        }
                        $disp_widgets = array_unique( $user_widget );
                    }
                }
                $ctx->vars['dashboard_widgets'] = $disp_widgets;
                $ctx->vars['disabled_widgets'] = $disabled_widgets;
                $option_activity = $app->db->model( 'option' )->get_by_key(
                    ['workspace_id' => $workspace_id,
                     'user_id' => $app->user()->id,
                     'key' => 'activity_model']
                );
                if ( $option_activity->id ) {
                    $ctx->vars['activity_model'] = $option_activity->value;
                    $ctx->vars['activity_column'] = $option_activity->option;
                    $ctx->vars['activity_label'] = $option_activity->data;
                } else {
                    $ctx->vars['activity_model'] = 'log';
                    $ctx->vars['activity_column'] = 'created_on';
                    $ctx->vars['activity_label'] = 'Logs';
                }
                if (! $workspace_id && $app->system_info_url ) {
                    $ctx->vars['system_info_content'] =
                        $app->get_information();
                }
                if (! $workspace_id && $app->news_box_url ) {
                    $ctx->vars['news_box_content'] =
                        $app->get_information( $app->news_box_url, 'news_box' );
                }
            }
        }
        $app->assign_params( $app, $ctx );
        if ( $mode == 'login' && !isset( $app->language[ $app->language ] ) ) {
            $app->set_language( null, $app->language );
            $ctx->vars['page_title'] = $app->translate( $ctx->vars['page_title'] );
        }
        $ctx->params['this_mode'] = $mode;
        $tmpl = $tmpl ? $tmpl : $mode . '.tmpl';
        return $app->build_page( $tmpl );
    }

    function get_information ( $url = '', $key = 'system_info' ) {
        $app = $this;
        $app->logging = false;
        $activation_code = $app->activation_code;
        if (! $url ) $url = $app->system_info_url;
        $lang = $app->user()->language;
        $sess = $app->db->model( 'session' )->get_by_key(
            ['name' => $key, 'kind' => 'CH', 'value' => $lang ], null, 'id,expires,text,start' );
        $content = null;
        if ( $sess->id ) {
            $content = $sess->text;
        }
        $cfg_alert = '';
        $options = ['http' => ['timeout' => 2], 'ssl' => ['verify_peer' => false, 'verify_peer_name' => false ] ];
        if ( $app->powercmsx_auth ) {
            $basic = ['Authorization: Basic ' . base64_encode( $app->powercmsx_auth )];
            $options['http']['header'] = $basic;
        }
        $context = PTUtil::stream_context_create( $options );
        if ( $content === null ) {
            if (! is_writable( $app->cache_dir ) ) {
                $app->ctx->vars['alert_message'] = $app->translate( "The Cache Directry is not writable by the web server." );
                $app->ctx->vars['alert_id'] = 'header-cache-message';
                $cfg_alert .= $app->build( file_get_contents( 'tmpl' . DS . 'cfg_alert.tmpl' ) );
            }
            if ( $key == 'system_info' && !$app->skip_config_check ) {
                $request_uri = $app->ctx->vars['script_uri'];
                if ( strpos( $request_uri, '/' ) === 0 ) {
                    $request_uri = $app->base . $request_uri;
                }
                $config_url = preg_replace( '![^/]*$!', '', $request_uri ) . 'config.json';
                $config_json = @file_get_contents( $config_url, false, $context );
                if ( $config_json !== false && strpos( $http_response_header[0], '200' ) !== false ) {
                    $app->ctx->vars['alert_message'] = $app->translate( "Please deny HTTP access to '%s'.", $config_url );
                    $app->ctx->vars['alert_id'] = 'header-cfg-message';
                    $cfg_alert .= $app->build( file_get_contents( 'tmpl' . DS . 'cfg_alert.tmpl' ) );
                }
            }
            $system_info_url = $url . '?app_version=' . $app->app_version;
            $system_info_url .= '&lang=' . $lang;
            $system_info_url .= '&license=' . $activation_code;
            $content = file_get_contents( $system_info_url, false, $context );
            $sess->text( $content );
            $sess->expires( $app->request_time + $app->sess_expires );
            $sess->start( $app->request_time );
            $sess->save();
        }
        $app->ctx->vars['app_version'] = $app->app_version;
        $app->ctx->vars['language'] = $lang;
        return trim( $app->build( $content ) ) . $cfg_alert;
    }

    function user ( $login_model = 'user' ) {
        if ( $this->$login_model ) return $this->$login_model;
        if ( $this->$login_model === false ) return null;
        if ( $this->mode === 'upgrade' ) return;
        if (! $this->installed ) return;
        if ( $this->is_login( $login_model ) ) {
            return $this->$login_model;
        }
        $name = $this->param( 'name' );
        $password = $this->param( 'password' );
        if ( $name && $password ) {
            if ( $this->two_factor_auth ) {
                return;
            }
            return $this->login( $login_model );
        }
    }

    function login ( $model = 'user', $return_url = null, $terms = [] ) {
        $app = $this;
        $remember = null;
        $user = is_object( $model ) ? $model : null;
        $custom_login = false;
        if ( $user ) {
            $model = $user->_model;
            $custom_login = true;
        }
        if ( is_bool( $terms ) ) {
            $remember = $terms;
            $terms = [];
        }
        $return_args = $app->param( 'return_args' );
        if ( strpos( $return_args, '__mode=logout' ) !== false ) $return_args = '';
        if ( strpos( $return_args, '__mode=login' ) !== false ) $return_args = '';
        if (! $custom_login && $app->request_method === 'POST' ) {
            $banned_ip = $app->banned_ip ? $app->banned_ip : $app->db->model( 'remote_ip' )->get_by_key(
                ['ip_address' => $app->remote_ip, 'class' => 'banned'], null, 'id' );
            $app->banned_ip = $banned_ip;
            if ( $banned_ip->id ) {
                $app->$model = false;
                return $app->redirect( $app->script_uri . '?__mode=logout&_lockout=1&_type=ip' );
            }
            $two_factor_auth = $app->two_factor_auth;
            $token = $app->param( 'token' );
            if ( $two_factor_auth && $token ) {
                $key = $app->param( 'confirmation_code' );
                $user_id = (int) $app->param( 'user_id' );
                $user = $app->db->model( $model )->load( ['id' => $user_id, 'status' => 2], ['limit' => 1] );
                if ( empty( $user ) ) {
                    return $app->error( 'Invalid request.' );
                }
                $user = $user[0];
                $sess = $app->db->model( 'session' )->get_by_key( [
                           'name' => $token, 'kind' => 'AU', 'user_id' => $user_id ] );
                if ( $sess->id && $sess->key === $key ) {
                    // Confirmation Code is valid.
                    $return_args = $sess->text;
                    $sess->remove();
                } else {
                    if ( $sess->id ) {
                        $counter = intval( $sess->value );
                        $counter += 1;
                        $retry_auth = $app->retry_auth ? $app->retry_auth : 3;
                        if ( $counter <= $retry_auth ) {
                            $sess->value( $counter );
                            $sess->save();
                        } else {
                            $sess->remove();
                            return
                              $app->error( 'The number of retry times limit was exceeded,'
                                          .' the confirmation code was discarded.' );
                        }
                    } else {
                        return $app->error( 'The confirmation code has been expired.' );
                    }
                    $app->ctx->vars['invalid_code'] = 1;
                    $app->assign_params( $app, $app->ctx );
                    $app->language = $user->language;
                    $app->ctx->vars['page_title']
                        = $app->translate( 'Two-factor Authentication' );
                    $app->ctx->vars['token'] = $token;
                    $app->ctx->vars['user_model'] = $user->_model;
                    $app->ctx->vars[$user->_model . '_id'] = $user->id;
                    return $app->build_page( 'two_factor_auth.tmpl' );
                }
            } else {
                $name = $app->param( 'name' );
                $password = $app->param( 'password' );
                if (! $name  || ! $password ) {
                    $message = $app->translate( 'Login failed: Username or Password was wrong.' );
                    $password_len = strlen( $password );
                    $str_repeat = str_repeat( '*', $password_len );
                    $metadata = ['username' => $name,
                                 'password' => $str_repeat ];
                    $app->log( ['message'  => $message,
                                'category' => 'login',
                                'model'    => $model,
                                'metadata' => json_encode( $metadata, JSON_UNESCAPED_UNICODE ),
                                'level'    => 'security'] );
                    if ( $app->id !== 'Prototype' ) {
                        return;
                    }
                    return $app->build_page( 'login.tmpl', ['error' => $message ] );
                }
                $terms['name'] = ['BINARY' => $name ];
                if (! isset( $terms['status'] ) ) $terms['status'] = 2;
                $user = $app->db->model( $model )->load( $terms, ['limit' => 1] );
                $app->init_callbacks( $model, 'post_load_object' );
                $callback = ['name' => 'post_load_object', 'model' => $model ];
                $app->run_callbacks( $callback, $model, $user );
                if ( empty( $user ) ) return;
                $user = $user[0];
                if ( $user->lock_out ) {
                    $app->$model = false;
                    return $app->redirect( $app->script_uri . '?__mode=logout&_lockout=1&_type=' . $model );
                }
                if ( password_verify( $password, $user->password ) ) {
                    if ( $two_factor_auth ) {
                        $app->language = $user->language;
                        $app->ctx->language = $user->language;
                        $app->user = $user;
                        if ( $app->use_plugin && !$app->init_plugins ) {
                            $app->init_plugins();
                        }
                        $token = $app->magic();
                        $key = rand( 10000, 99999 );
                        $sess = $app->db->model( 'session' )->get_by_key( [
                                                 'name' => $token, 'kind' => 'AU'] );
                        $sess->key( $key );
                        $sess->text( $return_args );
                        $sess->start( $app->request_time );
                        $sess->expires( $app->request_time + $app->auth_expires );
                        $sess->user_id( $user->id );
                        $sess->value( '0' );
                        $ctx = $app->ctx;
                        $ctx->vars['confirmation_code'] = $key;
                        $app->set_mail_param( $ctx );
                        $subject = null;
                        $body = null;
                        $template = null;
                        $body = $app->get_mail_tmpl( 'confirmation_code', $template );
                        if ( $template ) {
                            $subject = $template->subject;
                        }
                        $subject = $subject ? $app->translate( $subject, $ctx->vars['appname'] )
                                 : $app->translate( "[%s] Your Confirmation Code", $ctx->vars['appname'] );
                        $body = $app->build( $body );
                        $subject = $app->build( $subject );
                        if (! PTUtil::send_mail(
                            $user->email, $subject, $body, [], $error ) ) {
                            $ctx->vars['error'] = $error;
                            return $app->error( $error );
                        }
                        $sess->save();
                        $app->assign_params( $app, $app->ctx );
                        $app->language = $user->language;
                        $app->ctx->vars['page_title']
                            = $app->translate( 'Two-factor Authentication' );
                        $app->ctx->vars['token'] = $token;
                        $app->ctx->vars['user_model'] = $user->_model;
                        $app->ctx->vars[ $user->_model .'_id'] = $user->id;
                        return $app->build_page( 'two_factor_auth.tmpl' );
                    }
                } else {
                    return;
                }
            }
        }
        if (! $user ) {
            return;
        }
        $remember = isset( $remember ) ? $remember : $app->param( 'remember' );
        $expires = $app->sess_timeout;
        $sess = $app->db->model( 'session' )
            ->get_by_key( ['user_id' => $user->id, 'kind' => 'US', 'key' => $model ] );
        if (! $sess->name ) {
            $token = $app->magic(); # TODO more secure?
            $sess->name( $token );
        } else {
            $token = $sess->name;
        }
        $sess->key( $model );
        if ( $remember ) {
            $expires = 60 * 60 * 24 * 365;
            $sess->value( 1 );
        } else {
            $sess->value( 0 );
        }
        $sess->expires( $app->request_time + $expires );
        $sess->start = ( $app->request_time );
        $app->user = $user;
        $app->set_language( __DIR__ . DS . 'locale', $user->language );
        if ( $app->use_plugin && !$app->init_plugins ) {
            if ( ( $plugin_d = __DIR__ . DS . 'plugins' ) && is_dir( $plugin_d ) )
                $app->plugin_paths[] = $plugin_d;
            $app->init_plugins();
        }
        $app->init_callbacks( $model, 'pre_login' );
        $errors = [];
        $callback = ['name' => 'pre_login', 'model' => $model, 'errors' => $errors, 'error' => ''];
        $pre_login = $app->run_callbacks( $callback, $model, $user );
        $errors = $callback['errors'];
        if ( $error = $callback['error'] ) {
            $errors[] = $error;
        }
        if (! $pre_login && !empty( $errors ) ) {
            if ( $app->id !== 'Prototype' ) {
                return;
            }
            $app->language = $user->language;
            $ctx = $app->ctx;
            $ctx->vars['page_title'] = $app->translate( 'Login' );
            $ctx->vars['name'] = $app->param( 'name' );
            $ctx->vars['error'] = join( "\n", $errors );
            return $app->build_page( 'login.tmpl' );
        }
        $sess->save();
        $app->user_session = $sess;
        $user->last_login_on( date( 'YmdHis' ) );
        $user->last_login_ip( $app->remote_ip );
        $user->save();
        $path = $app->cookie_path ? $app->cookie_path : $app->path;
        $name = $model == 'user' ? $app->cookie_name : 'pt-' . $model;
        $app->bake_cookie( $name, $token, $expires, $path, true, $app->cookie_domain );
        $_COOKIE[ $name ] = $token; // for method is_login.
        $app->stash( 'logged-in', true );
        $message = $app->translate( "%s '%s' (ID:%s) logged in successfully.",
                        [ $app->translate( ucwords( $user->_model ) ), $user->name, $user->id ] );
        $app->log( ['message'  => $message,
                    'category' => 'login',
                    'model'    => $user->_model,
                    'object_id'=> $user->id,
                    'level'    => 'info'] );
        $app->init_callbacks( $model, 'post_login' );
        $callback = ['name' => 'post_login', 'model' => $model ];
        $app->run_callbacks( $callback, $model, $user );
        if ( $custom_login && is_bool( $return_url ) ) {
            return $user;
        }
        $return_args = $return_args ? '?' . ltrim( $return_args, '?' ) : '';
        $return_url = $return_url ? $return_url : $app->param( 'return_url' );
        if ( strpos( $return_url, 'http' ) === 0 ) {
            $return_url = preg_replace( '!^https{0,1}://[^/]*!', '', $return_url );
        } else if ( strpos( $return_url, '/' ) === 0 ) {
            $return_url = preg_replace( '!^/\s*/!u', '/', $return_url ); // sanitize "^//" and "^/\s+/" .
        }
        if (! $return_url ) $return_url = $app->admin_url;
        $app->redirect( $return_url . $return_args. '#__login=1' );
    }

    function logout ( $user = null ) {
        $app = $this;
        $app->mode = 'logout';
        $path = $app->cookie_path ? $app->cookie_path : $app->path;
        if ( $app->api_allow_login && $app->api_use_cookie ) {
            $name = $app->api_cookie_name ?? 'pt-api-user';
            $cookie_val = $app->cookie_val( $name );
            if ( $cookie_val ) {
                $session = $this->db->model( 'session' )->get_by_key(
                      ['key' => 'RESTfulAPIAccessToken', 'kind' => 'US', 'value' => $cookie_val ] );
                if ( $session->id ) {
                    $session->remove();
                }
                $app->bake_cookie( $name, '', $app->request_time - 1800, $path, true, $app->cookie_domain );
            }
        }
        $user = $user ? $user : $app->user();
        if ( $user ) {
            $sess = $app->db->model( 'session' )
                ->get_by_key( ['user_id' => $user->id, 'kind' => 'US', 'key' => $user->_model ] );
            if ( $sess->id ) $sess->remove();
            $name = $app->cookie_name;
            $app->bake_cookie( $name, '', $app->request_time - 1800, $path, true, $app->cookie_domain );
            $message = $app->translate( "%s '%s' (ID:%s) logged out.",
                            [ $app->translate( ucwords( $user->_model ) ), $user->name, $user->id ] );
            $app->log( ['message'  => $message,
                        'category' => 'logout',
                        'model'    => $user->_model,
                        'object_id'=> $user->id,
                        'level'    => 'info'] );
            $app->init_callbacks( $user->_model, 'post_logout' );
            $callback = ['name' => 'post_logout', 'model' => $user->_model ];
            $app->run_callbacks( $callback, $user->_model, $user );
        }
        return $app->__mode( 'login' );
    }

    function set_mail_param ( &$ctx, $workspace = null ) {
        $app = $this;
        $workspace = $workspace ? $workspace : $app->workspace();
        $app_name = $workspace
                  ? $workspace->name : $app->appname;
        $portal_url = $workspace
                  ? $workspace->site_url : $app->site_url;
        $ctx->vars['app_name'] = $app_name;
        $ctx->vars['portal_url'] = $portal_url;
        $script_uri = isset( $ctx->vars['script_uri'] ) ? $ctx->vars['script_uri'] : '';
        if (! $script_uri || strpos( $script_uri, 'http' ) === false ) {
            $ctx->vars['script_uri'] = $app->admin_url;
        }
        if ( isset( $ctx->vars['script_uri'] ) && strpos( $ctx->vars['script_uri'], '/' ) === 0 ) {
            $ctx->vars['script_uri'] = $app->base . $ctx->vars['script_uri'];
        }
        if ( isset( $ctx->vars['edit_link'] ) && strpos( $ctx->vars['edit_link'], '/' ) === 0 ) {
            $ctx->vars['edit_link'] = $app->base . $ctx->vars['edit_link'];
        }
    }

    function system_email ( &$error = '' ) {
        $system_email = $this->system_email;
        if (!$system_email ) {
            $system_email = $this->get_config( 'system_email' );
            if (! $system_email || !$system_email->value ) {
                $error = $this->translate( 'System Email Address is not set in System.' );
                return '';
            }
            $system_email = $system_email->value;
            if (!$this->is_valid_email( $system_email, $error ) ) {
                return '';
            }
        }
        $this->system_email = $system_email;
        return $system_email;
    }

    protected function view ( $app, $model = null, $type = null ) {
        $type  = $type  ? $type : $app->param( '_type' );
        $model = $model ? $model : $app->param( '_model' );
        if (!$model ) return;
        $db = $app->db;
        $table = $app->get_table( $model );
        if (!$table ) {
            unset( $_REQUEST['_type'] );
            return $app->error( 'Invalid request.' );
        }
        $workspace = $app->workspace();
        if ( is_object( $workspace ) && $workspace->id === null ) {
            $app->return_to_dashboard();
        }
        parse_str( $app->query_string(), $query_params );
        $workspace_id = $workspace ? (int) $workspace->id : 0;
        if ( $model === 'asset' && is_numeric( $app->asset_workspace_id ) && $workspace_id != $app->asset_workspace_id ) {
            if ( $app->param( '_selector' ) ) {
                $app->return_to_dashboard();
            }
            $query_params['workspace_id'] = (int) $app->asset_workspace_id;
            return $app->redirect(
              $app->admin_url . '?' . http_build_query( $query_params ) );
        }
        $registry = $app->registry;
        if (!$app->param( 'dialog_view' ) && $workspace ) {
            if (!$table->display_space ) {
                if ( $model !== 'workspace' || 
                    ( $model === 'workspace' && $type === 'list' )
                    || ( $model === 'workspace' && !$app->param( 'id' ) ) ) {
                    if ( $app->param( 'from_dialog' ) ) {
                        unset( $query_params['workspace_id'] );
                        unset( $query_params['from_dialog'] );
                        return $app->redirect(
                          $app->admin_url . '?' . http_build_query( $query_params ) );
                    }
                    $app->return_to_dashboard();
                }
            }
        }
        $app->allow_objectvar = true;
        $dialog_view = $table->dialog_view && $app->param( 'dialog_view' ) ? true : false;
        $tmpl = $type . '.tmpl';
        $label = $app->translate( $table->label );
        $plural = $app->translate( $table->plural );
        $ctx = $app->ctx;
        $ctx->params['context_model'] = $model;
        $ctx->params['context_table'] = $table;
        $ctx->vars['model'] = $model;
        $ctx->vars['label'] = $app->translate( $label );
        $ctx->vars['plural'] = $app->translate( $plural );
        $ctx->vars['has_hierarchy'] = $table->hierarchy;
        $ctx->vars['has_revision'] = $table->revisable;
        $scheme = $app->get_scheme_from_db( $model );
        $user = $app->user();
        $screen_id = $app->param( '_screen_id' );
        $ctx->vars['has_status'] = $table->has_status;
        $max_status = $app->max_status( $user, $model, $workspace );
        $status_published = $app->status_published( $model );
        $ctx->vars['max_status'] = $max_status;
        $ctx->vars['max_status_for_create_revision'] = $app->max_status_for_revision;
        $ctx->vars['status_published'] = $status_published;
        $ctx->vars['_default_status'] = $table->default_status;
        $ctx->vars['model_out_path'] = $table->out_path;
        $maps = null;
        if ( $type == 'edit' ) {
            $map_terms = ['model' => $model ];
            if ( $workspace_id ) {
                $map_terms['workspace_id'] = $workspace_id;
            }
            if ( $model === 'template' ) {
                if ( $app->param( 'id' ) ) {
                    $map_terms['template_id'] = (int) $app->param( 'id' );
                    unset( $map_terms['model'] );
                    $maps = $db->model( 'urlmapping' )->load_iter( $map_terms );
                }
            } else {
                $maps = $db->model( 'urlmapping' )->load_iter( $map_terms );
            }
            $ctx->vars['_show_both'] = $workspace ? $workspace->show_both : $app->show_both;
        } else {
            $maps = $db->model( 'urlmapping' )->load_iter( ['model' => $model ] );
        }
        if ( is_object( $maps ) ) {
            $maps = $maps->fetchAll( PDO::FETCH_ASSOC );
            if ( $maps ) {
                $ctx->vars['_has_mapping'] = $maps;
            }
        }
        $workflow = $db->model( 'workflow' )->get_by_key(
            ['model' => $model,
             'workspace_id' => $workspace_id ] );
        if ( $workflow->id ) {
            $ctx->vars['_has_workflow'] = 1;
            $ctx->vars['_workflow_notify_changes'] = $workflow->notify_changes;
        }
        $can_hierarchy = false;
        if ( $table->hierarchy ) {
            $can_hierarchy = $app->can_do(
                        $model, 'hierarchy', null, $workspace );
            $ctx->vars['can_hierarchy'] = $can_hierarchy;
        }
        $can_duplicate = false;
        if ( $table->can_duplicate ) {
            $can_duplicate = $app->can_do( $model, 'duplicate', null, $workspace );
        }
        $ctx->vars['can_duplicate'] = $can_duplicate;
        $ctx->vars['menu_type'] = $table->menu_type;
        if ( $type === 'list' ) {
            $can_any = false;
            $ctx->vars['can_pull_back'] = $app->can_pull_back;
            $ctx->vars['can_delete'] = $app->core_tags->hdlr_ifusercan(
              ['workspace_id' => $workspace_id, 'model' => $model, 'action' => 'delete'], null, $ctx, false, 0 );
            if (! $workspace_id ) {
                $ctx->vars['can_delete_any'] = $app->core_tags->hdlr_ifusercan(
                  ['workspace_id' => 'any', 'model' => $model, 'action' => 'delete'], null, $ctx, false, 0 );
            }
            if (! $dialog_view ) {
                $perms = $app->permissions();
                if (!$app->can_do( $model, 'list', null, $workspace ) ) {
                    if (! $workspace ) {
                        foreach ( $perms as $wsId => $perm ) {
                            if ( in_array( 'workspace_admin', $perm )
                                || in_array( 'can_list_' . $model, $perm )
                                || in_array( 'can_assoc_list_' . $model, $perm )
                                || in_array( 'can_all_list_' . $model, $perm ) ) {
                                $can_any = true;
                                break;
                            }
                        }
                    }
                    if (!$can_any && $app->param( 'dialog_view' ) && isset( $_SERVER['HTTP_REFERER'] ) ) {
                        $referrer = $_SERVER['HTTP_REFERER'];
                        list( $refRequest, $refParam ) = array_pad( explode( '?', $referrer ), 2, null );
                        $refParams = [];
                        parse_str( $refParam, $refParams );
                        if ( isset( $refParams['_model'] ) && isset( $refParams['__mode'] ) && isset( $refParams['_type'] ) ) {
                            if ( $refParams['__mode'] == 'view' && $refParams['_type'] == 'edit' ) {
                                $refWorkspace_id = isset( $refParams['workspace_id'] ) ? (int) $refParams['workspace_id'] : 0;
                                $refModel = $refParams['_model'];
                                $refWorkspace = $refWorkspace_id ? $db->model( 'workspace' )->load( $refWorkspace_id )
                                      : $db->model( 'workspace' )->new( ['id' => 0] );
                                $can_any = $app->can_do( $refModel, 'edit', null, $refWorkspace );
                            }
                        }
                    }
                    if (!$can_any && $app->param( 'dialog_view' ) && $app->param( 'ref_model' ) ) {
                        // The refModel has relation to model.
                        $refModel = $app->param( 'ref_model' );
                        $relTable = $app->get_table( $refModel );
                        if ( is_object( $relTable ) ) {
                            $relColumn = $db->model( 'column' )->get_by_key( ['table_id' => $relTable->id, 'rel_model' => $model ], null, 'id' );
                            if (! $relColumn->id ) {
                                $relColumn = $db->model( 'column' )->get_by_key( ['table_id' => $relTable->id, 'edit' => ['like' => 'relation:__any__:%'] ], null, 'id' );
                            }
                            if ( $relColumn->id ) {
                                $refWorkspace = $workspace_id ? $db->model( 'workspace' )->load( $workspace_id )
                                      : $db->model( 'workspace' )->new( ['id' => 0] );
                                $can_any = $app->can_do( $refModel, 'edit', null, $refWorkspace );
                            }
                        }
                    }
                    if (!$can_any ) {
                        if ( isset( $perms[ $workspace_id ] ) ) {
                            $app->return_to_dashboard();
                        } else {
                            $app->return_to_dashboard( ['permission' => 1], true );
                        }
                    }
                }
                if ( $table->revisable ) {
                    $can_revision = $app->can_do( $model, 'revision', null, $workspace );
                    if (! $can_revision && ! $workspace && $table->display_system ) {
                        foreach ( $perms as $wsId => $perm ) {
                            if ( in_array( 'can_revision_' . $model, $perm ) ) {
                                $can_revision = true;
                            }
                        }
                    }
                    if (! $can_revision && $app->param( 'revision_select' ) ) {
                        $dialog = $app->param( 'dialog_view' ) ? true : false;
                        $app->error( 'Permission denied.', $dialog );
                    }
                    $ctx->vars['can_revision'] = $can_revision;
                }
            }
            $app->init_callbacks( $model, 'start_listing' );
            $callback = ['name' => 'start_listing', 'model' => $model,
                         'scheme' => $scheme, 'table' => $table ];
            $app->run_callbacks( $callback, $model );
            $scheme = $callback['scheme'];
            $ctx->vars['page_title'] = $app->translate( 'List of %s', $plural );
            $list_option = $app->get_user_opt( $model, 'list_option', $workspace_id );
            $list_props = $scheme['list_properties'];
            $column_defs = $scheme['column_defs'];
            $labels = $scheme['labels'];
            $search_props = [];
            $sort_props = [];
            $filter_props = [];
            $indexes = $scheme['indexes'];
            $ws_status_map = [];
            $ws_user_map = [];
            $unchangeable = isset( $scheme['unchangeable'] ) ? $scheme['unchangeable'] : [];
            foreach ( $column_defs as $col => $prop ) {
                if ( ( $prop['type'] === 'string' || $prop['type'] === 'text' )
                    && strpos( $col, 'rev_' ) !== 0 ) {
                    $search_props[ $col ] = true;
                    if ( isset( $indexes[ $col ] ) && strpos( $col, 'rev_' ) !== 0 ) {
                        $sort_props[ $col ] = true;
                    }
                } else if ( $prop['type'] === 'int' || $prop['type'] === 'datetime' ) {
                    if ( strpos( $col, 'rev_' ) !== 0 ) {
                        $sort_props[ $col ] = true;
                    }
                }
                if ( strpos( $col, 'rev_' ) !== 0 && $prop['type'] !== 'blob' ) {
                    if ( $app->workspace() && $col === 'workspace_id' ) continue;
                    $list_prop = isset( $list_props[ $col ] ) ? $list_props[ $col ] : null;
                    $type = $prop['type'];
                    if ( $list_prop ) {
                        if ( strpos( $list_prop, 'reference:' ) !== false ) {
                            $type = 'reference';
                        }
                    }
                    $filter_props[] = ['name' => $col, 'type' => $type,
                        'label' => $app->translate( $labels[ $col ] ) ];
                }
            }
            $obj = $db->model( $model );
            if ( $app->param( 'revision_select' ) || $app->param( 'manage_revision' ) ) {
                $ctx->vars['page_title'] =
                    $app->translate( 'List Revisions of %s', $label );
                $cols = 'rev_diff,rev_changed,modified_by,modified_on';
                $cols = $table->primary . ',' . $cols;
                if ( $list_option->id && strpos( $list_option->option, 'id' ) === 0 ) {
                    $cols = "id,{$cols}";
                }
                $list_option->option( $cols );
            } else if (!$list_option->id ) {
                $list_option->number( $app->list_limit );
                $list_option->option( join ( ',', array_keys( $list_props ) ) );
                $list_option->data( join ( ',', array_keys( $search_props ) ) );
            } else if (! $list_option->option ) {
                $list_option->option( join ( ',', array_keys( $list_props ) ) );
            }
            if ( $list_option->number ) {
                $ctx->vars['_per_page'] = (int) $list_option->number;
            } else {
                $ctx->vars['_per_page'] = $app->list_limit;
            }
            if ( $list_option->value ) {
                $search_type = (int) $list_option->value;
                $ctx->vars['_search_type'] = $search_type;
                $app->search_type = $search_type;
            }
            $user_othor = $list_option->other ? $list_option->other : '0,0';
            if ( strpos( $user_othor, ',' ) !== false ) $user_othor .= ',0';
            list( $user_keep_search, $replace_type ) = explode( ',', $user_othor );
            $user_keep_search = $app->param( '_filter' ) ? 0 : (int) $user_keep_search;
            $ctx->vars['_user_keep_search'] = $user_keep_search;
            $ctx->vars['_replace_type'] = $replace_type;
            $user_options = $list_option->option ? explode( ',', $list_option->option ) : [];
            $max_cols = $dialog_view ? $app->dialog_max_cols : $app->list_max_cols;
            if ( $app->param( 'dialog_view' ) && $app->dialog_max_cols < $max_cols ) {
                $max_cols = $app->dialog_max_cols;
            }
            if ( $app->param( 'revision_select' ) || $app->param( 'manage_revision' ) ) {
            } else {
                unset( $list_props['rev_diff'], $list_props['rev_note'],
                       $list_props['rev_changed'] );
                if ( in_array( 'rev_diff', $user_options ) ) {
                    $search = array_search( 'rev_diff', $user_options );
                    $split = array_splice( $user_options, $search, 1 );
                }
                if ( in_array( 'rev_note', $user_options ) ) {
                    $search = array_search( 'rev_note', $user_options );
                    $split = array_splice( $user_options, $search, 1 );
                }
            }
            if (!$list_option->id ) {
                if ( isset( $scheme['default_list_items'] ) &&
                !$app->param( 'revision_select' ) && !$app->param( 'manage_revision' ) ) {
                    $user_options = $scheme['default_list_items'];
                } else {
                    $option_ws = in_array( 'workspace_id', $user_options ) ? true : false;
                    $user_options = array_slice( $user_options, 0, $max_cols );
                    if ( $option_ws && ! in_array( 'workspace_id', $user_options ) ) {
                        $user_options[] = 'workspace_id';
                    }
                    if ( $table->primary && ! in_array( $table->primary, $user_options ) ) {
                        array_unshift( $user_options, $table->primary );
                    }
                }
            }
            $_colprefix = $obj->_colprefix;
            if ( $app->workspace() && in_array( 'workspace_id', $user_options ) ) {
                $search = array_search( 'workspace_id', $user_options );
                $split = array_splice( $user_options, $search, 1 );
            }
            if ( $app->param( 'revision_select' ) || $app->param( 'manage_revision' ) ) {
                if (! in_array( 'rev_diff', $user_options ) ) $user_options[] = 'rev_diff';
                if ( $obj->has_column( 'modified_on' ) ) {
                    if (! in_array( 'modified_on', $user_options ) )
                        $user_options[] = 'modified_on';
                }
                if ( $app->param( 'manage_revision' )
                    && $obj->has_column( 'workspace_id' ) && !$workspace_id ) {
                    $user_options[] = 'workspace_id';
                }
            }
            $sorted_props = [];
            $relations = isset( $scheme['relations'] ) ? $scheme['relations'] : [];
            foreach ( $list_props as $col => $prop ) {
                $user_opt = in_array( $col, $user_options ) ? 1 : 0;
                $sorted_props[ $col ] = [ $app->translate( $labels[ $col ] ), $user_opt, $prop ];
            }
            $search_cols = $list_option->data ? explode( ',', $list_option->data ) : [];
            foreach ( $search_props as $col => $prop ) {
                $user_opt = in_array( $col, $search_cols ) ? 1 : 0;
                $search_props[ $col ] = [ $app->translate( $labels[ $col ] ), $user_opt ];
            }
            $sort_option = $list_option->extra ? explode( ',', $list_option->extra ) : [];
            if (!$list_option->extra && isset( $scheme['sort_by'] ) ) {
                $sort_option = [];
                $sort_option[] = key( $scheme['sort_by'] );
                $sort_option[] = $scheme['sort_by'][ key( $scheme['sort_by'] ) ];
            }
            $has_primary = false;
            foreach ( $sort_props as $col => $prop ) {
                $user_opt = ( $sort_option && $sort_option[0] === $col ) ? 1 : 0;
                $sort_props[ $col ] = [ $app->translate( $labels[ $col ] ), $user_opt ];
            }
            $ascend = isset( $sort_option[1] ) && $sort_option[1] == 'ascend' ? 1 : 0;
            $descend = isset( $sort_option[1] ) && $sort_option[1] == 'descend' ? 1 : 0;
            $order_props = ['1' => [ $app->translate( 'Ascend' ), $ascend ],
                            '2' => [ $app->translate( 'Descend' ), $descend ] ];
            $ctx->vars['disp_options']   = $sorted_props;
            $ctx->vars['search_options'] = $search_props;
            $ctx->vars['sort_options']   = $sort_props;
            $ctx->vars['order_options']  = $order_props;
            $ctx->vars['filter_options'] = $filter_props;
            $ctx->vars['_can_hide_list_col'] = true;
            $hide_list_options = isset( $scheme['hide_list_options'] )
                               ? $scheme['hide_list_options'] : [];
            if ( $table->revisable ) {
                if ( $app->param( 'manage_revision' ) ) {
                    if ( $workflow->id && ! in_array( 'user_id', $user_options ) ) {
                        $user_options[] = 'user_id';
                    }
                } else {
                    $hide_list_options[] = 'rev_type';
                    if ( in_array( 'rev_type', $user_options ) ) {
                        $idx = array_search( 'rev_type', $user_options );
                        unset( $user_options[ $idx ] );
                    }
                }
            }
            $ctx->vars['hide_list_options'] = $hide_list_options;
            $contain_space = in_array( 'workspace_id', $user_options );
            $user_options = array_slice( $user_options, 0, $max_cols );
            if (! $workspace_id && $obj->has_column( 'workspace_id' )
                && $contain_space && !in_array( 'workspace_id', $user_options ) ) {
                $user_options[] = 'workspace_id';
            }
            $user_options = array_unique( $user_options );
            $app->disp_option = $user_options;
            $sortable = false;
            if ( in_array( 'order', $user_options ) && $table->sortable ) {
                $ctx->vars['sortable'] = 1;
                $sortable = true;
            }
            if ( $table->has_status ) {
                $sColumn = $db->model( 'column' )->get_by_key( ['table_id' => $table->id, 'name' => 'status'], null, 'id,options' );
                if ( $sColumn->id ) {
                    $ctx->vars['status_loop'] = explode( ',', $sColumn->options );
                }
            }
            $limit = $app->param( 'limit' ) ? $app->param( 'limit' )
                   : $list_option->number;
            $limit = (int) $limit;
            if (! $limit ) $limit = (int) $app->list_limit;
            $offset = $app->param( 'offset' );
            $offset = (int) $offset;
            $args = [];
            if ( $limit && $limit != -1 ) $args['limit'] = $limit;
            $args['offset'] = $offset;
            $sort = $app->param( 'sort' );
            if ( $sort && !$obj->has_column( $sort ) ) $sort = null;
            if ( $sort && isset( $relations[ $sort ] ) ) {
                $sort = null;
            }
            $direction = $app->param( 'direction' );
            if ( $sort && $direction ) {
                $args['sort'] = $sort;
                $args['direction'] = $direction;
            } else {
                $order_opt = $list_option->extra;
                if ( $order_opt ) {
                    $order_opt = explode( ',', $order_opt );
                    $sort_by = $order_opt[0];
                    $direction = $order_opt[1];
                    if ( $obj->has_column( $sort_by ) ) {
                        $args['sort'] = $sort_by;
                        $args['direction'] = $direction;
                    }
                } else {
                    if ( $sortable && $obj->has_column( 'order' ) ) {
                        $args['sort'] = 'order';
                        $args['direction'] = 'ascend';
                    } else if ( $sort_by = $table->sort_by ) {
                        if ( $obj->has_column( $sort_by ) ) {
                            $direction = $table->sort_order ? $table->sort_order : 'ascend';
                            $args['sort'] = $sort_by;
                            $args['direction'] = $direction;
                        }
                    }
                }
            }
            $terms = [];
            $extra = null;
            if ( $ws = $app->workspace() ) {
                if ( isset( $column_defs['workspace_id'] ) ) {
                    $ws_id = (int) $ws->id;
                    $extra = " AND {$_colprefix}workspace_id={$ws_id}";
                }
                $ctx->vars['extra_path'] = $ws->extra_path;
            }
            if ( $model == 'asset' ) {
                $path_terms = 
                    ['key' => 'upload_path', 'kind' => 'extra_path', 'workspace_id' => $workspace_id ];
                if ( $app->upload_history_by == 'user' ) $path_terms['user_id'] = $user->id;
                $extra_paths = $db->model( 'option' )->load( $path_terms , [], 'value' );
                $upload_paths = [];
                foreach ( $extra_paths as $extra_path ) {
                    $extra_path = $extra_path->value;
                    $app->sanitize_dir( $extra_path );
                    if ( $extra_path ) $upload_paths[] = $extra_path;
                }
                $ctx->vars['upload_paths'] = $upload_paths;
            }
            if ( $table->revisable ) {
                if ( $rev_object_id = $app->param( 'rev_object_id' ) ) {
                    $terms['rev_object_id'] = (int) $rev_object_id;
                    $app->return_args['revision_select'] = 1;
                    $app->return_args['rev_object_id'] = $rev_object_id;
                }
            }
            $list_max_status = $max_status;
            $count_extra = $extra;
            $ex_vals = [];
            if ( $user->is_superuser ) {
                $ctx->vars['can_create'] = 1;
            } else {
                $permissions = $app->permissions();
                if ( $workspace ) {
                    $perms = ( $workspace && isset( $permissions[ $workspace->id ] ) )
                              ? $permissions[ $workspace->id ] : [];
                    $permissions = [ $workspace->id => $perms ];
                    if ( in_array( 'workspace_admin', $perms )
                        || in_array( 'can_create_' . $model, $perms ) ) {
                        $ctx->vars['can_create'] = 1;
                    }
                } else if ( isset( $permissions[0] ) ) {
                    if ( in_array( 'can_create_' . $model, $permissions[0] ) ) {
                        $ctx->vars['can_create'] = 1;
                    }
                }
                $user_id = $user->id;
                if ( $table->has_status ) {
                    $has_deadline = $obj->has_column( 'has_deadline' ) ? true : false;
                    $status_published = $app->status_published( $obj->_model ) - 1;
                    if ( $has_deadline ) {
                        $status_published = $status_published - 2;
                    }
                }
                if ( empty( $permissions ) ) {
                    $app->error( 'Permission denied.' );
                }
                $extra_permission = [];
                $count_permission = [];
                $ws_ids = [];
                $min_status = $table->start_end ? 1 : 2;
                foreach ( $permissions as $ws_id => $perms ) {
                    $ws_id = (int) $ws_id;
                    if (! in_array( 'workspace_admin', $perms ) &&
                        ! in_array( 'can_list_' . $model, $perms )
                        && ! in_array( 'can_all_list_' . $model, $perms ) ) {
                        continue;
                    }
                    if (! $app->workspace() ) {
                        $max = $app->max_status( $user, $model, $ws_id );
                        $list_max_status = ( $list_max_status < $max )
                                         ? $max : $list_max_status;
                    }
                    $ws_permission = '';
                    if ( $obj->has_column( 'workspace_id' ) ) {
                        if ( in_array( 'workspace_admin', $perms )
                            || in_array( 'can_list_' . $model, $perms )
                            || in_array( 'can_all_list_' . $model, $perms ) ) {
                            $ws_ids[] = (int) $ws_id;
                        }
                    }
                    if ( $table->has_status ) {
                        $ws_status_map[ $ws_id ] = " {$_colprefix}status >= 0 ";
                    }
                    if ( $obj->has_column( 'user_id' ) ) {
                        $ws_user_map[ $ws_id ] = " ( {$_colprefix}user_id >= 0 OR {$_colprefix}user_id IS NULL )";
                    }
                    if (! $dialog_view ) {
                        if (! in_array( 'workspace_admin', $perms ) ) {
                            if ( $table->has_status ) {
                                if (! in_array( 'can_activate_' . $model, $perms )
                                    && ! in_array( 'can_assoc_list_' . $model, $perms )
                                    && ! in_array( 'can_all_list_' . $model, $perms ) ) {
                                    if ( $workspace ) {
                                        if ( $ws_permission ) $ws_permission .= ' AND ';
                                        if (! in_array( 'can_review_' . $model, $perms ) ) {
                                            $ws_permission .= " {$_colprefix}status < {$min_status}";
                                        } else {
                                            $ws_permission .=
                                                " {$_colprefix}status <= {$status_published}";
                                        }
                                    } else {
                                        if (! in_array( 'can_review_' . $model, $perms ) ) {
                                            $ws_status_map[ $ws_id ] = " {$_colprefix}status < {$min_status}";
                                        } else {
                                            $ws_status_map[ $ws_id ] =
                                                " {$_colprefix}status <= {$status_published}";
                                        }
                                    }
                                }
                            }
                            $by_association_col = $app->by_association_col;
                            if ( $obj->has_column( $by_association_col ) &&
                                ! in_array( 'can_all_list_' . $model, $perms )
                                && in_array( 'can_assoc_list_' . $model, $perms ) ) {
                                $association_users = $app->association_user_ids();
                                if ( $workspace ) {
                                    $extra = " AND {$model}_{$by_association_col} IN (" . implode( ',', $association_users ) . ')';
                                } else {
                                    $ws_user_map[ $ws_id ] = " {$_colprefix}{$by_association_col} IN (" .
                                                             implode( ',', $association_users ) .  ')';
                                }
                            } else if ( $obj->has_column( 'user_id' ) ) {
                                if (! in_array( 'can_update_all_' . $model, $perms )
                                    && ! in_array( 'can_all_list_' . $model, $perms ) ) {
                                    if ( in_array( 'can_list_' . $model, $perms ) ) {
                                        if ( $workspace ) {
                                            if ( $ws_permission ) $ws_permission .= ' AND ';
                                            $ws_permission .= " {$_colprefix}user_id={$user_id}";
                                        } else {
                                            $ws_user_map[ $ws_id ] = " {$_colprefix}user_id={$user_id}";
                                        }
                                    }
                                }
                            }
                        }
                    }
                    if ( $ws_permission ) {
                        $ws_permission = "($ws_permission)";
                        if (! in_array( 'workspace_admin', $perms ) &&
                            ! in_array( 'can_all_list_' . $model, $perms ) ) {
                            $extra_permission[] = $ws_permission;
                        } else {
                            $count_permission[] = $ws_permission;
                        }
                    }
                }
                if (! empty( $extra_permission ) ) {
                    $extra_permission = join( ' OR ', $extra_permission );
                    $extra .= ' AND ';
                    $extra .= $extra_permission;
                }
                if (! empty( $count_permission ) ) {
                    $count_permission = join( ' OR ', $count_permission );
                    $count_extra .= ' AND ';
                    $count_extra .= $count_permission;
                }
                if (! empty( $ws_ids ) ) {
                    $extra .= ' AND ';
                    $count_extra .= ' AND ';
                    $ws_ids = join( ',', $ws_ids );
                    $extra .= " {$_colprefix}workspace_id IN ({$ws_ids})";
                    $count_extra .= " {$_colprefix}workspace_id IN ({$ws_ids})";
                }
            }
            if (! empty( $ws_status_map ) ) {
                unset( $terms['status'] );
                $extra .= ' AND (';
                $count_extra .= ' AND (';
                $_loop_cnt = 0;
                foreach ( $ws_status_map as $_ws_id => $condition ) {
                    if ( $_loop_cnt ) {
                        $extra .= ' OR ';
                        $count_extra .= ' OR ';
                    }
                    $extra .= 
                        $obj->has_column( 'workspace_id' )
                        ? "({$_colprefix}workspace_id={$_ws_id} AND {$condition})"
                        : "({$condition})";
                    $count_extra .= $obj->has_column( 'workspace_id' )
                        ? "({$_colprefix}workspace_id={$_ws_id} AND {$condition})"
                        : "({$condition})";
                    $_loop_cnt++;
                }
                $extra .= ')';
                $count_extra .= ')';
            }
            if (! empty( $ws_user_map ) ) {
                unset( $terms['user_id'] );
                $extra .= ' AND (';
                $count_extra .= ' AND (';
                $_loop_cnt = 0;
                foreach ( $ws_user_map as $_ws_id => $condition ) {
                    if ( $_loop_cnt ) {
                        $extra .= ' OR ';
                        $count_extra .= ' OR ';
                    }
                    $extra .= $obj->has_column( 'workspace_id' )
                            ? "({$_colprefix}workspace_id={$_ws_id} AND {$condition})"
                            : "({$condition})";
                    $count_extra .= $obj->has_column( 'workspace_id' )
                            ? "({$_colprefix}workspace_id={$_ws_id} AND {$condition})"
                            : "({$condition})";
                    $_loop_cnt++;
                }
                $extra .= ')';
                $count_extra .= ')';
            }
            $ctx->vars['list_max_status'] = $list_max_status;
            if (!$app->param( 'revision_select' ) ) {
                $actions_class = new PTListActions();
                $list_actions = [];
                $actions_class->get_list_actions( $model, $list_actions );
                if (! empty( $list_actions ) ) $ctx->vars['list_actions'] = $list_actions;
                $filters_class = new PTSystemFilters();
                $system_filters = [];
                $filters_class->get_system_filters( $model, $system_filters );
                if (! empty( $system_filters ) )
                    $ctx->vars['system_filters'] = $system_filters;
            }
            $app->register_callback( $model, 'pre_listing', 'pre_listing', 5, $app );
            $app->init_callbacks( $model, 'pre_listing' );
            $callback = ['name' => 'pre_listing', 'model' => $model,
                         'scheme' => $scheme, 'table' => $table, 'args' => [] ];
            $app->run_callbacks( $callback, $model, $terms, $args, $extra, $ex_vals );
            if ( $table->revisable ) {
                if (!$app->param( 'rev_object_id' ) && !$app->param( 'manage_revision' ) ) {
                    if ( $extra ) {
                        $extra = " AND ( {$_colprefix}id != 0 {$extra} )";
                    }
                    if (! isset( $terms['rev_type'] ) ) {
                        $extra .= " AND {$_colprefix}rev_type=0 ";
                    }
                    if ( $count_extra ) {
                        $count_extra = " AND ( {$_colprefix}id != 0 {$count_extra} )";
                    }
                    $count_extra .= " AND {$_colprefix}rev_type=0 ";
                } else if ( $app->param( 'manage_revision' ) ) {
                    if ( $extra ) {
                        $extra = " AND ( {$_colprefix}id != 0 {$extra} )";
                    }
                    $extra .= " AND {$_colprefix}rev_type !=0 ";
                    if ( $count_extra ) {
                        $count_extra = " AND ( {$_colprefix}id != 0 {$count_extra} )";
                    }
                    $count_extra .= " AND {$_colprefix}rev_type !=0 ";
                }
            }
            if ( $get_col = $app->param( 'get_col' ) ) {
                if (! in_array( $get_col, $user_options ) ) {
                    array_unshift( $user_options, $get_col );
                }
            }
            $orig_user_options = $user_options;
            if (! in_array( 'id', $user_options ) ) {
                array_unshift( $user_options, 'id' );
            }
            if ( $table->has_status ) {
                if (! in_array( 'status', $user_options ) ) $user_options[] = 'status';
                if ( isset( $scheme['options'] ) && isset( $scheme['options']['status'] ) ) {
                    $ctx->vars['_status_options'] = $scheme['options']['status'];
                }
            }
            $user_options = array_unique( $user_options );
            $select_cols = null;
            if (! $app->param( 'get_cols' ) && $app->id == 'Prototype' ) {
                $select_cols = [];
                $change_user_opt = false;
                foreach ( $user_options as $_col ) {
                    if (! isset( $relations[ $_col ] ) ) {
                        if ( $obj->has_column( $_col ) ) {
                            $select_cols[] = $_col;
                        } else {
                            $change_user_opt = true;
                        }
                    }
                }
                if ( $change_user_opt && $list_option->id ) {
                    $list_option->option( implode( ',', $select_cols ) );
                    $list_option->save();
                }
                if ( $obj->has_column( 'workspace_id' ) ) {
                    if (! in_array( 'workspace_id', $select_cols ) ) {
                        $select_cols[] = 'workspace_id';
                    }
                }
                if ( $obj->has_column( 'rev_type' ) ) {
                    $select_cols[] = 'rev_type';
                }
                if ( $model == 'urlinfo' ) {
                    $select_cols[] = 'model';
                    $select_cols[] = 'object_id';
                    $select_cols = array_unique( $select_cols );
                    if (! isset( $terms['delete_flag'] ) ) {
                        $terms['delete_flag'] = '*';
                    }
                }
                if ( $app->param( 'revision_select' ) || $app->param( 'manage_revision' ) ) {
                    if ( $obj->has_column( 'rev_note' ) && !in_array( 'rev_note', $select_cols ) )
                        $select_cols[] = 'rev_note';
                }
                if ( $workflow->id ) {
                    $select_cols[] = 'user_id';
                    $select_cols[] = 'previous_owner';
                }
                $select_cols = implode( ',', $select_cols );
            }
            if ( $app->param( 'revision_select' ) && $obj->has_column( 'modified_on' ) ) {
                if ( $obj->has_column( 'modified_on' ) ) {
                    $args['sort'] = 'modified_on';
                } else {
                    $args['sort'] = 'id';
                }
                $args['direction'] = 'descend';
            }
            $query_cookie = "list_query_{$model}_{$workspace_id}";
            if ( $user_keep_search ) {
                if (! $app->param( 'query' ) && ! $app->param( '_detach_query' ) ) {
                    if ( $r_query = $app->cookie_val( $query_cookie ) ) {
                        $app->param( 'query', $r_query );
                    }
                } else if ( $app->param( '_detach_query' ) ) {
                    $app->bake_cookie( $query_cookie, '' );
                }
            }
            if ( $q = $app->param( 'query' ) ) {
                if ( $user_keep_search && $app->request_method == 'POST' ) {
                    $app->bake_cookie( $query_cookie, $q );
                }
                $count = $obj->count( $terms, [], 'id', $extra, $ex_vals );
                if ( $count < 10000 ) {
                    $iter = $obj->load_iter( $terms, [], 'id', $extra, $ex_vals );
                    $match_ids = $iter->fetchAll( PDO::FETCH_COLUMN );
                    if (!empty( $match_ids ) ) {
                        $add_extra = " AND {$model}_id IN (" . implode( ',', $match_ids ) . ') ';
                        unset( $match_ids );
                        $extra .= $add_extra;
                        $count_extra .= $add_extra;
                    }
                }
                $terms = [];
                if ( $model === 'urlinfo' ) {
                    $terms['delete_flag'] = '*';
                }
                $args['and_or'] = 'or';
                $ctx->vars['query'] = $q;
                if ( $app->param( 'search_cols' ) ) {
                    $cols = explode( ',', $app->param( 'search_cols' ) );
                } else {
                    $cols = !empty( $search_cols ) ? $search_cols : array_keys( $search_props );
                }
                if ( $app->id == 'RESTfulAPI' ) {
                    $search_type = strtolower( $app->param( 'search_type' ) );
                    if ( $search_type == 'and' ) {
                        $app->search_type = 3;
                    } else if ( $search_type == 'or' ) {
                        $app->search_type = 2;
                    } else {
                        $app->search_type = 1;
                    }
                }
                if ( $app->param( 'manage_revision' ) && !in_array( 'rev_note', $cols ) ) {
                    $cols[] = 'rev_note';
                }
                $q = trim( $q );
                if ( $app->search_type != 1 ) {
                    $q = mb_convert_kana( $q, 's', $app->encoding );
                    $cond = $app->search_type == 2 ? 'or' : 'and';
                    $qs = preg_split( "/\s+/", $q );
                    $conditions = [];
                    $counter = 0;
                    if ( count( $qs ) > 1 ) {
                        foreach ( $qs as $s ) {
                            $s = $db->escape_like( $s, 1, 1 );
                            if (!$counter ) {
                                $conditions[] = ['LIKE' => $s ];
                            } else {
                                $conditions[] = ['LIKE' => [ $cond => $s ] ];
                            }
                            $counter++;
                        }
                    } else {
                        $conditions = ['LIKE' => $db->escape_like( $q, 1, 1 ) ];
                    }
                } else {
                    $conditions = ['LIKE' => $db->escape_like( $q, 1, 1 ) ];
                }
                foreach ( $cols as $col ) {
                    if ( $obj->has_column( $col ) && !isset( $relations[ $col ] ) ) {
                        $terms[ $col ] = $conditions;
                    }
                }
            }
            if ( $table->sortable && $table->hierarchy && !$app->workspace()
                && $obj->has_column( 'workspace_id' ) ) {
                $extra = " AND {$model}_workspace_id=0 {$extra}";
                if ( $colPos = array_search( 'workspace_id', $user_options ) ) {
                    unset( $user_options[ $colPos ] );
                }
            }
            $user_session = $app->user_session;
            if ( $user_session && $app->param( 'all_selected' ) && $app->param( 'filter_params' ) && $app->param( 'to_json' ) ) {
                $filter_params = $app->param( 'filter_params' );
                $encrypted_filters = explode( ',', $user_session->text );
                if (! in_array( md5( $filter_params ), $encrypted_filters ) ) {
                    return $app->error( 'Invalid request.' );
                }
                $filter_params = json_decode( $app->decrypt( $filter_params ), true );
                $terms = $filter_params['terms'];
                $args  = $filter_params['args'];
                $extra = $filter_params['extra'];
                $original = "'{$extra}'";
                $quoted = $db->quote( $extra );
                if ( $original != $quoted ) {
                    return $app->json_error( 'Invalid request.' );
                }
            }
            if ( $model === 'workspace' && $app->param( 'workspace_select' )
                && $app->param( 'dialog_view' ) && !$app->user()->is_superuser ) {
                $workspace_ids = array_keys( $app->permissions() );
                if (! empty( $workspace_ids ) ) {
                    $extra .= ' AND workspace_id IN (' . join( ',', $workspace_ids ) . ') ';
                }
            }
            if ( $app->param( 'to_json' ) && $app->param( 'get_cols' ) ) {
                $get_cols = explode( ',', $app->param( 'get_cols' ) );
                foreach ( $get_cols as $idx => $get_col ) {
                    if (! $obj->has_column( $get_col, true ) ) {
                        unset( $get_cols[ $idx ] );
                    }
                }
                if (! empty( $get_cols ) ) {
                    $select_cols = $get_cols;
                    $user_options = $get_cols;
                }
            }
            if ( isset( $args['sort'] ) && isset( $args['direction'] ) ) {
                if ( $args['sort'] == 'order' && stripos( $args['direction'], 'desc' ) === 0 ) {
                    $ctx->vars['list_order_desc'] = 1;
                }
            }
            if ( $app->id == 'RESTfulAPI' ) {
                if ( $select_cols = $app->param( 'get_cols' ) ) {
                    $select_cols = $app->core_tags->select_cols( $app, $obj, $select_cols );
                }
            }
            $app->register_callback( $model, 'before_listing', 'before_listing', 5, $app );
            $app->init_callbacks( $model, 'before_listing' );
            $callback = ['name' => 'before_listing', 'model' => $model, 'cols' => $select_cols,
                         'scheme' => $scheme, 'table' => $table, 'args' => [] ];
            $app->run_callbacks( $callback, $model, $terms, $args, $select_cols, $extra, $ex_vals );
            $select_cols = $callback['cols'];
            $objects = $obj->load( $terms, $args, $select_cols, $extra, $ex_vals );
            unset( $args['limit'], $args['offset'] );
            $count_args = $args;
            unset( $count_args['sort'], $count_args['direction'] );
            $count = $app->param( 'totalResult' )
                   ? $app->param( 'totalResult' )
                   : $obj->count( $terms, $count_args, 'id', $extra, $ex_vals, true );
            $permitted_count = $count;
            if ( $count_extra !== null && $count_extra != $extra ) {
                $permitted_count =
                    $obj->count( $terms, $count_args, 'id', $count_extra, $ex_vals, true );
                    // 6th argument for urlinfo
            }
            if ( $app->id == 'RESTfulAPI' ) {
                return [(int) $count, $objects ];
            }
            $editable_count = $permitted_count;
            if (! $user->is_superuser && $obj->has_column( 'user_id' ) && $obj->has_column( 'status' ) && $app->status_published( $model ) == 4 ) {
                $editable_count = PTUtil::editable_count( $obj, $terms, $count_args, $extra, $count_extra, $ex_vals );
            }
            $items = [];
            foreach ( $objects as $_obj ) {
                $items[] = PTUtil::object_to_resource( $_obj, 'list', $user_options );
            }
            if ( $app->param( 'to_json' ) ) {
                header( 'Content-type: application/json' );
                $json = ['totalResult' => (int) $count, 'items' => $items ];
                echo json_encode( $json );
                exit();
            }
            if ( $app->param( 'dialog_view' ) && $app->param( 'select_system_filters' )
                && $app->param( 'select_system_filters' ) == 'system_objects'
                && in_array( 'workspace_id', $orig_user_options ) ) {
                unset( $orig_user_options[ array_search( 'workspace_id', $orig_user_options ) ] );
                unset( $sorted_props['workspace_id'] );
                unset( $user_options[ array_search( 'workspace_id', $user_options ) ] );
                $ctx->vars['disp_options'] = $sorted_props;
            }
            if ( $obj->has_column( 'status' ) && !isset( $ctx->vars['status_options'] ) ) {
                $statusCol = $db->model( 'column' )->load( ['table_id' => $table->id, 'name' => 'status'] );
                $ctx->vars['status_options'] = !empty( $statusCol ) ? $statusCol[0]->options : '';
            }
            $list_cols = [];
            $has_primary = false;
            $user_options = array_unique( $user_options );
            foreach ( $user_options as $option ) {
                if ( !$app->param( 'revision_select' )
                     && !isset( $list_props[ $option ] ) ) continue;
                if ( isset( $list_props[ $option ] ) &&
                     $list_props[ $option ] == 'primary' ) $has_primary = true;
                $col_props = ['_name'  => $option,
                              '_label' => $app->translate( $labels[ $option ] ),
                              '_list'  => isset( $list_props[ $option ] )
                                       ? $list_props[ $option ] : '',
                              '_type'  => $column_defs[ $option ]['type'] ];
                if ( isset( $scheme['options'] ) && isset( $scheme['options'][ $option ] ) ) {
                    $col_props['_options'] = $scheme['options'][ $option ];
                }
                $list_cols[] = $col_props;
            }
            if (!$has_primary && isset( $list_cols[1] ) ) {
                $list_cols[1]['_list'] = 'primary';
            } else if (!$has_primary ) {
                $ctx->vars['_no_primary'] = 1;
            }
            $ctx->vars['show_cols'] = $orig_user_options;
            $ctx->vars['list_cols'] = $list_cols;
            $ctx->vars['list_colspan'] = count( $list_cols ) + 1;
            $filter_params = ['terms' => $terms, 'args' => $args, 'extra' => $extra ];
            $filter_params = $app->encrypt( json_encode( $filter_params ) );
            $ctx->vars['filter_params'] = $filter_params;
            if ( $user_session ) {
                $filter_params = md5( $filter_params );
                $encrypted_filters = $user_session->text ? explode( ',', $user_session->text ) : [];
                if (! in_array( $filter_params, $encrypted_filters ) ) {
                    $encrypted_filters[] = $filter_params;
                    if ( count( $encrypted_filters ) > 30 ) {
                        array_shift( $encrypted_filters );
                    }
                    $user_session->text( implode( ',', $encrypted_filters ) );
                    $user_session->save();
                }
            }
            $ctx->vars['list_items']      = $items;
            $ctx->vars['object_count']    = $count;
            $ctx->vars['permitted_count'] = $permitted_count;
            $ctx->vars['editable_count']  = $editable_count;
            $ctx->vars['totalResult']     = $count;
            $ctx->vars['list_limit']      = $limit;
            $ctx->vars['list_offset']     = $offset;
            $ctx->vars['_has_deadline']   = $obj->has_column( 'has_deadline' );
            $next_offset = $offset + $limit;
            $prev_offset = $offset - $limit;
            if ( $count > $next_offset ) {
                $ctx->vars['next_offset'] = $next_offset;
                $last = floor( $count / $limit );
                $last_offset = $count / $limit == $last ? $last - 1 : $last;
                $last_offset *= $limit;
                if ( $next_offset != $last_offset )
                    $ctx->vars['last_offset'] = $last_offset;
            }
            if ( $prev_offset >= 0 ) $ctx->vars['has_prev'] = 1;
            $ctx->vars['prev_offset'] = $prev_offset;
            if ( $count < $next_offset ) {
                $ctx->vars['list_to'] = $count;
            } else {
                $ctx->vars['list_to'] = $next_offset;
            }
            $ctx->vars['list_from'] = $offset + 1;
        } else if ( $type === 'edit' ) {
            $obj = $db->model( $model )->new();
            $user_option = $app->get_user_opt( $model, 'edit_option', $workspace_id );
            if (! $user_option->id ) {
                $_properties = $scheme[ $type . '_properties'];
                $display_options = array_keys( $scheme[ $type . '_properties'] );
                foreach ( $_properties as $col => $prop ) {
                    if ( $col === 'id' || $prop !== 'hidden' ) {
                        $display_options[] = $col;
                    }
                }
                $fields = PTUtil::get_fields( $obj, 'displays' );
                $all_fields = PTUtil::get_fields( $obj, 'basenames' );
                array_walk( $fields, function( &$field ) { $field = 'field-' . $field; } );
                array_walk( $all_fields, function( &$field ) { $field = 'field-' . $field; } );
                $field_sort_order = array_merge( $display_options, $all_fields );
                $display_options = array_merge( $display_options, $fields );
                $field_sort_order = array_unique( array_diff( $field_sort_order, ['id'] ) );
                $ctx->vars['_field_sort_order'] = implode( ',', $field_sort_order );
            } else {
                $display_options = explode( ',', $user_option->option );
                $ctx->vars['_field_sort_order'] = $user_option->data;
            }
            if ( $app->show_editor_loader ) {
                $ctx->vars['__show_loader'] = in_array( 'richtext', array_values( $scheme['edit_properties'] ) );
            }
            $ctx->vars['__format_default'] = $table->text_format;
            $ctx->stash( 'disable_edit_options', ['status', 'user_id'] );
            $ctx->vars['can_revision']
                = $app->can_do( $model, 'revision', null, $workspace );
            $ctx->vars['hide_edit_options'] = isset( $scheme['hide_edit_options'] )
                ? $scheme['hide_edit_options'] : ['published_on', 'unpublished_on'];
            $ctx->vars['display_options'] = array_unique( $display_options );
            $ctx->vars['_auditing'] = $table->auditing;
            $ctx->vars['_revisable'] = $table->revisable;
            $ctx->vars['_assign_user'] = $table->assign_user;
            $ctx->vars['_can_hide_edit_col'] = true;
            $ctx->vars['_can_sort_edit_col'] = true;
            if ( $model == 'question' ) {
                if ( isset( $app->registry['form_validations'] ) ) {
                    $ctx->vars['form_validations'] = $app->registry['form_validations'];
                }
            }
            if ( $key = $app->param( 'view' ) ) {
                $session = [];
                if ( $screen_id ) {
                    if ( $attachmentfile = $app->param( 'attachmentfile' ) ) {
                        $screen_id .= '-' . $app->escape( $attachmentfile );
                    } else {
                        $screen_id .= '-' . $app->escape( $key );
                    }
                    $terms = ['name' => $screen_id, 'user_id' => $user->id ];
                    $session_id = $app->param( 'session_id' );
                    if ( $session_id ) {
                        $terms['id'] = (int) $session_id;
                    }
                    $session = $db->model( 'session' )->load( $terms, ['limit' => 1] );
                } else {
                    $session_id = $app->param( 'id' );
                    if ( strpos( $session_id, 'session' ) === 0 ) {
                        $session_id = str_replace( 'session-', '', $session_id );
                        $terms = ['id' => (int) $session_id, 'user_id' => $user->id ];
                        $session = $db->model( 'session' )->load( $terms, ['limit' => 1] );
                    }
                }
                if ( !empty( $session ) ) {
                    $session = $session[0];
                    $assetproperty = json_decode( $session->text, true );
                    $is_file = $session->data == $session->value && $app->fmgr->exists( $session->value );
                    $data = $is_file ? $session->value : $session->data;
                    $app->asset_out( $assetproperty, $data, $is_file );
                }
                if (! $obj->has_column( $key, true ) ) {
                    return $app->error( 'Invalid request.' );
                }
            }
            if ( $model !== 'permission' ) {
                $ctx->vars['object_user_id'] = $user->id;
            }
            if ( $id = $app->param( 'id' ) ) {
                if ( $model === 'workspace' ) {
                    $ctx->vars['page_title'] = $app->translate( '%s Settings', $label );
                } else {
                    if ( isset( $ctx->vars['forward_params'] ) && $app->param( '_revision_id' ) ) {
                        $_REQUEST['edit_revision'] = 1;
                        $app->param( 'edit_revision', 1 );
                    }
                    if ( $app->param( 'edit_revision' ) ) {
                        $ctx->vars['page_title'] = $app->translate( 'Edit Revision of %s',
                                                                                 $label );
                    } else if ( $app->param( '_profile' ) ) {
                        $ctx->vars['page_title'] = $app->translate( 'Edit Profile' );
                    } else {
                        if ( $table->menu_type == 3 ) {
                            $ctx->vars['page_title'] = $app->translate( '%s details', $label );
                        } else {
                            $ctx->vars['page_title'] = $app->translate( 'Edit %s', $label );
                        }
                    }
                }
                if (! is_numeric( $id ) ) {
                    return $app->error( 'Invalid request.' );
                }
                $id = (int) $id;
                if (!$id ) return $app->error( 'Invalid request.' );
                if ( $model == 'urlinfo' ) {
                    $obj = $db->model( $model )->get_by_key(
                        ['id' => $id, 'delete_flag' => ['IN' => [0, 1] ] ] );
                    if (! $obj->file_path ) $app->return_to_dashboard();
                } else {
                    $obj = $db->model( $model )->load( $id );
                }
                if ( is_object( $obj ) ) {
                    if ( $obj->id && $obj->_model != 'workspace' && $obj->has_column( 'workspace_id' ) ) {
                        if ( $workspace_id != $obj->workspace_id && $app->request_method === 'GET') {
                            if ( $obj->workspace_id ) {
                                $_GET['workspace_id'] = (int) $obj->workspace_id;
                            } else {
                                unset( $_GET['request_id'] );
                            }
                            unset( $_GET['request_id'] );
                            return $app->redirect( $app->admin_url . '?' . http_build_query( $_GET ) );
                        }
                    }
                    if ( $table->menu_type == 3 ) {
                        if (! $app->can_do( $model, 'update_all' ) ) {
                            $app->error( 'Permission denied.' );
                        }
                    } else if (! $app->can_do( $model, 'edit', $obj ) ) {
                        if ( $app->can_do( $model, 'list' ) ) {
                            return $app->redirect( $app->admin_url . '?__mode=view&_type=list&_model=' . $model . $app->workspace_param );
                        }
                        $app->error( 'Permission denied.' );
                    }
                    if ( $obj->has_column( 'user_id' ) ) {
                        $ctx->vars['object_user_id'] = $obj->user_id;
                    }
                    if ( $workflow->id ) {
                        if ( $owner = $obj->user ) {
                            $group_name =
                                $app->permission_group( $owner, $model, $workspace_id );
                            $ctx->vars['_workflow_owner_type'] = $group_name;
                        }
                    }
                    if ( $table->revisable ) {
                        if ( $obj->rev_type && !$app->param( 'edit_revision' ) && $app->request_method == 'GET' ) {
                            return $app->redirect( $app->admin_url
                                . '?' . $app->query_string . '&edit_revision=1' );
                        }
                        $revisions = $db->model( $obj->_model )->count(
                            ['rev_object_id' => $obj->id ] );
                        $ctx->vars['_revision_count'] = $revisions;
                    }
                    if ( $primary = $table->primary ) {
                        $primary = strip_tags( $obj->$primary );
                        if ( isset( $scheme['translate'] ) ) {
                            if ( in_array( $table->primary, $scheme['translate'] ) ) {
                                $primary = $app->translate( $primary );
                            }
                        }
                        $ctx->vars['html_title'] = $primary . ' | '
                            . $ctx->vars['page_title'];
                    }
                    if ( $obj->has_column( 'workspace_id' ) ) {
                        if ( $workspace && $workspace->id != $obj->workspace_id ) {
                            $app->return_to_dashboard();
                        }
                    }
                    $ctx->stash( $model, $obj );
                    $ctx->stash( 'object', $obj );
                    $ctx->stash( 'model', $model );
                    if ( $key = $app->param( 'view' ) ) {
                        $assetproperty = $app->get_assetproperty( $obj, $key );
                        if ( $obj->$key ) {
                            $app->asset_out( $assetproperty, $obj->$key );
                        } else if ( $obj->$key === null ) {
                            // Lost file when specifying PADO_DB_BLOB2FILE setting.
                            $url = $app->db->model( 'urlinfo' )->get_by_key(
                              ['object_id' => $obj->id, 'model' => $obj->_model, 'key' => $key, 'class' => 'file'] );
                            if ( $url->id && $app->fmgr->exists( $url->file_path ) ) {
                                $obj->$key( $app->fmgr->get( $url->file_path ) );
                                $obj->save();
                                $app->asset_out( $assetproperty, $obj->$key );
                            }
                        }
                    }
                    if ( $app->param( 'edit_revision' ) && $obj->has_column( 'status' ) ) {
                        if ( $rev_object_id = (int) $obj->rev_object_id ) {
                            $master = $db->model( $obj->_model )->load( $rev_object_id, ['limit' => 1], 'status,modified_on' );
                            if (! $master ) {
                                if ( !$app->leave_revisions ) {
                                    return $app->error( 'Cannot load %s (ID:%s)', [ 
                                        $app->translate( $table->label ), $rev_object_id ] );
                                }
                                $ctx->vars['_master_deleted'] = true;
                            } else {
                                if ( $obj->rev_object_id != $obj->id ) {
                                    $ctx->vars['_rev_object_id'] = $rev_object_id;
                                } else {
                                    $ctx->vars['_master_deleted'] = true;
                                }
                                $ctx->vars['_master_status'] = $master->status;
                                if ( $app->update_rev_created && $table->auditing && $obj->rev_type == 2 ) {
                                    if ( $obj->created_on < $master->modified_on && $obj->modified_on < $master->modified_on ) {
                                        $ctx->vars['_master_updated'] = true;
                                    }
                                }
                            }
                        }
                    }
                    $ctx->vars['can_delete'] = $app->can_do( $model, 'delete', $obj );
                    if ( $model === 'template' ) {
                        if ( $app->compile_check ) {
                            $regex = '/<\${0,1}' . $ctx->prefix . '/si';
                            $text = $app->linked_file === 2 ? $obj->_text( $app ) : $obj->text;
                            if ( $obj->id && preg_match( $regex, $text ) ) {
                                $compile_check = $app->compile_check && !isset( $ctx->vars['parser_errors'] );
                                $app->child_modules = [];
                                ob_start();
                                $app->init_tags( true );
                                $_ctx = clone $ctx;
                                $_ctx->stash( 'current_template', $obj );
                                $__stash = $_ctx->__stash;
                                $local_vars = $_ctx->local_vars;
                                $vars = $_ctx->vars;
                                if ( $compile_check ) {
                                    $tag_parser = new PTTagParser( $app, $_ctx );
                                }
                                // Set Context from URLMapping.
                                PTUtil::set_ctx_from_template( $_ctx, $obj );
                                $compiled = $app->build_pre_parse ? false : true;
                                $_ctx->app->in_compile = true;
                                $_ctx->build( $text, $compiled, $obj->cache_key );
                                $_ctx->app->in_compile = false;
                                $_ctx->compiled = [];
                                $_ctx->vars = $vars;
                                $_ctx->local_vars = $local_vars;
                                $_ctx->__stash = $__stash;
                                $includes = array_values( $app->modules );
                                $ctx->vars['_include_modules'] = $includes;
                                ob_end_clean();
                                $app->build_pre_parse = 0;
                                if ( $compile_check ) {
                                    $ctx->unregister_callback( 'pt_pre_parse_filter', 'pre_parse_filter' );
                                    $_ctx->unregister_callback( 'pt_pre_parse_filter', 'pre_parse_filter' );
                                    $app->ctx->unregister_callback( 'pt_pre_parse_filter', 'pre_parse_filter' );
                                    $ctx->vars['parser_errors'] = $app->stash( 'parser_errors' );
                                    if (! $app->eval_in_view && stripos( $text, '<?php' ) !== false ) {
                                        $ctx->vars['parser_errors'][]
                                            = $app->translate( 'Writing PHP code in views is not allowed.' );
                                    }
                                }
                            }
                        }
                        $ctx->vars['_has_mapping'] = isset( $ctx->vars['_has_mapping'] ) ? $ctx->vars['_has_mapping'] : 1;
                    }
                } else {
                    $app->return_to_dashboard();
                }
            } else {
                if (! $app->can_do( $model, 'create' ) ) {
                    $app->error( 'Permission denied.' );
                }
                $ctx->vars['page_title'] = $app->translate( 'New %s', $label );
                $obj = $obj ? $obj : $db->model( $model )->new();
                $ctx->vars['permalink'] = 1;
                if ( $obj->has_column( 'published_on' ) ) {
                    $date_format = $app->published_on_default;
                    $obj->published_on( date( $date_format ) );
                }
                if ( $obj->has_column( 'user_id' ) && $model !== 'permission' ) {
                    $obj->user_id( $app->user()->id );
                }
                if ( $obj->has_column( 'workspace_id' ) ) {
                    $obj->workspace_id( $workspace_id );
                }
                $ctx->stash( 'object', $obj );
            }
            if ( $table->menu_type == 3 ) {
                if (! $app->can_do( $model, 'update_all' ) ) {
                    $app->error( 'Permission denied.' );
                }
            } else if (! $app->can_do( $model, $type, $obj ) ) {
                $app->error( 'Permission denied.' );
            }
            if ( $app->param( 'cloned' ) && $obj->has_column( 'status' ) ) {
                $status_col = $db->model( 'column' )->get_by_key(
                    ['name' => 'status', 'table_id' => $table->id] );
                if ( $status_col->id && $status_col->options ) {
                    $status_opts = explode( ',', $status_col->options );
                    $obj_status = $max_status == 2 ? $obj->status - 1 : $obj->status;
                    $ctx->vars['label_and_status'] =
                        [ $label, $app->translate( $status_opts[ $obj_status ] ) ];
                }
            }
            if ( $workflow->id ) {
                $ctx->vars['_workflow_approval_type'] = $workflow->approval_type;
                $ctx->vars['_workflow_remand_type'] = $workflow->remand_type;
                $group_name = $app->permission_group( $user, $model, $workspace_id );
                $ctx->vars['_workflow_user_type'] = $group_name;
                $ctx->stash( 'workflow', $workflow );
                $app->stash( 'workflow', $workflow );
                if ( $obj->id ) {
                    $log_terms = ['model' => $obj->_model, 'object_id' => $obj->id, 'created_by' => ['!=' => $user->id ] ];
                    $user_logs = $app->db->model( 'log' )->count( $log_terms );
                    $ctx->vars['_workflow_user_count'] = $user_logs;
                    if ( $group_name == 'publisher' && $user_logs ) {
                        $notify_meta = $app->db->model( 'meta' )->get_by_key(
                        ['model' => $model, 'object_id' => $obj->id,
                         'kind' => 'notify_at_published', 'key' => $user->id] );
                        $ctx->vars['_workflow_message'] = $notify_meta->text;
                    }
                }
            }
            $ctx->vars['can_create'] = $app->can_do( $model, 'create' );
            $ctx->stash( 'current_context', $model );
            $ctx->vars['screen_id'] = $screen_id ? $screen_id : $app->magic();
            $edit_properties = isset( $app->registry['edit_properties'] )
                             ? $app->registry['edit_properties'] : [];
            if ( $model == 'table' ) {
                $validations = $app->registry['cms_validations'];
                PTUtil::sort_by_order( $validations );
                $ctx->vars['cms_validations'] = $validations;
                if (! empty( $edit_properties ) ) {
                    PTUtil::sort_by_order( $edit_properties );
                    $ctx->vars['edit_properties'] = $edit_properties;
                }
            }
            if (! empty( $edit_properties ) ) {
                $properties = $scheme['edit_properties'];
                $custom = array_unique( array_intersect( array_values( $properties ), array_keys( $edit_properties ) ) );
                if (! empty( $custom ) ) {
                    foreach ( $properties as $col => $property ) {
                        if ( in_array( $property, $custom ) ) {
                            $custom_prop = $edit_properties[ $property ];
                            $prop_plugin = $app->component( $custom_prop['component'] );
                            $prop_meth = $custom_prop['method'];
                            if ( $prop_plugin && method_exists( $prop_plugin, $prop_meth ) ) {
                                $prop_plugin->$prop_meth( $app, $obj, $col, $col );
                            }
                        }
                    }
                }
            }
            if ( $model === 'workspace' ) {
                require_once( LIB_DIR . 'Prototype' . DS . 'timezones.php' );
                $ctx->vars['timezones'] = $timezones; // timezone_identifiers_list();
            }
            if ( $app->get_permalink( $obj, true ) ) {
                $ctx->vars['has_mapping'] = 1;
                $permalink = $model === 'workspace' ? $obj->site_url : $app->get_permalink( $obj );
                $ctx = $app->ctx;
                if ( $permalink && $app->allow_login && $app->add_param_permalink && $obj->has_column( 'status' ) ) {
                    $app->add_param_permalink( $obj, $permalink );
                }
                $ctx->vars['permalink'] = $permalink;
            } else if ( $model === 'workspace' ) {
                $ctx->vars['permalink'] = $obj->site_url;
            }
        } else if ( $type === 'hierarchy' ) {
            if (! $can_hierarchy ) {
                $app->error( 'Permission denied.' );
            }
            $ctx->vars['primary_col'] = $table->primary;
            $unique = $scheme['unique'] ?? [];
            $ctx->vars['label_unique'] = in_array( $table->primary, $unique );
            $ctx->vars['page_title'] = $app->param( 'dialog_view' )
                                     ? $app->translate( 'Manage %s', $plural )
                                     : $app->translate( 'Manage %s Hierarchy', $plural );
            if ( $app->param( 'saved_hierarchy' ) ) {
                $ctx->vars['header_alert_message'] =
                    $app->translate( '%s hierarchy saved successfully.', $plural );
                if ( $app->param( '_insert' ) || $app->param( '_update' ) || $app->param( '_delete' ) ) {
                    $params = [ $plural, (int)$app->param( '_insert' ),
                               (int)$app->param( '_update' ), (int)$app->param( '_delete' ) ];
                    $ctx->vars['header_alert_message'] =
                        $app->translate( '%s hierarchy saved successfully( Insert : %s, Update : %s, Delete : %s ).', $params );
                }
            }
        }
        $ctx_obj = isset( $obj ) ? $obj : $db->model( $model )->new();
        $ctx->vars['accept_comment'] = $ctx_obj->has_column( 'allow_comment' );
        if ( $type == 'edit' && ( $model == 'entry' || $model == 'page' ) ) {
            if ( $workspace ) {
                $ctx->vars['show_path_entry'] = $workspace->show_path_entry;
                $ctx->vars['show_path_page'] = $workspace->show_path_page;
            } else {
                $show_path_entry = $app->get_config( 'show_path_entry' );
                $ctx->vars['show_path_entry'] = $show_path_entry && $show_path_entry->value;
                $show_path_page = $app->get_config( 'show_path_page' );
                $ctx->vars['show_path_page'] = $show_path_page && $show_path_page->value;
            }
        }
        $ctx->vars['return_args'] = http_build_query( $app->return_args );
        $ctx->local_vars = [];
        if (! empty( $app->hooks ) ) {
            $app->run_hooks( 'pre_view' );
        }
        $app->ctx = $ctx;
        return $app->build_page( $tmpl );
    }

    function association_user_ids ( $user = null ) {
        $user = $user ? $user : $this->user();
        if (! $user ) return [];
        if ( $user_ids = $this->stash( 'association_user_ids_' . $user->id ) ) {
            return $user_ids;
        }
        $terms = ['name' => 'users', 'from_obj' => 'association', 'to_obj' => 'user', 'to_id' => $user->id ];
        $relations = $this->db->model( 'relation' )->load_iter( $terms, null, 'from_id' );
        $relations = $relations->fetchAll( PDO::FETCH_COLUMN );
        if ( empty( $relations ) ) return [ $user->id ];
        $terms['to_id'] = ['!=' => $user->id ];
        $terms['from_id'] = ['IN' => $relations ];
        $relations = $this->db->model( 'relation' )->load_iter( $terms, null, 'to_id' );
        $relations = $relations->fetchAll( PDO::FETCH_COLUMN );
        $relations[] = $user->id;
        $this->stash( 'association_user_ids_' . $user->id, $relations );
        return array_unique( $relations );
    }

    function build ( $text, $ctx = null, $force = true ) {
        $app = $this;
        $ctx = $ctx ? $ctx : $app->ctx;
        $ctx->vars['theme_static'] = $app->theme_static;
        $ctx->vars['application_dir'] = __DIR__;
        $ctx->vars['application_path'] = $app->path;
        return $ctx->build( $text, false, null, $force );
    }

    function build_page ( $tmpl, $param = [], $output = true, $exit = true ) {
        $headers_sent = headers_sent();
        $app = $this;
        if (!$app->debug && $output && !$headers_sent ) {
            if (!$app->request_method == 'GET' || !$app->conditional ) {
                header( 'Cache-Control: no-store, no-cache, must-revalidate' );
                header( 'Cache-Control: post-check=0, pre-check=0', false );
            }
            header( 'X-XSS-Protection:1; mode=block' );
            header( 'X-Frame-Options:SAMEORIGIN' );
            header( 'Content-type: text/html; charset=UTF-8' );
        }
        if (! isset( $app->ctx->vars['appname'] ) ) {
            $appname = $app->appname;
            if (! $appname ) {
                if ( $cfg = $app->get_config( 'appname' ) ) {
                    $appname = $cfg->value;
                } else {
                    $appname = 'System';
                }
            }
            $app->ctx->vars['appname'] = $appname;
        }
        if ( $tmpl == 'two_factor_auth.tmpl' && $app->id == 'Bootstrapper' ) {
            $request_uri = $app->escape( $app->request_uri );
            list( $request, $params ) = array_pad( explode( '?', $request_uri ), 2, null );
            $app->ctx->vars['script_uri'] = $request;
            $app->ctx->vars['return_url'] = $request;
        }
        $app->ctx->vars['debug_mode'] = $app->debug;
        $alternative = null;
        $model = $app->param( '_model' );
        $type = $app->param( '_type' );
        if ( ( $app->mode == 'view' || isset( $app->ctx->vars['forward_params'] ) )
            && $app->user() ) {
            $alternative = "{$type}_{$model}.tmpl";
            $alternative = $app->ctx->get_template_path( $alternative );
        }
        if ( $app->mode == 'view' && $type ) {
            $alt_tmplates_key = 'alt-tmpl' . DS . $type . DS . $model;
            if (! $app->develop ) {
                $alt_tmplates = $app->get_cache( $alt_tmplates_key );
                if ( $alt_tmplates !== null ) {
                    $app->core_tags->include_parts = $alt_tmplates;
                }
            }
        }
        if ( method_exists( $app, 'get_template_from_db' ) ) {
            $alternative = $app->get_template_from_db( $app->mode );
            $tmpl = $alternative ? $alternative : $tmpl;
        }
        $tags = $app->ctx->tags;
        if ( $app->id == 'Prototype' && !$app->develop && !$app->cfg_init_tags && !empty( $app->core_tags->core_tags ) ) {
            if (! isset( $app->ctx->vars['error'] ) || ! $app->ctx->vars['error'] ) { // parser_errors
                $app->ctx->tags = $app->core_tags->core_tags;
            }
        }
        $workspace_id = (int) $app->param( 'workspace_id' );
        $body_class = '';
        if ( $app->param( 'dialog_view' ) ) {
            $body_class .= ' dialog';
        }
        $body_class .= $workspace_id ? ' is-workspace workspace-' . $workspace_id : ' is-system';
        if ( $app->debug ) {
            $body_class .= ' with-debug-footer';
        }
        if ( $type && $model ) {
            $body_class .= " {$type}-{$model}";
        }
        $body_class .= ' mode-' . $app->mode . ' ';
        if ( $tmpl && is_object( $tmpl ) ) {
            $text = $app->linked_file === 2 ? $tmpl->_text( $app ) : $tmpl->text;
            $basename = $tmpl->basename;
            $callback = ['name' => 'template_source', 'template' => $basename, 'model' => $model ];
            $app->init_callbacks( $basename, 'template_source' );
            $app->run_callbacks( $callback, $basename, $param, $text );
            $body_class .= $app->ctx->vars['body_class'] ?? '';
            $app->ctx->vars['body_class'] = $body_class;
            $out = $app->id == 'Prototype' ? $app->build( $text ) : $app->build( $text, $app->ctx, false );
            $app->init_callbacks( $basename, 'template_output' );
            $callback['name'] = 'template_output';
            $app->run_callbacks( $callback, $basename, $param, $text, $out );
        } else {
            $tmpl = $alternative ? $alternative : $app->ctx->get_template_path( $tmpl );
            if (!$tmpl ) return;
            $src = prototype_file_get_contents( $tmpl );
            $cache_id = null;
            $callback = ['name' => 'template_source', 'template' => $tmpl, 'model' => $model ];
            $basename = pathinfo( $tmpl, PATHINFO_FILENAME );
            $original = $src;
            if ( $alternative && $basename !== $type ) {
                $app->init_callbacks( $type, 'template_source' );
                $app->run_callbacks( $callback, $type, $param, $src );
            }
            $app->init_callbacks( $basename, 'template_source' );
            $app->run_callbacks( $callback, $basename, $param, $src );
            if ( $original == $src ) {
                $src = null;
            } else {
                if (! $app->force_compile ) {
                    // Generate a file in this case even if cache_driver is specified.
                    $tmpl_src = $app->ctx->prefix . '__' . md5( $src ) . '.tmpl';
                    $tmpl_src = $app->compile_dir . $tmpl_src;
                    if (! $app->fmgr->exists( $tmpl_src ) ) {
                        @file_put_contents( $tmpl_src, $src );
                    }
                    if ( file_exists( $tmpl_src ) ) {
                        $tmpl = $tmpl_src;
                        $src = null;
                    }
                }
            }
            $body_class .= $app->ctx->vars['body_class'] ?? '';
            $app->ctx->vars['body_class'] = $body_class;
            $out = null;
            try { // Invalid Cache
                $out = $app->ctx->build_page( $tmpl, $param, $cache_id, false, $src );
            } catch ( Exception $e ) {
                $app->clear_all_cache( false, false );
                $out = $app->ctx->build_page( $tmpl, $param, $cache_id, false, $src );
            }
            if ( $out === null || ! trim( $out ) ) {
                $app->clear_all_cache( false, false );
                $out = $app->ctx->build_page( $tmpl, $param, $cache_id, false, $src );
            }
            $callback = ['name' => 'template_output', 'template' => $tmpl ];
            if ( $alternative && $basename !== $type ) {
                $app->init_callbacks( $type, 'template_output' );
                $app->run_callbacks( $callback, $type, $param, $src, $out );
            }
            $app->init_callbacks( $basename, 'template_output' );
            $app->run_callbacks( $callback, $basename, $param, $src, $out );
        }
        if ( $app->mode == 'view' && $app->param( '_type' ) ) {
            $app->set_cache( $alt_tmplates_key, $app->core_tags->include_parts );
        }
        $app->ctx->tags = $tags;
        $app->init_tags = false;
        if (!$output ) return $out;
        if ( $app->debug ) {
            $ctx = new PAML;
            $app->update_ctx_include_paths( $ctx );
            $ctx->compile_dir = $app->compile_dir;
            $ctx->force_compile = $app->force_compile;
            if ( is_object( $app->cache_driver ) ) $ctx->cache_driver = $app->cache_driver;
            $ctx->prefix = 'mt';
            $time = microtime( true );
            $processing_time = $time - $this->start_time;
            $debug_tmpl = TMPL_DIR . DS . 'include' . DS . 'footer_debug.tmpl';
            $ctx->vars['processing_time'] = round( $processing_time, 2 );
            $ctx->vars['peak_memory'] = function_exists( 'memory_get_peak_usage' )
                                      ? memory_get_peak_usage( true ) /1024/ 1024 : '-';
            $ctx->vars['load_avg']    = function_exists( 'sys_getloadavg' )
                                      ? round( sys_getloadavg()[0], 2 ) : '-';
            $ctx->vars['prototype_path'] = $this->app_path ? $this->app_path : $this->path;
            $ctx->vars['cache_path'] = $app->ctx->cache_path;
            if ( is_string( $tmpl ) ) {
                $ctx->vars['template_path'] = $tmpl;
            }
            $ctx->vars['debug_mode'] = is_int( $app->debug ) ? $app->debug : 1;
            if ( $app->db ) {
                $ctx->vars['queries'] = $app->db->queries;
                $ctx->vars['query_count'] = count( $app->db->queries );
                $ctx->vars['db_errors'] = $app->db->errors;
            }
            $ctx->vars['errors'] = $app->errors;
            $query_string = $app->query_string( true, true, "\n" );
            $ctx->vars['query_string'] = $query_string;
            $debug = $ctx->build( prototype_file_get_contents( $debug_tmpl ) );
            $out = preg_replace( '!<\/body>!', $debug . '</body>', $out );
        }
        if (!$app->debug && !$headers_sent ) {
            ignore_user_abort( true );
            while( ob_get_level() ) { ob_end_clean(); }
            if ( $app->conditional && !$app->debug && $app->request_method == 'GET' ) {
                $etag = '"' . md5( $out ) . '"';
                if ( isset( $_SERVER['HTTP_IF_NONE_MATCH'] )
                    && $_SERVER['HTTP_IF_NONE_MATCH'] == $etag ) {
                    header( $app->protocol . ' 304 Not Modified');
                    header( 'Connection: close' );
                    flush();
                    if ( $exit ) exit();
                    return;
                }
                $last_modified = gmdate( "D, d M Y H:i:s", $app->start_time ) . ' GMT';
                header( "Last-Modified: $last_modified" );
                header( "ETag: $etag" );
            }
            $file_size = strlen( bin2hex( $out ) ) / 2;
            header( $app->protocol . ' 200 OK' );
            header( "Content-Length: {$file_size}" );
            header( 'Connection: close' );
            echo $out;
            flush();
            if ( $exit ) exit();
            return;
        }
        if ( $this->output_compression && !$headers_sent ) {
            ini_set( 'zlib.output_compression', 'On' );
        }
        echo $out;
        if ( $exit ) exit();
    }

    function list_action ( $app ) {
        $actions_class = new PTListActions();
        return $actions_class->list_action( $app );
    }

    function wait_export ( $app ) {
        $actions_class = new PTListActions();
        return $actions_class->wait_export( $app );
    }

    function wait_import ( $app ) {
        $import_class = new PTImporter();
        return $import_class->wait_import( $app );
    }

    function encrypt ( $text, $key = '', $meth = 'AES-128-ECB' ) {
        if (!$key ) $key = $this->encrypt_key;
        return bin2hex( openssl_encrypt( $text, $meth, $key ) );
    }

    function decrypt ( $text, $key = '', $meth = 'AES-128-ECB' ) {
        if (!$key ) $key = $this->encrypt_key;
        return openssl_decrypt( hex2bin( $text ), $meth, $key );
    }

    function get_current_permalink ( $app ) {
        $app->validate_magic( true );
        $model = $app->param( '_model' );
        $id = $app->param( 'id' );
        if (! $id || ! $model ) {
            $app->json_error( 'Invalid request.' );
        }
        $obj = $app->db->model( $model )->load( (int) $id );
        if (! $obj || ! $app->can_do( $model, 'edit', $obj ) ) {
            $app->json_error( 'Permission denied.' );
        }
        header( 'Content-type: application/json' );
        $permalink = $app->get_permalink( $obj );
        if (! $app->param( 'no_param' ) && $app->allow_login
            && $app->add_param_permalink && $obj->has_column( 'status' ) ) {
            $app->add_param_permalink( $obj, $permalink );
        }
        $result = ['permalink' => $permalink ];
        $link_url = $app->workspace() ? $app->workspace()->link_url : $app->link_url;
        $result['view_link'] = $permalink;
        if ( $link_url ) {
            $site_url = $app->workspace() ? $app->workspace()->site_url : $app->site_url;
            $site_url = preg_quote( $site_url, '/' );
            $view_link = preg_replace( "/^{$site_url}/", $link_url, $permalink );
            $result['view_link'] = $view_link;
        }
        echo json_encode( $result );
    }

    function add_param_permalink ( $obj, &$permalink ) {
        $app = $this;
        $status_published = $app->status_published( $obj->_model );
        if ( $obj->status != $status_published ) {
            $scope_id = $obj->workspace_id ? $obj->workspace_id : 0;
            if ( $app->stash( 'admin_base_' . $scope_id ) && $app->stash( 'scope_base_' . $scope_id ) ) {
                $admin_base = $app->stash( 'admin_base_' . $scope_id );
                $scope_base = $app->stash( 'scope_base_' . $scope_id );
            } else {
                $site_url = $obj->workspace ? $obj->workspace->site_url : $app->site_url;
                $admin_base = preg_replace( '!(^https{0,1}://.*?/).*$!', '$1', $app->admin_url );
                $scope_base = preg_replace( '!(^https{0,1}://.*?/).*$!', '$1', $site_url );
                $app->stash( 'admin_base_' . $scope_id, $admin_base );
                $app->stash( 'scope_base_' . $scope_id, $scope_base );
            }
            if ( $admin_base != $scope_base ) {
                $permalink .= '?__mode=login';
            }
        }
        return $permalink;
    }

    function get_permalink ( $obj, $has_map = false, $rebuild = true, $system = false ) {
        if (! $obj->id && $has_map === false ) return null;
        $app = $this;
        $table = $app->get_table( $obj->_model );
        if ( $obj->_model == 'asset' || $obj->_model == 'attachmentfile' ) {
            $terms = ['model' => $obj->_model, 'object_id' => $obj->id,
                      'class' => 'file', 'key' => 'file', 'delete_flag' => [0, 1] ];
            if ( $obj->_model == 'asset' ) {
                $values = $obj->get_values( true );
                if ( isset( $values['extra_path'] ) && isset( $values['file_name'] ) ) {
                    $path = '%r/' . $values['extra_path'] . $values['file_name'];
                    $terms['relative_path'] = $path;
                }
            }
            $url = $app->db->model( 'urlinfo' )->load( $terms,
                  ['limit' => 1, 'sort' => ['delete_flag' => 'ascend', 'id' => 'descend'] ],
                   'url,workspace_id' );
            if ( is_array( $url ) && ! empty( $url ) ) {
                $_url = $url[0]->url;
                if ( $obj->_model == 'asset' && !$app->encode_filename_compat ) {
                    $_url = $app->ctx->modifier_encode_url_basename( $_url, 1, $app->ctx );
                }
                return $app->replace_link( $_url, $url[0]->workspace );
            }
            return false;
        }
        $terms = ['model' => $obj->_model ];
        if ( $obj->_model === 'template' ) {
            $terms['template_id'] = $obj->id;
            unset( $terms['model'] );
        }
        if ( is_string( $rebuild ) ) {
            $cols = $rebuild;
            $rebuild = false;
        } else {
            $cols = $has_map ? 'id' : '*';
        }
        $args = [];
        $workspace = null;
        if (! $system && $obj->has_column( 'workspace_id' ) ) {
            $terms['workspace_id'] = (int) $obj->workspace_id;
            if ( $obj->workspace_id ) {
                $workspace = $obj->workspace;
            }
        }
        $terms['is_preferred'] = 1;
        $cache_key = 'urlmapping_cache_' . $this->make_cache_key( $terms, $args, md5( $cols ) );
        $urlmapping = $app->stash( $cache_key ) ? $app->stash( $cache_key )
                    : $app->db->model( 'urlmapping' )->load( $terms, $args, $cols );
        if ( empty( $urlmapping ) ) {
            unset( $terms['is_preferred'] );
            $urlmapping = $app->db->model( 'urlmapping' )->load( $terms, $args, $cols );
        }
        if (! empty( $urlmapping ) && ! $obj->id ) {
            if ( $has_map ) return $urlmapping[0];
            return $app->build_path_with_map( $obj, $urlmapping[0], $table, null, true );
        } else if (! $obj->id ) {
            return '';
        }
        if ( empty( $urlmapping ) && ! $system && $obj->workspace_id ) {
            $app->get_permalink( $obj, $has_map, $rebuild, true );
        }
        $app->stash( $cache_key, $urlmapping );
        if (! empty( $urlmapping ) ) {
            if ( $has_map ) return $urlmapping[0];
            $url_map_ids = [];
            foreach ( $urlmapping as $urlmap ) {
                $url_map_ids[] = $urlmap->id;
            }
            $urlmapping = $urlmapping[0];
            if ( $obj->_model === 'template' ) {
                $ui = $app->db->model( 'urlinfo' )->get_by_key( [
                      'urlmapping_id' => $urlmapping->id,
                      'delete_flag' => 0, 'class' => 'archive'], null, 'url' );
                return $app->replace_link( $ui->url, $workspace );
            }
            if ( $has_map !== 0 && $obj->has_column( 'rev_type' ) && $obj->rev_type && $obj->rev_object_id ) {
                $rev_object_id = (int)$obj->rev_object_id;
                $obj = $app->db->model( $obj->_model )->load( $rev_object_id );
                if (!$obj ) return;
            }
            $terms = ['urlmapping_id' => ['IN' => $url_map_ids ], 'model' => $table->name,
                      'class' => 'archive', 'object_id' => $obj->id, 'delete_flag' => 0];
            $cache_key = 'urlmapping_cache_' . $this->make_cache_key( $terms );
            $ui = $app->stash( $cache_key ) ? $app->stash( $cache_key )
                : $app->db->model( 'urlinfo' )->get_by_key( $terms, null, 'id,url,delete_flag' );
            if (! $ui->id ) {
                $terms['delete_flag'] = [0, 1];
                $urlobjs = $app->db->model( 'urlinfo' )->load( $terms,
                          ['sort' => ['delete_flag' => 'ascend', 'id' => 'descend'] ], 'id,url,delete_flag' );
                if (! empty( $urlobjs ) ) {
                    $ui = $urlobjs[0];
                } else {
                    $url = $app->build_path_with_map( $obj, $urlmapping, $table, null, true );
                    foreach ( $urlobjs as $urlinfo ) {
                        if ( $urlinfo->url == $url ) {
                            $ui = $urlinfo;
                        }
                    }
                }
            }
            if ( $app->cache_permalink ) $app->stash( $cache_key, $ui );
            if ( $ui && $ui->id ) {
                $app->stash( $cache_key, $ui );
                return $app->replace_link( $ui->url, $workspace );
            } else {
                return $app->replace_link( $app->build_path_with_map( $obj, $urlmapping, $table, null, true ), $workspace );
            }
        } else if ( $obj->id && $app->id === 'Prototype' && $app->mode === 'view' ) {
            $column = $app->db->model( 'column' )->get_by_key(
                ['table_id' => $table->id, 'edit' => 'file'], ['sort' => 'order'], 'id,name' );
            if ( $column->id ) {
                $terms = ['object_id' => $obj->id, 'model' => $obj->_model,
                          'class' => 'file', 'key' => $column->name, 'delete_flag' => [0, 1] ];
                $ui = $app->db->model( 'urlinfo' )->get_by_key( $terms, ['sort' => 'delete_flag'], 'id,url' );
                if ( $ui->id ) {
                    return $app->replace_link( $ui->url, $workspace );
                }
            }
        }
        return false;
    }

    function replace_link ( $url, $workspace = false ) {
        if ( $this->mode !== 'view' ) {
            return $url;
        }
        $workspace = $workspace !== false ? $workspace : $this->workspace();
        $show_both = $workspace ? $workspace->show_both : $this->show_both;
        if ( $show_both ) {
            return $url;
        }
        $link_url = $this->workspace() ? $this->workspace()->link_url : $this->link_url;
        if ( $link_url ) {
            $site_url = $this->workspace() ? $this->workspace()->site_url : $this->site_url;
            $url = str_replace( $site_url, $link_url, $url );
        }
        return $url;
    }

    function make_cache_key ( $arr1, $arr2 = null, $prefix = '' ) {
        ob_start();
        print_r( $arr1 );
        print_r( $arr2 );
        $res = ob_get_clean();
        $res = md5( $res );
        return $prefix ? "{$prefix}_{$res}" : $res;
    }

    function max_status ( $user, $model, $workspace = null ) {
        $app = $this;
        if ( is_numeric( $workspace ) )
            $workspace = $app->db->model( 'workspace' )->load( (int) $workspace, null, 'id' );
        $workspace = $workspace ? $workspace : $app->workspace();
        $workspace_id = is_object( $workspace ) ? $workspace->id : 0;
        $table = $app->get_table( $model );
        if ( $table === null ) return 1;
        $max_status = 1;
        if ( $user->is_superuser ) {
            $max_status = $table->start_end ? 5 : $app->status_published( $model );
        } else {
            if ( $table->has_status ) {
                $group_name = $app->permission_group( $user, $model, $workspace_id );
                $status_published = $app->status_published( $model );
                if ( $status_published === 4 ) {
                    if (! $group_name ) {
                        return -1;
                    } else if ( $group_name == 'creator' ) {
                        return 0;
                    } else if ( $group_name == 'reviewer' ) {
                        return 1;
                    } else if ( $group_name == 'publisher' ) {
                        return 5;
                    }
                } else {
                    if ( $group_name == 'publisher' ) {
                        return 2;
                    } else if (! $group_name ) {
                        return 0;
                    }
                }
            }
        }
        return $max_status;
    }

    function is_workspace_admin ( $workspace_id, $user = null ) {
        $app = $this;
        if ( is_object( $workspace_id ) ) {
            $workspace_id = $workspace_id->id;
        }
        $user = $user ? $user : $app->user();
        if (! $user ) return false;
        if ( $user->is_superuser ) return true;
        $perms = $app->permissions( $user );
        if ( isset( $perms[ $workspace_id ] ) ) {
            $perms = $perms[ $workspace_id ];
            return in_array( 'workspace_admin', $perms );
        }
        return false;
    }

    function can_do ( $model, $action = null, $obj = null,
        $workspace = null, $user = null ) {
        $app = $this;
        $user = !$user ? $app->user() : $user;
        if ( $user && $user->_model !== 'user' ) return false;
        if (!$user ) return false;
        $workspace = is_object( $workspace ) ? $workspace : $app->workspace();
        if ( $model === 'superuser' || $model === 'is_superuser' ) {
            return $user->is_superuser;
        }
        $orig_action = $action ? $action : $model;
        $sys_perms = $app->permissions;
        if ( $model !== 'is_superuser' && !$action && strpos( $model, '_' ) !== false && !in_array( $model, $sys_perms ) ) {
            if ( strpos( $model, 'can_' ) === 0 ) {
                list( $can, $action, $model ) = explode( '_', $model );
            } else {
                list( $action, $model ) = explode( '_', $model );
            }
        }
        if ( in_array( $model, $sys_perms ) && is_object( $action ) ) {
            if ( $action->_model == 'workspace' ) {
                $workspace = $action;
            }
        }
        if (! $model ) {
            $model = $action;
        }
        $table = $model && !in_array( $model, $sys_perms ) ? $app->get_table( $model ) : null;
        $permissions = $app->permissions( $user );
        $app->init_callbacks( $model, 'can_do' );
        $callback = ['name' => 'can_do', 'model' => $model, 'permissions' => $permissions, 'table' => $table,
                     'user' => $user, 'can_do' => null, 'action' => $action, 'workspace' => $workspace ];
        $app->run_callbacks( $callback, $model, $obj );
        if ( is_bool( $callback['can_do'] ) ) {
            return $callback['can_do'];
        }
        if ( !in_array( $model, $sys_perms ) ) {
            if (! $workspace && $obj && $obj->has_column( 'workspace_id' )
                && ( $app->mode == 'view' && $app->param( '_type' ) != 'list' ) ) {
                if ( $table && $table->space_child ) {
                    return false;
                }
            } else if ( $workspace && $obj && $obj->id &&
                $obj->has_column( 'workspace_id' ) ) {
                if ( $workspace->id != $obj->workspace_id ) {
                    return false;
                } else if ( isset( $permissions[ $workspace->id ] ) && in_array( 'workspace_admin', $permissions[ $workspace->id ] ) ) {
                    return true;
                }
            }
        }
        if ( !in_array( $model, $sys_perms ) ) {
            if ( $app->mode !== 'list_action' && $app->mode !== 'get_thumbnail' ) {
                if (!$workspace && ( $obj && ! $obj->workspace ) ) {
                    if ( $table && $table->space_child && $action === 'edit' ) {
                        return false;
                    } else if ( $table && $action === 'list' && !$table->display_system ) {
                        return false;
                    }
                }
            }
        }
        if ( $model == 'user' ) {
            if ( $obj && $obj->id == $user->id ) return true;
        }
        if ( $user->is_superuser ) return true;
        if ( $model == 'workspace' && $app->mode == 'view' && $app->param( '_type' ) == 'list'
            && $app->param( 'dialog_view' ) && $app->param( 'workspace_select' ) ) {
            return !empty( $permissions );
        }
        $by_association_col = $app->by_association_col;
        if ( is_object( $obj ) && $obj->id && $obj->has_column( 'status' ) && $obj->status !== null ) {
            if ( isset( $permissions[(int) $obj->workspace_id ] ) ) {
                if ( $obj->has_column( 'user_id' ) && $obj->user_id !== null ) {
                    $obj_perms = $permissions[(int) $obj->workspace_id ];
                    if (! in_array( "can_update_all_{$model}", $obj_perms ) ) {
                        $association_users = $app->association_user_ids( $user );
                        if ( in_array( "can_update_assoc_{$model}", $obj_perms ) && $obj->has_column( $by_association_col )
                            && $obj->$by_association_col !== null && in_array( $obj->$by_association_col, $association_users ) ) {
                        } else if ( in_array( "can_update_own_{$model}", $obj_perms ) && $obj->user_id == $user->id ) {
                        } else {
                            return false;
                        }
                    }
                }
                if ( $action === 'delete' ) {
                    if (! in_array( 'workspace_admin', $permissions[(int) $obj->workspace_id ] )
                     && ! in_array( "can_delete_{$model}", $permissions[(int) $obj->workspace_id ] ) ) {
                        return false;
                    }
                }
                return $app->max_status( $user, $model, $workspace ) >= $obj->status;
            }
        }
        if (!$workspace ) {
            if ( $obj && $obj->has_column( 'workspace_id' ) ) {
                $workspace = $obj->workspace;
            }
        }
        $ws_perms = ( $workspace && isset( $permissions[ $workspace->id ] ) )
                  ? $permissions[ $workspace->id ] : [];
        if ( $workspace ) {
            $perms = $ws_perms;
            if ( in_array( 'workspace_admin', $perms ) ) {
                if ( $obj && ( $model != 'workspace'
                    && !$obj->has_column( 'workspace_id' ) ) ) {
                    return false;
                }
                return true;
            }
        } else {
            $perms = isset( $permissions[0] ) ? $permissions[0] : [];
        }
        if ( $orig_action && in_array( $orig_action, $perms ) ) {
            if ( $workspace ) {
                return in_array( $orig_action, $perms );
            } else {
                return true;
            }
        } else if ( $action == 'list' ) {
            $name = 'can_list_' . $model;
            $all = 'can_all_list_' . $model;
            $perm = in_array( $name, $perms ) ? true : in_array( $all, $perms );
            if (! $perm && ! $workspace && ! $table->hierarchy ) {
                foreach ( $permissions as $idx => $ws_perm ) {
                    if ( in_array( 'workspace_admin', $ws_perm )
                        || in_array( $name, $ws_perm ) || in_array( $all, $ws_perm ) ) {
                        $perm = true;
                        break;
                    }
                }
            }
            return $perm;
        } else if ( $action == 'all_list' ) {
            $name = 'can_all_list_' . $model;
            return in_array( $name, $perms );
        } else if ( $action === 'create' || $action === 'revision'
            || $action === 'hierarchy' || $action === 'duplicate'
            || $action === 'edit' || $action === 'save' || $action === 'activate'
            || $action === 'delete' || $action === 'update_all' ) {
            list( $name, $range ) = ['', ''];
            if ( $action === 'hierarchy' || $action === 'revision'
                || $action === 'duplicate' ) {
                $name = "can_{$action}_{$model}";
                return in_array( $name, $perms );
            }
            $range = null;
            if (!$obj || !$obj->id ) {
                $name = $action == 'delete' || $action == 'activate' ? "can_{$action}_{$model}"
                      : 'can_create_' . $model;
                if ( in_array( $name, $perms ) ) {
                    return true;
                }
                if ( $action == 'create' ) return false;
            } else {
                $range = $action != 'delete' ? 'can_update_all_' . $model
                                             : 'can_delete_' . $model;
                if (! $obj->has_column( 'user_id' ) && $action != 'delete' ) {
                    $range = 'can_create_' . $model;
                    if ( $action == 'edit' && in_array( 'can_activate_' . $model, $perms ) ) {
                        return true;
                    }
                }
                if ( $obj->has_column( 'status' ) ) {
                    $max_status = $app->max_status( $user, $model, $workspace );
                    if ( $obj->status > $max_status ) {
                        return false;
                    }
                } else if ( $action == 'edit' && ! $obj->has_column( 'user_id' ) ) {
                    $range = 'can_create_' . $model;
                }
            }
            if ( $name && in_array( $name, $perms ) ) {
                return true;
            }
            if ( $range && !in_array( $range, $perms ) ) {
                $range = 'can_update_assoc_' . $model;
                if ( in_array( $range, $perms ) && $obj->has_column( $by_association_col ) ) {
                    $association_users = isset( $association_users ) ? $association_users : $app->association_user_ids( $user );
                    if ( in_array( $obj->$by_association_col, $association_users ) ) {
                        if ( $action == 'delete' ) {
                            return in_array( 'can_delete_' . $model, $perms );
                        }
                        return true;
                    }
                }
                if ( $obj->has_column( 'user_id' ) ) {
                    $range = 'can_update_own_' . $model;
                    if ( in_array( $range, $perms ) ) {
                        if ( $obj->user_id == $user->id ) {
                            if ( $action == 'delete' ) {
                                return in_array( 'can_delete_' . $model, $perms );
                            }
                            return true;
                        }
                    }
                }
                return false;
            } else if ( $action == 'delete' ) {
                if ( in_array( $range, $perms ) ) {
                    if (! $obj->has_column( 'user_id' ) ) {
                        return true;
                    }
                    if ( is_object( $obj ) && $obj->id ) {
                        $range = 'can_update_all_' . $model;
                        if ( in_array( $range, $perms ) ) {
                            return true;
                        }
                        $range = 'can_update_own_' . $model;
                        if ( in_array( $range, $perms ) && $obj->user_id == $user->id ) {
                            return true;
                        }
                    } else {
                        return true;
                    }
                }
            } else if ( $action == 'update_all' ) {
                $name = "can_update_all_{$model}";
                return in_array( $name, $perms );
            } else if ( $action == 'activate' ) {
                return false;
            } else {
                return true;
            }
        }
        return false;
    }

    function permissions ( $user = null ) {
        $app = $this;
        $user = $user ? $user : $app->user();
        if (!$user ) return [];
        if ( $perms = $app->stash( 'user_permissions_' . $user->id ) ) {
            return $perms;
        }
        $session = $app->db->model( 'session' )->get_by_key(
                                                ['user_id' => $user->id,
                                                 'name' => 'user_permissions',
                                                 'kind' => 'PM'], null, 'id,expires,text,start' );
        if ( $session->id ) {
            $perms = json_decode( $session->text, true );
            $app->stash( 'user_permissions_' . $user->id, $perms );
            return $perms;
        }
        $permissions = $app->db->model( 'permission' )->load( ['user_id' => $user->id ] );
        $terms = ['name' => 'users', 'from_obj' => 'association', 'to_obj' => 'user', 'to_id' => $user->id ];
        $assoc_ids = $app->db->model( 'relation' )->load_iter( $terms, null, 'from_id' );
        $assoc_ids = $assoc_ids->fetchAll( PDO::FETCH_COLUMN );
        if (! empty( $assoc_ids ) ) {
            $permissions = array_merge( $permissions,
            $app->db->model( 'permission' )->load( ['association_id' => ['IN' => $assoc_ids ] ] ) );
        }
        $user_permissions = [];
        $role_ids = [];
        $workspace_map = [];
        $table_map = [];
        $tables = $app->db->model( 'table' )->load_iter( null, null, 'id,name' );
        $table_map = $tables->fetchAll( PDO::FETCH_KEY_PAIR );
        unset( $tables );
        $sys_perms = $app->permissions;
        foreach ( $permissions as $perm ) {
            $relations = $app->get_relations( $perm, 'role', 'roles', [], 'to_id', false );
            foreach ( $relations as $relation ) {
                if ( $role = $app->db->model( 'role' )->load( (int) $relation->to_id, null ) ) {
                    $role_ws_id = (int) $perm->workspace_id;
                    $ws_permission = isset( $user_permissions[ $role_ws_id ] )
                                   ? $user_permissions[ $role_ws_id ] : [];
                    $perms = $app->get_relations( $role, 'table', null, [], 'name,to_id', false );
                    foreach ( $perms as $p ) {
                        $model = $table_map[ $p->to_id ] ?? null;
                        if ( $model ) {
                            $name = $p->name . '_' . $model;
                            if (! in_array( $name, $ws_permission ) ) {
                                $ws_permission[] = $name;
                            }
                        }
                    }
                    if ( $role->workspace_admin &&
                        ! in_array( 'workspace_admin', $ws_permission ) ) {
                        $ws_permission[] = 'workspace_admin';
                    }
                    foreach ( $sys_perms as $sys_perm ) {
                        if ( $role->$sys_perm && ! in_array( $sys_perm, $ws_permission ) ) {
                            $ws_permission[] = $sys_perm;
                        }
                    }
                    $user_permissions[ $role_ws_id ] = $ws_permission;
                    $role_ids[] = $relation->to_id;
                    $workspace_map[ $relation->to_id ] = $role_ws_id;
                }
            }
        }
        $app->stash( 'user_permissions_' . $user->id, $user_permissions );
        $json = json_encode( $user_permissions );
        $session->text( $json );
        $session->start( $app->request_time );
        $session->expires( $app->request_time + $app->perm_expires );
        $app->init_callbacks( 'session', 'pre_save_permission' );
        $callback = ['name' => 'pre_save_permission', 'user_permissions' => $user_permissions ];
        $app->run_callbacks( $callback, 'session', $session );
        $session->save();
        $user_permissions = $callback['user_permissions'];
        return $user_permissions;
    }

    function asset_out ( $prop, $data, $is_file = false ) {
        if ( $this->output_compression ) {
            ini_set( 'zlib.output_compression', 'On' );
        }
        $app = $this;
        $app->register_callback( 'blob', 'pre_asset_out', 'pre_asset_out', 5, $app );
        $app->init_callbacks( 'blob', 'pre_asset_out' );
        $callback = ['name' => 'pre_asset_out', 'file_name' => $prop['basename'],
                     'extension' => $prop['extension'] ];
        $app->run_callbacks( $callback, 'blob', $data );
        $file_size = $is_file ? filesize( $data ) : strlen( bin2hex( $data ) ) / 2;
        if (! is_array( $prop ) || empty( $prop ) ) {
            if ( $data ) {
                header( 'Content-Type: application/octet-stream' );
                header( "Content-Length: {$file_size}" );
                if ( $is_file ) {
                    readfile( $data );
                } else {
                    echo $data;
                }
            }
            exit();
        }
        $file_name = $prop['basename'];
        $extension = $prop['extension'];
        $file_name .= $extension ? '.' . $extension : '';
        $file_name = urlencode( $file_name );
        $mime_type = $prop['mime_type'];
        $download = $app->param( 'download' ) ? true : false;
        if (! $download ) {
            if (! in_array( $extension, $app->images ) && $extension != 'pdf'
                && $extension != 'svg' && strpos( $mime_type, 'text' ) === false ) {
                $download = true;
            }
        }
        header( "Content-Type: {$mime_type}" );
        header( "Content-Length: {$file_size}" );
        if ( $download ) {
            header( "Content-Disposition: attachment;"
                . " filename=\"{$file_name}\"" );
            header( "Pragma: " );
        }
        if ( $is_file ) {
            readfile( $data );
        } else {
            echo $data;
        }
        exit();
    }

    function save_order ( $app ) {
        $model = $app->param( '_model' );
        $app->validate_magic();
        if (!$app->can_do( $model, 'edit' ) ) {
            $app->error( 'Permission denied.' );
        }
        if (! $model ) return $app->error( 'Invalid request.' );
        $table = $app->get_table( $model );
        if (! $table ) return $app->error( 'Invalid request.' );
        $objects = $app->get_object( $model, [], false );
        if (! is_array( $objects ) && is_object( $objects ) ) {
            $objects = [ $objects ];
        }
        $order_col = $app->db->model( 'column' )->get_by_key( ['name' => 'order', 'table_id' => $table->id ] );
        $unique = $order_col->unique;
        $error = false;
        $db = $app->db;
        $db->begin_work();
        $app->txn_active = true;
        $ids = $app->param( 'id' );
        $orders = [];
        foreach ( $objects as $obj ) {
            if (! isset( $_REQUEST['order_' . $obj->id ] ) ) continue;
            $order = $app->param( 'order_' . $obj->id );
            $order = (int) $order;
            if ( $model == 'template' || $model == 'urlmapping' ) {
                $obj = $app->db->model( $model )->load( (int) $obj->id );
                if (! $obj ) continue;
            }
            if ( $unique ) {
                $duplicate = false;
                if ( isset( $orders[ $order ] ) ) {
                    $duplicate = true;
                } else {
                    $unique_terms = ['order' => $order ];
                    if ( $obj->has_column( 'workspace_id' ) ) {
                        $unique_terms['workspace_id'] = (int)$obj->workspace_id;
                    }
                    if ( $obj->has_column( 'rev_type' ) ) {
                        $unique_terms['rev_type'] = 0;
                    }
                    $excludes = $ids;
                    $excludes[] = $obj->id;
                    $unique_terms['id'] = ['NOT IN' => $excludes ];
                    $duplicate = $app->db->model( $model )->count( $unique_terms );
                }
                if ( $duplicate ) {
                    $errstr = $app->translate( 'A %1$s with the same %2$s \'%3$s\' already exists.',
                              [ $app->translate( $table->label ), $app->translate( 'Order' ), $order ] );
                    $app->rollback( $errstr );
                }
            }
            $obj->order( $order );
            $orders[ $order ] = true;
            if (! $obj->save() ) $error = true;
        }
        if ( $error ) {
            $errstr = $app->translate( 'An error occurred while saving %s.',
                      $app->translate( $table->label ) );
            $app->rollback( $errstr );
        } else {
            $params = [ $app->translate( $table->plural ), $app->user()->nickname ];
            $message = $app->translate( '%1$s order changed by %2$s.', $params );
            $app->log( ['message'  => $message,
                        'category' => 'order',
                        'model'    => $table->name,
                        'level'    => 'info'] );
            $db->commit();
            $app->txn_active = false;
        }
        $map = $app->db->model( 'urlmapping' )->count( ['workspace_id' => (int) $app->param( 'workspace_id' ) ] );
        $need_rebuild = $map ? '&need_rebuild=1' : '';
        $app->redirect( $app->admin_url .
            "?__mode=view&_type=list&_model={$model}&saved_order=1{$need_rebuild}"
                                                . $app->workspace_param );
    }

    function save_hierarchy ( $app ) {
        $model = $app->param( '_model' );
        $app->validate_magic();
        if (! $model ) return $app->error( 'Invalid request.' );
        $table = $app->get_table( $model );
        $app->get_scheme_from_db( $model );
        if (! $table ) return $app->error( 'Invalid request.' );
        $workspace_id = (int) $app->param( 'workspace_id' );
        $_nestable_output = $app->param( '_nestable_output' );
        $_nestable_param = $app->param( '_nestable_param' );
        if ( $_nestable_param ) {
            $params = json_decode( $_nestable_param, true );
            foreach ( $params as $key => $data ) {
                if ( strpos( $key, 'label-' ) === 0 || strpos( $key, 'basename-' ) === 0 ) {
                    $_POST[ $key ] = $data;
                    $_REQUEST[ $key ] = $data;
                }
            }
        }
        $children = json_decode( $_nestable_output, true );
        if ( $children === null ) {
            return $app->error( 'Invalid request.' );
        }
        $workspace = $app->workspace();
        if (!$app->can_do( $model, 'hierarchy', null, $workspace ) ) {
            return $app->error( 'Permission denied.' );
        }
        if (! empty( $app->hooks ) ) {
            $app->run_hooks( 'pre_save' );
        }
        $terms = [];
        $has_workspace = false;
        if ( $app->db->model( $model )->has_column( 'workspace_id' ) ) {
            $terms['workspace_id'] = $workspace_id;
            $has_workspace = true;
        }
        $primary = $table->primary;
        $has_basename = $app->db->model( $model )->has_column( 'basename' );
        $objects = $app->db->model( $model )->load( $terms );
        $ids = [];
        $app->get_children_recursive( $children, $ids );
        $map = [];
        $object_map = [];
        foreach ( $objects as $obj ) {
            $map[ $obj->id ] = $obj->get_values( true );
            $object_map[ $obj->id ] = $obj;
        }
        $app->core_save_callbacks( $model );
        $db = $app->db;
        $db->begin_work();
        $app->txn_active = true;
        $created = [];
        $callbackObjs = [];
        $nickname = $app->user()->nickname;
        $label = $app->translate( $table->label );
        $plural = $app->translate( $table->plural );
        list( $insert, $update, $delete ) = [0, 0, 0];
        $defaults = [];
        foreach ( $ids as $id ) {
            $object_label = $app->param( 'label-' . $id );
            $basename = $app->param( 'basename-' . $id );
            if ( $id < 0 ) {
                if (! $app->can_do( $model, 'create' ) ) {
                    $app->rollback( $app->translate( 'Permission denied.' ) );
                }
                if ( empty( $created ) ) {
                    $columns = $db->model( 'column' )->load(
                        ['table_id' => $table->id, 'name' => ['!=' => 'parent_id'], 'default' => ['!=' => ''] ],
                         null, 'name,default' );
                    foreach ( $columns as $column ) {
                        if ( $column->name === 'workspace_id' ) continue;
                        $defaults[ $column->name ] = $column->default;
                    }
                }
                $newObj = $app->db->model( $model )->new( [ $primary => $object_label ] );
                if ( $has_basename ) {
                    $basename = $basename ? $basename : $object_label;
                    $basename = PTUtil::make_basename( $newObj, $basename, true );
                    $newObj->basename( $basename );
                }
                if ( $has_workspace ) {
                    $newObj->workspace_id( $workspace_id );
                }
                $app->set_default( $newObj );
                foreach ( $defaults as $default_col => $default ) {
                    if (! $newObj->$default_col ) {
                        $newObj->$default_col( $default );
                    }
                }
                $original = clone $newObj;
                $newObj->save();
                $insert++;
                $params = [ $label, $object_label, $newObj->id, $nickname ];
                $message = $app->translate( "%1\$s '%2\$s(ID:%3\$s)' created by %4\$s.", $params );
                $log = $app->log( ['message' => $message, 'category' => 'insert',
                                   'model' => $table->name, 'object_id' => $newObj->id,
                                   'level' => 'info'] );
                $callbackObjs[] =
                  ['obj' => $newObj, 'original' => $original, 'is_new' => true, 'log' => $log ];
                $created[ $id ] = $newObj->id;
            } else {
                $existing = isset( $object_map[ $id ] ) ? $object_map[ $id ] : null;
                if ( $existing ) {
                    $changed = false;
                    if ( $object_label != $existing->$primary ) {
                        $changed = true;
                    }
                    if ( $has_basename ) {
                        $basename = $basename ? $basename : $object_label;
                        $basename = PTUtil::make_basename( $existing, $basename, true );
                        if ( $basename != $existing->basename ) {
                            $changed = true;
                        }
                    }
                    if ( $model === 'taxonomy' && !$existing->normalize ) {
                        $tag = PTUtil::normalize( $existing->name );
                        $normalize = PTUtil::normalize_tag( $tag );
                        if ( $normalize ) {
                            $existing->normalize( $normalize );
                            $changed = true;
                        }
                    }
                    if ( $changed ) {
                        if (! $app->can_do( $model, 'edit', $existing ) ) {
                            $app->rollback( $app->translate( 'Permission denied.' ) );
                        }
                        $original = clone $existing;
                        if ( $table->revisable ) {
                            $original->id( null );
                        }
                        $existing->$primary( $object_label );
                        if ( $has_basename ) {
                            $existing->basename( $basename );
                        }
                        $app->set_default( $existing );
                        if ( $table->revisable ) {
                            $changed_cols = [];
                            PTUtil::pack_revision( $existing, $original, $changed_cols );
                        }
                        $metadata = json_encode( PTUtil::object_diff( $app, $original, $existing ),
                                    JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT );
                        $existing->save();
                        $update++;
                        $params = [ $label, $object_label, $existing->id, $nickname ];
                        $message = $app->translate( "%1\$s '%2\$s(ID:%3\$s)' edited by %4\$s.", $params );
                        $log = $app->log( ['message' => $message, 'category' => 'update',
                                           'model' => $table->name, 'object_id' => $existing->id,
                                           'metadata' => $metadata, 'level' => 'info'] );
                        $callbackObjs[] =
                          ['obj' => $existing, 'original' => $original, 'is_new' => false, 'log' => $log ];
                    }
                }
            }
        }
        $remove_ids = [];
        foreach ( $map as $id => $array ) {
            if (! in_array( $id, $ids ) ) {
                $removed = isset( $object_map[ $id ] ) ? $object_map[ $id ] : null;
                if ( $removed ) {
                    if (!$app->can_do( $model, 'delete', $removed ) ) {
                        $app->rollback( $app->translate( 'Permission denied.' ) );
                    }
                    $remove_ids[] = $removed->id;
                    $delete++;
                }
            }
        }
        $order = 1;
        $error = false;
        $app->set_hierarchy( $model, $children, 0, $order, $created, $error );
        if ( $error ) {
            $errstr = $app->translate( 'An error occurred while saving %s.', $plural );
            $app->rollback( $errstr );
        } else {
            $db->commit();
            $app->txn_active = false;
        }
        if (! empty( $remove_ids ) ) {
            $app->param( 'id', $remove_ids );
            $app->remove_async = false;
            $app->delete( $app, true );
        }
        foreach ( $callbackObjs as $callbackObj ) {
            $obj = $callbackObj['obj'];
            $original = $callbackObj['original'];
            $callback = ['name' => 'post_save', 'error' => '', 'is_new' => $callbackObj['is_new'],
                         'log' => $callbackObj['log'] ];
            $app->run_callbacks( $callback, $model, $obj, $original );
            $app->publish_obj( $obj, $original, true, false, true );
        }
        $params = [ $plural, $nickname ];
        $metadata = ['hierarchy' => $children, 'insert' => $insert, 'update' => $update, 'delete' => $delete ];
        $message = $app->translate( '%1$s hierarchy changed by %2$s.', $params );
        $app->log( ['message'  => $message,
                    'category' => 'hierarchy',
                    'model'    => $table->name,
                    'metadata' => $metadata,
                    'level'    => 'info'] );
        $map = $app->db->model( 'urlmapping' )->count( ['workspace_id' => (int) $app->param( 'workspace_id' ) ] );
        $need_rebuild = $map && $app->param( 'hierarchy_changed' ) ? '&need_rebuild=1' : '';
        $dialog_param = $app->param( 'target' )
                      ? '&insert=1&target=' . $app->param( 'target' ) . '&dialog_type=' . $app->param( 'dialog_type' ) : '';
        $update_param  = $insert ? '&_insert=' . $insert : '';
        $update_param .= $update ? '&_update=' . $update : '';
        $update_param .= $delete ? '&_delete=' . $delete : '';
        $app->redirect( $app->admin_url .
            "?__mode=view&_type=hierarchy&_model={$model}&saved_hierarchy=1{$need_rebuild}{$dialog_param}{$update_param}"
            . $app->workspace_param );
    }

    function get_children_recursive ( $children, &$ids, &$map = null ) {
        foreach ( $children as $value ) {
            $id = $value['id'];
            $ids[] = $id;
            $children = isset( $value['children'] ) ? $value['children'] : null;
            if ( $children ) {
                $this->get_children_recursive( $children, $ids );
            }
        }
    }

    function manage_scheme ( $app ) {
        $upgrader = new PTUpgrader;
        return $upgrader->manage_scheme( $app );
    }

    function manage_plugins ( $app ) {
        $plugin = new PTPlugin;
        return $plugin->manage_plugins( $app );
    }

    function view_plugin_doc ( $app ) {
        $plugin = new PTPlugin;
        return $plugin->view_plugin_doc( $app );
    }

    function clear_extra_paths ( $app ) {
        $app->validate_magic( true );
        $workspace_id = $app->param( 'workspace_id' ) ? (int) $app->param( 'workspace_id' ) : 0;
        $path_terms = 
            ['key' => 'upload_path', 'kind' => 'extra_path', 'workspace_id' => $workspace_id ];
        if ( $app->upload_history_by == 'user' ) $path_terms['user_id'] = $app->user()->id;
        $extra_paths = $app->db->model( 'option' )->load( $path_terms, [], 'id' );
        if (!empty( $extra_paths ) ) {
            $res = $app->db->model( 'option' )->remove_multi( $extra_paths );
        }
        header( 'Content-type: application/json' );
        echo json_encode( ['result' => true ] );
    }

    function manage_theme ( $app ) {
        $theme = new PTTheme;
        return $theme->manage_theme( $app );
    }

    function theme_setting ( $app ) {
        $theme = new PTTheme;
        return $theme->theme_setting( $app );
    }

    function import_objects ( $app ) {
        $importer = new PTImporter;
        return $importer->import_objects( $app );
    }

    function maintenance_setting ( $app ) {
        $maintainer = new PTMaintenance;
        return $maintainer->maintenance_setting( $app );
    }

    function upload_objects ( $app ) {
        $importer = new PTImporter;
        return $importer->upload_objects( $app );
    }

    function delete_filter ( $app ) {
        $filter = new PTSystemFilters;
        return $filter->delete_filter( $app );
    }

    function insert_asset ( $app ) {
        $app->get_scheme_from_db( 'asset' );
        $ctx = $app->ctx;
        if ( $app->param( 'insert_editor' ) ) {
            $ids = $app->param( 'id' );
            $assets = [];
            $insert_assets = [];
            foreach ( $ids as $id ) {
                $id = (int) $id;
                $asset = $app->db->model( 'asset' )->load( $id );
                if ( $asset ) {
                    $assets[] = $asset;
                    $insert_assets[ $id ] = $asset;
                }
            }
            $ctx->stash( 'loop_objects', $assets );
            if ( $app->param( 'do_insert' ) ) {
                $loop_vars = [];
                foreach ( $ids as $id ) {
                    $id = (int) $id;
                    $obj = $insert_assets[ $id ];
                    $url = $app->get_permalink( $obj );
                    $assetproperty = $app->get_assetproperty( $obj, 'file' );
                    $label = $app->param( 'asset-label-' . $id );
                    $save_label = $app->param( 'save-label-' . $id );
                    $label_col = $app->param( 'asset-label-col-' . $id ) ? $app->param( 'asset-label-col-' . $id ) : 'label';
                    if ( $save_label && $label ) {
                        if ( $obj->$label_col != $label ) {
                            $obj->$label_col( $label );
                            $obj->save();
                        }
                        if ( $label_col === 'label' ) {
                            PTUtil::update_blob_label( $app, $obj, 'file', $label );
                        }
                    }
                    $class = $obj->class;
                    $permalink = $app->get_permalink( $obj );
                    $can_edit = $app->can_do( 'asset', 'edit', $obj ) ? true : false;
                    $thumb_link = false;
                    if ( $class == 'image' ) {
                        $width = (int) $app->param( 'thumb-width-' . $id );
                        $height = $assetproperty['image_height'];
                        if ( $assetproperty['image_width'] != $width ) {
                            $orig_width = $assetproperty['image_width'];
                            $scale = $width / $orig_width;
                            $height = round( $height * $scale );
                        }
                        $height = (int) $height;
                        $use_thumb = $app->param( 'use-thumb-' . $id );
                        if ( $use_thumb ) {
                            $args = ['width' => $width ];
                            $url = PTUtil::thumbnail_url( $obj, $args, $assetproperty );
                            $thumb_link = $app->param( 'thumb-link-' . $id );
                        } else {
                            $thumb_link = false;
                        }
                        $align = $app->param( 'insert-align-' . $id );
                        $loop_vars[] = ['align' => $align, 'width' => $width,
                                        'class' => $obj->class, 'height' => $height,
                                        'url' => $url, 'label' => $label,
                                        'can_edit' => $can_edit, 'thumb_link' => $thumb_link,
                                        'id' => $id, 'permalink' => $permalink ];
                    } else {
                        if ( $obj->file_ext == 'svg' ) {
                            $use_thumb = $app->param( 'use-thumb-' . $id );
                            $width = '';
                            $height = '';
                            if ( $use_thumb ) {
                                $width = (int) $app->param( 'thumb-width-' . $id );
                                $height = (int) $app->param( 'thumb-height-' . $id );
                                $scale = $width / 100;
                                $height = round( $height * $scale );
                                $height = (int) $height;
                                $thumb_link = $app->param( 'thumb-link-' . $id );
                            } else {
                                $thumb_link = false;
                            }
                            $align = $app->param( 'insert-align-' . $id );
                            $loop_vars[] = ['align' => $align, 'width' => $width,
                                            'class' => 'image', 'height' => $height,
                                            'url' => $url, 'label' => $label,
                                            'can_edit' => $can_edit, 'thumb_link' => $thumb_link,
                                            'id' => $id, 'permalink' => $permalink ];
                        } else {
                            $target_blank = $app->param( 'target-blank-' . $id );
                            $file_size = $assetproperty['file_size'];
                            $loop_vars[] = ['url' => $url, 'label' => $label,
                                            'file_size' => $file_size,
                                            'class' => $obj->class,
                                            'can_edit' => $can_edit,
                                            'target_blank' => $target_blank,
                                            'id' => $id, 'permalink' => $permalink ];
                        }
                    }
                }
                $app->init_callbacks( 'insert_asset', 'pre_insert_asset' );
                $callback = ['name' => 'pre_insert_asset', 'ids' => $ids ];
                $app->run_callbacks( $callback, 'insert_asset', $insert_assets, $loop_vars );
                $ctx->vars['insert_loop'] = $loop_vars;
            }
        }
        $class = $app->param( '_system_filters_option' );
        if (!$class ) $class = 'Asset';
        $tmpl = 'insert_asset.tmpl';
        $class = $app->translate( $app->translate( $class, '', $app, 'default' ) );
        $ctx->vars['page_title'] = $app->translate( 'Insert %s', $class );
        $ctx->vars['this_mode'] = $app->mode;
        $app->assign_params( $app, $ctx );
        $app->init_tags();
        return $app->build_page( $tmpl );
    }

    function edit_image ( $app ) {
        $db = $app->db;
        $user = $app->user();
        $fmgr = $app->fmgr;
        $app->fmgr->delayed = false;
        $model = $app->param( '_model' );
        $table = $app->get_table( $model );
        if ( $table->revisable ) $app->db->in_duplicate = true; // Not remove blob file.
        $id = (int) $app->param( 'id' );
        $obj = $db->model( $model )->new();
        if ( $id ) {
            $obj = $obj->load( $id );
            if (!$obj ) {
                return $app->error( 'Invalid request.' );
            }
            if (!$app->can_do( $model, 'edit', $obj ) ) {
                $app->error( 'Permission denied.' );
            }
        } else {
            if (!$app->can_do( $model, 'edit' ) ) {
                $app->error( 'Permission denied.' );
            }
        }
        $ctx = $app->ctx;
        $screen_id = $app->param( '_screen_id' );
        $tmpl = 'image_editor.tmpl';
        $key = $app->param( 'view' );
        $assetproperty = [];
        if ( $attachmentfile = $app->param( 'attachmentfile' ) ) {
            $session_name = $screen_id . '-' . $attachmentfile;
        } else {
            $session_name = $screen_id . '-' . $key;
        }
        $session = $db->model( 'session' )->get_by_key(
            ['name' => $session_name, 'user_id' => $user->id ]
        );
        if (!$session->id && $obj->id ) {
            $assetproperty = $app->get_assetproperty( $obj, $key );
        } else {
            $json = $session->text;
            $assetproperty = json_decode( $json, true );
        }
        if ( empty( $assetproperty ) ) {
            return $app->error( 'Invalid request.' );
        }
        $ctx->vars['image_width'] = $assetproperty['image_width'];
        $ctx->vars['image_height'] = $assetproperty['image_height'];
        $ctx->vars['page_title'] = $app->translate( 'Edit Image' );
        $key = $app->escape( $key );
        $model = $app->escape( $model );
        $screen_id = $app->escape( $screen_id );
        if ( $app->request_method === 'POST' ) {
            $app->validate_magic();
            $image_data = $app->param( 'image_data' );
            if ( preg_match( '/^data:(.*?);base64,(.*$)/', $image_data, $matchs ) ) {
                $mime_type = $matchs[1];
                $image_data = base64_decode( $matchs[2] );
                $max_scale= 256;
                $meta = explode( '/', $mime_type );
                $extension = $meta[1];
                $upload_dir = $app->upload_dir();
                $file = $upload_dir . DS . 'tmpimg.' . $extension;
                $fmgr->put( $file, $image_data );
                list( $width, $height ) = getimagesize( $file );
                $width--;
                $height--;
                $orig_width = $app->param( 'orig_width' );
                $orig_height = $app->param( 'orig_height' );
                $image_data = $fmgr->get( $file );
                $size = $fmgr->filesize( $file );
                list( $width, $height ) = getimagesize( $file );
                $_FILES = [];
                $_FILES['files'] = ['name' => basename( $file ), 'type' => $mime_type,
                        'tmp_name' => $file, 'error' => 0, 'size' => filesize( $file ) ];
                $image_versions = [
                ''          => ['auto_orient' => true ],
                'thumbnail' => ['max_width' => $max_scale, 'max_height' => $max_scale ] ];
                $options = ['upload_dir' => $upload_dir . DS, 'magic' => $app->magic(),
                            'prototype' => $app, 'print_response' => false,
                            'no_upload' => true, 'image_versions' => $image_versions,
                            'user_id' => $app->user()->id ];
                require_once( LIB_DIR . 'jQueryFileUpload' . DS . 'UploadHandler.php' );
                $upload_handler = new UploadHandler( $options );
                $_SERVER['CONTENT_LENGTH'] = filesize( $file );
                $upload_handler->post( false );
                $thumbnail = $upload_dir . DS . 'thumbnail' . DS . basename( $file );
                $image_data_thumb = $fmgr->get( $thumbnail );
                $max_scale = $max_scale / 2;
                $file = preg_replace( "/\.$extension$/", "-square.{$extension}", $file );
                $fmgr->put( $file, $image_data );
                $_FILES['files'] = ['name' => basename( $file ), 'type' => $mime_type,
                        'tmp_name' => $file, 'error' => 0, 'size' => filesize( $file ) ];
                $image_versions = [
                ''          => ['auto_orient' => true ],
                'thumbnail' => ['max_width' => $max_scale, 'max_height' => $max_scale ] ];
                $image_versions['thumbnail']['crop'] = true;
                $options = ['upload_dir' => $upload_dir . DS, 'magic' => $app->magic(),
                            'prototype' => $app, 'print_response' => false,
                            'no_upload' => true, 'image_versions' => $image_versions,
                            'user_id' => $app->user()->id ];
                $upload_handler = new UploadHandler( $options );
                $_SERVER['CONTENT_LENGTH'] = filesize( $file );
                $upload_handler->post( false );
                $thumbnail_square = $upload_dir . DS . 'thumbnail' . DS . basename( $file );
                $image_data_square = $fmgr->get( $thumbnail_square );
                $screen_id .= '-' . $key;
                $session = $db->model( 'session' )->get_by_key(
                    ['name' => $session_name, 'user_id' => $user->id, 'kind' => 'UP' ]
                );
                $assetproperty = json_decode( $session->text, true );
                $session->data( $image_data );
                $session->metadata( $image_data_thumb );
                $session->extradata( $image_data_square );
                $thumb_dir = dirname( $thumbnail );
                $props = [];
                if ( $session->id ) {
                    $props = $session->text;
                    if ( $props ) $props = json_decode( $props, true );
                } else {
                    if ( $obj->id ) {
                        $meta = $db->model( 'meta' )->get_by_key(
                                ['model' => $model, 'object_id' => $obj->id,
                                 'kind' => 'metadata', 'key' => $key ] );
                        if ( $meta->id ) {
                            $props = $meta->text;
                            $props = json_decode( $props, true );
                        }
                    }
                }
                if ( empty( $props ) ) {
                    return $app->error( 'Invalid request.' );
                }
                $session->value( $upload_dir . DS . $props['file_name'] );
                $props['file_size'] = $size;
                $props['image_width'] = $width;
                $props['image_height'] = $height;
                $ts = date( 'Y-m-d H:i:s' );
                $props['uploaded'] = $ts;
                $props['mime_type'] = $mime_type;
                $session->text( json_encode( $props ) );
                $session->save();
                $data = "data:{$mime_type};base64," . base64_encode( $image_data_thumb );
                $ctx->vars['thumbnail_image'] = $data;
                $ctx->vars['has_thumbnail_image'] = 1;
                $ctx->vars['file_name'] = $props['file_name'];
                $ctx->vars['image_width'] = $props['image_width'];
                $ctx->vars['image_height'] = $props['image_height'];
                $ctx->vars['mime_type'] = $props['mime_type'];
                $ctx->vars['file_size'] = $props['file_size'];
                if ( $attachmentfile = $app->param( 'attachmentfile' ) ) {
                    $_REQUEST['view'] = $attachmentfile;
                    $app->param( 'view', $attachmentfile );
                }
            }
        }
        $param = "?__mode=view&amp;_type=edit&amp;_model={$model}&amp;id={$id}"
               ."&amp;_screen_id={$screen_id}&amp;view=";
        if ( $attachmentfile = $app->param( 'attachmentfile' ) ) {
            $param .= 'file&amp;attachmentfile=' . $app->param( 'attachmentfile' );
        } else {
            $param .= $key;
        }
        if ( $app->workspace() ) {
            $workspace_id = $app->workspace()->id;
            $param .= "&amp;workspace_id={$workspace_id}";
        }
        $ctx->vars['this_mode'] = $app->mode;
        $ctx->vars['edit_url'] = $this->admin_url . $param;
        $app->assign_params( $app, $ctx );
        return $app->build_page( $tmpl );
    }

    function set_hierarchy ( $model, $children, $parent = 0, &$order = 1, $created = [], &$error = false ) {
        $app = $this;
        $cols = 'id,parent_id';
        if ( $app->db->model( $model )->has_column( 'order' ) ) {
            $cols .= ',order';
        }
        foreach ( $children as $value ) {
            $id = $value['id'];
            if ( isset( $created[ $id ] ) ) {
                $id = $created[ $id ];
            }
            $children = isset( $value['children'] ) ? $value['children'] : null;
            $obj = $app->db->model( $model )->load( $id, null, $cols );
            if (!$obj ) continue;
            $changed = false;
            if ( $parent != $obj->parent_id ) {
                $obj->parent_id( $parent );
                $changed = true;
            }
            if ( $obj->has_column( 'order' ) ) {
                if ( $obj->order != $order ) {
                    $obj->order( $order );
                    $changed = true;
                }
            }
            if ( $changed ) {
                if (! $obj->save() ) $error = true;
            }
            $order++;
            if ( $children && !empty( $children ) ) {
                $app->set_hierarchy( $model, $children, $id, $order, $created, $error );
            }
        }
    }

    function display_options ( $app ) {
        $model = $app->param( '_model' );
        $app->validate_magic();
        $workspace_id = $app->param( 'workspace_id' );
        $scheme = $app->get_scheme_from_db( $model );
        $type = $app->param( '_type' );
        $display_options = array_keys( $scheme[ $type . '_properties'] );
        $options = [];
        foreach ( $display_options as $opt ) {
            if ( $app->param( '_d_' . $opt ) ) {
                $options[] = $opt;
            }
        }
        if ( $type == 'edit' ) {
            $obj = $app->db->model( $model )->new();
            if ( $workspace_id ) {
                if ( $obj->has_column( 'workspace_id' ) ) {
                    $obj->workspace_id( $workspace_id );
                }
            }
            $fields = PTUtil::get_fields( $obj, 'basenames' );
            foreach ( $fields as $opt ) {
                if ( $app->param( '_d_field-' . $opt ) ) {
                    $options[] = 'field-' .$opt;
                }
            }
        }
        $user_option = $app->get_user_opt( $model, $type . '_option', $workspace_id );
        if ( $type === 'list' &&
            strpos( $app->param( 'return_args' ), 'manage_revision=1' ) !== false ) {
        } else {
            $user_option->option( join( ',', $options ) );
        }
        if ( $type === 'list' ) {
            $number = $app->param( '_per_page' );
            $user_option->number( (int) $number );
            $search_cols = [];
            $sort_by = [];
            $column_defs = array_keys( $scheme['column_defs'] );
            foreach ( $column_defs as $col ) {
                if ( $app->param( '_s_' . $col ) ) {
                    $search_cols[] = $col;
                }
                if ( $app->param( '_by_' . $col ) ) {
                    $sort_by[0] = $col;
                }
            }
            if ( $user_sort_by = $app->param( '_user_sort_by' ) ) {
                $sort_by[0] = $user_sort_by;
            } else {
                $sort_by[0] = 'id';
            }
            if ( $user_sort_order = $app->param( '_user_sort_order' ) ) {
                $sort_by[1] = $user_sort_order == 1 ? 'ascend' : 'descend';
            } else {
                $sort_by[1] = 1;
            }
            $user_option->data( join( ',', $search_cols ) );
            $user_option->extra( join( ',', $sort_by ) );
            $value = $app->param( '_user_search_type' );
            $user_option->value( $value );
            $replace_type = (int) $app->param( '_user_replace_type' );
            $user_keep_search = (int) $app->param( '_user_keep_search' );
            $user_option->other( "{$user_keep_search},{$replace_type}" );
            if (! $user_keep_search ) {
                $query_cookie = "list_query_{$model}_{$workspace_id}";
                $app->bake_cookie( $query_cookie, '' );
            }
        } else {
            $user_option->data( $app->param( 'field_sort_order' ) );
        }
        if ( $app->param( 'workspace_id' ) ) {
            $user_option->workspace_id( $app->param( 'workspace_id' ) );
        }
        $add_params = 'saved_props';
        if ( $app->param( '_reset' ) ) {
            if ( $user_option->id ) {
                $res = $user_option->remove();
            } else {
                $res = true;
            }
            $add_params = 'reset_props';
        } else {
            $res = $user_option->save();
        }
        if ( $type === 'edit' ) {
            header( 'Content-type: application/json' );
            echo json_encode( ['result' => $res ] );
            exit();
        }
        $options = $app->param( 'dialog_view' ) ? '&dialog_view=1' : '';
        $options .= $app->param( 'single_select' ) ? '&single_select=1' : '';
        $options .= $app->param( 'insert_editor' ) ? '&insert_editor=1' : '';
        $options .= $app->param( 'insert' ) ?
            '&insert_editor=' . $app->param( 'insert' ) : '';
        $options .= $app->param( 'insert' ) ?
            '&selected_ids=' . $app->param( 'selected_ids' ) : '';
        $options .= $app->param( 'ref_model' ) ?
            '&ref_model=' . $app->param( 'ref_model' ) : '';
        $options .= $app->param( 'target' ) ?
            '&target=' . $app->param( 'target' ) : '';
        $options .= $app->param( 'get_col' ) ?
            '&get_col=' . $app->param( 'get_col' ) : '';
        $options .= $app->param( 'workspace_select' ) ?
            '&workspace_select=1' : '';
        $options .= $app->param( 'workflow_model' ) ?
            '&workflow_model=' . $app->param( 'workflow_model' ) : '';
        $options .= $app->param( 'workflow_type' ) ?
            '&workflow_type=' . $app->param( 'workflow_type' ) : '';
        $app->redirect( $app->admin_url .
            "?__mode=view&_type={$type}&_model={$model}&{$add_params}=1"
            . $app->workspace_param . $options );
    }

    function can_edit_object ( $app ) {
        header( 'Content-type: application/json' );
        $id = (int) $app->param( 'id' );
        $model = $app->param( '_model' );
        if (! $id || ! $model ) {
            echo json_encode( ['can_edit_object' => false ] );
            return;
        }
        $table = $app->get_table( $model );
        if (! $table ) {
            echo json_encode( ['can_edit_object' => false ] );
            return;
        }
        $obj = $app->db->model( $model );
        $cols = ['id'];
        $required = ['user_id', 'status', 'workspace_id'];
        foreach ( $required as $column ) if ( $obj->has_column( $column ) ) $cols[] = $column;
        $obj = $obj->load( $id, null, implode( ',', $cols ) );
        if (! $obj ) {
            echo json_encode( ['can_edit_object' => false ] );
            return;
        }
        if (!$app->can_do( $model, 'edit', $obj ) ) {
            echo json_encode( ['can_edit_object' => false ] );
            return;
        }
        $edit_link = $app->admin_url . "?__mode=view&_type=edit&_model={$model}&id={$id}";
        if ( $obj->has_column( 'workspace_id' ) && $obj->workspace_id ) {
            $edit_link .= '&workspace_id=' . $obj->workspace_id;
        }
        echo json_encode( ['can_edit_object' => true, 'edit_link' => $edit_link ] );
    }

    function get_alternative_icon ( $class, $extension, $data = true ) {
        $asset_dir = $this->pt_dir . DS . 'assets' . DS . 'img' . DS . 'file-icons';
        $asset_dir = str_replace( '\\', DS, $asset_dir );
        $icon = '';
        if ( $class == 'audio' || $class == 'video' || $class == 'pdf' ) {
            $icon = $asset_dir . DS . "{$class}.png";
        } else {
            $icon = file_exists( $asset_dir . DS . "{$extension}.png" )
                  ? $asset_dir . DS . "{$extension}.png" : "";
            if (! $icon ) {
                $icon = file_exists( $asset_dir . DS . "{$extension}x.png" )
                      ? $asset_dir . DS . "{$extension}x.png" : "";
            }
        }
        if (! $icon ) {
            $icon = $asset_dir . DS . "file.png";
        }
        if ( file_exists( $icon ) ) {
            return $data ? file_get_contents( $icon ) : basename( $icon );
        }
    }

    function get_temporary_file ( $app ) {
        $id = $app->param( 'id' );
        if ( strpos( $id, 'session-' ) === 0 ) {
            return $app->get_thumbnail( $app );
        }
    }

    function get_thumbnail ( $app ) {
        PTUtil::get_thumbnail( $app );
    }

    function get_field_html ( $app ) {
        return PTUtil::get_field_html( $app );
    }

    function get_rebuild_status ( $app ) {
        header( 'Content-type: application/json' );
        // permisson
        $request_id = $app->param( 'request_id' );
        $db = $app->db;
        $db->caching = false;
        $progress_cnt = $app->db->model( 'session' )->count(
                    ['key' => $request_id, 'kind' => 'AS'], null, 'id' );
        if ( $progress_cnt ) {
            $max_procs = $app->async_max_proc;
            $progress_cnt = $max_procs - $progress_cnt;
            $progress = ( $progress_cnt / $max_procs ) * 100;
            $progress = round( $progress );
        } else {
            $progress = '0';
        }
        echo json_encode( ['progress' => $progress . '%' ] );
    }

    function rebuild_action ( $app ) {
        $actions_class = new PTListActions();
        return $actions_class->rebuild_action( $app );
    }

    function process_action ( $app ) {
        $actions_class = new PTListActions();
        return $actions_class->process_action( $app );
    }

    function rebuild_phase ( $app, $start = false, $counter = 0 ) {
        $db = $app->db;
        $next_url = null;
        $start_time = $app->param( 'start_time' );
        if (!$start_time ) {
            $start_time = time();
            $app->param( 'start_time', $start_time );
        }
        $this->destruct_time = $start_time;
        self::$app = $this;
        $app->shared_background_publishing = false;
        $app->ctx->vars['start_time'] = $start_time;
        $request_id = $app->param( 'request_id' ) ?? $app->request_id;
        if ( $app->param( '_type' ) == 'rebuild_all' ) {
            $sql = "SELECT DISTINCT urlmapping_workspace_id FROM {$db->prefix}urlmapping";
            $group = $app->db->query( $sql, PDO::FETCH_COLUMN, 'urlmapping' );
            $workspace_ids = [];
            foreach ( $group as $workspace_id ) {
                $workspace_id = (int) $workspace_id;
                $sql = "SELECT DISTINCT urlmapping_model FROM {$db->prefix}urlmapping WHERE urlmapping_workspace_id={$workspace_id}";
                $ws_group = $app->db->query( $sql, PDO::FETCH_COLUMN, 'urlmapping' );
                $has_obj = false;
                foreach ( $ws_group as $ws_model ) {
                    $ws_count_terms = [];
                    if ( $db->model( $ws_model )->has_column( 'workspace_id' ) ) {
                        $ws_count_terms['workspace_id'] = $workspace_id;
                    }
                    $hasObj = $db->model( $ws_model )->count( $ws_count_terms, ['limit' => 1], 'id' );
                    if ( $hasObj ) {
                        $has_obj = true;
                        break;
                    }
                }
                if ( $has_obj ) {
                    if ( $app->user()->is_superuser ) {
                        $workspace_ids[] = $workspace_id;
                    } else {
                        $workspace = $db->model( 'workspace' )->new( ['id' => $workspace_id ] );
                        if ( $app->can_do( 'can_rebuild', null, null, $workspace ) ) {
                            $workspace_ids[] = $workspace_id;
                        }
                    }
                }
            }
            if ( empty( $workspace_ids ) ) {
                $app->error( 'Permission denied.', 'popup' );
            }
            $target_id = array_shift( $workspace_ids );
            $start_url = $app->admin_url . "?__mode=rebuild_phase&_type=start_rebuild&rebuild_all=1&workspace_ids=" . implode( ',', $workspace_ids );
            if ( $target_id ) $start_url .= "&workspace_id={$target_id}";
            $app->redirect( $start_url );
            exit();
        } else if ( $app->param( 'rebuild_all' ) && $app->param( 'workspace_ids' ) ) {
            $scope_ids = $app->param( 'workspace_ids' );
            $scope_ids = explode( ',', $scope_ids );
            $scope_id = array_shift( $scope_ids );
            $next_url = $app->admin_url . "?__mode=rebuild_phase&_type=start_rebuild&rebuild_next=1"
                      . "&rebuild_all=1&workspace_ids=" . implode( ',', $scope_ids );
            $next_url .= '&workspace_id=' . $scope_id;
            $next_url .= '&start_time=' . $start_time;
            $next_url .= '&request_id=' . $request_id;
            $app->ctx->vars['next_url'] = $next_url;
        }
        $workspace_id = (int) $app->param( 'workspace_id' );
        $app->ctx->vars['workspace_id'] = $workspace_id;
        $workspace = $workspace_id ? $app->workspace()
                   : $db->model( 'workspace' )->new( ['id' => 0] );
        if ( $max_execution_time = $app->max_exec_time ) {
            $max_execution_time = (int) $max_execution_time;
            ini_set( 'max_execution_time', $max_execution_time );
        }
        if ( $next_models = $app->param( 'next_models' ) ) {
            $next_models = explode( ',', $next_models );
            $existing = [];
            foreach ( $next_models as $next_model ) {
                $count_terms = [];
                $count_model = $db->model( $next_model );
                if ( $count_model->has_column( 'workspace_id' ) ) {
                    $count_terms['workspace_id'] = $workspace_id;
                }
                if ( $count_model->has_column( 'status' ) ) {
                    $status_published = $app->status_published( $next_model );
                    $count_terms['status'] = $status_published;
                }
                if ( $count_model->has_column( 'rev_type' ) ) {
                    $count_terms['rev_type'] = 0;
                }
                $_existing = $db->model( $next_model )->load( $count_terms, ['limit' => 1], 'id' );
                if (! empty( $_existing ) ) {
                    $existing[] = $next_model;
                }
            }
            $app->param( 'next_models', implode( ',', $existing ) );
        }
        $per_rebuild = $app->per_rebuild;
        $db->update_multi = true;
        $tmpl = 'rebuild_phase.tmpl';
        $model = $app->param( '_model' );
        $rebuild_async = $app->rebuild_async;
        $app->ctx->vars['request_id'] = $request_id;
        $app->ctx->vars['workspace_ids'] = $app->param( 'workspace_ids' );
        $app->ctx->vars['rebuild_interval'] = $app->rebuild_interval;
        $app->ctx->vars['wait_async'] = $rebuild_async ? $app->wait_async : '';
        $_return_args = $app->param( '_return_args' );
        $scope_name = $app->workspace() ? $app->workspace()->name : $app->appname;
        if ( $app->param( '_type' ) && $app->param( '_type' ) == 'start_rebuild' ) {
            $title = $app->param( 'rebuild_all' ) || $app->param( 'start_all' )
            ? $app->translate( 'Publish all' ) : $app->translate( 'Publish %s', $scope_name );
            $app->ctx->vars['page_title'] = $title;
            return $app->build_page( $tmpl );
        }
        if (! $app->can_do( 'can_rebuild', null, null, $workspace ) ) {
            $app->error( 'Permission denied.', 'popup' );
        }
        $sess_terms = ['value' => $request_id, 'kind' => 'CH', 'user_id' => ['>=' => 0] ];
        $max_proc_time = $app->async_max_proc_time ? $start_time + $app->async_max_proc_time : false;
        if ( $app->param( 'rebuild_end' ) ) {
            $app->ctx->vars['wait_async'] = $app->wait_async;
            $app->ctx->vars['rebuild_end'] = 1;
            $app->ctx->vars['page_title'] = $app->wait_async
                  ? $app->translate( 'Done.' ) : $app->translate( 'Starting the rebuild process.' );
            $timed_out = false;
            if ( $app->wait_async && $max_proc_time ) {
                $db->caching = false;
                while ( $db->model( 'session' )->count(
                    ['key' => $request_id, 'kind' => 'AS'], null, 'id' ) != 0 ) {
                    if ( $max_proc_time && ( time() > $max_proc_time ) ) {
                        $timed_out = true;
                        break;
                    }
                    sleep( 2 );
                }
                $db->caching = $app->db_caching;
            }
            if ( $timed_out ) {
                return $app->error( 'Background publishing has timed out. Please Check the system log for details.', 'popup' );
            }
            $app->ctx->vars['timed_out'] = $timed_out;
            $app->ctx->vars['publish_time'] = time() - $start_time;
            $app->remove_session( $sess_terms );
            return $app->build_page( $tmpl );
        }
        $next_model = '';
        $next_models = [];
        $rebuild_last = false;
        $current_model = $app->param( 'current_model' );
        $app->ctx->vars['current_model'] = $current_model;
        $app->init_tags();
        $model_cnt = 1;
        if ( $app->param( '_type' ) && $app->param( '_type' ) == 'rebuild_archives' ) {
            $model = $app->param( 'next_models' );
            $models = explode( ',', $model );
            $model_cnt = count( $models );
            if ( isset( $models[ $counter ] ) ) {
                $model = $models[ $counter ];
                $obj = $app->db->model( $model )->__new();
                $table = $app->get_table( $model );
                if (!$table ) return $app->error( 'Invalid request.', 'popup' );
                $app->get_scheme_from_db( $model );
                $_colprefix = $obj->_colprefix;
                $terms = [];
                if ( $obj->has_column( 'workspace_id' ) ) {
                    $terms['workspace_id'] = $workspace_id;
                }
                if ( $app->build_published_only ) {
                    if ( $obj->has_column( 'status' ) ) {
                        $terms['status'] = $app->status_published( $model );
                    }
                }
                $extra = '';
                if ( $table->revisable ) {
                    $extra .= " AND {$_colprefix}rev_type=0";
                }
                if ( $current_model == $model ) {
                    $app->ctx->vars['rebuild_end'] = 1;
                    $app->ctx->vars['publish_time'] = time() - $start_time;
                    if ( $app->param( 'rebuild_all' ) && $app->param( 'workspace_ids' ) ) {
                        $app->ctx->vars['page_title'] = $app->translate( 'Rebuilding %s Completed...', $scope_name );
                    } else {
                        $app->ctx->vars['page_title'] = $app->translate( 'Done.' );
                        $app->remove_session( $sess_terms );
                    }
                    return $app->build_page( $tmpl );
                }
                if ( $model === 'template' && $app->publish_only_archive ) {
                    $terms['class'] = 'archive';
                }
                $objects = $app->db->model( $model )->load( $terms, [], 'id', $extra );
                $apply_actions = count( $objects );
                $app->ctx->vars['total_objects'] = $apply_actions;
                if (!$apply_actions ) {
                    if ( isset( $models[ $counter + 1] ) ) {
                        return $app->rebuild_phase( $app, $start, $counter + 1 );
                    } else {
                        $app->ctx->vars['rebuild_end'] = 1;
                        $app->ctx->vars['publish_time'] = time() - $start_time;
                        $app->ctx->vars['page_title'] = $app->translate( 'Done.' );
                        $app->remove_session( $sess_terms );
                        return $app->build_page( $tmpl );
                    }
                } else {
                    $next_models =
                        array_slice( $models , $counter + 1, count( $models ) - 1 );
                    if ( empty( $next_models ) ) {
                        $rebuild_last = true;
                    } else {
                        $next_model = $next_models[0];
                    }
                    $object_ids = [];
                    foreach ( $objects as $obj ) {
                        $object_ids[] = $obj->id;
                    }
                    if ( $model == 'template' ) {
                        $mappings = $app->db->model( 'urlmapping' )->load_iter(
                            ['template_id' => ['IN' => $object_ids ], 'model' => 'template'],
                             null, 'template_id' );
                        $object_ids = $mappings->fetchAll( PDO::FETCH_COLUMN );
                        $apply_actions = count( $object_ids );
                    }
                    if (!$apply_actions ) {
                        if ( isset( $models[ $counter + 1] ) ) {
                            return $app->rebuild_phase( $app, $start, $counter + 1 );
                        } else {
                            $app->ctx->vars['rebuild_end'] = 1;
                            $app->ctx->vars['publish_time'] = time() - $start_time;
                            $app->ctx->vars['page_title'] = $app->translate( 'Done.' );
                            $app->remove_session( $sess_terms );
                            return $app->build_page( $tmpl );
                        }
                    }
                    $app->param( 'apply_actions', $apply_actions );
                    $app->param( 'ids', implode( ',', $object_ids ) );
                }
            } else {
                return $app->error( 'Invalid request.', 'popup' );
            }
        } else {
            $table = $app->get_table( $model );
            if (! $table ) {
                return $app->error( 'Invalid request.', 'popup' );
            }
        }
        if (! isset( $app->ctx->vars['total_objects'] ) ) {
            $app->ctx->vars['total_objects'] = (int) $app->param( 'total_objects' );
        }
        $total_object = (int) $app->ctx->vars['total_objects'];
        $plural = $app->translate( $table->plural );
        $prop_key = strtolower( $table->plural );
        $prop_key = str_replace( ' ', '', $prop_key );
        $model_per_rebuild = $prop_key . '_per_rebuild';
        if ( $app->$model_per_rebuild ) {
            $per_rebuild = (int) $app->$model_per_rebuild;
        } else {
            $rebuild_optimizer = $app->db->model( 'option' )->get_by_key(
                        ['key' => $model_per_rebuild, 'workspace_id' => $workspace_id,
                         'kind' => 'rebuild_optimizer'], ['limit' => 1], 'id,number' );
            if ( $rebuild_optimizer->id && $rebuild_optimizer->number ) {
                $per_rebuild = (int) $rebuild_optimizer->number;
            }
        }
        if (! $per_rebuild ) $per_rebuild = 1;
        $rebuild_interval = $prop_key . '_rebuild_interval';
        if ( $app->$rebuild_interval ) {
            $app->ctx->vars['rebuild_interval'] = (int) $app->$rebuild_interval;
        }
        if (! $rebuild_async ) {
            $model_rebuild_async = $prop_key . '_rebuild_async';
            if ( $app->$model_rebuild_async ) {
                $rebuild_async = true;
            }
        }
        if ( $rebuild_async ) {
            $model_async_max_proc = $prop_key . '_async_max_proc';
            if ( $app->$model_async_max_proc ) {
                $app->async_max_proc = $app->$model_async_max_proc;
            }
        }
        $app->get_scheme_from_db( $model );
        $ids = explode( ',', $app->param( 'ids' ) );
        $apply_actions = (int) $app->param( 'apply_actions' );
        $rebuild_ids = array_slice( $ids , 0, $per_rebuild );
        $next_ids = array_slice( $ids , $per_rebuild );
        $rebuilt = $apply_actions - ( count( $ids ) - count( $rebuild_ids ) );
        $app->ctx->vars['current_model'] = $model;
        $async_counter = 0;
        $rebuild_cnt = count( $rebuild_ids );
        $async_session = null;
        if ( $rebuild_async ) {
            $async_skipped = (int) $app->param( 'async_skipped' ); 
            $redirect_params = [];
            $async_counter = $app->param( 'async_counter' ) ? $app->param( 'async_counter' ) : 0;
            ++$async_counter;
            $redirect_params['async_counter'] = $async_counter;
            $redirect_params['start_time'] = $start_time;
            $redirect_params['request_id'] = $request_id;
            $redirect_params['workspace_id'] = $workspace_id;
            $redirect_params['ids'] = implode( ',', $next_ids );
            $redirect_params['rebuild_all'] = $app->param( 'rebuild_all' );
            $redirect_params['workspace_ids'] = $app->param( 'workspace_ids' );
            $nexts = join( ',', $next_models );
            if (! $nexts ) {
                $nexts = $app->param( 'next_models' );
            }
            $rebuild_finish = false;
            if (!$redirect_params['ids'] ) {
                unset( $redirect_params['ids'] );
                $continue = false;
                if ( $app->param( '_model' ) && $app->param( 'next_models' )
                   && ( $app->param( '_model' ) != $app->param( 'next_models' ) ) ) {
                    $continue = true;
                }
                if (! $continue && strpos( $nexts, ',' ) === false
                    && (! $nexts || $rebuild_last || $model_cnt === 1 ) ) {
                    $rebuild_finish = true;
                } else {
                    $next_model = explode( ',', $nexts )[0];
                    $redirect_params['_model'] = $next_model;
                    $redirect_params['_type'] = 'rebuild_archives';
                }
            }
            $md5_hash = md5( $model . implode( ',', $rebuild_ids ) );
            $async_skip = false;
            if ( $app->async_skip ) {
                $from = date( 'Y-m-d H:i:s', $start_time - $app->async_skip );
                $last = $db->model( 'log' )->load(
                    ['model' => $model, 'created_on' => ['>' => $from ], 'md5' => $md5_hash,
                     'category' => ['IN' => ['async_start', 'async_end'] ] ], ['limit' => 1], 'id' );
                if ( is_array( $last ) && !empty( $last ) ) {
                    list( $async_skip, $md5_hash ) = [ true, '' ];
                }
            }
            $metadata = ['Request ID' => $request_id, 'Object ids' => $rebuild_ids ];
            $message = $async_skip ? $app->translate(
                      'Background publication was skipped ( Model : %s, Object count : %s ).', [ $plural, $rebuild_cnt ] )
                     : $app->translate(
                      'Background publishing start ( Model : %s, Object count : %s ).', [ $plural, $rebuild_cnt ] );
            $log_category = $async_skip ? 'async_skip' : 'async_start';
            $async_log = $app->log( ['message' => $message, 'category' => $log_category, 'model' => $model,
                                     'metadata' => json_encode( $metadata ), 'level' => 'info', 'md5' => $md5_hash ] );
            if (! $async_skip ) {
                $expires = $max_proc_time ? $start_time + $max_proc_time + 3600 : $start_time + $app->sess_timeout;
                $async_session = $db->model( 'session' )->new(
                          ['name' => $request_id . '_' . $async_counter . '.pid', 'key' => $request_id,
                           'workspace_id' => $workspace_id, 'user_id' => $app->user->id, 'kind' => 'AS',
                           'start' => $start_time, 'expires' => $expires, 'value' => $md5_hash ] );
                $async_session->save();
            } else {
                ++$async_skipped;
            }
            $redirect_params['async_skipped'] = $async_skipped;
            if ( $rebuild_finish ) {
                $redirect_params['rebuild_end'] = 1;
            } else {
                if (! $async_skip && $max_proc_time ) {
                    $async_max_proc = $app->async_max_proc;
                    $message = 'Background publishing has timed out. Please Check the system log for details.';
                    $db->caching = false;
                    while ( $db->model( 'session' )->count(
                        ['key' => $request_id, 'kind' => 'AS'] ) > $async_max_proc ) {
                        if ( time() > $max_proc_time ) {
                            return $app->error( $message, 'popup' );
                            break;
                        }
                        sleep( 2 );
                    }
                    $db->caching = $app->db_caching;
                }
                $redirect_params['rebuild_interval'] = $app->ctx->vars['rebuild_interval'];
                $redirect_params['_model'] = $model;
                $redirect_params['next_models'] = $nexts;
            }
            $proc_cnt = intdiv( count( $ids ), $per_rebuild );
            $app->ctx->vars['rebuild_async'] = 1;
            if ( $model === 'template' ) {
                $app->ctx->vars['page_title'] = $app->translate( 'Rebuilding %s...', $app->translate( 'Index' ) );
            } else {
                $app->ctx->vars['page_title'] = $app->translate( 'Rebuilding %s...', $plural );
            }
            if ( count( $rebuild_ids ) == count( $ids ) && empty( $next_models ) ) {
                if ( strpos( $app->param( 'next_models' ), ',' ) === false && $model == $app->param( 'next_models' ) ) {
                    $app->ctx->vars['page_title'] = $app->translate( 'Waiting for process...' );
                    $app->ctx->vars['waiting'] = 1;
                    $redirect_params['rebuild_end'] = 1;
                }
            }
            $app->ctx->vars['redirect_params'] = $redirect_params;
            $proc_all = intdiv( $total_object, $per_rebuild );
            if (! $proc_all ) $proc_all = 1;
            $progress = ( $proc_all - $proc_cnt ) / $proc_all;
            $progress *= 100;
            if ( $progress > 0 ) {
                $app->ctx->vars['progress'] = (int) $progress;
            } else {
                $app->ctx->vars['waiting'] = 1;
            }
            $app->ctx->vars['icon_url'] = 'assets/img/loading.gif';
            $app->build_page( $tmpl, [], true, false );
            if ( $async_skip ) {
                exit();
            }
            $rebuild_async = true;
        }
        $file_cols = $db->model( 'column' )->count( ['table_id' => $table->id, 'edit' => 'file'] );
        $archives_only = $app->rebuild_archives_only;
        if (! $archives_only ) {
            $blob_cols = $db->get_blob_cols( $model, true );
            $archives_only = count( $blob_cols ) ? false : true;
        }
        $cols = $archives_only ? $app->core_tags->select_cols( $app, $db->model( $model ), '*' ) : '*';
        $skipped = false;
        $rebuild_time_limit = $app->rebuild_time_limit;
        if ( $app->build_one_by_one ) { 
            // foreach ( $rebuild_ids as $id ) {
            while ( $id = array_shift( $rebuild_ids ) ) {
                if ( $skipped ) {
                    $rebuilt--;
                    array_unshift( $next_ids, $id );
                    continue;
                }
                $terms = ['id' => (int) $id ];
                $obj = $db->model( $model )->load( $terms, ['limit' => 1], $cols );
                if (! count( $obj ) ) continue;
                $obj = $obj[0];
                $cached_vars = $app->ctx->vars;
                $cached_local_vars = $app->ctx->local_vars;
                $app->publish_obj( $obj, null, false, false, $archives_only );
                $app->ctx->vars = $cached_vars;
                $app->ctx->local_vars = $cached_local_vars;
                if (! $skipped && !$rebuild_async ) {
                    $passed = time() - $app->request_time;
                    if ( $passed > $rebuild_time_limit ) {
                        $skipped = true;
                    }
                }
            }
        } else {
            $terms = ['id' => ['IN' => $rebuild_ids ] ];
            $objects = $db->model( $model )->load( $terms, [], $cols );
            while ( $obj = array_shift( $objects ) ) {
                if ( $skipped ) {
                    $rebuilt--;
                    array_unshift( $next_ids, $obj->id );
                    continue;
                }
                $cached_vars = $app->ctx->vars;
                $cached_local_vars = $app->ctx->local_vars;
                $app->publish_obj( $obj, null, false, false, $archives_only );
                $app->ctx->vars = $cached_vars;
                $app->ctx->local_vars = $cached_local_vars;
                if (! $skipped && !$rebuild_async ) {
                    $passed = time() - $app->request_time;
                    if ( $passed > $rebuild_time_limit ) {
                        $skipped = true;
                    }
                }
            }
        }
        if ( $rebuild_async ) {
            $async_session->remove();
            $done = time();
            $metadata = ['Publish time' => round( microtime( true ) - $app->start_time, 2 ),
                         'Request ID' => $request_id, 'Object ids' => $rebuild_ids ];
            $message = $app->translate(
    'Background publishing done ( Model : %s, Object count : %s, Publish time : %s, Total time : %s ).',
                [ $plural, $rebuild_cnt, $done - $this->request_time, $done - $start_time ] );
            $async_log->message( $message );
            $async_log->metadata( json_encode( $metadata ) );
            $async_log->category( 'async_end' );
            $async_log->modified_on( date( 'YmdHis' ) );
            $async_log->save();
            exit();
        }
        if ( $app->param( 'start_rebuild' ) ) {
            $app->param( 'start_time', $app->request_time );
        }
        $app->ctx->vars['this_mode'] = $app->mode;
        $app->ctx->vars['workspace_id'] = $workspace_id;
        $app->assign_params( $app, $app->ctx );
        if (! empty( $next_ids ) ) {
            $percent = round( $rebuilt / $apply_actions * 100 );
            if ( $start ) {
                $_return_args = rawurlencode( $_return_args );
            }
            $app->ctx->vars['rebuilt_percent'] = $percent;
            $app->ctx->vars['_return_args'] = $_return_args;
            $app->ctx->vars['_model'] = $model;
            $app->ctx->vars['rebuild_ids'] = join( ',', $next_ids );
            $app->ctx->vars['apply_actions'] = $apply_actions;
            $app->ctx->vars['icon_url'] = 'assets/img/loading.gif';
            $title = $app->translate( 'Rebuilding %s...', $plural );
            $app->ctx->vars['page_title'] = $title;
            if ( empty( $next_models ) ) {
                $next_models = $app->param( 'next_models' );
            } else {
                $next_models = join( ',', $next_models );
            }
            if ( $next_models ) {
                $app->ctx->vars['next_models'] = $next_models;
            }
            return $app->build_page( $tmpl );
        } else {
            if ( $app->param( 'next_models' ) ) {
                $app->ctx->vars['rebuild_next'] = 1;
                if ( empty( $next_models ) &&! $rebuild_last ) {
                    $next_models = $app->param( 'next_models' );
                } else {
                    $next_models = join( ',', $next_models );
                }
                $app->ctx->vars['next_models'] = $next_models;
            }
            if ( $_return_args ) {
                $return_args = rawurldecode( $return_args );
                parse_str( $return_args, $params );
                $params['workspace_id'] = $workspace_id;
                if (! isset( $params['magic_token'] ) ) {
                    $params['magic_token'] = $app->current_magic;
                }
                if ( isset( $params['__mode'] ) && $params['__mode'] === 'rebuild_phase' ) {
                    $return_args = http_build_query( $params );
                    $next_model = $params['_model'];
                    $table = $app->get_table( $next_model );
                    $plural = $app->translate( $table->plural );
                    $app->ctx->vars['icon_url'] = 'assets/img/loading.gif';
                    $title = $app->translate( 'Rebuilding %s...', $plural );
                    $app->ctx->vars['page_title'] = $title;
                    $app->ctx->vars['next_url'] = $app->admin_url . '?' . $return_args;
                    return $app->build_page( $tmpl );
                }
                if ( isset( $params['_return_args'] ) ) {
                    parse_str( $params['_return_args'], $_return_args );
                    unset( $params['_return_args'] );
                    $params = array_merge( $_return_args, $params );
                }
                unset( $params['magic_token'] );
                $return_args = http_build_query( $params );
                $app->redirect( $app->admin_url . '?' . $return_args );
            }
            if ( $rebuild_last ) {
                $app->ctx->vars['rebuild_end'] = 1;
                $app->ctx->vars['publish_time'] = time() - $start_time;
                if ( $app->param( 'rebuild_all' ) && $app->param( 'workspace_ids' ) ) {
                    $app->ctx->vars['page_title'] = $app->translate( 'Rebuilding %s Completed...', $scope_name );
                } else {
                    $app->ctx->vars['page_title'] = $app->translate( 'Done.' );
                    $app->remove_session( $sess_terms );
                }
            } else {
                $title = '';
                if ( $app->param( 'next_models' ) ) {
                    $next_models = explode( ',', $app->param( 'next_models' ) );
                    if ( isset( $next_models[0] ) ) {
                        $next_model = $next_models[0];
                        $table = $app->get_table( $next_model );
                        $plural = $app->translate( $table->plural );
                        $title = $app->translate( 'Rebuilding %s...', $plural );
                    }
                }
                if (! $title ) {
                    $title = $app->translate( 'Rebuilding...' );
                }
                $app->ctx->vars['icon_url'] = 'assets/img/loading.gif';
                $app->ctx->vars['page_title'] = $title;
            }
            return $app->build_page( $tmpl );
        }
    }

    function remove_session ( $terms = [] ) {
        $sessions = $this->db->model( 'session' )->load( $terms, [], 'id' );
        if (! empty( $sessions ) ) $this->db->model( 'session' )->remove_multi( $sessions );
    }

    function start_chunk_upload ( $app ) {
        $app->validate_magic( true );
        $file_magic = $app->param( 'upload-file-magic' );
        if ( $file_magic ) {
            $session = $app->db->model( 'session' )->get_by_key(
                ['name' => $file_magic, 'kind' => 'UP', 'user_id' => $app->user()->id ] );
            if ( $session->id ) {
                $file_path = $session->value;
                if ( file_exists( $file_path ) && strpos( $file_path, $app->temp_dir ) === 0 ) {
                    @unlink( $file_path );
                    $session->remove();
                }
            }
        }
    }

    function chunk_upload ( $app ) {
        if ( empty( $_FILES ) ) {
            return $app->json_error( 'Please check the file size and data.' );
        }
        $model = $app->param( '_model' ) ? $app->param( '_model' ) : 'chunk_upload';
        $name = $_FILES['files']['name'];
        $column = $app->param( 'column' );
        $app->init_callbacks( $model, 'chunk_upload' );
        $callback = ['name' => 'chunk_upload', 'model' => $model, 'column' => $column, 'error' => null];
        $res = $app->run_callbacks( $callback, $model, $name );
        if (!$res || isset( $callback['error'] ) ) {
            $error = $callback['error'] ?? $app->translate( 'An error occurred while uploading.' );
            return $app->json_error( $error );
        }
        $app->db->caching = false;
        $app->validate_magic( true );
        $magic = $app->magic() . '-file';
        $basename = $app->param( 'request_id' );
        $upload_dir = $app->temp_dir;
        if ( $upload_dir ) {
            $upload_dir = rtrim( $upload_dir, DS );
            $upload_dir .= DS;
        }
        if (!$upload_dir ) $upload_dir =  dirname( $app->pt_path ) . DS . 'tmp' . DS;
        $upload_dir .= 'pt_' . $basename;
        if (! is_dir( $upload_dir ) ) mkdir( $upload_dir . DS, 0777, true );
        $options = ['upload_dir' => $upload_dir . DS, 'prototype' => $app,
                    'magic' => $magic, 'user_id' => $app->user()->id,
                    'session_no_data' => true];
        require_once( LIB_DIR . 'jQueryFileUpload' . DS . 'UploadHandler.php' );
        $upload_handler = new UploadHandler( $options );
    }

    function upload ( $app ) {
        if ( empty( $_FILES ) ) {
            $app->json_error( 'Please check the file size and data.' );
        }
        $app->validate_magic( true );
        if ( $max_execution_time = $app->max_exec_time ) {
            $max_execution_time = (int) $max_execution_time;
            ini_set( 'max_execution_time', $max_execution_time );
        }
        $upload_dir = $app->upload_dir();
        $screen_id = $app->param( '_screen_id' );
        $name = $app->param( 'name' );
        $model = $app->param( '_model' );
        $table = $app->get_table( $model );
        if (!$table ) return $app->error( 'Invalid request.' );
        $permission = $app->param( 'permission' ) ? $app->param( 'permission' ) : $model;
        $can_do = $app->can_do( $permission, 'create' );
        if (! $can_do ) {
            if ( $object_id = $app->param( 'id' ) ) {
                $obj = $app->db->model( $permission )->load( (int) $object_id );
                if ( $obj ) {
                     $can_do = $app->can_do( $permission, 'edit', $obj );
                }
            }
        }
        if (! $can_do ) {
            $app->json_error( 'Permission denied.' );
        }
        $colName = $name;
        if ( $permission !== $model && $model === 'attachmentfile' && $app->param( 'attachmentfile' ) ) {
            // attachmentfile
            $colName = $app->param( 'attachmentfile' );
            $table = $app->get_table( $permission );
        }
        $column = $app->db->model( 'column' )->load(
            ['table_id' => $table->id, 'name' => $colName ], ['limit' => 1] );
        $resized = false;
        if ( is_array( $column ) && !empty( $column ) ) {
            $extra = $column[0]->extra;
            if ( $column[0]->options && $extra ) {
                $extras = explode( ':', $extra );
                if ( ( isset( $extras[3] ) && !$extras[3] ) ) {
                    // Binary Column.
                    $app->allowed_exts = trim( strtolower( $column[0]->options ) );
                } else {
                    $app->allowed_exts = trim( $extras[3] );
                }
            }
            if ( $app->param( 'select_system_filters' )
                && $app->param( 'select_system_filters' ) == 'filter_class_image' ) {
                $extra = ':::image';
            }
            $res = PTUtil::upload_check( $extra );
            if ( $res == 'resized' ) {
                $resized = true;
            }
        } else {
            $app->json_error( 'Unknown column \'%s\'.', $name );
        }
        if ( $attachmentfile = $app->param( 'attachmentfile' ) ) {
            $magic = "{$screen_id}-{$attachmentfile}";
        } else {
            $magic = "{$screen_id}-{$name}";
        }
        $user = $app->user();
        $options = ['upload_dir' => $upload_dir . DS,
                    'magic' => $magic, 'user_id' => $user->id ,
                    'prototype' => $app, 'resized' => $resized ];
        // auto_orient
        if (! $app->auto_orient ) {
            $image_versions = [
                    '' => ['auto_orient' => false ],
                    'thumbnail' => [
                        'max_width' => 256,
                        'max_height' => 256
                    ]];
            $options['image_versions'] = $image_versions;
        }
        $sess = $app->db->model( 'session' )->get_by_key( ['name' => $magic,
                           'user_id' => $user->id, 'kind' => 'UP'] );
        $sess->start( $app->request_time );
        $sess->expires( $app->request_time + $app->sess_timeout );
        $sess->save();
        $options['allow_hidden'] = $app->can_upload_hidden;
        require_once( LIB_DIR . 'jQueryFileUpload' . DS . 'UploadHandler.php' );
        $upload_handler = new UploadHandler( $options );
    }

    function upload_multi ( $app ) {
        if ( empty( $_FILES ) ) {
            $app->json_error( 'Please check the file size and data.' );
        }
        $app->validate_magic( true );
        if ( $max_execution_time = $app->max_exec_time ) {
            $max_execution_time = (int) $max_execution_time;
            ini_set( 'max_execution_time', $max_execution_time );
        }
        $name = $app->param( 'name' );
        $model = $app->param( '_model' );
        $magic = '';
        if (! $app->param( 'file_attachment' ) ) {
            if (!$app->can_do( 'asset', 'create' ) ) {
                $app->json_error( 'Permission denied.' );
            }
        } else {
            $permission = $app->param( 'permission' )
                        ? $app->param( 'permission' ) : $model;
            $can_do = $app->can_do( $permission, 'create' );
            if (! $can_do ) {
                if ( $object_id = $app->param( 'id' ) ) {
                    $obj = $app->db->model( $permission )->load( (int) $object_id );
                    if ( $obj ) {
                        $can_do = $app->can_do( $permission, 'edit', $obj );
                    }
                }
            }
            if (! $can_do ) {
                $app->json_error( 'Permission denied.' );
            }
            $screen_id = $app->param( '_screen_id' );
            $magic = "{$screen_id}-{$name}";
        }
        $model = $app->param( 'model' );
        $table = $app->get_table( $model );
        $column = $app->db->model( 'column' )->load(
            ['table_id' => $table->id, 'name' => $name ], ['limit' => 1] );
        if ( isset( $permission ) && $permission != $model &&
            $model === 'attachmentfile' && $app->param( 'file_attachment' ) ) {
            // attachmentfiles
            $params = explode( '&', $app->query_string() );
            foreach ( $params as $param ) {
                list( $pName, $pValue ) = explode( '=', $param );
                if ( $pName === 'name' ) {
                    $table = $app->get_table( $permission );
                    $column = $app->db->model( 'column' )->load(
                        ['table_id' => $table->id, 'name' => $pValue ], ['limit' => 1] );
                    break;
                }
            }
        }
        $resized = false;
        if ( is_array( $column ) && !empty( $column ) ) {
            $extra = $app->param( 'select_system_filters' )
                   && $app->param( 'select_system_filters' ) == 'filter_class_image'
                   ? ':::image'
                   : $column[0]->extra;
            if ( $column[0]->options && $extra ) {
                $extras = explode( ':', $extra );
                if ( ( isset( $extras[3] ) && $extras[3] ) && $model === 'attachmentfile' ) {
                    $app->allowed_exts = trim( strtolower( $extras[3] ) );
                } else if ( $model === 'asset' ) {
                    $app->allowed_exts = $column[0]->options;
                }
            }
            $res = PTUtil::upload_check( $extra );
            if ( $res == 'resized' ) {
                $resized = true;
            }
        }
        $extra_path = $app->param( 'extra_path' );
        $app->sanitize_dir( $extra_path );
        $workspace_id = $app->param( 'workspace_id' ) ? (int) $app->param( 'workspace_id' ) : 0;
        $path_terms = ['key' => 'upload_path', 'kind' => 'extra_path',
                       'workspace_id' => $workspace_id, 'value' => $extra_path ];
        if ( $app->upload_history_by == 'user' ) $path_terms['user_id'] = $app->user()->id;
        $option = $app->db->model( 'option' )->get_by_key( $path_terms );
        if (! $option->id ) $option->save();
        $upload_dir = $app->upload_dir();
        $user = $app->user();
        $options = ['upload_dir' => $upload_dir . DS, 'prototype' => $app,
                    'user_id' => $user->id, 'magic' => $magic, 'resized' => $resized ];
        if (! $app->auto_orient ) {
            $image_versions = [
                    '' => ['auto_orient' => false ],
                    'thumbnail' => [
                        'max_width' => 256,
                        'max_height' => 256
                    ]];
            $options['image_versions'] = $image_versions;
        }
        $options['allow_hidden'] = $app->can_upload_hidden;
        require_once( LIB_DIR . 'jQueryFileUpload' . DS . 'UploadHandler.php' );
        $upload_handler = new UploadHandler( $options );
    }

    function upload_dir ( $remove = true, $path = false, $tmp_dir = false ) {
        $upload_dir = $this->id == 'Worker' ? $this->work_dir : $this->temp_dir;
        if (!$upload_dir ) $upload_dir = $this->id == 'Worker' ? $this->temp_dir : __DIR__ . DS . 'tmp' . DS;
        if ( $upload_dir ) {
            $upload_dir = rtrim( $upload_dir, DS );
            $upload_dir .= DS;
            if ( $tmp_dir ) return $upload_dir;
        }
        $upload_dir = tempnam( $upload_dir, 'pt_' );
        @unlink( $upload_dir );
        if ( $path ) return $upload_dir;
        mkdir( $upload_dir . DS, 0777, true );
        if ( $remove ) $this->upload_dirs[ $upload_dir ] = true;
        return $upload_dir;
    }

    function get_columns_json ( $app ) {
        header( 'Content-type: application/json' );
        if (!$app->can_do( 'table', 'edit' ) ) {
            $app->json_error( 'Permission denied.' );
        }
        $model = $app->param( '_model' );
        $scheme = $app->get_scheme_from_db( $model );
        $column_labels = isset( $scheme['labels'] ) ? $scheme['labels'] : [];
        $edit_properties = isset( $scheme['edit_properties'] ) ? $scheme['edit_properties'] : [];
        $labels = [];
        foreach ( $column_labels as $column => $label ) {
            if (! isset( $edit_properties[ $column ] ) ) continue;
            if ( isset( $edit_properties[ $column ] ) &&
               ( strpos( $edit_properties[ $column ], ':' ) !== false 
               || $edit_properties[ $column ] == 'file' ) ) {
            } else {
                $labels[ $column ] = $label;
            }
        }
        $scheme['labels'] = $labels;
        echo json_encode( $scheme );
    }

    function export_scheme ( $app ) {
        $upgrader = new PTUpgrader;
        return $upgrader->export_scheme( $app );
    }

    function export_scheme_csv ( $app ) {
        $upgrader = new PTUpgrader;
        return $upgrader->export_scheme_csv( $app );
    }

    function save_config ( $app ) {
        $app->validate_magic();
        if (!$app->user()->is_superuser ) {
            $app->error( 'Permission denied.' );
        }
        $fmgr = $app->fmgr;
        $appname = $app->param( 'appname' );
        $activation_code = $app->param( 'activation_code' );
        $site_path = $app->param( 'site_path' );
        if ( $app->site_base_path ) {
            $site_base_path = rtrim( $app->site_base_path, DS ) . DS;
            $site_path = $site_base_path . rtrim( $app->sanitize_dir( $site_path ), DS );
        }
        $site_url = $app->param( 'site_url' );
        $description = $app->param( 'description' );
        $extra_path = $app->param( 'extra_path' );
        $asset_publish = $app->param( 'asset_publish' );
        $show_path_entry = $app->param( 'show_path_entry' );
        $show_path_page = $app->param( 'show_path_page' );
        $copyright = $app->param( 'copyright' );
        $system_email = $app->param( 'system_email' );
        $administrator_ip = $app->param( 'administrator_ip' );
        $default_widget = $app->param( 'default_widget' );
        $preview_url = $app->param( 'preview_url' );
        $document_root = $app->param( 'document_root' );
        $timezone = $app->param( 'timezone' );
        $link_url = $app->param( 'link_url' );
        $show_both = $app->param( 'show_both' );
        $barcolor = $app->param( 'barcolor' );
        $bartextcolor = $app->param( 'bartextcolor' );
        $two_factor_auth = $app->param( 'two_factor_auth' );
        $lockout_limit = $app->param( 'lockout_limit' );
        $lockout_interval = $app->param( 'lockout_interval' );
        $ip_lockout_limit = $app->param( 'ip_lockout_limit' );
        $ip_lockout_interval = $app->param( 'ip_lockout_interval' );
        $allowed_ip_only = $app->param( 'allowed_ip_only' );
        $accept_comment = $app->param( 'accept_comment' );
        $comment_thanks = $app->param( 'comment_thanks' );
        $comment_status = $app->param( 'comment_status' );
        $anonymous_comment = $app->param( 'anonymous_comment' );
        $enable_api = $app->param( 'enable_api' );
        $no_lockout_allowed_ip = $app->param( 'no_lockout_allowed_ip' );
        $tmpl_markup = $app->param( 'tmpl_markup' );
        $language = $app->param( 'language' );
        if (! in_array( $language, $app->languages ) ) {
            $language = $app->language;
        }
        $errors = [];
        $msg = '';
        if (!$appname || !$site_url || !$system_email || !$site_path ) {
            $errors[] = $app->translate(
                'App Name, System Email Site URL and Site Path are required.' );
        }
        $msg = '';
        if ( $site_url && !$app->is_valid_url( $site_url, $msg ) ) {
            $errors[] = $msg;
        }
        if (! is_dir( $site_path ) ) {
            if (! $fmgr->mkpath( $site_path ) ) {
                $errors[] = $app->translate( 'The Site Path provided below is not writable by the web server.' );
            }
        }
        if ( $document_root && ! is_dir( $document_root ) ) {
            $errors[] = $app->translate( 'The document root directory was not found.' );
        }
        if ( $preview_url && !$app->is_valid_url( $preview_url, $msg ) ) {
            $errors[] = $msg;
        }
        if ( $link_url && !$app->is_valid_url( $link_url, $msg ) ) {
            $errors[] = $msg;
        }
        if (!$app->is_valid_email( $system_email, $msg ) ) {
            $errors[] = $msg;
        }
        if (! preg_match( '/\/$/', $site_url ) ) {
            $site_url .= '/';
        }
        $site_path = rtrim( $site_path, DS );
        $document_root = rtrim( $document_root, DS );
        $app->sanitize_dir( $extra_path );
        if ( $extra_path &&
            !$app->is_valid_property( str_replace( '/', '', $extra_path ) ) ) {
            $errors[] = $app->translate(
                'Upload Path contains an illegal character.' );
        }
        if ( $default_widget ) {
            $regex = '/<\${0,1}' . $app->ctx->prefix . '/si';
            if ( preg_match( $regex, $default_widget ) ) {
                $app->build_pre_parse = 0;
                $compile_check = PTUtil::compile_check( $default_widget );
                if ( $compile_check !== true && is_array( $compile_check ) ) {
                    $errors = array_merge( $errors, $compile_check );
                }
            }
        }
        if (! empty( $errors ) ) {
            $errors = array_unique( $errors );
            $ctx = $app->ctx;
            $ctx->vars['error'] = join( "\n", $errors );
            $app->assign_params( $app, $ctx );
            $ctx->vars['forward_params'] = 1;
            $tmpl = 'config.tmpl';
            return $app->build_page( $tmpl );
        }
        $app->clear_cache( 'app_configs__c' );
        $cfgs = ['appname' => $appname,
                 'activation_code'=> $activation_code,
                 'copyright' => $copyright,
                 'description'=> $description,
                 'site_path' => $site_path,
                 'site_url' => $site_url,
                 'extra_path' => $extra_path,
                 'show_path_entry' => $show_path_entry,
                 'show_path_page' => $show_path_page,
                 'language' => $language,
                 'barcolor' => $barcolor,
                 'bartextcolor' => $bartextcolor,
                 'asset_publish' => $asset_publish,
                 'system_email' => $system_email,
                 'administrator_ip' => $administrator_ip,
                 'preview_url' => $preview_url,
                 'document_root' => $document_root,
                 'timezone' => $timezone,
                 'link_url' => $link_url,
                 'show_both' => $show_both,
                 'lockout_limit' => $lockout_limit,
                 'lockout_interval' => $lockout_interval,
                 'ip_lockout_limit' => $ip_lockout_limit,
                 'ip_lockout_interval' => $ip_lockout_interval,
                 'two_factor_auth' => $two_factor_auth,
                 'default_widget' => $default_widget,
                 'no_lockout_allowed_ip' => $no_lockout_allowed_ip,
                 'allowed_ip_only' => $allowed_ip_only,
                 'accept_comment' => $accept_comment,
                 'comment_thanks' => $comment_thanks,
                 'comment_status' => $comment_status,
                 'anonymous_comment' => $anonymous_comment,
                 'enable_api' => $enable_api,
                 'tmpl_markup' => $tmpl_markup ];
        $app->set_config( $cfgs );
        if ( $app->sync_dirs && is_array( $app->sync_dirs ) && !empty( $app->sync_dirs ) ) {
            $sync_dirs = $app->sync_dirs;
            foreach ( $sync_dirs as $from => $to ) {
                PTUtil::sync_dir( $from, $to, false );
            }
        }
        $metadata = json_encode( $cfgs, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT );
        $message = '';
        $nickname = $app->user()->nickname;
        $message = $app->translate( 'User %s updated the system settings.', $nickname );
        $app->log( ['message'   => $message,
                    'category'  => 'save',
                    'model'     => 'option',
                    'metadata'  => $metadata,
                    'level'     => 'info'] );
        $app_path = $app->site_path;
        $app_url  = $app->site_url;
        if ( function_exists( 'opcache_reset' ) && $app->query_cache ) {
            sleep( 2 );
        }
        $app->redirect( $app->admin_url . '?__mode=config&saved=1'
                         . $app->workspace_param, true );
        if ( $site_path !== $app_path || $site_url !== $app_url ) {
            $workspace = $app->db->model( 'workspace' )->new();
            $workspace->id( 0 ); // dummy
            $workspace->site_url( $site_url );
            $workspace->site_path( $site_path );
            $app->rebuild_urlinfo( $workspace );
        }
        $app->clear_all_cache( false, false );
    }

    function flush_session ( $app ) {
        $session_id = $app->param( 'id' );
        if (! $session_id ) return;
        $session = $app->db->model( 'session' )->load( (int) $session_id, [], 'id,user_id,kind' );
        if ( $session->id ) {
            if ( $session->user_id == $app->user()->id && $session->kind != 'US' ) {
                $session->remove();
            }
        }
    }

    function apache_version () {
        $version = apache_get_version();
        if (! $version ) return;
        if ( strpos( $version, ' ' ) !== false ) {
            list( $version, $other ) = explode( ' ', $version );
        }
        if ( $version ) {
            $version = preg_replace( '/[^0-9\.]/', '', $version );
            if ( mb_substr_count( $version, '.' ) > 1 ) {
                list( $major, $minor ) = explode( '.', $version );
                $version = $major . $minor;
            }
            $this->apache_version = $version;
            return $version;
        }
    }

    function debug_backtrace ( $return_type = 1, $depth = 5, $errorHandler = false ) {
        if ( is_string( $depth ) && $return_type == 4 ) {
            $message = $depth;
            $depth = 5;
        }
        $depth += 2;
        $res = debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS, $depth );
        array_shift( $res );
        if ( $errorHandler ) array_shift( $res );
        if ( $return_type == 1 ) {
            return $res;
        } else if ( $return_type == 2 || $return_type == 4 ) {
            if ( isset( $message ) ) {
                return $this->log( ['message'  => $message,
                                    'category' => 'cms',
                                    'metadata' => $res,
                                    'level'    => 'error'] );
            }
            ob_start();
            print_r( $res );
            $res = ob_get_clean();
            if ( $return_type == 2 ) {
                return $res;
            }
            $this->log( $res );
        } else if ( $return_type == 3 ) {
            if ( $this->php_sapi_name !== 'cli' ) echo '<pre>';
            var_dump( $res );
            if ( $this->php_sapi_name !== 'cli' ) echo '</pre>';
        }
    }

    function date_default_timezone_set ( $timezone ) {
        if (! $timezone && $this->timezone && $this->current_tz != $this->timezone ) {
            date_default_timezone_set( $this->timezone );
            $this->current_tz = $this->timezone;
        } else if ( $timezone && $timezone !== $this->current_tz ) {
            date_default_timezone_set( $timezone );
            $this->current_tz = $timezone;
        } else {
            $this->current_tz = $this->timezone;
        }
    }

    function test_mail ( $app ) {
        $app->validate_magic( true );
        if (! $app->user()->is_superuser ) {
            $app->json_error( 'Permission denied.' );
        }
        header( 'Content-type: application/json' );
        $email = $app->param( 'email' );
        $msg = '';
        if (! $app->is_valid_email( $email, $msg ) ) {
            echo json_encode( ['result' => false, 'message' => $msg ] );
            exit();
        }
        $subject = $app->translate( 'Test email from PowerCMS X' );
        $body = $app->translate( 'This is the test email sent by PowerCMS X.' );
        $result = PTUtil::send_mail( $email, $subject, $body );
        echo json_encode( ['result' => $result ] );
    }

    function debug ( $app ) {
    }

    function update_dashboard ( $app ) {
        $app->validate_magic( true );
        $type = $app->param( '_type' );
        $workspace_id = (int) $app->param( 'workspace_id' );
        if ( $workspace_id ) {
            $ws = $app->db->model( 'workspace' )->load( $workspace_id );
            if (! $ws ) {
                $app->json_error( '%s not found.', $app->translate( 'WorkSpace' ), 404 );
            }
        }
        $option = $app->db->model( 'option' )->get_by_key(
            ['workspace_id' => $workspace_id,
             'user_id' => $app->user()->id,
             'key' => 'dashboard_widget']
        );
        $detatch = $option->data ? explode( ',', $option->data ) : [];
        $name = $app->param( 'name' );
        $name = preg_replace( '/^widget\-/', '', $name );
        if ( $type == 'detatch' ) {
            if (! in_array( $name, $detatch ) ) {
                $detatch[] = $name;
            }
            $option->data( implode( ',', $detatch ) );
            $option->save();
            $return_url = $this->admin_url . '?__mode=dashboard&detatch_widget=1';
            if ( $workspace_id ) {
                $return_url .= '&workspace_id=' . $workspace_id;
            }
            header( 'Content-type: application/json' );
            echo json_encode( ['status' => 200,
                               'return_url'=> $return_url ] );
            exit();
        } else if ( $type == 'add' ) {
            if ( in_array( $name, $detatch ) ) {
                $idx = array_search( $name, $detatch );
                unset( $detatch[ $idx ] );
                $option->data( implode( ',', $detatch ) );
                $option->save();
            }
            $return_url = $this->admin_url . '?__mode=dashboard&add_widget=1';
            if ( $workspace_id ) {
                $return_url .= '&workspace_id=' . $workspace_id;
            }
            $app->redirect( $return_url );
        } else {
            $widgets = explode( ',', $app->param( 'widgets' ) );
            $sorted = [];
            foreach ( $widgets as $widget ) {
                $widget = preg_replace( '/^widget\-/', '', $widget );
                $sorted[] = $widget;
            }
            $option->value( implode( ',', $sorted ) );
            $option->save();
            header( 'Content-type: application/json' );
            echo json_encode( ['status' => 200] );
            exit();
        }
    }

    function change_activity ( $app ) {
        $app->validate_magic( true );
        $model = $app->param( '_model' );
        $error_log = $model === 'error_log';
        $_model = $error_log ? 'log' : $model;
        $table = $app->get_table( $_model );
        if (! $table ) {
            return $app->error( 'Invalid request.' );
        }
        $obj = $app->db->model( $_model );
        $column = $obj->has_column( 'modified_on' ) ? 'modified_on' : 'created_on';
        $workspace_id = (int) $app->param( 'workspace_id' );
        if ( $workspace_id ) {
            $ws = $app->db->model( 'workspace' )->load( $workspace_id );
            if (! $ws ) {
                return $app->error( '%s not found.', $app->translate( 'WorkSpace' ) );
            }
        }
        $option = $app->db->model( 'option' )->get_by_key(
            ['workspace_id' => $workspace_id,
             'user_id' => $app->user()->id,
             'key' => 'activity_model']
        );
        $option->value( $model );
        if ( $error_log ) {
            $option->data( 'Error Logs' );
        } else {
            $option->data( $table->plural );
        }
        $option->option( $column );
        $option->save();
        $app->return_to_dashboard( ['change_activity' => 1] );
    }

    function core_save_callbacks ( $model = null ) {
        $priority = $this->cb_save_priority;
        if (! $model ) {
            // Backward Compatibility
            $callbacks = ['save_filter_table', 'save_filter_urlmapping', 'save_filter_form',
                          'save_filter_workspace', 'pre_save_workspace', 'post_save_workspace',
                          'post_delete_workspace', 'post_save_urlmapping', 'pre_save_role', 'post_save_role',
                          'pre_save_question', 'post_save_template', 'post_save_permission',
                          'post_save_table', 'post_save_field', 'pre_save_widget', 'save_filter_asset',
                          'save_filter_tag', 'pre_save_user', 'post_save_comment', 'save_filter_workflow',
                          'save_filter_permission'];
            foreach ( $callbacks as $meth ) {
                $cb = explode( '_', $meth );
                $this->register_callback( $cb[2], $cb[0] . '_' . $cb[1], $meth, $priority, $this );
            }
        } else {
            if ( $model === 'table' || $model === 'urlmapping' ) {
                $this->register_callback( $model, 'save_filter', 'save_filter_' . $model, $priority, $this );
                $this->register_callback( $model, 'post_save', 'post_save_' . $model, $priority, $this );
            } else if ( $model === 'form' || $model === 'asset' || $model === 'tag' || $model === 'workflow' ) {
                $this->register_callback( $model, 'save_filter', 'save_filter_' . $model, $priority, $this );
            } else if ( $model === 'workspace' ) {
                $this->register_callback( $model, 'save_filter', 'save_filter_workspace', $priority, $this );
                $this->register_callback( $model, 'pre_save', 'pre_save_workspace', $priority, $this );
                $this->register_callback( $model, 'post_save', 'post_save_workspace', $priority, $this );
                $this->register_callback( $model, 'post_delete', 'post_delete_workspace', $priority, $this );
            } else if ( $model === 'role' ) {
                $this->register_callback( $model, 'pre_save', 'pre_save_role', $priority, $this );
                $this->register_callback( $model, 'post_save', 'post_save_role', $priority, $this );
            } else if ( $model === 'question' || $model === 'widget' || $model === 'user' ) {
                $this->register_callback( $model, 'pre_save', 'pre_save_' . $model, $priority, $this );
            } else if ( $model === 'template' || $model === 'permission'
                || $model === 'field' || $model === 'comment' ) {
                $this->register_callback( $model, 'post_save', 'post_save_' . $model, $priority, $this );
                if ( $model === 'permission' ) {
                    $this->register_callback( $model, 'save_filter', 'save_filter_' . $model, $priority, $this );
                }
            } else if ( $model === 'taxonomy' ) {
                $this->register_callback( $model, 'save_filter', 'save_filter_tag', $priority, $this );
            }
            $this->init_callbacks( $model, 'save' );
        }
    }

    function core_delete_callbacks ( $model = null ) {
        if (! $model ) return;
        $priority = $this->cb_delete_priority;
        if ( $model === 'template' ) {
            $this->register_callback( $model, 'delete_filter',
                                 'delete_filter_template', $priority, $this );
        } else if ( $model === 'table' ) {
            $this->register_callback( $model, 'post_delete', 'post_delete_table', $priority, $this );
            $this->register_callback( $model, 'delete_filter',
                                 'delete_filter_table', $priority, $this );
        } else if ( $model === 'field' || $model === 'ts_job'
            || $model === 'workspace' || $model === 'asset' ) {
            $this->register_callback( $model, 'post_delete', 'post_delete_' . $model, $priority, $this );
        } else if ( $model === 'permission' || $model === 'role' || $model === 'comment' ) {
            $this->register_callback( $model, 'post_delete', 'post_save_' . $model, $priority, $this );
        }
        $this->init_callbacks( $model, 'delete' );
    }

    function pull_back ( $app ) {
        $workflow_class = new PTWorkflow();
        return $workflow_class->pull_back( $app );
    }

    function clone_object ( $app ) {
        $model = $app->param( '_model' );
        $id = $app->param( 'id' );
        $table = $app->get_table( $model );
        if (! $model ||! $id ||! $table ) {
            return $app->error( 'Invalid request.' );
        }
        $workspace = $app->workspace();
        $can_duplicate = false;
        if ( $app->param( 'as_revision' ) ) {
            if ( $table->revisable ) {
                $can_duplicate = $app->can_do( $model, 'revision', null, $workspace );
            }
        } else {
            if ( $table->can_duplicate ) {
                $can_duplicate = $app->can_do( $model, 'duplicate', null, $workspace );
            }
        }
        if (! $can_duplicate ) {
            $app->error( 'Permission denied.' );
        }
        $obj = $app->db->model( $model )->load( (int) $id );
        if (! $obj ) {
            return $app->error( $app->translate( 'Cannot load %s (ID:%s)', [ 
                $app->translate( $table->label ), $id ] ) );
        }
        $clone_obj = PTUtil::clone_object( $app, $obj, false );
        $nickname = $app->user()->nickname;
        $label = $app->translate( $table->label );
        $primary = $table->primary;
        $name = $primary ? $obj->$primary : '';
        $params = [ $label, $name, $obj->id, $nickname, $clone_obj->id ];
        $add_params = '';
        if ( $app->param( 'as_revision' ) ) {
            $clone_obj->rev_type( 2 );
            $clone_obj->rev_type( 2 );
            if ( $obj->rev_type && $obj->rev_object_id ) {
                $clone_obj->rev_object_id( (int) $obj->rev_object_id );
            } else {
                $clone_obj->rev_object_id( $id );
            }
            if ( $clone_obj->has_column( 'status' ) ) {
                $status_published = $app->status_published( $model );
                if ( $status_published == 4 ) {
                    $clone_obj->status( 0 );
                } else {
                    $clone_obj->status( 1 );
                }
            }
            if ( $clone_obj->has_column( 'user_id' ) ) {
                $clone_obj->user_id( $app->user()->id );
            }
            if ( $clone_obj->has_column( 'uuid' ) ) {
                $clone_obj->uuid( $obj->uuid );
            }
            if ( $app->update_rev_created ) {
                if ( $obj->has_column( 'created_on' ) ) {
                    $time = $obj->_model == 'log' ? $app->date( 'YmdHis' ) : $app->date( 'YmdHis', $obj );
                    $clone_obj->created_on( $time );
                }
                if ( $obj->has_column( 'created_by' ) ) {
                    $clone_obj->created_by( $app->user()->id );
                }
            }
            $clone_obj->save();
            $add_params = '&edit_revision=1&revision_create=1';
            $message = $obj->rev_type
                     ? $app->translate(
                        "%1\$s '%2\$s(Revision ID:%3\$s)' cloned as revision(Revision ID:%5\$s) by %4\$s.", $params )
                     : $app->translate(
                        "%1\$s '%2\$s(ID:%3\$s)' cloned as revision(Revision ID:%5\$s) by %4\$s.", $params );
        } else {
            $message = $app->translate( "%1\$s '%2\$s(ID:%3\$s)' cloned(ID:%5\$s) by %4\$s.", $params );
            if ( $app->publish_clone ) {
                $app->publish_obj( $clone_obj );
            }
        }
        $log = $app->log( ['message' => $message, 'category' => 'create',
                           'model' => $table->name, 'object_id' => $clone_obj->id,
                           'level' => 'info'] );
        $cb_name = $app->param( 'as_revision' ) ? 'post_save_revision' : 'post_save_clone';
        $app->init_callbacks( $model, $cb_name );
        $callback = ['name' => $cb_name, 'is_new' => true, 'table' => $table, 'log' => $log ];
        $app->run_callbacks( $callback, $model, $clone_obj, $obj );
        $app->redirect( $app->admin_url . '?__mode=view&_type=edit&_model=' . $model .
            '&id=' . $clone_obj->id . $app->workspace_param . '&cloned=1' . $add_params );
    }

    private function save ( $app ) {
        if ( $max_execution_time = $app->max_exec_time ) {
            $max_execution_time = (int) $max_execution_time;
            ini_set( 'max_execution_time', $max_execution_time );
        }
        $db = $app->db;
        $db->update_multi = true;
        $callbacks = $app->callbacks;
        $db->begin_work();
        $app->txn_active = true;
        $app->get_scheme_from_db( 'urlinfo' );
        $model = $app->param( '_model' );
        $app->validate_magic();
        if (!$model ) return $app->error( 'Invalid request.' );
        $table = $app->get_table( $model );
        if (!$table ) return $app->error( 'Invalid request.' );
        $app->stash( 'table', $table );
        if ( $table->revisable ) $app->db->in_duplicate = true; // Not remove blob file.
        $class = $table->name;
        if ( prototype_auto_loader( $class ) ) {
            new $class();
        }
        if (! $app->param( 'id' ) && $app->param( '_duplicate_from' ) ) { 
            $app->param( 'id', (int)$app->param( '_duplicate_from' ) );
            $_POST['id'] = (int)$app->param( '_duplicate_from' );
        }
        $action = $app->param( 'id' ) ? 'edit' : 'create';
        $obj = $db->model( $model )->new();
        $scheme = $app->get_scheme_from_db( $model );
        if (!$scheme ) return $app->error( 'Invalid request.' );
        $db->scheme[ $model ] = $scheme;
        $primary = $scheme['indexes']['PRIMARY'];
        $id = $app->param( $primary );
        if ( $id ) {
            if (! is_numeric( $id ) ) {
                return $app->error( 'Invalid request.' );
            }
            $obj = $obj->load( $id );
            if (!$obj )
                return $app->error( 'Cannot load %s (ID:%s)', [ 
                    $app->translate( $table->label ), $id ] );
        } else {
            if (! $app->can_do( $model, 'create' ) ) {
                $app->error( 'Permission denied.' );
            }
        }
        if (!$app->can_do( $model, $action, $obj ) ) {
            $app->error( 'Permission denied.' );
        }
        $app->core_save_callbacks( $model );
        $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
        if ( $obj->id && $obj->workspace_id ) {
            $workspace_id = $obj->workspace_id;
        }
        $workflow = $db->model( 'workflow' )->get_by_key(
            ['model' => $model,
             'workspace_id' => $workspace_id ] );
        if ( $workflow->id ) {
            $app->register_callback( $model, 'post_save', 'workflow_post_save', 1, $app );
            $app->stash( 'workflow', $workflow );
        }
        $db->caching = false;
        $orig_relations = $app->get_relations( $obj );
        $orig_metadata  = $app->get_meta( $obj );
        $original = clone $obj;
        $original->_relations = $orig_relations;
        $original->_meta = $orig_metadata;
        $original->id( null );
        $is_changed = false;
        $changed_cols = [];
        $error_selectors = [];
        $properties = $scheme['edit_properties'];
        $custom_properties = isset( $app->registry['edit_properties'] ) ? $app->registry['edit_properties'] : [];
        $autoset = isset( $scheme['autoset'] ) ? $scheme['autoset'] : [];
        $columns = $scheme['column_defs'];
        $labels = $scheme['labels'];
        $relations = isset( $scheme['relations'] ) ? $scheme['relations'] : [];
        $unchangeable = isset( $scheme['unchangeable'] ) ? $scheme['unchangeable'] : [];
        $unique = isset( $scheme['unique'] ) ? $scheme['unique'] : [];
        $validation_types = isset( $scheme['validation_types'] ) ? $scheme['validation_types'] : [];
        $maxlength = isset( $scheme['maxlength'] ) ? $scheme['maxlength'] : [];
        $errors = [];
        $placements = [];
        $add_tags = [];
        $add_taxonomies = [];
        $text = '';
        $as_revision = false;
        $renderer = null;
        $add_attchments = [];
        $remove_attachments = [];
        $replaced_attachments = [];
        $password_cols = [];
        $can_revision = $app->can_do( $model, 'revision', null, $app->workspace() );
        if ( $app->param( '_save_as_revision' ) ) {
            if (! $can_revision ) {
                $app->error( 'Permission denied.' );
            }
            $as_revision = true;
            $orig_id = $obj->id;
            $obj = PTUtil::clone_object( $app, $obj );
            $obj->rev_object_id( $orig_id );
            $obj->rev_type( 2 );
            if ( $table->has_status ) {
                $obj->status = $table->start_end ? 0 : 1;
            }
        }
        if ( $model == 'user' ) {
            $app->user = clone $app->user();
        }
        $attachment_cols = PTUtil::attachment_cols( $model, $scheme );
        $rel_attach_cols = PTUtil::attachment_cols( $model, $scheme, 'relation' );
        $has_attachment = false;
        $has_assets = false;
        $object_label = $table->primary ? $app->param( $table->primary ) : '';
        $require_blobs = [];
        foreach( $columns as $col => $props ) {
            if ( $props['type'] == 'string' && ! isset( $maxlength[ $col ] ) && isset( $props['size'] ) ) {
                $maxlength[ $col ] = $props['size'];
            } 
            if ( $col === $primary ) continue;
            if ( $obj->id && in_array( $col, $autoset ) ) continue;
            if ( $as_revision && in_array( $col, $attachment_cols ) ) continue;
            $col_error = false;
            $value = $app->param( $col );
            $all_values = $value;
            if ( is_array( $value ) ) {
                $all_values = join( ',', $value );
            }
            $type = $props['type'];
            if ( isset( $properties[ $col ] ) ) {
                if ( isset( $custom_properties[ $properties[ $col ] ] ) ) {
                    $custom_prop = $custom_properties[ $properties[ $col ] ];
                    $prop_plugin = $app->component( $custom_prop['component'] );
                    $prop_meth = $custom_prop['method'];
                    if ( $prop_plugin && method_exists( $prop_plugin, $prop_meth ) ) {
                        $varidate = $prop_plugin->$prop_meth( $app, $obj, $value, $col, $errors );
                        if (! $varidate ) {
                            $col_error = true;
                        }
                    }
                }
                if ( ( $type === 'text' || $type === 'string' ) && $all_values ) {
                    $text .= ' ' . $all_values;
                }
                if ( $col === 'order' && $table->sortable && ! $value ) {
                    $value = $app->get_order( $obj );
                }
                if ( isset( $relations[ $col ] ) ) {
                    if (!$value ) $value = [];
                    if (! $app->param( '_preview' ) ) {
                        if ( in_array( $col, $rel_attach_cols ) ) {
                            $app->get_scheme_from_db( 'attachmentfile' );
                            $new_vars = [];
                            $remove_sesses = [];
                            foreach ( $value as $val ) {
                                if (! $val ) continue;
                                if ( strpos( $val, 'session' ) === false ) {
                                    $attachment_id = (int) $val;
                                    $new_vars[] = $attachment_id;
                                    if ( $as_revision ) {
                                        $old_file = $db->model( 'attachmentfile' )->load( $attachment_id );
                                        if ( $old_file ) {
                                            $replaced_attachments[ $attachment_id ] = $old_file;
                                        }
                                    }
                                    $has_attachment = true;
                                } else {
                                    $sess_id = str_replace( 'session-', '', $val );
                                    $filename = $app->param( "_{$col}_label_" . $val );
                                    $sess = $db->model( 'session' )->load( (int) $sess_id );
                                    if (! $sess ) continue;
                                    $attachment = $app->db->model('attachmentfile')->new();
                                    if ( $filename ) {
                                        $attachment->name( $filename );
                                    } else {
                                        $attachment->name( $sess->value );
                                    }
                                    $attachment->mime_type( $sess->key );
                                    $attachment->workspace_id( $obj->workspace_id );
                                    $attachment->file( $sess->data );
                                    $json = json_decode( $sess->text );
                                    $attachment->size( $json->file_size );
                                    $attachment->class( $json->class );
                                    if ( $obj->has_column( 'status' ) ) {
                                        $obj_status = $obj->status;
                                        $publish_status = $app->status_published( $model );
                                        $file_status = $obj_status == $publish_status ? 4 : $obj_status;
                                        $attachment->status( $obj->status );
                                    } else {
                                        $attachment->status( 4 );
                                    }
                                    $app->set_default( $attachment );
                                    $attachment->save();
                                    $changed_cols[ $col ] = true;
                                    $has_attachment = true;
                                    $to_ids[] = $attachment->id;
                                    $metadata = $app->db->model( 'meta' )->get_by_key(
                                       ['model' => 'attachmentfile', 'object_id' => $attachment->id,
                                                      'kind' => 'metadata', 'key' => 'file' ] );
                                    $metadata->text( $sess->text );
                                    $metadata->metadata( $sess->extradata );
                                    $metadata->data( $sess->metadata );
                                    $metadata->save();
                                    $remove_sesses[] = $sess;
                                    $new_vars[] = (int) $attachment->id;
                                    $app->publish_obj( $attachment, null, false, true );
                                }
                            }
                            if (! empty( $remove_sesses ) ) {
                                $db->model( 'session' )->remove_multi( $remove_sesses );
                            }
                            $value = $new_vars;
                        }
                    }
                    $placements[ $col ] = [ $relations[ $col ] => $value ];
                    if ( $col === 'tags' ) {
                        $additional_tags = $app->param( 'additional_tags' );
                        if ( $additional_tags ) {
                            $add_tags = preg_split( '/\s*,\s*/', $additional_tags );
                        }
                    } else if ( $col === 'taxonomies' ) {
                        $additional_taxonomies = $app->param( 'additional_taxonomies' );
                        if ( $additional_taxonomies ) {
                            $add_taxonomies = preg_split( '/\s*,\s*/', $additional_taxonomies );
                        }
                    }
                }
                list( $prop, $opt ) = [ $properties[ $col ], ''];
                if ( strpos( $prop, '(' ) ) {
                    list( $prop, $opt ) = explode( '(', $prop );
                    $opt = rtrim( $opt, ')' );
                }
                if ( $value === null && $prop !== 'datetime' ) continue;
                if ( $prop === 'hidden' ) {
                    if ( $col === 'id' || $col === 'workspace_id' ) {
                        continue;
                    }
                } else if ( $prop === 'datetime' || $prop === 'date' ) {
                    $date = $app->param( $col . '_date' );
                    $time = $app->param( $col . '_time' );
                    if ( $prop === 'date' || !$time ) $time = '000000';
                    $ts = $obj->db2ts( $date . $time );
                    if ( $ts && !$app->is_valid_ts( $ts, $msg ) ) {
                        $col_error = true;
                        $col_name = isset( $scheme['locale']['default'][ $col ] )
                                  ? $scheme['locale']['default'][ $col ] : $col;
                        $errors[] = $app->translate( 'Please specify a valid date for %s.',
                                    $app->translate( $col_name ) );
                        $app->param( $col . '_date', date('Y-m-d') );
                        $app->param( $col . '_time', date('H:i:s') );
                    } else {
                        $value = $ts ? $obj->ts2db( $ts, true ) : null;
                    }
                } else if ( $prop === 'number' ) {
                    if ( stripos( $type, 'int' ) !== false ) {
                        $value = (int) $value;
                    } else if ( $type == 'double' || strpos( $type, 'decimal' ) === 0 ) {
                        $value = (float) $value;
                    }
                } else if ( $prop === 'password' ) {
                    $pass = $app->param( $col );
                    $verify = $app->param( $col . '-verify' );
                    if ( $pass || $verify ) {
                        if ( $model === 'user' || $model === 'member' ) {
                            if (!$app->is_valid_password( $pass, $verify, $msg ) ) {
                                $errors[] = $msg;
                                $col_error = true;
                                continue;
                            }
                        }
                        if ( $pass !== $verify ) {
                            $errors[] = $app->translate( 'Both passwords must match.' );
                            $col_error = true;
                            continue;
                        }
                        $changed_cols[ $col ] = true;
                    }
                    if (! $value ) {
                        $value = $obj->$col;
                    } else {
                        if ( strpos( $opt, 'hash' ) !== false ) {
                            $value = password_hash( $value, PASSWORD_BCRYPT );
                            $password_cols[] = $col;
                        }
                    }
                }
                if ( in_array( $col, $unchangeable ) ) {
                    if ( $obj->id && $obj->$col != $value ) {
                        if ( $col != 'uuid' && $obj->_model != 'user' ) {
                            $value = $obj->$col;
                            continue;
                        }
                    }
                }
                if (! $as_revision && in_array( $col, $unique ) && $all_values ) {
                    $terms = [ $col => $all_values ];
                    $is_revision = false;
                    if ( $table->revisable ) {
                        $terms['rev_type'] = 0;
                        $is_revision = $obj->rev_type;
                    }
                    if (! $is_revision ) {
                        if ( $obj->id ) {
                            $terms['id'] = ['!=' => $obj->id ];
                        }
                        if ( $obj->has_column( 'workspace_id' ) && $model != 'user' ) {
                            $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
                            $terms['workspace_id'] = $workspace_id;
                        }
                        $compare = $db->model( $model )->load( $terms, null, 'id' );
                        if ( is_array( $compare ) && !empty( $compare ) ) {
                            if ( $props['type'] === 'int' && isset( $properties[ $col ] )
                                && strpos( $properties[ $col ], 'relation:' ) === 0 ) {
                                list( $dummy, $relModel, $relCoumn ) = explode( ':', $properties[ $col ] );
                                $rel = $app->db->model( $relModel )->load( $all_values, null, $relCoumn );
                                if ( $rel ) {
                                    $all_values = $rel->$relCoumn;
                                }
                            }
                            $errors[] = $app->translate(
                                'A %1$s with the same %2$s already exists.',
                                    [ $all_values, $app->translate( $labels[ $col ] ) ] );
                            $col_error = true;
                        }
                    }
                }
                if ( isset( $validation_types[ $col ] ) ) {
                    $validation = $validation_types[ $col ];
                    $validation = isset( $app->registry['cms_validations'] )
                                ? $app->registry['cms_validations'][ $validation ] : null;
                    if ( $validation && $col != 'email' ) {
                        $class = $app->component( $validation['component'] );
                        if (! $class ) {
                            $class = $validation['component'];
                            if ( $class == 'PTValidator' ) {
                                $class = new PTValidator();
                            }
                        }
                        $meth = $validation['method'];
                        $force = isset( $validation['force'] ) ? $validation['force'] : $all_values;
                        if ( $force && $class && method_exists( $class, $meth ) ) {
                            $e = '';
                            $validate = $class->$meth( $app->translate( $labels[ $col ] ), $value, $e, $col );
                            if (! $validate ) {
                                $errors[] = $e;
                                $col_error = true;
                            }
                        }
                    }
                }
                if ( $all_values && isset( $maxlength[ $col ] ) && ctype_digit( (string) $maxlength[ $col ] )
                    && mb_strlen( preg_replace( "/\r\n|\r/","\n", $all_values ) ) > $maxlength[ $col ] ) {
                    $errors[] = $app->translate( 'Enter the %s within %s characters.',
                                [ $app->translate( $labels[ $col ] ), $maxlength[ $col ] ] );
                    $col_error = true;
                } else if ( $all_values && isset( $maxlength[ $col ] )
                    && strpos( $maxlength[ $col ], ',' ) !== false ) {
                    list( $min, $max ) = preg_split( '/\s*,\s*/', $maxlength[ $col ] );
                    if ( $all_values < $min || $all_values > $max ) {
                        $errors[] = $app->translate( '%s must be in the range %s to %s.',
                          [ $app->translate( $labels[ $col ] ), $min, $max ] );
                        $col_error = true;
                    }
                }
            }
            if ( is_array( $value ) ) {
                $value = join( ',', $value );
            }
            if ( $col !== 'id' ) {
                $not_null = isset( $props['not_null'] ) ? $props['not_null'] : false;
                if ( $not_null && $col === 'basename' ) {
                    if (!$value ) {
                        $text = $object_label ? strip_tags( $object_label )
                              : strip_tags( $text );
                        $value = PTUtil::make_basename( $obj, $text, true );
                    }
                }
                if ( $not_null && $type === 'datetime' ) {
                    $value = $obj->db2ts( $value );
                    if (!$value ) {
                        if ( $app->default_ts && $app->default_ts === 'CURRENT_TIMESTAMP' ) {
                            $value = date( 'YmdHis' );
                        }
                    }
                }
                if ( $not_null && ! $value ) {
                    if ( isset( $props['default'] ) ) {
                        $value = $props['default'];
                    } else {
                        if ( strpos( $type, 'int' ) !== false ) {
                            if ( $app->check_int_null == false || 
                                $col == 'rev_type' || $col == 'workspace_id' ) {
                                $property = isset( $properties[ $col ] ) ? $properties[ $col ] : '';
                                if ( $property && strpos( $property, 'relation:' ) === 0 ) {
                                    if ( in_array( $col, $attachment_cols ) ) {
                                        $magic = $app->param( "{$col}-magic" );
                                        if (! $magic ) {
                                            $errors[] = $app->translate( '%s is required.',
                                                        $app->translate( $labels[ $col ] ) );
                                            $col_error = true;
                                        }
                                    } else {
                                        $errors[] = $app->translate( '%s is required.',
                                                    $app->translate( $labels[ $col ] ) );
                                        $col_error = true;
                                    }
                                } else {
                                    // or allow 0 cols.
                                    $value = (int) $value;
                                }
                            } else if ( $value === '' ) {
                                $errors[] = $app->translate( '%s is required.',
                                            $app->translate( $labels[ $col ] ) );
                                $col_error = true;
                            }
                        } else {
                            if ( $type != 'blob' ) {
                                if ( $value === '' || $value === null ) { // allow 0 value.
                                    $errors[] = $app->translate( '%s is required.',
                                                $app->translate( $labels[ $col ] ) );
                                    $col_error = true;
                                }
                            } else {
                                $require_blobs[] = $col;
                            }
                        }
                    }
                }
                if ( $col == 'parent_id' && $table->hierarchy ) {
                    if (! $app->can_do( $model, 'hierarchy', null, $app->workspace() ) ) {
                        $value = $obj->parent_id;
                    } else {
                        if ( $original->parent_id != $value ) {
                            $obj->$col( $value );
                            $parent_id_err = '';
                            if ( $obj->id && ! $app->check_parent_id( $obj, $original, $parent_id_err ) ) {
                                $errors[] = $parent_id_err;
                                $col_error = true;
                                $obj->$col( $original->parent_id );
                            }
                        }
                    }
                } else if ( $col == 'email' && $value && $app->validate_email ) {
                    $mailErr = '';
                    if (! $app->is_valid_email( $value, $mailErr ) ) {
                        $errors[] = $mailErr;
                        $col_error = true;
                    }
                    $_REQUEST['email'] = $value;
                }
            }
            if (! isset( $relations[ $col ] ) ) {
                $value = is_string( $value ) && $value ? preg_replace( "/\r\n|\r/","\n", $value ) : $value;
                if ( $col === 'model' || $col === 'count' ) {
                    // Collision $obj->model( $model )->...
                    $model_col = "{$model}_{$col}";
                    $obj->$model_col = $value;
                } else {
                    if ( $type == 'blob' ) {
                        if (! $obj->$col &&
                            isset( $props['not_null'] ) && $props['not_null'] ) {
                            $obj->$col('');
                        }
                    } else {
                        $obj->$col( $value );
                    }
                }
            }
            if ( $col_error ) {
                $error_selectors["#{$col}:not(ul)"] = true;
                if ( isset( $properties[ $col ] ) ) {
                    if ( $properties[ $col ] === 'richtext' ) {
                        $error_selectors["#editor-{$col}-wrapper"] = true;
                    } else if ( strpos( $properties[ $col ], 'relation' ) === 0 ) {
                        if ( preg_match( '/:dialog$/', $properties[ $col ] ) ) {
                            $error_selectors["#{$col} .badge"] = true;
                        } else if ( preg_match( '/:hierarchy$/', $properties[ $col ] ) ) {
                            $error_selectors["#{$col}-wrapper .relation_nestable_list"] = true;
                        } else if ( preg_match( '/:checkbox$/', $properties[ $col ] ) ) {
                            $error_selectors["#{$col}-wrapper .custom-control-indicator"] = true;
                        }
                        if ( preg_match( '/:attachmentfile:/', $properties[ $col ] ) ) {
                            $error_selectors["#drop-{$col}"] = true;
                        }
                    }
                }
            }
        }
        if (!$app->can_do( $model, $action, $obj ) ) {
            $app->error( 'Permission denied.' );
        }
        $callback = ['name' => 'save_filter', 'add_tags' => $add_tags, 'add_taxonomies' => $add_taxonomies,
                     'error' => '', 'errors' => $errors, 'error_selectors' => $error_selectors ];
        if ( $app->param( '_preview' ) ) {
            $save_filter = true;
        } else {
            $save_filter = $app->run_callbacks( $callback, $model, $obj );
            $add_tags = $callback['add_tags'];
            $add_taxonomies = $callback['add_taxonomies'];
        }
        $errors = $callback['errors'];
        $error_selectors = $callback['error_selectors'];
        if ( $msg = $callback['error'] ) {
            $errors[] = $msg;
        }
        if ( $app->compile_check && isset( $app->compile_cols[ $obj->_model ] ) ) {
            $app->build_pre_parse = 0;
            $comp_col = $app->compile_cols[ $obj->_model ];
            $comp_cols = is_string( $comp_col ) ? [ $comp_col ] : $comp_col;
            $compile_error = false;
            $set_ctx_from_template = false;
            $regex = '/<\${0,1}' . $app->ctx->prefix . '/si';
            foreach ( $comp_cols as $comp_col ) {
                if ( $obj->$comp_col != $original->$comp_col ) {
                    if ( $obj->_model === 'template' && !$set_ctx_from_template ) {
                        // Set Context from URLMapping.
                        $ctx = $app->ctx;
                        $ctx = PTUtil::set_ctx_from_template( $ctx, $obj );
                        $set_ctx_from_template = true;
                    }
                    if ( preg_match( $regex, $obj->$comp_col ) ) {
                        $compile_check = PTUtil::compile_check( $obj, $comp_col );
                        $app->ctx->vars['parser_errors'] = [];
                        if ( $compile_check !== true ) {
                            $error_selectors[ "#{$comp_col}" ] = true;
                            if ( $obj->_model == 'template' ) {
                                if (! $app->param( '_preview' ) ) {
                                    $compile_error = true;
                                }
                                $app->ctx->vars['parser_errors'] = $compile_check;
                            } else if ( is_array( $compile_check ) ) {
                                $errors = array_merge( $errors, $compile_check );
                                $compile_error = true;
                            }
                        }
                    }
                }
            }
            if ( $compile_error ) {
                array_unshift( $errors, $app->translate( 'Failed to save %s.',
                    $app->translate( $table->label ) ) );
            }
        }
        $is_new = $obj->id ? false : true;
        if ( count( $require_blobs ) ) {
            foreach ( $require_blobs as $require_col ) {
                if (! $obj->$require_col && ! $app->param( "{$require_col}-magic" ) ) {
                    $errors[] =
                        $app->translate( '%s is required.', $app->translate( $labels[ $require_col ] ) );
                    $error_selectors["#drop-{$col}"] = true;
                }
            }
        }
        $required_fields = PTUtil::get_fields( $obj, 'requireds' );
        $required_basenames = array_keys( $required_fields );
        foreach ( $required_basenames as $fld ) {
            $field_error = false;
            $fld_value = $app->param( "{$fld}__c" );
            if ( $fld_value !== null ) {
                if ( is_array( $fld_value ) ) {
                    $var_exists = false;
                    foreach ( $fld_value as $fld_val ) {
                        $fld_values = json_decode( $fld_val, true );
                        $fld_values = array_shift( $fld_values );
                        if ( is_array( $fld_values ) ) {
                            foreach ( $fld_values as $v ) {
                                if ( $v ) {
                                    $var_exists = true;
                                    break 2;
                                }
                            }
                        } else if ( $fld_values ) {
                            $var_exists = $fld_values;
                            break;
                        }
                    }
                    if ( $var_exists === false || $var_exists === null ) {
                        $errors[] =
                            $app->translate( '%s is required.', $required_fields[ $fld ] );
                        $field_error = true;
                    }
                } else {
                    $fld_values = json_decode( $fld_value, true );
                    if ( empty( $fld_values ) ) {
                        $errors[] =
                            $app->translate( '%s is required.', $required_fields[ $fld ] );
                        $field_error = true;
                    } else {
                        $fld_values = array_shift( $fld_values );
                        $var_exists = false;
                        if ( is_array( $fld_values ) ) {
                            foreach ( $fld_values as $v ) {
                                if ( $v ) {
                                    $var_exists = true;
                                    break;
                                }
                            }
                        } else if ( $fld_values ) {
                            $var_exists = $fld_values;
                        }
                        if ( $var_exists === false || $var_exists === null ) {
                            $errors[] =
                                $app->translate( '%s is required.', $required_fields[ $fld ] );
                            $field_error = true;
                        }
                    }
                }
            }
            if ( $field_error ) {
                $error_selectors["#field-{$fld}-wrapper input,#field-{$fld}-wrapper textarea"] = true;
                $error_selectors["#field-{$fld}-wrapper select,#field-{$fld}-wrapper .cf-editor-wrapper"] = true;
                $error_selectors["#field-{$fld}-wrapper .custom-control-indicator,#field-{$fld}-wrapper .badge"] = true;
            }
        }
        if (!empty( $errors ) || !$save_filter ) {
            $app->ctx->vars['error_selectors'] = array_keys( $error_selectors );
            $error = join( "\n", $errors );
            if ( $app->param( '_preview' ) ) return $app->error( $error );
            $db->rollback();
            $app->txn_active = false;
            $app->param( '_duplicate', '' );
            unset( $_REQUEST['_duplicate'] );
            return $app->forward( $model, $error, $obj );
        }
        $app->set_default( $obj );
        if ( $obj->has_column( 'workspace_id' ) && !$obj->workspace_id ) {
            $obj->workspace_id( $workspace_id );
        }
        if ( $app->param( '_preview' ) ) {
            $db->rollback();
            $app->txn_active = false;
            return $app->preview( $obj, $scheme );
        }
        if ( $model === 'workspace' ) {
            $obj->last_update( $app->request_time );
        }
        if ( $app->param( '_created_on_update' ) && $obj->has_column( 'created_on' ) ) {
            $obj->created_on( $obj->modified_on );
        }
        if ( $app->leave_revisions && $app->param( '_change_to_master' ) && $obj->rev_object_id && $obj->id ) {
            $select_cols = $app->core_tags->select_cols( $app, $obj, [], $columns );
            $revisions = $db->model( $model )->load(
              ['rev_object_id' => $obj->rev_object_id, 'id' => ['!=' => $obj->id ] ], null, $select_cols );
            if (! empty( $revisions ) ) {
                foreach ( $revisions as $idx => $rev ) {
                    $rev->rev_object_id( $obj->id );
                    $revisions[ $idx ] = $rev;
                }
                $db->model( $model )->update_multi( $revisions );
            }
            $obj->rev_object_id( null );
            $obj->rev_type( 0 );
        }
        $callback = ['name' => 'pre_save', 'error' => '', 'is_new' => $is_new, 'add_tags' => $add_tags,
                     'add_taxonomies' => $add_taxonomies, 'errors' => $errors,
                     'error_selectors' => $error_selectors ]; // 'changed_cols' => $changed_cols
        $pre_save = $app->run_callbacks( $callback, $model, $obj, $original );
        $error_selectors = $callback['error_selectors'];
        $add_tags = $callback['add_tags'];
        $add_taxonomies = $callback['add_taxonomies'];
        $errors = $callback['errors'];
        if ( $msg = $callback['error'] ) {
            $errors[] = $msg;
        }
        if (!empty( $errors ) || !$pre_save ) {
            $error = join( "\n", $errors );
            if ( $app->param( '_preview' ) ) return $app->error( $error );
            $app->ctx->vars['error_selectors'] = array_keys( $error_selectors );
            $db->rollback();
            $app->txn_active = false;
            return $app->forward( $model, $error, $obj );
        }
        $errstr = $app->translate( 'An error occurred while saving %s.',
                    $app->translate( $table->label ) );
        if (! empty( $app->hooks ) ) {
            $app->run_hooks( 'pre_save' );
        }
        if (! $as_revision && $table->revisable && $obj->rev_object_id && $obj->rev_type ) {
            $master = $db->model( $model )->load( (int) $obj->rev_object_id );
            if ( is_object( $master ) ) {
                $changed_cols = PTUtil::object_diff( $app, $obj, $master, [], $changed_cols );
                if (! empty( $password_cols ) ) {
                    foreach ( $password_cols as $password_col ) {
                        if ( isset( $changed_cols[ $password_col ] ) ) {
                            $changed_cols[ $password_col ] = str_repeat( '*', strlen( $changed_cols[ $password_col ] ) );
                        }
                    }
                }
                $obj->rev_diff( json_encode( $changed_cols,
                                JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT ) );
            }
        } else if ( $as_revision && $obj->has_column( 'user_id' ) && $obj->has_column( 'previous_owner' ) ) {
            if ( $obj->user_id != $app->user()->id ) {
                $obj->previous_owner( $obj->user_id );
                $obj->user_id( $app->user()->id );
            }
        }
        if ( $as_revision && $app->update_rev_created ) {
            if ( $obj->has_column( 'created_on' ) ) {
                $time = $obj->_model == 'log' ? $app->date( 'YmdHis' ) : $app->date( 'YmdHis', $obj );
                $obj->created_on( $time );
            }
            if ( $obj->has_column( 'created_by' ) ) {
                $obj->created_by( $app->user()->id );
            }
        }
        if ( $table->revisable ) {
            if ( $obj->_pado ) $obj->_pado->cleanup_blob = false;
            if ( $original->_pado ) $original->_pado->cleanup_blob = false;
        }
        if (! $obj->save() ) return $app->rollback( $errstr );
        if ( $model === 'user' && $app->user()->id == $obj->id ) {
            $app->user = $obj;
        }
        if ( $model == 'workspace' && $app->caching ) {
            $cache_key = $obj->_model . DS . $obj->id . DS . 'object__c';
            $app->clear_cache( $cache_key );
        }
        $target_id = $obj->id;
        $_revision_id = null;
        $file_metadata = [];
        if ( $app->param( '_apply_to_master' ) ) {
            if (! $can_revision ) {
                return $app->rollback( 'Permission denied.' );
            }
            $_revision_id = $app->param( '_revision_id' );
        }
        if ( $_revision_id ) {
            $rev_obj = $db->model( $model )->load( (int) $_revision_id );
            if (! $rev_obj ) {
                return $app->error(
                    'Because the revision %s has been deleted,'
                    . ' the %s can not be apply.',
                    $app->translate( $table->label ) );
            }
            if ( $rev_obj ) {
                foreach ( $properties as $key => $val ) {
                    if ( $val === 'file' ) {
                        $file_remove = $app->param( "{$key}-remove" );
                        $magic = $app->param( "{$key}-magic" );
                        if (! $file_remove && ! $magic ) {
                            $comp_from = $rev_obj->$key ? md5( $rev_obj->$key ) : '';
                            $comp_to = $obj->$key ? md5( $obj->$key ) : '';
                            if ( $comp_from != $comp_to ) {
                                $obj->$key( $rev_obj->$key );
                                $file_meta = $db->model( 'meta' )->load(
                                    ['model' => $model, 'object_id' => $rev_obj->id,
                                     'key' => $key ] );
                                if (! empty( $file_meta ) ) {
                                    $file_metadata[ $key ] = $file_meta;
                                }
                            }
                        }
                    }
                }
            }
        }
        if ( $table->revisable ) {
            if (! $as_revision && $obj->rev_type && $app->param( 'rev_type' ) && 
                $obj->rev_type != $app->param( 'rev_type' ) ) {
                $rev_type = (int) $app->param( 'rev_type' );
                if ( $rev_type == 1 || $rev_type == 2 ) {
                    $obj->rev_type( $rev_type );
                }
            }
        }
        if ( $obj->has_column( 'user_id' ) && $obj->has_column( 'previous_owner' ) ) {
            if (! $obj->previous_owner || $obj->user_id != $original->user_id ) {
                if ( $obj->previous_owner != $obj->user_id ) {
                    $previous_owner = $original->user_id;
                    if ( $previous_owner != $app->user->id ) {
                        // or $previous_owner
                        $previous_owner = $app->user->id;
                    }
                    if ( $original->user_id != $app->user->id ) {
                        $obj->previous_owner( $original->user_id );
                    } else {
                        $obj->previous_owner( $original->previous_owner );
                    }
                }
                if (! $original->previous_owner && $app->user->id != $obj->user_id ) {
                    $original->previous_owner( $app->user->id );
                }
            }
        }
        if ( $app->param( '_apply_to_master' ) ) {
            if ( $table->has_status ) {
                $obj->status( $original->status );
                if ( $obj->_model == 'asset' ) {
                    $file_name = $original->file_name;
                    $original_ext = $original->file_ext;
                    $file_ext = PTUtil::get_extension( $obj->file_name );
                    $file_basename = preg_replace( "/\.$original_ext$/i", '', $file_name );
                    if ( $file_ext ) {
                        $obj->file_name( "{$file_basename}.{$file_ext}" );
                    } else {
                        $obj->file_name( $file_basename );
                    }
                }
            }
            if ( $obj->has_column( 'basename' ) && $app->keep_master_basename ) {
                $obj->basename( $original->basename );
            }
        }
        if (! $obj->save() ) return $app->rollback( $errstr );
        if (! empty( $file_metadata ) ) {
            foreach ( $file_metadata as $key => $file_meta ) {
                $old_meta = $db->model( 'meta' )->load(
                                    ['model' => $model, 'object_id' => $obj->id,
                                     'key' => $key ] );
                foreach ( $old_meta as $meta ) {
                    $urls = $app->db->model( 'urlinfo' )->load(
                                            ['meta_id' => $meta->id ] );
                    foreach ( $urls as $url ) {
                        $url->remove();
                    }
                    $meta->remove();
                }
                foreach ( $file_meta as $meta ) {
                    $meta = clone $meta;
                    $meta->id( null );
                    $meta->object_id( $target_id );
                    $meta->save();
                    if ( $meta->kind == 'thumbnail' ) {
                        // re-make thumbnail.
                        $args = $meta->data;
                        $args = $args ? unserialize( $args ) : null;
                        if (! empty( $args ) ) {
                            $url = PTUtil::thumbnail_url( $obj, $args );
                        }
                    }
                }
            }
        }
        if ( $has_attachment ) {
            $attachments = $app->get_related_objs( $obj, 'attachmentfile', true );
            $update_files = [];
            foreach ( $attachments as $attachment ) {
                $relation_key = $attachment->relation_name;
                $relation_key_ids = $app->param( $relation_key );
                if (! in_array( $attachment->id, $relation_key_ids ) ) {
                    $changed_cols[ $relation_key ] = true;
                }
                $label = $app->param( "_{$relation_key}_label_" . $attachment->id );
                if ( $label && $attachment->name != $label ) {
                    $attachment->name( $label );
                    $update_files[] = $attachment;
                }
            }
            if (! empty( $update_files ) ) {
                if (! $app->db->model( 'attachmentfile' )->update_multi( $update_files ) ) {
                    return $app->rollback( 'An error occurred while updating the related object(s).' );
                }
            }
        }
        if (! empty( $add_tags ) ) {
            $can_add_tags = false;
            if (! $app->tag_permission ) {
                $can_add_tags = true;
            } else {
                $can_add_tags = $app->can_do( 'tag', 'create' );
            }
            $props = $placements['tags']['tag'];
            foreach ( $add_tags as $tag ) {
                $tag = PTUtil::normalize( $tag );
                $normalize = PTUtil::normalize_tag( $tag );
                if (!$normalize ) continue;
                $terms = ['normalize' => $normalize, 'class' => $table->name ];
                $terms['workspace_id'] = $workspace_id;
                $tag_obj = $db->model( 'tag' )->get_by_key( $terms );
                if ( !$tag_obj->id && !$can_add_tags ) {
                    continue;
                }
                if (!$tag_obj->id ) {
                    $tag_obj->name( $tag );
                    $app->set_default( $tag_obj );
                    $order = $app->get_order( $tag_obj );
                    $tag_obj->order( $order );
                    if (! $tag_obj->save() ) return $app->rollback( $errstr );
                }
                if (! in_array( $tag_obj->id, $props ) ) {
                    $props[] = $tag_obj->id;
                }
            }
            $placements['tags']['tag'] = $props;
        }
        if (! empty( $add_taxonomies ) ) {
            $can_add_tags = false;
            if (! $app->taxonomy_permission ) {
                $can_add_tags = true;
            } else {
                $can_add_tags = $app->can_do( 'taxonomy', 'create' );
            }
            $props = $placements['taxonomies']['taxonomy'];
            foreach ( $add_taxonomies as $tag ) {
                $tag = PTUtil::normalize( $tag );
                $normalize = PTUtil::normalize_tag( $tag );
                if (!$normalize ) continue;
                $terms = ['normalize' => $normalize ];
                if ( $db->model( 'taxonomy' )->has_column( 'workspace_id', true ) ) {
                    $app->get_scheme_from_db( 'taxonomy' );
                    $terms['workspace_id'] = $workspace_id;
                }
                $tag_obj = $db->model( 'taxonomy' )->get_by_key( $terms );
                if ( !$tag_obj->id && !$can_add_tags ) {
                    continue;
                }
                if (!$tag_obj->id ) {
                    $tag_obj->name( $tag );
                    $app->set_default( $tag_obj );
                    $order = $app->get_order( $tag_obj );
                    $tag_obj->order( $order );
                    if (! $tag_obj->save() ) return $app->rollback( $errstr );
                }
                if (! in_array( $tag_obj->id, $props ) ) {
                    $props[] = $tag_obj->id;
                }
            }
            $placements['taxonomies']['taxonomy'] = $props;
        }
        if (! empty( $placements ) ) {
            foreach ( $placements as $name => $props ) {
                $to_obj = key( $props );
                $to_ids = $props[ $to_obj ];
                $_primary_id = $app->param( "{$name}_primary_id" );
                if ( $_primary_id && !empty( $to_ids ) ) {
                    $sorted_ids = [ $_primary_id ];
                    foreach ( $to_ids as $to_id ) {
                        if ( $to_id && $to_id != $_primary_id ) {
                            $sorted_ids[] = $to_id;
                        }
                    }
                    $to_ids = $sorted_ids;
                }
                if ( $to_obj === '__any__' ) {
                    $to_obj = $app->param( "_{$name}_model" );
                    $old_relations = $db->model( 'relation' )->load(
                        ['name' => $name, 'from_obj' => $model, 'from_id' => $obj->id ] );
                    if (! empty( $old_relations ) ) {
                        $db->model( 'relation' )->remove_multi( $old_relations );
                    }
                } else if ( $to_obj == 'asset' ) {
                    $has_assets = true;
                }
                $args = ['from_id' => $target_id, 
                         'name' => $name,
                         'from_obj' => $model,
                         'to_obj' => $to_obj ];
                $app->set_relations( $args, $to_ids, false, $errors, $remove_attachments );
                if (!empty( $errors ) ) {
                    return $app->rollback( join( ',', $errors ) );
                }
            }
            if ( $as_revision && !empty( $replaced_attachments ) ) {
                $attachment_rels = $app->get_relations( $obj, 'attachmentfile' );
                $update_rels = [];
                foreach ( $attachment_rels as $attachment_rel ) {
                    $at_to_id = (int) $attachment_rel->to_id;
                    if ( isset( $replaced_attachments[ $at_to_id ] ) ) {
                        $old_file = $replaced_attachments[ $at_to_id ];
                        $new_file = PTUtil::clone_object( $app, $old_file );
                        $file_status = $obj->has_column( 'status' ) ? $obj->status : 0;
                        $new_file->status( $file_status );
                        $new_file->save();
                        $app->publish_obj( $new_file, null, false, true );
                        $attachment_rel->to_id( $new_file->id );
                        $update_rels[] = $attachment_rel;
                    }
                }
                if (! empty( $update_rels ) ) {
                    if (! $db->model( 'relation' )->update_multi( $update_rels ) ) {
                        return $app->rollback( 'An error occurred while updating the related object(s).' );
                    }
                }
            }
        }
        $has_file = false;
        foreach ( $properties as $key => $val ) {
            if ( isset( $relations[ $key ] ) ) {
                continue;
            }
            if ( in_array( $key, $attachment_cols ) ) {
                $magic = $app->param( "{$key}-magic" );
                $file_remove = $app->param( "{$key}-remove" );
                $file_label = $app->param( "{$key}-label" );
                $attachment = $obj->$key
                    ? $db->model( 'attachmentfile' )->load( (int) $obj->$key )
                    : $db->model( 'attachmentfile' )->new();
                if (! $attachment ) $attachment = $db->model( 'attachmentfile' )->new();
                $old_label = PTUtil::get_meta_property( $attachment, 'file', 'label' );
                if ( $old_label != $file_label ) {
                    PTUtil::set_meta_property( $attachment, 'file', 'label', $file_label );
                }
                if ( $file_remove && $attachment->id ) {
                    $remove_attachments[] = $attachment;
                    $obj->$key( null );
                    $changed_cols[ $key ] = true;
                    $has_file = true;
                    $is_changed = true;
                }
                if ( $attachment->id && $table->revisable ) {
                    $is_revision = $table->revisable && $obj->rev_type ? true : false;
                    if (! $app->param( '_apply_to_master' ) && ! $is_revision ) {
                        if ( $obj->has_column( 'status' ) ) {
                            $attachment->status( 0 );
                        }
                        $rev_attachment =
                            PTUtil::clone_object( $app, $attachment );
                        $add_attchments[] = $rev_attachment;
                        $original->$key( $rev_attachment->id );
                    }
                }
                if ( $magic ) {
                    $sess = $db->model( 'session' )
                        ->get_by_key( ['name' => $magic,
                                       'user_id' => $app->user()->id, 'kind' => 'UP'] );
                    if ( $sess->id ) {
                        if (!$file_remove ) {
                            $tmp_path = $app->upload_dir();
                            $upload_name = basename( $sess->value );
                            $tmp_path .= DS . $upload_name;
                            @file_put_contents( $tmp_path, $sess->data, LOCK_EX );
                            if ( $as_revision ) {
                                if ( $attachment->id )
                                    $remove_attachments[] = $attachment;
                                $attachment = $db->model( 'attachmentfile' )->new();
                            }
                            $attachment->name( $upload_name );
                            $json = json_decode( $sess->text );
                            $attachment->mime_type( $json->mime_type );
                            if ( $obj->has_column( 'workspace_id' ) ) {
                                $attachment->workspace_id( $obj->workspace_id );
                            }
                            $attachment->size( $json->file_size );
                            $attachment->class( $json->class );
                            if ( $obj->has_column( 'status' ) ) {
                                $obj_status = $obj->status;
                                $publish_status = $app->status_published( $model );
                                $file_status = $obj_status == $publish_status ? 4 : $obj_status;
                                $attachment->status( $obj->status );
                            }
                            $app->set_default( $attachment );
                            $attachment->save();
                            $obj->$key( $attachment->id );
                            $app->file_attach_to_obj( $attachment, 'file', $tmp_path, $file_label );
                            $app->publish_obj( $attachment, null, false, true );
                            $changed_cols[ $key ] = true;
                            $has_file = true;
                            $is_changed = true;
                        }
                        $sess->remove();
                    }
                }
            }
            if ( $val === 'file' ) {
                $file_remove = $app->param( "{$key}-remove" );
                $metadata = $db->model( 'meta' )->get_by_key(
                         ['model' => $model, 'object_id' => $obj->id,
                          'kind' => 'metadata', 'key' => $key ] );
                $magic = $app->param( "{$key}-magic" );
                if (! $magic && ! $file_remove && $app->param( '_apply_to_master' ) && ! $obj->$key ) {
                    $file_remove = true;
                }
                if ( $file_remove ) {
                    $obj->$key( null );
                    if ( $app->publish_callbacks ) {
                        $ctx = $app->ctx;
                        $app->init_callbacks( 'blob', 'start_publish' );
                        $file_unlink = true;
                        $callback = ['name' => 'start_publish', 'model' => 'blob',
                                     'object' => $obj, 'ctx' => $ctx, 'original' => $original,
                                     'unlink' => $file_unlink ];
                    }
                    if ( $metadata->id ) {
                        $all_metadata = $db->model( 'meta' )->load(
                                 ['model' => $model, 'object_id' => $obj->id,
                                  'key' => $key ], null, 'id' );
                        if (! empty( $all_metadata ) ) {
                            $db->model( 'meta' )->remove_multi( $all_metadata );
                        }
                    }
                    $urls = $db->model( 'urlinfo' )->load(
                        ['class' => 'file','key' => $key,
                         'object_id' => $obj->id,'model' => $obj->_model ] );
                    foreach ( $urls as $url ) {
                        if ( $app->publish_callbacks ) {
                            $callback['urlinfo'] = $url;
                            $app->run_callbacks( $callback, 'blob', $file_unlink );
                        }
                        if (! $url->remove() ) {
                            return $app->rollback(
                            'An error occurred while updating the related object(s).' );
                        }
                    }
                    $has_file = true;
                    $changed_cols[ $key ] = true;
                }
                $meta_save = false;
                if ( $magic ) {
                    $sess = $db->model( 'session' )
                        ->get_by_key( ['name' => $magic,
                                       'user_id' => $app->user()->id, 'kind' => 'UP'] );
                    if ( $sess->id ) {
                        if (!$file_remove ) {
                            $obj->$key( $sess->data );
                            $has_file = true;
                            $metadata->data( $sess->metadata );
                            $metadata->type( $sess->key );
                            $metadata->text( $sess->text );
                            $metadata->value( $sess->value );
                            $metadata->metadata( $sess->extradata );
                            $meta_save = true;
                            if ( $obj->id ) $is_changed = true;
                            $changed_cols[ $key ] = true;
                            $file_class = json_decode( $sess->text )->class;
                            if ( $file_class !== 'image' ) {
                                $all_metadata = $db->model( 'meta' )->load(
                                         ['model' => $model, 'object_id' => $obj->id,
                                          'key' => $key, 'kind' => 'thumbnail'], null, 'id' );
                                if (! empty( $all_metadata ) ) {
                                    $db->model( 'meta' )->remove_multi( $all_metadata );
                                }
                            }
                        }
                        $sess->remove();
                    }
                }
                $file_label = $app->param( "{$key}-label" );
                if ( $metadata->text ) {
                    $meta_json = json_decode( $metadata->text, true );
                    if ( is_array( $meta_json ) ) {
                        $old_label = '';
                        if ( isset( $meta_json['label'] ) ) $old_label = $meta_json['label'];
                        if ( $old_label != $file_label ) {
                            $meta_json['label'] = $file_label;
                            $metadata->text( json_encode( $meta_json, JSON_UNESCAPED_UNICODE ) );
                            $meta_save = true;
                        }
                    }
                }
                if ( $meta_save ) {
                    if (! $metadata->save() ) return $app->rollback( $errstr );
                }
                if (! $obj->$key && !empty( $require_blobs ) && in_array( $key, $require_blobs ) ) {
                    $errors[] = $app->translate( '%s is required.',
                                $app->translate( $labels[ $key ] ) );
                }
            }
        }
        if (! empty( $errors ) ) {
            $error = join( "\n", $errors );
            $db->rollback();
            $app->txn_active = false;
            return $app->forward( $model, $error, $obj );
        }
        if ( $has_file ) {
            if (! $obj->save() ) return $app->rollback( $errstr );
        }
        $id = $obj->id;
        PTUtil::set_object_fields( $obj );
        $original_status = null;
        if ( $obj->has_column( 'status' ) ) {
            $original_status = $original->status;
        }
        if (!$is_new && $table->revisable && (!$obj->rev_object_id && !$as_revision ) ) {
            if ( $_revision_id ) {
                $original->id( (int) $_revision_id );
            }
            if (! PTUtil::pack_revision( $obj, $original, $changed_cols ) ) {
                if (! empty( $add_attchments ) ) {
                    foreach ( $add_attchments as $add ) {
                        $app->remove_object( $add );
                    }
                }
            }
            if ( $as_revision ) $id = $original->id;
        } else if (! $is_new ) {
            $changed_cols = PTUtil::object_diff( $app, $original, $obj, [], $changed_cols );
        }
        if (! empty( $password_cols ) ) {
            foreach ( $password_cols as $password_col ) {
                if ( isset( $changed_cols[ $password_col ] ) ) {
                    $changed_cols[ $password_col ] = str_repeat( '*', strlen( $changed_cols[ $password_col ] ) );
                }
            }
        }
        if ( $original_status !== null ) { // reset status
            $original->status( $original_status );
        }
        if ( $obj->_customfields !== null ) {
            $obj->_customfields = null;;
        }
        $db->flush_queries();
        $db->update_multi = false;
        $callback = ['name' => 'before_save', 'is_new' => $is_new, 'errors' => $errors,
                     'add_tags' => $add_tags, 'error' => '', 'changed_cols' => $changed_cols,
                     'orig_relations' => $orig_relations, 'orig_metadata' => $orig_metadata ];
        if ( $obj->_relations === null ) $obj->_relations = $app->get_relations( $obj );
        $clone_org = null;
        $before_save = $app->run_callbacks( $callback, $model, $obj, $original, $clone_org );
        $errors = $callback['errors'];
        if ( $msg = $callback['error'] ) {
            $errors[] = $msg;
        }
        if (! empty( $errors ) || !$before_save ) {
            $error = join( "\n", $errors );
            $db->rollback();
            $app->txn_active = false;
            return $app->forward( $model, $error, $obj );
        }
        $rebuild = true;
        if ( $obj->has_column( 'status' ) && $obj->_model !== 'group' ) {
            $status_published = $app->status_published( $model );
            if ( $obj->status != $status_published && $original->status != $status_published ) {
                $rebuild = false;
            }
        }
        $add_return_args = $is_new ? '&is_new=1' : '';
        if ( $app->param( '_apply_to_master' ) ) {
            $add_return_args = '&apply_to_master=1';
        } else if ( $app->param( '_change_to_master' ) ) {
            $add_return_args = '&change_to_master=1';
        } else if ( $app->param( '_edit_revision' ) || $as_revision ) {
            $add_return_args = '&edit_revision=1';
            if ( $as_revision && ! $is_changed ) {
                $add_return_args .= '&not_changed=1';
            }
        } else if ( $app->param( '__can_rebuild_this_template' ) ) {
            if (!$app->param( '__save_and_publish' ) ) {
                $add_return_args .= '&need_rebuild=1';
            }
        } else if ( $app->param( '_profile' ) ) {
            $add_return_args .= '&_profile=1';
        }
        if ( $model == 'workspace' && $is_new ) {
            $add_return_args .= '&workspace_id=' . $obj->id;
        }
        $from_scope = $app->param( '_from_scope' );
        if ( $from_scope !== '' ) {
            $add_return_args .= '&_from_scope=' . (int) $from_scope;
        }
        if ( $is_changed || $is_new ) {
            if ( $ws = $obj->workspace ) {
                $ws->last_update( $app->request_time );
                $ws->save();
            }
        }
        $nickname = $app->user()->nickname;
        $label = $app->translate( $table->label );
        $primary = $table->primary;
        $name = $primary ? $obj->$primary : '';
        $params = [ $label, $name, $obj->id, $nickname ];
        if ( $table->revisable && $obj->rev_type ) {
            $message = !$as_revision
                     ? $app->translate( "%1\$s '%2\$s(Revision ID:%3\$s)' edited by %4\$s.", $params )
                     : $app->translate(
                     "%1\$s '%2\$s(Revision ID:%3\$s)' edit and save as revision by %4\$s.", $params );
        } else if ( $app->param( '_apply_to_master' ) && $_revision_id ) {
            $params[] = $_revision_id;
            $message = $app->translate(
            "%1\$s '%2\$s(Revision ID:%5\$s)' edit and apply to master(ID:%3\$s) by %4\$s.", $params );
        } else if ( $app->param( '_change_to_master' ) && $app->leave_revisions ) {
            $message = $app->translate(
            "%1\$s '%2\$s' edit and change to master(ID:%3\$s) by %4\$s.", $params );
        } else {
            $message = $is_new
                     ? $app->translate( "%1\$s '%2\$s(ID:%3\$s)' created by %4\$s.", $params )
                     : $app->translate( "%1\$s '%2\$s(ID:%3\$s)' edited by %4\$s.", $params );
        }
        if ( $obj->has_column( 'status' ) ) {
            $status_text = $app->core_tags->hdlr_statustext(
                ['model' => $model, 'status' => $obj->status, 'text' => 1], $app->ctx );
            $message .= $app->translate( '(Status : %s)', $status_text );
        }
        $metadata = (! empty( $changed_cols ) && ! $is_new )
                  ? json_encode( $changed_cols,
                                 JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT )
                  : '';
        $log_category = $is_new ? 'insert' : 'update';
        $callback = ['name' => 'post_save', 'is_new' => $is_new, 'add_tags' => $add_tags,
                     'changed_cols' => $changed_cols, 'orig_relations' => $orig_relations,
                     'orig_metadata' => $orig_metadata ];
        if (! $app->param( '_duplicate' ) ) {
            $log = $app->log( ['message' => $message, 'category' => $log_category,
                               'model' => $table->name, 'object_id' => $obj->id,
                               'metadata' => $metadata, 'level' => 'info'] );
            $callback['log'] = $log;
        }
        $db->commit();
        $app->txn_active = false;
        $db->caching = false;
        if ( $obj->_relations === null ) $obj->_relations = $app->get_relations( $obj );
        if ( isset( $rev_obj ) && $_revision_id ) {
            if ( isset( $clone_org ) && is_object( $clone_org ) ) {
                $clone_org->_apply_revision = $rev_obj;
            } else {
                $original->_apply_revision = $rev_obj;
            }
        }
        $app->run_callbacks( $callback, $model, $obj, $original, $clone_org );
        if ( $as_revision ) {
            $callback['name'] = 'post_save_revision';
            $callback['is_new'] = true;
            $app->run_callbacks( $callback, $model, $obj, $original );
        }
        $has_blob = !empty( $db->get_blob_cols( $model, true ) );
        $query_cache = $app->query_cache;
        $app->db->query_cache = false;
        if (! $app->rebuild_async && !$as_revision ) {
            if ( $model !== 'template' || $app->param( '__save_and_publish' ) ) {
                if (! $obj->has_column( 'rev_type' ) || ! $obj->rev_type ) {
                    $app->publish_obj( $obj, $original, $rebuild );
                }
            }
        } else if ( $has_blob && $app->rebuild_async && !$as_revision ) {
            // Publish blobs before redirect.
            $app->publish_obj( $obj, $original, false, true );
        }
        $app->db->query_cache = $query_cache;
        if ( isset( $callback['return_url'] ) && $callback['return_url'] ) {
            $app->redirect( $callback['return_url'], true );
        }
        if ( $app->param( '_duplicate' ) ) {
            if (! $app->can_do( $model, 'duplicate', null, $app->workspace() ) ) {
                $app->error( 'Permission denied.' );
            }
            $add_return_args .= '&cloned=1';
            $clone_obj = PTUtil::clone_object( $app, $obj, false );
            if ( $app->publish_clone ) {
                $app->publish_obj( $clone_obj );
            }
            $params[] = $clone_obj->id;
            $message = $app->translate( "%1\$s '%2\$s(ID:%3\$s)' edit and cloned(ID:%5\$s) by %4\$s.", $params );
            $log = $app->log( ['message' => $message, 'category' => $log_category,
                               'model' => $table->name, 'object_id' => $clone_obj->id,
                               'metadata' => $metadata, 'level' => 'info'] );
            $callback['log'] = $log;
            $callback['name'] = 'post_save_clone';
            $app->run_callbacks( $callback, $model, $clone_obj, $obj );
            $app->redirect( $app->admin_url . '?__mode=view&_type=edit&_model=' . $model .
                '&id=' . $clone_obj->id . $app->workspace_param . $add_return_args, true );
        } else {
            $add_return_args .= '&saved=1';
        }
        if ( $app->param( 'dialog_view' ) && $obj->_model != 'table' ) {
            $add_return_args .= '&dialog_view=1';
            if ( $rev_object_id = (int) $app->param( 'rev_object_id' ) ) {
                $add_return_args .= '&rev_object_id=' . $rev_object_id;
            }
            if ( $app->param( 'target' ) ) {
                $add_return_args .= '&target=' . $app->param( 'target' )
                                  . '&get_col=' . $app->param( 'get_col' );
                if ( $app->param( 'select_add' ) ) $add_return_args .= '&select_add=1';
                if ( $app->param( 'single_select' ) ) $add_return_args .= '&single_select=1';
                if ( $app->param( 'selected_ids' ) ) $add_return_args .= '&selected_ids=1';
                if ( $app->param( 'direct_edit' ) ) $add_return_args .= '&direct_edit=1';
                if ( $app->param( '_field_name' ) ) $add_return_args .= '&_field_name=' . $app->param( '_field_name' );
                if ( $app->param( 'insert_editor' ) ) $add_return_args .= '&insert_editor=1';
            } else if ( $app->param( 'insert_editor' ) ) {
                $add_return_args .= '&insert_editor=' . $app->param( 'insert_editor' )
                                  . '&insert=' . $app->param( 'insert' );
            }
            if ( $app->param( '_filter' ) ) {
                $add_return_args .= '&select_system_filters=' . $app->param( 'select_system_filters' )
                                 . '&_system_filters_option=' . $app->param( '_system_filters_option' )
                                 . '&_filter=' . $app->param( '_filter' );
            }
            if ( $app->param( 'any_model' ) ) $add_return_args .= '&any_model=1';
        }
        $app->redirect( $app->admin_url . '?__mode=view&_type=edit&_model=' . $model .
            '&id=' . $id . $app->workspace_param . $add_return_args, true );
        if ( $app->rebuild_async && !$as_revision ) {
            if ( $model !== 'template' || $app->param( '__save_and_publish' ) ) {
                if (! $obj->has_column( 'rev_type' ) || ! $obj->rev_type ) {
                    $app->db->query_cache = false;
                    if ( $has_blob ) {
                        $app->publish_obj( $obj, $original, $rebuild, false, true );
                    } else {
                        $app->publish_obj( $obj, $original, $rebuild );
                    }
                    $app->db->query_cache = $query_cache;
                }
            }
        }
        if ( $app->assets_c && $has_blob && $obj->has_column( 'rev_type' ) && $obj->rev_type ) {
            PTUtil::create_assets_c( $app, $obj, $properties );
        }
        if (! empty( $remove_attachments ) ) {
            foreach ( $remove_attachments as $remove ) {
                $clone = clone $remove;
                $remove->status( 0 );
                $app->publish_obj( $remove, $clone, false, true );
                $app->remove_object( $remove );
            }
        }
        $this->saved_object_id = $obj->id;
    }

    function check_parent_id ( $obj, $original, &$error ) {
        $children = [];
        $children = $this->get_children( $obj, $children );
        if ( count( $children ) ) {
            foreach ( $children as $child ) {
                if ( $obj->parent_id == $child->id ) {
                    $error = $this->translate( 'A child object can not be specified as a parent.' );
                    return false;
                    break;
                }
            }
        }
        if ( $obj->parent_id && $original->parent_id == 0 ) {
            $terms = ['parent_id' => 0 ];
            if ( $obj->has_column( 'workspace_id' ) ) {
                $terms['workspace_id'] = (int) $obj->workspace_id;
            }
            $root = $this->db->model( $obj->_model )->load( $terms, [], 'id,parent_id' );
            if ( count( $root ) < 2 ) {
                $error = $this->translate( 'You can not change the parent of the root object.' );
                return false;
            }
        }
        return true;
    }

    function get_children ( $obj, &$children = [], $cols = 'id,parent_id,workspace_id' ) {
        $terms = ['parent_id' => $obj->id ];
        if ( $obj->has_column( 'workspace_id' ) ) {
            $terms['workspace_id'] = (int) $obj->workspace_id;
        }
        $_children = $this->db->model( $obj->_model )->load( $terms, [], $cols );
        if ( empty( $children ) ) {
            $children = $_children;
        } else {
            $children = array_merge( $children, $_children );
        }
        if ( count( $_children ) ) {
            foreach ( $_children as $_child ) {
                $this->get_children( $_child, $children );
            }
        }
        return $children;
    }

    function workflow_post_save ( &$cb, $app, &$obj, $original, $clone_org ) {
        $workflow_class = new PTWorkflow();
        return $workflow_class->workflow_post_save( $cb, $app, $obj, $original, $clone_org );
    }

    function get_mail_tmpl ( $basename, &$template = null, $workspace = null ) {
        $app = $this;
        $workspace = $workspace ? $workspace : $app->workspace();
        if ( is_object( $workspace ) && $workspace->_model != 'workspace' ) {
            if ( $workspace->has_column( 'workspace_id' ) ) {
                $workspace = $workspace->workspace;
            }
        }
        $status_published = $app->status_published( 'template' );
        $terms = ['class' => 'Mail', 'status' => $status_published,
                  'basename' => $basename, 'rev_type' => 0 ];
        $args = ['limit' => 1];
        if ( $workspace ) {
            $terms['workspace_id'] = ['IN' => [0, (int) $workspace->id ] ];
            $args['direction'] = 'descend';
            $args['sort'] = 'workspace_id';
        } else {
            $terms['workspace_id'] = 0;
        }
        $tmpl = $app->db->model( 'template' )->load( $terms, $args );
        if (! empty( $tmpl ) ) {
            $template = $tmpl[0];
            return $app->linked_file === 2 ? $template->_text( $app ) : $template->text;
        }
        $path = 'email' . DS . "{$basename}.tmpl";
        $path = $app->ctx->get_template_path( $path );
        if ( file_exists( $path ) ) {
            return file_get_contents( $path );
        }
    }

    function publish_obj ( $obj, $original = null, $dependencies = false,
                           $files_only = false, $archives_only = false, $mappings = null ) {
        if ( !$obj || ( $obj->has_column( 'rev_type' ) && $obj->rev_type ) ) {
            return false;
        }
        $app = $this;
        if (! $obj->id ) {
            return $app->error( $app->translate( 'An attempt was made to publish an invalid %s.', $app->translate( $obj->_model ) ) );
        }
        $db = $app->db;
        $fmgr = $app->fmgr;
        $model = $obj->_model;
        if ( is_array( $mappings ) && !empty( $mappings ) ) {
            $mappings_ids = [];
            foreach ( $mappings as $mapping ) {
                $mappings_ids[ $mapping->id ] = true;
            }
            $cache_key = $db->make_cache_key( $model, $obj->id, $mappings_ids, $files_only, $archives_only );
            if ( isset( $app->published_maps[ $cache_key ] ) ) {
                return true;
            }
            $app->published_maps[ $cache_key ] = true;
        }
        $table = $app->get_table( $model );
        $scheme = $app->get_scheme_from_db( $model );
        $workspace = $app->workspace();
        if ( $obj->_model === 'workspace' ) {
            $workspace = $obj;
        } else if ( $obj->has_column( 'workspace_id' ) ) {
            $workspace = $obj->workspace;
            if (! $workspace && $obj->workspace_id ) {
                $workspace = $app->db->model( 'workspace' )->load( (int) $obj->workspace_id );
                if (! $workspace ) {
                    return false;
                }
            }
        }
        $app->ctx->stash( 'workspace', $workspace );
        if (! $app->init_tags ) $app->init_tags();
        if ( $dependencies && ! $archives_only && $app->mode !== 'rebuild_phase' ) {
            $date_col = $app->get_date_col( $obj );
            $publish_nextprev = 'publish_nextprev_' . strtolower( $table->plural );
            if ( $obj->has_column( $date_col ) && ( $app->publish_nextprev || $app->$publish_nextprev ) ) {
                $next_prev_objs = PTUtil::next_prev( $app, $obj );
                foreach ( $next_prev_objs as $next_prev ) {
                    if ( is_object( $next_prev ) ) {
                        $app->delayed_publish_objs
                            [ $next_prev->_model . '_' . $next_prev->id ] = $next_prev;
                    }
                }
                if ( $original && $original->$date_col != $obj->$date_col ) {
                    $next_prev_objs = PTUtil::next_prev( $app, $original );
                    foreach ( $next_prev_objs as $next_prev ) {
                        if ( is_object( $next_prev ) ) {
                            $app->delayed_publish_objs
                                [ $next_prev->_model . '_' . $next_prev->id ] = $next_prev;
                        }
                    }
                }
            }
        }
        $properties = $scheme['edit_properties'];
        $base_url = $app->site_url;
        $base_path = $app->site_path;
        $extra_path = $table->out_path ? '' : $app->extra_path;
        if ( $workspace ) {
            $base_url = $workspace->site_url;
            $base_path = $workspace->site_path;
            $extra_path = $table->out_path ? '' : $workspace->extra_path;
        }
        if (! $archives_only && $app->mode !== 'rebuild_phase' ) {
            $attachment_cols = PTUtil::attachment_cols( $model );
            $rel_attach_cols = PTUtil::attachment_cols( $model, $scheme, 'relation' );
            if ( count( $rel_attach_cols ) || count( $attachment_cols ) ) {
                $from_id = $app->param( '_duplicate_from' );
                if ( $from_id ) {
                    PTUtil::attachments_to_clone( $app, $obj, $obj );
                } else {
                    $attachments = $app->get_related_objs( $obj, 'attachmentfile', true );
                    $publish_status = $app->status_published( $model );
                    if ( count( $attachment_cols ) ) {
                        $attachment_ids = [];
                        foreach ( $attachment_cols as $attachment_col ) {
                            if ( $obj->$attachment_col ) {
                                $attachment_ids[] = (int) $obj->$attachment_col;
                            }
                        }
                        if ( count( $attachment_ids ) ) {
                            $add_attachments = $app->db->model( 'attachmentfile' )->load(
                                ['id' => ['IN' => $attachment_ids ] ] );
                            if ( count( $add_attachments ) ) {
                                $attachments = array_merge( $attachments, $add_attachments );
                            }
                        }
                    }
                    foreach ( $attachments as $attachment ) {
                        $orig_attachment = clone $attachment;
                        if ( $obj->has_column( 'status' ) ) {
                            $status = $obj->status;
                            $file_status = $status == $publish_status ? 4 : $status;
                            if ( $attachment->status != $file_status ) {
                                $attachment->status( $file_status );
                                $attachment->save();
                            }
                        }
                        $app->publish_obj(
                            $attachment, $orig_attachment, $dependencies, true );
                    }
                }
            }
        }
        $out_counter = 0;
        if (! $table->do_not_output && ! $archives_only ) {
            $out_path = $table->out_path ? $table->out_path : $model;
            $has_assets_c = false;
            foreach ( $properties as $key => $val ) {
                if ( $model === 'asset' && $key === 'file' ) {
                    $app->post_save_asset( null, $app, $obj );
                    if ( $app->mode !== 'delete' ) {
                        if (! $has_assets_c && $app->assets_c ) {
                            $has_assets_c = PTUtil::create_assets_c( $app, $obj, $key );
                        }
                        continue;
                    }
                }
                $in_delete = $obj->_delete ? true : false;
                if ( $val === 'file' ) {
                    $db_caching = $db->caching;
                    $query_cache = $db->query_cache;
                    $db->caching = false;
                    $db->query_cache = false;
                    $metadata = $db->model( 'meta' )->get_by_key(
                             ['model' => $model, 'object_id' => $obj->id,
                              'kind' => 'metadata', 'key' => $key ] );
                    $db->caching = $db_caching;
                    $db->query_cache = $query_cache;
                    if (!$metadata->id ) continue;
                    $file_meta = json_decode( $metadata->text, true );
                    if (! $has_assets_c && $app->assets_c && $file_meta['class'] == 'image' ) {
                        $has_assets_c = PTUtil::create_assets_c( $app, $obj, $metadata );
                    }
                    $mime_type = $file_meta['mime_type'];
                    $file_ext = $file_meta['extension'];
                    if (! $out_counter && $obj->has_column( 'basename' ) ) {
                        $file = "{$out_path}" . '/' . $obj->basename;
                    } else {
                        $file = "{$out_path}" . '/' . "{$model}-{$key}-" . $obj->id;
                    }
                    $out_counter++;
                    if ( $file_ext ) $file .= '.' . $file_ext;
                    $file_path = $base_path . '/'. $extra_path . $file;
                    $file_path = str_replace( DS, '/', $file_path );
                    $url = $base_url . '/'. $extra_path . $file;
                    if (!$table->revisable || !$obj->rev_type ) {
                        if ( $fmgr->exists( $file_path ) && !$in_delete ) {
                            $status_published = $app->status_published( $obj->_model );
                            $comp = md5_file( $file_path );
                            $data = $obj->$key ? md5( $obj->$key ) : '';
                            if ( $original && $obj->has_column( 'status' ) ) {
                                if ( $original && $original->status == $status_published &&
                                    $obj->status == $status_published ) {
                                    if ( $comp === $data ) {
                                        $ui = $db->model( 'urlinfo' )->get_by_key(
                                            ['file_path' => $file_path, 'key' => $key,
                                             'model' => $obj->_model, 'object_id' => $obj->id ] );
                                        if ( $ui->id ) continue;
                                    }
                                }
                            } else {
                                if ( $obj->has_column( 'status' ) && $obj->status != $status_published ) {
                                    $fmgr->unlink( $file_path );
                                    if ( !$in_delete ) continue;
                                } else if ( $comp === $data ) {
                                    $ui = $db->model( 'urlinfo' )->get_by_key(
                                        ['file_path' => $file_path, 'key' => $key,
                                         'model' => $obj->_model, 'object_id' => $obj->id ] );
                                    if ( $ui->id ) continue;
                                }
                            }
                            unset( $comp, $data );
                        }
                        $app->publish( $file_path, $obj, $key, $mime_type );
                    }
                }
            }
        }
        if ( $files_only ) return;
        $terms = ['model' => $model, 'container' => $model ];
        $extra = '';
        $ws_id = 0;
        if ( $obj->has_column( 'workspace_id' ) ) {
            $extra = ' AND urlmapping_workspace_id';
            $ws_id = (int) $obj->workspace_id;
            if ( $ws_id ) {
                $extra .= " IN (0,{$ws_id})";
            } else {
                $extra .= '=' . $ws_id;
            }
        }
        if ( $obj->_model === 'template' ) {
            unset( $terms['container'], $terms['model'] );
            $extra .= ' AND urlmapping_template_id=' . $obj->id;
        }
        $app->get_scheme_from_db( 'urlmapping' );
        $map_cols = 'id,mapping,publish_file,template_id,date_based,model,skip_empty,'
                  . 'container,container_scope,fiscal_start,workspace_id,compiled,cache_key';
        if ( $app->mode == 'rebuild_phase' ) {
            $ws_id = (int) $app->param( 'workspace_id' );
            $extra .= ' AND urlmapping_workspace_id=' . $ws_id;
        }
        $mappings = $mappings ?? $db->model( 'urlmapping' )->load( $terms, ['and_or' => 'OR'], $map_cols, $extra );
        if (!$table->revisable || (!$obj->rev_type ) ) {
            foreach ( $mappings as $mapping ) {
                if ( $ws_id && $mapping->workspace_id == 0 ) {
                    if ( $mapping->container == $model && $mapping->container_scope ) {
                        continue;
                    } else if ( $mapping->model == $model && $table->display_system ) {
                        continue;
                    }
                }
                if ( $mapping->container != $model && $mapping->workspace_id != $ws_id ) {
                    if ( $obj->has_column( 'workspace_id' ) ) {
                        continue;
                    }
                }
                if ( $obj->has_column( 'status' ) ) {
                    $status_published = $app->status_published( $obj->_model );
                    if ( $original && $original->status !== null &&
                        $original->status != $status_published && $obj->status != $status_published ) {
                        if ( $obj->_model == $mapping->model ) {
                            $terms = ['urlmapping_id' => $mapping->id, 'model' => $table->name,
                                      'class' => 'archive', 'object_id' => $obj->id, 'delete_flag' => 1];
                            $old_ui = $db->model( 'urlinfo' )->get_by_key( $terms );
                            if ( $old_ui->id ) {
                                $file_path = $app->build_path_with_map( $obj, $mapping, $table );
                                if ( $old_ui->file_path != $file_path ) {
                                    if ( $old_ui->was_published ) {
                                        $old_ui = clone $old_ui;
                                        $old_ui->id();
                                    }
                                    $old_ui->file_path( $file_path );
                                    $old_ui = PTUtil::set_url_path( $old_ui );
                                    $old_ui->save();
                                    $old_ui->remove();
                                }
                            }
                            $terms = ['urlmapping_id' => $mapping->id, 'model' => $table->name,
                                      'class' => 'archive', 'object_id' => $obj->id, 'delete_flag' => 0];
                            $published_uis = $db->model( 'urlinfo' )->load( $terms );
                            foreach ( $published_uis as $published_ui ) { // Why you selected?
                                $published_ui->remove();
                            }
                        } else {
                            // Callback for Delete.
                            $existing = $db->model( 'urlinfo' )->get_by_key(
                                ['model' => $obj->_model, 'object_id' => $obj->id,
                                 'class' => 'archive', 'urlmapping_id' => $mapping->id, 'delete_flag' => 1], null, 'id' );
                            if ( $existing->id ) continue;
                        }
                    }
                }
                if (!$mapping->date_based && $mapping->model == $model ) {
                    $file_path = $app->build_path_with_map( $obj, $mapping, $table );
                    if ( $file_path === false ) {
                        $uis = $db->model( 'urlinfo' )->load(
                            ['model' => $obj->_model, 'object_id' => $obj->id,
                             'urlmapping_id' => $mapping->id ], null, 'id,url,file_path' );
                        foreach ( $uis as $ui ) $ui->remove();
                        continue;
                    }
                    if (! isset( $app->delayed_dependencies[ $file_path ] ) ) {
                        $app->publish( $file_path, $obj, $mapping, null, null, $original );
                    }
                    if ( $app->resetdb_per_rebuild ) $app->db->reconnect();
                } else if ( $mapping->model != $model && $mapping->container == $model ) {
                    if ( $dependencies ) {
                        $app->publish_dependencies( $obj, $original, $mapping );
                    } else if ( $app->param( '_return_args' ) ) {
                        $app->publish_dependencies( $obj, $original, $mapping, false );
                    }
                } else if ( $mapping->date_based && $mapping->container ) {
                    $at = $mapping->date_based;
                    $container = $mapping->container;
                    $container_table = $app->get_table( $container );
                    $app->get_scheme_from_db( $container );
                    $status_published = $app->status_published( $container );
                    $container_obj = $app->db->model( $container )->__new();
                    $_colprefix = $container_obj->_colprefix;
                    $date_col = $_colprefix
                              . $app->get_date_col( $container_obj );
                    $_table = $db->prefix . $container;
                    $day = '';
                    if ( $at == 'Daily' ) {
                        $day = ", DAY({$date_col})";
                    }
                    $sql = "SELECT DISTINCT YEAR({$date_col}), MONTH({$date_col}){$day} FROM $_table";
                    $wheres = [];
                    if ( $mapping->model != 'template' && $mapping->skip_empty ) {
                        $ctx_terms = [];
                        if ( $mapping->workspace_id
                            || ( $mapping->container_scope && $container_obj->has_column( 'workspace_id' ) ) ) {
                            $ctx_terms['workspace_id'] = (int) $mapping->workspace_id;
                        }
                        if ( $status_published ) {
                            $ctx_terms['status'] = $status_published;
                        }
                        $callback = ['name' => 'publish_date_based',
                                     'model' => $container_obj->_model ];
                        $app->run_callbacks( $callback, $container_obj->_model, $ctx_terms );
                        $children_objs = $app->load_context_objs( $obj, $container, $ctx_terms, [], 'id' );
                        if (! empty( $children_objs ) ) {
                            $object_in = [];
                            foreach ( $children_objs as $children_obj ) {
                                $object_in[] = (int) $children_obj->id;
                            }
                            if (! empty( $object_in ) ) {
                                $object_in = implode( ',', $object_in );
                                $wheres[] = "{$_colprefix}id IN ({$object_in})";
                            }
                        } else {
                            $wheres[] = "{$_colprefix}id=0";
                        }
                    }
                    if ( $status_published ) {
                        $wheres[] = "{$_colprefix}status={$status_published}";
                    }
                    if ( $container_obj->has_column( 'rev_type' ) ) {
                        $wheres[] = "{$_colprefix}rev_type=0";
                    }
                    if ( $mapping->workspace_id
                        || ( $mapping->container_scope && $container_obj->has_column( 'workspace_id' ) ) ) {
                        $ws_id = (int) $mapping->workspace_id;
                        $wheres[] = "{$_colprefix}workspace_id={$ws_id}";
                    }
                    if (!empty( $wheres ) ) {
                        $sql .= " WHERE ";
                        $callback = ['name' => 'publish_date_based',
                                     'model' => $container_obj->_model ];
                        $app->run_callbacks( $callback, $container_obj->_model, $wheres );
                        $sql .= join( ' AND ', $wheres );
                    }
                    $sql .= " ORDER BY YEAR({$date_col})";
                    $year_month_day = $container_obj->load( $sql );
                    $backtrace = $app->debug_backtrace( DEBUG_BACKTRACE_ARRAY );
                    $caller = $backtrace[1]['function'];
                    if ( $at == 'Daily' ) {
                        foreach ( $year_month_day as $ymd ) {
                            $ymd = $ymd->get_values();
                            $y = $ymd["YEAR({$date_col})"];
                            $m = sprintf('%02d', $ymd["MONTH({$date_col})"] );
                            $d = sprintf('%02d', $ymd["DAY({$date_col})"] );
                            $ts = "{$y}{$m}{$d}000000";
                            $file_path = $app->build_path_with_map( $obj, $mapping, $table, $ts );
                            if ( $file_path === false ) {
                                $uis = $db->model( 'urlinfo' )->load(
                                    ['archive_type' => strtolower( $at ),
                                     'archive_date' => $obj->ts2db( $ts ),
                                     'urlmapping_id' => $mapping->id ], null, 'id,url,file_path' );
                                foreach ( $uis as $ui ) $ui->remove();
                                continue;
                            }
                            if ( $app->id !== 'Worker' ) {
                                $app->delayed_dependencies[ $file_path ] = [ $obj, $mapping, null, $ts ];
                            } else if (! isset( $app->delayed_dependencies[ $file_path ] ) ) {
                                $app->publish( $file_path, $obj, $mapping, null, $ts, $original );
                            }
                        }
                    } else {
                        if ( $at === 'Fiscal-Yearly' ) {
                            $fy_start = $mapping->fiscal_start;
                            $fy_end = $fy_start == 1 ? 12 : $fy_start - 1;
                            $fy_start = sprintf( '%02d', $fy_start );
                        }
                        $time_stamp = [];
                        foreach ( $year_month_day as $ym ) {
                            $ym = $ym->get_values();
                            $y = $ym["YEAR({$date_col})"];
                            $m = $ym["MONTH({$date_col})"];
                            if ( $at === 'Fiscal-Yearly' ) {
                                if ( $m <= $fy_end && $fy_end != 12 ) $y--;
                                $time_stamp[ $y ] = true;
                            } else if ( $at === 'Yearly' ) {
                                $time_stamp[ $y ] = true;
                            } else if ( $at === 'Monthly' ) {
                                $m = sprintf( '%02d', $m );
                                $time_stamp[ $y . $m ] = true;
                            }
                        }
                        $time_stamp = array_keys( $time_stamp );
                        foreach ( $time_stamp as $time ) {
                            $terms = [];
                            if ( $at === 'Fiscal-Yearly' ) {
                                $ts = $time . $fy_start . '01000000';
                            } else if ( $at === 'Yearly' ) {
                                $ts = $time . '0101000000';
                            } else if ( $at === 'Monthly' ) {
                                $ts = $time . '01000000';
                            }
                            $file_path = $app->build_path_with_map( $obj, $mapping, $table, $ts );
                            if ( $file_path === false ) {
                                $uis = $db->model( 'urlinfo' )->load(
                                    ['archive_type' => strtolower( $at ),
                                     'archive_date' => $obj->ts2db( $ts ),
                                     'urlmapping_id' => $mapping->id ], null, 'id,url,file_path' );
                                foreach ( $uis as $ui ) $ui->remove();
                                continue;
                            }
                            if ( $app->id !== 'Worker' ) {
                                $app->delayed_dependencies[ $file_path ] = [ $obj, $mapping, null, $ts ];
                            } else if (! isset( $app->delayed_dependencies[ $file_path ] ) ) {
                                $app->publish( $file_path, $obj, $mapping, null, $ts, $original );
                            }
                        }
                    }
                    if ( $app->resetdb_per_rebuild ) $app->db->reconnect();
                } else if ( $obj->_model == 'template' && $mapping->model != 'template' &&
                    $app->mode !== 'rebuild_phase' ) {
                    $urls = $db->model( 'urlinfo' )->load( ['urlmapping_id' => $mapping->id ] );
                    foreach ( $urls as $url ) {
                        $app->delayed[ $url->id ] = $url;
                    }
                }
            }
            if ( $dependencies && ( $app->mode == 'save' || $app->mode == 'delete' ) ) {
                $app->rebuild_trigger( $app, $obj, $table );
            }
        }
    }

    function rebuild_trigger ( $app, $obj = null, $table = null ) {
        if ( get_class( $app ) !== 'Prototype' && !is_subclass_of( $this, 'Prototype' ) ) {
            list( $app, $obj ) = [ $this, $app ];
        }
        $delayed_dependencies = $app->delayed_dependencies;
        if (! $table ) $table = $app->get_table( $obj->_model );
        $db = $app->db;
        $fmgr = $app->fmgr;
        $triggers = $db->model( 'relation' )->load(
            ['to_obj' => 'table', 'to_id' => $table->id,
             'name' => 'triggers', 'from_obj' => 'urlmapping']
        );
        foreach ( $triggers as $trigger ) {
            $map = $db->model( 'urlmapping' )->load( (int) $trigger->from_id );
            if ( $map ) {
                if ( $app->republish_date_based && $map->date_based ) {
                    $app->publish_obj( $map->template, null, false, false, true, [ $map ] );
                    continue;
                }
                $trigger_terms = ['urlmapping_id' => $map->id, 'publish_file' => ['IN' => [1, 2, 3, 4] ],
                                  'delete_flag' => 0, 'is_published' => 1, 'class' => 'archive'];
                if ( $map->trigger_scope ) {
                    $trigger_scope =
                        $obj->has_column( 'workspace_id' ) ? (int) $obj->workspace_id : 0; 
                    if ( $map->workspace_id != $trigger_scope ) continue;
                    $trigger_terms['workspace_id'] = $trigger_scope;
                }
                $trigger_urls = $db->model( 'urlinfo' )->load( $trigger_terms );
                foreach ( $trigger_urls as $triggerUrl ) {
                    if ( $triggerUrl->model == $obj->_model
                        && $triggerUrl->object_id == $obj->id ) {
                        continue;
                    }
                    if ( isset( $delayed_dependencies[ $triggerUrl->file_path ] ) ) {
                        continue;
                    }
                    if ( $triggerUrl->publish_file == 3 || $triggerUrl->publish_file == 4 ) {
                        if ( $triggerUrl->publish_file == 3 ) {
                            if ( $fmgr->exists( $triggerUrl->file_path ) ) {
                                $fmgr->delete( $triggerUrl->file_path );
                            }
                        }
                        $triggerUrl->is_published( 0 );
                        $triggerUrl->save();
                        continue;
                    }
                    if (! isset( $app->update_urls[ $triggerUrl->id ] ) ) {
                        if ( $fmgr->exists( $triggerUrl->file_path ) ) {
                            $content = $fmgr->get( $triggerUrl->file_path );
                            if ( strpos( $content, '<!--/triggersection-->' ) !== false ) {
                                $trigger_models = [];
                                $is_trigger = false;
                                $pattern = '/(<!\-\-triggersection\s[^>]*?>)(.*?)<!\-\-\/triggersection\-\->/si';
                                preg_match_all( $pattern, $content, $matches );
                                if ( is_array( $matches ) && isset( $matches[1] ) ) {
                                    $open_tags = $matches[1];
                                    foreach ( $open_tags as $open_tag ) {
                                        if ( preg_match( '/model="(.*?)"/', $open_tag, $out ) ) {
                                            $model = $out[1];
                                            if ( $model == '__any__' ) {
                                                $is_trigger = true;
                                            } else {
                                                $models = explode( ',', $model );
                                                $trigger_models = array_unique( array_merge( $trigger_models, $models ) );
                                                if ( in_array( $obj->_model, $models ) ) {
                                                    $is_trigger = true;
                                                }
                                            }
                                        }
                                    }
                                }
                                $meta = $app->db->model( 'meta' )->get_by_key(
                                        ['model' => 'urlinfo', 'object_id' => $triggerUrl->id,
                                         'kind' => 'metadata', 'name' => 'triggers'] );
                                if (! in_array( $obj->_model, $trigger_models ) ) {
                                    $is_trigger = false;
                                    if ( $meta->id ) {
                                        $meta->remove();
                                    }
                                }
                                if ( $is_trigger ) {
                                    $value = $meta->value ? explode( ',', $meta->value ) : [];
                                    $value[] = $obj->_model;
                                    $meta->value( implode( ',', array_unique( $value ) ) );
                                    $meta->save();
                                }
                            }
                        }
                        $app->delayed[ $triggerUrl->id ] = $triggerUrl;
                        $app->update_urls[ $triggerUrl->id ] = $triggerUrl;
                    }
                }
            }
        }
    }

    function get_order ( $obj ) {
        $app = $this;
        $order_terms = [];
        if ( $obj->has_column( 'workspace_id' ) ) {
            if ( $obj->workspace_id === null && $app->workspace() ) {
                $order_terms['workspace_id'] = $app->workspace()->id;
            } else {
                $order_terms['workspace_id'] = $obj->workspace_id ? $obj->workspace_id : 0;
            }
        }
        if ( $obj->has_column( 'rev_type' ) ) {
            $order_terms['rev_type'] = 0;
        }
        if ( $obj->id ) {
            $order_terms['id'] = ['!=' => $obj->id ];
        }
        $last = $app->db->model( $obj->_model )->load( $order_terms, [
                'sort' => 'order', 'limit' => 1, 'direction' => 'descend'], 'order' );
        if ( is_array( $last ) && count( $last ) ) {
            $last = $last[0];
            $incl = $obj->_model == 'table' ? 10 : 1;
            $value = $last->order + $incl;
        } else {
            $value = 1;
        }
        return $value;
    }

    function preview ( $obj = null, $scheme = [] ) {
        $app = $this;
        $app->in_preview = true;
        if (! $scheme ) {
            $scheme = $app->get_scheme_from_db( $obj->_model );
        }
        $properties = isset( $scheme['edit_properties'] )
                    ? $scheme['edit_properties'] : [];
        $workspace = $app->workspace();
        $db = $app->db;
        if ( $app->param( 'token' ) ) {
            $magic = $app->param( 'token' );
            $user = $app->user();
            if (!$user ) {
                $key = $app->param( 'key' );
                $user_id = $app->decrypt( $key, $magic );
                if ( $user_id ) $user_id = (int) $user_id;
                $user = $db->model( 'user' )->load( $user_id );
            }
            if (!$user ) {
                return $app->error( 'Invalid request.' );
            }
            $terms = ['name' => $magic,
                      'user_id' => $user->id, 'kind' => 'PV'];
            if ( $workspace ) $terms['workspace_id'] = $workspace->id;
            $session = $db->model( 'session' )->get_by_key( $terms );
            if (!$session->id ) {
                return $app->error( 'Invalid request.' );
            }
            $mime_type = $session->key;
            if ( $mime_type ) {
                header( "Content-type: {$mime_type}" );
            }
            echo $session->text;
            $session->remove();
            exit();
        }
        if (!$obj ) {
            return $app->error( 'Invalid request.' );
        }
        PTUtil::set_object_fields( $obj, false );
        if ( $app->param( '__urlmap_id' ) ) {
            $map = $app->db->model( 'urlmapping' )->load( (int) $app->param( '__urlmap_id' ) );
        } else {
            $map = $app->get_permalink( $obj, true, '*' );
        }
        if (!$workspace && $map && $map->workspace_id ) {
            $workspace = $map->workspace;
        }
        $preview = null;
        if ( $obj->_model !== 'template' && $obj->_model !== 'asset' ) {
            if (!$map || !$map->template || !$map->model ) {
                return $app->error( 'View or Model not specified.' );
            }
        } else if ( $obj->_model === 'asset' ) {
            $preview = $obj->file;
        } else if ( $obj->_model === 'template' ) {
            $template = $obj;
        }
        if (! $preview ) {
            if ( is_object( $map ) && $map->id ) {
                $template = $map->template;
                $model = $map->model;
            } else {
                $model = 'template';
            }
            $app->init_tags();
            $ctx = clone $app->ctx;
            $ctx->include_paths[ $app->site_path ] = true;
            if ( $workspace ) {
                $ctx->include_paths[ $workspace->site_path ] = true;
            }
            $table = $app->get_table( $model );
            $ctx->stash( 'current_urlmapping', $map );
            $ctx->stash( 'current_object', $obj );
            $archive_type = '';
            $archive_date = '';
            if ( $obj->_model === 'template' ) {
                $ctx->stash( 'preview_template', $template );
            }
            $primary = $table->primary;
            if ( $obj->_model === 'template' && $table->name != 'template' ) {
                $tmpl = $app->linked_file === 2 ? $obj->_text( $app ) : $obj->text;
                $terms = [];
                if ( $map && $map->workspace_id ) {
                    $terms['workspace_id'] = $map->workspace_id;
                }
                if ( $table->revisable ) {
                    $terms['rev_type'] = 0;
                }
                $preview_obj = $db->model( $table->name )->load( $terms,
                    ['limit' => 1, 'sort' => 'id', 'direction' => 'descend'] );
                if (! empty( $preview_obj ) ) {
                    $obj = $preview_obj[0];
                } else {
                    $obj = $db->model( $table->name )->new();
                    $obj->id( -1 );
                    $obj->$primary( $app->translate( $table->label ) );
                    $app->set_default( $obj );
                }
                $ctx->stash( 'current_archive_title', $obj->$primary );
                $ctx->stash( 'current_archive_type', $obj->_model );
                $ctx->stash( 'preview_object', $obj );
                $ctx->stash( $obj->_model, $obj );
                $ctx->stash( 'current_object', $obj );
            } else {
                $archive_type = is_object( $map ) ? $map->model : 'index';
                $ctx->stash( 'current_archive_type', $archive_type );
                $tmpl = $app->linked_file === 2 ? $template->_text( $app ) : $template->text;
                if ( $app->mode == 'save' && $app->param( '_model' )
                    && $app->param( '_model' ) == 'template' ) {
                    $tmpl = $app->param( 'text' );
                }
                if ( is_object( $map ) && $map->model == $obj->_model ) {
                    $ctx->stash( 'current_archive_title', $obj->$primary );
                }
            }
            if ( is_object( $map ) && $map->container ) {
                $container = $app->get_table( $map->container );
                if ( is_object( $container ) ) {
                    $ctx->stash( 'current_container', $container->name );
                    if ( $at = $map->date_based ) {
                        if ( $archive_type != 'template' ) {
                            $archive_type .= $archive_type ? '-' . strtolower( $at )
                                           : strtolower( $at );
                        } else {
                            $archive_type = strtolower( $at );
                        }
                        $ctx->stash( 'current_archive_type', $archive_type );
                        $container_obj = $app->db->model( $map->container )->new();
                        $date_col = $app->get_date_col( $container_obj );
                        $terms = [];
                        if ( $container_obj->has_column( 'workspace_id' )
                            && $workspace ) {
                            $terms['workspace_id'] = $workspace->id;
                            $workspace = $obj->workspace;
                        }
                        $last = $container_obj->load( $terms,
                            ['limit' => 1, 'sort' => $date_col, 'direction' => 'descend'] );
                        if ( is_array( $last ) && !empty( $last ) ) {
                            $last = $last[0];
                            $archive_date = $last->$date_col;
                            $ts = $container_obj->db2ts( $archive_date );
                            list( $title, $start, $end ) =
                                $app->title_start_end( $at, $ts, $map );
                            $ctx->stash( 'archive_date_based', $container_obj->_model );
                            $ctx->stash( 'archive_date_based_col', $date_col );
                            $ctx->stash( 'current_timestamp', $start );
                            $ctx->stash( 'current_timestamp_end', $end );
                            $ctx->stash( 'current_archive_title', $title );
                        }
                    }
                }
            }
            $ctx->stash( 'current_template', $template );
            $ctx->stash( 'current_context', $obj->_model );
            $ctx->stash( $obj->_model, $obj );
            $ctx->stash( 'workspace', $workspace );
            $column_defs = $scheme['column_defs'];
            foreach ( $properties as $key => $val ) {
                $magic = $app->param( "{$key}-magic" );
                if ( $magic ) {
                    $sess = $db->model( 'session' )
                               ->get_by_key( ['name' => $magic,
                                       'user_id' => $app->user()->id, 'kind' => 'UP'] );
                    if ( $sess->id ) {
                        if ( $column_defs[ $key ]['type'] != 'int' ) {
                            $obj->$key( $sess->data );
                        }
                        $ctx->stash( 'current_session_' . $key, $sess );
                    }
                }
            }
            $ctx->vars = [];
            $ctx->local_vars = [];
            $ctx->vars['current_archive_model'] = $obj->_model;
            $ctx->vars['current_object_id'] = $obj->id;
            if ( is_object( $map ) ) {
                $ctx->vars['publish_type'] = $map->publish_file;
            }
            if (! $theme_static = $app->theme_static ) {
                $theme_static = $app->path . 'theme-static/';
                $app->theme_static = $theme_static;
            }
            $ctx->vars['theme_static'] = $theme_static;
            $ctx->vars['application_dir'] = __DIR__;
            $ctx->vars['application_path'] = $app->path;
            $ctx->vars['current_archive_type'] = $ctx->stash( 'current_archive_type' );
            $ctx->vars['current_archive_title'] = $ctx->stash( 'current_archive_title' );
            $mapping = is_object( $map ) ? $map->mapping : 'preview.txt';
            if ( isset( $obj ) && is_object( $map ) && isset( $table ) ) {
                $ts = $ctx->stash( 'current_timestamp' )
                    ? $ctx->stash( 'current_timestamp' ) : '';
                $url = $app->build_path_with_map( $obj, $map, $table, $ts, true );
                $ctx->stash( 'current_archive_url', $url );
                $ctx->vars['current_archive_url'] = $url;
            }
            $ctx->vars['current_archive_title'] = $ctx->stash( 'current_archive_title' );
            if (! $obj->id ) {
                $clone = clone $obj;
                $clone->id( -1 ); // If the object id is specified, the site path is returned.
                $permalink = $app->get_permalink( $clone );
            } else {
                $permalink = $app->get_permalink( $obj );
            }
            if (! $permalink && isset( $url ) ) {
                $permalink = $url;
            }
            if ( $permalink ) $mapping = $permalink;
            if ( preg_match( '!/$!', $mapping ) ) {
                $mapping .= $app->directory_index;
            }
            if ( $permalink && !$ctx->stash( 'current_archive_url' ) ) {
                $ctx->stash( 'current_archive_url', $permalink );
                $ctx->vars['current_archive_url'] = $permalink;
            }
            $object_id = $obj->id ? $obj->id : -1;
            $ui_terms = ['model' => $obj->_model, 'object_id' => $object_id,
                         'delete_flag' => [0, 1] ];
            if ( $map ) {
                $ui_terms['urlmapping_id'] = $map->id;
            }
            if ( $archive_type ) {
                $ui_terms['archive_type'] = $archive_type;
            }
            if ( $archive_date ) {
                $ui_terms['archive_date'] = $archive_date;
            }
            $urlinfo = $app->db->model( 'urlinfo' )->get_by_key( $ui_terms,
                ['sort' => 'delete_flag', 'direction' => 'ascend'] );
            if (! $urlinfo->id ) {
                $site_url = $workspace ? $workspace->site_url : $app->site_url;
                $site_path = $workspace ? $workspace->site_path : $app->site_path;
                $file_path = str_replace( $site_url, $site_path . DS, $permalink );
                $urlinfo->file_path( $file_path );
                PTUtil::set_url_path( $urlinfo );
            }
            $ctx->stash( 'current_urlinfo', $urlinfo );
            $callback = ['name' => 'pre_preview', 'template' => $tmpl, 'model' => $model,
                         'mime_type' => $urlinfo->mime_type, 'workspace' => $workspace, 'ctx' => $ctx,
                         'urlmapping' => $map ];
            $app->ctx = $ctx; // set ctx for callback.
            $app->init_callbacks( 'preview', 'pre_preview' );
            $app->run_callbacks( $callback, 'preview', $tmpl );
            $app->init_callbacks( 'template', 'pre_preview' );
            $app->run_callbacks( $callback, 'template', $tmpl );
            $app->init_callbacks( $model, 'pre_preview' );
            $app->run_callbacks( $callback, $model, $tmpl );
            $mime_type = $callback['mime_type'];
            $ctx = $callback['ctx'];
            $preview = $ctx->build( $tmpl, false, null, true );
            if ( $urlinfo->mime_type === 'text/plain' && !PTUtil::is_not_html( $preview ) ) {
                $mime_type = 'text/html';
            }
        }
        if ( $app->dynamicmtml_in_preview ) {
            $regex = '/<\${0,1}' . $ctx->prefix . '/si';
            if ( preg_match( $regex, $preview ) ) {
                $preview = $ctx->build( $preview, false, null, true );
            }
        }
        if ( $app->eval_in_preview && strpos( $preview, '<?php' ) !== false ) {
            ob_start();
            eval( '?>' . $preview );
            $preview = ob_get_clean();
            if ( $err = error_get_last() ) {
                return $app->error( $err );
            }
        }
        $callback['name'] = 'post_preview';
        $app->init_callbacks( 'preview', 'post_preview' );
        $app->run_callbacks( $callback, 'preview', $preview );
        $app->init_callbacks( 'template', 'post_preview' );
        $app->run_callbacks( $callback, 'template', $preview );
        $app->init_callbacks( $model, 'post_preview' );
        $app->run_callbacks( $callback, $model, $preview );
        if (!$app->preview_redirect ) {
            if ( $mime_type ) header( "Content-type: {$mime_type}" );
            echo $preview;
            exit();
        }
        $magic = $app->magic();
        $user = $app->user();
        $terms = ['name' => $magic, 'text' => $preview,
                  'user_id' => $user->id, 'kind' => 'PV'];
        $preview_url = $app->admin_url;
        if ( $workspace ) {
            $terms['workspace_id'] = $workspace->id;
            if ( $workspace->preview_url ) {
                $preview_url = $workspace->preview_url;
            }
        }
        $key = $app->encrypt( $user->id, $magic );
        $session = $db->model( 'session' )->get_by_key( $terms );
        $session->key( $mime_type );
        $session->start( $app->request_time );
        $session->expires( $app->request_time + $app->token_expires );
        if ( $app->preview_redirect === 'tmpfile' ) {
            $permalink = $app->get_permalink( $obj );
            $ts = $ctx->stash( 'current_timestamp' ) ? $ctx->stash( 'current_timestamp' ) : '';
            $permalink = $app->build_path_with_map( $obj, $map, $table, $ts, true );
            if ( $permalink ) {
                $basename = preg_quote( basename( $permalink ), '/' );
                $dirname = preg_replace( "/$basename$/", '', $permalink );
                $file_ext = PTUtil::get_extension( $permalink );
                $file_path = $app->build_path_with_map( $obj, $map, $table );
                $site_path = $workspace ? $workspace->site_path : $app->site_path;
                if ( strpos( $file_path, $site_path ) === false ) {
                    return $app->error( 'Could not generate Preview URL.' );
                }
                $dirpath = preg_replace( "/$basename$/", '', $file_path );
                $existing = true;
                $fmgr = $app->fmgr;
                $counter = 0;
                while ( $existing == true ) {
                    $magic = $counter ? $app->magic() : md5( $file_path );
                    $magic = 'pt-preview-' . $magic;
                    $tmp_url = $dirname . $magic . '.' . $file_ext;
                    $tmp_file_path = $dirpath . $magic . '.' . $file_ext;
                    $url = $db->model( 'urlinfo' )->count( ['file_path' => $tmp_file_path, 'delete_flag' => [0, 1] ] );
                    if (! $url ) {
                        $existing = false;
                    }
                    $counter++;
                    if ( $counter > 100 ) {
                        return $app->error( 'Could not generate Preview URL.' );
                    }
                }
                $fmgr->put( $tmp_file_path, $preview );
                $app->redirect( $tmp_url, true );
                sleep( 5 );
                $fmgr->unlink( $tmp_file_path );
                exit();
            }
        }
        $session->save();
        $db->commit();
        $app->redirect( $preview_url .
            "?__mode=preview&token={$magic}&key={$key}" . $app->workspace_param );
        exit();
    }

    function cleanup_tmp ( $app ) {
        $session_id = $app->param( 'session_id' );
        if (! $session_id ) return;
        $sessions =
            $app->db->model( 'session' )->load(
                ['name' => $session_id, 'kind' => 'TP', 'user_id' => $app->user()->id ] );
        if ( count( $sessions ) ) {
            foreach ( $sessions as $session ) {
                $model = $session->key;
                $obj_id = (int) $session->value;
                if (! $obj_id ||! $model ) {
                    continue;
                }
                $tmp_obj = $app->db->model( $model )->load( $obj_id );
                $app->remove_object( $tmp_obj );
            }
            $app->db->model( 'session' )->remove_multi( $sessions );
        }
    }

    function init_tags ( $force = false ) {
        $core_tags = $this->core_tags;
        $core_tags->init_tags( $force );
    }

    function build_path_with_map ( $obj, $mapping, $table = null, $ts = null, $url = false ) {
        $app = $this;
        if (! $mapping || ! $obj ) return '';
        $path = $mapping->mapping;
        $workspace_id = (int) $mapping->workspace_id;
        $workspace = null;
        if ( $workspace_id ) {
            $workspace = $mapping->workspace
                       ? $mapping->workspace
                       : $app->db->model( 'workspace' )->load( (int) $workspace_id );
        }
        if ( strpos( $path, '<' ) !== false ) {
            if (! $table ) {
                $table = $app->get_table( $obj->_model );
                if (! $table ) return '';
            }
            $map_path = $path;
            $db = $app->db;
            $ctx = $app->ctx;
            $tags = $ctx->tags;
            $app->init_tags();
            $old_vars = $ctx->vars;
            $old_local_vars = $ctx->local_vars;
            $old_params = $ctx->params;
            $old_stash = $ctx->__stash;
            $localvars = ['current_context', 'current_timestamp', 'current_timestamp_end',
                          'archive_date_based', 'current_archive_type', 'current_archive_title',
                          'archive_date_based_col', 'current_object', 'current_container'];
            $permalink_compat = $app->permalink_compat;
            if ( $permalink_compat ) {
                $ctx->localize( $localvars );
            } else {
                $ctx = $ctx->clone();
            }
            $table_vars = $table->get_values();
            $colprefix = $table->_colprefix;
            foreach ( $table_vars as $key => $value ) {
                $ctx->local_vars[ $key ] = $value;
                $key = preg_replace( "/^$colprefix/", '', $key );
                $ctx->local_vars[ $key ] = $value;
            }
            if ( $app->mode === 'view' ) {
                $obj = $db->model( $obj->_model )->get_by_key( ['id' => $obj->id ] );
            } else {
                if ( $app->get_object_cols && is_string( $app->get_object_cols ) && $app->get_object_cols != '*' ) {
                    // In bulk delete or list actions.
                    $select_cols = $app->core_tags->select_cols( $app, $obj, '*' );
                    $obj = $obj->load( $obj->id, null, $select_cols );
                }
            }
            $model_vars = $obj->get_values();
            $colprefix = $obj->_colprefix;
            foreach ( $model_vars as $key => $value ) {
                $key = preg_replace( "/^$colprefix/", '', $key );
                $ctx->local_vars[ $key ] = $value;
            }
            $ctx->stash( 'workspace', $workspace );
            $ctx->stash( 'current_context', $obj->_model );
            $ctx->stash( $obj->_model, $obj );
            $map_path = $mapping->mapping;
            $ctx->stash( 'current_timestamp', '' );
            $ctx->stash( 'current_timestamp_end', '' );
            $ctx->stash( 'archive_date_based', false );
            $ctx->stash( 'current_container', $mapping->container );
            $ctx->vars['current_container'] = $mapping->container;
            $archive_type = '';
            if ( $mapping->model === 'template' ) {
                $ctx->stash( 'current_archive_type', 'index' );
                if ( $mapping->template ) {
                    $ctx->stash( 'current_archive_title', $mapping->template->name );
                }
            } else {
                $archive_type = $mapping->model;
                $ctx->stash( 'current_archive_type', $archive_type );
            }
            if ( $mapping->date_based && $ts ) {
                $ts = preg_replace( '/[^0-9]/u', '', $ts );
                $at = $mapping->date_based;
                $ctx->stash( 'archive_date_based', $obj->_model );
                list( $title, $start, $end ) =
                    $app->title_start_end( $at, $ts, $mapping );
                $y = substr( $title, 0, 4 );
                $map_path = str_replace( '%y', $y, $map_path );
                if ( $title != $y ) {
                    $m = substr( $title, 4, 2 );
                    $map_path = str_replace( '%m', $m, $map_path );
                }
                $ctx->stash( 'current_timestamp', $start );
                $ctx->stash( 'current_timestamp_end', $end );
                $ctx->stash( 'current_archive_title', $title );
                $date_col = $app->get_date_col( $obj );
                $ctx->stash( 'archive_date_based_col', $date_col );
                $archive_type .= $archive_type ? '-' . strtolower( $at )
                               : strtolower( $at );
                $ctx->stash( 'current_archive_type', $archive_type );
                $ctx->vars['archive_date_based'] = true;
            } else {
                $ctx->vars['archive_date_based'] = false;
                if ( $mapping->model === $obj->_model ) {
                    $primary = $table->primary;
                    $ctx->stash( 'current_archive_title', $obj->$primary );
                }
            }
            $force_build_map = $app->force_build_map;
            if (! $force_build_map ) {
                $force_build_map_key = 'force_build_map_' . $obj->_model;
                $force_build_map = $app->$force_build_map_key;
            }
            $ctx->vars['current_archive_title'] = $ctx->stash( 'current_archive_title' );
            $ctx->vars['current_archive_type'] = $ctx->stash( 'current_archive_type' );
            $ctx->vars['current_archive_model'] = $obj->_model;
            $ctx->vars['current_object_id'] = $obj->id;
            $ctx->stash( 'current_object', $obj );
            $cache_key = $mapping->cache_key;
            if ( !$force_build_map && $mapping->compiled && $cache_key ) {
                if ( $app->cache_driver ) {
                    $path = $ctx->_eval( $mapping->compiled );
                } else {
                    if ( $ctx->get_cache( $cache_key ) && $ctx->out !== false && $ctx->out !== null ) {
                        $path = $ctx->out;
                    } else {
                        $app->pre_fetch( $ctx, $cache_key, $mapping->compiled );
                        if ( $ctx->get_cache( $cache_key ) && $ctx->out !== false && $ctx->out !== null ) {
                            $path = $ctx->out;
                        } else {
                            $path = $ctx->build( $map_path, false, $cache_key );
                        }
                    }
                }
            } else {
                $path = $ctx->build( $map_path, false, $cache_key );
            }
            $ctx->out = null; // If the cache remains, the result of rebuilding the view will be incorrect.
            if ( $permalink_compat ) {
                $ctx->restore( $localvars );
            } else {
                $ctx->vars = $old_vars;
                $ctx->local_vars = $old_local_vars;
                $ctx->params = $old_params;
                $ctx->__stash = $old_stash;
            }
            if ( $app->mode !== 'rebuild_phase' ) {
                $app->ctx->tags = $tags;
                $app->init_tags = false;
            }
        }
        $path = trim( $path );
        if (!$path && !$url ) return false;
        if ( strpos( $path, '//' ) !== false ) {
            $path = preg_replace( '!/{1,}!', '/', $path );
        }
        $base_url = $app->site_url;
        $base_path = $app->site_path;
        if ( $workspace ) {
            $base_url = $workspace->site_url;
            $base_path = $workspace->site_path;
        }
        if ( mb_substr( $base_url, -1 ) != '/' ) $base_url .= '/';
        $ds = preg_quote( DS, '/' );
        if (! preg_match( "/{$ds}$/", $base_path ) ) $base_path .= DS;
        if (!$url && strpos( $path, DS ) === 0 ) {
            $path = ltrim( $path, DS );
        }
        $_path = $url ? $base_url . $path : $base_path . $path;
        $_path = str_replace( DS, '/', $_path );
        if (! $url && strpos( $_path, '..' ) !== false && $app->path_verify ) {
            $abs_path = PTUtil::rel2abs( $_path );
            $valid = $app->path_verify == 2 ? strpos( $abs_path, $base_path ) === 0
                   : strpos( $abs_path, $app->document_root ) === 0;
            if ( $valid === false ) {
                $error = $app->path_verify == 2 ? 'You cannot write to directories above the site path.'
                       : 'You cannot write to directories above the document root.';
                $app->error( $error );
                return false;
            }
        }
        return $_path;
    }

    function title_start_end ( $archive_type, $ts, $mapping = null ) {
        $app = $this;
        list( $title, $start, $end ) = ['', '', ''];
        $archive_type = strtolower( $archive_type );
        if ( $archive_type == 'yearly' ) {
            $y = substr( $ts, 0, 4 );
            $title = $y;
            $start = "{$y}0101000000";
            $end   = "{$y}1231235959";
        } elseif ( $archive_type == 'fiscal-yearly' ) {
            $y = substr( $ts, 0, 4 );
            $m = substr( $ts, 4, 2 );
            $year = $y;
            $fiscal_start = is_object( $mapping ) ? $mapping->fiscal_start : $mapping;
            $fy_end = $fiscal_start == 1 ? 12 : $fiscal_start - 1;
            $start_y = $y;
            $end_y = $fiscal_start == 1 ? $y : $y + 1;
            $fiscal_start = sprintf( '%02d', $fiscal_start );
            $fy_end = sprintf( '%02d', $fy_end );
            $start_ym = $start_y . $fiscal_start;
            $end_ym = $end_y . $fy_end;
            $ym = $y . $m;
            if ( $ym >= $start_ym && $ym <= $end_ym ) {
                $year = $y;
            } else if ( $end_ym < $ym ) {
                $year = $y + 1;
            }
            list( $start, $end ) = PTUtil::start_end_month( "{$end_ym}01000000" );
            $start = "{$start_ym}01000000";
            $title = $year;
        } elseif ( $archive_type == 'monthly' ) {
            $y = substr( $ts, 0, 4 );
            $m = substr( $ts, 4, 2 );
            list( $start, $end ) = PTUtil::start_end_month( "{$y}{$m}01000000" );
            $title = "{$y}{$m}";
        } elseif ( $archive_type == 'daily' ) {
            $y = substr( $ts, 0, 4 );
            $m = substr( $ts, 4, 2 );
            $d = substr( $ts, 6, 2 );
            $title = "{$y}{$m}{$d}";
            $start = "{$y}{$m}{$d}000000";
            $end = "{$y}{$m}{$d}235959";
        }
        return [ $title, $start, $end ];
    }

    function set_relations ( $args, $ids = [], $add_only = false,
            &$errors = [], &$remove_attachments = [], $callback = false ) {
        $app = $this;
        if (! is_array( $ids ) ) $ids = [ $ids ];
        $ids = array_filter( array_unique( $ids ) );
        $is_changed = false;
        $update_models = [];
        if (!$add_only ) {
            $relations = $app->db->model( 'relation' )->load( $args );
            if ( is_array( $relations ) && !empty( $relations ) ) {
                $app->init_callbacks( 'blob', 'start_publish' );
                $removes = [];
                $rel_map = [];
                foreach ( $relations as $rel ) {
                    if (! in_array( $rel->to_id, $ids ) || isset( $rel_map[ $rel->to_id ] ) ) {
                        $removes[] = $rel;
                        $is_changed = true;
                        $update_models[ $rel->to_obj ] = true;
                        if ( $rel->to_obj == 'attachmentfile' ) {
                            $attachmentfile =
                                $app->db->model( 'attachmentfile' )->load( (int) $rel->to_id );
                            if ( $attachmentfile ) {
                                $urls = $app->db->model( 'urlinfo' )->load(
                                    ['model' => 'attachmentfile', 'object_id' => $attachmentfile->id ] );
                                if (! empty( $urls ) ) {
                                    if ( $app->publish_callbacks && $callback ) {
                                        $ctx = $app->ctx;
                                        $cb_unlink = true;
                                        $original = clone $attachmentfile;
                                        $callback = ['name' => 'start_publish', 'model' => 'blob',
                                                     'object' => $attachmentfile, 'ctx' => $ctx,
                                                     'original' => $original, 'unlink' => $cb_unlink ];
                                    }
                                    foreach ( $urls as $url ) {
                                        if ( $app->publish_callbacks && $callback ) {
                                            $callback['urlinfo'] = $url;
                                            $app->run_callbacks( $callback, 'blob', $cb_unlink );
                                        }
                                        $url->remove();
                                    }
                                }
                                $remove_attachments[] = $attachmentfile;
                            }
                        }
                    }
                    $rel_map[ $rel->to_id ] = $rel->id;
                }
                if ( $is_changed ) {
                    if (! $app->db->model( 'relation' )->remove_multi( $removes ) ) {
                        foreach ( $update_models as $model => $bool ) {
                            if ( $model ) $app->db->clear_query( $model );
                        }
                        $errors[] = $app->translate(
                            'An error occurred while updating the related object(s).' );
                        return false;
                    }
                }
            }
        }
        $i = 0;
        $relations = [];
        foreach ( $ids as $id ) {
            $id = (int) $id;
            if (!$id ) continue;
            $i++;
            $terms = $args;
            $terms['to_id'] = $id;
            $rel = $app->db->model( 'relation' )->get_by_key( $terms );
            if (!$rel->id || $rel->order != $i ) {
                $rel->order( $i );
                $relations[] = $rel;
                $is_changed = true;
                $update_models[ $rel->to_obj ] = true;
            }
        }
        if (! empty( $relations ) ) {
            if (! $app->db->model( 'relation' )->update_multi( $relations ) ) {
                foreach ( $update_models as $model => $bool ) {
                    if ( $model ) $app->db->clear_query( $model );
                }
                $errors[] = $app->translate(
                    'An error occurred while updating the related object(s).' );
                return false;
            }
        }
        foreach ( $update_models as $model => $bool ) {
            if ( $model ) $app->db->clear_query( $model );
        }
        if ( $is_changed ) {
            // Because the cache is not cleared up to the __destruct.
            $app->db->clear_query( 'relation' );
        }
        return $is_changed;
    }

    function file_attach_to_obj ( $obj, $col, $path,
                                  $label = '', &$error = '' ) {
        return PTUtil::file_attach_to_obj(
                $this, $obj, $col, $path, $label, $error );
    }

    function run_callbacks ( &$cb, $key, &$params = null, &$args = true,
        &$extra = null, &$option = null ) {
        $app = $this;
        $cb_name = $cb['name'];
        if (! is_string( $cb_name ) ||! is_string( $key ) ) {
            return;
        }
        $all_callbacks = isset( $app->callbacks[ $cb_name ][ $key ] ) ?
            $app->callbacks[ $cb_name ][ $key ] : [];
        $result = true;
        if (! empty( $all_callbacks ) ) {
            $update_milti = $app->update_milti;
            if ( $update_milti ) {
                $app->db->flush_queries();
                $app->db->update_milti = false;
            }
            ksort( $all_callbacks );
            foreach ( $all_callbacks as $callbacks ) {
                foreach ( $callbacks as $callback ) {
                    list( $meth, $class ) = $callback;
                    $res = true;
                    if ( function_exists( $meth ) ) {
                        $res = $meth( $cb, $app, $params, $args, $extra, $option );
                    } else if ( $class && method_exists( $class, $meth ) ) {
                        $res = $class->$meth( $cb, $app, $params, $args, $extra, $option );
                    }
                    if ( $res === false && $result === true ) {
                        $result = false;
                    }
                }
            }
            $app->db->update_milti = $update_milti;
        }
        return $result;
    }

    function run_hooks ( $name ) {
        $app = $this;
        $_hooks = $app->hooks;
        $_hooks = isset( $_hooks[ $name ] ) ? $_hooks[ $name ] : null;
        if (! $_hooks ) return;
        $components = $app->class_paths;
        $update_milti = $app->update_milti;
        if ( $update_milti ) {
            $app->db->flush_queries();
            $app->db->update_milti = false;
        }
        ksort( $_hooks );
        foreach ( $_hooks as $hooks ) {
            foreach ( $hooks as $hook ) {
                $plugin = strtolower( $hook['component'] );
                $component = $app->component( $plugin );
                if (!$component ) $component = $app->autoload_component( $plugin );
                if (!$component ) continue;
                $method = $hook['method'];
                if ( method_exists( $component, $method ) ) {
                    $component->$method( $app );
                }
            }
        }
        $app->db->update_milti = $update_milti;
    }

    private function delete ( $app, $hierarchy = false ) {
        if ( $max_execution_time = $app->max_exec_time ) {
            $max_execution_time = (int) $max_execution_time;
            ini_set( 'max_execution_time', $max_execution_time );
        }
        $model = $app->param( '_model' );
        if ( $model == 'workspace' ) $app->workspace_param = null;
        $app->validate_magic();
        $db = $app->db;
        $db->update_multi = true;
        $objects = $app->get_object( $model );
        if ( $objects === null ) {
            // Is it possible that those objects have already been deleted?
            if ( $hierarchy ) {
                return;
            }
            $ids = $app->param( 'id' );
            if (! is_array( $ids ) ) $ids = [ $ids ];
            $count = count( $ids );
            $app->redirect( $app->admin_url .
                "?__mode=view&_type=list&_model={$model}&already_deleted={$count}"
                . $app->workspace_param );
            exit();
        }
        $single = false;
        if (! is_array( $objects ) && is_object( $objects ) ) {
            $objects = [ $objects ];
            $single = true;
        }
        $table = $app->get_table( $model );
        $app->core_delete_callbacks( $model );
        if ( $app->param( 'all_selected' ) && $model != 'urlinfo' ) {
            $has_callbacks = isset( $app->callbacks['delete_filter'][ $model ] )
                           ||isset( $app->callbacks['pre_delete'][ $model ] )
                           ||isset( $app->callbacks['post_delete'][ $model ] );
            if (! $has_callbacks ) {
                $scheme = $app->get_scheme_from_db( $model );
                $all_objs = $db->model( $model )->count();
                if ( isset( $scheme['relations'] ) && empty( $scheme['relations'] )
                    && $all_objs == count( $objects ) ) {
                    $meta_cnt = $db->model( 'meta' )->count( ['model' => $model ] );
                    $url_cnt = $db->model( 'urlinfo' )->count( ['model' => $model ] );
                    if (! $meta_cnt && ! $url_cnt ) {
                        $sql = 'TRUNCATE TABLE ' . DB_PREFIX . $model;
                        $db->db->query( $sql );
                        $db->clear_query( $model );
                        $plural = strtolower( $table->plural );
                        $message = $app->translate(
                            "All %1\$s (%2\$s objects) deleted by %3\$s.",
                            [ $app->translate( $table->plural ), $all_objs, $app->user()->nickname ] );
                        $app->log( ['message'   => $message,
                                    'category'  => 'delete',
                                    'model'     => $table->name,
                                    'level'     => 'info'] );
                        $app->redirect( $app->admin_url
                            . "?__mode=view&_type=list&_model={$model}&deleted={$all_objs}"
                            . $app->workspace_param, true );
                        exit();
                    }
                }
            }
        }
        $db->caching = false;
        $errors = [];
        $callback = ['name' => 'delete_filter', 'error' => ''];
        $delete_filter = $app->run_callbacks( $callback, $model );
        if ( $msg = $callback['error'] ) {
            $errors[] = $msg;
        }
        if ( !empty( $errors ) || !$delete_filter ) {
            return $app->forward( $model, join( "\n", $errors ) );
        }
        $i = 0;
        $remove_objects = [];
        $label = $app->translate( $table->label );
        $errstr = $app->translate( 'An error occurred while deleting %s.', $label );
        $app->register_callback( 'meta', 'post_delete', 'post_delete_meta', 1, $app );
        $app->init_callbacks( 'meta', 'post_delete' );
        $per_rebuild = $app->per_rebuild;
        $prop_key = strtolower( $table->plural );
        $model_per_rebuild = $prop_key . '_per_rebuild';
        if ( $app->$model_per_rebuild ) {
            $per_rebuild = (int) $app->$model_per_rebuild;
        }
        $delete_in_async = false;
        $request_id = $app->param( 'request_id' ) ? $app->param( 'request_id' ) : $app->magic();
        $async_max_proc_time = $app->async_max_proc_time;
        $max_proc_time = $async_max_proc_time
                       ? $app->request_time + $async_max_proc_time : false;
        if ( $app->remove_async ) {
            $log_terms = ['md5' => md5( $request_id ), 'level' => 4];
            if (! $async_max_proc_time ) $async_max_proc_time = 1800;
            $ts_from = date( 'Y-m-d H:i:s',time() - $async_max_proc_time );
            $log_terms['created_on'] = ['>=' => $ts_from ];
            $error_log = $db->model( 'log' )->load( $log_terms, ['limit' => 1] );
            if (! empty( $error_log ) ) {
                return $app->error( $error_log[0]->message );
            }
            $max_proc = $app->async_max_proc;
            $count = $app->db->model( 'session' )->count( ['name' => $request_id,
                    'kind' => 'RA', 'user_id' => $app->user->id, 'key' => $model ] );
            if ( count( $objects ) > $per_rebuild ) {
            } else {
                $max_proc = 1; // Last
            }
            $db->caching = false;
            while ( $count >= $max_proc ) {
                $count = $db->model( 'session' )->count( ['name' => $request_id,
                        'kind' => 'RA', 'user_id' => $app->user->id, 'key' => $model ] );
                if ( $max_proc_time && time() > $max_proc_time ) {
                    $count = 0;
                    return $app->error( 'Background deleting has timed out.' );
                }
                sleep( 2 );
            }
            $db->caching = $app->db_caching;
        }
        if ( $app->remove_async && ( count( $objects ) > $per_rebuild ) ) {
            $delete_ids = [];
            foreach ( $objects as $object ) {
                $delete_ids[] = $object->id;
            }
            $rebuild_interval = $app->rebuild_interval;
            $interval_name = $prop_key . '_rebuild_interval';
            if ( $app->$interval_name ) {
                $rebuild_interval = (int) $app->$interval_name;
            }
            $ctx = $app->ctx;
            $count_obj = count( $delete_ids );
            $objects = array_slice( $objects, 0, $per_rebuild );
            $next_ids = array_slice( $delete_ids, $per_rebuild );
            if (! empty( $next_ids ) ) {
                $session = $db->model( 'session' )->new(
                    ['name' => $request_id, 'kind' => 'RA', 'user_id' => $app->user->id,
                     'text' => implode( ',', $next_ids ), 'key' => $model ] );
                $session->expires( $app->request_time + $app->sess_timeout );
                $session->start( $app->request_time );
                $session->save();
                $app->remove_objects['session'][] = $session;
                $ctx->vars['request_id'] = $request_id;
                $total_objects = $app->param( 'count_object' )
                               ? $app->param( 'count_object' ) : $count_obj;
                $ctx->vars['page_title'] = $app->translate( 'Deleting %s...',
                                           $app->translate( $table->plural ) );
                $ctx->vars['delete_interval'] = $rebuild_interval;
                $ctx->vars['delete_ids'] = implode( ',', $next_ids );
                $ctx->vars['model'] = $model;
                $ctx->vars['count_object'] = $total_objects;
                $past = $total_objects - count( $next_ids );
                $percent = ( $past / $total_objects ) * 100;
                $ctx->vars['delete_percent'] = (int) $percent;
                $ctx->vars['icon_url'] = 'assets/img/loading.gif';
                if ( $app->param( '_type' ) && $app->param( '_type' ) == 'list_action' ) {
                } else {
                    $ctx->vars['start_delete'] = 1;
                }
                $ctx->vars['workspace_id'] = $app->workspace() ? $app->workspace()->id : 0;
                $app->build_page( 'delete_action.tmpl', [], true, false );
                $delete_in_async = true;
            }
        }
        foreach( $objects as $obj ) {
            if (! $obj->id ) {
                $label = $app->translate( $table->label );
                return $app->error( '%s not found.', $label );
            }
            if ( $model == 'table' ) {
                $tableScheme = $app->get_scheme_from_db( $obj->name );
            }
            if ( $single ) {
                if ( $table->revisable && $obj->rev_type ) {
                    $app->return_args['manage_revision'] = 1;
                }
            }
            $original = clone $obj;
            $obj->_delete = true;
            if ( $obj->_relations === null ) $obj->_relations = $app->get_relations( $obj );
            $callback = ['name' => 'pre_delete', 'table' => $table,
                         'model' => $model, 'error' => '' ];
            $pre_delete = $app->run_callbacks( $callback, $model, $obj, $original );
            if ( $msg = $callback['error'] ) {
                $errors[] = $msg;
            }
            if ( !empty( $errors ) || !$pre_delete ) {
                if ( $delete_in_async ) {
                    $error = !empty( $errors ) ? $errors[0] : $errstr;
                    $app->log( ['message'  => $error,
                                'category' => 'delete',
                                'model'    => $model,
                                'md5'      => md5( $request_id ),
                                'metadata' => json_encode( $errors, JSON_UNESCAPED_UNICODE ),
                                'level'    => 'error'] );
                    exit();
                } else {
                    return $app->forward( $model, join( "\n", $errors ), $obj );
                }
            }
            if (!$app->can_do( $model, 'delete', $obj ) ) {
                if ( $delete_in_async ) {
                    $app->log( ['message'  => $app->translate( 'Permission denied.' ),
                                'category' => 'delete',
                                'model'    => $model,
                                'md5'      => md5( $request_id ),
                                'level'    => 'error'] );
                    exit();
                } else {
                    return $app->error( 'Permission denied.' );
                }
            }
            // todo begin and finish work for remove child_classes
            if (! isset( $status_published ) && $obj->has_column( 'status' ) ) {
                $status_published = $app->status_published( $obj->_model );
            }
            $error = false;
            if (!$obj->has_column( 'rev_type' ) || ( $obj->has_column( 'rev_type' ) &&
                $obj->rev_type == 0 ) ) {
                $original = clone $obj;
                $rebuild = true;
                if ( isset( $status_published ) && $obj->has_column( 'status' ) ) {
                    $orig_status = (int) $obj->status;
                    if ( $orig_status !== $status_published ) {
                        $rebuild = false;
                    } else if ( $obj->_model == 'asset' ) {
                        if (! $app->publish_callbacks ) {
                            $rebuild = false;
                        }
                    } else {
                        $obj = $db->model( $obj->_model )->load( (int) $obj->id );
                        $obj->status( 1 );
                        $obj->save();
                        $original->status( $status_published );
                    }
                } else if ( $obj->_model == 'log' ) {
                    $rebuild = false;
                }
                if ( $rebuild ) {
                    $app->publish_obj( $obj, $original, true );
                }
                if ( count( $objects ) > 1 ) {
                    if ( isset( $status_published ) ) {
                        if ( $obj->status == $status_published ) {
                            $remove_objects[] = $obj;
                        }
                    } else {
                        $remove_objects[] = $obj;
                    }
                }
            }
            if (! $app->remove_async ) {
                $db->begin_work();
                $app->txn_active = true;
            }
            $app->remove_object( $obj, $table, $error );
            if (! $app->remove_async ) {
                if ( $error ) {
                    return $app->rollback( $errstr );
                } else {
                    $db->commit();
                    $app->txn_active = false;
                }
            }
            $i++;
            if ( $model !== 'log' ) {
                $nickname = $app->user()->nickname;
                $label = $app->translate( $table->label );
                $primary = $table->primary;
                $name = $primary ? $obj->$primary : '';
                $params = [ $label, $name, $obj->id, $nickname ];
                $message = $app->translate(
                    "%1\$s '%2\$s(ID:%3\$s)' deleted by %4\$s.", $params );
                $app->log( ['message'   => $message,
                            'category'  => 'delete',
                            'model'     => $table->name,
                            'object_id' => $obj->id,
                            'level'     => 'info'] );
            }
            $callback = ['name' => 'post_delete', 'table' => $table, 'model' => $model ];
            if ( $model == 'table' ) {
                $callback['scheme'] = $tableScheme;
            }
            $app->run_callbacks( $callback, $model, $obj, $original );
        }
        $db->flush_queries();
        $db->update_multi = false;
        if ( is_array( $objects ) && count( $objects ) > 1 ) {
            $published_on_request = [];
            $rebuilt = 0;
            foreach ( $remove_objects as $obj ) {
                if ( isset( $status_published ) ) {
                    $orig_status = (int) $obj->status;
                    if ( $orig_status !== $status_published ) {
                        continue;
                    }
                }
                $terms = ['model' => $obj->_model, 'container' => $obj->_model ];
                $extra = '';
                if ( $obj->has_column( 'workspace_id' ) ) {
                    $map = $db->model( 'urlmapping' )->new();
                    $extra = ' AND ' . $map->_colprefix . 'workspace_id';
                    $ws_id = $obj->workspace_id;
                    if ( $ws_id ) {
                        $extra .= " IN (0,{$ws_id})";
                    } else {
                        $extra .= '=0';
                    }
                }
                if ( $obj->_model === 'template' ) {
                    unset( $terms['container'] );
                }
                $mappings = $db->model( 'urlmapping' )->load(
                    $terms, ['and_or' => 'OR'], '*', $extra );
                if ( $app->workspace() && empty( $mappings ) ) {
                    break;
                }
                foreach ( $mappings as $mapping ) {
                    if ( $obj->_model === 'template' ) {
                        if ( $obj->id != $mapping->template_id ) {
                            continue;
                        }
                    }
                    $original = clone $obj;
                    if ( isset( $status_published ) ) {
                        $obj->status( 1 );
                        $original->status( $status_published );
                    }
                    $app->publish_dependencies( $obj, $original,
                                                $mapping, true, $published_on_request );
                }
                $rebuilt++;
            }
        }
        if ( $app->remove_async ) {
            if ( isset( $app->remove_objects[ $model ] ) ) {
                $remove_objects = $app->remove_objects[ $model ];
                if (! empty( $remove_objects ) ) {
                    if ( $model == 'urlinfo' || $model == 'urlmapping' ) {
                    } else if ( $db->model( $model )->remove_multi( $remove_objects ) ) {
                        unset( $app->remove_objects[ $model ] );
                    } else {
                        if ( $delete_in_async ) {
                            $app->log( ['message'  => $errstr,
                                        'category' => 'delete',
                                        'model'    => $model,
                                        'md5'      => md5( $request_id ),
                                        'level'    => 'error'] );
                            exit();
                        } else {
                            return $app->error( $errstr );
                        }
                    }
                }
            }
        }
        if ( $hierarchy ) {
            return;
        }
        if (! $delete_in_async ) {
            $count = $app->param( 'count_object' )
                   ? $app->param( 'count_object' ) : count( $objects );
            if ( $return_url = $app->param( '_query_string' ) ) {
                $return_url = urldecode( $return_url );
                if ( strpos( $return_url, 'does_act=1' ) !== false ) {
                    $return_url .= "&apply_actions={$count}";
                }
                $app->redirect( $app->admin_url . "?deleted={$count}&" . $return_url
                    . $app->workspace_param, true );
            } else {
                $app->redirect( $app->admin_url .
                "?__mode=view&_type=list&_model={$model}&deleted={$count}" . $app->workspace_param, true );
            }
        }
    }

    function post_delete_meta ( $cb, $app, $obj, $meta_objs ) {
        $attachment_ids = [];
        foreach ( $meta_objs as $meta ) {
            if ( $meta->to_obj == 'attachmentfile' ) {
                $attachment_ids[] = (int) $meta->to_id;
            }
        }
        if (! empty( $attachment_ids ) ) {
            $attachmentfiles = $app->db->model( 'attachmentfile' )->load(
                                ['id' => ['in' => $attachment_ids ] ] );
            if ( $attachmentfiles && ! empty( $attachmentfiles ) ) {
                $table = $app->get_table( 'attachmentfile' );
                $label = $app->translate( $table->label );
                $errstr = $app->translate( 'An error occurred while deleting %s.', $label );
                if ( $app->publish_callbacks ) {
                    $ctx = $app->ctx;
                    $cb_unlink = true;
                    $app->init_callbacks( 'blob', 'start_publish' );
                    $callback = ['name' => 'start_publish', 'model' => 'blob',
                                 'ctx' => $ctx, 'unlink' => $cb_unlink ];
                }
                foreach ( $attachmentfiles as $attachmentfile ) {
                    $urls = $app->db->model( 'urlinfo' )->load(
                        ['model' => 'attachmentfile', 'object_id' => $attachmentfile->id ] );
                    foreach ( $urls as $url ) {
                        if ( $app->publish_callbacks ) {
                            $original = clone $attachmentfile;
                            $callback['object'] = $attachmentfile;
                            $callback['original'] = $original;
                            $callback['urlinfo'] = $url;
                            $app->run_callbacks( $callback, 'blob', $cb_unlink );
                        }
                        $url->remove();
                    }
                    $error = '';
                    $app->remove_object( $attachmentfile, $table, $error, true, true );
                    if ( $error ) {
                        return $app->error( $errstr );
                    }
                }
            }
        }
    }

    function post_delete_ts_job ( $cb, $app, $obj ) {
        $queues = $app->db->model( 'queue' )->load( ['ts_job_id' => $obj->id ], [], 'id' );
        $app->db->model( 'queue' )->remove_multi( $queues );
    }

    function post_delete_asset ( $cb, $app, $obj ) {
        $search = $app->db->escape_like( ':' . $obj->id . ':', true, true );
        $field_type_asset = $app->field_type_asset
                          ? explode( ',', $app->field_type_asset ) : ['asset', 'assets', 'image', 'images', 'video', 'videos'];
        $fields = $app->db->model( 'meta' )->load(
                  ['kind' => 'customfield', 'type' => ['IN' => $field_type_asset ] , 'data' => ['LIKE' => $search ] ] );
        if (! empty( $fields ) ) {
            foreach ( $fields as $field ) {
                $data = $field->data;
                if ( $data === ':' . $obj->id . ':' ) {
                    $field->remove();
                } else {
                    $existing = [];
                    $first = null;
                    $ids = explode( ':', $data );
                    $text = json_decode( $field->text, true );
                    foreach ( $ids as $id ) {
                        if ( $id != $obj->id ) {
                            if (! $first ) $first = $id;
                            $existing[] = $id;
                        }
                    }
                    $key = key( $text );
                    $value = $text[ $key ];
                    $field->value( $first );
                    $data = implode( ':', $existing );
                    $data = str_replace( '::', ':', $data );
                    $field->data( $data );
                    $existing = array_filter( $existing, 'strlen' );
                    $text = [ $key => array_values( $existing ) ];
                    $field->text( json_encode( $text ) );
                    $field->save();
                }
            }
        }
        return true;
    }

    function remove_object ( $obj, $table = null, &$error = false,
        $attachments = true, $force_remove = false ) {
        if (! $obj->id ) {
            $error = true;
            return;
        }
        $app = $this;
        $db = $app->db;
        $db->update_multi = true;
        if (! $table ) $table = $app->get_table( $obj->_model );
        if ( $app->leave_revisions && $table->revisable && !$obj->rev_type ) {
            $obj->rev_type( 1 );
            $obj->rev_object_id( $obj->id );
            return $obj->save();
        }
        $class = $table->name;
        if ( prototype_auto_loader( $class ) ) {
            new $class();
        }
        $model = $obj->_model;
        if ( $model == 'workspace' ) {
            $upgrader = new PTUpgrader;
            $table = $upgrader->set_workspace_children( $app );
        }
        if ( $force_remove ) {
            $remove_async = false;
        } else {
            $remove_async = $app->remove_async;
        }
        if ( $remove_async ) {
            $app->remove_objects['__table'] = $table;
        }
        $meta_objs = $db->model( 'meta' )->load(
            ['model' => $model, 'object_id' => $obj->id ], null, 'id' );
        if (! empty( $meta_objs ) ) {
            if ( $remove_async ) {
                $app->remove_objects['meta'] =
                    isset( $app->remove_objects['meta'] )
                    ? array_merge( $app->remove_objects['meta'], $meta_objs ) : $meta_objs;
            } else {
                if (!$db->model( 'meta' )->remove_multi( $meta_objs ) ) {
                    $error = true;
                    return;
                }
            }
        }
        if ( $model !== 'urlinfo' && (! $obj->has_column( 'rev_type' ) || ! $obj->rev_type ) ) {
            if ( prototype_auto_loader( 'urlinfo' ) ) {
                new urlinfo;
            }
            $url_objs = $db->model( 'urlinfo' )->load( ['model' => $model, 'object_id' => $obj->id ],
                                                        null, 'id,file_path,was_published' );
            if ( $model === 'urlmapping' || $model === 'template' ) {
                $urlinfo = new urlinfo();
                $map_ids = [];
                if ( $model === 'urlmapping' ) {
                    $map_ids[] = $obj->id;
                } else {
                    $maps = $db->model( 'urlmapping' )->load(
                        ['template_id' => $obj->id ], null, 'id' );
                    foreach ( $maps as $map ) {
                        $map_ids[] = $map->id;
                    }
                }
                if (! empty( $map_ids ) ) {
                    $_url_objs = $db->model( 'urlinfo' )->load(
                        ['urlmapping_id' => ['IN' => $map_ids ] ], null, 'id,file_path' );
                    $url_objs = array_merge( $url_objs, $_url_objs );
                }
            }
            if ( $remove_async ) {
                $app->remove_objects['urlinfo'] = 
                    isset( $app->remove_objects['urlinfo'] )
                    ? array_merge( $app->remove_objects['urlinfo'], $url_objs ) : $url_objs;
            } else {
                foreach ( $url_objs as $ui ) {
                    if (!$ui->remove() ) {
                        $error = true;
                        return;
                    }
                }
            }
        }
        $children = $table->child_tables ? explode( ',', $table->child_tables ) : [];
        if ( count( $children ) ) {
            $_children = [];
            $child_removed = false;
            foreach ( $children as $child ) {
                if ( $child == 'log' ) continue;
                $sth = null;
                $tables = $db->show_tables( $child );
                if ( is_array( $tables ) && count( $tables ) ) {
                    if (! $db->model( $child )->has_column( $model . '_id' ) ) {
                        $app->get_scheme_from_db( $child );
                    }
                    if ( $db->model( $child )->has_column( $model . '_id' ) ) {
                        $child_objs = $db->model( $child )->load(
                            [ $model . '_id' => $obj->id ] );
                        $child_table = $app->get_table( $child );
                        $_child_objs = [];
                        foreach ( $child_objs as $child_obj ) {
                            if ( $child_table ) {
                                $app->remove_object( $child_obj, $child_table, $error );
                            } else {
                                $_child_objs[] = $child_obj;
                            }
                        }
                        if (! empty( $_child_objs ) ) {
                            if (! $db->model( $child )->remove_multi( $_child_objs ) ) {
                                $error = true;
                                return;
                            }
                        }
                        $_children[] = $child;
                    }
                } else {
                    $child_removed = true;
                }
            }
            if ( $child_removed ) {
                $_children = implode( ',', $_children );
                if ( $table->child_tables != $_children ) {
                    $table->child_tables( $_children );
                    $table->save();
                }
            }
        }
        $relations = $db->model( 'relation' )->load(
            ['from_obj' => $model, 'from_id' => $obj->id ], null,
            'id,to_obj,to_id' );
        if (! empty( $relations ) ) {
            if (!$db->model( 'relation' )->remove_multi( $relations ) ) {
                $error = true;
                return;
            } else {
                // Remove attachment files
                $callback = ['name' => 'post_delete', 'error' => '',
                             'table' => $table, 'model' => 'meta' ];
                $app->run_callbacks( $callback, 'meta', $obj, $relations );
                if ( $callback['error'] ) {
                    $error = true;
                    return;
                }
            }
        }
        $relations = $db->model( 'relation' )->load(
            ['to_obj' => $model, 'to_id' => $obj->id ], null, 'id' );
        if (! empty( $relations ) ) {
            if ( $remove_async ) {
                $app->remove_objects['relation'] =
                    isset( $app->remove_objects['relation'] )
                    ? array_merge( $app->remove_objects['relation'], $relations ) : $relations;
            } else {
                if (!$db->model( 'relation' )->remove_multi( $relations ) ) {
                    $error = true;
                    return;
                }
            }
        }
        if ( $attachments ) {
            $attachment_cols = PTUtil::attachment_cols( $model );
            if (! empty( $attachment_cols ) ) {
                $attachment_ids = [];
                foreach ( $attachment_cols as $key ) {
                    if ( $obj->$key ) $attachment_ids[] = (int) $obj->$key;
                }
                if (! empty( $attachment_ids ) ) {
                    $attachmentfiles =
                        $db->model( 'attachmentfile' )->load(
                            ['id' => ['IN' => $attachment_ids ] ] );
                    if (! empty( $attachmentfiles ) ) {
                        if ( $remove_async ) {
                            $app->remove_objects['attachmentfile'] =
                                isset( $app->remove_objects['attachmentfile'] )
                                ? array_merge( $app->remove_objects['attachmentfile'], $attachmentfiles )
                                : $attachmentfiles;
                        } else {
                            $attachment_tbl = $app->get_table( 'attachmentfile' );
                            foreach ( $attachmentfiles as $attachmentfile ) {
                                $app->remove_object( $attachmentfile, $attachment_tbl, $error );
                            }
                        }
                    }
                }
            }
        }
        if ( $obj->has_column( 'rev_type' ) && ! $obj->rev_type && !$app->leave_revisions ) {
            $cols = 'id';
            if (! empty( $attachment_cols ) ) {
                $cols .= ',' . implode( ',', $attachment_cols );
            }
            $revisions = $db->model( $model )->load(
                ['rev_object_id' => $obj->id ], null, $cols );
            if (! empty( $revisions ) ) {
                if ( $remove_async ) {
                    $app->remove_objects['revisions'] =
                        isset( $app->remove_objects['revisions'] )
                        ? array_merge( $app->remove_objects['revisions'], $revisions )
                        : $revisions;
                } else {
                    foreach ( $revisions as $rev ) {
                        $app->remove_object( $rev, $table, $error );
                    }
                }
            }
        }
        if ( $table->allow_comment ) {
            $comments = $db->model( 'comment' )->load(
              ['object_id' => $obj->id, 'model' => $model ], null, 'id' );
            if (! empty( $comments ) ) {
                if ( $remove_async ) {
                    $app->remove_objects['comment'] =
                        isset( $app->remove_objects['comment'] )
                        ? array_merge( $app->remove_objects['comment'], $comments )
                        : $comments;
                } else {
                    if (!$db->model( 'comment' )->remove_multi( $comments ) ) {
                        $error = true;
                        return;
                    }
                }
            }
        }
        if ( $table->hierarchy ) {
            if (! $obj->has_column( 'parent_id' ) ) {
                $app->get_scheme_from_db( $model );
            }
            $children = $db->model( $model )->load( ['parent_id' => $obj->id ] );
            $_children = [];
            foreach ( $children as $child ) {
                $child->parent_id( $obj->parent_id );
                $_children[] = $child;
            }
            if (! empty( $_children ) ) {
                if (!$db->model( $model )->update_multi( $_children ) ) {
                    $error = true;
                    return;
                }
            }
        }
        if ( $remove_async && $app->mode != 'delete' ) {
            if (! isset ( $app->remove_objects[ $model ] ) ) {
                $app->remove_objects[ $model ] = [];
            }
            $app->remove_objects[ $model ][] = $obj;
            return true;
        } else {
            $res = $obj->remove();
            $app->db->clear_query( $obj->_model, $obj->id );
            if (!$res ) $error = true;
        }
        return $res;
    }

    function return_to_dashboard ( $options = [], $system = false ) {
        $workspace = $this->workspace();
        $url = $this->script_uri . "?__mode=dashboard";
        if (! empty( $options ) ) $url .= '&' . http_build_query( $options );
        if ( $workspace && ! $system ) {
            $this->redirect( $url . '&workspace_id=' . $workspace->id );
        }
        $this->redirect( $url );
    }

    function workspace () {
        if ( $this->stash( 'workspace' ) ) return $this->stash( 'workspace' );
        if ( $id = $this->param( 'workspace_id' ) ) {
            $id = (int) $id;
            if (!$id ) return null;
            $cache_key = 'workspace' . DS . $id . DS . 'object__c';
            if ( $workspace = $this->get_cache( $cache_key, 'workspace' ) ) {
                if ( property_exists( $workspace, 'id' ) ) {
                    $this->stash( 'workspace', $workspace );
                    return $workspace;
                }
            }
            $workspace = $this->db->model( 'workspace' )->load( $id );
            $this->stash( 'workspace', $workspace );
            $this->set_cache( $cache_key, $workspace );
            return $workspace ? $workspace : null;
        }
        return null;
    }

    function get_table ( $model ) {
        $app = $this;
        if ( $app->stash( 'table:' . $model ) ) {
            return $app->stash( 'table:' . $model );
        }
        $caching = $app->caching;
        $app->caching = true;
        $cache_key = $model . DS . 'properties__c';
        if ( $table = $app->get_cache( $cache_key, 'table' ) ) {
            $app->stash( 'table:' . $model, $table );
            $app->caching = $caching;
            return $table;
        }
        $app->caching = $caching;
        if (! isset( $app->db->scheme['table'] ) ) {
            $app->db->model('table')->set_scheme_from_json( 'table' );
        } else if (! isset( $app->db->scheme['table']['column_defs']['name'] ) ) {
            $app->db->scheme['table']['column_defs']['name']
                    = ['type' => 'string', 'not_null' => 1, 'size' => 50];
        }
        $table = $app->db->model( 'table' )->load( ['name' => $model ], ['limit' => 1] );
        if ( is_array( $table ) && !empty( $table ) ) {
            $table = $table[0];
            $app->set_cache( $cache_key, $table, true );
            $app->stash( 'table:' . $model, $table );
            return $table;
        }
        return null;
    }

    function set_cache ( $id, $data = [], $force = false, $file = false ) {
        $app = $this;
        if (! $app->caching && ! $force ) return;
        if ( strpos( $id, '../' ) !== false || strpos( $id, '..\\' ) !== false ) {
            return $this->error( 'Invalid request.' );
        }
        unset( $app->casket[ $id ] );
        if ( is_object( $data ) ) {
            $model = $data->_model;
            $data = $data->get_values();
            $blob_cols = $app->db->get_blob_cols( $model );
            if (! empty( $blob_cols ) ) {
                foreach ( $blob_cols as $blob_col ) {
                    if ( isset( $data[ $blob_col ] ) && $data[ $blob_col ] ) {
                        $data[ $blob_col ] = base64_encode( $data[ $blob_col ] );
                    }
                }
            }
        }
        if ( is_array( $data ) && isset( $data[0] ) && is_object( $data[0] ) ) {
            $_data = [];
            foreach ( $data as $obj ) {
                $_data[] = $obj->get_values();
            }
            $data = $_data;
            unset( $_data );
        }
        $driver = $app->cache_driver;
        if ( is_object( $driver ) && !$file ) {
            return $driver->set( $id, $data, $app->cache_expires );
        }
        $code = var_export( $data, true );
        $code = '<?php $this->get_cache=' . $code . ';';
        $cache_path = $app->cache_dir . $id . '.php';
        $old_level = error_reporting();
        error_reporting( 0 );
        if (! is_dir( dirname( $cache_path ) ) ) {
            @mkdir( dirname( $cache_path ), 0777, true );
        } else if ( file_exists( $cache_path ) ) {
            @unlink( $cache_path );
        }
        if ( @file_put_contents( "{$cache_path}.tmp", $code, LOCK_EX ) ) {
            if (! @rename( "{$cache_path}.tmp", $cache_path ) ) {
                @unlink( "{$cache_path}.tmp" );
                error_reporting( $old_level );
                return;
            }
            if ( function_exists( 'opcache_reset' ) && file_exists( $cache_path ) ) {
                @include_once( $cache_path );
            }
            error_reporting( $old_level );
            return true;
        }
        error_reporting( $old_level );
    }

    function get_cache ( $id, $model = null, $multiple = false, $ttl = null, $file = false ) {
        if (! $this->caching && $model !== true ) return;
        if ( $this->use_casket && isset( $this->casket[ $id ] ) ) {
            return is_bool( $this->casket[ $id ] ) ? null : $this->casket[ $id ];
        } else if ( isset( $this->casket[ $id ] ) && is_bool( $this->casket[ $id ] ) ) {
            return null;
        }
        if ( strpos( $id, '../' ) !== false || strpos( $id, '..\\' ) !== false ) {
            return $this->error( 'Invalid request.' );
        }
        $model = $model === true ? null : $model;
        $driver = $this->cache_driver;
        if ( is_object( $driver ) && ! $file ) {
            if ( $ttl && ( $ttl < $this->request_time ) ) {
                $ttl = $this->request_time;
            }
            $objects = $ttl ? $driver->get( $id, $ttl )
                            : $driver->get( $id, $this->request_time );
            if ( $objects ) {
                $result = [];
                if ( $multiple && $model ) {
                    $objs = [];
                    foreach ( $objects as $obj ) {
                        $objs[] = $this->db->model( $model )->__new( $obj );
                    }
                    $result = $objs;
                } else {
                    if ( $model ) {
                        $blob_cols = $this->db->get_blob_cols( $model );
                        if (! empty( $blob_cols ) ) {
                            foreach ( $blob_cols as $blob_col ) {
                                if ( isset( $objects[ $blob_col ] ) && $objects[ $blob_col ] ) {
                                    $objects[ $blob_col ] = base64_decode( $objects[ $blob_col ] );
                                }
                            }
                        }
                    }
                    $result = $model ? $this->db->model( $model )->__new( $objects ) : $objects;
                }
                if ( $this->use_casket ) {
                    $this->casket[ $id ] = $result;
                }
                return $result;
            }
            $this->casket[ $id ]  = true;
            return null;
        }
        $expires = $ttl ? $ttl : $this->request_time - $this->cache_expires;
        $cache_path = $this->cache_dir . $id . '.php';
        $old_level = error_reporting();
        error_reporting( 0 );
        if ( @file_exists( $cache_path ) && @filemtime( $cache_path ) > $expires ) {
            @include( $cache_path );
            $data = $this->get_cache;
            if (! $data ) {
                $this->casket[ $id ]  = true;
                error_reporting( $old_level );
                return null;
            }
            if ( $multiple && $model ) {
                $objs = [];
                foreach ( $data as $obj ) {
                    $objs[] = $this->db->model( $model )->__new( $obj );
                }
                $this->get_cache = null;
                error_reporting( $old_level );
                $result = $objs;
                return $objs;
            } else {
                $this->get_cache = null;
                error_reporting( $old_level );
                if ( $model ) {
                    $blob_cols = $this->db->get_blob_cols( $model );
                    if ( is_array( $blob_cols ) &&! empty( $blob_cols ) ) {
                        foreach ( $blob_cols as $blob_col ) {
                            if ( isset( $data[ $blob_col ] ) && $data[ $blob_col ] ) {
                                $data[ $blob_col ] = base64_decode( $data[ $blob_col ] );
                            }
                        }
                    }
                }
                $result = $model ? $this->db->model( $model )->__new( $data ) : $data;
            }
            if ( $this->use_casket ) {
                $this->casket[ $id ] = $result;
            }
            return $result;
        }
        $this->casket[ $id ]  = true;
        error_reporting( $old_level );
    }

    function clear_cache ( $id, $realtime = false ) {
        if (! $id ) {
            return $this->clear_all_cache( false, false );
        }
        unset( $this->casket[ $id ] );
        $driver = $this->cache_driver;
        if ( is_object( $driver ) ) {
            $_prefix = $driver->_prefix;
            $cache_key = $_prefix . $id;
            if ( strpos( $id, DS ) !== false ) {
                $keys = $driver->getAllKeys();
                if ( $keys === false ) {
                    if ( $realtime ) {
                        return $driver->flush( null, true );
                    } else {
                        return $driver->flush(); // At __destruct.
                    }
                }
                foreach ( $keys as $key ) {
                    if ( strpos( $key, $cache_key ) === 0 ) {
                        $driver->delete( $key, true );
                    }
                }
                return true;
            } else {
                return $driver->delete( $id );
            }
        }
        $old_level = error_reporting();
        error_reporting( 0 );
        $cache_path = $this->cache_dir . $id;
        $res = null;
        if ( is_dir( $cache_path ) ) {
            $cache_path = rtrim( $cache_path, DS );
            $res = PTUtil::remove_dir( $cache_path );
        } else if ( @file_exists( $cache_path ) ) {
            $res = @unlink( $cache_path );
        } else if ( @file_exists( $cache_path . '.php' ) ) {
            $res = @unlink( $cache_path . '.php' );
        }
        error_reporting( $old_level );
        return $res;
    }

    function clear_all_cache ( $db_cache = true, $workspace_id = null, $realtime = null ) {
        $this->stash = [];
        $this->casket = [];
        $driver = $this->cache_driver;
        if ( is_object( $driver ) ) {
            $_prefix = $driver->_prefix;
            $keys = $driver->getAllKeys();
            if ( is_array( $keys ) ) {
                foreach ( $keys as $key ) {
                    if ( strpos( $key, $_prefix ) === 0 ) {
                        $driver->delete( $key, true );
                    }
                }
            } else if ( method_exists( $driver, 'flush' ) ) {
                if ( $realtime ) {
                    $driver->flush( null, true );
                } else {
                    $driver->flush();
                }
            }
        }
        if ( $this->cache_dir && is_dir( $this->cache_dir ) ) {
            PTUtil::remove_dir( $this->cache_dir, true );
        }
        if ( $this->compile_dir && is_dir( $this->compile_dir ) ) {
            PTUtil::remove_dir( $this->compile_dir, true );
            if ( $workspace_id !== false && $this->installed ) {
                $this->re_compile();
            }
        }
        if ( $this->db_cache_dir && is_dir( $this->db_cache_dir ) ) {
            PTUtil::remove_dir( $this->db_cache_dir, true );
        }
        if ( $db_cache ) {
            $terms = ['rev_type' => 0];
            if ( $workspace_id !== null && is_numeric( $workspace_id ) ) {
                $terms['workspace_id'] = $workspace_id;
            }
            $templates =
                $this->db->model( 'template' )->load( $terms, [], 'id' );
            $this->save_objects['template'] = $templates;
            unset( $terms['rev_type'] );
            $urlmappings =
                $this->db->model( 'urlmapping' )->load( $terms, [], 'id' );
            $this->save_objects['urlmapping'] = $urlmappings;
        }
        if ( function_exists( 'opcache_reset' ) ) {
            opcache_reset();
        }
    }

    function re_compile ( $tmpl = null ) {
        $param = [];
        $cache_id = null;
        $src = null;
        $this->init_tags( true );
        $force_compile = $this->ctx->force_compile;
        $this->ctx->force_compile = false;
        $re_compiled = $tmpl ? [ $tmpl ] : ['list', 'edit', 'dashboard', 'hierarchy', 'login'];
        foreach ( $re_compiled as $basename ) {
            $path = $this->ctx->get_template_path( "{$basename}.tmpl" );
            if (! $path ) continue;
            ob_start();
            $this->ctx->build_page( $path, $param, $cache_id, false, $src );
            ob_end_clean();
        }
        $this->ctx->force_compile = $force_compile;
    }

    function clear_compiled ( $tmpl ) {
        $tmpl = $this->ctx->get_template_path( $tmpl );
        $key = md5( $tmpl );
        $compile_dir = $this->compile_dir;
        $compiled = $this->ctx->prefix . '__' . $key . '.php';
        if ( file_exists( $compile_dir . $compiled ) ) {
            @unlink( $compile_dir . $compiled );
        }
        $pathinfo = pathinfo( $tmpl, PATHINFO_FILENAME );
        if ( $pathinfo ) {
            $this->clear_cache( 'alt-tmpl' . DS . $pathinfo );
        }
        $this->re_compile( $tmpl );
    }

    function save_filter_obj ( $cb, $pado, &$obj ) {
        if ( $obj->has_column( 'workspace_id' ) && !$obj->workspace_id
            && isset( $values['workspace_id'] ) ) {
            $obj->workspace_id( 0 );
        }
        if ( $obj->_model == 'ts_job' && !$obj->status ) {
            $obj->status( 2 );
        }
        if (!$obj->has_column( 'uuid' ) && !$obj->has_column( 'workspace_id' ) ) {
            return true;
        } else if ( ( $obj->has_column( 'uuid' ) && $obj->uuid )
            && ( $obj->has_column( 'workspace_id' ) && $obj->workspace_id ) ) {
            return true;
        }
        $values = $obj->get_values( true );
        if ( $obj->has_column( 'uuid' ) && !$obj->uuid
            && isset( $values['uuid'] ) ) {
            $obj->uuid( $this->generate_uuid( $obj->_model ) );
        }
        return true;
    }

    function generate_uuid ( $model = null, $counter = 0 ) {
        $uuid = sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand( 0, 0xffff ), 
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0xffff ),
            mt_rand( 0, 0x0fff ) | 0x4000,
            mt_rand( 0, 0x3fff ) | 0x8000,
            mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
        );
        if ( $model ) {
            $_uuid = $this->db->quote( $uuid );
            $extra = ( " AND {$model}_uuid={$_uuid} LIMIT 1" );
            $count = $this->db->model( $model )->count( [], null, 'id', $extra );
            if ( $count ) {
                $counter++;
                if ( $counter > 4 ) {
                    return $uuid;
                }
                usleep( 50 );
                return $this->generate_uuid( $model, $counter );
            }
        }
        return $uuid;
    }

    function flush_cache ( $cb, $pado, $obj ) {
        if ( in_array( $obj->_model, $this->not_cache ) ) {
            return true;
        }
        $sessions = $pado->model( 'session' )->load( ['key' => ['IS NOT NULL' => 1],
        'kind' => 'CH', 'user_id' => ['IN' => [-1, -2] ] ], null, 'id,name,text,user_id,object_id' );
        $remove_sessions = [];
        foreach ( $sessions as $session ) {
            // Clear Module Cache.
            if ( $obj->_model === 'template' && $obj->id == $session->object_id ) {
                $remove_sessions[] = $session;
                continue;
            }
            $triggers = $session->text;
            if (! $triggers || stripos( $triggers, $obj->_model ) === false ) {
                continue;
            }
            $triggers = explode( ',', strtolower( $triggers ) );
            if ( $session->user_id == -1 ) {
                if ( in_array( $obj->_model, $triggers ) ) {
                    $remove_sessions[] = $session;
                }
            } else {
                if ( $session->name == $obj->_model . '_' . $obj->id ) {
                    $remove_sessions[] = $session;
                }
            }
        }
        if (!empty( $remove_sessions ) ) {
            $pado->model( 'session' )->remove_multi( $remove_sessions );
        }
        $this->clear_cache( $obj->_model . DS . $obj->id . DS );
        $app_version = $this->app_version;
        $app_version = preg_replace( '/\..*$/', '', $app_version );
        if ( $app_version >= 3 && $this->api_caching && $obj->_model !== 'api_cache' ) {
            $table = $this->db->model( 'table' )->load( ['name' => 'api_cache'], ['limit' => 1], 'id' );
            if ( !empty( $table ) ) {
                $this->api_truncate = true;
            }
        }
        return true;
    }

    function get_object ( $model, $required = [], $all_selected = true ) {
        $app = $this;
        if (!$model ) $model = $app->param( '_model' );
        $db = $app->db;
        $obj = $db->model( $model )->new();
        $scheme = $app->get_scheme_from_db( $model );
        $table = $app->get_table( $model );
        if (!$scheme ) return null;
        $primary = $scheme['indexes']['PRIMARY'];
        $objects = [];
        if ( is_array( $required ) && empty( $required ) ) {
            $required = [];
            $required[] = 'id';
            if ( $model === 'urlinfo' ) {
                $required[] = 'url';
                $required[] = 'is_published';
                $required[] = 'was_published';
                $required[] = 'file_path';
                $required[] = 'delete_flag';
            } else if ( $model === 'table' ) {
                $required[] = 'name';
            } else if ( $model === 'urlmapping' ) {
                $required[] = 'model';
            } else if ( $model == 'comment' ) {
                $required[] = 'model';
                $required[] = 'object_id';
            }
            if ( $table && $table->has_basename && $obj->has_column( 'basename' ) ) {
                $required[] = 'basename';
            }
            if ( $table && $table->hierarchy && $obj->has_column( 'parent_id' ) ) {
                $required[] = 'parent_id';
            }
            if ( $table && $table->revisable && $obj->has_column( 'rev_type' ) ) {
                $required[] = 'rev_type';
            }
            if ( $table && $table->has_status && $obj->has_column( 'status' ) ) {
                $required[] = 'status';
            }
            if ( $table && $table->sortable && $obj->has_column( 'order' ) ) {
                $required[] = 'order';
            }
            if ( $table && $table->primary ) {
                $required[] = $table->primary;
            }
            $attachment_cols = PTUtil::attachment_cols( $model );
            if (! empty( $attachment_cols ) ) {
                $required = array_merge( $required, $attachment_cols );
            }
        }
        if ( $required && is_string( $required ) && $required != '*' ) {
            $required = explode( ',', $required );
        }
        if ( is_array( $required ) && $model === 'asset' ) {
            $required[] = 'file_name';
            $required[] = 'extra_path';
        } else if ( is_array( $required ) && $obj->has_column( 'extra_path' ) ) {
            $required[] = 'extra_path';
        }
        if ( is_array( $required ) ) {
            // For permission check.
            if ( $obj->has_column( 'user_id' ) ) {
                $required[] = 'user_id';
            }
            if ( $obj->has_column( 'created_by' ) ) {
                $required[] = 'created_by';
            }
            if ( $obj->has_column( 'workspace_id' ) ) {
                $required[] = 'workspace_id';
            }
            $required = array_unique( $required );
            $required = join( ',', $required );
        }
        $args = [];
        $filter_params = $app->param( 'filter_params' );
        $user_session = $app->user_session;
        if (! $user_session ) {
            return $app->error( 'Invalid request.' );
        }
        $encrypted_filters = explode( ',', $user_session->text );
        if ( $filter_params && ! in_array( md5( $filter_params ), $encrypted_filters ) ) {
            return $app->error( 'Invalid request.' );
        }
        $filter_params = $filter_params ? json_decode( $app->decrypt( $filter_params ), true ) : [];
        // Saved sort settings.
        $args = $filter_params['args'] ?? [];
        if ( $app->param( 'all_selected' ) && $all_selected ) {
            $terms = $filter_params['terms'];
            $extra = $filter_params['extra'];
            $original = "'{$extra}'";
            $quoted = $db->quote( $extra );
            if ( $original != $quoted ) {
                return $app->error( 'Invalid request.' );
            }
            if ( $model === 'urlinfo' ) {
                $terms['delete_flag'] = ['IN' => [0, 1] ];
            }
            $app->get_object_cols = $required;
            if ( $max_batch_actions = (int) $app->max_batch_actions ) {
                $args['limit'] = $max_batch_actions;
            }
            $objects = $obj->load( $terms, $args, $required, $extra );
            $perm = $app->mode === 'delete' ? 'delete' : 'edit';
            if (! $app->user()->is_superuser ) {
                $changed = false;
                foreach ( $objects as $idx => $obj ) {
                    if (! $app->can_do( $model, $perm, $obj ) ) {
                        unset( $objects[ $idx ] );
                        $changed = true;
                    }
                }
                if ( $changed ) {
                    $objects = array_values( $objects );
                }
            }
            return $objects;
        } else {
            $id = $app->param( 'id' );
            if ( $ids = $app->param( 'ids' ) ) {
                $id = explode( ',', $ids );
            }
            if ( is_array( $id ) ) {
                if ( empty( $id ) ) {
                    return [];
                }
                array_walk( $id, function( &$id ) {
                    $id = (int) $id;
                });
                $terms = ['id' => ['IN' => $id ] ];
                if ( $model === 'urlinfo' ) {
                    $terms['delete_flag'] = ['IN' => [0, 1] ];
                }
                $app->get_object_cols = $required;
                $objects = $obj->load( $terms, $args, $required );
                return $objects;
            } else if ( $id ) {
                if ( $app->stash( $model . ':' . $id ) ) 
                    return $app->stash( $model . ':' . $id );
                $id = (int) $id;
                $obj = $obj->load( $id );
                if ( is_object( $obj ) )
                    $app->stash( $model . ':' . $id, $obj );
            }
            return isset( $obj ) ? $obj : null;
        }
        return [];
    }

    function forward ( $model, $error = '', $obj = null ) {
        $app = $this;
        $ctx = $app->ctx;
        $ctx->vars['error'] = $error;
        if ( $app->param( '_apply_to_master' ) && $app->param( '_revision_id' ) ) {
            $revision_id = $app->param( '_revision_id' );
            $app->param( 'id', $revision_id );
            $_REQUEST['id'] = $revision_id;
        }
        if ( $app->param( '_type' ) === 'edit' || $app->mode === 'save' ) {
            $app->assign_params( $app, $ctx, $obj );
            $ctx->vars['forward_params'] = 1;
            return $app->view( $app, $model, 'edit' );
        }
        return $app->view( $app, $model, 'list' );
    }

    function pre_listing_workflow ( &$cb, $app, &$terms, &$args, &$extra ) {
        $users = $app->db->model( 'user' )->load( ['status' => 2, 'lockout' => 0], null, 'id,is_superuser' );
        if ( empty( $users ) ) {
            $terms = ['id' => 0];
            return;
        }
        $wf_model = $app->param( 'workflow_model' );
        $wf_type = $app->param( 'workflow_type' );
        $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
        $user_ids = [];
        foreach ( $users as $user ) {
            $group_name = $app->permission_group( $user, $wf_model, $workspace_id );
            if ( $wf_type == 'draft' && $group_name == 'creator' ) {
                $user_ids[] = $user->id;
            } else if ( $wf_type == 'review' && $group_name == 'reviewer' ) {
                $user_ids[] = $user->id;
            } else if ( $wf_type == 'publish' && $group_name == 'publisher' ) {
                $user_ids[] = $user->id;
            } else if ( $group_name && $wf_type == 'all' ) {
                $user_ids[] = $user->id;
            }
        }
        if ( empty( $user_ids ) ) {
            $terms = ['id' => 0];
            return;
        } else {
            if ( isset( $terms['id'] ) ) {
                $extra .= " AND user_id IN (" . implode( ',', $user_ids ) . ')';
            } else {
                $terms = ['id' => ['in' => $user_ids ] ];
            }
            return;
        }
    }

    function permission_group ( $user, $model, $workspace = 0 ) {
        if ( $user->is_superuser ) return 'publisher';
        if ( is_object( $workspace ) ) $workspace = $workspace->id;
        $app = $this;
        $perms = $app->permissions( $user );
        if ( isset( $perms[ $workspace ] ) ) {
            $perm = $perms[ $workspace ];
            $ws_admin = in_array( 'workspace_admin', $perm )
                      ? true : false;
            if ( $ws_admin || $user->is_superuser
                || in_array( "can_activate_{$model}", $perm ) ) {
                return 'publisher';
            } else if ( in_array( "can_review_{$model}", $perm ) ) {
                return 'reviewer';
            } else if ( in_array( "can_create_{$model}", $perm )
                || in_array( "can_update_own_{$model}", $perm )
                || in_array( "can_update_all_{$model}", $perm ) ) {
                return 'creator';
            }
        }
        return null;
    }

    function pre_listing ( &$cb, $app, &$terms, &$args, &$extra = '', &$ex_vals = [] ) {
        if ( !$app->force_filter && ( $app->mode == 'rebuild_phase' || $app->mode == 'save' ) ) return true;
        $model = isset( $cb['model'] )
               ? $cb['model'] : $app->param( '_model' );
        $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
        $op_map = ['gt' => '>', 'lt' => '<', 'eq' => '=', 'ne' => '!=', 'ge' => '>=',
                   'le' => '<=', 'ct' => 'LIKE', 'nc' => 'NOT LIKE', 'bw' => 'LIKE',
                   'ew' => 'LIKE'];
        $user_id = $app->user() ? $app->user()->id : 0;
        $filter_primary = ['key' => $model, 'workspace_id' => $workspace_id,
                           'kind' => 'list_filter_primary'];
        $primary = $app->db->model( 'option' )->__new( $filter_primary );
        if ( $user_id && $app->id == 'Prototype' && $app->mode == 'view' ) {
            $filter_primary['user_id'] = $user_id;
            $primary = $app->db->model( 'option' )->get_by_key( $filter_primary );
            if ( $app->param( '_detach_filter' ) || $app->param( '_save_filter_name' )
                || $app->param( 'select-user_filters' == 'add_new_filter' ) ) {
                $app->param( '_filter', 0 );
                if ( $primary->id ) $primary->remove();
            } else {
                if ( $primary->id ) {
                    if (! $app->param( '_filter_id' )
                     && ! $app->param( 'select_system_filters' ) ) {
                        $app->param( '_filter', $model );
                        if ( $primary->object_id ) {
                            $app->param( '_filter_id', $primary->object_id );
                        } else if ( $primary->value == 'system_filter' ) {
                            $app->param( 'select_system_filters', $primary->extra );
                            $app->param( '_system_filters_option', $primary->data );
                        }
                    }
                }
            }
        }
        if ( $model == 'urlinfo' ) {
            $cols = '*';
        }
        $_filter = $app->param( '_filter' );
        if ( $_filter && $_filter == $model ) {
            $count_terms = is_array( $terms ) ? count( $terms ) : 1;
            $count_terms++;
            if ( $app->param( 'limit' ) ) {
                $offset = (int) $app->param( 'offset' );
                $limit = (int) $app->param( 'limit' );
                if ( $limit ) {
                    $args['offset'] = $offset;
                    $args['limit'] = $limit;
                }
            }
            $params = $app->param();
            $conditions = [];
            $scheme = $cb['scheme'];
            $table  = $cb['table'];
            $column_defs = $scheme['column_defs'];
            $list_props = $scheme['list_properties'];
            $obj = $app->db->model( $model )->new();
            $system_filter = $app->param( 'select_system_filters' );
            if ( $system_filter ) {
                $filters_option = $app->param( '_system_filters_option' );
                $filters_class = new PTSystemFilters();
                $filters = $filters_class->get_system_filters( $model, $system_filters );
                if (! isset( $filters[ $system_filter ] ) ) {
                    if ( strpos( $system_filter, 'filter_class_' ) === 0 ) {
                        $filter = [];
                        $class_type = preg_replace(
                                        '/^filter_class_/', '', $system_filter );
                        $_label = $app->translate( $class_type, null, null, 'default' );
                        $_label = $app->translate( $_label );
                        $filter['name'] = $system_filter;
                        $filter['label'] = $_label;
                        $filter['option'] = $class_type;
                        $filter['method'] = 'filter_class';
                        $filter['component'] = $filters_class;
                        $filters[ $system_filter ] = $filter;
                    }
                }
                if ( isset( $filters[ $system_filter ] ) ) {
                    $filter = $filters[ $system_filter ];
                    $app->ctx->vars['current_filter_name'] = $filter['label'];
                    $app->ctx->vars['current_system_filter'] = $filter['name'];
                    $component = $filter['component'];
                    $meth = $filter['method'];
                    if ( method_exists( $component, $system_filter ) ) {
                        $meth = $system_filter;
                    }
                    if ( method_exists( $component, $meth ) ) {
                        $option = isset( $filters_option ) ? $filters_option : '';
                        $component->$meth( $app, $terms, $model, $option, $args, $extra, $ex_vals );
                        $primary->object_id( 0 );
                        $primary->value( 'system_filter' );
                        $primary->extra( $filter['name'] );
                        $primary->data( $filters_option );
                        if (!$app->param( 'dialog_view' ) ) {
                            $primary->save();
                        }
                    }
                }
            } else {
                $_filter_id = $app->param( '_filter_id' );
                if ( $_filter_id ) $_filter_id = (int) $_filter_id;
                if ( $_filter_id ) {
                    $filter_terms = ['user_id' => $user_id,
                                     'workspace_id' => $workspace_id,
                                     'id'    => $_filter_id,
                                     'key'   => $model,
                                     'kind'  => 'list_filter'];
                    $filter = $app->db->model( 'option' )->get_by_key( $filter_terms );
                    if (!$filter->id ) {
                        $terms['id'] = 0;
                        return;
                    }
                    if ( $primary->object_id != $filter->id ) {
                        $primary->object_id( $filter->id );
                        $primary->data( $filter->data );
                        $primary->save();
                    }
                    $filter_val = $filter->data;
                    $app->ctx->vars['current_filter_id'] = $_filter_id;
                    $app->ctx->vars['current_filter_name'] = $filter->value;
                    if ( $filter_val ) {
                        $filters = json_decode( $filter_val, true );
                        foreach ( $filters as $filter => $values ) {
                            $params[ $filter ] = $values;
                        }
                    }
                }
            }
            if ( $app->param( '_filter' ) ) {
                $dbprefix = DB_PREFIX;
                $filter_params = [];
                $filter_and = false;
                $filter_add_params = [];
                $filtered_ids = [];
                if ( $_filter_and_or = $app->param( '_filter_and_or' ) ) {
                    $_filter_and_or = strtoupper( $_filter_and_or );
                    $_filter_and_or = $_filter_and_or == 'OR' ? 'OR' : 'AND';
                    $args['array_and_or'] = $_filter_and_or;
                } else {
                    $_filter_and_or = 'AND';
                }
                foreach ( $params as $key => $conds ) {
                    if ( strpos( $key, '_filter' ) === 0 ) {
                        $filter_add_params[ $key ] = $conds;
                    }
                    if ( strpos( $key, '_filter_cond_' ) === 0 ) {
                        $filter_params[ $key ] = $conds;
                        $cond = [];
                        $key = preg_replace( '/^_filter_cond_/', '', $key );
                        if ( $key == 'status' || $key == 'rev_type' ) {
                            if ( $app->id == 'Bootstrapper' ) continue;
                        }
                        $values = isset( $params['_filter_value_' . $key ] )
                                ? $params['_filter_value_' . $key ] : [];
                        if ( is_string( $values ) ) $values = [ $values ];
                        $filter_params['_filter_value_' . $key ] = $values;
                        if (! isset( $column_defs[ $key ]['type'] ) ) continue;
                        $type = $column_defs[ $key ]['type'];
                        $i = 0;
                        $_values = [];
                        if ( is_string( $conds ) ) $conds = [ $conds ];
                        foreach ( $conds as $val ) {
                            $value = isset( $values[ $i ] ) ? $values[ $i ] : null;
                            if (! isset( $op_map[ $val ] ) ) continue;
                            $op = $op_map[ $val ];
                            if ( $type == 'datetime' ) {
                                $value = $obj->ts2db( $value, true );
                            } else if ( strpos( $op, 'LIKE' ) !== false ) {
                                if ( $val === 'bw' ) {
                                    $value = $app->db->escape_like( $value, false, 1 );
                                } elseif ( $val === 'ew' ) {
                                    $value = $app->db->escape_like( $value, 1, false );
                                } else {
                                    $value = $app->db->escape_like( $value, 1, 1 );
                                }
                            }
                            $_values[] = $value;
                            $i++;
                        }
                        $values = $_values;
                        $list_type = isset( $list_props[ $key ] ) ? $list_props[ $key ] : '';
                        if ( $key == 'created_by' ) $list_type = 'reference:user:name';
                        if ( $type === 'relation' || strpos( $list_type, ':' ) !== false ) {
                            $_cond = [];
                            list( $rel_model, $rel_col ) = ['', ''];
                            if (!$list_type ) {
                                $col = $app->db->model( 'column' )->get_by_key(
                                                        ['name' => $key,
                                                         'table_id' => $table->id ] );
                                if (!$col->id ) continue;
                                $rel_model = $col->options;
                                $_table = $app->db->model( 'table' )->get_by_key(
                                                                ['name' => $rel_model ] );
                                if (!$_table->id ) continue;
                                $rel_col = $_table->primary;
                            } else {
                                $props = explode( ':', $list_type );
                                if ( count( $props ) > 2 )
                                    list( $rel_model, $rel_col ) = [ $props[1], $props[2] ];
                            }
                            if (! $rel_col && isset( $scheme['edit_properties'] )
                                && isset( $scheme['edit_properties'][ $key ] ) ) {
                                $edit_type = $scheme['edit_properties'][ $key ];
                                $props = explode( ':', $edit_type );
                                if ( count( $props ) > 2 )
                                    list( $rel_model, $rel_col ) = [ $props[1], $props[2] ];
                            }
                            if ( $rel_model == '__any__' ) {
                                if ( isset( $params['_filter_value_model'] ) ) {
                                    if ( count( $params['_filter_value_model'] ) == 1 ) {
                                        $rel_model = $params['_filter_value_model'][0];
                                        $filter_and = true;
                                        $args['and_or'] = 'AND';
                                    }
                                }
                            }
                            if (!$rel_model || ! $rel_col ) continue;
                            $rel_table = $app->get_table( $rel_model );
                            if (!$rel_table ) {
                                continue;
                            }
                            if ( $rel_col == 'null' ) {
                                $rel_col = $rel_table->primary;
                            }
                            $and_or = 'OR';
                            if (! $app->filter_relation_cols_and_or_compat ) {
                                if ( $app->id == 'Prototype' && $app->admin_filter_relation_cols_and_or ) {
                                    $and_or = $app->admin_filter_relation_cols_and_or;
                                } else {
                                    $and_or = $app->param( "_filter_and_or_{$key}" );
                                }
                            }
                            $and_or = strtoupper( (string) $and_or );
                            if ( $and_or != 'AND' ) $and_or = 'OR';
                            $rel_obj = $app->db->model( $rel_model )->new();
                            $i = 0;
                            foreach ( $conds as $val ) {
                                if (! isset( $op_map[ $val ] ) ) continue;
                                $op = $op_map[ $val ];
                                $value = $values[ $i ];
                                if ( count( $values ) > 1 ) {
                                    if (! isset( $_cond[ $and_or ] ) ) $_cond[ $and_or ] = [];
                                    $_cond[ $and_or ][] = [ $op => $value ];
                                } else {
                                    $_cond[ $op ] = $value;
                                }
                                ++$i;
                            }
                            if ( $key == 'created_by' || $key == 'modified_by' ) {
                                $rel_col = 'nickname';
                            }
                            $rel_terms = [ $rel_col => $_cond ];
                            if ( $rel_model == 'tag' ) {
                                $rel_terms['class'] = $model;
                            }
                            if ( $rel_obj->has_column( 'rev_type' ) ) {
                                $rel_terms['rev_type'] = 0;
                            }
                            if ( $workspace_id && $obj->has_column( 'workspace_id' ) &&
                                $rel_obj->has_column( 'workspace_id' ) ) {
                                $rel_terms['workspace_id'] = $workspace_id;
                            }
                            $rel_objs = $rel_obj->load( $rel_terms , [], 'id' );
                            if ( is_array( $rel_objs ) && !empty( $rel_objs ) ) {
                                $rel_ids = [];
                                foreach ( $rel_objs as $_obj ) {
                                    $rel_ids[] = (int) $_obj->id;
                                }
                                if ( $type === 'relation' ) {
                                    $rel_terms = ['to_obj' => $rel_model, 'to_id' => ['IN' => $rel_ids ],
                                                  'from_obj' => $model ];
                                    $sql = '';
                                    if ( $obj->has_column( 'rev_type' ) || $obj->has_column( 'status' ) ) {
                                        $sql = "SELECT {$dbprefix}relation.relation_from_id FROM {$dbprefix}relation,{$dbprefix}";
                                        $sql .= "{$model} WHERE ( relation_to_id IN (";
                                        $sql .= implode( ',', $rel_ids ) . ')';
                                        $sql .= " AND relation_to_obj='{$rel_model}' AND relation_from_obj='{$model}')";
                                        $sql .= " AND {$dbprefix}relation.relation_from_id={$dbprefix}{$model}.{$model}_id ";
                                    }
                                    if ( $obj->has_column( 'rev_type' ) && (! $app->param( 'revision_select' )
                                        && ! $app->param( 'manage_revision' ) )
                                        || ( isset( $terms['rev_type'] ) && is_numeric( $terms['rev_type'] ) ) ) {
                                        $rev_type = isset( $terms['rev_type'] ) ? (int) $terms['rev_type'] : 0;
                                        $sql .= " AND {$dbprefix}{$model}.{$model}_rev_type={$rev_type}";
                                        if ( $obj->has_column( 'status' ) && isset( $terms['status'] ) ) {
                                            $status = $terms['status'];
                                            if ( is_string( $status ) ) $status +=0;
                                            if ( is_numeric( $status ) ) {
                                                $sql .= " AND {$dbprefix}{$model}.{$model}_status=$status";
                                            }
                                        }
                                        $relations =
                                            $app->db->model( 'relation' )->load( $sql );
                                    } else {
                                        if ( $obj->has_column( 'status' ) && isset( $terms['status'] ) ) {
                                            $status = $terms['status'];
                                            if ( is_string( $status ) ) $status +=0;
                                            if ( is_numeric( $status ) ) {
                                                $sql .= " AND {$dbprefix}{$model}.{$model}_status=$status";
                                            }
                                            $relations =
                                                $app->db->model( 'relation' )->load( $sql );
                                        } else {
                                            $relations =
                                            $app->db->model( 'relation' )->load( $rel_terms, [], 'from_id' );
                                        }
                                    }
                                    if ( is_array( $relations ) && !empty( $relations ) ) {
                                        $from_ids = [];
                                        foreach ( $relations as $rel ) {
                                            $from_ids[] = (int) $rel->from_id;
                                        }
                                        $filtered_ids[] = array_unique( $from_ids );
                                    } else {
                                        $terms['id'] = 0; // No object found.
                                    }
                                } else {
                                    if ( $filter_and ) {
                                        $terms[ $key ] = ['AND' => ['IN' => $rel_ids ] ];
                                    } else {
                                        $terms[ $key ] = ['IN' => $rel_ids ];
                                    }
                                }
                            } else {
                                $terms['id'] = 0; // No object found.
                            }
                        } else {
                            $cnt = 0;
                            foreach ( $conds as $val ) {
                                $value = isset( $values[ $cnt ] ) ? $values[ $cnt ] : '';
                                if ( $workspace_id && $app->use_timezone && $model == 'log'
                                    && ( $key == 'created_on' || $key == 'modified_on' ) ) {
                                    if ( $app->current_tz != $app->timezone ) {
                                        if (! $app->time_offset ) {
                                            $time = $app->date();
                                        }
                                        $ts = strtotime( $value );
                                        $ts -= $app->time_offset;
                                        $ts = date( 'Y-m-d H:i:s',$ts );
                                        $value = $ts;
                                    }
                                }
                                $op = isset( $op_map[ $val ] ) ? $op_map[ $val ] : 'eq';
                                if ( $cnt ) {
                                    if ( count( $cond ) > 1 ) {
                                        $cond[] = [ $op => $value ];
                                        $cnt++;
                                        continue;
                                    }
                                    $orig = [];
                                    $orig[] = $cond;
                                    $orig[] = [ $op => $value ];
                                    $cond = $orig;
                                } else {
                                    $cond[ $op ] = $value;
                                }
                                $cnt++;
                            }
                            $conditions[ $key ] = $cond;
                        }
                    }
                }
                if (! empty( $filter_add_params ) ) {
                    $app->ctx->vars['filter_add_params'] =
                        '&' . http_build_query( $filter_add_params );
                }
                foreach ( $conditions as $col => $cond ) {
                    if ( is_array( $cond ) && $cond[ key( $cond ) ] === null ) continue;
                    $and_or = $app->param( "_filter_and_or_{$col}" )
                            ? $app->param( "_filter_and_or_{$col}" ) : 'AND';
                    $and_or = strtoupper( $and_or );
                    if ( $and_or != 'OR' ) $and_or = 'AND';
                    $terms[ $col ] = [ $and_or => $cond ];
                }
                if (! empty( $filtered_ids ) ) {
                    $all_ids = [];
                    foreach ( $filtered_ids as $filtered ) {
                        $all_ids = array_merge( $all_ids, $filtered );
                    }
                    $all_ids = array_unique( $all_ids );
                    if ( $_filter_and_or == 'AND' ) {
                        if (! isset( $terms['id'] ) ) {
                            $matche_ids = [];
                            foreach ( $all_ids as $filtered_id ) {
                                foreach ( $filtered_ids as $filtered ) {
                                    if (! in_array( $filtered_id, $filtered ) ) {
                                        unset( $matche_ids[ $filtered_id ] );
                                        continue 2;
                                    }
                                    $matche_ids[ $filtered_id ] = true;
                                }
                            }
                            if (! empty( $matche_ids ) ) {
                                $matche_ids = array_keys( $matche_ids );
                                $terms['id'] = ['AND' => ['IN' => $matche_ids ] ];
                            } else {
                                $terms['id'] = 0;
                            }
                        }
                    } else {
                        $terms['id'] = ['OR' => ['IN' => $all_ids ] ];
                    }
                }
                if ( $model == 'asset' && $app->param( 'insert_editor' ) && $app->param( 'dialog_view' ) ) {
                    if ( $app->param( 'select_system_filters' ) == 'filter_class_image' ) {
                        unset( $terms['class'] );
                        $images = $app->images;
                        $images[] = 'svg';
                        $terms['file_ext'] = ['IN' => $images ];
                    }
                }
                if ( $filter_name = $app->param( '_save_filter_name' ) ) {
                    $filter_terms = ['user_id' => $app->user()->id,
                                     'workspace_id' => $workspace_id,
                                     'key'   => $model,
                                     'value' => $filter_name,
                                     'kind'  => 'list_filter'];
                    $filter_terms['data'] = json_encode( $filter_params );
                    $filter = $app->db->model( 'option' )->get_by_key( $filter_terms );
                    $filter->save();
                    if ( $primary->object_id != $filter->id ) {
                        $primary->object_id( $filter->id );
                        $primary->data( $filter->data );
                        $primary->save();
                    }
                    $app->ctx->vars['current_filter_id'] = $filter->id;
                    $app->ctx->vars['current_filter_name'] = $filter_name;
                } else {
                    if (! isset( $app->ctx->vars['current_filter_name'] ) ) 
                      $app->ctx->vars['current_filter_name'] = $app->translate( 'Custom' );
                }
            }
            if ( $_filter_and_or === 'OR' && count( $terms ) > $count_terms && isset( $terms['id'] ) ) {
                if ( is_numeric( $terms['id'] ) && $terms['id'] === 0 ) {
                    unset( $terms['id'] );
                }
            }
        }
        if ( $model == 'user'
            && $app->param( 'workflow_model' ) && $app->param( 'workflow_type' ) ) {
            $app->pre_listing_workflow( $cb, $app, $terms, $args, $extra, $ex_vals );
        }
        return true;
    }

    function save_filter_tag ( &$cb, $app, &$obj ) {
        $name = $obj->name;
        $name = PTUtil::normalize( $name );
        $normalize = PTUtil::normalize_tag( $name );
        $terms = ['normalize' => $normalize ];
        if ( $obj->_model === 'tag' ) {
            $terms['workspace_id'] = $obj->workspace_id;
            $terms['class'] = $obj->class;
        }
        $comp = $app->db->model( $obj->_model )->get_by_key( $terms );
        if ( $comp->id && $comp->id != $obj->id ) {
            $cb['error'] = $app->translate( 'A %1$s with the same %2$s already exists.',
                [ $comp->name, $app->translate( $obj->_model ) ] );
            return false;
        }
        $obj->name( $name );
        $app->param( 'name', $name );
        $obj->normalize( $normalize );
        $app->param( 'normalize', $normalize );
        return true;
    }

    function delete_filter_table ( &$cb, $app, &$obj ) {
        $ids = $app->param( 'id' );
        if (!is_array( $ids ) ) $ids = [ $ids ];
        $tables = $app->db->model( 'table' )->load( ['id' => ['IN' => $ids ] ] );
        $not_delete = [];
        $upgrader = new PTUpgrader;
        foreach ( $tables as $table ) {
            if ( $table->not_delete && $upgrader->get_models_dir( $app, $table->name ) ) {
                $not_delete[] = $table->name;
            }
        }
        if (! empty( $not_delete ) ) {
            $cb['error'] = $app->translate(
                '%s cannot be deleted.', join( ',', $not_delete ) );
            return false;
        }
        return true;
    }

    function delete_filter_template ( &$cb, $app, &$obj ) {
        $ids = $app->param( 'id' );
        if (!is_array( $ids ) ) $ids = [ $ids ];
        $tmpls = $app->db->model( 'template' )->load( ['id' => ['IN' => $ids ] ] );
        foreach ( $tmpls as $tpl ) {
            $cnt = $app->db->model( 'urlmapping' )->count( ['template_id' => $tpl->id ] );
            if ( $cnt ) {
                $cb['error'] = $app->translate( 'This view could not be deleted because '
                                           . 'it is being used for a URL map. To '
                                           . 'delete a view, delete the URL map first.' );
                return false;
            }
        }
        return true;
    }

    function save_filter_urlmapping ( &$cb, $app, &$obj ) {
        if (! $obj->template_id ) {
            $cb['error'] = $app->translate( '%s is required.', $app->translate( 'View' ) );
            return false;
        } else if ( $obj->model != 'template' && ( strpos( $obj->mapping, '<' ) === false
            || strpos( $obj->mapping, '>' ) === false ) ) {
            $cb['error'] = $app->translate( 'URL Map without template tags should be Index.' );
            return false;
        } else if ( strpos( $obj->mapping, '<' ) === false ) {
            $site_url = $obj->workspace_id ? $obj->workspace->site_url : $app->site_url;
            $url = $site_url . $obj->mapping;
            $urls = $app->db->model( 'urlinfo' )->load( ['url' => $url, 'delete_flag' => ['IN' => [0, 1] ] ] );
            foreach ( $urls as $url ) {
                if ( $url->urlmapping_id != $obj->id || $url->class != 'archive' ) {
                    $msg = $url->class == 'archive'
                         ? $app->translate( 'The URL Map is duplicated.' )
                         : $app->translate( 'The URL Map is a duplicate of the URL of the file.' );
                    if ( $url->delete_flag )
                        $msg .= $app->translate(
                        "If the URL has been deleted, please 'Physical Delete' it from the URL list screen." );
                    $cb['error'] = $msg;
                    return false;
                }
            }
        }
        if ( $obj->date_based ) {
            $msg = null;
            if (! $obj->container ) {
                $msg = $app->translate( 'Date-Based archives require a container specification.' );
            } else {
                $container = $app->db->model( $obj->container )->new();
                $date_col = $app->get_date_col( $container );
                if (! $date_col ) {
                    $msg = $app->translate( 'Date-Based archive containers do not have a date column.' );
                }
            }
            if ( $msg ) {
                $cb['error'] = $msg;
                return false;
            }
        }
        return true;
    }

    function save_filter_table ( &$cb, $app, &$obj ) {
        $upgrader = new PTUpgrader;
        return $upgrader->save_filter_table( $cb, $app, $obj );
    }

    function post_delete_table ( &$cb, $app, &$obj ) {
        $upgrader = new PTUpgrader;
        return $upgrader->post_delete_table( $cb, $app, $obj );
    }

    function save_filter_form ( &$cb, $app, $obj ) {
        $form = new PTForm;
        return $form->save_filter_form( $cb, $app, $obj );
    }

    function save_filter_workflow ( &$cb, $app, $obj ) {
        $workflow = new PTWorkflow;
        return $workflow->save_filter_workflow( $cb, $app, $obj );
    }

    function save_filter_permission ( &$cb, $app, $obj ) {
        if (! $obj->user_id && ! $obj->association_id ) {
            $cb['error'] = $app->translate( 'User or Association is required.' );
            return false;
        }
        return true;
    }

    function pre_save_workspace ( $cb, $app, $obj, $original ) {
        if ( $app->site_base_path ) {
            $site_base_path = rtrim( $app->site_base_path, DS ) . DS;
            $site_path = $obj->site_path;
            $site_path = rtrim( $app->sanitize_dir( $site_path ), DS );
            $obj->site_path( $site_base_path . $site_path );
        }
        return true;
    }

    function post_save_workspace ( $cb, $app, $obj, $original ) {
        if ( $original->site_url !== $obj->site_url ||
            $original->site_path !== $obj->site_path ) {
            $app->rebuild_urlinfo( $obj );
        }
        $app->clear_cache( 'allowed_domains__c' );
        return true;
    }

    function post_delete_workspace ( $cb, $app, $obj ) {
        $cache_key = 'workspace' . DS . $obj->id . DS . 'object__c';
        $app->clear_cache( $cache_key );
        if (! $app->cache_driver ) {
            $app->clear_cache( 'workspace' . DS . $obj->id );
        }
        $app->clear_cache( 'allowed_domains__c' );
        return true;
    }

    function post_save_template ( $cb, $app, $obj, $original ) {
        $column = $obj->_model == 'template' ? 'text' : 'mapping';
        $ctx = $app->ctx;
        if ( $original && $original->cache_key != md5( $obj->$column ) ) {
            $key = $column == 'template' ? "{$original->cache_key}.view" : $original->cache_key;
            $ctx->clear_cache( $key );
        }
        return true;
    }

    function post_save_urlmapping ( $cb, $app, $obj, $original ) {
        if ( $original && ( $original->model != $obj->model ||
            $original->date_based != $obj->date_based ) ) {
            $urls = $app->db->model( 'urlinfo' )->load( ['urlmapping_id' => $obj->id ] );
            foreach ( $urls as $url ) {
                $url->remove();
            }
        }
        $app->return_args['need_rebuild'] = 1;
        return $this->post_save_template( $cb, $app, $obj, $original );
    }

    function pre_save_user ( &$cb, $app, &$obj, $original ) {
        if ( $obj->language && !in_array( $obj->language, $app->languages ) ) {
            $cb['error'] = $app->translate( "'Language' is invalid." );
            return false;
        }
        if ( $app->user()->is_superuser || ! $obj->id ) {
            if ( $app->user()->id == $obj->id && $app->user()->is_superuser && !$obj->is_superuser ) {
                $administrator = $app->db->model( 'user' )->count( ['status' => 2, 'lock_out' => 0, 'id' => ['!=' => $obj->id ] ] );
                if (! $administrator ) {
                    $cb['error'] =
                      $app->translate(
                        'Failed to save user. Since there is only one administrator, I could not remove that administrator privilege.' );
                    return false;
                }
            }
            return true;
        }
        $not_changes = ['is_superuser', 'status', 'lock_out', 'last_login_on',
            'uuid', 'name', 'lock_out_on', 'created_on'];
        if ( $app->can_do( 'user', 'create' ) ) {
            $not_changes = ['is_superuser'];
            if (! $app->can_do( 'user', 'activate' ) ) {
                $not_changes[] = 'status';
            }
        }
        foreach ( $not_changes as $col ) {
            if ( $obj->has_column( $col ) ) {
                $obj->$col( $original->$col );
            }
        }
        return true;
    }

    function pre_save_widget ( $cb, $app, $obj, $original ) {
        if ( $original && $original->back_color != $obj->back_color ) {
            $ctx = $app->ctx;
            $tags = new PTTags();
            $args = ['hex' => $obj->back_color, 'alpha' => '0.4'];
            $rgba = $tags->hdlr_hex2rgba( $args, $ctx );
            $text = $obj->text;
            $regex = "/style=\"background-color:\s*rgba\(.*?\)/";
            $newColor = "style=\"background-color: rgba({$rgba})";
            $text = preg_replace( $regex, $newColor, $text );
            $obj->text( $text );
        }
        return true;
    }

    function pre_save_question ( $cb, $app, $obj, $original ) {
        if (! $obj->template ) {
            $questiontype_id = $obj->questiontype_id;
            if ( $questiontype_id ) {
                $qt = $app->db->model( 'questiontype' )->load( (int) $questiontype_id );
                if ( $qt ) {
                    $obj->template( $qt->template );
                }
            }
        }
        return true;
    }

    function post_save_field ( $cb, $app, $obj, $original ) {
        $relations = $app->get_relations( $obj, 'table', 'models' );
        $table_ids = [];
        foreach ( $relations as $relation ) {
            $table_ids[] = $relation->to_id;
        }
        $basename = $original->basename;
        $orig_relations = $cb['orig_relations'];
        foreach ( $orig_relations as $relation ) {
            if ( $relation->name != 'models' ) continue;
            $table_id = $relation->to_id;
            if (! in_array( $table_id, $table_ids ) ) {
                $table_id = (int) $table_id;
                $table = $app->db->model( 'table' )->load( $table_id );
                if (! $table ) continue;
                $terms =
                    ['kind' => 'customfield', 'key' => $basename, 'model' => $table->name ];
                $meta_fields = $app->db->model( 'meta' )->load( $terms );
                $app->db->model( 'meta' )->remove_multi( $meta_fields );
            }
        }
        return true;
    }

    function post_delete_field ( $cb, $app, $obj, $original ) {
        $terms = ['kind' => 'customfield', 'field_id' => $obj->id ];
        $meta_fields = $app->db->model( 'meta' )->load( $terms );
        $app->db->model( 'meta' )->remove_multi( $meta_fields );
        return true;
    }

    function post_save_permission ( $cb, $app, $obj, $original ) {
        $user_ids = [];
        if ( $obj->user_id ) {
            $user_ids[] = $obj->user_id;
        }
        if ( $original && $original->user_id && ( $original->user_id != $obj->user_id ) ) {
            $user_ids[] = $original->user_id;
        }
        $rel_terms = ['name' => 'users', 'from_obj' => 'association', 'to_obj' => 'user'];
        if ( $obj->association_id ) {
            $rel_terms['from_id'] = $obj->association_id;
            $assoc_ids = $app->db->model( 'relation' )->load_iter( $rel_terms, null, 'to_id' );
            $assoc_ids = $assoc_ids->fetchAll( PDO::FETCH_COLUMN );
            if (! empty( $assoc_ids ) ) {
                $user_ids = array_merge( $user_ids, $assoc_ids );
            }
        }
        if ( $original && $original->association_id && ( $original->association_id != $obj->association_id ) ) {
            $rel_terms['from_id'] = $original->association_id;
            $assoc_ids = $app->db->model( 'relation' )->load_iter( $rel_terms, null, 'to_id' );
            $assoc_ids = $assoc_ids->fetchAll( PDO::FETCH_COLUMN );
            if (! empty( $assoc_ids ) ) {
                $user_ids = array_merge( $user_ids, $assoc_ids );
            }
        }
        if (!empty( $user_ids ) ) {
            $app->update_workflow( $user_ids );
        }
        return PTUtil::update_permissions( $app );
    }

    function pre_save_role ( $cb, $app, $obj ) {
        $params = $app->param();
        $permissions = [];
        $permission_models = $app->param( 'permission_models' );
        foreach ( $permission_models as $model ) {
            if ( $app->param( 'columns-all-' . $model ) ) {
                $permissions[ $model ] = 'all';
            } else {
                $permissions[ $model ] = [];
                foreach ( $params as $param => $val ) {
                    if ( strpos( $param, $model ) === 0 ) {
                        $permissions[ $model ][] = $val;
                    }
                }
            }
        }
        $obj->columns_data( json_encode( $permissions ) );
        return 1;
    }

    function post_save_comment ( $cb, $app, $obj, $original ) {
        $comment = new PTComment();
        return $comment->post_save_comment( $cb, $app, $obj, $original );
    }

    function post_save_role ( $cb, $app, $obj ) {
        return PTUtil::update_permissions( $this );
    }

    function update_workflow ( $user_ids = [] ) {
        $app = $this;
        $users = $app->db->model( 'user' )->load( ['id' => ['IN' => $user_ids ] ] );
        foreach ( $users as $user ) {
            $workflows = $app->db->model( 'relation' )->load(
                ['to_obj' => 'user', 'to_id' => $user->id, 'from_obj' => 'workflow']
            );
            foreach ( $workflows as $wf ) {
                $group = $wf->name;
                $workflow = $app->db->model( 'workflow' )->load( (int) $wf->from_id );
                if (! $workflow ) {
                    continue;
                }
                $ws_id = $workflow->workspace_id;
                $perms = $app->permissions( $user );
                $perm = isset( $perms[ $ws_id ] ) ? $perms[ $ws_id ] : null;
                if (! $perm ) {
                    continue;
                }
                $wf_model = $workflow->model;
                $group_name = $app->permission_group( $user, $wf_model , $ws_id );
                if ( $group_name == 'creator' && $group != 'users_draft' ) {
                    $wf->name( 'users_draft' );
                    $wf->save();
                    continue;
                } else if ( $group_name == 'reviewer' && $group != 'users_review' ) {
                    $wf->name( 'users_review' );
                    $wf->save();
                    continue;
                } else if ( $group_name == 'publisher' && $group != 'users_publish' ) {
                    $wf->name( 'users_publish' );
                    $wf->save();
                    continue;
                }
            }
        }
    }

    function rebuild_urlinfo ( $workspace = null ) {
        $app = $this;
        $terms = $workspace ? ['workspace_id' => $workspace->id ] : [];
        $terms['delete_flag'] = ['IN' => [0,1] ];
        $urls = $app->db->model( 'urlinfo' )->load( $terms );
        $class = new PTListActions();
        return $class->reset_urlinfo( $app, $urls, null );
    }

    function post_save_table ( $cb, $app, $obj, $original ) {
        $app->clear_cache( 'template_tags__c' );
        $upgrader = new PTUpgrader;
        return $upgrader->post_save_table( $cb, $app, $obj, $original );
    }

    function save_filter_asset ( &$cb, $app, &$obj ) {
        $file_name = $obj->file_name;
        $basename = '';
        $file_name = $app->sanitize_file( $file_name, $basename );
        if (! $basename && strpos( $file_name, '.' ) !== 0 ) {
            $cb['errors'][] = $app->translate( "The file '%s' that you uploaded is not allowed.", $file_name );
            return false;
        } else if ( strpos( $file_name, '.' ) === 0 && !$app->can_upload_hidden ) {
            $cb['errors'][] = $app->translate( "The file '%s' that you uploaded is not allowed.", $file_name );
            return false;
        } else if ( $file_name == '.' || strpos( $file_name, '..' ) === 0 || strpos( $file_name, DS ) !== false ) {
            $cb['errors'][] = $app->translate( "The file '%s' that you uploaded is not allowed.", $file_name );
            return false;
        }
        if (! $obj->label ) $obj->label( $file_name );
        $obj->file_name( $file_name );
        $file_ext = PTUtil::get_extension( $file_name, true );
        $allowed_exts = $app->allowed_exts;
        if ( $allowed_exts ) {
            $allowed_exts = preg_split( '/\s*,\s*/', $allowed_exts );
            $allowed_exts = array_filter( $allowed_exts, 'strlen' );
            if (! empty( $allowed_exts ) && ! in_array( $file_ext, $allowed_exts ) ) {
                $cb['errors'][] = $app->translate( "Invalid File extension'%s'.", $file_ext );
                return false;
            }
        }
        $denied_exts = $app->denied_exts;
        if ( $denied_exts ) {
            $denied_exts = preg_split( '/\s*,\s*/', $denied_exts );
            $denied_exts = array_filter( $denied_exts, 'strlen' );
            if (! empty( $denied_exts ) && in_array( $file_ext, $denied_exts ) ) {
                $cb['errors'][] = $app->translate( "Invalid File extension'%s'.", $file_ext );
                return false;
            }
        }
        return true;
    }

    function post_save_asset ( $cb, $app, $obj ) {
        if (! $obj->id ) {
            return $app->error( $app->translate( 'An error occurred while saving %s.', $app->translate( 'Asset' ) ) );
        }
        $file_ext = PTUtil::get_extension( $obj->file_name );
        $metadata = $app->db->model( 'meta' )->get_by_key(
                 ['model' => 'asset', 'object_id' => $obj->id,
                  'kind' => 'metadata', 'key' => 'file'] );
        if ( $metadata->id && $metadata->text ) {
            $meta = json_decode( $metadata->text, true );
            if ( $meta['file_name'] != $obj->file_name ) {
                $ext = strtolower( $meta['extension'] );
                if ( $ext && $ext !== strtolower( $file_ext ) ) {
                    if (! $file_ext ) {
                        $obj->file_name( $obj->file_name . ".{$ext}" );
                    } else {
                        $obj->file_name( preg_replace( "/\.$file_ext$/i", ".{$ext}", $obj->file_name ) );
                    }
                    $obj->save();
                } else if (! $file_ext && $ext ) {
                    $obj->file_name( $obj->file_name . ".{$ext}" );
                    $obj->save();
                }
                $basename = preg_replace( '/\.[^\.]+$/', '', $obj->file_name );
                $meta['basename']  = $basename;
                $meta['file_name'] = $obj->file_name;
                $metadata->text( json_encode( $meta ) );
                $metadata->save();
            }
        }
        $base_url = $app->site_url;
        $base_path = $app->site_path;
        if ( $workspace = $obj->workspace ) {
            $base_url = $workspace->site_url;
            $base_path = $workspace->site_path;
        }
        $extra_path = $obj->extra_path;
        $extra_path = $app->sanitize_dir( $extra_path );
        $file_path = $base_path . '/' . $extra_path . $obj->file_name;
        $file_path = str_replace( DS, '/', $file_path );
        $rename = $app->publish( $file_path, $obj, 'file', $obj->mime_type );
        if ( $rename !== $file_path ) {
            $obj->file_name( basename( $rename ) );
            $obj->save();
            if ( $metadata->id && $metadata->text ) {
                $meta = isset( $meta ) ? $meta : json_decode( $metadata->text, true );
                $basename = preg_replace( '/\.[^\.]+$/', '', $obj->file_name );
                $meta['basename']  = $basename;
                $meta['file_name'] = $obj->file_name;
                $metadata->text( json_encode( $meta ) );
                $metadata->save();
            }
        }
        return true;
    }

    function publish ( $file_path, $obj, $key,
                       $mime_type = null, $type = 'file', $original = null ) {
        $app = $this;
        if (! $obj->id ) {
            return $app->error( $app->translate( 'An attempt was made to publish an invalid %s.', $app->translate( $obj->_model ) ) );
        }
        $fmgr = $app->fmgr;
        $destruct_time = $app->destruct_time;
        if ( $destruct_time && $fmgr->exists( $file_path ) ) {
            if ( filemtime( $file_path ) >= $destruct_time ) {
                // Update from other proccess.
                return true;
            }
        }
        $app->core_tags->include_vars = [];
        if ( $app->id == 'Worker' && $app->worker && $app->worker->update_before && $fmgr->exists( $file_path ) ) {
            $mtime = filemtime( $file_path );
            $before = $app->worker->update_before;
            if ( $before < $mtime ) {
                return true;
            }
        }
        // $fmgr->delayed = $app->fmgr_delayed; // This function is obsolete.
        if (! $original ) $original = clone $obj;
        $cache_vars = $app->ctx->vars;
        $cache_local_vars = $app->ctx->local_vars;
        $cache_stash = $app->ctx->__stash;
        $table = $app->get_table( $obj->_model );
        if (!$table ) return;
        $db = $app->db;
        $ctx = $app->ctx->clone();
        if (! $app->__stash ) {
            $app->__stash = $ctx->__stash;
        } else {
            $ctx->__stash = $app->__stash;
        }
        if ( $current_context = $ctx->stash( 'current_context' ) ) {
            unset( $ctx->__stash['current_context'], $ctx->__stash[ $current_context ] );
        }
        unset( $ctx->__stash['current_template'], $ctx->__stash['current_timestamp'],
               $ctx->__stash['current_timestamp_end'], $ctx->__stash['archive_date_based'],
               $ctx->__stash['current_archive_type'], $ctx->__stash['current_archive_title'],
               $ctx->__stash['current_include_template'], $ctx->__stash['current_container']
        );
        $ui_exists = false;
        $urlmapping_id = 0;
        $old_path = '';
        $publish = false;
        $unlink = $obj->_delete ? true : false;
        $abs_path = $file_path;
        if ( strpos( $file_path, '..' ) !== false && $app->path_verify ) {
            $abs_path = PTUtil::rel2abs( $file_path );
        }
        if ( $obj->has_column( 'status' ) ) {
            $status_published = $app->status_published( $obj->_model );
            if ( $obj->status != $status_published ) {
                $unlink = true;
            }
        }
        $template;
        $urlmapping = null;
        $workspace = $app->workspace();
        if ( $obj->_model === 'workspace' ) {
            $workspace = $obj;
        } else if ( $obj->has_column( 'workspace_id' ) ) {
            $workspace = $obj->workspace;
        }
        $ctx->stash( 'workspace', $workspace );
        $current_tz = $app->current_tz;
        if ( $app->use_timezone ) {
            if ( $workspace && $workspace->timezone ) {
                $app->date_default_timezone_set( $workspace->timezone );
            } else if (! $workspace ) {
                $app->date_default_timezone_set( $app->timezone );
            }
        }
        $app->ctx = $ctx;
        if ( $app->allow_include && $app->id == 'Prototype' ) {
            if (! isset( $ctx->include_paths[ $app->site_path ] ) ) {
                $ctx->include_paths[ $app->site_path ] = true;
            }
            if ( is_object( $workspace ) &&
                !isset( $ctx->include_paths[ $workspace->site_path ] ) ) {
                $ctx->include_paths[ $workspace->site_path ] = true;
            }
        }
        $date_based = false;
        $ctx->stash( 'current_container', '' );
        $skip_empty = false;
        if ( is_object( $key ) ) {
            $urlmapping = $key;
            $key = '';
            $ctx->stash( 'current_urlmapping', $urlmapping );
            $urlmapping_id = $urlmapping->id;
            $date_based = $urlmapping->date_based;
            if ( $date_based ) $archive_date = $type;
            $type = $urlmapping->template_id ? 'archive' : 'model';
            $publish = $urlmapping->publish_file;
            if (! $publish ) {
                $urlmapping = $app->db->model( 'urlmapping' )->load( $urlmapping->id, null, '*' );
                $publish = $urlmapping ? $urlmapping->publish_file : 1;
            }
            if ( $urlmapping->workspace ) {
                $workspace = $urlmapping->workspace;
            } else {
                $workspace = null;
            }
            $ctx->stash( 'workspace', $workspace );
            $terms = ['urlmapping_id' => $urlmapping->id, 'class' => 'archive',
                 'object_id' => $obj->id, 'model' => $obj->_model,
                 'delete_flag' => ['IN' => [0, 1] ] ];
            if ( isset( $archive_date ) ) $terms['archive_date'] = $archive_date;
            $ui = $db->model( 'urlinfo' )->get_by_key( $terms,
                  ['sort' => ['delete_flag' => 'ascend', 'id' => 'descend'] ] );
            if ( $ui->file_path != $abs_path ) {
                if ( $fmgr->exists( $ui->file_path ) ) {
                    $fmgr->unlink( $ui->file_path, $ui );
                    $app->remove_dirs[] = dirname( $ui->file_path );
                }
            }
            if ( $app->unique_url || isset( $app->published_files[ $abs_path ] ) ) {
                $ol_terms = ['file_path' => $abs_path ];
                if (! $ui->id ) {
                    $ui->save();
                }
                $ol_terms['id'] = ['!=' => $ui->id ];
                $overlaps = $db->model( 'urlinfo' )->count( $ol_terms );
                if ( $overlaps ) {
                    $overlaps = $db->model( 'urlinfo' )->load( $ol_terms );
                    $db->model( 'urlinfo' )->remove_multi( $overlaps );
                }
            }
            $unpublishd_ui = null;
            if ( $ui->id && $ui->file_path !== $abs_path ) {
                if (! $ui->delete_flag ) $ui->remove();
                $unpublishd_ui = clone $ui;
                $terms['file_path'] = $abs_path;
                $deleted = $db->model( 'urlinfo' )->load(
                    $terms, ['sort' => ['delete_flag', 'class'], 'direction' => 'ascend'] );
                if (! $deleted || empty( $deleted ) ) {
                    $ui = clone $ui;
                    $ui->id( null );
                } else {
                    $i = 0;
                    foreach ( $deleted as $deleted_ui ) {
                        if (! $i ) {
                            $ui = $deleted_ui;
                            $ui->delete_flag( 0 );
                        } else {
                            $ui->remove( true );
                        }
                        $i++;
                    }
                }
            }
            $app->published_files[ $abs_path ] = true;
            $ui->file_path( $abs_path );
            if ( $ui->publish_file != $publish ) {
                $ui->publish_file( $publish );
                if ( $ui->id ) {
                    $app->update_urls[ $ui->id ] = $ui;
                }
            }
            $template = $urlmapping->template;
            if ( !$template || $template->text === null || $template->status === null
                || $template->compiled === null || $template->cache_key === null ) {
                $db->caching = false;
                $template = $urlmapping->template;
                if ( $template === null ) {
                    $template = $db->model( 'template' )->get_by_key( ['id' => $urlmapping->template_id ] );
                }
                $db->caching = $app->db_caching;
            }
            if (! $template || ( $template && $template->status != 2 ) ) {
                $unlink = true;
            }
            if ( $urlmapping->container ) {
                $container = $app->get_table( $urlmapping->container );
                if ( is_object( $container ) ) {
                    $ctx->stash( 'current_container', $container->name );
                    if ( $urlmapping->skip_empty ) { // Count Children
                        $ctx->stash( $obj->_model, $obj );
                        $cnt_tag = strtolower( $container->plural ) . 'count';
                        $cnt_tag = preg_replace( '/[^a-z0-9]/', '' , $cnt_tag );
                        $count_terms = ['container' => $container->name, 'this_tag' => $cnt_tag ];
                        if ( $app->db->model( $container->name )->has_column( 'workspace_id' ) ) {
                            if (! $urlmapping->container_scope ) {
                                $count_terms['include_workspaces'] = 'all';
                            } else {
                                $count_terms['workspace_id'] = (int) $urlmapping->workspace_id;
                            }
                        }
                        $localvars = ['current_context', 'current_archive_type',
                                      'current_timestamp', 'current_timestamp_end',];
                        $ctx->localize( $localvars );
                        $ctx->stash( 'current_context', $urlmapping->model );
                        if ( $date_based && isset( $archive_date ) ) {
                            $archive_type = ( $urlmapping->model !== 'template' )
                                          ? $urlmapping->model . '-' . strtolower( $date_based )
                                          : strtolower( $date_based );
                            $ctx->stash( 'current_archive_type', $archive_type );
                            list( $title, $start, $end ) =
                                $app->title_start_end( $date_based, $archive_date, $urlmapping );
                            $ctx->stash( 'current_timestamp', $start );
                            $ctx->stash( 'current_timestamp_end', $end );
                        }
                        $count_children = $app->core_tags->hdlr_container_count( $count_terms, $ctx );
                        $ctx->restore( $localvars );
                        if (! $count_children ) {
                            $skip_empty = true;
                            $unlink = true;
                        }
                    }
                }
            }
        } else {
            $ui_terms = ['file_path' => $abs_path, 'delete_flag' => ['IN' => [0, 1] ] ];
            $ui_terms['object_id'] = $obj->id;
            $ui_terms['model'] = $obj->_model;
            $ui = $db->model( 'urlinfo' )->get_by_key( $ui_terms,
                        ['sort' => ['delete_flag' => 'ascend', 'id' => 'descend'] ] );
            $ui_terms['object_id'] = ['!=' => $obj->id ];
            if (! $unlink ) {
                $for_rename = $db->model( 'urlinfo' )->get_by_key( $ui_terms );
                if ( $for_rename->id ) {
                    $existing_urls = $db->model( 'urlinfo' )->load( $ui_terms );
                    $existing = false;
                    foreach ( $existing_urls as $existing_url ) {
                        $exist_obj = 
                            $db->model( $existing_url->model )->load( $existing_url->object_id );
                        if ( $exist_obj ) {
                            if ( $obj->_model === 'asset' && $existing_url->delete_flag && $existing_url->key === 'file' ) {
                                $activeUrl = $db->model( 'urlinfo' )->get_by_key(
                                    ['object_id' => $existing_url->object_id, 'model' => $obj->_model, 'key' => 'file'] );
                                if ( $activeUrl->id && $file_path !== $activeUrl->file_path ) { // Asset renamed.
                                    $existing_url->remove( true );
                                    continue;
                                }
                            }
                            if ( ( $exist_obj->rev_type && $exist_obj->rev_object_id == $obj->id )
                                || $obj->id == $existing_url->object_id ) {
                                continue;
                            } else {
                                $existing = true;
                                break;
                            }
                        } else {
                            $existing_url->remove( true );
                        }
                    }
                    if ( $existing ) {
                        $file_path = PTUtil::unique_filename( $file_path );
                        $ui->file_path( $file_path );
                    }
                }
            }
            $old_uis = [];
            if (! $ui->id ) {
                $old_uis = $db->model( 'urlinfo' )->load(
                    ['model' => $obj->_model, 'object_id' => $obj->id, 'key' => $key,
                     'delete_flag' => ['IN' => [0, 1] ],
                     'class' => ['IN' => ['file', 'thumbnail'] ] ] );
            } else {
                $old_uis = $db->model( 'urlinfo' )->load(
                    ['id' => ['!=' => $ui->id ],
                     'model' => $obj->_model, 'object_id' => $obj->id, 'key' => $key,
                     'delete_flag' => ['IN' => [0, 1] ],
                     'class' => ['IN' => ['file', 'thumbnail'] ] ] );
            }
            if ( count( $old_uis ) ) {
                if ( $app->publish_callbacks ) {
                    $cb_unlink = true;
                    if (! $original ) $original = clone $obj;
                    $app->init_callbacks( 'blob', 'start_publish' );
                    $callback = ['name' => 'start_publish', 'model' => 'blob',
                                 'object' => $obj, 'ctx' => $ctx,
                                 'original' => $original, 'unlink' => $cb_unlink ];
                }
                foreach ( $old_uis as $old_ui ) {
                    if ( $app->publish_callbacks ) {
                        $callback['urlinfo'] = $old_ui;
                        $app->run_callbacks( $callback, 'blob', $cb_unlink );
                    }
                    $old_ui->remove();
                }
            }
        }
        $delete_flag = $ui->delete_flag;
        $ui->delete_flag( 0 );
        if ( $ui->id ) {
            if ( $key == $ui->key && $ui->model == $table->name &&
                $ui->urlmapping_id == $urlmapping_id && $ui->object_id == $obj->id ) {
                $ui_exists = true;
            } else {
                $old_obj = null;
                if ( $delete_flag && $ui->object_id && $ui->model && $ui->object_id ) {
                    $old_obj = $db->model( $ui->model )->load( $ui->object_id );
                }
                if (! $old_obj ) {
                    $ui_exists = true;
                } else {
                    $file_ext = PTUtil::get_extension( $file_path );
                    $basename = preg_replace( "/\.{$file_ext}$/i", '', $abs_path );
                    $i = 0;
                    $unique = false;
                    while ( $unique === false ) {
                        $rename = $i ? "{$basename}-{$i}.{$file_ext}" : "{$basename}.{$file_ext}";
                        $exists = $db->model( 'urlinfo' )->load(
                            ['file_path' => $rename ], ['limit' => 1], 'id' );
                        if ( is_array( $exists ) && count( $exists ) ) {
                        } else {
                            $unique = true;
                            $file_path = $rename;
                            break;
                        }
                        $i++;
                    }
                    if ( $unique && $obj->has_column( 'file_name' ) ) {
                        $obj->file_name( basename( $file_path ) );
                        $obj->save();
                    }
                    if ( $unique ) {
                        $ui = clone $ui;
                        $ui->id( null );
                        $ui->save();
                    }
                }
            }
        }
        $base_url = $app->site_url;
        $base_path = $app->site_path;
        $asset_publish = $app->asset_publish;
        if ( $workspace ) {
            $base_url = $workspace->site_url;
            $base_path = $workspace->site_path;
            $asset_publish = $workspace->asset_publish;
        }
        $file_path = str_replace( DS, '/', $file_path );
        $base_path = str_replace( DS, '/', $base_path );
        if ( mb_substr( $base_url, -1 ) != '/' ) {
            $base_url .= '/';
        }
        $search = preg_quote( $base_path, '/' );
        $relative_path = preg_replace( "/^{$search}\//", '', $file_path );
        $url = $base_url . $relative_path;
        $url = str_replace( DS, '/', $url );
        $relative_path = str_replace( DS, '/', $relative_path );
        $orig_path = $ui->file_path;
        if (! $mime_type ) $mime_type = PTUtil::get_mime_type( $url );
        $archive_date = isset( $archive_date ) ? $archive_date : '';
        if ( strpos( $file_path, '..' ) !== false && $app->path_verify ) {
            $file_path = $abs_path;
            $url = PTUtil::rel2abs( $url );
        }
        $relative_url = preg_replace( '!^https{0,1}:\/\/.*?\/!', '/', $url );
        $ui->set_values( ['model' => $table->name,
                          'url' => $url,
                          'key' => $key,
                          'object_id' => $obj->id,
                          'relative_url' => $relative_url,
                          'urlmapping_id' => (int) $urlmapping_id,
                          'file_path' => $file_path,
                          'mime_type' => $mime_type,
                          'archive_date' => $archive_date,
                          'class' => $type,
                          'relative_path' => '%r/' . $relative_path,
                          'workspace_id' =>
                          $urlmapping ? $urlmapping->workspace_id : $obj->workspace_id ] );
        $saved = false;
        if (! $ui->id ) {
            unset( $ui->id );
            unset( $ui->urlinfo_id ); // Save and get urlinfo_id.
            $ui->_insert = true;
            if ( $type === 'archive' && !$ui->archive_type ) {
                $archive_type = $obj->_model == 'template' ? 'index' : $obj->_model;
                if ( $date_based ) {
                    $archive_type = $archive_type == 'index' ? '' : $archive_type;
                    $archive_type .= $archive_type ? '-' . strtolower( $date_based )
                                   : strtolower( $date_based );
                }
                $ui->archive_type( $archive_type );
                $ctx->stash( 'current_archive_type', $archive_type );
            }
            $ui->save();
            $saved = true;
        } else {
            $app->update_urls[ $ui->id ] = $ui;
            $meta = $app->db->model( 'meta' )->get_by_key(
                            ['model' => 'urlinfo', 'object_id' => $ui->id,
                             'kind' => 'metadata', 'name' => 'triggers'] );
            if ( $meta->id ) {
                $meta->remove();
            }
        }
        if ( $app->mode == 'save' ) {
            if (! $saved ) $ui->save();
            unset( $app->update_urls[ $ui->id ] );
            $app->stash = []; // Delete old permalink.
        } else if ( $app->mode == 'delete' ) {
            $app->stash = []; // Delete old permalink.
        }
        if (! empty( $app->url_relations ) ) {
            // Replace the menu items.
            $url_relations = $app->url_relations;
            foreach ( $url_relations as $url_relation ) {
                $replaceURL = $url_relation->_url;
                if ( $replaceURL->object_id == $ui->object_id
                    && $replaceURL->model == $ui->model
                    && $replaceURL->workspace_id == $ui->workspace_id
                    && $replaceURL->urlmapping_id == $ui->urlmapping_id ) {
                    unset( $url_relation->_url );
                    $url_relation->to_id( $ui->id );
                    $url_relation->save();
                }
            }
            $app->url_relations = [];
        }
        $ctx->stash( 'current_urlinfo', $ui );
        if ( $type === 'file' || $publish ) {
            if ( $asset_publish || $publish ) {
                if ( $type === 'file' ) {
                    if ( $app->publish_callbacks ) {
                        if (! $original ) $original = clone $obj;
                        $app->init_callbacks( 'blob', 'start_publish' );
                        $app->init_callbacks( 'blob', 'pre_publish' );
                        $app->init_callbacks( 'blob', 'post_publish' );
                        $callback = ['name' => 'start_publish', 'model' => 'blob',
                                     'urlinfo' => $ui, 'object' => $obj, 'ctx' => $ctx,
                                     'original' => $original, 'unlink' => $unlink ];
                        $app->run_callbacks( $callback, 'blob', $unlink );
                    }
                    if ( $unlink ) {
                        if ( $fmgr->exists( $file_path ) ) {
                            $fmgr->unlink( $file_path, $ui );
                            $app->remove_dirs[] = dirname( $file_path );
                        }
                        $ui->delete_flag( 1 );
                        $ui->is_published( 0 );
                        if ( $ui->id ) { // file renamed.
                            $ui_terms = ['delete_flag' => ['IN' => [0, 1] ], 'key' => $ui->key,
                                         'object_id' => $ui->object_id, 'model' => $ui->model,
                                         'was_published' => 0, 'id' => ['!=' => $ui->id ] ];
                            $another_uis = $db->model( 'urlinfo' )->load( $ui_terms );
                            if ( is_array( $another_uis ) && !empty( $another_uis ) ) {
                                $db->model( 'urlinfo' )->remove_multi( $another_uis );
                            } else {
                                unset( $ui_terms['was_published'] );
                                $ui_terms['id'] = ['>' => $ui->id ];
                                $ui_count = $db->model( 'urlinfo' )->count( $ui_terms );
                                if ( $ui_count ) {
                                    $new_ui = clone $ui;
                                    $new_ui->id();
                                    $new_ui->save();
                                    $new_ui->remove( false, $skip_empty ); // add delete_flag
                                    $ui->remove( true );
                                }
                            }
                            $ui_terms['key'] = 'thumbnail';
                            unset( $ui_terms['id'], $ui_terms['was_published'] );
                            $thumbnails = $db->model( 'urlinfo' )->load( $ui_terms );
                            if ( is_array( $thumbnails ) && ! empty( $thumbnails ) ) {
                                foreach ( $thumbnails as $thumbnail ) {
                                    if ( $app->publish_callbacks ) {
                                        $thumb_cb = $callback;
                                        $thumb_cb['thumbnail'] = true;
                                        $thumb_cb['urlinfo'] = $thumbnail;
                                        $thumb_cb['ctx'] = $ctx;
                                        $app->run_callbacks( $thumb_cb, 'blob', $unlink );
                                    }
                                    $thumbnail->remove();
                                }
                            }
                        } else {
                            $ui->remove( false, $skip_empty );
                        }
                    } else {
                        $args = ['join' => ['urlinfo', 'meta_id'], 'distinct' => 1];
                        $thumbnails = $db->model( 'meta' )->load( [
                            'object_id' => $obj->id, 'model' => $obj->_model,
                            'kind' => 'thumbnail'], $args );
                        foreach ( $thumbnails as $thumb ) {
                            $args = $thumb->data;
                            $args = $args ? unserialize( $args ) : null;
                            $thumb_path = $thumb->urlinfo_file_path;
                            if (! empty( $args ) ) {
                                $url = PTUtil::thumbnail_url( $obj, $args );
                            }
                            $md5 = $thumb->urlinfo_md5;
                            $data = $thumb->blob;
                            $thumb_update = false;
                            $hash = md5( $data );
                            if ( file_exists( $thumb_path ) ) {
                                $old = $md5 ? $md5 : md5_file( $thumb_path );
                                if ( $old !== $hash ) {
                                    $thumb_update = true;
                                }
                            } else {
                                $thumb_update = true;
                            }
                            if ( $thumb_update ) {
                                $fmgr->put( $thumb_path, $data );
                            }
                            if (! $md5 || $thumb_update ) {
                                $uid = (int) $thumb->urlinfo_id;
                                $uinfo = $db->model( 'urlinfo' )->load( $uid );
                                if ( $uinfo ) {
                                    $uinfo->md5( $hash );
                                    if (! $uinfo->id || $thumb_update ) {
                                        $uinfo->save();
                                    } else {
                                        $app->update_urls[ $uinfo->id ] = $uinfo;
                                    }
                                    $fmgr->update_objs[ $thumb_path ] = $uinfo;
                                }
                            }
                        }
                        $data = $obj->$key;
                        if (! $data ) {
                            $obj = $db->model( $obj->_model )->load( $obj->id, null, "id,{$key}" );
                            $data = $obj->$key;
                            if (! $data && $fmgr->exists( $file_path ) ) {
                                $data = $fmgr->get( $file_path );
                                $obj->$key( $data );
                                $obj->save();
                            }
                        }
                        if ( $app->publish_callbacks ) {
                            $callback['name'] = 'pre_publish';
                            $res = $app->run_callbacks( $callback, 'blob', $data );
                            if (! $res ) {
                                if ( $app->use_timezone ) $app->date_default_timezone_set( $current_tz );
                                $app->ctx->vars = $cache_vars;
                                $app->ctx->local_vars = $cache_local_vars;
                                $app->ctx->__stash = $cache_stash;
                                return $file_path;
                            }
                        }
                        $md5 = $app->comp_url_md5 ? $ui->md5 : null;
                        $hash = md5( $data );
                        $file_saved = false;
                        if ( !$md5 && $fmgr->exists( $file_path ) ) {
                            $md5 = md5_file( $file_path );
                        }
                        $file_size = strlen( bin2hex( $data ) ) / 2;
                        if ( $md5 && $md5 == $hash && file_exists( $file_path )
                            && filesize( $file_path ) == $file_size ) {
                            if ( $ui->is_published != 1 || !$ui->md5 ) {
                                $ui->md5( $hash );
                                $ui->is_published( 1 );
                                $ui->was_published( 1 );
                                if (! $ui->id ) {
                                    $ui->save();
                                } else {
                                    $app->update_urls[ $ui->id ] = $ui;
                                }
                            }
                            if ( $app->use_timezone ) $app->date_default_timezone_set( $current_tz );
                            $app->ctx->vars = $cache_vars;
                            $app->ctx->local_vars = $cache_local_vars;
                            $app->ctx->__stash = $cache_stash;
                            return $file_path;
                        }
                        if ( $fmgr->put( $file_path, $data ) !== false ) {
                            $ui->md5( $hash );
                            $ui->is_published( 1 );
                            $ui->was_published( 1 );
                            $ui->publish_file( 1 );
                            $ui->save();
                            if ( $app->publish_callbacks ) {
                                $callback['name'] = 'post_publish';
                                $callback['urlinfo'] = $ui;
                                $ref = '';
                                $app->run_callbacks( $callback, 'blob', $ref, $data );
                            }
                            $fmgr->update_objs[ $file_path ] = $ui;
                        } else {
                            $ui->is_published( 0 );
                            $ui->publish_file( 0 );
                        }
                    }
                } else {
                    $archive_type = $obj->_model == 'template' ? 'index' : $obj->_model;
                    if ( $date_based ) {
                        $archive_type = $archive_type == 'index' ? '' : $archive_type;
                        $archive_type .= $archive_type ? '-' . strtolower( $date_based )
                                       : strtolower( $date_based );
                    }
                    if ( $archive_type != $ui->archive_type ) {
                        $ui->archive_type( $archive_type );
                        if (! $ui->id ) {
                            $ui->save();
                        } else {
                            $app->update_urls[ $ui->id ] = $ui;
                        }
                    }
                    $ctx->stash( 'current_archive_type', $archive_type );
                    if (! $original ) $original = clone $obj;
                    if ( $app->publish_callbacks ) {
                        $app->init_callbacks( 'template', 'start_publish' );
                        $callback = ['model' => 'template', 'urlmapping' => $urlmapping,
                                     'urlinfo' => $ui, 'ctx' => $ctx->clone(), 'object' => $obj,
                                     'original' => $original, 'unlink' => $unlink,
                                     'template' => $template ];
                        if ( $unpublishd_ui !== null ) {
                            // Callbacks to remove old urlinfo
                            $old_unlink = true;
                            $old_callback = $callback;
                            $old_callback['name'] = 'start_publish';
                            $old_callback['urlinfo'] = $unpublishd_ui;
                            $old_callback['unlink'] = $old_unlink;
                            $app->run_callbacks( $old_callback, 'template', $old_unlink );
                        }
                    }
                    if (! $template && $urlmapping && $urlmapping->id &&
                        $urlmapping->template_id ) {
                        $template = $app->db->model('template')->load(
                            (int) $urlmapping->template_id );
                        if (! $template ) return;
                        $callback['template'] = $template;
                    }
                    $tmpl = $app->linked_file === 2 ? $template->_text( $app ) : $template->text;
                    $compiled = $template->compiled;
                    $cache_key = $template->cache_key;
                    if ( $compiled && $cache_key ) {
                        $ctx->compiled[ $cache_key ] = $compiled;
                    }
                    $ctx->stash( 'current_template', $template );
                    if ( $obj->_model != 'template' ) {
                        $ctx->stash( 'current_context', $obj->_model );
                        $ctx->stash( $obj->_model, $obj );
                    } else {
                        $ctx->stash( 'current_context', '' );
                        $ctx->stash( $obj->_model, '' );
                    }
                    if ( $date_based ) {
                        $ctx->vars['archive_date_based'] = true;
                        $container_model = $urlmapping->container;
                        $container_obj =
                            $app->db->model( $urlmapping->container )->new();
                        $date_col = $app->get_date_col( $container_obj );
                        $ctx->stash( 'archive_date_based_col', $date_col );
                        $ts = $ui->db2ts( $ui->archive_date );
                        list( $title, $start, $end )
                            = $app->title_start_end( $date_based, $ts, $urlmapping );
                        $ctx->stash( 'current_archive_title', $title );
                        $ctx->stash( 'archive_date_based', $ctx->stash( 'current_container' ) );
                        $ctx->stash( 'current_timestamp', $start );
                        $ctx->stash( 'current_timestamp_end', $end );
                    } else {
                        $ctx->vars['archive_date_based'] = false;
                        $ctx->stash( 'current_timestamp', null );
                        $ctx->stash( 'current_timestamp_end', null );
                        $ctx->stash( 'archive_date_based', false );
                        if ( $obj->_model == 'template' ) {
                            $ctx->stash( 'current_archive_type', 'index' );
                            $title = $obj->name;
                        } else {
                            $tPrimary = $table->primary;
                            $title = $obj->$tPrimary;
                            $ctx->stash( 'current_archive_type', $obj->_model );
                        }
                        $ctx->stash( 'current_archive_title', $title );
                    }
                    if (! $ui->archive_type && $ctx->stash( 'current_archive_type' ) ) {
                        $ui->archive_type( $ctx->stash( 'current_archive_type' ) );
                        if (! $ui->id ) {
                            $ui->save();
                        } else {
                            $app->update_urls[ $ui->id ] = $ui;
                        }
                    }
                    $ctx->vars = [];
                    if (! $theme_static = $app->theme_static ) {
                        $theme_static = $app->path . 'theme-static/';
                        $app->theme_static = $theme_static;
                    }
                    $ctx->vars['current_archive_title'] = $ctx->stash( 'current_archive_title' );
                    $ctx->vars['current_container'] = $ctx->stash( 'current_container' );
                    $ctx->vars['theme_static'] = $theme_static;
                    $ctx->vars['application_dir'] = __DIR__;
                    $ctx->vars['application_path'] = $app->path;
                    $ctx->vars['current_archive_type'] =
                        $ctx->stash( 'current_archive_type' );
                    $ctx->vars['current_archive_url'] = $url;
                    $ctx->stash( 'current_archive_url', $url );
                    $ctx->vars['current_archive_model'] = $obj->_model;
                    $ctx->vars['current_object_id'] = $obj->id;
                    $ctx->vars['publish_type'] = $urlmapping ? $urlmapping->publish_file : 1;
                    $ctx->local_vars = [];
                    if ( $publish != $ui->publish_file ) {
                        $ui->publish_file( $publish );
                        if ( $publish != 1 ) {
                            $ui->is_published( 0 );
                        }
                        if (! $ui->id ) {
                            $ui->save();
                        }
                        $app->update_urls[ $ui->id ] = $ui;
                    }
                    $continue = false;
                    if ( $publish == 5 && ( $app->param( '__save_and_publish' ) ||
                        ( $app->worker && $app->worker->meth === 'rebuildFiles' ) ) ) {
                        $continue = true;
                    }
                    $ctx->stash( 'current_urlinfo', $ui );
                    if ( $app->publish_callbacks ) {
                        $callback['name'] = 'start_publish';
                        $app->run_callbacks( $callback, 'template', $unlink );
                    }
                    if ( $unlink ) {
                        if ( $app->use_timezone ) $app->date_default_timezone_set( $current_tz );
                        $app->ctx->vars = $cache_vars;
                        $app->ctx->local_vars = $cache_local_vars;
                        $app->ctx->__stash = $cache_stash;
                        if ( $fmgr->exists( $file_path ) ) {
                            if ( $ui->id ) {
                                $existing = $ui->count( ['file_path' => $ui->file_path,
                                                         'id' => ['!=' => $ui->id ], 'delete_flag' => 0] );
                                if ( $existing ) {
                                    // Existing active other archive's url.
                                    unset( $app->update_urls[ $ui->id ] );
                                    $ui->remove_multi( [ $ui ] );
                                    return $file_path;
                                }
                            }
                        }
                        $ui->is_published( 0 );
                        $ui->remove( false, $skip_empty );
                        unset( $app->update_urls[ $ui->id ] );
                        return $file_path;
                    }
                    if ( !$ctx->stash( $obj->_model ) ) $ctx->stash( $obj->_model, $obj );
                    if ( !$continue && $publish != 1 ) {
                        $ui->key( '' );
                        if ( $publish == 2 ) {
                            if ( $ui->id ) {
                                $app->delayed[ $ui->id ] = $ui;
                            } else {
                                $continue = true;
                            }
                        } elseif ( $publish == 3 || $publish == 6 ) {
                            // On demand or Dynamic
                            if ( $fmgr->exists( $file_path ) ) {
                                $fmgr->unlink( $file_path, $ui );
                                $app->remove_dirs[] = dirname( $file_path );
                            }
                            if (! $ui->id ) {
                                $continue = true;
                            }
                            $app->update_urls[ $ui->id ] = $ui;
                        } elseif ( $publish == 4 ) {
                            // Queue
                            $ui->is_published( 0 );
                            $ui->delete_flag( 0 );
                            if ( $app->mode === 'rebuild_phase' ) {
                                $ui->key( 'rebuild_phase' );
                            }
                        }
                        $ui->save();
                        if (! $continue ) {
                            if ( $app->use_timezone ) $app->date_default_timezone_set( $current_tz );
                            $app->ctx->vars = $cache_vars;
                            $app->ctx->local_vars = $cache_local_vars;
                            $app->ctx->__stash = $cache_stash;
                            return $file_path;
                        }
                    } else {
                        $ctx->stash( 'current_object', $obj );
                        $ctx->force_compile = $app->force_compile;
                        if ( $app->publish_callbacks ) {
                            $app->init_callbacks( 'template', 'pre_publish' );
                            $callback['name'] = 'pre_publish';
                            $res = $app->run_callbacks( $callback, 'template', $tmpl );
                            if (! $res ) {
                                if ( $app->use_timezone ) $app->date_default_timezone_set( $current_tz );
                                $app->ctx->vars = $cache_vars;
                                $app->ctx->local_vars = $cache_local_vars;
                                $app->ctx->__stash = $cache_stash;
                                return $file_path;
                            }
                        }
                        $cache_key .= $cache_key ? '.view' : '';
                        if (! $app->init_tags ) $app->init_tags();
                        $start_time = microtime( true );
                        $ctx->template_paths = [];
                        $data = $ctx->build( $tmpl, false, $cache_key );
                        if (! $data && $tmpl ) {
                            $template->compiled('');
                            $template->save();
                            $clone = $ctx->clone();
                            $clone->force_compile = true;
                            $data = $clone->build( $tmpl );
                        }
                        if ( $app->performance_logging ) {
                            $build_time = microtime( true ) - $start_time;
                            if ( $app->performance_logging_threshold < $build_time ) {
                                $build_time = round( $build_time, 4 );
                                $tmpl_name = $template->name;
                                $tmpl_wsid = $template->workspace_id;
                                $msg = "{$file_path}\t{$build_time}\tworkspace_id={$tmpl_wsid}"
                                     . "\tmodel=" . $obj->_model . "\tview={$tmpl_name}\tpublish_file="
                                     . $urlmapping->publish_file;
                                error_log( $app->date( 'Y-m-d H:i:s T' ) . "\t" . $msg . PHP_EOL, 3,
                                           $app->log_dir . DS . 'performance.log' );
                            }
                        }
                        if ( $app->publish_callbacks ) {
                            $app->init_callbacks( 'template', 'post_rebuild' );
                            $callback['name'] = 'post_rebuild';
                            $app->run_callbacks( $callback, 'template', $tmpl, $data );
                        }
                        $old_hash = $app->comp_url_md5 ? $ui->md5 : null;
                        $hash = md5( $data );
                        $app->ctx->vars = $cache_vars;
                        $app->ctx->local_vars = $cache_local_vars;
                        $app->ctx->__stash = $cache_stash;
                        $ui->md5( $hash );
                        if ( $ui->id ) {
                            $app->update_urls[ $ui->id ] = $ui;
                        }
                        if ( $fmgr->exists( $file_path ) ) {
                            $old = $old_hash
                                 ? $old_hash : md5( $fmgr->get( $file_path ) );
                            if ( $old === $hash ) {
                                if (! $ui->is_published ) {
                                    $ui->is_published( 1 );
                                    $ui->was_published( 1 );
                                    if (! $ui->id ) {
                                        $ui->save();
                                    } else {
                                        $app->update_urls[ $ui->id ] = $ui;
                                    }
                                }
                                if ( $app->use_timezone ) $app->date_default_timezone_set( $current_tz );
                                $app->ctx->vars = $cache_vars;
                                $app->ctx->local_vars = $cache_local_vars;
                                $app->ctx->__stash = $cache_stash;
                                return $file_path;
                            }
                        }
                        if ( $fmgr->put( $file_path, $data, $ui )!== false ) {
                            $ui->is_published( 1 );
                            $ui->was_published( 1 );
                            if ( $app->publish_callbacks ) {
                                $app->init_callbacks( 'template', 'post_publish' );
                                $callback['name'] = 'post_publish';
                                $callback['urlinfo'] = $ui;
                                $app->run_callbacks( $callback, 'template', $tmpl, $data );
                            }
                        } else {
                            $ui->is_published( 0 );
                            $ui->publish_file( 0 );
                        }
                    }
                }
            } else {
                $ui->is_published( 0 );
                if ( $fmgr->exists( $file_path ) ) {
                    $fmgr->unlink( $file_path, $ui );
                    $app->remove_dirs[] = dirname( $file_path );
                }
            }
        }
        if ( $unlink ) {
            if ( $ui->id ) $ui->remove( false, $skip_empty );
        } else {
            $date_based = $ctx->stash( 'archive_date_based' );
            if ( $date_based && ! $ui->archive_date && $ctx->stash( 'current_timestamp' ) ) {
                $ui->archive_date( $ctx->stash( 'current_timestamp' ) );
            } else {
                if (! $ui->archive_date ) {
                    $ui->archive_date('');
                }
            }
            if (! $ui->archive_type && $ctx->stash( 'current_archive_type' ) ) {
                $ui->archive_type( $ctx->stash( 'current_archive_type' ) );
            }
            if (! $ui->mime_type ) {
                $mime_type = PTUtil::get_mime_type( $file_path );
                $ui->mime_type( $mime_type );
            }
            if (!$ui_exists ) {
                $terms = ['model' => $ui->model, 'key' => $ui->key,
                          'object_id' => $ui->object_id,
                          'class' => $ui->class, 'urlmapping_id' => $ui->urlmapping_id,
                          'archive_type' => $ui->archive_type,
                          'archive_date' => $ui->archive_date,
                          'workspace_id' => $ui->workspace_id ];
                $old = $db->model( 'urlinfo' )->get_by_key( $terms );
                if ( $old->id ) {
                    $ui->id( $old->id );
                    $old_path = $old->file_path;
                    $old_path = str_replace( DS, '/', $old_path );
                    if ( $old_path && $old_path
                        !== $file_path && $fmgr->exists( $old_path ) ) {
                        $fmgr->unlink( $old_path, $ui );
                        $app->remove_dirs[] = dirname( $old_path );
                    }
                }
            }
            $ui->save();
            unset( $app->update_urls[ $ui->id ] );
        }
        if ( $publish == 2 && !$unlink ) {
            $app->delayed[ $ui->id ] = $ui;
        }
        if ( $app->use_timezone ) $app->date_default_timezone_set( $current_tz );
        $app->ctx->vars = $cache_vars;
        $app->ctx->local_vars = $cache_local_vars;
        $app->ctx->__stash = $cache_stash;
        return $file_path;
    }

    function pre_fetch ( $ctx, $cache_key, $compiled ) {
        if (! $cache_key || !$compiled ) return false;
        $existing = false;
        if (! $this->force_prefetch ) {
            if (! $this->cache_driver ) {
                $compile_path = $this->compile_dir;
                $prefix = $ctx->prefix;
                $compile_path = "{$compile_path}{$prefix}__{$cache_key}.php";
                $existing = $this->fmgr->exists( $compile_path );
            } else {
                $existing = $ctx->cache_driver->exists( 'compiled' . DS . $cache_key );
            }
        }
        if (! $existing ) {
            return $ctx->set_cache( $cache_key, $compiled );
        }
        return false;
    }

    function publish_dependencies ( $obj, $original = null, $mapping = null, $publish = true,
        &$published_on_request = [] ) {
        $app = $this;
        $relations = [];
        $to_obj = $mapping->model;
        if ( $mapping->model !== 'template' ) {
            $to_obj = $mapping->model;
            $relations = $app->get_relations( $obj, $to_obj );
            if ( $original ) {
                $orig_relations = $original->_relations ?? [];
                // Merged other related models.
                foreach ( $orig_relations as $idx => $orig_rel ) {
                    if ( $orig_rel->to_obj !== $to_obj ) {
                        unset( $orig_relations[ $idx ] );
                    }
                }
                $relations = array_merge( $relations, $orig_relations );
            }
        } else {
            if ( $app->republish_date_based && $mapping->date_based ) {
                $app->publish_obj( $mapping->template, null, false, false, true, [ $mapping ] );
                return true;
            }
            $template = $mapping->template;
            if ( $template && $template->id ) {
                $relation = $app->db->model( 'relation' )->get_by_key(
                    ['to_obj' => 'template', 'to_id' => $template->id ]
                );
                $relations[] = $relation;
            }
        }
        if (!$original ) $original = clone $obj;
        $to_obj = $mapping->model;
        $table = $app->get_table( $to_obj );
        $published_ids = [];
        foreach ( $relations as $relation ) {
            $id = $relation->to_id;
            if (!$mapping->date_based && in_array( $id, $published_ids ) ) {
                continue;
            }
            $dependencie = $app->db->model( $to_obj )->load( $id );
            if ( is_object( $dependencie ) ) {
                $ts = '';
                $orig_ts = '';
                if ( $date_based = $mapping->date_based ) {
                    $date_col = $app->get_date_col( $obj );
                    if (!$date_col ) {
                        continue;
                    }
                    $date = $obj->$date_col;
                    $orig_date = $original->$date_col;
                    $date = $obj->db2ts( $date );
                    $orig_date = $obj->db2ts( $orig_date );
                    $ts = $date;
                    $orig_ts = $orig_date;
                    if ( stripos( $date_based, 'Year' ) !== false ) {
                        $date = substr( $date, 0, 4 );
                        $orig_date = substr( $orig_date, 0, 4 );
                    } else {
                        $date = substr( $date, 0, 6 );
                        $orig_date = substr( $orig_date, 0, 6 );
                    }
                    if ( $date == $orig_date && in_array( $id, $published_ids ) ) {
                        continue;
                    }
                    $y = substr( $ts, 0, 4 );
                    $m = substr( $ts, 4, 2 );
                    if ( $orig_ts != $ts ) {
                        $orig_y = substr( $orig_ts, 0, 4 );
                        $orig_m = substr( $orig_ts, 4, 2 );
                    } else {
                        $orig_ts = null;
                    }
                    if ( $date_based == 'Fiscal-Yearly' ) {
                        $fy_start = $mapping->fiscal_start;
                        if ( $m < $fy_start ) {
                            $y--;
                        }
                        if ( strlen( $fy_start ) == 1 ) {
                            $fy_start = '0' . $fy_start;
                        }
                        $ts = "{$y}{$fy_start}01000000";
                        if ( $orig_ts && $orig_ts != $ts ) {
                            if ( $orig_m < $fy_start ) {
                                $orig_y--;
                            }
                            $orig_ts = "{$orig_y}{$fy_start}01000000";
                        }
                    } else if ( $date_based == 'Yearly' ) {
                        $ts = "{$y}0101000000";
                        if ( $orig_ts && $orig_ts != $ts ) {
                            $orig_ts = "{$orig_y}0101000000";
                        }
                    } else if ( $date_based == 'Monthly' ) {
                        $ts = "{$y}{$m}01000000";
                        if ( $orig_ts && $orig_ts != $ts ) {
                            $orig_ts = "{$orig_y}{$orig_m}01000000";
                        }
                    }
                }
                if ( $publish ) {
                    $cache_key = $dependencie->id . '-' . $mapping->id . '-' .
                                 $table->name . '-' . $ts;
                    if ( isset( $published_on_request[ $cache_key ] ) ) {
                        continue;
                    }
                    $published_on_request[ $cache_key ] = true;
                    $file_path = $app->build_path_with_map( $dependencie, $mapping, $table, $ts );
                    if ( $file_path !== false ) {
                        $app->delayed_dependencies[ $file_path ] = [ $dependencie, $mapping, null, $ts ];
                    } else {
                        if ( $date_based ) {
                            $uis = $app->db->model( 'urlinfo' )->load(
                                  ['archive_type' => strtolower( $date_based ),
                                   'archive_date' => $obj->ts2db( $ts ), 'urlmapping_id' => $mapping->id ], null, 'id,workspace_id' );
                        } else {
                            $uis = $app->db->model( 'urlinfo' )->load(
                                  ['model' => $dependencie->_model,
                                   'object_id' => $dependencie->id, 'urlmapping_id' => $mapping->id ], null, 'id,workspace_id' );
                        }
                        foreach ( $uis as $ui ) $ui->remove();
                    }
                    if ( $orig_ts ) {
                        $orig_path = $app->build_path_with_map( $dependencie, $mapping, $table, $orig_ts );
                        if ( $orig_path !== false ) {
                            $app->delayed_dependencies[ $orig_path ] = [ $dependencie, $mapping, null, $orig_ts ];
                        } else {
                            if ( $date_based ) {
                                $uis = $app->db->model( 'urlinfo' )->load(
                                      ['archive_type' => strtolower( $date_based ),
                                       'archive_date' => $obj->ts2db( $orig_ts ),
                                       'urlmapping_id' => $mapping->id ], null, 'id' );
                                foreach ( $uis as $ui ) $ui->remove();
                            }
                        }
                    }
                } else {
                    $dependencies = $app->stash( 'rebuild_dependencies' ) ?
                                    $app->stash( 'rebuild_dependencies' ) : [];
                    $publish_ids  = isset( $dependencies[ $dependencie->_model ] ) ?
                                    $dependencies[ $dependencie->_model ] : [];
                    if (! in_array( $dependencie->id, $publish_ids ) ) {
                        $publish_ids[] = (int) $dependencie->id;
                    }
                    $dependencies[ $dependencie->_model ] = $publish_ids;
                    $app->stash( 'rebuild_dependencies', $dependencies );
                }
                $published_ids[] = $id;
            }
        }
    }

    function get_date_col ( $obj ) {
        $prop = $obj->_model . '_date_based_col';
        if ( $this->$prop && $obj->has_column( $this->$prop ) ) {
            return $this->$prop;
        }
        $date_col = '';
        if ( $obj->has_column( 'published_on' ) ) {
            $date_col = 'published_on';
        } else {
            $obj_table = $this->get_table( $obj->_model );
            $col = $this->db->model( 'column' )->load(
              ['table_id' => $obj_table->id, 'type' => 'datetime'],
              ['limit' => 1, 'sort' => 'order', 'direction' => 'ascend'] );
            if ( is_array( $col ) && !empty( $col ) ) {
                $col = $col[0];
                $date_col = $col->name;
            }
        }
        return $date_col;
    }

    function save_filter_workspace ( &$cb, $app, $obj ) {
        $url = $obj->site_url;
        if ( $url && !$app->is_valid_url( $url, $msg ) ) {
            $cb['error'] = $msg;
        } else {
            if ( mb_substr( $url, -1 ) != '/' ) $url .= '/';
            $obj->site_url( $url );
        }
        $path = $obj->site_path;
        $path = rtrim( $path, DS );
        $obj->site_path( $path );
        return true;
    }

    function get_user_opt ( $key, $kind, $workspace_id = null ) {
        $app = $this;
        if ( $app->stash( 'user_options' ) ) return $app->stash( 'user_options' );
        $user = $app->user();
        $terms = ['user_id' => $user->id, 'key' => $key , 'kind' => $kind ];
        $workspace_id = (int) $workspace_id;
        $terms['workspace_id'] = $workspace_id;
        $list_option = $app->db->model( 'option' )->get_by_key( $terms );
        $app->stash( 'user_options', $list_option );
        return $list_option;
    }

    function get_scheme_from_db ( $model, $force = false ) {
        $app = $this;
        if ( is_object( $model ) ) $model = $model->_model;
        if ( $app->stash( 'scheme:' . $model ) && ! $force )
            return $app->stash( 'scheme:' . $model );
        $db = $app->db;
        $language = $app->language;
        $cache_key = $model . DS . "scheme_{$language}__c";
        if (! $force ) {
            if ( $scheme = $app->get_cache( $cache_key, true ) ) {
                if ( isset( $scheme['column_defs'] ) ) {
                    $db->scheme[ $model ] = $scheme;
                    $db->stash( $model, $scheme );
                    $db->scheme[ $model ]['column_defs'] = $scheme['column_defs'];
                    $db->stash( "column_defs_{$model}", $scheme['column_defs'] );
                    $db->stash( "blob_cols_{$model}_0", null );
                    $app->stash( 'scheme:' . $model, $scheme );
                    return $scheme;
                }
            }
        }
        $table = $app->get_table( $model );
        if (!$table || !$table->id ) {
            $db->model( $model )->set_scheme_from_json( $model );
            return isset( $db->scheme[ $model ] ) ? $db->scheme[ $model ] : null;
        }
        $obj_label = $app->translate( $table->label );
        $obj = $db->model( $model )->new();
        $scheme = $obj->_scheme;
        if (!$scheme ) $scheme = [];
        $vars = ['column_defs', 'indexes', 'list', 'edit', 'labels', 'unique', 'unchangeable',
                 'autoset', 'locale', 'relations', 'col_options', 'col_extras', 'translates',
                 'hints', 'disp_edit', 'validations', 'maxlength'];
        foreach ( $vars as $v ) $$v = [];
        $locale['default'] = [];
        $lang = $app->user() ? $app->user()->language : $app->language;
        $locale[ $lang ] = [];
        $scheme['version'] = $table->version;
        if ( $table->do_not_output ) {
            $scheme['do_not_output'] = $table->do_not_output;
        } else {
            unset( $scheme['do_not_output'] );
        }
        $scheme['label'] = $table->label;
        $scheme['plural'] = $table->plural;
        $locale[ $lang ][ $table->name ] = $app->translate( $table->name );
        $locale[ $lang ][ $table->label ] = $app->translate( $table->label );
        $locale[ $lang ][ $table->plural ] = $app->translate( $table->plural );
        $columns = $db->model( 'column' )->load_iter( ['table_id' => $table->id ], null );
        $columns = $columns->fetchAll( PDO::FETCH_ASSOC );
        if (! count( $columns ) ) return null;
        array_multisort( array_column( $columns, 'column_order' ), SORT_ASC, $columns );
        $updated = [];
        foreach ( $columns as $result ) {
            $col_name = $result['column_name'];
            $props = [];
            $props['type'] = $result['column_type'];
            if ( $result['column_type'] == 'relation' ) {
                $column = $db->model( 'column' )->new( $result );
                $options = $column->options;
                if (! $options ) {
                    $options = $column->edit ? $column->edit : $column->list;
                    if (! $options ) continue;
                    $options = explode( ':', $options );
                    $options = isset( $options[1] ) ? $options[1] : '';
                    if (! $options ) continue;
                    $column->options( $options );
                    $updated[] = $column;
                }
                $relations[ $col_name ] = $options;
            } else if ( $result['column_options'] ) {
                $col_options[ $col_name ] = $result['column_options'];
            }
            if ( $result['column_extra'] ) {
                $col_extras[ $col_name ] = $result['column_extra'];
            }
            if ( isset( $result['column_validation_type'] ) && $result['column_validation_type'] ) {
                $validations[ $col_name ] = $result['column_validation_type'];
            }
            if ( isset( $result['column_maxlength'] ) && $result['column_maxlength'] ) {
                $maxlength[ $col_name ] = $result['column_maxlength'];
            }
            if ( $result['column_size'] ) {
                if ( $props['type'] == 'decimal' ) {
                    $props['type'] = $props['type'] . '(' . $result['column_size'] . ')';
                } else {
                    $props['size'] = (int) $result['column_size'];
                }
            }
            $not_null = $result['column_not_null'];
            if ( $not_null ) $props['not_null'] = 1;
            if ( $result['column_default'] !== '' ) $props['default'] = $result['column_default'];
            $column_defs[ $result['column_name'] ] = $props;
            if ( $result['column_is_primary'] ) $indexes['PRIMARY'] = $col_name;
            if ( $result['column_index'] ) $indexes[ $col_name ] = $col_name;
            if ( $result['column_list'] ) $list[ $col_name ] = $result['column_list'];
            if ( $result['column_edit'] ) $edit[ $col_name ] = $result['column_edit'];
            if ( $result['column_unique'] ) $unique[] = $col_name;
            if ( $result['column_unchangeable'] ) $unchangeable[] = $col_name;
            if ( $result['column_autoset'] ) $autoset[] = $col_name;
            if ( $result['column_translate'] ) $translates[] = $col_name;
            if ( $result['column_hint'] ) $hints[ $col_name ] = $result['column_hint'];
            if ( $result['column_disp_edit'] ) $disp_edit[ $col_name ] = $result['column_disp_edit'];
            $label = $result['column_label'];
            $app->dictionary['default'][ $col_name ] = $label;
            $locale['default'][ $col_name ] = $label;
            $trans_label = $app->translate( $label );
            $locale[ $lang ][ $label ] = $trans_label;
            $labels[ $col_name ] = $label;
        }
        unset( $columns );
        if ( count( $updated ) ) {
            foreach ( $updated as $column ) $column->save();
        }
        if ( $table->primary ) $scheme['primary'] = $table->primary;
        $options = ['auditing', 'order', 'sortable', 'hierarchy', 'start_end',
                    'menu_type', 'template_tags', 'taggable', 'display_space',
                    'has_extra_path', 'has_basename', 'has_status', 'assign_user',
                    'revisable', 'max_revisions', 'allow_comment', 'default_status',
                    'has_form', 'show_activity', 'has_uuid', 'has_assets', 'taxonomy',
                    'has_attachments', 'can_duplicate', 'allow_identical', 'im_export'];
        foreach ( $options as $option ) {
            if ( $table->$option ) $scheme[ $option ] = (int) $table->$option;
        }
        if ( $table->display_system )
            $scheme['display_system'] = 1;
        if ( $table->has_attachments )
            $scheme['has_attachments'] = 1;
        if ( $table->can_duplicate )
            $scheme['can_duplicate'] = 1;
        $scheme['column_defs'] = $column_defs;
        $scheme['relations'] = $relations;
        $scheme['options'] = $col_options;
        $scheme['extras'] = $col_extras;
        if (! empty( $translates ) ) $scheme['translate'] = $translates;
        if (! empty( $hints ) ) $scheme['hint'] = $hints;
        $sort_by = $table->sort_by;
        $sort_order = $table->sort_order ? $table->sort_order : 'ascend';
        if ( $sort_by && $sort_order ) $scheme['sort_by'] = [ $sort_by => $sort_order ];
        if ( $table->space_child ) $scheme['child_of'] = 'workspace';
        if (! empty( $autoset ) ) $scheme['autoset'] = $autoset;
        $db->scheme[ $model ]['column_defs'] = $column_defs;
        $db->stash( "column_defs_{$model}", $column_defs );
        $db->stash( "blob_cols_{$model}_0", null );
        $scheme['indexes'] = $indexes;
        // Always prioritize DB settings.
        $scheme['unique'] = $unique;
        $scheme['unchangeable'] = $unchangeable;
        $scheme['validation_types'] = $validations;
        $scheme['maxlength'] = $maxlength;
        $scheme['disp_edit'] = $disp_edit;
        $scheme['edit_properties'] = $edit;
        $scheme['list_properties'] = $list;
        $scheme['labels'] = $labels;
        $scheme['label'] = $obj_label;
        $scheme['locale'] = $locale;
        // $app->clear_cache( $model . DS ); # Leave cache for other languages.
        $app->stash( 'scheme:' . $model, $scheme );
        $app->set_cache( $cache_key, $scheme, true );
        return $scheme;
    }

    function validate_magic ( $json = false ) {
        $app = $this;
        $is_valid = true;
        if (!$app->user() && !$app->current_magic ) $is_valid = false;
        if ( $is_valid ) {
            $token = $app->param( 'magic_token' );
            if (!$token || $token !== $app->current_magic ) $is_valid = false;
            if ( $is_valid && $app->verify_referrer ) {
                $referer = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : null;
                if (! $referer ) {
                    $is_valid = false;
                } else {
                    $parse_url = parse_url( $referer );
                    $parse_admin = parse_url( $app->script_uri );
                    if ( $parse_url && $parse_admin
                        && $parse_url['scheme'] == $parse_admin['scheme']
                        && $parse_url['host']   == $parse_admin['host'] ) {
                        $is_valid = true;
                    } else {
                        $is_valid = false;
                    }
                }
            }
        }
        if (!$is_valid ) {
            if ( $json ) {
                $app->json_error( 'Invalid request.', 403 );
            }
            return $app->error( 'Invalid request.' );
        }
        return true;
    }

    function recover_password ( $app, $model = 'user', $return_url = '' ) {
        $token = $app->param( 'token' );
        if ( $token ) {
            $session = $app->db->model( 'session' )->get_by_key(
                ['name' => $token, 'kind' => 'RP'] );
            if (!$session->id ) {
                $error = $app->translate( 'Your request to reset your password has expired.' );
                $app->ctx->vars['reset_expired'] = 1;
                $app->ctx->vars['error'] = $error;
                return $app->__mode( 'start_recover' );
            }
        }
        if ( $app->request_method === 'POST' ) {
            $type = $app->param( '_type' );
            if ( $type && $type === 'new_password' ) {
                if (! isset( $session ) ) {
                    return $app->error( 'Invalid request.' );
                }
                $password = $app->param( 'password' );
                $verify = $app->param( 'password-verify' );
                if (!$app->is_valid_password( $password, $verify, $msg ) ) {
                    $app->assign_params( $app, $app->ctx, true );
                    $app->ctx->vars['error'] = $password ? $msg : $app->translate( 'Please enter your password.' );
                    $app->param( '_type', 'recover' );
                    return $app->__mode( 'start_recover' );
                }
                $user = $app->db->model( $model )->load( $session->user_id );
                if (!$user ) {
                    return $app->error( 'Invalid request.' );
                }
                $password = password_hash( $password, PASSWORD_BCRYPT );
                $user->password( $password );
                $user->lock_out( 0 );
                $app->user = $user;
                $app->set_default( $user );
                $cfgs = $app->stash( 'configs' );
                $lockout_interval = isset( $cfgs['lockout_interval'] )
                     ? $cfgs['lockout_interval']->value : 600;
                $from = date("Y-m-d H:i:s", $app->request_time - $lockout_interval );
                $logs = $app->db->model( 'log' )->load(
                    ['object_id' => $user->id, 'model' => 'user', 'level' => 8,
                     'category' => 'login', 'created_on' => ['>' => $from ] ], [], 'id,level' );
                foreach ( $logs as $log ) {
                    $log->level( 2 );
                    $app->set_default( $log );
                    $log->save();
                }
                if ( $app->recover_ip_at_reset ) {
                    $banned = $app->db->model( 'remote_ip' )->get_by_key(
                        ['ip_address' => $app->remote_ip, 'class' => 'banned'] );
                    if ( $banned->id ) {
                        $banned->class( 'info' );
                        $app->set_default( $banned );
                        $banned->save();
                    }
                    $lockout_interval = isset( $cfgs['ip_lockout_interval'] )
                         ? $cfgs['ip_lockout_interval']->value : 600;
                    $from = date("Y-m-d H:i:s", $app->request_time - $lockout_interval );
                    $logs = $app->db->model( 'log' )->load(
                        ['remote_ip' => $app->remote_ip, 'model' => 'user', 'level' => 8,
                         'category' => 'login', 'created_on' => ['>' => $from ] ], [], 'id,level' );
                    foreach ( $logs as $log ) {
                        $log->level( 2 );
                        $app->set_default( $log );
                        $log->save();
                    }
                }
                $app->init_callbacks( $model, 'recover_password' );
                $callback = ['name' => 'recover_password', 'model' => $model ];
                $app->run_callbacks( $callback, $model, $user );
                $user->save();
                $session->remove();
                $return_url = $return_url ? $return_url : $app->param( 'return_url' );
                if (! is_string( $return_url ) ) $return_url = '';
                if ( strpos( $return_url, 'http' ) === 0 ) {
                    $return_url = preg_replace( '!^https{0,1}://[^/]*!', '', $return_url );
                } else if ( strpos( $return_url, '/' ) === 0 ) {
                    $return_url = preg_replace( '!^/\s*/!u', '/', $return_url ); // sanitize "^//" and "^/\s+/" .
                }
                if (! $return_url ) $return_url = $app->admin_url . '?__mode=login&recovered=1';
                $app->redirect( $return_url );
            } else {
                $email = $app->param( 'email' );
                if (!$app->is_valid_email( $email, $msg ) ) {
                    $app->assign_params( $app, $app->ctx, true );
                    $app->ctx->vars['error'] = $msg;
                    return $app->__mode( 'start_recover' );
                }
                $user = $app->db->model( $model )->get_by_key( ['email' => ['BINARY' => $email ] ] );
                if ( $user->id ) {
                    $status_published = $app->status_published( $model );
                    if ( $status_published && $user->status != $status_published ) {
                        $user = null;
                    } else if ( $user->has_column( 'delete_flag' ) && $user->delete_flag ) {
                        $user = null;
                    }
                } else {
                    $user = null;
                }
                if ( $user ) {
                    $session_id = $app->magic();
                    $ctx = $app->ctx;
                    $ctx->vars['token'] = $session_id;
                    $app->set_mail_param( $ctx );
                    $subject = null;
                    $body = null;
                    $template = null;
                    $body = $app->get_mail_tmpl( 'recover_password', $template );
                    if ( $template ) {
                        $subject = $template->subject;
                    }
                    if (! $subject ) {
                        $subject = $app->translate( 'Password Recovery' );
                    }
                    $body = $app->build( $body );
                    $subject = $app->build( $subject );
                    $session = $app->db->model( 'session' )->get_by_key(
                        ['name' => $session_id, 'kind' => 'RP'] );
                    $session->start( $app->request_time );
                    $session->expires( $app->request_time + $app->auth_expires );
                    $session->user_id( $user->id );
                    $session->save();
                    if (! PTUtil::send_mail( $email, $subject, $body, [], $error ) ) {
                        $error = $error ? $error
                               : $app->translate( 'Failed to send a %s email.',
                                 $app->translate( 'Password Recovery' ) );
                        $app->ctx->vars['error'] = $error;
                        return $app->__mode( 'start_recover' );
                    }
                }
                $app->ctx->vars['header_alert_message'] = $app->translate(
                        'An email with a link to reset your password has been sent'
                        .' to your email address (%s).', $email );
            }
            $app->ctx->vars['recovered'] = 1;
            return $app->__mode( 'start_recover' );
        } else {
            return $app->__mode( 'start_recover' );
        }
    }

    function set_config ( $cfgs, $workspace_id = 0 ) {
        $app = $this;
        $update = false;
        foreach ( $cfgs as $key => $value ) {
            $option = $app->db->model( 'option' )->get_by_key(
                ['key' => $key, 'kind' => 'config', 'workspace_id' => $workspace_id ] );
            if ( $option->value != $value ) {
                $option->value( $value );
                $option->save();
                $update = true;
                if ( count( $cfgs ) === 1 ) {
                    $app->clear_cache( 'app_configs__c' );
                    return $option;
                }
            }
            if ( count( $cfgs ) === 1 ) {
                return $option;
            }
        }
        if ( $update ) {
            $app->clear_cache( 'app_configs__c' );
        }
    }

    function get_config ( $key = null, $workspace_id = 0 ) {
        $app = $this;
        if (!$key )
            return $app->db->model( 'option' )->load(
              ['kind' => 'config', 'workspace_id' => $workspace_id ] );
        $config_name = $workspace_id ? 'configs_' . $workspace_id : 'configs';
        $configs = $app->stash( $config_name );
        if ( $configs && isset( $configs[ $key ] ) ) return $configs[ $key ];
        $cfg = $app->db->model( 'option' )->get_by_key(
            ['kind' => 'config', 'key' => $key, 'workspace_id' => $workspace_id ] );
        return $cfg->id ? $cfg : null;
    }

    function assign_params ( $app, $ctx, $raw = false ) {
        $params = $app->param();
        $obj = is_object( $raw ) ? $raw : null;
        $prefix = is_string( $raw ) ? $raw : 'forward_';
        $raw = is_bool( $raw ) ? $raw : false;
        foreach( $params as $key => $value ) {
            if ( $raw ) $ctx->vars[ $key ] = $value;
            $ctx->__stash[ $prefix . $key ] = $value;
            $ctx->vars[ $prefix . $key ] = $value;
            if ( preg_match( "/(^.*)_date$/", $key, $mts ) ) {
                if ( $value ) {
                    $name = $mts[1];
                    if ( isset( $_REQUEST[ $name . '_time' ] ) ) {
                        $time = $app->param( $name . '_time' )
                              ? $app->param( $name . '_time' ) : '000000';
                        $ctx->__stash[ $prefix . $name ] = $value . $time;
                    }
                }
            }
            if ( $key === 'permission' && $value ) {
                $ctx->vars['error'] = $app->translate( 'Permission denied.' );
            }
        }
        if ( $obj && $obj->has_column( 'modified_on' ) ) {
            $ctx->__stash[ $prefix . 'modified_on'] = $obj->modified_on;
            $ctx->__stash[ $prefix . 'created_on'] = $obj->created_on;
            $ctx->__stash[ $prefix . 'modified_by'] = $obj->modified_by;
            $ctx->__stash[ $prefix . 'created_by'] = $obj->created_by;
        }
    }

    function stash ( $name, $value = false, $var = null ) {
        if ( isset( $this->stash[ $name ] ) ) $var = $this->stash[ $name ];
        if ( $value !== false ) $this->stash[ $name ] = $value;
        return $var;
    }

    function get_assetproperty ( $obj, $name, $property = 'all' ) {
        $app = $this;
        $model = is_object( $obj ) ? $obj->_model : $app->param( '_model' );
        $obj_id = is_object( $obj ) ? $obj->id : (int) $app->param('id');
        $ctx = $app->ctx;
        $session = $ctx->stash( 'current_session_' . $name );
        if ( $property === 'url' || $property === 'relative_path' ) {
            if (! $session ) {
                if ( isset( $obj->__session ) ) {
                    $session = $obj->__session;
                }
            }
            if ( $session ) {
                $screen_id = $app->param( '_screen_id' );
                $params = '?__mode=view&amp;_type=edit&amp;_model=' . $model;
                $params .= '&amp;id=' . $obj_id . '&amp;view=' . $name 
                        . '&amp;_screen_id=' . $screen_id;
                if ( $workspace = $app->workspace() ) {
                    $params .= '&amp;workspace_id=' . $workspace->id;
                }
                return $app->admin_url . $params;
            }
            if ( is_object( $obj ) ) {
                $ui = $app->db->model( 'urlinfo' )->load( ['model' => $model,
                    'object_id' => $obj_id, 'key' => $name, 'delete_flag' => [0, 1] ],
                    ['sort' => ['delete_flag' => 'ascend', 'id' => 'descend']]
                );
                if ( is_array( $ui ) && !empty( $ui ) ) {
                    $value = $ui[0]->$property;
                    if ( count( $ui ) > 1 && $ui[0]->delete_flag ) {
                        $meta = $app->db->model( 'meta' )->get_by_key( ['model' => $model,
                                'kind' => 'metadata', 'key' => $name, 'object_id' => $obj_id ] );
                        if ( $meta->id ) {
                            $metadata = json_decode( $meta->text, true );
                            if ( $obj->_model == 'asset' ) {
                                $file_name = $metadata['file_name'];
                                $ds = DS;
                                $value = preg_replace( "!{$ds}[^{$ds}]*$!", $ds . $file_name, $value );
                            } else {
                                $extension = $metadata['extension'];
                                if (! preg_match( "/{$extension}$/", $value ) ) {
                                    $before = PTUtil::get_extension( $value );
                                    $value = preg_replace( "/{$before}$/i", $extension, $value );
                                }
                            }
                        }
                    }
                    return $value;
                }
                return '';
            }
        }
        $data = '';
        if ( isset( $ctx->vars['forward_params'] ) || $session ) {
            $screen_id = $ctx->vars['screen_id'];
            $screen_id .= '-' . $name;
            $cache = $ctx->stash( $model . '_session_' . $screen_id . '_' . $obj_id );
            if (!$session ) {
                $session = $cache ? $cache : $app->db->model( 'session' )->get_by_key(
                ['name' => $screen_id, 'user_id' => $app->user()->id ] );
            }
            $ctx->stash( $model . '_session_' . $screen_id . '_' . $obj_id, $session );
            if ( $session->id ) {
                $data = $session->text;
            }
        }
        if (! $data ) {
            $name = strtolower( $name );
            $cache = $ctx->stash( $model . '_meta_' . $name . '_' . $obj_id );
            $metadata = $cache ? $cache : $app->db->model( 'meta' )->get_by_key(
                     ['model' => $model, 'object_id' => $obj_id,
                      'kind' => 'metadata', 'key' => $name ] );
            $ctx->stash( $model . '_meta_' . $name . '_' . $obj_id, $metadata );
            if (!$metadata->id && !$metadata->text) {
                return ( $property === 'all' ) ? [] : null;
            }
            $data = $metadata->text;
        }
        $data = is_string( $data ) ? json_decode( $data, true ) : $data;
        if ( $property === 'all' ) {
            return $data;
        }
        if ( isset( $data[ $property ] ) ) {
            return $data[ $property ];
        }
        return null;
    }

    function can_im_export ( $app, $workspace, $menu ) {
        $terms = ['im_export' => 1];
        if ( $workspace ) {
            $terms['display_space'] = 1;
        } else {
            $terms['display_system'] = 1;
        }
        return $app->db->model( 'table' )->count( $terms, null, 'id' );
    }

    function can_manage_scheme ( $app, $workspace, $menu = null ) {
        if ( $app->user() && $app->user()->is_superuser ) return true;
        if ( $app->can_do( 'manage_plugins', null, null, $workspace ) ) {
            return true;
        } else if ( $app->can_do( 'table', 'create', null, $workspace ) ) {
            return true;
        }
        return false;
    }

    function status_published ( $model ) {
        if ( is_object( $model ) ) $model = $model->_model;
        $app = $this;
        $status = $app->stash( 'status_published:' . $model );
        if ( isset( $status ) && $status ) {
            return $status === -1 ? null : $status;
        }
        $table = $app->get_table( $model );
        if ( $table->has_status ) {
            if ( $table->start_end ) {
                $app->stash( 'status_published:' . $model, 4 );
                return 4;
            } else {
                $app->stash( 'status_published:' . $model, 2 );
                return 2;
            }
        }
        $app->stash( 'status_published:' . $model, -1 );
        return null;
    }

    function get_relations ( $obj, $to_obj = null, $name = null,
                             $args = [], $cols = '*', $ord = true ) {
        if (! $obj->id ) return [];
        $app = $this;
        if (!$obj ) return [];
        if ( $to_obj && is_object( $to_obj ) ) {
            $to_obj = $to_obj->_model;
        }
        $terms = ['from_obj' => $obj->_model, 'from_id' => $obj->id ];
        if ( $name && is_string( $name ) ) $terms['name'] = $name;
        if ( $to_obj ) $terms['to_obj'] = $to_obj;
        if ( $ord && ! isset( $args['sort'] ) ) {
            $args['sort'] = 'order';
        }
        $relations = $app->db->model( 'relation' )->load( $terms, $args, $cols );
        if ( $name === true || ( empty( $relations ) && $to_obj ) ) {
            $scheme = $app->get_scheme_from_db( $obj->_model );
            if (! $app->get_relations_compat ) {
                $relCols = $scheme['relations'] ?? [];
                if ( is_string( $name ) && isset( $relCols[ $name ] ) && $relCols[ $name ] === $to_obj ) {
                    // When specifying a relation name.
                    return $relations;
                }
            }
            if ( $obj->has_column( "{$to_obj}_id" ) ) {
                $rel_obj = $obj->$to_obj;
                if ( $rel_obj && is_object( $rel_obj ) ) {
                    $relation = $app->db->model( 'relation' )->get_by_key(
                        ['from_obj' => $obj->_model, 'from_id' => $obj->id, 
                         'to_obj' => $to_obj, 'to_id' => $rel_obj->id ] );
                    $relations[] = $relation;
                }
            } else {
                $column_defs = $scheme['column_defs'];
                $edit_properties = $scheme['edit_properties'];
                foreach ( $column_defs as $col => $prop ) {
                    if ( $col == 'id' || $prop['type'] != 'int'
                      || !isset( $edit_properties[ $col ] ) ) continue;
                    if ( strpos( $edit_properties[$col], ':' ) === false ) continue;
                    $col_props = explode( ':', $edit_properties[ $col ] );
                    if ( $col_props[0] == 'relation' && $col_props[1] == $to_obj ) {
                        if ( $obj->$col === null ) {
                            $obj = $app->db->model( $obj->_model )->load( $obj->id, null, "id,{$col}" );
                        }
                        if ( $obj->$col ) {
                            $rel_obj = $app->db->model( $to_obj )->load( (int) $obj->$col, null, 'id' );
                            if ( is_object( $rel_obj ) ) {
                                $relation = $app->db->model( 'relation' )->get_by_key(
                                    ['from_obj' => $obj->_model, 'from_id' => $obj->id, 
                                     'to_obj' => $to_obj, 'to_id' => $rel_obj->id ] );
                                $relations[] = $relation;
                            } else {
                                $obj->$col( 0 );
                                $obj->save();
                            }
                        }
                    }
                }
            }
            if (! empty( $relations ) ) {
                $_relations = [];
                foreach ( $relations as $relation ) {
                    $_relations[ $relation->to_id ] = $relation;
                }
                $relations = array_values( $_relations );
            }
        }
        return $relations;
    }

    function load_related_objs ( $obj, $related_obj, $terms = [],
        $args = [], $cols = '*', $extra = '', $ex_vals = [], $round_cols = false ) {
        if (! is_object( $obj ) || $related_obj === '__any__' ) return [];
        $app = $this;
        if ( $terms === true || $args === true || $cols === true ||
            $extra === true || $ex_vals === true ) {
            $round_cols = true;
            $app->set_up_relation( $terms, $args, $cols, $extra, $ex_vals );
        }
        $scheme = $app->get_scheme_from_db( $obj->_model );
        if (! $scheme ) return [];
        $relations = isset( $scheme['relations'] ) ? $scheme['relations'] : [];
        $rel_exists = false;
        $int_col = '';
        $int_cols = [];
        $tag_args = [];
        $ignore_filter = '';
        $callback = [];
        $object_id = $obj->id;
        if ( isset( $args['ignore_filter'] ) ) {
            $ignore_filter = $args['ignore_filter'];
            unset( $args['ignore_filter'] );
        }
        if ( isset( $args['tag_args'] ) ) {
            $tag_args = $args['tag_args'];
            unset( $args['relation_name'] );
        }
        $_related_obj = $app->db->model( $related_obj );
        if ( isset( $terms['relation_name'] ) ) {
            // Specify column name.
            if (! isset( $relations[ $terms['relation_name'] ] ) ) {
                $int_col = $terms['relation_name'];
                if (! $_related_obj->has_column( $int_col ) ) {
                    return [];
                }
                unset( $terms['relation_name'] );
            }
        } else {
            foreach ( $relations as $rel_model ) {
                if ( $rel_model == $related_obj ) {
                    $rel_exists = true;
                    break;
                }
            }
            $column_defs = $scheme['column_defs'];
            $edit_properties = $scheme['edit_properties'];
            foreach ( $edit_properties as $col => $prop ) {
                if ( strpos( $prop, ':' ) !== false && isset( $column_defs[ $col ] )
                    && $column_defs[ $col ]['type'] == 'int' ) {
                    $props = explode( ':', $prop );
                    if ( $props[1] == $related_obj && $obj->$col ) {
                        // Has multipul type integer columns.
                        $int_cols[] = (int) $obj->$col;
                    }
                }
            }
        }
        if ( $_related_obj->has_column( 'status' ) ) {
            if (! isset( $terms['status'] ) ) {
                $terms['status'] = $app->status_published( $related_obj );
            }
        }
        if ( $_related_obj->has_column( 'rev_type' ) ) {
            if (! isset( $terms['rev_type'] ) ) {
                $terms['rev_type'] = 0;
            }
        }
        $table = $app->get_table( $related_obj );
        if ( $table === null ) return [];
        if (! $ignore_filter ) {
            $app->register_callback( $related_obj, 'pre_listing', 'pre_listing', 5, $app );
            $app->init_callbacks( $related_obj, 'pre_listing' );
            $callback = ['name' => 'pre_listing', 'model' => $related_obj,
                         'scheme' => $scheme, 'table' => $table,
                         'args' => $tag_args ];
        }
        if (! $rel_exists && $int_col ) {
            // Specify column name.
            $terms['id'] = (int) $obj->$int_col;
            if (! $ignore_filter ) {
                $app->run_callbacks( $callback, $related_obj, $terms, $args, $extra, $ex_vals );
            }
            $objects = $_related_obj->load( $terms, $args, $cols, $extra, $ex_vals );
        } else if (! $rel_exists && !empty( $int_cols ) ) {
            // Has multipul type integer columns.
            $terms['id'] = ['IN' => $int_cols ];
            if (! $ignore_filter ) {
                $app->run_callbacks( $callback, $related_obj, $terms, $args, $extra, $ex_vals );
            }
            $objects = $_related_obj->load( $terms, $args, $cols, $extra, $ex_vals );
        } else if ( $rel_exists && !empty( $int_cols ) ) {
            // Mix relation and type integer.
            $rel_args = null;
            if ( $app->prioritize_relation ) {
                $rel_args['sort'] = 'order';
                $rel_args['direction'] = 'ascend';
            }
            $relations = $app->db->model( 'relation' )->load_iter(
              ['from_obj' => $obj->_model, 'to_obj' => $related_obj, 'from_id' => $object_id ],
              $rel_args, 'to_id' );
            $relations = $relations->fetchAll( PDO::FETCH_COLUMN );
            if ( $app->prioritize_relation ) {
                $int_cols = array_unique( array_merge( $relations, $int_cols ) );
            } else {
                $int_cols = array_unique( array_merge( $int_cols, $relations ) );
            }
            $terms['id'] = ['IN' => $int_cols ];
            if ( $app->prioritize_relation && stripos( $extra, 'ORDER BY' ) === false ) {
                // Prioritize ralation order.
                array_unshift( $int_cols, "{$related_obj}_id" );
                $fields = implode( ',', $int_cols );
                $extra .= "ORDER BY FIELD({$fields})";
            }
            if (! $ignore_filter ) {
                $app->run_callbacks( $callback, $related_obj, $terms, $args, $extra, $ex_vals );
            }
            $objects = $_related_obj->load( $terms, $args, $cols, $extra, $ex_vals );
        } else {
            $join_stmt = ['from_obj' => $obj->_model,
                          'to_obj' => $related_obj, 'from_id' => $object_id ];
            if ( isset( $terms['relation_name'] ) ) {
                $join_stmt['name'] = $terms['relation_name'];
                unset( $terms['relation_name'] );
            }
            if (! isset( $args['sort'] ) ) {
                $extra .= ' ORDER BY relation_order ASC';
            }
            $args['join'] = ['relation', ["{$related_obj}_id", 'to_id'], $join_stmt, 'id,order'];
            $args['distinct'] = 1;
            if (! $ignore_filter ) {
                $app->run_callbacks( $callback, $related_obj, $terms, $args, $extra, $ex_vals );
            }
            $objects = $_related_obj->load( $terms, $args, $cols, $extra, $ex_vals );
            if ( $round_cols === true && !empty( $objects ) ) {
                $app->remove_relation_cols( $related_obj, $objects );
            }
        }
        $count_obj = count( $objects );
        if (! $ignore_filter ){
            $app->init_callbacks( $related_obj, 'post_load_objects' );
            $callback = ['name' => 'post_load_objects', 'model' => $related_obj,
                         'table' => $table ];
            $app->run_callbacks( $callback, $related_obj, $objects, $count_obj );
            $count_obj = count( $objects );
        }
        return $objects;
    }

    function load_context_objs ( $obj, $ctx_obj, $terms = [],
        $args = [], $cols = '*', $extra = '', $ex_vals = [], $round_cols = false ) {
        if (! is_object( $obj ) ) return [];
        $app = $this;
        if ( $terms === true || $args === true || $cols === true ||
            $extra === true || $ex_vals === true ) {
            $round_cols = true;
            $app->set_up_relation( $terms, $args, $cols, $extra, $ex_vals );
        }
        $scheme = $app->get_scheme_from_db( $ctx_obj );
        if (! $scheme ) return [];
        $relations = isset( $scheme['relations'] ) ? $scheme['relations'] : [];
        $rel_exists = false;
        $int_col = '';
        $int_cols = [];
        $tag_args = [];
        $ignore_filter = '';
        $callback = [];
        $object_id = $obj->id;
        if ( isset( $args['ignore_filter'] ) ) {
            $ignore_filter = $args['ignore_filter'];
            unset( $args['ignore_filter'] );
        }
        if ( isset( $args['tag_args'] ) ) {
            $tag_args = $args['tag_args'];
            unset( $args['relation_name'] );
        }
        $_ctx_obj = $app->db->model( $ctx_obj );
        $extra_sql = '';
        if ( $_ctx_obj->has_column( 'status' ) ) {
            if (! isset( $terms['status'] ) ) {
                $status_published = $app->status_published( $ctx_obj );
                $terms['status'] = $status_published;
                $extra_sql .= " AND {$ctx_obj}_status={$status_published} ";
            }
        }
        if ( $_ctx_obj->has_column( 'rev_type' ) ) {
            if (! isset( $terms['rev_type'] ) ) {
                $terms['rev_type'] = 0;
                $extra_sql .= " AND {$ctx_obj}_rev_type=0 ";
            }
        }
        if ( isset( $terms['relation_name'] ) ) {
            // Specify column name.
            if (! isset( $relations[ $terms['relation_name'] ] ) ) {
                $int_col = $terms['relation_name'];
                if (! $_ctx_obj->has_column( $int_col ) ) {
                    return [];
                }
                unset( $terms['relation_name'] );
            }
        } else {
            foreach ( $relations as $rel_model ) {
                if ( $rel_model == $obj->_model ) {
                    $rel_exists = true;
                    break;
                }
            }
            $column_defs = $scheme['column_defs'];
            $edit_properties = $scheme['edit_properties'];
            foreach ( $edit_properties as $col => $prop ) {
                if ( strpos( $prop, ':' ) !== false && isset( $column_defs[ $col ] )
                    && $column_defs[ $col ]['type'] == 'int' ) {
                    $props = explode( ':', $prop );
                    if ( $props[1] == $obj->_model ) {
                        // Has multipul type integer columns.
                        $int_cols[ $col ] = "{$ctx_obj}_{$col}={$object_id}";
                    }
                }
            }
        }
        $table = $app->get_table( $ctx_obj );
        if (! $ignore_filter ) {
            $app->register_callback( $ctx_obj, 'pre_listing', 'pre_listing', 5, $app );
            $app->init_callbacks( $ctx_obj, 'pre_listing' );
            $callback = ['name' => 'pre_listing', 'model' => $ctx_obj,
                         'scheme' => $scheme, 'table' => $table,
                         'args' => $tag_args ];
        }
        if (! $rel_exists && $int_col ) {
            // Specify column name.
            $terms[ $int_col ] = $object_id;
            if (! $ignore_filter ) {
                $app->run_callbacks( $callback, $ctx_obj, $terms, $args, $extra, $ex_vals );
            }
            $objects = $_ctx_obj->load( $terms, $args, $cols, $extra, $ex_vals );
        } else if (! $rel_exists && !empty( $int_cols ) ) {
            // Has multipul type integer columns.
            reset( $int_cols );
            $key = key( $int_cols );
            $terms[ $key ] = $object_id;
            array_shift( $int_cols );
            if (! empty( $int_cols ) ) {
                $extra .= ' OR ' . '((' . implode( ' OR ', $int_cols ) . ") {$extra_sql})";
            }
            if (! $ignore_filter ) {
                $app->run_callbacks( $callback, $ctx_obj, $terms, $args, $extra, $ex_vals );
            }
            $objects = $_ctx_obj->load( $terms, $args, $cols, $extra, $ex_vals );
        } else if ( $rel_exists && !empty( $int_cols ) ) {
            // Mix relation and type integer.
            $relations = $app->db->model( 'relation' )->load_iter(
              ['from_obj' => $ctx_obj, 'to_obj' => $obj->_model, 'to_id' => $object_id ], null, 'from_id' );
            $relations = $relations->fetchAll( PDO::FETCH_COLUMN );
            if (!empty( $relations ) ) {
                $terms['id'] = ['IN' => $relations ];
            }
            $condition = isset( $terms['id'] ) ? ' OR ' : ' AND ';
            $extra .= $condition . '((' . implode( ' OR ', $int_cols ) . ") {$extra_sql})";
            if (! $ignore_filter ) {
                $app->run_callbacks( $callback, $ctx_obj, $terms, $args, $extra, $ex_vals );
            }
            $objects = $_ctx_obj->load( $terms, $args, $cols, $extra, $ex_vals );
        } else {
            $join_stmt = ['from_obj' => $ctx_obj,
                          'to_obj' => $obj->_model, 'to_id' => $object_id ];
            if ( isset( $terms['relation_name'] ) ) {
                $join_stmt['name'] = $terms['relation_name'];
                unset( $terms['relation_name'] );
            }
            $args['join'] = ['relation', ["{$ctx_obj}_id", 'from_id'], $join_stmt, 'id'];
            $args['distinct'] = 1;
            if (! $ignore_filter ) {
                $app->run_callbacks( $callback, $ctx_obj, $terms, $args, $extra, $ex_vals );
            }
            $objects = $_ctx_obj->load( $terms, $args, $cols, $extra, $ex_vals );
        }
        if ( $round_cols === true && !empty( $objects ) ) {
            $app->remove_relation_cols( $ctx_obj, $objects );
        }
        $count_obj = count( $objects );
        if (! $ignore_filter ) {
            $app->init_callbacks( $ctx_obj, 'post_load_objects' );
            $callback = ['name' => 'post_load_objects', 'model' => $ctx_obj,
                         'table' => $table ];
            $app->run_callbacks( $callback, $ctx_obj, $objects, $count_obj );
            $count_obj = count( $objects );
        }
        return $objects;
    }

    function get_related_objs ( $obj, $to_obj, $name = null,
        $get_args = [], $terms = [], $select_cols = '*', $round_cols = false ) {
        $app = $this;
        if (! is_object( $obj ) ) return [];
        if ( $name === true || $get_args === true || $terms === true || $select_cols === true ) {
            $round_cols = true;
            $name = $name === true ? null : $name;
            $get_args = $get_args === true ? [] : $get_args;
            $terms = $terms === true ? [] : $terms;
            $select_cols = $select_cols === true ? '*' : $select_cols;
        }
        $model = $app->db->quote( $obj->_model );
        $_to_obj = $app->db->quote( $to_obj );
        $id = (int) $obj->id;
        if (! $id ) return [];
        $extra = " AND relation_from_obj={$model} AND relation_from_id={$id}"
               . " AND relation_to_obj={$_to_obj} ";
        $args = ['join' => ['relation', ['id', 'to_id'] ], 'distinct' => 1];
        if ( $name ) {
            $extra .= ' AND relation_name=' . $app->db->quote( $name ) . ' ';
        }
        $rel_model = $app->db->model( $to_obj );
        if ( $rel_model->has_column( 'status' ) ) {
            $published_only = isset( $get_args['published_only'] ) ?
                $get_args['published_only'] : false;
            if ( $published_only ) {
                $terms['status'] = $app->status_published( $to_obj );
            }
            unset( $get_args['published_only'] );
        }
        if (! empty( $get_args ) ) {
            foreach ( $get_args as $arg => $v ) {
                $args[ $arg ] = $v;
            }
        }
        $scheme = $app->get_scheme_from_db( $to_obj );
        if (! $scheme ) return [];
        $to_obj = $app->db->model( $to_obj );
        if ( $select_cols != '*' ) {
            $column_defs = $scheme['column_defs'];
            $select_cols = explode( ',', strtolower( $select_cols ) );
            $_select_cols = [];
            foreach ( $select_cols as $select_col ) {
                $select_col = trim( $select_col );
                if ( $to_obj->has_column( $select_col ) ) {
                    if ( isset( $column_defs[ $select_col ] ) 
                        && isset( $column_defs[ $select_col ]['type'] ) ) {
                        if ( $column_defs[ $select_col ]['type'] != 'relation' ) {
                            $_select_cols[] = $select_col;
                        }
                    }
                }
                if (!in_array( 'id', $_select_cols ) ) {
                    array_unshift( $_select_cols, 'id' );
                }
                if ( $to_obj->has_column( 'status' ) &&
                    !in_array( 'status', $_select_cols ) ) {
                    $_select_cols[] = 'status';
                }
            }
            if ( isset( $args['sort'] ) && !in_array( $args['sort'], $_select_cols ) ) {
                $_select_cols[] = $args['sort'];
            }
            $select_cols = !empty( $_select_cols )
                         ? implode( ',', $_select_cols )
                         : '*';
        }
        if ( isset( $args['sort'] ) && $args['sort']
            && $to_obj->has_column( $args['sort'] ) ) {
        } else {
            $extra .= 'ORDER BY relation_order ';
            if ( isset( $args['direction'] ) && $args['direction']
                && ( $args['direction'] == 'ascend' || $args['direction'] == 'descend' ) ) {
                if ( $args['direction'] == 'ascend' ) {
                    $extra .= 'ASC ';
                } else {
                    $extra .= 'DESC ';
                }
            } else {
                $extra .= 'ASC ';
            }
        }
        $model = $to_obj->_model;
        $orig_args = $get_args;
        $table = $app->get_table( $model );
        if ( isset( $get_args['ignore_filter'] ) ) {
            unset( $get_args['ignore_filter'], $orig_args['ignore_filter'], $args['ignore_filter'] );
        } else {
            $app->register_callback( $model, 'pre_listing', 'pre_listing', 5, $app );
            $app->init_callbacks( $model, 'pre_listing' );
            $callback = ['name' => 'pre_listing', 'model' => $model,
                         'scheme' => $scheme, 'table' => $table,
                         'args' => $orig_args ];
            $app->run_callbacks( $callback, $model, $terms, $args, $extra );
        }
        $objects = $to_obj->load( $terms, $args, $select_cols, $extra );
        if (! count( $objects ) ) {
            if (! $app->get_relations_compat ) {
                $orgScheme = $app->get_scheme_from_db( $obj->_model );
                $relCols = $orgScheme['relations'] ?? [];
                if ( is_string( $name ) && isset( $relCols[ $name ] ) && $relCols[ $name ] === $model ) {
                    // When specifying a relation name.
                    return $objects;
                }
            }
            $id_col = "{$model}_id";
            if ( $obj->has_column( $id_col ) && $obj->$id_col ) {
                $relation = $obj->$model;
                if ( is_object( $relation ) ) {
                    $objects = [ $relation ];
                }
            } else if ( $name && $obj->has_column( $name, true ) && $obj->$name ) {
                if ( is_numeric( $obj->$name ) ) {
                    $relation = $app->db->model( $model )->load( (int) $obj->$name );
                    if ( is_object( $relation ) ) {
                        $objects = [ $relation ];
                    }
                }
            }
        } else if ( $round_cols === true ) {
            $app->remove_relation_cols( $model, $objects );
        }
        $app->init_callbacks( $model, 'post_load_objects' );
        $callback = ['name' => 'post_load_objects', 'model' => $model,
                     'table' => $table ];
        $count_obj = count( $objects );
        $app->run_callbacks( $callback, $model, $objects, $count_obj );
        return $objects;
    }

    function set_up_relation ( &$terms, &$args, &$cols, &$extra, &$ex_vals ) {
        $terms = $terms === true ? [] : $terms;
        $args = $args === true ? [] : $args;
        $cols = $cols === true ? '*' : $cols;
        $extra = $extra === true ? '' : $extra;
        $ex_vals = $ex_vals === true ? [] : $ex_vals;
    }

    function remove_relation_cols ( $model, &$objects ) {
        $relationCols = [ $model . '_relation_id', $model . '_relation_name',
                          $model . '_relation_from_obj', $model . '_relation_from_id',
                          $model . '_relation_to_obj', $model . '_relation_to_id',
                          $model . '_relation_order'];
        foreach ( $objects as $idx => $object ) {
            $keys = array_keys( get_object_vars( $object ) );
            foreach ( $keys as $key ) {
                if ( strpos( $key, 'relation_' ) === 0
                   || in_array( $key, $relationCols ) ) {
                    unset( $object->$key );
                }
            }
            $objects[ $idx ] = $object;
        }
        return $objects;
    }

    function get_meta ( &$obj, $kind = null, $key = null, $name = null ) {
        if (! $obj->id ) return [];
        $app = $this;
        if ( $kind == 'customfield' && $obj->_customfields !== null && $key ) {
            return $obj->_customfields;
        }
        $terms = ['object_id' => $obj->id, 
                  'model' => $obj->_model ];
        if ( $kind ) $terms['kind'] = $kind;
        if ( $name ) $terms['name'] = $name;
        $args = ['sort' => 'number', 'direction' => 'ascend'];
        $meta = $app->db->model( 'meta' )->load( $terms, $args );
        if ( $kind == 'customfield' && ! $name ) {
            $customfields = [];
            foreach ( $meta as $field ) {
                if ( isset( $customfields[ $field->key ] ) ) {
                    $customfields[ $field->key ][] = $field;
                } else {
                    $customfields[ $field->key ] = [ $field ];
                }
            }
            $obj->_customfields = $customfields;
            if ( $key ) return $customfields;
        }
        if (! $app->db->blob2file ) {
            return $meta;
        }
        $metadata = [];
        foreach ( $meta as $m ) {
            $m->blob( $m->blob );
            $m->data( $m->data );
            $m->metadata( $m->metadata );
            $metadata[] = $m;
        }
        return $metadata;
    }

    function set_default ( &$obj, $set_basename = true, $modified_only = false ) {
        $app = $this;
        if ( $user = $app->user() ) {
            if ( $obj->has_column( 'modified_by' ) ) {
                $obj->modified_by( $user->id );
            }
            if (! $modified_only ) {
                if (!$obj->created_on && $obj->has_column( 'created_by' ) && ( !$obj->id || !$obj->created_by ) ) {
                    $obj->created_by( $user->id );
                }
                if ( $obj->has_column( 'user_id' ) && !$obj->user_id && $obj->_model !== 'permission' ) {
                    $obj->user_id( $user->id );
                }
            }
        }
        $time = $obj->_model == 'log' ? $app->date( 'YmdHis' ) : $app->date( 'YmdHis', $obj );
        if ( $obj->has_column( 'modified_on' ) ) {
            $obj->modified_on( $time );
        }
        if ( $modified_only ) {
            return;
        }
        if ( $obj->has_column( 'created_on' ) ) {
            $ts = $obj->created_on;
            $ts = $ts ? preg_replace( '/[^0-9]/', '', $ts ) : 0;
            $ts = (int) $ts;
            if (!$ts ) {
                $obj->created_on( $time );
            }
        }
        if ( $obj->has_column( 'published_on' ) ) {
            $ts = $obj->published_on;
            if ( $ts === null ) $ts = '';
            $ts = preg_replace( '/[^0-9]/', '', $ts );
            $ts = (int) $ts;
            if (!$ts ) {
                $obj->published_on( $time );
            }
        }
        if ( $obj->has_column( 'extra_path' ) && $obj->extra_path ) {
            $extra_path = $obj->extra_path;
            $obj->extra_path( $app->sanitize_dir( $extra_path ) );
        }
        if ( $obj->has_column( 'status' ) && $obj->status === null ) {
            if ( $obj->status === '0' ) {
                $obj->status( 0 );
            } else { 
                $table = $app->get_table( $obj->_model );
                $default_status = $table->default_status;
                if (! $app->upload_compat && $app->id == 'Prototype' ) {
                    $max_status = $app->max_status( $app->user(), $obj->_model );
                    if ( $max_status < $default_status ) $default_status = $max_status;
                }
                $obj->status( $default_status );
            }
        }
        if ( $obj->has_column( 'uuid' ) ) {
            if (! $obj->uuid && ! $obj->id ) {
                $obj->uuid( $this->generate_uuid( $obj->_model ) );
            }
        }
        if ( $obj->has_column( 'delete_flag' ) && !$obj->delete_flag ) {
            $obj->delete_flag( 0 );
        }
        if ( $obj->has_column( 'remote_ip' ) && !$obj->remote_ip ) {
            $obj->remote_ip( $app->remote_ip );
        }
        if ( $obj->has_column( 'workspace_id' ) && ! $obj->id && $obj->workspace_id === null ) {
            if ( $workspace = $app->workspace() ) {
                $obj->workspace_id( $workspace->id );
            } else {
                $obj->workspace_id( 0 );
            }
        }
        if ( $obj->has_column( 'order' ) && !$obj->order ) {
            $order_terms = [];
            if ( $obj->has_column( 'workspace_id' ) ) {
                $order_terms['workspace_id'] = $obj->workspace_id ? $obj->workspace_id : 0;
            }
            if ( $obj->has_column( 'rev_type' ) ) {
                $order_terms['rev_type'] = 0;
            }
            if ( $obj->id ) {
                $order_terms['id'] = ['!=' => $obj->id ];
            }
            $max_order_obj = $app->db->model( $obj->_model )->load(
                $order_terms, ['sort' => 'order', 'direction' => 'descend', 'limit' => 1],
                               'id,order'
            );
            if ( count( $max_order_obj ) ) {
                $max_order_obj = $max_order_obj[0];
                $obj->order( $max_order_obj->order + 1 );
            } else {
                $obj->order( 1 );
            }
        }
        if ( $set_basename && $obj->has_column( 'basename' ) ) {
            if ( $obj->has_column( 'rev_type' ) && $obj->rev_type && $obj->basename ) {
                return;
            } else if ( $app->mode === 'clone_object' && $app->param( 'as_revision' ) ) {
                return;
            }
            $basename = PTUtil::make_basename( $obj, $obj->basename, true );
            $obj->basename( $basename );
        }
        if ( $obj->_model === 'tag' || $obj->_model === 'taxonomy' ) {
            if (! $obj->normalize ) {
                $tag = PTUtil::normalize( $obj->name );
                $normalize = PTUtil::normalize_tag( $tag );
                $obj->normalize( $normalize );
            }
        }
        if (! $obj->id ) {
            $column_defs = $app->get_scheme_from_db( $obj->_model )['column_defs'];
            foreach ( $column_defs as $name => $props ) {
                if ( $name === 'id' ) continue;
                if ( $props['type'] !== 'relation' && isset( $props['not_null'] ) && $obj->$name === null ) {
                     $default = $props['default'] ?? '';
                     if (! $default && strpos( $props['type'], 'int' ) !== false ) {
                        $default = 0;
                     } else if (! $default && $props['type'] === 'datetime' ) {
                        $default = $time;
                     }
                     $obj->$name( $default );
                }
            }
        }
    }

    function translate ( $phrase, $params = '', $component = null, $lang = null ) {
        $component = $component ? $component : $this;
        if (! $lang ) {
            if ( $this->translate_in_user_setting && $this->user() ) {
                $lang = $this->user()->language;
            } else {
                $lang = $this->language;
            }
        }
        if (!$lang || !in_array( $lang, $this->languages ) ) $lang = 'default';
        $dict = isset( $component->dictionary ) ? $component->dictionary : null;
        if ( $dict && !isset( $dict[ $lang ] ) && in_array( $lang, $this->languages ) ) {
            $dict = $this->set_language( $this->locale_dir, $lang );
        }
        if ( $dict && isset( $dict[ $lang ] ) && isset( $dict[ $lang ][ $phrase ] ) )
             $phrase = $dict[ $lang ][ $phrase ];
        if ( $phrase && strpos( $phrase, '%' ) !== false ) {
            $escaped = str_replace( '%s', '', $phrase );
            if ( strpos( $escaped, '%' ) !== false ) {
                $escaped = preg_replace( '/%\d+\$s/', '', $escaped );
            }
            if ( strpos( $escaped, '%' ) !== false ) {
                $phrase = str_replace( '%', '%%', $phrase );
            }
            if (!is_array( $params ) && !is_string( $params ) ) {
                $params = (string) $params;
            }
            $phrase = is_string( $params )
                ? sprintf( $phrase, $params ) : vsprintf( $phrase, $params );
        }
        return $this->esc_trans ? htmlspecialchars( $phrase, ENT_COMPAT, 'UTF-8', false ) : $phrase;
    }

    function redirect ( $url, $ignore_user_abort = false ) {
        $app = $this;
        if ( $app->redirected ) return;
        if ( $app->use_plugin && !$app->init_plugins && $app->installed ) {
            $app->init_plugins();
        }
        if ( $return_args = $app->return_args ) {
            if (! empty( $return_args ) ) {
                $return_args = http_build_query( $return_args );
                if ( strpos( $url, '?' ) === false ) {
                    $url .= '?';
                } else {
                    $url .= '&';
                }
                $url .= $return_args;
            }
        }
        $app->redirected = true;
        $app->in_background = true;
        if ( $ignore_user_abort ) {
            ignore_user_abort( true );
            while( ob_get_level() ) { ob_end_clean() ; }
            $out = "\r\n\r\n";
            header( 'Content-Length: ' . strlen( $out ) );
            header( 'Connection: close' );
            header( 'Location: ' . $url, true, 302 );
            echo $out;
            flush();
            return;
        }
        header( 'Location: ' . $url, true, 302 );
        exit();
    }

    function moved_permanently ( $url ) {
        header( 'Location: ' . $url, true, 301 );
        exit();
    }

    function is_login ( $model = 'user', $cookie_name = null ) {
        $app = $this;
        if ( $app->stash( 'logged-in' ) ) return true;
        if (! $cookie_name ) {
            $cookie_name = $model == 'user' ? $app->cookie_name : 'pt-' . $model;
        }
        $cookie = $app->cookie_val( $cookie_name );
        if (!$cookie ) return false;
        $args = ['limit' => 1];
        $sess = $app->db->model( 'session' )->load(
            ['name' => $cookie, 'kind' => 'US', 'key' => $model ],
            $args, 'id,name,start,expires,value,text,user_id' );
        if (! empty( $sess ) ) {
            $sess = $sess[0];
            $user = $app->db->model( $model )->load( $sess->user_id );
            if ( is_object ( $user ) ) {
                $token = md5( $cookie . ':' . $app->encrypt_key );
                $app->ctx->vars['magic_token'] = $token;
                $app->current_magic = $token;
                $app->user_session = $sess;
                if ( $app->always_update_login && !$app->updated_login ) {
                    $app->updated_login = true;
                    $path = $app->cookie_path ? $app->cookie_path : $app->path;
                    $expires = $app->sess_timeout;
                    if ( $sess->value ) {
                        $expires = 60 * 60 * 24 * 365;
                    }
                    $app->bake_cookie( $cookie_name, $cookie, $expires, $path, true, $app->cookie_domain );
                }
                $app->$model = $user;
                $app->language = $user->language;
                $app->ctx->language = $user->language;
                $app->ctx->vars['user_id'] = $user->id;
                $app->stash( 'logged-in', true );
                return true;
            }
        }
        return false;
    }

    function log ( $message ) {
        if ( is_object( $message ) ) {
            ob_start();
            var_dump( $message->get_values( true, true ) );
            $message = ob_get_clean();
        }
        $message = ! is_array( $message ) ? ['message' => $message ] : $message;
        $app = $this;
        if (! isset( $message['metadata'] ) ) {
            if ( isset( $message['message'] ) && mb_strlen( $message['message'] ) >= 255 ) {
                $message['metadata'] = $message['message'];
            }
        } else if ( is_array( $message['metadata'] ) ) {
            $message['metadata'] = json_encode( $message['metadata'],
                                   JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES );
        }
        $log = $app->db->model( 'log' )->__new( $message );
        if (!$log->level ) {
            $log->level(1);
        } else {
            if ( strtolower( $log->level ) == 'info' ) {
                $log->level(1);
            } else if ( strtolower( $log->level ) == 'warning' ) {
                $log->level(2);
            } else if ( strtolower( $log->level ) == 'error' ) {
                $log->level(4) ;
            } else if ( strtolower( $log->level ) == 'security' ) {
                $log->level(8) ;
            } else if ( strtolower( $log->level ) == 'debug' ) {
                $log->level(16) ;
            }
        }
        if (!$log->category ) $log->category( 'system' );
        $app->set_default( $log );
        $log->save();
        return $log;
    }

    function bake_cookie ( $name, $value, $expires = null, $path = '', $httpOnly = false, $domain = '' ) {
        if ( $this->redirected ) return true;
        if (!$path ) $path = $this->cookie_path;
        $samesite = $this->cookie_samesite;
        if ( PHP_VERSION_ID >= 70300 ) {
            if (! is_array( $expires ) ) {
                if (!$expires ) {
                    $expires = ['path' => $path ];
                } else {
                    $expires += $this->request_time;
                    $expires = ['expires' => $expires, 'path' => $path ];
                }
                if ( $this->is_secure ) {
                    $expires['secure'] = true;
                }
                if ( $httpOnly ) {
                    $expires['httponly'] = true;
                }
                if ( $domain ) {
                    $expires['domain'] = $domain;
                }
                if ( $samesite && in_array( $samesite, ['None', 'Lax', 'Strict'] ) ) {
                    $expires['samesite'] = $samesite;
                }
            }
            $expires_on = isset( $expires['expires'] ) ?? null;
            if ( $expires_on ) {
                if ( isset( $this->bake_cookies[ $name ] ) && $this->bake_cookies[ $name ] === $expires_on ) {
                    return true;
                }
                if ( $expires_on < $this->request_time ) {
                    $expires_on += $this->request_time;
                    $expires['expires'] = $expires_on;
                }
                $this->bake_cookies[ $name ] = $expires_on;
            }
            return setcookie( $name, $value, $expires );
        }
        if (!$expires ) $expires = 0;
        $expires = intval( $expires );
        if ( isset( $this->bake_cookies[ $name ] ) && $this->bake_cookies[ $name ] === $expires ) {
            return true;
        }
        $this->bake_cookies[ $name ] = $expires;
        if ( $expires ) $expires += $this->request_time;
        return setcookie( $name, $value, $expires, $path, $domain, $this->is_secure, $httpOnly );
    }

    function cookie_val ( $name ) {
        if ( isset( $_COOKIE[ $name ] ) ) {
            return $_COOKIE[ $name ];
        }
        return '';
    }

    function magic () {
        $magic = md5( uniqid( mt_rand(), true ) );
        if (!$this->db ) {
            return $magic;
        }
        $count = $this->db->db->query( "SELECT COUNT(session_id) FROM mt_session WHERE ( session_name = '{$magic}' )" );
        $count = $count->fetchAll( PDO::FETCH_COLUMN )[0];
        if ( $count ) return $this->magic();
        return $magic;
    }

    function error ( $message, $params = null, $component = null, $lang = null ) {
        if ( ( $params && is_bool( $params ) ) || $this->in_iframe ) {
            $this->ctx->vars['iframe'] = true;
        } else if ( is_string( $params ) ) {
            $this->ctx->vars[ $params ] = true;
        }
        $message = $this->translate( $message, $params, $component, $lang );
        if ( $this->id == 'Worker' && $this->worker ) {
            return $this->worker->log( $message, 'error', $this );
        }
        $this->ctx->vars['error'] = $message;
        $this->ctx->vars['page_title'] = $this->translate( 'An error occurred' );
        $this->__mode = 'error';
        if ( $this->log_level > 3 ) {
            $this->debug_backtrace( DEBUG_BACKTRACE_LOG, $message, true );
        }
        $this->__mode( 'error' );
    }

    function json_error ( $message,
        $params = null, $status = 200, $component = null, $lang = null ) {
        if ( is_numeric( $params ) ) {
            list( $status, $component, $lang ) = [ $params, $message, $lang ];
        }
        if (! $lang ) $lang = $this->language;
        if ( $status == 403 ) {
            header( 'HTTP/1.1 403 Forbidden' );
        } else if ( $status == 404 ) {
            header( 'HTTP/1.1 404 Not Found' );
        } else {
            header( "HTTP/1.1 {$status}" );
        }
        $message = 
            $this->translate( $message, $params, $component, $lang );
        header( 'Content-type: application/json' );
        echo json_encode( [
            'status' => $status,
            'message' => $message ] );
        exit();
    }

    function rollback ( $message = null, $params = null, $component = null, $lang = null ) {
        $this->db->rollback();
        $this->txn_active = false;
        if ( $message ) return $this->error( $message, $params, $component, $lang );
    }

    function query_string ( $force = false, $secret = false, $separator = '&' ) {
        if (!$force && ( $query_string = $this->query_string ) ) {
            return $query_string;
        }
        if ( $params = $this->param() ) {
            $params_array = [];
            if ( is_array( $params ) ) {
                foreach ( $params as $key => $value ) {
                    if ( $secret ) {
                        if ( $key === 'magic_token' || stripos( $key, 'password' ) !== false ) {
                            $value = is_string( $value )
                                   ? str_repeat( '*', mb_strlen( $value ) ) : '';
                        }
                    }
                    if ( is_array( $value ) ) {
                        foreach( $value as $val ) {
                            if ( is_array( $val ) ) {
                                array_push( $params_array, "{$key}[]=Array" );
                            } else {
                                array_push( $params_array, "{$key}[]={$val}" );
                            }
                        }
                    } else {
                        array_push( $params_array, "{$key}={$value}" );
                    }
                }
                if (! empty( $params_array ) ) {
                    $query_string = join( $separator, $params_array );
                    if ( $secret ) $this->query_string = $query_string;
                    return $query_string;
                }
            }
        }
        return '';
    }

    function param ( $param = null, $value = null ) {
        if (! isset( $_REQUEST ) ) {
            return '';
        }
        if ( $param && $value ) {
            if ( !isset( $_GET[ $param ] ) ) $_GET[ $param ] = $value;
            return $value;
        }
        if ( $param ) {
            if ( isset ( $_GET[ $param ] ) ) {
                return $_GET[ $param ];
            } else if ( isset ( $_POST[ $param ] ) ) {
                return $_POST[ $param ];
            } else if ( isset ( $_REQUEST[ $param ] ) ) {
                return $_REQUEST[ $param ];
            }
        } else {
            $vars = $_REQUEST;
            $params = [];
            foreach ( $vars as $key => $value ) {
                if ( isset( $_GET[ $key ] ) || isset( $_POST[ $key ] ) ) {
                    $params[ $key ] = $value;
                }
            }
            return $params;
        }
        return '';
    }

    function is_valid_email ( &$value, &$msg ) {
        $validator = new PTValidator();
        return $validator->is_valid_email( $value, $msg );
    }

    function is_valid_ts ( &$ts, &$msg ) {
        $validator = new PTValidator();
        return $validator->is_valid_ts( $ts, $msg );
    }

    function is_valid_property ( $prop, &$msg = '', $len = false ) {
        $validator = new PTValidator();
        return $validator->is_valid_property( $prop, $msg, $len );
    }

    function is_valid_url ( $url, &$msg = '' ) {
        $validator = new PTValidator();
        return $validator->is_valid_url( $url, $msg );
    }

    function is_valid_password ( $pass, $verify = null, &$msg = '' ) {
        $validator = new PTValidator();
        return $validator->is_valid_password( $pass, $verify, $msg );
    }

    function sanitize_file ( &$file_name, &$basename = null ) {
        $decoded = false;
        $orig_name = $file_name;
        $file_name = urldecode( $file_name );
        if ( $orig_name != $file_name && ! $this->no_encode_filename ) {
            $decoded = true;
        }
        $file_ext = PTUtil::get_extension( $file_name );
        $etsearch = preg_quote( $file_ext, '/' );
        $basename = preg_replace( "/\.{$etsearch}$/i", '', $file_name );
        $invalid_chars = ['<', '>', '#', '"', '%', '{', '}', '|', '\\', '^', '[', ']', '｀', '?', ':'];
        foreach ( $invalid_chars as $char ) {
            if ( strpos( $basename, $char ) !== false ) {
                $basename = str_replace( $char, '', $basename );
            }
        }
        $basename = preg_replace( '/[\\\\\/]/', '', $basename );
        $basename = preg_replace( '/[\.]{2,}/', '', $basename );
        $regex = self::INVALID_PATH_PATTERN;
        $basename = preg_replace( $regex, '$1', $basename );
        if ( $this->hash_multibyte_filename && ( strlen( $basename ) !== mb_strlen( $basename ) ) ) {
            $this->log( $basename );
            $basename = md5( $basename );
            $file_name = "{$basename}.{$file_ext}";
        } else if ( $decoded ) {
            $chars = preg_split( '//u', $basename );
            $encoded = '';
            foreach ( $chars as $char ) {
                if ( strlen( $char ) === mb_strlen( $char ) ) {
                    $encoded .= $char;
                } else {
                    $encoded .= rawurlencode( $char );
                }
            }
            $basename = $encoded;
        }
        $file_name = strpos( $file_name, '.' ) === false ? $basename : "{$basename}.{$file_ext}";
        return $file_name;
    }

    function sanitize_dir ( &$path ) {
        $path = urldecode( $path );
        if ( strpos( $path, '\\' ) !== false ) {
            $path = preg_replace( '!\\\!', '/', $path );
        }
        if ( preg_match( '/^\/{1,}/', $path ) ) {
            $path = preg_replace( '/^\/{1,}/', '', $path );
        }
        if ( strpos( $path, '..' ) !== false ) {
            $path = preg_replace( '/\.{1,}/', '', $path );
        }
        if ( strpos( $path, '//' ) !== false ) {
            $path = preg_replace( '/\/{1,}/', '/', $path );
        }
        $regex = self::INVALID_PATH_PATTERN;
        $path = preg_replace( $regex, '$1', $path );
        $path = preg_replace( '/[^A-Za-z0-9-_()\/\.]/', '', $path );
        if ( $path && !preg_match( '/\/$/', $path ) ) $path .= '/';
        if ( $path === '/' ) $path = '';
        return $path;
    }

    function escape ( $str, $kind = 'html' ) {
        if ( strtolower( $kind ) == 'html' && is_string( $str ) ) {
            return htmlspecialchars( $str );
        }
        $func = 'htmlspecialchars';
        $func_map = ['url' => 'rawurlencode', 'uri' => 'rawurlencode',
                     'xml' => 'prototype_escape_xml', 'js' => 'prototype_escape_js',
                     'javascript' => 'prototype_escape_js', 'sql' => 'prototype_escape_sql',
                     'shell' => 'escapeshellarg', 'shellarg' => 'escapeshellarg', 
                     'shellcmd' => 'escapeshellcmd', 'php' => 'addslashes',
                     'regex' => 'prototype_escape_regex', 'preg' => 'prototype_escape_regex'];
        if ( isset( $func_map[ strtolower( $kind ) ] ) ) {
            $func = $func_map[ strtolower( $kind ) ];
        }
        if ( is_string( $str ) ) {
            return $func( $str );
        } else if ( is_array( $str ) ) {
            return array_map( $func, $str );
        }
        return $str;
    }

    function print ( $data, $mime_type = 'text/html; charset=UTF-8', $ts = null,
                     $do_conditional = false, $exit = true ) {
        if ( $data === null ) $data = '';
        $headers_sent = headers_sent();
        if ( $headers_sent ) {
            echo $data;
            flush();
            unset( $data );
            if ( $exit ) exit();
            return;
        }
        if (! $exit ) {
            ignore_user_abort( true );
            while( ob_get_level() ) { ob_end_clean(); }
        }
        if ( $this->do_conditional && !$this->debug && $this->request_method == 'GET' ) {
            $if_modified  = isset( $_SERVER['HTTP_IF_MODIFIED_SINCE'] )
                ? strtotime( stripslashes( $_SERVER['HTTP_IF_MODIFIED_SINCE'] ) ) : false;
            $if_nonematch = isset( $_SERVER['HTTP_IF_NONE_MATCH'] )
                ? stripslashes( $_SERVER['HTTP_IF_NONE_MATCH'] ) : false;
            $conditional = false;
            $etag = '"' . md5( $data ) . '"';
            if ( $if_nonematch && ( $if_nonematch == $etag ) ) {
                $conditional = 1;
            } else if (!$this->query_string() && $if_modified && $ts && ( $if_modified >= $ts ) ) {
                $conditional = 1;
            }
            if ( $conditional ) {
                header( $this->protocol . ' 304 Not Modified' );
                header( 'Connection: close' );
                flush();
                unset( $data );
                if ( $exit ) exit();
                return;
            }
        }
        if ( $this->output_compression ) {
            ini_set( 'zlib.output_compression', 'On' );
        }
        if ( $do_conditional ) return;
        if ( $ts !== false ) {
            header( $this->protocol . ' 200 OK' );
        }
        header( "Content-Type: {$mime_type}" );
        $file_size = strlen( bin2hex( $data ) ) / 2;
        header( "Content-Length: {$file_size}" );
        if ( $this->request_method == 'GET' ) {
            if (! $ts ) $ts = $this->request_time;
            $last_modified = gmdate( "D, d M Y H:i:s", $ts ) . ' GMT';
            if (! isset( $etag ) ) $etag = '"' . md5( $data ) . '"';
            header( "Last-Modified: $last_modified" );
            header( "ETag: $etag" );
        }
        header( 'Connection: close' );
        echo $data;
        flush();
        unset( $data );
        if ( $exit ) exit();
    }

    function date ( $format = 'YmdHis', $obj = null ) {
        $current_tz = null;
        if ( $obj && $obj->has_column( 'workspace_id' )
            && $obj->workspace && $obj->workspace->timezone ) {
            $timezone = $obj->workspace->timezone;
            date_default_timezone_set( $timezone );
            $date = date( $format );
            if ( $timezone != $this->current_tz ) {
                date_default_timezone_set( $this->current_tz );
            }
            return $date;
        } else if ( $this->current_tz != $this->timezone ) {
            $current_tz = $this->current_tz;
            $time1 = date( 'Y-m-d H:i:s' );
            $this->date_default_timezone_set( $this->timezone );
            if (! $this->time_offset ) {
                $time2 = date( 'Y-m-d H:i:s' );
                $time1 = strtotime( $time1 );
                $time2 = strtotime( $time2 );
                $this->time_offset = $time1 - $time2;
            }
        }
        $date = date( $format );
        if ( $current_tz && $current_tz != $this->timezone ) {
            $this->date_default_timezone_set( $current_tz );
        }
        return $date;
    }

    function php_binary () {
        $php_binary = $this->php_binary;
        if ( $php_binary !== null ) return $php_binary;
        $php_binary = PHP_BINARY;
        if (! $php_binary && substr( PHP_OS, 0, 3 ) != 'WIN' ) {
            $php_binary = exec( 'which php' );
        }
        $this->php_binary = $php_binary;
        return $php_binary;
    }

    function offset_time ( $current_tz ) {
        if (! $current_tz ) {
            $current_tz = $this->current_tz ? $this->current_tz : $this->timezone;
        }
        $time1 = date( 'Y-m-d H:i:s' );
        date_default_timezone_set( 'UTC' );
        $time2 = date( 'Y-m-d H:i:s' );
        $time1 = strtotime( $time1 );
        $time2 = strtotime( $time2 );
        date_default_timezone_set( $current_tz );
        return $time1 - $time2;
    }

    function debugPrint ( $msg ) {
        echo '<hr><pre>', $this->escape( $msg ), '</pre><hr>';
    }

    function errorHandler ( $errno, $errmsg, $f, $line ) {
        $error_reporting = error_reporting();
        if ( $error_reporting === 0 || !$this->logging ||
           ( strpos( phpversion(), '8' ) === 0 && $error_reporting === 4437 ) ) return;
        // https://bugs.php.net/bug.php?id=80548
        if ( $this->purge_cache_in_error ) {
            if ( $ctx = $this->ctx ) {
                if ( $tmpl = $ctx->template_file ) {
                    $errmsg = " $errmsg( in {$tmpl} )";
                    if ( $ctx->compile_dir && is_dir( $ctx->compile_dir ) ) {
                        $this->upload_dirs[ $ctx->compile_dir ] = false;
                        // remove at __destruct.
                    }
                }
            }
            if ( $this->cache_driver ) {
                $this->clear_all_cache( false, false );
            } else if ( $this->cache_dir && is_dir( $this->cache_dir ) ) {
                $this->upload_dirs[ $this->cache_dir ] = false;
                // remove at __destruct.
            }
        }
        $version = $this->version;
        $q = '';
        if ( $this->log_level > 1 ) {
            $q = $this->query_string( true, true );
            $q = $q !== null ? preg_replace( "/(^.*?)\n.*$/si", "$1", $q ) : '';
        }
        $res = '';
        if ( $this->log_level > 2 ) {
            $res = $this->debug_backtrace( DEBUG_BACKTRACE_TEXT, 4, true );
            $res = str_replace( ["\r", "\n"], '', $res );
            $res = preg_replace( '/\s{1,}/', ' ', $res );
        }
        $msg = "{$errmsg} ({$errno}) occured( line {$line} of {$f}({$res}), ver.{$version} ). {$q}";
        $this->errors[] = $msg;
        if ( $this->debug === 2 ) $this->debugPrint( $msg );
        if ( $this->logging ) error_log( $this->date( 'Y-m-d H:i:s T' ) .
            "\t" . $msg . PHP_EOL, 3, $this->log_dir . DS . 'error.log' );
        if ( $this->log_level > 3 ) {
            $this->log( ['message'  => $msg,
                         'category' => 'error_log',
                         'level'    => 'error'] );
        }
    }
}

if (! function_exists( 'normalizer_normalize' ) ) {
    require_once( LIB_DIR . 'Prototype' . DS . 'class.PTUnicodeNormalizer.php' );
}

function prototype_escape_xml ( $str ) {
    return htmlentities( $str, ENT_XML1 );
}

function prototype_escape_js ( $str ) {
    $str = json_encode( $str, JSON_UNESCAPED_UNICODE );
    if ( preg_match( '/^"(.*)"$/', $str, $matches ) ) {
        return $matches[1];
    }
    return $str;
}

function prototype_escape_sql ( $str ) {
    $app = Prototype::get_instance();
    return $app->db->quote( $str );
}

function prototype_escape_regex ( $str, $delimiter = '/' ) {
    return preg_quote( $str, $delimiter );
}

function prototype_file_get_contents ( $file_path ) {
    // Put the file to OPCache.
    ob_start();
    @include( $file_path );
    return ob_get_clean();
}

register_shutdown_function( function() {
    $error = error_get_last();
    if ( $error === null ) {
        return;
    }
    $app = Prototype::get_instance();
    $id = $app->id;
    $argv = [];
    if ( $app->id === 'Worker' && $app->worker ) {
        $argv = implode( ' ', $app->worker->_argv );
        if ( $argv ) {
            $id .= '[$argv:' . $argv . ']';
        }
    }
    $errorStr = "(ID:{$id})" . $error['message'] . ' ' . $error['file'] . ' ' . $error['line'];
    trigger_error( $errorStr );
});