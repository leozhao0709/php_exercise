<?php
	
	class GoodsController extends AdminPlatformController{

		public function addAction() {

			$model_category = new CategoryModel;
			$cat_list = $model_category->getTreeList();

			require CURR_VIEW_DIR.'goods_add.html';
		}

		public function insertAction() {
			$data['goods_name'] = $_POST['goods_name'];
			$data['goods_sn'] = $_POST['goods_sn'];
			$data['cat_id'] = $_POST['cat_id'];
			$data['shop_price'] = $_POST['shop_price'];
			$data['market_price'] = $_POST['market_price'];
			$data['goods_desc'] = $_POST['goods_desc'];
			$data['goods_number'] = $_POST['goods_number'];

			$is_best = isset($_POST['is_best'])? $_POST['is_best']:0;
			$is_new = isset($_POST['is_new'])? $_POST['is_new']:0;
			$is_hot = isset($_POST['is_hot'])? $_POST['is_hot']:0;
			$data['goods_status'] = 0|$is_best|$is_new|$is_hot;
			$data['is_on_sale'] = isset($_POST['is_on_sale'])?$_POST['is_on_sale']:0;
			$data['add_time'] = time();

			$tool_upload = new UploadTool(UPLOAD_DIR, 10000000);
			$tool_upload -> allow_type = array('image/jpeg', 'image/png', 'image/gif');

			if ($result = $tool_upload->upload($_FILES['image_ori'], 'goods_')) {
				$data['image_ori'] = $result;
				// die('上传成功');

				$tool_image = new ImageTool;
				$data['image_thumb'] = $tool_image->makeThumb(UPLOAD_DIR.$result, 100, 100);
			} else {
				die ($tool_upload->error_info);
			}

			$model_good = new GoodsModel;

			if ($model_good->insertGoods($data)) {
				die('添加成功');
				$this->jump('index.php?p=admin&c=Goods&a=list');
			} else {
				$this->jump('index.php?p=admin&c=Goods&a=add', '失败, 原因');
			}
		}

		public function listAction() {

			$model_goods = new GoodsModel;
			// $list = $model_goods->getList();
			$page = isset($_GET['page'])?$_GET['page']:1;
			$pagesize = isset($_GET['pagesize'])?$_GET['pagesize']:$GLOBALS['config']['admin']['good_list_pagesize'];
			$result = $model_goods->getPageList($page, $pagesize);
			$list = $result['list'];
			$total = $result['total'];
			$total_page = ceil($total/$pagesize);

			$tool_page = new PageTool;
			$page_html = $tool_page->show($page, $pagesize, $total, 'index.php?p=admin&c=Goods&a=list', array('pagesize' => $pagesize));

			require CURR_VIEW_DIR.'goods_list.html';
		}
	}
?>