<?php
	
	class GoodsModel extends Model {
		protected $table_name = 'goods';

		public function insertGoods($data) {

			return $this->autoInsert($data);
		}

		public function getList() {
			$sql = "select * from {$this->table()} where 1";
			return $this->db->fetchAll($sql);
		}

		public function getPageList($page, $pagesize) {
			$offset = ($page - 1) * $pagesize;
			$where_str = " where 1 ";
			$sql = "select * from {$this->table()}  $where_str limit $offset, $pagesize";
			$data['list'] = $this->db->fetchAll($sql);

			$sql = "select count(*) from {$this->table()} $where_str";
			$data['total'] = $this->db->fetchColumn($sql);

			return $data;
		}
	}
?>