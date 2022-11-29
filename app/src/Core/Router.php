<?php

namespace App\Core;

class Router
{
    private string $uri;
    private string $method;
    private array $routes;

    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function get(string $path, callable|string|array $action): void
    {
        $this->routes[] = new Route($path, $action);
    }

    public function post(string $path, callable|string|array $action): void
    {
        $this->routes[] = new Route($path, $action, 'POST');
    }

    public function run(): void
    {
        foreach ($this->routes as $route) {
            if ($route->check($this->uri, $this->method)) {
                $this->dispatch($route);
                return;
            }
        }

        throw new \Exception('Page not found', 404);

    }

    private function dispatch(Route $route): void
    {
        $callback = $route->prepareCallback();

        if(is_callable($callback)){
            $callback();
        }
//
//        dump($callback);

    }

}