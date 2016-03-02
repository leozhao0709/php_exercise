<?php
	
	class CaptchaTool {

		public function generate() {

			$rand_bg_file = TOOL_DIR.'captcha/captcha_bg'.mt_rand(1, 5). '.jpg';

			$img = imagecreatefromjpeg($rand_bg_file);

			$white = imagecolorallocate($img, 0xff, 0xff, 0xff);

			imagerectangle($img, 0, 0, 144, 19, $white);

			$chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';

			$captchar_str = '';

			for ($i=0, $strlen= strlen($chars); $i < 4; $i++) { 
				$rand_key = mt_rand(0, $strlen - 1);
				$captchar_str .= $chars[$rand_key];
			}

			@session_start();
			$_SESSION['captcha_code'] = $captchar_str;

			$black = imagecolorallocate($img, 0, 0, 0);

			if (mt_rand(0, 1) == 1) {
				$str_color = $white;
			} else {
				$str_color = $black;
			}

			imagestring($img, 5, 60, 3, $captchar_str, $str_color);

			header('Content-type: image/jpeg; charset = utf-8');
			imagejpeg($img);

			imagedestroy($img);
		}

		/**
		 * 
		 *
		 * @param 
		 * @param 
		 *
		 * @return 
		 */
		public function checkCaptcha($code) {
			@session_start();

			return strcasecmp($code, $_SESSION['captcha_code']);
		}
	}	
?>