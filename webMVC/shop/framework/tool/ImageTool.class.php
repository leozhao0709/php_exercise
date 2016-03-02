<?php
	
	class ImageTool {

		private $create_funcs = array(
			'image/jpeg' => 'imagecreatefromjpeg',
			'image/png' => 'imagecreatefrompng',
			'image/gif' => 'imagecreatefromgif'
			);

		private $output_funcs = array(
			'image/jpeg' => 'imagejpeg',
			'image/png' => 'imagepng',
			'image/gif' => 'imagegif'
			);

		public function makeThumb($src_file, $max_w, $max_h) {
			if (!file_exists($src_file)) {
				$this->error_info = '原图片不存在';
				return false;
			}

			$src_info = getimagesize($src_file);
			$src_w = $src_info[0];
			$src_h = $src_info[1];

			if ($src_w < $max_w && $src_h < $max_h) {
				$dst_w = $src_w;
				$dst_h = $src_h;
			} else {
				if ($src_w/$max_w > $src_h/$max_h) {
					$dst_w = $max_w;
					$dst_h = $src_h/$src_w * $dst_w;
				} else {
					$dst_h = $max_h;
					$dst_w = $dst_h * ($src_w/$src_h);
				}
			}

			$create_func = $this->create_funcs[$src_info['mime']];

			$src_img = $create_func($src_file);
			$dst_img = imagecreatetruecolor($max_w, $max_h);

			//填充缩略图背景色，蓝色
			$blue = imagecolorallocate($dst_img, 0x0, 0x0, 0xff);
			imagefill($dst_img, 0, 0, $blue);

			$dst_x = ($max_w - $dst_w)/2;
			$dst_y = ($max_h - $dst_h)/2;
			imagecopyresampled($dst_img, $src_img, $dst_x, $dst_y, 0, 0, $dst_w, $dst_h, $src_w, $src_h);

			$src_dir = dirname($src_file);
			$src_basename = basename($src_file);
			$thumb_file = substr($src_basename, 0, strrpos($src_basename, '.')).'_thumb'.strrchr($src_basename, '.');
			// imagejpeg($dst_img, $src_dir.DS.$thumb_file);

			$output_func = $this->output_funcs[$src_info['mime']];
			$output_func($dst_img, $src_dir.DS.$thumb_file);

			imagedestroy($dst_img);
			imagedestroy($src_img);

			return basename($src_dir).'/'.$thumb_file;

		}
	}
?>