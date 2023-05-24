<?php

declare(strict_types=1);

namespace Terricon\Forum\Infrastructure\Routing\Exception;

use Exception;

class MethodNotAllowedException extends Exception
{
    public function __construct(
        public readonly string $uri,
        public readonly string $method,
        public readonly array $allowedMethods,
        $code = 0,
        Exception $previous = null
    ) {
        $allowedMethods = implode(', ', $this->allowedMethods);
        $message = "Method '$method' not allowed for URI '$uri'. Allowed methods: '$allowedMethods'";
        parent::__construct($message, $code, $previous);
    }
}
