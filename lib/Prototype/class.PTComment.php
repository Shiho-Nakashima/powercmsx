<?php

class PTComment extends PTForm {

    public  $exclude_cols = ['id', 'contributor_id', 'remote_ip'];
    public  $validations  = ['email' => ['Prototype', 'is_valid_email'],
                             'url' => ['Prototype', 'is_valid_url'] ];
    public  $identifer;

    function comment_setting ( $app, &$workspace, $setting = 'accept_comment' ) {
        if (! $app->use_comment ) {
            return;
        }
        $ctx = $app->ctx;
        $comment_setting = false;
        if ( $workspace = $app->workspace() ) {
            $comment_setting = $workspace->$setting;
            $ctx->stash( 'workspace', $workspace );
            $ctx->vars['workspace_id'] = $workspace->id;
        } else {
            $comment_setting = $app->get_config( $setting );
            if (! $comment_setting ) {
                $comment_setting = false;
            } else {
                $comment_setting = $comment_setting->value;
            }
        }
        if (! $comment_setting ) {
            return;
        }
        return $comment_setting;
    }

    function post_save_comment ( $cb, $app, $obj, $original ) {
        if ( $original && $original->status != $obj->status ) {
            $delayed_publish_objs = $app->delayed_publish_objs;
            $object_id = $obj->object_id;
            $object_model = $obj->model;
            $publish_key = "{$object_model}_{$object_id}";
            if (! isset( $delayed_publish_objs[ $publish_key ] ) ) {
                $publish = true;
                $comment_obj = $app->db->model( $object_model )->load( (int) $object_id );
                if ( $comment_obj ) {
                    if ( $comment_obj->has_column( 'status' ) ) {
                        $status_published = $app->status_published( $object_model );
                        if ( $status_published != $comment_obj->status ) {
                            $publish = false;
                        }
                    }
                    if ( $publish ) {
                        $app->delayed_publish_objs[ $publish_key ] = $comment_obj;
                    }
                }
            }
        }
        return 1;
    }

    function confirm ( $app, $url ) {
        $ctx = $app->ctx;
        $this->identifer = $ctx->local_vars['magic_token'] ? $ctx->local_vars['magic_token'] : $app->request_id;
        $workspace = null;
        $accept_comment = $this->comment_setting( $app, $workspace );
        if (! $accept_comment ) {
            return;
        }
        $comment = $app->db->model( 'comment' )->new();
        $errors = [];
        $obj = null;
        if ( $this->comment_validation( $app, $comment, $obj, $errors ) ) {
            $ctx->vars['confirm_ok'] = 1;
            $token = $this->identifer;
            $sess = $app->db->model( 'session' )->get_by_key( ['name' => $token,
                                                               'kind' => 'CR',
                                                               'key'  => 'comment',
                                                               'value'=> $comment->model,
                                                               'object_id' => $comment->object_id ] );
            $sess->start( time() );
            if ( $workspace ) {
                $sess->workspace_id( $workspace->id );
            }
            $form_expires = $app->form_expires;
            $sess->expires( time() + $form_expires );
            $sess->save();
            $ctx->vars['magic_token'] = $token;
            $ctx->local_vars['magic_token'] = $token;
        }
        $ctx->vars['errors'] = $errors;
    }

    function submit ( $app, $url ) {
        $ctx = $app->ctx;
        $this->identifer = $app->param( 'magic_token' ) ? $app->param( 'magic_token' ) : $app->request_id;
        $workspace = null;
        $accept_comment = $this->comment_setting( $app, $workspace );
        if (! $accept_comment ) {
            return;
        }
        $comment = $app->db->model( 'comment' )->new();
        $errors = [];
        $obj = null;
        if ( $this->comment_validation( $app, $comment, $obj, $errors ) ) {
            $token = $this->identifer;
            $sess = $app->db->model( 'session' )->get_by_key( ['name' => $token,
                                                               'kind' => 'CR',
                                                               'key'  => 'comment',
                                                               'value'=> $comment->model,
                                                               'object_id' => $comment->object_id ] );
            if (! $sess->id ) {
                $message = $this->translate( 'Invalid request.' );
                $errors['message'] = $message;
                $ctx->vars['error'] = $message;
                $ctx->vars['errors'] = $errors;
                return;
            } else if ( $sess->expires < time() ) {
                $sess->remove();
                $message = $this->translate( 'Your session has expired.' );
                $errors['message'] = $message;
                $ctx->vars['error'] = $message;
                $ctx->vars['errors'] = $errors;
                return;
            }
            $app->set_default( $comment );
            $status = (int) $this->comment_setting( $app, $workspace, 'comment_status' );
            if ( $status ) {
                $comment->status( $status );
            }
            $member = $this->get_member();
            if ( $member ) {
                $comment->contributor_id( $member->id );
                $comment->contributor_type( $member->_model );
            }
            $table = $app->get_table( $obj->_model );
            $primary = $table->primary;
            $ctx->vars['object_name']  = $obj->$primary;
            $ctx->vars['object_id']    = $obj->id;
            $ctx->vars['object_model'] = $obj->_model;
            $ctx->vars['language']     = $app->language;
            $app->set_mail_param( $ctx );
            if ( $workspace ) {
                $comment->workspace_id( (int) $workspace->id );
            } else {
                $comment->workspace_id( 0 );
            }
            $error = isset( $ctx->vars['error'] ) ? $ctx->vars['error'] : '';
            $app->init_callbacks( 'comment', 'save_filter' );
            $app->init_callbacks( 'comment', 'pre_save' );
            $callback = ['name' => 'save_filter', 'error' => $error,
                         'errors' => $errors, 'object' => $obj, 'is_new' => true ];
            $save_filter = $app->run_callbacks( $callback, 'comment', $comment );
            $errors = $callback['errors'];
            if (! $save_filter || !empty( $errors ) ) {
                $error = $callback['error'];
                $ctx->vars['error'] = $callback['error'];
                $ctx->vars['errors'] = $errors;
                return;
            }
            $callback = ['name' => 'pre_save', 'error' => $error,
                         'errors' => $errors, 'object' => $obj, 'is_new' => true ];
            $original = clone $comment;
            $pre_save = $app->run_callbacks( $callback, 'comment', $comment, $comment );
            if (! $pre_save || !empty( $errors ) ) {
                $ctx->vars['error'] = $callback['error'];
                $ctx->vars['errors'] = $errors;
                return;
            }
            $comment->save();
            $ctx->vars['comment_status'] = $comment->status;
            $ctx->vars['comment_id'] = $comment->id;
            $app->init_callbacks( 'comment', 'post_save' );
            $callback['name'] = 'post_save';
            $app->run_callbacks( $callback, 'comment', $comment, $original );
            $sess->remove();
            $message = $this->translate( 'The comment posted for %s has been received.', $obj->$primary );
            $app->log( ['message'   => $message,
                        'category'  => 'comment',
                        'model'     => $obj->_model,
                        'object_id' => $obj->id,
                        'level'     => 'info'] );
            $system_email = $app->get_config( 'system_email' );
            if ( $system_email ) {
                $system_email = $system_email->value;
            }
            $app->set_mail_param( $ctx );
            $comment_thanks = $this->comment_setting( $app, $workspace, 'comment_thanks' );
            if ( $system_email && $comment_thanks && $comment->email ) {
                $template  = null;
                $body = $app->get_mail_tmpl( 'comment_thanks', $template );
                $subject = $template && $template->subject ? $template->subject
                  : '<mt:var name="object_name"
                      language="$language"
                      setvar="object_name"><mt:trans
                      phrase="(%s) The comment you posted for %s has been received."
                      params="\'$app_name\',\'$object_name\'">';
                $subject = $app->build( $subject );
                $body = $app->build( $body );
                $headers = ['From' => $system_email ];
                $mail_error = '';
                if (! PTUtil::send_mail( $comment->email, $subject, $body, $headers, $mail_error ) ) {
                    $message =
                        $this->translate( 'Failed to send a thank you email for commenter.(%s)', $mail_error );
                    $metadata = ['subject' => $subject, 'body' => $body ];
                    $metadata = json_encode( $metadata,
                     JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT );
                    $app->log( ['message'   => $message,
                                'category'  => 'comment',
                                'metadata'  => $metadata,
                                'model'     => 'comment',
                                'object_id' => $comment->id,
                                'level'     => 'error'] );
                }
            }
            $relations = $app->db->model( 'relation' )->load(
                        ['name' => 'can_comment_notify', 'from_obj' => 'role',
                         'to_obj' => 'table', 'to_id' => $table->id ] );
            $notify_user_ids = [];
            foreach ( $relations as $relation ) {
                $role = $app->db->model( 'role' )->load( $relation->from_id );
                $perms = $app->load_context_objs( $role, 'permission' );
                if ( is_array( $perms ) && !empty( $perms ) ) {
                    foreach ( $perms as $perm ) {
                        $notify_user_ids[ $perm->user_id ] = true;
                    }
                }
            }
            if ( $system_email && ! empty( $notify_user_ids ) ) {
                $users = $app->db->model( 'user' )->load(
                    ['status' => 2, 'id' => ['IN' => array_keys( $notify_user_ids ) ] ],
                     null, 'email,nickname' );
                if (! empty( $users ) ) {
                    $ctx->vars['admin_url'] = $app->admin_url;
                    $ctx->vars['script_uri'] = $app->admin_url; // Backward Compatible
                    $emails = [];
                    foreach ( $users as $user ) {
                        $emails[] = $user->email;
                    }
                    $emails = array_unique( $emails );
                    $emails = implode( ',', $emails );
                    $template  = null;
                    $body = $app->get_mail_tmpl( 'comment_notify', $template );
                    $subject = $template && $template->subject ? $template->subject
                      : '<mt:var name="object_name"
                          language="$language"
                          setvar="object_name"><mt:trans
                          phrase="(%s) The comment posted for %s has been received."
                          params="\'$app_name\',\'$object_name\'">';
                    $subject = $app->build( $subject );
                    $comment_param = '?__mode=view&_type=edit&_model=comment&id=';
                    $comment_param .= $comment->id;
                    if ( $comment->workspace_id ) {
                        $comment_param .= '&workspace_id=' . $comment->workspace_id;
                    }
                    $ctx->vars['comment_param'] = $comment_param;
                    $comment_values = $comment->get_values( true );
                    unset( $comment_values['modified_on'], $comment_values['created_on'],
                           $comment_values['modified_by'], $comment_values['created_by'],
                           $comment_values['id'], $comment_values['contributor_id'],
                           $comment_values['contributor_type'], $comment_values['object_id'] );
                    $comment_params = [];
                    foreach ( $comment_values as $column => $value ) {
                        if ( $column == 'status' ) {
                            $value = $value == 2 ? $this->translate( 'Enabled' ) : $this->translate( 'Disabled' );
                        }
                        if ( $column == 'model' ) {
                            $comment_params[ $this->translate( $table->label ) ] = $obj->$primary;
                        } else {
                            $column = $this->translate( $app->translate( $column, null, $app, 'default' ) );
                            $comment_params[ $column ] = $value;
                        }
                    }
                    $ctx->vars['comment_params'] = $comment_params;
                    $body = $app->build( $body );
                    $headers = ['From' => $system_email ];
                    $mail_error = '';
                    if (! PTUtil::send_mail( $emails, $subject, $body, $headers, $mail_error ) ) {
                        $message =
                            $this->translate( 'Failed to send a notification email.(%s)', $mail_error );
                        $metadata = ['subject' => $subject, 'body' => $body ];
                        $metadata = json_encode( $metadata,
                         JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT );
                        $app->log( ['message'   => $message,
                                    'category'  => 'comment',
                                    'metadata'  => $metadata,
                                    'model'     => 'comment',
                                    'object_id' => $comment->id,
                                    'level'     => 'error'] );
                    }
                }
            }
            if ( $status === 2 ) {
                $_REQUEST['comment_publish_on_post'] = 1;
                $app->publish_obj( $obj );
                unset( $_REQUEST['comment_publish_on_post'] );
            }
            $ctx->vars['submit_ok'] = 1;
        }
        $ctx->vars['errors'] = $errors;
    }

    function comment_validation ( $app, &$comment, &$obj, &$errors ) {
        $ctx = $app->ctx;
        $confirm_ok = true;
        if ( $language = $app->param( '_language' ) ) {
            if ( in_array( $language, $app->languages ) ) {
                $app->language = $language;
            }
        }
        $anonymous_comment = $this->comment_setting( $app, $workspace, 'anonymous_comment' );
        if (!$anonymous_comment && !$this->get_member() ) {
            $message = $this->translate( 'You must be logged in to comment.' );
            $ctx->vars['error'] = $message;
            $errors['message'] = $message;
            return false;
        }
        $spam = $app->db->model( 'remote_ip' )->count(
            ['remote_ip' => $app->remote_ip,
             'class' => 'spam'] );
        if ( $spam ) {
            $message = $this->translate( 'Post not allowed.' );
            $ctx->vars['error'] = $message;
            $errors['message'] = $message;
            return false;
        }
        $form_interval = (int) $app->form_interval;
        $form_upper_limit = (int) $app->form_upper_limit;
        $tsfrom = $comment->ts2db( date( 'YmdHis', strtotime( "-{$form_interval} second" ) ) );
        $logs = $app->db->model( 'log' )->count( [
            'category' => 'comment',
            'remote_ip' => $app->remote_ip, 'created_on' => ['>' => $tsfrom] ] );
        if ( $logs && $logs > $form_upper_limit ) {
            $message =
                $this->translate(
                'Too many posts have been submitted from you in a short period of time.' )
                . $this->translate( 'Please try again in a short while.' );
            $ctx->vars['error'] = $message;
            $errors['message'] = $message;
            return false;
        }
        $object_id = $app->param( 'object_id' );
        $model = $app->param( 'model' );
        if (! $model || ! (int) $object_id ) {
            $message = $this->translate( 'Invalid request.' );
            $ctx->vars['error'] = $message;
            $errors['message'] = $message;
            return false;
        }
        $table = $app->get_table( $model );
        $obj = $app->db->model( $model )->load( (int) $object_id );
        $model_name = $this->translate( $app->translate( $model, null, $app, 'default' ) );
        if (! $obj || ! $table ) {
            $message = $this->translate( '%s not found.', $model_name );
            $ctx->vars['error'] = $message;
            $errors['message'] = $message;
            return false;
        }
        if ( $obj->has_column( 'status' ) ) {
            $status_published = $app->status_published( $obj );
            if ( $status_published != $obj->status ) {
                $message = $this->translate( '%s not found.', $model_name );
                $ctx->vars['error'] = $message;
                $errors['message'] = $message;
                    return false;
            }
        }
        if ( $obj->has_column( 'rev_type' ) && $obj->rev_type ) {
            $message = $this->translate( '%s not found.', $model_name );
            $ctx->vars['error'] = $message;
            $errors['message'] = $message;
            return false;
        }
        if (!$table->allow_comment || !$obj->allow_comment ) {
            $message = $this->translate( 'Comment is not allowed.', $model_name );
            $ctx->vars['error'] = $message;
            $errors['message'] = $message;
            return false;
        }
        $member = $this->get_member();
        if (! $app->param( 'name' ) && $member ) {
            $_REQUEST['name'] = $member->nickname;
        }
        if (! $app->param( 'email' ) && $member ) {
            $_REQUEST['email'] = $member->email;
        }
        $scheme = $app->get_scheme_from_db( 'comment' );
        $column_defs = $scheme['column_defs'];
        $required_columns = [];
        $exclude_cols = $this->exclude_cols;
        $integers = [];
        $floats   = [];
        foreach ( $column_defs as $column => $column_def ) {
            if (! in_array( $column, $exclude_cols ) ) {
                if ( isset( $column_def['not_null'] ) && $column_def['not_null'] ) {
                    $required_columns[] = $column;
                }
                if ( strpos( $column_def['type'], 'int' ) !== false ) {
                    $integers[] = $column;
                } else if ( $column_def['type'] == 'decimal' ||  $column_def['type'] == 'double' ) {
                    $floats[] = $column;
                }
            }
        }
        $params = $app->param();
        unset( $params['__mode'], $params['_type'], $params['_language'], $params['magic_token'] );
        $validations = $this->validations;
        foreach ( $params as $column => $value ) {
            $value = trim( $value );
            if (! $comment->has_column( $column ) ) {
                continue;
            } else if ( in_array( $column, $integers ) ) {
                $value = (int) $value;
            } else if ( in_array( $column, $floats ) ) {
                $value = (float) $value;
            }
            $label = $column == 'text' ? $this->translate( 'Comment' )
                   : $this->translate( $app->translate( $column, null, $app, 'default' ) );
            $error = '';
            if ( in_array( $column, $required_columns ) && ! $value ) {
                $error = $this->translate( '%s is required.', $label );
                $errors[ $column ] = $error;
                $confirm_ok = false;
            }
            if (! $error && isset( $validations[ $column ] ) ) {
                if (! in_array( $column, $required_columns ) && ! $value ) {
                    continue;
                }
                list( $component, $meth ) = $validations[ $column ];
                $component = $app->component( $component );
                if ( method_exists( $component, $meth ) ) {
                    $value = PTUtil::normalize( $value );
                    if (! $component->$meth( $value, $error ) ) {
                        $errors[ $column ] = $error;
                        $confirm_ok = false;
                    }
                }
            }
            if (! $error ) {
                $comment->$column( $value );
            }
        }
        if (! empty( $errors ) ) {
            $ctx->vars['error'] = $this->translate( 'Please check your entries.' );
        }
        return $confirm_ok;
    }

}