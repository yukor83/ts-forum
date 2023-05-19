<?php
declare(strict_types=1);


namespace Terricon\Forum\Domain\Model;

interface IdentityInterface
{
    public function getId(): string;
}