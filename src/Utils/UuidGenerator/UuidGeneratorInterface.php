<?php

namespace App\Utils\UuidGenerator;

/**
 * @package App\Utils\UuidGenerator
 */
interface UuidGeneratorInterface
{
    /**
     * @return string
     * @throws UuidGeneratorException
     */
    public static function generateUuid(): string;
}
