<?php /* Smarty version Smarty-3.1.7, created on 2018-05-26 14:33:39
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Calendar/CalendarView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19107613235b0970437e6161-97313530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3ff8751a0a5e4bf9e09cbacb293287b25facb6b' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Calendar/CalendarView.tpl',
      1 => 1496690968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19107613235b0970437e6161-97313530',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'CURRENT_USER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b0970437f795',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0970437f795')) {function content_5b0970437f795($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("BalloonCSS.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<input type="hidden" id="currentView" value="<?php echo getPurifiedSmartyParameters('view');?>
" /><input type="hidden" id="activity_view" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_USER']->value->get('activity_view');?>
" /><input type="hidden" id="time_format" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_USER']->value->get('hour_format');?>
" /><input type="hidden" id="start_hour" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_USER']->value->get('start_hour');?>
" /><input type="hidden" id="date_format" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_USER']->value->get('date_format');?>
" /><div class="container-fluid"><div class="row-fluid"><div class="span12"><p><!-- Divider --></p><div id="calendarview"></div></div></div></div><?php }} ?>