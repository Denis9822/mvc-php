<?php

namespace Core;

class Request
{
    public string $uri;

    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
    }

    public function getMethod(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD']);
    }

    public function isGet(): bool
    {
        return $this->getMethod() == 'GET';
    }

    public function isPost(): bool
    {
        return $this->getMethod() == 'POST';
    }

    public function get($name, $default = null): ?string
    {
        return $_GET[$name] ?? $default;
    }

    public function post($name, $default = null): ?string
    {
        return $_POST[$name] ?? $default;
    }

    public function getPath(): string
    {
        return $this->removeQueryString();
    }

    protected function removeQueryString(): string
    {
        if($this->uri) {
            $params = explode('?', $this->uri);
            return trim($params[0], '/');
        }
        return "";
    }
}