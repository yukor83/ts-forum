<?php
declare(strict_types=1);

namespace Terricon\Forum\Infrastructure\YukorRouting;

use Terricon\Forum\Infrastructure\Routing\RouterInterface;

class Router implements RouterInterface
{
    public function __construct(
        private readonly array $routes,
        private readonly string $requestUri,
        private readonly string $requestMethod
    ) {

    }

    public function run(): void
    {
        $this->getRoute();
    }

    /*
    /topic/show/2423423/page/2
    */
    public function getRoute(): Route
    {
        $uriParams = explode('/', $this->requestUri);
        

        dump($uriParams);
        dump($this->routes);

    }

    public function generateUri(string $name, array $parameters = []): string
    {

    }

}
