<?php
	
	$content = $_POST['content'];

	
	$link = new mysqli('localhost', 'root', 'php@2mon', 'db_ajax');
	$sql = "set names utf8";
	$link->query($sql);
	$sql = "select name from category where name like '$content%' order by id desc";

	$res = $link->query($sql);
	$data = array();
	while ($row = $res->fetch_assoc()) {
		$data[] = $row;
	}

	$link->close();

	echo json_encode($data);
?>