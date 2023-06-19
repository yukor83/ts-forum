#!/usr/bin/php
<?php
declare(strict_types=1);
 
use Faker\Factory;
use Faker\Generator;
 
require_once __DIR__.'/../vendor/autoload.php';

$faker = Factory::create('ru_RU');

$dbServer = 'localhost';
$dbUser = 'root';
$dbPass = '12345';

    try {
        $dbForum = new PDO("mysql:host=localhost;dbname=forum", $dbUser, $dbPass);
        $dbForum->exec('DROP DATABASE forum;');
        $sql = file_get_contents(__DIR__.'/../sql/create_database_forum.sql');
        $dbForum->exec($sql);
        echo "База данных удалена и создана заново!\n";
    } catch (PDOException $e) {
        $dbForum = new PDO("mysql:host=localhost", $dbUser, $dbPass);
        $sql = file_get_contents(__DIR__.'/../sql/create_database_forum.sql');
        $dbForum->exec($sql);
        echo "Создана новая базаданных forum!\n";
    }

    $sql = file_get_contents(__DIR__.'/../sql/create_table_users.sql');
    $dbForum->exec($sql);
    for ($i = 1; $i < 11; $i++)
    {
        $username = $faker->name();
        $sql = "INSERT users(username, created_at) VALUES ('$username', DEFAULT)";
        $dbForum->exec($sql);
    }
    echo "Таблица Users создана и заполнена! \n";


    $sql = file_get_contents(__DIR__.'/../sql/create_table_forums.sql');
    $dbForum->exec($sql);
    for ($i = 1; $i < 11; $i++)
    {
        $name = $faker->realText($maxNbChars = 20, $indexSize = 1);
        $description = $faker->realText($maxNbChars = 100, $indexSize = 1);
        $sql = "INSERT forums(name, description, created_at) VALUES ('$name', '$description', DEFAULT)";
        $dbForum->exec($sql);
    }
    echo "Таблица Forums создана и заполнена! \n";
 
    $sql = file_get_contents(__DIR__.'/../sql/create_table_topics.sql');
    $dbForum->exec($sql);
    for ($i = 1; $i < 11; $i++)
    {
        for ($q = 1; $q < 4; $q++)
        {
            $forum_id = $i;
            $user_id = rand(1, 10);
            $title = $faker->realText($maxNbChars = 20, $indexSize = 1);
            $description = $faker->realText($maxNbChars = 100, $indexSize = 1);
            $sql = "INSERT topics(forum_id, user_id, title, description, created_at) VALUES ('$forum_id', '$user_id', '$title', '$description', DEFAULT);";
            $dbForum->exec($sql);
        }
    }
    echo "Таблица Topics создана и заполнена! \n";

    $sql = file_get_contents(__DIR__.'/../sql/create_table_messages.sql');
    $dbForum->exec($sql);
    for ($i = 1; $i < 31; $i++)
    {
        for ($q = 1; $q < 4; $q++)
        {
            $topic_id = $i;
            $user_id = rand(1, 10);
            $message = $faker->realText($maxNbChars = 100, $indexSize = 1);
            $sql = "INSERT messages(topic_id, user_id, message, created_at) VALUES ('$topic_id', '$user_id', '$message', DEFAULT);";
            $dbForum->exec($sql);
        }
    }
    echo "Таблица Messages создана и заполнена! \n";

    $dbForum = null;