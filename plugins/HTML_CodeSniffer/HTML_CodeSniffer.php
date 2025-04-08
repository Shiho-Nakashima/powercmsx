<?php
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTPlugin.php' );

class HTML_CodeSniffer extends PTPlugin {

    function __construct () {
        parent::__construct();
    }

    function pre_run ( $app ) {
        if ( $app->id === 'Prototype' && $app->mode === 'save' && $app->param( '_preview' ) ) {
            $model = $app->param( '_model' );
            if ( $app->db->model( $model )->has_column( 'htmlcs_a11ychecked' ) ) {
                $_REQUEST['htmlcs_a11ychecked'] = 1;
                $_POST['htmlcs_a11ychecked'] = 1;
            }
        }
    }

    function insert_html_codesniffer ( $cb, $app, &$html ) {
        if (! $app->param( '__html_codesniffer' ) ) return true;
        if ( $cb['mime_type'] != 'text/html' && !$this->is_html( $app->build( $html ) ) ) return true;
        $workspace = $cb['workspace'];
        $ws_id = $workspace ? $workspace->id : 0;
        $enabled = $this->get_config_value( 'html_codesniffer_enabled', $ws_id );
        if (! $enabled ) return true;
        $level = $this->get_config_value( 'html_codesniffer_wcag_level', $ws_id );
        $js_path = $this->get_config_value( 'html_codesniffer_base_path', $ws_id );
        $timeout = (int) $this->get_config_value( 'html_codesniffer_set_timeout', $ws_id );
        $a11y_timeout = $timeout + 2000;
        if (! $level || ( $level != 'A' && $level != 'AAA' ) ) {
            $level = 'AA';
        }
        $filename = 'HTMLCS.js';
        $lang = $app->user()->language;
        $translate = 'en';
        if ( $lang == 'ja' ) {
            $translate = 'ja';
        }
        if (! $js_path ) {
            $uri = $app->request_uri;
            $paths = explode( '/', $uri );
            array_pop( $paths );
            $js_path = implode( '/', $paths ) . '/plugins/HTML_CodeSniffer/assets/HTML_CodeSniffer';
            $js_path = $app->base . $js_path;
            $js_path .= '/';
            if ( $lang == 'ja' ) {
                $filename = 'HTMLCS.ja.js';
            }
        }
        $tag = "<link rel=\"stylesheet\" href=\"{$js_path}Auditor/HTMLCSAuditor.css\">\n";
        if ( preg_match( '/<\/head>/i', $html ) ) {
            $html = preg_replace( '/(<\/head>)/', "{$tag}$1", $html );
            $tag = '';
        }
        $ts = date( 'YmdHis' );
        $tag .= <<<EOT
<script>
  window.addEventListener('load', function(event){
  setTimeout(function(){
    let _p='{$js_path}';
    let _i=function(s,cb) {
    let sc=document.createElement('script');sc.onload = function()
    {sc.onload = null;sc.onreadystatechange = null;cb.call(this);
    };sc.onreadystatechange = function()
    {if(/^(complete|loaded)$/.test(this.readyState) === true)
    {sc.onreadystatechange = null;sc.onload();}};
    sc.src=s;if (document.head)
    {document.head.appendChild(sc);}
    else {document.getElementsByTagName('head')[0].appendChild(sc);}};
    let options={path:_p,lang: '{$translate}'};
    _i(_p+'{$filename}?ts={$ts}',function()
    {HTMLCSAuditor.run('WCAG2AA',null,options);});
  },{$timeout});
  });
  window.addEventListener('load', function(event){
  setTimeout(function(){
    let a11ychecked = window.opener.document.getElementById('htmlcs_a11ychecked');
    if ( a11ychecked ) {
        let wrapper = document.getElementById('HTMLCS-wrapper');
        let children = wrapper.children;
        let error = children[1].children[1].children[0].children[0].innerHTML;
        error = error.replace(/<\/strong>.*$/, '');
        error = error.replace(/<strong>/, '');
        if ( error === '0' ) {
            a11ychecked.checked = true;
        } else {
            a11ychecked.checked = false;
        }
    }
  },{$a11y_timeout});
  });
</script>
EOT;
        if ( preg_match( '/<\/body>/i', $html ) ) {
            $html = preg_replace( '/(<\/body>)/', "{$tag}$1", $html );
        } else {
            $html .= $tag . '</body>';
        }
        return true;
    }

    function is_html ( $text ) {
        return preg_match( '/\A\s*<!DOCTYPE\s+html|<title[\s>]/i', $text ) === 1;
    }

    function insert_codesniffer_checkbox ( $cb, $app, $param, &$tmpl ) {
        if ( method_exists( $this, 'edit_mime_type' ) ) {
            $mime_type = $this->edit_mime_type( $app );
            if ( $mime_type != 'text/html' ) {
                return true;
            }
        } else {
            if (! isset( $app->ctx->vars['_has_mapping'] ) ) return true;
        }
        $include = $this->path() . DS . 'tmpl' . DS . 'screen_footer.tmpl';
        $include = file_get_contents( $include );
        $tmpl = preg_replace( '/<\/form>/', "{$include}</form>", $tmpl );
        return true;
    }
}