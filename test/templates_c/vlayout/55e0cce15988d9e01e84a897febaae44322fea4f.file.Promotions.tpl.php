<?php /* Smarty version Smarty-3.1.7, created on 2018-05-12 12:47:25
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/ExtensionStore/Promotions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:897697045af6e25de2a4d3-44166719%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55e0cce15988d9e01e84a897febaae44322fea4f' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/ExtensionStore/Promotions.tpl',
      1 => 1526129189,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '897697045af6e25de2a4d3-44166719',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PROMOTIONS' => 0,
    'PROMOTION' => 0,
    'SUMMARY' => 0,
    'EXTENSION_NAME' => 0,
    'LOCATION_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5af6e25de7c02',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af6e25de7c02')) {function content_5af6e25de7c02($_smarty_tpl) {?>
<div class="banner-container"><div class="row-fluid"></div><div class="banner"><ul class="bxslider"><?php  $_smarty_tpl->tpl_vars['PROMOTION'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['PROMOTION']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['PROMOTIONS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['PROMOTION']->key => $_smarty_tpl->tpl_vars['PROMOTION']->value){
$_smarty_tpl->tpl_vars['PROMOTION']->_loop = true;
?><li><?php $_smarty_tpl->tpl_vars['SUMMARY'] = new Smarty_variable($_smarty_tpl->tpl_vars['PROMOTION']->value->get('summary'), null, 0);?><?php $_smarty_tpl->tpl_vars['EXTENSION_NAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['PROMOTION']->value->get('label'), null, 0);?><?php if (is_numeric($_smarty_tpl->tpl_vars['SUMMARY']->value)){?><?php $_smarty_tpl->tpl_vars['LOCATION_URL'] = new Smarty_variable($_smarty_tpl->tpl_vars['PROMOTION']->value->getLocationUrl($_smarty_tpl->tpl_vars['SUMMARY']->value,$_smarty_tpl->tpl_vars['EXTENSION_NAME']->value), null, 0);?><?php }else{ ?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['SUMMARY']->value;?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['LOCATION_URL'] = new Smarty_variable($_tmp1, null, 0);?><?php }?><a onclick="window.open('<?php echo $_smarty_tpl->tpl_vars['LOCATION_URL']->value;?>
')"><img src="<?php if ($_smarty_tpl->tpl_vars['PROMOTION']->value->get('bannerURL')){?><?php echo $_smarty_tpl->tpl_vars['PROMOTION']->value->get('bannerURL');?>
<?php }?>" title="<?php echo $_smarty_tpl->tpl_vars['PROMOTION']->value->get('label');?>
" /></a></li><?php } ?></ul></div></div><?php }} ?>