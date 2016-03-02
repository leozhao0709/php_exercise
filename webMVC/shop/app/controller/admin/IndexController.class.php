<?php
	
	class IndexController extends AdminPlatformController{

		public function indexAction() {
			// if (isset($_COOKIE['is_login']) && $_COOKIE['is_login']=='yes') {
			// session_start();
			// if (isset($_SESSION['is_login']) && $_SESSION['is_login']=='yes') {
				
			// } else {
			// 	// die('没有登录');
			// 	$this->jump('index.php?p=admin&c=Admin&a=login', '请先登录', 2);
			// }
			require CURR_VIEW_DIR.'index.html';
		}

		public function topAction(){
			// echo "top";
			require CURR_VIEW_DIR.'top.html';
		}

		public function menuAction(){
			// echo "menu";
			require CURR_VIEW_DIR.'menu.html';
		}

		public function dragAction(){
			// echo "drag";
			require CURR_VIEW_DIR.'drag.html';
		}

		public function mainAction(){
			// echo "main";
			require CURR_VIEW_DIR.'main.html';
		}
	}
?>