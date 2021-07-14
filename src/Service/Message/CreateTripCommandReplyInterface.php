<?php

namespace App\Service\Message;

use App\Entity\Trip;
use App\Service\Message\Base\CommandReplyInterface;

/**
 * @package App\Service\Message
 */
interface CreateTripCommandReplyInterface extends CommandReplyInterface
{
    /**
     * @return null|Trip
     */
    public function getTrip(): ?Trip;
}
