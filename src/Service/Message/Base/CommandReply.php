<?php

namespace App\Service\Message\Base;

use App\Utils\UuidGenerator\UuidGeneratorException;

/**
 * @package App\Service\Message\Base
 */
abstract class CommandReply extends Reply implements CommandReplyInterface
{
    /**
     * @param CommandInterface $message
     * @throws UuidGeneratorException
     */
    public function __construct(CommandInterface $message)
    {
        parent::__construct($message);
    }
}
