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
			$id = $_GET['id'];
			$sql = "delete from liuyanbiao where id = $id";
			$result = mysql_query($sql);

			if ($result) {

				// echo "删除成功";

				header("location: mes_manage.php");
			} else {
				echo "删除失败 <br/>".mysql_error();
			}
		?>
	</body>
</html>