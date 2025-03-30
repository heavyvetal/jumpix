<?php

use app\Controllers\MainPageController;
use app\Controllers\DemoController;
use app\Controllers\TemplateEngineDemoController;

return $routes = [
    '/' => [
        'controller' => MainPageController::class,
        'action' => 'index'
    ],
    '/usage' => [
        'controller' => DemoController::class,
        'action' => 'index'
    ],
    '/template_engine_example' => [
        'controller' => TemplateEngineDemoController::class,
        'action' => 'index'
    ],
];
