<?php

require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class PasswordExpired extends PTPlugin
{
    const DATETIME_FORMAT = DateTime::RFC3339;
    const MODE_DO_NOTHING = 0;
    const MODE_SHOW_ALERT = 1;
    const MODE_FORCED_CHANGE = 2;

    private static $queues = [];
    private static $props  = [
        'expired_mode' => 0,
        'is_expired_enabled' => 0,
        'is_history_enabled' => 0,
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function start_app(Prototype $app)
    {
        if (! $app->db ) return;
        self::$props['expired_mode']       = $this->get_config_value('password_expired_mode', 0);
        self::$props['is_expired_enabled'] = $this->get_config_value('password_expired_enabled', 0);
        self::$props['is_history_enabled'] = $this->get_config_value('password_history_enabled', 0);
        $app->db->register_callback('user', 'pre_save', 'db_pre_save_user', 10, $this);
        $app->db->register_callback('user', 'post_save', 'db_post_save_user', 10, $this);

        if ($app->id === 'Prototype') {
            // Password expired
            if (self::$props['is_expired_enabled']) {
                if (self::$props['expired_mode'] == self::MODE_SHOW_ALERT) {
                    $app->register_callback('dashboard', 'template_output', 'template_output_dashboard', 10, $this);
                    if ( $app->mode === 'view' && $app->param( '_type' ) === 'edit' && $app->param( '_model' === 'user' ) && $app->param( '_profile' ) ) {
                        $app->register_callback('edit', 'template_output', 'template_output_edit', 10, $this);
                    }
                } elseif (self::$props['expired_mode'] == self::MODE_FORCED_CHANGE) {
                    $user = $app->user();
                    if (
                        ($app->mode !== 'login' && $app->mode !== 'logout')
                     && ($app->param('_model') !== 'user' && $app->param('_type') !== 'edit')
                     && $this->is_password_expired($user)
                    ) {
                        $app->redirect($app->admin_url . '?__mode=view&_type=edit&_model=user&id=' . $user->id);
                    }
                    if ( $app->mode === 'view' && $app->param( '_type' ) === 'edit' && $app->param( '_model' === 'user' ) && $app->param( '_profile' ) ) {
                        $app->register_callback('edit', 'template_output', 'template_output_edit', 10, $this);
                    }
                }
            }
            // Password history
            if (self::$props['is_history_enabled']) {
                $app->register_callback('user', 'save_filter', 'save_filter_user', 10, $this);
            }
        }
    }

    public function post_login_user($cb, $app, $user)
    {
        if (
            $app->id === 'Prototype'
         && self::$props['is_expired_enabled']
         && self::$props['expired_mode'] == self::MODE_FORCED_CHANGE
         && $this->is_password_expired($user)
        ) {
            $app->redirect($app->admin_url . '?__mode=view&_type=edit&_model=user&id=' . $user->id);
        }
     }

    public function db_pre_save_user($cb, $pado, &$obj)
    {
        if (!$obj->password) return true;
        $id_column = $obj->_id_column;
        if ($obj->$id_column) {
            $original = $pado->model($obj->_model)->load( (int) $obj->$id_column);
            if ($original && $original->password !== $obj->password) {
                self::$queues[] = $obj;
                $meta = $this->load_meta($original, 'password_history');
                if ($meta && !$meta->id) {
                    $this->update_password_history($original);
                }
            }
        } else {
            self::$queues[] = $obj;
        }
        return true;
    }

    public function db_post_save_user($cb, $pado, &$obj)
    {
        foreach (self::$queues as $index => $original) {
            if ($obj === $original) {
                $this->update_password_updated_on($obj);
                $this->update_password_history($obj);
                unset(self::$queues[$index]);
                break;
            }
        }
        return true;
    }

    public function save_filter_user(&$cb, $app, $obj)
    {
        $new_password = $app->param('password');
        if (!$new_password) return true;
        $history = $this->get_password_history($obj);
        if (!is_array($history)) return true;
        foreach ($history as $old_password) {
            if (password_verify($new_password, $old_password)) {
                $cb['errors'][] = $this->translate('Recently used passwords can not be set.');
                return false;
            }
        }
        return true;
    }

    private function update_password_updated_on($obj)
    {
        $meta = $this->load_meta($obj, 'password_updated_on');
        if (!$meta) return;
        $meta->text((new DateTime())->format(self::DATETIME_FORMAT));
        $meta->save();
    }

    private function is_password_expired($obj)
    {
        if (!$obj) return false;
        $updated_on = $this->get_password_updated_on($obj);
        $expiration_days = (int) $this->get_config_value('password_expiration_days', 0);
        if (
            !$updated_on
         || !self::validateDate($updated_on)
         || $expiration_days <= 0
        ) {
            return false;
        }
        try {
            $expiration_on = new DateTime(sprintf('-%d days', $expiration_days));
            $updated_on    = new DateTime($updated_on);
            $interval = $expiration_on->diff($updated_on);
            return $interval->invert ? true : false;
        } catch (Exception $e) {
            return false;
        }
        return false;
    }

    private function get_password_updated_on($obj, string $default_col = 'created_on')
    {
        if ($obj instanceof PADOBaseModel === false) {
            return false;
        }
        $date = '';
        $meta = $this->load_meta($obj, 'password_updated_on');
        if ($meta && $meta->id) {
            $date = $meta->text;
        } elseif ($default_col && $obj->has_column($default_col)) {
            $date = $obj->$default_col;
        }
        if ($date) {
            try {
                return (new DateTime($date))->format(self::DATETIME_FORMAT);
            } catch (Exception $e) {
                return false;
            }
        }
        return null;
    }

    private function update_password_history($obj)
    {
        $history = [];
        $meta = $this->load_meta($obj, 'password_history');
        if (!$meta) {
            return;
        } elseif ($meta->id) {
            $history = json_decode($meta->text, true);
            if (!$history) $history = [];
        }
        $history[] = $obj->password;
        $history_count = count($history);
        $max = (int) $this->get_config_value('password_history_max', 0);
        if ($max > 0 && $history_count > $max) {
            $history = array_slice($history, $history_count - $max);
        }
        $meta->text(json_encode($history, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
        $meta->save();
    }

    private function get_password_history($obj)
    {
        if (
            $obj instanceof PADOBaseModel === false
         || $obj->has_column('password') === false
        ) {
            return false;
        }

        $history = null;
        $meta = $this->load_meta($obj, 'password_history');
        if ($meta && $meta->id) {
            $history = json_decode($meta->text, true);
        }
        if (!$history) {
            $history = [];
            // Re-get the password from the database.
            $id_column = $obj->_id_column;
            if ($id_column && $obj->$id_column) {
                $app = Prototype::get_instance();
                $_query_cache = $app->db->query_cache;
                $app->db->query_cache = false;
                $_obj = $app->db->model( $obj->_model )->load( (int) $obj->$id_column, ['limit' => 1], 'id,password' );
                $app->db->query_cache = $_query_cache;
                if ( $_obj && $_obj->password ) {
                    $history[] = $_obj->password;
                }
            }
        }
        $history_count = count($history);
        $max = (int) $this->get_config_value('password_history_max', 0);
        if ($max > 0 && $history_count > $max) {
            $history = array_slice($history, $history_count - $max);
        }
        return $history;
    }

    public function template_source_edit(&$cb, $app, &$params, &$args, &$extra, &$option)
    {
        if ($app->id !== 'Prototype') return;
        if ($app->param('_model') === 'user' && $app->param('_type') === 'edit' && $app->param('id')) {
            $user = $app->db->model('user')->get_by_key((int) $app->param('id'));
            if (!$user->id) return;
            $date = $this->get_password_updated_on($user);
            if (!$date) return;
            $app->ctx->local_vars['user_password_last_update_on'] = (new DateTime($date))->format('Y-m-d');
            $path = $this->path() . DS . 'tmpl' . DS . 'input_password_info.tmpl';
            $include = $app->ctx->build(file_get_contents($path));
            $html_head = $app->ctx->vars['html_head'] ?? '';
            $app->ctx->vars['html_head'] = $html_head . $include;
        }
    }

    public function template_output_dashboard($cb, $app, &$params, &$tmpl, &$output)
    {
        $user = $app->user();
        if (!$this->is_password_expired($user)) return;
        $date = $this->get_password_updated_on($user);
        if (!$date) return;
        $app->ctx->local_vars['user_password_expired'] = 1;
        $app->ctx->local_vars['user_password_last_update_on'] = (new DateTime($date))->format('Y-m-d');
        $path = $this->path() . DS . 'tmpl' . DS . 'expired_alert.tmpl';
        $include = $app->ctx->build(file_get_contents($path));
        $output = preg_replace( '|</h1>|u', "</h1>{$include}", $output );
    }

    public function template_output_edit($cb, $app, &$params, &$tmpl, &$output)
    {
        if ($app->param('_model') === 'user' && $app->param('_type') === 'edit') {
            $this->template_output_dashboard($cb, $app, $params, $tmpl, $output);
        }
    }

    public function hdlr_if_password_expired($args, $content, $ctx)
    {
        if (!self::$props['is_expired_enabled']) return false;

        $app = Prototype::get_instance();
        $model = $args['model'] ?? 'user';
        $scheme = $app->get_scheme_from_db($model);
        if (!$scheme) return false;

        $obj = null;
        if (isset($args['id'])) {
            if (ctype_digit((string)$args['id'])) {
                $obj = $ctx->app->db->model($model)->load((int) $args['id']);
            }
        } else {
            $obj = $ctx->stash($model);
        }
        return $this->is_password_expired($obj);
    }

    private function load_meta($obj, string $key)
    {
        if (!$obj || !$key) return false;
        $app = Prototype::get_instance();
        if ($obj instanceof PADOBaseModel === false) {
            return false;
        }
        $meta = null;
        $id_column = $obj->_id_column;
        if ($id_column && $obj->$id_column) {
            $_query_cache = $app->db->query_cache;
            $app->db->query_cache = false;
            $params = ['model' => $obj->_model, 'object_id' => $obj->$id_column,
                       'kind' => 'password_expired', 'key' => $key];
            $meta = $app->db->model('meta')->get_by_key($params);
            $app->db->query_cache = $_query_cache;
        }
        return $meta;
    }

    public static function validateDate(string $date, string $format = self::DATETIME_FORMAT)
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }
}
