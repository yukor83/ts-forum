<?php

declare(strict_types=1);

namespace Terricon\Forum\Application\Controller;

class UserReputationController
{
    public function __construct(
       public User $userId
    ) {
    }

    public function changeScore(string $action): void
    {
        /**
         * Изменяет рейтинг пользователя в зависимости от того какое действие произошло. Изменение происходит согласно конфига reputation_score.php
         */
    }

    public function getScore(User $userId) : int
    {
        /**
         * Возвращает рейтинг конкретного пользователя
         */
    }
}