<?php

	// $p = isset($_GET['p'])?$_GET['p']:'front';

	// define('PLATFORM', $p);

	// define('DS', DIRECTORY_SEPARATOR);
	// define("ROOT_DIR", dirname(__FILE__).DS);
	// define("APP_DIR", ROOT_DIR.'app'.DS);
	// define("CONT_DIR", APP_DIR.'controller'.DS);
	// define('CURR_CONT_DIR', CONT_DIR.PLATFORM.DS);
	// define('VIEW_DIR', APP_DIR.'view'.DS);
	// define('CURR_VIEW_DIR', VIEW_DIR.PLATFORM.DS);
	// define('MODEL_DIR', APP_DIR.'model'.DS);
	// define('FRAME_DIR', ROOT_DIR.'framework'.DS);

	// $c = isset($_GET['c'])?$_GET['c']:'Class';
	// $controller_name = $c.'Controller';

	// // require './app/controller/'.$p.'/'.$controller_name.'.class.php';

	// $controller = new $controller_name;

	// $a = isset($_GET['a'])?$_GET['a']:'list';
	// $action_name = $a.'Action';
	// $controller->$action_name();

	// /**
	//  * auto load
	//  *	
	//  * @param $class_name string 
	//  * @param 
	//  *
	//  * @return 
	//  */
	// function __autoload($className) {
	// 	$map = array(
	// 		'MySQLDB' => FRAME_DIR.'MySQLDB.class.php',
	// 		'Model' => FRAME_DIR.'Model.class.php',
	// 		'Controller' => FRAME_DIR.'Controller.class.php'
	// 		);
	// 	if (isset($map[$className])) {
	// 		require $map[$className];
	// 	} elseif (substr($className, -10) == 'Controller') {
	// 		require CURR_CONT_DIR.$className.'.class.php';
	// 	} elseif (substr($className, -5) == "Model") {
	// 		require MODEL_DIR.$className.'.class.php';
	// 	}
	// }

	require './framework/Framework.class.php';
	Framework::run();
?>