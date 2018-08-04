<?php /* Smarty version Smarty-3.1.7, created on 2018-05-12 19:03:28
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Accounts/DetailViewHeaderTitle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14761823095af73a802fb237-56999742%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e03cc56b97993f01c637ee07cc491c41959f38d5' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Accounts/DetailViewHeaderTitle.tpl',
      1 => 1496690968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14761823095af73a802fb237-56999742',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'RECORD' => 0,
    'MODULE_MODEL' => 0,
    'NAME_FIELD' => 0,
    'FIELD_MODEL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5af73a80339fb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af73a80339fb')) {function content_5af73a80339fb($_smarty_tpl) {?>
<span class="span2"><img src="<?php echo vimage_path('summary_organizations.png');?>
" class="summaryImg" /></span><span class="span8 margin0px"><span class="row-fluid"><span class="recordLabel font-x-x-large textOverflowEllipsis span8 pushDown" title="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getName();?>
"><?php  $_smarty_tpl->tpl_vars['NAME_FIELD'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['NAME_FIELD']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getNameFields(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['NAME_FIELD']->key => $_smarty_tpl->tpl_vars['NAME_FIELD']->value){
$_smarty_tpl->tpl_vars['NAME_FIELD']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['FIELD_MODEL'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getField($_smarty_tpl->tpl_vars['NAME_FIELD']->value), null, 0);?><?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getPermissions()){?><span class="<?php echo $_smarty_tpl->tpl_vars['NAME_FIELD']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->get($_smarty_tpl->tpl_vars['NAME_FIELD']->value);?>
</span>&nbsp;<?php }?><?php } ?></span></span></span><?php }} ?>