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
			require("conn.php");
			$id = addslashes($_GET['id']);

			$sql = "update deliverManage set start = 1 where id = $id";
			mysql_query($sql);

			header("location:deliver.php");
		?>
	</body>
</html>