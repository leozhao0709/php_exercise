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

			function start(n, id) {
				var name = document.getElementById("caiming"+n)
				var num = document.getElementById("shuliang" + n)
				var tableNum = document.getElementById("zhuohao" + n)
				var answer = confirm("开始做 " + name.innerHTML + "?")
				if (answer) {
					name.style.textDecoration = "line-through"
					num.style.textDecoration = "line-through"
					tableNum.style.textDecoration = "line-through"
					location.href = "start.php?id="+ id;
				};

			}
			function finish(id, n){
				var caiming = document.getElementById("caiming"+n);
				var answer = confirm("已做完 "+ caiming.innerHTML + "?")
				if (answer) {
					location.href = "delete.php?id="+ id;
				};
			}

			function refresh(){
				location.reload();
			}
			setTimeout('refresh()', 3000);
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
					// if ($i == 0) {
					$id = $oneline['id'];
						// }	
			?>
			<ul>
				<li id = "<?php echo "caiming$i"; ?>" 
				<?php
					if ($oneline['start']) {
						echo "style = \"text-decoration: line-through\"";
					}
				?>
				><?php echo trim($oneline['name']); ?></li>
				<li id = "<?php echo "shuliang$i"; ?>" 
					<?php
					if ($oneline['start']) {
						echo "style = \"text-decoration: line-through\"";
					}
				?>
				><?php echo $oneline['totalNum']; ?></li>
				<li id = "<?php echo "zhuohao$i"; ?>" 
					<?php
					if ($oneline['start']) {
						echo "style = \"text-decoration: line-through\"";
					}
				?>
				><?php echo $oneline['tableNum']; ?></li>
			</ul>
			<div class = "special">
				<input type = "button" value = "开始" class="start" onclick = "start(<?php echo "$i, $id"; ?>)">
				<input type = "button" value = "完成" class="finishOrder" onclick= "<?php if (isset($id)) {
				echo "finish($id, $i)";}  else {echo "javascript:void(0)";}?>">
			</div>
			
			<?php
				}
			?>
		</div>
		
	</body>
</html>