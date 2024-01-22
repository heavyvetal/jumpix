<?php

use app\Http\Request;
use app\Http\Session;
use app\Controllers\MovieController;
use app\Models\Movie;
use app\Models\PDOMediator;
use app\Http\Router;

return [
    Request::class => function ($container) {
        return new Request(DOMAIN_SYM, DOMAIN_ADDITION);
    },
    Session::class => function ($container) {
        return new Session();
    },
    MovieController::class => function ($container) {
        return new MovieController(
            $container->get(Request::class),
            $container->get(Session::class),
        );
    },
    Router::class => function ($container) {
        return new Router(require_once APPLICATION . 'config/routes.php');
    },
    PDOMediator::class => function ($container) {
        return new PDOMediator(DB_HOST, DB_NAME, DB_USER, DB_PASS);
    },
    Movie::class => function ($container) {
        return new Movie($container->get(PDOMediator::class));
    },
];