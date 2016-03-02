<?php
	
	class UploadTool {

		private $upload_dir;
		private $max_size;
		private $allow_type;

		private $error_info;

		public function __construct($dir = '', $size = 2000000, $types = array()) {
			$this->upload_dir = $dir;
			$this->max_size = $size;
			$this->allow_type = empty($types)?array('image/jpeg', 'image/png'):$types;
		}

		public function __set($p_name, $p_value) {
			if (in_array($p_name, array('upload_dir', 'max_size', 'allow_type'))) {
				$this->p_name = $p_value;
			}
		}

		public function __get($p_name) {
			if ($p_name == 'error_info') {
				return $this->$p_name;
			}
		}

		public function upload($file, $prefix = 'upload_') {

			if ($file['error'] != 0) {
				switch ($file['error']) {
					case 1:
						$this->error_info = '文件太大，超出php.ini的限制';
						break;
					case 2:
						$this->error_info = '文件太大，超出表单内的MAX_FILE_SIZE的限制';
						break;
					case 3:
						$this->error_info = '文件没有上传完';
						break;
					case 4:
						$this->error_info = '没有上传文件';
						break;
					case 6:
					case 7:
						$this->error_info = '临时文件夹错误';
						break;
					
					default:
						break;
				}
				return false;
			}

			if (!in_array($file['type'], $this->allow_type)) {
				$this->error_info = '类型不对';
				return false;
			}

			if ($file['size'] > $this->max_size) {
				$this->error_info = '文件过大';
				return false;
			}

			if (!is_uploaded_file($file['tmp_name'])) {
				$this->error_info = '可疑文件';
				return false;
			}

			$dst_file = uniqid($prefix).strrchr($file['name'], '.');

			$sub_dir = date('YmdH');
			if (!is_dir($this->upload_dir.$sub_dir)) {
				mkdir($this->upload_dir.$sub_dir);
			}

			if (move_uploaded_file($file['tmp_name'], $this->upload_dir.$sub_dir.DS.$dst_file)) {
				return $sub_dir.'/'.$dst_file;
			} else {
				$this->error_info = '移动失败';
				return false;
			}
		}
	}
?>