<?php
	/**
	 * mysql数据操作类
	 */

	class MySQLDB {
		//attribution
		//obj initial attribution
		private $host;
		private $port;
		private $user;
		private $pass;
		private $charset;
		private $dbname;

		//running attribution
		private $link;
		private $last_sql;

		private static $instance;

		private function __construct($params = array()){

			$this->host = isset($params['host'])? $params['host']:'127.0.0.1';
			$this->port = isset($params['port'])? $params['port']:'3306';
			$this->user = isset($params['user'])? $params['user']:'root';
			$this->pass = isset($params['pass'])? $params['pass']:'php@2mon';
			$this->charset = isset($params['charset'])?$params['charset']: 'utf8';
			$this->dbname = isset($params['dbname'])? $params['dbname']: '';

			//connect
			$this->connect();
			//set character collection
			$this->setCharset();
			//set default DB
			// $this->selectDB();
		}

		private function __clone(){			
		}

		public static function getInstance($params){
			if (!(self::$instance instanceof self)) {
				self::$instance = new self($params);
			}
			return self::$instance;
		}

		private function connect() {
			//mysql_connect("$this->host:$this->port", $this->user, $this->pass)
			if (!$link = new mysqli("$this->host:$this->port", $this->user, $this->pass, $this->dbname)) {
				echo 'connect fail';
				die;
			} else {
				$this->link = $link;
			}
		}

		private function setCharset() {
			$sql = "set names $this->charset";
			return $this->query($sql);
		}

		private function selectDB() {
			if ($this->dbname === '') {
				return;
			}

			$sql = "use $this->dbname";
			return $this->query($sql);
		}

		public function query($sql) {
			$this->last_sql = $sql;

			//$result = mysql_query($sql, $this->link)
			if (!$result = $this->link->query($sql)) {
				echo 'SQL fail<br>';
				echo 'failed SQL: '. $sql. '<br>';
				echo 'error number: '. mysqli_errno($this->link).'<br>';
				echo 'error information: '.mysqli_error($this->link).'<br>';
				die;
				return false;
			} else {
				return $result;
			}
		}

		public function fetchAll($sql) {
			if ($result = $this->query($sql)) {
				$rows = array();
				// $row = mysql_fetch_assoc($result)
				while ($row = $result->fetch_assoc()) {
					$rows[] = $row;
				}

				// mysql_free_result($result);
				$result->free_result();
				return $rows;
			} else{
				return false;
			}
		}

		public function fetchRow($sql) {
			if ($result = $this->query($sql)) {
				// $row = mysql_fetch_assoc($result);
				$row = $result->fetch_assoc();
				// mysql_free_result($result);
				$result->free_result();
				return $row;
			} else {
				return false;
			}
		}

		public function fetchColumn($sql) {
			if ($result = $this->query($sql)) {
				//$row = mysql_fetch_row($result)
				if ($row = $result->fetch_row()) {
					// mysql_free_result($result);
					$result->free_result();
					return $row[0];
				} else{
					return false;
				} 
			} else {
				return false;
			}
		}

		public function __sleep() {
			return array('host', 'port', 'user', 'pass', 'charset', 'dbname');
		}

		public function __wakeup() {
			$this->connect();
			$this->setCharset();
			$this->selectDB();
		}


	}
?>