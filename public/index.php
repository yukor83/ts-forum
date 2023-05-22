<?php

declare(strict_types=1);

use Terricon\Forum\Infrastructure\NklRouting\Router;

require_once '../vendor/autoload.php';

$routes = require_once '../config/routes.php';
$router = new Router($routes, $_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
$router->run();
