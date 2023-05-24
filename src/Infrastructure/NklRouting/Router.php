<?php

declare(strict_types=1);

namespace Terricon\Forum\Infrastructure\NklRouting;

use Terricon\Forum\Infrastructure\Routing\Exception\MethodNotAllowedException;
use Terricon\Forum\Infrastructure\Routing\Exception\RouteNotFoundException;
use Terricon\Forum\Infrastructure\Routing\RouterInterface;

class Router implements RouterInterface
{
    public function __construct(
        private readonly array $routes,
    ) {
    }

    public function getRoute(string $uri, string $method): Route
    {
        $foundRoute = null;
        foreach ($this->routes as $route) {
            $uriParams = $this->getUriParams($route['path'], $uri);
            $requestParts = explode('/', $uri);
            $patternParts = explode('/', $route['path']);
            foreach ($requestParts as $requestPart) {
                if ('' === $requestPart) {
                    continue;
                }
                if (!in_array($requestPart, $patternParts)) {
                    if (0 === count($uriParams)) {
                        continue 2;
                    }
                    foreach ($uriParams as $key => $uriParam) {
                        if (!in_array($key, $patternParts)) {
                            continue 3;
                        }
                    }
                }
                $foundRoute = $route;
            }
        }
        if (!$foundRoute) {
            throw new RouteNotFoundException($uri);
        }

        if (!in_array($method, $foundRoute['method'])) {
            dump($foundRoute);
            throw new MethodNotAllowedException($uri, $method, $foundRoute['method']);
        }

        return new Route(
            $foundRoute['handler']['controller'],
            $foundRoute['handler']['action'],
            $this->getUriParams($foundRoute['path'], $uri)
        );
    }

    private function getUriParams(string $path, string $uri): array
    {
        $uriParams = [];
        $pathParts = explode('/', $path);
        $requestUriParts = explode('/', $uri);
        foreach ($pathParts as $key => $pathPart) {
            if (preg_match('/^{(.*)}$/', $pathPart)) {
                if (isset($requestUriParts[$key])) {
                    $uriParams[$pathPart] = $requestUriParts[$key];
                }
            }
        }

        return $uriParams;
    }

    public function generateUri(string $name, array $parameters = []): string
    {
        foreach ($this->routes as $route) {
            if ($route['name'] === $name) {
                $uri = $route['path'];
                foreach ($parameters as $key => $value) {
                    $uri = str_replace('{'.$key.'}', (string) $value, $uri);
                }

                return $uri;
            }
        }

        throw new \Exception('Route not found');
    }
}
