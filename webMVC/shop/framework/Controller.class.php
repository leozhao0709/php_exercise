<?php
	
	class Controller{

		/**
		 * 
		 *
		 * @param $url string
		 * @param $message
		 * @param $time int
		 *
		 * @return 
		 */

		protected function jump($url, $message='', $time=3){
			if ($message == '') {
				header('location: '. $url);
			} else{
				if (file_exists(CURR_VIEW_DIR.'jump.html')) {
					require CURR_VIEW_DIR.'jump.html';
				} else {
					echo <<<HTML
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta http-equiv="refresh" content = "$time; url= $url">

		<link rel="stylesheet" type="text/css" href="">
		<style type = "text/css"></style>
		<script type = "text/javascript"></script>

	</head>

	<body>
		$message
	</body>
</html>
HTML;
				}
			}
			die;
		}
	}
?>