<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );
if (! defined( 'MB_ENCODE_NUMERICENTITY_MAP' ) ) {
    define( 'MB_ENCODE_NUMERICENTITY_MAP', [0x80, 0x10FFFF, 0, 0x1FFFFF] );
}

use Michelf\Markdown;

class Keywords extends PTPlugin {

    private $auto_tags     = false;
    private $auto_keywords = false;
    private $auto_excerpt  = false;
    private $auto_taxonomies = false;
    private $work_dir      = null;
    private $updated_obj   = [];
    private $updated_tags  = [];
    private $updated_taxonomies = [];

    function __construct () {
        parent::__construct();
    }

    function post_init ( $app ) {
        $app->db->register_callback( 'tag', 'post_save', 'post_save_tag', 100, $this );
        $app->db->register_callback( 'taxonomy', 'post_save', 'post_save_taxonomy', 100, $this );
        if ( $app->id != 'Prototype' ) return true;
        if ( $app->mode != 'save' && $app->mode != 'manage_plugins' ) return true;
        if ( $app->mode == 'manage_plugins' && $app->param( 'plugin_id' ) == 'keywords' && $app->param( 'edit_settings' ) ) {
            $SimplifiedJapanese = $this->class_simplified_japanese( $app );
            if ( $SimplifiedJapanese ) {
                $app->ctx->vars['class_simplified_japanese'] = 'class_simplified_japanese';
            }
            return true;
        }
        if ( $app->param( '_preview' ) ) return true;
        $workspace_id = $app->workspace() ? (int) $app->workspace()->id : 0;
        $auto_tags = $this->get_config_value( 'keywords_auto_tags', $workspace_id );
        $auto_taxonomies = $this->get_config_value( 'keywords_auto_taxonomies', $workspace_id );
        $auto_keywords = $this->get_config_value( 'keywords_auto_keywords', $workspace_id );
        $auto_excerpt = $this->get_config_value( 'keywords_auto_excerpt', $workspace_id );
        if (! $auto_taxonomies && ! $auto_tags && ! $auto_keywords && ! $auto_excerpt ) return true;
        $model = $app->param( '_model' );
        $auto_tags = preg_split( '/\s*,\s*/', strtolower( $auto_tags ) );
        $auto_taxonomies = preg_split( '/\s*,\s*/', strtolower( $auto_taxonomies ) );
        $auto_keywords = preg_split( '/\s*,\s*/', strtolower( $auto_keywords ) );
        $auto_excerpt = preg_split( '/\s*,\s*/', strtolower( $auto_excerpt ) );
        $this->auto_tags = in_array( $model, $auto_tags );
        $this->auto_taxonomies = in_array( $model, $auto_taxonomies );
        $this->auto_keywords = in_array( $model, $auto_keywords );
        $this->auto_excerpt = in_array( $model, $auto_excerpt );
        if (! $this->auto_taxonomies && ! $this->auto_tags && ! $this->auto_keywords && ! $this->auto_excerpt ) {
            return true;
        }
        $app->register_callback( $model, 'pre_save', 'pre_save_object', 1, $this );
        return true;
    }

    function post_save_tag ( $cb, $pado, $obj ) {
        $app = $pado->app;
        if ( $app->keywords_use_mecab ) {
            $model = $this->get_config_value( 'keywords_auto_tag_model', $obj->workspace_id );
            if ( $model !== 'tag' ) {
                return true;
            }
            $this->updated_tags[ $obj->workspace_id ] = $obj;
        }
        return true;
    }

    function post_save_taxonomy ( $cb, $pado, $obj ) {
        $app = $pado->app;
        if ( $app->keywords_use_mecab ) {
            $workspace_id = $app->workspace() ? $app->workspace()->id : 0;
            $model = $this->get_config_value( 'keywords_auto_tag_model', $workspace_id );
            if ( $model !== 'taxonomy' ) {
                return true;
            }
            $this->updated_taxonomies[0] = $obj;
        }
        return true;
    }
    
    function post_update_keyword ( &$cb, $app, $obj, $original ) {
        $cache_dir = $this->get_cache_dir( $obj->workspace_id, $app ) . DS;
        PTUtil::remove_dir( $cache_dir, true );
        if ( $app->keywords_use_mecab ) {
            $model = $this->get_config_value( 'keywords_auto_tag_model', $obj->workspace_id );
            if ( $model !== 'keyword' ) {
                return true;
            }
            $this->updated_obj[ (int) $obj->workspace_id ] = $obj;
        }
        return true;
    }

    function mecab_parse ( $text, $workspace_ids = [], $model = 'keyword' ) {
        $app = Prototype::get_instance();
        if ( array_values($workspace_ids) === $workspace_ids ) {
        } else {
            $workspace_ids = array_keys( $workspace_ids );
        }
        $basename = $model === 'keyword' ? 'dictionary_' : "dictionary_{$model}_";
        $dic_dir = $app->support_dir . DS . 'keywords' . DS;
        $user_dics = [];
        if (! empty( $workspace_ids ) ) {
            foreach ( $workspace_ids as $workspace_id ) {
                if ( $model === 'taxonomy' ) {
                    $workspace_id = 0;
                }
                $user_dic = $dic_dir . $basename . $workspace_id . '.dic';
                if ( file_exists( $user_dic ) ) {
                    $user_dics[] = $user_dic;
                    if ( $model === 'taxonomy' ) {
                        break;
                    }
                }
            }
        } else {
            $files = [];
            PTUtil::file_find( $dic_dir, $files );
            foreach ( $files as $idx => $file ) {
                if ( PTUtil::get_extension( $file, true ) != 'dic' ) {
                    unset( $files[ $idx ] );
                }
            }
            $user_dics = $files;
        }
        $class_name= 'Mecab\Tagger';
        $result = [];
        if ( class_exists( $class_name ) && count( $user_dics ) < 2 ) {
            $terms = [];
            if (!empty( $user_dics ) ) {
                $terms = ['-u' => $user_dics[0] ];
            }
            if ( file_exists( $app->keywords_mecab_dic_path ) ) {
                $terms['-d'] = $app->keywords_mecab_dic_path;
            }
            $mecab = new MeCab\Tagger( $terms );
            $result = $mecab->parse( $text );
            $result = explode( PHP_EOL, rtrim( $result ) );
        } else {
            if ( file_exists( $app->keywords_mecab_path ) ) {
                $mecab = escapeshellcmd( $app->keywords_mecab_path );
                if ( file_exists( $app->keywords_mecab_dic_path ) ) {
                    $dic_path = escapeshellarg( $app->keywords_mecab_dic_path );
                    $mecab .= " -d {$dic_path}";
                }
                if (! empty( $user_dics ) ) {
                    $mecab .= " -u " . escapeshellarg( implode( ',', $user_dics ) );
                }
                $work_dir = $this->work_dir ? $this->work_dir . DS : $app->upload_dir() . DS;
                $this->work_dir = $work_dir;
                $out = $work_dir . md5( $text ) . '.txt';
                file_put_contents( $out, "{$text}\n" );
                $command = "{$mecab} {$out}";
                $result = shell_exec( $command );
                $result = explode( PHP_EOL, rtrim( $result ) );
            }
        }
        return $result;
    }

    function pre_save_object ( &$cb, $app, $obj, $original ) {
        $scheme = $app->get_scheme_from_db( $obj->_model );
        $column_defs = $scheme['column_defs'];
        $text_columns = [];
        $excludes = ['keywords', 'uuid', 'rev_type', 'rev_object_id', 'rev_changed', 'rev_diff',
                     'rev_note', 'extra_path', 'mime_type', 'basename', 'class', 'file_name', 'file_ext'];
        foreach ( $column_defs as $column => $props ) {
            if ( isset( $props['type'] ) && $props['type'] == 'text' && !in_array( $column, $excludes ) ) {
                $text_columns[] = $column;
            } else if ( isset( $props['type'] ) && $props['type'] == 'string' ) {
                if ( isset( $props['size'] ) && $props['size'] == 255 && !in_array( $column, $excludes ) ) {
                    $text_columns[] = $column;
                }
            }
        }
        $all_text = '';
        foreach ( $text_columns as $text_column ) {
            $all_text .= $obj->$text_column;
        }
        $all_text = strip_tags( $all_text );
        $all_text = PTUtil::normalize( $all_text );
        $workspace_id = $app->workspace() ? (int) $app->workspace()->id : 0;
        $model = $this->get_config_value( 'keywords_auto_tag_model', $workspace_id );
        if ( $model === 'keyword' ) {
            $keywords =  $app->db->model( 'keyword' )->load(
                              ['workspace_id' => $workspace_id, 'status' => 2, 'only_alt' => 0],
                              ['sort' => 'order', 'direction' => 'ascend'], 'name' );
        } else {
            $terms = [];
            if ( $model === 'tag' ) {
                $terms['workspace_id'] = $workspace_id;
            }
            $keywords =  $app->db->model( $model )->load( $terms, ['sort' => 'order', 'direction' => 'ascend'], 'name' );
        }
        $match = [];
        if ( $app->keywords_use_mecab ) {
            $list_keywords = [];
            foreach ( $keywords as $keyword ) {
                $list_keywords[ strtolower( $keyword->name ) ] = $keyword->name;
            }
            $ids = [ (int) $obj->workspace_id => true ];
            $phrases = $this->mecab_parse( $all_text, $ids, $model );
            foreach ( $phrases as $phrase ) {
                if ( $phrase == 'EOS' ) {
                    continue;
                }
                list( $word, $attr ) = explode( "\t", $phrase );
                $word = strtolower( $word );
                if ( isset( $list_keywords[ $word ] ) ) {
                    $match[] = $list_keywords[ $word ];
                }
            }
        } else {
            foreach ( $keywords as $keyword ) {
                if ( stripos( $all_text, $keyword->name ) !== false ) {
                    $match[] = $keyword->name;
                }
            }
        }
        if (! empty( $match ) ) {
            $match = array_unique( $match );
            if ( $this->auto_tags ) {
                $tags = !empty( $cb['add_tags'] )
                    ? array_unique( array_merge( $cb['add_tags'], $match ) ) : $match;
                $cb['add_tags'] = $tags;
            }
            if ( $this->auto_taxonomies ) {
                $taxonomies = !empty( $cb['add_taxonomies'] )
                  ? array_unique( array_merge( $cb['add_taxonomies'], $match ) ) : $match;
                $cb['add_taxonomies'] = $taxonomies;
            }
            if ( $this->auto_keywords && $obj->has_column( 'keywords' ) ) {
                $keyword = trim( $obj->keywords );
                if ( $keyword ) {
                    $keywords = array_unique( array_merge( preg_split( "/\s*,\s*/", $keyword ), $match ) );
                } else {
                    $keywords = $match;
                }
                $obj->keywords( implode( ', ', $keywords ) );
            }
        }
        if ( $this->auto_excerpt && $obj->has_column( 'excerpt' ) && $obj->has_column( 'text' )
            && trim( $obj->text ) && trim( $obj->excerpt ) === '' ) {
            $SimplifiedJapanese = $this->class_simplified_japanese( $app );
            if ( $SimplifiedJapanese ) {
                $app->simplifiedjapanese_remove_conjunctions = true;
                $workspace_id = $app->workspace() ? (int) $app->workspace()->id : 0;
                $excerpt_length = $this->get_config_value( 'keywords_excerpt_length', $workspace_id );
                $excerpt_length_min = $excerpt_length * 0.8;
                $text = $obj->text;
                if ( $obj->has_column( 'text_format' ) && $obj->text_format == 'markdown' ) {
                    require_once( LIB_DIR . 'php-markdown' . DS . 'Michelf' . DS . 'Markdown.inc.php' );
                    $text = Markdown::defaultTransform( $text );
                }
                if ( stripos( $text, '<table' ) !== false || stripos( $text, '<style' ) !== false
                  || stripos( $text, '<script' ) !== false || stripos( $text, '<h' ) !== false ) {
                    $text = $this->adjust_elements( $text, $app );
                }
                $excerpts = $SimplifiedJapanese->summarize( $text, 4, $match );
                $generated = '';
                $_generated = '';
                foreach ( $excerpts as $excerpt ) {
                    $generated .= $excerpt;
                    if ( mb_strlen( $generated ) > $excerpt_length ) {
                        if ( mb_strlen( $_generated ) > $excerpt_length_min ) {
                            $generated = $_generated;
                        }
                        break;
                    }
                    $_generated .= $excerpt;
                }
                if ( mb_strlen( $generated ) > $excerpt_length ) {
                    $trim_excerpt = $this->get_config_value( 'keywords_trim_excerpt', $workspace_id );
                    if ( $trim_excerpt ) {
                        $generated = $app->ctx->modifier_truncate( $generated, "{$excerpt_length}+{$trim_excerpt}", $app->ctx );
                    }
                }
                $obj->excerpt( $generated );
            }
        }
        return true;
    }

    function adjust_elements ( $text, $app = null ) {
        $app = $app ? $app : Prototype::get_instance();
        libxml_use_internal_errors( true );
        $dom = new DomDocument();
        $text_content = "<html><body>{$text}";
        if ( $dom->loadHTML( mb_encode_numericentity( $text_content, MB_ENCODE_NUMERICENTITY_MAP, 'utf-8' ),
            LIBXML_HTML_NOIMPLIED|LIBXML_HTML_NODEFDTD|LIBXML_COMPACT ) ) {
            $elements = $dom->getElementsByTagName( 'style' );
            if ( $elements->length ) {
                $i = $elements->length - 1;
                while ( $i > -1 ) {
                    $element = $elements->item( $i );
                    $parent = $element->parentNode;
                    $parent->removeChild( $element );
                    $i -= 1;
                }
            }
            $elements = $dom->getElementsByTagName( 'script' );
            if ( $elements->length ) {
                $i = $elements->length - 1;
                while ( $i > -1 ) {
                    $element = $elements->item( $i );
                    $parent = $element->parentNode;
                    $parent->removeChild( $element );
                    $i -= 1;
                }
            }
            if ( $app->keywords_add_punctuation ) {
                $arr = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
                foreach ( $arr as $heading ) {
                    $elements = $dom->getElementsByTagName( $heading );
                    if ( $elements->length ) {
                        for ( $i = 0; $i < $elements->length; $i++ ) {
                            $element = $elements->item( $i );
                            $parent = $element->parentNode;
                            $content = $element->textContent;
                            if ( strlen( $content ) > mb_strlen( $content ) * 2 ) {
                                if (! preg_match( '/。$/', $content ) ) {
                                    $element->textContent = $content . '。';
                                }
                            }
                        }
                    }
                }
            }
            $arr = ['ol', 'ul', 'table', 'dt', 'blockquote'];
            foreach ( $arr as $e ) {
                $elements = $dom->getElementsByTagName( $e );
                if ( $elements->length ) {
                    $i = $elements->length - 1;
                    while ( $i > -1 ) {
                        $element = $elements->item( $i );
                        $parent = $element->parentNode;
                        $parent->removeChild( $element );
                        $i -= 1;
                    }
                }
            }
            $body = $dom->getElementsByTagName( 'body' );
            $body = $body->item(0);
            $innerHTML = ''; 
            $children  = $body->childNodes;
            foreach ( $children as $child ) { 
                $innerHTML .= $body->ownerDocument->saveHTML( $child );
            }
            $text = $innerHTML;
        }
        return $text;
    }

    function filter_summarize ( $text, $arg, $ctx ) {
        $app = $ctx->app;
        $SimplifiedJapanese = $this->class_simplified_japanese( $app );
        $wantarray = false;
        if ( strpos( $arg, ',' ) !== false ) {
            list( $arg, $wantarray ) = explode( ',', $arg );
        }
        $excerpts = [];
        $workspace_id = $ctx->stash( 'workspace' ) ? (int) $ctx->stash( 'workspace' )->id : 0;
        $cache_dir = $this->get_cache_dir( $workspace_id, $app ) . DS;
        $keywords =  $app->db->model( 'keyword' )->load(
                          ['workspace_id' => (int ) $workspace_id, 'status' => 2, 'only_alt' => 0],
                          ['sort' => 'order', 'direction' => 'ascend'], 'name' );
        $match = [];
        foreach ( $keywords as $keyword ) {
            if ( stripos( $text, $keyword->name ) !== false ) {
                $match[] = $keyword->name;
            }
        }
        if ( $SimplifiedJapanese ) {
            $cache_path = $cache_dir . md5( $text ) . '_' . $arg . '.json';
            if ( file_exists( $cache_path ) ) {
                $excerpts = json_decode( file_get_contents( $cache_path ), true );
            } else {
                $ctx->app->simplifiedjapanese_remove_conjunctions = true;
                if ( stripos( $text, '<table' ) !== false || stripos( $text, '<style' ) !== false
                  || stripos( $text, '<script' ) !== false || stripos( $text, '<h' ) !== false ) {
                    $text = $this->adjust_elements( $text, $app );
                }
                $excerpts = $SimplifiedJapanese->summarize( $text, $arg, $match );
                file_put_contents( $cache_path, json_encode( $excerpts ) );
            }
        } else {
            // TODO::Bracket
            $text = strip_tags( $text );
            if ( strrpos( $text, '＜' ) !== false || strrpos( $text, '＞' ) !== false ) {
                $br_st  = self::magic( $text );
                $br_end = self::magic( $text );
                $text = str_replace( '＜', $br_st, $text );
                $text = str_replace( '＞', $br_end, $text );
            }
            $text = PTUtil::normalize( $text );
            if ( isset( $br_st ) && isset( $br_end ) ) {
                $text = str_replace( $br_st, '＜', $text );
                $text = str_replace( $br_end, '＞', $text );
            }
            $text = trim( str_replace( ["\r\n", "\r", "\n"], '', $text ) );
            $text = preg_replace( "/\s{1,}/u", " ", $text );
            $delimiter = '.';
            if ( strpos( $text, '。' ) !== false ) {
                $delimiter = '。';
            }
            $add_last = $delimiter == '.' ? preg_match( "/\.$/", $text ) : preg_match( "/。$/", $text );
            $sentences = explode( $delimiter, $text );
            $sentences = array_map( 'trim', $sentences );
            $sentences = array_filter( $sentences, 'strlen' );
            $excerpts = [];
            $last = count( $sentences ) - 1;
            foreach ( $sentences as $idx => $sentence ) {
                if ( $last == $idx && !$add_last ) {
                    $excerpts[] = $sentence;
                } else {
                    $excerpts[] = $sentence . $delimiter;
                }
            }
            // TODO::Weighting by keywords.
            $excerpts = array_slice( $excerpts, 0, $arg );
        }
        if ( $wantarray ) {
            return $excerpts;
        }
        return !empty( $excerpts ) ? implode( '', $excerpts ) : $text;
    }

    function class_simplified_japanese ( $app ) {
        $plugin = $app->component( 'SimplifiedJapanese' );
        if ( is_object( $plugin ) ) {
            return $plugin;
        }
        $class_path = dirname( $this->path() ) . DS . 'SimplifiedJapanese' . DS . 'SimplifiedJapanese.php';
        if ( file_exists( $class_path ) ) {
            require_once( $class_path );
            $cfg = dirname( $this->path() ) . DS . 'SimplifiedJapanese' . DS . 'config.json';
            $app->configure_from_json( $cfg, null, false );
        }
        return $app->component( 'SimplifiedJapanese' );
    }

    function hdlr_autokeywords ( $args, $content, $ctx, &$repeat, $counter ) {
        if ( isset( $content ) ) {
            $app = $ctx->app;
            $model = $args['model'] ?? 'keyword';
            $name_col  = $args['name'] ?? 'name';
            $url_col   = $args['url'] ?? 'url';
            $title_col = $args['title'] ?? 'title';
            $min_length = $args['min_length'] ?? 0;
            $enclosure = $args['enclosure'] ?? '';
            $prefix = $args['prefix'] ?? '';
            $postfix = $args['postfix'] ?? '';
            $match_words = [];
            $tokens = [];
            $already_replaced = [];
            $tags = new PTTags();
            $ids = [];
            $extra = $tags->include_exclude_workspaces( $app, $args, $app->db->model( $model ), null, $ids );
            if ( $extra ) {
                $extra = ' AND ' . "{$model}_workspace_id {$extra}";
            }
            $obj = $app->db->model( $model );
            $terms = [];
            $class = $args['class'] ?? null;
            if ( $class && $obj->has_column( 'class' ) ) {
                $terms['class'] = $class;
            }
            $keywords = $obj->load(
                        $terms, ['sort' => 'order', 'direction' => 'ascend'], '*', $extra );
            $map = array();
            $case_sensitive = isset( $args['case_sensitive'] ) && $args['case_sensitive'];
            $add_attr = isset( $args['add_attr'] ) ? $args['add_attr'] : '';
            if ( strlen( $add_attr ) > 0 ) {
                $add_attr = preg_replace( '/\A(\S)/', ' $1', $add_attr, 1 );
            }
            $no_title = isset( $args['no_title'] ) ? $args['no_title'] : false;
            $target_blank = isset( $args['target_blank'] ) && $args['target_blank'];
            $replace_limit = isset( $args['replace_once'] ) && $args['replace_once'] ? 1 : -1;
            $word_boundary = isset( $args['word_boundary'] ) && $args['word_boundary'];
            $link = $args['tag'] ?? null;
            $paml = clone $ctx;
            foreach ( $keywords as $keyword ) {
                $name = $keyword->$name_col;
                if (!is_string( $name ) || !preg_match( '/\S/', $name ) ) {
                    continue;
                }
                if ( $min_length && mb_strlen( $name ) < $min_length ) {
                    continue;
                }
                if ( array_key_exists( $name, $map ) ) {
                    continue;
                }
                $url = null;
                if ( $link ) {
                    $paml->stash( $model, $keyword );
                    $paml->stash( 'current_context', $model );
                    $paml->stash( 'current_object', $keyword );
                    $url = $paml->build( $link );
                }
                if (! $url ) {
                    $url = $keyword->$url_col;
                    if (! $url ) {
                        $url = $app->get_permalink( $keyword );
                    }
                }
                if (!is_string( $url ) || !preg_match( '/\S/', $url ) ) {
                    continue;
                }
                $url  = htmlspecialchars( $url );
                $attr = ' href="' . $url . '"';
                $title = $keyword->$title_col;
                if (! $no_title ) {
                    if ( is_string( $title ) && strlen( $title ) > 0) {
                        $title = htmlspecialchars( $title );
                        $attr .= ' title="' . $title . '"';
                    }
                }
                if ( $target_blank ) {
                    $attr .= ' target="_blank"';
                }
                $map[ $name ] = "{$prefix}{$enclosure}<a$attr$add_attr>";
            }
            if ( empty( $map ) ) {
                $repeat = false;
                return $content;
            }
            $comments = array();
            $contents = preg_split( '{(<!(?:--.*?--|\[CDATA\[.*?\]\])>)}s',
                $content, -1, PREG_SPLIT_DELIM_CAPTURE
            );
            foreach ( $contents as $k => $v ) {
                if ( strncmp( $v, '<!', 2 ) === 0) {
                    $comments[ $k ] = $v;
                    $contents[ $k ] = "<!--$k-->";
                }
            }
            $content = implode( '', $contents );
            $priority_patterns = [];
            if ( $app->keywords_use_mecab ) {
                $phrases = $this->mecab_parse( strip_tags( $content ), $ids );
                $contains = [];
                foreach ( $phrases as $phrase ) {
                    if ( $phrase == 'EOS' ) {
                        continue;
                    }
                    list( $word, $attr ) = explode( "\t", $phrase );
                    if ( isset( $contains[ $word ] ) ) {
                        continue;
                    }
                    if ( isset( $map[ $word ] ) ) {
                        $contains[ $word ] = true;
                        if ( preg_match_all( '/[\x01-\x7E]+/', $word, $matchs ) ) {
                            $priority_patterns[ $word ] = true;
                        }
                    } else {
                        unset( $map[ $word ] );
                    }
                }
                foreach ( $map as $key => $anchor ) {
                    if (! isset( $contains[ $key ] ) ) {
                        unset( $map[ $key ] );
                    }
                }
            }
            $patterns = [];
            foreach ( $map as $keyword => $open_anchor ) {
                $pattern = preg_quote( $keyword, '/' );
                if ( $word_boundary ) {
                    $pattern = "\\b$pattern\\b";
                }
                $pattern1 = "/($pattern)/";
                $pattern2 = "/$pattern/";
                if ( !$case_sensitive ) {
                    $pattern1 .= 'i';
                    $pattern2 .= 'i';
                }
                $patterns[ $keyword ] = ['pattern1' => $pattern1, 'pattern2' => $pattern2, 'open_anchor' => $open_anchor ];
            }
            if ( !$case_sensitive ) {
                $map_lower = [];
                foreach ( $map as $mk => $ml ) {
                    $map_lower[ strtolower( $mk ) ] = true;
                }
            } else {
                $map_lower = $map;
            }
            $contents = preg_split( '{(<(?:[Aa](?:[ \n\r\t\f][^>]*)?>.*?</[Aa][ \n\r\t\f]*|[^>]*)>\s*)}s',
                $content, -1, PREG_SPLIT_DELIM_CAPTURE );
            $after_replaced = [];
            foreach ( $map as $keyword => $open_anchor ) {
                $pattern = $patterns[ $keyword ]['pattern2'];
                $n = count( $contents );
                for ( $i = 0; $i < $n; $i++ ) {
                    $content = $contents[ $i ];
                    if ( isset( $content[0] ) && $content[0] === '<' ) {
                        continue;
                    } else if ( stripos( $content, $keyword ) === false ) {
                        continue;
                    }
                    if ( $app->keywords_use_mecab ) {
                        $contain_phrases = [];
                        $content_phrases = $this->mecab_parse( $content, $ids );
                        foreach ( $content_phrases as $content_phrase ) {
                            if ( $content_phrase === 'EOL' ) continue;
                            if ( strpos( $content_phrase, "\t" ) === false ) continue;
                            list( $contentP, $contentI ) = explode( "\t", $content_phrase );
                            $contain_phrases[ $contentP ] = true;
                        }
                        if (!isset( $contain_phrases[ $keyword ] ) ) {
                            continue;
                        }
                        foreach ( $contain_phrases as $phrase_key => $true ) {
                            foreach ( $map as $check_word => $ph_anchor ) {
                                if ( stripos( $phrase_key, $check_word ) !== false
                                    && mb_strlen( $phrase_key ) !== mb_strlen( $check_word ) ) {
                                    $content_replace = false;
                                    if ( $case_sensitive && ! isset( $map[ $phrase_key ] ) ) {
                                        $content_replace = true;
                                    } else if (! $case_sensitive && ! isset( $map_lower[ strtolower( $phrase_key ) ] ) ) {
                                        $content_replace = true;
                                    }
                                    if ( $content_replace ) {
                                        $magic = self::magic( $content, $tokens );
                                        $content = self::str_replace_once( $phrase_key, $magic, $content );
                                        $after_replaced[ $magic ] = $phrase_key;
                                    }
                                }
                            }
                        }
                    }
                    $converted = false;
                    if ( isset( $priority_patterns[ $keyword ] ) ) {
                        if (! isset( $already_replaced[ $keyword ] ) ) {
                            if ( $replace_limit === 1 ) {
                                if ( preg_match_all( $pattern, $content, $matchs ) ) {
                                    $matchs = $matchs[0];
                                    $first = array_shift( $matchs );
                                    if (! empty( $matchs ) ) {
                                        $magic = self::magic( $content, $tokens );
                                        $content = preg_replace( $pattern, $magic, $content, 1, $k );
                                        foreach ( $matchs as $match ) {
                                            $after_magic = self::magic( $content, $tokens );
                                            $after_replaced[ $after_magic ] = $match;
                                            $content = self::str_replace_once( $match, $after_magic, $content );
                                        }
                                        $content = self::str_replace_once( $magic, "{$open_anchor}{$first}</a>{$enclosure}{$postfix}", $content );
                                    } else {
                                        $content = preg_replace( $pattern, "{$open_anchor}$0</a>{$enclosure}{$postfix}", $content, $replace_limit, $k );
                                    }
                                } else {
                                    continue;
                                }
                            } else {
                                $content = preg_replace( $pattern, "{$open_anchor}$0</a>{$enclosure}{$postfix}", $content, $replace_limit, $k );
                                if ( $k === 0 ) {
                                    continue;
                                }
                            }
                            if ( $replace_limit === 1 ) {
                                $already_replaced[ $keyword ] = true;
                            }
                        }
                        $converted = true;
                    }
                    if (! $converted && $app->keywords_use_mecab ) {
                        if ( mb_strlen( $content ) != strlen( $content ) ) {
                            $converted = true;
                            $english_sentence = [];
                            if ( preg_match_all( '/[\x01-\x7E]+/', $content, $matchs ) ) {
                                $matchs = $matchs[0];
                                foreach ( $matchs as $match ) {
                                    if (! in_array( $match, $map ) ) {
                                        continue;
                                    }
                                    $magic = self::magic( $content, $tokens );
                                    $content = self::str_replace_once( $match, $magic, $content );
                                    foreach ( $patterns as $k => $arr ) {
                                        if ( $replace_limit === 1 && isset( $already_replaced[ $k ] ) ) {
                                            continue;
                                        }
                                        list( $p, $open ) = [ $arr['pattern1'], $arr['open_anchor'] ];
                                        if ( preg_match( $p, $match ) ) {
                                            $match = preg_replace( $p, $open . '$1</a>{$enclosure}{$postfix}', $match, $replace_limit );
                                            if ( $replace_limit === 1 ) {
                                                $already_replaced[ $k ] = true;
                                            }
                                            $match_words[ $k ] = true;
                                        }
                                    }
                                    $english_sentence[ $magic ] = $match;
                                }
                            }
                            $magic = self::magic( $content, $tokens );
                            $content = str_replace( ' ', $magic, $content );
                            $phrases = $this->mecab_parse( $content, $ids );
                            foreach ( $phrases as $idx => $phrase ) {
                                if ( $phrase == 'EOS' ) {
                                    unset( $phrases[ $idx ] );
                                    continue;
                                }
                                list( $word, $attr ) = explode( "\t", $phrase );
                                $comp = $word;
                                if ( !$case_sensitive ) {
                                    $comp = strtolower( $comp );
                                }
                                if ( isset( $english_sentence[ $word ] ) ) {
                                    $word = $english_sentence[ $word ];
                                }
                                if ( $comp === $keyword && !isset( $already_replaced[ $keyword ] ) ) {
                                    $phrases[ $idx ] = "{$open_anchor}{$word}</a>{$enclosure}{$postfix}";
                                    if ( $replace_limit === 1 ) {
                                        $already_replaced[ $keyword ] = true;
                                    }
                                    $match_words[ $keyword ] = true;
                                } else {
                                    $phrases[ $idx ] = $word;
                                }
                            }
                            $content = implode( '', $phrases );
                            $content = str_replace( $magic, ' ', $content );
                            if (!empty( $english_sentence ) ) {
                                foreach ( $english_sentence as $magic => $original ) {
                                    if ( strpos( $content, $magic ) !== false ) {
                                        $original = isset( $english_sentence[ $original ] )
                                                  ? $english_sentence[ $original ] : $original;
                                        $content = self::str_replace_once( $magic, $original, $content );
                                    }
                                }
                            }
                        }
                    }
                    if (! $converted && !isset( $already_replaced[ $keyword ] ) ) {
                        $content = preg_replace( $pattern, "{$open_anchor}$0</a>{$enclosure}{$postfix}", $content, $replace_limit, $j );
                        if ( $j === 0 ) {
                            continue;
                        } else {
                            $match_words[ $keyword ] = true;
                            if ( $replace_limit === 1 ) {
                                $already_replaced[ $keyword ] = true;
                            }
                        }
                    }
                    $parts = preg_split( '{(<a [^>]+>.*?</a>\s*)}s', $content, -1, PREG_SPLIT_DELIM_CAPTURE );
                    array_splice( $contents, $i, 1, $parts );
                    $c = count( $parts ) - 1;
                    $i += $c;
                    $n += $c;
                }
            }
            $content = implode( '', $contents );
            if (!empty( $after_replaced ) ) {
                foreach ( $after_replaced as $magic => $original ) {
                    $content = str_replace( $magic, $original, $content );
                }
            }
            $contents = preg_split( '{(<!--\d+-->)}', $content, -1, PREG_SPLIT_DELIM_CAPTURE );
            foreach ( $contents as $k => $v ) {
                if ( preg_match( '/\A<!--(\d+)-->\z/', $v, $m ) ) {
                    $contents[ $k ] = $comments[ $m[1] ];
                }
            }
            $content = implode( '', $contents );
        }
        return $content;
    }

    function keywords_post_run ( $app ) {
        $updated_obj = $this->updated_obj;
        if (! empty( $updated_obj ) ) {
            foreach ( $updated_obj as $obj ) {
                $this->update_user_dic( $app, $obj );
            }
        }
        $updated_obj = $this->updated_tags;
        if (! empty( $updated_obj ) ) {
            foreach ( $updated_obj as $obj ) {
                $this->update_models_dic( $app, $obj, $obj->workspace_id );
            }
        }
        $updated_obj = $this->updated_taxonomies;
        if (! empty( $updated_obj ) ) {
            foreach ( $updated_obj as $obj ) {
                $this->update_models_dic( $app, $obj, 0 );
            }
        }
        return true;
    }

    function update_models_dic ( $app, $obj, $workspace_id ) {
        $fmgr = $app->fmgr;
        $mecab = $app->keywords_mecab_path;
        $mecab_dict = $app->keywords_mecab_dict_index_path;
        $dic_path = $app->keywords_mecab_dic_path;
        if (! $fmgr->exists( $mecab ) || ! $fmgr->exists( $mecab_dict )
            || ! $fmgr->exists( $dic_path ) ) {
            return true;
        }
        $mecab_dict = escapeshellarg( $mecab_dict );
        $dic_path = escapeshellarg( $dic_path );
        $terms = [];
        $model = $obj->_model;
        if ( $model === 'tag' ) {
            $terms['workspace_id'] = $workspace_id;
        }
        $user_dics = $app->db->model( $model )->load( $terms, [], 'name' );
        $work_dir = $this->work_dir ? $this->work_dir . DS : $app->upload_dir() . DS;
        $this->work_dir = $work_dir;
        $dictionaries = [];
        foreach ( $user_dics as $obj ) {
            $word = $obj->name;
            $word = str_replace( array( "\r", "\n" ), '', trim( $word ) );
            $word = str_replace( ',', '\\,', $word );
            $res = $this->mecab_parse( $word );
            $res = $res[0];
            list( $w, $info ) = explode( "\t", $res );
            $info = explode( ',', $info );
            $items = [ $word, '', '', '1'];
            for ( $i = 0; $i < 7; $i++ ) {
                $items[] = $info[ $i ];
            }
            $phonetic = isset( $info[7] ) ? $info[7] : '';
            $phonetic = $phonetic ? mb_convert_kana( $phonetic, 'c', 'UTF-8' ) : '';
            $items[] = $phonetic;
            $items[] = $phonetic;
            $dictionaries[ $word ] = $items;
        }
        $dic_dir = $app->support_dir . DS . 'keywords' . DS;
        if (! $fmgr->exists( $dic_dir ) ) {
            $fmgr->mkpath( $dic_dir );
        }
        $user_dic = $dic_dir . "dictionary_{$model}_" . $workspace_id . '.dic';
        if ( empty( $dictionaries ) ) {
            $fmgr->unlink( $user_dic );
            return true;
        }
        $dictionary = $work_dir . "dictionary_{$model}_" . $workspace_id . '.csv';
        $fp = fopen( $dictionary, 'w' );
        foreach ( $dictionaries as $fields ) {
            fputcsv( $fp, $fields );
        }
        fclose( $fp );
        $cmd = "{$mecab_dict} -d{$dic_path} -u {$user_dic}.tmp -f utf-8 -t utf-8 {$dictionary}";
        $result = shell_exec( $cmd );
        $fmgr->rename( "{$user_dic}.tmp", $user_dic );
        return true;
    }

    function update_user_dic ( $app, $dic ) {
        $fmgr = $app->fmgr;
        $mecab = $app->keywords_mecab_path;
        $mecab_dict = $app->keywords_mecab_dict_index_path;
        $dic_path = $app->keywords_mecab_dic_path;
        if (! $fmgr->exists( $mecab ) || ! $fmgr->exists( $mecab_dict )
            || ! $fmgr->exists( $dic_path ) ) {
            return true;
        }
        $mecab_dict = escapeshellarg( $mecab_dict );
        $dic_path = escapeshellarg( $dic_path );
        $workspace_id = (int) $dic->workspace_id;
        $terms = ['status' => 2 ];
        $terms['workspace_id'] = $workspace_id;
        $terms['only_alt'] = 0;
        $user_dics = $app->db->model( 'keyword' )->load( $terms, [], 'name' );
        $work_dir = $this->work_dir ? $this->work_dir . DS : $app->upload_dir() . DS;
        $this->work_dir = $work_dir;
        $dictionaries = [];
        foreach ( $user_dics as $obj ) {
            $word = $obj->name;
            $word = str_replace( array( "\r", "\n" ), '', trim( $word ) );
            $word = str_replace( ',', '\\,', $word );
            $res = $this->mecab_parse( $word );
            $res = $res[0];
            list( $w, $info ) = explode( "\t", $res );
            $info = explode( ',', $info );
            $items = [ $word, '', '', '1'];
            for ( $i = 0; $i < 7; $i++ ) {
                $items[] = $info[ $i ];
            }
            $phonetic = isset( $info[7] ) ? $info[7] : '';
            $phonetic = $phonetic ? mb_convert_kana( $phonetic, 'c', 'UTF-8' ) : '';
            $items[] = $phonetic;
            $items[] = $phonetic;
            $dictionaries[ $word ] = $items;
        }
        $dic_dir = $app->support_dir . DS . 'keywords' . DS;
        if (! $fmgr->exists( $dic_dir ) ) {
            $fmgr->mkpath( $dic_dir );
        }
        $user_dic = $dic_dir . 'dictionary_' . $workspace_id . '.dic';
        if ( empty( $dictionaries ) ) {
            $fmgr->unlink( $user_dic );
            return true;
        }
        $dictionary = $work_dir . 'dictionary_' . $workspace_id . '.csv';
        $fp = fopen( $dictionary, 'w' );
        foreach ( $dictionaries as $fields ) {
            fputcsv( $fp, $fields );
        }
        fclose( $fp );
        $cmd = "{$mecab_dict} -d{$dic_path} -u {$user_dic}.tmp -f utf-8 -t utf-8 {$dictionary}";
        $result = shell_exec( $cmd );
        $fmgr->rename( "{$user_dic}.tmp", $user_dic );
        return true;
    }

    function get_cache_dir ( $workspace_id, $app = null ) {
        $app = $app ? $app : Prototype::get_instance();
        $fmgr = $app->fmgr;
        $cache_dir =  $app->support_dir . DS
                   . 'cache' . DS . 'keywords_summarize_cache' . DS . $workspace_id;
        if (! $fmgr->exists( $cache_dir ) ) {
            $fmgr->mkpath( $cache_dir );
        }
        return $cache_dir;
    }

    public static function str_replace_once ( $from, $to, $subject ) {
        $from = '/' . preg_quote( $from, '/' ) . '/';
        return preg_replace( $from, $to, $subject, 1 );
    }

    private static function magic ( $content = '', &$tokens = [] ) {
        $magic = substr( str_shuffle( '0123456789012345678901234567890123456789'), 0, 20 );
        if ( strpos( $content, $magic ) !== false )
            return static::magic( $content );
        if ( isset( $tokens[ $magic ] ) )
            return static::magic( $content, $tokens );
        $tokens[ $magic ] = true;
        return $magic;
    }
}