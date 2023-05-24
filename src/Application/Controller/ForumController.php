<?php

declare(strict_types=1);

namespace Terricon\Forum\Application\Controller;

class ForumController
{
    public function showTopic(string $topicId, $page = 1): void
    {
        echo __METHOD__.' '.$topicId.' '.$page;
    }

    public function createTopic(): void
    {
        echo __METHOD__;
    }

    public function createTopicMessage(): void
    {
        echo __METHOD__;
    }
}
