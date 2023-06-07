<?php

declare(strict_types=1);

namespace Terricon\Forum\Infrastructure\Security;

use Terricon\Forum\Application\SecurityDictionary;
use Terricon\Forum\Application\SecurityInterface;
use Terricon\Forum\Domain\Model\UserInterface;

class Security implements SecurityInterface
{
    public function __construct(
        private readonly array $roles
    ) {
    }

    public function isGranted(SecurityDictionary $permission, UserInterface $user, array $roles): bool
    {
        $user_roles = $user->getPermissions();

        foreach($user_roles as $role) {
            if ($roles[$role->name]) {
                $role_permissions = $roles[$role->name];
            } else {
                $role_permissions = $roles;
            }
            foreach($role_permissions as $user_permission) {
                if ($user_permission == $permission->name) {
                    return true;
                } elseif (str_starts_with($user_permission, 'ROLE')) {
                    return $this->isGranted($permission, $user, $this->roles[$user_permission]);
                }
            }
        }
        return false;
    }
}
