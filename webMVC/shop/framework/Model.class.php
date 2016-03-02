<?php

	class Model {
		protected $db;
		protected $prefix;

		protected $fields;

		public function __construct(){
			$this->prefix = $GLOBALS['config']['database']['prefix'];
			$this->initLink();

			$this->getFields();
		}

		public function getFields() {
			$sql = "desc {$this->table()}";
			$fields_rows = $this->db->fetchAll($sql);

			foreach ($fields_rows as $row) {
				$this->fields[] = $row['Field'];
				if ($row['Key'] == 'PRI') {
					$this->fields['pk'] = $row['Field'];
				}
			}
		}

		public function autoDelete($pk_value) {
			$sql = "delete from {$this->table()} where {$this->fields['pk']} = '{$pk_value}'";
			return $this->db->query($sql);
		}

		public function autoSelectRow($pk_value) {
			$sql = "select * from {$this->table()} where {$this->fields['pk']} = '{$pk_value}'";
			return $this->db->fetchRow($sql);
		}

		public function autoInsert($data) {
			$sql = "insert into {$this->table()} ";

			$fields = array_keys($data);
			$fields_str = implode(", ", $fields);
			$sql .= '('.$fields_str.')';

			$values = array_map(function ($v) {return "'".$v."'";}, $data);
			$values_str = implode(', ', $values);
			$sql .= ' values('. $values_str.')';

			return $this->db->query($sql);
		}

		protected function initLink(){
			// require './framework/MySQLDB.class.php';
			// $options = array(
			// 	'host' => '127.0.0.1',
			// 	'port' => '3306',
			// 	'user' => 'root',
			// 	'pass' => 'php@2mon',
			// 	'charset' => 'utf8',
			// 	'dbname' => 'itcast_shop'
				// );
			// $this->db = MySQLDB::getInstance($options);
			$this->db = MySQLDB::getInstance($GLOBALS['config']['database']);
		}

		protected function table() {
			return $this->prefix.$this->table_name;
		}
	}
?>