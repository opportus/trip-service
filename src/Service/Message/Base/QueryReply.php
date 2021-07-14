<?php

namespace App\Service\Message\Base;

use App\Utils\UuidGenerator\UuidGeneratorException;

/**
 * @package App\Service\Message\Base
 */
abstract class QueryReply extends Reply implements QueryReplyInterface
{
    /**
     * @param QueryInterface $message
     * @throws UuidGeneratorException
     */
    public function __construct(QueryInterface $message)
    {
        parent::__construct($message);
    }
}
