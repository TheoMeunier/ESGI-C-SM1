<?php

namespace App\Core;

use App\Controllers\Error;

class Router
{
    private array $routes = [];

    public function addRoute(string $method, string $uri, array $callable): void
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'callable' => $callable
        ];
    }

    public function get(string $uri, array $callable): void
    {
        $this->addRoute('GET', $uri, $callable);
    }

    public function post(string $uri, array $callable): void
    {
        $this->addRoute('POST', $uri, $callable);
    }

    public function delete(string $uri, array $callable): void
    {
        $this->addRoute('DELETE', $uri, $callable);
    }

    public function run(): void
    {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['uri'] === $uri) {
                $callable =  $route['callable'];

                if (is_array($callable) && count($callable) === 2) {
                    include '../src/' . str_replace(array("App\\", "\\"), array("", "/"), $callable[0]) . '.php';

                    $controllerName = $callable[0];
                    $methodName = $callable[1];

                    $controller = new $controllerName();
                    $controller->$methodName();
                } else {
                    http_response_code(500);
                    echo 'Error Internal server';
                }

                return;
            }
        }

        // If error return error 404
        $errorController = new Error();
        $errorController->page404();
    }
}