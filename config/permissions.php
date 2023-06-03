<?php

declare(strict_types=1);

use Terricon\Forum\Application\SecurityDictionary;

return [
    SecurityDictionary::ROLE_GUEST->name => [
        SecurityDictionary::ROLE_GUEST->name,
    ],
    'ROLE_USER' => [
        'ROLE_GUEST',
        SecurityDictionary::PERMISSION_CREATE_TOPIC->name,
        'PERMISSION_EDIT_POSTS',
    ],
    'ROLE_MODERATOR' => [
        'ROLE_USER',
        'PERMISSION_MANAGE_POSTS',
    ],
    SecurityDictionary::ROLE_ADMIN->name => [
        'ROLE_MODERATOR',
        SecurityDictionary::PERMISSION_MANAGE_USER->name,
        'PERMISSION_MANAGE_SETTINGS',
    ],
];
