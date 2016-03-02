<?php /* Smarty version Smarty-3.1.19-dev, created on 2015-07-23 23:21:56
         compiled from "page.htpl" */ ?>
<?php /*%%SmartyHeaderCode:167719649355b1d6205bce85-20436219%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c781bd5a9b2238c06745759239d3e22bba263118' => 
    array (
      0 => 'page.htpl',
      1 => 1437718909,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167719649355b1d6205bce85-20436219',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19-dev',
  'unifunc' => 'content_55b1d6205e6cb7_39807602',
  'variables' => 
  array (
    'data' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_55b1d6205e6cb7_39807602')) {function content_55b1d6205e6cb7_39807602($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/Users/zhaolei/Documents/workspace_php/ajax/libs/plugins/function.counter.php';
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
			共条数据
			共页
			每页条
			当前第页
			第一页
			上一页
			下一页
			最末页
		</td>
	</tr>
</table><?php }} ?>
