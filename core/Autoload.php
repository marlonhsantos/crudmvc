<?php
/**
 * Função para autoload das classes do Core
 *
 * @param string $class_name
 * @return void
 */
function loadCore($class_name)
{
    $class_file = PATH_CORE . $class_name .".php";
    if (is_file($class_file)) {
        require_once $class_file;
    }
}

/**
 * Função para autoload das classes de Controllers
 *
 * @param string $class_name
 * @return void
 */
function loadController($class_name)
{
    $class_file = PATH_CONTROLLER . $class_name .".php";
    if (is_file($class_file)) {
        require_once $class_file;
    }
}

/**
 * Função para autoload das classes de Models
 *
 * @param string $class_name
 * @return void
 */
function loadModel($class_name)
{
    $class_file = PATH_MODEL . $class_name .".php";
    if (is_file($class_file)) {
        require_once $class_file;
    }
}

/**
 * Função para autoload das classes de Helpers
 *
 * @param string $class_name
 * @return void
 */
function loadHelper($class_name)
{
    $class_file = PATH_HELPER . $class_name .".php";
    if (is_file($class_file)) {
        require_once $class_file;
    }
}

spl_autoload_register('loadCore');
spl_autoload_register('loadController');
spl_autoload_register('loadModel');
spl_autoload_register('loadHelper');