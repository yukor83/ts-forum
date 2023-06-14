#!/usr/bin/php
<?php
declare(strict_types=1);
 
use Faker\Factory;
use Faker\Generator;
 
require_once '../../vendor/autoload.php';
 
$dbServer = 'localhost';
$dbUser = 'root';
$dbPass = '12345';
 
try {
    $dbForum = new PDO("mysql:host=".$dbServer, $dbUser, $dbPass);
    $dbForum->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
    $sql = file_get_contents('../sql/create_datebase_forums.sql');
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
    
    
    }
catch (PDOException $e)
    {
        echo $sql ."<br>". $e->getMessage();
    }
 
$dbForum = null;