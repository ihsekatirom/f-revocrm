<?php /* Smarty version Smarty-3.1.7, created on 2018-05-12 19:27:40
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/uitypes/DateFieldSearchView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18065485895af7402c5fa308-85586706%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '612f2feb5d2e8cce5b75c372b6ed2ff9a738c2f3' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Vtiger/uitypes/DateFieldSearchView.tpl',
      1 => 1496690968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18065485895af7402c5fa308-85586706',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'FIELD_MODEL' => 0,
    'USER_MODEL' => 0,
    'dateFormat' => 0,
    'SEARCH_INFO' => 0,
    'FIELD_INFO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5af7402c6340d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af7402c6340d')) {function content_5af7402c6340d($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars["FIELD_INFO"] = new Smarty_variable(Zend_Json::encode($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldInfo()), null, 0);?><?php $_smarty_tpl->tpl_vars["dateFormat"] = new Smarty_variable($_smarty_tpl->tpl_vars['USER_MODEL']->value->get('date_format'), null, 0);?><div class="row-fluid"><input type="text" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('name');?>
" class="span9 listSearchContributor dateField" data-date-format="<?php echo $_smarty_tpl->tpl_vars['dateFormat']->value;?>
" data-calendar-type="range" value="<?php echo $_smarty_tpl->tpl_vars['SEARCH_INFO']->value['searchValue'];?>
" data-fieldinfo='<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['FIELD_INFO']->value, ENT_QUOTES, 'UTF-8', true);?>
'/></div><?php }} ?>