<?php

use app\Controllers\MovieController;

return $routes = [
    '/' => [
        'controller' => MovieController::class,
        'action' => 'index'
    ],
];