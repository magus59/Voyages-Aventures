<?php
session_start();

require_once 'config/database.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'article';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerName = ucfirst($controller) . 'Controller';
require_once "controllers/$controllerName.php";

$controllerInstance = new $controllerName();
$controllerInstance->$action();
?>
