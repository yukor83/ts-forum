<?php

declare(strict_types=1);

namespace Terricon\Forum\Infrastructure\Security;

use Terricon\Forum\Domain\Model\UserInterface;

class Security
{
    public function isGranted(string $permission_name, UserInterface $class): bool
    {
        $permissions = $class->getPermissions();
        foreach ($permissions as $perm) {
            if ($perm === $permission_name) {
                return true;
            }
        }
        return false;
    }
}
