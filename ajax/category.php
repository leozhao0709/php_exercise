<?php
	$cid = $_POST['cid'];
	// header("Content-Type:text/html; charset=utf8");
	$link = new mysqli('localhost', 'root', 'php@2mon', 'db_ajax');
	$sql = "set names utf8";
	$link->query($sql);
	$sql = "select * from category where cid = '$cid'";
	

	$res = $link->query($sql);
	$data = array();
	while ($row = $res->fetch_assoc()) {
		$data[] = $row;
	}

	$link->close();

	echo json_encode($data);
?>