<?php /* Smarty version Smarty-3.1.7, created on 2018-05-12 16:53:16
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/Popup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1589189265af71bfca0e820-54255870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '61f487af439f173643f957db986b353f96460920' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/Popup.tpl',
      1 => 1496690968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1589189265af71bfca0e820-54255870',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5af71bfca3d0d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af71bfca3d0d')) {function content_5af71bfca3d0d($_smarty_tpl) {?>
<div id="popupPageContainer" class="contentsDiv"><div class="paddingLeftRight10px"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('PopupSearch.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><div id="popupContents" class="paddingLeftRight10px"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('PopupContents.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><input type="hidden" class="triggerEventName" value="<?php echo getPurifiedSmartyParameters('triggerEventName');?>
"/></div></div><?php }} ?>