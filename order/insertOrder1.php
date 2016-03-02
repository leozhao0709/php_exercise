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
			$order = addslashes($_POST["order"]);
			$tabNum = addslashes($_POST["tabNum"]);
			$order = trim($order);

			$order = explode("\n", $order);


			require("conn.php");
			$sql = "select * from orderManage";
			$result = mysql_query($sql);
			$len = mysql_num_rows($result);





			for ($i=0; $i < $len; $i++) {
				$oneline = mysql_fetch_array($result);

				//第一种：
				if ($i == 0) {
						continue;
					}

				//最新：
				// if ($oneline['start']) {
				// 	continue;
				// }
				foreach ($order as $key=>$value) {
					if (trim($oneline['name']) == trim($value)) {
						$totalNum = $oneline['totalNum'] + 1;
						$id = $oneline['id'];
						$tableNum = $oneline['tableNum'].", $tabNum";


						$sql = "update orderManage set totalNum= '$totalNum', tableNum= '$tableNum' where id = '$id'";
						// echo $sql;
						// die();
						mysql_query($sql);
						array_splice($order, $key, 1);
						break;
					} 
				}

			}

			// print_r($order);

			foreach ($order as $key => $value) {
				$value = trim($value);
				if (strlen($value)==0) {
						array_splice($order, $key, 1);
						continue;
					}
				$sql = "insert into orderManage(name, totalNum, tableNum) values('$value', '1','$tabNum')";
				mysql_query($sql);
			}

			header("location: index.php?msg=提交成功!");


		?>
	</body>
</html>