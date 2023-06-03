<?php

declare(strict_types=1);

namespace Terricon\Forum\Application\Controller;

use Terricon\Forum\Application\SecurityDictionary;
use Terricon\Forum\Application\TemplatingEngineInterface;
use Terricon\Forum\Domain\Model\TopicRepositoryInterface;
use Terricon\Forum\Infrastructure\Security\Security;

class ForumController
{
    public function __construct(
        private readonly TopicRepositoryInterface $topicRepository,
        private readonly TemplatingEngineInterface $templatingEngine,
        private readonly Security $security,
    ) {
    }

    public function showTopic(string $UUID, int|string $PageNumber = 1): void
    {
        $this->topicRepository->getById($UUID);

        $this->templatingEngine->render('show_topic.html', [
            'UUID' => $UUID,
            'PageNumber' => $PageNumber,
        ]);
    }

    public function createTopic(): void
    {
        $user = $this->security->getUser();
        $this->security->isGranted(SecurityDictionary::PERMISSION_CREATE_TOPIC, $user);
        echo __METHOD__;
    }

    public function createTopicMessage(): void
    {
        echo __METHOD__;
    }
}
