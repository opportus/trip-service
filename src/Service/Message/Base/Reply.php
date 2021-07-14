<?php

namespace App\Service\Message\Base;

use App\Utils\UuidGenerator\UuidGeneratorException;

/**
 * @package App\Service\Message\Base
 */
abstract class Reply extends Message implements ReplyInterface
{
    /**
     * @var string
     */
    protected string $correlationId;

    /**
     * @param MessageInterface $message
     * @throws UuidGeneratorException
     */
    public function __construct(MessageInterface $message)
    {
        parent::__construct();

        $this->correlationId = $message->getId();
    }

    /**
     * @inheritdoc
     */
    public function getCorrelationId(): string
    {
        return $this->correlationId;
    }
}
