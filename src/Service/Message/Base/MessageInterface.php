<?php

namespace App\Service\Message\Base;

/**
 * @package App\Service\Message\Base
 */
interface MessageInterface
{
    /**
     * @return string
     */
    public function getId(): string;
}
