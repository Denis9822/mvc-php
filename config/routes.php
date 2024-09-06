<?php

/** @var \Core\Application $app */

use App\Controllers\HomeController;

$app->router->add('/test', [HomeController::class, 'index'],'get');
