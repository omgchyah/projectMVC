<?php

error_reporting(E_ALL|E_STRICT); //enables reporting for all errors and strict standards.
ini_set('display_errors', 1); //ensures that errors are displayed on the screen.
date_default_timezone_set('CET'); //sets the default time zone to Central European Time.

// defines the web root
define('WEB_ROOT', substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], '/index.php')));
// defines the path to the files
define('ROOT_PATH', realpath(dirname(__FILE__) . '/../'));
// defines the cms path
define('CMS_PATH', ROOT_PATH . '/lib/base/');

// starts the session or resumes the session
session_start();

// includes the system routes. Routes defined by Ross
include(ROOT_PATH . '/config/routes.php');

/**
 * Standard framework autoloader
 * @param string $className
 */
function autoloader($className) {
	//If the class name ends with "Controller", it attempts to load it from the app/controllers directory.
	if (strlen($className) > 10 && substr($className, -10) == 'Controller') {
		if (file_exists(ROOT_PATH . '/app/controllers/' . $className . '.php') == 1) {
			require_once ROOT_PATH . '/app/controllers/' . $className . '.php';
		}
	}
	//Otherwise, it tries to load from lib/base, lib, or app/models directories based on where the file exists.
	else {
		if (file_exists(CMS_PATH . $className . '.php')) {
			require_once CMS_PATH . $className . '.php';
		}
		else if (file_exists(ROOT_PATH . '/lib/' . $className . '.php')) {
			require_once ROOT_PATH . '/lib/' . $className . '.php';
		}
		else {
			require_once ROOT_PATH . '/app/models/'.$className.'.php';
		}
	}
}

// activates the autoloader
spl_autoload_register('autoloader');

$router = new Router();
$router->execute($routes);
