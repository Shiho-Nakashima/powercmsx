<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><?php echo $this->component('PTTags')->hdlr_phpstart($this->setup_args(['this_tag'=>'phpstart'],null,$this),$this)?>

// =====================================================
// Specify the application's path according to the server environment.

// If the domain of the CMS is different from the domain of the site,
// Please specify the URL of parent directory of the 'assets/'.

// $asset_parent = '/powercmsx/';
// =====================================================

$allow_login  = <?php $_ba5c34_old_params['_bc6b98']=$_ba5c34_local_params;$_ba5c34_old_vars['_bc6b98']=$_ba5c34_local_vars;if($this->conditional_if($this->setup_args(['tag'=>'property','name'=>'allow_login','this_tag'=>'if'],null,$this),null,$this,true,true)):?>
true<?php else:?>
false<?php endif;$_ba5c34_local_params=$_ba5c34_old_params['_bc6b98'];$_ba5c34_local_vars=$_ba5c34_old_vars['_bc6b98'];?>
;
// Specify true to display unpublish URLs to login users.

$workspace_id = <?php echo $this->component('PTTags')->hdlr_websiteid($this->setup_args(['this_tag'=>'websiteid'],null,$this),$this)?>
;
require_once( '<?php echo $this->function_var($this->setup_args(['name'=>'application_dir','this_tag'=>'var'],null,$this),$this)?>
/class.Prototype.php' );
$app = new Prototype( ['id' => 'Bootstrapper'] );
if ( $app->request_method != 'GET' || $app->query_string ) {
    $app->force_dynamic = true;
}
require_once( LIB_DIR . 'Prototype' . DS . 'class.PTViewer.php' );
$bootstrapper = new PTViewer;
if ( isset( $asset_parent ) ) {
    $bootstrapper->prototype_path = $asset_parent;
}
if ( isset( $allow_login ) ) {
    $bootstrapper->allow_login = $allow_login;
}
$bootstrapper->view( $app, $workspace_id );<?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005690,
);?>