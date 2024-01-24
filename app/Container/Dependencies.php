<?php

use app\Http\Request;
use app\Http\Session;
use app\Controllers\MovieController;
use app\Http\Router;
use app\Models\Movie;
use app\Models\Director;
use app\Models\PDOTableMediator;
use app\Models\PDOProxy;

return [
    Request::class => function ($container) {
        return new Request(DOMAIN_SYM, DOMAIN_ADDITION);
    },
    Session::class => function ($container) {
        return new Session();
    },
    PDOProxy::class => function ($container) {
        $proxy = new PDOProxy();

        return $proxy::getInstance('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=UTF8', DB_USER, DB_PASS);
    },
    PDOTableMediator::class => function ($container) {
        return new PDOTableMediator($container->get(PDOProxy::class));
    },
    Movie::class => function ($container) {
        return new Movie($container->get(PDOTableMediator::class));
    },
    Director::class => function ($container) {
        return new Director($container->get(PDOTableMediator::class));
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