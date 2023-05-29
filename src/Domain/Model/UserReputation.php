<?php

declare(strict_types=1);

namespace Terricon\Forum\Domain\Model;

class UserReputation
{
    public function saveScore(User $userId, int $score): void
    {
        /**
         * Сохраняет рейтинг пользователя в БД
         */
    }

    public function loadScore(User $userId) : int
    {
        /**
         * Извлекает рейтинг пользователя из БД
         */
    }
}