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
    private readonly array $topics;

    public function __construct() {
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

        $this->topics[$topic->getId()] = $topic;
    }

    public function getById(string $UUID): Topic
    {
        return $this->topics[$UUID];
    }

    public function persist(Topic $topic): void
    {
        $this->topics[$topic->getId()] = $topic;
    }
}