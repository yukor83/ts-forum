<?php

declare(strict_types=1);

namespace Terricon\Forum\Tests\Infrastructure\Routing\NklRouting;

use PHPUnit\Framework\TestCase;
use Terricon\Forum\Infrastructure\NklRouting\Router;
use Terricon\Forum\Infrastructure\Routing\RouterInterface;
use Terricon\Forum\Tests\Infrastructure\Routing\RouterTestTrait;

final class NklRouterTest extends TestCase
{
    use RouterTestTrait;
    private RouterInterface $router;
    private array $config;

    public function __construct(string $name)
    {
        $this->config = require __DIR__.'/../../../test_routes.php';
        parent::__construct($name);
    }

    public function setUp(): void
    {
        $this->router = new Router(
            $this->getRouterConfig(),
        );
    }

    public function getTestingRouter(): RouterInterface
    {
        return $this->router;
    }

    public function getRouterConfig(): array
    {
        return $this->config;
    }

    public function testGetRoute(): void
    {
        self::markTestIncomplete('This test has not been implemented yet.');
    }

    public function testGenerateUriSuccess(): void
    {
        self::markTestIncomplete('This test has not been implemented yet.');
    }
}
