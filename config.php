<?php
//paths
define('PATH_CORE', 'src/core/');
define('PATH_CONTROLLER', 'src/controllers/');
define('PATH_MODEL', 'src/models/');
define('PATH_HELPER', 'src/helpers/');
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
define('BASE_URL', 'http://localhost/crudmvc/');