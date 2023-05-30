<?php

declare(strict_types=1);
/*
use Terricon\Forum\Infrastructure\YukorRouting\Router;
use Terricon\Forum\Infrastructure\ServiceContainer;
use Terricon\Forum\Application\Controller\UserReputationController;

require_once '../vendor/autoload.php';

$routes = require_once '../config/routes.php';
$services = require_once '../config/services.php';
$router = new Router($routes);
$route = $router->getRoute($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
$serviceContainer = new ServiceContainer($services);
$controller = $serviceContainer->getInstanceOf($route->getController());
$controller->{$route->getAction()}(...$route->getParameters());
*/

/**
 * тестирование репутации пользователя
*/
$ReputationScores = require_once '../config/reputation-scores.php';
$userRep = new UserReputationController(123);
$userRep->changeScore(123, 'getLike', $ReputationScores);