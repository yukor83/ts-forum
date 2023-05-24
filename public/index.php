<?php

declare(strict_types=1);

use Terricon\Forum\Infrastructure\YukorRouting\Router;

require_once '../vendor/autoload.php';

$routes = require_once '../config/routes.php';
$router = new Router($routes);
$router->run();
