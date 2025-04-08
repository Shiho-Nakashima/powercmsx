<?php ob_start();?><?php $_ba5c34_vars=&$this->vars;$_ba5c34_old_params=&$this->old_params;$_ba5c34_local_params=&$this->local_params;$_ba5c34_old_vars=&$this->old_vars;$_ba5c34_local_vars=&$this->local_vars;?><?php $c_285953=null;ob_start();$_ba5c34_old_params['_285953']=$_ba5c34_local_params;$_ba5c34_old_vars['_285953']=$_ba5c34_local_vars;$a_285953=$this->setup_args(['regex_replace'=>'\'/^%s+$/um\',\'\'','remove_blank'=>'1','this_tag'=>'block'],null,$this);$_285953=-1;$r_285953=true;while($r_285953===true):$r_285953=($_285953!==-1)?false:true;echo $this->block_block($a_285953,$c_285953,$this,$r_285953,++$_285953,'_285953');ob_start();?>
<?php $c_285953 = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_285953=false;}if($c_285953 ):?>
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0">
  <channel>
    <title><?php echo $this->modifier_encode_xml(paml_modifier_funcs('strip_tags', $this->component('PTTags')->hdlr_websitename($this->setup_args(['remove_html'=>'1','encode_xml'=>'1','this_tag'=>'websitename'],null,$this),$this)),$this->setup_args('1','encode_xml',$this),$this,'encode_xml')?>
</title>
    <link><?php echo $this->modifier_encode_xml($this->component('PTTags')->hdlr_websiteurl($this->setup_args(['encode_xml'=>'1','this_tag'=>'websiteurl'],null,$this),$this),$this->setup_args('1','encode_xml',$this),$this,'encode_xml')?>
</link>
    <description><?php echo $this->modifier_encode_xml(paml_modifier_funcs('strip_tags', $this->component('PTTags')->hdlr_websitedescription($this->setup_args(['remove_html'=>'1','encode_xml'=>'1','this_tag'=>'websitedescription'],null,$this),$this)),$this->setup_args('1','encode_xml',$this),$this,'encode_xml')?>
</description>
    <?php $c_e99fca=null;$_ba5c34_old_params['_e99fca']=$_ba5c34_local_params;$_ba5c34_old_vars['_e99fca']=$_ba5c34_local_vars;$a_e99fca=$this->setup_args(['lastn'=>'20','this_tag'=>'entries'],null,$this);$_e99fca=-1;$r_e99fca=true;while($r_e99fca===true):$r_e99fca=($_e99fca!==-1)?false:true;echo $this->component('PTTags')->hdlr_objectloop($a_e99fca,$c_e99fca,$this,$r_e99fca,++$_e99fca,'_e99fca');ob_start();?>
<?php $c_e99fca = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_e99fca=false;}if($c_e99fca ):?>

    <item>
      <title><?php echo $this->modifier_encode_xml(paml_modifier_funcs('strip_tags', $this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['remove_html'=>'1','encode_xml'=>'1','this_tag'=>'entrytitle'],null,$this),$this)),$this->setup_args('1','encode_xml',$this),$this,'encode_xml')?>
</title>
      <link><?php echo $this->modifier_encode_xml($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['encode_xml'=>'1','this_tag'=>'entrypermalink'],null,$this),$this),$this->setup_args('1','encode_xml',$this),$this,'encode_xml')?>
</link>
      <description><?php echo $this->modifier_encode_xml($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['encode_xml'=>'1','this_tag'=>'entrybody'],null,$this),$this),$this->setup_args('1','encode_xml',$this),$this,'encode_xml')?>
</description>
      <pubDate><?php echo $this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['format_name'=>'rfc822','this_tag'=>'entrydate'],null,$this),$this)?>
</pubDate>
      <?php $c_08d3fd=null;$_ba5c34_old_params['_08d3fd']=$_ba5c34_local_params;$_ba5c34_old_vars['_08d3fd']=$_ba5c34_local_vars;$a_08d3fd=$this->setup_args(['this_tag'=>'entrycategories'],null,$this);$_08d3fd=-1;$r_08d3fd=true;while($r_08d3fd===true):$r_08d3fd=($_08d3fd!==-1)?false:true;echo $this->component('PTTags')->hdlr_get_relatedobjs($a_08d3fd,$c_08d3fd,$this,$r_08d3fd,++$_08d3fd,'_08d3fd');ob_start();?>
<?php $c_08d3fd = true; if(isset($this->local_vars['__total__'])&&isset($this->local_vars['__counter__'])&&$this->local_vars['__total__']<$this->local_vars['__counter__']){$c_08d3fd=false;}if($c_08d3fd ):?>

        <category><?php echo $this->modifier_encode_xml($this->component('PTTags')->hdlr_get_objectcol($this->setup_args(['encode_xml'=>'1','this_tag'=>'categorylabel'],null,$this),$this),$this->setup_args('1','encode_xml',$this),$this,'encode_xml')?>
</category>
      <?php endif;$c_08d3fd=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_08d3fd'];$_ba5c34_local_vars=$_ba5c34_old_vars['_08d3fd'];?>

  </item>
  <?php endif;$c_e99fca=ob_get_clean();endwhile; $_ba5c34_local_params=$_ba5c34_old_params['_e99fca'];$_ba5c34_local_vars=$_ba5c34_old_vars['_e99fca'];?>

  </channel>
</rss>
<?php endif;$c_285953=ob_get_clean();endwhile;$c_285953=ob_get_clean();echo($this->modifier_remove_blank($this->modifier_regex_replace($c_285953,$this->setup_args('\\\'/^%s+$/um\\\',\\\'\\\'','regex_replace',$this),$this,'regex_replace'),$this->setup_args('1','remove_blank',$this),$this,'remove_blank')); $_ba5c34_local_params=$_ba5c34_old_params['_285953'];$_ba5c34_local_vars=$_ba5c34_old_vars['_285953'];?><?php $this->out=ob_get_clean();$this->meta=array (
  'template_paths' => 
  array (
  ),
  'version' => '4.0',
  'advanced' => true,
  'time' => 1744005690,
);?>