<?php
declare(strict_types=1);


namespace Terricon\Forum\Infrastructure\NklRouting;

use Terricon\Forum\Infrastructure\Routing\RouterInterface;

class Router implements RouterInterface
{
    public function __construct(
        private readonly array $routes,
        private readonly string $requestUri,
        private readonly string $requestMethod
    ) {
    }

    public function getRoute(): Route
    {
        foreach ($this->routes as $route) {
            $uriParams = $this->getUriParams($route['path']);
            $requestParts = explode('/', $this->requestUri);
            $patternParts = explode('/', $route['path']);
            foreach ($requestParts as $key => $requestPart){
                foreach ($uriParams as $param){
                    if($requestPart === $param){
                        unset($requestParts[$key]);
                    }
                }
            }
            dump($requestParts);
            dump($patternParts);
            print '<br>================================<br>';
            if (
                $route['path'] === $this->requestUri
                && $route['method'] === $this->requestMethod
            ) {


                return new Route(
                    controller: $route['handler']['controller'],
                    action: $route['handler']['action'],
                    parameters: $route['parameters']
                );
            }
        }

        throw new \Exception('Route not found');
    }

    public function run(): void
    {
        $route = $this->getRoute();
        $controller = new ($route->getController());
        $action = $route->getAction();
        $parameters = $route->getParameters();
        $controller->$action(...$parameters);
    }

    private function getUriParams(string $path): array
    {
        $uriParams = [];
        $pathParts = explode('/', $path);
        $requestUriParts = explode('/', $this->requestUri);
        foreach ($pathParts as $key => $pathPart) {
            if (preg_match('/^{(.*)}$/', $pathPart)) {
                $uriParams[] = $requestUriParts[$key];
            }
        }

        return $uriParams;
    }

    public function generateUri(string $name, array $parameters = []): string
    {
        throw new \Exception('Not implemented');
        // TODO: Implement generateUri() method.
    }

}