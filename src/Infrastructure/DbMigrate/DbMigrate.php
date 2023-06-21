<?php

declare(strict_types=1);

namespace Terricon\Forum\Infrastructure\dbMigrate;

dump(__DIR__);

require_once '../../../../vendor/autoload.php';

class DbMigrate
{
    public function __construct(
        private string $dbServer,
        private string $dbName,
        private string $dbUser,
        private string $dbPass,
    ) {
        try {
            $dbForum = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPass);
            $sql = "DROP DATABASE $dbName;";
            $dbForum->exec($sql);
            $sql = file_get_contents(__DIR__.'/../sql/create_database_forum.sql');
            $dbForum->exec($sql);
            $dbforum = null;
            return "База данных удалена и создана заново!\n";
        } catch (PDOException $e) {
            $dbForum = new PDO("mysql:host=$dbServer", $dbUser, $dbPass);
            $sql = file_get_contents(__DIR__.'/../sql/create_database_forum.sql');
            $dbForum->exec($sql);
            return "Создана новая база данных $dbName!\n";
            $dbforum = null;
        }
    }
}
