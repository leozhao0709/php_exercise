<!DOCTYPE html>
<html>
	<head>
		<title>order</title>
		<meta name="keywords" content="keyword1,keyword2,keyword3">
		<meta name="description" content="this is my page">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">

		<link rel="stylesheet" type="text/css" href="./style/skin.css">
		<style type = "text/css"></style>
		<script type = "text/javascript">
			function finish(id){
				var caiming = document.getElementsByName("caiming")[0].innerHTML;
				var answer = confirm("已做完"+ caiming + "?")
				if (answer) {
					location.href = "delete.php?id="+ id;
				};
			}

			function refresh(){
				location.reload();
			}
			setTimeout('refresh()', 10000);
		</script>

	</head>

	<body>
		<?php
			require("conn.php");
		?>
		<div id = "body">
			<h3>点菜管理系统</h3>
			<div id = "nav">
				<ul>
					<li><a href="index.php">点菜/首页</a></li>
					<li><a href="order.php" style="color:#EA173A">做菜</a></li>
					<li><a href="deliver.php">送菜</a></li>
				</ul>
			</div>
		</div>
		<div class = "lev">
			<!-- <div class = "head">
				菜单
			</div> -->
			<ul>
				<li>菜名</li>
				<li>数量</li>
				<li>桌号</li>
			</ul>
			<?php
				$sql = "select * from orderManage";
				$result = mysql_query($sql);
				$len = mysql_num_rows($result);
				if ($len == 0) {
					$sql = "truncate table orderManage";
					mysql_query($sql);
				}

				for ($i=0; $i < $len; $i++) {
					$oneline = mysql_fetch_array($result); 
					if ($i == 0) {
							$id = $oneline['id'];
						}	
			?>
			<ul>
				<li name = "caiming"><?php echo trim($oneline['name']); ?></li>
				<li><?php echo $oneline['totalNum']; ?></li>
				<li><?php echo $oneline['tableNum']; ?></li>
			</ul>
			<?php
				}
			?>
			<input class = "finish" type = "button" value = "完成" onclick= "<?php if (isset($id)) {
				echo "finish($id)";}  else {echo "javascript:void(0)";}?>">
		</div>
		
	</body>
</html>