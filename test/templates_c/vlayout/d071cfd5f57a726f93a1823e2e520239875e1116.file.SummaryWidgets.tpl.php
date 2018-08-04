<?php /* Smarty version Smarty-3.1.7, created on 2018-05-12 19:59:19
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/SummaryWidgets.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15123391065af74797f30d72-77525815%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd071cfd5f57a726f93a1823e2e520239875e1116' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/SummaryWidgets.tpl',
      1 => 1496690968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15123391065af74797f30d72-77525815',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PAGING_MODEL' => 0,
    'RELATED_MODULE' => 0,
    'RELATED_RECORDS' => 0,
    'FILENAME' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5af7479802c19',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af7479802c19')) {function content_5af7479802c19($_smarty_tpl) {?>
<input type="hidden" name="page" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->get('page');?>
" /><input type="hidden" name="pageLimit" value="<?php echo $_smarty_tpl->tpl_vars['PAGING_MODEL']->value->get('limit');?>
" /><?php if ($_smarty_tpl->tpl_vars['RELATED_MODULE']->value&&$_smarty_tpl->tpl_vars['RELATED_RECORDS']->value){?><?php $_smarty_tpl->tpl_vars['FILENAME'] = new Smarty_variable(($_smarty_tpl->tpl_vars['RELATED_MODULE']->value).("SummaryWidgetContents.tpl"), null, 0);?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path($_smarty_tpl->tpl_vars['FILENAME']->value,$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('RELATED_RECORDS'=>$_smarty_tpl->tpl_vars['RELATED_RECORDS']->value), 0);?>
<?php }?><?php }} ?>