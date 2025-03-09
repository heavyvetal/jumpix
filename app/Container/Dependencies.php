<?php

use app\Http\Request;
use app\Http\Session;
use app\Controllers\MovieController;
use app\Http\Router;
use app\Models\Movie;
use app\Models\Director;
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
    Movie::class => function ($container) {
        return new Movie($container->get(PDOAdapter::class));
    },
    Director::class => function ($container) {
        return new Director($container->get(PDOAdapter::class));
    },
    MovieController::class => function ($container) {
        return new MovieController(
            $container->get(Request::class),
            $container->get(Session::class),
            $container->get(Movie::class),
            $container->get(Director::class),
        );
    },
    Router::class => function ($container) {
        return new Router(require_once APPLICATION . 'config/routes.php');
    },
];