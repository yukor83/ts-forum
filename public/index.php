<?php

declare(strict_types=1);

use Terricon\Forum\Infrastructure\NklRouting\Router;

require_once '../vendor/autoload.php';

$routes = require_once '../config/routes.php';
$router = new Router($routes);
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$router->getRoute($uri, $method);
dump($router->getRoute($uri, $method));
