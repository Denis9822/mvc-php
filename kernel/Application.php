<?php

namespace Core;

class Application
{
    public Request $request;
    public Router $router;
    public Response $response;
    public View $view;
    public static Application $app;

    public function __construct()
    {
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();
    }

    public function run(): void
    {
        echo $this->router->dispatch();
    }

}