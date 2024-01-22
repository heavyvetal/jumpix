<?php

namespace app\Http;

class Router
{
    private $routes;

    public function __construct($routes = [])
    {
        $this->routes = $routes;
    }

    public function getActionData($uri)
    {
        $actionData  = [];

        foreach ($this->routes as $route => $routeData) {
            if ($route == $uri) {
                $actionData = $routeData;
            }
        }

        return $actionData;
    }
}
