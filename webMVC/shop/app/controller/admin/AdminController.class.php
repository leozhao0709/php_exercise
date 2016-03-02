<?php
	class AdminController extends AdminPlatformController{

		public function loginAction(){
			require CURR_VIEW_DIR.'login.html';
		}

		public function signinAction(){
			// require './app/model/AdminModel.class.php';

			$tool_captcha = new CaptchaTool;
			if ($tool_captcha->checkCaptcha($_POST['captcha'])) {
				$this->jump('index.php?p=admin&c=Admin&a=login', '验证码错误', 2);
			}

			$model_admin = new AdminModel;
			if ($admin_info = $model_admin->checkByLogin(addslashes($_POST['username']), addslashes($_POST['password']))) {
				// echo "合法用户";
				// setcookie('is_login', 'yes');
				// session_start();

				if (isset($_POST['remember'])) {
					setcookie('admin_id', $admin_info['admin_id'], time()+3600*24);
					setcookie('admin_pass', md5('itcast'.$admin_info['admin_pass'].'php'), time()+3600*24);
					// die;
				}

				$_SESSION['is_login'] = 'yes';
				$this->jump('index.php?p=admin&a=index&c=Index');
			} else {
				$this->jump('index.php?p=admin&c=Admin&a=login', '非法用户', 2);
				// echo "非法用户";
			}
		}

		public function captchaAction() {
			$tool_captcha = new CaptchaTool;
			$tool_captcha -> generate();
		}
	}
?>