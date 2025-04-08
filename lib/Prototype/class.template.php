<?php
class template extends PADOBaseModel {

    private $theme_class;

    function map ( $wantarray = false, $cols = '*' ) {
        if (! $this->id ) {
            return $wantarray ? [] : null;
        }
        $meth = $wantarray ? 'load' : 'get_by_key';
        $map = $this->_pado->model( 'urlmapping' )->$meth(
            ['template_id' => $this->id, 'is_preferred' => [0, 1] ],
            ['sort' => 'is_preferred', 'direction' => 'ascend'], $cols );
        if ( $wantarray ) {
            return $map;
        } else if ( $map->id ) {
            return $map;
        }
        return null;
    }

    function _text ( $app = null ) {
        if (! $this->linked_file ) {
            return $this->text;
        }
        $app = $app ? $app : $this->_pado->app;
        if ( $app->linked_file !== 2 ) {
            return $this->text;
        }
        $linked_file = $this->_linked_file( $app );
        if (! $linked_file ) {
            return $this->text;
        }
        if ( $app->fmgr->filesize( $linked_file ) ) {
            return $app->fmgr->get( $linked_file );
        }
        return $this->text;
    }

    function _linked_file ( $app = null ) {
        if (! $this->linked_file ) {
            return;
        }
        $linked_file = $this->linked_file;
        if ( strpos( $linked_file, '%' ) !== 0 ) {
            return $linked_file;
        }
        $app = $app ? $app : $this->_pado->app;
        if ( strpos( $linked_file, '%t' ) === 0 ) {
            $theme = $app->get_config( 'theme', (int) $this->workspace_id );
            if (! $theme || ! $theme->data ) {
                return;
            }
            $path = $theme->data;
            if ( strpos( $path, '%' ) === 0 ) {
                $theme = $this->theme_class ? $this->theme_class : new PTTheme();
                $this->theme_class = $theme;
                $path = $theme->rel2abs( $path, $app );
            }
            $linked_file = preg_replace( '/^%t/', $path . '/views', $linked_file );
        } else if ( strpos( $linked_file, '%r' ) === 0 ) {
            $site_path = $this->workspace ? $this->workspace->site_path : $app->site_path;
            $linked_file = preg_replace( '/^%r/', $site_path, $linked_file );
        } else if ( strpos( $linked_file, '%s' ) === 0 ) {
            $support_dir = rtrim( $app->support_dir, '/\\' );
            $linked_file = preg_replace( '/^%s/', $support_dir, $linked_file );
        }
        return $linked_file;
    }

    function save () {
        $app = Prototype::get_instance();
        if (! $this->id ) {
            parent::save();
        }
        $ctx = $app->ctx;
        $text = $this->text;
        if ( $text === null ) {
            return parent::save();
        }
        $app->init_tags();
        $ctx->stash( 'current_template', $this );
        $__stash = $ctx->__stash;
        $local_vars = $ctx->local_vars;
        $vars = $ctx->vars;
        $old = $ctx->request_cache;
        $ctx->request_cache = false;
        $compiled = rtrim( $ctx->build( $text, true ) );
        if ( $ctx->no_cache ) {
            $force_compile = $ctx->force_compile;
            $app->init_tags( true );
            $compiled = rtrim( $ctx->build( $text, true ) );
            $ctx->force_compile = $force_compile;
        }
        $this->compiled( $compiled );
        $cache_key = md5( $text );
        $this->cache_key( $cache_key );
        if ( $this->class == 'Archive' && ! $this->rev_type && $this->status == 2 ) {
            $ctx->set_cache( "{$cache_key}.view", $compiled );
        }
        $ctx->vars = $vars;
        $ctx->local_vars = $local_vars;
        $ctx->__stash = $__stash;
        $ctx->request_cache = $old;
        if ( $this->has_column( 'last_compiled' ) ) {
            $this->last_compiled( $app->request_time );
        }
        if ( $app->id == 'Prototype' && $app->mode == 'save'
            && ( $this->rev_type === '0' || $this->rev_type === 0 ) ) {
            $linked_file = $this->_linked_file( $app );
            $theme = $app->get_config( 'theme', (int) $this->workspace_id );
            if ( $this->linked_file && !$linked_file && strpos( $this->linked_file, '%t' ) === 0 ) {
                if (! $theme || ! $theme->data ) {
                    return $app->forward( 'template', $app->translate( 'The theme not selected.' ) );
                }
            }
            if ( $linked_file ) {
                $can_write = PTUtil::is_removable( $linked_file );
                $message = $app->translate( "Cannot write file '%s'.", $linked_file );
                if (! $can_write ) {
                    return $app->forward( 'template', $message );
                }
                if ( $this->text !== '' ) {
                    $res = false;
                    $delayed = $app->fmgr->delayed;
                    $app->fmgr->delayed = false;
                    if ( $app->fmgr->exists( $linked_file ) ) {
                        if ( md5_file( $linked_file ) != md5( $this->text ) ) {
                            $res = $app->fmgr->put( $linked_file, $this->text );
                            if (! $res ) {
                                return $app->forward( 'template', $message );
                            }
                        }
                    } else {
                        $res = $app->fmgr->put( $linked_file, $this->text );
                        if (! $res ) {
                            return $app->forward( 'template', $message );
                        }
                    }
                    if ( strpos( $this->linked_file, '%t' ) === 0 && $this->uuid ) {
                        $cfg = $app->get_config( 'theme', (int) $this->workspace_id );
                        if ( is_object( $cfg ) && $cfg->data && $this->id ) {
                            $json = $cfg->data . DS . 'theme.json';
                            if ( strpos( $json, '%' ) === 0 ) {
                                $theme = $this->theme_class ? $this->theme_class : new PTTheme();
                                $this->theme_class = $theme;
                                $json = $theme->rel2abs( $json, $app );
                            }
                            if ( $app->fmgr->exists( $json ) ) {
                                $this->_update_json( $app, $json );
                            }
                            if ( $res && $app->remove_old_link ) {
                                $oldFile = $theme->data . DS . 'views' . DS . $this->uuid . '.tmpl';
                                if ( $linked_file != $oldFile && $app->fmgr->exists( $oldFile ) ) {
                                    $other =
                                        $app->db->model( 'template' )->count(
                                            ['linked_file' => '%t/' . $this->uuid . '.tmpl',
                                             'workspace_id' => $this->workspace_id ] );
                                    $other +=
                                        $app->db->model( 'template' )->count(
                                            ['linked_file' => '%t\\' . $this->uuid . '.tmpl',
                                             'workspace_id' => $this->workspace_id ] );
                                    if (! $other ) {
                                        $app->fmgr->unlink( $oldFile );
                                    }
                                }
                            }
                        }
                    }
                    $app->fmgr->delayed = $delayed;
                } else {
                    $this->text( $this->_text( $app ) );
                }
            }
        }
        return parent::save();
    }

    function remove () {
        if ( $cache_key = $this->cache_key ) {
            $app = Prototype::get_instance();
            $ctx = $app->ctx;
            $ctx->clear_cache( "{$cache_key}.view" );
        }
        return parent::remove();
    }

    function _update_json ( $app, $json ) {
        $theme = json_decode( $app->fmgr->get( $json ), true );
        if ( $theme === null ) {
            return $app->forward( 'template',
                   $app->translate( 'An error occurred while decoding json(%s).', $json ) );
        }
        $views = isset( $theme['views'] ) ? $theme['views'] : [];
        $view = isset( $views[ $this->uuid ] ) ? $views[ $this->uuid ] : [];
        $view['name'] = $this->name;
        $view['subject'] = $this->subject;
        $view['status'] = $this->status;
        $view['basename'] = $this->basename;
        $view['class'] = $this->class;
        $view['linked_file'] = $this->linked_file;
        $maps = $app->db->model( 'urlmapping' )->load( ['template_id' => $this->id ] );
        if (!empty( $maps ) ) {
            $mappings = [];
            $map_cols = ['name', 'model', 'mapping', 'date_based', 'fiscal_start',
                         'publish_file', 'container', 'container_scope', 'trigger_scope'];
            foreach ( $maps as $map ) {
                $mapping = [];
                foreach ( $map_cols as $map_col ) {
                    if ( $map->$map_col ) {
                        if (! $map->date_based && $map_col == 'fiscal_start' ) {
                            continue;
                        }
                        $mapping[ $map_col ] = $map->$map_col;
                    }
                }
                $tables = $app->get_related_objs( $map, 'table', 'triggers' );
                $triggers = [];
                foreach ( $tables as $trigger ) {
                    $triggers[] = $trigger->name;
                }
                if (! empty( $triggers ) ) {
                    $mapping['triggers'] = $triggers;
                }
                $mappings[] = $mapping;
            }
            $view['urlmappings'] = $mappings;
        }
        if ( $this->form_id ) {
            $form_cols= ['name', 'requires_token', 'token_expires', 'redirect_url', 'basename',
                         'send_email', 'email_from', 'send_thanks', 'send_notify',
                         'notify_to'];
            $que_cols = ['label', 'description', 'questiontype_id', 'hint', 'required',
                         'is_primary', 'is_name', 'validation_type', 'normalize', 'format',
                         'maxlength', 'multi_byte', 'hide_in_email', 'aggregate', 'rows',
                         'count_fields', 'multiple', 'connector', 'options', 'unit', 'values',
                         'default_value', 'placeholder', 'basename'];
            $form = $app->db->model( 'form' )->load( (int) $this->form_id );
            $questions_dir = dirname( $json ) . DS . 'questions';
            if ( $form ) {
                $tmpl_form = [];
                $form_values = $form->get_values( true );
                foreach ( $form_cols as $form_col ) {
                    $tmpl_form[ $form_col ] = $form->$form_col;
                }
                if ( $form->thanks_template ) {
                    $mail = $app->db->model( 'template' )->load( (int) $form->thanks_template );
                    if ( $mail ) {
                        $tmpl_form['thanks_template'] = $mail->uuid;
                    }
                }
                if ( $form->notify_template ) {
                    $mail = $app->db->model( 'template' )->load( (int) $form->notify_template );
                    if ( $mail ) {
                        $tmpl_form['notify_template'] = $mail->uuid;
                    }
                }
                $questions = $app->get_related_objs( $form, 'question', 'questions' );
                $question_ids = [];
                foreach ( $questions as $question ) {
                    if (! $question->uuid ) continue;
                    $question_path = $questions_dir . DS . $question->basename . '.tmpl';
                    if ( $app->fmgr->exists( $question_path ) &&
                        ( md5_file( $question_path ) == md5( $question->template ) ) ) {
                    } else {
                        $res = $app->fmgr->put( $question_path, $question->template );
                        if (! $res ) {
                            return $app->forward( 'template',
                                   $app->translate( "Cannot write file '%s'.", $question_path ) );
                        }
                    }
                    $question_values = [];
                    foreach ( $que_cols as $que_col ) {
                        $question_values[ $que_col ] = $question->$que_col;
                    }
                    if ( $questiontype_id = $question->questiontype_id ) {
                        $qt = $app->db->model( 'questiontype' )->load( (int) $questiontype_id );
                        if ( $qt ) {
                            $question_values['questiontype_id'] = $qt->basename;
                        }
                    }
                    $question_ids[ $question->uuid ] = $question_values;
                }
                if ( count( $question_ids ) ) {
                    $tmpl_form['questions'] = $question_ids;
                }
                $view['form'] = $tmpl_form;
            }
        }
        $theme['views'][ $this->uuid ] = $view;
        $data = json_encode( $theme, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES );
        if ( md5_file( $json ) != md5( $data ) ) {
            $res = $app->fmgr->put( $json, $data );
            if (! $res ) {
                return $app->forward( 'template',
                       $app->translate( "Cannot write file '%s'.", $json ) );
            }
        }
        return true;
    }
}