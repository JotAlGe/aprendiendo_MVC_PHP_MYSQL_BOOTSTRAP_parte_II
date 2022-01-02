<?php
/* echo $controller . ' ' . $action; */
include_once 'controllers/' . $controller . '_controller.php';
$objController = ucfirst($controller) . 'Controller';

$controller = new $objController;
$controller->$action();
