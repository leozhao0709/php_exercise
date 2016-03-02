<?php
	// require_once './framework/Model.class.php';

	class AdminModel extends Model{

		protected $table_name = 'admin';

		/**
		 * 利用登录信息验证
		 *	
		 * @param $admin_name
		 * @param $admin_pass
		 *	
		 * @return bool mixed 合法, false 非法
		 */

		public function checkByLogin($admin_name, $admin_pass){
			//
			$sql = "select * from {$this->table()} where admin_name = '$admin_name' and 
					admin_pass = md5('$admin_pass')";

			$row = $this->db->fetchRow($sql);

			return $row;

		}

		public function checkByCookie() {
			if (!isset($_COOKIE['admin_id']) || !isset($_COOKIE['admin_pass'])) {

				return false;
			}

			$sql = "select * from {$this->table()} where admin_id = '{$_COOKIE['admin_id']}' and 
			md5(concat('itcast', admin_pass, 'php')) = '{$_COOKIE['admin_pass']}'";

			return $this->db->fetchRow($sql);
		}

		
	}
?>