<!DOCTYPE html>
<html>
	<head>
		<title>orderManage</title>
		<meta name="keywords" content="keyword1,keyword2,keyword3">
		<meta name="description" content="this is my page">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">

		<link rel="stylesheet" type="text/css" href="./style/skin.css">
		<style type = "text/css"></style>
		<script type = "text/javascript">

			function checkTable(){
				var tableNum = document.getElementById("tabNum").value;
				tableNum = tableNum.replace(/\s+/, "")
				// alert(tableNum.length + tableNum)
				if (isNaN(tableNum) || tableNum.length == 0) {
					alert("必须写入正确桌号");
					return false;
				} else {
					return true;
				}
			}

		</script>

	</head>

	<body>
		<?php
			if (isset($_GET['msg'])) {
				$msg = $_GET['msg'];
				echo "<script type='text/javascript'>window.alert(\"$msg\")</script>";
			} 
		?>
		<div id = "body">
			<h3>点菜管理系统</h3>
			<div id = "nav">
				<ul>
					<li><a href="index.php" style="color:#EA173A">点菜/首页</a></li>
					<li><a href="order.php">做菜</a></li>
					<li><a href="deliver.php">送菜</a></li>
				</ul>
			</div>
		</div>
		<div class = "lev">
			<!-- <div class = "head">点菜单</div> -->
			<form action = "insertOrder.php" method = "post" onsubmit = "return checkTable()">
			<textarea id = "order" name = "order"></textarea><br/>
			<input class = "c1" type = "submit" value = "提交">
			<input class = "c1" type = "reset" value = "重新填写">
			桌号：<input type = "text" class = "tableNum" id = "tabNum" name = "tabNum">
		</form>
		</div>
		
	</body>
</html>