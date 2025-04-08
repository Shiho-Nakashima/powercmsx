<?php
class PTWorkflow {

    private $from_address = null;

    function workflow_post_save ( &$cb, $app, &$obj, $original, $clone_org = null ) {
        if ( $clone_org ) $original = $clone_org;
        $workflow = $app->stash( 'workflow' );
        if (! $workflow && $obj->has_column( 'workspace_id' ) ) {
            $workflow = $app->db->model( 'workflow' )->get_by_key(
                                    ['model' => $obj->_model,
                                     'workspace_id' => (int) $obj->workspace_id ] );
            if (! $workflow->id ) {
                $workflow = null;
            }
        }
        if (! $workflow ) {
            return true;
        }
        $app->stash( 'workflow', $workflow );
        $model = $obj->_model;
        $table = $app->get_table( $model );
        $primary = $table->primary;
        $object_label = $app->translate( $table->label );
        $object_name = $obj->$primary;
        $workspace_id = $obj->workspace_id ? $obj->workspace_id : 0;
        $workspace = $obj->workspace_id ? $obj->workspace : null;
        $workspace_name = $workspace ? $workspace->name : $app->appname;
        $notify_meta = null;
        if ( $app->mode == 'save' ) {
            $group_name = $app->permission_group( $app->user(), $model , $workspace_id );
            if (! $app->param( '__workflow_type' ) && $app->param( '__workflow_message' ) && $group_name == 'publisher' ) {
                $notify_meta = $app->db->model( 'meta' )->get_by_key(
                  ['model' => $model, 'object_id' => $obj->id, 'kind' => 'notify_at_published'] );
                if ( $app->user() ) {
                    $notify_meta->key( $app->user()->id );
                }
                $notify_meta->text( $app->param( '__workflow_message' ) );
                $notify_meta->save();
            }
        }
        $msg = '';
        $from_address = '';
        $user_email = $obj->user ? $obj->user->email : '';
        $from_address = $workflow->from_address;
        if ( $workflow->email_from === 'Specify Individually' &&
            $from_address && $app->is_valid_email( $from_address, $msg ) ) {
        } else if ( $workflow->email_from == 'System Email' ) {
            $from_address = $app->system_email( $msg );
            if ( $msg ) {
                return $app->error( $msg );
            }
        } else {
            $from_address = $user_email;
        }
        if (! $from_address ) {
            $from_address = $app->system_email( $msg );
            if ( $msg ) {
                return $app->error( $msg );
            }
        }
        $this->from_address = $from_address;
        $previous_owner = null;
        if ( $original->_apply_revision && is_object( $original->_apply_revision ) ) {
            $max_status = $app->max_status( $obj->user, $model, $workspace );
            if ( $obj->status > $max_status ) {
                if ( $app->id === 'Prototype' && $app->user() && $app->user() ->id != $obj->user_id ) {
                    $previous_owner = $obj->user;
                    $obj->previous_owner( $obj->user_id );
                    $obj->user_id( $app->user()->id );
                    $obj->save();
                }
            }
        }
        if ( $original->_apply_revision && is_object( $original->_apply_revision )
            && $obj->status == 4 && $workflow->notify_changes ) {
            // apply to master and publish
            $rev_obj = $original->_apply_revision;
            $not_user_ids = $app->multiplenotifications_to_all_publisher
                          || $app->multiplenotifications_to_same_group ? [] : [(int) $obj->user_id ];
            $user_ids = $app->multiplenotifications_to_all_publisher
                      || $app->multiplenotifications_to_same_group ? [(int) $obj->user_id ] : [];
            // for Plugin MultipleNotifications.
            $extra = !empty( $not_user_ids ) ? ' AND log_created_by NOT IN (' . implode( ',', $not_user_ids ) . ')' : '';
            $params = ['group' => ['created_by'] ];
            $terms  = ['model' => $obj->_model, 'object_id' => $obj->id ];
            $terms['object_id'] = $rev_obj->id;
            $user_logs = $app->db->model( 'log' )->count_group_by( $terms, $params, $extra );
            foreach ( $user_logs as $user_log ) {
                $user_ids[] = (int) $user_log['log_created_by'];
            }
            if ( empty( $user_ids ) ) {
                return;
            }
            $user_ids = array_unique( $user_ids );
            $by_user = $obj->user->nickname;
            if ( $app->id === 'Prototype' && $app->user() ) {
                $by_user = $app->user()->nickname;
            }
            $subject = null;
            $tmpl = $app->get_mail_tmpl( 'notify_rev_participants', $template );
            // Notyfy to previous users
            if ( $template ) {
                $subject = $template->subject;
            }
            if (! $subject ) {
                $subject = $app->translate ( '(%s)', $workspace_name )
                         . $app->translate( "The %1\$s's revision'%2\$s' you creadted (or edited) has been approved and published by %3\$s.",
                                  [ $object_label, $object_name, $by_user ] );
            }
            $ctx = $app->ctx;
            $ctx->vars['by_user'] = $by_user;
            $ctx->vars['object_name'] = $object_name;
            $ctx->vars['object_label'] = $app->translate( $table->label );
            $ctx->vars['object_model'] = $obj->_model;
            $ctx->vars['object_id'] = $obj->id;
            $permalink = $app->get_permalink( $obj );
            if ( $permalink === false ) {
                // Permalink changed at edit, Re-publish obj.
                $app->publish_obj( $obj );
                $permalink = $app->get_permalink( $obj );
            }
            $ctx->vars['object_permalink'] = $permalink;
            $notify_meta = is_object( $notify_meta )
                         ? $notify_meta : $app->db->model( 'meta' )->get_by_key(
              ['model' => $model, 'object_id' => $obj->id, 'kind' => 'notify_at_published'] );
            if ( $notify_meta->id ) {
                $ctx->vars['workflow_message'] = trim( $notify_meta->text );
                $notify_meta->remove();
            }
            $app->set_mail_param( $ctx );
            $portal_url = $obj->workspace
                      ? $obj->workspace->site_url : $app->site_url;
            $ctx->vars['app_name'] = $workspace_name;
            $ctx->vars['portal_url'] = $portal_url;
            $subject = $ctx->build( $subject );
            $body = $ctx->build( $tmpl );
            $addresses = [];
            $users = $app->db->model( 'user' )->load( ['id' => ['IN' => $user_ids ] ] );
            foreach ( $users as $user ) {
                if (! $app->user() || ( $app->user()->email != $user->email ) ) {
                    $addresses[] = $user->email;
                } else if ( $app->multiplenotifications_to_all_publisher
                      || $app->multiplenotifications_to_same_group ) {
                    $addresses[] = $user->email;
                }
            }
            if ( empty( $addresses ) ) {
                return;
            }
            $from = '';
            if ( $obj->user ) {
                $from = $user_email;
            } else {
                $from = $app->system_email( $msg );
                if ( $msg ) {
                    return $app->error( $msg );
                }
            }
            $headers = ['From' => $from_address ];
            if ( $from_address !== $from ) {
                $headers['Reply-To'] = $from;
            }
            $error = '';
            if (! PTUtil::send_mail(
                $addresses, $subject, $body, $headers, $error ) ) {
                return $app->error( $error );
            }
            if ( $app->mode === 'list_action' && $app->param( 'action_name' ) === 'apply_to_master' ) {
                if ( $previous_owner ) {
                    $cb['change_case'] = 1;
                    $cb['old_user'] = $previous_owner;
                    $cb['new_user'] = $app->user();
                }
            }
            return;
        }
        $status_published = $app->status_published( $model );
        $status_reserved = $status_published - 1;
        $obj_user = $obj->user;
        if (! is_object( $obj_user ) ) return true;
        $old_user = $obj_user;
        $new_user = null;
        $changed = false;
        $change_case = 1;
        $old_user_can_edit = true;
        $type = null;
        $tags = new PTTags();
        $send_user_ids = [];
        $group_name = $app->permission_group( $obj_user, $model , $workspace_id );
        if ( $app->mode == 'save' ) {
            $type = $app->param( '__workflow_type' );
            $user_id = $obj->user_id;
            $new_id = $user_id;
            if ( $type ) {
                if ( $type == 1 ) {
                    $new_id = $app->param( '__workflow_remand' );
                } else if ( $type == 2 ) {
                    $new_id = $app->param( '__workflow_approval' );
                }
                $new_id = $new_id ? (int) $new_id : $user_id;
                if ( $new_id ) {
                    $new_user = $app->db->model( 'user' )->load( (int) $new_id );
                    if (! $new_user ) return;
                    $group_name = $app->permission_group( $new_user, $model, $workspace_id );
                    if (! $group_name ) return;
                    if ( $group_name == 'creator' ) {
                        $obj->status( 0 );
                    } else if ( $group_name == 'reviewer' ) {
                        if ( $obj->status != 1 ) {
                            $obj->status( 1 );
                        }
                    } else if ( $group_name == 'publisher' ) {
                        if ( $obj->status < 2 ) {
                            $obj->status( 2 );
                        }
                    }
                    $obj->previous_owner( $obj->user_id );
                    $obj->user_id( $new_id );
                    if ( $app->user() && !$obj->previous_owner ) {
                        $obj->previous_owner( $app->user()->id );
                    }
                    $obj_user = $new_user;
                    $changed = true;
                    $change_case = 2;
                }
            }
        }
        if ( $change_case != 2 ) {
            $max_status = $app->max_status( $app->user(), $model , $workspace );
            if (! $group_name ) {
                $new_user = $app->user();
                $obj->user_id( $new_user->id );
                $changed = true;
                $old_user_can_edit = false;
                $change_case = 3;
            } else if ( $group_name == 'creator' ) {
                if ( $obj->status > 0 && $max_status ) {
                    $new_user = $app->user();
                    $obj->user_id( $new_user->id );
                    $changed = true;
                    $old_user_can_edit = false;
                    $change_case = 3;
                }
            } else if ( $group_name == 'reviewer' ) {
                if ( $obj->status > 1 && $max_status > 1 ) {
                    $new_user = $app->user();
                    $obj->user_id( $new_user->id );
                    $changed = true;
                    $old_user_can_edit = false;
                    $change_case = 3;
                }
            }
        }
        $previous_owner = $obj->previous_owner;
        if ( $workflow->notify_changes && $new_user
            && $previous_owner && $previous_owner != $old_user->id && $previous_owner != $app->user()->id
            && ( $obj->status == $status_published || $obj->status == $status_reserved ) ) {
            $changed = true;
        }
        if ( $changed ) {
            if ( $obj->has_column( 'rev_type' ) && $obj->rev_type && $obj->rev_type == 1 ) {
                $obj->rev_type( 2 );
            }
            $obj->save();
            $log = isset( $cb['log'] ) ? $cb['log'] : $app->db->model( 'log' )->new(
                  ['object_id' => $obj->id, 'model' => $obj->_model, 'level' => 1] );
            $message = $log->message;
            $log_params = [ $object_label, $new_user->nickname ];
            $diff = PTUtil::object_diff( $app, $obj, $original );
            if ( $type == 2 ) {
                $log->category( 'approval' );
                $message .= $app->translate( "The user has send approval request this %s to '%s'.", $log_params );
            } else if ( $type == 1 ) {
                $log->category( 'remand' );
                $message .= $app->translate( "The user has send back %s to '%s'.", $log_params );
            } else {
                $message .= $app->translate( "The user has been change %s to owner '%s'.", $log_params );
            }
            $log->message( $message );
            $log->metadata( json_encode( $diff, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT ) );
            $app->set_default( $log );
            $log->save();
            if (! $app->can_do( $model, 'edit', $obj ) ) {
                if (! $app->can_do( $model, 'list' ) ) {
                    $cb['return_url'] = $app->admin_url .
                    '?__mode=dashboard' . $app->workspace_param .
                    '&workflow_change_user=1';
                } else {
                    $cb['return_url'] = $app->admin_url .
                    '?__mode=view&_type=list&_model=' . $model .
                    $app->workspace_param . '&workflow_change_user=1';
                    if ( $obj->rev_type ) {
                        $cb['return_url'] .= '&manage_revision=1';
                    }
                }
            }
            $cb['change_case'] = $change_case;
            $cb['old_user'] = $old_user;
            $cb['new_user'] = $new_user;
            if ( $app->mode == 'save' ) {
                $ctx = $app->ctx;
                if ( $obj->has_column( 'rev_type' ) ) {
                    $revision = $app->db->model( $obj->_model )->get_by_key(
                        ['rev_object_id' => $obj->id, 'rev_type' => 1],
                        ['sort' => 'id', 'direction' => 'descend']
                    );
                    if ( $revision->id ) {
                        $difference = $this->get_diff( $app, $revision, $obj );
                        $ctx->vars['difference'] = $difference;
                    }
                }
                $ctx->vars['workspace_name'] = $workspace_name;
                $ctx->vars['object_label'] = $object_label;
                $ctx->vars['object_name'] = $object_name;
                $id = $obj->id;
                $edit_link = $ctx->vars['script_uri'] . "?__mode=view&_type=edit&_model={$model}&id={$id}";
                if ( $obj->has_column( 'workspace_id' ) && $obj->workspace_id ) {
                    $edit_link .= '&workspace_id=' . $obj->workspace_id;
                }
                $ctx->vars['edit_link'] = $edit_link;
                $by_user_id = $app->user()->id;
                $by_user = $app->user()->nickname;
                $ctx->vars['by_user'] = $by_user;
                $ctx->vars['by_user_id'] = $by_user_id;
                $ctx->vars['object_name'] = $obj->$primary;
                $ctx->vars['object_id'] = $obj->id;
                $ctx->vars['object_model'] = $obj->_model;
                $ctx->vars['object_permalink'] = $app->get_permalink( $obj );
                $app->set_mail_param( $ctx );
                $tag_args = ['status' => $obj->status, 'model' => $model ];
                $status_text = $tags->hdlr_statustext( $tag_args, $ctx );
                $ctx->vars['status_text'] = $status_text;
                $app_name = $app->workspace()
                          ? $app->workspace()->name : $app->appname;
                $portal_url = $app->workspace()
                          ? $app->workspace()->site_url : $app->site_url;
                $ctx->vars['app_name'] = $app_name;
                $ctx->vars['portal_url'] = $portal_url;
                if ( $workflow->notify_changes && $previous_owner && $change_case == 3 ) {
                    $previous_user = $app->db->model( 'user' )->load( (int) $previous_owner );
                    if ( $previous_user ) {
                        $cb['previous_user'] = $previous_user;
                        $prev_group = $app->permission_group( $previous_user,
                                                              $model , $workspace_id );
                        $previous_user_can_edit = false;
                        if ( $prev_group && $prev_group == 'publisher' ) {
                            $previous_user_can_edit = true;
                        }
                        $ctx->vars['previous_user_can_edit'] = $previous_user_can_edit;
                        $template = null;
                        $subject = null;
                        $tmpl = $app->get_mail_tmpl( 'notify_previous_owner', $template );
                        // Notyfy to previous user
                        if ( $template ) {
                            $subject = $template->subject;
                        }
                        $ctx->vars['workflow_message'] = $app->param( '__workflow_message' );
                        if (! $subject ) {
                            $subject
                            = $app->translate ( '(%s)', $workspace_name ) .
                            $app->translate(
                        "The responsible user of %s'%s' you're in charge changed by %s(Status changed to %s).",
                            [ $object_label, $object_name, $by_user, $status_text ] );
                        }
                        $subject = $ctx->build( $subject );
                        $body = $ctx->build( $tmpl );
                        // $headers = ['From' => $app->user()->email ];
                        $headers = ['From' => $from_address ];
                        if ( $from_address !== $app->user()->email ) {
                            $headers['Reply-To'] = $app->user()->email;
                        }
                        $error = '';
                        // for Plugin Multiple Notifications.
                        $old_group_name = $app->permission_group( $new_user, $obj->_model , (int)$obj->workspace_id );
                        $new_group_name = $app->permission_group( $app->user(), $obj->_model , $obj->workspace_id );
                        if ( $old_group_name === 'publisher' && $new_group_name === 'publisher'
                            && $app->multiplenotifications_to_all_publisher ) {
                            // End for Plugin Multiple Notifications.
                        } else {
                            if (! PTUtil::send_mail(
                                $previous_user->email, $subject, $body, $headers, $error ) ) {
                                return $app->error( $error );
                            }
                            $send_user_ids[] = (int) $previous_user->id;
                        }
                    }
                }
                if ( $workflow->notify_changes && $old_user->id != $new_user->id && $type ) {
                    $to_user = $new_user->nickname;
                    $from_user = $old_user->nickname;
                    $ctx->vars['to_user'] = $to_user;
                    $ctx->vars['from_user'] = $from_user;
                    $old_user_id = $old_user->id;
                    $new_user_id = $new_user->id;
                    $ctx->vars['old_user_can_edit'] = $old_user_can_edit;
                    $ctx->vars['old_user_id'] = $old_user_id;
                    $ctx->vars['new_user_id'] = $new_user_id;
                    $ctx->vars['notify_type'] = $type;
                    $ctx->vars['workflow_message'] = $app->param( '__workflow_message' );
                    $workflow_label = $type == 1 ? 'Remand' : 'Approval Request';
                    $workflow_label = $app->translate( $workflow_label );
                    $ctx->vars['workflow_label'] = $workflow_label;
                    if ( $old_user->id != $app->user()->id ) {
                        $ctx->vars['notify_type'] = 'old_user';
                        $subject = null;
                        $template = null;
                        $tmpl = $app->get_mail_tmpl( 'notify_old_user', $template );
                        // Notyfy to old user
                        if ( $template ) {
                            $subject = $template->subject;
                        }
                        if (! $subject ) {
                            $subject
                            = $app->translate ( '(%s)', $workspace_name ) .
                            $app->translate(
                            'Your responsible %1$s\'%2$s\' has been sent %3$s to another user %4$s by user %5$s.',
                            [ $object_label, $object_name, $workflow_label, $to_user, $by_user ] );
                        }
                        $subject = $ctx->build( $subject );
                        $body = $ctx->build( $tmpl );
                        // $headers = ['From' => $app->user()->email ];
                        $headers = ['From' => $from_address ];
                        if ( $from_address !== $app->user()->email ) {
                            $headers['Reply-To'] = $app->user()->email;
                        }
                        $error = '';
                        // for Plugin Multiple Notifications.
                        $old_group_name = $app->permission_group( $old_user, $model , $workspace_id );
                        $new_group_name = $app->permission_group( $new_user, $model , $workspace_id );
                        if ( $old_group_name === 'publisher' && $new_group_name === 'publisher'
                            && $app->multiplenotifications_to_all_publisher ) {
                        } else if ( $old_group_name == $new_group_name
                            && $app->multiplenotifications_to_same_group ) {
                            // End for Plugin Multiple Notifications.
                        } else {
                            if (! PTUtil::send_mail(
                                $old_user->email, $subject, $body, $headers, $error ) ) {
                                return $app->error( $error );
                            }
                        }
                        $send_user_ids[] = (int) $old_user->id;
                    }
                    if ( $new_user->id != $app->user()->id ) {
                        // Notyfy to new user
                        $ctx->vars['notify_type'] = 'new_user';
                        $ctx->vars['edit_link'] = $edit_link;
                        $subject = null;
                        $template = null;
                        $tmpl = $app->get_mail_tmpl( 'notify_new_user', $template );
                        if ( $template ) {
                            $subject = $template->subject;
                        }
                        if (! $subject ) {
                            if ( $old_user_id != $by_user_id ) {
                                $subject = $app->translate ( '(%s)', $workspace_name ) .
                                $app->translate(
                                '%1$s for %2$s\'%3$s\' has been sent for you from another user %4$s by user %5$s.',
                                [ $workflow_label, $object_label, $object_name, $from_user, $by_user ] );
                            } else {
                                $subject = $app->translate ( '(%s)', $workspace_name ) .
                                $app->translate(
                                '%1$s for %2$s\'%3$s\' has been sent for you from another user %4$s',
                                [ $workflow_label, $object_label, $object_name, $from_user ] );
                            }
                        }
                        $app->set_mail_param( $ctx );
                        $subject = $ctx->build( $subject );
                        $body = $ctx->build( $tmpl );
                        // $headers = ['From' => $app->user()->email ];
                        $headers = ['From' => $from_address ];
                        if ( $from_address !== $app->user()->email ) {
                            $headers['Reply-To'] = $app->user()->email;
                        }
                        $error = '';
                        if (! PTUtil::send_mail(
                            $new_user->email, $subject, $body, $headers, $error ) ) {
                            return $app->error( $error );
                        }
                        $send_user_ids[] = (int) $new_user->id;
                    }
                }
            }
        }
        if ( $workflow->notify_changes && $obj->status == $status_published
            && $original->status != $status_published ) {
            $this->publish_object( $app, $obj, $send_user_ids );
        }
    }

    function pull_back ( $app ) {
        $param = $app->param ( 'dialog_view' ) ? 'dialog' : null;
        if (! $app->can_pull_back ) {
            return $app->error( 'Invalid request.', $param );
        }
        $ctx = $app->ctx;
        $app->set_mail_param( $ctx );
        $id = (int) $app->param( 'id' );
        $workspace_id = (int) $app->param( 'workspace_id' );
        $model = $app->param( '_model' );
        $obj = $app->db->model( $model )->load( $id );
        $table = $app->get_table( $model );
        $object_label = $app->translate( $table->label );
        if (! $obj ) {
            return $app->error( 
                $app->translate( 'Cannot load %s (ID:%s)', [ $object_label, $id ] ), $param );
        }
        if ( $obj->has_column( 'workspace_id' ) ) {
            if ( $obj->workspace_id != $workspace_id ) {
                return $app->error( 'Invalid request.', $param );
            }
        }
        $workflow = $app->stash( 'workflow' );
        if (! $workflow ) {
            $workflow = $app->db->model( 'workflow' )->get_by_key(
                                    ['model' => $model,
                                     'workspace_id' => $workspace_id ] );
            if (! $workflow->id ) {
                $workflow = null;
            }
        }
        if (! $workflow ) {
            return true;
        }
        $app->stash( 'workflow', $workflow );
        $primary = $table->primary;
        $object_name = $obj->$primary;
        $user_id = (int) $app->param( 'user_id' );
        if (! $user_id ) {
            $user_id = $obj->user_id;
        }
        $ctx->vars['object_label'] = $object_label;
        $user = $app->db->model( 'user' )->load( $user_id );
        if ( $param ) {
            if (! $user || ! $user_id ) {
                return $app->error( 
                    $app->translate( 'Cannot load %s (ID:%s)', [ $app->translate( 'User' ), $user_id ] ), $param );
            }
            $ctx->vars['user_nickname'] = $user->nickname;
            $ctx->vars['page_title'] = $app->translate( "Pull Back the %s '%s'.", [ $object_label, $object_name ] );
            return $app->build_page( 'pull_back.tmpl' );
        }
        $edit_link = $ctx->vars['script_uri'] . "?__mode=view&_type=edit&_model={$model}&id={$id}&pull_back=1";
        if ( $obj->has_column( 'workspace_id' ) && $obj->workspace_id ) {
            $edit_link .= '&workspace_id=' . $obj->workspace_id;
        }
        if ( $obj->has_column( 'rev_type' ) && $obj->rev_type ) {
            $edit_link .= '&edit_revision=1';
        }
        if ( $app->param( 'do_action' ) ) {
            if ( $app->request_method == 'POST' ) {
                $app->validate_magic();
            }
        }
        $max_status = $app->max_status( $app->user(), $model, $app->workspace() );
        if ( $max_status < $obj->status ) {
            $obj->status( $max_status );
        }
        $obj->previous_owner( $user_id );
        $obj->user_id( $app->user()->id );
        if ( $obj->has_column( 'rev_type' ) && $obj->rev_type && $obj->rev_type == 1 ) {
            $obj->rev_type( 2 );
        }
        $obj->save();
        $app->publish_obj( $obj );
        if ( $app->param( 'do_action' ) && $user ) {
            $tag_args = ['status' => $max_status, 'model' => $model ];
            $status_text = $app->core_tags->hdlr_statustext( $tag_args, $ctx );
            $message = $app->translate(
                "%s pulled back the %s'%s(ID:%s)' (status changed to %s).",
                [ $app->user()->nickname, $object_label, $object_name, $obj->id, $status_text ]
            );
            $app->log( ['message' => $message, 'category' => 'pull_back',
                        'model' => $obj->_model, 'object_id' => $obj->id,
                        'level' => 'info'] );
            if ( $workflow->notify_changes ) {
                // Notyfy to previous user
                $template = null;
                $subject = null;
                $tmpl = $app->get_mail_tmpl( 'notify_pull_back', $template );
                if ( $template ) {
                    $subject = $template->subject;
                }
                $ctx->vars['object_name'] = $object_name;
                $ctx->vars['by_user'] = $app->user()->nickname;
                $ctx->vars['object_permalink'] = $app->get_permalink( $obj );
                $ctx->vars['edit_link'] = $edit_link;
                $ctx->vars['object_id'] = $obj->id;
                $ctx->vars['status_text'] = $status_text;
                if (! $subject ) {
                    $params = [ $object_label, $object_name, $app->user()->nickname, $status_text ];
                    $subject = $app->translate( "The %1\$s'%2\$s' you're in charge of was pulled back by %3\$s(Status changed to %4\$s).", $params );
                }
                $msg = '';
                $from_address = '';
                $user_email = $obj->user ? $obj->user->email : '';
                $from_address = $workflow->from_address;
                if ( $workflow->email_from === 'Specify Individually' &&
                    $from_address && $app->is_valid_email( $from_address, $msg ) ) {
                } else if ( $workflow->email_from == 'System Email' ) {
                    $from_address = $app->system_email( $msg );
                    if ( $msg ) {
                        return $app->error( $msg );
                    }
                } else {
                    $from_address = $user_email;
                }
                if (! $from_address ) {
                    $from_address = $app->system_email( $msg );
                    if ( $msg ) {
                        return $app->error( $msg );
                    }
                }
                $subject = $ctx->build( $subject );
                $body = $ctx->build( $tmpl );
                // $headers = ['From' => $app->user()->email ];
                $headers = ['From' => $from_address ];
                if ( $from_address !== $app->user()->email ) {
                    $headers['Reply-To'] = $app->user()->email;
                }
                $error = '';
                if (! PTUtil::send_mail(
                    $user->email, $subject, $body, $headers, $error ) ) {
                    return $app->error( $error );
                }
                $edit_link .= '&mail_sent=1';
            }
        }
        $app->redirect( $edit_link );
    }

    function publish_object ( $app, $obj, $not_user_ids = null, $clone = null ) {
        $params = ['group' => ['created_by'] ];
        $terms  = ['model' => $obj->_model, 'object_id' => $obj->id ];
        if ( $clone ) {
            $terms['object_id'] = $clone->id;
        }
        $user_ids = $app->multiplenotifications_to_all_publisher ? [(int) $obj->user_id ] : [];
        $extra = '';
        if ( (! $not_user_ids || empty( $not_user_ids ) ) && $app->user() ) {
            if (! $app->multiplenotifications_to_all_publisher ) {
                $not_user_ids = [ $app->user()->id ];
            }
        }
        if ( $not_user_ids ) {
            if (! is_array( $not_user_ids ) ) {
                $not_user_ids = [ $not_user_ids ];
            }
            if ( $app->user() ) {
                if (! $app->multiplenotifications_to_all_publisher ) {
                    $not_user_ids[] = $app->user()->id;
                }
            }
            $not_user_ids = array_unique( array_map( 'intval', $not_user_ids ) );
            $extra = !empty( $not_user_ids ) ? ' AND log_created_by NOT IN (' . implode( ',', $not_user_ids ) . ')' : '';
        }
        $user_logs = $app->db->model( 'log' )->count_group_by( $terms, $params, $extra );
        foreach ( $user_logs as $user_log ) {
            $user_ids[] = (int) $user_log['log_created_by'];
        }
        $app->init_callbacks( 'workflow', 'publish_object' );
        $callback = ['name' => 'publish_object', 'model' => 'workflow'];
        $app->run_callbacks( $callback, 'workflow', $obj, $user_ids );
        if (! count( $user_ids ) ) {
            return;
        }
        $by_user_id;
        if ( $app->user() ) {
            $by_user_id = (int) $app->user()->id;
        } else if ( $obj->has_column( 'modified_by' ) ) {
            $by_user_id = (int) $obj->modified_by;
        } else if ( $obj->has_column( 'user_id' ) ) {
            $by_user_id = (int) $obj->user_id;
        }
        if (! $by_user_id ) return;
        $by_user = $app->db->model( 'user' )->load( $by_user_id );
        $by_user_name = $by_user ? $by_user->nickname : $app->translate( 'Unknown %s', $app->translate( 'User' ) );
        $from = '';
        if ( $by_user ) {
            $from = $by_user->email;
        } else {
            $from = $app->system_email( $msg );
            if ( $msg ) {
                return $app->error( $msg );
            }
        }
        $addresses = [];
        $users = $app->db->model( 'user' )->load( ['id' => ['IN' => $user_ids ] ] );
        foreach ( $users as $user ) {
            if (! $app->user() || ( $app->user()->email != $user->email || $app->multiplenotifications_to_all_publisher ) ) {
                if ( $user->email ) {
                    $addresses[] = $user->email;
                }
            }
        }
        $addresses = array_unique( $addresses );
        if ( empty( $addresses ) ) {
            return true;
        }
        $template = null;
        $subject = null;
        $tmpl = $app->get_mail_tmpl( 'notify_participants', $template );
        // Notyfy to previous users
        if ( $template ) {
            $subject = $template->subject;
        }
        $table = $app->get_table( $obj->_model );
        if (! $table ) return;
        $primary = $table->primary;
        $ctx = $app->ctx;
        $app->set_mail_param( $ctx );
        $ctx->vars['by_user'] = $by_user_name;
        $ctx->vars['object_name'] = $obj->$primary;
        $ctx->vars['object_label'] = $app->translate( $table->label );
        $ctx->vars['object_model'] = $obj->_model;
        $ctx->vars['object_id'] = $obj->id;
        $ctx->vars['object_permalink'] = $app->get_permalink( $obj );
        $notify_meta = $app->db->model( 'meta' )->get_by_key(
          ['model' => $obj->_model, 'object_id' => $obj->id, 'kind' => 'notify_at_published'] );
        if ( $notify_meta->id ) {
            $ctx->vars['workflow_message'] = trim( $notify_meta->text );
            $notify_meta->remove();
        }
        $app_name = $obj->workspace
                  ? $obj->workspace->name : $app->appname;
        if (! $subject ) {
            $subject = $app->translate ( '(%s)', $app_name )
                     . $app->translate( 'The %1$s\'%2$s\' you creadted (or edited) has been approved and published by %3$s.',
                     [ $app->translate( $table->label ), $obj->$primary, $by_user_name ] );
        }
        $portal_url = $obj->workspace
                  ? $obj->workspace->site_url : $app->site_url;
        $ctx->vars['app_name'] = $app_name;
        $ctx->vars['portal_url'] = $portal_url;
        $subject = $ctx->build( $subject );
        $body = $ctx->build( $tmpl );
        $from_address = $this->from_address;
        if (! $from_address ) {
            $from_address = $from;
        }
        $headers = ['From' => $from_address ];
        if ( $from_address !== $from ) {
            $headers['Reply-To'] = $from;
        }
        $error = '';
        if (! PTUtil::send_mail(
            $addresses, $subject, $body, $headers, $error ) ) {
            return $app->error( $error );
        }
    }

    function save_filter_workflow ( &$cb, $app, $obj ) {
        if ( $obj->notify_changes ) {
            $msg = '';
            $from_address = $obj->from_address;
            if (! $obj->email_from ) {
                $cb['errors'][] = $app->translate( '%s is required.', $app->translate( 'Mail From' ) );
                $cb['error_selectors']['#email_from'] = true;
                return false;
            } else if ( $obj->email_from === 'Specify Individually' && ! $from_address ) {
                $cb['errors'][] = $app->translate( '%s is required.', $app->translate( 'From Address' ) );
                $cb['error_selectors']['#from_address'] = true;
                return false;
            } else if ( $obj->email_from === 'Specify Individually' && !$app->is_valid_email ( $from_address, $msg ) ) {
                $cb['errors'][] = $msg;
                $cb['error_selectors']['#from_address'] = true;
                return false;
            }
        }
        return true;
    }

    function get_diff ( $app, $obj1, $obj2, $excludes = [] ) {
        $app->get_scheme_from_db( $obj1->_model );
        $table = $app->get_table( $obj1->_model );
        $excludes = array_merge( $excludes, ['user_id', 'status', 'previous_owner'] );
        $excludes = array_unique( $excludes );
        $changed_cols = PTUtil::object_diff( $app, $obj1, $obj2, $excludes );
        $scheme = $app->get_scheme_from_db( $obj1->_model );
        $default_locale =  $scheme['locale']['default'];
        $column_changed = [];
        foreach ( $changed_cols as $name => $diff ) {
            $col = $app->db->model( 'column' )->get_by_key(
                ['name' => $name, 'table_id' => $table->id ] );
            $label = isset( $default_locale[ $name ] )
                   ? $default_locale[ $name ] : $name;
            if ( $col->id ) {
                $label = $col->label;
            }
            $label = $app->translate( $label );
            $column_changed[ $label ] = $diff;
        }
        return $column_changed;
    }
}