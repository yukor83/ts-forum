<?php

declare(strict_types=1);

use Faker\Factory;
use Terricon\Forum\Model\Topic;
use Terricon\Forum\Model\TopicMessage;
use Terricon\Forum\Model\User;

require_once '../vendor/autoload.php';

// TODO:
$routing = [
    '[GET] /', // список топиков
    '[GET] /topic/show/{UUID}', //отображение топика
    '[GET] /topic/show/{UUID}/page/{N}', //отображение N-страницы топика
    '[GET] /topic/create', //отображение формы создания топика
    '[POST] /topic/create', //обработка формы создания топика
    '[POST] /topic-message/create', //обработка формы создания ответа на топик
];
$faker = Factory::create('ru_RU');

$topicStarter = new User(
    $faker->email,
    $faker->name
);

$user1 = new User(
    $faker->email,
    $faker->name
);

$user2 = new User(
    $faker->email,
    $faker->name
);

$topic = new Topic(
    name: 'Тестовый топик',
    message: 'Тестовое сообщение топика',
    author: $topicStarter
);

$topic->addMessage(new TopicMessage(
    author: $user1,
    text: 'Первый ответ на топик',
    topic: $topic
))->addMessage(new TopicMessage(
    author: $user2,
    text: 'Второй ответ на топик',
    topic: $topic
));

dump($topic);