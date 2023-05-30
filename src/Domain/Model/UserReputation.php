<?php

declare(strict_types=1);

namespace Terricon\Forum\Domain\Model;

class UserReputation
{
    /**
    * Сохраняет рейтинг пользователя в БД
    */
    public function saveScore(int $userId, int $score): void
    {

    }

    /**
    * Извлекает рейтинг пользователя из БД
    */
    public function loadScore(int $userId) : int
    {
        return 50;    
    }
}