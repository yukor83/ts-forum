<?php

declare(strict_types=1);

use Terricon\Forum\Infrastructure\YukorRouting\Router;
use Terricon\Forum\Infrastructure\ServiceContainer;

use Faker\Factory;
use Faker\Generator;

require_once '../vendor/autoload.php';


$dbServer = 'localhost';
$dbUser = 'root';
$dbPass = '12345';

$dbForum = new PDO("mysql:host=".$dbServer, $dbUser, $dbPass);
$dbForum->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    $sql = file_get_contents('../sql/create_database_forum.sql');
    $dbForum->exec($sql);
    echo "База данных создана!";

    $sql = file_get_contents('../sql/create_table_forums.sql');
    $dbForum->exec($sql);
    echo "Таблица Forums создана!";
 
    $sql = file_get_contents('../sql/create_table_messages.sql');
    $dbForum->exec($sql);
    echo "Таблица Messages создана!";
 
    $sql = file_get_contents('../sql/create_table_topics.sql');
    $dbForum->exec($sql);
    echo "Таблица Topics создана!";
 
    $sql = file_get_contents('../sql/create_table_users.sql');
    $dbForum->exec($sql);
    echo "Таблица Users создана!";
    
    $this->faker = Factory::create();

 $dbForum = null;

$routes = require_once '../config/routes.php';
$services = require_once '../config/services.php';
$router = new Router($routes);
$route = $router->getRoute($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
$serviceContainer = new ServiceContainer($services);
$controller = $serviceContainer->getInstanceOf($route->getController());
$controller->{$route->getAction()}(...$route->getParameters());

