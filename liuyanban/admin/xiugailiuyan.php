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
			require("../conn.php");

			$xingming = $_POST['xingming'];
			$biaoti = $_POST['biaoti'];
			$neirong = $_POST['neirong'];

			$id = $_POST['id'];

			$sql = "update liuyanbiao set xingming= '$xingming', biaoti= '$biaoti', neirong= '$neirong' where id = '$id'";
			$result = mysql_query($sql);

			if ($result) {
				header("location:mes_manage.php");
			}
			else {
				echo "回复失败: ".mysql_error();
			}
		?>
	</body>
</html>