<?php

use Core\Application;
use Core\Request;
use Core\Response;
use Core\View;

function app(): Application
{
    return Application::$app;
}

function request(): Request
{
    return app()->request;
}

function view($view = '', $data = [], $layout = 'default'): string|View
{
    if ($view) {
        return app()->view->render($view, $data, $layout);
    }
    return app()->view;
}

function response(): Response
{
    return app()->response;
}

function abort($error = '', $code = 404)
{
    response()->setResponseCode($code);

    echo view("errors/{$code}", ['data' => $error], false);
    die;
}