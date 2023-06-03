<?php

declare(strict_types=1);

namespace Terricon\Forum\Application\Controller;

use Terricon\Forum\Application\TemplatingEngineInterface;
use Terricon\Forum\Domain\Model\TopicRepositoryInterface;

class ForumController
{
    public function __construct(
        private readonly TopicRepositoryInterface $topicRepository,
        private readonly TemplatingEngineInterface $templatingEngine
    ) {
    }

    public function showTopic(string $UUID, int|string $PageNumber = null): void
    {
        if (!empty($UUID) && !is_null($PageNumber)) {
            $this->topicRepository->getById($UUID);
            $this->templatingEngine->render('show_topic.html', [
                'UUID' => $UUID,
                'PageNumber' => $PageNumber,
            ]);
        } elseif (!empty($UUID) && is_null($PageNumber)) {
            $this->topicRepository->getById($UUID);
            $this->templatingEngine->render('show_topic.html', [
                'UUID' => $UUID,
            ]);
        }
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
