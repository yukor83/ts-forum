<?php

declare(strict_types=1);

use Terricon\Forum\Infrastructure\YukorRouting\Router;
use Terricon\Forum\Infrastructure\ServiceContainer;

use Faker\Factory;
use Faker\Generator;

require_once '../vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('error_reporting', E_ALL);

/*
$dbServer = 'localhost';
$dbUser = 'root';
$dbPass = '12345';

    try {
        $dbForum = new PDO("mysql:host=localhost;dbname=forum", $dbUser, $dbPass);
        $dbForum->exec('DROP DATABASE forum;');
        $sql = file_get_contents('../sql/create_database_forum.sql');
        $dbForum->exec($sql);
        echo "База данных удалена и создана заново!</br>";
    } catch (PDOException $e) {
        $dbForum = new PDO("mysql:host=localhost", $dbUser, $dbPass);
        $sql = file_get_contents('../sql/create_database_forum.sql');
        $dbForum->exec($sql);
        echo "Создана новая базаданных forum!</br>";

    }

    $sql = file_get_contents('../sql/create_table_users.sql');
    $dbForum->exec($sql);
    echo "Таблица Users создана!</br>";
    $dbh = null;

    $sql = file_get_contents('../sql/create_table_forums.sql');
    $dbForum->exec($sql);
    echo "Таблица Forums создана!</br>";
 
    $sql = file_get_contents('../sql/create_table_topics.sql');
    $dbForum->exec($sql);
    echo "Таблица Topics создана!</br>";

    $sql = file_get_contents('../sql/create_table_messages.sql');
    $dbForum->exec($sql);
    echo "Таблица Messages создана!</br>";
  
    $dbForum = null;
*/
    $faker = Factory::create('ru_RU');
    $i = $faker->realText($maxNbChars = 200, $indexSize = 2);
    dump($i);

$routes = require_once '../config/routes.php';
$services = require_once '../config/services.php';
$router = new Router($routes);
$route = $router->getRoute($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
$serviceContainer = new ServiceContainer($services);
$controller = $serviceContainer->getInstanceOf($route->getController());
$controller->{$route->getAction()}(...$route->getParameters());

