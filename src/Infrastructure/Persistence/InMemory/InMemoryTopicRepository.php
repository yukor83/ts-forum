<?php
declare(strict_types=1);


namespace Terricon\Forum\Infrastructure\Persistence\InMemory;

use Faker\Factory;
use Terricon\Forum\Domain\Model\Topic;
use Terricon\Forum\Domain\Model\TopicMessage;
use Terricon\Forum\Domain\Model\TopicRepositoryInterface;
use Terricon\Forum\Domain\Model\User;

class InMemoryTopicRepository implements TopicRepositoryInterface
{

    public function getById(string $UUID): Topic
    {
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

        return $topic;
    }

    public function persist(Topic $topic): array
    {
        // TODO: Implement persist() method.
    }
}