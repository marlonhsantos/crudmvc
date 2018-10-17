<?php
require_once 'config.php';
require_once 'core/Autoload.php';

session_start();

//Sanitizando dados de entrada
$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

$controller = (isset($_GET["controller"]))?$_GET["controller"]:DEFAULT_CONTROLLER;
$action = (isset($_GET["action"]))?$_GET["action"]:'index';
$c = new $controller();
$c->$action();