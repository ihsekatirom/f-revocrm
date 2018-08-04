<?php /* Smarty version Smarty-3.1.7, created on 2018-05-12 16:09:30
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/SideBar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20721661335af711ba0dbb75-44362172%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba854573110e745dd5f801457d24e92b6f9204bd' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/SideBar.tpl',
      1 => 1496690968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20721661335af711ba0dbb75-44362172',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5af711ba0e771',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af711ba0e771')) {function content_5af711ba0e771($_smarty_tpl) {?>
<div class="sideBarContents"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SideBarLinks.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="clearfix"></div><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SideBarWidgets.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><?php }} ?>