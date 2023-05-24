<?php
declare(strict_types=1);


namespace Terricon\Forum\Tests;

class MockController
{
    public function __call(string $name, array $arguments): void
    {
        print "Вызван метод $name с параметрами: " . implode(', ', $arguments) . PHP_EOL;
    }

}