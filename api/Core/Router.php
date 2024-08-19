<?php

namespace Api\Core;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller, $action)
    {
        $this->routes[strtolower($method)][$uri] = [$controller, $action];
    }

    public function dispatch(Request $request)
    {
        $method = strtolower($request->getMethod());
        $uri = $request->getUri();

        if (isset($this->routes[$method][$uri])) {
            [$controller, $action] = $this->routes[$method][$uri];
            (new $controller)->$action($request);
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "404 Not Found";
        }
    }
}
