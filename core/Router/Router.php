<?php

namespace Core\Router;

use App\Controllers\ErrorController;

class Router
{
    private array $routes = [];

    public function get(string $uri, array $callable): void
    {
        $this->addRoute('GET', $uri, $callable);
    }

    public function addRoute(string $method, string $uri, array $callable): void
    {
        $this->routes[] = [
            'method'   => $method,
            'uri'      => $uri,
            'callable' => $callable,
        ];
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
        $method = $_SERVER['REQUEST_METHOD'];
        $uri    = strtolower($_SERVER['REQUEST_URI']);
        $uri    = strtok($uri, '?');
        $uri    = strlen($uri) > 1 ? rtrim($uri, '/') : $uri;

        foreach ($this->routes as $route) {
            $routePattern = preg_replace('/\/{([a-zA-Z0-9_]+)}/', '/([^\/]+)', $route['uri']);
            $routePattern = '#^' . $routePattern . '$#';

            if ($method === $route['method'] && preg_match($routePattern, $uri, $matches)) {
                array_shift($matches); // Remove the full match, leaving only parameter values

                $callable = $route['callable'];

                if (is_array($callable) && count($callable) === 2) {
                    include '../src/' . str_replace(['App\\', '\\'], ['', '/'], $callable[0]) . '.php';
                    $controllerName = $callable[0];
                    $methodName     = $callable[1];

                    if (class_exists($controllerName)) {
                        $controller = new $controllerName();

                        if (method_exists($controller, $methodName)) {
                            call_user_func_array([$controller, $methodName], $matches);
                        } else {
                            http_response_code(500);
                            echo 'L\'action n\'existe pas dans le controller';
                        }
                    } else {
                        http_response_code(500);
                        echo 'L\'action n\'existe pas dans le controller';
                    }
                } else {
                    http_response_code(500);
                    echo 'Error Internal server';
                }

                return;
            }
        }

        include '../src/Controllers/ErrorController.php';
        $errorController = new ErrorController();
        $errorController->page404();
    }
}
