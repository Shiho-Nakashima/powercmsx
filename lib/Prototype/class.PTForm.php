<?php

class PTForm {

    public  $identifer;
    private $sessions = [];
    private $attachments = []; // Attch to Email
    private $validation_ok = false;
    private $reply_to = null;

    function confirm ( $app, $url ) {
        $ctx = $app->ctx;
        $this->identifer = $app->param( 'magic_token' )
                         ? $app->param( 'magic_token' ) : $app->magic();
        $errors = [];
        $form_id = $app->param( 'form_id' );
        $form = null;
        if ( $form_id ) {
            $form = $app->db->model( 'form' )->load( (int) $form_id );
        }
        if ( $form && $form->status == 4 ) {
            $ctx->stash( 'form', $form );
            $ctx->stash( 'current_context', 'form' );
            $values = [];
            $errors = [];
            $params = [];
            $raw_params = [];
            $attachmentfiles = [];
            $q_map = [];
            $email = '';
            $primary_col = '';
            $confirm_ok = $this->validation( $app, $form, $values, $errors,
                                             $email, $mail_col, $params, $raw_params,
                                             $primary_col, $attachmentfiles, $q_map );
            $this->validation_ok = $confirm_ok;
            if (! empty( $errors ) ) {
                $ctx->vars['error'] = true;
            }
            $ctx->vars['errors'] = $errors;
            $ctx->vars['confirm_ok'] = $confirm_ok;
            $this->set_vars( $app, $ctx, $form, $params, $raw_params );
            if ( $app->id == 'RESTfulAPI' ) {
                return ['errors' => $errors ];
            }
        } else {
            if ( $form && $form->status == 5 ) {
                $errors[] = $this->translate( "The reception on '%s' has been closed.",
                    $app->translate( $form->name ) );
            } else {
                $errors[] = $this->translate( 'Invalid request.' );
            }
            $ctx->vars['errors'] = $errors;
        }
        header( 'Cache-Control: no-store, no-cache, must-revalidate' );
        header( 'Pragma: no-cache' );
    }

    function submit ( $app, $url ) {
        $ctx = $app->ctx;
        $this->identifer = $app->param( 'magic_token' )
                         ? $app->param( 'magic_token' ) : $app->magic();
        $errors = [];
        $form_id = $app->param( 'form_id' );
        $form = null;
        if ( $form_id ) {
            $form = $app->db->model( 'form' )->load( (int) $form_id );
        }
        if ( $form && $form->status == 4 ) {
            $ctx->stash( 'form', $form );
            $ctx->stash( 'current_context', 'form' );
            $values = [];
            $params = [];
            $raw_params = [];
            $email = '';
            $primary_col = '';
            $attachmentfiles = [];
            $q_map = [];
            $name_col = '';
            $confirm_ok = $this->validation( $app, $form, $values, $errors, $email,
                                             $mail_col, $params, $raw_params, $primary_col,
                                             $attachmentfiles, $q_map, $name_col );
            $this->validation_ok = $confirm_ok;
            $this->set_vars( $app, $ctx, $form, $params, $raw_params );
            if (! empty( $errors ) ) {
                $ctx->vars['error'] = true;
                if ( $app->id == 'RESTfulAPI' ) {
                    return ['errors' => $errors ];
                }
            }
            if ( $confirm_ok ) {
                if ( $primary_col ) {
                    $primary = $values[ $primary_col ];
                    // unset( $values[ $primary_col ] );
                } else {
                    $primary = current( $values );
                    // array_shift( $values );
                }
                $name = '';
                if ( $name_col ) {
                    $name = $values[ $name_col ];
                }
                $app->get_scheme_from_db( 'contact' );
                $contact = $app->db->model( 'contact' )->new();
                $contact->subject( $primary );
                $contact->name( $name );
                $contact->email( $email );
                if ( $identifier = $app->param( '_identifier' ) ) {
                    $contact->identifier( $identifier );
                }
                // unset( $values[ $mail_col ] );
                $contact->data( json_encode( $values,
                                JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT ) );
                $contact->question_map( json_encode( $q_map,
                                JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT ) );
                $contact->form_id( $form_id );
                $contact->state( 1 );
                $object_id = $app->param( 'object_id' )
                           ? (int)  $app->param( 'object_id' )
                           : (int) $url->object_id;
                $model     = $app->param( 'model' )
                           ? $app->param( 'model' ) : $url->model;
                $ws_id = $form->workspace_id;
                if ( $ws_id ) $ws_id = (int) $ws_id;
                $contact->workspace_id( $ws_id );
                if ( $object_id && $model ) {
                    $app->get_scheme_from_db( $model );
                    $object = $app->db->model( $model )->load( $object_id );
                    if ( $object ) {
                        if ( $url->id && ( $url->model != $model || $url->object_id != $object_id ) ) {
                            if ( $object->form_id != $form->id ) {
                                $model = $url->model;
                                $object_id = (int) $url->object_id;
                                $object = $app->db->model( $model )->load( $object_id );
                            }
                        }
                        if ( $object ) {
                            $contact->model( $object->_model );
                            $contact->object_id( $object->id );
                        }
                    }
                }
                $app->init_callbacks( 'contact', 'save_filter' );
                $app->init_callbacks( 'contact', 'pre_save' );
                $callback = ['name' => 'save_filter', 'error' => '',
                             'errors' => $errors, 'values' => $values,
                             'form' => $form, 'is_new' => true ];
                $save_filter = $app->run_callbacks( $callback, 'contact', $contact );
                $errors = $callback['errors'];
                if ( $msg = $callback['error'] ) {
                    $errors[] = $msg;
                }
                if (! $save_filter || !empty( $errors ) ) {
                    $ctx->vars['error'] = true;
                    $ctx->vars['errors'] = $errors;
                    if ( $app->id == 'RESTfulAPI' ) {
                        return ['errors' => $errors ];
                    }
                    return;
                }
                $app->set_default( $contact );
                $contact->workspace_id( $ws_id ); // if bootstrapper's workspace_id != 0
                $callback = ['name' => 'pre_save', 'error' => '', 'is_new' => true,
                             'values' => $values, 'form' => $form ];
                $pre_save = $app->run_callbacks( $callback, 'contact', $contact, $contact );
                if ( $msg = $callback['error'] ) {
                    $errors[] = $msg;
                }
                if (! $pre_save || !empty( $errors ) ) {
                    $ctx->vars['error'] = true;
                    $ctx->vars['errors'] = $errors;
                    if ( $app->id == 'RESTfulAPI' ) {
                        return ['errors' => $errors ];
                    }
                    return;
                }
                $original = clone $contact;
                $app->init_callbacks( 'contact', 'post_save' );
                if (! $form->not_save ) {
                    if ( $contact->save() ) {
                        if (! empty( $attachmentfiles ) ) {
                            $to_ids = [];
                            foreach ( $attachmentfiles as $sess ) {
                                $attachment = $app->db->model('attachmentfile')->new();
                                $attachment->name( $sess->value );
                                $attachment->mime_type( $sess->key );
                                $attachment->workspace_id( $contact->workspace_id );
                                $attachment->file( $sess->data );
                                $json = json_decode( $sess->text );
                                $attachment->size( $json->file_size );
                                $app->set_default( $attachment );
                                $attachment->status( 1 );
                                $attachment->save();
                                $to_ids[] = $attachment->id;
                                $metadata = $app->db->model( 'meta' )->get_by_key(
                                   ['model' => 'attachmentfile', 'object_id' => $attachment->id,
                                                  'kind' => 'metadata', 'key' => 'file' ] );
                                $metadata->text( $sess->text );
                                $metadata->metadata( $sess->metadata );
                                $metadata->data( $sess->extradata );
                                $metadata->save();
                                $this->sessions[] = $sess;
                            }
                            $args = ['from_id' => $contact->id, 
                                     'name' => 'attachmentfiles',
                                     'from_obj' => 'contact',
                                     'to_obj' => 'attachmentfile'];
                            $app->set_relations( $args, $to_ids, true, $errors );
                        }
                        $callback = ['name' => 'post_save', 'is_new' => true,
                                     'form' => $form, 'values' => $values ];
                        $app->run_callbacks( $callback, 'contact', $contact, $original );
                        if ( $form->contact_limit ) {
                            $contacts = $app->db->model( 'contact' )->count( ['form_id' => $form->id ] );
                            if ( $contacts >= $form->contact_limit ) {
                                $form_re_publish = isset( $_REQUEST['_form_re_publish'] ) ? $_REQUEST['_form_re_publish'] : null;
                                $app->param( '_form_re_publish', 1 );
                                $_REQUEST['_form_re_publish'] = 1;
                                $app->publish_obj( $form );
                                if ( $form_re_publish === null ) {
                                    unset( $_REQUEST['_form_re_publish'] );
                                } else {
                                    $_REQUEST['_form_re_publish'] = $form_re_publish;
                                }
                            }
                        }
                    } else {
                        $message = $this->translate(
                                'Failed to save a contact for %s.', $form->name );
                        $app->log( ['message'   => $message,
                                    'category'  => 'contact',
                                    'model'     => 'form',
                                    'object_id' => $form->id,
                                    'level'     => 'error'] );
                        $ctx->vars['submit_ok'] = false;
                    }
                } else if ( $app->contact_not_save_post_save ) {
                    $callback = ['name' => 'post_save', 'is_new' => true,
                                 'form' => $form, 'values' => $values, 'not_save' => true ];
                    $app->run_callbacks( $callback, 'contact', $contact, $original );
                }
                $session_name = $app->form_session_name ? $app->form_session_name : 'pcmsx_form_token';
                if ( isset( $_SESSION ) && isset( $_SESSION[ $session_name ] ) ) {
                    unset( $_SESSION[ $session_name ] );
                }
                $message = $this->translate(
                        'The contact posted for %s has been received.', $form->name );
                $app->log( ['message'   => $message,
                            'category'  => 'contact',
                            'model'     => 'form',
                            'object_id' => $form->id,
                            'level'     => 'info'] );
                $ctx->vars['contact_name'] = $contact->name;
                $ctx->vars['contact_email'] = $contact->email;
                $ctx->vars['contact_id'] = $contact->id;
                $ctx->vars['contact_status'] = $contact->state;
                $ctx->vars['contact_state'] = $contact->state;
                $ctx->stash( 'contact', $contact );
                $err = '';
                $mail_return_path = $app->mail_return_path;
                if ( $form->send_email ) {
                    $from = $form->email_from ? $form->email_from : '';
                    $from = $from ? $app->build( $from ) : '';
                    $system_email = '';
                    if (! $from || ! $app->is_valid_email( $from, $err ) ) {
                        $system_email = $app->get_config( 'system_email' );
                        if (!$system_email ) {
                            return $app->error( 'System Email Address is not set in System.' );
                        }
                        $from = $system_email->value;
                        $system_email = $from;
                    }
                    $headers = ['From' => $from ];
                    $app->set_mail_param( $ctx, $form->workspace );
                    $ctx->vars['admin_url'] = $app->admin_url;
                    $ctx->vars['script_uri'] = $app->admin_url; // Backward Compatible
                    $ctx->vars['form_name'] = $form->name;
                    if ( $form->send_thanks && $contact->email ) {
                        $subject = null;
                        $body = null;
                        $template = null;
                        $template_id = $form->thanks_template;
                        if ( $template_id ) {
                            $template =
                                $app->db->model( 'template' )->load( (int) $template_id );
                            if ( $template && $template->text ) {
                                $body = $template->text;
                            }
                            if ( is_object( $template ) ) {
                                $ctx->stash( 'current_template', $template );
                            }
                        }
                        if (! $body ) {
                            $body = $app->get_mail_tmpl( 'form_thanks', $template );
                        }
                        if ( $template ) {
                            $subject = $template->subject;
                        }
                        if (! $subject ) {
                            $subject = $this->translate(
                                'The inquiry you posted for %s has been received.', $form->name );
                        }
                        $ctx->vars['mail_type'] = 'thanks';
                        $subject = $app->build( $subject );
                        $body = $app->build( $body );
                        if ( $thanks_cc = $form->thanks_cc ) {
                            $thanks_cc = $app->build( $thanks_cc );
                            if ( $thanks_cc ) {
                                $headers['Cc'] = $thanks_cc;
                            }
                        }
                        if ( $thanks_bcc = $form->thanks_bcc ) {
                            $thanks_bcc = $app->build( $thanks_bcc );
                            if ( $thanks_bcc ) {
                                $headers['Bcc'] = $thanks_bcc;
                            }
                        }
                        if ( $form->thanks_return_path ) {
                            $app->mail_return_path = $form->thanks_return_path;
                        }
                        $mail_error = '';
                        if (! PTUtil::send_mail( $contact->email,
                            $subject, $body, $headers, $mail_error ) ) {
                            $message =
                                $this->translate( 'Failed to send a thank you email.(%s)',
                                                 $mail_error );
                            $metadata = ['subject' => $subject, 'body' => $body ];
                            $metadata = json_encode( $metadata,
                             JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT );
                            $app->log( ['message'   => $message,
                                        'category'  => 'contact',
                                        'metadata'  => $metadata,
                                        'model'     => 'form',
                                        'object_id' => $form->id,
                                        'level'     => 'error'] );
                        }
                    }
                    if ( $form->send_notify ) {
                        $from = $form->notify_from ? $form->notify_from : $system_email;
                        $from = $from ? $app->build( $from ) : '';
                        if (! $from || ! $app->is_valid_email( $from, $err ) ) {
                            $system_email = $app->get_config( 'system_email' );
                            if (!$system_email ) {
                                return $app->error( 'System Email Address is not set in System.' );
                            }
                            $from = $system_email->value;
                        }
                        $headers = ['From' => $from ];
                        $subject = null;
                        $body = null;
                        $template = null;
                        $template_id = $form->notify_template;
                        if ( $template_id ) {
                            $template = $app->
                                db->model( 'template' )->load( (int) $template_id );
                            if ( $template && $template->text ) {
                                $body = $template->text;
                            }
                            if ( is_object( $template ) ) {
                                $ctx->stash( 'current_template', $template );
                            }
                        }
                        if (! $body ) {
                            $body = $app->get_mail_tmpl( 'form_notify', $template );
                        }
                        if ( $template ) {
                            $subject = $template->subject;
                        }
                        if (! $subject ) {
                            $subject = $this->translate(
                                'The inquiry posted for %s has been received.', $form->name );
                        }
                        // ?__mode=view&_type=edit&_model=contact&id=n
                        $contact_param = '?__mode=view&_type=edit&_model=contact&id=';
                        $contact_param .= $contact->id;
                        if ( $contact->workspace_id ) {
                            $contact_param .= '&workspace_id=' . $contact->workspace_id;
                        }
                        $ctx->vars['contact_param'] = $contact_param;
                        $ctx->vars['mail_type'] = 'notify';
                        $subject = $app->build( $subject );
                        $body = $app->build( $body );
                        $mail_error = '';
                        $to = $form->notify_to;
                        if (! $to ) {
                            $form_user = $form->created_by ? $form->created_by : $form->modified_by;
                            if ( $form_user ) {
                                $form_user = $app->db->model( 'user' )->load( (int) $form_user );
                                if ( $form_user ) $to = $form_user->email;
                            }
                            if (! $to ) {
                                $to = $from;
                            }
                        }
                        $to = $app->build( $to );
                        unset( $headers['Cc'] );
                        unset( $headers['Bcc'] );
                        if ( $notify_cc = $form->notify_cc ) {
                            $notify_cc = $app->build( $notify_cc );
                            if ( $notify_cc ) {
                                $headers['Cc'] = $notify_cc;
                            }
                        }
                        if ( $notify_bcc = $form->notify_bcc ) {
                            $notify_bcc = $app->build( $notify_bcc );
                            if ( $notify_bcc ) {
                                $headers['Bcc'] = $notify_bcc;
                            }
                        }
                        $files = $this->attachments;
                        if ( $this->reply_to ) {
                            $headers['Reply-To'] = $this->reply_to;
                        }
                        if ( $form->notify_return_path ) {
                            $app->mail_return_path = $form->notify_return_path;
                        }
                        $res = empty( $files )
                             ? PTUtil::send_mail( $to, $subject, $body, $headers, $mail_error )
                             : PTUtil::send_multipart_mail( $to, $subject, $body, $headers, $files, $mail_error );
                        if (! $res ) {
                            $message =
                                $this->translate( 'Failed to send a notification email.(%s)',
                                                 $mail_error );
                            $metadata = ['subject' => $subject, 'body' => $body ];
                            $metadata = json_encode( $metadata,
                             JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT );
                            $app->log( ['message'   => $message,
                                        'category'  => 'contact',
                                        'metadata'  => $metadata,
                                        'model'     => 'form',
                                        'object_id' => $form->id,
                                        'level'     => 'error'] );
                        }
                    }
                }
                $app->mail_return_path = $mail_return_path;
                if (! empty( $this->sessions ) ) {
                    $sessions = $this->sessions;
                    $app->db->model( 'session' )->remove_multi( $sessions );
                }
                $redirect_url = $form->redirect_url;
                if ( $redirect_url ) {
                    $redirect_url = $app->build( $redirect_url );
                    if ( $app->id == 'RESTfulAPI' ) {
                        return ['contact' => $contact, 'redirect_url' => $redirect_url ];
                    }
                    return $app->redirect( $redirect_url );
                }
                if ( $app->id == 'RESTfulAPI' ) {
                    return ['contact' => $contact ];
                }
                $ctx->vars['submit_ok'] = true;
            } else {
                $ctx->vars['errors'] = $errors;
            }
        } else {
            if ( $form && $form->status == 5 ) {
                $errors[] = $this->translate( "The reception on '%s' has been closed.",
                    $app->translate( $form->name ) );
            } else {
                $errors[] = $this->translate( 'Invalid request.' );
            }
            $ctx->vars['errors'] = $errors;
        }
        header( 'Cache-Control: no-store, no-cache, must-revalidate' );
        header( 'Pragma: no-cache' );
    }

    function set_vars ( $app, $ctx, $form, $params, $raw_params ) {
        $ctx->vars['post_params'] = $params;
        $ctx->vars['post_raw_params'] = $raw_params;
        $form_values = $form->get_values();
        foreach ( $form_values as $k => $v ) {
            $ctx->vars[ $k ] = $v;
        }
        $ctx->stash( 'current_context', 'form' );
        $ctx->stash( 'form', $form );
        $ws = null;
        if ( $ws = $form->workspace ) {
            $ctx->stash( 'workspace', $ws );
            $ctx->vars['workspace_id'] = $ws->id;
        }
        if ( $app->mode == 'confirm' ) {
            $sess_token = null;
            if ( $form->requires_token && $form->use_session ) {
                session_start();
                $sess_token = $app->magic();
                $session_name = $app->form_session_name ? $app->form_session_name : 'pcmsx_form_token';
                $_SESSION[ $session_name ] = $sess_token;
            }
            $token = $this->identifer;
            $sess = $app->db->model( 'session' )->get_by_key( ['name' => $token,
                                                               'kind' => 'CR'] );
            if (! $sess->id ) {
                $attaches = $app->db->model( 'session' )->load(
                                            ['name' => ['like' => "{$token}-%"],
                                             'start' => $app->request_time, 
                                             'kind' => 'UP'], [], 'id,name' );
                $old_token = $token;
                $token = $app->magic();
                foreach ( $attaches as $attach ) {
                    $session_name = $attach->name;
                    $session_name = preg_replace( "/^{$old_token}\-/", "{$token}-", $session_name );
                    $attach->name( $session_name );
                    $attach->save();
                }
                $sess = $app->db->model( 'session' )->get_by_key( ['name' => $token,
                                                                   'kind' => 'CR'] );
            }
            $sess->start( $app->request_time );
            $sess->value( $form->id );
            if ( $app->validate_token_ip ) {
                $sess->key( $app->remote_ip );
            }
            if ( $app->validate_token_ua ) {
                $user_agent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : null;
                $sess->text( $user_agent );
            }
            $sess->data( $sess_token );
            if ( $ws ) {
                $sess->workspace_id( $ws->id );
            }
            $form_expires = $form->token_expires
                          ? $form->token_expires : $app->form_expires;
            $sess->expires( $app->request_time + $form_expires );
            $sess->save();
            $ctx->vars['magic_token'] = $token;
            $ctx->local_vars['magic_token'] = $token;
        }
    }

    function validation ( $app, $form, &$values = [], &$errors = [],
        &$email = '', &$mail_col = '', &$params = [], &$raw_params = [],
        &$primary_col = '', &$attachmentfiles = [], &$q_map = [], &$name_col = '' ) {
        // Set the language for PTValidator.
        $app_language = $app->language;
        $app->language = $this->get_language();
        $app_translate_in_user_setting = $app->translate_in_user_setting;
        $app->translate_in_user_setting = false;

        $validator = new PTValidator();
        if ( $form->status == 5 ) {
            $errors[] = $this->translate( "The reception on '%s' has been closed.",
                $app->translate( $form->name ) );
            $app->ctx->vars['form_closed'] = 1;
        } else if ( $form->status != 4 ) {
            $errors[] = $this->translate( 'Invalid request.' );
            $app->ctx->vars['form_closed'] = 1;
        }
        if ( $form->status == 4 && $form->contact_limit ) {
            $contacts = $app->db->model( 'contact' )->count( ['form_id' => $form->id ] );
            if ( $contacts >= $form->contact_limit ) {
                $errors[] = $this->translate( "The reception on '%s' has been closed.",
                    $app->translate( $form->name ) );
                $app->ctx->vars['form_closed'] = 1;
            }
        }
        $validations = isset( $app->registry['form_validations'] )
                     ? $app->registry['form_validations'] : [];
        $language = $app->param( '_language' );
        if (! $language || !in_array( $language, $app->languages ) ) {
            $language = $app->language;
        }
        if ( $app->verify_form_referrer ) {
            $is_valid = true;
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
            if (! $is_valid ) {
                $errors[] = $this->translate( 'Invalid request.' );
                $app->language = $app_language;
                $app->translate_in_user_setting = $app_translate_in_user_setting;
                return false;
            }
        }
        if ( $form->requires_token && $app->mode != 'confirm' ) {
            $token = $app->param( 'magic_token' );
            if (! $token ) {
                $errors[] = $this->translate( 'Invalid request.' );
                $app->language = $app_language;
                $app->translate_in_user_setting = $app_translate_in_user_setting;
                return false;
            }
            $sess = $app->db->model( 'session' )->get_by_key(
                ['name' => $token, 'kind' => 'CR'] );
            if (! $sess->id ) {
                $errors[] = $this->translate( 'Invalid request.' );
                $app->language = $app_language;
                $app->translate_in_user_setting = $app_translate_in_user_setting;
                return false;
            }
            if ( $sess->expires < $app->request_time ) {
                $this->sessions[] = $sess;
                $errors[] = $this->translate( 'Your session has expired.' );
                $app->language = $app_language;
                $app->translate_in_user_setting = $app_translate_in_user_setting;
                return false;
            }
            if ( $app->validate_token_ip ) {
                if ( $sess->key != $app->remote_ip ) {
                    $errors[] = $this->translate( 'Invalid request.' );
                    $app->language = $app_language;
                    $app->translate_in_user_setting = $app_translate_in_user_setting;
                    return false;
                }
            }
            if ( $app->validate_token_ua ) {
                $user_agent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : null;
                if ( $sess->text != $user_agent ) {
                    $errors[] = $this->translate( 'Invalid request.' );
                    $app->language = $app_language;
                    $app->translate_in_user_setting = $app_translate_in_user_setting;
                    return false;
                }
            }
            if ( $form->use_session ) {
                session_start();
                $session_name = $app->form_session_name ? $app->form_session_name : 'pcmsx_form_token';
                $sess_token = isset( $_SESSION[ $session_name ] ) ? $_SESSION[ $session_name ] : '';
                if (! $sess_token || $sess_token != $sess->data ) {
                    $errors[] = $this->translate( 'Invalid request.' );
                    $app->language = $app_language;
                    $app->translate_in_user_setting = $app_translate_in_user_setting;
                    return false;
                }
            }
            if ( $app->mode == 'submit' ) {
                $this->sessions[] = $sess;
            }
        }
        $spam = $app->db->model( 'remote_ip' )->count(
            ['remote_ip' => $app->remote_ip,
             'class' => 'spam'] );
        if ( $spam ) {
            $errors[] = $this->translate( 'Post not allowed.' );
            $app->language = $app_language;
            $app->translate_in_user_setting = $app_translate_in_user_setting;
            return false;
        }
        $form_interval = (int) $app->form_interval;
        $form_upper_limit = (int) $app->form_upper_limit;
        if ( $form_upper_limit > 0 ) {
            $tsfrom = $form->ts2db( date( 'YmdHis', strtotime( "-{$form_interval} second" ) ) );
            $logs = $app->db->model( 'log' )->count( [
                'category' => 'contact',
                'remote_ip' => $app->remote_ip, 'created_on' => ['>' => $tsfrom] ] );
            if ( $logs && $logs >= $form_upper_limit ) {
                $errors[] =
                    $this->translate(
                    'Too many posts have been submitted from you in a short period of time.' )
                    . $this->translate( 'Please try again in a short while.' );
                $app->language = $app_language;
                $app->translate_in_user_setting = $app_translate_in_user_setting;
                return false;
            }
        }
        $confirm_ok = true;
        $ctx = $app->ctx;
        $questions = $app->get_related_objs( $form, 'question', 'questions' );
        $namedfiles = 1;
        foreach ( $questions as $question ) {
            $basename = $question->basename;
            $question_label = $question->label;
            $error_label = $language ? $this->translate( $question_label ) : $question_label;
            if ( $question->required && $question->is_primary && ! $primary_col ) {
                $primary_col = 'question_' . $question->id;
            }
            if ( $question->required && $question->is_name && ! $name_col ) {
                $name_col = 'question_' . $question->id;
            }
            $qt = $question->questiontype;
            $question_type = null;
            if ( $qt ) {
                $question_type = $qt->class ? $qt->class : $qt->basename;
            }
            $images = $app->images;
            $videos = $app->videos;
            $audios = $app->audios;
            $value = '';
            if ( $question_type && $question_type == 'file' ) {
                $file_token = $this->identifer . '-' . $basename;
                $sess = $app->db->model( 'session' )
                    ->get_by_key( ['name' => $file_token, 'kind' => 'UP'] );
                $error_msg = '';
                if ( $app->mode == 'confirm' || ( $app->mode == 'submit' && !$sess->id ) ) {
                    if ( isset( $_FILES['question_' . $basename ] ) ) {
                        $upload_dir = $app->upload_dir();
                        $upload_path = $upload_dir . DS;
                        $filename = $_FILES['question_' . $basename ]['name'];
                        if ( $filename ) {
                            $file_ext = PTUtil::get_extension( $filename );
                            $file_base = '';
                            $filename = $app->sanitize_file( $filename, $file_base );
                            if (! $file_base ) {
                                $filename = "upload-{$namedfiles}.{$file_ext}";
                                $namedfiles++;
                            }
                        }
                        $value = $filename;
                        $app->ctx->vars['filename_' . $basename ] = $value;
                        $upload_path .= $filename;
                        $moved = move_uploaded_file( $_FILES['question_' . $basename ]['tmp_name'], $upload_path );
                        if (! $moved && $app->id == 'RESTfulAPI'
                            && strpos( $_FILES['question_' . $basename ]['tmp_name'], $app->temp_dir ) === 0 ) {
                            $upload_path = $_FILES['question_' . $basename ]['tmp_name'];
                            $moved = true;
                        }
                        if ( $moved ) {
                            $ext = strtolower( pathinfo( $upload_path, PATHINFO_EXTENSION ) );
                            $extensions = $question->options;
                            if ( $extensions ) {
                                $extensions = strtolower( $extensions );
                                $extensions = preg_split( '/\s*,\s*/', $extensions );
                                $extensions = array_filter( $extensions, 'strlen' );
                                if (!empty( $extensions ) && ! in_array( $ext, $extensions ) ) {
                                    $error_msg =
                                        $this->translate(
                                            "The file '%s' that you uploaded is not allowed.",
                                            $filename );
                                }
                            } else {
                                $allowed_exts = $app->allowed_exts ? preg_split( '/\s*,\s*/', $app->allowed_exts ) : [];
                                $allowed_exts = array_filter( $allowed_exts, 'strlen' );
                                if (! empty( $allowed_exts ) && !in_array( $ext, $allowed_exts ) ) {
                                    $error_msg =
                                        $this->translate(
                                            "The file '%s' that you uploaded is not allowed.",
                                            $filename );
                                }
                                $denied_exts = $app->denied_exts ? preg_split( '/\s*,\s*/', $app->denied_exts ) : [];
                                $denied_exts = array_filter( $denied_exts, 'strlen' );
                                if (! empty( $denied_exts ) && in_array( $ext, $denied_exts ) ) {
                                    $error_msg =
                                        $this->translate(
                                            "The file '%s' that you uploaded is not allowed.",
                                            $filename );
                                }
                            }
                            $maxlength = $question->maxlength;
                            if (! $error_msg && $maxlength ) {
                                $unit = $question->unit;
                                $filesize = filesize( $upload_path );
                                if ( $unit && $unit == 'MB' ) {
                                    $maxlength = $maxlength * 1024 * 1024;
                                } else if ( $unit && $unit == 'KB' ) {
                                    $maxlength = $maxlength * 1024;
                                }
                                if ( $filesize >= $maxlength ) {
                                    $error_msg =
                                        $this->translate( 'The file you uploaded is too large.' );
                                }
                            }
                            if (! $error_msg ) {
                                $fileError = null;
                                $data = PTUtil::get_upload_info( $app, $upload_path, $fileError );
                                if (! $fileError ) {
                                    $thumbnail_small = isset( $data['thumbnail_small'] )
                                                     ? $data['thumbnail_small']
                                                     : '';
                                    $thumbnail_square= isset( $data['thumbnail_square'] )
                                                     ? $data['thumbnail_square']
                                                     : '';
                                    if ( $thumbnail_small ) {
                                        $sess->extradata( file_get_contents( $thumbnail_small ) );
                                    }
                                    if ( $thumbnail_square ) {
                                        $sess->metadata( file_get_contents( $thumbnail_square ) );
                                    }
                                    $metadata = $data['metadata'];
                                    $mime_type = $metadata['mime_type'];
                                    $data = file_get_contents( $upload_path );
                                    $sess->text( json_encode( $metadata ) );
                                    $sess->data( $data );
                                    $data = "data:{$mime_type};base64," . base64_encode( $data );
                                    $app->ctx->vars['base64_' . $basename ] = $data;
                                    $sess->value( $filename );
                                    $sess->key( $_FILES['question_' . $basename ]['type'] );
                                    // $app->fmgr->delete( $upload_path );
                                    $sess->start( $app->request_time );
                                    $sess->workspace_id( $form->workspace_id );
                                    $form_expires = $form->token_expires
                                                  ? $form->token_expires : $app->form_expires;
                                    $sess->expires( $app->request_time + $form_expires );
                                    $sess->save();
                                } else {
                                    $error_msg = $this->translate( $fileError );
                                }
                            }
                        } else {
                            if (! $sess->id && $question->required ) {
                                $error_msg = $this->translate(
                                    '%s is required.', $error_label );
                            }
                        }
                    }
                }
                if ( $sess->id ) {
                    if ( $question->attach_to_email ) {
                        $this->attachments[] = $sess;
                    }
                    $attachmentfiles[] = $sess;
                    $value = $sess->value;
                    $app->ctx->vars['filename_' . $basename ] = $value;
                    $values['question_' . $question->id ] = $value;
                    $q_map['question_' . $question->id ] = $question->label;
                    $param = ['post_question' => $question->label, 'post_value' => $value ];
                    if (! $question->hide_in_email ) {
                        $params[] = $param;
                    }
                    $raw_params[] = $param;
                }
            } else {
                $value = $app->param( 'question_' . $basename );
                $normalize = $question->normalize;
                $error_msg = '';
                if ( $normalize ) {
                    if ( is_array( $value ) ) {
                        $new_vars = [];
                        foreach ( $value as $v ) {
                            $v = PTUtil::normalize( $v );
                            $new_vars[] = $v; 
                        }
                        $value = $new_vars;
                        $_POST['question_' . $basename ] = $new_vars;
                        $_REQUEST['question_' . $basename ] = $new_vars;
                    } else {
                        $value = PTUtil::normalize( $value );
                        $_POST['question_' . $basename ] = $value;
                        $_REQUEST['question_' . $basename ] = $value;
                    }
                }
                if ( $question->delete_lb ) {
                    if ( is_array( $value ) ) {
                        $new_vars = [];
                        foreach ( $value as $v ) {
                            $v = str_replace( ["\r\n", "\n", "\r"], '', $v );
                            $new_vars[] = $v; 
                        }
                        $value = $new_vars;
                        $_POST['question_' . $basename ] = $new_vars;
                        $_REQUEST['question_' . $basename ] = $new_vars;
                    } else {
                        $value = str_replace( ["\r\n", "\n", "\r"], '', $value );
                        $_POST['question_' . $basename ] = $value;
                        $_REQUEST['question_' . $basename ] = $value;
                    }
                }
                if ( $question->format ) {
                    if ( is_array( $value ) ) {
                        $new_vars = [];
                        $formats = preg_split( "/\s*,\s*/", $question->format );
                        $i = 0;
                        foreach ( $value as $v ) {
                            if ( isset( $formats[ $i ] ) ) {
                                $v = $v ? sprintf( $formats[ $i ], $v ) : $v;
                            }
                            $new_vars[] = $v;
                            $i++;
                        }
                        $value = $new_vars;
                        $_POST['question_' . $basename ] = $new_vars;
                        $_REQUEST['question_' . $basename ] = $new_vars;
                    } else {
                        $value = $value ? sprintf( $question->format, $value ) : $value;
                    }
                }
                if ( $question->required ) {
                    if ( is_array( $value ) ) {
                        foreach ( $value as $v ) {
                            if (! $v ) {
                                $error_msg = $this->translate(
                                    '%s is required.', $error_label );
                                continue;
                            }
                        }
                    } else {
                        if (! $value ) $error_msg = $this->translate(
                                    '%s is required.', $error_label );
                    }
                }
                $orig_values = null;
                if ( is_array( $value ) ) {
                    $orig_values = $value;
                    $connector = $question->connector;
                    if ( strpos( $connector, ',' ) !== false 
                        && trim( $connector ) != ',' ) {
                        $connectors = preg_split( "/\s*,\s*/", $connector );
                        $i = 0;
                        $new_var = '';
                        $has_value = false;
                        foreach ( $value as $v ) {
                            if ( $v !== '' ) {
                                $has_value = true;
                            }
                            $new_var .= $v;
                            $new_var .= isset( $connectors[$i] ) ? $connectors[$i] : '';
                            $i++;
                        }
                        $value = $has_value ? $new_var : '';
                    } else {
                        $value = implode( $question->connector, $value );
                    }
                }
                $value = str_replace( ["\r\n", "\r"], "\n", $value );
                if (! $error_msg && $question->validation_type ) {
                    $vtype = $question->validation_type;
                    // by Plugins
                    if ( isset( $validations[ $vtype ] ) ) {
                        $validation = $validations[ $vtype ];
                        $force = $validation['force'] ?? false;
                        if ( $force || $value ) {
                            $component = $validation['component'];
                            $method = $validation['method'];
                            $class = $app->component( $component );
                            if ( $class && method_exists( $class, $method ) ) {
                                if (! $class->$method( $app, $question, $value, $error_msg ) ) {
                                    $error_msg = $error_msg ? $error_msg : 
                                        $this->translate( '%s is invalid.', $error_label );
                                }
                            }
                        }
                    }
                }
                if ( $question->multiple && is_array( $orig_values ) ) {
                    $values['question_' . $question->id ] = $orig_values;
                } else {
                    $values['question_' . $question->id ] = $value;
                }
                $q_map['question_' . $question->id ] = $question->label;
                $param = ['post_question' => $question->label, 'post_value' => $value ];
                if (! $question->hide_in_email ) {
                    $params[] = $param;
                }
                $raw_params[] = $param;
                $maxlength = $question->maxlength;
                if (! $error_msg && $maxlength ) {
                    $multi_byte = $question->multi_byte;
                    $length = $multi_byte ? mb_strlen( $value ) : strlen( $value );
                    if ( $maxlength < $length ) {
                        $error_msg = $this->translate( '%s is too long.', $error_label );
                    }
                }
                $vtype = $question->validation_type;
                if ( $qt && $qt->basename === 'email_with_confirm' ) {
                    $vtype = 'Email (Confirm)';
                }
                if (! $error_msg && $vtype ) {
                    if (! $question->required && $question->connector ) {
                        $raw_value = str_replace( $question->connector, '', $value );
                        if (! $raw_value ) continue;
                    }
                    if (! $question->required && ! $value ) {
                        continue;
                    }
                    // Email,Select Items,Tel,Postal Code,URL
                    if ( $vtype == 'Email' ) {
                        $error_msg = '';
                        if (!$app->is_valid_email( $value, $error_msg ) ) {
                        } else {
                            if (! $email && $form->unique ) {
                                $contacts = $app->db->model( 'contact' )->count( ['email' => $value, 'form_id' => $form->id ] );
                                if ( $contacts ) {
                                    $error_msg = $app->translate( 'You have already posted to this form from this email.' );
                                }
                            }
                            $email = $email ? $email : $value;
                            $mail_col = $mail_col ? $mail_col : 'question_' . $question->id;
                            if ( $question->reply_to && !$this->reply_to ) {
                                $this->reply_to = $email;
                            }
                        }
                    } else if ( $vtype == 'URL' ) {
                        $app->is_valid_url( $value, $error_msg );
                    } else if ( $vtype == 'Tel' ) {
                        $validator->is_valid_tel( $value, $error_msg );
                    } else if ( $vtype == 'Postal Code' ) {
                        $validator->is_valid_postal_code( $value, $error_msg );
                    } else if ( $vtype == 'Hiragana' ) {
                        $validator->is_valid_hiragana( $value, $error_msg );
                    } else if ( $vtype == 'Katakana' ) {
                        $validator->is_valid_katakana( $value, $error_msg );
                    } else if ( $vtype == 'Number' ) {
                        $validator->is_valid_number( $value, $error_msg );
                    } else if ( $vtype == 'Alphanumeric Symbols' ) {
                        $validator->is_alphanumeric_symbols( $value, $error_msg );
                    } else if ( $vtype == 'Date' ) {
                        $ymd_arr = $app->param( 'question_' . $question->basename );
                        if ( is_array( $ymd_arr ) && count( $ymd_arr ) === 3 ) {
                            if (! checkdate( (int) $ymd_arr[1], (int) $ymd_arr[2], (int) $ymd_arr[0] ) ) {
                                $error_msg = $this->translate( '%s is invalid.', $error_label );
                            }
                        } else {
                            $check_val = preg_replace( "/[^0-9]*/", '', $value );
                            if (! preg_match( "/^[0-9]{8}$/", $check_val ) ) {
                                $error_msg = $this->translate( '%s is invalid.', $error_label );
                            } else {
                                $y = substr( $check_val, 0, 4 );
                                $m = substr( $check_val, 4, 2 );
                                $d = substr( $check_val, 6, 2 );
                                if (! checkdate( $m, $d, $y ) ) {
                                    $error_msg = $this->translate( '%s is invalid.', $error_label );
                                }
                            }
                        }
                    } else if ( $vtype == 'Date & Time' ) {
                        $check_val = preg_replace( "/[^0-9]*/", '', $value );
                        if (! preg_match( "/^[0-9]{14}$/", $check_val ) ) {
                            $error_msg = $this->translate( '%s is invalid.', $error_label );
                        } else {
                            $y = substr( $check_val, 0, 4 );
                            $m = substr( $check_val, 4, 2 );
                            $d = substr( $check_val, 6, 2 );
                            if (! checkdate( $m, $d, $y ) ) {
                                $error_msg = $this->translate( '%s is invalid.', $error_label );
                            }
                        }
                        if (! $error_msg ) {
                            $time = substr( $check_val, 8, 6 );
                            if ( $time > 235959 ) {
                                $error_msg = $this->translate( '%s is invalid.', $error_label );
                            }
                        }
                    } else if ( $vtype == 'Selected Items' ) {
                        $items = trim( $question->values )
                               ? trim( $question->values )
                               : trim( $question->options );
                        if ( $normalize ) {
                            $items = PTUtil::normalize( $items );
                        }
                        $items = preg_split( "/\s*,\s*/", $items );
                        if ( is_array( $orig_values ) ) {
                            foreach ( $orig_values as $v ) {
                                if (! $v && ! $question->required ) {
                                } else if (! in_array( $v, $items ) ) {
                                    $error_msg =
                                      $this->translate( '%s is invalid.', $error_label );
                                    continue;
                                }
                            }
                        } else {
                            if (! $value && ! $question->required ) {
                            } else if (! in_array( $value, $items ) ) {
                                $error_msg = $this->translate( '%s is invalid.', $error_label );
                            }
                        }
                    } else if ( $vtype == 'Email (Confirm)' ) {
                        $error_msg = '';
                        if (!$app->is_valid_email( $value, $error_msg ) ) {
                        } else {
                            $confirm_value = $app->param( "question_{$basename}_confirm" );
                            if ( $value != $confirm_value ) {
                                $error_msg =
                                      $this->translate( 'Both %s must match.', $error_label );
                            } else {
                                if (! $email && $form->unique ) {
                                    $contacts = $app->db->model( 'contact' )->count( ['email' => $value, 'form_id' => $form->id ] );
                                    if ( $contacts ) {
                                        $error_msg = $app->translate( 'You have already posted to this form from this email.' );
                                    }
                                }
                                $email = $email ? $email : $value;
                                $mail_col = $mail_col ? $mail_col : 'question_' . $question->id;
                                if ( $question->reply_to && !$this->reply_to ) {
                                    $this->reply_to = $email;
                                }
                            }
                        }
                    } else if ( $vtype == 'Password' ) {
                        $verify = $app->param( 'question_' . $basename . '-verify' );
                        if (!$app->is_valid_password( $value, $verify, $msg ) ) {
                            $error_msg = $msg;
                        }
                    }
                }
            }
            if ( $error_msg ) {
                $ctx->vars['question_' . $basename . '_error'] = $error_msg;
                $errors[] = $error_msg;
                $confirm_ok = false;
            }
        }
        $app->init_callbacks( 'form', 'validation' );
        $callback = ['name' => 'validation', 'errors' => $errors, 'confirm_ok' => $confirm_ok ];
        $app->run_callbacks( $callback, 'form', $form );
        $errors = $callback['errors'];
        $confirm_ok = $callback['confirm_ok'];
        $app->language = $app_language;
        $app->translate_in_user_setting = $app_translate_in_user_setting;
        return empty( $errors ) && $confirm_ok;
    }

    function save_filter_form ( &$cb, $app, $obj ) {
        if (! $obj->send_email ) {
            $obj->send_thanks(0);
            $obj->send_notify(0);
            return true;
        }
        $errors = $cb['errors'];
        $success = true;
        $msg = '';
        $addrs = [];
        if ( $obj->send_thanks ) {
            $addrs = ['thanks_cc', 'thanks_bcc', 'email_from', 'thanks_return_path'];
        }
        if ( $obj->form_send_notify ) {
            $addrs[] = 'notify_from';
            $addrs[] = 'notify_to';
            $addrs[] = 'notify_cc';
            $addrs[] = 'notify_bcc';
            $addrs[] = 'notify_return_path';
            $notify_to = $obj->notify_to;
            if (! $notify_to ) {
                $success = false;
                $errors[] =
                  $app->translate( 'The Email address to notification is not specified.' );
            }
        }
        if (! empty( $addrs ) ) {
            $regex = '<\${0,1}' . $app->ctx->prefix;
            $ctx = $app->ctx;
            foreach ( $addrs as $addr ) {
                if ( $email = $obj->$addr ) {
                    if (! preg_match( "/$regex/i", $email ) ) {
                        continue;
                    }
                    $emails = preg_split( '/<[^>]*?>/', $email );
                    $emails = array_filter( $emails, 'strlen' ) ;
                    foreach ( $emails as $email ) {
                        $_emails = preg_split( '/\s*,\s*/', $email );
                        $_emails = array_filter( $_emails, 'strlen' );
                        foreach ( $_emails as $_email ) {
                            if (!$app->is_valid_email( $_email, $msg ) ) {
                                $col_name = $app->translate( $app->translate( $addr, '', null, 'default' ) );
                                $errors[] = $app->translate(
                                            "Please specify a valid Email Address for %s.", $col_name );
                                $success = false;
                            }
                        }
                    }
                }
            }
        }
        $cb['errors'] = $errors;
        return $success;
    }

    function make_magic_token ( $app, $url = null ) {
        $form_id = $app->param( 'form_id' );
        if (! $form_id ) {
            $app->json_error( 'Invalid request.', null, 404 );
        }
        $form = $app->db->model( 'form' )->load( (int) $form_id );
        if (! $form || $form->status != 4 ) {
            $app->json_error( 'Invalid request.', null, 404 );
        }
        $sess_token = null;
        if ( $form->requires_token && $form->use_session ) {
            session_start();
            $sess_token = $app->magic();
            $session_name = $app->form_session_name ? $app->form_session_name : 'pcmsx_form_token';
            $_SESSION[ $session_name ] = $sess_token;
        }
        $token = $app->magic();
        $sess = $app->db->model( 'session' )->get_by_key( ['name' => $token,
                                                               'kind' => 'CR'] );
        $sess->start( $app->request_time );
        $sess->value( $form->id );
        if ( $app->validate_token_ip ) {
            $sess->key( $app->remote_ip );
        }
        if ( $app->validate_token_ua ) {
            $user_agent = isset( $_SERVER['HTTP_USER_AGENT'] ) ? $_SERVER['HTTP_USER_AGENT'] : null;
            $sess->text( $user_agent );
        }
        $sess->data( $sess_token );
        if ( $ws = $form->workspace ) {
            $sess->workspace_id( $ws->id );
        }
        $form_expires = $form->token_expires
                      ? $form->token_expires : $app->form_expires;
        $sess->expires( $app->request_time + $form_expires );
        $sess->save();
        if ( $app->id == 'RESTfulAPI' ) {
            return $sess;
        }
        header( 'Content-type: application/json' );
        echo json_encode( [
            'status' => 200,
            'magic_token' => $sess->name ] );
        exit();
    }

    function get_member () {
        $app = Prototype::get_instance();
        $member = null;
        if ( $component = $app->component( 'Members' ) ) {
            $member = $component->member( $app );
        }
        if (! $member ) {
            $member = $app->user();
        }
        return $member;
    }

    function translate ( $phrase, $params = '' ) {
        $app = Prototype::get_instance();
        $lang = $this->get_language();
        $dict = isset( $app->dictionary ) ? $app->dictionary : null;
        if ( $dict && !isset( $dict[ $lang ] ) ) {
            $dict = $app->set_language( $app->locale_dir, $lang );
        }
        if ( $dict && isset( $dict[ $lang ] ) && isset( $dict[ $lang ][ $phrase ] ) )
             $phrase = $dict[ $lang ][ $phrase ];
        if ( strpos( $phrase, '%' ) !== false ) {
            $escaped = str_replace( '%s', '', $phrase );
            if ( strpos( $escaped, '%' ) !== false ) {
                $escaped = preg_replace( '/%\d+\$s/', '', $escaped );
            }
            if ( strpos( $escaped, '%' ) !== false ) {
                $phrase = str_replace( '%', '%%', $phrase );
            }
        }
        $phrase = is_string( $params )
            ? sprintf( $phrase, $params ) : vsprintf( $phrase, $params );
        return $app->esc_trans ? htmlspecialchars( $phrase, ENT_COMPAT, 'UTF-8', false ) : $phrase;
    }

    function get_language () {
        $app = Prototype::get_instance();
        $lang = '';
        if ( $app->param( '_language' ) ) {
            $lang = $app->param( '_language' );
        } else {
            $member = $this->get_member();
            $lang = $member ? $member->language : $app->language;
        }
        if (! $lang || !in_array( $lang, $app->languages ) ) {
            $lang = $app->language;
        }
        if (!$lang ) $lang = 'default';
        return $lang;
    }
}