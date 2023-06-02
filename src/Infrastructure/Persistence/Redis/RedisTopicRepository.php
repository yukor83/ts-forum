<?php
declare(strict_types=1);


namespace Terricon\Forum\Infrastructure\Persistence\Redis;

use Terricon\Forum\Domain\Model\Topic;
use Terricon\Forum\Domain\Model\TopicRepositoryInterface;

class RedisTopicRepository implements TopicRepositoryInterface
{

    public function getById(string $UUID): Topic
    {
        // TODO: Implement getById() method.
    }

    public function persist(Topic $topic): array
    {
        // TODO: Implement persist() method.
    }
}