<?php
//paths
define('PATH_CORE', 'core/');
define('PATH_CONTROLLER', 'controllers/');
define('PATH_MODEL', 'models/');
define('PATH_HELPER', 'helpers/');
define('PATH_VIEW', 'views/');

define('ENVIRONMENT','dev');

$db = include __DIR__ . '/config/database.php';

//database
define('DB_HOST', $db[ENVIRONMENT]['host']);
define('DB_NAME', $db[ENVIRONMENT]['database']);
define('DB_USER', $db[ENVIRONMENT]['user']);
define('DB_PASS', $db[ENVIRONMENT]['pass']);

//Defaults
define('DEFAULT_CONTROLLER',"Usuario");
define('BASE_URL', 'http://'.$_SERVER['SERVER_NAME'].':8081/crudmvc/');