<?php
define ('DEBUG', true);

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');

define ('PROJECT_PATH', 'http://' . $_SERVER['SERVER_NAME'] . 
        str_replace(['index.php', 'public/'], '', $_SERVER['SCRIPT_NAME']) . 'public/');

define ('MAIN_PATH', PROJECT_PATH . 'tree');

ini_set('date.timezone', 'Europe/Riga');

define('DS', DIRECTORY_SEPARATOR);

define('BASE_DIR', __DIR__ . DS . '..' . DS);

define ('CORE_PATH', 'core');
define ('MODEL_PATH', 'model');
define ('VIEW_PATH', 'views');


// -- default application classes
$GLOBALS['CORE_CLASSES'] = [
                           'request' => 'Core\Request',
                           'db' => 'Core\Db',
                           'session' => 'Core\Session',
                           ];

// -- db configuration
define ('DB_HOST',  'mysql:host=localhost;port=3306;dbname=test_tree');
define ('DB_LOGIN', 'root');
define ('DB_PSW',   '');
define ('DB_NAME',  'test_tree');

define ('USERS_TBL', 'users');
define ('TREE_TBL', 'tree');
