<?php /* Smarty version Smarty-3.1.7, created on 2018-05-26 14:33:39
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Calendar/CalendarViewPreProcess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18403395845b0970437160c2-10655532%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8263be077f0c5466edbf3b66446ec893b6784a60' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Calendar/CalendarViewPreProcess.tpl',
      1 => 1496690968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18403395845b0970437160c2-10655532',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b0970437459e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0970437459e')) {function content_5b0970437459e($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("Header.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("BasicHeader.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="bodyContents"><div class="mainContainer row-fluid"><div class="span2 row-fluid"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("SideBar.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><div class="contentsDiv span10 marginLeftZero"><?php }} ?>