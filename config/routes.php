<?php

use app\Controllers\MainPageController;
use app\Controllers\DemoController;

return $routes = [
    '/' => [
        'controller' => MainPageController::class,
        'action' => 'index'
    ],

    '/usage' => [
        'controller' => DemoController::class,
        'action' => 'index'
    ],
];
