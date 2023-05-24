<?php
declare(strict_types=1);


namespace Terricon\Forum\Infrastructure\Routing\Exception;

use Exception;

class RouteNotFoundException extends Exception
{
    public function __construct($uri, $code = 0, Exception $previous = null)
    {
        $message = "Route for URI '$uri' not found";
        parent::__construct($message, $code, $previous);
    }
}