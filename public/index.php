<?php

error_reporting(E_ALL);

require_once __DIR__ . '/../config/app.php';
require_once APPLICATION . '/vendor/autoload.php';

use \app\Container\Container;

$container = Container::instance(require_once APPLICATION . '/app/Container/Dependencies.php');

$request = $container->get(\app\Http\Request::class);
$router = $container->get(\app\Http\Router::class);

$actionData = $router->getActionData($request->getUri());

if (!empty($actionData)) {
    $controller = $container->get($actionData['controller']);
    $action = $actionData['action'];
    $controller->$action();
}
