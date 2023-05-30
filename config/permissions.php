<?php

declare(strict_types=1);

return [
    'admin' => [
        'view_posts',
        'manage_users',
        'manage_posts',
        'manage_settings',
    ],
    'editor' => [
        'view_posts',
        'manage_posts',
    ],
    'author' => [
        'view_posts',
        'create_posts',
        'edit_own_posts',
    ],
    'guest' => [
        'view_posts',
    ],
];
