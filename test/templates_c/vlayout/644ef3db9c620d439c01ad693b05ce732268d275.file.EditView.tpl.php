<?php /* Smarty version Smarty-3.1.7, created on 2018-05-12 16:10:04
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Inventory/EditView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14819691125af711dc980a80-92335724%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '644ef3db9c620d439c01ad693b05ce732268d275' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Inventory/EditView.tpl',
      1 => 1496690968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14819691125af711dc980a80-92335724',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5af711dc98e53',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af711dc98e53')) {function content_5af711dc98e53($_smarty_tpl) {?>

<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("EditViewBlocks.tpl",'Inventory'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("LineItemsEdit.tpl",'Inventory'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("EditViewActions.tpl",'Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>