<?php
	
	/**
	* 
	*/		
	class AdminPlatformController extends Controller{

		public function __construct(){
			$this->initSession();

			$this->checkLogin();
		}
		
		protected function initSession() {
			new SessionDBTool;
		}

		protected function checkLogin(){
			// session_start();
			if (CONTROLLER == 'Admin' && (ACTION == 'login' || ACTION == 'signin' || ACTION == 'captcha')) {
				# code...
			}
			else {
				if (isset($_SESSION['is_login']) && $_SESSION['is_login']=='yes') {
				
			} else {
				// die('没有登录');

				$model_admin = new AdminModel;
				if ($model_admin->checkByCookie()) {
					
					$_SESSION['is_login'] = 'yes';
				} else {
					$this->jump('index.php?p=admin&c=Admin&a=login', '请先登录', 2);
				}

				
			}
			}
			
		}
	}
?>