<?php

declare(strict_types=1);

namespace Terricon\Forum\Domain\Model;

interface UserInterface
{
    public function getPermissions(): array;
}
