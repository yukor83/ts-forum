<?php

declare(strict_types=1);

use Terricon\Forum\Application\Controller\ForumController;
use Terricon\Forum\Infrastructure\Persistence\InMemory\InMemoryTopicRepository;
use Terricon\Forum\Infrastructure\ServiceContainer;
use Terricon\Forum\Infrastructure\Templating\TemplatingEngine;

return [
    'services' => [
        'templating_engine' => [
            'class' => TemplatingEngine::class,
        ],
        'topic_repository' => [
            'class' => InMemoryTopicRepository::class,
        ],
        'service_container' => [
            'class' => ServiceContainer::class,
            'arguments' => [
                'services' => [
                    'templating_engine',
                    'topic_repository',
                ],
            ],
        ],
        'forum_controller' => [
            'class' => ForumController::class,
            'arguments' => [
                'topic_repository',
                'templating_engine',
            ],
        ],
    ],
];