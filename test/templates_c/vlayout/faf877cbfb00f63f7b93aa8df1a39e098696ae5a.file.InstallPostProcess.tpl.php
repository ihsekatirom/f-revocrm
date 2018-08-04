<?php /* Smarty version Smarty-3.1.7, created on 2018-05-12 13:20:55
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Install/InstallPostProcess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2448832215af6dc2751e282-54732625%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'faf877cbfb00f63f7b93aa8df1a39e098696ae5a' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Install/InstallPostProcess.tpl',
      1 => 1496690968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2448832215af6dc2751e282-54732625',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'VTIGER_VERSION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5af6dc27526e1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af6dc27526e1')) {function content_5af6dc27526e1($_smarty_tpl) {?>
<br>
<center>
	<footer class="noprint">
		<div class="vtFooter">
			<p><?php echo vtranslate('POWEREDBY');?>
 <?php echo $_smarty_tpl->tpl_vars['VTIGER_VERSION']->value;?>
 &#174; 2014 - 2019 <a href="http://f-revocrm.jp/" target="_blank">f-revocrm.jp</a></p>
		</div>
	</footer>
</center>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('JSResources.tpl'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<?php }} ?>