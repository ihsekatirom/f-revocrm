<?php /* Smarty version Smarty-3.1.7, created on 2018-05-12 16:55:44
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/uitypes/StringDetailView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4153705165af71c90624a52-23316943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'caa0da9070338a3985d00bedfff991b3afa75796' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/uitypes/StringDetailView.tpl',
      1 => 1496690968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4153705165af71c90624a52-23316943',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'FIELD_MODEL' => 0,
    'RECORD' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5af71c906301b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af71c906301b')) {function content_5af71c906301b($_smarty_tpl) {?>



<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getDisplayValue($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue'),$_smarty_tpl->tpl_vars['RECORD']->value->getId(),$_smarty_tpl->tpl_vars['RECORD']->value);?>
<?php }} ?>