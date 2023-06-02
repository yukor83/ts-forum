<?php

declare(strict_types=1);

namespace Terricon\Forum\Domain\Model;

class User
{
    public const MAX_REPUTATION = 100;
    public const MIN_REPUTATION = 0;


    public function __construct(
        public readonly string $email,
        public readonly string $nickName,
        public int $reputation = 50
    ) {
    }

    public function changeReputation(int $reputation): void
    {
        if($reputation >= self::MAX_REPUTATION){
            $this->reputation = self::MAX_REPUTATION;
        } elseif ($reputation <= 0) {
            $this->reputation = self::MIN_REPUTATION;
        } else {
            $this->reputation = $reputation;
        }
    }
}
