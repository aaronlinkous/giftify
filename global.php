<?php

ini_set('memory_limit', '256M');
ini_set("display_errors", "1");
error_reporting(E_ERROR | E_WARNING | E_PARSE);
define('_SITE_ROOT', realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR);
define('_SITE_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/');
define('_CONFIG_FILE', _SITE_ROOT . '.htconfig');
define('_CLASSES', _SITE_ROOT . 'classes/');
define('_MODELS', _SITE_ROOT . 'models/');
define('_LIBS', _SITE_ROOT . 'libs/');
define('_LOGS', _SITE_ROOT . 'logs/');
define('_TEMPLATE_DIR', _SITE_ROOT . 'templates/');

function autoload_classes($class_name)
{
    $file = strtolower(_CLASSES . $class_name . '.php');
    if(file_exists($file)){
        require_once($file);
    }
}

function autoload_models($class_name)
{
    $file = strtolower(_MODELS . $class_name . '.php');
    if(file_exists($file)){
        require_once($file);
    }
}

function autoload_libs($class_name)
{
    $file = strtolower(_LIBS . $class_name . '.php');
    if(file_exists($file)){
        require_once($file);
    }
}

spl_autoload_register('autoload_classes');
spl_autoload_register('autoload_models');
spl_autoload_register('autoload_libs');
?>