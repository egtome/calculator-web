<?php
require_once('env.php');
require_once(CORE_PATH . 'autoload.php');


// Errors
if (DEBUG) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
}

// Sessions
session_start();

$target = !empty($_GET['target']) ? RouteService::validateTarget($_GET['target']) : [];
$routeControllerFactroy = new RouteControllerFactory($target);
$routeControllerFactroy->route();