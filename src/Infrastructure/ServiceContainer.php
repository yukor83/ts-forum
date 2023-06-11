<?php
declare(strict_types=1);


namespace Terricon\Forum\Infrastructure;

/* /topic/show/9879797979 */
class ServiceContainer
{
    public function __construct(
        private readonly array $services
    ) {
    }

    public function getInstanceOf(string $fqdnOrServiceName): object|string
    {
        foreach ($this->services['services'] as $serviceName => $registeredService) {
            if (
                $serviceName == $fqdnOrServiceName
                || $registeredService['class'] == $fqdnOrServiceName
            ) {
                $arguments = [];
                
                if(isset($registeredService['arguments'])){
                     foreach ($registeredService['arguments'] as $argument) {
                        $arguments[] = $this->getInstanceOf($argument);
                    }
                }
                return new ($registeredService['class'])(...$arguments);
            }
        }
        throw new \Exception('Service not found');
    }
}