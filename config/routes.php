<?php
declare(strict_types=1);

use Terricon\Forum\Application\Controller\DefaultController;
use Terricon\Forum\Application\Controller\ForumController;

return [
    [
        'name' => 'app.index',
        'method' => 'GET',
        'path' => '/',
        'handler' => [
            'controller' => DefaultController::class,
            'action' => 'index'
        ]
    ],
    [
        'name' => 'app.topic.show',
        'method' => 'GET',
        'path' => '/topic/show/{UUID}',
        'handler' => [
            'controller' => ForumController::class,
            'action' => 'showTopic'
        ]
    ],
    [
        'name' => 'app.topic.show.page',
        'method' => 'GET',
        'path' => '/topic/show/{UUID}/page/{N}',
        'handler' => [
            'controller' => ForumController::class,
            'action' => 'showTopic'
        ]
    ],
    [
        'name' => 'app.topic.create.form',
        'method' => 'GET',
        'path' => '/topic/create',
        'handler' => [
            'controller' => ForumController::class,
            'action' => 'createTopic'
        ]
    ],
    [
        'name' => 'app.topic.create.process',
        'method' => 'POST',
        'path' => '/topic/create',
        'handler' => [
            'controller' => ForumController::class,
            'action' => 'createTopic'
        ]
    ],
    [
        'name' => 'app.topic-message.create.process',
        'method' => 'POST',
        'path' => '/topic-message/create',
        'handler' => [
            'controller' => ForumController::class,
            'action' => 'createTopicMessage'
        ]
    ]
];