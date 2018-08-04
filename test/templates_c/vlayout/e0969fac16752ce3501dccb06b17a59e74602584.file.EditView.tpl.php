<?php /* Smarty version Smarty-3.1.7, created on 2018-06-05 15:34:53
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Settings/Webforms/EditView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4927109355b16ad9d5d7d07-08833881%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0969fac16752ce3501dccb06b17a59e74602584' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Settings/Webforms/EditView.tpl',
      1 => 1496690968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4927109355b16ad9d5d7d07-08833881',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b16ad9d60574',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b16ad9d60574')) {function content_5b16ad9d60574($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("EditViewBlocks.tpl",'Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="targetFieldsTableContainer"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("FieldsEditView.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><br><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("EditViewActions.tpl",'Vtiger'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="row-fluid" style="margin-bottom:150px;"></div><?php }} ?>