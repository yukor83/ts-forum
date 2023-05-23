<?php
declare(strict_types=1);

use Terricon\Forum\Application\Controller\DefaultController;
use Terricon\Forum\Application\Controller\ForumController;

return [
    [
        'method' => 'GET',
        'path' => '/',
        'handler' => [
            'controller' => DefaultController::class,
            'action' => 'index'
        ]
    ],
    [
        'method' => 'GET',
        'path' => '/topic/show/{UUID}',
        'handler' => [
            'controller' => ForumController::class,
            'action' => 'showTopic'
        ]
    ],
    [
        'method' => 'GET',
        'path' => '/topic/show/{UUID}/page/{ID}',
        'handler' => [
            'controller' => ForumController::class,
            'action' => 'showTopic'
        ]
    ],
    [
        'method' => 'GET',
        'path' => '/topic/create',
        'handler' => [
            'controller' => ForumController::class,
            'action' => 'createTopic'
        ]
    ],
    [
        'method' => 'POST',
        'path' => '/topic/create',
        'handler' => [
            'controller' => ForumController::class,
            'action' => 'createTopic'
        ]
    ],
    [
        'method' => 'POST',
        'path' => '/topic-message/create',
        'handler' => [
            'controller' => ForumController::class,
            'action' => 'createTopicMessage'
        ]
    ]
];