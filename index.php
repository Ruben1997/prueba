<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
try {
    require_once ROOT . 'core/Config.php';
    require_once ROOT . 'core/Request.php';
    require_once ROOT . 'core/Bootstrap.php';
    require_once ROOT . 'core/Controller.php';
    require_once ROOT . 'core/View.php';
    require_once ROOT . 'core/Registry.php';
    $registry = Registry::getInstancia();
    Bootstrap::run($registry->_request);
} catch (Exception $e) {
    echo $e->getMessage();
}
