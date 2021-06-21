<?php

namespace App\Utils\UuidGenerator;

use Exception;

/**
 * @package App\Utils\UuidGenerator
 */
class UuidGenerator implements UuidGeneratorInterface
{
    /**
     * @inheritdoc
     */
    public static function generateUuid(): string
    {
        try {
            $random = \random_bytes(16);

            \assert(\strlen($random) == 16);

            $random[6] = \chr(\ord($random[6]) & 0x0f | 0x40); // Sets version to 0100
            $random[8] = \chr(\ord($random[8]) & 0x3f | 0x80); // Sets bits 6-7 to 10

            return \vsprintf('%s%s-%s-%s-%s-%s%s%s', \str_split(\bin2hex($random), 4));
        } catch (Exception $e) {
            throw new UuidGeneratorException($e->getMessage());
        }
    }
}
