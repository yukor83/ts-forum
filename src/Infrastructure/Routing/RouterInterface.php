<?php
declare(strict_types=1);


namespace Terricon\Forum\Infrastructure\Routing;

interface RouterInterface
{
    /**
     * @param array $routes - массив маршрутов (@see config/routes.php)
     * @param string $requestUri - как правило $_SERVER['REQUEST_URI']
     * @param string $requestMethod - как правило $_SERVER['REQUEST_METHOD']
     */
    public function __construct(
        array $routes,
        string $requestUri,
        string $requestMethod
    );

    /**
     * Запускает метод определенного по маршруту контроллера
     *
     * @return void
     */
    public function run(): void;

    /**
     * Возвращает объект маршрута
     *
     * @return RouteInterface
     */
    public function getRoute(): RouteInterface;

    /**
     * Генерирует URI по имени маршрута и массиву параметров
     *
     * @param string $name - имя маршрута
     * @param array $parameters - массив параметров
     * @return string - сгенерированный URI (например "/users/show/241")
     */
    public function generateUri(string $name, array $parameters = []): string;
}