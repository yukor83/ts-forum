<?php

declare(strict_types=1);

use Terricon\Forum\Tests\MockController;

$uuidRegExp = '\b([A-F 0-9]{8})-([A-F 0-9]{4})-([A-F 0-9]{4})-([A-F 0-9]{4})-([A-F 0-9]{12})\b';

return [
    [
        'name' => 'app.index',
        'method' => ['GET'],
        'path' => '/',
        'parameters' => [],
        'handler' => [
            'controller' => MockController::class,
            'action' => 'index'
        ]
    ],
    [
        'name' => 'app.topic.show',
        'method' => ['GET'],
        'path' => '/topic/show/{UUID}',
        'parameters' => [
            'UUID' => $uuidRegExp, // UUID v4
        ],
        'handler' => [
            'controller' => MockController::class,
            'action' => 'showTopic',
        ],
    ],
    [
        'name' => 'app.topic.show.page',
        'method' => ['GET'],
        'path' => '/topic/show/{UUID}/page/{PageNumber}',
        'parameters' => [
            'PageNumber' => '\d+',
            'UUID' => $uuidRegExp, // UUID v4
        ],
        'handler' => [
            'controller' => MockController::class,
            'action' => 'showTopic',
        ],
    ],
    [
        'name' => 'app.topic.create',
        'method' => ['GET', 'POST'],
        'path' => '/topic/create',
        'parameters' => [],
        'handler' => [
            'controller' => MockController::class,
            'action' => 'createTopic',
        ],
    ],
    [
        'name' => 'app.topic-message.create.process',
        'method' => ['POST'],
        'path' => '/topic-message/create',
        'parameters' => [],
        'handler' => [
            'controller' => MockController::class,
            'action' => 'createTopicMessage',
        ],
    ],
];
