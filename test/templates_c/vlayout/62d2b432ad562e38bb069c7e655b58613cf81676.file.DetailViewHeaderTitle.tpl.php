<?php /* Smarty version Smarty-3.1.7, created on 2018-05-12 18:11:17
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/DetailViewHeaderTitle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5660972025af72e458932e9-50379940%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62d2b432ad562e38bb069c7e655b58613cf81676' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/DetailViewHeaderTitle.tpl',
      1 => 1496690968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5660972025af72e458932e9-50379940',
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
  'unifunc' => 'content_5af72e458adf9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af72e458adf9')) {function content_5af72e458adf9($_smarty_tpl) {?>
<span class="span10 margin0px"><span class="row-fluid"><span class="recordLabel font-x-x-large textOverflowEllipsis span pushDown" title="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getName();?>
"><?php  $_smarty_tpl->tpl_vars['NAME_FIELD'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['NAME_FIELD']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getNameFields(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['NAME_FIELD']->key => $_smarty_tpl->tpl_vars['NAME_FIELD']->value){
$_smarty_tpl->tpl_vars['NAME_FIELD']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['FIELD_MODEL'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getField($_smarty_tpl->tpl_vars['NAME_FIELD']->value), null, 0);?><?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getPermissions()){?><span class="<?php echo $_smarty_tpl->tpl_vars['NAME_FIELD']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->get($_smarty_tpl->tpl_vars['NAME_FIELD']->value);?>
</span>&nbsp;<?php }?><?php } ?></span></span></span><?php }} ?>