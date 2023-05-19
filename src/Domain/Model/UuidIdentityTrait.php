<?php
declare(strict_types=1);


namespace Terricon\Forum\Domain\Model;

use Ramsey\Uuid\Uuid;

trait UuidIdentityTrait
{
    private string $id;

    public function getId(): string
    {
        return $this->getId();
    }

    private function setId(): void
    {
        $this->id = Uuid::uuid4()->toString();
    }
}