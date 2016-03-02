<?php

	class CategoryModel extends Model{

		protected $table_name = 'category'; 

		public function getList(){
			$sql = "select * from {$this->table()} where 1 order by sort_order";
			return $this->db->fetchAll($sql);
		}

		public function getTreeList($p_id = 0) {
			$list = $this->getList();

			return $this->getTree($list, $p_id, 0);
		}

		public function getTree($arr, $p_id=0, $deep = 0) {
			static $tree = array();

			foreach ($arr as $row) {
				if ($row['parent_id'] == $p_id) {
					$row['deep'] = $deep;
					$tree[] = $row;

					$this->getTree($arr, $row['cat_id'], $deep+1);
				}
			}

			return $tree;
		}

		/**
		 * 
		 *
		 * @param $cat_id int
		 * @param 
		 *
		 * @return bool
		 */

		public function delById($cat_id) {
			if (!$this->isLeaf($cat_id)) {
				$this->error_info = '分类不是末级分类';
				return false;
			}
			// $sql = "delete from {$this->table()} where cat_id = '$cat_id'";
			// return $this->db->query($sql);

			return $this->autoDelete($cat_id);
		}

		public function isLeaf($cat_id) {
			$sql = "select count(*) from {$this->table()} where parent_id = '$cat_id'";
			$child_count = $this->db->fetchColumn($sql);
			return $child_count == 0;
		}

		public function insertCat($data) {

			if ($data['cat_name'] == '') {
				$this->error_info = '分类名不能为空';
				return false;
			}

			$sql = "select count(*) from {$this->table()} where 
			parent_id = '{$data['parent_id']}' and cat_name= '{$data['cat_name']}'";
			$cat_count = $this->db->fetchColumn($sql);
			if ($cat_count > 0) {
				$this->error_info = '分类已存在， 请确定';
				return false;
			}

			// $sql = "insert into {$this->table()} values(null, '{$data['cat_name']}', 
			// 	'{$data['sort_order']}', '{$data['parent_id']}') ";
			// return $this->db->query($sql);

			return $this->autoInsert($data);
		}

		public function getById($cat_id) {

		// $sql = "select * from {$this->table()} where cat_id='$cat_id'";
		// return $this->db->fetchRow($sql);

			return $this->autoSelectRow($cat_id);
		}

		public function updateCat($data) {
		//判断$data['parent_id'] 不是自己，或者是后代的ID
		//利用getTreeList所有后代的分类
		$child_list = $this->getTreeList($data['cat_id']);
		$ids = array($data['cat_id']);//所有不行的ID，自己
		foreach($child_list as $row) {//后代的！
			$ids[] = $row['cat_id'];
		}
		//当前更新的父分类id不在ids内即可
		if(in_array($data['parent_id'], $ids)) {
			$this->error_info = '不能为自己或者后代分类的子分类';
			return false;
		}

		$sql = "update {$this->table()} set cat_name='{$data['cat_name']}', sort_order='{$data['sort_order']}', parent_id='{$data['parent_id']}' where cat_id='{$data['cat_id']}'";
		return $this->db->query($sql);
	}
	}
?>