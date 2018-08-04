<?php /* Smarty version Smarty-3.1.7, created on 2018-05-12 13:20:55
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Install/InstallPreProcess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18838484765af6dc274ea9f2-62734827%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e2469563fc777badb8dd1efc7496146090090bc' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Install/InstallPreProcess.tpl',
      1 => 1496690968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18838484765af6dc274ea9f2-62734827',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5af6dc274f15d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af6dc274f15d')) {function content_5af6dc274f15d($_smarty_tpl) {?>
<input type="hidden" id="module" value="Install" />
<input type="hidden" id="view" value="Index" />
<div class="container-fluid page-container">
	<div class="row-fluid">
		<div class="span6">
			<div class="logo">
				<img src="<?php echo vimage_path('logo.png');?>
"/>
			</div>
		</div>
		<div class="span6">
			<div class="head pull-right">
				<h3><?php echo vtranslate('LBL_INSTALLATION_WIZARD','Install');?>
</h3>
			</div>
		</div>
	</div>
<?php }} ?>