<?php
declare(strict_types=1);


namespace Terricon\Forum\Domain\Model;

class User
{
    public function __construct(
        public readonly string $email,
        public readonly string $nikName
    ) {
    }
}