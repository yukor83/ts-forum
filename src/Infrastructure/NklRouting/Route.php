<?php

declare(strict_types=1);

namespace Terricon\Forum\Infrastructure\NklRouting;

use Terricon\Forum\Infrastructure\Routing\RouteInterface;

class Route implements RouteInterface
{
    public function __construct(
        private readonly string $controller,
        private readonly string $action,
        private readonly array $parameters
    ) {
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getParameters(): array
    {
        return [
            'UUID' => '123',
            'N' => '1',
        ];

        return $this->parameters;
    }
}
