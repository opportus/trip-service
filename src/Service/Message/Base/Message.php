<?php

namespace App\Service\Message\Base;

use App\Utils\UuidGenerator\UuidGenerator;
use App\Utils\UuidGenerator\UuidGeneratorException;

/**
 * @package App\Service\Message\Base
 */
abstract class Message implements MessageInterface
{
    /**
     * @var string
     */
    protected string $id;

    /**
     * @throws UuidGeneratorException
     */
    public function __construct()
    {
        $this->id = UuidGenerator::generateUuid();
    }

    /**
     * @inheritdoc
     */
    public function getId(): string
    {
        return $this->id;
    }
}
