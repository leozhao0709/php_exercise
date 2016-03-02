<?php
	
	class CategoryController extends AdminPlatformController{

		public function listAction(){

			$model_category = new CategoryModel;
			// $list = $model_category->getList();
			$list = $model_category->getTreeList();

			require CURR_VIEW_DIR.'category_list.html';
		}

		public function deleteAction(){
			$model_category = new CategoryModel;

			if ($model_category->delById($_GET['id'])) {
				$this->jump('index.php?p=admin&c=Category&a=list');
			} else{
				$this->jump('index.php?p=admin&c=Category&a=list', '失败: '.$model_category->error_info);
			}
		}

		/**
		 * 添加表单
		 *
		 * @param 
		 * @param 
		 *
		 * @return 
		 */	
		public function addAction() {
			$model_category = new CategoryModel;
			$cat_list = $model_category->getTreeList();

			require CURR_VIEW_DIR.'category_add.html';
		}

		/**
		 * 
		 *
		 * @param 
		 * @param 
		 *
		 * @return 
		 */
		public function insertAction() {
			$data['cat_name'] = $_POST['cat_name'];
			$data['parent_id'] = $_POST['parent_id'];
			$data['sort_order'] = $_POST['sort_order'];

			$model_category = new CategoryModel;
			if ($model_category->insertCat($data)) {
				$this->jump('index.php?p=admin&c=Category&a=list');
			} else{
				$this->jump('index.php?p=admin&c=Category&a=add', '添加失败: '.$model_category->error_info);
			}
		}

		public function editAction() {
			$model_category = new CategoryModel;
			$curr_cat = $model_category->getById($_GET['id']);
			$cat_list = $model_category->getTreeList();

			require CURR_VIEW_DIR.'category_edit.html';
		}

		public function updateAction() {
		//得到表单数据
		$data['cat_id'] = $_POST['cat_id'];
		$data['cat_name']  = $_POST['cat_name'];
		$data['parent_id'] = $_POST['parent_id'];
		$data['sort_order'] = $_POST['sort_order'];

		//
		$model_category = new CategoryModel;
		if($model_category->updateCat($data) ) {
			$this->jump('index.php?p=admin&c=Category&a=list');
		} else {
			$this->jump('index.php?p=admin&c=Category&a=edit&id='.$data['cat_id'], '原因:'.$model_category->error_info);
		}
	}
	}
?>