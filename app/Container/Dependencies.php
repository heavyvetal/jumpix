<?php

use app\Http\Request;
use app\Http\Session;
use app\Controllers\MovieController;
use app\Models\Movie;
use app\Models\PDOMediator;

return [
    Request::class => function ($container) {
        return new Request();
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
    PDOMediator::class => function ($container) {
        return new PDOMediator(DB_HOST, DB_NAME, DB_USER, DB_PASS);
    },
    Movie::class => function ($container) {
        return new Movie($container->get(PDOMediator::class));
    },
];