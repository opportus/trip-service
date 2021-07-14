<?php

namespace App\Service\Message\Base;

/**
 * @package App\Service\Message\Base
 */
interface ReplyInterface extends MessageInterface
{
    /**
     * @return string
     */
    public function getCorrelationId(): string;
}
