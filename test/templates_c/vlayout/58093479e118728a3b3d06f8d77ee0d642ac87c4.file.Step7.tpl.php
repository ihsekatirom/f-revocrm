<?php /* Smarty version Smarty-3.1.7, created on 2018-05-12 12:46:31
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Install/Step7.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16478618395af6e22721f364-21845671%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58093479e118728a3b3d06f8d77ee0d642ac87c4' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Install/Step7.tpl',
      1 => 1496690968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16478618395af6e22721f364-21845671',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'APPUNIQUEKEY' => 0,
    'CURRENT_VERSION' => 0,
    'INDUSTRY' => 0,
    'PASSWORD' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5af6e22725118',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af6e22725118')) {function content_5af6e22725118($_smarty_tpl) {?>

<center><?php echo vtranslate('LBL_LOADING_PLEASE_WAIT');?>
...</center>

<form class="form-horizontal" name="step7" method="post" action="?module=Users&action=Login">
	<img src="//stats.vtiger.com/stats.php?uid=<?php echo $_smarty_tpl->tpl_vars['APPUNIQUEKEY']->value;?>
&v=<?php echo $_smarty_tpl->tpl_vars['CURRENT_VERSION']->value;?>
&type=I&industry=<?php echo urlencode($_smarty_tpl->tpl_vars['INDUSTRY']->value);?>
" alt='' title='' border=0 width='1px' height='1px'>
	<input type=hidden name="username" value="admin" >
	<input type=hidden name="password" value="<?php echo $_smarty_tpl->tpl_vars['PASSWORD']->value;?>
" >
</form>
<script type="text/javascript">
	jQuery(function() { /* Delay to let page load complete */ setTimeout(function() { jQuery('form[name="step7"]').submit(); }, 150); });
</script>
<?php }} ?>