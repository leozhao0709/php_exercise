<?php
	
	//生成json数据
	
	// header("Content-Type:text/html;charset=utf8");

	// $product=array('name'=>'手机', 'price'=>1000);
	// echo json_encode($product);

	$product = new stdClass();
	$product->name = '电脑';
	$product->price = 3000;
	$str = json_encode($product);
	echo $str;
	echo "<hr>";


	//解析json数据
	var_dump(json_decode($str, true));
?>