<?php

declare(strict_types=1);

namespace Terricon\Forum\Infrastructure\Persistence\PostgreSql;

use Terricon\Forum\Domain\Model\Topic;
use Terricon\Forum\Domain\Model\TopicRepositoryInterface;

final class TopicRepository implements TopicRepositoryInterface
{
    public function __construct(
        private readonly \PDOStatement $connection
    ) {
    }

    public function getById(string $UUID): Topic
    {
        // TODO: Implement getById() method.
    }

    public function persist(Topic $topic): array
    {
        // TODO: Implement persist() method.
    }
}
