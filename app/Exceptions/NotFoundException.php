<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class NotFoundException extends Exception {

    // Throwable is the base interface for any object that can be thrown via a throw statement, including Error and Exception.
    public function __construct($message = "", $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function error404()
    {
        http_response_code(404);
        require VIEWS . 'errors/404.php' ;
    }

}

