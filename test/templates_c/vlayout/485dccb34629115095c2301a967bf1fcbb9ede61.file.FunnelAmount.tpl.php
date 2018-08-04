<?php /* Smarty version Smarty-3.1.7, created on 2018-05-26 15:14:14
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Potentials/dashboards/FunnelAmount.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10417259675b0979c628e103-96725249%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '485dccb34629115095c2301a967bf1fcbb9ede61' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Potentials/dashboards/FunnelAmount.tpl',
      1 => 1496690968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10417259675b0979c628e103-96725249',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b0979c62b67d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0979c62b67d')) {function content_5b0979c62b67d($_smarty_tpl) {?>

<div class="dashboardWidgetHeader">
	<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("dashboards/WidgetHeader.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<div class="dashboardWidgetContent">
	<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("dashboards/DashBoardWidgetContents.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>



<script type="text/javascript">
	Vtiger_Barchat_Widget_Js('Vtiger_Funnelamount_Widget_Js',{},{});
</script>
<?php }} ?>