<?php /* Smarty version Smarty-3.1.7, created on 2018-05-12 18:24:48
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Products/PriceBookProductPopupContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8650220295af73170ddb881-24331758%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2509acedf58d7a671d5a04e6c6f8c6ba9e23a528' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Products/PriceBookProductPopupContents.tpl',
      1 => 1496690968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8650220295af73170ddb881-24331758',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ORDER_BY' => 0,
    'SORT_ORDER' => 0,
    'SOURCE_FIELD' => 0,
    'SOURCE_RECORD' => 0,
    'SOURCE_MODULE' => 0,
    'USER_MODEL' => 0,
    'WIDTHTYPE' => 0,
    'LISTVIEW_HEADERS' => 0,
    'LISTVIEW_HEADER' => 0,
    'NEXT_SORT_ORDER' => 0,
    'MODULE_NAME' => 0,
    'SORT_IMAGE' => 0,
    'MODULE' => 0,
    'LISTVIEW_ENTRIES' => 0,
    'LISTVIEW_ENTRY' => 0,
    'GETURL' => 0,
    'LISTVIEW_HEADERNAME' => 0,
    'LISTVIEW_ENTRIES_COUNT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5af73170e5cd7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af73170e5cd7')) {function content_5af73170e5cd7($_smarty_tpl) {?>
<div class="contents-topscroll"><div class="topscroll-div">&nbsp;</div></div><div class="popupEntriesDiv relatedContents contents-bottomscroll"><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['ORDER_BY']->value;?>
" id="orderBy"><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['SORT_ORDER']->value;?>
" id="sortOrder"><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['SOURCE_FIELD']->value;?>
" id="sourceField"><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['SOURCE_RECORD']->value;?>
" id="sourceRecord"><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['SOURCE_MODULE']->value;?>
" id="parentModule"><input type="hidden" value="PriceBook_Products_Popup_Js" id="popUpClassName"/><?php $_smarty_tpl->tpl_vars['WIDTHTYPE'] = new Smarty_variable($_smarty_tpl->tpl_vars['USER_MODEL']->value->get('rowheight'), null, 0);?><div class="bottomscroll-div"><table class="table table-bordered listViewEntriesTable"><thead><tr class="listViewHeaders"><th class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><input type="checkbox"  class="selectAllInCurrentPage" /></th><?php  $_smarty_tpl->tpl_vars['LISTVIEW_HEADER'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_HEADERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->key => $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = true;
?><th class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><a class="listViewHeaderValues cursorPointer" data-nextsortorderval="<?php if ($_smarty_tpl->tpl_vars['ORDER_BY']->value==$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('column')){?><?php echo $_smarty_tpl->tpl_vars['NEXT_SORT_ORDER']->value;?>
<?php }else{ ?>ASC<?php }?>" data-columnname="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('column');?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
<?php if ($_smarty_tpl->tpl_vars['ORDER_BY']->value==$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('column')){?><img class="sortImage" src="<?php echo vimage_path($_smarty_tpl->tpl_vars['SORT_IMAGE']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
"><?php }else{ ?><img class="hide sortingImage" src="<?php echo vimage_path('downArrowSmall.png',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
"><?php }?></a></th><?php } ?><th class="listViewHeaderValues noSorting <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><?php echo vtranslate('LBL_LIST_PRICE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</th></tr></thead><?php  $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['popupListView']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->key => $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['popupListView']['index']++;
?><tr class="listViewEntries" data-id="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getId();?>
" data-name='<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->getName();?>
'<?php if ($_smarty_tpl->tpl_vars['GETURL']->value!=''){?> data-url='<?php $_tmp1=$_smarty_tpl->tpl_vars['GETURL']->value;?><?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->$_tmp1();?>
' <?php }?> id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_popUpListView_row_<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['popupListView']['index']+1;?>
"><td class="<?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><input class="entryCheckBox" type="checkbox" /></td><?php  $_smarty_tpl->tpl_vars['LISTVIEW_HEADER'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_HEADERS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->key => $_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('name'), null, 0);?><td class="listViewEntryValue <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->isNameField()==true||$_smarty_tpl->tpl_vars['LISTVIEW_HEADER']->value->get('uitype')=='4'){?><a><?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get($_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value);?>
</a><?php }else{ ?><a><?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get($_smarty_tpl->tpl_vars['LISTVIEW_HEADERNAME']->value);?>
</a><?php }?></td><?php } ?><td class="listViewEntryValue <?php echo $_smarty_tpl->tpl_vars['WIDTHTYPE']->value;?>
"><div class="row-fluid"><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ENTRY']->value->get('unit_price');?>
" name="listPrice" class="invisible span10 zeroPaddingAndMargin" data-validation-engine="validate[required,funcCall[Vtiger_Currency_Validator_Js.invokeValidation]]"data-decimal-separator='<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('currency_decimal_separator');?>
' data-group-separator='<?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->get('currency_grouping_separator');?>
'/></div></td></tr><?php } ?></table></div><!--added this div for Temporarily --><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value=='0'){?><div class="row-fluid"><div class="emptyRecordsDiv"><?php echo vtranslate('LBL_EQ_ZERO',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
 <?php echo vtranslate('LBL_FOUND',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
.</div></div><?php }?></div><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value!='0'){?><div class="clearfix form-actions" style="border: 1px solid #DDDDDD;"><a class="cancelLink pull-right"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a><button class="btn addButton select pull-right"><i class="icon-plus"></i>&nbsp;<strong><?php echo vtranslate('LBL_ADD_TO_PRICEBOOKS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</strong></button></div><?php }?><?php }} ?>