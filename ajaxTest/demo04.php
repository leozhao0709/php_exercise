<?php
	
	$username = $_GET['username'];
	mysql_connect('localhost', 'root', 'php@2mon');
	mysql_select_db('db_ajax');
	$sql = "select * from admin where username='$username'";
	$result = mysql_query($sql);
	$count=mysql_num_rows($result);
	mysql_close();
	if ($count>0) {
		echo "不可以注册"	;
	} else {
		echo "可以注册";
	}
?>