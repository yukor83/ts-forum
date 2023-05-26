<?php

declare(strict_types=1);

namespace Terricon\Forum\Infrastructure\YukorRouting;

use Terricon\Forum\Infrastructure\Routing\RouterInterface;

class Router implements RouterInterface
{
    public function __construct(
        private readonly array $routes,
    ) {
    }

    public function run(string $uri, string $method): void
    {
        $route = $this->getRoute($uri, $method);
        $controller = new ($route->getController());
        $action = $route->getAction();
        $parameters = $route->getParameters();
        $controller->$action(...$parameters);
    }

    public function getRoute(string $uri, string $method): Route
    {
        $requestParts = explode('/', $uri);

        foreach ($this->routes as $route) {
            $requestUriParam = [];
            $matchCount = 0;
            $patternParts = explode('/', $route['path']);

            if ($route['method'] === $method) {
                if (count($patternParts) == count($requestParts)) {
                    for ($i = 0; $i < count($patternParts); ++$i) {
                        switch ($patternParts[$i]) {
                            case $requestParts[$i]:
                                $matchCount++;
                                break;
                            case '{UUID}':
                                if (preg_match('/[a-zA-Z0-9]/', $requestParts[$i])) {
                                    ++$matchCount;
                                    array_push($requestUriParam, '{UUID}='.$requestParts[$i]);
                                }
                                break;
                            case '{N}':
                                if (preg_match('/[[:digit:]]/', $requestParts[$i])) {
                                    ++$matchCount;
                                    array_push($requestUriParam, '{N}='.$requestParts[$i]);
                                }
                                break;
                        }
                    }
                    break;
                }
            }
        }

        if ($matchCount == count($patternParts)) {
            return new Route(
                controller: $route['handler']['controller'],
                action: $route['handler']['action'],
                parameters: $requestUriParam
            );
        } else {
            throw new \Exception('Route not found');
        }
    }

    public function generateUri(string $name, array $parameters = []): string
    {
        throw new \Exception('Not implemented');
        // TODO: Implement generateUri() method.
    }
}
