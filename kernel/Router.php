<?php

namespace Core;

class Router
{

    protected array $routes = [];
    protected array $route_params = [];

    public function __construct(
        protected Request $request,
        protected Response $response)
    {
    }

    public function add($path, $handler, string $method = 'GET'): void
    {
        $path = ltrim($path, '/');
        $method = strtoupper($method);

        $this->routes[$path] = [
            'path' => $path,
            'method' => $method,
            'handler' => $handler
        ];
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function dispatch(): mixed
    {
        $path = $this->request->getPath();
        $route = $this->matchRoute($path);

        if ($route === false) {
            $this->response->setResponseCode(404);
            abort(404);
            die;
        }

        $route['handler'][0] = new $route['handler'][0];

        return call_user_func($route['handler']);
    }

    protected function matchRoute($path): mixed
    {
        $route = $this->routes[$path] ?? null;
        if (isset($route) && $route['method'] === $this->request->getMethod()) {
           return $route;
        } else {
            return false;
        }
    }
}