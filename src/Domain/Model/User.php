<?php

declare(strict_types=1);

namespace Terricon\Forum\Domain\Model;

class User implements UserInterface
{
    public function __construct(
        public readonly string $email,
        public readonly string $nikName,
        public readonly array $permissions,
    ) {
    }

    public function getPermissions(): array
    {
        if (array_key_exists($this->role, $this->permissions)) {
            return $this->permissions[$this->role];
        }
        throw new \Exception('Role not found');
    }
}
