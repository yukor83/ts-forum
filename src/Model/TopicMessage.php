<?php
declare(strict_types=1);


namespace Terricon\Forum\Model;

class TopicMessage implements IdentityInterface
{
    use UuidIdentityTrait;
    private \DateTimeImmutable $createdAt;
    public function __construct(
        public readonly User $author,
        private string $text,
        private readonly Topic $topic
    ) {
        $this->createdAt = new \DateTimeImmutable('now');
    }
}