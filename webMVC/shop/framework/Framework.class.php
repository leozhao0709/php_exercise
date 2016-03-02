<?php
	class Framework{

		public static function run(){
			self::initRequest();
			self::initPath();
			self::loadConfig();

			self::initErrorHandler();

			spl_autoload_register(array('framework', 'itcast_autoload'));
			self::dispatch();
		}

		private static function initErrorHandler() {
			if ($GLOBALS['config']['app']['run_mode'] == 'dev') {
				ini_set('error_reporting', E_ALL|E_STRICT);
				ini_set('display_errors', 1);
				ini_set('log_errors', 0);
			} elseif ($GLOBALS['config']['app']['run_mode'] == 'pro') {
				ini_set('display_errors', 0);
				ini_set('error_log', APP_DIR.'error.log');
				ini_set('log_errors', 1);
			}
		}

		private static function initRequest(){
			define('PLATFORM', isset($_GET['p'])?$_GET['p']:'admin');
			define('CONTROLLER', isset($_GET['c'])?$_GET['c']:'Admin');
			define('ACTION', isset($_GET['a'])?$_GET['a']:'login');
		}

		private static function initPath(){
			define('DS', DIRECTORY_SEPARATOR);
			define("ROOT_DIR", dirname(dirname(__FILE__)).DS);
			define("APP_DIR", ROOT_DIR.'app'.DS);
			define("CONT_DIR", APP_DIR.'controller'.DS);
			define('CURR_CONT_DIR', CONT_DIR.PLATFORM.DS);
			define('VIEW_DIR', APP_DIR.'view'.DS);
			define('CURR_VIEW_DIR', VIEW_DIR.PLATFORM.DS);
			define('MODEL_DIR', APP_DIR.'model'.DS);
			define('FRAME_DIR', ROOT_DIR.'framework'.DS);
			define('CONFIG_DIR', APP_DIR.'config'.DS);
			define('TOOL_DIR', FRAME_DIR.'tool'.DS);
			define('UPLOAD_DIR', APP_DIR.'upload'.DS);
		}

		public static function itcast_autoload($className){
			$map = array(
			'MySQLDB' => FRAME_DIR.'MySQLDB.class.php',
			'Model' => FRAME_DIR.'Model.class.php',
			'Controller' => FRAME_DIR.'Controller.class.php'
			);
			if (isset($map[$className])) {
				require $map[$className];
			} elseif (substr($className, -10) == 'Controller') {
				require CURR_CONT_DIR.$className.'.class.php';
			} elseif (substr($className, -5) == "Model") {
				require MODEL_DIR.$className.'.class.php';
			} elseif (substr($className, -4) == 'Tool') {
				require TOOL_DIR.$className.'.class.php';
			}
		}

		private static function dispatch(){
			$controller_name = CONTROLLER.'Controller';
			$controller = new $controller_name;
			$action_name = ACTION.'Action';
			$controller ->$action_name();
		}

		private static function loadConfig(){
			$GLOBALS['config'] = require CONFIG_DIR.'app.config.php';
		}
	}
?>