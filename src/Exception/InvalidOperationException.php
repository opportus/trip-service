<?php

namespace App\Exception;

use Throwable;

/**
 * @package App\Exception
 */
class InvalidOperationException extends Exception
{
    /**
     * Constructs the invalid operation exception.
     *
     * @param string $message
     * @param int $code
     * @param null|Throwable $previous
     */
    public function __construct(
        string $message = '',
        int $code = 0,
        Throwable $previous = null
    ) {
        $message = \sprintf(
            'Operation is invalid. %s',
            $message
        );

        parent::__construct($message, $code, $previous);
    }
}
