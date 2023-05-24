<?php

declare(strict_types=1);

namespace Terricon\Forum\Infrastructure\Routing;

interface RouteInterface
{
    /**
     * Возвращает FQDN контроллера.
     *
     * @return string - например "Terricon\Forum\Infrastructure\Controller\TopicController"
     */
    public function getController(): string;

    /**
     * Возвращает название метода контроллера.
     *
     * @return string - например "show"
     */
    public function getAction(): string;

    /**
     * Возвращает массив параметров передаваемых в метод контроллера.
     *
     * @return array - например ["id" => 241]
     */
    public function getParameters(): array;
}
