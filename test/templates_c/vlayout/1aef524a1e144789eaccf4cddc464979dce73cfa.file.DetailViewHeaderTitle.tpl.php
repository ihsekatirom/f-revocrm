<?php /* Smarty version Smarty-3.1.7, created on 2018-05-26 15:09:41
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/EmailTemplates/DetailViewHeaderTitle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5077684565b0978b5834f87-48343453%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1aef524a1e144789eaccf4cddc464979dce73cfa' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/EmailTemplates/DetailViewHeaderTitle.tpl',
      1 => 1526129179,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5077684565b0978b5834f87-48343453',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'RECORD' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b0978b585bd1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0978b585bd1')) {function content_5b0978b585bd1($_smarty_tpl) {?>
<span class="span10 margin0px"><span class="row-fluid"><span class="recordLabel font-x-x-large textOverflowEllipsis span pushDown" title="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getName();?>
"><span class="templatename"><?php echo decode_html($_smarty_tpl->tpl_vars['RECORD']->value->get('templatename'));?>
</span>&nbsp;</span></span></span><?php }} ?>