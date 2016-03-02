<?php
	
	$sql = "select count(*) as num from category";
	$link = new mysqli('localhost', 'root', 'php@2mon', 'db_ajax');
	$link->query('set names utf8');
	$result = $link->query($sql);
	$row = $result->fetch_assoc();
	$count = $row['num'];
	$pageSize = 2;


	$page = $_GET['page'];
	$pageCount = ceil($count/$pageSize);
	$pagePre = $page - 1;
	$pageNext = $page + 1;
	if ($pagePre < 1) {
		$pagePre = 1;
	}
	if ($pageNext > $pageCount) {
		$pageNext = $pageCount;
	}
	$offset = ($page-1)*$pageSize;

	$sql = "select * from category order by id desc limit $offset, $pageSize";
	$result = $link->query($sql);
	$data = array();
	while ($row = $result->fetch_assoc()) {
		$data[]=$row;
	}

	include './libs/Smarty.class.php';
	$smarty = new Smarty();
	$smarty->assign('data', $data);
	$smarty->assign('count', $count);
	$smarty->assign('pageCount', $pageCount);
	$smarty->assign('pageSize', $pageSize);
	$smarty->assign('page', $page);
	$smarty->assign('pageNext', $pageNext);
	$smarty->assign('pagePre', $pagePre);
	$str = $smarty->fetch('pageModel.html');
	echo $str;

?>