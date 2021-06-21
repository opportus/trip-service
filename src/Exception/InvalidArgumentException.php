<?php

namespace App\Exception;

use Throwable;

/**
 * @package Opportus\ObjectMapper\Exception
 */
class InvalidArgumentException extends Exception
{
    /**
     * @var int $argumentPosition
     */
    private int $argumentPosition;

    /**
     * @param int $argumentPosition
     * @param string $message
     * @param int $code
     * @param null|Throwable $previous
     */
    public function __construct(
        int $argumentPosition,
        string $message = '',
        int $code = 0,
        Throwable $previous = null
    ) {
        $this->argumentPosition = $argumentPosition;

        $message = \sprintf(
            'Argument %d is invalid. %s',
            $this->argumentPosition,
            $message
        );

        parent::__construct($message, $code, $previous);
    }

    /**
     * @return int
     */
    public function getArgumentPosition(): int
    {
        return $this->argumentPosition;
    }
}
