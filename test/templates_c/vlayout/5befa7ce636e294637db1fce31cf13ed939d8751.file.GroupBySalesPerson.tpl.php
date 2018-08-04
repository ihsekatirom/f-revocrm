<?php /* Smarty version Smarty-3.1.7, created on 2018-05-26 15:14:50
         compiled from "/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Potentials/dashboards/GroupBySalesPerson.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8967232575b0979ea3d20d0-97250117%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5befa7ce636e294637db1fce31cf13ed939d8751' => 
    array (
      0 => '/var/www/html/frevocrm/includes/runtime/../../layouts/vlayout/modules/Potentials/dashboards/GroupBySalesPerson.tpl',
      1 => 1496690968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8967232575b0979ea3d20d0-97250117',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b0979ea3fa5e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b0979ea3fa5e')) {function content_5b0979ea3fa5e($_smarty_tpl) {?>

<div class="dashboardWidgetHeader">
	<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("dashboards/WidgetHeader.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<div class="dashboardWidgetContent">
	<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("dashboards/DashBoardWidgetContents.tpl",$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>


<script type="text/javascript">

	Vtiger_MultiBarchat_Widget_Js('Vtiger_Groupedbysalesperson_Widget_Js',{},{
			getCharRelatedData : function() {
				var container = this.getContainer();
				var data = container.find('.widgetData').val();
				data = JSON.parse(data);
				var users = new Array();
				var stages = new Array();
				var count = new Array();
				for(var i=0; i<data.length ;i++) {
					if($.inArray(data[i].last_name, users) == -1) {
						users.push(data[i].last_name);
					}
					if($.inArray(data[i].sales_stage, stages) == -1) {
						stages.push(data[i].sales_stage);
					}
				}
				
                var allLinks = new Array();
				for(j in stages) {
					var salesStageCount = new Array();
                    var links = new Array();
					for(i in users) {
						var salesCount = 0;
						for(var k in data) {
							var userData = data[k];
							if(userData.sales_stage == stages[j] && userData.last_name == users[i]) {
								salesCount = parseInt(userData.count);
                                link = userData.links
								break;
							}
						}
                        links.push(link);
						salesStageCount.push(salesCount);
					}
                    allLinks.push(links);
					count.push(salesStageCount);
				}
				return {
					'data' : count,
					'ticks' : users,
					'labels' : stages,
                     'links' : allLinks
				}
			}
		});
</script>
<?php }} ?>