<?php

namespace Core;

class Application
{
    public Request $request;
    public static Application $app;

    public function __construct()
    {
        self::$app = $this;
        $this->request = new Request();
    }

}