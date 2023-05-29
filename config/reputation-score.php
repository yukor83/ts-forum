<?php

declare(strict_types=1);

use Terricon\Forum\Application\Controller\UserReputation;

const $MIN_SCORE = 0;
const $MAX_SCORE = 100;

return [
    [
        'action' => 'createUser',
        'score' => 50,
    ],
    [
        'action' => 'createTopic',
        'score' => 10,
    ],
    [
        'action' => 'createMessage',
        'score' => 10,
    ],
    [
        'action' => 'getLike',
        'score' => 1,
    ],
    [
        'action' => 'getDislike',
        'score' => -1,
    ],
];