<?php
declare(strict_types=1);


namespace Terricon\Forum\Infrastructure\Persistence\MySql;

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

    public function persist(Topic $topic): void
    {
        // TODO: Implement persist() method.
    }
}