<?php /* Smarty version Smarty-3.1.7, created on 2018-05-26 15:15:01
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/dashboards/KeyMetricsContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:639464485b0979f5c9fed0-03638097%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '684107d5fd59081442e6c20dd0a01cdd14a27453' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/dashboards/KeyMetricsContents.tpl',
      1 => 1496690968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '639464485b0979f5c9fed0-03638097',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'KEYMETRICS' => 0,
    'KEYMETRIC' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b0979f5cb27a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0979f5cb27a')) {function content_5b0979f5cb27a($_smarty_tpl) {?>
<div style='padding:5px'><?php  $_smarty_tpl->tpl_vars['KEYMETRIC'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['KEYMETRIC']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['KEYMETRICS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['KEYMETRIC']->key => $_smarty_tpl->tpl_vars['KEYMETRIC']->value){
$_smarty_tpl->tpl_vars['KEYMETRIC']->_loop = true;
?><div style='padding:5px'><span class="pull-right"><?php echo $_smarty_tpl->tpl_vars['KEYMETRIC']->value['count'];?>
</span><a href="?module=<?php echo $_smarty_tpl->tpl_vars['KEYMETRIC']->value['module'];?>
&view=List&viewname=<?php echo $_smarty_tpl->tpl_vars['KEYMETRIC']->value['id'];?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['KEYMETRIC']->value['name'],$_smarty_tpl->tpl_vars['KEYMETRIC']->value['module']);?>
</a></div><?php } ?></div>
<?php }} ?>