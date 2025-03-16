<?php

use app\Http\Request;
use app\Http\Session;
use app\Controllers\MainPageController;
use app\Controllers\DemoController;
use app\Http\Router;
use app\Models\MySQLAdapter;
use app\Models\PDOAdapter;
use app\Models\PDOConnection;

return [
    Request::class => function ($container) {
        return new Request(DOMAIN_SYM, DOMAIN_ADDITION);
    },
    Session::class => function ($container) {
        return new Session();
    },
    PDOConnection::class => function ($container) {
        $proxy = new PDOConnection();

        return $proxy::getInstance('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=UTF8', DB_USER, DB_PASS);
    },
    PDOAdapter::class => function ($container) {
        return new PDOAdapter($container->get(PDOConnection::class));
    },
    MySQLAdapter::class => function ($container) {
        return new MySQLAdapter(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    },
    MainPageController::class => function ($container) {
        return new MainPageController(
            $container->get(Request::class),
            $container->get(Session::class),
        );
    },
    DemoController::class => function ($container) {
        return new DemoController(
            $container->get(Request::class),
            $container->get(Session::class),
        );
    },
    Router::class => function ($container) {
        return new Router(require_once APPLICATION . 'config/routes.php');
    },
];