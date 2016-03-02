<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta name="keywords" content="keyword1,keyword2,keyword3">
		<meta name="description" content="this is my page">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">

		<link rel="stylesheet" type="text/css" href="">
		<style type = "text/css"></style>
		<script type = "text/javascript"></script>

	</head>

	<body>
		<?php
			$n1 = addslashes($_POST["n1"]);
			$n2 = addslashes($_POST["n2"]);
			$n3 = addslashes($_POST["n3"]);

			require("conn.php");
			$sql = "insert into liuyanbiao(xingming, biaoti, fabushijian, neirong)values('$n1', '$n2', now(), '$n3');";
			$result = mysql_query($sql);
			if ($result) {
				// echo "留言成功！ 谢谢 <br/>
				// 		<a href = 'index.php'> 返回首页</a>";
				header("location: index.php?msg=留言成功！");
			} else {
				echo "留言失败， 非常抱歉， 请跟管理员联系， 参考信息：".mysql_error();
			}
		?>
	</body>
</html>