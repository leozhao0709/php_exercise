<?php /* Smarty version Smarty-3.1.19-dev, created on 2015-07-23 23:35:24
         compiled from "pageModel.html" */ ?>
<?php /*%%SmartyHeaderCode:74261954755b1da49445804-61844595%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01317a7f06c20aaade8ea699241df44eb3da0b04' => 
    array (
      0 => 'pageModel.html',
      1 => 1437719721,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74261954755b1da49445804-61844595',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_55b1da49487958_27208959',
  'variables' => 
  array (
    'data' => 0,
    'value' => 0,
    'count' => 0,
    'pageCount' => 0,
    'pageSize' => 0,
    'page' => 0,
    'pagePre' => 0,
    'pageNext' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55b1da49487958_27208959')) {function content_55b1da49487958_27208959($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/Users/zhaolei/Documents/workspace_php/ajax/libs/plugins/function.counter.php';
?><table width=800 bgcolor='#6699cc' cellspacing='1'>
	<tr>
		<td>序号</td>
		<td>分类名</td>
		<td>分类描述</td>
		<td>上级分类</td>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
	<tr bgcolor='white'>
		<td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['value']->value['content'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['value']->value['cid'];?>
</td>
	</tr>
	<?php } ?>
	<tr>
		<td colspan='4'>
			共条<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
数据
			共<?php echo $_smarty_tpl->tpl_vars['pageCount']->value;?>
页
			每页<?php echo $_smarty_tpl->tpl_vars['pageSize']->value;?>
条
			当前第<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
页
			<a href="#" onclick="show(1)">第一页</a>
			<a href="#" onclick="show(<?php echo $_smarty_tpl->tpl_vars['pagePre']->value;?>
)">上一页</a>
			<a href="#" onclick="show(<?php echo $_smarty_tpl->tpl_vars['pageNext']->value;?>
)">下一页</a>
			<a href="#" onclick="show(<?php echo $_smarty_tpl->tpl_vars['pageCount']->value;?>
)">最末页</a>
		</td>
	</tr>
</table><?php }} ?>
