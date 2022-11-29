<?php

namespace App\Core;

class Route
{
    public function __construct(
        public string $path,
        public        $callable,
        public string $method = 'GET'
    )
    {

    }

    public function check(string $path, string $method): bool
    {
        return $path === $this->path && $method === $this->method;
    }

    public function prepareCallback(): array|callable
    {
        if (is_callable($this->callable)) {
            return $this->callable;
        }

        list($controller, $action) = explode('@', $this->callable);

        if (!class_exists($controller)) {
            throw new \Exception("Controller not found <i>{$controller}</i>", 404);
        }

        if (!method_exists($controller, $action)) {
            throw new \Exception("Action not found <i>{$controller}@{$action}</i>", 404);
        }

        return [new $controller(), $action];
    }

}