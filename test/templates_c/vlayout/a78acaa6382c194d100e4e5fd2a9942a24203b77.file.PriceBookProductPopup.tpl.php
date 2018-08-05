<?php /* Smarty version Smarty-3.1.7, created on 2018-05-12 18:24:48
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Products/PriceBookProductPopup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5731228595af73170da2b26-52848670%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a78acaa6382c194d100e4e5fd2a9942a24203b77' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Products/PriceBookProductPopup.tpl',
      1 => 1496690968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5731228595af73170da2b26-52848670',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
    'PARENT_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5af73170dd260',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af73170dd260')) {function content_5af73170dd260($_smarty_tpl) {?>
<div id="popupPageContainer" class="contentsDiv"><div class="paddingLeftRight10px"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('PopupSearch.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<form id="popupPage" action="javascript:void(0)"><div id="popupContents"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('PriceBookProductPopupContents.tpl',$_smarty_tpl->tpl_vars['PARENT_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></form></div><input type="hidden" class="triggerEventName" value="<?php echo getPurifiedSmartyParameters('triggerEventName');?>
"/></div></div><?php }} ?>