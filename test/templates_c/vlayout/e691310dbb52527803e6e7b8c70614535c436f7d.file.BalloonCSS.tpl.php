<?php /* Smarty version Smarty-3.1.7, created on 2018-05-26 14:33:39
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Calendar/BalloonCSS.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20104430095b0970437f9c75-65360086%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e691310dbb52527803e6e7b8c70614535c436f7d' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Calendar/BalloonCSS.tpl',
      1 => 1496690968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20104430095b0970437f9c75-65360086',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b0970437fdf4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0970437fdf4')) {function content_5b0970437fdf4($_smarty_tpl) {?><style type="text/css">
html, body {
	height: 100%;
	overflow: auto;
}
#wrapper {
position: relative;
width: 100%;
height: 100%;
overflow: auto;
}
* html .balloon {
	position: absolute;
}
.balloon {
	position: fixed;
	opacity: 80;
	z-index: 9999;
	width: 300px;
	background-color: #2b2b2b;
	text-align: left;
	color:white;
	border-radius: 5px;
	padding:5px;
}
.balloon .title {
	font-size:bold;
	color:#FFC660;
}
.balloon:after {
	background: #fff;
	bottom: -20px;
	left: 50px;
	z-index: 99;
}

.balloon:before {
	background: #ccc;
	bottom: -15px;
	left: 35px;
	z-index: 99;
}
</style>
<?php }} ?>