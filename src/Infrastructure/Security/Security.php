<?php

declare(strict_types=1);

namespace Terricon\Forum\Infrastructure\Security;

use Terricon\Forum\Application\SecurityDictionary;
use Terricon\Forum\Application\SecurityInterface;
use Terricon\Forum\Domain\Model\UserInterface;

class Security implements SecurityInterface
{
    public function __construct(
        private readonly array $permissions
    ) {
    }

    public function isGranted(SecurityDictionary $permission, UserInterface $user): bool
    {
        dump($this->permissions);
        dump($permission);
        dump($user);
        if(!in_array($permission, $this->permissions)){
            print 'Прямого разрешения нет!\n';
            foreach($this->permissions as $perm){
                if($perm['name'] === $permission){
                    print 'Нашли разрешение по роли!\n';
                    return $this->isGranted($perm, $user);
                }
            }
        }
//        $permissions = $user->getPermissions();
//        if(str_starts_with($permission->name, 'ROLE')){
//            $this->isGranted($permission, $user);
//        }elseif (str_starts_with($permission->name, 'PERMISSION')) {
//            $this->isGranted($permission, $user);
//        }
//        foreach ($permissions as $perm) {
//            if ($perm === $permission_name) {
//                return true;
//            }
//        }
//        return false;
    }
}
