<?php /* Smarty version Smarty-3.1.7, created on 2018-05-26 15:15:01
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/dashboards/KeyMetrics.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3169310795b0979f5c6e052-14591362%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7d19b882119551244e336720d93f5e3b8fb146e' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/dashboards/KeyMetrics.tpl',
      1 => 1496690968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3169310795b0979f5c6e052-14591362',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b0979f5c990f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0979f5c990f')) {function content_5b0979f5c990f($_smarty_tpl) {?>
<div class="dashboardWidgetHeader">
	<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("dashboards/WidgetHeader.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>

<div class="dashboardWidgetContent" style='padding:5px'>
	<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("dashboards/KeyMetricsContents.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<?php }} ?>